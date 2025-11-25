<?php
include '../config/db.php';

$category_name = $_POST['category_name'];

$sql = "INSERT INTO categories (category_name) VALUES ('$category_name')";

if($conn->query($sql)){
    header("Location: categories.php");
} else {
    echo "Lỗi: ".$conn->error;
}
?>
