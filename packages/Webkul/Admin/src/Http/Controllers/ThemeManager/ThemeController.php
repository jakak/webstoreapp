<?php

namespace Webkul\Admin\Http\Controllers\ThemeManager;

use Illuminate\Http\Request;
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
        // dd('james');
        $channel = Channel::first();
        $channel->update(request()->all());
        // $this->channel->update( request()->all(), Channel::first()->id);
        $this->channel->uploadImages( request()->all(), $channel);
        $this->channel->uploadImages(request()->all(), $channel, 'favicon');
        session()->flash('success', trans('admin::app.response.update-success', ['name' => 'Channel']));

        return redirect()->back();
    }
}
