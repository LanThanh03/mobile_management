-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 05:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_db_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_library`
--

CREATE TABLE `image_library` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `image_library`
--

INSERT INTO `image_library` (`id`, `product_id`, `path`, `created_time`, `last_updated`) VALUES
(13, 24, 'uploads/19-10-2023/iphone15plus.jpg', 1697713521, 1697713521),
(14, 24, 'uploads/19-10-2023/iphone15promax.jpg', 1697713521, 1697713521),
(15, 24, 'uploads/19-10-2023/sszflip5.jpg', 1697713521, 1697713521),
(16, 25, 'uploads/19-10-2023/iphone15plus(1).jpg', 1697731242, 1697731242),
(17, 25, 'uploads/19-10-2023/iphone15promax.jpg', 1697731242, 1697731242),
(18, 25, 'uploads/19-10-2023/sszflip5.jpg', 1697731242, 1697731242),
(19, 25, 'uploads/19-10-2023/sszfold5.jpg', 1697731242, 1697731242),
(20, 52, 'uploads/03-11-2023/iphone14pro.png', 1698996731, 1698996731),
(21, 52, 'uploads/03-11-2023/iphone14promax.png', 1698996731, 1698996731),
(22, 52, 'uploads/03-11-2023/iphone15.png', 1698996731, 1698996731),
(23, 52, 'uploads/03-11-2023/iphone15plus.jpg', 1698996731, 1698996731);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `note` text NOT NULL,
  `total` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_updated`) VALUES
(11, 'thanh', '0846188619', 'Cần Giuộc, Long An', 'gdbffcfvdfv', 72997000, 1697712481, 1697712481),
(12, 'thanh', '0846188619', 'Cần Giuộc, Long An', 'hhhhhh', 6840000, 1697712644, 1697712644),
(13, 'thanh', '0846188619', 'Cần Giuộc, Long An', '', 21999000, 1697712660, 1697712660),
(14, 'LÃª Thá»‹ XuÃ¢n Thu', '(+84) 562441851', 'Kha Váº¡n CÃ¢n', 'Cho mÃ¬nh xin cÃ¡i nÆ¡ mÃ u hÆ°á»ng', 45589000, 1698641696, 1698641696),
(15, 'lan thanh', '0342934923', 'Tân Bình, TPHCM', 'tetstye', 41470000, 1698860729, 1698860729),
(16, 'thanh', '2302128', 'hhh', 'tét', 19190000, 1699106386, 1699106386),
(17, 'thanh', '014182328', 'long an ', '123', 19590000, 1699107103, 1699107103),
(18, 'thanh', '014182328', 'long an ', '123', 19590000, 1699107209, 1699107209),
(19, 'thanh', '014182328', 'long an ', 'tặng em Bình gold', 24999000, 1699119269, 1699119269);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES
(47, 11, 1, 1, 25999000, 1697712481, 1697712481),
(48, 11, 2, 1, 24999000, 1697712481, 1697712481),
(49, 11, 3, 1, 21999000, 1697712481, 1697712481),
(50, 12, 4, 10, 684000, 1697712644, 1697712644),
(51, 13, 3, 1, 21999000, 1697712660, 1697712660),
(52, 14, 3, 1, 25999000, 1698641696, 1698641696),
(53, 14, 4, 1, 19590000, 1698641696, 1698641696),
(54, 15, 4, 1, 19590000, 1698860729, 1698860729),
(55, 15, 9, 1, 13390000, 1698860729, 1698860729),
(56, 15, 10, 1, 8490000, 1698860729, 1698860729),
(57, 16, 46, 1, 19190000, 1699106386, 1699106386),
(58, 17, 4, 1, 19590000, 1699107103, 1699107103),
(59, 18, 4, 1, 19590000, 1699107209, 1699107209),
(60, 19, 15, 1, 24999000, 1699119269, 1699119269);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL,
  `category` varchar(244) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `quantity`, `content`, `created_time`, `last_updated`, `category`) VALUES
