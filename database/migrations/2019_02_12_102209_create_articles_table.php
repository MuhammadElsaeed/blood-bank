<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration {

	public function up()
	{
		Schema::create('articles', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 255);
			$table->string('image_url', 255);
			$table->string('description', 255);
			$table->mediumText('content');
		});
	}

	public function down()
	{
		Schema::drop('articles');
	}
}