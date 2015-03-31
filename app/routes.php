<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Kullanıcının register ve logini için gönderilern api key kontrolu
Route::group(array('prefix' => 'api/v1', 'before' => 'user.login'), function()
{
    /*PostRegister kullanıcıyı uygulamaya kayıt  almak için ve olası eşleşmeleri oluşturmak için oluşturuldu.
     *Zaten kayıtlı kullanıcılar için login bilgilerini görderiyor.
     * */
	Route::post('/register', array('as' => 'register' , 'uses' => 'UserController@PostRegister'));

});

//Kullanıcının tokeni doğrumu değilmi kontrolu
Route::group(array('prefix' => 'api/v1', 'before' => 'user.control'), function()
{
	//kullanıcı id ve rate ini post la alıp database e yazdırma
	Route::post('/{user_auth_id}/rate/{app_id}', array('as' => 'rate' , 'uses' => 'UserController@rateMyApp'));

	//kullanıcı tarafından oylanmamıs uygulamarı getiricek
	Route::post('/{user_auth_id}/unrated',array('as'=>'unrated','uses' => 'UserController@getUnrated'));

	//kullanıcının oyladıkları ve oylamadıkları hakkınta total bilgi!
	Route::post('/{user_auth_id}/getInfo',array('as'=>'info','uses' => 'UserController@getInfo'));

});