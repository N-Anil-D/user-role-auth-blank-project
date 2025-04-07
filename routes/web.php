<?php

use App\Models\RouteList;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserAuthorityControl;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    UserAuthorityControl::class
])->group(function () {
    Route::get('/'                                              , function () { return view('dashboard'); })                                        ->name('home');
    Route::get('/dashboard'                                     , function () { return redirect(route('home')); })                                  ->name('dashboard');
    Route::get('/management/manage-users'                       , function () { return view('management.user-management'); })                       ->name('user.management');
    Route::get('/management/route-management'                   , function () { return view('management.route-management'); })                      ->name('route.management');
    Route::get('/management/role-management'                    , function () { return view('management.role-management'); })                       ->name('role.management');

});
