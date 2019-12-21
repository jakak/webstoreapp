<?php

namespace Webkul\Admin\Http\Controllers\ThemeManager;

use App\ColorPicker;
use App\FooterPage;
use App\SocialIcon;
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

    public function first($columns = ['*'])
    {
        return ColorPicker::first();
    }

    public function customize()
    {
        return view($this->_config['view'], ['channel' => Channel::first()]);
    }

    public function update()
    {
        if (request()->has('home_page_content')) {
            $channel = Channel::first();
            $channel->update(request()->all());
            // $this->channel->update( request()->all(), Channel::first()->id);
            $this->channel->uploadImages( request()->all(), $channel);
            $this->channel->uploadImages(request()->all(), $channel, 'favicon');
        } else {
            $this->colorPicker();
        }

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
     * @throws \Exception
     */
    public function createNewFooterPages(Request $request)
    {
        $data = $request->all();

        $this->socialIcons($data);

        // Save footer credit
        $channel = Channel::first();
        $channel->update(['footer_credit' => $data['footer_credit']]);

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

            session()->flash('success', 'Footer section has been successfully updated.');
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
        if (request()->has('restore')){
            $colorPicker = ColorPicker::updateOrCreate([
                'top_menu_bg' => 'ffffff',
                'top_menu_text' => '4f5b64',
                'top_menu_hover' => '4f5b64',
                'hyperlinks' => '79c142',
                'cart_button_bg' => '79c142',
                'cart_button_text' => 'ffffff',
                'footer_bg' => 'f2f2f2',
                'footer_title' => 'a5a5a5',
                'footer_text' => '4f5b64',
                'footer_button' => '4f5b64'
            ]);
            return $colorPicker;
        } else {
            $colorPicker = ColorPicker::updateOrCreate([
                'top_menu_bg' => $data->top_menu_bg,
                'top_menu_text' => $data->top_menu_text,
                'top_menu_hover' => $data->top_menu_hover,
                'hyperlinks' => $data->hyperlinks,
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

    /**
     * Handle socal icons logic
     * @param $data
     */
    private function socialIcons($data)
    {
        //Get the Icon themes and their names
        $iconThemes = $data['radio'];
        $splitThemes = explode(' / ', $iconThemes);

        // Get all icons themes from the collection
        $getIconName_1 = $splitThemes[0];
        $getIconName_2 = $splitThemes[1];
        $getIconName_3 = $splitThemes[2];
        $getIconName_4 = $splitThemes[3];
        $getIconName_5 = $splitThemes[4];
        $getIconName_6 = $splitThemes[5];

        // Split out the icons and names
        $splitName_1 = explode('  ', $getIconName_1);
        $splitName_2 = explode('  ', $getIconName_2);
        $splitName_3 = explode('  ', $getIconName_3);
        $splitName_4 = explode('  ', $getIconName_4);
        $splitName_5 = explode('  ', $getIconName_5);
        $splitName_6 = explode('  ', $getIconName_6);

        // Get all social names and url in an array
        $socials = [
            [
                $data['social_1'],
                $data['name_1'],
            ], [
                $data['social_2'],
                $data['name_2'],
            ], [
                $data['social_3'],
                $data['name_3'],
            ], [
                $data['social_4'],
                $data['name_4'],
            ], [
                $data['social_5'],
                $data['name_5'],
            ]

        ];

        SocialIcon::truncate();

        // Access each icon and save in database
        foreach ($socials as $social){
            $getSocial = SocialIcon::create([
                'name' => $social[0],
                'url'  => $social[1]
            ]);

            switch ($splitName_2[0]) {
                case $getSocial->name:
                    SocialIcon::where('id', $getSocial->id)->update(['icon' => $splitName_2[1], 'icon_name' => $splitName_1[0]]);
                    break;
            }

            switch ($splitName_3[0]) {
                case $getSocial->name:
                    SocialIcon::where('id', $getSocial->id)->update(['icon' => $splitName_3[1], 'icon_name' => $splitName_1[0]]);
                    break;
            }

            switch ($splitName_4[0]) {
                case $getSocial->name:
                    SocialIcon::where('id', $getSocial->id)->update(['icon' => $splitName_4[1], 'icon_name' => $splitName_1[0]]);
                    break;
            }

            switch ($splitName_5[0]) {
                case $getSocial->name:
                    SocialIcon::where('id', $getSocial->id)->update(['icon' => $splitName_5[1], 'icon_name' => $splitName_1[0]]);
                    break;
            }

            switch ($splitName_6[0]) {
                case $getSocial->name:
                    SocialIcon::where('id', $getSocial->id)->update(['icon' => $splitName_6[1], 'icon_name' => $splitName_1[0]]);
                    break;
            }
        }

    }
}
