<?php


namespace App\Comment\Repositories\Writers;


use App\Comment\Models\ValueObjects\Content;
use App\Comment\Models\ValueObjects\PostId;
use PDO;

class CommentWriter
{
    private PDO $pdo;
    private const TABLE_NAME = "comments";

    /**
     * CommentWriter constructor.
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
    public function addToPost(PostId $postId, Content $content): void
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO `" . self::TABLE_NAME . "` (`content`, `post_id`) VALUES (:content, :post_id)"
        );
        $statement->execute([
            'content' => $content->value(),
            'post_id' => $postId->value()
        ]);
    }
}