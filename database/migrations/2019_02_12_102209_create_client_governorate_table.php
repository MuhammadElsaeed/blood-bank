<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientGovernorateTable extends Migration {

	public function up()
	{
		Schema::create('client_governorate', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('governorate_id')->unsigned()->index();
			$table->integer('client_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('client_governorate');
	}
}