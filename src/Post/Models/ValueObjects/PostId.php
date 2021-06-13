<?php


namespace App\Post\Models\ValueObjects;


class PostId
{
    private int $value;

    /**
     * PostId constructor.
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