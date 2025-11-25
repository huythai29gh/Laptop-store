<?php
include '../config/db.php';
include '../includes/admin_header.php';

$categories = $conn->query("SELECT * FROM categories");
$brands = $conn->query("SELECT * FROM brands");
?>

<link rel="stylesheet" href="style.css">

<div class="admin-container">
    <h2>Thêm sản phẩm mới</h2>
    <a href="products.php" class="btn-back">← Quay lại</a>

    <form action="add_product_process.php" method="post" enctype="multipart/form-data" class="admin-form">
        <label>Tên sản phẩm:</label>
        <input type="text" name="name" required>

        <label>Giá (VNĐ):</label>
        <input type="number" name="price" required>

        <label>Danh mục:</label>
        <select name="category_id" required>
            <option value="">Chọn danh mục</option>
            <?php while($c = $categories->fetch_assoc()){ ?>
                <option value="<?= $c['category_id'] ?>"><?= $c['category_name'] ?></option>
            <?php } ?>
        </select>

        <label>Thương hiệu:</label>
        <select name="brand_id" required>
            <option value="">Chọn thương hiệu</option>
            <?php while($b = $brands->fetch_assoc()){ ?>
                <option value="<?= $b['brand_id'] ?>"><?= $b['brand_name'] ?></option>
            <?php } ?>
        </select>

        <label>Số lượng:</label>
        <input type="number" name="quantity" value="0" required>

        <label>Mô tả:</label>
        <textarea name="description" rows="4"></textarea>

        <label>Ảnh sản phẩm:</label>
        <input type="file" name="image">

        <button type="submit" class="btn-submit">Thêm sản phẩm</button>
    </form>
</div>

