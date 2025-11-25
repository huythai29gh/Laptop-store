<?php
include '../config/db.php';
include '../includes/admin_header.php';

$result = $conn->query("SELECT p.*, pi.image_url FROM products p
                        LEFT JOIN product_images pi ON p.product_id = pi.product_id
                        ORDER BY p.product_id DESC");
?>
<link rel="stylesheet" href="style.css">
<div class="admin-container">
    <h2>Quản lý sản phẩm</h2>
    <a href="add_product.php" class="btn-add">Thêm sản phẩm mới</a>

    <table class="admin-table">
        <tr>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Hành động</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td>
                <img src="../<?= $row['image_url'] ?>" alt="<?= $row['name'] ?>" style="width:100px;">
            </td>
            <td><?= $row['name'] ?></td>
            <td><?= number_format($row['price'],0,',','.') ?> VNĐ</td>
            <td><?= $row['quantity'] ?></td>
            <td>
                <a href="edit_product.php?id=<?= $row['product_id'] ?>" class="btn-edit">Sửa</a>
                <a href="delete_product.php?id=<?= $row['product_id'] ?>" class="btn-delete" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>