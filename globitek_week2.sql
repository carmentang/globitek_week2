# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.12-0ubuntu1)
# Database: assignment02
# Generation Time: 2016-06-17 23:57:28 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`id`, `name`, `code`)
VALUES
	(1,'United States','US'),
	(2,'Canada','CA'),
	(3,'China','CT'),
	(4,'Ireland','IR');

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table salespeople
# ------------------------------------------------------------

DROP TABLE IF EXISTS `salespeople`;

CREATE TABLE `salespeople` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `salespeople` WRITE;
/*!40000 ALTER TABLE `salespeople` DISABLE KEYS */;

INSERT INTO `salespeople` (`id`, `first_name`, `last_name`, `phone`, `email`)
VALUES
	(1,'Daron','Burke','555-925-3685','dburke@salesperson.com'),
	(2,'Sherry','Trevino','555-435-1036','strevino@salesperson.com'),
	(3,'Irene','Boling','555-736-2301','iboling@salesperson.com'),
	(4,'Robert','Hamilton','555-866-6132','rhamilton@salesperson.com'),
	(5,'Ken','Barker','555-352-9652','kbarker@salesperson.com'),
	(6,'Elizabeth','Olson','555-532-3209','eolson@salesperson.com'),
	(7,'Samuel','Hunter','555-682-7543','shunter@salesperson.com'),
	(8,'Kim','Stanley','555-302-7805','kstanley@salesperson.com'),
	(9,'Barbara','Hinckley','555-437-1355','bhinckley@salesperson.com'),
	(20,'Alicia','Hamilton','510-220-1112','alice@fb.com'),
	(21,'Connie','Tang','510-207-5160','connietang@fb.com'),
	(22,'Sandra','Tuya','510-734-2341','sandratuya@fb.com'),
	(23,'Sarah','Kantona','510-323-1252','sarahkaton@fb.com'),
	(24,'Cindy','Zhang','510-207-6104','cindy.bijou@yahoo.com'),
	(25,'Tim','Doolittle','510-230-1230','timdoo@fb.com');

/*!40000 ALTER TABLE `salespeople` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table salespeople_territories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `salespeople_territories`;

CREATE TABLE `salespeople_territories` (
  `territory_id` int(11) DEFAULT NULL,
  `salesperson_id` int(11) DEFAULT NULL,
  KEY `territory_id` (`territory_id`),
  KEY `salesperson_id` (`salesperson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `salespeople_territories` WRITE;
/*!40000 ALTER TABLE `salespeople_territories` DISABLE KEYS */;

INSERT INTO `salespeople_territories` (`territory_id`, `salesperson_id`)
VALUES
	(1,1),
	(2,4),
	(3,3),
	(4,6),
	(5,4),
	(6,2),
	(7,3),
	(8,9),
	(9,9),
	(10,1),
	(11,1),
	(12,3),
	(13,3),
	(14,2),
	(15,5),
	(16,7),
	(17,5),
	(18,8),
	(19,7),
	(20,6),
	(21,9),
	(22,9),
	(24,7),
	(25,5),
	(26,1),
	(27,1),
	(28,5),
	(29,3),
	(30,8),
	(31,2),
	(32,3),
	(33,9),
	(34,9),
	(35,2),
	(36,3),
	(38,9),
	(39,1),
	(40,8),
	(41,7),
	(42,6),
	(43,4),
	(44,7),
	(45,2),
	(46,9),
	(47,1),
	(48,8),
	(49,1),
	(50,6),
	(51,3),
	(52,9),
	(53,2),
	(54,1),
	(55,4),
	(56,7),
	(57,5),
	(58,3),
	(37,9),
	(37,2),
	(59,4),
	(60,7),
	(61,5),
	(62,9),
	(72,24);

/*!40000 ALTER TABLE `salespeople_territories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table states
# ------------------------------------------------------------

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_country_id` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;

INSERT INTO `states` (`id`, `name`, `code`, `country_id`)
VALUES
	(1,'Alabama','AL',1),
	(2,'Alaska','AK',1),
	(3,'Arizona','AZ',1),
	(4,'Arkansas','AR',1),
	(5,'California','CA',1),
	(6,'Colorado','CO',1),
	(7,'Connecticut','CT',1),
	(8,'Delaware','DE',1),
	(9,'Florida','FL',1),
	(10,'Georgia','GA',1),
	(11,'Hawaii','HI',1),
	(12,'Idaho','ID',1),
	(13,'Illinois','IL',1),
	(14,'Indiana','IN',1),
	(15,'Iowa','IA',1),
	(16,'Kansas','KS',1),
	(17,'Kentucky','KY',1),
	(18,'Louisiana','LA',1),
	(19,'Maine','ME',1),
	(20,'Maryland','MD',1),
	(21,'Massachusetts','MA',1),
	(22,'Michigan','MI',1),
	(23,'Minnesota','MN',1),
	(24,'Mississippi','MS',1),
	(25,'Missouri','MO',1),
	(26,'Montana','MT',1),
	(27,'Nebraska','NE',1),
	(28,'Nevada','NV',1),
	(29,'New Hampshire','NH',1),
	(30,'New Jersey','NJ',1),
	(31,'New Mexico','NM',1),
	(32,'New York','NY',1),
	(33,'North Carolina','NC',1),
	(34,'North Dakota','ND',1),
	(35,'Ohio','OH',1),
	(36,'Oklahoma','OK',1),
	(37,'Oregon','OR',1),
	(38,'Pennsylvania','PA',1),
	(39,'Rhode Island','RI',1),
	(40,'South Carolina','SC',1),
	(41,'South Dakota','SD',1),
	(42,'Tennessee','TN',1),
	(43,'Texas','TX',1),
	(44,'Utah','UT',1),
	(45,'Vermont','VT',1),
	(46,'Virginia','VA',1),
	(47,'Washington','WA',1),
	(48,'West Virginia','WV',1),
	(49,'Wisconsin','WI',1),
	(50,'Wyoming','WY',1),
	(51,'British Columbia','BC',2),
	(52,'Ontario','ON',2),
	(53,'Quebec','QC',2),
	(54,'Samantha','SA',1),
	(55,'Aaronhood','AB',1),
	(56,'Guangzhou','GZ',3),
	(58,'Wonderland','WL',2),
	(59,'Dublin','DU',4);

/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table territories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `territories`;

CREATE TABLE `territories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `territories` WRITE;
/*!40000 ALTER TABLE `territories` DISABLE KEYS */;

