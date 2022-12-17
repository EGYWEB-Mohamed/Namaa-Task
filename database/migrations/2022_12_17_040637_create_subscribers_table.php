<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('subscribers', function (Blueprint $table) {
			$table->id();

            $table->string('name');
			$table->string('username')->unique();
            $table->string('password');
            $table->boolean('status')->default(false);

			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('subscribers');
	}
};
