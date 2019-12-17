/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : food

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-12-17 18:06:18
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_member
-- ----------------------------
INSERT INTO `tbl_member` VALUES ('1', 'test', '001', '0879879877', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-12-13', 'mx001', '121/1 หมู่บ้านอรสิริน ทาวโฮม 1', 'เชียงใหม่', 'หนองหาร', 'หนองจ๋อม', '50210', '2019-12-13 15:56:30', '2019-12-13 15:56:32');
INSERT INTO `tbl_member` VALUES ('3', 'มิกิ', 'phenomenal software', null, 'infinityp.soft@gmail.com', '5d1d14584b0c06caf0496045c696e989', '2019-12-14', 'miki_ik', '', 'Chiangmai', null, 'หนองจ๊อม', '50290', '2019-12-14 14:53:22', '2019-12-14 14:53:22');

-- ----------------------------
-- Table structure for `tbl_order`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `amphur` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `zipcode` varchar(200) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `restaurant` varchar(255) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_order
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_restaurant`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_restaurant`;
CREATE TABLE `tbl_restaurant` (
  `id` int(11) NOT NULL,
  `id_type_restaurant` int(11) DEFAULT NULL,
  `restaurant_name` varchar(255) DEFAULT NULL,
  `restaurant_detail` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `restaurant_time` varchar(200) DEFAULT NULL,
  `restaurant_minute` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `updated_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_restaurant
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_type_food
-- ----------------------------
INSERT INTO `tbl_type_food` VALUES ('1', 'อาหารหลัก', '2019-12-17 16:09:21', null);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_type_restaurant
-- ----------------------------

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
INSERT INTO `users` VALUES ('24', 'facebook', '2356299801127131', 'Nattaphon', 'Jame', 'jame0925623256@gmail.com', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2356299801127131&height=50&width=50&ext=1576726828&hash=AeQkiC5DeUoWSGvE', '', '2019-08-19 17:53:21', '2019-11-19 10:40:28');
INSERT INTO `users` VALUES ('25', 'facebook', '1389271181226826', 'Chinnawat', 'Kaewmuangfang', 'chinnawat_buzz@hotmail.co.th', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=1389271181226826&height=50&width=50&ext=1569397101&hash=AeTKQNcQiDk_o1Yz', '', '2019-08-20 11:09:40', '2019-08-26 14:38:21');
INSERT INTO `users` VALUES ('26', 'facebook', '2543641525698182', 'เนย', 'มอร์ฟีน', 'nuey_chin@hotmail.com', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2543641525698182&height=50&width=50&ext=1568867006&hash=AeRL_W8hJ5gML5Wi', '', '2019-08-20 11:10:05', '2019-08-20 11:23:26');
INSERT INTO `users` VALUES ('27', 'facebook', '2613741632017352', 'Chayanin', 'Chayanin', 'chayani_n@hotmail.com', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2613741632017352&height=50&width=50&ext=1571723446&hash=AeTfcQny2FMhzQse', '', '2019-08-20 11:35:03', '2019-09-22 12:50:47');
INSERT INTO `users` VALUES ('28', 'facebook', '2654870534573188', 'Miki', 'Asawong', 'miki_ik@hotmail.com', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2654870534573188&height=50&width=50&ext=1577327996&hash=AeQoUcW1Z4dFC3Pw', '', '2019-08-20 11:48:48', '2019-11-26 09:39:57');
INSERT INTO `users` VALUES ('29', 'facebook', '1418018171683193', 'Chawanitnon', 'Paphatsaran', 'golfzaazeed@hotmail.com', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=1418018171683193&height=50&width=50&ext=1568964834&hash=AeRlULwk7wRGm1mX', '', '2019-08-21 14:33:55', '2019-08-21 14:33:55');
