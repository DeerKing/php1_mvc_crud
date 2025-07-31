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
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Mô tả</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['id']); ?></td>
                <td>
                    <a href="<?php echo BASE_URL . 'index.php?action=product&id=' . $product['id']; ?>">
                   
                    <?php echo htmlspecialchars($product['name']); ?>
                    </a>
                </td>
                <td><?php echo htmlspecialchars($product['price']); ?></td>
                <td><?php echo htmlspecialchars($product['description']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>