(1, 'Điện thoại Samsung Galaxy Zfold 5', 'uploads/sszfold5.jpg', 25999000, 5, 'Chip Snapdragon 8 Gen 2 for Galaxy, RAM: 12 GB, Dung lượng: 256 GB', 0, 0, 'Samsung'),
(2, 'Điện thoại Iphone 15', 'uploads/iphone15.png', 24999000, 6, 'Đặc điểm nổi bật của iPhone 15 Plus:\r\nMàn hình Dynamic Island thay thế tai thỏ đầy tiện lợi. 5 phiên bản màu đặc sắc với thiết kế mặt kính pha màu đầu tiên trên thị trường. Sử dụng chip A16 Bionic cho hiệu năng vượt trội\r\n', 1552615987, 1552615987, 'Iphone'),
(3, 'Điện thoại Samsung S23 Ultra', 'uploads/ssS23ultra.png', 25999000, 6, 'Samsung Galaxy S23 Ultra 5G 256GB là chiếc smartphone cao cấp nhất của nhà Samsung, sở hữu cấu hình không tưởng với con chip khủng được Qualcomm tối ưu riêng cho dòng Galaxy và camera lên đến 200 MP, xứng danh là chiếc flagship Android được mong đợi nhất trong năm 2023', 1552615987, 1552615987, 'Samsung'),
(4, 'Điện thoại Samsung S23+ 5G 256GB', 'uploads/ssS23plus.png', 19590000, 0, 'Samsung Galaxy S23+ 5G 256GB là chiếc điện thoại thuộc dòng cao cấp nhất của Samsung được giới thiệu vào tháng 02/2023. Máy sở hữu một vài điểm ấn tượng như camera có khả năng quay video 8K, cùng với đó là con chip Snapdragon 8 Gen 2 mạnh mẽ hàng đầu giới điện thoại Android', 1552615987, 1552615987, 'Samsung'),
(5, 'Điện thoại Xiaomi 13 Lite 5G', 'uploads/xiaomi13Lite.png', 8990000, 3, 'Hãng Xiaomi đã ra mắt mẫu điện thoại Xiaomi 13 Lite 5G, tiếp tục thành công từ dòng flagship Xiaomi 13 series. Được xem là dòng sản phẩm tầm trung, Xiaomi 13 Lite 5G có nhiều điểm nổi bật như sử dụng chipset mới từ Qualcomm và hệ thống camera đáng chú ý trong phân khúc. Hiệu năng vượt trội với chipset mới ra mắt\r\n', 1552615987, 1697095206, 'Xiaomi'),
(6, 'Điện thoại Oppo Reno10 Pro 5G', 'uploads/opporeno10pro.png', 13990000, 4, 'OPPO Reno10 Pro 5G là một trong những sản phẩm của OPPO được ra mắt trong 2023. Với thiết kế đẹp mắt, màn hình lớn và hiệu năng mạnh mẽ, Reno10 Pro chắc chắn sẽ là lựa chọn đáng cân nhắc dành cho những ai đang tìm kiếm chiếc máy tầm trung để phục vụ tốt mọi nhu cầu. Diện mạo sang trọng, đẹp mắt', 1552615987, 1552615987, 'Oppo'),
(7, 'Điện thoại Iphone 15 Pro max', 'uploads/iphone15promax.jpg', 33990000, 1, 'Đặc điểm nổi bật của iPhone 15 Pro Max: Tăng độ cứng cáp và tối ưu khối lượng với chất liệu Titan. Bứt phá mọi giới hạn về hiệu năng nhờ chip A17 Pro. Phiên bản duy nhất cải tiến camera tele 5x', 1552615987, 1552615987, 'Iphone'),
(8, 'Điện thoại Xiaomi 13T 5G', 'uploads/xiaomi13T.png', 10990000, 2, 'Xiaomi 13T 5G là một thiết bị độc đáo được ra mắt tại thị trường Việt Nam vào tháng 09/2023. Sản phẩm này đang thu hút sự chú ý lớn từ cộng đồng người dùng, đặc biệt là những người yêu nhiếp ảnh và đang tìm kiếm một trải nghiệm độc đáo với camera nhờ sự hợp tác với Leica, một trong những thương hiệu sản xuất máy ảnh hàng đầu. Thiết kế tinh tế, sang trọng\r\n', 1552615987, 1554822153, 'Xiaomi'),
(9, 'Điện thoai Samsung S23 FE 5g', 'uploads/ssS23FE.png', 13390000, 3, 'Samsung tiếp tục chinh phục thị trường điện thoại thông minh với phiên bản Samsung Galaxy S23 FE 5G mới. Mẫu điện thoại này được định hình là sản phẩm cận cao cấp với những điểm nổi bật có thể kể đến như: Cấu hình mạnh, camera 50 MP có khả năng quay video 8K đi cùng màn hình 120 Hz. Thiết kế thanh mảnh sang trọng\r\n', 1552615987, 1697370659, 'Samsung'),
(10, 'Điện thoại Oppo Reno 8T', 'uploads/opporeno8t.png', 8490000, 4, 'Tiếp nối sự thành công rực rỡ đến từ các thế hệ trước đó thì chiếc OPPO Reno8 T 5G 256GB cuối cùng đã được giới thiệu chính thức tại Việt Nam, được định hình là dòng sản phẩm thuộc phân khúc tầm trung với camera 108 MP, con chip Snapdragon 695 cùng kiểu dáng thiết kế mặt lưng và màn hình bo cong hết sức nổi bật. Thiết kế với kiểu dáng bắt mắt', 1552615987, 1552615987, 'Oppo'),
(11, 'Điện thoại Xiaomi 13T Pro 5G', 'uploads/xiaomi13Tpro.png', 7880000, 2, 'Xiaomi 13T Pro 5G là mẫu máy thuộc phân khúc tầm trung đáng chú ý tại thị trường Việt Nam. Điện thoại ấn tượng nhờ được trang bị chip Dimensity 9200+, camera 50 MP có kèm sự hợp tác với Leica cùng kiểu thiết kế tinh tế đầy sang trọng. Ngoại hình đẹp mắt cùng chất liệu cao cấp', 1552615987, 1552615987, 'Xiaomi'),
(12, 'Điện thoại Iphone 15 Pro', 'uploads/iphone15pro.png', 27990000, 10, 'Đặc điểm nổi bật của iPhone 15 Pro: Tăng độ cứng cáp và tối ưu khối lượng với chất liệu Titan. Bứt phá mọi giới hạn về hiệu năng nhờ chip A17 Pro Phiên bản duy nhất cải tiến camera tele 5x', 1552615987, 1552615987, 'Iphone'),
(13, 'Điện thoại Oppo Reno10+ 5G', 'uploads/opporeno10pro+.png', 19990000, 7, 'OPPO Reno10 Pro+ 5G là một sản phẩm tiếp nối sự thành công của thế hệ trước đó, với thiết kế đẹp mắt, cấu hình mạnh mẽ và máy ảnh chất lượng cao. Máy đáp ứng được nhu cầu giải trí, chụp ảnh và làm việc của người dùng, là lựa chọn hoàn hảo cho những ai đang tìm kiếm một chiếc điện thoại đa năng và hiện đại. Tỏa sáng với diện mạo đẹp mắt', 1697358615, 1697373287, 'Oppo'),
(14, 'Samsung Galaxy S23 5G 128GB', 'uploads/ssS23.png', 15990000, 4, 'Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 12 GB. Dung lượng: 256 GB', 0, 0, 'Samsung'),
(15, 'Điện thoại Iphone 15 Plus', 'uploads/iphone15plus.png', 24999000, 1, '• Màn hình Dynamic Island thay thế tai thỏ đầy tiện lợi\r\n• 5 phiên bản màu đặc sắc với thiết kế mặt kính pha màu đầu tiên trên thị trường\r\n• Sử dụng chip A16 Bionic cho hiệu năng vượt trội', 1552615987, 1552615987, 'Iphone'),
(16, 'Điện thoại Samsung Galaxy S22 Ultra', 'uploads/ssS22ultra.png', 21999000, 4, 'Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 8 GB. Dung lượng: 256 GB. Camera sau: 2 camera 12 MP. Camera trước: 10 MP. Pin 3700 mAh, Sạc 25W', 1552615987, 1552615987, 'Samsung'),
(17, 'Điện thoại Samsung Galaxy A54 5G', 'uploads/ssa54.png', 6684000, 1, 'Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 8 GB. Dung lượng: 256 GB. Camera sau: 2 camera 12 MP. Camera trước: 10 MP. Pin 3700 mAh, Sạc 25W', 1552615987, 1552615987, 'Samsung'),
(18, 'Điện thoại Oppo Reno8 Pro 5G', 'uploads/opporeno8pro.png', 13990000, 1, 'OPPO Reno8 Pro 5G là chiếc điện thoại cao cấp được nhà OPPO ra mắt vào thời điểm 09/2022, máy hướng đến sự hoàn thiện cao cấp ở phần thiết kế cùng khả năng quay chụp chuyên nghiệp nhờ trang bị vi xử lý hình ảnh MariSilicon X chuyên dụng.\r\nDáng vẻ cao cấp sang trọng\r\n\r\n', 1552615987, 1697095206, 'Oppo'),
(19, 'Điện thoại Xiaomi Redmi Note 12 Pro', 'uploads/xiaomiredminote12pro.png', 8790000, 3, 'Xiaomi Redmi Note 12 Pro 5G mẫu điện thoại tầm trung được kỳ vọng sẽ trở thành sản phẩm quốc dân trong năm 2023, nhờ sở hữu khá nhiều sự nâng cấp với camera 50 MP, chip MediaTek mạnh mẽ cùng ngôn ngữ thiết kế mới vô cùng tối giản, hiện đại.\r\nDiện mạo hiện đại đi cùng màu sắc trẻ trung', 1552615987, 1552615987, 'Xiaomi'),
(20, 'Điện thoại Xiaomi Note 12 Pro 5G', 'uploads/xiaominote12pro5g.png', 6590000, 4, 'Xiaomi Redmi Note 12 Pro 4G tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Xiaomi giới thiệu đến thị trường Việt Nam trong năm 2023, máy nổi bật với camera 108 MP chất lượng, thiết kế viền mỏng cùng hiệu năng đột phá nhờ trang bị chip Snapdragon 732G.\r\nNgoại hình vuông vắn cùng kích thước viền mỏng', 1552615987, 1554822153, 'Xiaomi'),
(21, 'Điện thoại Iphone 14 Pro Max', 'uploads/iphone14promax.png', 26990000, 2, 'Đặc điểm nổi bật của iPhone 14 Pro Max: Tăng độ cứng cáp và tối ưu khối lượng với chất liệu thép không gỉ. Bứt phá mọi giới hạn về hiệu năng nhờ chip A17 Pro. Phiên bản duy nhất cải tiến camera tele 5x', 1552615987, 1697370659, 'Iphone'),
(22, 'Điện thoại Iphone 14 Pro ', 'uploads/iphone14pro.png', 24190000, 0, 'Đặc điểm nổi bật của iPhone 14 Pro Max: Tăng độ cứng cáp và tối ưu khối lượng với chất liệu thép không gỉ. Bứt phá mọi giới hạn về hiệu năng nhờ chip A17 Pro. Phiên bản duy nhất cải tiến camera tele 5x', 1552615987, 1697649437, 'Iphone'),
(23, 'Điện thoại Oppo Find N2 Flip', 'uploads/oppofindn2flip.png', 18990000, 4, 'OPPO Find N2 Flip 5G - chiếc điện thoại gập đầu tiên của OPPO đã được giới thiệu chính thức tại Việt Nam vào tháng 03/2023. Sở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính. Sử dụng ngôn ngữ thiết kế gập hiện đại', 1697358615, 1697373287, 'Oppo'),
(24, 'Điện thoại Xiaomi Note 12 4G', 'uploads/xiaominote124G.png', 8990000, 5, 'Xiaomi Note 12 4G tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Xiaomi giới thiệu đến thị trường Việt Nam trong năm 2023, máy nổi bật với camera 108 MP chất lượng, thiết kế viền mỏng cùng hiệu năng đột phá nhờ trang bị chip Snapdragon 732G. Ngoại hình vuông vắn cùng kích thước viền mỏng', 1697713521, 1697713521, 'Xiaomi'),
(25, 'Điện thoại Iphone 14 Plus', 'uploads/iphone14plus.png', 21790000, 2, 'Chip Apple A15 Bionic. RAM: 6 GB. Dung lượng: 128 GB. Camera sau: 2 camera 12 MP. Camera trước: 12 MP. Pin 4325 mAh, Sạc 20 W\r\n', 1697731242, 1697731242, 'Iphone'),
(26, 'Điện thoại Oppo Find X5 Pro 5G', 'uploads/oppofindx5pro.png', 17990000, 4, 'Tiếp nối sự thành công rực rỡ đến từ các thế hệ trước đó thì chiếc OPPO Find X5 Pro cuối cùng đã được giới thiệu chính thức tại Việt Nam, được định hình là dòng sản phẩm thuộc phân khúc tầm trung với camera 108 MP, con chip Snapdragon 695 cùng kiểu dáng thiết kế mặt lưng và màn hình bo cong hết sức nổi bật. Thiết kế với kiểu dáng bắt mắt', 1552615987, 1552615987, 'Oppo'),
(27, 'Điện thoại Xiaomi 12', 'uploads/xiaomi12.png', 10990000, 5, 'Xiaomi 12 5G là mẫu máy thuộc phân khúc tầm trung đáng chú ý tại thị trường Việt Nam. Điện thoại ấn tượng nhờ được trang bị chip Dimensity 9200+, camera 50 MP có kèm sự hợp tác với Leica cùng kiểu thiết kế tinh tế đầy sang trọng. Ngoại hình đẹp mắt cùng chất liệu cao cấp', 1552615987, 1552615987, 'Xiaomi'),
(28, 'Điện thoại Oppo Reno 10', 'uploads/opporeno10.png', 5990000, 7, 'OPPO Reno10 là chiếc điện thoại cao cấp được nhà OPPO ra mắt vào thời điểm 09/2022, máy hướng đến sự hoàn thiện cao cấp ở phần thiết kế cùng khả năng quay chụp chuyên nghiệp nhờ trang bị vi xử lý hình ảnh MariSilicon X chuyên dụng.\r\nDáng vẻ cao cấp sang trọng', 1552615987, 1552615987, 'Oppo'),
(29, 'Điện thoại Oppo A57', 'uploads/oppoa57.png', 3790000, 2, 'OPPO A57 5G là một sản phẩm tiếp nối sự thành công của thế hệ trước đó, với thiết kế đẹp mắt, cấu hình mạnh mẽ và máy ảnh chất lượng cao. Máy đáp ứng được nhu cầu giải trí, chụp ảnh và làm việc của người dùng, là lựa chọn hoàn hảo cho những ai đang tìm kiếm một chiếc điện thoại đa năng và hiện đại. Tỏa sáng với diện mạo đẹp mắt', 1697358615, 1697373287, 'Oppo'),
(30, 'Samsung Galaxy ZFlip4 5G', 'uploads/sszflip4.png', 12990000, 3, 'Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 12 GB. Dung lượng: 256 GB. Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 12 GB. Dung lượng: 256 GB', 0, 0, 'Samsung'),
(31, 'Điện thoại Iphone 14', 'uploads/iphone14.png', 19190000, 4, 'Chip Apple A15 Bionic. RAM: 6 GB. Dung lượng: 128 GB. Camera sau: 2 camera 12 MP. Camera trước: 12 MP. Pin 4325 mAh, Sạc 20 W', 1552615987, 1552615987, 'Iphone'),
(32, 'Điện thoại Samsung Galaxy Zflip5', 'uploads/sszflip5.jpg', 21999000, 1, 'Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 8 GB. Dung lượng: 256 GB. Camera sau: 2 camera 12 MP. Camera trước: 10 MP. Pin 3700 mAh, Sạc 25W', 1552615987, 1552615987, 'Samsung'),
(33, 'Điện thoại Samsung Galaxy S21 FE', 'uploads/ssS21FE.png', 8684000, 2, 'Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 8 GB. Dung lượng: 256 GB. Camera sau: 2 camera 12 MP. Camera trước: 10 MP. Pin 3700 mAh, Sạc 25W', 1552615987, 1552615987, 'Samsung'),
(34, 'Điện thoại Oppo A98', 'uploads/oppoa98.png', 13990000, 5, 'OPPO Reno8 Pro 5G là chiếc điện thoại cao cấp được nhà OPPO ra mắt vào thời điểm 09/2022, máy hướng đến sự hoàn thiện cao cấp ở phần thiết kế cùng khả năng quay chụp chuyên nghiệp nhờ trang bị vi xử lý hình ảnh MariSilicon X chuyên dụng.\r\nDáng vẻ cao cấp sang trọng\r\n\r\n', 1552615987, 1697095206, 'Oppo'),
(35, 'Điện thoại Xiaomi Note 12 Pro', 'uploads/xiaominote12pro.png', 6590000, 7, 'Xiaomi Note 12 Pro mẫu điện thoại tầm trung được kỳ vọng sẽ trở thành sản phẩm quốc dân trong năm 2023, nhờ sở hữu khá nhiều sự nâng cấp với camera 50 MP, chip MediaTek mạnh mẽ cùng ngôn ngữ thiết kế mới vô cùng tối giản, hiện đại. Diện mạo hiện đại đi cùng màu sắc trẻ trung', 1552615987, 1552615987, 'Xiaomi'),
(36, 'Điện thoại Xiaomi Redmi Note 12S', 'uploads/xiaominote12S.png', 5890000, 6, 'Xiaomi Redmi Note 12S tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Xiaomi giới thiệu đến thị trường Việt Nam trong năm 2023, máy nổi bật với camera 108 MP chất lượng, thiết kế viền mỏng cùng hiệu năng đột phá nhờ trang bị chip Snapdragon 732G.\r\nNgoại hình vuông vắn cùng kích thước viền mỏng', 1552615987, 1554822153, 'Xiaomi'),
(37, 'Điện thoại Iphone 13', 'uploads/iphone13.png', 16690000, 5, 'Chip Apple A15 Bionic. RAM: 6 GB. Dung lượng: 128 GB. Camera sau: 2 camera 12 MP. Camera trước: 12 MP. Pin 4325 mAh, Sạc 20 W', 1552615987, 1697370659, 'Iphone'),
(38, 'Điện thoại Iphone 12', 'uploads/iphone12.png', 13490000, 1, 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.\r\nHiệu năng vượt xa mọi giới hạn', 1552615987, 1697649437, 'Iphone'),
(39, 'Điện thoại Oppo Reno7', 'uploads/opporeno7.png', 7490000, 6, 'OPPO đã trình làng mẫu Reno7 Z 5G với thiết kế OPPO Glow độc quyền, camera mang hiệu ứng như máy DSLR chuyên nghiệp cùng viền sáng kép, máy có một cấu hình mạnh mẽ và đạt chứng nhận xếp hạng A về độ mượt.\r\nDễ dàng nổi bật giữa đám đông', 1697358615, 1697373287, 'Oppo'),
(40, 'Điện thoại Xiaomi Redmi 12', 'uploads/xiaomiredmi12.png', 8990000, 5, 'Xiaomi Redmi 12 tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Xiaomi giới thiệu đến thị trường Việt Nam trong năm 2023, máy nổi bật với camera 108 MP chất lượng, thiết kế viền mỏng cùng hiệu năng đột phá nhờ trang bị chip Snapdragon 732G. Ngoại hình vuông vắn cùng kích thước viền mỏng', 1697713521, 1697713521, 'Xiaomi'),
(41, 'Điện thoại Oppo Find X5 Pro 5G', 'uploads/oppofindx5pro.png', 17990000, 4, 'Tiếp nối sự thành công rực rỡ đến từ các thế hệ trước đó thì chiếc OPPO Find X5 Pro cuối cùng đã được giới thiệu chính thức tại Việt Nam, được định hình là dòng sản phẩm thuộc phân khúc tầm trung với camera 108 MP, con chip Snapdragon 695 cùng kiểu dáng thiết kế mặt lưng và màn hình bo cong hết sức nổi bật. Thiết kế với kiểu dáng bắt mắt', 1552615987, 1552615987, 'Oppo'),
(42, 'Điện thoại Xiaomi 12', 'uploads/xiaomi12.png', 10990000, 5, 'Xiaomi 12 5G là mẫu máy thuộc phân khúc tầm trung đáng chú ý tại thị trường Việt Nam. Điện thoại ấn tượng nhờ được trang bị chip Dimensity 9200+, camera 50 MP có kèm sự hợp tác với Leica cùng kiểu thiết kế tinh tế đầy sang trọng. Ngoại hình đẹp mắt cùng chất liệu cao cấp', 1552615987, 1552615987, 'Xiaomi'),
(43, 'Điện thoại Oppo Reno 10', 'uploads/opporeno10.png', 5990000, 7, 'OPPO Reno10 là chiếc điện thoại cao cấp được nhà OPPO ra mắt vào thời điểm 09/2022, máy hướng đến sự hoàn thiện cao cấp ở phần thiết kế cùng khả năng quay chụp chuyên nghiệp nhờ trang bị vi xử lý hình ảnh MariSilicon X chuyên dụng.\r\nDáng vẻ cao cấp sang trọng', 1552615987, 1552615987, 'Oppo'),
(44, 'Điện thoại Oppo A57', 'uploads/oppoa57.png', 3790000, 2, 'OPPO A57 5G là một sản phẩm tiếp nối sự thành công của thế hệ trước đó, với thiết kế đẹp mắt, cấu hình mạnh mẽ và máy ảnh chất lượng cao. Máy đáp ứng được nhu cầu giải trí, chụp ảnh và làm việc của người dùng, là lựa chọn hoàn hảo cho những ai đang tìm kiếm một chiếc điện thoại đa năng và hiện đại. Tỏa sáng với diện mạo đẹp mắt', 1697358615, 1697373287, 'Oppo'),
(45, 'Samsung Galaxy ZFlip4 5G', 'uploads/sszflip4.png', 12990000, 3, 'Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 12 GB. Dung lượng: 256 GB. Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 12 GB. Dung lượng: 256 GB', 0, 0, 'Samsung'),
(46, 'Điện thoại Iphone 14', 'uploads/iphone14.png', 19190000, 3, 'Chip Apple A15 Bionic. RAM: 6 GB. Dung lượng: 128 GB. Camera sau: 2 camera 12 MP. Camera trước: 12 MP. Pin 4325 mAh, Sạc 20 W', 1552615987, 1552615987, 'Iphone'),
(47, 'Điện thoại Samsung Galaxy Zflip5', 'uploads/sszflip5.jpg', 21999000, 1, 'Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 8 GB. Dung lượng: 256 GB. Camera sau: 2 camera 12 MP. Camera trước: 10 MP. Pin 3700 mAh, Sạc 25W', 1552615987, 1552615987, 'Samsung'),
(48, 'Điện thoại Samsung Galaxy S21 FE', 'uploads/ssS21FE.png', 7684000, 2, 'Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 8 GB. Dung lượng: 256 GB. Camera sau: 2 camera 12 MP. Camera trước: 10 MP. Pin 3700 mAh, Sạc 25W', 1552615987, 1552615987, 'Samsung'),
(49, 'Điện thoại Oppo A98', 'uploads/oppoa98.png', 13990000, 5, 'OPPO Reno8 Pro 5G là chiếc điện thoại cao cấp được nhà OPPO ra mắt vào thời điểm 09/2022, máy hướng đến sự hoàn thiện cao cấp ở phần thiết kế cùng khả năng quay chụp chuyên nghiệp nhờ trang bị vi xử lý hình ảnh MariSilicon X chuyên dụng.\r\nDáng vẻ cao cấp sang trọng\r\n\r\n', 1552615987, 1697095206, 'Oppo'),
(50, 'Điện thoại Xiaomi Note 12 Pro', 'uploads/xiaominote12pro.png', 6590000, 7, 'Xiaomi Note 12 Pro mẫu điện thoại tầm trung được kỳ vọng sẽ trở thành sản phẩm quốc dân trong năm 2023, nhờ sở hữu khá nhiều sự nâng cấp với camera 50 MP, chip MediaTek mạnh mẽ cùng ngôn ngữ thiết kế mới vô cùng tối giản, hiện đại. Diện mạo hiện đại đi cùng màu sắc trẻ trung', 1552615987, 1552615987, 'Xiaomi'),
(51, 'Điện thoại Xiaomi Redmi Note 12S', 'uploads/xiaominote12S.png', 5890000, 6, 'Xiaomi Redmi Note 12S tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Xiaomi giới thiệu đến thị trường Việt Nam trong năm 2023, máy nổi bật với camera 108 MP chất lượng, thiết kế viền mỏng cùng hiệu năng đột phá nhờ trang bị chip Snapdragon 732G.\r\nNgoại hình vuông vắn cùng kích thước viền mỏng', 1552615987, 1554822153, 'Xiaomi'),
(52, 'Điện thoại Iphone 12 Promax', 'uploads/iphone12promax.png', 16690000, 5, 'Chip Apple A15 Bionic. RAM: 6 GB. Dung lượng: 128 GB. Camera sau: 2 camera 12 MP. Camera trước: 12 MP. Pin 4325 mAh, Sạc 20 W', 1552615987, 1698996731, 'Iphone'),
(53, 'Điện thoại Iphone 12', 'uploads/iphone12.png', 13490000, 1, 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.\r\nHiệu năng vượt xa mọi giới hạn', 1552615987, 1697649437, 'Iphone'),
(54, 'Điện thoại Oppo Reno7', 'uploads/opporeno7.png', 7490000, 6, 'OPPO đã trình làng mẫu Reno7 Z 5G với thiết kế OPPO Glow độc quyền, camera mang hiệu ứng như máy DSLR chuyên nghiệp cùng viền sáng kép, máy có một cấu hình mạnh mẽ và đạt chứng nhận xếp hạng A về độ mượt.\r\nDễ dàng nổi bật giữa đám đông', 1697358615, 1697373287, 'Oppo'),
(55, 'Điện thoại Xiaomi 13T 5G', 'uploads/xiaomi13T.png', 8990000, 5, 'Xiaomi Redmi 13T tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Xiaomi giới thiệu đến thị trường Việt Nam trong năm 2023, máy nổi bật với camera 108 MP chất lượng, thiết kế viền mỏng cùng hiệu năng đột phá nhờ trang bị chip Snapdragon 732G. Ngoại hình vuông vắn cùng kích thước viền mỏng', 1697713521, 1697713521, 'Xiaomi'),
(56, 'Điện thoại Xiaomi Note 12 Pro', 'uploads/xiaominote12pro.png\r\n', 5890000, 6, 'Xiaomi Redmi Note 12S tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Xiaomi giới thiệu đến thị trường Việt Nam trong năm 2023, máy nổi bật với camera 108 MP chất lượng, thiết kế viền mỏng cùng hiệu năng đột phá nhờ trang bị chip Snapdragon 732G.\r\nNgoại hình vuông vắn cùng kích thước viền mỏng', 1552615987, 1554822153, 'Xiaomi'),
(57, 'Điện thoại Iphone 13', 'uploads/iphone13.png', 16690000, 5, 'Chip Apple A15 Bionic. RAM: 6 GB. Dung lượng: 128 GB. Camera sau: 2 camera 12 MP. Camera trước: 12 MP. Pin 4325 mAh, Sạc 20 W', 1552615987, 1698996731, 'Iphone'),
(58, 'Điện thoại Iphone 13 Promax', 'uploads/iphone13promax.png', 18490000, 1, 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.\r\nHiệu năng vượt xa mọi giới hạn', 1552615987, 1697649437, 'Iphone'),
(59, 'Điện thoại Oppo Reno8 Pro 5G', 'uploads/opporeno8pro.png', 9490000, 6, 'OPPO đã trình làng mẫu Reno8 Pro 5G với thiết kế OPPO Glow độc quyền, camera mang hiệu ứng như máy DSLR chuyên nghiệp cùng viền sáng kép, máy có một cấu hình mạnh mẽ và đạt chứng nhận xếp hạng A về độ mượt.\r\nDễ dàng nổi bật giữa đám đông', 1697358615, 1697373287, 'Oppo'),
(60, 'Điện thoại Xiaomi Redmi 12', 'uploads/xiaomiredmi12.png', 8990000, 5, 'Xiaomi Redmi 12 tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Xiaomi giới thiệu đến thị trường Việt Nam trong năm 2023, máy nổi bật với camera 108 MP chất lượng, thiết kế viền mỏng cùng hiệu năng đột phá nhờ trang bị chip Snapdragon 732G. Ngoại hình vuông vắn cùng kích thước viền mỏng', 1697713521, 1697713521, 'Xiaomi'),
(61, 'Điện thoại Iphone 15 Pro', 'uploads/iphone15pro.png', 27990000, 10, 'Đặc điểm nổi bật của iPhone 15 Pro: Tăng độ cứng cáp và tối ưu khối lượng với chất liệu Titan. Bứt phá mọi giới hạn về hiệu năng nhờ chip A17 Pro Phiên bản duy nhất cải tiến camera tele 5x', 1552615987, 1552615987, 'Iphone'),
(62, 'Điện thoại Oppo Reno10+ 5G', 'uploads/opporeno10pro+.png', 19990000, 7, 'OPPO Reno10 Pro+ 5G là một sản phẩm tiếp nối sự thành công của thế hệ trước đó, với thiết kế đẹp mắt, cấu hình mạnh mẽ và máy ảnh chất lượng cao. Máy đáp ứng được nhu cầu giải trí, chụp ảnh và làm việc của người dùng, là lựa chọn hoàn hảo cho những ai đang tìm kiếm một chiếc điện thoại đa năng và hiện đại. Tỏa sáng với diện mạo đẹp mắt', 1697358615, 1697373287, 'Oppo'),
(63, 'Samsung Galaxy S23 5G 128GB', 'uploads/ssS23.png', 15990000, 4, 'Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 12 GB. Dung lượng: 256 GB', 0, 0, 'Samsung'),
(64, 'Điện thoại Iphone 15 Plus', 'uploads/iphone15.png', 24999000, 2, '• Màn hình Dynamic Island thay thế tai thỏ đầy tiện lợi\r\n• 5 phiên bản màu đặc sắc với thiết kế mặt kính pha màu đầu tiên trên thị trường\r\n• Sử dụng chip A16 Bionic cho hiệu năng vượt trội', 1552615987, 1552615987, 'Iphone'),
(65, 'Điện thoại Samsung Galaxy S22 Ultra', 'uploads/ssS22ultra.png', 21999000, 4, 'Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 8 GB. Dung lượng: 256 GB. Camera sau: 2 camera 12 MP. Camera trước: 10 MP. Pin 3700 mAh, Sạc 25W', 1552615987, 1552615987, 'Samsung'),
(66, 'Điện thoại Samsung Galaxy A54 5G', 'uploads/ssa54.png', 9684000, 1, 'Chip Snapdragon 8 Gen 2 for Galaxy. RAM: 8 GB. Dung lượng: 256 GB. Camera sau: 2 camera 12 MP. Camera trước: 10 MP. Pin 3700 mAh, Sạc 25W', 1552615987, 1552615987, 'Samsung'),
(67, 'Điện thoại Oppo Reno8 Pro 5G', 'uploads/opporeno8pro.png', 13990000, 1, 'OPPO Reno8 Pro 5G là chiếc điện thoại cao cấp được nhà OPPO ra mắt vào thời điểm 09/2022, máy hướng đến sự hoàn thiện cao cấp ở phần thiết kế cùng khả năng quay chụp chuyên nghiệp nhờ trang bị vi xử lý hình ảnh MariSilicon X chuyên dụng.\r\nDáng vẻ cao cấp sang trọng\r\n\r\n', 1552615987, 1697095206, 'Oppo');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `role` varchar(244) NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `phone`, `role`, `status`, `created_time`, `last_updated`) VALUES
(12, 'thanhadmin', 'Vo Tran Lan Thanh', 'fcea920f7412b5da7be0cf42b8c93759', '0792615487', 'user', 1, 1697090719, 1697090719),
(13, 'thanhtest1', 'vo tran lan thanh', '827ccb0eea8a706c4c34a16891f84e7b', '0334308888', 'user', 1, 1697358461, 1697700009),
(14, 'thanhtest2', 'vo tran lan thanh', '827ccb0eea8a706c4c34a16891f84e7b', '0337274859', 'user', 1, 1697710876, 1697710876),
(15, 'thanh1', 'lan thanh', '202cb962ac59075b964b07152d234b70', '0329874589', 'user', 1, 1697885638, 1697885638),
(17, 'thanh12', 'lan thanh', '202cb962ac59075b964b07152d234b70', '0978459812', 'user', 1, 1697885698, 1697885698),
(21, 'xthu', 'LÃª Thá»‹ XuÃ¢n Thu', '81dc9bdb52d04dc20036dbd8313ed055', '0792589654', 'user', 1, 1698637370, 1698637370),
(22, 'thanh123', 'lan thanh', '202cb962ac59075b964b07152d234b70', '0846188619', 'user', 1, 1698846424, 1698846424),
(23, 'thanh111', 'thanh', '202cb962ac59075b964b07152d234b70', '012839132', 'admin', 1, 1698846782, 1698846782),
(24, 'thanh222', 'thanh', '202cb962ac59075b964b07152d234b70', '038248295', 'admin', 1, 1698849506, 1698849506),
(25, 'thanh555', 'thanh', '202cb962ac59075b964b07152d234b70', '014182328', 'user', 1, 1698856327, 1698856327),
(26, 'thanh666', 'thanh', '202cb962ac59075b964b07152d234b70', '2342323', 'admin', 1, 1698856413, 1698856413),
(27, 'thanh777', 'thanh', '202cb962ac59075b964b07152d234b70', '08349323', 'staff', 1, 1698856480, 1698856480),
(28, 'thanh999', 'thank', '202cb962ac59075b964b07152d234b70', '0889898667', '', 1, 1698860253, 1698860253),
(29, 'thanh9999', 'thanh', '202cb962ac59075b964b07152d234b70', '0897776765', 'user', 1, 1698860541, 1698860541),
(30, 'thanh000', 'vo tran lan thanh', '202cb962ac59075b964b07152d234b70', '08372848', 'staff', 1, 1698908713, 1698908713),
(31, 'thanh1111', 'vo tran lan thanh', '202cb962ac59075b964b07152d234b70', '09432849393', 'user', 1, 1698950438, 1698950438);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
