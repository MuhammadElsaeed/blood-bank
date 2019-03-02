<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255);
			$table->string('email', 255)->unique();
			$table->date('date_of_birth');
			$table->string('phone', 11)->unique();
			$table->integer('blood_type_id')->unsigned()->index();
			$table->string('password', 255);
			$table->date('last_donation')->nullable()->index();
			$table->integer('city_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}