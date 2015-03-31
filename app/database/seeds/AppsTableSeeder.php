<?php

class AppsTableSeeder extends Seeder {

    public function run()
    {
        $apps = new App;
        //DB::table('apps')->delete();

        $apps->name = 'name1';
        $apps->url = 'url1';
        $apps->created_by = 'created_by1';
        $apps->save();

  /*      $apps->name = 'name2';
        $apps->url = 'url2';
        $apps->created_by = 'created_by2';
        $apps->save();

        $apps->name = 'name3';
        $apps->url = 'url3';
        $apps->created_by = 'created_by3';
        $apps->save();

        $apps->name = 'name4';
        $apps->url = 'url4';
        $apps->created_by = 'created_by4';
        $apps->save();                

*/
       	        	        
    }

}
