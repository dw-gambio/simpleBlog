@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>Startseite des Blogs</h1>
    <p class="lead">Das hier ist die Startseite des Blogs.</p>

    <ul>
        <?php foreach($posts as $post): ?>
        <li>
            <?php echo("{$post->getTitle()->value()}"); ?>
        </li>
        <?php endforeach; ?>
    </ul>

@endsection