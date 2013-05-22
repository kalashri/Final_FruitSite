# MySQL-Front 5.1  (Build 1.20)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;


# Host: localhost    Database: fruitdb
# ------------------------------------------------------
# Server version 5.1.34-community

DROP DATABASE IF EXISTS `fruitdb`;
CREATE DATABASE `fruitdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fruitdb`;

#
# Source for table customer
#

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(211) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Dumping data for table customer
#
LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;

INSERT INTO `customer` VALUES (1,'arvind');
INSERT INTO `customer` VALUES (2,'john');
INSERT INTO `customer` VALUES (3,'ram');
INSERT INTO `customer` VALUES (4,'sham');
INSERT INTO `customer` VALUES (5,'victor');
INSERT INTO `customer` VALUES (6,'laxmn');
INSERT INTO `customer` VALUES (7,'dravid');
INSERT INTO `customer` VALUES (8,'sachin');
INSERT INTO `customer` VALUES (9,'vishal');
INSERT INTO `customer` VALUES (10,'sita');
INSERT INTO `customer` VALUES (11,'geeta');
INSERT INTO `customer` VALUES (12,'rita');
INSERT INTO `customer` VALUES (13,'alice');
INSERT INTO `customer` VALUES (14,'gorge');
INSERT INTO `customer` VALUES (15,'rohan');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table emp_login
#

CREATE TABLE `emp_login` (
  `emp_login_id` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`emp_login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table emp_login
#
LOCK TABLES `emp_login` WRITE;
/*!40000 ALTER TABLE `emp_login` DISABLE KEYS */;

INSERT INTO `emp_login` VALUES ('john','john');
INSERT INTO `emp_login` VALUES ('kalashri','abc');
/*!40000 ALTER TABLE `emp_login` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table fruit_order
#

CREATE TABLE `fruit_order` (
  `fp_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL DEFAULT '0',
  `order_id` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`fp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table fruit_order
#
LOCK TABLES `fruit_order` WRITE;
/*!40000 ALTER TABLE `fruit_order` DISABLE KEYS */;

/*!40000 ALTER TABLE `fruit_order` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table order_details
#

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `customer_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table order_details
#
LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;

/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table products
#

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(211) NOT NULL,
  `product_price` decimal(11,0) NOT NULL,
  `product_image` varchar(211) NOT NULL,
  `comments` varchar(211) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

#
# Dumping data for table products
#
LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` VALUES (1,'apple',140,'img/apple.jpg','price is for one apple');
INSERT INTO `products` VALUES (2,'banana',30,'img/banana.jpg','price for dozones of banana');
INSERT INTO `products` VALUES (3,'brinjal',40,'img/brinjal.jpg','price per kg');
INSERT INTO `products` VALUES (4,'capsicum',40,'img/capsicum.jpg','');
INSERT INTO `products` VALUES (5,'carrot',60,'img/carrot.jpg','price per kg');
INSERT INTO `products` VALUES (6,'grapes',80,'img/grapes.jpg','price per kg');
INSERT INTO `products` VALUES (7,'greenChilly',20,'img/greenChilly.jpg','price per kg');
INSERT INTO `products` VALUES (8,'ladiesfinger',30,'img/ladiesfinger.jpg','price per kg');
INSERT INTO `products` VALUES (9,'lemon',100,'img/lemon.jpg','price for 10 lemons');
INSERT INTO `products` VALUES (10,'mango',600,'img/mango.jpg','pirce for dozones of mangoes');
INSERT INTO `products` VALUES (11,'methi',20,'img/methi.jpg','price for bunch of methi');
INSERT INTO `products` VALUES (12,'orange',100,'img/orange.jpg','price per dozones of oranges');
INSERT INTO `products` VALUES (13,'papaya',80,'img/papaya.jpg','price of 2 papaya');
INSERT INTO `products` VALUES (14,'raddish',0,'img/raddish.jpg','price per kg');
INSERT INTO `products` VALUES (15,'redChilly',50,'img/redChilly.jpg','price per kg');
INSERT INTO `products` VALUES (16,'strawberries',80,'img/strawberries.jpg','price per kg');
INSERT INTO `products` VALUES (17,'watermelon',50,'img/watermelon.jpg','price of one watermelon');
INSERT INTO `products` VALUES (18,'coriander',20,'img/coriander.jpg','price per bunch of coriander');
INSERT INTO `products` VALUES (19,'springonion',20,'springonion.jpg','price per bunch of coriander');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
