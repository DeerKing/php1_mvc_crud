<?php

class HomeController
{
   public function index() {
        // Load the home view
        $productModel = new Product();
        $products = $productModel->getAllProducts(); // Lấy tất cả sản phẩm
        // echo "<pre>";
        // print_r($products); // In ra mảng sản phẩm để kiểm tra
        // die();
        require_once 'views/home.php';
    }
    public function show() {
        // Lấy ID sản phẩm từ URL
        $id = $_GET['id'] ?? null;
        if ($id) {
            $productModel = new Product();
            $product = $productModel->getProductById($id); // Lấy sản phẩm theo ID
            if ($product) {
                require_once 'views/product.php'; // Hiển thị chi tiết sản phẩm
            } else {
                echo "Sản phẩm không tồn tại.";
            }
        } else {
            echo "ID sản phẩm không hợp lệ.";
        }
    }
}