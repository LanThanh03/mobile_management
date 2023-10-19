-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 15, 2023 at 04:06 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_library`
--

DROP TABLE IF EXISTS `image_library`;
CREATE TABLE IF NOT EXISTS `image_library` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_time` int NOT NULL,
  `last_updated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `image_library`
--

INSERT INTO `image_library` (`id`, `product_id`, `path`, `created_time`, `last_updated`) VALUES
(5, 5, 'uploads/12-10-2023/shoes-6(1).jpg', 1697095206, 1697095206),
(6, 5, 'uploads/12-10-2023/shoes-7(1).jpg', 1697095206, 1697095206),
(7, 5, 'uploads/12-10-2023/shoes-8(1).jpg', 1697095206, 1697095206),
(8, 5, 'uploads/12-10-2023/shoes-9(1).jpg', 1697095206, 1697095206);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `position` int NOT NULL,
  `created_time` int NOT NULL,
  `last_updated` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `name`, `link`, `position`, `created_time`, `last_updated`) VALUES
(4, 0, 'Level 1', 'home2.php', 0, 1555232698, 1555232698),
(5, 4, 'Level 2', 'product.php', 1, 1555232976, 1555232976),
(6, 5, 'Level 3', 'product.php', 0, 1555232976, 1555232976),
(7, 6, 'Level 4', 'home.php', 0, 1555232976, 1555232976),
(8, 4, 'Level 2.2', 'product.php', 2, 1555232976, 1555232976),
(9, 8, 'Level 3.2', 'product.php', 1, 1555427808, 1555427808),
(10, 7, 'Level 5', 'home.php', 0, 1555427808, 1555427808),
(16, 0, 'Level 1.2', 'home2.php', 1, 1555232698, 1555232698),
(17, 10, 'Level 6', '#', 1, 1555542591, 1555542591),
(20, 17, 'Level 7', '#', 1, 1555542591, 1555542591),
(21, 16, 'Level 2.2.2', 'home2.php', 1, 1555232698, 1555232698);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `note` text NOT NULL,
  `total` int NOT NULL,
  `created_time` int NOT NULL,
  `last_updated` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `created_time` int NOT NULL,
  `last_updated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

