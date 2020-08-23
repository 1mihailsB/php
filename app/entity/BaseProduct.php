<?php


abstract class BaseProduct
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $type;
    protected $attribute;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param mixed $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param mixed $attribute
     * @param bool $validate default velue true is used when trying to set attribute received from add-product form
     * but when inserting values from database into Furniture object, this value should be set to false to prevent
     * validation. In my solution this is useful because from the add-product form the incoming values are in format of
     * [int, int, int] but in database they are stored as "10x10x10". In real project possibly more tables for product
     * type, attribute type/format would be created.
     */
    abstract public function setAttribute($attribute, $validate = true);



}