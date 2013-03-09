<?php

/**
 * 
 * Product Service Class
 * 
 * @package         Baruch Control in RA
 * @subpackage      Model Service Layer
 * @author          Jarrod Placide-Raymond <jarrod.raymond@baruch.cuny.edu>
 * @version         1
 * 
 */
class Service_Product extends Service_Base_Foundation {
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Retrieves Product Record
     * 
     * @param   integer     $sku    Product Identifier
     * @return  array | bool
     */
    public function getProduct($sku) {
        $query = Doctrine_Query::create()->from('Model_Products')
                ->where('sku = ?', $sku);
        try {
            $results = $query->execute();
        }
        catch (Doctrine_Exception $e) {
            return $e->getMessage();
        }
        return $results;
    }
    
    /**
     * Retrieve Certain Number of Products
     * 
     * @param   integer     $limit  No of Products to Retrieve
     * @return  array | bool
     */
    public function getProducts($limit = NULL) {
        $query = Doctrine_Query::create()->from('Model_Products');
        if($limit != NULL) {
            $query->limit($limit);
        }
        try {
            $results = $query->execute();
        }
        catch (Doctrine_Exception $e) {
            return $e->getMessage();
        }
        return $results;
    }
}