DROP TABLE IF EXISTS `privilege`;
CREATE TABLE IF NOT EXISTS `privilege` (
  `id` int NOT NULL AUTO_INCREMENT,
  `group_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `url_match` varchar(255) NOT NULL,
  `created_time` int NOT NULL,
  `last_updated` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `group_id`, `name`, `url_match`, `created_time`, `last_updated`) VALUES
(1, 1, 'Danh sÃ¡ch sáº£n pháº©m', 'product_listing\\.php$', 1553185530, 1553185530),
(2, 1, 'XÃ³a sáº£n pháº©m', 'product_delete\\.php\\?id=\\d+$', 1553185530, 1553185530),
(3, 1, 'Sá»­a sáº£n pháº©m', 'product_editing\\.php\\?id=\\d+$|product_editing\\.php\\?action=edit&id=\\d+$', 1553185530, 1553185530),
(4, 1, 'ThÃªm sáº£n pháº©m', 'product_editing\\.php$|product_editing\\.php\\?action=add$', 1553185530, 1553185530),
(5, 1, 'Copy sáº£n pháº©m', 'product_editing\\.php\\?id=\\d+&task=copy', 1553185530, 1553185530),
(6, 4, 'Danh sÃ¡ch danh má»¥c', 'menu_listing\\.php$', 1553185530, 1553185530),
(7, 4, 'XÃ³a danh má»¥c', 'menu_delete\\.php\\?id=\\d+$', 1553185530, 1553185530),
(8, 4, 'Sá»­a danh má»¥c', 'menu_editing\\.php\\?id=\\d+$', 1553185530, 1553185530),
(9, 4, 'ThÃªm danh má»¥c', 'menu_editing\\.php$', 1553185530, 1553185530),
(10, 4, 'Copy danh má»¥c', 'menu_editing\\.php\\?id=\\d+&task=copy', 1553185530, 1553185530),
(11, 3, 'Danh sÃ¡ch Ä‘Æ¡n hÃ ng', 'order_listing\\.php$', 1553185530, 1553185530),
(12, 2, 'PhÃ¢n quyá»n quáº£n trá»‹', 'member_privilege\\.php\\?id=\\d+$|member_privilege\\.php\\?action=save$', 1553185530, 1553185530),
(13, 2, 'Danh sÃ¡ch thÃ nh viÃªn', 'member_listing\\.php$', 1553185530, 1553185530),
(14, 2, 'XÃ³a thÃ nh viÃªn', 'member_delete\\.php\\?id=\\d+$', 1553185530, 1553185530),
(15, 2, 'Sá»­a thÃ nh viÃªn', 'member_editing\\.php\\?id=\\d+$|member_editing\\.php\\?action=edit&id=\\d+$', 1553185530, 1553185530),
(16, 2, 'ThÃªm thÃ nh viÃªn', 'member_editing\\.php$|member_editing\\.php\\?action=add$', 1553185530, 1553185530);

-- --------------------------------------------------------

--
-- Table structure for table `privilege_group`
--

DROP TABLE IF EXISTS `privilege_group`;
CREATE TABLE IF NOT EXISTS `privilege_group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `position` int NOT NULL,
  `created_time` int NOT NULL,
  `last_updated` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `privilege_group`
--

INSERT INTO `privilege_group` (`id`, `name`, `position`, `created_time`, `last_updated`) VALUES
(1, 'Sáº£n pháº©m', 2, 1553185530, 1553185530),
(2, 'ThÃ nh viÃªn', 4, 1553185530, 1553185530),
(3, 'ÄÆ¡n hÃ ng', 3, 1553185530, 1553185530),
(4, 'Danh má»¥c', 1, 1553185530, 1553185530);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `quantity` int NOT NULL,
  `content` text NOT NULL,
  `created_time` int NOT NULL,
  `last_updated` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `quantity`, `content`, `created_time`, `last_updated`) VALUES
