<?php


namespace App\Post\Models\ValueObjects;


class CommentId
{
    private int $value;

    /**
     * CommentId constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }
}