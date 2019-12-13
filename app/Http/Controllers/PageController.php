<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Webkul\Admin\Models\Blog;
use Webkul\Core\Models\FooterContent;

class PageController extends Controller
{

    /**
     * Show post details in the storefront
     * @param $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPost($post)
    {
        $post = str_replace('-', ' ', $post);
        $post = Blog::where('title', $post)->first();
        if ($post && $post->status === 'published') {
            return view('posts.post')->with([
                'post' => $post
            ]);
        }
        abort(404);
    }

    public function showStoreInfo($page)
    {
        $page = FooterContent::where('name', $page)->first();
        if ($page) {
            return view('pages.store_info')->with([
                'page' => $page
            ]);
        }
        abort(404);
    }
}
