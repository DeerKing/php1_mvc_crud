<?php
class Product extends BaseModel {
    protected $table = 'products';

    /**
     * Lấy tất cả sản phẩm trong database.
     */
    public function getAllProducts() {
        $query = "SELECT * FROM " . $this->table;//Viết câu lệnh SQL để lấy tất cả sản phẩm
        $stmt = $this->pdo->prepare($query);// Chuẩn bị câu lệnh SQL  
        //Prepared Statements để tranh lỗi tấn công SQL Injection      
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
}