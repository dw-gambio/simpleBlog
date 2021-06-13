<?php


namespace App\Comment\Repositories\Factories;


use App\Comment\Models\Collections\Comments;
use App\Comment\Models\Entities\Comment;
use App\Comment\Models\ValueObjects\CommentId;
use App\Comment\Models\ValueObjects\Content;
use App\Comment\Models\ValueObjects\PostId;

class CommentFactory
{
    /**
     * @param int $id
     * @return CommentId
     */
    public function createId(int $id): CommentId
    {
        return new CommentId($id);
    }

    /**
     * @param string $content
     * @return Content
     */
    public function createContent(string $content): Content
    {
        return new Content($content);
    }

    /**
     * @param int $postId
     * @return PostId
     */
    public function createPostId(int $postId): PostId
    {
        return new PostId($postId);
    }

    /**
     * @param CommentId $commentId
     * @param Content $content
     * @param PostId $postId
     * @return Comment
     */
    public function createComment(CommentId $commentId, Content $content, PostId $postId): Comment
    {
        return new Comment($commentId, $content, $postId);
    }

    /**
     * @param array $comments
     * @return Comments
     */
    public function createComments(array $comments): Comments
    {
        return new Comments($comments);
    }

}