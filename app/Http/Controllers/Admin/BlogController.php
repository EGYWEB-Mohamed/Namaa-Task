<?php
/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\DataTables\SubscriberDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }

	public function create()
	{
        return view('admin.blog.create');
	}

	public function edit(Blog $blog)
	{
        return view('admin.blog.edit',compact('blog'));
	}
}
