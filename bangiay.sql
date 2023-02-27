-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 30, 2022 lúc 10:04 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bangiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `cartegory_id`, `brand_name`, `slug`) VALUES
(16, 20, 'Air Force 1', 'Air-Force-1'),
(17, 20, 'Air Jordan 1', 'Air-Jordan-1'),
(18, 20, 'Air Max 97', 'Air-Max-97'),
(19, 21, 'Stan Smith', 'Stan-Smith'),
(20, 21, 'Ultra Boost 4.0 DNA', 'Ultra-Boost-4.0-DNA'),
(21, 21, 'Ultra Boost 5.0 DNA', 'Ultra-Boost-5.0-DNA'),
(22, 21, 'Yeezy 350', 'Yeezy-350'),
(23, 21, 'EQT', 'EQT'),
(24, 21, 'Forum', 'Forum'),
(25, 22, 'Old Skool', 'Old-Skool'),
(26, 22, 'SK8-HI', 'SK8-HI'),
(27, 22, 'Slip-On Classic', 'Slip-On-Classic'),
(28, 22, 'Slip-On CheckerBoard', 'Slip-On-CheckerBoard'),
(29, 22, 'Chuck 70 Tonal Polyester Low Top', 'Chuck-70-Tonal-Polyester-Low-Top'),
(30, 22, 'Chuck Taylor All Star CX Gradient High Top', 'Chuck-Taylor-All-Star-CX-Gradient-High-Top'),
(31, 22, 'Chuck Taylor All Star Lugged 2.0 Leather High Top', 'Chuck-Taylor-All-Star-Lugged-2.0-Leather-High-Top'),
(32, 23, 'NY', 'NY'),
(33, 23, 'High Padding', 'High-Padding'),
(34, 23, 'BOSTON', 'BOSTON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cartegory`
--

CREATE TABLE `tbl_cartegory` (
  `cartegory_id` int(11) NOT NULL,
  `cartegory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cartegory`
--

INSERT INTO `tbl_cartegory` (`cartegory_id`, `cartegory_name`) VALUES
(20, 'GIÀY NIKE'),
(21, 'GIÀY ADIDAS'),
(22, 'VANS-CONVERSER'),
(23, 'GIÀY MLB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantily` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_id`, `product_id`, `quantily`, `price`, `id`, `size`) VALUES
(0, 64, 1, '500000', 27, '36'),
(0, 64, 1, '500000', 28, '36'),
(0, 65, 1, '600000', 29, '39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_sale` varchar(255) NOT NULL,
  `product_mota` varchar(5000) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `cartegory_id`, `brand_id`, `product_price`, `product_sale`, `product_mota`, `product_img`, `product_color`) VALUES
(34, 'Air Force 1 ', 20, 16, '500000', '450000', 'nó là 1 đôi giày af1 Trắng đen', 'af1 trắng đen.jpg', 'Trắng đen'),
(35, 'Air Force 1 ', 20, 16, '500000', '450000', 'Air Force 1 Trắng', 'af1 trắng.jpg', 'Trắng'),
(36, 'Air Max 97', 20, 18, '600000', '550000', 'Air Max 97 Trắng', 'air max 97 trắng.jpg', 'Trắng'),
(37, 'Air Max 97', 20, 18, '500000', '450000', 'Air Max 97 Xám', 'air max 97 xám.jpg', 'Xám'),
(38, 'Jordan 1 ', 20, 17, '1000000', '950000', 'Jordan 1 Đen cam', 'jordan1 đen cam cao.jpg', 'Đen cam'),
(39, 'Jordan 1 ', 20, 17, '600000', '450000', 'Jordan 1 Đen trắng', 'jordan1 đen trắng cao.jpg', 'Trắng đen'),
(40, 'Jordan 1 ', 20, 17, '500000', '450000', '', 'jordan1 trắng xám cao.jpg', 'Trắng xám'),
(41, 'Boston', 23, 34, '350000', '300000', 'Boston Hồng', 'boston hồng.jpg', 'Hồng'),
(42, 'Boston', 23, 34, '500000', '450000', 'Boston Trắng', 'boston trắng.jpg', 'Trắng'),
(43, 'High padding', 23, 33, '500000', '300000', 'High padding Trắng đen', 'high padding trắng đen cao.jpg', 'Trắng đen'),
(44, 'Ny', 23, 32, '600000', '450000', 'Ny Trắng', 'ny trắng.jpg', 'Trắng'),
(45, 'EQT', 21, 23, '440000', '400000', '', 'eqt xám.jpg', 'Xám'),
(46, 'EQT', 21, 23, '500000', '300000', 'EQT Xanh dương', 'eqt xanh dương.jpg', 'Xanh dương'),
(47, 'Forum', 21, 24, '600000', '500000', 'Forum Cao Trắng', 'forum trắng cao.jpg', 'Trắng'),
(48, 'Forum', 21, 24, '500000', '450000', 'Forum Cao Trắng xanh', 'forum trắng xanh cao.jpg', 'Trắng xanh'),
(49, 'Stan Smith', 21, 19, '440000', '300000', 'Stan Smith Trắng đen', 'stan smith trắng đen.jpg', 'Trắng đen'),
(50, 'Stan Smith', 21, 19, '700000', '500000', '', 'stan smith trắng xanh.jpg', 'Trắng xanh'),
(51, 'Ultra Boost', 21, 20, '200000', '199999', 'Ultra Boost Nâu', 'ultraboost nâu.jpg', 'Nâu'),
(52, 'Ultra Boost', 21, 21, '500000', '450000', 'Ultra Boost Trắng', 'ultraboost trắng.jpg', 'Trắng'),
(53, 'Yeezy 350', 21, 22, '900000', '800000', 'Yeezy 350 Nâu', 'yeezy 350 nâu.jpg', 'Nâu'),
(54, 'Yeezy 350', 21, 22, '500000', '300000', 'Yeezy 350 Trắng', 'yeezy 350 trắng.jpg', 'Trắng'),
(55, 'Yeezy 350', 21, 22, '600000', '500000', 'Yeezy 350 Xám', 'yeezy 350 xám.jpg', 'Xám'),
(56, 'Chuck 70 Tonal Polyester Low', 22, 29, '1500000', '1490000', 'Chuck 70 Tonal Polyester Low Hồng', 'chuck 70 tonal polyester hồng.jpg', 'Hồng'),
(57, 'Chuck 70 Tonal Polyester Low', 22, 29, '900000', '899999', 'Chuck 70 Tonal Polyester Low Nâu', 'chuck 70 tonal polyester nâu.jpg', 'Nâu'),
(58, 'Chuck 70 Tonal Polyester Low', 22, 29, '600000', '450000', 'Chuck 70 Tonal Polyester Low Xanh dương', 'chuck 70 tonal polyester xanh dương.jpg', 'Xanh dương'),
(59, 'ChuckTaylor', 22, 30, '700000', '650000', ' ChuckTaylor Gradient Trắng đen', 'chuck cx gradient trắng đen cao.jpg', 'Trắng đen'),
(60, 'Old Skool', 22, 25, '500000', '450000', 'Old Skool Đen', 'old sckool đen.jpg', 'Đen'),
(61, 'Old Skool', 22, 25, '700000', '690000', 'Old Skool Trắng đen', 'old sckool trắng đen.jpg', 'Trắng đen'),
(62, 'Old Skool', 22, 25, '500000', '450000', 'Old Skool Trắng', 'old sckool trắng.jpg', 'Trắng'),
(63, 'SK8 HI cao', 22, 26, '700000', '600000', 'SK8 HI cao Trắng', 'sk8-hi trắng cao.jpg', 'Trắng'),
(64, 'SK8 HI cao', 22, 26, '500000', '300000', 'SK8 HI cao Trắng đen', 'sk8-hi trắng đen cao.jpg', 'Trắng đen'),
(65, 'Slip On CheckerBoard caro', 22, 28, '600000', '550000', 'Slip On CheckerBoard caro', 'slip-on checkerboard caro.jpg', 'Caro'),
(66, 'Slip On Classic', 22, 27, '600000', '450000', 'Slip On Classic Trắng', 'slip-on classic trắng.jpg', 'Trắng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_img_mota`
--

CREATE TABLE `tbl_product_img_mota` (
  `product_id` int(11) NOT NULL,
  `product_img_mota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_img_mota`
--

INSERT INTO `tbl_product_img_mota` (`product_id`, `product_img_mota`) VALUES
(16, '235.jpg'),
(17, '235.jpg'),
(18, '706778355898009427.mp4'),
(19, '706778355898009427.mp4'),
(20, 'Screenshot_3.jpg'),
(21, 'Screenshot_3.jpg'),
(22, 'Screenshot_3.jpg'),
(23, 'Untitled-1.png'),
(24, 'Untitled-1.png'),
(25, 'Untitled-1.png'),
(26, 'Untitled-1.png'),
(27, 'Screenshot_39.png'),
(30, 'Screenshot_39.png'),
(31, 'Screenshot_39.png'),
(32, 'Screenshot_39.png'),
(33, 'Screenshot_39.png'),
(34, 'af1 trắng đen.jpg'),
(35, 'af1 trắng.jpg'),
(36, 'air max 97 trắng.jpg'),
(37, 'air max 97 xám.jpg'),
(38, 'jordan1 đen cam cao.jpg'),
(39, 'jordan1 đen trắng cao.jpg'),
(40, 'jordan1 trắng xám cao.jpg'),
(41, 'boston hồng.jpg'),
(42, 'boston trắng.jpg'),
(43, 'high padding trắng đen cao.jpg'),
(44, 'ny trắng.jpg'),
(45, 'eqt xám.jpg'),
(46, 'eqt xanh dương.jpg'),
(47, 'forum trắng cao.jpg'),
(48, 'forum trắng xanh cao.jpg'),
(49, 'stan smith trắng đen.jpg'),
(50, 'stan smith trắng xanh.jpg'),
(51, 'ultraboost nâu.jpg'),
(52, 'ultraboost trắng.jpg'),
(53, 'yeezy 350 nâu.jpg'),
(54, 'yeezy 350 trắng.jpg'),
(55, 'yeezy 350 xám.jpg'),
(56, 'chuck 70 tonal polyester hồng.jpg'),
(57, 'chuck 70 tonal polyester nâu.jpg'),
(58, 'chuck 70 tonal polyester xanh dương.jpg'),
(59, 'chuck cx gradient trắng đen cao.jpg'),
(60, 'old sckool đen.jpg'),
(61, 'old sckool trắng đen.jpg'),
(62, 'old sckool trắng.jpg'),
(63, 'sk8-hi trắng cao.jpg'),
(64, 'sk8-hi trắng đen cao.jpg'),
(65, 'slip-on checkerboard caro.jpg'),
(66, 'slip-on classic trắng.jpg'),
(67, '235 (1).jpg'),
(67, '235.jpg'),
(67, '300575030_2529310353873517_2134375835536236006_n.jpg'),
(67, '310690547_1731770450524246_7996379664543976928_n.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  ADD PRIMARY KEY (`cartegory_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  MODIFY `cartegory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
