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
        if ($validate && !count($attributes) === 1) {
            throw new InvalidArgumentException('Invalid attributes for Book');
        }

        $this->attribute = $attributes[0];
    }
}