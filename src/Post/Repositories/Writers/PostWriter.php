<?php


namespace App\Post\Repositories\Writers;


use App\Post\Models\ValueObjects\Content;
use App\Post\Models\ValueObjects\PostId;
use PDO;

class PostWriter
{
    private PDO $pdo;

    /**
     * PostWriter constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param PostId $postId
     * @param Content $content
     */
    public function addCommentToPost(PostId $postId, Content $content): void
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO `comments` (`content`, `post_id`) VALUES (:content, :post_id)"
        );
        $statement->execute([
            'content' => $content->value(),
            'post_id' => $postId->value()
        ]);
    }
}