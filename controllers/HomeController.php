<?php

class HomeController
{
   public function index() {
        // Load the home view
        $productModel = new Product();
        $products = $productModel->getAllProducts(); // Lấy tất cả sản phẩm
        // print_r($products); // In ra mảng sản phẩm để kiểm tra
        require_once 'views/home.php';
    }
}