<?php


class ProductFactory
{
    private $productType;

    /**
     * @param null $type
     * @return Book|Dvd|Furniture|null
     */
    public function create($type = null)
    {
        $this->productType = $type;

        switch ($this->productType) {
            case 'book':
                return new Book();
            case 'dvd':
                return new Dvd();
            case 'furniture':
                return new Furniture();
            default:
                return null;
        }
    }

    /**
     * @param array $product
     *
     * @return Book|Dvd|Furniture|null
     */
    public function createFromArray($product)
    {
        $productObj = $this->create($product['type']);
        if (is_null($productObj)) {
            return null;
        }

        $productObj->setId($product['id']);
        $productObj->setSku($product['sku']);
        $productObj->setName($product['name']);
        $productObj->setPrice((double) $product['price']);
        $productObj->setAttribute($product['attribute'], false);

        return $productObj;
    }
}