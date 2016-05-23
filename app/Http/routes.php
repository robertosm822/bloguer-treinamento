<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', 'PostController@index');

Route::get('/auth', function(){
    /*  Forcar um usuario a autenticar pelo ID
   $user = \App\User::find(1);
   Auth::login($user);

   if(Auth::check()){
       return "Autenticado!";
   }
   */
    if(Auth::attempt(['email'=>'robertomelo822@gmail.com', 'password'=>'23456']) ){
        return "Autenticado!";
    }
    return "Falha ao fazer a autenticação";
});

/*
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
*/
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
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
        Route::get('', ['as' => 'admin.posts.index', 'uses'=>'PostsAdminController@index']);
        Route::get('create', ['as' => 'admin.posts.create', 'uses'=>'PostsAdminController@create']);

        //LISTANDO OS POSTS
        Route::post('store', ['as' => 'admin.posts.store', 'uses'=>'PostsAdminController@store']);

        //EDITANDO OS POSTS
        Route::get('edit/{id}', ['as' => 'admin.posts.edit', 'uses'=>'PostsAdminController@edit']);

        Route::put('update/{id}', ['as' => 'admin.posts.update', 'uses'=>'PostsAdminController@update']);

        Route::get('destroy/{id}', ['as' => 'admin.posts.destroy', 'uses'=>'PostsAdminController@destroy']);
    });
});

