<?php

namespace App\Post\Controller;

use App\Core\Controller\AbstractController;
use App\Post\Services\PostService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

// TODO: 3. rework controller
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

    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $posts = $this->postService->all();

        return $this->render($response, "index", [
            'title' => "Startseite",
            'posts' => $posts
        ]);
    }


    public function post(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'];

        $post = $this->postService->find($id);
        $comments = iterator_to_array($post->getComments());

        return $this->render($response,"post", [
            'title' => "Post",
            'id' => $id,
            'post' => $post,
            'comments' => $comments
        ]);

    }

    public function addCommentToPost(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'];

        if (isset($_POST['content'])) {
            $content = $_POST['content'];
            $this->postService->addCommentToPost($id, $content);
        }

        return $response->withHeader('Location', './post-' . $id)->withStatus(302);
    }

    public function sitemap(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $posts = $this->postService->all();

        return $this->render($response, "sitemap", [
            'title' => "Sitemap",
            'count' => count(iterator_to_array($posts)),
            'posts' => $posts
        ]);
    }

    public function error(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        return $this->render($response, "error", [
            'title' => "Error - 404"
        ]);
    }
}