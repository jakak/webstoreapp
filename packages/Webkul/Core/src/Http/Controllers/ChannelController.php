<?php

namespace Webkul\Core\Http\Controllers;

use App\MailSetting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Repositories\ChannelRepository as Channel;


/**
 * Channel controller
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class ChannelController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * ChannelRepository object
     *
     * @var array
     */
    protected $channel;

    /**
     * Create a new controller instance.
     *
     * @param  Webkul\Core\Repositories\ChannelRepository  $channel
     * @return void
     */
    public function __construct(Channel $channel)
    {
        $this->channel = $channel;

        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->_config['view'])->with('channel', $this->channel->first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->_config['view']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'code' => ['required', 'unique:channels,code', new \Webkul\Core\Contracts\Validations\Code],
            'name' => 'required',
            'currencies' => 'required|array|min:1',
            'base_currency_id' => 'required',
            'root_category_id' => 'required',
            'logo.*' => 'mimes:jpeg,jpg,bmp,png',
            'favicon.*' => 'mimes:jpeg,jpg,bmp,png'
        ]);

        Event::fire('core.channel.create.before');

        $channel = $this->channel->create(request()->all());

        Event::fire('core.channel.create.after', $channel);

        session()->flash('success', trans('admin::app.response.create-success', ['name' => 'Channel']));

        return redirect()->route($this->_config['redirect']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channel = $this->channel->with(['currencies'])->find($id);

        return view($this->_config['view'], compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'code' => ['required', 'unique:channels,code,' . $id, new \Webkul\Core\Contracts\Validations\Code],
            'name' => 'required',
            'description' => 'required',
            'inventory_sources' => 'required|array|min:1',
            'status' => 'required',
            'business_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        Event::fire('core.channel.update.before', $id);

        $data = request()->all();

        if ($request->receives_notification == "on") {
            $data['receives_notification'] = 1;
        } else {
            $data['receives_notification'] = 0;
        }

        $channel = $this->channel->update($data, $id);

        Event::fire('core.channel.update.after', $channel);
        $mailSetting = MailSetting::first();
        if ($mailSetting) {
            $mailSetting->username = $channel->email;
            $mailSetting->update();
        }
        session()->flash('success', trans('admin::app.response.update-success', ['name' => 'Channel']));

        return redirect()->route($this->_config['redirect']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->channel->count() == 1) {
            session()->flash('error', 'At least one channel is required.');
        } else {
            Event::fire('core.channel.delete.before', $id);

            $this->channel->delete($id);

            Event::fire('core.channel.delete.after', $id);

            session()->flash('success', trans('admin::app.response.delete-success', ['name' => 'Channel']));
        }

        return redirect()->back();
    }
}
