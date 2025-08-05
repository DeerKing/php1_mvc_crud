<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    
    <form action="" method="GET">
        <input type="hidden" name="action" value="home">
        <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
        <button type="submit">Tìm kiếm</button>
        <a href="index.php?action=add"><button type="button">Thêm sản phẩm</button></a>
    </form>
    <hr>
    <?php
    if(count($products) === 0) {
        echo "<p>Không có sản phẩm nào.</p>";        
    }
    ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['id']); ?></td>
                <td><img src=<?php echo $product['image'];?> width="80"/></td>
                <td>
                    <a href="<?php echo BASE_URL . 'index.php?action=product&id=' . $product['id']; ?>">
                   
                    <?php echo htmlspecialchars($product['name']); ?>
                    </a>
                </td>
                <td><?php echo htmlspecialchars($product['price']); ?></td>
                <td><?php echo htmlspecialchars($product['description']); ?></td>
                <td><a href="<?php echo BASE_URL . 'index.php?action=edit&id=' . $product['id']; ?>">Sửa</a></td>
                <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');" 
                   <?php echo BASE_URL . 'index.php?action=delete&id=' . $product['id']; ?>"
                 href="<?php echo BASE_URL . 'index.php?action=delete&id=' . $product['id']; ?>">Xóa</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="pagination">Trang
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                echo "<strong>$i</strong> "; // Trang hiện tại sẽ được in đậm
            } else {
                echo "<a href='?action=home&page=$i'>$i</a> "; // Liên kết đến các trang khác
            }
        }
        ?>
</body>
</html>