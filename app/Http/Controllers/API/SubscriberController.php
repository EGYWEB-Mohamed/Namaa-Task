<?php
/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SubscriberController extends Controller
{
    use ApiResponse;
	public function index()
	{
		$subscribers = Subscriber::all();
        return $this->sendSuccess('Success',SubscriberResource::collection($subscribers));
	}

	public function store(Request $request)
	{
        $data = $request->validate([
           'name'   =>  'required',
           'username'   =>  'required|unique:subscribers,username',
           'password'   =>  'required',
           'status'   =>  'sometimes',
        ]);
        $data['status'] = $request->has('status');
        $data['password'] = Hash::make($request->get('password'));
        $subscriber = Subscriber::create($data);
        return $this->sendSuccess('Created Success',SubscriberResource::make($subscriber));
	}

	public function show(Subscriber $subscriber)
	{
        return $this->sendSuccess('Success',SubscriberResource::make($subscriber));
	}

	public function update(Request $request, Subscriber $subscriber)
	{
        $data = $request->validate([
            'name'   =>  'required',
            'username'   =>  'required|unique:subscribers,username,'.$subscriber->id,
            'password'   =>  'sometimes',
            'status'   =>  'required',
        ]);
        if ($request->has('password')) {
            $data['password'] = Hash::make($request->get('password'));
        }
        $subscriber->update($data);
        return $this->sendSuccess('Updated Successfully',SubscriberResource::make($subscriber));
	}

	public function destroy(Subscriber $subscriber)
	{
        $subscriber->delete();
        return $this->sendSuccess('Deleted Successfully');
	}
}
