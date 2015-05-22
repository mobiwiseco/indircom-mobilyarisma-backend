<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			//$table->integer('user_auth_id')->unique();
			$table->bigInteger('user_auth_id');
			$table->string('name', 100);
			$table->string('surname', 100);
			$table->string('email',60);
			$table->string('token',60);
			$table->date('created_at');
			$table->date('updated_at');			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
