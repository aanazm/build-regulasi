<?php

use App\Http\Controllers\RoleController;
use App\Models\ProgKerja;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('auth.login');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth']], function () {
    
    //menu-settings
    Route::resource('user', 'UserController');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile', 'UserController@postProfile')->name('user.postProfile');
    Route::get('/profile-change-password', 'UserController@getPassword')->name('userGetPassword');
    Route::post('/profile-change-password', 'UserController@postPassword')->name('userPostPassword');
    Route::resource('permission-setting','PermissionController');
    Route::resource('role-setting','RoleController');

    //Route::resource('settings-positions', PositionSettingController::class);
    Route::resource('settings-units', UnitSettingController::class);
    Route::resource('settings-regs', RegController::class);
    Route::resource('pedoman-pelayanan', PedPelayananController::class);
    Route::resource('program-kerja', ProgKerjaController::class);

    
    Route::resource('keputusan-direktur', KepDirController::class);
    
    
    
    //buff
    Route::resource('pegawai-sdm', K_SdmController::class);
});


Auth::routes();
