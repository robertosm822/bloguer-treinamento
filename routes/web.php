<?php

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

Route::get('/', 'App\Http\Controllers\PostController@index');

/*
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
*/
Route::controllers([
    'auth' => 'App\Http\Controllers\Auth\AuthController',
    'password' => 'App\Http\Controllers\Auth\PasswordController',
]);

Route::get('/auth/logout', function(){
    Auth::logout();
});

/* TESTAR ESTA ADAPTACAO DE GAVAGACAO DE COMMENTARIOS  */
Route::get('/post/{id}/comment', function (Request $request, $id) {
    $post = Post::find($id);
    $post->comments->create($request->all());
});


Route::group(['prefix'=> 'admin', 'middleware'=>'auth'], function(){
    Route::group(['prefix'=>'posts'], function(){
        Route::get('', ['as' => 'admin.posts.index', 'uses'=>'App\Http\Controllers\PostsAdminController@index']);
        Route::get('create', ['as' => 'admin.posts.create', 'uses'=>'App\Http\Controllers\PostsAdminController@create']);

        //LISTANDO OS POSTS
        Route::post('store', ['as' => 'admin.posts.store', 'uses'=>'App\Http\Controllers\PostsAdminController@store']);

        //EDITANDO OS POSTS
        Route::get('edit/{id}', ['as' => 'admin.posts.edit', 'uses'=>'App\Http\Controllers\PostsAdminController@edit']);

        Route::put('update/{id}', ['as' => 'admin.posts.update', 'uses'=>'App\Http\Controllers\PostsAdminController@update']);

        Route::get('destroy/{id}', ['as' => 'admin.posts.destroy', 'uses'=>'App\Http\Controllers\PostsAdminController@destroy']);
    });
});
