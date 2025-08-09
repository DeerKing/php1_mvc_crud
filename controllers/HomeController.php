<?php

class HomeController
{
   public function index() {
        $page = $_GET['page'] ?? 1; // Lấy trang hiện tại từ URL, mặc định là trang 1
        // Kiểm tra và đảm bảo trang là một số nguyên dương
        if (!is_numeric($page) || $page < 1) {
            $page = 1; // Nếu không hợp lệ, đặt về trang 1
        }        
        $limit = 5; // Số lượng sản phẩm hiển thị trên mỗi trang
        $productModel = new Product();
         // Giả sử tổng số sản phẩm là 100 và mỗi trang hiển thị 10 sản phẩm
        $total_products = $productModel->countProducts(); // Lấy tổng số sản phẩm từ model
        $total_pages = ceil($total_products / $limit); // Tính tổng số trang

        $products = $productModel->getAllProducts($page, $limit); // Lấy tất cả sản phẩm
        if(isset($_GET['keyword']) && !empty($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $products = $productModel->search($keyword); // Tìm kiếm sản phẩm theo từ khóa
        }
        $total_quantity = $productModel->getTotalQuantity(); // Lấy tổng số lượng sản phẩm
       
        // Load the home view
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
    public function add() {
        // Kiểm tra xem có dữ liệu POST gửi lên không
        if (isset($_POST['add'])) {
            // Xử lý dữ liệu từ form
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? 0;
            $description = $_POST['description'] ?? '';
            $image = $_FILES['image']['name'] ?? '';

            // Kiểm tra và xử lý file upload
            if ($image) {
                $target_dir = "assets/uploads/";
                $target_file = $target_dir . basename($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            }

            // Tạo mảng dữ liệu để thêm vào database
            $data = [
                'name' => $name,
                'price' => $price,
                'description' => $description,
                'image' => $target_file ?? ''
            ];

            // Thêm sản phẩm mới vào database
            $productModel = new Product();
            if ($productModel->addProduct($data)) {
                header("Location: index.php"); // Chuyển hướng về trang chính sau khi thêm thành công
                exit();
            } else {
                echo "Lỗi khi thêm sản phẩm.";
            }
        }
        // Hiển thị form để thêm sản phẩm mới
        require_once 'views/add.php';
    }
    public function edit() {
        // Lấy ID sản phẩm từ URL
        $id = $_GET['id'] ?? null;
        if ($id) {
            $productModel = new Product();
            $product = $productModel->getProductById($id); // Lấy sản phẩm theo ID

            // Kiểm tra xem có dữ liệu POST gửi lên không
            if (isset($_POST['add'])) {
                // Xử lý dữ liệu từ form
                $name = $_POST['name'] ?? '';
                $price = $_POST['price'] ?? 0;
                $description = $_POST['description'] ?? '';
                $image = $_FILES['image']['name'] ?? '';

                // Kiểm tra và xử lý file upload
                if ($image) {
                    $target_dir = "assets/uploads/";
                    $target_file = $target_dir . basename($image);
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                } else {
                    $target_file = $product['image']; // Giữ nguyên ảnh cũ nếu không có ảnh mới
                }

                // Tạo mảng dữ liệu để cập nhật vào database
                $data = [
                    'name' => $name,
                    'price' => $price,
                    'description' => $description,
                    'image' => $target_file
                ];

                // Cập nhật sản phẩm trong database
                if ($productModel->updateProduct($id, $data)) {
                    header("Location: index.php"); // Chuyển hướng về trang chính sau khi cập nhật thành công
                    exit();
                } else {
                    echo "Lỗi khi cập nhật sản phẩm.";
                }
            }

            // Hiển thị form để sửa sản phẩm
            require_once 'views/edit.php';
        } else {
            echo "ID sản phẩm không hợp lệ.";
        }
    }
    public function delete() {
        // Lấy ID sản phẩm từ URL
        $id = $_GET['id'] ?? null;
        if ($id) {
            $productModel = new Product();
            if ($productModel->deleteProduct($id)) {
                header("Location: index.php"); // Chuyển hướng về trang chính sau khi xóa thành công
                exit();
            } else {
                echo "Lỗi khi xóa sản phẩm.";
            }
        } else {
            echo "ID sản phẩm không hợp lệ.";
        }
    }
}