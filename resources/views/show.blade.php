@extends('layouts.app')

@section('content')

<div class="container">

    @if (Session::has('flash_message'))
        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif

    <div class="card">
        <h1 class="card-header">{{ $post->title }}</h1>
        <div class="card-body">
            <div class="text-center">
                {!! Html::image("media/$post->pic_id.$post->fig_mime", "$post->fig_name.$post->fig_mime", ['class' => 'img-fluid showImg center-block']) !!}
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <p class="text-right">
                        <i class="far fa-lg fa-fw fa-clock"></i>投稿日：{{ $post->created_at->format('Y/m/d H:i:s') }}　　
                        <i class="far fa-lg fa-fw fa-comment"></i>コメント数：{{ $post->comments->count() }}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-2">
                    <b>{{ $post->contributor or '(anonymous)' }}</b>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-8 offset-2">
                    <p>{!! nl2br(e($post->body)) !!}</p>
                </div>
            </div>
            @if ($tags[0] != "")
                <div class="row">
                    <div class="col-md-8 offset-2 tags">
                        <ul>
                            @foreach($tags as $tag)
                                <li><span>{{ $tag }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @foreach($comments as $comment)
                @if (isset($id))
                    <?php ++$id; ?>
                @else
                    <?php $id = 1; ?>
                @endif
                <hr class="my-3">
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <b>{{ $id }}：{{ $comment->contributor or '(anonymous)' }}</b> 　
                        <i class="far fa-lg fa-fw fa-clock"></i>{{ $comment->created_at->format('Y/m/d H:i:s') }}
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-8 offset-2"><p>{!! nl2br(e($comment->body)) !!}</p></div>
                </div>
            @endforeach

        </div>
        <div class="card-footer">

            {{-- エラーの表示 --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            @endif

            {!! Form::open(['url' => '/show',
                'files' => true,
                'class' => 'form-horizontal',
                'id' => 'comment-input']) !!}

            @include('commentFields')

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
