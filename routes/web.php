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
/* Nav Routes */

Route::get('/','FrontendController@index')->name('index');
Route::get('/contact','FrontendController@contact')->name('contact');
Route::get('/login','FrontendController@showLogin')->name('loginForm');
Route::get('/register','FrontendController@showRegister')->name('registerForm');
Route::get('/posts/{id}','FrontendController@single')->name('single');

/* Log,Reg,Logout Routes */

Route::post('/do-login','LogController@login')->name('login');
Route::post('/do-register','LogController@register')->name('register');
Route::get('/logout','LogController@logout')->name('logout');


/* Post,Del,Edit| Comments Routes */
Route::post("/comments/{postId}", "CommentsController@postComment")->name("postComment");
Route::post("/comments/{commentId}/edit", "CommentsController@editComment")->name("editComment");
Route::get("/comments/{commentId}/delete", "CommentsController@deleteComment")->name("deleteComment");
Route::get("/comments/{commentId}/show", "CommentsController@show")->name("showComment");

/* Admin Routes */

Route::group(['middleware' => 'admin'], function(){

    Route::get("/admin/users/{id?}", "Admin\UserController@index")->name("users.index");
    Route::get("/admin/users/{id}/delete", "Admin\UserController@delete")->name("users.delete");
    Route::post("/admin/users", "Admin\UserController@store")->name("users.store");
    Route::post("/admin/users/{id}/update", "Admin\UserController@update")->name("users.update");

});