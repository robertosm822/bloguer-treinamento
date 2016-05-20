
<div class="control-group">

    {!! Form::label('title', 'Título', ['style'=>'text-align:left; margin-right:10px;','class'=>'control-label']) !!}
    {!! Form::text('title',null, ['class'=>'form-control span12', 'required']) !!}

</div>

<div class="form-group">
    {!! Form::label('content', 'Conteúdo', ['style'=>'text-align:left; margin-right:10px;','class'=>'control-label']) !!}
    {!! Form::textarea('content',null, ['class'=>'form-control span12']) !!}
</div>
