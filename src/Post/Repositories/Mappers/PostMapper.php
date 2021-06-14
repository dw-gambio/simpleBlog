<?php


namespace App\Post\Repositories\Mappers;


use App\Post\Models\Collections\Comments;
use App\Post\Models\Collections\Posts;
use App\Post\Models\Entities\Comment;
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

    /**
     * @param array $post
     * @return Post
     */
    public function mapToPost(array $data): Post
    {

        $id = $this->postFactory->createPostId($data['post']['id']);
        $title = $this->postFactory->createTitle($data['post']['title']);
        $content = $this->postFactory->createContent($data['post']['content']);
        $comments = $this->mapToComments($data['comments']);

        return $this->postFactory->createPost($id, $title, $content, $comments);
    }

    /**
     * @param array $posts
     * @return Posts
     */
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

    /**
     * @param array $comment
     * @return Comment
     */
    public function mapToComment(array $comment): Comment
    {
        $commentId = $this->postFactory->createCommentId($comment['id']);
        $content = $this->postFactory->createContent($comment['content']);

        return $this->postFactory->createComment($commentId, $content);
    }

    /**
     * @param array $comments
     * @return Comments
     */
    public function mapToComments(array $comments): Comments
    {
        $collection = [];

        foreach ($comments as $comment) {
            $collection[] = $this->mapToComment($comment);
        }

        return $this->postFactory->createComments($collection);
    }
}