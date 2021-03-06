<?php

Route::get('about','PagesController@about');
Route::get('contact','PagesController@contact');

Route::resource('articles','ArticlesController');

//Route::controllers([
//    'auth' =>'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::get('foo',['middleware'=>'manager',function(){

    return 'this page can only be viewed by managers';

}]);