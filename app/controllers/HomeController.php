<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function home()
	{
		$a=Hash::make(25);
		$b=Hash::make(25);
		$c=Hash::make(25);
		$d=Hash::make(25);
		$e=Hash::make(25);
		$f=Hash::make(25);		
		$array = array('a' =>Crypt::encrypt(25),
			'b' =>Crypt::encrypt(25),
			'c' =>Crypt::encrypt(25),
			'd' =>Crypt::encrypt(25),
			'e' =>Crypt::encrypt(25),
			'f' =>Crypt::encrypt(25),
			'g' =>Crypt::encrypt(25),
			't' =>Crypt::encrypt(25));
			$all =	user::all();	
		foreach ($all as $key ) {
			$id = $key->name;
			$encript_id = Crypt::encrypt($id);
			echo "<br>";
					echo $encript_id;
				}	
		//	$all =	user::all();
		/*	foreach ($all as $one) {
				echo $one->token = 1;
			}*/
		//	$a=Crypt::encrypt(25);
			//echo $a;
			//echo "<br>";
			//echo Crypt::decrypt("eyJpdiI6IlBKekQwTUFpekZUSmxOVVc4TVRNVHc9PSIsInZhbHVlIjoidGU4TTJGUmo0MCs3U2swcWtoWVNGUT09IiwibWFjIjoiNjhhZTFlYjJlZjM5MmFhMGFmYmVmNmRiZmNlYzZjMzYzZDQzMjEyNDUyNTNkOWY0ODBiMmY5YjVmYmU3NzQ3ZCJ9");
		//return View::make('first')->with('a',$c);
	}

		
	public function test()
	{

		return 'test';
	}
}