<?php 

namespace App\Post;

use PDO;

class PostsRepository 
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    function fetchPosts()
    {   
        
        $statement = $this->pdo->query("SELECT * FROM `posts`");
        
        $posts = $statement->fetchAll(PDO::FETCH_CLASS, "App\\Post\\PostModel");
        return $posts;
        
    }

    function fetchPost($id) 
    {
        $statement = $this->pdo->prepare("SELECT * FROM `posts` WHERE id = :id");
        $statement->execute(['id' => $id]);
        $statement->setFetchMode(PDO::FETCH_CLASS, "App\\Post\\PostModel");
        $post = $statement->fetch(PDO::FETCH_CLASS);

        // $post = new PostModel();
        // $post->id = $postArray['id'];
        // $post->title = $postArray['title'];
        // $post->content = $postArray['content'];

        return $post;
    }
}