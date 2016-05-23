<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsAdminController extends Controller
{
    protected $post;
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

    public function store(PostRequest $request){
        /* depurando os dados enviados
        dd($request->all()); */

        $post = $this->post->create($request->all());
        //apos isso sincroniza os dados relacionados
        $post->tags()->sync($this->getTagsIds($request->tags));

        //redirecionar
        return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        return view('admin.posts.edit', compact('post'));
    }
    public function update($id, PostRequest $request){
        $this->post->find($id)->update($request->all());
        $post = $this->post->find($id);
        //apos isso sincroniza os dados relacionados
        $post->tags()->sync($this->getTagsIds($request->tags));

        return redirect()->route('admin.posts.index');
    }
     public function destroy($id){
         $this->post->find($id)->delete();

         return redirect()->route('admin.posts.index');
     }

    private function getTagsIds($tags){
        $tagList = array_map('trim', explode(',', $tags));
        //filtrar os campos em brancos, eliminando-os
        $tagList = array_filter($tagList);
        //varrer se ja existe esta mesma tag
        $tags_ids = [];
        foreach ($tagList as $tagName){
            $tagIDs[] = Tag::firstOrCreate(['name'=> $tagName])->id;
        }

        return $tagIDs;
    }

}
