<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Webkul\Core\Models\FooterContent;

class PageController extends Controller
{
    public function showPage($page)
    {
        $page = str_replace('-', ' ', $page);
        $page = Page::where('name', $page)->first();
        if ($page && $page->status === 'Enabled') {
            return view('pages.page')->with([
                'page' => $page
            ]);
        }
        abort(404);
    }

    public function showStoreInfo($page)
    {
//        $page = str_replace('-', ' ', $page);
        $page = FooterContent::where('name', $page)->first();
        if ($page) {
            return view('pages.store_info')->with([
                'page' => $page
            ]);
        }
        abort(404);
    }
}
