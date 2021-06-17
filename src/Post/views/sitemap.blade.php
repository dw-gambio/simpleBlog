@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>Übersicht des Blogs</h1>
    <p class="lead">Das hier ist die Übersicht des Blogs.</p>

    <ul>
        @foreach($posts as $post)
        <li>
            <a href="post-{{$post->getId()->value()}}">
                [{{$post->getId()->value()}}] {{$post->getTitle()->value()}}
            </a>
        </li>
        @endforeach
    </ul>

@endsection