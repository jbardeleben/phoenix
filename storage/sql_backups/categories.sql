-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2016 at 06:52 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Water Contamination', '2016-05-11 05:05:26', '2016-05-11 05:05:26'),
(2, 'Water Quality', '2016-05-11 05:05:50', '2016-05-11 05:05:50'),
(3, 'Fresh Water Contamination', '2016-05-11 05:06:02', '2016-05-11 05:06:02'),
(4, 'Fresh Water Lakes', '2016-05-11 05:06:13', '2016-05-11 05:06:13'),
(5, 'Ocean Water', '2016-05-11 05:06:24', '2016-05-11 05:06:24'),
(6, 'Ocean Water Contamination', '2016-05-11 05:07:17', '2016-05-11 05:07:17'),
(7, 'Ocean Water Quality', '2016-05-11 05:07:38', '2016-05-11 05:07:38'),
(8, 'Press Release', '2016-07-25 14:13:09', '2016-07-25 14:13:09'),
(9, 'Environmental Protection Agency', '2016-07-25 14:13:22', '2016-07-25 14:13:22'),
(10, 'Drinking Water', '2016-07-25 14:28:53', '2016-07-25 14:28:53'),
(11, 'Drinking Water: Contamination', '2016-07-25 17:48:33', '2016-07-25 17:48:33'),
(12, 'Drinking Water: Toxic Chemicals', '2016-07-25 17:48:33', '2016-07-25 17:48:33'),
(13, 'Drinking Water: Toxic Algae', '2016-07-25 23:40:43', '2016-07-25 23:40:43'),
(14, 'Drinking Water: Lead Contamination', '2016-07-26 00:12:59', '2016-07-26 00:12:59'),
(15, 'Drinking Water: Quality', '2016-07-26 14:04:15', '2016-07-26 14:04:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
