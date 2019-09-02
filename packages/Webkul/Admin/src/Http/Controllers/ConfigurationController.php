<?php

namespace Webkul\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Facades\Configuration;
use Webkul\Core\Models\Channel;
use Webkul\Core\Repositories\CoreConfigRepository as CoreConfig;
use Webkul\Core\Tree;
use Webkul\Admin\Http\Requests\ConfigurationForm;
use Illuminate\Support\Facades\Storage;
use App\Location;
use App\Mail\TestNotificationMail;
use App\StoreNotification;
use Illuminate\Support\Facades\Mail;
use App\MailSetting;

/**
 * Configuration controller
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_config;

    /**
     * CoreConfigRepository object
     *
     * @var array
     */
    protected $coreConfig;

    /**
     *
     * @var array
     */
    protected $configTree;
    private $channel;

    /**
     * Create a new controller instance.
     *
     * @param  Webkul\Core\Repositories\CoreConfigRepository  $coreConfig
     * @return void
     */
    public function __construct(CoreConfig $coreConfig)
    {
        $this->middleware('admin');

        $this->coreConfig = $coreConfig;

        $this->_config = request('_config');

        $this->channel = Channel::first();

        $this->prepareConfigTree();

    }

    /**
     * Prepares config tree
     *
     * @return void
     */
    public function prepareConfigTree()
    {
        $tree = Tree::create();

        foreach (config('core') as $item) {
            $tree->add($item);
        }
        // dd(config('core'));
        $tree->items = core()->sortItems($tree->items);
        // dd($tree);
        $this->configTree = $tree;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slugs = $this->getDefaultConfigSlugs();

        if (count($slugs)) {
            return redirect()->route('admin.configuration.index', $slugs);
        }

        return view($this->_config['view'], ['config' => $this->configTree]);
    }

    /**
     * Returns slugs
     *
     * @return array
     */
    public function getDefaultConfigSlugs()
    {
        $slugs = [];

        if (! request()->route('slug')) {
            $firstItem = current($this->configTree->items);
            $secondItem = current($firstItem['children']);

            $temp = explode('.', $secondItem['key']);

            $slugs = [
                'slug' => current($temp),
                'slug2' => end($temp)
            ];
        } else {
            if (! request()->route('slug2')) {
                $secondItem = current($this->configTree->items[request()->route('slug')]['children']);

                $temp = explode('.', $secondItem['key']);

                $slugs = [
                    'slug' => current($temp),
                    'slug2' => end($temp)
                ];
            }
        }

        return $slugs;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Webkul\Admin\Http\Requests\ConfigurationForm $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Event::fire('core.configuration.save.after');

        $this->coreConfig->create(request()->all());

        Event::fire('core.configuration.save.after');

        session()->flash('success', trans('admin::app.configuration.save-message'));

        return redirect()->back();
    }

    /**
     * download the file for the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        $path = request()->route()->parameters()['path'];

        $fileName = 'configuration/'. $path;

        $config = $this->coreConfig->findOneByField('value', $fileName);

        return Storage::download($config['value']);
    }

    public function newLocation (Request $request)
    {
        return view ( 'admin::configuration.location', ['config' => $this->configTree]);
    }

    public function saveLocation (Request $request)
    {
        if ($request->has('id')) {
            $location = Location::find($request->all()['id']);
            $location->update($request->all());
        } else {
            $location = Location::create($request->all());
        }

        session()->flash('success', trans('admin::app.configuration.save-message'));
        return redirect()->back();
    }

    public function deleteLocation ($location)
    {
        $location = Location::where('location', $location)->first();

        if ($location) {
            $location->delete();
        }

        session()->flash('success', 'Location successfully deleted');
        return redirect()->back();
    }

    public function getLocationDetails ($location)
    {
        $location = Location::where('location', $location)->first();

        return $location;
    }

    public function addRecipient(Request $request)
    {
        $admin = \Webkul\User\Models\Admin::find($request->user);
        if ($request->has('id') && $admin) {

            $recipient = StoreNotification::find($request->id)->first();

            $recipient->update([
                'name' => $admin->name,
                'email' => $admin->email,
                'test_btn' => ' Button will show here',
                'status' => $request->status,
            ]);

            session()->flash('success', 'Recipient updated successfully');
        } else {
            if ($admin) {
                $recipient = StoreNotification::where('email', $admin->email)->first();
                if ($recipient) {
                    session()->flash('error', 'User is already a recipient');
                    return redirect()->back();
                }


                StoreNotification::create([
                    'name' => $admin->name,
                    'email' => $admin->email,
                    'test_btn' => ' Button will show here',
                    'status' => $request->status,
                ]);

                session()->flash('success', 'Recipient added successfully');
            }
        }


        return redirect()->back();
    }

    public function delRecipient($email)
    {
        StoreNotification::where('email', $email)->first()->delete();

        return redirect()->back();
    }

    public function getRecipient($email)
    {
        $admin = \Webkul\User\Models\Admin::where('email', $email)->first();

        $recipient = StoreNotification::where('email', $email)->first();

        return response()->json([
            'id' => $recipient->id,
            'user' => $admin->id,
            'status' => $recipient->status
        ]);
    }

    public function sendTestEmail($email)
    {
        try {
            Mail::to($email)->send(new TestNotificationMail());
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }

        session()->flash('success', 'Email sent successfully');

        return redirect()->back();
    }

    public function saveEmailSettings(Request $request)
    {
        $request->validate([
            'host' => 'required',
            'port' => 'required|numeric',
            'password' => 'required',
            'encryption' => 'required'
        ]);
        $settings = MailSetting::first();
        $data = $request->all();
        $data['username'] = $this->channel->email;

        if ($settings) {
            $this->uploadImage($request, $settings);
            if ($data['logo']) {
                unset($data['logo']);
            }
            $settings->update($data);
            session()->flash('success', 'Settings updated successfully');
        } else {
            $data['logo'] = $this->uploadNewImage($request);
            $settings = MailSetting::create($data);
            session()->flash('success', 'Settings updated successfully');
        }
        return redirect()->back();
    }

    public function uploadImage(Request $request, $settings)
    {
        foreach ($request->logo as $imageId => $image) {
            $file = 'logo' . '.' . $imageId;
            $dir = 'mail/settings/' . random_int(12, 4999);

            if ($request->hasFile($file)) {
                if ($settings->logo != '/url') {
                    Storage::delete($settings->logo);
                }
                $settings->logo = 'storage/' . request()->file($file)->store($dir);
                $settings->save();
            }
        }
    }

    public function uploadNewImage(Request $request)
    {
        foreach ($request->logo as $imageId => $image) {
            $file = 'logo' . '.' . $imageId;
            $dir = 'mail/settings/' . random_int(12, 4999);

            if ($request->hasFile($file)) {
                return 'storage/' . request()->file($file)->store($dir);
            }
        }
    }
}
