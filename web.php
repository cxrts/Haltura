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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', function(Request $req) {
    header("Access-Control-Allow-Origin: *");

    $user = App\User::create([
        "name"=>$req->login_signup,
        "number"=>$req->number_signup,
        "password"=>$req->password_signup,
        "status"=>$req->status
    ]);
    return $user;
});

Route::get('/signin', function(Request $req) {
    header("Access-Control-Allow-Origin: *");
    return App\User::where("name", $req->login_signin)->where("password", $req->password_signin)->get();
});

Route::get('/userPage', function(Request $req){
    header("Access-Control-Allow-Origin: *");
    return App\User::where("id", $req->user_id)->get();
});

Route::get('/addAdvert', function(Request $req){
    header("Access-Control-Allow-Origin: *");
    
    $advert = App\Advert::create([
       "time"=>$req->timm,
       "description"=>$req->description,
       "number"=>$req->number,
        "status"=>0,
        "user_id"=>$req->user_id,
        "respond_id"=>0
        
    ]);
    return $advert;
});

Route::get('/getAll', function(){
    header("Access-Control-Allow-Origin: *");
    
    return $db = App\Advert::where("status", 0)->get();
});

Route::get('/getAdCreater',function(Request $req){
    header("Access-Control-Allow-Origin: *");
    
    return App\User::where("id", $req->user_id)->get();
});