@extends('layouts.master')

@section('title', "{$title} {$count}")

@section('content')
    <h1>Übersicht des Blogs</h1>
    <p class="lead">Das hier ist die Übersicht des Blogs.</p>

    <ul>
        <?php foreach($posts as $post): ?>
        <li>
            <a href="post-<?php echo ($post->getId()->value())?>">
                <?php echo("[{$post->getId()->value()}] {$post->getTitle()->value()}"); ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>

@endsection