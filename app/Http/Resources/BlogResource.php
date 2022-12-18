<?php
/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/** @mixin \App\Models\Blog */
class BlogResource extends JsonResource
{
	/**
	 * @param Request $request
	 *
	 * @return array
	 */
	public function toArray($request)
	{
		return [
			'id' => $this->id,
			'image' => asset($this->image),
			'title' => $this->title,
			'content' => \Illuminate\Support\Str::limit(strip_tags($this->content),50),
			'status' => $this->status,
            'url' => route('showBlog',$this->id),
			'publish_date' => $this->publish_date,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
		];
	}
}
