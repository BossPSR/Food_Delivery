/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : food

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-01-04 15:00:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_admin
-- ----------------------------
INSERT INTO `tbl_admin` VALUES ('1', 'admin test', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'avatar-s-11.jpg');

-- ----------------------------
-- Table structure for `tbl_contact`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT '',
  `create_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_contact
-- ----------------------------
INSERT INTO `tbl_contact` VALUES ('1', 'miki', 'mikiboy004@gmail.com', 'nice', '0618096661', 'nice', '2019-12-14 14:47:50');

-- ----------------------------
-- Table structure for `tbl_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_coupon`;
CREATE TABLE `tbl_coupon` (
  `id` int(11) NOT NULL,
  `name_coupon` varchar(255) DEFAULT NULL,
  `code_coupon` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_coupon
-- ----------------------------
INSERT INTO `tbl_coupon` VALUES ('1', 'ส่วนลดใช้ครั้งแรก', 'New100', '100');

-- ----------------------------
-- Table structure for `tbl_food`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_food`;
CREATE TABLE `tbl_food` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_restaurant` int(11) DEFAULT NULL,
  `food_name` varchar(255) DEFAULT NULL,
  `food_detail` varchar(255) DEFAULT NULL,
  `food_price` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `id_type_food` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_food
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_member`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_member`;
CREATE TABLE `tbl_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_member
-- ----------------------------
INSERT INTO `tbl_member` VALUES ('4', 'nattaphon', 'kiattikul', '0925623256', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1996-12-24', 'ไม่บอก', '123 หมู่ 1', 'เชียงใหม่', 'สันกำแพง', 'สันทราย', '50212', '2019-12-25 10:51:50', '2019-12-25 13:37:51');

-- ----------------------------
-- Table structure for `tbl_menu`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_food` varchar(255) DEFAULT NULL,
  `id_restaurant` varchar(255) DEFAULT NULL,
  `name_menu` varchar(255) DEFAULT NULL,
  `price_menu` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_menu
-- ----------------------------
INSERT INTO `tbl_menu` VALUES ('9', '9', '2', 'ยำคิวบิด', '69', 'Food-1577075478.jpg', '2019-12-23 11:31:18');
INSERT INTO `tbl_menu` VALUES ('10', '9', '2', 'ยำ2โทน', '89', 'Food-1577106119.jpg', '2019-12-23 20:01:59');
INSERT INTO `tbl_menu` VALUES ('11', '9', '2', 'ยำข้าวโพด', '69', 'Food-1577106135.jpg', '2019-12-23 20:02:15');

-- ----------------------------
-- Table structure for `tbl_order`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_facebook` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `province` varchar(255) DEFAULT NULL,
  `amphur` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `zipcode` varchar(200) DEFAULT NULL,
  `zip_price` varchar(200) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `vat` varchar(255) DEFAULT '',
  `rider` int(11) NOT NULL,
  `status` int(5) DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_order
-- ----------------------------
INSERT INTO `tbl_order` VALUES ('5', 'FD-201912247515', '4', null, '123 หมู่ 1', 'เชียงใหม่', 'สันกำแพง', 'สันทราย', '50212', '15', null, '173', '20', '5', '1', '2019-12-24 16:41:29', '0000-00-00 00:00:00');
INSERT INTO `tbl_order` VALUES ('6', 'FD-201912242546', '4', null, '123 หมู่ 1', 'เชียงใหม่', 'สันกำแพง', 'สันทราย', '50212', '15', null, '193', null, '4', '3', '2019-12-24 16:45:23', '0000-00-00 00:00:00');
INSERT INTO `tbl_order` VALUES ('7', 'FD-201912248017', '4', null, '123 หมู่ 1', 'เชียงใหม่', 'สันกำแพง', 'สันทราย', '50212', '15', null, '84', null, '4', '3', '2019-12-24 16:47:06', '0000-00-00 00:00:00');
INSERT INTO `tbl_order` VALUES ('8', 'FD-201912247808', '4', null, '123 หมู่ 1', 'เชียงใหม่', 'สันกำแพง', 'สันทราย', '50212', '15', null, '371', null, '4', '1', '2019-12-24 19:43:36', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `tbl_order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order_detail`;
CREATE TABLE `tbl_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `name_item` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price_item` varchar(255) DEFAULT NULL,
  `sumtotal` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_order_detail
-- ----------------------------
INSERT INTO `tbl_order_detail` VALUES ('10', '5', '2', 'ยำคิวบิด', '1', '69', '69.00', 'Food-1577075478.jpg', '2019-12-24 16:41:29', null);
INSERT INTO `tbl_order_detail` VALUES ('11', '5', '2', 'ยำ2โทน', '1', '89', '89.00', 'Food-1577106119.jpg', '2019-12-24 16:41:29', null);
INSERT INTO `tbl_order_detail` VALUES ('12', '6', '2', 'ยำ2โทน', '2', '89', '178.00', 'Food-1577106119.jpg', '2019-12-24 16:45:23', null);
INSERT INTO `tbl_order_detail` VALUES ('13', '7', '2', 'ยำคิวบิด', '1', '69', '69.00', 'Food-1577075478.jpg', '2019-12-24 16:47:06', null);
INSERT INTO `tbl_order_detail` VALUES ('14', '8', '2', 'ยำ2โทน', '4', '89', '356.00', 'Food-1577106119.jpg', '2019-12-24 19:43:36', null);

-- ----------------------------
-- Table structure for `tbl_promotion`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_promotion`;
CREATE TABLE `tbl_promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_promotion` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_promotion
-- ----------------------------
INSERT INTO `tbl_promotion` VALUES ('1', 'ส่งฟรี 40 บาท', 'ส่งฟรี 40 บาท', 'Promotion-1577082993.jpg', '2019-12-23 13:36:33');

-- ----------------------------
-- Table structure for `tbl_restaurant`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_restaurant`;
CREATE TABLE `tbl_restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_restaurant
-- ----------------------------
INSERT INTO `tbl_restaurant` VALUES ('2', '5', 'ร้านยำชั้น2', 'นายมิกิ  อาษาวงค์', '0618096661', 'infinityp.soft@gmail.com', '', 'Restaurant-1577074270.jpg', '6:00 AM', '10:30 PM', '0', null, '2019-12-23 11:11:10');

-- ----------------------------
-- Table structure for `tbl_rider`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rider`;
CREATE TABLE `tbl_rider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `create_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_rider
-- ----------------------------
INSERT INTO `tbl_rider` VALUES ('4', 'นาย', 'เจม', 'นะ', '111222663337', 'rider1', 'e10adc3949ba59abbe56e057f20f883e', '0925623256', 'jame0879871121@gmail.com', 'Rider-1577185583.jpg', '1', '2019-12-24 18:06:23');
INSERT INTO `tbl_rider` VALUES ('5', 'นาย', 'บอส', 'บอส', '55555555', 'rider2', 'e10adc3949ba59abbe56e057f20f883e', '084387225', 'vvv.@gmail.com', 'Rider-1577185645.jpg', '1', '2019-12-24 18:07:25');

-- ----------------------------
-- Table structure for `tbl_type_food`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_type_food`;
CREATE TABLE `tbl_type_food` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_food` varchar(200) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_type_food
-- ----------------------------
INSERT INTO `tbl_type_food` VALUES ('5', 'อาหารหลัก', '2019-12-19 10:09:22', null);
INSERT INTO `tbl_type_food` VALUES ('6', 'อาหารหวาน', '2019-12-19 14:11:40', null);
INSERT INTO `tbl_type_food` VALUES ('7', 'เส้น', '2019-12-19 14:11:55', null);
INSERT INTO `tbl_type_food` VALUES ('8', 'อาหารทะเล', '2019-12-19 14:12:11', null);
INSERT INTO `tbl_type_food` VALUES ('9', 'ยำ', '2019-12-19 14:14:39', null);

-- ----------------------------
-- Table structure for `tbl_type_restaurant`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_type_restaurant`;
CREATE TABLE `tbl_type_restaurant` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_restaurant` varchar(200) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_type_restaurant
-- ----------------------------
INSERT INTO `tbl_type_restaurant` VALUES ('4', 'คาเฟ่', '2019-12-19 14:15:05', '2019-12-19 14:15:05');
INSERT INTO `tbl_type_restaurant` VALUES ('5', 'ร้านยำ', '2019-12-19 11:24:54', null);

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
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

-- ----------------------------
-- Records of users
-- ----------------------------
