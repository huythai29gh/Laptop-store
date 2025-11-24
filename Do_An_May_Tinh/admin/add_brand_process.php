<?php
include '../config/db.php';

$brand_name = $_POST['brand_name'];


$sql = "INSERT INTO brands (brand_name) VALUES ('$brand_name')";

if($conn->query($sql)){
    header("Location: brands.php");
    exit;
} else {
    echo "Lỗi: ".$conn->error;
}
?>
