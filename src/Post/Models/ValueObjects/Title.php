<?php


namespace App\Post\Models\ValueObjects;

/**
 * Class Title
 * @package App\Post\Models\ValueObjects
 */
class Title
{
    private string $value;

    /**
     * PostId constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }


}