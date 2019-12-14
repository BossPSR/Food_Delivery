/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : food

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-12-14 14:13:50
*/

SET FOREIGN_KEY_CHECKS=0;

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
INSERT INTO `tbl_member` VALUES ('3', 'มิกิ', 'phenomenal software', '0618096661', 'infinityp.soft@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-12-14', 'miki_ik', '247/5 moo 4', 'Chiangmai', 'SanSai', 'หนองจ๊อม', '50290', '2019-12-14 14:04:05', '2019-12-14 14:07:12');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_type_food
-- ----------------------------

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
