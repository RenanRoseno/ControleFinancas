<?php


$this-> group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    $this->get('deposit','BalanceController@deposit')->name('balance.deposit');
    $this->post('store','BalanceController@store')->name('deposit.store');
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route:: get('balance', 'BalanceController@index')->name('balance');
});


Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();



//$this->get('admin', 'Admin\AdminController@index')->name('admin.home');



