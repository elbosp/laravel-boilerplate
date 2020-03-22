<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return Auth::check() ? redirect('home') : view('welcome');
});

Route::middleware(['auth'])->group(function ()
{
    Route::get('/home', function () {
        if(Gate::allows('admin')) {
            return redirect('admin');
        } else if(Gate::allows('staff')) {
            return redirect('staff');
        } else if(Gate::allows('kurir')) {
            return redirect('kurir');
        }
    });

    Route::middleware(['role:1'])->group(function ()
    {
        Route::get('/admin', 'HomeController@admin');
    });
    Route::middleware(['role:2'])->group(function ()
    {
        Route::get('/staff', 'HomeController@staff');
    });
    Route::middleware(['role:3'])->group(function ()
    {
        Route::get('/kurir', 'HomeController@kurir');
    });

    Route::group(['prefix' => 'kelola'], function ()
    {
        Route::get('/', function () {
            return redirect('kelola/obat');
        });
        Route::middleware(['role:1'])->group(function ()
        {
            Route::resource('pegawai', 'UserController');
        });
        Route::middleware(['role:1,2'])->group(function ()
        {
            Route::resource('obat', 'ObatController');
        });
    });
});
