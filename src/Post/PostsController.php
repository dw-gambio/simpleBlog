<?php 

namespace App\Post;

class PostsController 
{

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function index() 
    {
        $res = $this->postsRepository->fetchPosts();

        echo "<h1>PostsController - index()</h1>";
    }
}