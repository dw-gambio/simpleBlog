<?php


namespace App\Comment\Models\Collections;


use ArrayIterator;
use Exception;
use IteratorAggregate;
use Traversable;

class Comments implements IteratorAggregate
{

    private array $comments;

    /**
     * Comments constructor.
     * @param array $comments
     */
    public function __construct(array $comments)
    {
        $this->comments = $comments;
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new ArrayIterator($this->comments);
    }
}