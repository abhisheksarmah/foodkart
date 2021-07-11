# ************************************************************
# Sequel Ace SQL dump
# Version 3034
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.0.25)
# Database: foodcart
# Generation Time: 2021-07-11 12:42:30 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`username`, `password`)
VALUES
	('admin','12345');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `cartid` int NOT NULL,
  `email` varchar(30) NOT NULL,
  `itemid` int NOT NULL,
  `qty` int DEFAULT NULL,
  `rate` int DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cartid`,`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;

INSERT INTO `cart` (`cartid`, `email`, `itemid`, `qty`, `rate`, `status`)
VALUES
	(103668,'admin@admin.test',8,5,350,'Completed'),
	(103668,'admin@admin.test',9,3,150,'Completed'),
	(504372,'admin@admin.test',6,5,250,'bought'),
	(715045,'admin@admin.test',6,5,250,'bought'),
	(853347,'admin@admin.test',10,23,1840,'bought'),
	(889940,'admin@admin.test',9,1,50,'bought'),
	(889940,'admin@admin.test',10,2,160,'bought');

/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table delivery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `delivery`;

CREATE TABLE `delivery` (
  `orderid` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pin` bigint DEFAULT NULL,
  `phone` bigint DEFAULT NULL,
  PRIMARY KEY (`orderid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;

INSERT INTO `delivery` (`orderid`, `name`, `address`, `city`, `state`, `pin`, `phone`)
VALUES
	(39,'Abhishek Sarmah','peoli nagar','moranhat','assam',785670,8486941128),
	(40,'abhilekh','jorhat','jorhat','assam',781001,970665354),
	(41,'safdasdfkj','hkasjhdfkjh','khkjfhefk','hfksjdhaf',126738,67867),
	(42,'sadfmnkasjdf','khgkjfgkajshgdf','kghdfkjgaskdf','kghdfkgshhkaghf',1231231,123413123),
	(43,'asdjhasjfdk','jgjkgfddksjgfkj','hgkhgfkjgadksjs','gakjfhgdakj',123456,8486941128);

/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `itemid` int NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `price` int DEFAULT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;

INSERT INTO `items` (`itemid`, `category`, `type`, `name`, `image`, `price`)
VALUES
	(1,'Veg','Deserts','Chocolate Ice-Cream ','products/5bffc3b3ea414.JPG',40),
	(2,'Non-Veg','Starters','Drums of Heaven (8pcs)','products/5c041ac1c46d8a.jpg',250),
	(3,'Non-Veg','MainCourse','Fried Rice (Full Plate)','products/5c0423b236859.jpg',180),
	(4,'Non-Veg','MainCourse','Chicken Chow (Full Plate)','products/5c04347292077.jpg',90),
	(5,'Non-Veg','MainCourse','Chicken Biryani (Full Plate)','products/5c0992f665d9a.jpg',260),
	(6,'Veg','Starters','Burger','products/5c09997647113.jpg',50),
	(7,'Non-Veg','Starters','Chicken Momo (6pcs)','products/5c099bc333629.png',40),
	(8,'Veg','Beverages','Coke 1Ltr','products/5c09a34bd3011.jpg',70),
	(9,'Veg','Salads','Russian Salad','products/5c0af99843527.jpg',50),
	(10,'Veg','Beverages','Cold Coffee','products/5c0afc330343d.jpg',80),
	(11,'Non-Veg','MainCourse','Chicken Biryani (Half Plate)','products/5c14be7ed9032.jpg',130);

/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orderitems
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orderitems`;

CREATE TABLE `orderitems` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `orderid` int NOT NULL,
  `itemid` int NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `orderitems` WRITE;
/*!40000 ALTER TABLE `orderitems` DISABLE KEYS */;

INSERT INTO `orderitems` (`id`, `orderid`, `itemid`, `qty`)
VALUES
	(32,39,8,5),
	(33,39,9,3),
	(34,40,9,1),
	(35,40,10,2),
	(36,41,10,23),
	(37,42,6,5),
	(38,43,6,5);

/*!40000 ALTER TABLE `orderitems` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `orderid` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `bid` int DEFAULT NULL,
  `cartid` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` int NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`orderid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`orderid`, `email`, `bid`, `cartid`, `date`, `amount`, `status`)
VALUES
	(39,'admin@admin.test',939208,103668,'2011-07-21',500,'Completed'),
	(40,'admin@admin.test',242587,889940,'2011-07-21',210,'Completed'),
	(41,'admin@admin.test',636214,853347,'2011-07-21',1840,'Paid'),
	(42,'admin@admin.test',451282,715045,'2011-07-21',250,'Paid'),
	(43,'admin@admin.test',226881,504372,'2011-07-21',250,'Paid');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pincode
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pincode`;

CREATE TABLE `pincode` (
  `pin` bigint NOT NULL,
  PRIMARY KEY (`pin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `pincode` WRITE;
/*!40000 ALTER TABLE `pincode` DISABLE KEYS */;

INSERT INTO `pincode` (`pin`)
VALUES
	(785001),
	(785008),
	(785634),
	(785670),
	(785679);

/*!40000 ALTER TABLE `pincode` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` bigint NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`email`, `password`, `name`, `phone`)
VALUES
	('chandandutta@gmail.com','12345','Chandan Dutta',9954456568),
	('pallabi@gmail.com','12345','Pallabi Bora',9706210487),
	('abhilekhsarmah200@gmail.com','mansu.com','ABHILEKHZ',9706656354),
	('admin@admin.test','admin123','abhishek',8486941128);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
