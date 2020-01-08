-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 09:10 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`, `file_name`) VALUES
(1, 'Admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Admin-1578378483.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT '',
  `status_show` varchar(100) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `subject`, `tel`, `description`, `status_show`, `create_at`) VALUES
(1, 'miki', 'mikiboy004@gmail.com', 'nice', '0618096661', 'nice', '1', '2020-01-07 14:53:17'),
(2, 'Pongsiri Virojsasithon', 'boss3075030750@gmail.com', 'ตัดต่อรูปภาพ', '0882614049', '---', '0', '2020-01-07 14:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon`
--

CREATE TABLE `tbl_coupon` (
  `id` int(11) NOT NULL,
  `name_coupon` varchar(255) DEFAULT NULL,
  `code_coupon` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_restaurant` int(11) DEFAULT NULL,
  `food_name` varchar(255) DEFAULT NULL,
  `food_detail` varchar(255) DEFAULT NULL,
  `food_price` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `id_type_food` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `line` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `province` varchar(200) DEFAULT NULL,
  `amphur` varchar(200) DEFAULT NULL,
  `district` varchar(200) DEFAULT NULL,
  `zipcode` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `first_name`, `last_name`, `tel`, `email`, `password`, `birthday`, `line`, `address`, `province`, `amphur`, `district`, `zipcode`, `updated_at`, `created_at`) VALUES
(4, 'nattaphon', 'kiattikul', '0925623256', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1996-12-24', 'ไม่บอก', '123 หมู่ 1', 'เชียงใหม่', 'สันกำแพง', 'สันทราย', '50212', '2019-12-25 10:51:50', '2019-12-25 06:37:51'),
(5, 'Pongsiri', 'Virojsasithon', '0882614049', 'boss@test.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-06 09:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `id_type_food` varchar(255) DEFAULT NULL,
  `id_restaurant` varchar(255) DEFAULT NULL,
  `name_menu` varchar(255) DEFAULT NULL,
  `price_menu` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `status_show` varchar(100) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `id_type_food`, `id_restaurant`, `name_menu`, `price_menu`, `file_name`, `status_show`, `created_at`) VALUES
(9, '8', '2', 'ยำคิวบิด', '69', 'Food-1577075478.jpg', '0', '2020-01-07 22:37:26'),
(10, '8', '2', 'ยำ2โทน', '89', 'Food-1577106119.jpg', '1', '2019-12-23 20:01:59'),
(11, '8', '2', 'ยำข้าวโพด', '69', 'Food-1577106135.jpg', '1', '2019-12-23 20:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_facebook` varchar(255) DEFAULT '',
  `tel` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT '',
  `province` varchar(255) DEFAULT NULL,
  `amphur` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `zipcode` varchar(200) DEFAULT NULL,
  `zip_price` varchar(200) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `coupon` varchar(100) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `vat` varchar(255) DEFAULT NULL,
  `rider` int(11) NOT NULL,
  `status` int(5) DEFAULT 0,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `code`, `id_member`, `id_facebook`, `tel`, `address`, `province`, `amphur`, `district`, `zipcode`, `zip_price`, `note`, `coupon`, `total`, `vat`, `rider`, `status`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 'FD-202001073771', 4, NULL, '0925623256', '123 หมู่ 1', 'เชียงใหม่', 'สันกำแพง', 'สันทราย', '50212', '0', NULL, NULL, '267', NULL, 4, 1, '18.8737729', '99.0164236', '2020-01-07 17:39:06', '0000-00-00 00:00:00'),
