<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DogController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

//　ホーム画面
Route::get('/', [AuthController::class,'home'])->name('home');

// お試し計算画面
Route::get('/experience', [AuthController::class,'experience'])->name('experience');

// お試し計算結果画面
Route::post('/e_result', [AuthController::class,'result'])->name('e_result');

// ログイン機能
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

// メイン画面
Route::get('/main', [DogController::class,'main'])->name('main');

// 愛犬アカウント画面
Route::post('/dog_account', [DogController::class,'show_dog_account'])->name('show_dog_account');

// 愛犬登録
Route::get('/dog_register', [DogController::class,'show_dog_register'])->name('show_dog_register');
Route::post('/main', 'DogController@dog_register')->name('dog_register');

// 愛犬用食事量計算
Route::group(['prefix' => 'calculation'], function(){
Route::post('/calculation', [DogController::class,'show_calculation'])->name('show_calculation');
Route::post('/dog_result', [DogController::class,'calculation'])->name('calculation');
});

// 愛犬アルバム画面
Route::post('/dog_album', [DogController::class,'show_dog_album'])->name('show_dog_album');

// aryTwitter
Route::post('/twitter', [DogController::class,'twitter'])->name('twitter');

// 削除機能
Route::post('/dog_delete', [DogController::class,'dog_delete'])->name('dog_delete');

// 編集機能
Route::group(['prefix' => 'edit'], function(){
Route::post('/edit', [DogController::class,'show_edit'])->name('show_edit');
Route::post('/dog_account', [DogController::class,'update'])->name('update');
});

});

// 管理者ログイン
Route::get('/admin_login', [AuthController::class,'admin_login'])->name('admin_login');
Route::post('/admin', [AuthController::class,'admin'])->name('admin');
Route::post('/delete', [AuthController::class,'delete'])->name('delete');

Route::middleware(['admin'])->group(function(){

});
