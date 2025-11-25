SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admin` (`id`, `username`, `password`, `reg_date`) VALUES
(1, 'admin', '123456', '0000-00-00 00:00:00');

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20),
  `address` text,
  `role` enum('user', 'admin') DEFAULT 'user',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`fullname`, `email`, `password`, `phone`, `address`, `role`) VALUES
('Nguyễn Văn A', 'hello@gmail.com', '123456', '0938900001', '123 Đường Cao Lỗ', 'user'),
('Trần Thị B', 'yasuo@gmail.com', '123456', '0938900002', '456 Đường Tây Sơn', 'user'),
('Phạm Văn C', 'xinchao@gmail.com', '123456', '0938900003', '789 Đường Hàng Bông', 'user'),
('Lê Thị D', 'yone@gmail.com', '123456', '0938900004', '321 Đường Ba Tháng Hai', 'user'),
('Hoàng Văn E', 'sasuke@gmail.com', '123456', '0938900005', '654 Đường Láng', 'user'),
('Vũ Thị F', 'qqqqqq@gmail.com', '123456', '0938900006', '987 Đường Thái Hà', 'user');

-- CREATE VIEW
CREATE VIEW `users_view` AS
SELECT 
  `user_id`,
  `fullname`,
  `email`,
  `phone`,
  `address`,
  `role`,
  `created_at`
FROM `users`;

COMMIT;