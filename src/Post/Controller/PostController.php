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

        $this->render(__DIR__ . "/../Views/index.php", [
            'posts' => $posts
        ]);

        return $response;
    }


    public function post(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'];

        $post = $this->postService->find($id);
        $comments = iterator_to_array($post->getComments());

        $this->render(__DIR__ . "/../Views/post.php", [
            'id' => $id,
            'post' => $post,
            'comments' => $comments
        ]);

        return $response;
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

        $this->render(__DIR__ . "/../Views/sitemap.php", [
            'posts' => $posts
        ]);


        return $response;
    }

    public function error(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        $this->render(__DIR__ . "/../Views/error.php", []);

        return $response;
    }
}