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
        // from the add-rpoduct form attribute comes in form of array, from database in form of string.
        if ($validate && !count($attributes) === 1) {
            throw new InvalidArgumentException('Invalid attributes for Dvd disc');
        } elseif ($validate) {
            $this->attribute = $attributes[0];
        } else {
            $this->attribute = $attributes;
        }
    }
}