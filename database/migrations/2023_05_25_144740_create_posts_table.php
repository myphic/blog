<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function (Blueprint $table)
		{
			$table->id();
			$table->unsignedBigInteger('post_id');
			$table->bigInteger('user_id')->unsigned()->nullable();
			$table->unsignedBigInteger('published_by')->nullable();
			$table->unsignedBigInteger('category_id')->nullable();
			$table->string('title', 100);
			$table->string('image', 100)->nullable();
			$table->string('thumb', 100)->nullable();
			$table->text('body');
			$table->timestamps();
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->nullOnDelete();
			$table->foreign('published_by')
				->references('id')
				->on('users')
				->nullOnDelete();
			$table->foreign('category_id')
				->references('id')
				->on('categories')
				->nullOnDelete();
		});
		Schema::table('comments', function (Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');;
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('posts');
	}
};
