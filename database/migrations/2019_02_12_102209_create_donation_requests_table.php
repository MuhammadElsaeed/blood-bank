<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('client_id')->unsigned()->index();
			$table->string('patient_name', 255);
			$table->smallInteger('patient_age')->unsigned();
			$table->smallInteger('bags_number')->unsigned();
			$table->string('hospital_name', 255);
			$table->decimal('hosiptal_latitude', 10,8);
			$table->decimal('hospital_longitude', 11,8);
			$table->integer('city_id')->unsigned()->index();
			$table->string('phone', 11);
			$table->integer('blood_type_id')->unsigned()->index();
			$table->string('notes', 255)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}