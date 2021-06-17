<?php


namespace App\Post\Services;


use App\Post\Models\Collections\Posts;
use App\Post\Models\Entities\Post;
use App\Post\Repositories\Factories\PostFactory;
use App\Post\Repositories\PostRepository;

class PostService
{
    private PostRepository $postRepository;
    private PostFactory $postFactory;

    /**
     * PostService constructor.
     * @param PostRepository $postRepository
     * @param PostFactory $postFactory
     */
    public function __construct(PostRepository $postRepository, PostFactory $postFactory)
    {
        $this->postRepository = $postRepository;
        $this->postFactory = $postFactory;
    }

    /**
     * @return Posts
     */
    public function all(): Posts
    {
        return $this->postRepository->all();
    }

    /**
     * @param int $id
     * @return Post
     */
    public function find(int $id): Post
    {
        return $this->postRepository->find($this->postFactory->createPostId($id));
    }

    /**
     * @param int $postId
     * @param string $content
     */
    public function addCommentToPost(int $postId, string $content): void
    {
        // CLOSE XSS VULNERABILITY
        $content = htmlentities($content, ENT_QUOTES, 'UTF-8');
        if (!empty($content)) {
            $this->postRepository->addCommentToPost(
                $this->postFactory->createPostId($postId),
                $this->postFactory->createContent($content)
            );
        }
    }

}