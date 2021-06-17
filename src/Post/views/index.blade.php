@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>Startseite des Blogs</h1>
    <p class="lead">Das hier ist die Startseite des Blogs.</p>

    <ul>

        @foreach($posts as $post)
        <li>
            {{$post->getTitle()->value()}}
        </li>
        @endforeach
    </ul>

@endsection