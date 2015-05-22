<?php

class UserController extends BaseController {

	public function PostRegister()
	{
		if(Input::get('user_auth_id') != null && Input::get('name') != null && Input::get('surname') != null)
		{
			$name = Input::get('name');
			$surname = Input::get('surname');
			$user_auth_id =Input::get('user_auth_id');

			$my_user = User::where('user_auth_id','=',$user_auth_id)->get();


			if($my_user->count())
			{
				return Response::json(array(
									'status' => 1,
									'error' => false,
									'code' => 200,
									'user' => $my_user,
									'message' => 'Giriş Başarılı!')
								);	
			}

			if(Input::get('email') != null)
			{
				$email = Input::get('email');
			}
			else
			{
				$email = "";
			}

			$user = new User;
			$user->user_auth_id = $user_auth_id;
			$user->name = $name;
			$user->surname = $surname;
			$user->email = $email;
			$user->token = str_random(60);;
			$user->created_at = date('Y-m-d H:i:s');
			$user->updated_at = date('Y-m-d H:i:s');

			$user->save();

			//Bütün uygulamalar için eşleşme ekleme
			$all_app = MyApp::all();

				 foreach ($all_app as $app ) {
				  		
				  		DB::table('user_app_rates')->insert(
								    array('user_id' => $user->id,
								     'app_id' => $app->id
								     )
								);
				 }

			$my_user = User::where('user_auth_id','=',$user_auth_id)->get();
			
			return Response::json(array(
					'status' => 1,
					'error' => false,
					'code' => 200,
					'user' => $my_user,
					'message' => 'Başarılı bir şekilde kayıt oldunuz!')
				);
		}else
		{

			return Response::json(array(
								'status' => 0,
								'error' => true,
								'code' => 404,
								'message' => 'Hata olustu!')
							);

		}

	}

	public function getUnrated($user_auth_id)
	{
		
		$user_id = User::where('user_auth_id','=',$user_auth_id)->pluck('id');

		if(count($user_id))
		{
			$Not_rated_apps = DB::table('user_app_rates')
		            ->join('apps', 'user_app_rates.app_id', '=', 'apps.id')
		            ->where('user_id','=',$user_id)->whereNull('rate')->get();	
			if(count($Not_rated_apps))
			{
				return Response::json(array(
									'status' => 1,
									'error' => false,
									'code' => 200,
									'apps' => $Not_rated_apps,
									'message' => 'Oylanmamıs uygulamalar')
								);	
			}else
			{
				return Response::json(array(
									'status' => 2,
									'error' => false,
									'code' => 200,
									'message' => 'Oylanmamıs uygulama kalmamıstır')
								);					
			}
		}
			return Response::json(array(
								'status' => 0,
								'error' => true,
								'code' => 404,
								'message' => 'Kullanıcı bulunamadı.')
							);	

	}


	public function rateMyApp($user_auth_id,$app_id)
	{

		$user_id = User::where('user_auth_id','=',$user_auth_id)->pluck('id');

		if(count($user_id) && Input::get('rate') != null)
		{
			$rate_for_app = Input::get('rate');
			UserAppRate::where('user_id','=',$user_id)->where('app_id','=',$app_id)->update(array('rate' => $rate_for_app));
				return Response::json(array(
						'status' => 1,
						'error' => false,
						'code' => 200,
						'message' => 'Oyunuz alınmıştır teşekkürler.')
					);
		}else
		{
				return Response::json(array(
						'status' => 0,
						'error' => true,
						'code' => 404,
						'message' => 'Bir hata oluştu.')
					);
		}

	}

	public function getInfo($user_auth_id)
	{

		$user_id = User::where('user_auth_id','=',$user_auth_id)->pluck('id');

		if(count($user_id))
		{

			$user_info =DB::table('user_app_rates')
	            ->join('apps', 'user_app_rates.app_id', '=', 'apps.id')
	            ->where('user_id','=',$user_id)->get();

				return Response::json(array(
						'status' => 1,
						'error' => false,
						'code' => 200,
						'user_info' =>$user_info,
						'message' => 'Kişi ve uygulama arasındaki ilişkiler')
					);
		}
				return Response::json(array(
						'status' => 0,
						'error' => false,
						'code' => 404,
						'message' => 'Bir hata oluştu')
					);
	}
}

