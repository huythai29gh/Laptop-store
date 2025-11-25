
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<?php
session_start();
include '../config/db.php';
include '../includes/header.php';

$user_id = 1;

// lấy giỏ hàng
$sql = "SELECT c.cart_id, c.quantity, 
               p.name, p.price, pi.image_url
        FROM cart c
        JOIN products p ON c.product_id = p.product_id
        LEFT JOIN product_images pi ON p.product_id = pi.product_id
        WHERE c.user_id = $user_id";

$result = $conn->query($sql);
?>


<div class="cart-container">
    <!-- Hiện thông báo thành công -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert success">
            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if ($result->num_rows == 0): ?>
        <p>Giỏ hàng trống.</p>
    <?php else: ?>
        <table class="cart-table">
            <tr>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Xóa</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><img class="cart-img" src="../<?= $row['image_url'] ?>"></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= number_format($row['price']) ?> đ</td>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= number_format($row['price'] * $row['quantity']) ?> đ</td>
                    <td>
                        <a href="remove_cart.php?id=<?= $row['cart_id'] ?>" class="delete-btn">X</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
</div>
