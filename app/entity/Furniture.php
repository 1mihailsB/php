<?php


class Furniture extends BaseProduct
{
    public function __construct()
    {
        $this->type = 'furniture';
    }

    /**
     * @inheritDoc
     */
    public function setAttribute($attributes, $validate = true)
    {
        // helps when inserting values form add-form into attribute field of Furniture class
        // but gets in the way when inserting attribute value from DB in the Furniture class
        if ($validate && !count($attributes) === 3) {
            throw new InvalidArgumentException('Invalid attributes for Dvd disc');
        } elseif ($validate) {
            $this->attribute = implode('x', $attributes);
        } else {
            $this->attribute = $attributes;
        }
    }
}