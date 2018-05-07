@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['url' => '/',
                        'files' => true,
                        'class' => 'form-horizontal',
                        'id' => 'post-input']) !!}

            @include('fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
