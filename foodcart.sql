/*
Navicat MySQL Data Transfer

Source Server         : con
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : foodstation

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-01-28 22:45:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('admin', '12345');

-- ----------------------------
-- Table structure for `cart`
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `itemid` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cartid`,`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cart
-- ----------------------------

-- ----------------------------
-- Table structure for `delivery`
-- ----------------------------
DROP TABLE IF EXISTS `delivery`;
CREATE TABLE `delivery` (
  `orderid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pin` bigint(20) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`orderid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of delivery
-- ----------------------------

-- ----------------------------
-- Table structure for `items`
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `itemid` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('1', 'Veg', 'Deserts', 'Chocolate Ice-Cream ', 'products/5bffc3b3ea414.JPG', '40');
INSERT INTO `items` VALUES ('2', 'Non-Veg', 'Starters', 'Drums of Heaven (8pcs)', 'products/5c041ac1c46d8a.jpg', '250');
INSERT INTO `items` VALUES ('3', 'Non-Veg', 'MainCourse', 'Fried Rice (Full Plate)', 'products/5c0423b236859.jpg', '180');
INSERT INTO `items` VALUES ('4', 'Non-Veg', 'MainCourse', 'Chicken Chow (Full Plate)', 'products/5c04347292077.jpg', '90');
INSERT INTO `items` VALUES ('5', 'Non-Veg', 'MainCourse', 'Chicken Biryani (Full Plate)', 'products/5c0992f665d9a.jpg', '260');
INSERT INTO `items` VALUES ('6', 'Veg', 'Starters', 'Burger', 'products/5c09997647113.jpg', '50');
INSERT INTO `items` VALUES ('7', 'Non-Veg', 'Starters', 'Chicken Momo (6pcs)', 'products/5c099bc333629.png', '40');
INSERT INTO `items` VALUES ('8', 'Veg', 'Beverages', 'Coke 1Ltr', 'products/5c09a34bd3011.jpg', '70');
INSERT INTO `items` VALUES ('9', 'Veg', 'Salads', 'Russian Salad', 'products/5c0af99843527.jpg', '50');
INSERT INTO `items` VALUES ('10', 'Veg', 'Beverages', 'Cold Coffee', 'products/5c0afc330343d.jpg', '80');
INSERT INTO `items` VALUES ('11', 'Non-Veg', 'MainCourse', 'Chicken Biryani (Half Plate)', 'products/5c14be7ed9032.jpg', '130');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `cartid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`orderid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for `pincode`
-- ----------------------------
DROP TABLE IF EXISTS `pincode`;
CREATE TABLE `pincode` (
  `pin` bigint(20) NOT NULL,
  PRIMARY KEY (`pin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pincode
-- ----------------------------
INSERT INTO `pincode` VALUES ('785001');
INSERT INTO `pincode` VALUES ('785008');
INSERT INTO `pincode` VALUES ('785634');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('chandandutta@gmail.com', '12345', 'Chandan Dutta', '9954456568');
INSERT INTO `users` VALUES ('pallabi@gmail.com', '12345', 'Pallabi Bora', '9706210487');
