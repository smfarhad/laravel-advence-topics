<?php

use App\Postcard;
use App\PostcardSendingService;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('pay',  'PayOrderController@store');
Route::get('channels',  'ChannelController@index');
Route::get('posts/create',  'postController@create');

Route::get('/postcards', function () {
    $postcardService = new PostcardSendingService('us', 4, 6);
    $postcardService->hello("Hello from Coder's Tape USA!", 'farhad1556@gmail.com');
});

Route::get('/facades', function () {
    Postcard::hello('Hello from Facade', 'test@test.com');
});
