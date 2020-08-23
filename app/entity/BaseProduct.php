<?php


abstract class BaseProduct
{
    /**
     * @var int|null
     */

    protected $id;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var double
     */
    protected $price;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $attribute;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param double $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param string $attribute
     * @param bool $validate default value true is used when trying to set attribute received from add-product form
     * but when inserting values from database into Furniture object, this value should be set to false to prevent
     * validation. In my solution this is useful because from the add-product form the incoming attribute values are in
     * format of [int, int, int] but in database they are stored as "10x10x10". In real project possibly more tables for
     * product type, attribute type/format would be created to make it all nice and organized.
     */
    abstract public function setAttribute($attribute, $validate = true);



}