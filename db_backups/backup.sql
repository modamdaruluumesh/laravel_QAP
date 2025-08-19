/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.11-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: db    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(1,'Fiction','2025-08-18 08:40:53','2025-08-18 08:40:53',NULL),
(2,'Non-Fiction','2025-08-18 08:40:59','2025-08-18 08:40:59',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES
(1,'umesh','modamumesh@gmail.com','9949714772','tpt','2025-08-18 08:40:36','2025-08-18 08:40:36',NULL);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_categories`
--

DROP TABLE IF EXISTS `content_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `content_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_categories`
--

LOCK TABLES `content_categories` WRITE;
/*!40000 ALTER TABLE `content_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `content_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_category_content_page`
--

DROP TABLE IF EXISTS `content_category_content_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `content_category_content_page` (
  `content_page_id` bigint unsigned NOT NULL,
  `content_category_id` bigint unsigned NOT NULL,
  KEY `content_page_id_fk_10689556` (`content_page_id`),
  KEY `content_category_id_fk_10689556` (`content_category_id`),
  CONSTRAINT `content_category_id_fk_10689556` FOREIGN KEY (`content_category_id`) REFERENCES `content_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `content_page_id_fk_10689556` FOREIGN KEY (`content_page_id`) REFERENCES `content_pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_category_content_page`
--

LOCK TABLES `content_category_content_page` WRITE;
/*!40000 ALTER TABLE `content_category_content_page` DISABLE KEYS */;
/*!40000 ALTER TABLE `content_category_content_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_page_content_tag`
--

DROP TABLE IF EXISTS `content_page_content_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `content_page_content_tag` (
  `content_page_id` bigint unsigned NOT NULL,
  `content_tag_id` bigint unsigned NOT NULL,
  KEY `content_page_id_fk_10689557` (`content_page_id`),
  KEY `content_tag_id_fk_10689557` (`content_tag_id`),
  CONSTRAINT `content_page_id_fk_10689557` FOREIGN KEY (`content_page_id`) REFERENCES `content_pages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `content_tag_id_fk_10689557` FOREIGN KEY (`content_tag_id`) REFERENCES `content_tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_page_content_tag`
--

LOCK TABLES `content_page_content_tag` WRITE;
/*!40000 ALTER TABLE `content_page_content_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `content_page_content_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_pages`
--

DROP TABLE IF EXISTS `content_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `content_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_text` longtext COLLATE utf8mb4_unicode_ci,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_pages`
--

LOCK TABLES `content_pages` WRITE;
/*!40000 ALTER TABLE `content_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `content_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_tags`
--

DROP TABLE IF EXISTS `content_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `content_tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_tags`
--

LOCK TABLES `content_tags` WRITE;
/*!40000 ALTER TABLE `content_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `content_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'2014_10_12_100000_create_password_resets_table',1),
(2,'2019_12_14_000001_create_personal_access_tokens_table',1),
(3,'2025_08_16_000001_create_media_table',1),
(4,'2025_08_16_000002_create_permissions_table',1),
(5,'2025_08_16_000003_create_roles_table',1),
(6,'2025_08_16_000004_create_users_table',1),
(7,'2025_08_16_000005_create_content_categories_table',1),
(8,'2025_08_16_000006_create_content_tags_table',1),
(9,'2025_08_16_000007_create_content_pages_table',1),
(10,'2025_08_16_000008_create_task_statuses_table',1),
(11,'2025_08_16_000009_create_task_tags_table',1),
(12,'2025_08_16_000010_create_tasks_table',1),
(13,'2025_08_16_000011_create_clients_table',1),
(14,'2025_08_16_000012_create_products_table',1),
(15,'2025_08_16_000013_create_categories_table',1),
(16,'2025_08_16_000014_create_sales_table',1),
(17,'2025_08_16_000015_create_payments_table',1),
(18,'2025_08_16_000016_create_services_table',1),
(19,'2025_08_16_000017_create_permission_role_pivot_table',1),
(20,'2025_08_16_000018_create_role_user_pivot_table',1),
(21,'2025_08_16_000019_create_content_category_content_page_pivot_table',1),
(22,'2025_08_16_000020_create_content_page_content_tag_pivot_table',1),
(23,'2025_08_16_000021_create_task_task_tag_pivot_table',1),
(24,'2025_08_16_000022_add_relationship_fields_to_tasks_table',1),
(25,'2025_08_16_000023_add_relationship_fields_to_sales_table',1),
(26,'2025_08_16_000024_add_relationship_fields_to_payments_table',1),
(27,'2025_08_16_094723_add_category_id_to_products_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_name_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_name_fk_10689625` (`client_name_id`),
  CONSTRAINT `client_name_fk_10689625` FOREIGN KEY (`client_name_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES
(1,'Heavenly Bodies',NULL,'cash','2025-08-17','2025-08-19 04:37:54','2025-08-19 04:37:54',NULL,1);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `role_id` bigint unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  KEY `role_id_fk_10689528` (`role_id`),
  KEY `permission_id_fk_10689528` (`permission_id`),
  CONSTRAINT `permission_id_fk_10689528` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_id_fk_10689528` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),
(1,6),
(1,7),
(1,8),
(1,9),
(1,10),
(1,11),
(1,12),
(1,13),
(1,14),
(1,15),
(1,16),
(1,17),
(1,18),
(1,19),
(1,20),
(1,21),
(1,22),
(1,23),
(1,24),
(1,25),
(1,26),
(1,27),
(1,28),
(1,29),
(1,30),
(1,31),
(1,32),
(1,33),
(1,34),
(1,35),
(1,36),
(1,37),
(1,38),
(1,39),
(1,40),
(1,41),
(1,42),
(1,43),
(1,44),
(1,45),
(1,46),
(1,47),
(1,48),
(1,49),
(1,50),
(1,51),
(1,52),
(1,53),
(1,54),
(1,55),
(1,56),
(1,57),
(1,58),
(1,59),
(1,60),
(1,61),
(1,62),
(1,63),
(1,64),
(1,65),
(1,66),
(1,67),
(1,68),
(1,69),
(1,70),
(1,71),
(1,72),
(1,73),
(1,74),
(1,75),
(1,76),
(1,77),
(1,78),
(1,79),
(1,80),
(2,17),
(2,18),
(2,19),
(2,20),
(2,21),
(2,22),
(2,23),
(2,24),
(2,25),
(2,26),
(2,27),
(2,28),
(2,29),
(2,30),
(2,31),
(2,32),
(2,33),
(2,34),
(2,35),
(2,36),
(2,37),
(2,38),
(2,39),
(2,40),
(2,41),
(2,42),
(2,43),
(2,44),
(2,45),
(2,46),
(2,47),
(2,48),
(2,49),
(2,50),
(2,51),
(2,52),
(2,53),
(2,54),
(2,55),
(2,56),
(2,57),
(2,58),
(2,59),
(2,60),
(2,61),
(2,62),
(2,63),
(2,64),
(2,65),
(2,66),
(2,67),
(2,68),
(2,69),
(2,70),
(2,71),
(2,72),
(2,73),
(2,74),
(2,75),
(2,76),
(2,77),
(2,78),
(2,79),
(2,80);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES
(1,'user_management_access',NULL,NULL,NULL),
(2,'permission_create',NULL,NULL,NULL),
(3,'permission_edit',NULL,NULL,NULL),
(4,'permission_show',NULL,NULL,NULL),
(5,'permission_delete',NULL,NULL,NULL),
(6,'permission_access',NULL,NULL,NULL),
(7,'role_create',NULL,NULL,NULL),
(8,'role_edit',NULL,NULL,NULL),
(9,'role_show',NULL,NULL,NULL),
(10,'role_delete',NULL,NULL,NULL),
(11,'role_access',NULL,NULL,NULL),
(12,'user_create',NULL,NULL,NULL),
(13,'user_edit',NULL,NULL,NULL),
(14,'user_show',NULL,NULL,NULL),
(15,'user_delete',NULL,NULL,NULL),
(16,'user_access',NULL,NULL,NULL),
(17,'content_management_access',NULL,NULL,NULL),
(18,'content_category_create',NULL,NULL,NULL),
(19,'content_category_edit',NULL,NULL,NULL),
(20,'content_category_show',NULL,NULL,NULL),
(21,'content_category_delete',NULL,NULL,NULL),
(22,'content_category_access',NULL,NULL,NULL),
(23,'content_tag_create',NULL,NULL,NULL),
(24,'content_tag_edit',NULL,NULL,NULL),
(25,'content_tag_show',NULL,NULL,NULL),
(26,'content_tag_delete',NULL,NULL,NULL),
(27,'content_tag_access',NULL,NULL,NULL),
(28,'content_page_create',NULL,NULL,NULL),
(29,'content_page_edit',NULL,NULL,NULL),
(30,'content_page_show',NULL,NULL,NULL),
(31,'content_page_delete',NULL,NULL,NULL),
(32,'content_page_access',NULL,NULL,NULL),
(33,'task_management_access',NULL,NULL,NULL),
(34,'task_status_create',NULL,NULL,NULL),
(35,'task_status_edit',NULL,NULL,NULL),
(36,'task_status_show',NULL,NULL,NULL),
(37,'task_status_delete',NULL,NULL,NULL),
(38,'task_status_access',NULL,NULL,NULL),
(39,'task_tag_create',NULL,NULL,NULL),
(40,'task_tag_edit',NULL,NULL,NULL),
(41,'task_tag_show',NULL,NULL,NULL),
(42,'task_tag_delete',NULL,NULL,NULL),
(43,'task_tag_access',NULL,NULL,NULL),
(44,'task_create',NULL,NULL,NULL),
(45,'task_edit',NULL,NULL,NULL),
(46,'task_show',NULL,NULL,NULL),
(47,'task_delete',NULL,NULL,NULL),
(48,'task_access',NULL,NULL,NULL),
(49,'tasks_calendar_access',NULL,NULL,NULL),
(50,'client_create',NULL,NULL,NULL),
(51,'client_edit',NULL,NULL,NULL),
(52,'client_show',NULL,NULL,NULL),
(53,'client_delete',NULL,NULL,NULL),
(54,'client_access',NULL,NULL,NULL),
(55,'product_create',NULL,NULL,NULL),
(56,'product_edit',NULL,NULL,NULL),
(57,'product_show',NULL,NULL,NULL),
(58,'product_delete',NULL,NULL,NULL),
(59,'product_access',NULL,NULL,NULL),
(60,'category_create',NULL,NULL,NULL),
(61,'category_edit',NULL,NULL,NULL),
(62,'category_show',NULL,NULL,NULL),
(63,'category_delete',NULL,NULL,NULL),
(64,'category_access',NULL,NULL,NULL),
(65,'sale_create',NULL,NULL,NULL),
(66,'sale_edit',NULL,NULL,NULL),
(67,'sale_show',NULL,NULL,NULL),
(68,'sale_delete',NULL,NULL,NULL),
(69,'sale_access',NULL,NULL,NULL),
(70,'payment_create',NULL,NULL,NULL),
(71,'payment_edit',NULL,NULL,NULL),
(72,'payment_show',NULL,NULL,NULL),
(73,'payment_delete',NULL,NULL,NULL),
(74,'payment_access',NULL,NULL,NULL),
(75,'service_create',NULL,NULL,NULL),
(76,'service_edit',NULL,NULL,NULL),
(77,'service_show',NULL,NULL,NULL),
(78,'service_delete',NULL,NULL,NULL),
(79,'service_access',NULL,NULL,NULL),
(80,'profile_password_edit',NULL,NULL,NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` longtext COLLATE utf8mb4_unicode_ci,
  `product_breif_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES
(1,'Heavenly Bodies',NULL,'PRD-OABO5ETB','870','<p>&lt;p&gt;&lt;i&gt;Heavenly Bodies&lt;/i&gt; is a captivating visual and scientific guide to the wonders of the universe. From stars and galaxies to black holes and nebulae, this book offers stunning imagery and clear insights into celestial phenomena—perfect for anyone curious about space.&lt;/p&gt;</p>','A beautiful and informative look at the cosmos, blending astronomy with breathtaking visuals.','2025-08-18 08:48:59','2025-08-18 08:48:59',NULL,1),
(2,'House of Sky Breath',NULL,'PRD-OZBY0TBF','870','<p>&lt;p&gt;&lt;i&gt;House of Sky and Breath&lt;/i&gt; is the gripping second book in the Crescent City series. Bryce Quinlan and Hunt Athalar return to face new threats as dark powers stir across Midgard. With powerful secrets and high-stakes rebellion, the story blends romance, action, and magic in a richly imagined world.&lt;/p&gt;</p>','A thrilling fantasy sequel full of danger, secrets, and steamy romance—perfect for fans of Sarah J. Maas\'s intricate storytelling.','2025-08-18 08:50:48','2025-08-18 08:50:48',NULL,2);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  KEY `user_id_fk_10689537` (`user_id`),
  KEY `role_id_fk_10689537` (`role_id`),
  CONSTRAINT `role_id_fk_10689537` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_10689537` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES
(1,1);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES
(1,'Admin',NULL,NULL,NULL),
(2,'User',NULL,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_payable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_payable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_name_id` bigint unsigned DEFAULT NULL,
  `catergory_name_id` bigint unsigned DEFAULT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_name_fk_10689609` (`client_name_id`),
  KEY `catergory_name_fk_10689610` (`catergory_name_id`),
  KEY `fk_sales_product` (`product_id`),
  CONSTRAINT `catergory_name_fk_10689610` FOREIGN KEY (`catergory_name_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `client_name_fk_10689609` FOREIGN KEY (`client_name_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `fk_sales_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES
(1,NULL,'870','1','870','800','5','10','800','800','cash','2025-08-19 04:37:20','2025-08-19 04:37:20',NULL,1,1,1),
(2,NULL,'870','1','870','800','5','10','800','800','cash','2025-08-19 04:54:45','2025-08-19 04:54:45',NULL,1,2,2),
(3,NULL,'870','1','870.00','870.00','5','5','867.83','867.83','cash','2025-08-19 05:43:58','2025-08-19 05:43:58',NULL,1,1,1),
(4,NULL,NULL,NULL,NULL,NULL,'10','8','2536.92','2536.92','cash','2025-08-19 05:55:19','2025-08-19 06:55:50','2025-08-19 06:55:50',NULL,NULL,NULL),
(5,NULL,'870','2','1740.00','1740.00','5','7','1768.71','1768.71','cash','2025-08-19 05:58:06','2025-08-19 05:58:06',NULL,1,1,1),
(6,NULL,NULL,NULL,NULL,'2610.00','5','7','2653.07','2653.07','cash','2025-08-19 06:51:06','2025-08-19 06:55:50','2025-08-19 06:55:50',1,NULL,NULL),
(7,NULL,'870','2','1740.00','1740.00','5','7','1768.71','1768.71',NULL,'2025-08-19 07:26:58','2025-08-19 07:26:58',NULL,1,1,1),
(8,NULL,'870','1','870.00','2610.00','5','7','2653.07','2653.07','cash','2025-08-19 08:56:39','2025-08-19 08:56:39',NULL,1,1,1),
(9,NULL,'870','2','1740.00','2610.00','5','7','2653.07','2653.07','cash','2025-08-19 08:56:39','2025-08-19 08:56:39',NULL,1,2,2);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `services_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_text` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_statuses`
--

DROP TABLE IF EXISTS `task_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `task_statuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_statuses`
--

LOCK TABLES `task_statuses` WRITE;
/*!40000 ALTER TABLE `task_statuses` DISABLE KEYS */;
INSERT INTO `task_statuses` VALUES
(1,'Open',NULL,NULL,NULL),
(2,'In progress',NULL,NULL,NULL),
(3,'Closed',NULL,NULL,NULL);
/*!40000 ALTER TABLE `task_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_tags`
--

DROP TABLE IF EXISTS `task_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `task_tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_tags`
--

LOCK TABLES `task_tags` WRITE;
/*!40000 ALTER TABLE `task_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `task_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_task_tag`
--

DROP TABLE IF EXISTS `task_task_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `task_task_tag` (
  `task_id` bigint unsigned NOT NULL,
  `task_tag_id` bigint unsigned NOT NULL,
  KEY `task_id_fk_10689578` (`task_id`),
  KEY `task_tag_id_fk_10689578` (`task_tag_id`),
  CONSTRAINT `task_id_fk_10689578` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `task_tag_id_fk_10689578` FOREIGN KEY (`task_tag_id`) REFERENCES `task_tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_task_tag`
--

LOCK TABLES `task_task_tag` WRITE;
/*!40000 ALTER TABLE `task_task_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `task_task_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tasks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status_id` bigint unsigned DEFAULT NULL,
  `assigned_to_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status_fk_10689577` (`status_id`),
  KEY `assigned_to_fk_10689581` (`assigned_to_id`),
  CONSTRAINT `assigned_to_fk_10689581` FOREIGN KEY (`assigned_to_id`) REFERENCES `users` (`id`),
  CONSTRAINT `status_fk_10689577` FOREIGN KEY (`status_id`) REFERENCES `task_statuses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Admin','admin@admin.com',NULL,'$2y$10$ErDHlPLSCKYZnC1LYUitEeMbtEEqGF2nq4h2xRWkx.2GfhjM9./tC',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-19  9:08:47
