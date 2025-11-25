// assets/js/script.js
console.log('Cart script loaded successfully');

function showNotification(message = 'Đã thêm vào giỏ hàng thành công!') {
  let notification = document.getElementById('notificationMessage');

  if (!notification) {
    notification = document.createElement('div');
    notification.id = 'notificationMessage';
    notification.style.cssText = `
      position: fixed;
      top: 20px;
      right: 20px;
      background: #4CAF50;
      color: white;
      padding: 15px 20px;
      border-radius: 5px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      z-index: 9999;
      font-size: 14px;
      animation: slideIn 0.3s ease-out;
    `;
    document.body.appendChild(notification);
  }

  notification.textContent = message;
  notification.style.display = 'block';

  setTimeout(() => {
    notification.style.display = 'none';
  }, 3000);
}

document.addEventListener('DOMContentLoaded', function () {
  const cartButtons = document.querySelectorAll('.cart-btn');
  console.log('Found cart buttons:', cartButtons.length);

  cartButtons.forEach(button => {
    button.addEventListener('click', function (e) {
      e.preventDefault();

      const originalHref = this.getAttribute('href');
      console.log('Original href:', originalHref);
      console.log('Current path:', window.location.pathname);

      // XỬ LÝ ĐƯỜNG DẪN ĐƠN GIẢN - LUÔN DÙNG ĐƯỜNG DẪN TUYỆT ĐỐI
      const currentPath = window.location.pathname;
      let fetchUrl;

      if (currentPath.includes('/pages/')) {
        // Đang ở trong pages/ -> add_to_cart.php cùng thư mục
        fetchUrl = originalHref;
      } else {
        // Đang ở ngoài (index.php) -> cần vào pages/
        fetchUrl = 'pages/' + originalHref;
      }

      console.log('Final fetch URL:', fetchUrl);

      // Hiển thị loading
      const originalHTML = this.innerHTML;
      this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
      this.style.pointerEvents = 'none';

      // Gọi AJAX
      fetch(fetchUrl)
        .then(response => {
          if (!response.ok) {
            throw new Error('Network error');
          }
          return response.json();
        })
        .then(data => {
          console.log('Response data:', data);

          // Khôi phục nút
          this.innerHTML = originalHTML;
          this.style.pointerEvents = 'auto';

          if (data.status === 'success') {
            showNotification(data.message);
          } else {
            showNotification('❌ ' + data.message);
          }
        })
        .catch(error => {
          console.error('Fetch error:', error);

          // Khôi phục nút
          this.innerHTML = originalHTML;
          this.style.pointerEvents = 'auto';
          showNotification('❌ Có lỗi xảy ra khi thêm vào giỏ hàng');
        });
    });
  });
});

// Thêm CSS animation
const style = document.createElement('style');
style.textContent = `
  @keyframes slideIn {
    from {
      opacity: 0;
      transform: translateX(100%);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }
  
  .fa-spinner {
    animation: spin 1s linear infinite;
  }
  
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
`;
document.head.appendChild(style);