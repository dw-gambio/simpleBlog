<?php 

namespace App\Core;

use PDO;
use App\Post\PostsRepository;


class Container 
{

    private $recipes = [];

    private $instances = [];

    public function __construct()
    {
        $this->recipes = [
            'postsRepository' => function() {
                return new PostsRepository(
                    $this->make("pdo")
                );
            },
            // Database connection
            'pdo' => function() {
                $pdo = new PDO(
                    "mysql:host=localhost;dbname=blog;charset=utf8",
                    "blog", 
                    "xj/b@zLI7!2974]8"
                );    
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