<?php
// header.php (updated: thêm tìm kiếm + đăng nhập + đăng ký)
$base_url = '/Do_An_May_Tinh';
?>
<link rel="stylesheet" href="../assets/css/style.css">
<header class="main-header">
    <div class="container">
        <div class="logo">Laptop</div>
        <nav class="navbar">
            <ul>
                <li><a href="<?php echo $base_url; ?>/index.php">TRANG CHỦ</a></li>
                <li><a href="#">LAPTOP</a></li>
                <li><a href="#">CHUỘT</a></li>
                <li><a href="#">BÀN PHÍM</a></li>
                <li><a href="#">DỊCH VỤ</a></li>
                <li><a href="<?php echo $base_url; ?>/pages/cart.php"><i class="fas fa-shopping-cart"></i></a></li>
            </ul>
        </nav>

        <!-- Search box -->
        <div class="search-box">
            <input type="text" placeholder="Tìm kiếm sản phẩm...">
            <button>🔍</button>
        </div>

        <!-- Auth buttons -->
        <div class="auth-btns">
            <button class="login-btn">Đăng nhập</button>
            <button class="register-btn">Đăng ký</button>
        </div>

        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
    </div>
</header>
<div id="toast-message" class="toast-hidden"></div>

<script>
    function toggleMenu() {
        document.querySelector('.navbar ul').classList.toggle('active');
    }
</script>