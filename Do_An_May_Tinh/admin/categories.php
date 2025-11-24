<?php
    include '../config/db.php';
    include '../includes/admin_header.php';


    echo '<div class="admin-container">';
    echo '<h2>Quản lý danh mục</h2>';
    echo '<a href="add_category.php" class="btn-add">Thêm danh mục mới</a>';

    $result = $conn->query("SELECT * FROM categories ORDER BY category_id DESC");

    echo '<table class="admin-table">';
    echo '<tr><th>ID</th><th>Tên danh mục</th><th>Hành động</th></tr>';

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo '<tr>';
            echo '<td>'.$row['category_id'].'</td>';
            echo '<td>'.$row['category_name'].'</td>';
            echo '<td>
                    <a href="edit_category.php?id='.$row['category_id'].'" class="btn-edit">Sửa</a>
                    <a href="delete_category.php?id='.$row['category_id'].'" class="btn-delete" onclick="return confirm(\'Bạn có chắc muốn xóa?\')">Xóa</a>
                </td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="3" style="text-align:center;">Chưa có danh mục nào</td></tr>';
    }

    echo '</table></div>';
?>
<link rel="stylesheet" href="style.css">
