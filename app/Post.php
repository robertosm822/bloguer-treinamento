<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //PERMITIDNO O USO DO MassAssigment QUE FAZ A GRAVACAO EM LINHA DE COMANDO DE DADOS
    //NA TABELA EM MASSA
    protected $fillable = [
        'title',
        'content'
    ];

    //declarando que o post tem muitos comentarios
    public function comments(){

        return $this->hasMany('App\Comment');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'posts_tags');
    }
}
