<?php
session_start();
$_SESSION = array(); // Xóa toàn bộ dữ liệu session
// Nếu muốn xóa luôn cookie session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy(); // Hủy session

header("Location: http://localhost/DATTCN/Laptop-store-main/Do_An_May_Tinh/index.php");
exit();
?>
