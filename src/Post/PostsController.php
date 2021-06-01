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
        $posts = $this->postsRepository->fetchPosts();

        include __DIR__ . "/../../views/post/index.php";
    }
}