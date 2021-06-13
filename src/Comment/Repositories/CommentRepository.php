<?php


namespace App\Comment\Repositories;



use App\Comment\Models\Collections\Comments;
use App\Comment\Models\ValueObjects\Content;
use App\Comment\Models\ValueObjects\PostId;
use App\Comment\Repositories\Mappers\CommentMapper;
use App\Comment\Repositories\Readers\CommentReader;
use App\Comment\Repositories\Writers\CommentWriter;

class CommentRepository
{
    private CommentReader $commentReader;
    private CommentWriter $commentWriter;
    private CommentMapper $commentMapper;

    /**
     * CommentRepository constructor.
     * @param CommentReader $commentReader
     * @param CommentWriter $commentWriter
     * @param CommentMapper $commentMapper
     */
    public function __construct(CommentReader $commentReader, CommentWriter $commentWriter, CommentMapper $commentMapper)
    {
        $this->commentReader = $commentReader;
        $this->commentWriter = $commentWriter;
        $this->commentMapper = $commentMapper;
    }

    /**
     * @param PostId $postId
     * @return Comments
     */
    public function allFromPost(PostId $postId): Comments
    {
        $data = $this->commentReader->allFromPost($postId);
        return $this->commentMapper->mapToComments($data);
    }

    /**
     * @param PostId $postId
     * @param Content $content
     */
    public function addToPost(PostId $postId, Content $content): void
    {
        $this->commentWriter->addToPost($postId, $content);
    }
}