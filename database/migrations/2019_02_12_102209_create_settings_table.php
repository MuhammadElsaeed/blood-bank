<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone', 11)->nullable();
			$table->string('email', 255);
			$table->string('facebook_url', 255);
			$table->string('twitter_url', 255)->nullable();
			$table->string('youtube_url', 255)->nullable();
			$table->string('instagram_url', 255)->nullable();
			$table->string('whatsapp_url', 255)->nullable();
			$table->string('google_url', 255)->nullable();
			$table->mediumText('about')->nullable();
			$table->string('android_app_url', 255)->nullable();
			$table->string('ios_app_url', 255)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}