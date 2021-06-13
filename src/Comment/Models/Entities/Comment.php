<?php


namespace App\Comment\Models\Entities;


use App\Comment\Models\ValueObjects\CommentId;
use App\Comment\Models\ValueObjects\Content;
use App\Comment\Models\ValueObjects\PostId;

class Comment
{
    private CommentId $commentId;
    private Content $content;
    private PostId $postId;

    /**
     * Comment constructor.
     * @param CommentId $commentId
     * @param Content $content
     * @param PostId $postId
     */
    public function __construct(CommentId $commentId, Content $content, PostId $postId)
    {
        $this->commentId = $commentId;
        $this->content = $content;
        $this->postId = $postId;
    }

    /**
     * @return CommentId
     */
    public function getCommentId(): CommentId
    {
        return $this->commentId;
    }

    /**
     * @return Content
     */
    public function getContent(): Content
    {
        return $this->content;
    }

    /**
     * @return PostId
     */
    public function getPostId(): PostId
    {
        return $this->postId;
    }

}