<?php
/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

namespace App\Http\Controllers\Admin;

use App\DataTables\SubscriberDataTable;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
	public function index(SubscriberDataTable $dataTable)
	{
        return $dataTable->render('admin.subscriber.index');
	}

	public function create()
	{
        return view('admin.subscriber.create');
	}

	public function edit(Subscriber $subscriber)
	{
        return view('admin.subscriber.edit',compact('subscriber'));
	}
}
