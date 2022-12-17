<?php
/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $blogs = Blog::all();
        return $this->sendSuccess('Success', BlogResource::collection($blogs));
    }

    public function show(Blog $blog)
    {
        return $this->sendSuccess('Success', BlogResource::make($blog));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required',
            'image' => 'sometimes',
            'publish_date' => 'required|date',
            'status' => 'sometimes',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads');
        }
        $blog->update($data);
        return $this->sendSuccess('Updated Successfully', BlogResource::make($blog));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required',
            'image' => 'required',
            'publish_date' => 'required|date',
            'status' => 'sometimes',
        ]);
        $data['status'] = $request->has('status');
        $data['image'] = $request->file('image')->store('uploads');
        $blog = Blog::create($data);
        return $this->sendSuccess('Created Success', BlogResource::make($blog));
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return $this->sendSuccess('Deleted Successfully');
    }
}
