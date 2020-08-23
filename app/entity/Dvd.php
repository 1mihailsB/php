<?php


class Dvd extends BaseProduct
{

    public function __construct()
    {
        $this->type = 'dvd';
    }

    /**
     * @inheritDoc
     */
    public function setAttribute($attributes, $validate = true)
    {
        // not very useful for Book/Dvd but has some value for Furniture case.
        if ($validate && !count($attributes) === 1) {
            throw new InvalidArgumentException('Invalid attributes for Dvd disc');
        }

        $this->attribute = $attributes[0];
    }
}