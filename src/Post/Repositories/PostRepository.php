<?php


namespace App\Post\Repositories;


use App\Post\Models\Collections\Posts;
use App\Post\Models\Entities\Post;
use App\Post\Models\ValueObjects\PostId;
use App\Post\Repositories\Mappers\PostMapper;
use App\Post\Repositories\Readers\PostReader;

class PostRepository
{
    private PostReader $postReader;
    private PostMapper $postMapper;

    /**
     * PostRepository constructor.
     * @param PostReader $postReader
     * @param PostMapper $postMapper
     */
    public function __construct(PostReader $postReader, PostMapper $postMapper)
    {
        $this->postReader = $postReader;
        $this->postMapper = $postMapper;
    }

    /**
     * @return Posts
     */
    public function all(): Posts
    {
        $data = $this->postReader->all();
        return $this->postMapper->mapToPosts($data);
    }

    /**
     * @param PostId $id
     * @return Post
     */
    public function find(PostId $id): Post
    {
        return $this->postMapper->mapToPost($this->postReader->find($id));
    }
}