<?php


namespace Webkul\Admin\Http\Controllers\Domains;


use Illuminate\Http\Request;
use Webkul\Admin\Http\Controllers\Controller;

class CustomDomain extends Controller
{
    /**
     * @var array|Request|string
     */
    private $_config;

    public function __construct()
    {
        $this->_config = request('_config');
    }

    public function index()
    {
        return view($this->_config['view']);
    }
}
