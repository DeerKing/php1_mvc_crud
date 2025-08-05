<h1>Sửa sản phẩm</h1>
<form action="" method="post" enctype="multipart/form-data" >
    <table>
        <tr>
            <th>Ảnh</th>
            <td>
                <input type="file" name="image">
                <img src="<?php echo $product['image'] ?>" alt="" width="80" />
            </td>            
        </tr>
        <tr>
            <th>Tên</th>
            <td><input type="text" name="name" id="" require value="<?php echo $product['name'];?>"></td>
        </tr>
        <tr>
            <th>Giá</th>
            <td><input type="number" name="price" id="" require  value="<?php echo $product['price'];?>"></td>
        </tr>
        <tr>
            <th>Mô tả</th>            
            <td><textarea name="description" id=""><?php echo $product['description'];?></textarea></td>
        </tr>
    </table>
<input type="submit" value="Lưu" name="add" />
</form>