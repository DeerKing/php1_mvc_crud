<h1>Đây là trang chi tiết</h1>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <td><?php echo htmlspecialchars($product['id']); ?></td>
    </tr>
    <tr>
        <th>Tên sản phẩm</th>
        <td>          
            <?php echo htmlspecialchars($product['name']); ?>            
        </td>
    </tr>
    <tr>
        <th>Giá</th>
        <td><?php echo htmlspecialchars($product['price']); ?></td>
    </tr>
    <tr>
        <th>Mô tả</th>
        <td><?php echo htmlspecialchars($product['description']); ?></td>
    </tr>
</table>