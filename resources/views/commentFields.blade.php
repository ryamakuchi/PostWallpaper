<div class="form-group">
    {!! Form::label('contributor', '投稿者:', ['class' => 'col-md-8 offset-2 control-label']) !!}
    <div class="col-md-8 offset-2">
        {!! Form::text('contributor', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('body', '内容:', ['class' => 'col-md-8 offset-2 control-label']) !!}
    <div class="col-md-8 offset-2">
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 offset-2">
        {!! Form::submit('書き込む', ['class' => 'btn btn-outline-info hoverEffect']) !!}
    </div>
</div>
{!! Form::hidden('post_id', $post->id) !!}
{!! Form::hidden('delete_key', '0') !!}
{!! Form::hidden('delete_flg', '0') !!}
