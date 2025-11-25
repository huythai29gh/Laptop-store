<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<?php
include './config/db.php';
include './includes/header.php';
?>

<main class="main-content">
  <!-- Banner / Slider -->
  <section class="banner">
    <img src="assets/image/banner.jpg" alt="Banner" style="width:100%; max-height:400px; object-fit:cover;">
  </section>


  <section class="products">
    <h2>Danh mục sản phẩm</h2>

    <!-- Danh mục (nếu có) -->
    <div class="category-list">
      <?php
      include './config/db.php';
      $cat_sql = "SELECT * FROM categories ORDER BY category_name ASC";
      $cats = $conn->query($cat_sql);
      if ($cats->num_rows > 0) {
        while ($c = $cats->fetch_assoc()) {
          echo '<a href="pages/category.php?id=' . $c['category_id'] . '">' . $c['category_name'] . '</a>';
        }
      }
      ?>
    </div>

    <!-- Grid sản phẩm -->
    <div class="product-grid">
      <?php
      $sql = "SELECT p.*, pi.image_url FROM products p 
                LEFT JOIN product_images pi ON p.product_id = pi.product_id
                ORDER BY p.product_id DESC LIMIT 8";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="product-card">';
          $img = $row['image_url'] ? $row['image_url'] : 'assets/images/default.jpg';
          echo '<img src="' . $img . '" alt="' . $row['name'] . '">';
          echo '<h3>' . $row['name'] . '</h3>';
          echo '<p>' . number_format($row['price'], 0, ',', '.') . ' đ</p>';
          echo '<div class="product-buttons">';
          echo '<a href="product_detail.php?id=' . $row['product_id'] . '" class="btn btn-detail">Xem chi tiết</a>';
          echo '<a href="pages/add_to_cart.php?id=' . $row['product_id'] . '" class="btn cart-btn">';
          echo '<i class="fas fa-cart-plus"></i>';
          echo '</a>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo '<p style="text-align:center;">Chưa có sản phẩm nào</p>';
      }
      ?>
    </div>
  </section>
</main>
<?php
include 'includes/frooter.php'
?>
<script src="assets/js/script.js"></script>