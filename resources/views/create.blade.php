@extends('layouts.app')

@section('content')
<div class="panel panel-default">
            <div class="panel-heading">whats in your mind</div>
            <div class="panel-body">
                {!! Form::open(['route'=>'posts.store'  , 'files'=>true]) !!}
                <div class="form-group col-md-4">
                    {!! Form::text('title', null, ['class'=> 'form-control', 'placeholder'=>'post title']) !!}
                </div>
                <div class="form-group col-md-12">
                    {!! Form::textarea('body', null, ['class'=> 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::file('img', ['class'=> 'form-control']) !!}
                </div>
                <div class="form-group col-md-3">
                    {!! Form::select('users', $users, null, ['class'=> 'form-control']) !!}
                </div>
                <div class="form-group col-md-3">
                    {!! Form::submit('Post', ['class'=> 'form-control btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
@endsection