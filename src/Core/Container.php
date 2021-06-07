<?php 

namespace App\Core;

use PDO;
use App\Post\PostsRepository;
use App\Post\PostsController;
use App\Post\CommentsRepository;
use PDOException;

class Container 
{

    private $recipes = [];

    private $instances = [];

    public function __construct()
    {
        $this->recipes = [
            'postsController' => function() {
                return new PostsController(
                    $this->make("postsRepository")
                );
            },
            'postsRepository' => function() {
                return new PostsRepository(
                    $this->make("pdo")
                );
            },
            'commentsRepository' => function() {
                return new CommentsRepository(
                    $this->make("pdo")
                );
            },
            // Database connection
            'pdo' => function() {
                try {
                    $pdo = new PDO(
                        "mysql:host=localhost;dbname=blog;charset=utf8",
                        "blog", 
                        "xj/b@zLI7!2974]8"
                    );    
                } catch (PDOException $e){
                    echo "<h2>Failed to connect to database</h2></br>";
                    echo "<h3><pre>{$e->getMessage()}</pre></h3>";
                    die();
                }
                
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                return $pdo;
            },
        ];
    }

    public function make($object) 
    {
        // IF OBJECT ALREADY EXISTS, RETURN THE EXISTING OBJECT
        if (!empty($this->instances[$object]))
        {
            return $this->instances[$object];
        }

        // INSTANTIATE OBJECT
        if(isset($this->recipes[$object]))
        {
            $this->instances[$object] = $this->recipes[$object]();
        }

        return $this->instances[$object];
    }
}