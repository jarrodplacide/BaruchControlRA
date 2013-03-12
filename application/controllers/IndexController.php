<?php

class IndexController extends Base_FoundationController {
    public function init() {
        parent::init();
    }
    
    public function indexAction() {
        $productService = new Service_Product();
        $this->view->categories = $productService->getCategories();
    }
    
    public function categoryAction() {
        $id = $this->getRequest()->getParam('id', 1);
        $productService = new Service_Product();
        $itemNos = array(24,48,96);
        $limit = array_rand($itemNos);
        $this->view->products = $productService->getProductsByCategory($id, $itemNos[$limit]);
    }
}