INSERT INTO `territories` (`id`, `name`, `state_id`, `position`)
VALUES
	(1,'Alabama',1,1),
	(2,'Alaska',2,1),
	(3,'Arizona',3,1),
	(4,'Arkansas',4,1),
	(5,'Northern California',5,1),
	(6,'Southern California',5,2),
	(7,'Colorado',6,1),
	(8,'Connecticut',7,1),
	(9,'Delaware',8,1),
	(10,'Florida',9,1),
	(11,'Georgia',10,1),
	(12,'Hawaii',11,1),
	(13,'Idaho',12,1),
	(14,'Chicago Metro',13,1),
	(15,'Outside Chicago',13,2),
	(16,'Indiana',14,1),
	(17,'Iowa',15,1),
	(18,'Kansas',16,1),
	(19,'Kentucky',17,1),
	(20,'Louisiana',18,1),
	(21,'Maine',19,1),
	(22,'Maryland',20,1),
	(23,'Massachusetts',21,1),
	(24,'Michigan',22,1),
	(25,'Minnesota',23,1),
	(26,'Mississippi',24,1),
	(27,'St. Louis Area',25,1),
	(28,'Kansas City Area',25,2),
	(29,'Montana',26,1),
	(30,'Nebraska',27,1),
	(31,'Las Vegas',28,1),
	(32,'Outside Las Vegas',28,1),
	(33,'New Hampshire',29,1),
	(34,'Northern New Jersey',30,1),
	(35,'Southern New Jersey',30,2),
	(36,'New Mexico',31,1),
	(37,'New York City',32,1),
	(38,'Outside New York City',32,3),
	(39,'North Carolina',33,1),
	(40,'North Dakota',34,1),
	(41,'Ohio',35,1),
	(42,'Oklahoma',36,1),
	(43,'Oregon',37,1),
	(44,'Western Pennsylvania',38,1),
	(45,'Eastern Pennsylvania',38,2),
	(46,'Rhode Island',39,1),
	(47,'South Carolina',40,1),
	(48,'South Dakota',41,1),
	(49,'Tennessee',42,1),
	(50,'Texas',43,1),
	(51,'Utah',44,1),
	(52,'Vermont',45,1),
	(53,'Northern Virginia',46,1),
	(54,'Southern Virginia',46,2),
	(55,'Washington',47,1),
	(56,'West Virginia',48,1),
	(57,'Wisconsin',49,1),
	(58,'Wyoming',50,1),
	(59,'British Columbia',51,1),
	(60,'Western Ontario',52,1),
	(61,'Eastern Ontario',52,2),
	(62,'Quebec',53,1),
	(65,'Anaheim',32,4),
	(66,'Bijou',32,3),
	(67,'Benji',5,1),
	(68,'BabyTown',32,2),
	(69,'LolLand',37,1),
	(70,'Titanic',58,1),
	(71,'Las Tacos',55,1),
	(72,'Zhongshan',56,1),
	(73,'Laughingstock',3,2),
	(74,'University of Dublin',59,1);

/*!40000 ALTER TABLE `territories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `created_at`)
VALUES
	(1,'Larry','Fowlers','lf@example.com','lfowler991','2016-06-01 08:15:45'),
	(2,'Carmen','Tang','carmentang@fb.com','carmentang','2016-06-14 14:36:53'),
	(3,'Stacey','Kang','stacy@fb.com','staceytaylor','2016-06-14 15:14:41'),
	(4,'Hanna','Banana','hanna@fb.com','hannabanana','2016-06-14 15:59:24'),
	(7,'Connie','Tang','connie@fb.com','connietang','2016-06-16 22:41:09'),
	(8,'Tiffany','Hoang','teetee@gmail.com','tiffanytee','2016-06-17 00:12:27'),
	(9,'Katie','Lawrence','katielaw@gmail.com','katielawrence','2016-06-17 00:31:03'),
	(11,'John','Zuckerberg','zuckerberg@fb.com','zuckerberg','2016-06-17 16:47:12');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
