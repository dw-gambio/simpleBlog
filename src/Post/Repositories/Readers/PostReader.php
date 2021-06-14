<?php


namespace App\Post\Repositories\Readers;


use App\Post\Models\ValueObjects\PostId;
use PDO;

class PostReader
{
    private PDO $pdo;

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
        $statement = $this->pdo->query("SELECT * FROM `posts`");
        $posts = $statement->fetchAll();
        return array_map(function (array $post) {
            return ['post' => $post, 'comments' => []];
        }, $posts);
    }

    /**
     * @param PostId $id
     * @return array
     */
    public function find(PostId $id): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM `posts` WHERE id = :id");
        $statement->execute(['id' => $id->value()]);
        $post = $statement->fetch();
        $comments = $this->getCommentsByPostId($id);

        return [
            "post" => $post,
            "comments" => $comments
        ];
    }

    /**
     * @param PostId $postId
     * @return array
     */
    private function getCommentsByPostId(PostId $postId): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM `comments` WHERE post_id = :post_id");
        $statement->execute(['post_id' => $postId->value()]);

        return $statement->fetchAll();
    }
}