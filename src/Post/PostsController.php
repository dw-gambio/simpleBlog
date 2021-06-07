<?php 

namespace App\Post;

use App\Core\AbstractController;

class PostsController extends AbstractController
{

    public function __construct(
        PostsRepository $postsRepository,
        CommentsRepository $commentsRepository
    )
    {
        $this->postsRepository = $postsRepository;
        $this->commentsRepository = $commentsRepository;
    }

    public function index() 
    {
        $posts = $this->postsRepository->all();

        $this->render("post/index", [
            'posts' => $posts
        ]);
    }

    public function show() 
    {
        $id = $_GET['id'];
        $post = $this->postsRepository->find($id);
        $comments = $this->commentsRepository->allFromPost($id);

        $this->render("post/post", [
            'id' => $id,
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function sitemap()
    {
        $posts = $this->postsRepository->all();

        $this->render("post/sitemap", [
            'posts' => $posts
        ]);
    }
}