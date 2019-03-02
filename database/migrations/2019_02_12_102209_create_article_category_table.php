<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleCategoryTable extends Migration {

	public function up()
	{
		Schema::create('article_category', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('article_id')->unsigned()->index();
			$table->integer('category_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('article_category');
	}
}