(2, 'FD-202001075612', 4, NULL, '0925623256', '123 หมู่ 1', 'เชียงใหม่', 'สันกำแพง', 'สันทราย', '50212', '0', NULL, NULL, '178', NULL, 4, 0, '18.8737784', '99.01653700000001', '2020-01-07 17:45:45', '0000-00-00 00:00:00'),
(3, 'FD-202001073483', 4, NULL, '0925623256', '123 หมู่ 1', 'เชียงใหม่', 'สันกำแพง', 'สันทราย', '50212', '0', NULL, NULL, '267', NULL, 0, 0, '18.8738413', '99.01645099999999', '2020-01-07 18:02:01', '0000-00-00 00:00:00'),
(4, 'FD-202001074374', 4, NULL, '0925623256', '123 หมู่ 1', 'เชียงใหม่', 'สันกำแพง', 'สันทราย', '50212', '0', NULL, NULL, '138', NULL, 0, 0, '18.8699831', '98.9814426', '2020-01-07 23:23:07', '0000-00-00 00:00:00'),
(5, 'FD-202001077175', 4, NULL, '0925623256', '123 หมู่ 1', 'เชียงใหม่', 'สันกำแพง', 'สันทราย', '50212', '0', NULL, NULL, '316', NULL, 0, 0, '18.8699831', '98.9814426', '2020-01-07 23:33:21', '0000-00-00 00:00:00'),
(6, 'FD-202001088716', 4, NULL, '0925623256', '123 หมู่ 1', 'เชียงใหม่', 'สันกำแพง', 'สันทราย', '50212', '0', NULL, '0', '178', NULL, 0, 0, '18.873778599999998', '99.0164385', '2020-01-08 10:13:29', '0000-00-00 00:00:00'),
(7, 'FD-202001082737', 4, NULL, '0925623256', '123 หมู่ 1', 'เชียงใหม่', 'สันกำแพง', 'สันทราย', '50212', '0', NULL, '100', '178', '10', 4, 0, '18.873795299999998', '99.01645119999999', '2020-01-08 10:14:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `restaurant` varchar(255) DEFAULT NULL,
  `restaurant_address` text DEFAULT NULL,
  `restaurant_tel` varchar(255) DEFAULT NULL,
  `name_item` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price_item` varchar(255) DEFAULT NULL,
  `sumtotal` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id`, `id_order`, `restaurant`, `restaurant_address`, `restaurant_tel`, `name_item`, `qty`, `price_item`, `sumtotal`, `file_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'ร้านยำชั้น2', NULL, NULL, 'ยำ2โทน', 3, '89', '267', 'Food-1577106119.jpg', '2020-01-07 17:39:06', NULL),
(2, 2, 'ร้านยำชั้น2', NULL, NULL, 'ยำ2โทน', 2, '89', '178', 'Food-1577106119.jpg', '2020-01-07 17:45:45', NULL),
(3, 3, 'ร้านยำชั้น2', NULL, NULL, 'ยำ2โทน', 3, '89', '267', 'Food-1577106119.jpg', '2020-01-07 18:02:01', NULL),
(4, 4, 'ร้านยำชั้น2', NULL, NULL, 'ยำข้าวโพด', 2, '69', '138', 'Food-1577106135.jpg', '2020-01-07 23:23:07', NULL),
(5, 5, 'ร้านยำชั้น2', '', '0618096661', 'ยำข้าวโพด', 2, '69', '138', 'Food-1577106135.jpg', '2020-01-07 23:33:21', NULL),
(6, 5, 'ร้านยำชั้น2', '', '0618096661', 'ยำ2โทน', 2, '89', '178', 'Food-1577106119.jpg', '2020-01-07 23:33:21', NULL),
(7, 6, 'ร้านยำชั้น2', '123 หมู่ 1 สันทราย สันกำแพง เชียงใหม่ 50212', '0925623256', 'ยำ2โทน', 2, '89', '178', 'Food-1577106119.jpg', '2020-01-08 10:13:29', NULL),
(8, 7, 'ร้านยำชั้น2', '123 หมู่ 1 สันทราย สันกำแพง เชียงใหม่ 50212', '0925623256', 'ยำ2โทน', 2, '89', '178', 'Food-1577106119.jpg', '2020-01-08 10:14:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion`
--

CREATE TABLE `tbl_promotion` (
  `id` int(11) NOT NULL,
  `name_promotion` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_promotion`
--

INSERT INTO `tbl_promotion` (`id`, `name_promotion`, `details`, `file_name`, `create_at`) VALUES
(1, 'ส่งฟรี 40 บาท', 'ส่งฟรี 40 บาท', 'Promotion-1577082993.jpg', '2019-12-23 06:36:33'),
(2, 'deejung', '--', 'Promotion-1578391067.jpg', '2020-01-07 09:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant`
--

CREATE TABLE `tbl_restaurant` (
  `id` int(11) NOT NULL,
  `id_type_restaurant` int(11) DEFAULT NULL,
  `restaurant_name` varchar(255) DEFAULT NULL,
  `restaurant_name_p` varchar(255) DEFAULT NULL,
  `restaurant_tel` varchar(255) DEFAULT NULL,
  `restaurant_email` varchar(255) DEFAULT NULL,
  `restaurant_address` varchar(255) DEFAULT '',
  `file_name` varchar(255) DEFAULT NULL,
  `restaurant_open` varchar(200) DEFAULT '',
  `restaurant_close` varchar(100) DEFAULT '',
  `status` int(11) DEFAULT 1 COMMENT '1="ว่าง" 0="ไม่ว่าง"',
  `status_show` varchar(100) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_restaurant`
--

INSERT INTO `tbl_restaurant` (`id`, `id_type_restaurant`, `restaurant_name`, `restaurant_name_p`, `restaurant_tel`, `restaurant_email`, `restaurant_address`, `file_name`, `restaurant_open`, `restaurant_close`, `status`, `status_show`, `updated_at`, `created_at`) VALUES
(2, 5, 'ร้านยำชั้น2', 'นายมิกิ  อาษาวงค์', '0618096661', 'infinityp.soft@gmail.com', '', 'Restaurant-1577074270.jpg', '6:00 AM', '10:30 PM', 1, '1', NULL, '2020-01-07 15:12:25'),
(4, 5, 'ข้าวมันไก่222', 'บอส', '0889746544', 'boss3075030750@gmail.com', '---', 'Restaurant-1578384910.jpg', '12:30 AM', '1:00 AM', 1, '1', NULL, '2020-01-07 15:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rider`
--

CREATE TABLE `tbl_rider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT '',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1' COMMENT '1="ว่าง" 0="ไม่ว่าง"',
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rider`
--

INSERT INTO `tbl_rider` (`id`, `title`, `first_name`, `last_name`, `id_card`, `username`, `password`, `tel`, `email`, `file_name`, `status`, `create_at`) VALUES
(4, 'นาย', 'เจม', 'นะ', '111222663337', 'rider1', 'e10adc3949ba59abbe56e057f20f883e', '0925623256', 'jame0879871121@gmail.com', 'Rider-1578378532.svg', '0', '2020-01-07 13:28:52'),
(5, 'นาย', 'บอส', 'บอส', '55555555', 'rider2', 'e10adc3949ba59abbe56e057f20f883e', '084387225', 'vvv.@gmail.com', 'Rider-1577185645.jpg', '1', '2019-12-24 18:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type_food`
--

CREATE TABLE `tbl_type_food` (
  `id` int(11) UNSIGNED NOT NULL,
  `type_food` varchar(200) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_type_food`
--

INSERT INTO `tbl_type_food` (`id`, `type_food`, `created_at`, `updated_at`) VALUES
(5, 'อาหารหลัก', '2019-12-19 03:09:22', NULL),
(6, 'อาหารหวาน', '2019-12-19 07:11:40', NULL),
(8, 'อาหารทะเล', '2019-12-19 07:12:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type_restaurant`
--

CREATE TABLE `tbl_type_restaurant` (
  `id` int(11) UNSIGNED NOT NULL,
  `type_restaurant` varchar(200) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_type_restaurant`
--

INSERT INTO `tbl_type_restaurant` (`id`, `type_restaurant`, `created_at`, `updated_at`) VALUES
(4, 'คาเฟ่1', '2020-01-07 09:47:43', '2020-01-07 16:47:43'),
(5, 'ร้านยำ', '2019-12-19 04:24:54', NULL),
(6, 'อาหารทะเล', '2020-01-07 09:46:22', NULL),
(8, 'อาหารทะเล', '2020-01-07 10:17:46', NULL),
(9, 'อาหารทะเล2222', '2020-01-07 10:17:51', NULL),
(10, 'goo', '2020-01-07 10:17:58', NULL),
(11, 'อาหารทะเล2222', '2020-01-07 10:18:11', NULL),
(12, 'คาเฟ่1', '2020-01-07 10:18:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_coupon`
--

CREATE TABLE `tbl_user_coupon` (
  `id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `facebook_id` int(11) DEFAULT NULL,
  `create_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rider`
--
ALTER TABLE `tbl_rider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_type_food`
--
ALTER TABLE `tbl_type_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_type_restaurant`
--
ALTER TABLE `tbl_type_restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_coupon`
--
ALTER TABLE `tbl_user_coupon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_rider`
--
ALTER TABLE `tbl_rider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_type_food`
--
ALTER TABLE `tbl_type_food`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_type_restaurant`
--
ALTER TABLE `tbl_type_restaurant`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user_coupon`
--
ALTER TABLE `tbl_user_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
