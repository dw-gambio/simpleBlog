@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>Post.php</h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                [{{ $postId }}] {{ $postTitle }}
            </h3>
        </div>
        <div class="panel-body">
            <p>
                {!! $postContent !!}
            </p>
        </div>
    </div>

    <ul class="list-group">
        @foreach($comments as $comment)
        <li class="list-group-item">
            {{$comment->getContent()->value()}}
        </li>
        @endforeach
    </ul>

    <form action="post-{{$postId}}" method="post">
        <textarea name="content" class="form-control" style="resize:none; margin-bottom:2rem;"></textarea>
        <input type="submit" value="Add comment" class="btn btn-primary">
    </form>

@endsection