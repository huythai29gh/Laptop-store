<?php
include '../config/db.php';
include '../includes/admin_header.php';

$result = $conn->query("SELECT * FROM brands ORDER BY brand_id DESC");
?>
<link rel="stylesheet" href="style.css">

<div class="admin-container">
    <h2>Quản lý thương hiệu</h2>
    <a href="add_brand.php" class="btn-add">Thêm thương hiệu mới</a>

    <table class="admin-table">
        <tr>
            <th>ID</th>
            <th>Tên thương hiệu</th>
            <th>Hành động</th>
        </tr>
        <?php if($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['brand_id']; ?></td>
                    <td><?= $row['brand_name']; ?></td>
                    <td>
                        <a href="edit_brand.php?id=<?= $row['brand_id']; ?>" class="btn-edit">Sửa</a>
                        <a href="delete_brand.php?id=<?= $row['brand_id']; ?>" class="btn-delete" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" style="text-align:center;">Chưa có thương hiệu nào</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

