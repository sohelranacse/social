-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 04:59 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `activity_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` int(11) DEFAULT NULL,
  `icon` int(11) DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `features` varchar(255) DEFAULT NULL,
  `version` float DEFAULT NULL,
  `unique_identifier` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privacy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `album_images`
--

CREATE TABLE `album_images` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blogcategories`
--

CREATE TABLE `blogcategories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tag` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `view` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `message_thrade` int(11) DEFAULT NULL,
  `reciver_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `thumbsup` tinyint(1) NOT NULL DEFAULT 0,
  `file` text DEFAULT NULL,
  `react` text DEFAULT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `chatcenter` text DEFAULT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `is_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'post, event, any other type post''s comment',
  `id_of_type` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_reacts` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `paypal_supported` int(11) DEFAULT NULL,
  `stripe_supported` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `paypal_supported`, `stripe_supported`) VALUES
(1, 'Leke', 'ALL', 'Lek', 0, 1),
(2, 'Dollars', 'USD', '$', 1, 1),
(3, 'Afghanis', 'AFN', '؋', 0, 1),
(4, 'Pesos', 'ARS', '$', 0, 1),
(5, 'Guilders', 'AWG', 'ƒ', 0, 1),
(6, 'Dollars', 'AUD', '$', 1, 1),
(7, 'New Manats', 'AZN', 'ман', 0, 1),
(8, 'Dollars', 'BSD', '$', 0, 1),
(9, 'Dollars', 'BBD', '$', 0, 1),
(10, 'Rubles', 'BYR', 'p.', 0, 0),
(11, 'Euro', 'EUR', '€', 1, 1),
(12, 'Dollars', 'BZD', 'BZ$', 0, 1),
(13, 'Dollars', 'BMD', '$', 0, 1),
(14, 'Bolivianos', 'BOB', '$b', 0, 1),
(15, 'Convertible Marka', 'BAM', 'KM', 0, 1),
(16, 'Pula', 'BWP', 'P', 0, 1),
(17, 'Leva', 'BGN', 'лв', 0, 1),
(18, 'Reais', 'BRL', 'R$', 1, 1),
(19, 'Pounds', 'GBP', '£', 1, 1),
(20, 'Dollars', 'BND', '$', 0, 1),
(21, 'Riels', 'KHR', '៛', 0, 1),
(22, 'Dollars', 'CAD', '$', 1, 1),
(23, 'Dollars', 'KYD', '$', 0, 1),
(24, 'Pesos', 'CLP', '$', 0, 1),
(25, 'Yuan Renminbi', 'CNY', '¥', 0, 1),
(26, 'Pesos', 'COP', '$', 0, 1),
(27, 'Colón', 'CRC', '₡', 0, 1),
(28, 'Kuna', 'HRK', 'kn', 0, 1),
(29, 'Pesos', 'CUP', '₱', 0, 0),
(30, 'Koruny', 'CZK', 'Kč', 1, 1),
(31, 'Kroner', 'DKK', 'kr', 1, 1),
(32, 'Pesos', 'DOP ', 'RD$', 0, 1),
(33, 'Dollars', 'XCD', '$', 0, 1),
(34, 'Pounds', 'EGP', '£', 0, 1),
(35, 'Colones', 'SVC', '$', 0, 0),
(36, 'Pounds', 'FKP', '£', 0, 1),
(37, 'Dollars', 'FJD', '$', 0, 1),
(38, 'Cedis', 'GHC', '¢', 0, 0),
(39, 'Pounds', 'GIP', '£', 0, 1),
(40, 'Quetzales', 'GTQ', 'Q', 0, 1),
(41, 'Pounds', 'GGP', '£', 0, 0),
(42, 'Dollars', 'GYD', '$', 0, 1),
(43, 'Lempiras', 'HNL', 'L', 0, 1),
(44, 'Dollars', 'HKD', '$', 1, 1),
(45, 'Forint', 'HUF', 'Ft', 1, 1),
(46, 'Kronur', 'ISK', 'kr', 0, 1),
(47, 'Rupees', 'INR', 'Rp', 1, 1),
(48, 'Rupiahs', 'IDR', 'Rp', 0, 1),
(49, 'Rials', 'IRR', '﷼', 0, 0),
(50, 'Pounds', 'IMP', '£', 0, 0),
(51, 'New Shekels', 'ILS', '₪', 1, 1),
(52, 'Dollars', 'JMD', 'J$', 0, 1),
(53, 'Yen', 'JPY', '¥', 1, 1),
(54, 'Pounds', 'JEP', '£', 0, 0),
(55, 'Tenge', 'KZT', 'лв', 0, 1),
(56, 'Won', 'KPW', '₩', 0, 0),
(57, 'Won', 'KRW', '₩', 0, 1),
(58, 'Soms', 'KGS', 'лв', 0, 1),
(59, 'Kips', 'LAK', '₭', 0, 1),
(60, 'Lati', 'LVL', 'Ls', 0, 0),
(61, 'Pounds', 'LBP', '£', 0, 1),
(62, 'Dollars', 'LRD', '$', 0, 1),
(63, 'Switzerland Francs', 'CHF', 'CHF', 1, 1),
(64, 'Litai', 'LTL', 'Lt', 0, 0),
(65, 'Denars', 'MKD', 'ден', 0, 1),
(66, 'Ringgits', 'MYR', 'RM', 1, 1),
(67, 'Rupees', 'MUR', '₨', 0, 1),
(68, 'Pesos', 'MXN', '$', 1, 1),
(69, 'Tugriks', 'MNT', '₮', 0, 1),
(70, 'Meticais', 'MZN', 'MT', 0, 1),
(71, 'Dollars', 'NAD', '$', 0, 1),
(72, 'Rupees', 'NPR', '₨', 0, 1),
(73, 'Guilders', 'ANG', 'ƒ', 0, 1),
(74, 'Dollars', 'NZD', '$', 1, 1),
(75, 'Cordobas', 'NIO', 'C$', 0, 1),
(76, 'Nairas', 'NGN', '₦', 0, 1),
(77, 'Krone', 'NOK', 'kr', 1, 1),
(78, 'Rials', 'OMR', '﷼', 0, 0),
(79, 'Rupees', 'PKR', '₨', 0, 1),
(80, 'Balboa', 'PAB', 'B/.', 0, 1),
(81, 'Guarani', 'PYG', 'Gs', 0, 1),
(82, 'Nuevos Soles', 'PEN', 'S/.', 0, 1),
(83, 'Pesos', 'PHP', 'Php', 1, 1),
(84, 'Zlotych', 'PLN', 'zł', 1, 1),
(85, 'Rials', 'QAR', '﷼', 0, 1),
(86, 'New Lei', 'RON', 'lei', 0, 1),
(87, 'Rubles', 'RUB', 'руб', 1, 1),
(88, 'Pounds', 'SHP', '£', 0, 1),
(89, 'Riyals', 'SAR', '﷼', 0, 1),
(90, 'Dinars', 'RSD', 'Дин.', 0, 1),
(91, 'Rupees', 'SCR', '₨', 0, 1),
(92, 'Dollars', 'SGD', '$', 1, 1),
(93, 'Dollars', 'SBD', '$', 0, 1),
(94, 'Shillings', 'SOS', 'S', 0, 1),
(95, 'Rand', 'ZAR', 'R', 0, 1),
(96, 'Rupees', 'LKR', '₨', 0, 1),
(97, 'Kronor', 'SEK', 'kr', 1, 1),
(98, 'Dollars', 'SRD', '$', 0, 1),
(99, 'Pounds', 'SYP', '£', 0, 0),
(100, 'New Dollars', 'TWD', 'NT$', 1, 1),
(101, 'Baht', 'THB', '฿', 1, 1),
(102, 'Dollars', 'TTD', 'TT$', 0, 1),
(103, 'Lira', 'TRY', 'TL', 0, 1),
(104, 'Liras', 'TRL', '£', 0, 0),
(105, 'Dollars', 'TVD', '$', 0, 0),
(106, 'Hryvnia', 'UAH', '₴', 0, 1),
(107, 'Pesos', 'UYU', '$U', 0, 1),
(108, 'Sums', 'UZS', 'лв', 0, 1),
(109, 'Bolivares Fuertes', 'VEF', 'Bs', 0, 0),
(110, 'Dong', 'VND', '₫', 0, 1),
(111, 'Rials', 'YER', '﷼', 0, 1),
(112, 'Zimbabwe Dollars', 'ZWD', 'Z$', 0, 0),
(113, 'Taka', 'BDT', '৳', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `publisher` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_date` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `going_users_id` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `interested_users_id` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privacy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feeling_and_activities`
--

CREATE TABLE `feeling_and_activities` (
  `feeling_and_activity_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `follow_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
  `id` int(11) NOT NULL,
  `requester` int(11) DEFAULT NULL,
  `accepter` int(11) DEFAULT NULL,
  `importance` int(11) DEFAULT NULL,
  `is_accepted` int(11) DEFAULT NULL,
  `accepted_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `user_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtitle` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privacy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_type` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `is_accepted` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invites`
--

CREATE TABLE `invites` (
  `id` bigint(20) NOT NULL,
  `invite_sender_id` int(11) DEFAULT NULL,
  `invite_reciver_id` int(11) DEFAULT NULL,
  `is_accepted` int(11) NOT NULL DEFAULT 0,
  `event_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phrase` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `translated` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `phrase`, `translated`, `created_at`, `updated_at`) VALUES
(1, 'english', 'English', 'English', '2023-04-05 11:34:21', '2023-04-05 11:34:21'),
(2, 'english', 'Login', 'Login', '2023-07-24 14:29:28', '2023-07-24 14:29:28'),
(3, 'english', 'Email', 'Email', '2023-07-24 14:29:28', '2023-07-24 14:29:28'),
(4, 'english', 'Enter your email address', 'Enter your email address', '2023-07-24 14:29:28', '2023-07-24 14:29:28'),
(5, 'english', 'Password', 'Password', '2023-07-24 14:29:28', '2023-07-24 14:29:28'),
(6, 'english', 'Your password', 'Your password', '2023-07-24 14:29:28', '2023-07-24 14:29:28'),
(7, 'english', 'Remember me', 'Remember me', '2023-07-24 14:29:28', '2023-07-24 14:29:28'),
(8, 'english', 'Forgot your password?', 'Forgot your password?', '2023-07-24 14:29:28', '2023-07-24 14:29:28'),
(9, 'english', 'My Profile', 'My Profile', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(10, 'english', 'Go to admin panel', 'Go to admin panel', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(11, 'english', 'Change Password', 'Change Password', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(12, 'english', 'Log Out', 'Log Out', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(13, 'english', 'Timeline', 'Timeline', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(14, 'english', 'Profile', 'Profile', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(15, 'english', 'Group', 'Group', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(16, 'english', 'Page', 'Page', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(17, 'english', 'Marketplace', 'Marketplace', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(18, 'english', 'Video and Shorts', 'Video and Shorts', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(19, 'english', 'Event', 'Event', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(20, 'english', 'Blog', 'Blog', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(21, 'english', 'About', 'About', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(22, 'english', 'Privacy Policy', 'Privacy Policy', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(23, 'english', 'Create story', 'Create story', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(24, 'english', 'What\'s on your mind ____', 'What\'s on your mind ____', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(25, 'english', 'Create Post', 'Create Post', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(26, 'english', 'Public', 'Public', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(27, 'english', 'Only Me', 'Only Me', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(28, 'english', 'Friends', 'Friends', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(29, 'english', 'Click to browse', 'Click to browse', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(30, 'english', 'Tag People', 'Tag People', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(31, 'english', 'Tagged', 'Tagged', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(32, 'english', 'Search more peoples', 'Search more peoples', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(33, 'english', 'Suggestions', 'Suggestions', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(34, 'english', 'What are you doing', 'What are you doing', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(35, 'english', 'Activities', 'Activities', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(36, 'english', 'How are you feeling', 'How are you feeling', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(37, 'english', 'Feelings', 'Feelings', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(38, 'english', 'Search for location', 'Search for location', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(39, 'english', 'Determine your location', 'Determine your location', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(40, 'english', 'Photo', 'Photo', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(41, 'english', 'Video', 'Video', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(42, 'english', 'Activity', 'Activity', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(43, 'english', 'Location', 'Location', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(44, 'english', 'Live Video', 'Live Video', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(45, 'english', 'Publish', 'Publish', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(46, 'english', 'More', 'More', '2023-07-24 14:30:11', '2023-07-24 14:30:11'),
(47, 'english', 'Processing', 'Processing', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(48, 'english', 'Uploading', 'Uploading', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(49, 'english', 'Link Copied', 'Link Copied', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(50, 'english', 'Hi', 'Hi', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(51, 'english', 'Good Evening', 'Good Evening', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(52, 'english', 'Sponsored', 'Sponsored', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(53, 'english', 'Active users', 'Active users', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(54, 'english', 'Loading...', 'Loading...', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(55, 'english', 'Create new story', 'Create new story', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(56, 'english', 'Stories', 'Stories', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(57, 'english', 'Confirmation', 'Confirmation', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(58, 'english', 'Are you sure', 'Are you sure', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(59, 'english', 'Cancel', 'Cancel', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(60, 'english', 'Continue', 'Continue', '2023-07-24 14:30:12', '2023-07-24 14:30:12'),
(61, 'english', 'Update your cover photo', 'Update your cover photo', '2023-07-24 14:30:16', '2023-07-24 14:30:16'),
(62, 'english', 'Edit Cover Photo', 'Edit Cover Photo', '2023-07-24 14:30:16', '2023-07-24 14:30:16'),
(63, 'english', 'Edit your profile', 'Edit your profile', '2023-07-24 14:30:16', '2023-07-24 14:30:16'),
(64, 'english', 'Edit Profile', 'Edit Profile', '2023-07-24 14:30:16', '2023-07-24 14:30:16'),
(65, 'english', 'My Friends', 'My Friends', '2023-07-24 14:30:16', '2023-07-24 14:30:16'),
(66, 'english', 'Friend Requests', 'Friend Requests', '2023-07-24 14:30:16', '2023-07-24 14:30:16'),
(67, 'english', 'Intro', 'Intro', '2023-07-24 14:30:17', '2023-07-24 14:30:17'),
(68, 'english', 'Edit Bio', 'Edit Bio', '2023-07-24 14:30:17', '2023-07-24 14:30:17'),
(69, 'english', 'Save Bio', 'Save Bio', '2023-07-24 14:30:17', '2023-07-24 14:30:17'),
(70, 'english', 'Info', 'Info', '2023-07-24 14:30:17', '2023-07-24 14:30:17'),
(71, 'english', 'Stadied at', 'Stadied at', '2023-07-24 14:30:17', '2023-07-24 14:30:17'),
(72, 'english', 'From', 'From', '2023-07-24 14:30:17', '2023-07-24 14:30:17'),
(73, 'english', 'male', 'male', '2023-07-24 14:30:17', '2023-07-24 14:30:17'),
(74, 'english', 'Joined', 'Joined', '2023-07-24 14:30:17', '2023-07-24 14:30:17'),
(75, 'english', 'Edit info', 'Edit info', '2023-07-24 14:30:17', '2023-07-24 14:30:17'),
(76, 'english', 'See More', 'See More', '2023-07-24 14:30:17', '2023-07-24 14:30:17'),
(77, 'english', 'See All', 'See All', '2023-07-24 14:30:17', '2023-07-24 14:30:17'),
(78, 'english', 'Create Product', 'Create Product', '2023-07-24 14:30:32', '2023-07-24 14:30:32'),
(79, 'english', 'My Products', 'My Products', '2023-07-24 14:30:32', '2023-07-24 14:30:32'),
(80, 'english', 'Saved Product', 'Saved Product', '2023-07-24 14:30:32', '2023-07-24 14:30:32'),
(81, 'english', 'Saved', 'Saved', '2023-07-24 14:30:32', '2023-07-24 14:30:32'),
(82, 'english', 'Filters', 'Filters', '2023-07-24 14:30:32', '2023-07-24 14:30:32'),
(83, 'english', 'Category', 'Category', '2023-07-24 14:30:32', '2023-07-24 14:30:32'),
(84, 'english', 'Condition', 'Condition', '2023-07-24 14:30:32', '2023-07-24 14:30:32'),
(85, 'english', 'Used', 'Used', '2023-07-24 14:30:32', '2023-07-24 14:30:32'),
(86, 'english', 'New', 'New', '2023-07-24 14:30:32', '2023-07-24 14:30:32'),
(87, 'english', 'Select Brand', 'Select Brand', '2023-07-24 14:30:32', '2023-07-24 14:30:32'),
(88, 'english', 'Pages', 'Pages', '2023-07-24 14:30:34', '2023-07-24 14:30:34'),
(89, 'english', 'Create Page', 'Create Page', '2023-07-24 14:30:34', '2023-07-24 14:30:34'),
(90, 'english', 'My Pages', 'My Pages', '2023-07-24 14:30:34', '2023-07-24 14:30:34'),
(91, 'english', 'Suggested Pages', 'Suggested Pages', '2023-07-24 14:30:34', '2023-07-24 14:30:34'),
(92, 'english', 'Liked Pages', 'Liked Pages', '2023-07-24 14:30:34', '2023-07-24 14:30:34'),
(93, 'english', 'All Groups', 'All Groups', '2023-07-24 14:30:35', '2023-07-24 14:30:35'),
(94, 'english', ' Create New Group', ' Create New Group', '2023-07-24 14:30:35', '2023-07-24 14:30:35'),
(95, 'english', 'Groups', 'Groups', '2023-07-24 14:30:35', '2023-07-24 14:30:35'),
(96, 'english', 'Group you Manage', 'Group you Manage', '2023-07-24 14:30:35', '2023-07-24 14:30:35'),
(97, 'english', 'Group you Joined', 'Group you Joined', '2023-07-24 14:30:35', '2023-07-24 14:30:35'),
(98, 'english', 'Dashboard', 'Dashboard', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(99, 'english', 'User', 'User', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(100, 'english', 'Users', 'Users', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(101, 'english', 'Create new user', 'Create new user', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(102, 'english', 'Create Category', 'Create Category', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(103, 'english', 'Brand', 'Brand', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(104, 'english', 'Blogs', 'Blogs', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(105, 'english', 'Create Blog', 'Create Blog', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(106, 'english', 'Sponsored Post', 'Sponsored Post', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(107, 'english', 'Ads', 'Ads', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(108, 'english', 'Create Ad', 'Create Ad', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(109, 'english', 'Reported Post', 'Reported Post', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(110, 'english', 'Payment history', 'Payment history', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(111, 'english', 'Settings', 'Settings', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(112, 'english', 'System Setting', 'System Setting', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(113, 'english', 'Amazon s3 settings', 'Amazon s3 settings', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(114, 'english', 'Custom Pages', 'Custom Pages', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(115, 'english', 'Payment Setting', 'Payment Setting', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(116, 'english', 'Language Setting', 'Language Setting', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(117, 'english', 'SMTP Setting', 'SMTP Setting', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(118, 'english', 'Visit Website', 'Visit Website', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(119, 'english', 'My Account', 'My Account', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(120, 'english', 'Total Users', 'Total Users', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(121, 'english', 'Post', 'Post', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(122, 'english', 'Total Posts', 'Total Posts', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(123, 'english', 'Total Pages', 'Total Pages', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(124, 'english', 'Total Blogs', 'Total Blogs', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(125, 'english', 'Ad', 'Ad', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(126, 'english', 'Total Sponsored Posts', 'Total Sponsored Posts', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(127, 'english', 'Marketplace Products', 'Marketplace Products', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(128, 'english', 'Total Products', 'Total Products', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(129, 'english', 'By ____', 'By ____', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(130, 'english', 'Number of user', 'Number of user', '2023-07-24 14:30:43', '2023-07-24 14:30:43'),
(131, 'english', 'Add a new user', 'Add a new user', '2023-07-24 14:30:51', '2023-07-24 14:30:51'),
(132, 'english', 'Back', 'Back', '2023-07-24 14:30:51', '2023-07-24 14:30:51'),
(133, 'english', 'Name', 'Name', '2023-07-24 14:30:51', '2023-07-24 14:30:51'),
(134, 'english', 'Email address', 'Email address', '2023-07-24 14:30:51', '2023-07-24 14:30:51'),
(135, 'english', 'Phone', 'Phone', '2023-07-24 14:30:51', '2023-07-24 14:30:51'),
(136, 'english', 'Address', 'Address', '2023-07-24 14:30:51', '2023-07-24 14:30:51'),
(137, 'english', 'Gender', 'Gender', '2023-07-24 14:30:51', '2023-07-24 14:30:51'),
(138, 'english', 'Female', 'Female', '2023-07-24 14:30:51', '2023-07-24 14:30:51'),
(139, 'english', 'Date of birth', 'Date of birth', '2023-07-24 14:30:51', '2023-07-24 14:30:51'),
(140, 'english', 'Bio', 'Bio', '2023-07-24 14:30:51', '2023-07-24 14:30:51'),
(141, 'english', 'Submit', 'Submit', '2023-07-24 14:30:51', '2023-07-24 14:30:51'),
(142, 'english', 'All Product Categories', 'All Product Categories', '2023-07-24 14:31:10', '2023-07-24 14:31:10'),
(143, 'english', 'Create', 'Create', '2023-07-24 14:31:10', '2023-07-24 14:31:10'),
(144, 'english', 'Sl No', 'Sl No', '2023-07-24 14:31:10', '2023-07-24 14:31:10'),
(145, 'english', 'Category Name', 'Category Name', '2023-07-24 14:31:10', '2023-07-24 14:31:10'),
(146, 'english', 'DATE', 'DATE', '2023-07-24 14:31:10', '2023-07-24 14:31:10'),
(147, 'english', 'Action', 'Action', '2023-07-24 14:31:10', '2023-07-24 14:31:10'),
(148, 'english', 'All Reported Post List', 'All Reported Post List', '2023-07-24 14:31:11', '2023-07-24 14:31:11'),
(149, 'english', 'Report Reason', 'Report Reason', '2023-07-24 14:31:12', '2023-07-24 14:31:12'),
(150, 'english', 'Reported By', 'Reported By', '2023-07-24 14:31:12', '2023-07-24 14:31:12'),
(151, 'english', 'System Settings', 'System Settings', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(152, 'english', 'System Name', 'System Name', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(153, 'english', 'System Title', 'System Title', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(154, 'english', 'System Email', 'System Email', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(155, 'english', 'System Phone', 'System Phone', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(156, 'english', 'System Fax', 'System Fax', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(157, 'english', 'System currency', 'System currency', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(158, 'english', 'System language', 'System language', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(159, 'english', 'Public signup', 'Public signup', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(160, 'english', 'enabled', 'enabled', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(161, 'english', 'disabled', 'disabled', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(162, 'english', 'Ad charge per day', 'Ad charge per day', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(163, 'english', 'Footer', 'Footer', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(164, 'english', 'Footer Link', 'Footer Link', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(165, 'english', 'Update', 'Update', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(166, 'english', 'Product Update', 'Product Update', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(167, 'english', 'SYSTEM LOGO', 'SYSTEM LOGO', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(168, 'english', 'Dark logo', 'Dark logo', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(169, 'english', 'Light logo', 'Light logo', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(170, 'english', 'Favicon', 'Favicon', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(171, 'english', 'Update Logo', 'Update Logo', '2023-07-24 14:31:14', '2023-07-24 14:31:14'),
(172, 'english', 'All Product Brand ', 'All Product Brand ', '2023-07-24 14:31:24', '2023-07-24 14:31:24'),
(173, 'english', 'Brand Name', 'Brand Name', '2023-07-24 14:31:24', '2023-07-24 14:31:24'),
(174, 'english', 'Add a new page', 'Add a new page', '2023-07-24 14:31:26', '2023-07-24 14:31:26'),
(175, 'english', 'Page title', 'Page title', '2023-07-24 14:31:26', '2023-07-24 14:31:26'),
(176, 'english', 'Select a category', 'Select a category', '2023-07-24 14:31:26', '2023-07-24 14:31:26'),
(177, 'english', 'Page details', 'Page details', '2023-07-24 14:31:26', '2023-07-24 14:31:26'),
(178, 'english', 'Logo', 'Logo', '2023-07-24 14:31:26', '2023-07-24 14:31:26'),
(179, 'english', 'Cover photo', 'Cover photo', '2023-07-24 14:31:26', '2023-07-24 14:31:26'),
(180, 'english', 'All Page Categories', 'All Page Categories', '2023-07-24 14:31:28', '2023-07-24 14:31:28'),
(181, 'english', 'Profile Picture', 'Profile Picture', '2023-07-24 14:31:43', '2023-07-24 14:31:43'),
(182, 'english', 'Enter your name', 'Enter your name', '2023-07-24 14:31:43', '2023-07-24 14:31:43'),
(183, 'english', 'Nickname', 'Nickname', '2023-07-24 14:31:43', '2023-07-24 14:31:43'),
(184, 'english', 'Enter your nickname name', 'Enter your nickname name', '2023-07-24 14:31:43', '2023-07-24 14:31:43'),
(185, 'english', 'Marital status', 'Marital status', '2023-07-24 14:31:43', '2023-07-24 14:31:43'),
(186, 'english', 'Enter your marital status', 'Enter your marital status', '2023-07-24 14:31:43', '2023-07-24 14:31:43'),
(187, 'english', 'Enter your phone number', 'Enter your phone number', '2023-07-24 14:31:43', '2023-07-24 14:31:43'),
(188, 'english', 'Your date of birth', 'Your date of birth', '2023-07-24 14:31:43', '2023-07-24 14:31:43'),
(189, 'english', 'Update Profile', 'Update Profile', '2023-07-24 14:31:43', '2023-07-24 14:31:43'),
(190, 'english', 'Profile updated successfully', 'Profile updated successfully', '2023-07-24 14:31:54', '2023-07-24 14:31:54'),
(191, 'english', 'Upload', 'Upload', '2023-07-24 14:32:11', '2023-07-24 14:32:11'),
(192, 'english', 'Notifications', 'Notifications', '2023-07-24 14:32:38', '2023-07-24 14:32:38'),
(193, 'english', 'Events', 'Events', '2023-07-24 14:32:51', '2023-07-24 14:32:51'),
(194, 'english', 'Create Event', 'Create Event', '2023-07-24 14:32:51', '2023-07-24 14:32:51'),
(195, 'english', 'My Event', 'My Event', '2023-07-24 14:32:51', '2023-07-24 14:32:51'),
(196, 'english', 'Watch', 'Watch', '2023-07-24 14:42:02', '2023-07-24 14:42:02'),
(197, 'english', 'Create Video & Shorts ', 'Create Video & Shorts ', '2023-07-24 14:42:02', '2023-07-24 14:42:02'),
(198, 'english', 'Shorts', 'Shorts', '2023-07-24 14:42:02', '2023-07-24 14:42:02'),
(199, 'english', 'Videos', 'Videos', '2023-07-24 14:42:02', '2023-07-24 14:42:02'),
(200, 'english', 'Discover new articles', 'Discover new articles', '2023-07-24 14:42:04', '2023-07-24 14:42:04'),
(201, 'english', 'My articles', 'My articles', '2023-07-24 14:42:04', '2023-07-24 14:42:04'),
(202, 'english', 'View', 'View', '2023-07-24 14:42:27', '2023-07-24 14:42:27'),
(203, 'english', 'Product Category', 'Product Category', '2023-07-24 14:42:27', '2023-07-24 14:42:27'),
(204, 'english', 'Configure amazon s3 settings', 'Configure amazon s3 settings', '2023-07-24 14:43:03', '2023-07-24 14:43:03'),
(205, 'english', 'Status', 'Status', '2023-07-24 14:43:03', '2023-07-24 14:43:03'),
(206, 'english', 'Active', 'Active', '2023-07-24 14:43:03', '2023-07-24 14:43:03'),
(207, 'english', 'Deactive', 'Deactive', '2023-07-24 14:43:03', '2023-07-24 14:43:03'),
(208, 'english', 'Access key id', 'Access key id', '2023-07-24 14:43:03', '2023-07-24 14:43:03'),
(209, 'english', 'Secret access key', 'Secret access key', '2023-07-24 14:43:03', '2023-07-24 14:43:03'),
(210, 'english', 'Default region', 'Default region', '2023-07-24 14:43:03', '2023-07-24 14:43:03'),
(211, 'english', 'AWS bucket', 'AWS bucket', '2023-07-24 14:43:03', '2023-07-24 14:43:03'),
(212, 'english', 'Save', 'Save', '2023-07-24 14:43:03', '2023-07-24 14:43:03'),
(213, 'english', 'Heads up', 'Heads up', '2023-07-24 14:43:03', '2023-07-24 14:43:03'),
(214, 'english', 'Update Custom Pages Information', 'Update Custom Pages Information', '2023-07-24 14:43:13', '2023-07-24 14:43:13'),
(215, 'english', 'About Page Description', 'About Page Description', '2023-07-24 14:43:13', '2023-07-24 14:43:13'),
(216, 'english', 'Privacy Page Description', 'Privacy Page Description', '2023-07-24 14:43:13', '2023-07-24 14:43:13'),
(217, 'english', 'Term and Condition Page Description', 'Term and Condition Page Description', '2023-07-24 14:43:13', '2023-07-24 14:43:13'),
(218, 'english', 'Update zoom api keys', 'Update zoom api keys', '2023-07-24 14:43:19', '2023-07-24 14:43:19'),
(219, 'english', 'API key', 'API key', '2023-07-24 14:43:19', '2023-07-24 14:43:19'),
(220, 'english', 'API secret', 'API secret', '2023-07-24 14:43:19', '2023-07-24 14:43:19'),
(221, 'english', 'Payment gateways', 'Payment gateways', '2023-07-24 14:43:24', '2023-07-24 14:43:24'),
(222, 'english', 'Payment Gateway', 'Payment Gateway', '2023-07-24 14:43:24', '2023-07-24 14:43:24'),
(223, 'english', 'Currency', 'Currency', '2023-07-24 14:43:24', '2023-07-24 14:43:24'),
(224, 'english', 'Environment', 'Environment', '2023-07-24 14:43:24', '2023-07-24 14:43:24'),
(225, 'english', 'Test Mode', 'Test Mode', '2023-07-24 14:43:24', '2023-07-24 14:43:24'),
(226, 'english', 'Actions', 'Actions', '2023-07-24 14:43:24', '2023-07-24 14:43:24'),
(227, 'english', 'Edit', 'Edit', '2023-07-24 14:43:24', '2023-07-24 14:43:24'),
(228, 'english', 'Are you sure want to change status?', 'Are you sure want to change status?', '2023-07-24 14:43:24', '2023-07-24 14:43:24'),
(229, 'english', 'Are you sure want to change environment?', 'Are you sure want to change environment?', '2023-07-24 14:43:24', '2023-07-24 14:43:24'),
(230, 'english', 'Activate live mode', 'Activate live mode', '2023-07-24 14:43:24', '2023-07-24 14:43:24'),
(231, 'english', 'Languages', 'Languages', '2023-07-24 14:43:41', '2023-07-24 14:43:41'),
(232, 'english', 'Add new language', 'Add new language', '2023-07-24 14:43:41', '2023-07-24 14:43:41'),
(233, 'english', 'Edit phrase', 'Edit phrase', '2023-07-24 14:43:41', '2023-07-24 14:43:41'),
(234, 'english', 'Edit language', 'Edit language', '2023-07-24 14:43:41', '2023-07-24 14:43:41'),
(235, 'english', 'Add Language', 'Add Language', '2023-07-24 14:43:41', '2023-07-24 14:43:41'),
(236, 'english', 'Language', 'Language', '2023-07-24 14:43:41', '2023-07-24 14:43:41'),
(237, 'english', 'Add', 'Add', '2023-07-24 14:43:41', '2023-07-24 14:43:41'),
(238, 'Bangla', 'Bangla', 'Bangla', '2023-07-24 14:43:51', '2023-07-24 14:43:51'),
(239, 'english', 'Delete', 'Delete', '2023-07-24 14:43:51', '2023-07-24 14:43:51'),
(240, 'bangla', 'Delete', 'Delete', '2023-07-24 14:43:51', '2023-07-24 14:43:51'),
(241, 'english', 'Translate your language', 'Translate your language', '2023-07-24 14:43:55', '2023-07-24 14:43:55'),
(242, 'bangla', 'Translate your language', 'Translate your language', '2023-07-24 14:43:55', '2023-07-24 14:43:55'),
(243, 'english', 'Updating', 'Updating', '2023-07-24 14:43:55', '2023-07-24 14:43:55'),
(244, 'bangla', 'Updating', 'Updating', '2023-07-24 14:43:55', '2023-07-24 14:43:55'),
(245, 'english', 'Updated', 'Updated', '2023-07-24 14:43:55', '2023-07-24 14:43:55'),
(246, 'bangla', 'Updated', 'Updated', '2023-07-24 14:43:55', '2023-07-24 14:43:55'),
(247, 'english', 'Save changes', 'Save changes', '2023-07-24 14:44:06', '2023-07-24 14:44:06'),
(248, 'bangla', 'Save changes', 'Save changes', '2023-07-24 14:44:06', '2023-07-24 14:44:06'),
(249, 'english', 'Update SMTP Information', 'Update SMTP Information', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(250, 'bangla', 'Update SMTP Information', 'Update SMTP Information', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(251, 'english', 'Protocol', 'Protocol', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(252, 'bangla', 'Protocol', 'Protocol', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(253, 'english', 'Smtp crypto', 'Smtp crypto', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(254, 'bangla', 'Smtp crypto', 'Smtp crypto', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(255, 'english', 'Smtp host', 'Smtp host', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(256, 'bangla', 'Smtp host', 'Smtp host', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(257, 'english', 'Smtp port', 'Smtp port', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(258, 'bangla', 'Smtp port', 'Smtp port', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(259, 'english', 'Smtp username', 'Smtp username', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(260, 'bangla', 'Smtp username', 'Smtp username', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(261, 'english', 'Smtp password', 'Smtp password', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(262, 'bangla', 'Smtp password', 'Smtp password', '2023-07-24 14:44:13', '2023-07-24 14:44:13'),
(263, 'english', 'Not found', 'Not found', '2023-07-24 14:44:16', '2023-07-24 14:44:16'),
(264, 'bangla', 'Not found', 'Not found', '2023-07-24 14:44:16', '2023-07-24 14:44:16'),
(265, 'english', 'About this application', 'About this application', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(266, 'bangla', 'About this application', 'About this application', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(267, 'english', 'Software version', 'Software version', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(268, 'bangla', 'Software version', 'Software version', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(269, 'english', 'Check update', 'Check update', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(270, 'bangla', 'Check update', 'Check update', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(271, 'english', 'PHP version', 'PHP version', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(272, 'bangla', 'PHP version', 'PHP version', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(273, 'english', 'Curl enable', 'Curl enable', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(274, 'bangla', 'Curl enable', 'Curl enable', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(275, 'english', 'Purchase code', 'Purchase code', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(276, 'bangla', 'Purchase code', 'Purchase code', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(277, 'english', 'Product license', 'Product license', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(278, 'bangla', 'Product license', 'Product license', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(279, 'english', 'invalid', 'invalid', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(280, 'bangla', 'invalid', 'invalid', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(281, 'english', 'Enter valid purchase code', 'Enter valid purchase code', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(282, 'bangla', 'Enter valid purchase code', 'Enter valid purchase code', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(283, 'english', 'Customer support status', 'Customer support status', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(284, 'bangla', 'Customer support status', 'Customer support status', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(285, 'english', 'Support expiry date', 'Support expiry date', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(286, 'bangla', 'Support expiry date', 'Support expiry date', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(287, 'english', 'Customer name', 'Customer name', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(288, 'bangla', 'Customer name', 'Customer name', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(289, 'english', 'Get customer support', 'Get customer support', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(290, 'bangla', 'Get customer support', 'Get customer support', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(291, 'english', 'Customer support', 'Customer support', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(292, 'bangla', 'Customer support', 'Customer support', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(293, 'english', 'Enter your purchase code', 'Enter your purchase code', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(294, 'bangla', 'Enter your purchase code', 'Enter your purchase code', '2023-07-24 14:44:17', '2023-07-24 14:44:17'),
(295, 'english', 'Reset password', 'Reset password', '2023-07-24 14:54:12', '2023-07-24 14:54:12'),
(296, 'bangla', 'Reset password', 'Reset password', '2023-07-24 14:54:12', '2023-07-24 14:54:12'),
(297, 'english', 'Current Password', 'Current Password', '2023-07-24 14:54:12', '2023-07-24 14:54:12'),
(298, 'bangla', 'Current Password', 'Current Password', '2023-07-24 14:54:12', '2023-07-24 14:54:12'),
(299, 'english', '8 Symbols at least', '8 Symbols at least', '2023-07-24 14:54:12', '2023-07-24 14:54:12'),
(300, 'bangla', '8 Symbols at least', '8 Symbols at least', '2023-07-24 14:54:12', '2023-07-24 14:54:12'),
(301, 'english', 'New Password', 'New Password', '2023-07-24 14:54:12', '2023-07-24 14:54:12'),
(302, 'bangla', 'New Password', 'New Password', '2023-07-24 14:54:12', '2023-07-24 14:54:12'),
(303, 'english', 'Confirm Password', 'Confirm Password', '2023-07-24 14:54:12', '2023-07-24 14:54:12'),
(304, 'bangla', 'Confirm Password', 'Confirm Password', '2023-07-24 14:54:12', '2023-07-24 14:54:12'),
(305, 'english', 'Update Password', 'Update Password', '2023-07-24 14:54:12', '2023-07-24 14:54:12'),
(306, 'bangla', 'Update Password', 'Update Password', '2023-07-24 14:54:12', '2023-07-24 14:54:12'),
(307, 'english', 'Sign Up', 'Sign Up', '2023-07-24 14:57:12', '2023-07-24 14:57:12'),
(308, 'bangla', 'Sign Up', 'Sign Up', '2023-07-24 14:57:12', '2023-07-24 14:57:12'),
(309, 'english', 'Full Name', 'Full Name', '2023-07-24 14:57:12', '2023-07-24 14:57:12'),
(310, 'bangla', 'Full Name', 'Full Name', '2023-07-24 14:57:12', '2023-07-24 14:57:12'),
(311, 'english', 'Your full name', 'Your full name', '2023-07-24 14:57:12', '2023-07-24 14:57:12'),
(312, 'bangla', 'Your full name', 'Your full name', '2023-07-24 14:57:12', '2023-07-24 14:57:12'),
(313, 'english', 'I accept the', 'I accept the', '2023-07-24 14:57:12', '2023-07-24 14:57:12'),
(314, 'bangla', 'I accept the', 'I accept the', '2023-07-24 14:57:12', '2023-07-24 14:57:12'),
(315, 'english', 'Terms and Conditions', 'Terms and Conditions', '2023-07-24 14:57:12', '2023-07-24 14:57:12'),
(316, 'bangla', 'Terms and Conditions', 'Terms and Conditions', '2023-07-24 14:57:12', '2023-07-24 14:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `live_streamings`
--

CREATE TABLE `live_streamings` (
  `streaming_id` int(11) NOT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `details` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marketplaces`
--

CREATE TABLE `marketplaces` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `price` varchar(15) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `category` text DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `condition` text DEFAULT NULL,
  `brand` varchar(250) DEFAULT NULL,
  `buy_link` varchar(300) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

CREATE TABLE `media_files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `story_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `chat_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privacy` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_thrades`
--

CREATE TABLE `message_thrades` (
  `id` int(11) NOT NULL,
  `reciver_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `chatcenter` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `sender_user_id` int(11) DEFAULT NULL,
  `reciver_user_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `view` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pagecategories`
--

CREATE TABLE `pagecategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtitle` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_type` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `logo` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `coverphoto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `job` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lifestyle` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_likes`
--

CREATE TABLE `page_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` int(11) NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `keys` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `test_mode` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_addon` int(11) DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `identifier`, `currency`, `title`, `description`, `keys`, `model_name`, `test_mode`, `status`, `is_addon`, `created_at`, `updated_at`) VALUES
(1, 'paypal', 'USD', 'Paypal', '', '{\"sandbox_client_id\":\"\",\"sandbox_secret_key\":\"\",\"production_client_id\":\"\",\"production_secret_key\":\"\"}', 'Paypal', 1, 1, 0, '', '2023-03-15 06:55:21'),
(2, 'stripe', 'USD', 'Stripe', '', '{\"public_key\":\"\",\"secret_key\":\"\",\"public_live_key\":\"\",\"secret_live_key\":\"\"}', 'StripePay', 1, 1, 0, '', '2023-03-15 06:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `payment_histories`
--

CREATE TABLE `payment_histories` (
  `id` bigint(20) NOT NULL,
  `item_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `currency` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `publisher` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `post_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privacy` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tagged_user_ids` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `location` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `report_status` tinyint(1) NOT NULL DEFAULT 0,
  `user_reacts` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `shared_user` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_shares`
--

CREATE TABLE `post_shares` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `shared_on` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `report` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `saved_products`
--

CREATE TABLE `saved_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `saveforlaters`
--

CREATE TABLE `saveforlaters` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `marketplace_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'zoom_configuration', '{\"api_key\":\"qPUL7G44QC2-oyq7IiD8iw\",\"api_secret\":\"cQCNr1qq4mhGgO0QYCNrY3gMBvk31HuVLVJV\"}', '2022-09-07 06:07:09', '2022-09-07 06:07:09'),
(2, 'about', '<h2 style=\"font-style:italic;\">What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '2022-09-07 06:07:09', '2022-09-10 23:07:33'),
(3, 'policy', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '2022-09-07 06:07:09', '2022-09-07 00:12:27'),
(4, 'term', '<p>Welcome to the University of Dhaka&rsquo;s website, featuring the oldest, largest and the premier multidisciplinary university of Bangladesh!&nbsp;</p>\r\n\r\n<p>Founded in 1921, The University of Dhaka has always had the mission of uplifting the educational standards of the people of the region. It was initially meant to provide tertiary education to people who didn&rsquo;t have access to higher studies till then. Subsequently, it has contributed significantly to the socio-cultural and political development of what was once East Bengal and then East Pakistan, and is now Bangladesh.</p>\r\n\r\n<p>Since its establishment, the university has been fulfilling the hopes and aspirations of its students and their parents. It has, of course, not only been a lighthouse of learning, but has also acted as a torch-bearer of the people of the region in issues such as democracy, freedom of expression, and the need for a just and equitable society. It has always been associated with high quality education and research in which students as well as faculty members and alumni have played their parts. The University of Dhaka&rsquo;s role has expanded beyond its classrooms and research labs during different crises the country has had to face since 1947. In many ways, thus, the university is unique, for it has played a major role in the creation of the independent nation-state of Bangladesh in 1971.</p>\r\n\r\n<p>Writing at this time, I am proud to note that the University of Dhaka has not only fulfilled but also exceeded the aspirations of those who set it up. It has been acclaimed as the best educational institution of the region, and one of the leading universities of the subcontinent. It is an incubator of ideas and has nurtured renowned scientists and academicians, great leaders, administrative and business officials, and entrepreneurs. Its proud alumni include the Father of the Nation Bangabandhu Sheikh Mujibur Rahman, and the incumbent Prime Minister, Sheikh Hasina, his august daughter. Most of the country&rsquo;s presidents, prime ministers, policymakers, politicians and CEOs of leading organizations, researchers and activists have been products of this institution.</p>\r\n\r\n<p>The University of Dhaka&rsquo;s doors are open for people from all classes, religions and parts of the country, and, indeed, also for international students. Its campus, too, regularly hosts different national and international events and festivals where people from every corner can and do participate. It is a hub, for breeding and nourishing liberal, secular and humanistics values.</p>\r\n\r\n<p>At the time when our country is dreaming to become a developed nation by 2041 and has made a firm commitment to achieve the Sustainable Development Goals (SDGs) by 2030, and in an age when we are witnessing the emergence of spirited youths all set to participate in the Fourth Industrial Revolution (4IR), I can affirm that the University of Dhaka is well prepared to meet all future challenges and is ready to lead the nation once again with its acquired experience, available resources, dedicated administrators, experienced faculty members and talented students and employees.</p>\r\n\r\n<p>Having been associated with the university for almost 40 years, first as a student, then as a faculty member, and later in various administrative capacities, it is a great honor and proud privilege for me to be here to not only witness but also to contribute to its centenary celebrations from where I am. Let me emphasize too that it is the singular privilege of all of us at the University of Dhaka to be celebrating its centenary in the year that Bangladesh is celebrating its golden jubilee of independence.</p>\r\n\r\n<p>I would like to request you all to explore the legacy, beauty, and history of this great institution of national, regional and international importance through this website. I hope it will be of use to you as you venture into the knowledge network of the university and acquaint yourself with its history, achievements, centers of learning, residential facilities and other attributes. My office staff and I will be more than happy to listen to you in case you want to visit us in person at a mutually convenient time.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '2022-09-07 06:07:09', '2022-09-07 00:19:02'),
(5, 'smtp', '{\"smtp_protocol\":\"smtp\",\"smtp_crypto\":\"tls\",\"smtp_host\":\"smtp.gmail.com\",\"smtp_port\":\"587\",\"smtp_user\":\"your-email\",\"smtp_pass\":\"Email-password\"}', '2022-09-11 04:36:29', '2022-09-10 23:06:38'),
(6, 'about', 'about us', '2022-09-20 03:45:06', '2022-09-20 03:45:06'),
(7, 'policy', 'policy page', '2022-09-20 03:45:06', '2022-09-20 03:45:06'),
(8, 'term', 'term c', '2022-09-20 03:50:51', '2022-09-20 03:50:51'),
(10, 'system_name', 'UnitedPeace', '2022-09-20 03:52:50', '2023-03-30 09:52:44'),
(11, 'system_title', 'Our private social platform', '2022-09-20 03:53:27', '2023-03-30 09:52:44'),
(12, 'system_email', 'admin@example.com', '2022-09-20 03:53:27', '2023-03-30 09:52:44'),
(13, 'system_phone', '236423625746', '2022-09-20 03:53:57', '2023-03-30 09:52:44'),
(14, 'system_fax', '555-123-4567', '2022-09-20 03:53:57', '2023-03-30 09:52:44'),
(15, 'system_address', 'New York, USA', '2022-09-20 03:54:41', '2023-03-30 09:52:44'),
(16, 'system_footer', 'Creativeitem', '2022-09-20 03:54:41', '2023-03-30 09:52:44'),
(17, 'system_footer_link', 'https://creativeitem.com', '2022-09-20 03:55:08', '2023-03-30 09:52:44'),
(18, 'system_dark_logo', '623.png', '2022-09-20 03:55:08', '2022-09-19 21:10:00'),
(19, 'system_light_logo', '727.png', '2022-09-20 03:55:27', '2022-09-19 21:10:00'),
(20, 'system_fav_icon', '450.png', '2022-09-20 03:55:27', '2022-09-19 20:39:06'),
(21, 'version', '1.2', '2022-09-20 03:55:27', '2022-09-19 20:39:06'),
(22, 'language', 'english', '2022-09-20 03:55:27', '2022-09-19 20:39:06'),
(23, 'public_signup', '1', '2022-09-20 03:55:27', '2023-03-30 09:52:44'),
(24, 'amazon_s3', '{\"active\":\"0\",\"AWS_ACCESS_KEY_ID\":\"\",\"AWS_SECRET_ACCESS_KEY\":\"\",\"AWS_DEFAULT_REGION\":\"\",\"AWS_BUCKET\":\"\"}', '2022-09-20 03:55:27', '2023-03-29 09:34:49'),
(25, 'ad_charge_per_day', '0.1', '2022-09-20 03:55:27', '2023-03-30 09:52:44'),
(26, 'system_currency', 'USD', '2022-09-07 06:07:09', '2023-03-30 09:52:44'),
(27, 'system_language', 'english', '2022-09-07 06:07:09', '2023-03-30 09:52:44'),
(28, 'purchase_code', 'Enter-your-valid-purchase-code', '2022-09-07 06:07:09', '2023-03-30 09:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` bigint(20) NOT NULL,
  `share_user_id` text DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ext_url` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT current_timestamp(),
  `end_date` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `story_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `publisher` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `privacy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media_files` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `friends` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `followers` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studied_at` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastActive` timestamp NULL DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role`, `username`, `email`, `password`, `name`, `nickname`, `friends`, `followers`, `gender`, `studied_at`, `address`, `profession`, `job`, `marital_status`, `phone`, `date_of_birth`, `about`, `photo`, `cover_photo`, `status`, `lastActive`, `timezone`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'mdsohelranacse@gmail.com', '$2y$10$j./YrZgcrlJnIfzra5uL..kxD4lQ3adQh.lbqBXWwlClH38rLEyli', 'Sohel Rana', NULL, '[]', NULL, 'male', NULL, '1064/1, East Shewrapara, Mirpur 10', NULL, NULL, 'Married', '01775326442', '1690135200', NULL, NULL, NULL, NULL, '2023-07-24 14:57:07', 'Asia/Dhaka', '2023-07-24 14:29:24', NULL, NULL, '2023-07-24 14:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` text DEFAULT NULL,
  `privacy` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `view` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_images`
--
ALTER TABLE `album_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcategories`
--
ALTER TABLE `blogcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feeling_and_activities`
--
ALTER TABLE `feeling_and_activities`
  ADD PRIMARY KEY (`feeling_and_activity_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_streamings`
--
ALTER TABLE `live_streamings`
  ADD PRIMARY KEY (`streaming_id`);

--
-- Indexes for table `marketplaces`
--
ALTER TABLE `marketplaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_files`
--
ALTER TABLE `media_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_thrades`
--
ALTER TABLE `message_thrades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagecategories`
--
ALTER TABLE `pagecategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_likes`
--
ALTER TABLE `page_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_histories`
--
ALTER TABLE `payment_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_shares`
--
ALTER TABLE `post_shares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_products`
--
ALTER TABLE `saved_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saveforlaters`
--
ALTER TABLE `saveforlaters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`story_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `album_images`
--
ALTER TABLE `album_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogcategories`
--
ALTER TABLE `blogcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feeling_and_activities`
--
ALTER TABLE `feeling_and_activities`
  MODIFY `feeling_and_activity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invites`
--
ALTER TABLE `invites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `live_streamings`
--
ALTER TABLE `live_streamings`
  MODIFY `streaming_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketplaces`
--
ALTER TABLE `marketplaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_files`
--
ALTER TABLE `media_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_thrades`
--
ALTER TABLE `message_thrades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagecategories`
--
ALTER TABLE `pagecategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_likes`
--
ALTER TABLE `page_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_histories`
--
ALTER TABLE `payment_histories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_shares`
--
ALTER TABLE `post_shares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saved_products`
--
ALTER TABLE `saved_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saveforlaters`
--
ALTER TABLE `saveforlaters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `story_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
