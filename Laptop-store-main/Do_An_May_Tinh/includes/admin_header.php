<?php
// admin_header.php
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* Admin header styles */
        .admin-header {
            background: #007bff;
            color: #fff;
            padding: 12px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .admin-header .logo {
            font-size: 20px;
            font-weight: bold;
        }

        .admin-header nav {
            display: flex;
            gap: 15px;
        }

        .admin-header nav a {
            color: #fff;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .admin-header nav a:hover {
            background: #0056b3;
        }

        .admin-header .menu-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
        }

        /* Responsive */
        @media(max-width:768px) {
            .admin-header nav {
                display: none;
                flex-direction: column;
                width: 100%;
                margin-top: 10px;
            }

            .admin-header nav.active {
                display: flex;
            }

            .admin-header .menu-toggle {
                display: block;
            }
        }
    </style>
</head>

<body>
    <header class="admin-header">
        <div class="logo">Admin Panel</div>
        <div class="menu-toggle" onclick="document.querySelector('.admin-header nav').classList.toggle('active')">
            &#9776;</div>
        <nav>
            <a href="products.php">Sản phẩm</a>
            <a href="categories.php">Danh mục</a>
            <a href="brands.php">Thương hiệu</a>
            <a href="orders.php">Đơn hàng</a>
            <a href="../logout.php" style="background:#dc3545;">Đăng xuất</a>
        </nav>
    </header>