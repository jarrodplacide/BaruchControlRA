<?php

/**
 * 
 * Foundation Service Class
 * 
 * @abstract 
 * @package         Baruch Control in RA
 * @subpackage      Model Service Layer
 * @author          Jarrod Placide-Raymond <jarrod.raymond@baruch.cuny.edu>
 * @version         1
 */
abstract class Service_Base_Foundation {
    
    /**
     * $_doctrineManager
     * 
     * Doctrine Manager Object
     * 
     */
    protected $doctrineManager = null;
    
    public function __construct() {
        $this->doctrineManager = Doctrine_Manager::getInstance();
    }
} 
