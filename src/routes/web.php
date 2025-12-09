<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [ContactController::class, 'index'])->name('index');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
// 送信・修正ボタン用
// Route::get('/send', [ContactController::class, 'send'])->name('confirm.send');
Route::post('/confirm/send', [ContactController::class, 'send'])->name('confirm.send');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


// ログイン画面表示
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.index');
// ログイン処理
Route::post('/login', [LoginController::class, 'login']);
// register画面表示
Route::get('/register', function () {
    return view('register');
})->name('register');

// ログイン後の管理者画面
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

