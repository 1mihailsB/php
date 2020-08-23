<?php


class Book extends BaseProduct
{
    public function __construct()
    {
        $this->type = 'book';
    }

    /**
     * @inheritDoc
     */
    public function setAttribute($attributes, $validate = true)
    {
        // not very useful for Book/Dvd but has some value for Furniture case.
        if ($validate && !count($attributes) === 1) {
            throw new InvalidArgumentException('Invalid attributes for Book');
        }

        $this->attribute = $attributes[0];
    }
}