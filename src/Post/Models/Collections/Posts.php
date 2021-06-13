<?php


namespace App\Post\Models\Collections;


use ArrayIterator;
use Exception;
use IteratorAggregate;
use Traversable;

class Posts implements IteratorAggregate
{
    private array $posts;

    /**
     * Posts constructor.
     * @param array $posts
     */
    public function __construct(array $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new ArrayIterator($this->posts);
    }
}