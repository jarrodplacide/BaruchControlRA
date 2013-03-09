<?php

class IndexController extends Base_FoundationController {
    public function init() {
        parent::init();
    }
    
    public function indexAction() {
        $productService = new Service_Product();
        $this->view->products = $productService->getProducts(24);
    }
}
