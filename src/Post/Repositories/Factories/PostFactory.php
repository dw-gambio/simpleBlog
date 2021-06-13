<?php


namespace App\Post\Repositories\Factories;


use App\Post\Models\Collections\Posts;
use App\Post\Models\Entities\Post;
use App\Post\Models\ValueObjects\Content;
use App\Post\Models\ValueObjects\PostId;
use App\Post\Models\ValueObjects\Title;

class PostFactory
{
    /**
     * @param int $id
     * @return PostId
     */
    public function createId(int $id): PostId
    {
        return new PostId($id);
    }

    /**
     * @param string $title
     * @return Title
     */
    public function createTitle(string $title): Title
    {
        return new Title($title);
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
     * @param PostId $id
     * @param Title $title
     * @param Content $content
     * @return Post
     */
    public function createPost(PostId $id, Title $title, Content $content): Post
    {
        return new Post($id, $title, $content);
    }

    /**
     * @param array $posts
     * @return Posts
     */
    public function createPosts(array $posts): Posts
    {
        return new Posts($posts);
    }
}