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
    Route::any("indexshop","Index\IndexController@indexShop");
    Route::any("shopcontent/{id}","Index\IndexController@indexContent");
});

Route::any("index/indexshopcar","Index\IndexController@indexShopCar")->middleware("session");
Route::any("index/indexuser","Index\IndexController@indexUser");
Route::any("index/indexshop/{id}","Index\IndexController@indexShopId");
Route::any("index","Index\IndexController@index");
Route::post("index/indexshopajax","Index\IndexController@indexShopAjax");
Route::post("index/isnew","Index\IndexController@isNew");
Route::post("index/price","Index\IndexController@price");
Route::post("index/addcar","Index\IndexController@addCar");
Route::post("index/deadd","Index\IndexController@deAdd");
Route::any("address/address","Index\AddressController@address");
Route::post("index/del","Index\IndexController@del");
Route::post("index/paydel","Index\IndexController@paydel");
Route::prefix('user')->group(function () {
    Route::any("user","Index\UserController@user");
    Route::any("login","Index\UserController@login");
    Route::any("register","Index\UserController@register");
    Route::any("findpwd","Index\UserController@findpwd");
    Route::any("resetpassword","Index\UserController@resetpassword");

});
Route::any("user/logindo","Index\UserController@loginDo");
/*
 * @验证码
 * */
Route::any("user/code","Index\UserController@code");
/*
 * @短信验证码
 * */
Route::any("user/phone","Index\UserController@phone");



Route::any("user/registerdo","Index\UserController@registerDo");




Route::any("address/payment","Index\AddressController@payment");
Route::any("address/witeaddr","Index\AddressController@witeaddr");