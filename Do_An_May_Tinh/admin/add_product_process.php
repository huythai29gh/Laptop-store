<?php
include '../config/db.php';

// Lấy dữ liệu từ form
$name = $_POST['name'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];
$brand_id = $_POST['brand_id'];
$quantity = $_POST['quantity'];
$description = $_POST['description'];

// Ảnh mặc định nếu không upload
$image_path = 'assets/image/default.jpg';

// Xử lý upload ảnh
if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
    $image_name = time().'_'.basename($_FILES['image']['name']);
    $target_dir = '../assets/image/'.$image_name;
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target_dir)){
        $image_path = 'assets/image/'.$image_name;
    }
}

// Thêm sản phẩm
$sql = "INSERT INTO products (name, price, category_id, brand_id, quantity, description)
        VALUES ('$name', '$price', '$category_id', '$brand_id', '$quantity', '$description')";

if($conn->query($sql)){
    $product_id = $conn->insert_id;

    // Thêm ảnh vào bảng product_images
    $conn->query("INSERT INTO product_images (product_id, image_url) VALUES ($product_id, '$image_path')");

    header("Location: products.php");
    exit;
} else {
    echo "Lỗi: ".$conn->error;
}
?>
