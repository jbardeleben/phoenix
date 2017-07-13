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
(1, 'General Programming', '2016-05-11 04:55:50', '2016-05-11 04:55:50'),
(2, 'Weather', '2016-05-11 04:55:59', '2016-05-11 04:55:59'),
(3, 'PHP Tutorials', '2016-05-11 04:56:12', '2016-05-11 04:56:12'),
(4, 'JavaScript Tutorials', '2016-05-11 04:56:21', '2016-05-11 04:56:21'),
(5, 'CSS Tutorials', '2016-05-11 04:56:31', '2016-05-11 04:56:31'),
(6, 'Web Design (HTML, CSS, JavaScript)', '2016-05-11 04:56:48', '2016-05-11 04:56:48'),
(7, 'Web Development (PHP, JavaScript, Ruby (on Rails), Python)', '2016-05-11 04:57:32', '2016-05-11 04:57:32'),
(8, 'Web Frameworks', '2016-05-11 04:57:47', '2016-05-11 04:57:47'),
(9, 'Android Development', '2016-05-11 04:57:56', '2016-05-11 04:57:56'),
(10, 'iOS Development', '2016-05-11 04:58:04', '2016-05-11 04:58:04'),
(11, 'Severe Weather Education', '2016-05-11 04:58:21', '2016-05-11 04:58:21'),
(12, 'PHP Frameworks', '2016-05-11 05:05:02', '2016-05-11 05:05:02'),
(13, 'JavaScript Frameworks', '2016-05-11 05:05:11', '2016-05-11 05:05:11'),
(14, 'Python Frameworks', '2016-05-11 05:05:20', '2016-05-11 05:05:20'),
(15, 'CSS Frameworks', '2016-05-11 05:05:26', '2016-05-11 05:05:26'),
(16, 'Severe Weather: Tornadoes', '2016-05-11 05:05:50', '2016-05-11 05:05:50'),
(17, 'Severe Weather: Hurricanes', '2016-05-11 05:06:02', '2016-05-11 05:06:02'),
(18, 'Severe Weather: Blizzards', '2016-05-11 05:06:13', '2016-05-11 05:06:13'),
(19, 'Severe Weather: Lightning', '2016-05-11 05:06:24', '2016-05-11 05:06:24'),
(20, 'Severe Weather: Nor\'easters', '2016-05-11 05:07:17', '2016-05-11 05:07:17'),
(21, 'Hiking and Outdoors', '2016-05-11 05:07:38', '2016-05-11 05:07:38'),
(22, 'U.S.A', '2016-07-25 14:13:09', '2016-07-25 14:13:09'),
(23, 'Atlantic Coast (U.S.A)', '2016-07-25 14:13:22', '2016-07-25 14:13:22'),
(24, 'Drinking Water', '2016-07-25 14:28:53', '2016-07-25 14:28:53'),
(25, 'Contaminated Water', '2016-07-25 17:48:33', '2016-07-25 17:48:33'),
(26, 'Drinking Water: Toxic Chemicals', '2016-07-25 17:48:33', '2016-07-25 17:48:33'),
(27, 'Drinking Water: Contamination', '2016-07-25 23:40:43', '2016-07-25 23:40:43'),
(28, 'Press Release', '2016-07-26 00:12:59', '2016-07-26 00:12:59'),
(29, 'Drinking Water: Toxic Algae', '2016-07-26 14:04:15', '2016-07-26 14:04:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
