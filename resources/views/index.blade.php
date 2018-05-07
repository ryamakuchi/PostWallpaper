@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('flash_message'))
                <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
            @endif
        </div>
    </div>
    <div class="row">

        @foreach($posts as $post)

            <div class="col-md-4 my-3">
                <a href="{{URL::to("/$post->id")}}" class="aText">
                    <div class="card img-thumbnail">
                        <div class="cardImg">
                            {!! Html::image("media/$post->pic_id.$post->fig_mime", "$post->fig_name.$post->fig_mime", ['class' => 'card-img-top']) !!}
                        </div>
                        <div class="card-body px-2 py-3">
                            <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text cardText" style="overflow:hidden;">{{ $post->body }}</p>
                                <i class="far fa-lg fa-fw fa-clock"></i>投稿日：{{ $post->created_at->format('Y/m/d H:i:s') }}
                                <br />
                                <i class="far fa-lg fa-fw fa-comment"></i>コメント数：{{ $post->comments->count() }}
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </a>
            </div><!-- /.col-sm-6.col-md-3 -->

        @endforeach

        {!! $posts->render() !!}

    </div>
</div>
@endsection
