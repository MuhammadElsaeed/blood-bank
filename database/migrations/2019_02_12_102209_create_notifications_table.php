<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('notifications', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('client_id')->unsigned()->index();
			$table->integer('donation_request_id')->unsigned()->index();
			$table->string('title', 255);
			$table->string('content', 255);
		});
	}

	public function down()
	{
		Schema::drop('notifications');
	}
}