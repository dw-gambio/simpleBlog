<?php


namespace App\Comment\Repositories\Mappers;


use App\Comment\Models\Entities\Comment;
use App\Comment\Repositories\Factories\CommentFactory;

class CommentMapper
{
    private CommentFactory $commentFactory;

    /**
     * CommentMapper constructor.
     * @param CommentFactory $commentFactory
     */
    public function __construct(CommentFactory $commentFactory)
    {
        $this->commentFactory = $commentFactory;
    }

    /**
     * @param array $comment
     * @return Comment
     */
    public function mapToComment(array $comment): Comment
    {
        $commentId = $this->commentFactory->createId($comment['id']);
        $content = $this->commentFactory->createContent($comment['content']);
        $postId = $this->commentFactory->createPostId($comment['post_id']);

        return $this->commentFactory->createComment($commentId, $content, $postId);
    }

    public function mapToComments(array $comments)
    {
        $collection = [];

        foreach ($comments as $comment) {
            $collection[] = $this->mapToComment($comment);
        }

        return $this->commentFactory->createComments($collection);
    }
}