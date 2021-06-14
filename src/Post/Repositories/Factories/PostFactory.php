<?php


namespace App\Post\Repositories\Factories;


use App\Post\Models\Collections\Comments;
use App\Post\Models\Collections\Posts;
use App\Post\Models\Entities\Comment;
use App\Post\Models\Entities\Post;
use App\Post\Models\ValueObjects\CommentId;
use App\Post\Models\ValueObjects\Content;
use App\Post\Models\ValueObjects\PostId;
use App\Post\Models\ValueObjects\Title;

class PostFactory
{
    /**
     * @param int $id
     * @return PostId
     */
    public function createPostId(int $id): PostId
    {
        return new PostId($id);
    }

    /**
     * @param int $id
     * @return CommentId
     */
    public function createCommentId(int $id): CommentId
    {
        return new CommentId($id);
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
     * @param Comments $comments
     * @return Post
     */
    public function createPost(PostId $id, Title $title, Content $content, Comments $comments): Post
    {
        return new Post($id, $title, $content, $comments);
    }

    /**
     * @param array $posts
     * @return Posts
     */
    public function createPosts(array $posts): Posts
    {
        return new Posts($posts);
    }

    /**
     * @param CommentId $commentId
     * @param Content $content
     * @return Comment
     */
    public function createComment(CommentId $commentId, Content $content): Comment
    {
        return new Comment($commentId, $content);
    }

    /**
     * @param array $comments
     * @return Comments
     */
    public function createComments(array $comments = []): Comments
    {
        return new Comments($comments);
    }

}