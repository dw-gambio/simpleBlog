<?php
namespace App\Core;

use App\Comment\Repositories\CommentRepository;
use App\Comment\Repositories\Factories\CommentFactory;
use App\Comment\Repositories\Mappers\CommentMapper;
use App\Comment\Repositories\Readers\CommentReader;
use App\Comment\Repositories\Writers\CommentWriter;
use App\Comment\Services\CommentService;
use App\Post\Controller\PostController;
use App\Post\Repositories\Factories\PostFactory;
use App\Post\Repositories\Mappers\PostMapper;
use App\Post\Repositories\PostRepository;
use App\Post\Repositories\Readers\PostReader;
use App\Post\Services\PostService;
use PDO;
use PDOException;

class Container
{
// TODO: exchange current container with prebuilt one
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
                    $this->make(PostService::class),
                    $this->make(CommentService::class)
                );
            },
            PostService::class => function () {
                return new PostService(
                    $this->make(PostRepository::class),
                    $this->make(PostFactory::class)
                );
            },
            PostRepository::class => function () {
                return new PostRepository($this->make(PostReader::class), $this->make(PostMapper::class));
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
            CommentService::class => function () {
                return new CommentService(
                    $this->make(CommentRepository::class),
                    $this->make(CommentFactory::class)
                );
            },
            CommentRepository::class => function () {
                return new CommentRepository(
                    $this->make(CommentReader::class),
                    $this->make(CommentWriter::class),
                    $this->make(CommentMapper::class),
                );
            },
            CommentMapper::class => function () {
                return new CommentMapper($this->make(CommentFactory::class));
            },
            CommentFactory::class => function () {
                return new CommentFactory();
            },
            CommentWriter::class => function () {
                return new CommentWriter($this->make(PDO::class));
            },
            CommentReader::class => function () {
                return new CommentReader($this->make(PDO::class));
            },
            // Database connection
            // TODO: exclude DB data to .env file
            PDO::class => function () {
                try {
                    $pdo = new PDO(
                        "mysql:host=localhost;dbname=blog",
                        "root",
                        "12345");
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