(1, 'Samsung Galaxy Zfold 5', 'uploads/sszfold5.jpg', 25999000, 0, 'Chip Snapdragon 8 Gen 2 for Galaxy, RAM: 12 GB, Dung lượng: 256 GB', 0, 0),
(2, 'Iphone 15 Plus', 'uploads/iphone15plus.jpg', 24999000, 0, 'Chip Snapdragon 8 Gen 2 for Galaxy, RAM: 12 GB, Dung lượng: 256 GB', 1552615987, 1552615987),
(3, 'Samsung Zflip 5', 'uploads/sszflip5.jpg', 21999000, 0, 'Chip Snapdragon 8 Gen 2 for Galaxy, RAM: 12 GB, Dung lượng: 256 GB', 1552615987, 1552615987),
(4, 'GiÃ y bÃ³ng Ä‘Ã¡ 5', 'uploads/sszfold5.jpg', 684000, 0, 'Chip Snapdragon 8 Gen 2 for Galaxy, RAM: 12 GB, Dung lượng: 256 GB', 1552615987, 1552615987),
(5, 'Giay bong da 10', 'uploads/sszfold5.jpg', 580000, 0, '<p>test test test test&nbsp;test test test test&nbsp;test test test test&nbsp;test test test test&nbsp;test test test test&nbsp;test test test test&nbsp;test test test test&nbsp;test test test test</p>\r\n', 1552615987, 1697095206),
(6, 'GiÃ y bÃ³ng Ä‘Ã¡ 7', 'uploads/sszfold5.jpg', 1320000, 0, 'GiÃ y bÃ³ng Ä‘Ã¡ 7 sÃ¢n cá» nhÃ¢n táº¡o', 1552615987, 1552615987),
(7, 'GiÃ y bÃ³ng Ä‘Ã¡ 8', 'uploads/sszfold5.jpg', 1450000, 0, 'GiÃ y bÃ³ng Ä‘Ã¡ 8 sÃ¢n cá» nhÃ¢n táº¡o', 1552615987, 1552615987),
(8, 'GiÃ y thá»ƒ thao', 'uploads/sszfold5.jpg', 1000000, 0, '<p>Gi&agrave;y b&oacute;ng Ä‘&aacute; 9 s&acirc;n cá» nh&acirc;n táº¡o</p>\r\n', 1552615987, 1554822153),
(9, 'Iphone 15 Promax 128GB', 'uploads/sszfold5.jpg', 33999000, 0, 'abcxyz\r\n', 1552615987, 1697370659),
(10, 'GiÃ y thá»ƒ thao 2', 'uploads/sszfold5.jpg', 1500000, 0, 'GiÃ y bÃ³ng Ä‘Ã¡ 2 sÃ¢n cá» nhÃ¢n táº¡o', 1552615987, 1552615987),
(11, 'GiÃ y thá»ƒ thao 3', 'uploads/sszfold5.jpg', 780000, 0, 'GiÃ y bÃ³ng Ä‘Ã¡ 3 sÃ¢n cá» nhÃ¢n táº¡o', 1552615987, 1552615987),
(12, 'GiÃ y thá»ƒ thao 4', 'uploads/sszfold5.jpg', 657000, 0, 'GiÃ y bÃ³ng Ä‘Ã¡ 4 sÃ¢n cá» nhÃ¢n táº¡o', 1552615987, 1552615987),
(13, 'Samsung Galaxy Zfold 5', 'uploads/sszfold5.jpg', 26999000, 0, '<p>Chip Snapdragon 8 Gen 2 for Galaxy RAM: 12 GB Dung lượng: 256 GB&nbsp;Chip Snapdragon 8 Gen 2 for Galaxy RAM: 12 GB Dung lượng: 256 GB&nbsp;Chip Snapdragon 8 Gen 2 for Galaxy RAM: 12 GB Dung lượng: 256 GB&nbsp;Chip Snapdragon 8 Gen 2 for Galaxy RAM: 12 GB Dung lượng: 256 GB&nbsp;Chip Snapdragon 8 Gen 2 for Galaxy RAM: 12 GB Dung lượng: 256 GB&nbsp;Chip Snapdragon 8 Gen 2 for Galaxy RAM: 12 GB Dung lượng: 256 GB</p>\r\n', 1697358615, 1697373287),
(45, 'Samsung Galaxy Zfold 5', 'uploads/sszfold5.jpg', 25999000, 0, 'Chip Snapdragon 8 Gen 2 for Galaxy\r\n\r\nRAM: 12 GB\r\n\r\nDung lượng: 256 GB', 0, 0),
(46, 'Iphone 15 Plus', 'uploads/iphone15plus.jpg', 24999000, 0, '• Màn hình Dynamic Island thay thế tai thỏ đầy tiện lợi\r\n• 5 phiên bản màu đặc sắc với thiết kế mặt kính pha màu đầu tiên trên thị trường\r\n• Sử dụng chip A16 Bionic cho hiệu năng vượt trội', 1552615987, 1552615987),
(47, 'Samsung Zflip 5', 'uploads/sszflip5.jpg', 21999000, 0, 'Chip Snapdragon 8 Gen 2 for Galaxy\r\n\r\nRAM: 8 GB\r\n\r\nDung lượng: 256 GB\r\n\r\nCamera sau: 2 camera 12 MP\r\n\r\nCamera trước: 10 MP\r\n\r\nPin 3700 mAh, Sạc 25 W', 1552615987, 1552615987),
(48, 'GiÃ y bÃ³ng Ä‘Ã¡ 5', 'uploads/sszfold5.jpg', 684000, 0, 'Chip Snapdragon 8 Gen 2 for Galaxy\r\n\r\nRAM: 8 GB\r\n\r\nDung lượng: 256 GB\r\n\r\nCamera sau: 2 camera 12 MP\r\n\r\nCamera trước: 10 MP\r\n\r\nPin 3700 mAh, Sạc 25 W', 1552615987, 1552615987),
(49, 'Giay bong da 10', 'uploads/sszfold5.jpg', 580000, 0, '<p>test test test test&nbsp;test test test test&nbsp;test test test test&nbsp;test test test test&nbsp;test test test test&nbsp;test test test test&nbsp;test test test test&nbsp;test test test test</p>\r\n', 1552615987, 1697095206),
(50, 'GiÃ y bÃ³ng Ä‘Ã¡ 7', 'uploads/sszfold5.jpg', 1320000, 0, 'GiÃ y bÃ³ng Ä‘Ã¡ 7 sÃ¢n cá» nhÃ¢n táº¡o', 1552615987, 1552615987),
(51, 'GiÃ y bÃ³ng Ä‘Ã¡ 8', 'uploads/sszfold5.jpg', 1450000, 0, 'GiÃ y bÃ³ng Ä‘Ã¡ 8 sÃ¢n cá» nhÃ¢n táº¡o', 1552615987, 1552615987),
(52, 'GiÃ y thá»ƒ thao', 'uploads/sszfold5.jpg', 1000000, 0, '<p>Gi&agrave;y b&oacute;ng Ä‘&aacute; 9 s&acirc;n cá» nh&acirc;n táº¡o</p>\r\n', 1552615987, 1554822153),
(53, 'Iphone 15 Promax 128GB', 'uploads/sszfold5.jpg', 33999000, 0, '<p><span style=\"background-color:rgb(255, 239, 213); font-family:arial,helvetica,sans-serif; font-size:16px\">&bull; T&iacute;ch hợp camera 48 MP</span><br />\r\n<span style=\"background-color:rgb(255, 239, 213); font-family:arial,helvetica,sans-serif; font-size:16px\">&bull; N&uacute;t t&aacute;c vụ (Action Button) thay thế cần gạt rung</span><br />\r\n<span style=\"background-color:rgb(255, 239, 213); font-family:arial,helvetica,sans-serif; font-size:16px\">&bull; Chuyển đổi cổng sạc USB-C, truyền tải dữ liệu tốc độ cao</span></p>\r\n', 1552615987, 1697370659),
(54, 'GiÃ y thá»ƒ thao 2', 'uploads/sszfold5.jpg', 1500000, 0, 'GiÃ y bÃ³ng Ä‘Ã¡ 2 sÃ¢n cá» nhÃ¢n táº¡o', 1552615987, 1552615987),
(55, 'GiÃ y thá»ƒ thao 3', 'uploads/sszfold5.jpg', 780000, 0, 'GiÃ y bÃ³ng Ä‘Ã¡ 3 sÃ¢n cá» nhÃ¢n táº¡o', 1552615987, 1552615987),
(57, 'Samsung Galaxy Zfold 5', 'uploads/sszfold5.jpg', 26999000, 0, 'Chip Snapdragon 8 Gen 2 for Galaxy RAM: 12 GB Dung lượng: 256 GB&nbsp;Chip Snapdragon 8 Gen 2 for Galaxy RAM: 12 GB Dung lượng: 256 GB&nbsp;Chip Snapdragon 8 Gen 2 for Galaxy RAM: 12 GB Dung lượng: 256 GB&nbsp;Chip Snapdragon 8 Gen 2 for Galaxy RAM: 12 GB Dung lượng: 256 GB&nbsp;Chip Snapdragon 8 Gen 2 for Galaxy RAM: 12 GB Dung lượng: 256 GB&nbsp;Chip Snapdragon 8 Gen 2 for Galaxy RAM: 12 GB Dung lượng: 256 GB\r\n', 1697358615, 1697373287);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_time` int NOT NULL,
  `last_updated` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `birthday`, `status`, `created_time`, `last_updated`) VALUES
(12, 'thanhadmin', 'Vo Tran Lan Thanh', 'fcea920f7412b5da7be0cf42b8c93759', 1068681600, 1, 1697090719, 1697090719),
(13, 'thanhtest1', 'vo tran lan thanh', '25d55ad283aa400af464c76d713c07ad', 1068681600, 1, 1697358461, 1697358461);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_library`
--
ALTER TABLE `image_library`
  ADD CONSTRAINT `image_library_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `privilege_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `privilege_group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
