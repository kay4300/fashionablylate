<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

use App\Models\Category;

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
Route::get('/confirm', [ContactController::class, 'showConfirm'])->name('confirm');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm.post');
// 送信・修正ボタン用
Route::get('/confirm/send', [ContactController::class, 'send'])->name('confirm.send');
Route::post('/confirm/send', [ContactController::class, 'send'])->name('confirm.send');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');

// ログイン画面表示
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.index');
// ログイン処理
Route::post('/login', [LoginController::class, 'login'])->name('login');


// register画面表示
Route::get('/register', [RegisterController::class, 'showRegisterForm'])
    ->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


// Route::get('/admin', [AdminController::class, 'index'])->name('admin');←不要
Route::get('/admin', [AdminController::class, 'search'])->name('admin');
Route::post('/admin/delete', [AdminController::class, 'destroy'])->name('admin.delete');

// モーダルウィンドウ
Route::get('/admin/detail/{id}', [AdminController::class, 'detail'])->name('admin.detail');

// ログイン後の管理者画面
// Route::get('/admin', function () {
//     $categories = Category::all();
//     return view('admin');
// })->name('admin', compact('categories'));
