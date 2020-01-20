# Dump of table thirts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tshirts`;

CREATE TABLE `tshirts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `modelshirt` varchar(60) DEFAULT NULL,
  `kleur` varchar(32) DEFAULT NULL,
  `maat` varchar(5) DEFAULT NULL,
  `voorraad` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tshirts` (`id`, `modelshirt`, `kleur`, `maat`, `voorraad`, `image`)
VALUES
	(1,'Party','rood','S',10,'tshirt-red.jpg'),
	(2,'Party','rood','M',10,'tshirt-red.jpg'),
	(3,'Party','rood','L',10,'tshirt-red.jpg'),
	(4,'Party','rood','XL',10,'tshirt-red.jpg'),
	(5,'Party','blauw','S',10,'tshirt-blue.jpg'),
	(6,'Party','blauw','M',10,'tshirt-blue.jpg'),
	(7,'Party','blauw','L',10,'tshirt-blue.jpg'),
	(8,'Party','blauw','XL',10,'tshirt-blue.jpg'),
	(9,'Casual','rood','S',10,'tshirt-red.jpg'),
	(10,'Casual','rood','M',10,'tshirt-red.jpg'),
	(11,'Casual','rood','L',10,'tshirt-red.jpg'),
	(12,'Casual','rood','XL',10,'tshirt-red.jpg'),
	(13,'Casual','blauw','S',10,'tshirt-blue.jpg'),
	(14,'Casual','blauw','M',10,'tshirt-blue.jpg'),
	(15,'Casual','blauw','L',10,'tshirt-blue.jpg'),
	(16,'Casual','blauw','XL',10,'tshirt-blue.jpg'),
	(17,'Sporty','rood','S',10,'tshirt-red.jpg'),
	(18,'Sporty','rood','M',10,'tshirt-red.jpg'),
	(19,'Sporty','rood','L',10,'tshirt-red.jpg'),
	(20,'Sporty','rood','XL',10,'tshirt-red.jpg'),
	(21,'Sporty','blauw','S',10,'tshirt-blue.jpg'),
	(22,'Sporty','blauw','M',10,'tshirt-blue.jpg'),
	(23,'Sporty','blauw','L',10,'tshirt-blue.jpg'),
	(24,'Sporty','blauw','XL',10,'tshirt-blue.jpg');
