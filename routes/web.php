<?php

// ルーティングの確認は$ php artisan route:list


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TweetController;//ここを追加１０.３


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

// ↓追加 10.4Route::getなら出てくるが。resourceって何？
Route::resource('tweet', TweetController::class);//Route::resourceの意味は？


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
