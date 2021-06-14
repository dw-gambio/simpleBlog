<?php

namespace App\Post\Controller;

use App\Core\Controller\AbstractController;
use App\Post\Services\PostService;

// TODO: rework controller
class PostController extends AbstractController
{

    private PostService $postService;

    /**
     * PostController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
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
            $this->postService->addCommentToPost($id, $content);
        }

        $post = $this->postService->find($id);
        $comments = iterator_to_array($post->getComments());

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