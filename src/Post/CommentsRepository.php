<?php 

namespace App\Post;

use App\Core\AbstractRepository;

use PDO;

class CommentsRepository extends AbstractRepository
{
    public function getTableName()
    {
        return "comments";
    }

    public function getModelName()
    {
        return "App\\Post\\CommentModel";
    }

    public function insertForPost($postId, $content)
    {
        $table = $this->getTableName();
        $statement = $this->pdo->prepare(
            "INSERT INTO `$table` (`content`, `post_id`) VALUES (:content, :post_id)"
        );
        $statement->execute([
            'content' => $content,
            'post_id' => $postId
        ]);
    }

    public function allFromPost($postId)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();

        $statement = $this->pdo->prepare("SELECT * FROM `$table` WHERE post_id = :post_id");
        $statement->execute(['post_id' => $postId]);

        $comments = $statement->fetchAll(PDO::FETCH_CLASS, $model);

        return $comments;
    }
}