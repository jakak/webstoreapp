<?php

namespace Webkul\Admin\Http\Controllers\ThemeManager;

use App\ColorPicker;
use App\FooterPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Webkul\Core\Models\Channel;
use Illuminate\Http\Response;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Core\Repositories\ChannelRepository;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_config, $channel;

    function __construct(ChannelRepository $channel)
    {
        $this->_config = request('_config');
        $this->channel = $channel;

    }

    public function index()
    {
        return view($this->_config['view']);
    }

    public function customize()
    {
        return view($this->_config['view'], ['channel' => Channel::first()]);
    }

    public function update()
    {
        $channel = Channel::first();
        $channel->update(request()->all());
        // $this->channel->update( request()->all(), Channel::first()->id);
        $this->channel->uploadImages( request()->all(), $channel);
        $this->channel->uploadImages(request()->all(), $channel, 'favicon');
        $this->colorPicker();

        session()->flash('success', trans('admin::app.response.update-success', ['name' => 'Channel']));

        return redirect()->back();
    }

    /**
     *  Handling view for footer section in theme manager
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function footerSection()
    {
        $channel = Channel::first();
        $channel->update(request()->all());
        return view($this->_config['view'], ['channel' => Channel::first()]);
    }

    /**
     * Handle footer pages, social, credit links
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createNewFooterPages(Request $request)
    {
        $data = $request->all();

        $contents = [
            $data["content-1"],
            $data["content-2"],
            $data["content-3"],
            $data["content-4"],
            $data["content-5"]
        ];

        try {
            DB::beginTransaction();

            FooterPage::truncate();

            foreach ($contents as $content) {

                $getPage = explode(" / ", $content);

                FooterPage::Create([
                    "page_id" => $getPage[0],
                    "name" => $getPage[1],
                    "url" => $getPage[2]
                ]);

            }

            DB::commit();

            session()->flash('success', 'Pages published successfully');
            return redirect()->back();

        }  catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Handle color picker in the webstore
     * @return mixed
     */
    public function colorPicker()
    {
        $data = (object) request()->all();

        ColorPicker::truncate();

        $colorPicker = ColorPicker::updateOrCreate([
            'top_menu_bg' => $data->top_menu_bg,
            'top_menu_text' => $data->top_menu_text,
            'cart_button_bg' => $data->cart_button_bg,
            'cart_button_text' => $data->cart_button_text,
            'footer_bg' => $data->footer_bg,
            'footer_title' => $data->footer_title,
            'footer_text' => $data->footer_text,
            'footer_button' => $data->footer_button
        ]);

        return $colorPicker;
    }
}
