<?php


namespace App\Comment\Services;


use App\Comment\Models\Collections\Comments;
use App\Comment\Repositories\CommentRepository;
use App\Comment\Repositories\Factories\CommentFactory;

class CommentService
{
    private CommentRepository $commentRepository;
    private CommentFactory $commentFactory;

    /**
     * CommentService constructor.
     * @param CommentRepository $commentRepository
     * @param CommentFactory $commentFactory
     */
    public function __construct(CommentRepository $commentRepository, CommentFactory $commentFactory)
    {
        $this->commentRepository = $commentRepository;
        $this->commentFactory = $commentFactory;
    }

    /**
     * @param int $postId
     * @return Comments
     */
    public function allFromPost(int $postId): Comments
    {
        return $this->commentRepository->allFromPost($this->commentFactory->createPostId($postId));
    }

    /**
     * @param int $postId
     * @param string $content
     */
    public function addToPost(int $postId, string $content): void
    {
          $this->commentRepository->addToPost(
              $this->commentFactory->createPostId($postId),
              $this->commentFactory->createContent($content)
          );
    }
}