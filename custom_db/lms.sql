-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2025 at 06:40 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aims_lms_lms_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Laravel 12', 'laravel-12', NULL, '2025-03-05 00:42:49'),
(2, 'React', 'react', NULL, NULL),
(3, 'Mern Stack', 'mern-stack', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `blogcat_id` int NOT NULL,
  `post_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_descp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `post_tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `blogcat_id`, `post_title`, `post_slug`, `post_image`, `long_descp`, `post_tags`, `created_at`, `updated_at`) VALUES
(2, 2, 'Importance of Laravel for custom web application developmentfg', 'importance-of-laravel-for-custom-web-application-developmentfg', 'upload/post/1825876410000374.jpg', '<p>Laravel is a web app development framework with expressive and elegant syntax that makes the entire web development process faster, easier, and enjoyable for developers by eliminating all the pain points associated with handling complex PHP code.</p>\r\n<p>Below mentioned are few of the reasons which make Laravel one of the best in the business when it comes to custom web application development:</p>\r\n<p>Authorization Technique: Laravel helps with easy authentication techniques.fdfd</p>\r\n<p>Object-Oriented Libraries: Laravel development comes with in-built object-oriented ffd</p>', 'jQuery,react', '2025-03-06 19:01:40', '2025-03-06 14:03:57'),
(3, 1, 'Science and Health Mres in UK for International Students', 'science-and-health-mres-in-uk-for-international-students', 'upload/post/1825875599785378.jpg', '<p>Mres is the abbreviation of Master by Research programs specifically focused on practical learning over taught courses. These courses are recognised internationally, however, students from developing countries like Bangladesh or Pakistan are not fond of these courses. Rather, the students from those countries are familiar with MA, MBA, MSc, and PGDM programmes for post-graduation.</p>', 'jQuery,science', '2025-03-06 13:03:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Development', 'development', 'upload/category/1821066196861838.jpg', NULL, NULL),
(4, 'Data Science', 'data-science', 'upload/category/1821076324539006.jpg', NULL, '2025-01-20 12:51:44'),
(7, 'Networking', 'networking', 'upload/category/1823306536744591.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE IF NOT EXISTS `chat_messages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sender_id` bigint UNSIGNED DEFAULT NULL COMMENT 'user_id',
  `receiver_id` bigint UNSIGNED DEFAULT NULL COMMENT 'instructor_id',
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_id`, `receiver_id`, `msg`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 'hi need help', '2025-03-14 02:47:43', '2025-03-14 02:47:43'),
(3, 3, 2, 'are you there', '2025-03-14 02:55:42', '2025-03-14 02:55:42'),
(5, 3, 2, 'hi', '2025-03-14 13:00:01', '2025-03-14 13:00:01'),
(6, 2, 3, 'I am sorry for late response', '2025-03-14 13:46:56', '2025-03-14 13:46:56'),
(7, 2, 3, 'please let me know how can i help', '2025-03-14 13:53:37', '2025-03-14 13:53:37'),
(8, 3, 2, 'thanks for your help', '2025-03-14 13:53:54', '2025-03-14 13:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_validity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `instructor_id` int DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `instructor_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'SHIFT', '20', '2025-02-26', 1, NULL, NULL, '2025-02-19 05:41:54', '2025-02-19 05:41:54'),
(3, 'NEWYEAR', '10', '2025-02-27', 1, NULL, NULL, '2025-02-19 06:52:16', NULL),
(4, 'INS', '25', '2025-03-07', 1, 2, 5, '2025-03-01 04:41:36', NULL),
(5, 'LARA', '15', '2025-03-15', 1, 2, 6, '2025-03-01 05:06:18', '2025-03-01 05:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `instructor_id` int DEFAULT NULL,
  `course_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `course_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `course_name_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resources` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` int DEFAULT NULL,
  `discount_price` int DEFAULT NULL,
  `prerequisites` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bestseller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highestrated` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `subcategory_id`, `instructor_id`, `course_image`, `course_title`, `course_name`, `course_name_slug`, `description`, `video`, `label`, `duration`, `resources`, `certificate`, `selling_price`, `discount_price`, `prerequisites`, `bestseller`, `featured`, `highestrated`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 2, 'upload/course/thumbnail/1821975313569486.jpeg', 'PHP for Web development', 'PHP for Web development', 'php-for-web-development', '<h2 class=\"typography typography--h2 typography--primary\">PHP for Web Development, mysql, oop concept</h2>', 'upload/course/video/1737571045.mp4', 'Begginer', '60', 'yes', 'Yes', 133, 100, '✔html \r\n✔css\r\n✔js', '1', '1', '1', 1, '2025-01-22 12:37:25', '2025-02-19 03:04:50'),
