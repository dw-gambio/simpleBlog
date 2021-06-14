<?php

namespace App\Core;


use App\Post\Controller\PostController;
use App\Post\Repositories\Factories\PostFactory;
use App\Post\Repositories\Mappers\PostMapper;
use App\Post\Repositories\PostRepository;
use App\Post\Repositories\Readers\PostReader;
use App\Post\Repositories\Writers\PostWriter;
use App\Post\Services\PostService;
use PDO;
use PDOException;

class Container
{
// TODO: 3. exchange current container with prebuilt one https://container.thephpleague.com/
    /**
     * @var array
     */
    private array $recipes;

    /**
     * @var array
     */
    private array $instances = [];


    public function __construct()
    {
        $this->recipes = [
            PostController::class => function () {
                return new PostController(
                    $this->make(PostService::class)
                );
            },
            PostService::class => function () {
                return new PostService(
                    $this->make(PostRepository::class),
                    $this->make(PostFactory::class)
                );
            },
            PostRepository::class => function () {
                return new PostRepository(
                    $this->make(PostReader::class),
                    $this->make(PostWriter::class),
                    $this->make(PostMapper::class)
                );
            },
            PostMapper::class => function () {
                return new PostMapper($this->make(PostFactory::class));
            },
            PostFactory::class => function () {
                return new PostFactory();
            },
            PostReader::class => function () {
                return new PostReader($this->make(PDO::class));
            },
            PostWriter::class => function () {
                return new PostWriter($this->make(PDO::class));
            },
            PDO::class => function () {
                try {
                    $pdo = new PDO(
                        "mysql:host={$_ENV['DB_HOST']};
                        dbname={$_ENV['DB_NAME']}",
                        $_ENV['DB_USERNAME'],
                        $_ENV['DB_PASSWORD']
                    );
                } catch (PDOException $e) {
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
        if (!empty($this->instances[$object])) {
            return $this->instances[$object];
        }

        // INSTANTIATE OBJECT
        if (isset($this->recipes[$object])) {
            $this->instances[$object] = $this->recipes[$object]();
        }

        return $this->instances[$object];
    }
}