@extends('layouts.app')

@section('content')

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>posts</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                if(isset($_GET['page'])){
                 $i = 11 * ($_GET['page'] - 1) + 1; 
                }else{$i =  1;}?>


                @foreach($users as $user)
                <tr>
                <td>{{$i}}</td>
                <?php $i++; ?>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @foreach($user->posts as $post)
                        <p>{{$post->title}}</p>
                    @endforeach
                </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
            
            <div class="pagination">
                {!! $users->render() !!}
            </div>

@endsection
