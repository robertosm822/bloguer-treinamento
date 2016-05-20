<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsAdminController extends Controller
{
    private $post;
    //
    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    public function index(){
        $posts = $this->post->paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(Requests\PostRequest $request){
        /* depurando os dados enviados
        dd($request->all()); */
        $this->post->create($request->all());

        //redirecionar
        return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        return view('admin.posts.edit', compact('post'));
    }
    public function update($id, PostRequest $request){
        $me = Post::find($id);  //DANDO ERRO ESSE DRAMA  REVISAR AULA "Alterando dados com Model Binding"
        $me->update($request->all());

        return redirect()->route('admin.posts.index');
    }

}
