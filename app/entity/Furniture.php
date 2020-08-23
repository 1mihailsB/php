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
        if ($validate && !count($attributes) === 3) {
            throw new InvalidArgumentException('Invalid attributes for Dvd disc');
        } elseif ($validate) {
            $this->attribute = implode('x', $attributes);
        } else {
            $this->attribute = $attributes;
        }
    }
}