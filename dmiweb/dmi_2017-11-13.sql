# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.16-MariaDB)
# Database: dmi
# Generation Time: 2017-11-13 09:50:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table banners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;

INSERT INTO `banners` (`id`, `title`, `subtitle`, `url`, `created_at`, `updated_at`)
VALUES
	(1,'RUMBLER 500','Nibh Adipiscing Vulputate Lorem Ullamcorper','#','2017-10-09 18:24:18','2017-10-18 11:21:37'),
	(2,'Continental GT','Nibh Adipiscing Vulputate Lorem Ullamcorper','#','2017-10-09 18:29:56','2017-10-09 18:29:56');

/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table careers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `careers`;

CREATE TABLE `careers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `careers` WRITE;
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;

INSERT INTO `careers` (`id`, `title`, `slug`, `position`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'Web Developer','web-developer','Web Developer','<p>Cras mattis consectetur purus sit amet fermentum. Nullam quis risus eget urna mollis ornare vel eu leo. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>\r\n<ul>\r\n<li>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</li>\r\n<li>Vivamus sagittis lacus vel augue</li>\r\n<li>laoreet rutrum faucibus dolor auctor.</li>\r\n<li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\r\n<li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam porta sem malesuada magna mollis euismod.</li>\r\n</ul>\r\n<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean lacinia bibendum nulla sed consectetur. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>','2017-10-19 14:46:26','2017-10-19 14:46:26'),
	(2,'Digital Marketing','digital-marketing','Digital Marketing','<p>Cras mattis consectetur purus sit amet fermentum. Nullam quis risus eget urna mollis ornare vel eu leo. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>\r\n<ul>\r\n<li>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</li>\r\n<li>Vivamus sagittis lacus vel augue</li>\r\n<li>laoreet rutrum faucibus dolor auctor.</li>\r\n<li>Praesent commodo cursus magna,</li>\r\n<li>Vel scelerisque nisl consectetur et.</li>\r\n<li>Cum sociis natoque penatibus</li>\r\n</ul>\r\n<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean lacinia bibendum nulla sed consectetur. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>','2017-10-19 14:47:00','2017-10-19 14:47:00');

/*!40000 ALTER TABLE `careers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parrent_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` mediumtext COLLATE utf8mb4_unicode_ci,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `parrent_id`, `title`, `slug`, `keyword`, `excerpt`, `color`, `status`, `created_at`, `updated_at`)
VALUES
	(1,NULL,'Event','event',NULL,NULL,NULL,NULL,'2017-10-10 13:28:10','2017-10-10 13:28:10');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_post
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_post`;

