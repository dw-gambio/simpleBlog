<?php


namespace App\Post\Repositories;


use App\Post\Models\Collections\Posts;
use App\Post\Models\Entities\Post;
use App\Post\Models\ValueObjects\Content;
use App\Post\Models\ValueObjects\PostId;
use App\Post\Repositories\Mappers\PostMapper;
use App\Post\Repositories\Readers\PostReader;
use App\Post\Repositories\Writers\PostWriter;

class PostRepository
{
    private PostReader $postReader;
    private PostMapper $postMapper;
    private PostWriter $postWriter;

    /**
     * PostRepository constructor.
     * @param PostReader $postReader
     * @param PostWriter $postWriter
     * @param PostMapper $postMapper
     */
    public function __construct(PostReader $postReader,PostWriter $postWriter,PostMapper $postMapper)
    {
        $this->postReader = $postReader;
        $this->postMapper = $postMapper;
        $this->postWriter = $postWriter;
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

    public function addCommentToPost(PostId $postId, Content $content): void
    {
        $this->postWriter->addCommentToPost($postId, $content);
    }

}