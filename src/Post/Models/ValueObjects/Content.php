<?php


namespace App\Post\Models\ValueObjects;

/**
 * Class Content
 * @package App\Post\Models\ValueObjects
 */
class Content
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