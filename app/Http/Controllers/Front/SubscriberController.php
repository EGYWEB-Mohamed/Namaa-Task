<?php
/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class SubscriberController extends Controller
{
	public function index()
	{
        return view('front.home');
	}

    public function showBlog(Blog $blog)
    {
        return view('front.blogs.show',compact('blog'));
    }
}
