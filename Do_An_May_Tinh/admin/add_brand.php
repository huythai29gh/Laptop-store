<?php
include '../config/db.php';
?>
<link rel="stylesheet" href="style.css">

<div class="admin-container">
    <h2>Thêm thương hiệu mới mới</h2>
    <a href="brands.php" class="btn-back">← Quay lại</a>

    <form action="add_brand_process.php" method="post" class="admin-form">
        <label>Tên thương hiệu:</label>
        <input type="text" name="brand_name" required>
        <button type="submit" class="btn-submit">Thêm thương hiệu</button>
    </form>
</div>