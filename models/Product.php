<?php
class Product extends BaseModel {
    protected $table = 'products';

    /**
     * Lấy tất cả sản phẩm trong database.
     */
    public function getAllProducts() {
        $query = "SELECT * FROM " . $this->table;//Viết câu lệnh SQL để lấy tất cả sản phẩm
        $stmt = $this->pdo->prepare($query);// Chuẩn bị câu lệnh SQL        
        $stmt->execute();// Thực thi câu lệnh SQL
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