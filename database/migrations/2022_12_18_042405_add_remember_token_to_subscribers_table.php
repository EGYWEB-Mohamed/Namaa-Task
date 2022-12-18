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
		Schema::table('subscribers', function (Blueprint $table) {
            $table->string('remember_token',100);
		});
	}

	public function down()
	{
		Schema::table('subscribers', function (Blueprint $table) {
			$table->dropColumn('remember_token');
		});
	}
};
