<?php

class ShowController extends Controller {

	public function Home()
	{


        $queries = DB::select(DB::raw("select *, SUM(rate) as total FROM apps a, user_app_rates r WHERE r.app_id = a.id GROUP BY a.app_name ORDER BY total DESC"));


        $all_rate =  DB::table('user_app_rates')->whereNotNull('rate')->count();
        
                $user = User::all()->count();
                    $data = array(
                        'kullanılan_oy'=>$all_rate,
                        'user' => $user,
                        );

          return View::make('hello')->with('results',$queries)->with($data);
	}


}
