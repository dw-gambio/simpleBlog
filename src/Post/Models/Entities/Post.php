<?php

namespace App\Post\Models\Entities;

use App\Post\Models\ValueObjects\Content;
use App\Post\Models\ValueObjects\PostId;
use App\Post\Models\ValueObjects\Title;

class Post
{
    private PostId $id;
    private Title $title;
    private Content $content;

    /**
     * Post constructor.
     * @param PostId $id
     * @param Title $title
     * @param Content $content
     */
    public function __construct(PostId $id, Title $title, Content $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
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


}