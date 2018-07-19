@foreach($posts as $post)
    <div class="panel panel-default">
        <div class="panel-heading"><h2 class="text-capitalize">{{$post->user->name}}</h2></div>

        <div class="panel-body text-center">
            <h3>{{$post->title}}</h3>

            <p class="lead">{{$post->body}}
                <span class="text-left">

                    </span>
            </p>
            <img width="640" height="480" src="{{$post->img}}">
            <p class="text-left">
            @if ($user == $post->user->id)
                {!! Form::open(['method'=>'DELETE', 'route'=>['posts.destroy', $post->id]]) !!}

                <!--<div class="form-inline">
                            {!! Form::selectRange('year', '1970', '2017', null, ['class'=>'form-control']) !!}
                {!! Form::selectMonth('month', null, ['class'=>'form-control']) !!}
                {!! Form::selectRange('day', '1', '31', null, ['class'=>'form-control']) !!}
                {!! Form::select("sss",["1st"=>"ahmed", "2nd"=>"mohamed", "3rd"=>'gamal',"4rth"=>"doma"],null, ['placeholder'=>"select name", 'required', 'class'=>'form-control'] ) !!}
                        </div>-->
                    <a href="posts/{{$post->id}}/edit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> </a>
                    {!!  Form::submit('X', ['class'=>'btn btn-danger']); !!}
                    {!! Form::close([]) !!}
                @endif
            </p>
        </div>
    </div>
@endforeach
<div class="pagination">
    {!! $posts->render() !!}
</div>