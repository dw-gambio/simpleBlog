<?php


namespace App\Comment\Repositories\Readers;


use App\Comment\Models\ValueObjects\PostId;
use PDO;

class CommentReader
{
    private PDO $pdo;
    private const TABLE_NAME = "comments";

    /**
     * CommentReader constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param PostId $postId
     * @return array
     */
    public function allFromPost(PostId $postId): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM `" . self::TABLE_NAME . "` WHERE post_id = :post_id");
        $statement->execute(['post_id' => $postId->value()]);

        return $statement->fetchAll();
    }
}