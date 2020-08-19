<?php

class ProductRepo
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @return array products present in database
     */
    public function getAllProducts()
    {
        $this->db->query("SELECT * FROM product order by type");
    
        return $this->db->resultSet();
    }

    /**
     * @param string $sku SKU the of product
     * 
     * @return bool true if this sku is not already taken. false otherwise
     */
    public function isSkuUnique($sku)
    {
        $this->db->query("SELECT 1 FROM product where sku = :sku");
        $this->db->bind(":sku", $sku, PDO::PARAM_STR);
        
        return empty($this->db->single());
    }

    /**
     * @param string $name name the of product
     * 
     * @return bool true if this name is not already taken. false otherwise
     */
    public function isNameUnique($name)
    {
        $this->db->query("SELECT 1 FROM product where name = :name");
        $this->db->bind(":name", $name, PDO::PARAM_STR);
        
        return empty($this->db->single());
    }

    /**
     * @param array $product assoc. array of all columns of product table except id.
     * 
     * @return void
     */
    public function create($product)
    {
        // first null value is for auto generated ID
        $this->db->query("INSERT INTO product values (null, :name, :sku, :price, :type, :attribute)");
        $this->db->bind(':name', $product['name']);
        $this->db->bind(':sku', $product['sku']);
        $this->db->bind(':price', $product['price']);
        $this->db->bind(':type', $product['type']);
        $this->db->bind(':attribute', $product['attribute']);

        $this->db->execute();
    }

    /**
     * @param array $ids ids of all products to delete
     * 
     * @return void
     */
    public function deleteAllById($ids)
    {
        if (empty($ids)) {
            throw new Exception("Ids empty");
        }

        $inArgument = implode(',', array_fill(0, count($ids), '?'));

        $this->db->query("DELETE from product WHERE id IN (". $inArgument .");" );

        foreach ($ids as $idx => $id) {
            $this->db->bind($idx+1, $id);
        }

        $this->db->execute();
    }
}