(6, 1, 1, 2, 'upload/course/thumbnail/1821975475676992.png', 'Laravel for Back-End Web Development', 'Laravel for Back-End Web Development', 'laravel-for-back-end-web-development', '<p>Laravel for Back-End Web Development</p>', 'upload/course/video/1737571216.mp4', 'Begginer', '60', 'yes', 'Yes', 120, 99, '✔html\r\n✔css\r\n✔js', '1', '1', NULL, 1, '2025-01-22 12:40:16', NULL),
(7, 4, 5, 2, 'upload/course/thumbnail/1821975620565034.jpg', 'Django: Backend Web Development with Projects', 'Django: Backend Web Development with Projects', 'django:-backend-web-development-with-projects', '<h2 class=\"typography typography--h2 typography--primary\">Django: Backend Web Development with Projects</h2>', 'upload/course/video/1737571338.mp4', 'Middle', '60', 'yes', 'Yes', 120, 99, 'html \r\ncss', '1', '1', NULL, 1, '2025-01-22 12:42:18', '2025-02-06 05:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `course_goals`
--

CREATE TABLE IF NOT EXISTS `course_goals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `goal_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_goals`
--

INSERT INTO `course_goals` (`id`, `course_id`, `goal_name`, `created_at`, `updated_at`) VALUES
(21, 5, 'php web developer', '2025-01-22 12:38:10', '2025-01-22 12:38:10'),
(22, 5, 'mysql expert', '2025-01-22 12:38:10', '2025-01-22 12:38:10'),
(23, 6, 'laravel expert', '2025-01-22 12:40:16', '2025-01-22 12:40:16'),
(24, 6, 'full stack web developer', '2025-01-22 12:40:16', '2025-01-22 12:40:16'),
(33, 7, 'python', '2025-02-06 05:01:53', '2025-02-06 05:01:53'),
(34, 7, 'oop', '2025-02-06 05:01:53', '2025-02-06 05:01:53'),
(35, 7, 'database', '2025-02-06 05:01:53', '2025-02-06 05:01:53'),
(36, 7, NULL, '2025-02-06 05:01:53', '2025-02-06 05:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `course_lectures`
--

CREATE TABLE IF NOT EXISTS `course_lectures` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` int DEFAULT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `lecture_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_lectures`
--

INSERT INTO `course_lectures` (`id`, `course_id`, `section_id`, `lecture_title`, `video`, `url`, `content`, `created_at`, `updated_at`) VALUES
(11, 5, 5, 'PHP Intro', NULL, 'https://www.youtube.com/embed/Y2D-T9j68XI?si=iULFl4iIHadiDesc', 'Beginner-Level PHP', '2025-03-27 01:07:35', '2025-03-27 01:28:15'),
(12, 5, 6, 'Pear in PHP', NULL, 'https://www.youtube.com/embed/ouVvjq2omHg?si=GaXcoyLXwlYwWmh_', 'Pear packages', '2025-03-27 01:18:06', '2025-03-27 01:29:33'),
(13, 5, 5, 'Data types', NULL, 'https://www.youtube.com/embed/et5jScMSNXc?si=WbPIeaUJ0n9VBz_d', 'variables', '2025-03-27 01:23:27', '2025-03-27 01:28:50'),
(14, 5, 5, 'PHP Strings', NULL, 'https://www.youtube.com/embed/hFgwzkMiy1U?si=enwMwLUA6bm_mTqE', 'PHP Strings', '2025-03-30 02:10:55', '2025-03-30 02:11:07'),
(15, 5, 6, 'CMS', NULL, 'https://www.youtube.com/embed/bl0GtL-ASyE?si=JQo6TVUkIifDedxE', 'CMS', '2025-03-30 02:39:11', '2025-03-30 02:39:23'),
(16, 5, 6, 'Framework', NULL, 'https://www.youtube.com/embed/7GjPxAXTunE?si=V-og3Ey8e77ZUedc', 'Framework based on php', '2025-03-30 02:48:06', '2025-03-30 02:48:16'),
(21, 5, 5, 'demo Title', 'upload/course/lecture-video/1744714711.mp4', NULL, 'Demo lecture', '2025-04-15 04:35:10', '2025-04-15 04:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `course_sections`
--

CREATE TABLE IF NOT EXISTS `course_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `section_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_sections`
--

INSERT INTO `course_sections` (`id`, `course_id`, `section_title`, `created_at`, `updated_at`) VALUES
(5, 5, 'Beginner-Level PHP', NULL, NULL),
(6, 5, 'Mid - Level PHP', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_01_11_181444_create_categories_table', 2),
(6, '2025_01_12_193200_create_sub_categories_table', 3),
(7, '2025_01_14_182526_create_courses_table', 4),
(8, '2025_01_14_184552_create_course_goals_table', 4),
(9, '2025_01_25_053243_create_course_sections_table', 5),
(10, '2025_01_25_053300_create_course_lectures_table', 5),
(11, '2025_02_13_093619_create_wishlists_table', 6),
(12, '2025_02_19_102101_create_coupons_table', 7),
(13, '2025_02_22_090939_create_payments_table', 8),
(14, '2025_02_22_090955_create_orders_table', 8),
(15, '2025_02_24_101033_create_smtp_settings_table', 9),
(17, '2025_02_27_051056_create_questions_table', 10),
(18, '2025_03_03_074835_create_reviews_table', 11),
(19, '2025_03_05_042717_create_blog_categories_table', 12),
(20, '2025_03_06_092616_create_blog_posts_table', 13),
(21, '2025_03_07_190313_create_notifications_table', 14),
(22, '2025_03_08_101641_create_site_settings_table', 15),
(23, '2025_03_09_111008_create_permission_tables', 16),
(24, '2025_03_12_103227_create_chat_messages_table', 17),
(26, '2025_03_18_080408_create_quizzes_table', 18),
(27, '2025_03_20_094411_create_quiz_results_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('6a700983-2cc2-48d2-86d9-5f2bd1ed0155', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 5, '{\"message\":\"New COD Enrollment In Course\"}', NULL, '2025-03-08 00:59:57', '2025-03-08 00:59:57'),
('7eb2b636-6d86-42fd-a503-e7a8992384eb', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 6, '{\"message\":\"New COD Enrollment In Course\"}', NULL, '2025-03-08 00:59:57', '2025-03-08 00:59:57'),
('96fde39e-e03b-4f3c-8087-ac1ac2cd99d5', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 2, '{\"message\":\"New COD Enrollment In Course\"}', '2025-03-08 03:31:58', '2025-03-08 00:59:57', '2025-03-08 03:31:58'),
('b8291473-09b2-4a2c-a326-4236d7b830dc', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 8, '{\"message\":\"New COD Enrollment In Course\"}', NULL, '2025-03-08 00:59:57', '2025-03-08 00:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `instructor_id` int DEFAULT NULL,
  `course_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `payment_id`, `user_id`, `course_id`, `instructor_id`, `course_title`, `price`, `created_at`, `updated_at`) VALUES
(16, 17, 3, 7, 2, 'Django: Backend Web Development with Projects', 99, NULL, NULL),
(17, 17, 3, 5, 2, 'PHP for Web development', 100, NULL, NULL),
(18, 17, 3, 6, 2, 'Laravel for Back-End Web Development', 99, NULL, NULL),
(19, 18, 7, 6, 2, 'Laravel for Back-End Web Development', 99, '2025-03-08 00:59:49', '2025-03-08 00:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cash_delivery` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `email`, `phone`, `address`, `cash_delivery`, `total_amount`, `payment_type`, `invoice_no`, `order_date`, `order_month`, `order_year`, `status`, `created_at`, `updated_at`) VALUES
(15, 'User', 'user@gmail.com', '01816940095', 'Dhaka, Bangladesh', NULL, '298', 'Stripe', 'EOS72568025', '28 February 2025', 'February', '2025', 'confirm', '2025-02-28 05:51:07', '2025-03-30 03:15:22'),
(16, 'User', 'user@gmail.com', '01816940095', 'Dhaka, Bangladesh', NULL, '298', 'Stripe', 'EOS94776512', '28 February 2025', 'February', '2025', 'confirm', '2025-02-28 05:52:35', '2025-03-30 03:15:15'),
(17, 'User', 'user@gmail.com', '01816940095', 'Dhaka, Bangladesh', NULL, '298', 'Stripe', 'EOS88989088', '28 February 2025', 'February', '2025', 'confirm', '2025-02-28 05:54:37', '2025-03-30 03:29:19'),
(18, 'Mina', 'mina@gmail.com', '0189645994', 'dhaka', 'handcash', '99', 'Direct Payment', 'EOS84094145', '08 March 2025', 'March', '2025', 'confirm', '2025-03-08 00:59:49', '2025-03-30 03:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'category.menu', 'web', 'Category', '2025-03-09 13:38:10', '2025-03-09 14:00:15'),
(2, 'category.all', 'web', 'Category', '2025-03-09 13:38:27', '2025-03-09 13:38:27'),
(4, 'subcategory.all', 'web', 'Category', '2025-03-10 03:58:10', '2025-03-10 03:58:10'),
(5, 'category.edit', 'web', 'Category', '2025-03-10 04:37:15', '2025-03-10 04:37:15'),
(6, 'category.delete', 'web', 'Category', '2025-03-10 04:37:32', '2025-03-10 04:37:32'),
(7, 'category.add', 'web', 'Category', '2025-03-10 04:37:51', '2025-03-10 04:37:51'),
(8, 'instructor.menu', 'web', 'Instructor', '2025-03-10 04:38:15', '2025-03-10 04:38:15'),
(9, 'coupon.menu', 'web', 'Coupon', '2025-03-10 04:38:37', '2025-03-10 04:38:37'),
(10, 'coupon.all', 'web', 'Coupon', '2025-03-10 04:38:50', '2025-03-10 04:38:50'),
(11, 'coupon.add', 'web', 'Coupon', '2025-03-10 04:39:03', '2025-03-10 04:39:03'),
(12, 'coupon.edit', 'web', 'Coupon', '2025-03-10 04:39:18', '2025-03-10 04:39:18'),
(13, 'coupon.delete', 'web', 'Coupon', '2025-03-10 04:39:56', '2025-03-10 04:39:56'),
(14, 'setting.menu', 'web', 'Setting', '2025-03-10 04:40:22', '2025-03-10 04:40:22'),
(15, 'order.menu', 'web', 'Orders', '2025-03-10 04:40:46', '2025-03-10 04:40:46'),
(16, 'report.menu', 'web', 'Report', '2025-03-10 04:40:58', '2025-03-10 04:40:58'),
(17, 'review.menu', 'web', 'Review', '2025-03-10 04:41:10', '2025-03-10 04:41:10'),
(18, 'all.user.menu', 'web', 'All User', '2025-03-10 04:41:26', '2025-03-10 04:41:26'),
(19, 'blog.menu', 'web', 'Blog', '2025-03-10 04:41:52', '2025-03-10 04:41:52'),
(20, 'rolepermission.menu', 'web', 'Role and Permission', '2025-03-10 04:42:11', '2025-03-10 04:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `instructor_id` int DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `course_id`, `user_id`, `instructor_id`, `parent_id`, `subject`, `question`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 2, NULL, 'Need help', 'please let me know how can i reach you', '2025-02-26 23:41:43', NULL),
(2, 5, 3, 2, NULL, 'I don\'t understand', 'i do not understand this session', '2025-02-26 23:44:21', NULL),
(3, 5, 3, 2, 2, NULL, 'Please tell me specifically', '2025-02-27 02:56:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `instructor_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `lecture_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quizzes_instructor_id_foreign` (`instructor_id`),
  KEY `quizzes_course_id_foreign` (`course_id`),
  KEY `quizzes_section_id_foreign` (`section_id`),
  KEY `quizzes_lecture_id_foreign` (`lecture_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `question`, `a`, `b`, `c`, `d`, `ans`, `status`, `instructor_id`, `course_id`, `section_id`, `lecture_id`, `created_at`, `updated_at`) VALUES
(8, 'Who do we know as the father of PHP?', 'Lerdorf who created the language in 1996', 'Rasmus Lerdorf who created the language in 1994', 'Taylor who created the language in 1994', 'James who created the language in 1990', 'b', 1, 2, 5, 5, 11, '2025-03-27 01:08:33', NULL),
(9, 'What is the PHP scripting engine called?', 'PHP is powered by the scripting engine Apache', 'PHP is powered by the scripting engine Cent OS', 'PHP is powered by the scripting engine Kali Linux', 'PHP is powered by the scripting engine Zend Engine 2', 'd', 1, 2, 5, 5, 11, '2025-03-27 01:10:04', NULL),
(10, 'Name the popular Content Management Systems (CMS) in PHP', 'WordPress', 'WIX', 'Strapi', 'October CMS', 'a', 1, 2, 5, 5, 11, '2025-03-27 01:12:34', NULL),
(13, 'What are the characteristics of PHP variables?', 'var,\' \'int,\' \'float,\' and\' array.\'', 'const', 'let', 'dictionary', 'a', 1, 2, 5, 5, 13, '2025-03-27 01:25:04', NULL),
(16, 'What is String?', 'Number', 'Boolean', 'A string is a sequence of characters, like \"Hello world!\".', 'None of these', 'c', 1, 2, 5, 5, 14, '2025-03-30 02:13:08', NULL),
(17, 'The PHP strlen() function returns ?', 'the white space', 'the empty space', 'none of these', 'the length of a string.', 'd', 1, 2, 5, 5, 14, '2025-03-30 02:14:43', NULL),
(18, 'What is PEAR in PHP?', 'PEAR stands for PHP Extension and Application Repository', 'its package manager', 'its a compiler', 'none of these', 'a', 1, 2, 5, 6, 12, '2025-03-30 02:27:32', NULL),
(19, 'CMS Stands for?', 'Custom system', 'Content Management system', 'none of these', 'colaborative', 'b', 1, 2, 5, 6, 15, '2025-03-30 02:44:20', NULL),
(20, 'Name the popular Content Management Systems (CMS) in PHP.', 'wordpress', 'elementor', 'strapi', 'wix', 'a', 1, 2, 5, 6, 15, '2025-03-30 02:45:27', '2025-03-30 02:45:40'),
(21, 'What are the popular frameworks in PHP?', 'asp.net', 'django', 'laravel', 'ruby on rails', 'c', 1, 2, 5, 6, 16, '2025-03-30 02:54:30', NULL),
(22, 'What are \'Traits\'?', 'A mechanism that lets you create reusable code in PHP and similar languages where multiple inheritances are not supported is called Traits. It\'s not possible to instantiate it on its own.', 'encapsulation', 'class', 'object', 'a', 1, 2, 5, 6, 16, '2025-03-30 02:55:42', NULL),
(25, 'what is aws', 'a local server', 'its a hard disk', 'its cloud service', 'ssd', 'c', 1, 2, 5, 5, 21, '2025-04-15 04:39:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE IF NOT EXISTS `quiz_results` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` int NOT NULL,
  `course_id` int NOT NULL,
  `section_id` int NOT NULL,
  `lecture_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_results_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `user_id`, `result`, `instructor_id`, `course_id`, `section_id`, `lecture_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 3, 'pass', 2, 5, 5, 11, 1, '2025-04-07 05:55:19', '2025-04-07 05:55:19'),
(7, 3, 'pass', 2, 5, 6, 12, 1, '2025-04-15 03:26:41', '2025-04-15 03:26:41'),
(8, 3, 'pass', 2, 5, 6, 15, 1, '2025-04-15 03:27:04', '2025-04-15 03:27:04'),
(9, 3, 'pass', 2, 5, 6, 16, 1, '2025-04-15 03:28:11', '2025-04-15 03:28:11'),
(11, 3, 'pass', 2, 5, 5, 13, 1, '2025-04-15 04:42:34', '2025-04-15 04:42:34'),
(12, 3, 'pass', 2, 5, 5, 14, 1, '2025-04-15 04:43:01', '2025-04-15 04:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` int DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_course_id_foreign` (`course_id`),
  KEY `reviews_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `course_id`, `user_id`, `comment`, `rating`, `instructor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 'This is very nice course', '4', 2, '1', '2025-03-03 04:01:44', '2025-03-03 23:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'web', '2025-03-10 04:21:22', '2025-03-10 04:33:33'),
(2, 'Super Admin', 'web', '2025-03-10 04:21:38', '2025-03-10 04:21:38'),
(3, 'Admin', 'web', '2025-03-10 04:21:44', '2025-03-10 04:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(19, 1),
(1, 2),
(2, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(20, 2),
(1, 3),
(2, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `phone`, `email`, `address`, `facebook`, `twitter`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'upload/site/1826095683358503.png', '+44 0333 224 9183', 'uk@aimseducation.co.uk', 'Princess Caroline House (Ground Floor), 1 High St, Southend-on-Sea SS1 1JE, United Kingdom', 'https://www.facebook.com/aimseducationuk/', 'https://x.com/AIMSeducationbd/', '2025 AIMS Education. All Rights Reserved', NULL, '2025-04-06 04:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE IF NOT EXISTS `smtp_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `mailer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encryption` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtp_settings`
--

INSERT INTO `smtp_settings` (`id`, `mailer`, `host`, `port`, `username`, `password`, `encryption`, `from_address`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'sandbox.smtp.mailtrap.io', '2525', 'ca5b234e954ca2', '197e243859ec0a', 'tls', 'support@gmail.com', NULL, '2025-02-24 04:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `subcategory_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web Development', 'web-development', NULL, NULL),
(2, 1, 'Mobile Apps', 'mobile-apps', NULL, NULL),
(3, 1, 'Desktop Applicaton', 'desktop-applicaton', NULL, '2025-01-12 14:25:49'),
(5, 4, 'Deep learning', 'deep-learning', NULL, '2025-01-20 12:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','instructor','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `last_seen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `last_seen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$12$gi7pb.x3iSDrr76wPtrGFe8Y4LTQ1mQpoiZZd7qKsDtWmDJ2kIzmy', '202504051229eid.jpg', '01816940095', 'Dhaka, Bangladesh', 'admin', '1', '2025-04-15 04:50:57', NULL, NULL, '2025-04-14 22:50:57'),
(2, 'Instructor', 'instructor', 'instructor@gmail.com', NULL, '$2y$12$4TjMJf0OvBbiV6w4Y6Vw/eU5yO3fq41HdVvwtX0u4G94bD8BJHJe6', '202502271024shefat.png', '01789862904', 'Dhaka, Bangladesh', 'instructor', '1', '2025-04-15 10:59:31', NULL, '2025-01-10 10:53:24', '2025-04-15 04:59:31'),
(3, 'User', 'user', 'user@gmail.com', NULL, '$2y$12$q//oqSgoCmfhaBmMkGgVfuXcSfriPj75ZQcLCoroWTeqZbXbvTd5O', '202502060914profile.jpg', '01816940095', 'Dhaka, Bangladesh', 'user', '1', '2025-04-15 09:25:39', NULL, NULL, '2025-04-15 03:25:39'),
(4, 'Raju', 'Joshoa Raju', 'raju@gmail.com', NULL, '$2y$12$r.Qfjv1kV2J4yma4m1ISv.DYGst0NaT8sN3pwHP82MLNLk0H57UOu', NULL, '01789862904', 'Dhaka, Bangladesh', 'user', '1', NULL, NULL, '2025-01-10 10:53:24', '2025-01-10 14:02:52'),
(5, 'Sonia', 'Islam', 'sonia@gmail.com', NULL, '$2y$12$JRyTVBlCOcEWjsCiqfWwCO.y0DBmYE3n0qsFKPP.TTRuAW4DQtq0C', NULL, '01789862904', 'Dhaka', 'instructor', '1', NULL, NULL, NULL, '2025-01-13 13:24:49'),
(6, 'Mithu', 'Ahmed', 'mithu@gmail.com', NULL, '$2y$12$bR78jZS4o/xzojmNQj3wt.1NZQI6hDjt3i9hzhUJ8opEWOxwebVR2', NULL, '01685600420', 'USA', 'instructor', '0', NULL, NULL, NULL, '2025-02-12 06:41:35'),
(7, 'Mina', 'Ahmed', 'mina@gmail.com', NULL, '$2y$12$AawYlsh93G6vJGYk4R6RpOpbs/SjBIMqv/ZrvQ.tQoRAxaK4AfrEC', NULL, '0189645994', 'dhaka', 'user', '1', '2025-03-08 06:52:40', NULL, NULL, '2025-03-08 00:52:40'),
(8, 'Rocky', 'Ahmed', 'rocky@gmail.com', NULL, '$2y$12$iDi5chAsbJD8afs9qE1kM.lXF6Pfo2LFsv3IKWSNyKSyL6iPyv18C', NULL, '01685600420', 'Dhaka', 'instructor', '0', NULL, NULL, NULL, NULL),
(9, 'Udmey', 'Udmey', 'udmey@gmail.com', NULL, '$2y$12$FscSM5Liw9mOY1mbDCv01utR2/QzvSPzd0wfzpTYzTG1vTNtyWqOC', NULL, '012345678', 'UK', 'admin', '1', '2025-03-11 12:08:30', NULL, '2025-03-11 03:51:38', '2025-03-11 06:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(12, 3, 6, '2025-02-24 05:32:29', NULL),
(13, 3, 7, '2025-02-24 05:32:36', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_lecture_id_foreign` FOREIGN KEY (`lecture_id`) REFERENCES `course_lectures` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `course_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `quiz_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
