@extends('app')

@section('content')

    <style>
        .thumbnail {
            padding:0px;
        }
        .panel {
            position:relative;
        }
        .panel>.panel-heading:after,.panel>.panel-heading:before{
            position:absolute;
            top:11px;left:-16px;
            right:100%;
            width:0;
            height:0;
            display:block;
            content:" ";
            border-color:transparent;
            border-style:solid solid outset;
            pointer-events:none;
        }
        .panel>.panel-heading:after{
            border-width:7px;
            border-right-color:#f7f7f7;
            margin-top:1px;
            margin-left:2px;
        }
        .panel>.panel-heading:before{
            border-right-color:#ddd;
            border-width:8px;
        }
        u{
            color: #999999;
        }
    </style>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                @foreach($posts as $post)

                    <div class="post-preview">
                        <a href="#post.html">
                            <h2 class="post-title">
                                {{$post->title}}
                            </h2>
                            <h3 class="post-subtitle">
                                {{ $post->content  }}
                            </h3>
                        </a>
                        <p class="post-meta">Postado por <a href="#">Admministrador</a> em {{ $post->created_at }} </p>
                    </div>

                        <h4><u>Comentários</u></h4>
                        @foreach($post->comments as $comment)


                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="thumbnail">
                                        <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                    </div><!-- /thumbnail -->
                                </div><!-- /col-sm-1 -->

                                <div class="col-sm-5">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <strong>{{ $comment->name  }}</strong> <span class="text-muted"> {{ $comment->created_at->format('m/d/Y') }} </span>
                                        </div>
                                        <div class="panel-body">
                                            {{ $comment->comment  }}
                                        </div><!-- /panel-body -->
                                    </div><!-- /panel panel-default -->
                                </div><!-- /col-sm-5 -->
                            </div><!-- /row -->
                        @endforeach
                    <hr>



                    @endforeach

                            <!-- Pager -->
                    <ul class="pager">
                        <li class="next">
                            <a href="#">Posts Anteriores &rarr;</a>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
@endsection