<?php


$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    $this->get('deposit', 'BalanceController@deposit')->name('balance.deposit');
    $this->post('store', 'BalanceController@store')->name('deposit.store');
    $this->get('winthdrawn', 'BalanceController@withdrawn')->name('balance.withdrawn');
    $this->post('winthdrawn', 'BalanceController@withdrawnStore')->name('withdrawn.store');
    $this->get('transfer', 'BalanceController@transfer')->name('balance.transfer');
    $this->post('transfer', 'BalanceController@transferStore')->name('transfer.store');
    $this->post('transfer-confirm', 'BalanceController@transferSend')->name('transfer.send');
    $this->get('/', 'AdminController@index')->name('admin.home');
    $this->get('balance', 'BalanceController@index')->name('balance');
  

    $this->get('historic','BalanceController@historic')->name('admin.historic');
    $this->any('historic-search','BalanceController@searchHistoric')->name('historic.search');

    $this->get('profile','UserController@profile')->name('admin.profile');
});


Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();



//$this->get('admin', 'Admin\AdminController@index')->name('admin.home');
