<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('AppsTableSeeder');

        $this->command->info('AppsTableSeeder table seeded!');
		// $this->call('UserTableSeeder');
	}

}
