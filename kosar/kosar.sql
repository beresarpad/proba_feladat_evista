/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : kosar

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-10-06 17:41:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES ('4', '2');
INSERT INTO `cart` VALUES ('5', '1');

-- ----------------------------
-- Table structure for cart_item
-- ----------------------------
DROP TABLE IF EXISTS `cart_item`;
CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cart_item
-- ----------------------------
INSERT INTO `cart_item` VALUES ('14', '4', '4', '34');
INSERT INTO `cart_item` VALUES ('15', '4', '6', '234');
INSERT INTO `cart_item` VALUES ('16', '4', '2', '24323');
INSERT INTO `cart_item` VALUES ('17', '4', '3', '342');
INSERT INTO `cart_item` VALUES ('23', '5', '2', '56');
INSERT INTO `cart_item` VALUES ('24', '5', '1', '45');
INSERT INTO `cart_item` VALUES ('25', '5', '6', '5464');
INSERT INTO `cart_item` VALUES ('26', '5', '4', '456');
INSERT INTO `cart_item` VALUES ('27', '5', '3', '33');

-- ----------------------------
-- Table structure for item
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('1', 'Dan Brown: Eredet');
INSERT INTO `item` VALUES ('2', 'Kellys bicikli');
INSERT INTO `item` VALUES ('3', 'Huawei P10 telefon');
INSERT INTO `item` VALUES ('4', 'LG monitor');
INSERT INTO `item` VALUES ('5', 'Fehér képkeret');
INSERT INTO `item` VALUES ('6', 'Fallabda ütő');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Teszt felhasználó', 'teszt@teszt.hu', '827ccb0eea8a706c4c34a16891f84e7b');
INSERT INTO `user` VALUES ('2', 'Proba felhasználó', 'proba@proba.hu', '827ccb0eea8a706c4c34a16891f84e7b');
