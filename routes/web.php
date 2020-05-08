<?php

use App\Postcard;
use App\PostcardSendingService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\LazyCollection;

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

Route::get('post',  'PostController@index');
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

Route::get('/macros', function () {
    //return Str::prefix(111111, 'ABCD -');
    return Str::partNumber(111111);
    return Response::errorJson('A huge error message occured: BOO');
});

//Route::resource('/customers',  'CustomersController');
Route::get('/customers/',  'CustomersController@index');
Route::get('/customers/{customerId}',  'CustomersController@show');
Route::get('/customers/{customerId}/update',  'CustomersController@update');
Route::get('/customers/{customerId}/delete',  'CustomersController@destroy');

Route::get('lazy', function () {
    // $collection = Collection::times(10000000)->map(function ($number) {
    //     return pow(2, $number);
    // })->all();
    // return 'done';
    $collection = LazyCollection::times(10000000)->map(function ($number) {
        return pow(2, $number);
    })->all();
    return 'done';
});
