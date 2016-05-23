@extends('admin')

@section('content')
    <div class="row-fluid">
        @if($errors->any())
            <ul class="alert alert-error span12">
                @foreach($errors->all() as $error)
                    <li style="list-style: none;">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="row-fluid">



        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Cadastrar Posts</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    {!! Form::open(['route'=>'admin.posts.store','method'=>'post', 'class'=>'form-horizontal']) !!}

                        @include('admin.posts._form')

                        <div class="form-group">
                            {!! Form::label('tags','Tags', ['style'=>'text-align:left; margin-right:10px;','class'=>'control-label']) !!}
                            {!! Form::textarea('tags', null, ['class'=> 'form-control span12']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Publicar', ['style'=>'margin-top: 16px;','class'=>'btn btn-primary span4']) !!}
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>


@endsection