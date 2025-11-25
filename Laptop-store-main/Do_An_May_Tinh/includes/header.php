<?php
// header.php (updated: thêm tìm kiếm + đăng nhập + đăng ký)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="user-profile">
                    <span class="user-name">
                        <i class="fas fa-user-circle"></i> 
                        <?php echo htmlspecialchars($_SESSION['fullname']); ?>
                    </span>
                    <div class="dropdown-menu">
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                            <a href="<?php echo $base_url; ?>/admin/index.php">Quản lý</a>
                        <?php endif; ?>
                        <a href="<?php echo $base_url; ?>/Authen/logout.php">Đăng xuất</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="<?php echo $base_url; ?>/Authen/login.php" class="login-btn">Đăng nhập</a>
                <a href="<?php echo $base_url; ?>/Authen/register.php" class="register-btn">Đăng ký</a>
            <?php endif; ?>
        </div>

        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
    </div>
</header>
<div id="toast-message" class="toast-hidden"></div>

<script>
    function toggleMenu() {
        document.querySelector('.navbar ul').classList.toggle('active');
    }
    document.addEventListener('DOMContentLoaded', function() {
    const userProfile = document.querySelector('.user-profile');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    if(userProfile && dropdownMenu) {
        userProfile.addEventListener('click', function(e) {
            e.stopPropagation(); // ngăn chặn click lan ra
            dropdownMenu.classList.toggle('show');
        });

        // click ra ngoài để đóng dropdown
        document.addEventListener('click', function() {
            dropdownMenu.classList.remove('show');
        });
    }
});
</script>