CREATE TABLE `category_post` (
  `post_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `category_post_post_id_index` (`post_id`),
  KEY `category_post_category_id_index` (`category_id`),
  CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `category_post` WRITE;
/*!40000 ALTER TABLE `category_post` DISABLE KEYS */;

INSERT INTO `category_post` (`post_id`, `category_id`, `created_at`, `updated_at`)
VALUES
	(1,1,'2017-10-10 13:30:31','2017-10-10 13:30:31'),
	(2,1,'2017-10-10 13:31:52','2017-10-10 13:31:52');

/*!40000 ALTER TABLE `category_post` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `post_id` int(10) unsigned DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_post_id_foreign` (`post_id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table domisilis
# ------------------------------------------------------------

DROP TABLE IF EXISTS `domisilis`;

CREATE TABLE `domisilis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `domisilis` WRITE;
/*!40000 ALTER TABLE `domisilis` DISABLE KEYS */;

INSERT INTO `domisilis` (`id`, `title`, `value`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'Bekasi / Depok / Tangerang',500000,NULL,'2017-10-10 13:35:25','2017-10-10 13:35:25'),
	(2,'Bogor / Jawa Barat',1500000,NULL,'2017-10-10 13:35:53','2017-10-10 13:35:53'),
	(3,'Luar Jawa / Jateng / Jatim / Bali',3500000,NULL,'2017-10-10 13:36:03','2017-10-10 13:36:03');

/*!40000 ALTER TABLE `domisilis` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table inboxes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `inboxes`;

CREATE TABLE `inboxes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `inboxes` WRITE;
/*!40000 ALTER TABLE `inboxes` DISABLE KEYS */;

INSERT INTO `inboxes` (`id`, `name`, `email`, `phone`, `option`, `subject`, `message`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'imansyah indra pahlawan','iman_indra47@yahoo.co.id','81287920061',NULL,'oioi','OI SAMPe gaaaa',NULL,'2017-11-02 15:42:31','2017-11-02 15:42:31'),
	(2,'imansyah indra pahlawan','iman_indra47@yahoo.co.id','81287920061',NULL,'oioi','OI SAMPe gaaaa',NULL,'2017-11-02 15:43:01','2017-11-02 15:43:01'),
	(3,'imansyah indra pahlawan','iman_indra47@yahoo.co.id','81287920061',NULL,'hello','da',NULL,'2017-11-02 15:43:44','2017-11-02 15:43:44'),
	(4,'imansyah indra pahlawan','iman_indra47@yahoo.co.id','81287920061',NULL,'asdasd','dada',NULL,'2017-11-02 15:48:58','2017-11-02 15:48:58'),
	(5,'Abdul Basith','chit.eureka@gmail.com','0190293109301817616186',NULL,'asdasd','asdasd',NULL,'2017-11-02 16:05:34','2017-11-02 16:05:34'),
	(6,'imansyah indra pahlawan','iman_indra47@yahoo.co.id','81287920061',NULL,'asdasd','aadadasd',NULL,'2017-11-02 16:06:17','2017-11-02 16:06:17');

/*!40000 ALTER TABLE `inboxes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table location_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `location_categories`;

CREATE TABLE `location_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `location_categories` WRITE;
/*!40000 ALTER TABLE `location_categories` DISABLE KEYS */;

INSERT INTO `location_categories` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'Motorcycle Dealership','motorcycle-dealership',NULL,'2017-10-17 17:02:20','2017-10-17 17:02:20'),
	(2,'Exclusive Gear Store','exclusive-gear-store',NULL,'2017-10-17 17:02:33','2017-10-17 17:02:33'),
	(3,'Authorized Service Center','authorized-service-center',NULL,'2017-10-17 17:02:56','2017-10-17 17:02:56');

/*!40000 ALTER TABLE `location_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_category_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locations_location_category_id_index` (`location_category_id`),
  CONSTRAINT `locations_location_category_id_foreign` FOREIGN KEY (`location_category_id`) REFERENCES `location_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;

INSERT INTO `locations` (`id`, `location_category_id`, `title`, `slug`, `longitude`, `latitude`, `address`, `created_at`, `updated_at`)
VALUES
	(1,3,'Jakarta','jakarta','106.8188353','-6.2757237','<p>Jl. Pejaten Barat Raya No.5, <br />Jakarta 12510</p>','2017-10-17 17:17:04','2017-10-17 17:17:04'),
	(3,1,'Pondok Indah','pondok-indah','106.7823753','-6.2653832','<p>Jl. Pejaten Barat Raya No.5, <br />Jakarta 12510</p>','2017-10-27 10:46:42','2017-10-27 10:46:42');

/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `manipulations` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;

INSERT INTO `media` (`id`, `model_id`, `model_type`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `order_column`, `created_at`, `updated_at`)
VALUES
	(9,1,'App\\Post','thumbnail','9U3A2207__1_.0','9U3A2207__1_.0.jpg','image/jpeg','media',131730,'[]','{\"title\":\"Nullam quis risus eget urna\",\"caption\":\"Nullam quis risus eget urna\"}',7,'2017-10-10 13:30:31','2017-10-10 13:30:31'),
	(10,2,'App\\Post','thumbnail','158296_re','158296_re.jpg','image/jpeg','media',428378,'[]','{\"title\":\"Curabitur blandit tempus porttito\",\"caption\":\"Curabitur blandit tempus porttito\"}',8,'2017-10-10 13:31:52','2017-10-10 13:31:52'),
	(23,2,'App\\Post','posts','158296_re','158296_re.jpg','image/jpeg','media',428378,'[]','{\"title\":\"Royal Enfield\",\"caption\":\"Royal Enfield\"}',20,'2017-10-10 15:04:35','2017-10-10 15:04:35'),
	(24,1,'App\\Post','posts','14812887_1343086672392639_1420522195_o','14812887_1343086672392639_1420522195_o.jpg','image/jpeg','media',71767,'[]','{\"title\":\"Royal Enfield\",\"caption\":\"Royal Enfield\"}',21,'2017-10-10 15:06:02','2017-10-10 15:06:02'),
	(38,5,'App\\Product','products','BlackGT-site-frontside','BlackGT-site-frontside.png','image/png','media',295891,'[]','{\"title\":\"CONTINENTAL GT\",\"caption\":\"CONTINENTAL GT\"}',29,'2017-10-18 11:45:43','2017-10-18 11:45:43'),
	(39,5,'App\\Product','products','BlackGT-site-rightside','BlackGT-site-rightside.png','image/png','media',268249,'[]','{\"title\":\"CONTINENTAL GT\",\"caption\":\"CONTINENTAL GT\"}',30,'2017-10-18 11:48:24','2017-10-18 11:48:24'),
	(40,5,'App\\Product','products','BlackGT-site-leftside','BlackGT-site-leftside.png','image/png','media',262708,'[]','{\"title\":\"CONTINENTAL GT\",\"caption\":\"CONTINENTAL GT\"}',31,'2017-10-18 11:48:31','2017-10-18 11:48:31'),
	(45,6,'App\\Product','products','classic350_slant-front_blue_600x463_motorcycle','classic350_slant-front_blue_600x463_motorcycle.png','image/png','media',222663,'[]','{\"title\":\"CLASSIC 350\",\"caption\":\"CLASSIC 350\"}',32,'2017-10-18 11:52:15','2017-10-18 11:52:15'),
	(46,6,'App\\Product','products','classic350_slant-rear_blue_600x463_motorcycle','classic350_slant-rear_blue_600x463_motorcycle.png','image/png','media',232749,'[]','{\"title\":\"CLASSIC 350\",\"caption\":\"CLASSIC 350\"}',33,'2017-10-18 11:52:22','2017-10-18 11:52:22'),
	(47,6,'App\\Product','products','classic350_right-side_blue_600x463_motorcycle','classic350_right-side_blue_600x463_motorcycle.png','image/png','media',263057,'[]','{\"title\":\"CLASSIC 350\",\"caption\":\"CLASSIC 350\"}',34,'2017-10-18 11:52:28','2017-10-18 11:52:28'),
	(48,7,'App\\Product','products','bullet500EFI_slant-front_green_600x463_motorcycles','bullet500EFI_slant-front_green_600x463_motorcycles.png','image/png','media',262915,'[]','{\"title\":\"BULLET 500 EFI\",\"caption\":\"BULLET 500 EFI\"}',35,'2017-10-18 11:55:42','2017-10-18 11:55:42'),
	(49,7,'App\\Product','products','bullet-500-EFI_left_side_green_600x463_motorcycles','bullet-500-EFI_left_side_green_600x463_motorcycles.png','image/png','media',277699,'[]','{\"title\":\"BULLET 500 EFI\",\"caption\":\"BULLET 500 EFI\"}',36,'2017-10-18 11:55:53','2017-10-18 11:55:53'),
	(50,7,'App\\Product','products','bullet-500-EFI_right_side_green_600x463_motorcycles','bullet-500-EFI_right_side_green_600x463_motorcycles.png','image/png','media',282076,'[]','{\"title\":\"BULLET 500 EFI\",\"caption\":\"BULLET 500 EFI\"}',37,'2017-10-18 11:55:58','2017-10-18 11:55:58'),
	(51,8,'App\\Product','products','tb500_right-side_midnight_600x463_motorcycle','tb500_right-side_midnight_600x463_motorcycle.png','image/png','media',275220,'[]','{\"title\":\"RUMBLER 500\",\"caption\":\"RUMBLER 500\"}',38,'2017-10-18 11:58:10','2017-10-18 11:58:10'),
	(52,4,'App\\Page','pages','BlackGT-site-leftside3','BlackGT-site-leftside3.png','image/png','media',625303,'[]','{\"title\":\"Management\",\"caption\":\"Management\"}',39,'2017-10-19 13:52:27','2017-10-19 13:52:27'),
	(53,3,'App\\Page','pages','BlackGT-site-leftside3','BlackGT-site-leftside3.png','image/png','media',625303,'[]','{\"title\":\"Company Overview\",\"caption\":\"Company Overview\"}',40,'2017-10-19 13:52:45','2017-10-19 13:52:45'),
	(57,2,'App\\Page','pages','career','career.png','image/png','media',182975,'[]','{\"title\":\"Career\",\"caption\":\"Career\"}',41,'2017-10-19 14:44:32','2017-10-19 14:44:32'),
	(59,2,'App\\Banner','banners','banner','banner.jpg','image/jpeg','media',226456,'[]','{\"title\":\"Continental GT\",\"caption\":\"Continental GT\"}',42,'2017-10-24 14:40:33','2017-10-24 14:40:33'),
	(60,1,'App\\Banner','banners','banner','banner.jpg','image/jpeg','media',226456,'[]','{\"title\":\"RUMBLER 500\",\"caption\":\"RUMBLER 500\"}',43,'2017-10-24 14:52:31','2017-10-24 14:52:31'),
	(61,5,'App\\ProductCategory','products','BlackGT-site-frontside','BlackGT-site-frontside.png','image/png','media',295891,'[]','{\"title\":\"CAFE RACER\",\"caption\":\"CAFE RACER\"}',44,'2017-10-24 16:02:10','2017-10-24 16:02:10'),
	(62,3,'App\\ProductCategory','products','bullet','bullet.png','image/png','media',261512,'[]','{\"title\":\"Bullet\",\"caption\":\"Bullet\"}',45,'2017-10-24 17:49:38','2017-10-24 17:49:38'),
	(63,2,'App\\ProductCategory','products','rumbler','rumbler.png','image/png','media',316503,'[]','{\"title\":\"Rumbler\",\"caption\":\"Rumbler\"}',46,'2017-10-24 17:49:49','2017-10-24 17:49:49'),
	(64,1,'App\\ProductCategory','products','classic','classic.png','image/png','media',243591,'[]','{\"title\":\"Classic\",\"caption\":\"Classic\"}',47,'2017-10-24 17:49:59','2017-10-24 17:49:59');

/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2017_09_04_160342_create_media_table',1),
	(4,'2017_09_04_165320_create_posts_table',1),
	(5,'2017_09_04_165331_create_categories_table',1),
	(6,'2017_09_04_180233_create_social_accounts_table',1),
	(7,'2017_09_04_180747_create_pages_table',1),
	(8,'2017_09_04_181048_create_subscribes_table',1),
	(9,'2017_09_04_181130_create_comments_table',1),
	(10,'2017_09_04_181736_create_products_table',1),
	(11,'2017_09_04_181746_create_product_categories_table',1),
	(12,'2017_09_04_182627_create_product_types_table',1),
	(13,'2017_09_04_183457_create_locations_table',1),
	(14,'2017_09_04_183504_create_inboxes_table',1),
	(15,'2017_09_05_100120_create_careers_table',1),
	(16,'2017_09_05_104206_create_permission_tables',1),
	(17,'2017_10_09_173354_create_product_years_table',1),
	(18,'2017_10_09_175639_create_product_colors_table',1),
	(19,'2017_10_09_180958_create_domisilies_table',1),
	(20,'2017_10_09_181043_create_orders_table',1),
	(21,'2017_10_09_181959_create_banners_table',2),
	(22,'2017_10_09_182102_create_options_table',3),
	(23,'2017_10_19_130159_create_reservations_table',4);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table model_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;

INSERT INTO `model_has_permissions` (`permission_id`, `model_id`, `model_type`)
VALUES
	(1,1,'App\\User');

/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table model_has_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`)
VALUES
	(1,1,'App\\User');

/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table options
# ------------------------------------------------------------

DROP TABLE IF EXISTS `options`;

CREATE TABLE `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;

INSERT INTO `options` (`id`, `title`, `value`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'web_title','DISTRIBUTOR MOTOR INDONESIA',NULL,'2017-10-11 10:09:52','2017-10-11 10:09:52'),
	(2,'contact_email','angling.kusuma@pulaukencana.co.id',NULL,'2017-10-11 10:09:58','2017-10-11 10:09:58'),
	(3,'web_keyword','Royal Enfield, Distributor Motor, Indonesia',NULL,'2017-10-11 10:10:24','2017-10-11 10:10:24'),
	(4,'facebook_url','#',NULL,'2017-10-11 10:11:04','2017-10-11 10:11:04'),
	(5,'instagram_url','https://www.instagram.com/royalenfieldid',NULL,'2017-10-11 10:11:18','2017-10-11 10:11:18'),
	(6,'twitter_url','#',NULL,'2017-10-11 10:11:25','2017-10-11 10:11:25'),
	(7,'youtube_url','#',NULL,'2017-10-11 10:11:30','2017-10-11 10:11:30'),
	(8,'reservation_email','angling.kusuma@pulaukencana.co.id',NULL,'2017-10-11 10:11:25','2017-10-11 10:11:25');

/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;

INSERT INTO `pages` (`id`, `title`, `slug`, `keyword`, `summary`, `description`, `type`, `created_at`, `updated_at`)
VALUES
	(1,'Contact Us','contact-us',NULL,NULL,'<p><strong>ROYAL ENFIELD </strong><br /><strong>AUTHORIZED DISTRIBUTOR &amp; DEALER - INDONESIA</strong><br /> JL. PEJATEN BARAT NO. 5 <br />JAKARTA 12510, INDONESIA</p>','contact','2017-10-10 13:40:02','2017-10-11 10:32:49'),
	(2,'Career','career',NULL,NULL,'<p>Vestibulum id ligula porta felis euismod semper. Maecenas faucibus mollis interdum. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas sed diam eget risus varius blandit sit amet non magna. Cras mattis consectetur purus sit amet fermentum.</p>','career','2017-10-10 13:42:46','2017-10-10 13:42:46'),
	(3,'Company Overview','company-overview',NULL,NULL,'<p>Vestibulum id ligula porta felis euismod semper. Maecenas faucibus mollis interdum. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas sed diam eget risus varius blandit sit amet non magna. Cras mattis consectetur purus sit amet fermentum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui.</p>\r\n<p>Vestibulum id ligula porta felis euismod semper. Maecenas faucibus mollis interdum. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas sed diam eget risus varius blandit sit amet non magna. Cras mattis consectetur purus sit amet fermentum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui.</p>','default','2017-10-10 13:43:24','2017-10-10 13:43:24'),
	(4,'Management','management',NULL,NULL,'<p>Vestibulum id ligula porta felis euismod semper. Maecenas faucibus mollis interdum. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas sed diam eget risus varius blandit sit amet non magna. Cras mattis consectetur purus sit amet fermentum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui.</p>\r\n<p>Vestibulum id ligula porta felis euismod semper. Maecenas faucibus mollis interdum. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas sed diam eget risus varius blandit sit amet non magna. Cras mattis consectetur purus sit amet fermentum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui.</p>','default','2017-10-10 13:43:39','2017-10-10 13:43:39');

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'all','web','2017-10-09 18:22:27','2017-10-09 18:22:27');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `popular` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `like` int(11) DEFAULT NULL,
  `comments` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `keyword`, `type`, `video_id`, `video_url`, `summary`, `description`, `status`, `published`, `featured`, `popular`, `view`, `like`, `comments`, `created_at`, `updated_at`, `published_at`)
VALUES
	(1,1,'Nullam quis risus eget urna','nullam-quis-risus-eget-urna',NULL,'default',NULL,NULL,'<p>Aenean lacinia bibendum nulla sed consectetur<br></p>','<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam quis risus eget urna mollis ornare vel eu leo. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>\r\n<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>\r\n<p>Donec id elit non mi porta gravida at eget metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod. Aenean lacinia bibendum nulla sed consectetur. Donec sed odio dui.</p>\r\n<p>Curabitur blandit tempus porttitor. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec sed odio dui. Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>\r\n<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Nulla vitae elit libero, a pharetra augue.</p>\r\n<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec id elit non mi porta gravida at eget metus. Donec id elit non mi porta gravida at eget metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>',NULL,NULL,1,NULL,NULL,NULL,NULL,'2017-10-10 13:30:31','2017-10-10 13:30:31','2017-10-10 13:29:00'),
	(2,1,'Curabitur blandit tempus porttito','curabitur-blandit-tempus-porttito',NULL,'default',NULL,NULL,'<p>Donec id elit non mi porta gravida at eget metus<br></p>','<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam quis risus eget urna mollis ornare vel eu leo. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>\r\n<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>\r\n<p>Donec id elit non mi porta gravida at eget metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod. Aenean lacinia bibendum nulla sed consectetur. Donec sed odio dui.</p>\r\n<p>Curabitur blandit tempus porttitor. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec sed odio dui. Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>\r\n<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Nulla vitae elit libero, a pharetra augue.</p>\r\n<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec id elit non mi porta gravida at eget metus. Donec id elit non mi porta gravida at eget metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>',NULL,NULL,1,NULL,NULL,NULL,NULL,'2017-10-10 13:31:52','2017-10-10 13:31:52','2017-10-10 13:30:00');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_categories`;

CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;

INSERT INTO `product_categories` (`id`, `title`, `slug`, `keyword`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'CLASSIC','classic',NULL,NULL,'2017-10-10 12:07:10','2017-10-10 12:07:41'),
	(2,'Rumbler','rumbler',NULL,NULL,'2017-10-10 12:07:30','2017-10-10 12:07:30'),
	(3,'Bullet','bullet',NULL,NULL,'2017-10-10 12:07:53','2017-10-10 12:07:53'),
	(5,'CAFE RACER','cafe-racer',NULL,NULL,'2017-10-18 11:36:08','2017-10-18 11:36:08');

/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_colors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_colors`;

CREATE TABLE `product_colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_colors` WRITE;
/*!40000 ALTER TABLE `product_colors` DISABLE KEYS */;

INSERT INTO `product_colors` (`id`, `title`, `options`, `created_at`, `updated_at`)
VALUES
	(1,'Green','green','2017-10-10 12:32:27','2017-10-10 12:32:27'),
	(2,'Black','darkgrey','2017-10-10 12:32:49','2017-10-10 12:32:49'),
	(3,'Blue','blue','2017-10-10 13:19:36','2017-10-10 13:19:36'),
	(4,'Red','red','2017-10-10 13:19:41','2017-10-10 13:19:41'),
	(5,'Brown','chocolate','2017-10-10 13:20:06','2017-10-10 13:20:06');

/*!40000 ALTER TABLE `product_colors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_product_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_product_category`;

CREATE TABLE `product_product_category` (
  `product_id` int(10) unsigned NOT NULL,
  `product_category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `product_category_product_product_id_index` (`product_id`),
  KEY `product_category_product_product_category_id_index` (`product_category_id`),
  CONSTRAINT `product_category_product_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_product_category` WRITE;
/*!40000 ALTER TABLE `product_product_category` DISABLE KEYS */;

INSERT INTO `product_product_category` (`product_id`, `product_category_id`, `created_at`, `updated_at`)
VALUES
	(8,2,'2017-10-19 14:20:59','2017-10-19 14:20:59'),
	(7,3,'2017-10-19 14:21:07','2017-10-19 14:21:07'),
	(6,1,'2017-10-19 14:21:13','2017-10-19 14:21:13'),
	(5,5,'2017-10-19 14:21:20','2017-10-19 14:21:20');

/*!40000 ALTER TABLE `product_product_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_product_color
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_product_color`;

CREATE TABLE `product_product_color` (
  `product_id` int(10) unsigned NOT NULL,
  `product_color_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `product_color_product_product_id_index` (`product_id`),
  KEY `product_color_product_product_color_id_index` (`product_color_id`),
  CONSTRAINT `product_color_product_product_color_id_foreign` FOREIGN KEY (`product_color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_color_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_product_color` WRITE;
/*!40000 ALTER TABLE `product_product_color` DISABLE KEYS */;

INSERT INTO `product_product_color` (`product_id`, `product_color_id`, `created_at`, `updated_at`)
VALUES
	(5,2,'2017-10-18 11:39:32','2017-10-18 11:39:32'),
	(6,3,'2017-10-18 11:49:33','2017-10-18 11:49:33'),
	(7,1,'2017-10-18 11:55:42','2017-10-18 11:55:42'),
	(8,2,'2017-10-18 11:58:10','2017-10-18 11:58:10'),
	(8,5,'2017-10-24 17:51:52','2017-10-24 17:51:52'),
	(7,2,'2017-10-24 17:52:04','2017-10-24 17:52:04');

/*!40000 ALTER TABLE `product_product_color` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_product_year
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_product_year`;

CREATE TABLE `product_product_year` (
  `product_id` int(10) unsigned NOT NULL,
  `product_year_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `product_year_product_product_id_index` (`product_id`),
  KEY `product_year_product_product_year_id_index` (`product_year_id`),
  CONSTRAINT `product_year_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_year_product_product_year_id_foreign` FOREIGN KEY (`product_year_id`) REFERENCES `product_years` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_product_year` WRITE;
/*!40000 ALTER TABLE `product_product_year` DISABLE KEYS */;

INSERT INTO `product_product_year` (`product_id`, `product_year_id`, `created_at`, `updated_at`)
VALUES
	(5,3,'2017-10-18 11:39:32','2017-10-18 11:39:32'),
	(6,3,'2017-10-18 11:49:33','2017-10-18 11:49:33'),
	(7,3,'2017-10-18 11:55:42','2017-10-18 11:55:42'),
	(8,3,'2017-10-18 11:58:10','2017-10-18 11:58:10');

/*!40000 ALTER TABLE `product_product_year` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_years
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_years`;

CREATE TABLE `product_years` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_years` WRITE;
/*!40000 ALTER TABLE `product_years` DISABLE KEYS */;

INSERT INTO `product_years` (`id`, `title`, `options`, `created_at`, `updated_at`)
VALUES
	(1,'2015',NULL,'2017-10-10 12:24:45','2017-10-10 12:24:45'),
	(2,'2016',NULL,'2017-10-10 12:24:48','2017-10-10 12:24:48'),
	(3,'2017',NULL,'2017-10-10 12:24:52','2017-10-10 12:24:52');

/*!40000 ALTER TABLE `product_years` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `title`, `slug`, `keyword`, `price`, `qty`, `summary`, `description`, `created_at`, `updated_at`)
VALUES
	(5,'CONTINENTAL GT','continental-gt',NULL,172000000,10,NULL,'<p>Royal Enfield Continental GT adalah sepeda motor paling ringan, paling cepat, dan paling bertenaga yang dibuat oleh Royal Enfield. Sebuah mesin dengan sejarah panjang tentang kolaborasi yang apik, merupakan isyarat pengalaman berkendara terbaik. Merupakan sebuah ungkapan terbaik dari fenomena budaya yang masih tetap bertahan sampai sekarang - The Caf&eacute; Racer.</p>','2017-10-18 11:39:31','2017-10-18 11:39:31'),
	(6,'CLASSIC 350','classic-350',NULL,72900000,10,NULL,'<p>Kembaran Classic 500 yang lebih kecil, yaitu Classic 350 akan terus bersaing dengan sepeda motor lain dan menampilkan lebih banyak lagi. Classic 350 mendapatkan sumber tenaga yang sama dengan Thunderbird Twinspark yang melegenda. Torsi untuk menaklukkan pegunungan dan efisiensi bahan bakar untuk melintasi daratan dilengkapi dengan gaya yang menarik dan elegan.<br /><br />Sepeda motor ini menjadi pusat perhatian dengan mudah. Lahir dari warisan yang kaya dan dibesarkan oleh Kemewahan Kerajaan, sepeda motor 350cc ini memiliki semua kualitas khas dari Royal Enfield. Dihargai di masa lalu, dihargai di masa kini...<br /><br />Mengapa mengendarai sepeda motor yang jelek. Tidak ada lagi yang perlu dikatakan?</p>','2017-10-18 11:49:33','2017-10-18 11:49:33'),
	(7,'BULLET 500 EFI','bullet-500-efi',NULL,81300000,10,NULL,'<p>Bullet 500 EFI merupakan kulminasi dari warisan selama lebih dari 8 dekade, merupakan model yang paling lama berada dalam produksi yang terus menerus. Sejak tahun 1932, seri Bullet telah membuat orang dari seluruh dunia terkagum dengan gayanya yang unik dan perasaan yang didapat ketika mengendarainya. Bullet 500 EFI merupakan penggabungan yang mulus dari gaya Bullet yang agung, performa dan reliabilitas dengan elemen-elemen teknologi baru seperti Injeksi Bahan Bakar Elektronik yang secara sempurna disinergikan dengan gaya periode tertentu. Bullet 500 EFI difokuskan untuk menampilkan sejarah menggunakan teknologi masa kini.</p>','2017-10-18 11:55:42','2017-10-18 11:55:42'),
	(8,'RUMBLER 500','rumbler-500',NULL,98000000,10,NULL,'<p>Mungkin ini adalah salah satu model yang paling ditunggu dari Royal Enfield, Rumbler 500 dibuat untuk meningkatkan kesenangan berkendara bagi para penggemar perjalanan jarak jauh. Segera hadir sepeda motor dengan ciri khas \"hitam\" dari Royal Enfield, sepeda motor ini siap untuk memberikan penampilan istimewa di jalanan.</p>','2017-10-18 11:58:10','2017-10-18 11:58:10');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table reservations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reservations`;

CREATE TABLE `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `domisili_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `qty` int(11) DEFAULT NULL,
  `ktp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservations_user_id_index` (`user_id`),
  KEY `reservations_product_id_index` (`product_id`),
  KEY `reservations_domisili_id_index` (`domisili_id`),
  CONSTRAINT `reservations_domisili_id_foreign` FOREIGN KEY (`domisili_id`) REFERENCES `domisilis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reservations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;

INSERT INTO `reservations` (`id`, `user_id`, `product_id`, `domisili_id`, `name`, `phone`, `email`, `address`, `qty`, `ktp`, `npwp`, `created_at`, `updated_at`)
VALUES
	(1,NULL,8,3,'Abdul Basith','817616186','chit.eureka@gmail.com','Jl Pajajaran . Gg.saidin\r\nRt 06/03',NULL,NULL,NULL,'2017-10-19 13:11:45','2017-10-19 13:11:45'),
	(2,NULL,8,3,'Abdul Basith','817616186','chit.eureka@gmail.com','Jl Pajajaran . Gg.saidin\r\nRt 06/03',1,NULL,NULL,'2017-10-19 13:12:34','2017-10-19 13:12:34'),
	(3,NULL,8,3,'Abdul Basith','817616186','chit.eureka@gmail.com','Jl Pajajaran . Gg.saidin\r\nRt 06/03',8,NULL,NULL,'2017-10-19 13:13:52','2017-10-19 13:13:52'),
	(4,NULL,5,3,'imansyah indra pahlawan','81287920061','iman_indra47@yahoo.co.id','ibnu sina 1 no 24 uin ciputat',3,NULL,NULL,'2017-10-19 13:14:47','2017-10-19 13:14:47'),
	(5,NULL,7,2,'Abdul Basith','817616186','chit.eureka@gmail.com','Jl Pajajaran . Gg.saidin\r\nRt 06/03',1,NULL,NULL,'2017-10-27 14:45:33','2017-10-27 14:45:33'),
	(6,NULL,6,1,'imansyah indra pahlawan','81287920061','iman_indra47@yahoo.co.id','ibnu sina 1 no 24 uin ciputat',3,'20171027144644_4.jpg','20171027144644_1.jpg','2017-10-27 14:46:44','2017-10-27 14:46:44'),
	(7,NULL,8,1,'Abdul Basith','817616186','chit.eureka@gmail.com','Jl Pajajaran . Gg.saidin\r\nRt 06/03',1,NULL,NULL,'2017-10-31 17:52:02','2017-10-31 17:52:02'),
	(8,NULL,8,1,'Abdul Basith','817616186','chit.eureka@gmail.com','Jl Pajajaran . Gg.saidin\r\nRt 06/03',1,NULL,NULL,'2017-10-31 17:52:48','2017-10-31 17:52:48'),
	(9,NULL,8,1,'Abdul Basith','817616186','chit.eureka@gmail.com','Jl Pajajaran . Gg.saidin\r\nRt 06/03',2,'20171102155741_RE_HOG_jadoel_1.jpg','20171102155741_ScreenShot2017-11-02at2.04.20PM.png','2017-11-02 15:57:41','2017-11-02 15:57:41'),
	(10,NULL,8,1,'Abdul Basith','817616186','chit.eureka@gmail.com','Jl Pajajaran . Gg.saidin\r\nRt 06/03',2,'20171102155842_RE_HOG_jadoel_1.jpg','20171102155842_ScreenShot2017-11-02at2.04.20PM.png','2017-11-02 15:58:42','2017-11-02 15:58:42'),
	(11,NULL,7,1,'Abdul Basith','817616186','chit.eureka@gmail.com','Jl Pajajaran . Gg.saidin\r\nRt 06/03',3,'20171102160054_RE_HOG_jadoel_1.jpg','20171102160054_RE_HOG_jadoel_1.jpg','2017-11-02 16:00:54','2017-11-02 16:00:54'),
	(12,NULL,6,3,'imansyah indra pahlawan','81287920061','iman_indra47@yahoo.co.id','ibnu sina 1 no 24 uin ciputat',7,'20171102160315_RE_HOG_jadoel_1.jpg','20171102160315_RE_HOG_jadoel_1.jpg','2017-11-02 16:03:15','2017-11-02 16:03:15'),
	(13,NULL,8,3,'Abdul Basith','000000000000817616186','chit.eureka@gmail.com','Jl Pajajaran . Gg.saidin\r\nRt 06/03',4,NULL,NULL,'2017-11-02 16:04:56','2017-11-02 16:04:56'),
	(14,NULL,5,1,'Abdul Basith','817616186','chit.eureka@gmail.com','Jl Pajajaran . Gg.saidin\r\nRt 06/03',5,NULL,NULL,'2017-11-02 16:06:33','2017-11-02 16:06:33');

/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`)
VALUES
	(1,1);

/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','web','2017-10-09 18:22:31','2017-10-09 18:22:31');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table social_accounts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `social_accounts`;

CREATE TABLE `social_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_accounts_user_id_index` (`user_id`),
  CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table subscribes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subscribes`;

CREATE TABLE `subscribes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `slug`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Admin','admin','admin@dmiweb.dev','$2y$10$KCvprrS0uxYQNP0UMuFqZ..r9aRTZ1HL0DNjJHz5eDhBbJvRlHSQG',NULL,'2017-10-09 18:21:58','2017-10-09 18:21:58');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
