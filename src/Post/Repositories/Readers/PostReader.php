<?php


namespace App\Post\Repositories\Readers;


use App\Post\Models\ValueObjects\PostId;
use PDO;

class PostReader
{
    private PDO $pdo;
    private const TABLE_NAME = "posts";

    /**
     * PostReader constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        $statement = $this->pdo->query("SELECT * FROM `" . self::TABLE_NAME . "`");

        return $statement->fetchAll();
    }


    /**
     * @param PostId $id
     * @return mixed
     */
    public function find(PostId $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM `" . self::TABLE_NAME . "` WHERE id = :id");
        $statement->execute(['id' => $id->value()]);

        return $statement->fetch();
    }
}