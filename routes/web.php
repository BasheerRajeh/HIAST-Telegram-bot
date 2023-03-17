<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TelegramController;
use \Telegram\Bot\Laravel\Facades\Telegram;

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

Route::middleware(['auth'])->prefix('admin')->namespace('Backend')->name('admin.')->group(function () {
    Route::get('/commands', [DashboardController::class, 'index'])->name('index');
    Route::get('/commands/{id}', [DashboardController::class, 'show'])->name('commands.show');
    Route::delete('/commands/delete/{id}', [DashboardController::class, 'destroy'])->name('commands.delete');
    Route::post('/commands/store', [DashboardController::class, 'store'])->name('commands.store');
    Route::post('/commands/update/{id}', [DashboardController::class, 'update'])->name('commands.update');

    Route::get('/sendMessage', [TelegramController::class, 'sendMessage'])->name('sendMessage');
    Route::post('/sendMessage/storeMessage', [TelegramController::class, 'storeMessage'])->name('storeMessage');
    Route::post('/sendMessage/storePhoto', [TelegramController::class, 'storePhoto'])->name('storePhoto');


    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/setting/store', [SettingController::class, 'store'])->name('setting.store');
    Route::post('setting/setwebhook', [SettingController::class, 'setwebhook'])->name('setting.setwebhook');
    Route::post('setting/getwebhookinfo', [SettingController::class, 'getwebhookinfo'])->name('setting.getwebhookinfo');
});


Route::post(Telegram::getAccessToken(), function () {
    app('App\Http\Controllers\Backend\TelegramController')->webhook();
});

Auth::routes();

Route::match(['post', 'get'], 'register', function () {
    Auth::logout();
    return redirect('/');
})->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
