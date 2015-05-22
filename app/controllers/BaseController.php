<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
<?php
/*
class ShowController extends Controller {

	public function Home()
	{
		$rates = DB::table('apps')
            ->join('user_app_rates', 'user_app_rates.app_id', '=', 'apps.id')
            ->get();	



       $apps = MyApp::all();
		$data =[];

		$total_oy = 0;

        foreach ($apps as $app) {

        	$oy = 0;

        	foreach ($rates as $rate) 
        	{
        		if($app->app_name == $rate->app_name)
        		{
        			$oy += $rate->rate;
	 		        if($rate->rate === 0)
			        {
			        	$total_oy ++;
			        }elseif($rate->rate == 1)
			        {
			        	$total_oy ++;
			        }  
        		}



        	}
			$results[] = ['name' => $app->app_name,'oy' => $oy];
        }

        $user = User::all()->count();
        	$data = array(
        		'kullanılan_oy'=>$total_oy,
                'user' => $user,
        		);


        function sortByWeight($a, $b)
        {
            $a = $a['oy'];
            $b = $b['oy'];

            if ($a == $b)
            {
                return 0;
            }

            return ($a > $b) ? -1 : 1;
        }
        usort($results, 'sortByWeight');
        
       // $newArray = array_slice($results, 0, 2, true);
          return View::make('hello')->with('results',$results)->with($data);
	}


}

}*/
