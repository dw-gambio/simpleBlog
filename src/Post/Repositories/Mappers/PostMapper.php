<?php


namespace App\Post\Repositories\Mappers;


use App\Post\Models\Collections\Posts;
use App\Post\Models\Entities\Post;
use App\Post\Repositories\Factories\PostFactory;

class PostMapper
{
    private PostFactory $postFactory;

    /**
     * PostMapper constructor.
     * @param PostFactory $postFactory
     */
    public function __construct(PostFactory $postFactory)
    {
        $this->postFactory = $postFactory;
    }

    public function mapToPost(array $post): Post
    {
        $id = $this->postFactory->createId($post['id']);
        $title = $this->postFactory->createTitle($post['title']);
        $content = $this->postFactory->createContent($post['content']);

        return $this->postFactory->createPost($id, $title, $content);
    }

    public function mapToPosts(array $posts): Posts
    {
        $collection = [];
        foreach ($posts as $post) {
            $collection[] = $this->mapToPost($post);
        }

        return $this->postFactory->createPosts(
            $collection
        );
    }
}