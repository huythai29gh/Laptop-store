<?php
include '../config/db.php';
?>
<link rel="stylesheet" href="style.css">

<div class="admin-container">
    <h2>Thêm danh mục mới</h2>
    <a href="categories.php" class="btn-back">← Quay lại</a>

    <form action="add_category_process.php" method="post" class="admin-form">
        <label>Tên danh mục:</label>
        <input type="text" name="category_name" required>
        <button type="submit" class="btn-submit">Thêm danh mục</button>
    </form>
</div>

