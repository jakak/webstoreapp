<?php

namespace Webkul\Admin\Http\Controllers\ThemeManager;

use Illuminate\Http\Request;
use Webkul\Core\Models\Channel;
use Illuminate\Http\Response;
use Webkul\Admin\Http\Controllers\Controller;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_config;

    function __construct()
    {
        $this->_config = request('_config');

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
        $channel = Channel::first()->update(request()->all());

        session()->flash('success', trans('admin::app.response.update-success', ['name' => 'Channel']));

        return redirect()->back();
    }
}
