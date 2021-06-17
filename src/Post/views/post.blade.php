@extends('layouts.master')

@section('title', "{$post->getTitle()->value()} - {$title} {$id}")

@section('content')
    <h1>Post.php</h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                [{{$post->getId()->value()}}] {{$post->getTitle()->value()}}
            </h3>
        </div>
        <div class="panel-body">
            <p>
                {!! nl2br($post->getContent()->value()) !!}
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

    <form action="post-{{$post->getId()->value()}}" method="post">
        <textarea name="content" class="form-control" style="resize:none; margin-bottom:2rem;"></textarea>
        <input type="submit" value="Add comment" class="btn btn-primary">
    </form>

@endsection