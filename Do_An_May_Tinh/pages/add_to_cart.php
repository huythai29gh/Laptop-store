<?php
session_start();
include '../config/db.php';

// Đặt header này để báo cho trình duyệt biết server trả về JSON
header('Content-Type: application/json');

// Mảng kết quả trả về mặc định
$response = [
    'status' => 'error',
    'message' => 'Có lỗi xảy ra'
];

if (!isset($_GET['id'])) {
    $response['message'] = 'Không tìm thấy ID sản phẩm';
    echo json_encode($response);
    exit();
}

$product_id = intval($_GET['id']);
$user_id = 1; // User tạm

// Kiểm tra sp có trong giỏ chưa
$sql_check = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id";
$check = $conn->query($sql_check);

if ($check->num_rows > 0) {
    // Tăng số lượng
    $conn->query("UPDATE cart SET quantity = quantity + 1 WHERE user_id = $user_id AND product_id = $product_id");
} else {
    // Thêm mới
    $conn->query("INSERT INTO cart (user_id, product_id, quantity) VALUES ($user_id, $product_id, 1)");
}

// Cập nhật trạng thái thành công
$response['status'] = 'success';
$response['message'] = '✅ Đã thêm vào giỏ hàng thành công!';

// Trả về JSON
echo json_encode($response);
exit();
?>