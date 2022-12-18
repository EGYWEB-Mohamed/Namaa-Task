<?php
/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BlogFactory extends Factory
{
	protected $model = Blog::class;

	public function definition(): array
	{
		return [
			'image' => 'uploads/CgO32ujnkbVSBvQe28V5pb9mFCURKgGrH92X1RMJ.png',
			'title' => $this->faker->word(),
			'content' => $this->faker->randomHtml(),
			'status' => $this->faker->boolean(),
			'publish_date' => Carbon::now(),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		];
	}
}
