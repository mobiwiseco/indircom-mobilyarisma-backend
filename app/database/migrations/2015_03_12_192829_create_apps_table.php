<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apps', function($table)
		{
			$table->increments('id');
			$table->string('app_name', 100);
			$table->text('app_description');
			$table->text('app_image_url');
			$table->text('app_download_url')->nullable();
			$table->text('app_ios_download_url')->nullable();	
		});		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('apps');
	}

}
