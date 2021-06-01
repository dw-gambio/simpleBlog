<?php 

namespace App\Post;

class PostsController 
{

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    protected function render($view, $params) 
    {
        extract($params);
        include __DIR__ . "/../../views/{$view}.php";
    }

    public function index() 
    {
        $posts = $this->postsRepository->fetchPosts();

        $this->render("post/index", [
            'posts' => $posts
        ]);
    }

    public function show() 
    {
        $id = $_GET['id'];
        $post = $this->postsRepository->fetchPost($id);

        $this->render("post/post", [
            'id' => $id,
            'post' => $post
        ]);
    }

    public function sitemap()
    {
        $posts = $this->postsRepository->fetchPosts();

        $this->render("post/sitemap", [
            'posts' => $posts
        ]);
    }
}