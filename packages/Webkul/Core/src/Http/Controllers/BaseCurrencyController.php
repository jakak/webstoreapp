<?php

namespace Webkul\Core\Http\Controllers;

use App\MailSetting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Webkul\Core\Models\Channel as BaseChannel;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Repositories\ChannelRepository as Channel;
use Webkul\Core\Repositories\CurrencyRepository as Currency;

/**
 * Currency controller
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class BaseCurrencyController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * CurrencyRepository object
     *
     * @var array
     */
    protected $channel;

    /**
     * Create a new controller instance.
     *
     * @param  Webkul\Core\Repositories\CurrencyRepository $currency
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
    public function edit()
    {
        $baseCurrency = $this->channel->with('currencies')->first();
        return view($this->_config['view'], compact('baseCurrency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'base_currency_id' => 'required',
            'currencies' => 'required|array|min:1',
        ]);

        Event::fire('core.channel.update.before', $id);

        $data = request()->all();

        if ($request->receives_notification == "on") {
            $data['receives_notification'] = 1;
        } else {
            $data['receives_notification'] = 0;
        }
        $channel = $this->channel->find($id);
        $channel->base_currency_id = $data['base_currency_id'];
        $channel->save();
        $channel->currencies()->sync($data['currencies']);


        Event::fire('core.channel.update.after', $channel);
        $mailSetting = MailSetting::first();
        if ($mailSetting) {
            $mailSetting->username = $channel->email;
            $mailSetting->update();
        }
        session()->flash('success', trans('admin::app.response.update-success', ['name' => 'Currency']));

        return redirect()->route('admin.base.currencies.edit');
    }


}
