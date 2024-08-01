-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 01, 2024 lúc 06:42 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_mysqli`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_status`) VALUES
(4, 'htl01', '124bd1296bec0d9d93c7b52a71ad8d5b', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `ordinal_numbers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `ordinal_numbers`) VALUES
(26, 'Điện Thoại', 1),
(27, 'Ốp Lưng', 2),
(28, 'Kính Cường Lực', 3),
(29, 'Phụ Kiện Trang Trí', 4),
(30, 'Tai Nghe', 5),
(63, 'Cục Sạc', 0),
(64, 'Sale 99%', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_price` int(250) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_summary` tinytext NOT NULL,
  `product_content` text NOT NULL,
  `product_status` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_code`, `product_price`, `product_quantity`, `product_image`, `product_summary`, `product_content`, `product_status`, `category_id`) VALUES
(137, 'Gigachad', '11111', 0, 1, '1701092935_gigachad.webp', 'Chad', 'Gigachad !', 1, 33),
(177, 'Iphone 1', '', 1000000, 100, '1701519876_R (1).jfif', '', '', 1, 26),
(178, 'Iphone 2', '', 2000000, 100, '1701519961_R.jfif', '', '', 1, 26),
(179, 'Iphone 3', '', 3000000, 100, '1701519999_iPhone-3.png', '', '', 1, 26),
(180, 'Iphone 4', '', 4000000, 100, '1701520043_81f7EqIrWlL._SL1500_.jpg', '', '', 1, 26),
(181, 'Iphone 5', '', 5000000, 100, '1701520071_R (2).jfif', '', '', 1, 26),
(182, 'Iphone 6', '', 6000000, 100, '1701520101_iPhone6s_2up_PB_PF_SpGry_US-EN-SCREEN.png', '', '', 1, 26),
(183, 'Iphone 7', '', 7000000, 100, '1701520147_OIP.jfif', '', '', 1, 26),
(184, 'Iphone 8', '', 8000000, 100, '1701520169_101117.webp', '', '', 1, 26),
(185, 'Iphone X', '', 10000000, 100, '1701520190_R (3).jfif', '', '', 1, 26),
(186, 'Iphone 11', '', 11000000, 100, '1701520303_3.png', '', '', 1, 26),
(187, 'Iphone 12', '', 12000000, 100, '1701520319_None_32e767de-b206-4f60-a4ca-b22f51f29d8c.jpg', '', '', 1, 26),
(188, 'Iphone 13', '', 13000000, 100, '1701520341_back_front-midnight.png', '', '', 1, 26),
(189, 'Iphone 14', '', 14000000, 100, '1701520360_iphone_14_pro_-_silver_1_1_1.jpg', '', '', 1, 26),
(190, 'Ốp lưng iphone 4', '', 40000, 100, '1701520821_R.jfif', '', '', 1, 27),
(191, 'Ốp lưng iphone 5', '', 50000, 100, '1701520840_86a54e1979512c7a7e6280014905df8b.jpg', '', '', 1, 27),
(192, 'Ốp lưng iphone 6', '', 60000, 100, '1701520891_OP-LUNG-NHIEU-MAU-IPHONE-7-8-PLUS-1.png', '', '', 1, 27),
(193, 'Ốp lưng iphone 7', '', 70000, 100, '1701520910_OP-LUNG-NHIEU-MAU-IPHONE-7-8-PLUS-1.png', '', '', 1, 27),
(194, 'Ốp lưng iphone 8', '', 80000, 100, '1701520920_R (2).jfif', '', '', 1, 27),
(195, 'Ốp lưng iphone x', '', 100000, 100, '1701520952_OIP (1).jfif', '', '', 1, 27),
(196, 'Ốp lưng iphone 11', '', 110000, 100, '1701520970_OIP (2).jfif', '', '', 1, 27),
(197, 'Ốp lưng iphone 12', '', 120000, 100, '1701520989_R (1).jfif', '', '', 1, 27),
(198, 'Ốp lưng iphone 13', '', 130000, 100, '1701521004_op-lung-iphone-8-plus-7-plus-spigen-ultra-hybrid-21569502182.jpg', '', '', 1, 27),
(199, 'Ốp lưng iphone 14', '', 140000, 100, '1701521013_R (3).jfif', '', '', 1, 27),
(200, 'Kính cường lực iphone', '', 50000, 10, '1701521628_co-nen-dan-kinh-cuong-luc-khong-2.jpg', '', '', 1, 28),
(201, 'Cục sạc iphone', '', 100000, 100, '1701524142_download.jfif', '', '', 1, 63),
(202, 'Cute stickers 1', '', 10000, 100, '1701524203_2d193aa40dcc4e27496365642ca92a82.jpg', '', '', 1, 29),
(203, 'Cute stickers 2', '', 10000, 100, '1701524219_3f592de34f5c3bbdfa5100a8d4d344a6.jpg', '', '', 1, 29),
(204, 'Cute stickers 3', '', 10000, 100, '1701524226_7a46a1f40f22775017d46efb66569c98.jpg', '', '', 1, 29),
(205, 'Cute stickers 4', '', 10000, 100, '1701524233_71OPReWnuWL.jpg', '', '', 1, 29),
(206, 'Cute stickers 5', '', 10000, 100, '1701524248_7093a45fa92562c64d5e26d78fb67041.jpg', '', '', 1, 29),
(208, 'Cute stickers 7', '', 10000, 100, '1701524402_OIP (7).jfif', '', '', 1, 29),
(209, 'Cute stickers 6', '', 10000, 100, '1701524410_OIP (6).jfif', '', '', 1, 29),
(210, 'Cute stickers 8', '', 10000, 100, '1701524420_OIP (5).jfif', '', '', 1, 29),
(211, 'Cute stickers 9', '', 10000, 100, '1701524433_OIP (4).jfif', '', '', 1, 29),
(212, 'Cute stickers 10', '', 10000, 100, '1701524458_OIP (3).jfif', '', '', 1, 29),
(213, 'Cute stickers 11', '', 10000, 100, '1701524465_OIP (2).jfif', '', '', 1, 29),
(214, 'Cute stickers 12', '', 10000, 100, '1701524479_7a46a1f40f22775017d46efb66569c98.jpg', '', '', 1, 29),
(215, 'Tai nghe iphone', '', 80000, 100, '1701524725_OIP (8).jfif', '', '', 1, 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_phone_nums` varchar(30) NOT NULL,
  `user_nickname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `user_username`, `user_password`, `user_email`, `user_address`, `user_phone_nums`, `user_nickname`) VALUES
(42, 'abc02', 'eb62f6b9306db575c2d596b1279627a4', 'b@gmail.com', 'Ha Noi', '012345', 'Nguyễn Văn B'),
(43, 'abc01', 'eb62f6b9306db575c2d596b1279627a4', 'abc@gmail.com', 'Ha_Noi', '0123456', 'Nguyễn Văn B'),
(45, 'abc', 'eb62f6b9306db575c2d596b1279627a4', 'abc@gmail.com', 'Ha Noi', '0123456', 'Nguyễn Văn A');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
