<?php

namespace App\Post\Models\Entities;

use App\Post\Models\Collections\Comments;
use App\Post\Models\ValueObjects\Content;
use App\Post\Models\ValueObjects\PostId;
use App\Post\Models\ValueObjects\Title;

class Post
{
    private PostId $id;
    private Title $title;
    private Content $content;
    private Comments $comments;

    /**
     * Post constructor.
     * @param PostId $id
     * @param Title $title
     * @param Content $content
     * @param Comments $comments
     */
    public function __construct(PostId $id, Title $title, Content $content, Comments $comments)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->comments = $comments;
    }

    /**
     * @return PostId
     */
    public function getId(): PostId
    {
        return $this->id;
    }

    /**
     * @return Title
     */
    public function getTitle(): Title
    {
        return $this->title;
    }

    /**
     * @return Content
     */
    public function getContent(): Content
    {
        return $this->content;
    }

    /**
     * @return Comments
     */
    public function getComments(): Comments
    {
        return $this->comments;
    }

}