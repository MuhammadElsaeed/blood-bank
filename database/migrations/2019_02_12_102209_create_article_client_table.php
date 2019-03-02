<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleClientTable extends Migration {

	public function up()
	{
		Schema::create('article_client', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('article_id')->unsigned()->index();
			$table->integer('client_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('article_client');
	}
}