<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'App\Http\Middleware\DirekturMiddleware'], function (){
    Route::get('direktur', 'HomeController@direktur')->name('direktur');

    Route::group(['prefix' => 'direktur', 'as' => 'direktur.'], function(){
        Route::get('profil/{id}', 'HomeController@profilDirektur')->name('profil');

        Route::resource('users', 'DirekturUsersController');
            
        Route::resource('cabang', 'DirekturCabangController');
        Route::get('cabang/status/{id}', 'DirekturCabangController@status')->name('cabang.status');


        Route::get('/api/datatable/users', 'DirekturUsersController@dataTable')->name('api.datatable.users');
        Route::get('/api/datatable/cabang', 'DirekturCabangController@dataTable')->name('api.datatable.cabang');

    });
});

Route::group(['middleware' => 'App\Http\Middleware\CabangMiddleware'], function (){
    Route::get('cabang', 'HomeController@cabang')->name('cabang');
});

