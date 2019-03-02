<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBloodClientTable extends Migration {

	public function up()
	{
		Schema::create('blood_client', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('blood_type_id')->unsigned()->index();
			$table->integer('client_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('blood_client');
	}
}