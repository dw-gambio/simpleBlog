<?php

namespace App\Post\Controller;

use App\Comment\Services\CommentService;
use App\Core\Controller\AbstractController;
use App\Post\Repositories\CommentsRepository;
use App\Post\Repositories\PostsRepository;
use App\Post\Services\PostService;

class PostController extends AbstractController
{

    private PostService $postService;
    private CommentService $commentService;

    /**
     * PostController constructor.
     * @param PostService $postService
     * @param CommentService $commentService
     */
    public function __construct(PostService $postService, CommentService $commentService)
    {
        $this->postService = $postService;
        $this->commentService = $commentService;
    }

    public function index(): void
    {
        $posts = $this->postService->all();

        $this->render(__DIR__ . "/../Views/index.php", [
            'posts' => $posts
        ]);
    }


    public function post(): void
    {
        $id = $_GET['id'];

        if(isset($_POST['content'])) {
            $content = $_POST['content'];
            $this->commentService->addToPost($id, $content);
        }

        $post = $this->postService->find($id);
        $comments = $this->commentService->allFromPost($id);

        $this->render(__DIR__ . "/../Views/post.php", [
            'id' => $id,
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function sitemap(): void
    {
        $posts = $this->postService->all();

        $this->render(__DIR__ . "/../Views/sitemap.php", [
            'posts' => $posts
        ]);
    }
}