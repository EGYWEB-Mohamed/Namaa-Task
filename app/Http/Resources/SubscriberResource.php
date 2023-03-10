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

/** @mixin \App\Models\Subscriber */
class SubscriberResource extends JsonResource
{
	/**
	 * @param Request $request
	 *
	 * @return array
	 */
	public function toArray($request)
	{
		return [
            'name' => $this->name,
            'username'  =>  $this->username,
            'status'    =>  $this->status
		];
	}
}
