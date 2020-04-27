<?php


$this-> group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route:: get('balance', 'BalanceController@index')->name('balance');
});


Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();



//$this->get('admin', 'Admin\AdminController@index')->name('admin.home');



