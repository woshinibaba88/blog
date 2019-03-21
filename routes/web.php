<?php

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

/*
 * @微商城首页
 * */
Route::prefix('index')->group(function () {
    Route::any("indexshop","Index\IndexController@IndexShop");
    Route::any("shopcontent/{id}","Index\IndexController@IndexContent");
});

Route::any("index/indexshopcar","Index\IndexController@IndexShopCar")->middleware("session");
Route::any("index/indexuser","Index\IndexController@IndexUser");
Route::any("index/indexshop/{id}","Index\IndexController@IndexShopId");
Route::any("index","Index\IndexController@Index");
Route::post("index/indexshopajax","Index\IndexController@IndexShopAjax");
Route::post("index/isnew","Index\IndexController@IsNew");
Route::post("index/price","Index\IndexController@Price");
Route::post("index/addcar","Index\IndexController@AddCar");
Route::post("index/deadd","Index\IndexController@DeAdd");
Route::any("address/address","Index\AddressController@Address");
Route::post("index/del","Index\IndexController@Del");

Route::prefix('user')->group(function () {
    Route::any("user","Index\UserController@User");
    Route::any("login","Index\UserController@Login");
    Route::any("register","Index\UserController@Register");
    Route::any("findpwd","Index\UserController@Findpwd");
    Route::any("resetpassword","Index\UserController@Resetpassword");

});
Route::any("user/logindo","Index\UserController@LoginDo");
/*
 * @验证码
 * */
Route::any("user/code","Index\UserController@code");
/*
 * @短信验证码
 * */
Route::any("user/phone","Index\UserController@phone");



Route::any("user/registerdo","Index\UserController@RegisterDo");