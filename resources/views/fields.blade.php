<div class="form-group">
    {!! Form::label('title', 'タイトル:', ['class' => 'col-sm-2 control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<br />
<div class="form-group">
    {!! Form::label('file', '画像:', ['class' => 'col-sm-2 control-label']) !!}
    {!! Form::file('file') !!}
</div>
<br />
<div class="form-group">
    {!! Form::label('body', '内容:', ['class' => 'col-sm-2 control-label']) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<br />
<div class="form-group">
    {!! Form::label('contributor', '投稿者:', ['class' => 'col-sm-2 control-label']) !!}
    {!! Form::text('contributor', null, ['class' => 'form-control']) !!}
</div>
<br />
<div class="form-group">
    {!! Form::label('category', 'ジャンル:', ['class' => 'col-sm-2 control-label']) !!}
    {{ Form::select('category', $genres, null, ['class' => 'form-control']) }}
</div>
<br />
<div class="form-group">
    {!! Form::label('tag', 'タグ:', ['class' => 'col-sm-2 control-label']) !!}
    {!! Form::text('tag', null, ['class' => 'form-control', 'id' => 'tag-it']) !!}
</div>
<br />
<div class="form-group offset-8">
    {!! link_to('/', '一覧へ戻る', ['class' => 'btn btn-link text-dark']) !!}
    {!! Form::submit('保存', ['class' => 'btn btn-outline-info btn-lg hoverEffect']) !!}
</div>
