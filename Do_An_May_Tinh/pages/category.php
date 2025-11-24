<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<?php
include '../config/db.php';
include '../includes/header.php';

$cat_id = $_GET['id'];

$sql = "SELECT p.*, pi.image_url 
        FROM products p
        LEFT JOIN product_images pi 
        ON p.product_id = pi.product_id
        WHERE p.category_id = $cat_id";

$result = $conn->query($sql);
?>

<div class="product-grid">
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="product-card">
            <img src="../<?= $row['image_url'] ?: 'assets/images/default.jpg' ?>">

            <h3><?= $row['name'] ?></h3>

            <p><?= number_format($row['price'], 0, ',', '.') ?> đ</p>

            <div class="product-buttons">
                <a href="product_detail.php?id=<?= $row['product_id'] ?>" class="btn btn-detail">
                    Xem chi tiết
                </a>

                <a href="add_to_cart.php?id=<?= $row['product_id'] ?>" class="btn cart-btn">
                    <i class="fas fa-cart-plus"></i>
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php include '../includes/frooter.php'?>
<script src="../assets/js/script.js"></script>

