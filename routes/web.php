<?php

use App\Http\Middleware\Authenticated;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->namespace('\App\Http\Controllers\Web\Auth')->group(function () {
    //login routes
    Route::get('/login', 'LoginController@login')->name('login');
    Route::post('/login', 'LoginController@authenticate');
    Route::get('/logout', 'LoginController@logout');

    //register routes
    Route::get('/register', 'RegisterController@register');
    Route::post('/register', 'RegisterController@store');
    
    //password reset routes
    Route::get('/reset-password', 'ResetPasswordController@resetPassword');
    Route::post('/reset-password', 'ResetPasswordController@reset');
    Route::get('/reset-password/{token}', 'ResetPasswordController@showResetForm');

    //email verification routes
    Route::get('/verify-email', 'VerificationController@verifyEmail');
    Route::get('/verify-email/{id}/{hash}', 'VerificationController@verify');
});

//admin routes. Only authenticated users can access these routes
Route::middleware(Authenticated::class)->prefix('admin')->namespace('\App\Http\Controllers\Web\Admin')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::prefix('settings')->group(function(){
        Route::get('/', 'SettingsController@index');
        Route::post('/change_password', 'SettingsController@change_password');
    });
    Route::prefix('profile')->group(function(){
        Route::get('/', 'ProfileController@index');
        Route::post('/update', 'ProfileController@update');
    });

});

//demo routes
Route::get('/', function () {
    if(auth()->check()){
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('login');
});
Route::get('/forms', function () {
    return view('forms');
});
Route::get('/ui', function () {
    return view('ui');
});