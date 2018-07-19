@extends('layouts.app')

@section('content')

        <a href="posts/create" class="btn btn-primary">add new post</a>
        <a href="#" id="showPosts" class="btn btn-success">show posts</a>

        <div id="posts">

        </div>

@endsection

@section('scripts')

<script>
    $('document').ready(function(){
        $('#showPosts').click(function(e){
            e.preventDefault();
            $.get('{{url('/showPosts')}}', function(data){
                $('#posts').html(data);
            })
        })
    });
</script>
@endsection