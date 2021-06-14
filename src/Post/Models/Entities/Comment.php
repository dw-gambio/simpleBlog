<?php


namespace App\Post\Models\Entities;


use App\Post\Models\ValueObjects\CommentId;
use App\Post\Models\ValueObjects\Content;

class Comment
{
    private CommentId $commentId;
    private Content $content;

    /**
     * Comment constructor.
     * @param CommentId $commentId
     * @param Content $content
     */
    public function __construct(CommentId $commentId, Content $content)
    {
        $this->commentId = $commentId;
        $this->content = $content;
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

}