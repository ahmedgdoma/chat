@extends('layouts.app')

@section('content')

        <div class="panel panel-default">
            <div class="panel-heading">edit post</div>
            <div class="panel-body">

                {!! Form::model($post, array("route"=>["posts.update", $post->id], "method"=>"PATCH", 'files'=>true)) !!}
                <div class="form-group col-md-4">
                     {!! Form::text('title', null, ['class'=> 'form-control', 'placeholder'=>'post title']) !!}
                </div>
                <div class="form-group col-md-12">
                    {!! Form::textarea('body', null, ['class'=> 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    <img src="{{asset($post->img)}}" width="100%">
                </div>
                <div class="form-group col-md-4">
                    {!! Form::file('img' , ['class'=> 'form-control']) !!}
                </div>
                <div class="form-group col-md-3">
                    {!! Form::submit('Post', ['class'=> 'form-control btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

@endsection
