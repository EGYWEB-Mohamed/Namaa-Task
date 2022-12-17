<?php
/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('blogs', function (Blueprint $table) {
			$table->id();

			$table->text('image');
			$table->string('title');
			$table->longText('content');
			$table->boolean('status')->default(false);
			$table->date('publish_date');

			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('blogs');
	}
};
