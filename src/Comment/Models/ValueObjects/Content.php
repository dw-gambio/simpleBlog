<?php


namespace App\Comment\Models\ValueObjects;


class Content
{
    private string $value;

    /**
     * Content constructor.
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