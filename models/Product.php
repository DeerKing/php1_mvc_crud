<?php
class Product extends BaseModel {
    protected $table = 'products';
    public function countProducts() {
        $query = "SELECT COUNT(*) FROM " . $this->table; // Câu lệnh SQL để đếm số lượng sản phẩm
        $stmt = $this->pdo->prepare($query); // Chuẩn bị câu lệnh SQL
        $stmt->execute(); // Thực thi câu lệnh SQL
        return $stmt->fetchColumn(); // Trả về số lượng sản phẩm
    }
    /**
     * Lấy tất cả sản phẩm trong database.
     */
    public function getAllProducts($page = 1, $limit = 10) {
        $query = "SELECT * FROM ". $this->table ." ORDER BY id DESC LIMIT :start_from, :limit";
        // Câu lệnh SQL để lấy tất cả sản phẩm, sắp xếp theo ID ASC lầ giảm dần, DESC là tăng dần
        $start_from = ($page - 1) * $limit; // Tính toán offset dựa trên trang hiện tại và giới hạn
        //Viết câu lệnh SQL để lấy tất cả sản phẩm
        $stmt = $this->pdo->prepare($query);// Chuẩn bị câu lệnh SQL  
        //Prepared Statements để tranh lỗi tấn công SQL Injection     s 
        // Bằng cách sử dụng dấu hai chấm (:) trước tên biến, chúng ta có thể sử dụng các tham số trong câu lệnh SQL
        $stmt->bindParam(':start_from', $start_from, PDO::PARAM_INT); // Gán giá trị offset với kiểu dữ liệu là số nguyên
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT); // Gán giá trị giới hạn với kiểu dữ liệu là số nguyên
        $stmt->execute();// Thực thi câu lệnh SQL

        // FETCH_ASSOC (default): Trả về dữ liệu dạng mảng với key là tên của column (column của các table trong database)
        // FETCH_BOTH : Trả về dữ liệu dạng mảng với key là tên của column và cả số thứ tự của column
        // FETCH_NUM: Trả về dữ liệu dạng mảng với key là số thứ tự của column

        return $stmt->fetchAll(PDO::FETCH_ASSOC);// Trả về tất cả sản phẩm dưới dạng mảng kết hợp
    }

    /**
     * Lấy sản phẩm theo ID.
     */
    public function getProductById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Tìm sản phẩm theo từ khóa.
     */ 
    public function search($keyword) {
        $query = "SELECT * FROM " . $this->table . " WHERE name LIKE :keyword";
        $stmt = $this->pdo->prepare($query);
        $keyword = '%' . $keyword . '%'; // Thêm dấu % để tìm kiếm theo từ khóa
        $stmt->bindParam(':keyword', $keyword);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Thêm sản phẩm mới vào database.
     */
    public function addProduct($data) {
        $query = "INSERT INTO " . $this->table . " (name, price, description, image) VALUES (:name, :price, :description, :image)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':image', $data['image']);
        return $stmt->execute(); // Trả về true nếu thêm thành công, false nếu thất bại
    }
    public function updateProduct($id, $data) {
        $query = "UPDATE " . $this->table . " SET name = :name, price = :price, description = :description, image = :image WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute(); // Trả về true nếu cập nhật thành công, false nếu thất bại
    }
    public function deleteProduct($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute(); // Trả về true nếu xóa thành công, false nếu thất bại
    }   
}