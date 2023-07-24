-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 12:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sociopro_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `activity_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` int(11) NOT NULL,
  `icon` int(11) NOT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
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

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `user_id`, `page_id`, `group_id`, `title`, `sub_title`, `thumbnail`, `privacy`, `created_at`, `updated_at`) VALUES
(7, 2, NULL, NULL, 'My Landscape Photography', NULL, 'xvyzoEBDCrhRs2LgKQiaqplISXt136cNYOd47nbf.jpg', 'public', '1666250527', '1666250527'),
(8, 2, NULL, 6, 'Summer 2022', 'All summer wedding photos of 2022', 'lup1v8za02NcPMY5gFXqofsrEy3iWKBmGh6O4wn7.jpg', 'public', '1666257313', '1666257313'),
(10, 2, 3, NULL, 'Our service', NULL, 'qCLaDrRXM2pskftgGWuv7ByiZe8J3h1xdoSbT6Kn.jpg', 'public', '1666262848', '1666262848');

-- --------------------------------------------------------

--
-- Table structure for table `album_images`
--

DROP TABLE IF EXISTS `album_images`;
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

--
-- Dumping data for table `album_images`
--

INSERT INTO `album_images` (`id`, `album_id`, `user_id`, `page_id`, `group_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 2, NULL, NULL, 'WU4YJB8c2vF9bymOdkIqrCLNZ7seHiGwQtxKRnfE.jpg', '2022-10-19 22:56:25', '2022-10-19 22:56:25'),
(2, 2, 2, NULL, NULL, 'eEkSXAYnuvWcRyBMG2UT4b8dJltagKVF6iC39IrZ.jpg', '2022-10-19 22:57:57', '2022-10-19 22:57:57'),
(3, 2, 2, NULL, NULL, 'yqIpD8BgLmnPeF2rXfj0ZANGko4VTQaOMzHd7Wwi.jpg', '2022-10-19 23:01:05', '2022-10-19 23:01:05'),
(4, 3, 2, NULL, NULL, '15QPzHXF9OWrSBnRkc7JgyNTV6wYbLDApMxhdUZv.jpg', '2022-10-19 23:05:22', '2022-10-19 23:05:22'),
(5, 3, 2, NULL, NULL, 'CZJWgEopGnNMkdzKU9Py46bvr3FOQumsA7D1BHfI.jpg', '2022-10-19 23:06:01', '2022-10-19 23:06:01'),
(6, 3, 2, NULL, NULL, 'wmCKkMXPU3rRnua9EvVehl7IxW8sOgqbNG1S2dpB.jpg', '2022-10-19 23:06:16', '2022-10-19 23:06:16'),
(7, 7, 2, NULL, NULL, 'lfMjP3uGiWprA68hqJ9nC0mxsHSVDvtKg1IZNLkY.jpg', '2022-10-19 23:22:31', '2022-10-19 23:22:31'),
(8, 8, 2, NULL, 6, 'HqGuwzIWUnQLhBdgjoJYEt92y73RACKOXSViPlcb.jpg', '2022-10-20 01:15:46', '2022-10-20 01:15:46'),
(9, 8, 2, NULL, 6, 'KjoGRBYZdrQ39VHSJut1e5ymFDvMbIlACqEU4acN.jpg', '2022-10-20 01:16:59', '2022-10-20 01:16:59'),
(10, 8, 2, NULL, 6, 'pluyrRHVKiQ5Nqh2DWJ1BAG4mO8ZbeX7jaLc9P6M.jpg', '2022-10-20 01:17:22', '2022-10-20 01:17:22'),
(11, 8, 2, NULL, 6, '5zUEfJiaTMwIPN7L1gChDnKRYGdlmOQupA8b4ytX.jpg', '2022-10-20 01:18:12', '2022-10-20 01:18:12'),
(12, 8, 2, NULL, 6, 'jJf0qDNE6KO72nkCGTp8xsuvwXYVeM5rHbUm1ioS.jpg', '2022-10-20 01:18:27', '2022-10-20 01:18:27'),
(13, 8, 2, NULL, 6, 'aTJ8SzVpElHefK6bGIjvYrot4XsdAgWRwyND1mFu.jpg', '2022-10-20 01:18:45', '2022-10-20 01:18:45'),
(14, 8, 2, NULL, 6, '1y9EQ0xNavhogrwUkDqRjYfnBm6c4TeMz35JbLpd.jpg', '2022-10-20 01:23:58', '2022-10-20 01:23:58'),
(15, 8, 2, NULL, 6, 'yOhS6BWDzLZeCFvjw31Yru7mdUgli2q8HPXE5TVs.jpg', '2022-10-20 01:24:30', '2022-10-20 01:24:30'),
(16, 8, 2, NULL, 6, 'Tq5OMDmWBszRklpvxEXhtuyJZjSb3fH7icePVYd1.jpg', '2022-10-20 01:24:41', '2022-10-20 01:24:41'),
(17, 8, 2, NULL, 6, 'lYNjTHtPeq9wLsUm2VIuQbKOGR5zdDavk7orxCSF.jpg', '2022-10-20 01:24:50', '2022-10-20 01:24:50'),
(18, 8, 2, NULL, 6, '7rf4H6tPwShkoBOIKplyzjNMLVn13v0CJGdFTXE8.jpg', '2022-10-20 01:24:59', '2022-10-20 01:24:59'),
(19, 9, 2, 3, NULL, '9W13NPQfO6GalqKF7IRrdS8LZtjyni5ehxcTJwMB.jpg', '2022-10-20 02:46:15', '2022-10-20 02:46:15'),
(20, 9, 2, 3, NULL, 'TwMAYLvFpsxB0nh9U1ZWf6tHlbqVOjd3zDc7Iieo.jpg', '2022-10-20 02:46:50', '2022-10-20 02:46:50'),
(21, 10, 2, 3, NULL, 'YMmN0RfcI9JHh2CKj5ZdzByvA7b41Ue86EqQTxiO.jpg', '2022-10-20 02:47:54', '2022-10-20 02:47:54'),
(22, 10, 2, 3, NULL, 'MRXxcpu5IhEq6vinSLQTo0zfwJH8tUPWsKAjCOke.jpg', '2022-10-20 02:48:15', '2022-10-20 02:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `blogcategories`
--

DROP TABLE IF EXISTS `blogcategories`;
CREATE TABLE `blogcategories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogcategories`
--

INSERT INTO `blogcategories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Travel', '2022-09-14 01:39:35', '2022-10-19 02:23:23'),
(2, 'Beauty.', '2022-09-14 01:41:53', '2022-09-14 01:41:53'),
(3, 'Gaming', '2022-09-14 01:42:04', '2022-09-14 01:42:04'),
(4, 'Technology.', '2022-09-14 01:59:01', '2022-09-14 01:59:01'),
(5, 'Cooking.', '2022-09-14 01:59:13', '2022-09-14 01:59:13'),
(6, 'Lifestyle.', '2022-09-14 01:59:24', '2022-09-14 01:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tag` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `view` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `category_id`, `title`, `description`, `thumbnail`, `banner`, `status`, `tag`, `view`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Travel In The World', '<p></p><p><span style=\"color: rgb(85, 85, 85); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\">The area south of Medellin is coffee country. My flight from Cartagena put me right in the thick of it, in the city of Pereira. And thus I spent the next few weeks exploring the region, starting with some beautiful hot springs near the village of Santa Rosa de Cabal, before moving on to the hot springs near Manizales. Now, Manizales is one of those second-rate Colombia’s cities which most people have probably never heard of. But they are one of Colombia’s cities I have seen that have incorporated cable cars into their public transport system. It is ingenious really: As Manizales lies in pretty hilly terrain, the bus terminal is located not near the city center, but at the bottom of a hill, right next to a cable car station. From there, the teleferico whisks you right into the city center in no time. Cable cars really are a game changer in some of the cities here.</span><br style=\"color: rgb(85, 85, 85); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\"><br style=\"color: rgb(85, 85, 85); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\"><span style=\"color: rgb(85, 85, 85); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\">The other, slightly different mode of transportation here in the coffee region are old US jeeps called Willy.&nbsp;</span><span style=\"color: rgb(85, 85, 85); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; text-align: var(--bs-body-text-align);\">They are anything but comfortable, given that they a) are about 70 years old and b) normally transport as many people as physically possible (plus a few more who have to stand on the back and hold onto something), but they are just a very cool and iconic way to move around with for shorter distances.</span><br></p><br style=\"color: rgb(85, 85, 85); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\"><span style=\"color: rgb(85, 85, 85); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\">With this being one of the world’s most famous coffee producing regions, I certainly wanted to know a bit more about how they grow the coffee here. To that end, I visited a place called Hacienda Venecia, close to the city of Manizales. I intended to take the coffee tour and maybe spend a night before moving on. I ended staying a week: While a room at the main house of the hacienda was way above my budget at ~150 Euros a night, they also had an 8 Euro a night hostal a few minutes’ walk away, set in a beautifully lush garden, complete with comfy hammocks and splendid view of the surrounding coffee plantation. And as so often in Colombia, I was the&nbsp;</span><span style=\"color: rgb(85, 85, 85); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\">One thing I learned is – probably not strange from a capitalist point of view - that for a long time, the best quality coffee was exported, ironically leaving the big producer Colombia with only second-rate coffee (and “Tinto”) in their own country. However, since a few years ago, more and more high-quality coffees hops have sprung up in the region, offering excellent quality brew, often single origin from a local coffee farm down the road. It is fair to say that I sampled a good number of these cafes here in the region.</span><br style=\"color: rgb(85, 85, 85); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\"><br style=\"color: rgb(85, 85, 85); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\"><br><p><br style=\"color: rgb(85, 85, 85); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\"></p>', '23047.jpg', NULL, NULL, '[\"New York city\",\"Travel\",\"Move around world\",\"Fun\"]', '[2]', '2022-09-14 09:21:15', '2022-10-24 06:48:44'),
(3, 2, 3, 'Online Game', '<p>No matter whether it&#39;s PlayStation, Xbox, or a company you&#39;ve never heard of,&nbsp;</p>', '23676.jpg', NULL, NULL, '[\"Gaming\",\"Online Gaming\"]', '[6,2]', '2022-09-14 09:27:34', '2022-10-24 06:44:25'),
(4, 2, 4, 'CSE in modern world', '<p><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\">Blogs have become one of the most effective outlets for teaching and learning about all things computer science and computer programming. While some computer science blogs are made up of the interesting musings of various tech types, others are helpful how-to’s covering everything from building a website to building a computer. Despite their many differences, the best blogs are entertaining, informative, and well-written. Keep scrolling for this year’s rundown of the top 30 computer science and programming blogs!</span></p><p><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\">To come up with a name for his blog, U.C. Irvine professor David Eppstein interpreted his initials as the hexadecimal number oxDE, then converted the result to binary. 11011110 is the result. Anyone interested in computer science is sure to find Eppstein’s posts both entertaining and informative. He writes on just about everything, always from a computer science perspective. Recent articles include&nbsp;</span><a href=\"https://11011110.github.io/blog/2021/05/12/constructive-solid-geometry.html\" style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; font-weight: 400; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(63, 139, 235); transition-duration: 0.2s; transition-timing-function: ease; text-decoration: none; background-color: rgb(252, 252, 252);\">“The Constructive Solid Geometry of Piecewise-Linear Functions,”</a><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\">&nbsp;</span><a href=\"https://11011110.github.io/blog/2021/05/09/arc-triangle-tilings.html\" style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; font-weight: 400; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(63, 139, 235); transition-duration: 0.2s; transition-timing-function: ease; text-decoration: none; background-color: rgb(252, 252, 252);\">“Arc-Triangle Tilings,”</a><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\">&nbsp;and&nbsp;</span><a href=\"https://11011110.github.io/blog/\" style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; font-weight: 400; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(63, 139, 235); transition-duration: 0.2s; transition-timing-function: ease; text-decoration: none; background-color: rgb(252, 252, 252);\">“How Good is Greed for the No-Three-in-Line Problem?”</a></p><p><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\">Better Programming is a collective blog written by myriad contributors. Upwards of 30 new posts are published each week, on topics like code tutorials, programming, and even coffee. Recently published articles include&nbsp;</span><a href=\"https://betterprogramming.pub/how-to-write-clean-code-in-python-5d67746133f2\" style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; font-weight: 400; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(63, 139, 235); transition-duration: 0.2s; transition-timing-function: ease; text-decoration: none; background-color: rgb(252, 252, 252);\">“How to Write Clean Code in Python,”</a><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\">&nbsp;</span><a href=\"https://betterprogramming.pub/what-the-heck-is-a-developer-advocate-3a613872beb\" style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; font-weight: 400; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(63, 139, 235); transition-duration: 0.2s; transition-timing-function: ease; text-decoration: none; background-color: rgb(252, 252, 252);\">“What the Heck Is a Developer Advocate?,”</a><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\">&nbsp;and&nbsp;</span><a href=\"https://betterprogramming.pub/how-i-prioritize-my-work-as-a-software-engineer-50d5b7d880d1\" style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; font-weight: 400; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(63, 139, 235); transition-duration: 0.2s; transition-timing-function: ease; text-decoration: none; background-color: rgb(252, 252, 252);\">“How I Prioritize My Work as a Software Engineer.”</a></p><p><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\">Despite claiming to be the thoughts of an amateur on computation and mathematics, bit-player is actually authored by Brian Hayes, the one-time “Computing Science” columnist at American Scientist. Hayes’s posts are always based in computer science, yet cover such topics as biology, linguistics, neuroscience, and social sciences. Some of bit-player’s most recent posts include&nbsp;</span><a href=\"http://bit-player.org/2021/foldable-words\" style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; font-weight: 400; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(63, 139, 235); transition-duration: 0.2s; transition-timing-function: ease; text-decoration: none; background-color: rgb(252, 252, 252);\">“Foldable Words,”</a><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\">&nbsp;</span><a href=\"http://bit-player.org/2020/we-gather-together-2\" style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; font-weight: 400; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(63, 139, 235); transition-duration: 0.2s; transition-timing-function: ease; text-decoration: none; background-color: rgb(252, 252, 252);\">“We Gather Together,”&nbsp;</a><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\">and&nbsp;</span><a href=\"http://bit-player.org/2020/more-questions-about-trees\" style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; font-weight: 400; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(63, 139, 235); transition-duration: 0.2s; transition-timing-function: ease; text-decoration: none; background-color: rgb(252, 252, 252);\">“More Questions About Trees.”</a></p><p><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\">CodePen is the blog of Tim Sabat, Chris Coyier, and Alex Vazquez. The three post weekly about the ins and outs of running a software business. Recent posts include&nbsp;</span><a href=\"https://blog.codepen.io/2021/05/13/315-support-success/\" style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; font-weight: 400; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(63, 139, 235); transition-duration: 0.2s; transition-timing-function: ease; text-decoration: none; background-color: rgb(252, 252, 252);\">“Support Success,”</a><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\">&nbsp;</span><a href=\"https://blog.codepen.io/2021/05/05/moving-lines-blocks-of-code-with-option-and/\" style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; font-weight: 400; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(63, 139, 235); transition-duration: 0.2s; transition-timing-function: ease; text-decoration: none; background-color: rgb(252, 252, 252);\">“Moving Lines/Blocks of Code..,”</a><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\">&nbsp;and&nbsp;</span><a href=\"https://blog.codepen.io/2021/04/28/team-management-improvements/\" style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; font-weight: 400; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(63, 139, 235); transition-duration: 0.2s; transition-timing-function: ease; text-decoration: none; background-color: rgb(252, 252, 252);\">“Team Management Improvements.”</a><br><br><br><span style=\"color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: 16px; background-color: rgb(252, 252, 252);\"><br></span></p>', '16105.jpg', NULL, NULL, '[\"CSC\"]', '[2]', '2022-09-14 09:31:46', '2022-10-24 06:49:18'),
(5, 4, 5, 'Kovakkai Curry Recipe', '<p>Hey guys! Today, I am going to show you all a very nice and tasty Ivy gourd curry. Ivy gourd is also known as coccinea. But many people generally tend to not eat ivy gourd because they see it as a boring vegetable due to a neutral taste it possesses. But if you make a perfect recipe with ivy gourd, it&#39;s just unbeatable. That&#39;s the reason I felt like sharing a wonderful masala gravy curry with Ivy gourd. This one is too good and it can be enjoyed both with rice and roti. If you want, you can also have this along with mildly flavoured rice recipes like Kaju Rice, Jeera Rice, Vegetable Pulao etc. I personally loved the taste and I hope you do too. So whenever you want to make something rich, nice and extravagant with a normal vegetable, try this out! I am sure everybody will be impressed with the taste.</p>', '18136.jpg', NULL, NULL, '[\"cook\"]', '[3,2,6,4]', '2022-09-19 06:41:39', '2022-10-24 07:13:54'),
(7, 4, 2, 'Beauty Bounty', '<p><span style=\"color: rgb(33, 37, 41); font-family: Roboto; font-size: 15px;\">If there’s one makeup product we wouldn’t ditch – yes, even if you paid us to – it’d be blush. And unsurprisingly, beauty companies are onto us, because new gorgeous blush formulas are being dropped left, right, and center. Allow us to introduce you to the new blush balms, sticks, and powders eager to kiss your cheeks with intense pigment power.</span></p><p><span style=\"color: rgb(33, 37, 41); font-family: Roboto; font-size: 15px;\">It’s never too late to try&nbsp;</span><a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://hudabeauty.com/default/blog-blush-draping-trend-83539.html\" style=\"color: rgb(255, 0, 152); text-decoration: underline; background-color: rgb(255, 255, 255); font-family: Roboto; font-size: 15px; font-weight: 400;\">blush draping</a><span style=\"color: rgb(33, 37, 41); font-family: Roboto; font-size: 15px;\">, AKA the technique of draping your blush from your cheekbones to your temples for a sculpted glow. And our buildable blush sticks make it SO easy. Seriously, they blend like a dream and feel so weightless on the skin. The pigmented hues leave a dewy flush of color while lychee extract and smoothing vitamin E turn moisture up to the max. Consider them your stand-alone makeup staple for a night out with the besties.</span><span style=\"color: rgb(33, 37, 41); font-family: Roboto; font-size: 15px;\"><br></span><br></p>', '30618.jpg', NULL, NULL, '[\"Girls\",\"Beauty\",\"Blog\"]', '[2,6,4,3]', '2022-09-19 07:40:27', '2022-11-03 05:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Appel', '2022-09-14 01:25:48', '2022-09-14 01:25:48'),
(2, 'HP', '2022-09-14 01:31:32', '2022-09-14 01:31:32'),
(3, 'One +', '2022-09-14 02:08:27', '2022-09-14 02:08:27'),
(4, 'Mi', '2022-09-14 02:09:58', '2022-09-14 02:09:58'),
(5, 'BMW', '2022-11-01 23:52:53', '2022-11-01 23:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Phone', '2022-09-14 01:24:33', '2022-09-14 01:24:33'),
(2, 'Laptop', '2022-09-14 01:31:47', '2022-09-14 01:31:47'),
(3, 'Watch', '2022-09-14 02:02:29', '2022-09-14 02:02:29'),
(4, 'Ear Pot', '2022-09-14 02:07:52', '2022-09-14 02:07:52'),
(5, 'Printer', '2022-09-18 23:44:08', '2022-09-18 23:44:08'),
(6, 'Camera', '2022-09-18 23:45:42', '2022-09-18 23:45:42'),
(7, 'Car', '2022-11-01 23:49:10', '2022-11-01 23:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `message_thrade` int(11) DEFAULT NULL,
  `reciver_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
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

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `message_thrade`, `reciver_id`, `sender_id`, `message`, `thumbsup`, `file`, `react`, `reply_id`, `chatcenter`, `read_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 'http://localhost/sociopro/product/view/4', 0, '1', NULL, NULL, NULL, 1, '2022-09-18 23:57:15', '2022-09-18 23:57:15'),
(2, 2, 3, 3, 'https://demo.creativeitem.com/sociopro/product/view/12', 0, '1', NULL, NULL, NULL, 1, '2022-09-20 03:01:00', '2022-09-20 03:01:01'),
(4, 4, 7, 2, 'Hi', 0, '1', NULL, NULL, NULL, 1, '2022-10-02 04:20:36', '2022-10-03 03:23:04'),
(5, 4, 7, 2, 'how you doing?', 0, '1', NULL, NULL, NULL, 1, '2022-10-03 03:23:22', '2022-10-03 22:32:57'),
(7, 5, 2, 5, 'Hi', 0, '1', NULL, NULL, NULL, 1, '2022-10-16 00:40:26', '2022-10-16 00:40:26'),
(13, 4, 2, 7, 'Hey Rebeka', 0, '1', 'like', NULL, NULL, 1, '2022-10-25 23:33:19', '2022-11-02 00:08:09'),
(14, 4, 2, 7, 'I am fine.', 0, '1', 'sad', NULL, NULL, 1, '2022-10-25 23:33:34', '2022-11-01 22:23:18'),
(22, 5, 5, 2, 'Hello?', 0, '1', NULL, NULL, NULL, 1, '2022-10-31 00:17:28', '2022-10-31 02:14:13'),
(23, 3, 4, 2, 'Hello', 0, '1', NULL, NULL, NULL, 0, '2022-11-03 00:23:40', '2022-11-03 00:23:40'),
(24, 6, 3, 2, 'Hi Richard', 0, '1', NULL, NULL, NULL, 0, '2022-11-03 00:24:11', '2022-11-03 00:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `is_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'post, event, any other type post''s comment',
  `id_of_type` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_reacts` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `parent_id`, `user_id`, `is_type`, `id_of_type`, `description`, `user_reacts`, `created_at`, `updated_at`) VALUES
(2, 0, 2, 'post', 183, 'Beautiful', '{\"2\":\"love\"}', '1664692469', '1664692469'),
(3, 0, 2, 'post', 134, 'Awesome', '{\"2\":\"love\"}', '1664693470', '1664693470'),
(4, 2, 2, 'post', 183, 'good one', '[]', '1664700702', '1664700702'),
(5, 0, 3, 'post', 195, 'Please like my friend\'s photo', '[]', '1664706378', '1664706378'),
(6, 0, 5, 'post', 197, 'nice', '[]', '1664781774', '1664781774'),
(7, 0, 6, 'post', 211, 'Please let me know the date & time.', '[]', '1664868479', '1664868479'),
(8, 0, 6, 'post', 213, 'same question.', '[]', '1664868530', '1664868530'),
(9, 0, 5, 'post', 171, 'Nice photo', '[]', '1665385151', '1665385151'),
(10, 0, 4, 'post', 75, 'Love this', '[]', '1665385299', '1665385299'),
(11, 0, 4, 'post', 74, 'beautiful', '[]', '1665385310', '1665385310'),
(12, 0, 3, 'post', 170, 'Nice photo mate', '[]', '1665385977', '1665385977'),
(13, 9, 3, 'post', 171, 'thanks mate', '[]', '1665385997', '1665385997'),
(14, 0, 3, 'post', 171, 'Thanks for the commenting guys', '[]', '1665386011', '1665386011'),
(15, 0, 2, 'post', 133, 'where is the place?', '[]', '1665389658', '1665389658'),
(16, 0, 2, 'post', 134, 'nice video', '[]', '1665389697', '1665389697'),
(17, 0, 2, 'post', 109, 'So beautiful', '[]', '1665389752', '1665389752'),
(19, 18, 2, 'blog', 8, 'dfgb', '[]', '1665391900', '1665391900'),
(20, 0, 5, 'post', 27, 'i am going', '[]', '1665394055', '1665394055'),
(21, 0, 2, 'post', 212, 'dfgdfs', '[]', '1665399858', '1665399858'),
(22, 0, 2, 'post', 212, 'dfsg', '[]', '1665399859', '1665399859'),
(23, 0, 2, 'post', 212, 'dfsgdsfg', '[]', '1665399859', '1665399859'),
(24, 0, 2, 'post', 212, 'sdfg', '{\"2\":\"like\"}', '1665399860', '1665399860'),
(25, 22, 2, 'post', 212, 'dsgfvsdf', '[]', '1665399869', '1665399869'),
(26, 22, 2, 'post', 212, 'sdf', '[]', '1665399870', '1665399870'),
(32, 0, 2, 'post', 218, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '{\"2\":\"sad\"}', '1665649744', '1665649744'),
(34, 32, 2, 'post', 218, 'type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '[]', '1665649762', '1665649762'),
(35, 0, 2, 'post', 208, 'Nice photography Palma', '{\"5\":\"love\",\"2\":\"love\"}', '1665910746', '1665910746'),
(36, 0, 2, 'post', 207, 'Love this shot', '{\"5\":\"love\"}', '1665910766', '1665910766'),
(37, 0, 2, 'post', 203, 'Great astro photography', '{\"6\":\"like\",\"2\":\"angry\"}', '1665910799', '1665910799'),
(38, 0, 2, 'post', 199, 'Stunning Landscape.... :)', '{\"6\":\"like\"}', '1665910826', '1665910826'),
(39, 35, 5, 'post', 208, 'yes', '{\"2\":\"love\"}', '1665910919', '1665910919'),
(40, 0, 5, 'post', 208, 'Love your drone shots', '{\"2\":\"love\"}', '1665910933', '1665910933'),
(41, 0, 5, 'post', 207, 'what a shot Palma', '{\"6\":\"like\"}', '1665910962', '1665910962'),
(42, 0, 5, 'post', 206, 'You are looking amazing', '{\"6\":\"like\"}', '1665910979', '1665910979'),
(43, 0, 5, 'post', 201, 'You are looking amazing man..', '{\"6\":\"love\"}', '1665911021', '1665911021'),
(44, 0, 5, 'post', 196, 'Hey Karen, How you doing?', '[]', '1665911052', '1665911052'),
(45, 0, 5, 'post', 192, 'You are looking so beautiful..', '[]', '1665911088', '1665911088'),
(46, 37, 6, 'post', 203, 'Thanks Rebeka', '[]', '1665911248', '1665911248'),
(47, 43, 6, 'post', 201, 'Thanks man, Much appreciated', '[]', '1665911281', '1665911281'),
(48, 0, 6, 'post', 207, 'Wow.. just love it', '[]', '1665911416', '1665911416'),
(49, 0, 6, 'post', 206, 'pretty lady', '[]', '1665911430', '1665911430'),
(50, 0, 6, 'post', 200, 'Amazing landscape man', '[]', '1665911452', '1665911452'),
(51, 0, 6, 'post', 199, 'Breathtaking photographs...', '[]', '1665911479', '1665911479'),
(52, 0, 6, 'post', 197, 'Like your hairstyle mate', '[]', '1665911509', '1665911509'),
(53, 0, 6, 'post', 192, 'Love portrait', '{\"2\":\"love\"}', '1665911663', '1665911663'),
(54, 0, 2, 'post', 218, 'Beautiful', '[]', '1665992272', '1665992272'),
(55, 0, 5, 'post', 223, 'Nice shot dear', '[]', '1665999895', '1665999895'),
(56, 0, 5, 'post', 222, 'I want to go there too..', '{\"6\":\"like\"}', '1665999931', '1665999931'),
(57, 0, 4, 'post', 222, 'Wow..', '{\"6\":\"like\"}', '1666000096', '1666000096'),
(58, 0, 4, 'post', 223, 'Lovely', '[]', '1666000105', '1666000105'),
(59, 0, 4, 'post', 224, 'Oh so beautiful', '[]', '1666000124', '1666000124'),
(60, 0, 4, 'post', 225, 'What a loving family', '[]', '1666000337', '1666000337'),
(61, 0, 4, 'post', 225, 'wow nice', '[]', '1666000706', '1666000706'),
(62, 0, 4, 'post', 224, 'Great', '[]', '1666000726', '1666000726'),
(63, 0, 4, 'post', 223, 'great shot', '[]', '1666001832', '1666001832'),
(64, 0, 4, 'post', 222, 'Aha Singapore', '{\"6\":\"like\"}', '1666001850', '1666001850'),
(65, 0, 6, 'post', 229, 'Nice video', '{\"2\":\"love\"}', '1666001910', '1666001910'),
(66, 0, 6, 'post', 227, 'Amazing', '[]', '1666001918', '1666001918'),
(67, 0, 6, 'post', 225, 'Lovely family', '[]', '1666001933', '1666001933'),
(68, 0, 6, 'post', 224, 'So beautiful', '[]', '1666001945', '1666001945'),
(69, 0, 6, 'post', 223, 'Amazing', '[]', '1666001958', '1666001958'),
(70, 0, 6, 'post', 222, 'Stunning', '[]', '1666001973', '1666001973'),
(71, 0, 7, 'post', 232, 'What a nice vibe', '[]', '1666002144', '1666002144'),
(72, 0, 7, 'post', 231, 'Love the way you spend your weekend', '{\"7\":\"love\"}', '1666002187', '1666002187'),
(73, 0, 7, 'post', 229, 'I will go there next week', '[]', '1666002232', '1666002232'),
(74, 0, 7, 'post', 227, 'Hope to go for sailing with you one day', '[]', '1666002260', '1666002260'),
(75, 0, 5, 'post', 236, 'Love this vibe', '{\"4\":\"like\",\"6\":\"love\"}', '1666003129', '1666003129'),
(76, 0, 5, 'post', 235, 'You have done a great job', '[]', '1666003144', '1666003144'),
(77, 75, 4, 'post', 236, 'same here', '{\"6\":\"love\"}', '1666003258', '1666003258'),
(78, 0, 4, 'post', 235, 'Nice work', '[]', '1666003327', '1666003327'),
(79, 0, 4, 'post', 238, 'Enjoy your family time', '[]', '1666003383', '1666003383'),
(80, 0, 4, 'post', 237, 'Time is running faster.', '[]', '1666003405', '1666003405'),
(81, 0, 5, 'post', 235, 'love your work', '[]', '1666004360', '1666004360'),
(82, 0, 5, 'post', 237, 'great to see them', '[]', '1666004405', '1666004405'),
(83, 0, 5, 'post', 239, 'Great festival', '{\"3\":\"love\"}', '1666004423', '1666004423'),
(84, 0, 6, 'post', 241, 'I love this parakeet', '{\"2\":\"like\"}', '1666004533', '1666004533'),
(85, 0, 6, 'post', 240, 'you are such lucky to get this shot', '[]', '1666004570', '1666004570'),
(86, 0, 2, 'post', 243, 'what a great video, just loved it..', '{\"7\":\"love\"}', '1666004869', '1666004869'),
(87, 0, 2, 'post', 242, 'Where did you go for honeymoon??', '{\"7\":\"sad\"}', '1666004892', '1666004892'),
(88, 0, 2, 'post', 246, 'awesome video!', '[]', '1666074608', '1666074608'),
(89, 0, 2, 'post', 155, 'Looking delicious', '[]', '1666078602', '1666078602'),
(90, 0, 2, 'blog', 1, 'Thank you verymuch for reading my blog', '[]', '1666591663', '1666591663'),
(91, 0, 4, 'post', 267, 'Beautiful!', '{\"3\":\"love\",\"2\":\"love\",\"6\":\"love\"}', '1666595139', '1666595139'),
(92, 0, 3, 'post', 268, 'Amazing', '{\"2\":\"love\",\"4\":\"love\",\"6\":\"love\"}', '1666595308', '1666595308'),
(94, 0, 4, 'post', 269, 'Have a safe jounry.', '{\"3\":\"love\",\"6\":\"love\"}', '1666595615', '1666595615'),
(95, 0, 3, 'post', 269, 'See you soon.', '{\"6\":\"love\"}', '1666595709', '1666595709'),
(96, 0, 2, 'post', 194, 'You are looking good', '[]', '1666602683', '1666602683'),
(97, 0, 7, 'post', 262, 'Wow, these photos are stunning...', '[]', '1666692020', '1666692020'),
(98, 0, 4, 'post', 265, 'I just love their food.', '{\"6\":\"love\",\"3\":\"love\",\"7\":\"love\"}', '1667114054', '1667114054'),
(99, 0, 4, 'post', 64, 'Best food in the city!', '[]', '1667114081', '1667114081'),
(100, 0, 4, 'post', 63, 'Looks delicious!', '[]', '1667114112', '1667114112'),
(101, 98, 6, 'post', 265, 'Awesome', '{\"3\":\"like\",\"7\":\"love\"}', '1667114355', '1667114355'),
(102, 0, 7, 'post', 245, 'Beautiful', '{\"6\":\"love\"}', '1667121337', '1667121337');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
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
(112, 'Zimbabwe Dollars', 'ZWD', 'Z$', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `publisher` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `event_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `going_users_id` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `interested_users_id` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privacy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `group_id`, `publisher`, `publisher_id`, `title`, `description`, `event_date`, `event_time`, `location`, `going_users_id`, `interested_users_id`, `thumbnail`, `banner`, `privacy`, `created_at`, `updated_at`) VALUES
(3, 2, NULL, NULL, NULL, 'Holiday Events in NYC New York, NY, United States', '<p>Like&nbsp;<a href=\"https://www.facebook.com/NYCDailyEvents/?__cft__[0]=AZW2ZIw5bwFqvUM2vKiCJVOvfL4h1SaxWQvqc39ZkwUp_4R7s_MyxUcsWf_LQIaos2OeQjKrzCGbf6aaoO4Pg5ZYA4165r2MIbJXGT7zKMYEJRX2BTTklAO9NgoZ2XyczZ4&amp;__tn__=q\">The NYC Daily Event </a>&nbsp;for more upcoming events!</p>', '2022-10-20', '17:00', 'New York, NY', '[6]', '[]', NULL, '17839.jpg', 'public', '2022-09-14 06:49:18', '2022-11-03 06:45:35'),
(4, 4, NULL, NULL, NULL, 'Photography', '<p>A Photography Platform for all the photographers to click their art through a nude boudoir shoot!</p>\r\n\r\n<p>Master Photographer (Invited of special request) - Aridum Bhattacharjee<br />\r\nMakeup by- Sharmishtha Bannerjee.<br />\r\nModel - Tanisha Singh and Mandira Bhowmik.<br />\r\nWith 5 looks and highly fashioned lingerie!</p>', '2022-10-25', '11:00', 'Los Angeles', '[]', '[]', NULL, '10920.jpg', 'public', '2022-09-19 06:37:22', '2022-11-03 06:47:20'),
(5, 4, NULL, NULL, NULL, 'Travel Event', '<p>Share your travel stories</p>', '2022-12-30', '00:00', 'New York,', '[]', '[]', NULL, '22842.jpg', 'public', '2022-09-19 07:36:47', '2022-11-03 06:46:00'),
(6, 2, 6, NULL, NULL, 'Wedding photography workshop', NULL, '2022-10-11', '16:37', 'Derrimut hall, Victoria', '[2,2]', '[]', NULL, '8572.jpg', 'public', '2022-10-03 10:46:47', '2022-10-04 07:24:26'),
(7, 2, 12, NULL, NULL, 'Birthday bpart', NULL, '2022-10-12', '17:45', 'klk', '[]', '[]', NULL, NULL, 'public', '2022-10-10 11:42:43', '2022-10-10 11:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feeling_and_activities`
--

DROP TABLE IF EXISTS `feeling_and_activities`;
CREATE TABLE `feeling_and_activities` (
  `feeling_and_activity_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feeling_and_activities`
--

INSERT INTO `feeling_and_activities` (`feeling_and_activity_id`, `type`, `title`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'activity', 'Traveling', 'travelling.png', '', ''),
(2, 'activity', 'Watching', 'watch.png', '', ''),
(3, 'activity', 'Listening', 'listen.png', '', ''),
(4, 'activity', 'Playing', 'playing.png', '', ''),
(5, 'activity', 'Relaxed', 'relax.png', '', ''),
(6, 'feeling', 'Happy', 'happy.png', '', ''),
(7, 'feeling', 'Lovely', 'lovely.png', '', ''),
(8, 'feeling', 'Loved', 'loved.png', '', ''),
(9, 'feeling', 'Fun', 'fun.png', '', ''),
(10, 'feeling', 'Crazy', 'crazy.png', '', ''),
(11, 'feeling', 'Relaxed', 'relax.png', '', ''),
(12, 'feeling', 'Happy blessed', 'blessed.png', '', ''),
(13, 'feeling', 'Lovely Sad', 'r-cry1.png', '', ''),
(14, 'feeling', 'Loved Thankful', 'r-care.png', '', ''),
(15, 'feeling', 'Fun Cool', 'cool.png', '', ''),
(16, 'feeling', 'Crazy Surprised', 'amused.png', '', ''),
(17, 'feeling', 'Relaxed Angry', 'angry.png', '', ''),
(18, 'feeling', 'Relaxed Heartbroken', 'surprise.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

DROP TABLE IF EXISTS `followers`;
CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `follow_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `follow_id`, `page_id`, `group_id`, `created_at`, `updated_at`) VALUES
(4, 2, 5, NULL, NULL, '2022-10-02 04:27:06', '2022-10-02 04:27:06'),
(5, 2, 5, NULL, NULL, '2022-10-02 04:27:12', '2022-10-02 04:27:12'),
(6, 2, 5, NULL, NULL, '2022-10-02 04:27:14', '2022-10-02 04:27:14'),
(7, 2, 2, NULL, NULL, '2022-10-31 02:27:53', '2022-10-31 02:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

DROP TABLE IF EXISTS `friendships`;
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

--
-- Dumping data for table `friendships`
--

INSERT INTO `friendships` (`id`, `requester`, `accepter`, `importance`, `is_accepted`, `accepted_at`, `created_at`, `updated_at`) VALUES
(20, 5, 2, NULL, 0, NULL, '2022-10-16 08:50:27', '2022-10-16 08:50:27'),
(23, 5, 6, NULL, 1, NULL, '2022-10-16 08:50:32', '2022-10-16 08:50:32'),
(24, 5, 7, NULL, 1, NULL, '2022-10-16 08:51:39', '2022-10-16 08:51:39'),
(25, 5, 11, NULL, 0, NULL, '2022-10-16 08:51:43', '2022-10-16 08:51:43'),
(26, 5, 10, NULL, 0, NULL, '2022-10-16 08:51:45', '2022-10-16 08:51:45'),
(27, 5, 9, NULL, 0, NULL, '2022-10-16 08:51:46', '2022-10-16 08:51:46'),
(28, 5, 8, NULL, 0, NULL, '2022-10-16 08:51:48', '2022-10-16 08:51:48'),
(29, 4, 2, NULL, 1, NULL, '2022-10-16 08:54:03', '2022-10-16 08:54:03'),
(31, 4, 6, NULL, 1, NULL, '2022-10-16 08:54:14', '2022-10-16 08:54:14'),
(32, 4, 7, NULL, 1, NULL, '2022-10-16 08:54:16', '2022-10-16 08:54:16'),
(33, 4, 8, NULL, 0, NULL, '2022-10-16 08:54:18', '2022-10-16 08:54:18'),
(34, 4, 9, NULL, 0, NULL, '2022-10-16 08:54:22', '2022-10-16 08:54:22'),
(35, 4, 11, NULL, 0, NULL, '2022-10-16 08:54:25', '2022-10-16 08:54:25'),
(36, 4, 10, NULL, 0, NULL, '2022-10-16 08:54:28', '2022-10-16 08:54:28'),
(37, 6, 2, NULL, 0, NULL, '2022-10-16 08:54:52', '2022-10-16 08:54:52'),
(39, 6, 7, NULL, 1, NULL, '2022-10-16 08:54:57', '2022-10-16 08:54:57'),
(40, 6, 8, NULL, 0, NULL, '2022-10-16 08:54:58', '2022-10-16 08:54:58'),
(41, 6, 10, NULL, 0, NULL, '2022-10-16 08:55:02', '2022-10-16 08:55:02'),
(42, 6, 9, NULL, 0, NULL, '2022-10-16 08:55:04', '2022-10-16 08:55:04'),
(43, 6, 11, NULL, 0, NULL, '2022-10-16 08:55:06', '2022-10-16 08:55:06'),
(44, 6, 12, NULL, 0, NULL, '2022-10-16 08:55:08', '2022-10-16 08:55:08'),
(45, 7, 2, NULL, 1, NULL, '2022-10-16 08:55:51', '2022-10-16 08:55:51'),
(47, 7, 8, NULL, 0, NULL, '2022-10-16 08:55:55', '2022-10-16 08:55:55'),
(48, 7, 9, NULL, 0, NULL, '2022-10-16 08:55:57', '2022-10-16 08:55:57'),
(49, 7, 10, NULL, 0, NULL, '2022-10-16 08:55:59', '2022-10-16 08:55:59'),
(50, 7, 11, NULL, 0, NULL, '2022-10-16 08:56:00', '2022-10-16 08:56:00'),
(51, 7, 12, NULL, 0, NULL, '2022-10-16 08:56:03', '2022-10-16 08:56:03'),
(53, 3, 8, NULL, 0, NULL, '2022-10-16 08:56:46', '2022-10-16 08:56:46'),
(54, 3, 9, NULL, 0, NULL, '2022-10-16 08:56:48', '2022-10-16 08:56:48'),
(55, 3, 10, NULL, 0, NULL, '2022-10-16 08:56:50', '2022-10-16 08:56:50'),
(56, 3, 11, NULL, 0, NULL, '2022-10-16 08:56:52', '2022-10-16 08:56:52'),
(57, 3, 12, NULL, 0, NULL, '2022-10-16 08:56:54', '2022-10-16 08:56:54'),
(58, 2, 3, NULL, 1, NULL, '2022-10-31 08:02:40', '2022-10-31 08:02:40'),
(59, 2, 8, NULL, 1, NULL, '2022-10-31 08:02:42', '2022-10-31 08:02:42'),
(60, 2, 9, NULL, 1, NULL, '2022-10-31 08:02:44', '2022-10-31 08:02:44'),
(61, 2, 10, NULL, 0, NULL, '2022-10-31 08:02:45', '2022-10-31 08:02:45'),
(62, 2, 11, NULL, 1, NULL, '2022-10-31 08:02:47', '2022-10-31 08:02:47'),
(63, 2, 12, NULL, 1, NULL, '2022-10-31 08:02:49', '2022-10-31 08:02:49'),
(64, 2, 13, NULL, 1, NULL, '2022-10-31 08:02:51', '2022-10-31 08:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
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

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `user_id`, `title`, `subtitle`, `privacy`, `location`, `group_type`, `logo`, `banner`, `about`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 'English Learning & Speaking', 'It\'s time to learn', 'public', 'Virginia, USA', 'Education', '34003.jpg', '2900.jpg', 'If You Joined This Group, For Learning and Improving Your English. Then Don\'t Waste Your Time. Just Message Me Personally Your Watspa Number, With Country Code. For Joining Our New Advanced One Month\r\n\r\n\r\nIf You Are Willing To Get Traffic Through This Group. At Your Website, YouTube Channel, Fb Page, Fb Group or At Any Another Site. First You Must Talk With Me Personally, To Upload Your This Type Of Co\r\n\r\n\r\nYou Think Your Post Or Comment Is not Against Our Group Rules, And It Has Been Deleted By Group Team. Then You May Discuss With Me About It Personally . Group Admin Prince Aliyan\r\n\r\n\r\nThis Group Is Only Created For Learning and Speaking English. So Please Avoid This Type Of Post in This Group. Message Me Your Watspa Number. For Further Discussion Group Admin Prince Aliyan\r\n\r\n\r\nWe\'re all in this together to create a Welcoming environment. Let\'s treat everyone with respect. Healthy debates are natural, but kindness is required.\r\n\r\n\r\nMake sure everyone feels safe. Bullying of any kind isn\'t allowed, and degrading comments about things like race, religion, culture, sexual orientation, gender or identity will not be tolerated.\r\n\r\n\r\nGive more than you take in this group. Self-promotion, spam and irrelevant links aren\'t allowed.', '1', '2022-09-13 23:56:57', '2022-10-17 04:15:43'),
(2, '2', 'History of the World', NULL, 'public', NULL, NULL, '13197.jpg', '13049.jpg', 'This is a place to learn about, discuss and just simply enjoy everything that is history. Come on in!\r\nMembers who post anything regarding making money at home, bitcoins, or anything else on par with that will be immediately removed and permanently blocked. Its not worth your time.', '1', '2022-09-18 04:40:26', '2022-10-05 00:24:20'),
(6, '2', 'Wedding Photography by Ross Taylor', 'Public group', 'public', 'Melbourne, Australia', NULL, '30791.jpg', '345.jpg', 'For lovers of Ancient (and occasionally medieval) History and Civilizations.', '1', '2022-09-18 04:42:37', '2022-10-03 02:36:20'),
(7, '4', 'Foods dine', 'Food', 'public', 'Melbourne, Australia', 'Restaurants', '31161.jpg', '21128.jpg', 'If you are a food lover then join with us in facebook and subscribe our channel \" Foods Dine \"\r\nyou can also write a review post any type of food in thia group. See less', '1', '2022-09-18 23:07:15', '2022-10-17 04:00:32'),
(8, '4', 'Beauty Of USA', 'Vlog', 'public', 'Virginia, USA', 'Travel', '5743.jpg', '242.jpg', 'Highlight America\'s beautiful places photograph, videograph & travelling help guide. I love My Beautiful USA', '1', '2022-09-18 23:12:46', '2022-10-17 03:59:23'),
(10, '4', 'Traveller\'s Paradise', 'travel', 'public', NULL, 'Travel Blog', '19083.jpg', '23353.jpg', 'Thinking of everyone in Australia, we are opening a travel group! I am here to make it easier for all of us to travel and also to give tours at a low cost and to explore the country and abroad.', '1', '2022-09-18 23:20:44', '2022-10-17 04:04:08'),
(12, '4', 'Lam\'s Photography', 'world', 'public', NULL, NULL, '19402.jpg', '27878.jpg', 'Click a soft hand\r\nLam\'s Photography wish to Play an Essential part in this special day of yours .We are not only went to be your photographer but a friend\'s they you can trust to capture nice moments of yours .', '1', '2022-09-19 01:00:03', '2022-09-19 02:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

DROP TABLE IF EXISTS `group_members`;
CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `is_accepted` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `user_id`, `group_id`, `is_accepted`, `role`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '1', 'general', '2022-09-14 06:09:09', '2022-09-14 06:09:09'),
(3, 3, 2, '1', 'general', '2022-09-19 04:58:52', '2022-09-19 04:58:52'),
(4, 3, 1, '1', 'general', '2022-09-19 04:58:53', '2022-09-19 04:58:53'),
(6, 3, 8, '1', 'general', '2022-09-19 05:13:27', '2022-09-19 05:13:27'),
(7, 3, 10, '1', 'general', '2022-09-19 05:21:27', '2022-09-19 05:21:27'),
(8, 2, 2, '1', 'general', '2022-09-19 05:56:31', '2022-09-19 05:56:31'),
(11, 2, 8, '1', 'general', '2022-09-19 05:56:33', '2022-09-19 05:56:33'),
(12, 2, 10, '1', 'general', '2022-09-19 05:56:33', '2022-09-19 05:56:33'),
(14, 4, 10, '1', 'general', '2022-09-19 07:00:22', '2022-09-19 07:00:22'),
(15, 4, 8, '1', 'general', '2022-09-19 07:00:25', '2022-09-19 07:00:25'),
(18, 4, 2, '1', 'general', '2022-09-19 07:00:27', '2022-09-19 07:00:27'),
(19, 4, 1, '1', 'general', '2022-09-19 07:00:28', '2022-09-19 07:00:28'),
(23, 5, 10, '1', 'general', '2022-09-20 04:35:34', '2022-09-20 04:35:34'),
(24, 5, 8, '1', 'general', '2022-09-20 04:35:34', '2022-09-20 04:35:34'),
(26, 5, 2, '1', 'general', '2022-09-20 04:35:36', '2022-09-20 04:35:36'),
(27, 5, 1, '1', 'general', '2022-09-20 04:35:37', '2022-09-20 04:35:37'),
(37, 6, 6, '1', 'general', '2022-10-16 11:52:34', '2022-10-16 11:52:34'),
(39, 3, 6, '1', 'general', '2022-10-17 12:02:19', '2022-10-17 12:02:19'),
(41, 2, 6, '1', 'general', '2022-10-17 12:05:26', '2022-10-17 12:05:26'),
(42, 2, 7, '1', 'general', '2022-10-19 10:35:44', '2022-10-19 10:35:44'),
(43, 2, 12, '1', 'general', '2022-10-27 12:04:27', '2022-10-27 12:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `invites`
--

DROP TABLE IF EXISTS `invites`;
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

--
-- Dumping data for table `invites`
--

INSERT INTO `invites` (`id`, `invite_sender_id`, `invite_reciver_id`, `is_accepted`, `event_id`, `page_id`, `group_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 0, NULL, NULL, 1, NULL, '2022-11-03 10:17:42', '2022-09-14 00:09:04'),
(2, 2, 4, 0, NULL, NULL, 10, NULL, '2022-11-03 10:17:42', '2022-09-19 03:13:15'),
(3, 2, 2, 0, NULL, NULL, 10, NULL, '2022-11-03 10:17:42', '2022-09-19 03:13:18'),
(4, 2, 4, 0, NULL, NULL, 10, NULL, '2022-11-03 10:17:42', '2022-09-19 03:13:22'),
(5, 2, 7, 0, 6, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-03 02:47:15'),
(6, 2, 6, 0, 6, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-03 02:47:16'),
(7, 2, 5, 1, 6, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-03 23:24:26'),
(8, 2, 4, 0, 6, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-03 02:47:22'),
(9, 2, 3, 0, 6, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-03 02:47:24'),
(10, 2, 11, 0, 6, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-03 02:47:27'),
(11, 2, 11, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-03 03:00:27'),
(12, 2, 10, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-03 03:00:40'),
(13, 2, 7, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-03 03:00:45'),
(14, 2, 6, 1, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-03 23:26:31'),
(15, 2, 7, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-03 03:00:56'),
(16, 2, 6, 1, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-03 23:26:31'),
(17, 2, 12, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-03 04:23:03'),
(18, 2, 12, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-03 04:23:03'),
(19, 2, 11, 0, 4, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-10 00:25:50'),
(20, 2, 3, 1, 4, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-16 00:56:33'),
(21, 2, 4, 1, 4, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-16 00:53:16'),
(22, 2, 4, 1, 4, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-16 00:53:16'),
(23, 2, 5, 1, 4, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-16 00:34:15'),
(24, 2, 6, 1, 4, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-16 00:55:16'),
(25, 2, 7, 1, 4, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-16 00:55:40'),
(26, 2, 3, 1, 5, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-17 00:59:40'),
(27, 2, 3, 0, 3, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-19 02:10:27'),
(28, 2, 7, 0, 3, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-19 02:10:30'),
(29, 2, 6, 0, 3, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-19 02:11:31'),
(30, 2, 9, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-20 01:34:02'),
(31, 2, 9, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-20 01:34:02'),
(32, 2, 8, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-20 01:34:02'),
(33, 2, 8, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-20 01:34:02'),
(34, 2, 9, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-20 01:34:02'),
(35, 2, 9, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-20 01:34:02'),
(36, 2, 8, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-20 01:34:02'),
(37, 2, 8, 0, NULL, NULL, 6, NULL, '2022-11-03 10:17:42', '2022-10-20 01:34:02'),
(38, 2, 7, 0, NULL, NULL, 1, NULL, '2022-11-03 10:17:42', '2022-10-24 01:13:00'),
(39, 2, 7, 0, 5, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-24 21:17:47'),
(40, 2, 6, 0, 5, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-24 21:17:50'),
(41, 4, 10, 0, 5, NULL, NULL, NULL, '2022-11-03 10:17:42', '2022-10-31 02:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phrase` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `translated` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `phrase`, `translated`) VALUES
(1, 'english', 'My Story', 'My Story'),
(2, 'english', 'Today\'s story', 'Today\'s story'),
(3, 'english', 'Create story', 'Create story'),
(4, 'english', 'What\'s on your mind John', 'What\'s on your mind John'),
(5, 'english', 'Create Post', 'Create Post'),
(6, 'english', 'Public', 'Public'),
(7, 'english', 'Only Me', 'Only Me'),
(8, 'english', 'Friends', 'Friends'),
(9, 'english', 'Tag People', 'Tag People'),
(10, 'english', 'Tagged', 'Tagged'),
(11, 'english', 'Search more peoples', 'Search more peoples'),
(12, 'english', 'What are you doing', 'What are you doing'),
(13, 'english', 'Activities', 'Activities'),
(14, 'english', 'How are you feeling', 'How are you feeling'),
(15, 'english', 'Feelings', 'Feelings'),
(16, 'english', 'Photo', 'Photo'),
(17, 'english', 'Video', 'Video'),
(18, 'english', 'Activity', 'Activity'),
(19, 'english', 'Location', 'Location'),
(20, 'english', 'Live Video', 'Live Video'),
(21, 'english', 'Publish', 'Publish'),
(22, 'english', 'More', 'More'),
(23, 'english', 'year', 'year'),
(24, 'english', 'month', 'month'),
(25, 'english', 'day', 'day'),
(26, 'english', 'ago', 'ago'),
(27, 'english', 'Delete Post', 'Delete Post'),
(28, 'english', 'Report Post', 'Report Post'),
(29, 'english', 'Preview', 'Preview'),
(30, 'english', 'Comments', 'Comments'),
(31, 'english', 'Share', 'Share'),
(32, 'english', 'Like', 'Like'),
(33, 'english', 'Share post', 'Share post'),
(34, 'english', 'Delete Comment', 'Delete Comment'),
(35, 'english', 'Sad', 'Sad'),
(36, 'english', 'Reply', 'Reply'),
(37, 'english', 'View more', 'View more'),
(38, 'english', 'is live now', 'is live now'),
(39, 'english', 'at', 'at'),
(40, 'english', 'Watch now', 'Watch now'),
(41, 'english', 'Hi', 'Hi'),
(42, 'english', 'Good Afternoon', 'Good Afternoon'),
(43, 'english', 'Create new story', 'Create new story'),
(44, 'english', 'Stories', 'Stories'),
(45, 'english', 'Confirmation', 'Confirmation'),
(46, 'english', 'Are you sure', 'Are you sure'),
(47, 'english', 'Cancel', 'Cancel'),
(48, 'english', 'Continue', 'Continue'),
(49, 'english', 'Processing', 'Processing'),
(50, 'english', 'Please wait', 'Please wait'),
(51, 'english', 'Page Disliked ', 'Page Disliked '),
(52, 'english', 'Create Page', 'Create Page'),
(53, 'english', '____ photos', '____ photos'),
(54, 'english', 'Love', 'Love'),
(55, 'english', 'Going', 'Going'),
(56, 'english', 'Interested', 'Interested'),
(57, 'english', 'NotInterested', 'NotInterested'),
(58, 'english', 'Share Event', 'Share Event'),
(59, 'english', 'Page Liked Successfully', 'Page Liked Successfully'),
(60, 'english', 'Edit Event', 'Edit Event'),
(61, 'english', 'Delete Event', 'Delete Event'),
(62, 'english', 'Not Interested', 'Not Interested'),
(63, 'english', 'All Going And Interested User', 'All Going And Interested User'),
(64, 'english', 'View All', 'View All'),
(65, 'english', 'Create Event', 'Create Event'),
(66, 'english', 'Create Product', 'Create Product'),
(67, 'english', 'Good Evening', 'Good Evening'),
(68, 'english', 'Share Product', 'Share Product'),
(69, 'english', ' Create New Group', ' Create New Group'),
(70, 'english', 'Group Joind  Successfully', 'Group Joind  Successfully'),
(71, 'english', 'Timeline', 'Timeline'),
(72, 'english', 'Intro', 'Intro'),
(73, 'english', 'Save Bio', 'Save Bio'),
(74, 'english', 'Info', 'Info'),
(75, 'english', 'Stadied at', 'Stadied at'),
(76, 'english', 'From', 'From'),
(77, 'english', 'male', 'male'),
(78, 'english', 'Joined', 'Joined'),
(79, 'english', 'Good Morning', 'Good Morning'),
(80, 'english', 'Create Photo / Video Story', 'Create Photo / Video Story'),
(81, 'english', 'Create a Text Story', 'Create a Text Story'),
(82, 'english', 'Share to story', 'Share to story'),
(83, 'english', 'Discard', 'Discard'),
(84, 'english', 'Update your cover photo', 'Update your cover photo'),
(85, 'english', 'Edit Cover Photo', 'Edit Cover Photo'),
(86, 'english', 'Edit your profile', 'Edit your profile'),
(87, 'english', 'Edit Profile', 'Edit Profile'),
(88, 'english', 'Edit Bio', 'Edit Bio'),
(89, 'english', 'female', 'female'),
(90, 'english', 'Edit info', 'Edit info'),
(91, 'english', 'See More', 'See More'),
(92, 'english', 'See All', 'See All'),
(93, 'english', 'My Friends', 'My Friends'),
(94, 'english', 'Friend Requests', 'Friend Requests'),
(95, 'english', 'Mutual Friends', 'Mutual Friends'),
(96, 'english', 'Unfriend', 'Unfriend'),
(97, 'english', 'Edit Page', 'Edit Page'),
(98, 'english', 'Update Page Info', 'Update Page Info'),
(99, 'english', 'Marked As Read', 'Marked As Read'),
(100, 'english', 'Just now', 'Just now'),
(101, 'english', 'Cover Photo', 'Cover Photo'),
(102, 'english', 'Upload', 'Upload'),
(103, 'english', 'Cover Photo Updated Successfully', 'Cover Photo Updated Successfully'),
(104, 'english', 'Page Updated Successfully', 'Page Updated Successfully'),
(105, 'english', 'Profile Picture', 'Profile Picture'),
(106, 'english', 'Name', 'Name'),
(107, 'english', 'Enter your name', 'Enter your name'),
(108, 'english', 'Nickname', 'Nickname'),
(109, 'english', 'Enter your nickname name', 'Enter your nickname name'),
(110, 'english', 'Marital status', 'Marital status'),
(111, 'english', 'Enter your marital status', 'Enter your marital status'),
(112, 'english', 'Phone', 'Phone'),
(113, 'english', 'Enter your phone number', 'Enter your phone number'),
(114, 'english', 'Date of birth', 'Date of birth'),
(115, 'english', 'Your date of birth', 'Your date of birth'),
(116, 'english', 'Update Profile', 'Update Profile'),
(117, 'english', 'Invite Done', 'Invite Done'),
(118, 'english', 'Event Invitation Accepted', 'Event Invitation Accepted'),
(119, 'english', 'Add Photo To Album', 'Add Photo To Album'),
(120, 'english', 'Your Photos', 'Your Photos'),
(121, 'english', 'Album', 'Album'),
(122, 'english', 'Create Album', 'Create Album'),
(123, 'english', 'Album Images', 'Album Images'),
(124, 'english', 'Create', 'Create'),
(125, 'english', 'Create Video & Shorts ', 'Create Video & Shorts '),
(126, 'english', 'Videos', 'Videos'),
(127, 'english', 'Shorts', 'Shorts'),
(128, 'english', 'Save Video', 'Save Video'),
(129, 'english', 'Delete Video', 'Delete Video'),
(130, 'english', 'City view', 'City view'),
(131, 'english', 'London', 'London'),
(132, 'english', 'The Sky', 'The Sky'),
(133, 'english', 'Album title', 'Album title'),
(134, 'english', 'Album subtitle', 'Album subtitle'),
(135, 'english', 'Thumbnail', 'Thumbnail'),
(136, 'english', 'Posted On My Timeline Successfully', 'Posted On My Timeline Successfully'),
(137, 'english', 'Video/Shorts Created Successfully', 'Video/Shorts Created Successfully'),
(138, 'english', 'Mighty Singapore', 'Mighty Singapore'),
(139, 'english', 'Sunset at beach', 'Sunset at beach'),
(140, 'english', 'Video Deleted Successfully', 'Video Deleted Successfully'),
(141, 'english', 'Your videos', 'Your videos'),
(142, 'english', 'Your bio updated', 'Your bio updated'),
(143, 'english', 'View from my hotel room', 'View from my hotel room'),
(144, 'english', 'My loving family', 'My loving family'),
(145, 'english', 'Job', 'Job'),
(146, 'english', 'Studied', 'Studied'),
(147, 'english', 'Address', 'Address'),
(148, 'english', 'Gender', 'Gender'),
(149, 'english', 'Save', 'Save'),
(150, 'english', 'Sailing to infinity', 'Sailing to infinity'),
(151, 'english', 'At Moren Lake', 'At Moren Lake'),
(152, 'english', 'Profile info updated', 'Profile info updated'),
(153, 'english', 'Good time with friends', 'Good time with friends'),
(154, 'english', 'Relax time', 'Relax time'),
(155, 'english', 'My brother\'s family', 'My brother\'s family'),
(156, 'english', 'Turkey', 'Turkey'),
(157, 'english', 'Edit Group', 'Edit Group'),
(158, 'english', 'Group Updated Successfully', 'Group Updated Successfully'),
(159, 'english', 'Your post has been published', 'Your post has been published'),
(160, 'english', 'Login', 'Login'),
(161, 'english', 'Sign up', 'Sign up'),
(162, 'english', 'Email', 'Email'),
(163, 'english', 'Password', 'Password'),
(164, 'english', 'Remember me', 'Remember me'),
(165, 'english', 'Forgot your password?', 'Forgot your password?'),
(166, 'english', '1', '1'),
(167, 'english', 'My Profile', 'My Profile'),
(168, 'english', 'Go To Admin Panel', 'Go To Admin Panel'),
(169, 'english', 'Change Password', 'Change Password'),
(170, 'english', 'Log Out', 'Log Out'),
(171, 'english', 'Profile', 'Profile'),
(172, 'english', 'Group', 'Group'),
(173, 'english', 'Page', 'Page'),
(174, 'english', 'Marketplace', 'Marketplace'),
(175, 'english', 'Video and Shorts', 'Video and Shorts'),
(176, 'english', 'Event', 'Event'),
(177, 'english', 'Blog', 'Blog'),
(178, 'english', 'About', 'About'),
(179, 'english', 'Contact Us', 'Contact Us'),
(180, 'english', 'Privacy Policy', 'Privacy Policy'),
(181, 'english', 'What\'s on your mind', 'What\'s on your mind'),
(182, 'english', 'Suggestions', 'Suggestions'),
(183, 'english', 'Search for location', 'Search for location'),
(184, 'english', 'Determine your location', 'Determine your location'),
(185, 'english', 'Sponsored', 'Sponsored'),
(186, 'english', 'Contacts', 'Contacts'),
(187, 'english', 'Loading...', 'Loading...'),
(188, 'english', 'Copy Link', 'Copy Link'),
(189, 'english', 'Report', 'Report'),
(190, 'english', 'LIVE', 'LIVE'),
(191, 'english', 'Follow', 'Follow'),
(192, 'english', 'Chats', 'Chats'),
(193, 'english', 'View Profile', 'View Profile'),
(194, 'english', 'Remove', 'Remove'),
(195, 'english', 'Reset', 'Reset'),
(196, 'english', 'Watch', 'Watch'),
(197, 'english', 'Notifications', 'Notifications'),
(198, 'english', 'New', 'New'),
(199, 'english', 'accepted\n                                            Your Event Invitation Request', 'accepted\n                                            Your Event Invitation Request'),
(200, 'english', 'Mark As Read', 'Mark As Read'),
(201, 'english', 'sent you Friend Request', 'sent you Friend Request'),
(202, 'english', 'accepted\n                                            Your Group Invitation Request', 'accepted\n                                            Your Group Invitation Request'),
(203, 'english', 'accepted\n                                            Your Friend Request', 'accepted\n                                            Your Friend Request'),
(204, 'english', 'Reset password', 'Reset password'),
(205, 'english', 'Current Password', 'Current Password'),
(206, 'english', '8 Symbols at least', '8 Symbols at least'),
(207, 'english', 'New Password', 'New Password'),
(208, 'english', 'Confirm Password', 'Confirm Password'),
(209, 'english', 'Update Password', 'Update Password'),
(210, 'english', 'Full Name', 'Full Name'),
(211, 'english', 'I accept the', 'I accept the'),
(212, 'english', 'Terms and Conditions', 'Terms and Conditions'),
(213, 'english', 'All Groups', 'All Groups'),
(214, 'english', 'Member', 'Member'),
(215, 'english', 'Join', 'Join'),
(216, 'english', 'Groups', 'Groups'),
(217, 'english', 'Group you Manage', 'Group you Manage'),
(218, 'english', 'Group you Joined', 'Group you Joined'),
(219, 'english', 'Previous', 'Previous'),
(220, 'english', 'Next', 'Next'),
(221, 'english', 'Listed', 'Listed'),
(222, 'english', 'Published By', 'Published By'),
(223, 'english', 'Details', 'Details'),
(224, 'english', 'Condition', 'Condition'),
(225, 'english', 'Status', 'Status'),
(226, 'english', 'Category', 'Category'),
(227, 'english', 'Brand', 'Brand'),
(228, 'english', 'Description', 'Description'),
(229, 'english', 'Admin', 'Admin'),
(230, 'english', 'Pages', 'Pages'),
(231, 'english', 'My Pages', 'My Pages'),
(232, 'english', 'Suggested Pages', 'Suggested Pages'),
(233, 'english', 'Liked Pages', 'Liked Pages'),
(234, 'english', 'People like this', 'People like this'),
(235, 'english', '____ likes', '____ likes'),
(236, 'english', 'Discussion', 'Discussion'),
(237, 'english', 'People', 'People'),
(238, 'english', 'Events', 'Events'),
(239, 'english', 'Media', 'Media'),
(240, 'english', 'Invite', 'Invite'),
(241, 'english', 'Recent Media', 'Recent Media'),
(242, 'english', 'Recent Members', 'Recent Members'),
(243, 'english', 'Invite Group', 'Invite Group'),
(244, 'english', 'Invite Friends', 'Invite Friends'),
(245, 'english', 'Optional', 'Optional'),
(246, 'english', 'Suggestion', 'Suggestion'),
(247, 'english', 'Unfollow', 'Unfollow'),
(248, 'english', 'like this', 'like this'),
(249, 'english', 'Posts', 'Posts'),
(250, 'english', 'Page you may like', 'Page you may like'),
(251, 'english', 'Photo/Video', 'Photo/Video'),
(252, 'english', 'close', 'close'),
(253, 'english', 'Dashboard', 'Dashboard'),
(254, 'english', 'Create Category', 'Create Category'),
(255, 'english', 'Sponsored Post', 'Sponsored Post'),
(256, 'english', 'Ads', 'Ads'),
(257, 'english', 'Create Ad', 'Create Ad'),
(258, 'english', 'Reported Post', 'Reported Post'),
(259, 'english', 'List', 'List'),
(260, 'english', 'Settings', 'Settings'),
(261, 'english', 'System Setting', 'System Setting'),
(262, 'english', 'Custom Pages', 'Custom Pages'),
(263, 'english', 'SMTP Setting', 'SMTP Setting'),
(264, 'english', 'Visit Website', 'Visit Website'),
(265, 'english', 'My Account', 'My Account'),
(266, 'english', 'By ____', 'By ____'),
(267, 'english', 'All Product Brand ', 'All Product Brand '),
(268, 'english', 'Sl No', 'Sl No'),
(269, 'english', 'Brand Name', 'Brand Name'),
(270, 'english', 'DATE', 'DATE'),
(271, 'english', 'Action', 'Action'),
(272, 'english', 'Get Password Reset Link', 'Get Password Reset Link'),
(273, 'english', 'Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.', 'Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.'),
(274, 'english', 'Email Password Reset Link', 'Email Password Reset Link'),
(275, 'english', 'Back', 'Back'),
(276, 'english', 'My Products', 'My Products'),
(277, 'english', 'Saved', 'Saved'),
(278, 'english', 'Filters', 'Filters'),
(279, 'english', 'Used', 'Used'),
(280, 'english', 'Select Brand', 'Select Brand'),
(281, 'english', 'Your Event', 'Your Event'),
(282, 'english', 'Blogs', 'Blogs'),
(283, 'english', 'Discover new articles', 'Discover new articles'),
(284, 'english', 'Create Blog', 'Create Blog'),
(285, 'english', 'My articles', 'My articles'),
(286, 'english', 'Search Results', 'Search Results'),
(287, 'english', 'All', 'All'),
(288, 'english', 'Peoples', 'Peoples'),
(289, 'english', 'System Settings', 'System Settings'),
(290, 'english', 'System Name', 'System Name'),
(291, 'english', 'System Title', 'System Title'),
(292, 'english', 'System Email', 'System Email'),
(293, 'english', 'System Phone', 'System Phone'),
(294, 'english', 'System Fax', 'System Fax'),
(295, 'english', 'Footer', 'Footer'),
(296, 'english', 'Footer Link', 'Footer Link'),
(297, 'english', 'Update', 'Update'),
(298, 'english', 'Product Update', 'Product Update'),
(299, 'english', 'SYSTEM LOGO', 'SYSTEM LOGO'),
(300, 'english', 'Dark logo', 'Dark logo'),
(301, 'english', 'Light logo', 'Light logo'),
(302, 'english', 'Favicon', 'Favicon'),
(303, 'english', 'Update Logo', 'Update Logo'),
(304, 'english', 'All Page Categories', 'All Page Categories'),
(305, 'english', 'Category Name', 'Category Name'),
(306, 'english', 'All Blog Categories', 'All Blog Categories'),
(307, 'english', 'Are You Sure Want To Delete', 'Are You Sure Want To Delete'),
(308, 'english', 'Edit Blog Category', 'Edit Blog Category'),
(309, 'english', 'View', 'View'),
(310, 'english', 'Blog Category', 'Blog Category'),
(311, 'english', 'Submit', 'Submit'),
(312, 'english', 'Friend', 'Friend'),
(313, 'english', 'Message', 'Message'),
(314, 'english', 'Profile updated successfully', 'Profile updated successfully'),
(315, 'english', 'Post Deleted Successfully', 'Post Deleted Successfully'),
(316, 'english', 'Related Product', 'Related Product'),
(317, 'english', 'in', 'in'),
(318, 'english', 'visits', 'visits'),
(319, 'english', 'Share the post on', 'Share the post on'),
(320, 'english', 'My Timeline', 'My Timeline'),
(321, 'english', 'Send in Message', 'Send in Message'),
(322, 'english', 'Share to a Group', 'Share to a Group'),
(323, 'english', 'Send', 'Send'),
(324, 'english', 'Share On Group', 'Share On Group'),
(325, 'english', 'Reason of Report', 'Reason of Report'),
(326, 'english', 'Add Photo/Album', 'Add Photo/Album'),
(327, 'english', 'Download', 'Download'),
(328, 'english', 'Delete Photo', 'Delete Photo'),
(329, 'english', 'Deleted', 'Deleted'),
(330, 'english', 'Group Joining Canceled', 'Group Joining Canceled'),
(331, 'english', 'Members', 'Members'),
(332, 'english', 'All  people and  who join this group will appear here', 'All  people and  who join this group will appear here'),
(333, 'english', 'Leave Group', 'Leave Group'),
(334, 'english', 'Albums', 'Albums'),
(335, 'english', 'New people and Pages who join this group will appear here', 'New people and Pages who join this group will appear here'),
(336, 'english', 'Members With Things in Common', 'Members With Things in Common'),
(337, 'english', 'Add Friend', 'Add Friend'),
(338, 'english', 'No upcoming events', 'No upcoming events'),
(339, 'english', 'Post Events', 'Post Events'),
(340, 'english', 'Created by', 'Created by'),
(341, 'english', 'Guests', 'Guests'),
(342, 'english', 'Go With Friends', 'Go With Friends'),
(343, 'english', 'Invited', 'Invited'),
(344, 'english', 'Popular Events', 'Popular Events'),
(345, 'english', 'Selected users', 'Selected users'),
(346, 'english', 'Invite Event', 'Invite Event'),
(347, 'english', 'Select Album', 'Select Album'),
(348, 'english', 'Page Name', 'Page Name'),
(349, 'english', 'Page Category', 'Page Category'),
(350, 'english', 'Select Category', 'Select Category'),
(351, 'english', 'Page BIO', 'Page BIO'),
(352, 'english', 'Profile Photo', 'Profile Photo'),
(353, 'english', 'Lifestyle', 'Lifestyle'),
(354, 'english', 'Update Info', 'Update Info'),
(355, 'english', 'Previous Profile Photo', 'Previous Profile Photo'),
(356, 'english', 'Update Profile Photo', 'Update Profile Photo'),
(357, 'english', 'Title', 'Title'),
(358, 'english', 'Currency', 'Currency'),
(359, 'english', 'Select Currency', 'Select Currency'),
(360, 'english', 'Price', 'Price'),
(361, 'english', 'Select Condition', 'Select Condition'),
(362, 'english', 'Select Status', 'Select Status'),
(363, 'english', 'In Stock', 'In Stock'),
(364, 'english', 'Out Of Stock', 'Out Of Stock'),
(365, 'english', 'Product Image', 'Product Image'),
(366, 'english', 'Edit Product', 'Edit Product'),
(367, 'english', 'Unsaved Successfully ', 'Unsaved Successfully '),
(368, 'english', 'Saved Successfully ', 'Saved Successfully '),
(369, 'english', 'Private', 'Private'),
(370, 'english', 'Video/Shorts', 'Video/Shorts'),
(371, 'english', 'Interested to Event', 'Interested to Event'),
(372, 'english', 'Event Name', 'Event Name'),
(373, 'english', 'Event Date', 'Event Date'),
(374, 'english', 'Event Time', 'Event Time'),
(375, 'english', 'Event Description', 'Event Description'),
(376, 'english', 'All Product Categories', 'All Product Categories'),
(377, 'english', 'likes', 'likes'),
(378, 'english', 'Liked', 'Liked'),
(379, 'english', 'Views', 'Views'),
(380, 'english', 'More Events', 'More Events'),
(381, 'english', 'All Sponsors', 'All Sponsors'),
(382, 'english', 'Sponsor Title', 'Sponsor Title'),
(383, 'english', 'Image', 'Image'),
(384, 'english', 'Edit Sponsor Post', 'Edit Sponsor Post'),
(385, 'english', 'Previous Uploaded File', 'Previous Uploaded File'),
(386, 'english', 'URL', 'URL'),
(387, 'english', '(50 Character Show In Front End)', '(50 Character Show In Front End)'),
(388, 'english', 'Add Sponsors Post', 'Add Sponsors Post'),
(389, 'english', 'All Reported Post List', 'All Reported Post List'),
(390, 'english', 'Report Reason', 'Report Reason'),
(391, 'english', 'Reported By', 'Reported By'),
(392, 'english', 'Update Custom Pages Information', 'Update Custom Pages Information'),
(393, 'english', 'About Page Description', 'About Page Description'),
(394, 'english', 'Privacy Page Description', 'Privacy Page Description'),
(395, 'english', 'Term and Condition Page Description', 'Term and Condition Page Description'),
(396, 'english', 'Update SMTP Information', 'Update SMTP Information'),
(397, 'english', 'Protocol', 'Protocol'),
(398, 'english', 'Smtp crypto', 'Smtp crypto'),
(399, 'english', 'Smtp host', 'Smtp host'),
(400, 'english', 'Smtp port', 'Smtp port'),
(401, 'english', 'Smtp username', 'Smtp username'),
(402, 'english', 'Smtp password', 'Smtp password'),
(403, 'english', 'Not found', 'Not found'),
(404, 'english', 'About this application', 'About this application'),
(405, 'english', 'Software version', 'Software version'),
(406, 'english', 'Check update', 'Check update'),
(407, 'english', 'PHP version', 'PHP version'),
(408, 'english', 'Curl enable', 'Curl enable'),
(409, 'english', 'Enabled', 'Enabled'),
(410, 'english', 'Purchase code', 'Purchase code'),
(411, 'english', 'Product license', 'Product license'),
(412, 'english', 'invalid', 'invalid'),
(413, 'english', 'Enter valid purchase code', 'Enter valid purchase code'),
(414, 'english', 'Customer support status', 'Customer support status'),
(415, 'english', 'Support expiry date', 'Support expiry date'),
(416, 'english', 'Customer name', 'Customer name'),
(417, 'english', 'Get customer support', 'Get customer support'),
(418, 'english', 'Customer support', 'Customer support'),
(419, 'english', 'Enter your purchase code', 'Enter your purchase code'),
(420, 'english', 'Invalid purchase code', 'Invalid purchase code'),
(421, 'english', 'join Group First', 'join Group First'),
(422, 'english', 'Previous Uploaded Image', 'Previous Uploaded Image'),
(423, 'english', 'Marketplace Product Updated Successfully', 'Marketplace Product Updated Successfully'),
(424, 'english', 'invited you to like', 'invited you to like'),
(425, 'english', 'Accept', 'Accept'),
(426, 'english', 'Decline', 'Decline'),
(427, 'english', 'Active users', 'Active users'),
(428, 'english', 'This content isn\'t available right now', 'This content isn\'t available right now'),
(429, 'english', 'When this happens, it\'s usually because the owner only shared it with a small group of people, changed who can see it or it\'s been deleted.', 'When this happens, it\'s usually because the owner only shared it with a small group of people, changed who can see it or it\'s been deleted.'),
(430, 'english', '404 page not found', '404 page not found'),
(431, 'english', 'This page is not available, please provide a valid URL', 'This page is not available, please provide a valid URL'),
(432, 'english', 'Users', 'Users'),
(433, 'english', 'Total Users', 'Total Users'),
(434, 'english', 'Post', 'Post'),
(435, 'english', 'Total Posts', 'Total Posts'),
(436, 'english', 'Total Pages', 'Total Pages'),
(437, 'english', 'Total Blogs', 'Total Blogs'),
(438, 'english', 'Ad', 'Ad'),
(439, 'english', 'Total Sponsored Posts', 'Total Sponsored Posts'),
(440, 'english', 'Marketplace Products', 'Marketplace Products'),
(441, 'english', 'Total Products', 'Total Products'),
(442, 'english', 'All Product Category', 'All Product Category'),
(443, 'english', 'Product Category', 'Product Category'),
(444, 'english', 'My Article', 'My Article'),
(445, 'english', 'Create articles', 'Create articles'),
(446, 'english', 'Edit Article', 'Edit Article'),
(447, 'english', 'Delete Article', 'Delete Article'),
(448, 'english', 'Recent Post', 'Recent Post'),
(449, 'english', 'Tag', 'Tag'),
(450, 'english', 'View Album', 'View Album'),
(451, 'english', 'Items', 'Items'),
(452, 'english', 'Your images is added to album', 'Your images is added to album'),
(453, 'english', 'Unsave', 'Unsave'),
(454, 'english', 'Group Title', 'Group Title'),
(455, 'english', 'Group Sub Title', 'Group Sub Title'),
(456, 'english', 'Active', 'Active'),
(457, 'english', 'Deactive', 'Deactive'),
(458, 'english', 'Create Group', 'Create Group'),
(459, 'english', 'Enter your group title', 'Enter your group title'),
(460, 'english', 'Enter your group sub title', 'Enter your group sub title'),
(461, 'english', 'Group Location', 'Group Location'),
(462, 'english', 'Enter your group location', 'Enter your group location'),
(463, 'english', 'Group Type', 'Group Type'),
(464, 'english', 'Enter your group type', 'Enter your group type'),
(465, 'english', 'Privacy', 'Privacy'),
(466, 'english', 'Group Invited Done Successfully', 'Group Invited Done Successfully'),
(467, 'english', 'Group Invited Done Successfully', 'Group Invited Done Successfully'),
(468, 'english', 'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.', 'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.'),
(469, 'english', 'Resend Verification Email', 'Resend Verification Email'),
(470, 'english', 'A new verification link has been sent to the email address you provided during registration.', 'A new verification link has been sent to the email address you provided during registration.'),
(471, 'english', 'Tags', 'Tags'),
(472, 'english', 'Update Post', 'Update Post'),
(473, 'english', 'Blog Updated Successfully', 'Blog Updated Successfully'),
(474, 'english', 'Create New Article', 'Create New Article'),
(475, 'english', 'Blog Deleted Successfully', 'Blog Deleted Successfully'),
(476, 'english', 'Going to Event', 'Going to Event'),
(477, 'english', 'Comment Deleted Successfully', 'Comment Deleted Successfully'),
(478, 'english', 'Not Interested to Event', 'Not Interested to Event'),
(479, 'english', 'Update Event', 'Update Event'),
(480, 'english', 'Cancle Friend Request', 'Cancle Friend Request'),
(481, 'english', '4', '4'),
(482, 'english', 'Event Updated Successfully', 'Event Updated Successfully'),
(483, 'english', '5', '5'),
(484, 'english', 'Event Created Successfully', 'Event Created Successfully'),
(485, 'english', 'Event Deleted Successfully', 'Event Deleted Successfully'),
(486, 'english', 'Active now', 'Active now'),
(487, 'english', '3', '3'),
(488, 'english', 'Product Brand Edit', 'Product Brand Edit'),
(489, 'english', 'Product Brand', 'Product Brand'),
(490, 'english', 'Click to browse', 'Click to browse'),
(491, 'english', 'Uploading', 'Uploading'),
(492, 'english', 'Delete Album', 'Delete Album'),
(493, 'english', 'Watch video', 'Watch video'),
(494, 'english', '2', '2'),
(495, 'english', 'Album deleted successfully', 'Album deleted successfully'),
(496, 'english', 'Removed from friend list', 'Removed from friend list'),
(497, 'english', 'Unsave Video', 'Unsave Video'),
(498, 'english', 'Enter your email address', 'Enter your email address'),
(499, 'english', 'Your password', 'Your password'),
(500, 'english', 'Friend Request Sent Successfully', 'Friend Request Sent Successfully'),
(501, 'english', 'Confirm', 'Confirm'),
(502, 'english', 'Accepted', 'Accepted'),
(503, 'english', 'Delete', 'Delete'),
(504, 'english', 'Angry', 'Angry'),
(505, 'english', 'My Event', 'My Event'),
(506, 'english', 'Send invitations', 'Send invitations'),
(507, 'english', 'You are now following', 'You are now following'),
(508, 'english', 'Categories', 'Categories'),
(509, 'english', 'Your full name', 'Your full name'),
(510, 'english', 'Post has been added to your timeline', 'Post has been added to your timeline'),
(511, 'english', 'Live class', 'Live class'),
(512, 'english', 'Page title', 'Page title'),
(513, 'english', 'Do you want to leave the live video', 'Do you want to leave the live video'),
(514, 'english', 'You can join them later if the video remains live', 'You can join them later if the video remains live'),
(515, 'english', 'Saved Product', 'Saved Product'),
(516, 'english', 'Update zoom api keys', 'Update zoom api keys'),
(517, 'english', 'API key', 'API key'),
(518, 'english', 'API secret', 'API secret'),
(519, 'english', 'Join now', 'Join now'),
(520, 'english', 'Verified', 'Verified'),
(521, 'english', 'Details info', 'Details info'),
(522, 'english', 'Phone Number', 'Phone Number'),
(523, 'english', 'Your name', 'Your name'),
(524, 'english', 'Profession', 'Profession'),
(525, 'english', 'Enter your Profession', 'Enter your Profession'),
(526, 'english', 'Birthday', 'Birthday'),
(527, 'english', 'Your address', 'Your address'),
(528, 'english', 'Save Changes', 'Save Changes'),
(529, 'english', 'was on live ____', 'was on live ____'),
(530, 'english', 'Live video is ended', 'Live video is ended'),
(531, 'english', 'Friend Request Accepted', 'Friend Request Accepted'),
(532, 'english', NULL, NULL),
(533, 'english', 'Cancle to Event Going', 'Cancle to Event Going'),
(534, 'english', 'Removed from followed list', 'Removed from followed list');

-- --------------------------------------------------------

--
-- Table structure for table `live_streamings`
--

DROP TABLE IF EXISTS `live_streamings`;
CREATE TABLE `live_streamings` (
  `streaming_id` int(11) NOT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `live_streamings`
--

INSERT INTO `live_streamings` (`streaming_id`, `publisher`, `publisher_id`, `user_id`, `details`, `created_at`, `updated_at`) VALUES
(1, 'post', 191, 2, '{\"code\":124,\"message\":\"The Token\'s Signature resulted invalid when verified using the Algorithm: HmacSHA256\"}', '1664694540', '1664694540'),
(2, 'post', 275, 2, '{\"code\":124,\"message\":\"The Token\'s Signature resulted invalid when verified using the Algorithm: HmacSHA256\"}', '1667270531', '1667270531'),
(3, 'post', 276, 3, '{\"uuid\":\"i/mFt8/aQTKPCNh52cYF6A==\",\"id\":78940135324,\"host_id\":\"2Qv44S9iTLujjXczF8bj3w\",\"host_email\":\"ponkojr1998@gmail.com\",\"topic\":\"Live\",\"type\":2,\"status\":\"waiting\",\"start_time\":\"2022-11-02T07:54:16Z\",\"duration\":40,\"timezone\":\"Asia/Dhaka\",\"created_at\":\"2022-11-02T07:54:16Z\",\"start_url\":\"https://us04web.zoom.us/s/78940135324?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjJRdjQ0UzlpVEx1ampYY3pGOGJqM3ciLCJpc3MiOiJ3ZWIiLCJzayI6IjQxNjU0MjMwMjk4MTU3NzUyMDgiLCJzdHkiOjEwMCwid2NkIjoidXMwNCIsImNsdCI6MCwibW51bSI6Ijc4OTQwMTM1MzI0IiwiZXhwIjoxNjY3MzgyODU2LCJpYXQiOjE2NjczNzU2NTYsImFpZCI6IlJHNFhZVVEzUktxdThOZXRpbFE5VUEiLCJjaWQiOiIifQ.ghKokRX34BPguQTyJCdgJRWhY9oI-BFo3fcSvZ1RSDM\",\"join_url\":\"https://us04web.zoom.us/j/78940135324?pwd=auEm4EHgzyjPdz2vvptoBiagmzYRA6.1\",\"password\":\"iep89d\",\"h323_password\":\"234668\",\"pstn_password\":\"234668\",\"encrypted_password\":\"auEm4EHgzyjPdz2vvptoBiagmzYRA6.1\",\"settings\":{\"host_video\":true,\"participant_video\":true,\"cn_meeting\":false,\"in_meeting\":false,\"join_before_host\":false,\"jbh_time\":0,\"mute_upon_entry\":false,\"watermark\":false,\"use_pmi\":false,\"approval_type\":2,\"audio\":\"voip\",\"auto_recording\":\"none\",\"enforce_login\":false,\"enforce_login_domains\":\"\",\"alternative_hosts\":\"\",\"alternative_host_update_polls\":false,\"close_registration\":false,\"show_share_button\":false,\"allow_multiple_devices\":false,\"registrants_confirmation_email\":true,\"waiting_room\":false,\"request_permission_to_unmute_participants\":false,\"registrants_email_notification\":true,\"meeting_authentication\":false,\"encryption_type\":\"enhanced_encryption\",\"approved_or_denied_countries_or_regions\":{\"enable\":false},\"breakout_room\":{\"enable\":false},\"alternative_hosts_email_notification\":true,\"device_testing\":false,\"focus_mode\":false,\"enable_dedicated_group_chat\":false,\"private_meeting\":false,\"email_notification\":true,\"host_save_video_order\":false},\"pre_schedule\":false}', '1667375656', '1667375656');

-- --------------------------------------------------------

--
-- Table structure for table `marketplaces`
--

DROP TABLE IF EXISTS `marketplaces`;
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

--
-- Dumping data for table `marketplaces`
--

INSERT INTO `marketplaces` (`id`, `user_id`, `title`, `currency_id`, `price`, `location`, `category`, `status`, `condition`, `brand`, `description`, `image`, `created_at`, `updated_at`) VALUES
(10, 2, 'OnePlus 10 Pro', 2, '1200', 'San Diego,', '1', '1', 'new', '3', '<h1 class=\"product-title-text\" data-spm-anchor-id=\"a2g0o.detail.1000016.i2.55d24d41WlTxvo\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; font-size: 14px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 19px; width: fit-content; font-family: &quot;Open Sans&quot;, Roboto, Arial, Helvetica, sans-serif, SimSun;\"><font color=\"#000000\">OnePlus 10 Pro Snapdragon 8 Gen 1 5G Smartphone 6.7inch LTPO2 AMOLED 1440 x 3216 Pixels Support Wireless Charging 50W<br><br></font><p class=\"detail-desc-decorate-title\" align=\"start\" data-spm-anchor-id=\"a2g0o.detail.1000023.i0.55d24d41WlTxvo\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 12px; margin-left: 0px; font-size: 20px; line-height: 28px; padding: 0px; font-family: OpenSans; white-space: pre-wrap;\"><font color=\"#000000\">OnePlus 10 Pro 5G Smartphone</font></p><p class=\"detail-desc-decorate-content\" align=\"start\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 12px; margin-left: 0px; line-height: 20px; padding: 0px; font-family: OpenSans; white-space: pre-wrap;\"><font color=\"#000000\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\">Model--------OnePlus 10 Pro<br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\">Display-------</span></span><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-family: Arimo, Arial;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\">6.7\'\', 20.1:9, 1440 x 3216 pixels </span></span></span><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-family: Arimo, Arial;\">LTPO Fluid2 AMOLED, 1B colors, 120Hz</span></span><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\">OS------------OxygenOS based on Android 12<br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\">CPU-----------</span></span><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\">Snapdragon 8 Gen 1</span></span><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\">Storage-------8GB RAM+128GB ROM / 8GB RAM+256GB ROM / 12GB RAM+256GB ROM/ 12GB RAM+512GB ROM<br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\">Battery-------5000mAh,</span></span><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-family: tahoma, geneva, sans-serif;\">Fast charging 80W</span></span><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\">, Support 50W Wireless Charging<br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\">Rear Camera--48MP+50MP+8MP<br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\">Front Camera-32MP, <br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\">Features-------China Version Flash  Global rom</span></span></font></p><p class=\"detail-desc-decorate-content\" align=\"start\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 12px; margin-left: 0px; line-height: 20px; padding: 0px; font-family: OpenSans; white-space: pre-wrap;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><font color=\"#000000\">support </font></span></span><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><font color=\"#000000\">Google play</font></span></span><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><font color=\"#000000\">, Multi-languages and OTA update, Bluetooth 5.2, NFC<span style=\"-webkit-tap-highlight-color: transparent; outline-color: initial; outline-style: initial;\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></span>Connectivity-- Dual Nano SIM Card Slot<span style=\"-webkit-tap-highlight-color: transparent; outline-color: initial; outline-style: initial;\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></span></font></span></span></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span class=\"MtFg0 FwR7Pc\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 16px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><font color=\"#000000\">Network：</font></span></span></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><font color=\"#000000\">LTE-FDD：B1,2,3,4,5,7,8,12,17,18,19,20,26,28A</font></span></span></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><font color=\"#000000\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></font></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><font color=\"#000000\">LTE-TDD：B34,38,39,40,41</font></span></span></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><font color=\"#000000\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></font></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><font color=\"#000000\">MIMO：LTE：B1,B3,B38,B39,B40,B41</font></span></span></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><font color=\"#000000\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></font></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><font color=\"#000000\">NR：n1,n3,n40,n41,n78,n79</font></span></span></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><font color=\"#000000\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></font></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><font color=\"#000000\">WCDMA：B1,2,4,5,8,19</font></span></span></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><font color=\"#000000\">5G NSA：n1,n3,n5,n8,n40,n41,n78,n79</font></span></span></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><font color=\"#000000\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></font></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><font color=\"#000000\">5G SA：n1,n3,n5,n8,n28A,n40,n41,n78,n79</font></span></span></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><font color=\"#000000\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></font></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><font color=\"#000000\">CDMA：BC0</font></span></span></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><font color=\"#000000\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></font></p><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 12px; font-family: tahoma, geneva, sans-serif;\"><span data-spm-anchor-id=\"a2g0o.detail.1000023.i1.55d24d41WlTxvo\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"><font color=\"#000000\">GSM：B2, 3, 5, 8</font></span></span></p></h1>', 'NIej7OVDAQCnmdMFBuRLGXEYrJ8lgv631axKbytf.jpg', '2022-09-19 00:15:10', '2022-11-01 23:27:37'),
(11, 2, '2023 BMW 530i', 2, '63000', 'San Jose', '7', '1', 'new', '5', '<p><div class=\"category-container\" style=\"box-sizing: border-box; color: rgb(65, 65, 65); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"modelData\" style=\"box-sizing: border-box;\"></div></div></p><div class=\"category-container\" style=\"box-sizing: border-box; color: rgb(65, 65, 65); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"category-container--section-wrapper\" style=\"box-sizing: border-box; margin: 49px 0px 50px; display: flex;\"><div class=\"category-container--section-body\" style=\"box-sizing: border-box; width: 930px;\"><div class=\"category-repeat-container\" style=\"box-sizing: border-box;\"><div class=\"category-repeat-1\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 0px 0px 15px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">2.0-liter BMW TwinPower Turbo inline 4-cylinder, 16-valve 248-hp engine. Combines a twin-scroll turbocharger with variable valve control (Double-VANOS and Valvetronic) and high-precision direct injection</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Auto Start-Stop function</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Air Curtains and Air Breather system</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Active kidney grille</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Electronic throttle control</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Electronically controlled engine cooling (map cooling)</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Brake Energy Regeneration</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Driving Dynamics Control with ECO PRO, COMFORT and SPORT modes</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">8-speed Sport Automatic transmission with Sport and Manual shift modes, steering wheel-mounted paddle shifters and Launch Control</div></section></div></div></div></div></div></div></div><div class=\"modelData\" style=\"box-sizing: border-box;\"><div class=\"section-separator separator-light separator-12-12 separator-thin no-buffer\" style=\"box-sizing: border-box; width: 1236px; height: 1px; margin: auto; background-color: rgb(202, 202, 202); position: relative;\"></div></div><div class=\"category-container--section-wrapper\" style=\"box-sizing: border-box; margin: 50px 0px; display: flex;\"><div class=\"category-container--section-header\" style=\"box-sizing: border-box; margin: 0px 50px 0px 0px; min-width: 256px; width: 256px;\"><div class=\"text-header-container\" style=\"box-sizing: border-box;\"><div class=\"text-header height-s\" style=\"box-sizing: border-box; overflow: hidden;\"><div class=\"section-header theme--light dark-font no-buffer\r\n                no-mobile-padding nobg no-stretch padding-l\" style=\"box-sizing: border-box; margin: 0px; max-width: 1600px; text-align: center; position: relative; height: auto; background: rgba(255, 255, 255, 0); color: rgb(34, 31, 31);\"><div class=\"title-container v-center\" style=\"box-sizing: border-box; position: static; top: 50%; transform: none; width: 256px;\"><h4 class=\"section-header__copy h-left   headline-6--bold\" style=\"box-sizing: border-box; font-size: 20px; width: 256px; float: none; margin: 0px auto; letter-spacing: -0.1px; position: static; top: 50%; left: 50%; transform: none; font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-weight: 700; -webkit-font-smoothing: antialiased; line-height: 24px; text-align: left; padding: 0px; text-decoration: none;\">Handling, Ride and Braking</h4></div></div></div></div></div><div class=\"category-container--section-body\" style=\"box-sizing: border-box; width: 930px;\"><div class=\"category-repeat-container\" style=\"box-sizing: border-box;\"><div class=\"category-repeat-1\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 0px 0px 15px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Dynamic Stability Control (DSC), including Brake Fade Compensation, Start-off Assistant, Brake Drying, and Brake Stand-by features; with Dynamic Traction Control (DTC)</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Twin-tube gas-pressure shock absorbers</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Double-wishbone multi-link aluminum front suspension</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Integral-V multi-link aluminum rear suspension</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">4-wheel ventilated disc brakes with anti-lock braking system (ABS), composite front rotors and Dynamic Brake Control (DBC), brake-pad wear indicators and Cornering Brake Control (CBC)</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Electromechanical parking brake</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: 1px solid rgb(202, 202, 202);\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Electric power steering</div></section></div></div></div></div><div class=\"category-repeat-2\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"modelData\" style=\"box-sizing: border-box; padding: 15px 0px 0px; border-bottom: none;\"><div class=\"bodytext\" style=\"box-sizing: border-box; border-bottom: none;\"><div class=\"theme--light no-buffer h-left   noHPadding noVPadding\r\n      no-hide \" style=\"box-sizing: border-box; text-align: left; padding: 0px; border-bottom: none;\"><section class=\"wrap body-text__body\" style=\"box-sizing: border-box; width: 930px; max-width: 1600px; margin-left: auto; margin-right: auto; padding: 0px; border-bottom: none;\"><div class=\"body-text__copy body-copy text-content content-2 width-l\" style=\"box-sizing: border-box; display: inline-block; padding: 0px; width: 930px; color: rgb(34, 31, 31); font-family: BMWTypeNext, &quot;Helvetica Neue&quot;, -apple-system, &quot;system-ui&quot;, BlinkMacSystemFont, serif; font-size: 16px; font-weight: 400; line-height: 26px; letter-spacing: 0.00833333rem; border-bottom: none;\">Servotronic power-steering assist</div></section></div></div></div></div></div></div></div></div>', 'RS3lqhxB4yvHQc6Tp0wVgsJbi5krm8oIAd7LG2NY.jpg', '2022-09-19 00:17:50', '2022-11-01 23:55:42'),
(12, 4, 'Insta 360 Web cam', 2, '500', 'Los Angeles', '6', '0', 'new', '2', '<h1 class=\"product-title-text\" data-spm-anchor-id=\"a2g0o.detail.1000016.i3.70517b042BdalU\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; font-size: 14px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 19px; width: fit-content; color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;, Roboto, Arial, Helvetica, sans-serif, SimSun;\">Insta360 Link - 4K Webcam with 1/2\" Sensor, AI Tracking, Gesture Control, HDR, Noise-Canceling Microphones, Specialized Modes</h1>', 'CuxQt1n6mOBdKWpiEYz8ZMP9o7F3Alhv5UGgskfq.jpg', '2022-09-19 00:21:32', '2022-11-01 22:43:23'),
(13, 4, 'Sony A7III', 2, '1999', 'Chicago', '6', '1', 'new', '2', '<ul data-spm-anchor-id=\"a2g0o.detail.1000023.i0.faf57320jGgHDG\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: initial; list-style-image: initial; margin-block-start: 1em; color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;, Roboto, Arial, Helvetica, sans-serif, SimSun;\"><li data-spm-anchor-id=\"a2g0o.detail.1000023.i3.faf57320jGgHDG\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><h1 class=\"product-title-text\" data-spm-anchor-id=\"a2g0o.detail.1000016.i3.faf57320jGgHDG\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; font-size: 14px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 19px; width: fit-content; color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;, Roboto, Arial, Helvetica, sans-serif, SimSun;\">SONY A7 III A7M3 Full-Frame Mirrorless Interchangeable-Lens Camera Digital with 3-Inch LCD Body Only（brand-new)</h1><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; font-size: 14px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 19px; width: fit-content; color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;, Roboto, Arial, Helvetica, sans-serif, SimSun;\"><br></p><p data-spm-anchor-id=\"a2g0o.detail.1000023.i1.faf57320jGgHDG\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\">Advanced 24.2MP BSI full frame Image Sensor w/ 1.8X readout speed</p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\">15 stop dynamic range, 14 bit uncompressed RAW, ISO 50 to 204,800. Compatible with Sony E mount lenses. Can be connected via</p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\">Bluetooth with smartphones featuring (as of the date of release)- Android (Android 5.0 or later, Bluetooth 4.0 or later), iOS (Bluetooth</p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\">4.0 or later)</p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\">Up to 10fps silent or mechanical shutter with AE/AF tracking. Battery life (Still Images): Approx. 610 shots (Viewfinder) / approx. 710</p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\">shots (LCD monitor), battery life (Movie, continuous recording): Approx. 200 min (Viewfinder) / Approx. 210 min (LCD monitor)</p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\">693 phase detection / 425 contrast AF points w/ 93 percent image coverage. Focus sensor: Exmor R CMOS sensor</p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p data-spm-anchor-id=\"a2g0o.detail.1000023.i2.faf57320jGgHDG\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\">In the box: Rechargeable battery (NP FZ100), AC adapter (AC UUD12), shoulder strap, body cap, Accessory shoe cap, Eyepiece cup,</p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\">Micro USB cable. Metering type: 1200 zone evaluative metering</p></li></ul><div style=\"box-sizing: content-box; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;, Roboto, Arial, Helvetica, sans-serif, SimSun;\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></div><ul style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: initial; list-style-image: initial; margin-block-start: 1em; color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;, Roboto, Arial, Helvetica, sans-serif, SimSun;\"><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p align=\"left\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; color: rgb(0, 0, 0); font-family: OpenSans;\">The package contains:</span></p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p align=\"left\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; color: rgb(0, 0, 0); font-family: OpenSans;\">Alpha 7 III *1</span></p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p align=\"left\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; color: rgb(0, 0, 0); font-family: OpenSans;\">Lens *1</span></p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p align=\"left\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; color: rgb(0, 0, 0); font-family: OpenSans;\">AC Adaptor *1</span></p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p align=\"left\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; color: rgb(0, 0, 0); font-family: OpenSans;\">AC-UUD12 Accessory shoe cap *1</span></p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p align=\"left\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; color: rgb(0, 0, 0); font-family: OpenSans;\">Body cap *1</span></p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p align=\"left\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; color: rgb(0, 0, 0); font-family: OpenSans;\">Eyepiece cup *1</span></p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p align=\"left\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; color: rgb(0, 0, 0); font-family: OpenSans;\">Micro USB cable *1</span></p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p align=\"left\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; color: rgb(0, 0, 0); font-family: OpenSans;\">Rechargeable Battery *1</span></p></li><li style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px;\"><p align=\"left\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px;\"><span data-spm-anchor-id=\"a2g0o.detail.1000023.i4.faf57320jGgHDG\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; color: rgb(0, 0, 0); font-family: OpenSans;\">NP-FZ100 Shoulder strap *1</span></p></li></ul>', 'WNQvVXbUuGHAKC7we2TM5FniZ1jkDSL03l8dc6Jx.jpg', '2022-09-19 00:27:41', '2022-11-01 23:11:37');
INSERT INTO `marketplaces` (`id`, `user_id`, `title`, `currency_id`, `price`, `location`, `category`, `status`, `condition`, `brand`, `description`, `image`, `created_at`, `updated_at`) VALUES
(14, 4, '14\'\' Macbook Pro M1', 2, '1299', 'Los Angeles', '2', '1', 'new', '1', '<h3 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; vertical-align: baseline; font-family: -apple-system, system-ui, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px; color: rgb(34, 34, 34);\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: 600;\">Apple M1 Pro 14 inch 8-core CPU 14-Core GPU 2021 Model&nbsp;</span></h3><ul class=\"as-macbundle-modelspecs\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; border: 0px; outline: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: -apple-system, system-ui, &quot;system-ui&quot;, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px; list-style: none; color: rgb(50, 50, 50); padding-left: 18px !important;\"><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style-type: square !important;\">8-Core CPU 14-Core GPU</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style-type: square !important;\">16-core Neural&nbsp; Engine</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style-type: square !important;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: 600;\">1TB SSD Storage¹</span></li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style-type: square !important;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: 600;\">16GB Unified Memory</span></li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style-type: square !important;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: 600;\">14-inch Liquid Retina XDR display</span></li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style-type: square !important;\">Three Thunderbolt 4 ports, HDMI port, SDXC card slot, MagSafe 3 port</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style-type: square !important;\">Magic Keyboard with Touch ID</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style-type: square !important;\">Force Touch trackpad</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style-type: square !important;\">67W USB-C Power Adapter</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: inherit; list-style-type: square !important;\">1 Year&nbsp;Apple International Warranty</li></ul>', 'lRyaPCY4N7rVuZfBxd9Tq0zAOXK2bwhiQ1DjkWSc.jpg', '2022-09-19 01:24:59', '2022-11-02 00:30:33'),
(15, 4, 'Apple Watch Ultra', 2, '800', 'San Diego,', '3', '1', 'new', '1', '<div>Meet the most rugged and capable Apple Watch ever. With a robust titanium case, precision dual-frequency GPS, up to 36 hours of battery life,1 the freedom of cellular,2 and three specialized bands made for athletes and adventurers of all kinds.</div><div><div><br></div><div><b>Looks tough.</b></div><p><b>Because it is.</b></p><div>To build the ultimate sports watch, we crafted every element with painstaking attention to detail for unparalleled performance. Titanium strikes the perfect balance between weight, ruggedness, and corrosion resistance. The new case design rises up to surround the flat sapphire crystal and protect it from edge impacts. The Digital Crown is larger and the side button is raised from the case, making them easier to use while you’re wearing gloves.</div></div>', 'V67gc1ZrJatCsoYmujxTwlzQfvnPbN8204yHLWEq.png', '2022-09-19 01:27:56', '2022-11-02 00:10:23'),
(16, 4, 'Apple Airpods Pro', 2, '400', 'San Jose', '4', '1', 'new', '1', '<p>I&rsquo;ve said it before - I have never been a fan of the AirPods, and they were the only device within the Apple ecosystem that I was yet to make my own.</p>\r\n\r\n<p>I have a very wide ear canal, and I&rsquo;ve lost more earphones than I can count. Though I shouldn&rsquo;t be too worried, the &lsquo;Find my Device&rsquo; feature on the iPhone keeps track of Apple devices&rsquo; whereabouts. Moreover, a friend had convinced me that anyone who wears the AirPods embodies the epitome of entitlement.</p>', 'T9tzJQqlkoi7pwZK3R8gVSxUfCGW5vNn1MduOBrj.jpg', '2022-09-19 05:02:37', '2022-10-19 03:11:00'),
(17, 2, 'iphone 14 Pro Max', 8, '1100', 'Melbourne, Australia', '1', '1', 'new', '1', NULL, 'lpFg3U84Zmnd9MzJwIN5Ev1ifjGWVeo7KAsbTPXB.jpg', '2022-10-09 23:47:15', '2022-10-09 23:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

DROP TABLE IF EXISTS `media_files`;
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

--
-- Dumping data for table `media_files`
--

INSERT INTO `media_files` (`id`, `user_id`, `post_id`, `story_id`, `album_id`, `product_id`, `page_id`, `group_id`, `chat_id`, `file_name`, `file_type`, `privacy`, `created_at`, `updated_at`) VALUES
(1, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'ZKANFsb8cxOtlkwEHaneGXpM7qmLdj1vRiU56T0S.jpg', 'image', 'public', '1663067678', '1663067678'),
(3, 2, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'TmkDE9daxig2ztFw1CrujOJZPLpUY3SvnoB568Vb.jpg', 'image', 'public', '1663133590', '1663133590'),
(6, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'Oh0yZpevWaSqs8BuCr19dt2ziKcnF3AQ4TYPlE6R.webp', 'image', NULL, '1663141906', '1663141906'),
(7, 2, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'k3endB7p0txUCSO4oIrYH8WmQRw5KAZJFfajyhuM.webp', 'image', NULL, '1663142028', '1663142028'),
(8, 2, NULL, NULL, NULL, 3, NULL, NULL, NULL, 'ENnsveBhpW8LQjfYRDxqCTy5i6HFJ2wOV3oaSt94.jpeg', 'image', NULL, '1663146962', '1663146962'),
(9, 2, NULL, NULL, NULL, 4, NULL, NULL, NULL, '7nsu5yZPcwrktQgJ2YbmaLSpIA4KOHzEDT0hFCve.jpg', 'image', NULL, '1663147094', '1663147094'),
(10, 2, NULL, NULL, NULL, 5, NULL, NULL, NULL, '7cmN40C5UpRtvw8DsdXIzjZO1kTQYfaFgGb6uo92.webp', 'image', NULL, '1663148157', '1663148157'),
(12, 2, 14, NULL, NULL, NULL, NULL, NULL, NULL, '9ad4q6hf2mst5lJB8RQyIroLFCSAZuUWVDxMiEYP.jpg', 'image', 'public', '1663150055', '1663150055'),
(13, 2, 15, NULL, NULL, NULL, NULL, NULL, NULL, 'XB5LEtIRa24Wzx3Gk67AvPeCO1olTKsZy8VSdMuh.jpg', 'image', 'public', '1663150066', '1663150066'),
(14, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'EVxlYgQDheKrAWtuI38k5ba4yGo1jJ79vpXNPcMU.jpg', 'image', 'public', '1663217493', '1663217493'),
(15, 2, NULL, 2, NULL, NULL, NULL, NULL, NULL, 'OI1xwtUV38sQlSomPHRzcabWkqdenNDAF6r72B4K.jpg', 'image', 'public', '1663497154', '1663497154'),
(16, 3, 16, NULL, NULL, NULL, NULL, NULL, NULL, 'ynwDqMbiXKI0z1Apl3YLB9FWJGUg5me8HE6SOQtN.jpg', 'image', 'public', '1663563185', '1663563185'),
(17, 3, 17, NULL, NULL, NULL, 5, NULL, NULL, 'qa3V1Dlz9TNEAFvObk7U5oXpYgiw0Ccf4BnMmsdj.jpg', 'image', 'public', '1663565323', '1663565323'),
(18, 3, 18, NULL, NULL, NULL, 5, NULL, NULL, 'pBzdreLvUM2kbn9tiFQu450qlWSmyI3hx8wNEX1Z.jpg', 'image', 'public', '1663565359', '1663565359'),
(19, 3, 19, NULL, NULL, NULL, 5, NULL, NULL, 'MTPuEki5nHxXqUV8sayZmB2d1gfYwD9ctKAIWlFL.jpg', 'image', 'public', '1663565395', '1663565395'),
(20, 3, 20, NULL, NULL, NULL, 5, NULL, NULL, 'DSvRhdKzxePQHpbU1oaA0y5sVZWluTwYk4LcXNO3.jpg', 'image', 'public', '1663565404', '1663565404'),
(21, 3, 21, NULL, NULL, NULL, 6, NULL, NULL, 'aGsWdFpAPvNkQXmf0lugZEziyTLewnr36R2S7coV.jpg', 'image', 'public', '1663565614', '1663565614'),
(22, 3, 21, NULL, NULL, NULL, 6, NULL, NULL, 'z8dKcaPIMQ7WmhLrjfGTYSpxEUlCys5V4oNn6kBg.jpg', 'image', 'public', '1663565614', '1663565614'),
(23, 3, 21, NULL, NULL, NULL, 6, NULL, NULL, '174b3ucTgmWYIwkrQefKvFhAS6JzaHVEi2q59LoZ.jpg', 'image', 'public', '1663565614', '1663565614'),
(24, 3, 21, NULL, NULL, NULL, 6, NULL, NULL, 'EubSs8KpRY15vCzGPL6aogH2dTrmVqhZMIW74ekN.jpg', 'image', 'public', '1663565614', '1663565614'),
(25, 3, NULL, NULL, NULL, 6, NULL, NULL, NULL, 'VmpFwJo0Q7cxMsDRdrnCkvj9i1gO6l5B38qIZGTP.jpg', 'image', NULL, '1663566117', '1663566117'),
(26, 2, NULL, NULL, NULL, 7, NULL, NULL, NULL, 'UMSvRZ5OjY6caxAgdrLyXPnVI19sJ0TDQWmeCKNh.jpg', 'image', NULL, '1663566302', '1663566302'),
(27, 2, NULL, NULL, NULL, 8, NULL, NULL, NULL, 'prdqWYUtjGgxSA8v73mRkb5f2aDToOQVuwzEJsKF.jpg', 'image', NULL, '1663566426', '1663566426'),
(30, 2, NULL, NULL, NULL, 9, NULL, NULL, NULL, 'Mik3hvOem0FygwZD5j9Ex4SHNUfrQYuGqtbV6C8d.jpg', 'image', NULL, '1663566689', '1663566689'),
(35, 4, 28, NULL, NULL, NULL, NULL, NULL, NULL, 's3prOzBYNTF1CAZimqGwcPk5Voh87D9tdWaMxUEu.jpg', 'image', 'public', '1663570397', '1663570397'),
(36, 4, 29, NULL, NULL, NULL, NULL, NULL, NULL, 'bGm2s5eEYvzkoLxtI34NSMZlXQdOnfAriUHapJwD.jpg', 'image', 'public', '1663570403', '1663570403'),
(37, 4, 30, NULL, NULL, NULL, NULL, NULL, NULL, 'Y3A26FE0qg1mhoKBHfJGVev8dDp7zwTCNkiMZbs4.jpg', 'image', 'public', '1663570565', '1663570565'),
(40, 4, 34, NULL, NULL, NULL, NULL, 12, NULL, 'DSViAH43qzMg80wJ9Wj6vINXGLuYex7ECkbptPUT.jpg', 'image', 'public', '1663576788', '1663576788'),
(41, 4, 34, NULL, NULL, NULL, NULL, 12, NULL, 'Ckb9PaxlctK5XYowUOLBGzjs7fAur08me3ZnhqW4.jpg', 'image', 'public', '1663576791', '1663576791'),
(42, 4, 35, NULL, NULL, NULL, NULL, 12, NULL, 'd0nmOwE7jsLBvTxKVeDkhq3tZAPMiGJlQI1ycHaW.jpg', 'image', 'public', '1663576810', '1663576810'),
(43, 4, 36, NULL, NULL, NULL, NULL, 12, NULL, 'i0KvQbEwL3uJPnHF1OaloYdsmqpCVg9zZjMt5WNI.jpg', 'image', 'public', '1663576822', '1663576822'),
(44, 4, 37, NULL, NULL, NULL, 10, NULL, NULL, 'ngDo5cT6QeEAiwRdlUhxuNO0m71XFzBsWMJbj4Yk.jpg', 'image', 'public', '1663577004', '1663577004'),
(45, 4, 38, NULL, NULL, NULL, 10, NULL, NULL, 'pI2HV5TbxugOmSdhiXCwNer0JcEM4yKknA698aFU.jpg', 'image', 'public', '1663577018', '1663577018'),
(46, 4, 39, NULL, NULL, NULL, 10, NULL, NULL, 'juN6ncMASrvZox29WThEdepwB3D4RqCYU7yQakH5.jpg', 'image', 'public', '1663577032', '1663577032'),
(47, 4, 41, NULL, NULL, NULL, 10, NULL, NULL, 'IJyqjz4RacU2sSNLktTY70CD3nfOBMld9owP1rFZ.jpg', 'image', 'public', '1663577054', '1663577054'),
(48, 4, 42, NULL, NULL, NULL, 10, NULL, NULL, 'ONvkrKJgTEd3zy1UjGRA24cMQs8pfSFDialexhoL.jpg', 'image', 'public', '1663577068', '1663577068'),
(49, 4, 43, NULL, NULL, NULL, 9, NULL, NULL, 'WcHFp352UbVaA8zMGgnexmkBfh0yvECDu9Il7J6Z.jpg', 'image', 'public', '1663577194', '1663577194'),
(50, 4, 44, NULL, NULL, NULL, 9, NULL, NULL, 'YMR6rxdbHkG7wDL5Fh2jWEASINVoCngsz3ftqviU.jpg', 'image', 'public', '1663577203', '1663577203'),
(51, 4, 45, NULL, NULL, NULL, 9, NULL, NULL, 'ZcE1aG2Bf96x8URXLMve4AwCTVnQyriDbWJstmh0.jpg', 'image', 'public', '1663577214', '1663577214'),
(52, 4, 46, NULL, NULL, NULL, 9, NULL, NULL, '9zXT7JkM0bB4gdKUV6R8D2OQ5hlPiHmpxWuLSvnG.jpg', 'image', 'public', '1663577223', '1663577223'),
(53, 4, 47, NULL, NULL, NULL, 9, NULL, NULL, 'zYIkXRl2wUAbymWTD0hZSH1g4jv6MCOKr9BVNdJG.jpg', 'image', 'public', '1663577233', '1663577233'),
(54, 4, 48, NULL, NULL, NULL, 8, NULL, NULL, '2iUjvT0FP9gl8sGaRILHtQK53OYbzmqSwDpAyJ1W.jpg', 'image', 'public', '1663577367', '1663577367'),
(55, 4, 49, NULL, NULL, NULL, 8, NULL, NULL, 'RgHOeBTJf7jzsS3ioQr94uLpZmCy0v1bNtlIK2da.jpg', 'image', 'public', '1663577378', '1663577378'),
(56, 4, 50, NULL, NULL, NULL, 8, NULL, NULL, 'yARDVinSWK9L1zJjufwTeNlHqBM4PFkcGE8mYxZr.jpg', 'image', 'public', '1663577386', '1663577386'),
(57, 4, 51, NULL, NULL, NULL, 8, NULL, NULL, 'EPWDHRAxaSzXZgIC2Fkb3suw7vteqYLpdnfNOTo1.jpg', 'image', 'public', '1663577398', '1663577398'),
(58, 4, 52, NULL, NULL, NULL, 8, NULL, NULL, 'Zqv7xkLmtcG4YjhS91b6OKWsyFg3VwilNH8CraTM.jpg', 'image', 'public', '1663577407', '1663577407'),
(59, 4, 53, NULL, NULL, NULL, 8, NULL, NULL, 'hXYnagNR6BPzIoFOmE8kjxZCWMv2HSKULlc5VDwT.jpg', 'image', 'public', '1663577422', '1663577422'),
(60, 2, 54, NULL, NULL, NULL, 4, NULL, NULL, '7p5mAxaT1bc0N6KDYyEWIf2ZjPOlqogSzUeQud94.jpg', 'image', 'public', '1663577876', '1663577876'),
(61, 2, 55, NULL, NULL, NULL, 4, NULL, NULL, '4qrGejlJKamObZ8dYLtfWgRDVCSsyhX193UvMkIE.jpg', 'image', 'public', '1663577891', '1663577891'),
(62, 2, 56, NULL, NULL, NULL, 4, NULL, NULL, 'axTtOiIJ7EnNQ9p41WHkdyLvmDRz2UKcS8PuM3GB.jpg', 'image', 'public', '1663577900', '1663577900'),
(63, 2, 57, NULL, NULL, NULL, 4, NULL, NULL, 'ESMOF9q5IecAu6ZgtmPhkNbwrDRY4zd2WJ1vK08B.jpg', 'image', 'public', '1663577912', '1663577912'),
(64, 2, 58, NULL, NULL, NULL, 4, NULL, NULL, '0qQHjgsbnzipKroPRhYCUSadkVtcJEfuX7e4O5Z9.jpg', 'image', 'public', '1663577935', '1663577935'),
(65, 2, 59, NULL, NULL, NULL, 4, NULL, NULL, 'yUJOb4uF0SqQLI1RrdvpzPDGV6it2nkXZjENMceg.jpg', 'image', 'public', '1663577937', '1663577937'),
(66, 2, 60, NULL, NULL, NULL, 3, NULL, NULL, 'POT1hAebDH6dMWBkJmi3NFYU4XKzawLRpxCG9Zlj.jpg', 'image', 'public', '1663578199', '1663578199'),
(67, 2, 61, NULL, NULL, NULL, 3, NULL, NULL, 'S1qx3c6DHThKnJpO9aGUjMFBm5CVZ7ePt8iz0fWX.jpg', 'image', 'public', '1663578241', '1663578241'),
(68, 2, 62, NULL, NULL, NULL, 3, NULL, NULL, 'aGEu32Jhpw9SBM1xbYLXfQCtcDrWjV4ygR56deiP.jpg', 'image', 'public', '1663578251', '1663578251'),
(69, 2, 63, NULL, NULL, NULL, 3, NULL, NULL, 'OxkzlBfrwqjiSW2yVupJcMUR350C9nsAdhbTmeZ4.jpg', 'image', 'public', '1663578274', '1663578274'),
(70, 2, 64, NULL, NULL, NULL, 3, NULL, NULL, 'nRCoBzu2mh3rF7sSgkeKixGMWcaLAjYVlyfI9Dd1.jpg', 'image', 'public', '1663578296', '1663578296'),
(71, 2, 65, NULL, NULL, NULL, 2, NULL, NULL, 'MvPs7lh2Ej4cC8A1knfJzUgTDBpV9HbX50xNSrOy.jpg', 'image', 'public', '1663578468', '1663578468'),
(72, 2, 66, NULL, NULL, NULL, 2, NULL, NULL, 'Jb3FBe6ykqCh4t29ME5oRwSHKINX7jdmY0QPuxs8.jpg', 'image', 'public', '1663578476', '1663578476'),
(73, 2, 67, NULL, NULL, NULL, 2, NULL, NULL, '2lvt0zeNXpKRqUAMhCT4OLDosYiS6QIyaWHn1r8x.jpg', 'image', 'public', '1663578485', '1663578485'),
(74, 2, 68, NULL, NULL, NULL, 2, NULL, NULL, '2CP58JHos3OMxA4kNetwhcV0TvBjWIUEy1Zl9Dpb.jpg', 'image', 'public', '1663578500', '1663578500'),
(75, 2, 69, NULL, NULL, NULL, 2, NULL, NULL, 'Wf5clsgAKCEtBYLHROdFv67z213S9aNQUTZmDMq4.jpg', 'image', 'public', '1663578511', '1663578511'),
(76, 2, 70, NULL, NULL, NULL, 1, NULL, NULL, 'xr80ZgLvYyPs1M7ekmcJaFjUwiBXWdONTpzol4h2.jpg', 'image', 'public', '1663578601', '1663578601'),
(77, 2, 71, NULL, NULL, NULL, 1, NULL, NULL, 'vXFNBgTD9z8AhiZJIyndEqp50uoV1lwGxmWR4c3K.jpg', 'image', 'public', '1663578613', '1663578613'),
(78, 2, 72, NULL, NULL, NULL, 1, NULL, NULL, 'XTFi2pRvEDgBW1l5QdLys3rx0KVnYbqJm786PMek.jpg', 'image', 'public', '1663578625', '1663578625'),
(79, 2, 73, NULL, NULL, NULL, 1, NULL, NULL, '1eGVEMctlBF0IZhSkw5OTbN98WPDU6zQdxAvm4Ya.jpg', 'image', 'public', '1663578635', '1663578635'),
(80, 2, 74, NULL, NULL, NULL, 1, NULL, NULL, 'EbjrWQGoIOszhpK8PRiML7S05A3ydtaFf6DlkZNm.jpg', 'image', 'public', '1663578648', '1663578648'),
(81, 2, 75, NULL, NULL, NULL, 1, NULL, NULL, 'b97ECzGajOuvgse8tplJ5wLMPi2IZqcHnWRQDxm0.jpg', 'image', 'public', '1663578667', '1663578667'),
(82, 2, 76, NULL, NULL, NULL, NULL, 6, NULL, 'TzIXaOEWMfsJjSVQR0UqtnKhF67prL5DoxPubNi4.jpg', 'image', 'public', '1663578988', '1663578988'),
(83, 2, 77, NULL, NULL, NULL, NULL, 6, NULL, 'mVl1M2uAxkSKr6HozTWajD5tR73YhvOBpsCUQdEe.jpg', 'image', 'public', '1663579074', '1663579074'),
(84, 2, 78, NULL, NULL, NULL, NULL, 6, NULL, 'Bg4Om1WNa7ZXlzJYyMjnSuihEwoKIrFVcd8fbH3q.jpg', 'image', 'public', '1663579117', '1663579117'),
(85, 2, 79, NULL, NULL, NULL, NULL, 6, NULL, 'OjrfqZDVh8zNYm6c4LybPitFe9l0s2H1BwKd57ag.jpg', 'image', 'public', '1663579179', '1663579179'),
(86, 2, NULL, 3, NULL, NULL, NULL, NULL, NULL, 'EK9qY1boWItji5y4XgHM2NuA8lQLC60Jc7vGznOm.jpg', 'image', 'public', '1663584537', '1663584537'),
(87, 4, 126, NULL, NULL, NULL, NULL, 12, NULL, 'xD6ZgK83qapPv4jwms2bR9fCtAylSrdzIBMe1YGE.jpg', 'image', 'public', '1663585003', '1663585003'),
(88, 4, 127, NULL, NULL, NULL, NULL, 12, NULL, '8LKmY9lzCwHgkvPAUWQcyashq6J41F7pjVfnRdG3.jpg', 'image', 'public', '1663585073', '1663585073'),
(89, 4, 127, NULL, NULL, NULL, NULL, 12, NULL, 'Y2Ab9t7dxfKJ5QIksHpCnOlRyzrcDBm1M8L4Z3Uq.jpg', 'image', 'public', '1663585077', '1663585077'),
(90, 4, 128, NULL, NULL, NULL, NULL, 12, NULL, 'vlhNLrfFo5VQWtzwpTsH8R9a7dxBO4SKmZPD1Icj.jpg', 'image', 'public', '1663585105', '1663585105'),
(91, 4, 129, NULL, NULL, NULL, NULL, 12, NULL, 'bvWDc16USjAuRpsgOTJ2tkCyMdQBI4LFxlZXhP7G.jpg', 'image', 'public', '1663585124', '1663585124'),
(92, 4, 129, NULL, NULL, NULL, NULL, 12, NULL, 'LmrJ1fn4QF7cZeMYtvwExoRk286DUNBO0lzaibsC.jpg', 'image', 'public', '1663585126', '1663585126'),
(93, 4, 130, NULL, NULL, NULL, NULL, 12, NULL, 'grWZINOEFXqPJbG7DKYLSUyjcx0pMHfn59Q8RdC6.jpg', 'image', 'public', '1663585140', '1663585140'),
(94, 4, 131, NULL, NULL, NULL, NULL, 12, NULL, 'tbMQqfxW7kwnmGiSFvs52e9KzIEhyX1UTBcg3oJ6.jpg', 'image', 'public', '1663585192', '1663585192'),
(95, 4, 131, NULL, NULL, NULL, NULL, 12, NULL, 'y6FPsDbOxQufNSvG3ZVzrX7twCLgaR1hTBkiEY4H.jpg', 'image', 'public', '1663585194', '1663585194'),
(96, 4, 132, NULL, NULL, NULL, NULL, 12, NULL, 'OMHNRX28mzVZPKjLdQtJyf3o5vEn0W7Sxiq6rbCT.jpg', 'image', 'public', '1663585205', '1663585205'),
(97, 4, 132, NULL, NULL, NULL, NULL, 12, NULL, 'FGVCIN51LeXSdmocJu8TBtZf7jA0EOh9bnyaKp6i.jpg', 'image', 'public', '1663585208', '1663585208'),
(98, 4, NULL, NULL, NULL, 16, NULL, NULL, NULL, 'T9tzJQqlkoi7pwZK3R8gVSxUfCGW5vNn1MduOBrj.jpg', 'image', NULL, '1663585357', '1663585357'),
(99, 3, 136, NULL, NULL, NULL, NULL, 10, NULL, 'yDxUai6A4nXRd8sczb1ZP0mBtHfl95SKFW7QEjGJ.jpg', 'image', 'public', '1663587268', '1663587268'),
(100, 3, 137, NULL, NULL, NULL, NULL, 10, NULL, 'k01R9ydDrSmIZGn7qtULWVNiXFs4B5AKglaPxhej.jpg', 'image', 'public', '1663587319', '1663587319'),
(101, 3, 138, NULL, NULL, NULL, NULL, 10, NULL, 'm218TKzelJjIMoQBL903yHnVEbOYqStUR6ifXhG5.jpg', 'image', 'public', '1663587376', '1663587376'),
(102, 3, 139, NULL, NULL, NULL, NULL, 10, NULL, 'LrIY5zHaKOMSkCf0RXpAwJiFTDh6Wxl24oZQcgN1.jpg', 'image', 'public', '1663587447', '1663587447'),
(103, 3, 139, NULL, NULL, NULL, NULL, 10, NULL, '49SRsaCeIwAvEN7cXkgOWj3zUJtPQZBioTqn602d.jpg', 'image', 'public', '1663587447', '1663587447'),
(104, 3, 139, NULL, NULL, NULL, NULL, 10, NULL, 'S4xsjN8HOB3Qg9pEw7ielCRqZmKdP10YfrhvDJT6.jpg', 'image', 'public', '1663587447', '1663587447'),
(105, 3, 140, NULL, NULL, NULL, NULL, 10, NULL, 'CAPh3xBlo0Y65ROGSwZVK2tjza8Ik1J7gspfEdcL.jpg', 'image', 'public', '1663587503', '1663587503'),
(106, 3, 140, NULL, NULL, NULL, NULL, 10, NULL, 'eT9qJnpl6iMDLa5EhPAbQmR38UFG1gd7WXOkHvsz.jpg', 'image', 'public', '1663587503', '1663587503'),
(107, 3, 141, NULL, NULL, NULL, NULL, 10, NULL, 'bL9TfBAPEwSk4mz3MnZC7tU1aH8GXVedpOgsYNyh.jpg', 'image', 'public', '1663587593', '1663587593'),
(108, 3, 141, NULL, NULL, NULL, NULL, 10, NULL, 'SARmfvp8uWO4E0h65C3x1iN7tJKzodslUwLB2QHZ.jpg', 'image', 'public', '1663587594', '1663587594'),
(109, 3, 142, NULL, NULL, NULL, NULL, 10, NULL, 'J91okIYvDLFlUidpaq32S6O0VKwnm5Hs4jyWGXet.jpg', 'image', 'public', '1663587655', '1663587655'),
(110, 3, 143, NULL, NULL, NULL, NULL, 8, NULL, 'niPNCvDbapOdR63htBwKfuySEgLIlX0QzHY9ZWkT.jpg', 'image', 'public', '1663587788', '1663587788'),
(111, 3, 144, NULL, NULL, NULL, NULL, 8, NULL, 'hqGpgvD6l5aVJxW0oLzcurjNk7QbwTsiKyd1Cf4m.png', 'image', 'public', '1663587820', '1663587820'),
(112, 3, 145, NULL, NULL, NULL, NULL, 8, NULL, 'iNUQyY9rZjJBtFoqSED743v5zfXwMW1pksgAdxuI.jpg', 'image', 'public', '1663587857', '1663587857'),
(113, 3, 146, NULL, NULL, NULL, NULL, 8, NULL, 'fj2uiJCOmlDbvhTwX04dKGWyV3FNBgEQrZxtPM9k.jpg', 'image', 'public', '1663587913', '1663587913'),
(114, 3, 147, NULL, NULL, NULL, NULL, 8, NULL, 'K1AFVrwXsfy8uJxeGvc27tCl4zkPjaMh6iDLIZRY.png', 'image', 'public', '1663588050', '1663588050'),
(115, 3, 148, NULL, NULL, NULL, NULL, 8, NULL, 'GXBCf8vNuLtbW50EiHz3xVdJay4m9761SleMQqpc.png', 'image', 'public', '1663588082', '1663588082'),
(116, 3, 149, NULL, NULL, NULL, NULL, 8, NULL, 'c1MU63m2FEAn57RxYzat0LG9fsleyKBdrSwo4HjN.jpg', 'image', 'public', '1663588137', '1663588137'),
(117, 3, 150, NULL, NULL, NULL, NULL, 7, NULL, 'J0uBjWkQNyHIY4A51EwG6dUOpe3lM9cntzDLxCfK.jpg', 'image', 'public', '1663588265', '1663588265'),
(118, 3, 151, NULL, NULL, NULL, NULL, 7, NULL, 'nBRQCzVJ7ljqmIO84ScvXpM0HoxZAY9Dt1uEdsWr.jpg', 'image', 'public', '1663588282', '1663588282'),
(119, 3, 152, NULL, NULL, NULL, NULL, 7, NULL, 'GkcP20sSuDmTAEhIxapdnUgR3Hvqw7jWzX85lOe9.jpg', 'image', 'public', '1663588420', '1663588420'),
(120, 3, 153, NULL, NULL, NULL, NULL, 7, NULL, '0Nl5fX2JG68DFOuTjHPbRwnSCIvWLqZAUVory7kY.jpg', 'image', 'public', '1663588496', '1663588496'),
(121, 3, 154, NULL, NULL, NULL, NULL, 7, NULL, 'wnTcvadNhe7sWzGjVqP4HYrM5uAo1JOk26pC0D3F.jpg', 'image', 'public', '1663588748', '1663588748'),
(122, 3, 155, NULL, NULL, NULL, NULL, 7, NULL, 'DiLXUshkbTRvJ0dwBHfKW4j9StNyux2gCZOzceYa.jpg', 'image', 'public', '1663588810', '1663588810'),
(123, 3, 156, NULL, NULL, NULL, 7, NULL, NULL, '5tDlw1f8MneBo9VNSvUsZpc630rYXJRLyQuGCP72.jpg', 'image', 'public', '1663589562', '1663589562'),
(124, 3, 156, NULL, NULL, NULL, 7, NULL, NULL, 'xLEjT10oUOKygiVBANzGItCfWZJ7d2cMQFk8n6a4.jpg', 'image', 'public', '1663589562', '1663589562'),
(125, 3, 156, NULL, NULL, NULL, 7, NULL, NULL, 'jOYXJ8F0CvTRnxosW3Mf4tiZbB16pymUuVESHzlk.jpg', 'image', 'public', '1663589563', '1663589563'),
(126, 3, 157, NULL, NULL, NULL, 7, NULL, NULL, 'H3yMqER5kIfUp2ZKmOYdbrLeGwoaQzC1StgPn9Xv.jpg', 'image', 'public', '1663589578', '1663589578'),
(127, 3, 158, NULL, NULL, NULL, 7, NULL, NULL, 'nQBDsqLTYJowWmF3ZxRjdz6eUPpytcaXECHS2A7i.jpg', 'image', 'public', '1663589601', '1663589601'),
(128, 3, 158, NULL, NULL, NULL, 7, NULL, NULL, 'n9qwzYjufyNJXKWOVhtCRS5L2lIMkGcbA0vFdeHE.jpg', 'image', 'public', '1663589602', '1663589602'),
(129, 3, 158, NULL, NULL, NULL, 7, NULL, NULL, '6buwJZhRHTxgEvdklUnerq1zDo0YypK9Sc2PfOim.jpg', 'image', 'public', '1663589602', '1663589602'),
(130, 3, 158, NULL, NULL, NULL, 7, NULL, NULL, '65ecFSA9Ll3V2zswpBfH8EMWOYJnbhjgi7XKa4tv.jpg', 'image', 'public', '1663589603', '1663589603'),
(131, 3, 159, NULL, NULL, NULL, 7, NULL, NULL, 'A8WdE9roMFmORNZuaTQ6Dezw1xPh4k3U0f7KyjsY.jpg', 'image', 'public', '1663589626', '1663589626'),
(132, 3, 159, NULL, NULL, NULL, 7, NULL, NULL, 'RjhtkxTfiXaLMlmEQ1Igzou4WFB56p98ycJ7KOAs.jpg', 'image', 'public', '1663589626', '1663589626'),
(133, 3, 159, NULL, NULL, NULL, 7, NULL, NULL, 'EuSAoIMmnNwG2Ucg3zbQkjtXxRKriOpd6hv4eaFY.jpg', 'image', 'public', '1663589626', '1663589626'),
(134, 3, 159, NULL, NULL, NULL, 7, NULL, NULL, 'IeUvmRqc1SFnMZhL5KGtCkAb4soD7pdfj0V9gQuH.jpg', 'image', 'public', '1663589627', '1663589627'),
(135, 3, 160, NULL, NULL, NULL, 7, NULL, NULL, 'mDFjTK3sbApr0vP2Xy4GQzciBa76WYSehZIotdR9.jpg', 'image', 'public', '1663589641', '1663589641'),
(136, 3, 160, NULL, NULL, NULL, 7, NULL, NULL, 'AfIgDZ59Mw063QiHn2oCBkeXJ1SYPKNEaTprzx4t.jpg', 'image', 'public', '1663589642', '1663589642'),
(137, 3, 160, NULL, NULL, NULL, 7, NULL, NULL, 'czVjd2t4ueBiw5klP0oI1Jv9sZXnrgaFK7hSEWMY.jpg', 'image', 'public', '1663589642', '1663589642'),
(138, 3, 160, NULL, NULL, NULL, 7, NULL, NULL, 'inqtUJQwSD5LmBIZRrzMAybFadh28PXxC9ufoHpV.jpg', 'image', 'public', '1663589642', '1663589642'),
(139, 3, 161, NULL, NULL, NULL, 7, NULL, NULL, '8eKVrWQC9bJaNSX3IlRnGwHtkD0f4zUsx1YOMBqy.jpg', 'image', 'public', '1663589656', '1663589656'),
(140, 3, 161, NULL, NULL, NULL, 7, NULL, NULL, 'YJrMt4X9SIbWvsOChEl2epBHjZomK0wnufaGLUDT.jpg', 'image', 'public', '1663589656', '1663589656'),
(141, 3, 161, NULL, NULL, NULL, 7, NULL, NULL, 'dpOmD9cIesylFnfv5UuQ68VXqjCz1bNhJZ3WMYA4.jpg', 'image', 'public', '1663589657', '1663589657'),
(142, 3, 162, NULL, NULL, NULL, 7, NULL, NULL, 'TFyE5V97eDsRNgUBL6tWnO8d1xbvZwkAcJp3jfSi.jpg', 'image', 'public', '1663589672', '1663589672'),
(143, 3, 162, NULL, NULL, NULL, 7, NULL, NULL, 'Sz1r6FuBO09lXK5ywoGe7DCIfx8sYnkd4Vmh2Lpt.jpg', 'image', 'public', '1663589672', '1663589672'),
(144, 3, 162, NULL, NULL, NULL, 7, NULL, NULL, 'UPrR0HwVZbipvgDx4JzuX13MdQF8kINnTmKW6s2B.jpg', 'image', 'public', '1663589672', '1663589672'),
(145, 3, 162, NULL, NULL, NULL, 7, NULL, NULL, 'MmBw4oKxkUGfJ8sczv1Tq0Dr9XaHhtdlNZInA65V.jpg', 'image', 'public', '1663589673', '1663589673'),
(146, 3, 162, NULL, NULL, NULL, 7, NULL, NULL, 'x0C4aLS3f9Tg1Xr6elc5qmy2QPUKFOEiIG7BsYVN.jpg', 'image', 'public', '1663589673', '1663589673'),
(147, 3, 163, NULL, NULL, NULL, 7, NULL, NULL, 'akEzY7XPnBDgfq3Tt4CWZuNb8I1xmVwvSLMrs0Gc.jpg', 'image', 'public', '1663589707', '1663589707'),
(148, 3, 163, NULL, NULL, NULL, 7, NULL, NULL, 'EQA6iGd2RDK94N8gYFWHzcvqb0pmhu3aMZUXSwjr.jpg', 'image', 'public', '1663589707', '1663589707'),
(149, 3, 163, NULL, NULL, NULL, 7, NULL, NULL, 'WgOUpbysqrSj7FRLMP86cwDJuAH2VGteaBIlo5dx.jpg', 'image', 'public', '1663589708', '1663589708'),
(150, 3, 163, NULL, NULL, NULL, 7, NULL, NULL, 'd8RZgVl1f5Era6k0bowG7uI2jsB3zhMmOTLF4vxc.jpg', 'image', 'public', '1663589708', '1663589708'),
(151, 3, 164, NULL, NULL, NULL, 6, NULL, NULL, 'Kea3iQXPndqGuhmSFsYwMADJ7j4VCrbo15c9f6lU.jpg', 'image', 'public', '1663589849', '1663589849'),
(152, 3, 165, NULL, NULL, NULL, 6, NULL, NULL, 'sFdqrZgJ4XpPV7yG2OTAz6xtvcu5IB0SflkHiNYw.jpg', 'image', 'public', '1663589857', '1663589857'),
(153, 3, 166, NULL, NULL, NULL, 5, NULL, NULL, '1nFURNWSTcel5bM620thXp7qmzKLDrvV9oEfIAwy.jpg', 'image', 'public', '1663589916', '1663589916'),
(154, 3, 167, NULL, NULL, NULL, 5, NULL, NULL, 'ic1SsK5ubGOjM6mCyTN4D2rhEHQztI90Jn3ovdfA.jpg', 'image', 'public', '1663589952', '1663589952'),
(155, 3, 168, NULL, NULL, NULL, 5, NULL, NULL, 'hTMuQIXbgFq1KzOdJ7Dpx0LBZHaU5oij8PfsrvkC.jpg', 'image', 'public', '1663589996', '1663589996'),
(156, 3, 169, NULL, NULL, NULL, 5, NULL, NULL, 'paNq13oOT8Ly6WlZhcRd4b5uAwEUMHeJQFG2PgCi.jpg', 'image', 'public', '1663590030', '1663590030'),
(157, 3, 170, NULL, NULL, NULL, 5, NULL, NULL, 'AGsKDjYFwk9p25LoPUbyzETrS1qOf3BnINhtMmeR.png', 'image', 'public', '1663590055', '1663590055'),
(158, 3, 171, NULL, NULL, NULL, 5, NULL, NULL, 'fintgCrqb7BScUzeJTkdWOvDA1EKlF0V8I36yH2X.png', 'image', 'public', '1663590077', '1663590077'),
(160, 6, 173, NULL, NULL, NULL, NULL, NULL, NULL, 'mRlK2Xzr9TQ4qHdYg3BNfhPMCp0iaIjVk6ebDyZF.jpg', 'image', 'public', '1663651086', '1663651086'),
(161, 6, 174, NULL, NULL, NULL, NULL, NULL, NULL, 'T0qmtYvnlZPBwFckD15VpSrQedLa2gCJ8u4sUMHb.jpg', 'image', 'public', '1663651094', '1663651094'),
(162, 7, 175, NULL, NULL, NULL, NULL, NULL, NULL, 'mlDzORauT68IZpMWBoGAbjH0xh93Yce5EwVLtg4S.jpg', 'image', 'public', '1663651411', '1663651411'),
(163, 8, 176, NULL, NULL, NULL, NULL, NULL, NULL, 'YRHEcWJGe4m9Xduk75fKQFzhwOS8nbBUvqTPaxpN.jpg', 'image', 'public', '1663651817', '1663651817'),
(164, 8, 177, NULL, NULL, NULL, NULL, NULL, NULL, 'HpurcPwb7YzNtBCimXR96I4yajVTQJgkFe1dKfZW.jpg', 'image', 'public', '1663651820', '1663651820'),
(165, 9, 178, NULL, NULL, NULL, NULL, NULL, NULL, 'FPunBk6G8gQxCt3VojaU5qybfWspXS19MRcZm0eH.jpg', 'image', 'public', '1663652387', '1663652387'),
(166, 9, 179, NULL, NULL, NULL, NULL, NULL, NULL, 's5KnUg1Zre6YyAPczv8x4wtfbXGdh0lFIWDTpBkR.jpg', 'image', 'public', '1663652391', '1663652391'),
(167, 9, 180, NULL, NULL, NULL, NULL, NULL, NULL, 'EYVekaXDqfoLH69l5cKbwJt2sv0pO4FMj3nNhTUx.jpg', 'image', 'public', '1663652394', '1663652394'),
(168, 9, 181, NULL, NULL, NULL, NULL, NULL, NULL, 'PWsoQv2rjFxMHzu1CkTXLtfawmbpgSUZ0dOqiN5A.jpg', 'image', 'public', '1663652395', '1663652395'),
(169, 10, 182, NULL, NULL, NULL, NULL, NULL, NULL, 'cVRxWIU4LntZBP6e8Os3ldSGvpmfogwabMNzTyFC.jpg', 'image', 'public', '1663652752', '1663652752'),
(170, 2, 183, NULL, NULL, NULL, NULL, NULL, NULL, 'ujCGLAgVkD5y4ROs2dp6aUJQbY8KiTqmcE90XrZW.jpg', 'image', 'public', '1663665596', '1663665596'),
(171, 2, NULL, 5, NULL, NULL, NULL, NULL, NULL, 'JfDgmKWxRwF82Nr73y9Ahkte6cnpbvSTMoqlzCUP.png', 'image', 'public', '1664435201', '1664435201'),
(172, 2, 186, NULL, NULL, NULL, NULL, NULL, NULL, 'x8W6jLzkfNuyXtRaZvpA1KV4i7o0hGBdD9QCmPJg.jpg', 'image', 'public', '1664442165', '1664442165'),
(175, 2, 192, NULL, NULL, NULL, NULL, NULL, NULL, 'DNiQ5JcYyLu3g7a8fx9UqHReM4wnKGlEtrC6v10z.jpg', 'image', 'public', '1664700419', '1664700419'),
(177, 3, 194, NULL, NULL, NULL, NULL, NULL, NULL, '3sjHTqe8FzNKZh6D5BSJknb7fPc9traQvREX2xLo.jpg', 'image', 'public', '1664705772', '1664705772'),
(178, 4, 196, NULL, NULL, NULL, NULL, NULL, NULL, 'BTap04sY75cLM8KDWS6g9AlFEdN1I3yqzQixhZUC.jpg', 'image', 'public', '1664706678', '1664706678'),
(179, 5, 197, NULL, NULL, NULL, NULL, NULL, NULL, 'UsK9SzTtyc1EqIXpPjVF7oal80OYMivCGHfRQBhL.jpg', 'image', 'public', '1664707220', '1664707220'),
(180, 5, 198, NULL, NULL, NULL, NULL, NULL, NULL, 'UlDRVAzvcW1j9HIwuY3Bd8hPmtXsJkergQN7onpK.jpg', 'image', 'public', '1664707953', '1664707953'),
(181, 5, 199, NULL, NULL, NULL, NULL, NULL, NULL, 'pJZPmtOky47XqauNKE8n9H6ij2S5x3soeDAvcTCb.jpg', 'image', 'public', '1664707985', '1664707985'),
(182, 5, 199, NULL, NULL, NULL, NULL, NULL, NULL, 'AdDNZGOpSuqonyf3PFJsCbVhQrtxkYB546KR2Xjm.jpg', 'image', 'public', '1664707985', '1664707985'),
(183, 5, 199, NULL, NULL, NULL, NULL, NULL, NULL, 'IGTvP0F92KazyUnNBkqW4jDROr87dYZio1uQ3xgt.jpg', 'image', 'public', '1664707985', '1664707985'),
(184, 5, 199, NULL, NULL, NULL, NULL, NULL, NULL, 'C3EATeMNIQaDOlfdHPnct0qRUZmx45kFp7Xz8S1K.jpg', 'image', 'public', '1664707986', '1664707986'),
(185, 5, 200, NULL, NULL, NULL, NULL, NULL, NULL, 'u3sKfFRcxS0ZNBdeL64XImqPQ7yr9itkUnAoW8pD.jpg', 'image', 'public', '1664707987', '1664707987'),
(186, 5, 200, NULL, NULL, NULL, NULL, NULL, NULL, 'DhkC54XgIcytqERpaB0l2bMKmdoNQPGUFi1sVZ79.jpg', 'image', 'public', '1664707987', '1664707987'),
(187, 5, 200, NULL, NULL, NULL, NULL, NULL, NULL, 'yoGEu8P0vhzqZpAeBaUW9nsHi354Jf1Q2DIgtj7O.jpg', 'image', 'public', '1664707987', '1664707987'),
(188, 5, 200, NULL, NULL, NULL, NULL, NULL, NULL, 'HJlwt2GEUfB51h8PTbmrkndVLIWQjpD4caqA7uCo.jpg', 'image', 'public', '1664707987', '1664707987'),
(189, 6, 201, NULL, NULL, NULL, NULL, NULL, NULL, 'vnb8QPtdHD49xacUNTzKLXEfoVl1M3FrAChywgOe.jpg', 'image', 'public', '1664708248', '1664708248'),
(190, 6, 202, NULL, NULL, NULL, NULL, NULL, NULL, 'QvZcuWDjJKfVid3Np8t2P7AoY9hySXqO4aCn0EMU.jpg', 'image', 'public', '1664709082', '1664709082'),
(191, 6, 203, NULL, NULL, NULL, NULL, NULL, NULL, 'g1v7sX6ofbDIScGCx0BQNj4FV3HK95RqTlhUrWty.jpg', 'image', 'public', '1664709111', '1664709111'),
(192, 6, 203, NULL, NULL, NULL, NULL, NULL, NULL, '9z5M4ZDVAfjs8htC73SFwYINuqRgyobPU6LiHne0.jpg', 'image', 'public', '1664709111', '1664709111'),
(193, 6, 204, NULL, NULL, NULL, NULL, NULL, NULL, 'Bh1KsLmiCTdRIlMJo8EN9kfScuH3tP0gveY6V4pG.jpg', 'image', 'public', '1664709141', '1664709141'),
(194, 6, 204, NULL, NULL, NULL, NULL, NULL, NULL, 'D3cEfW8VCUhq5B0xeJLmaNzwgilTjQbPOtknZ2FG.jpg', 'image', 'public', '1664709141', '1664709141'),
(195, 6, 204, NULL, NULL, NULL, NULL, NULL, NULL, 'i2hbP15ApV3zqyIvCGHX0BQREUaFYujlcmLd86WT.jpg', 'image', 'public', '1664709141', '1664709141'),
(196, 6, 205, NULL, NULL, NULL, NULL, NULL, NULL, '7zLVnAWpGgdtI8lrqE51J3sPCNyujSDHcx64BwmK.jpg', 'image', 'public', '1664709142', '1664709142'),
(197, 6, 205, NULL, NULL, NULL, NULL, NULL, NULL, '0KQGVDmHwBkdrXiTUbzACY7I43nRsWNfPEFJqc61.jpg', 'image', 'public', '1664709142', '1664709142'),
(198, 6, 205, NULL, NULL, NULL, NULL, NULL, NULL, 'ywxARldU6DVC7k4hgZeLvbX5sT0tq3rSfpuzQajJ.jpg', 'image', 'public', '1664709142', '1664709142'),
(199, 7, 206, NULL, NULL, NULL, NULL, NULL, NULL, '4mVHtspa36RvIq8SoLhG7AbjFrPBflONJDZWYewg.jpg', 'image', 'public', '1664710875', '1664710875'),
(200, 7, 207, NULL, NULL, NULL, NULL, NULL, NULL, 'vgpPAHDktQ1zL7M9w5sZBj0TORxufUahNWKYIViE.jpg', 'image', 'public', '1664711920', '1664711920'),
(201, 7, 208, NULL, NULL, NULL, NULL, NULL, NULL, 'pOes46gM3jvTcCi2qKNtUQnLhElwIVHZkoF5fxRy.jpg', 'image', 'public', '1664711973', '1664711973'),
(202, 7, 208, NULL, NULL, NULL, NULL, NULL, NULL, 'Lh5zDcdS8PpgZRk2r9eHuvGCFMbQmW0B3T7snOyl.jpg', 'image', 'public', '1664711973', '1664711973'),
(203, 7, 208, NULL, NULL, NULL, NULL, NULL, NULL, 'l5y2LhYFWxrQjXHs7b4ZgcM1w9it8PONCEJuknRA.jpg', 'image', 'public', '1664711973', '1664711973'),
(204, 7, 208, NULL, NULL, NULL, NULL, NULL, NULL, 'KUZv38nzCD5OPGgwTVyXIrN0Rh2qABLelWiaS19x.jpg', 'image', 'public', '1664711973', '1664711973'),
(205, 7, 208, NULL, NULL, NULL, NULL, NULL, NULL, 'u4b3loEkhYHn0NI9DtvyTPVriM2FSLqUR1wexWap.jpg', 'image', 'public', '1664711973', '1664711973'),
(206, 7, 208, NULL, NULL, NULL, NULL, NULL, NULL, 'T7fAb1mMHpGcVL0K3QkxReZYnl4JtjivE8PB65qo.jpg', 'image', 'public', '1664711973', '1664711973'),
(207, 7, 208, NULL, NULL, NULL, NULL, NULL, NULL, '2tNGfQhB1sU0KLMbpYyTx9rncDkASqOC3vjoWZe5.jpg', 'image', 'public', '1664711973', '1664711973'),
(208, 7, 208, NULL, NULL, NULL, NULL, NULL, NULL, '0CKmHSIyjN1L6fMUAlvbFReV5XEroxk8BOgZT3DW.jpg', 'image', 'public', '1664711973', '1664711973'),
(209, 7, 208, NULL, NULL, NULL, NULL, NULL, NULL, '2QTkbrgwUoxFtVWDnK56yYc73q1E09fsjeMBXJla.jpg', 'image', 'public', '1664711973', '1664711973'),
(210, 7, 208, NULL, NULL, NULL, NULL, NULL, NULL, '83KrhdjF0bVUQHPaJMzTvNO7ywsmI6GXfBct9AL1.jpg', 'image', 'public', '1664711973', '1664711973'),
(211, 2, 209, NULL, NULL, NULL, NULL, 6, NULL, 'ASqmFKwQLZb139h0BuE4aNYPlHpToWkfiy6Cvd5G.jpg', 'image', 'public', '1664793408', '1664793408'),
(212, 2, 209, NULL, NULL, NULL, NULL, 6, NULL, 'CdkubBmcUPX5MfLnjlv1Teg6FqhI0wWx8NoQHEYV.jpg', 'image', 'public', '1664793408', '1664793408'),
(213, 2, 209, NULL, NULL, NULL, NULL, 6, NULL, 'Rslwn2KhzayHiWJ7AFYpjQ56kqcVxSoG01L83dZr.jpg', 'image', 'public', '1664793408', '1664793408'),
(214, 2, 209, NULL, NULL, NULL, NULL, 6, NULL, 'qSu2sCVcjXaQGobRJfTI173KD9tAxe8p4dZlHwE0.jpg', 'image', 'public', '1664793408', '1664793408'),
(215, 2, 216, NULL, NULL, NULL, 4, NULL, NULL, 'h1sEKHLxa84oiYZ5tTI9RQDjfdC7qweOnXNMWSzA.jpg', 'image', 'public', '1665384731', '1665384731'),
(216, 2, NULL, NULL, NULL, 17, NULL, NULL, NULL, 'lpFg3U84Zmnd9MzJwIN5Ev1ifjGWVeo7KAsbTPXB.jpg', 'image', NULL, '1665388035', '1665388035'),
(217, 2, NULL, NULL, NULL, 17, NULL, NULL, NULL, '9bw42uTgtHWpABzy8Y1IjMEZkeiSxF7J3crn5KDU.png', 'image', NULL, '1665388036', '1665388036'),
(218, 2, NULL, NULL, NULL, 17, NULL, NULL, NULL, 'c6W5w1UFyvgSfpN4BV3mRxEi2lQYnTDkC9XzAhMJ.jpeg', 'image', NULL, '1665388036', '1665388036'),
(219, 2, NULL, NULL, NULL, 17, NULL, NULL, NULL, 'oeDK9IHpwYVx1SgFdaJQRm8Ct3GyOWfB6ki4XAb5.jpeg', 'image', NULL, '1665388036', '1665388036'),
(222, 2, NULL, NULL, NULL, 18, NULL, NULL, NULL, 'JCpUwTVrc37evl1qMYLtR9QisN4FEW26gKAPoDxk.png', 'image', NULL, '1665642634', '1665642634'),
(223, 2, 246, NULL, NULL, NULL, NULL, NULL, NULL, 'MaXPikYKZ7snxgFurh6Lf1lRUo80jBq39AbODtHS.mp4', 'video', 'public', '1666009812', '1666009812'),
(224, 2, NULL, 6, NULL, NULL, NULL, NULL, NULL, 'ylr3PBVNQTzhg65mHA7dLn8MOscWZYRDtiEqI9C2.jpg', 'image', 'public', '1666078870', '1666078870'),
(226, 2, NULL, 8, NULL, NULL, NULL, NULL, NULL, 'uEOU2QZ6rLpMCkvoFDlVwHxhY7GsdWm1bKRANPgc.jpeg', 'image', 'public', '1666170600', '1666170600'),
(227, 6, NULL, 9, NULL, NULL, NULL, NULL, NULL, 'fbZltOqSCc8pJG9FReaxjuPnmWMkiXhgKo4vrHzQ.jpg', 'image', 'public', '1666183102', '1666183102'),
(228, 5, NULL, 11, NULL, NULL, NULL, NULL, NULL, 'GP5gep9A8ofyHknK0TQY1BIbctCsUuD6rSXwlEvJ.jpg', 'image', 'public', '1666183401', '1666183401'),
(229, 2, 256, NULL, 2, NULL, NULL, NULL, NULL, 'jJliaYVo1KPt8Qx4uAhdpEGvCbsDHSZ5OTMnNFBU.jpg', 'image', 'public', '1666248985', '1666248985'),
(231, 2, 258, NULL, 2, NULL, NULL, NULL, NULL, 'Dg9uAHTKnWMxswaE2o4I36khRqSeBfiNZXcO5Jty.jpg', 'image', 'public', '1666249266', '1666249266'),
(232, 2, 259, NULL, 3, NULL, NULL, NULL, NULL, 'lYIHmnC4VBNZ9fSoAFvDg0W7rkpb6Rdxzj13ULwO.jpg', 'image', 'public', '1666249523', '1666249523'),
(233, 2, 259, NULL, 3, NULL, NULL, NULL, NULL, 'HdYBfyKJQAFzTavX0NR81G46xLhU3jnb9oMScrkC.jpg', 'image', 'public', '1666249523', '1666249523'),
(234, 2, 259, NULL, 3, NULL, NULL, NULL, NULL, 'SvcoODnGtsQCz801HpjkyiZeURhrPMN6VWxLfmTF.jpg', 'image', 'public', '1666249523', '1666249523'),
(235, 2, 259, NULL, 3, NULL, NULL, NULL, NULL, 'Z1Othj7Sb0GpXlu2LiNRwe3z9xsTqAok4PVImEUF.jpg', 'image', 'public', '1666249524', '1666249524'),
(236, 2, 260, NULL, 3, NULL, NULL, NULL, NULL, 'QkXlBGoLSPfcn5F1sC9KmiUbJvpjwVZIh6YOgyxu.jpg', 'image', 'public', '1666249561', '1666249561'),
(237, 2, 261, NULL, 3, NULL, NULL, NULL, NULL, '3mnVdjz8EbItleLNMoRxBPv5OWCa2TuQKGDJ9ksU.jpg', 'image', 'public', '1666249577', '1666249577'),
(238, 2, 262, NULL, 7, NULL, NULL, NULL, NULL, 'xXls7Ft0vpm9AnW1bqGZTVdJDhCOwH6KNgri8Pfo.jpg', 'image', 'public', '1666250551', '1666250551'),
(239, 2, 262, NULL, 7, NULL, NULL, NULL, NULL, 'DrU2gW1HecxdAbBs8tEqZTvnYG5wFp0NVj93JoXC.jpg', 'image', 'public', '1666250552', '1666250552'),
(240, 2, 262, NULL, 7, NULL, NULL, NULL, NULL, '5DdPypnJuvYT4UmeiswKGRZ7LQkWFEzat2SfAlHh.jpg', 'image', 'public', '1666250552', '1666250552'),
(241, 2, 262, NULL, 7, NULL, NULL, NULL, NULL, 'dJmuEhr5HLyB0sakf7nVYQRFD9C6I3gPUqbGzlKx.jpg', 'image', 'public', '1666250552', '1666250552'),
(242, 2, 262, NULL, 7, NULL, NULL, NULL, NULL, 'vY2hAZNrJE7D5RcyPdx8O4mMogITlt3FewjaWUQK.jpg', 'image', 'public', '1666250552', '1666250552'),
(243, 2, 262, NULL, 7, NULL, NULL, NULL, NULL, 'SQpteX73nbxCfjH2qAwPO0rDguYTkKlIE5NJ49yi.jpg', 'image', 'public', '1666250552', '1666250552'),
(244, 2, 262, NULL, 7, NULL, NULL, NULL, NULL, 'YTiKInwlrBFSud6sD9mAeLxXtJV7CGv1ZWpE0zN5.jpg', 'image', 'public', '1666250552', '1666250552'),
(245, 2, 262, NULL, 7, NULL, NULL, NULL, NULL, 'DWL7SnZrMTRgAqKF3PofEcCv2Nmetx65uOJskYai.jpg', 'image', 'public', '1666250552', '1666250552'),
(246, 2, 262, NULL, 7, NULL, NULL, NULL, NULL, '12VXQkha59YWCAqpzJdEsyxgKcZofwUHRPDlTu0r.jpg', 'image', 'public', '1666250552', '1666250552'),
(247, 2, 262, NULL, 7, NULL, NULL, NULL, NULL, '3r5RmDy4FYdMHQfCPwcE1aBlJvsuO2eVpb8ozUGx.jpg', 'image', 'public', '1666250552', '1666250552'),
(248, 2, 263, NULL, NULL, NULL, NULL, 6, NULL, 'mh6ZAuRjiNeYzUy3W7E2fV4qtgsvnMPrSoOXcwdK.mp4', 'video', 'public', '1666257047', '1666257047'),
(249, 2, 264, NULL, NULL, NULL, NULL, 6, NULL, '32x8UqYHMhpabIr6NkGw0WXzDQcJfjRedtoKsT4u.mp4', 'video', 'public', '1666257074', '1666257074'),
(250, 2, 265, NULL, NULL, NULL, 3, NULL, NULL, '4kmBHqRFSNdeuOQD0IJEGTXA8KChi1MrolbyzYV3.mp4', 'video', 'public', '1666258162', '1666258162'),
(251, 2, 266, NULL, NULL, NULL, 2, NULL, NULL, '4fhcKGuIlMwFxRUCJ6Vb2qtgyNrsnE801A5ODSe3.mp4', 'video', 'public', '1666259023', '1666259023'),
(252, 2, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'mDMJ2GKfFqbE6Vo7LQ4HupwjdUhtziv8SZnsgAy1.jpeg', 'image', 'public', '1666528933', '1666528933'),
(253, 2, 267, NULL, NULL, NULL, NULL, NULL, NULL, 'ln8rbWzRBKfvX0uPNYem6OJp59sVxMtqDCFGcayA.jpg', 'image', 'public', '1666594913', '1666594913'),
(254, 2, 267, NULL, NULL, NULL, NULL, NULL, NULL, 'GdNyfur9ZpoRDJOxQs3cWXjYE0Bi8ltM6P7K5Ta2.jpg', 'image', 'public', '1666594913', '1666594913'),
(255, 4, 268, NULL, NULL, NULL, NULL, NULL, NULL, '5EN2PeGqu8fdKnX6Lm0MktFIzvTWHj1hRaB97rsg.jpg', 'image', 'public', '1666595184', '1666595184'),
(256, 2, 271, NULL, NULL, NULL, NULL, NULL, NULL, 'xjAV3Z6M4lgmvDSGkJHLKNPqXTO2I7YhU5FiQpbz.mp4', 'video', 'public', '1666622200', '1666622200'),
(257, 2, 272, NULL, NULL, NULL, NULL, NULL, NULL, 'orPyfniSpJgQOU82hbFEaLjxYNkqMmzsew7dB0G1.png', 'image', 'public', '1666622424', '1666622424'),
(258, 7, NULL, 14, NULL, NULL, NULL, NULL, NULL, 'zICywcvoOTRjGdx0ZHkhNXtUAB9gP6rs7DFVW134.jpg', 'image', 'public', '1666694311', '1666694311'),
(259, 2, NULL, 15, NULL, NULL, NULL, NULL, NULL, 'M7Yunbr1BtJhUqNO0dVwWvTsLafekjRyDgp4zFPX.jpg', 'image', 'public', '1666694346', '1666694346'),
(260, 4, NULL, 17, NULL, NULL, NULL, NULL, NULL, 'RuliebpdIfYUj94V0DsFE5z1NSwarPnxT23kcQZG.jpg', 'image', 'public', '1666695758', '1666695758'),
(261, 2, 274, NULL, NULL, NULL, NULL, NULL, NULL, 'vFT6WLr2n4JPmgtaS8HqNjZw1lu30x5fOEVRboUA.jpg', 'image', 'public', '1667204120', '1667204120'),
(262, 2, 274, NULL, NULL, NULL, NULL, NULL, NULL, '2YTweOCGcfWsqy6DIlxo0JPhzm4kHUrbANKjQpXR.jpg', 'image', 'public', '1667204123', '1667204123'),
(263, 2, 274, NULL, NULL, NULL, NULL, NULL, NULL, 'BCIl7G2m6AfNcz5b4WPnjdDvgJLu3eFwYKTq1VME.jpg', 'image', 'public', '1667204124', '1667204124'),
(264, 2, 274, NULL, NULL, NULL, NULL, NULL, NULL, 'HeamNk36h0Ayx591F8Tdl7gzrPnwWspEOBcZtGfo.jpg', 'image', 'public', '1667204126', '1667204126'),
(265, 2, 274, NULL, NULL, NULL, NULL, NULL, NULL, '8zpaLjOyPldvoN346UIFuBiGrExsMkwhZ5YqR7AQ.jpg', 'image', 'public', '1667204127', '1667204127'),
(266, 2, 274, NULL, NULL, NULL, NULL, NULL, NULL, '8VP1g3hJk6Mrsc4bH9pqXFB2CSmUaijdyztZevKY.jpg', 'image', 'public', '1667204129', '1667204129'),
(267, 2, 274, NULL, NULL, NULL, NULL, NULL, NULL, 'VwyRKLbUPE4CsaqkFm2pW1DcroetAYZjOf0uJhTi.jpg', 'image', 'public', '1667204130', '1667204130'),
(268, 2, 274, NULL, NULL, NULL, NULL, NULL, NULL, 'FWkrbZuBIiHz28asCcVm9Kvp3gRUNXlPMjoA7e6w.jpg', 'image', 'public', '1667204130', '1667204130'),
(269, 2, 274, NULL, NULL, NULL, NULL, NULL, NULL, 'TP3iV90ImhUrxDAsz7HKkfO6N5yRpnXjM2Zt1bqC.jpg', 'image', 'public', '1667204131', '1667204131'),
(270, 2, NULL, 18, NULL, NULL, NULL, NULL, NULL, '8P1XKLxn5GAsEa9DZzMHUcgCQvliTNh40kyIowR2.jpeg', 'image', 'public', '1667285000', '1667285000'),
(271, 3, NULL, NULL, NULL, 12, NULL, NULL, NULL, 'CuxQt1n6mOBdKWpiEYz8ZMP9o7F3Alhv5UGgskfq.jpg', 'image', NULL, '1667371403', '1667371403'),
(272, 3, NULL, NULL, NULL, 12, NULL, NULL, NULL, 'cTUiRgj0378fAyGCwqdPFVW4KXkhvzpoQZOBl2SJ.jpg', 'image', NULL, '1667371403', '1667371403'),
(273, 3, NULL, NULL, NULL, 12, NULL, NULL, NULL, 'PqURSG98h7ruKwmAaYv2MFc1VXBOJlnNQT63xWek.jpg', 'image', NULL, '1667371404', '1667371404'),
(274, 3, NULL, NULL, NULL, 12, NULL, NULL, NULL, 'Ez7AbiDP1JCahxIKe4SU0mGLVQlO9ro8kTZdNHyg.jpg', 'image', NULL, '1667371404', '1667371404'),
(275, 3, NULL, NULL, NULL, 13, NULL, NULL, NULL, 'WNQvVXbUuGHAKC7we2TM5FniZ1jkDSL03l8dc6Jx.jpg', 'image', NULL, '1667373056', '1667373056'),
(276, 3, NULL, NULL, NULL, 13, NULL, NULL, NULL, 'wImHVv5oMPs3W8XRD7eYu2gltrpz0jLSG9O16kcU.jpg', 'image', NULL, '1667373057', '1667373057'),
(277, 3, NULL, NULL, NULL, 13, NULL, NULL, NULL, 'ImkXyGDHW5JfoAPts4Q8EcpuTvKdjNVgaYir9Rxh.jpg', 'image', NULL, '1667373057', '1667373057'),
(278, 3, NULL, NULL, NULL, 13, NULL, NULL, NULL, 'MbSkQ9gajl4ximWU2LnyREh6w0KBYzOTDZHf5GeI.png', 'image', NULL, '1667373057', '1667373057'),
(279, 3, NULL, NULL, NULL, 10, NULL, NULL, NULL, 'NIej7OVDAQCnmdMFBuRLGXEYrJ8lgv631axKbytf.jpg', 'image', NULL, '1667374057', '1667374057'),
(280, 3, NULL, NULL, NULL, 10, NULL, NULL, NULL, '4I3Oug1pjmTSoNBVvz75X2aMebhFGJDtQxyHLcWZ.jpg', 'image', NULL, '1667374057', '1667374057'),
(281, 3, NULL, NULL, NULL, 10, NULL, NULL, NULL, 'eU485iEAaSmlPzoYDj3pMgd0RCQTONWVrxsH9wky.png', 'image', NULL, '1667374057', '1667374057'),
(282, 3, NULL, NULL, NULL, 10, NULL, NULL, NULL, 'XqK820ELvzhileYdbtQRHZufFoS6AsDm9T3OCBkr.png', 'image', NULL, '1667374058', '1667374058'),
(283, 3, NULL, NULL, NULL, 11, NULL, NULL, NULL, 'RS3lqhxB4yvHQc6Tp0wVgsJbi5krm8oIAd7LG2NY.jpg', 'image', NULL, '1667375742', '1667375742'),
(284, 3, NULL, NULL, NULL, 11, NULL, NULL, NULL, 'iKvQqHWO12SPodju8a7cmMbAZLr6T4EUsCDBzpft.png', 'image', NULL, '1667375742', '1667375742'),
(285, 3, NULL, NULL, NULL, 11, NULL, NULL, NULL, 'm8vZCkg0TXuANJVYlW74yn1DLEijqac5brQpzBKU.png', 'image', NULL, '1667375743', '1667375743'),
(286, 3, NULL, NULL, NULL, 11, NULL, NULL, NULL, 'QMzoDE046HvcRgqSABrtNhIYTGZ9e7yLiOn5lpbV.png', 'image', NULL, '1667375743', '1667375743'),
(287, 4, NULL, NULL, NULL, 15, NULL, NULL, NULL, 'V67gc1ZrJatCsoYmujxTwlzQfvnPbN8204yHLWEq.png', 'image', NULL, '1667376623', '1667376623'),
(288, 4, NULL, NULL, NULL, 15, NULL, NULL, NULL, 'M5Tgh07Le3oOytZ8cAwDrfklHasmCqFYNJQGij2u.jpg', 'image', NULL, '1667376623', '1667376623'),
(289, 4, NULL, NULL, NULL, 15, NULL, NULL, NULL, 'yLbIO4ucGpgYq6nvh9akmoi5xJZr0VB3HwQTldeE.jpg', 'image', NULL, '1667376624', '1667376624'),
(290, 4, NULL, NULL, NULL, 15, NULL, NULL, NULL, '5FHiBYylRgM6Akz403Qs8VZOcj7tNrWopD9STaJe.png', 'image', NULL, '1667376624', '1667376624'),
(291, 4, NULL, NULL, NULL, 14, NULL, NULL, NULL, 'lRyaPCY4N7rVuZfBxd9Tq0zAOXK2bwhiQ1DjkWSc.jpg', 'image', NULL, '1667377833', '1667377833'),
(292, 4, NULL, NULL, NULL, 14, NULL, NULL, NULL, 'Kk0bErfUcnCi2yxWSzv4wZMGAuh8tBjL7TqsYO63.jpg', 'image', NULL, '1667377833', '1667377833'),
(293, 4, NULL, NULL, NULL, 14, NULL, NULL, NULL, 'hjCdqGtmPiIvwl0FZVAJY3ONxULM1y6an8reRuHc.jpg', 'image', NULL, '1667377833', '1667377833'),
(294, 4, NULL, NULL, NULL, 14, NULL, NULL, NULL, 'aAgR4YSnb7X3FEjvMJylxQcktBiZW0f9PCu5HIVO.jpg', 'image', NULL, '1667377833', '1667377833');

-- --------------------------------------------------------

--
-- Table structure for table `message_thrades`
--

DROP TABLE IF EXISTS `message_thrades`;
CREATE TABLE `message_thrades` (
  `id` int(11) NOT NULL,
  `reciver_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `chatcenter` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message_thrades`
--

INSERT INTO `message_thrades` (`id`, `reciver_id`, `sender_id`, `chatcenter`, `created_at`, `updated_at`) VALUES
(1, 2, 2, NULL, '2022-09-18 23:57:15', '2022-09-18 23:57:15'),
(2, 3, 3, NULL, '2022-09-20 03:01:00', '2022-09-20 03:01:00'),
(3, 4, 2, NULL, '2022-09-26 01:07:49', '2022-09-26 01:07:49'),
(4, 7, 2, NULL, '2022-10-02 04:20:36', '2022-10-02 04:20:36'),
(5, 2, 5, NULL, '2022-10-16 00:40:26', '2022-10-16 00:40:26'),
(6, 3, 2, NULL, '2022-10-20 01:04:54', '2022-10-20 01:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
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

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_user_id`, `reciver_user_id`, `type`, `event_id`, `page_id`, `group_id`, `status`, `view`, `created_at`, `updated_at`) VALUES
(2, 4, 2, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-09-19 04:10:45', '2022-10-16 00:57:23'),
(6, 2, 11, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-02 02:06:40', '2022-10-02 02:06:40'),
(8, 3, 2, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-02 02:23:06', '2022-10-16 00:57:15'),
(9, 4, 2, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-02 02:35:16', '2022-10-16 00:57:23'),
(10, 5, 2, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-02 02:45:06', '2022-10-16 00:52:20'),
(11, 6, 2, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-02 02:57:43', '2022-10-16 00:57:21'),
(12, 6, 5, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-02 02:58:10', '2022-10-16 00:23:42'),
(13, 6, 3, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-02 02:58:43', '2022-10-16 00:56:29'),
(14, 6, 4, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-02 02:59:05', '2022-10-16 00:53:18'),
(15, 5, 6, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-02 03:19:34', '2022-10-16 00:55:14'),
(16, 5, 4, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-02 03:35:03', '2022-10-16 00:53:14'),
(17, 5, 3, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-02 03:35:21', '2022-10-16 00:56:32'),
(18, 7, 2, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-02 03:36:24', '2022-10-16 00:57:18'),
(19, 7, 4, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-02 03:36:34', '2022-10-16 00:53:17'),
(20, 7, 5, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-02 03:36:42', '2022-10-02 04:01:24'),
(21, 7, 6, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-02 03:37:04', '2022-10-03 23:26:46'),
(22, 7, 3, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-02 03:37:24', '2022-10-16 00:56:28'),
(23, 5, 7, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-02 04:01:24', '2022-10-16 00:55:38'),
(24, 2, 7, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-02 04:02:45', '2022-10-16 00:55:40'),
(25, 2, 7, 'event', 6, NULL, NULL, 1, 1, '2022-10-03 02:47:15', '2022-10-16 00:55:40'),
(26, 2, 6, 'event', 6, NULL, NULL, 1, 1, '2022-10-03 02:47:16', '2022-10-16 00:55:16'),
(27, 2, 5, 'event', 6, NULL, NULL, 1, 1, '2022-10-03 02:47:17', '2022-10-16 00:34:15'),
(30, 2, 11, 'event', 6, NULL, NULL, 0, 0, '2022-10-03 02:47:27', '2022-10-03 02:47:27'),
(31, 2, 11, 'group', NULL, NULL, 6, 0, 0, '2022-10-03 03:00:27', '2022-10-03 03:00:27'),
(32, 2, 10, 'group', NULL, NULL, 6, 0, 0, '2022-10-03 03:00:40', '2022-10-03 03:00:40'),
(33, 2, 7, 'group', NULL, NULL, 6, 1, 1, '2022-10-03 03:00:45', '2022-10-16 00:55:40'),
(34, 2, 6, 'group', NULL, NULL, 6, 1, 1, '2022-10-03 03:00:50', '2022-10-16 00:55:16'),
(35, 2, 7, 'group', NULL, NULL, 6, 1, 1, '2022-10-03 03:00:56', '2022-10-16 00:55:40'),
(36, 2, 6, 'group', NULL, NULL, 6, 1, 1, '2022-10-03 04:22:38', '2022-10-16 00:55:16'),
(37, 2, 12, 'group', NULL, NULL, 6, 0, 0, '2022-10-03 04:23:03', '2022-10-03 04:23:03'),
(38, 2, 12, 'group', NULL, NULL, 6, 0, 0, '2022-10-03 04:23:03', '2022-10-03 04:23:03'),
(39, 5, 2, 'event_invitation_accept', NULL, NULL, NULL, 1, 1, '2022-10-03 23:24:26', '2022-10-16 00:52:20'),
(40, 6, 2, 'group_invitation_accept', NULL, NULL, NULL, 1, 1, '2022-10-03 23:26:31', '2022-10-16 00:57:21'),
(41, 6, 7, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-03 23:26:46', '2022-10-16 00:55:32'),
(42, 2, 11, 'event', 4, NULL, NULL, 0, 0, '2022-10-10 00:25:50', '2022-10-10 00:25:50'),
(46, 2, 5, 'event', 4, NULL, NULL, 1, 1, '2022-10-10 00:25:55', '2022-10-16 00:34:15'),
(47, 2, 6, 'event', 4, NULL, NULL, 1, 1, '2022-10-10 00:25:57', '2022-10-16 00:55:16'),
(48, 2, 7, 'event', 4, NULL, NULL, 1, 1, '2022-10-10 00:25:59', '2022-10-16 00:55:40'),
(49, 5, 6, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:23:42', '2022-10-16 00:55:14'),
(50, 5, 2, 'event_invitation_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:34:15', '2022-10-16 00:52:20'),
(51, 5, 2, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:50:27', '2022-10-16 00:52:20'),
(52, 5, 3, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:50:28', '2022-10-16 00:56:32'),
(53, 5, 4, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:50:30', '2022-10-16 00:53:14'),
(54, 5, 6, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:50:32', '2022-10-16 00:55:14'),
(55, 5, 7, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:51:39', '2022-10-16 00:55:38'),
(56, 5, 11, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:51:43', '2022-10-16 00:51:43'),
(57, 5, 10, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:51:45', '2022-10-16 00:51:45'),
(58, 5, 9, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:51:46', '2022-10-16 00:51:46'),
(59, 5, 8, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:51:48', '2022-10-16 00:51:48'),
(60, 2, 5, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:52:20', '2022-10-16 01:01:26'),
(61, 4, 5, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:53:14', '2022-10-16 01:01:27'),
(62, 4, 2, 'event_invitation_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:53:16', '2022-10-16 00:57:23'),
(63, 4, 7, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:53:17', '2022-10-16 00:55:37'),
(64, 4, 6, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:53:18', '2022-10-16 00:55:12'),
(65, 4, 2, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:54:03', '2022-10-16 00:57:23'),
(66, 4, 3, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:54:12', '2022-10-16 00:56:31'),
(67, 4, 6, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:54:14', '2022-10-16 00:55:12'),
(68, 4, 7, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:54:16', '2022-10-16 00:55:37'),
(69, 4, 8, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:54:18', '2022-10-16 00:54:18'),
(70, 4, 9, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:54:22', '2022-10-16 00:54:22'),
(71, 4, 11, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:54:25', '2022-10-16 00:54:25'),
(72, 4, 10, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:54:28', '2022-10-16 00:54:28'),
(73, 6, 2, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:54:52', '2022-10-16 00:57:21'),
(74, 6, 3, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:54:54', '2022-10-16 00:56:29'),
(75, 6, 7, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:54:57', '2022-10-16 00:55:32'),
(76, 6, 8, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:54:58', '2022-10-16 00:54:58'),
(77, 6, 10, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:55:02', '2022-10-16 00:55:02'),
(78, 6, 9, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:55:04', '2022-10-16 00:55:04'),
(79, 6, 11, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:55:06', '2022-10-16 00:55:06'),
(80, 6, 12, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:55:08', '2022-10-16 00:55:08'),
(81, 6, 4, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:55:12', '2022-10-16 23:22:49'),
(82, 6, 5, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:55:14', '2022-10-16 01:01:24'),
(83, 6, 2, 'event_invitation_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:55:16', '2022-10-16 00:57:21'),
(84, 7, 6, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:55:32', '2022-10-16 01:05:15'),
(85, 7, 4, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:55:37', '2022-10-16 23:22:48'),
(86, 7, 5, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:55:38', '2022-10-16 01:01:25'),
(87, 7, 2, 'event_invitation_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:55:40', '2022-10-16 00:57:18'),
(88, 7, 2, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:55:51', '2022-10-16 00:57:18'),
(89, 7, 3, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:55:53', '2022-10-16 00:56:28'),
(90, 7, 8, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:55:55', '2022-10-16 00:55:55'),
(91, 7, 9, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:55:57', '2022-10-16 00:55:57'),
(92, 7, 10, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:55:59', '2022-10-16 00:55:59'),
(93, 7, 11, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:56:00', '2022-10-16 00:56:00'),
(94, 7, 12, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:56:03', '2022-10-16 00:56:03'),
(95, 3, 7, 'friend_request_accept', NULL, NULL, NULL, 0, 0, '2022-10-16 00:56:28', '2022-10-16 00:56:28'),
(96, 3, 6, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:56:29', '2022-10-16 01:05:13'),
(97, 3, 4, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:56:31', '2022-10-16 23:22:47'),
(98, 3, 5, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:56:32', '2022-10-16 01:01:23'),
(99, 3, 2, 'event_invitation_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:56:33', '2022-10-16 00:57:15'),
(100, 3, 2, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-16 00:56:44', '2022-10-16 00:57:15'),
(101, 3, 8, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:56:46', '2022-10-16 00:56:46'),
(102, 3, 9, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:56:48', '2022-10-16 00:56:48'),
(103, 3, 10, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:56:50', '2022-10-16 00:56:50'),
(104, 3, 11, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:56:52', '2022-10-16 00:56:52'),
(105, 3, 12, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-16 00:56:54', '2022-10-16 00:56:54'),
(107, 2, 7, 'friend_request_accept', NULL, NULL, NULL, 0, 0, '2022-10-16 00:57:18', '2022-10-16 00:57:18'),
(108, 2, 6, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-10-16 00:57:21', '2022-10-16 01:05:12'),
(111, 3, 2, 'event_invitation_accept', NULL, NULL, NULL, 1, 1, '2022-10-17 00:59:40', '2022-10-18 02:43:27'),
(113, 2, 7, 'event', 3, NULL, NULL, 0, 0, '2022-10-19 02:10:30', '2022-10-19 02:10:30'),
(114, 2, 6, 'event', 3, NULL, NULL, 0, 0, '2022-10-19 02:11:31', '2022-10-19 02:11:31'),
(115, 2, 9, 'group', NULL, NULL, 6, 0, 0, '2022-10-20 01:34:02', '2022-10-20 01:34:02'),
(116, 2, 9, 'group', NULL, NULL, 6, 0, 0, '2022-10-20 01:34:02', '2022-10-20 01:34:02'),
(117, 2, 8, 'group', NULL, NULL, 6, 0, 0, '2022-10-20 01:34:02', '2022-10-20 01:34:02'),
(118, 2, 8, 'group', NULL, NULL, 6, 0, 0, '2022-10-20 01:34:02', '2022-10-20 01:34:02'),
(119, 2, 9, 'group', NULL, NULL, 6, 0, 0, '2022-10-20 01:34:02', '2022-10-20 01:34:02'),
(120, 2, 9, 'group', NULL, NULL, 6, 0, 0, '2022-10-20 01:34:02', '2022-10-20 01:34:02'),
(121, 2, 8, 'group', NULL, NULL, 6, 0, 0, '2022-10-20 01:34:02', '2022-10-20 01:34:02'),
(122, 2, 8, 'group', NULL, NULL, 6, 0, 0, '2022-10-20 01:34:02', '2022-10-20 01:34:02'),
(123, 2, 7, 'group', NULL, NULL, 1, 0, 0, '2022-10-24 01:13:00', '2022-10-24 01:13:00'),
(124, 2, 7, 'event', 5, NULL, NULL, 0, 0, '2022-10-24 21:17:47', '2022-10-24 21:17:47'),
(125, 2, 6, 'event', 5, NULL, NULL, 0, 0, '2022-10-24 21:17:50', '2022-10-24 21:17:50'),
(126, 2, 3, 'profile', NULL, NULL, NULL, 1, 1, '2022-10-31 00:02:40', '2022-11-02 21:58:48'),
(127, 2, 8, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-31 00:02:42', '2022-10-31 00:02:42'),
(128, 2, 9, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-31 00:02:44', '2022-10-31 00:02:44'),
(129, 2, 10, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-31 00:02:45', '2022-10-31 00:02:45'),
(130, 2, 11, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-31 00:02:47', '2022-10-31 00:02:47'),
(131, 2, 12, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-31 00:02:49', '2022-10-31 00:02:49'),
(132, 2, 13, 'profile', NULL, NULL, NULL, 0, 0, '2022-10-31 00:02:51', '2022-10-31 00:02:51'),
(133, 4, 10, 'event', 5, NULL, NULL, 0, 0, '2022-10-31 02:18:51', '2022-10-31 02:18:51'),
(134, 3, 2, 'friend_request_accept', NULL, NULL, NULL, 1, 1, '2022-11-02 21:58:48', '2022-11-03 01:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `pagecategories`
--

DROP TABLE IF EXISTS `pagecategories`;
CREATE TABLE `pagecategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pagecategories`
--

INSERT INTO `pagecategories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Travel', '2022-09-14 01:14:10', '2022-09-14 06:21:07'),
(2, 'Food / Grocery', '2022-09-14 22:18:04', '2022-09-14 22:20:08'),
(3, 'Book Store', '2022-09-14 22:18:58', '2022-09-14 22:18:58'),
(4, 'Restaurant / Café', '2022-09-14 22:19:22', '2022-09-14 22:19:22'),
(5, 'Shopping / Retail', '2022-09-14 22:20:52', '2022-09-14 22:20:52'),
(6, 'Tv', '2022-09-19 00:03:09', '2022-09-19 00:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `user_id`, `title`, `subtitle`, `page_type`, `category_id`, `logo`, `coverphoto`, `description`, `job`, `lifestyle`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'New York Travel Diary', NULL, NULL, 4, '24795.png', '881.jpg', 'A story in New York.', 'Student', 'Blogger', 'New York.', NULL, '2022-09-14 01:14:46', '2022-11-02 23:05:09'),
(2, 2, 'BOOK LAP', NULL, NULL, 2, '1713.jpg', '31760.jpg', 'Any books you require at home on you lap. Happy reading.', 'Sellar', 'Books learning', 'Los Angeles', NULL, '2022-09-18 04:35:44', '2022-11-02 03:46:18'),
(3, 2, 'Food Network', NULL, NULL, 2, '10820.jpg', '31096.jpg', 'Welcome to the official Food Network Facebook page, where you can chat with chefs, get recipes and connect with food-minded friends.', 'Sellar', 'cooking', 'New York.', NULL, '2022-09-18 04:37:25', '2022-11-02 03:32:50'),
(4, 2, 'The Grand Castle -Restaurant & Party Center', NULL, NULL, 2, '1658.jpg', '23299.jpg', 'Good chef is a multi-cusine fine dine restaurant offering a range of dishes from breakfast to', 'Sellar', 'cooking', 'New York.', NULL, '2022-09-18 04:38:46', '2022-11-02 03:02:57'),
(5, 4, 'Goodie Travel', NULL, NULL, 4, '26365.jpg', '32900.jpg', 'GoodieTravel is about exploring and learning about the world around us.', NULL, NULL, NULL, NULL, '2022-09-18 23:28:05', '2022-11-02 22:25:14'),
(6, 4, 'Food fest', NULL, NULL, 4, '17350.jpg', '8733.jpg', 'We are not only selling the premium products, but also selling the product which makes you feel premium.', NULL, NULL, NULL, NULL, '2022-09-18 23:31:36', '2022-11-02 21:31:14'),
(7, 4, 'Green Grocery', NULL, NULL, 4, '2917.png', '34360.jpg', 'ut\r\nSee all\r\nEating right is indispensable to stay strong and have a happy and normal life. Green Grocery has set a new norm by continuously delivering foods of the best quality with their safety and hygiene ensured.', 'Sellar', 'Business', 'Chicago', NULL, '2022-09-18 23:36:14', '2022-11-02 21:20:37'),
(8, 4, 'Book Learn', NULL, NULL, 4, '21007.jpg', '22115.jpg', 'Hello, you have found a bookstore!!', 'Sellar', 'Books learning', 'San Diego,', NULL, '2022-09-19 01:04:58', '2022-11-02 01:54:39'),
(9, 4, 'Smart Books', NULL, NULL, 4, '32815.jpg', '1091.jpg', 'Best online book reseller in USA. Print On Demand. Inbox the book\'s name and price will be given.', 'Photographar', 'Photography', 'New York.', NULL, '2022-09-19 01:06:20', '2022-11-02 01:34:55'),
(10, 4, 'Dress\'s gallery', NULL, NULL, 4, '24720.jpg', '29272.jpg', 'This is an online shopping page where you can find the dress of your choice at a low price', 'Sellar', 'fashion', 'San Diego,', NULL, '2022-09-19 01:16:58', '2022-11-02 22:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `page_likes`
--

DROP TABLE IF EXISTS `page_likes`;
CREATE TABLE `page_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_likes`
--

INSERT INTO `page_likes` (`id`, `user_id`, `page_id`, `role`, `created_at`, `updated_at`) VALUES
(39, 6, 1, 'general', '2022-10-16 02:21:08', '2022-10-16 02:21:08'),
(40, 6, 2, 'general', '2022-10-16 02:21:09', '2022-10-16 02:21:09'),
(42, 6, 3, 'general', '2022-10-16 02:42:36', '2022-10-16 02:42:36'),
(45, 2, 1, 'general', '2022-10-16 04:38:42', '2022-10-16 04:38:42'),
(46, 2, 2, 'general', '2022-10-16 23:20:09', '2022-10-16 23:20:09'),
(48, 2, 3, 'general', '2022-10-16 23:20:23', '2022-10-16 23:20:23'),
(49, 2, 10, 'general', '2022-10-16 23:20:27', '2022-10-16 23:20:27'),
(53, 2, 9, 'general', '2022-10-16 23:20:37', '2022-10-16 23:20:37'),
(58, 6, 9, 'general', '2022-10-16 23:21:12', '2022-10-16 23:21:12'),
(59, 6, 10, 'general', '2022-10-16 23:21:13', '2022-10-16 23:21:13'),
(60, 5, 1, 'general', '2022-10-16 23:21:30', '2022-10-16 23:21:30'),
(61, 5, 3, 'general', '2022-10-16 23:21:32', '2022-10-16 23:21:32'),
(62, 5, 2, 'general', '2022-10-16 23:21:34', '2022-10-16 23:21:34'),
(68, 5, 9, 'general', '2022-10-16 23:21:47', '2022-10-16 23:21:47'),
(69, 5, 10, 'general', '2022-10-16 23:21:50', '2022-10-16 23:21:50'),
(70, 4, 1, 'general', '2022-10-16 23:22:06', '2022-10-16 23:22:06'),
(71, 4, 2, 'general', '2022-10-16 23:22:09', '2022-10-16 23:22:09'),
(72, 4, 3, 'general', '2022-10-16 23:22:11', '2022-10-16 23:22:11'),
(78, 4, 9, 'general', '2022-10-16 23:22:22', '2022-10-16 23:22:22'),
(79, 4, 10, 'general', '2022-10-16 23:22:24', '2022-10-16 23:22:24'),
(80, 3, 1, 'general', '2022-10-16 23:23:04', '2022-10-16 23:23:04'),
(81, 3, 2, 'general', '2022-10-16 23:23:06', '2022-10-16 23:23:06'),
(82, 3, 3, 'general', '2022-10-16 23:23:09', '2022-10-16 23:23:09'),
(88, 3, 9, 'general', '2022-10-16 23:23:20', '2022-10-16 23:23:20'),
(89, 3, 10, 'general', '2022-10-16 23:23:22', '2022-10-16 23:23:22'),
(90, 2, 4, 'general', '2022-10-20 01:39:13', '2022-10-20 01:39:13'),
(91, 7, 3, 'general', '2022-10-29 23:28:13', '2022-10-29 23:28:13'),
(92, 5, 4, 'general', '2022-11-02 03:58:53', '2022-11-02 03:58:53'),
(93, 5, 5, 'general', '2022-11-02 03:58:56', '2022-11-02 03:58:56'),
(94, 5, 6, 'general', '2022-11-02 03:58:58', '2022-11-02 03:58:58'),
(95, 5, 7, 'general', '2022-11-02 03:59:00', '2022-11-02 03:59:00'),
(96, 5, 8, 'general', '2022-11-02 03:59:02', '2022-11-02 03:59:02'),
(97, 6, 4, 'general', '2022-11-02 04:00:17', '2022-11-02 04:00:17'),
(98, 6, 5, 'general', '2022-11-02 04:00:22', '2022-11-02 04:00:22'),
(99, 6, 6, 'general', '2022-11-02 04:00:25', '2022-11-02 04:00:25'),
(100, 6, 7, 'general', '2022-11-02 04:00:28', '2022-11-02 04:00:28'),
(101, 6, 8, 'general', '2022-11-02 04:00:33', '2022-11-02 04:00:33'),
(102, 7, 1, 'general', '2022-11-02 04:01:00', '2022-11-02 04:01:00'),
(103, 7, 2, 'general', '2022-11-02 04:01:07', '2022-11-02 04:01:07'),
(104, 7, 4, 'general', '2022-11-02 04:01:10', '2022-11-02 04:01:10'),
(105, 7, 5, 'general', '2022-11-02 04:01:12', '2022-11-02 04:01:12'),
(106, 7, 6, 'general', '2022-11-02 04:01:14', '2022-11-02 04:01:14'),
(107, 7, 7, 'general', '2022-11-02 04:01:16', '2022-11-02 04:01:16'),
(108, 7, 8, 'general', '2022-11-02 04:01:18', '2022-11-02 04:01:18'),
(109, 7, 9, 'general', '2022-11-02 04:01:21', '2022-11-02 04:01:21'),
(110, 7, 10, 'general', '2022-11-02 04:01:22', '2022-11-02 04:01:22'),
(111, 4, 4, 'general', '2022-11-02 04:02:02', '2022-11-02 04:02:02'),
(112, 4, 5, 'general', '2022-11-02 04:02:05', '2022-11-02 04:02:05'),
(113, 4, 6, 'general', '2022-11-02 04:02:07', '2022-11-02 04:02:07'),
(114, 4, 7, 'general', '2022-11-02 04:02:09', '2022-11-02 04:02:09'),
(115, 4, 8, 'general', '2022-11-02 04:02:11', '2022-11-02 04:02:11'),
(116, 3, 4, 'general', '2022-11-02 22:28:38', '2022-11-02 22:28:38'),
(117, 3, 5, 'general', '2022-11-02 22:28:43', '2022-11-02 22:28:43'),
(118, 3, 6, 'general', '2022-11-02 22:28:47', '2022-11-02 22:28:47'),
(119, 3, 7, 'general', '2022-11-02 22:28:50', '2022-11-02 22:28:50'),
(120, 3, 8, 'general', '2022-11-02 22:28:52', '2022-11-02 22:28:52'),
(121, 2, 5, 'general', '2022-11-02 23:05:26', '2022-11-02 23:05:26'),
(122, 2, 6, 'general', '2022-11-02 23:05:28', '2022-11-02 23:05:28'),
(123, 2, 7, 'general', '2022-11-02 23:05:33', '2022-11-02 23:05:33'),
(124, 2, 8, 'general', '2022-11-02 23:05:36', '2022-11-02 23:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mahabubmorshed4720@gmail.com', '$2y$10$Wk2R9igop/FEkfiTWOMQWOAUHaGczA6GCclSrSgl9EIVT7C.3bY9S', '2022-09-19 04:30:43'),
('admin@example.com', '$2y$10$OTKFARlUCbkUnlME9TiEa.VGUBE5fZm52QeVGELL0QqHXyKXS4paa', '2022-10-16 22:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
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

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `publisher` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `post_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `privacy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tagged_user_ids` longtext COLLATE utf8_unicode_ci NOT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `location` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `report_status` tinyint(1) NOT NULL DEFAULT 0,
  `user_reacts` longtext COLLATE utf8_unicode_ci NOT NULL,
  `shared_user` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `publisher`, `publisher_id`, `post_type`, `privacy`, `tagged_user_ids`, `activity_id`, `location`, `description`, `status`, `report_status`, `user_reacts`, `shared_user`, `created_at`, `updated_at`) VALUES
(3, 2, 'video_and_shorts', 1, 'general', 'public', '[]', NULL, NULL, 'USA', 'active', 0, '{\"2\":\"like\"}', NULL, '1662964886', '1662964886'),
(9, 2, 'video_and_shorts', 2, 'general', 'public', '[]', NULL, NULL, 'New York, the city view.', 'active', 0, '[]', NULL, '1663137274', '1663137274'),
(10, 2, 'video_and_shorts', 3, 'general', 'public', '[]', NULL, NULL, 'New York,the city view.', 'active', 0, '[]', NULL, '1663137321', '1663137321'),
(11, 2, 'event', 2, 'event', 'public', '[]', NULL, NULL, '<p>&nbsp;</p>\r\n\r\n<p>Curtain Up Broadway Festival returns to Times Square! ⭐️ This exciting three-day event celebrates the the Broadway community and new 2022 season in the heart of&nbsp;</p>', 'active', 0, '[]', NULL, '1663137889', '1663137889'),
(16, 3, 'post', 3, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '[]', NULL, '1663563185', '1663563185'),
(17, 3, 'page', 5, 'general', 'public', '[]', 0, '', 'It\'s almost the weekend!!!', 'active', 0, '[]', '[]', '1663565323', '1663565323'),
(18, 3, 'page', 5, 'general', 'public', '[]', 0, '', 'Consider others in your actions', 'active', 0, '[]', '[]', '1663565359', '1663565359'),
(19, 3, 'page', 5, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663565395', '1663565395'),
(20, 3, 'page', 5, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663565403', '1663565403'),
(21, 3, 'page', 6, 'general', 'public', '[]', 0, '', 'Collect Your Favorite Korean Ramen and Sauces. These are Halal and Authentic.', 'active', 0, '[]', '[]', '1663565614', '1663565614'),
(22, 2, 'video_and_shorts', 4, 'general', 'public', '[]', NULL, NULL, 'City View', 'active', 0, '[]', NULL, '1663566813', '1663566813'),
(23, 2, 'video_and_shorts', 5, 'general', 'public', '[]', NULL, NULL, 'Last night', 'active', 0, '[]', NULL, '1663566961', '1663566961'),
(24, 3, 'video_and_shorts', 6, 'general', 'public', '[]', NULL, NULL, 'Busy world', 'active', 0, '[]', NULL, '1663568927', '1663568927'),
(25, 3, 'video_and_shorts', 7, 'general', 'public', '[]', NULL, NULL, 'Nature view', 'active', 0, '[]', NULL, '1663568995', '1663568995'),
(26, 3, 'video_and_shorts', 8, 'general', 'public', '[]', NULL, NULL, 'The sky', 'active', 0, '[]', NULL, '1663569196', '1663569196'),
(27, 3, 'event', 4, 'event', 'public', '[]', NULL, NULL, '<p>A Photography Platform for all the photographers to click their art through a nude boudoir shoot!</p>\r\n\r\n<p>Master Photographer (Invited of special request) - Aridum Bhattacharjee<br />\r\nMakeup by- Sharmishtha Bannerjee.<br />\r\nModel - Tanisha Singh and Mandira Bhowmik.<br />\r\nWith 5 looks and highly fashioned lingerie!</p>', 'active', 0, '{\"5\":\"like\"}', NULL, '1663569442', '1663569442'),
(28, 4, 'post', 4, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '[]', NULL, '1663570397', '1663570397'),
(29, 4, 'post', 4, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '[]', NULL, '1663570403', '1663570403'),
(30, 4, 'post', 4, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"2\":\"sad\"}', '[]', '1663570563', '1663570563'),
(31, 4, 'video_and_shorts', 9, 'general', 'public', '[]', NULL, NULL, 'London The City', 'active', 0, '[]', NULL, '1663572707', '1663572707'),
(32, 4, 'video_and_shorts', 10, 'general', 'public', '[]', NULL, NULL, 'City of london', 'active', 0, '[]', NULL, '1663572879', '1663572879'),
(33, 4, 'event', 5, 'event', 'public', '[]', NULL, NULL, '<p>Read the world</p>', 'active', 0, '{\"3\":\"love\",\"6\":\"love\"}', NULL, '1663573007', '1663573007'),
(34, 4, 'group', 12, 'general', 'public', '[]', 0, '', 'Stage Decoration By & Photography', 'active', 0, '{\"2\":\"love\"}', '[]', '1663576787', '1663576787'),
(35, 4, 'group', 12, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"2\":\"love\"}', '[]', '1663576807', '1663576807'),
(36, 4, 'group', 12, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"2\":\"love\"}', '[]', '1663576820', '1663576820'),
(37, 4, 'page', 10, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577001', '1663577001'),
(38, 4, 'page', 10, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577014', '1663577014'),
(39, 4, 'page', 10, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577029', '1663577029'),
(41, 4, 'page', 10, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577051', '1663577051'),
(42, 4, 'page', 10, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577065', '1663577065'),
(43, 4, 'page', 9, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577194', '1663577194'),
(44, 4, 'page', 9, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577203', '1663577203'),
(45, 4, 'page', 9, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577214', '1663577214'),
(46, 4, 'page', 9, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577223', '1663577223'),
(47, 4, 'page', 9, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577233', '1663577233'),
(48, 4, 'page', 8, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577367', '1663577367'),
(49, 4, 'page', 8, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577378', '1663577378'),
(50, 4, 'page', 8, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577386', '1663577386'),
(51, 4, 'page', 8, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577398', '1663577398'),
(52, 4, 'page', 8, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577407', '1663577407'),
(53, 4, 'page', 8, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577422', '1663577422'),
(54, 2, 'page', 4, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577876', '1663577876'),
(55, 2, 'page', 4, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577890', '1663577890'),
(56, 2, 'page', 4, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577899', '1663577899'),
(57, 2, 'page', 4, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577910', '1663577910'),
(58, 2, 'page', 4, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577931', '1663577931'),
(59, 2, 'page', 4, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663577933', '1663577933'),
(60, 2, 'page', 3, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"4\":\"love\",\"5\":\"like\",\"6\":\"love\",\"3\":\"love\",\"7\":\"love\"}', '[]', '1663578198', '1663578198'),
(61, 2, 'page', 3, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"4\":\"love\",\"5\":\"like\",\"6\":\"love\",\"3\":\"love\",\"7\":\"love\"}', '[]', '1663578238', '1663578238'),
(62, 2, 'page', 3, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"4\":\"love\",\"5\":\"like\",\"6\":\"love\",\"3\":\"love\",\"7\":\"love\"}', '[]', '1663578250', '1663578250'),
(63, 2, 'page', 3, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"4\":\"love\",\"5\":\"like\",\"6\":\"love\",\"3\":\"love\",\"7\":\"love\"}', '[]', '1663578273', '1663578273'),
(64, 2, 'page', 3, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"4\":\"love\",\"5\":\"like\",\"6\":\"love\",\"3\":\"love\",\"7\":\"love\"}', '[]', '1663578293', '1663578293'),
(65, 2, 'page', 2, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663578467', '1663578467'),
(66, 2, 'page', 2, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663578475', '1663578475'),
(67, 2, 'page', 2, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663578485', '1663578485'),
(68, 2, 'page', 2, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663578499', '1663578499'),
(69, 2, 'page', 2, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663578511', '1663578511'),
(70, 2, 'page', 1, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663578599', '1663578599'),
(71, 2, 'page', 1, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663578610', '1663578610'),
(72, 2, 'page', 1, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663578622', '1663578622'),
(73, 2, 'page', 1, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663578633', '1663578633'),
(74, 2, 'page', 1, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"4\":\"like\"}', '[]', '1663578646', '1663578646'),
(75, 2, 'page', 1, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"4\":\"like\"}', '[]', '1663578664', '1663578664'),
(76, 2, 'group', 6, 'general', 'public', '[]', 0, '', 'Achilles being adored by princesses of Skyros, a scene from the Achilles where Odysseus (Ulysses) discovers him dressed as a woman and hiding among the princesses at the royal court of Skyros. \r\nA late Roman mosaic from La Olmeda, Spain, marble and tiled glass, 2.20 by 2.50 meters. \r\nSource:\r\nVilla Romana La Olmeda.\r\nAnonymous mosaic artist from late Roman Spain, active during the late 4th-5th centuries AD', 'active', 0, '[]', '[]', '1663578988', '1663578988'),
(77, 2, 'group', 6, 'general', 'public', '[]', 0, '', 'TETRAPYLON ...\r\nThe monuments, which are defined as “triumphal arch with arched passages on all four sides in ancient times” appear as structures belonging to the period in many parts of the world. Palmira Tetrapylon is as magnificent as our Aphrodisias Tetrapylon.\r\nIt was the monumental gateway which greeted pilgrims when they approached the Temple of Aphrodite.\r\n The Tetrapylon consisted of four rows of four columns (tetra = four and pylon = gateway in Greek) It connects the major street to the sacred way heading toward the sanctuary of Aphrodite.\r\nOn the pediment over the west columns were decorated with relief figures of Eros and Nike hunting among the acanthus leaves.\r\nThe monumental door \"Tetrapylon\", located just east of the Aphrodisias Temple and on the north-south street, is a four-way gate built in Corinthian order.\r\nHellence, tetra: four and pylon: gate meaning the monument is named after it because it consists of four columns on each side.\r\nProbably, in order to reach the Temple, the ceremonial processions gathered here and went to the Temple. \r\nWe can see that very rich architectural styles are used together in the building. Some of the straight, grooved, spirally grooved columns consist of double columns. \r\nSome columns are made of blue marble.\r\nOn the west pediment, there are hunting scenes consisting of Eros, Nike and horses emerging among the acanthus leaves in the indented field style. \r\nThe east pediment consists of a semicircular arch. \r\nWithin this belt, Venus, the star of Aphrodite, continues to shine morning and evening ...\r\nTetrapylon\'s repair is the most important restoration ever done. \r\n80% of the original pieces used in ancient times were found in excavations and placed in their places.\r\nThe Tetrapylon, a monumental gateway leading from the main north-south street of the town into a large forecourt in front of the Temple of Aphrodite, \r\nbuilt ca. 200 AD, Aphrodisias', 'active', 0, '[]', '[]', '1663579074', '1663579074'),
(78, 2, 'group', 6, 'general', 'public', '[]', 0, '', 'Coin: Drachm, with --Sun of Vergina--\r\nfrom Greek island of Corcyra Κέρκυρα (Corfu).\r\nThis Greek coin is a silver drachm with Sun of Vergina from Corcyra, Corfu, (Κέρκυρα) which it is part of seven islands chain, an island off the west coast of central Greece.\r\n It was struck in the early to late 3rd century BC.\r\n▪The reverse is the Sun of Vergina with the letters KOPKYPAI (Κέρκυρα) Corfu.\r\nThe obverse is an amphora, a distinctive clay vessel.\r\nIt is an oenochoe, a jug for wine, and on the left is a kantharos, a deep cup.\r\n300-229 BC', 'active', 0, '[]', '[]', '1663579117', '1663579117'),
(79, 2, 'group', 6, 'general', 'public', '[]', 0, '', 'Stagira, Stagirus or Stageira was an ancient Greek city located near the eastern coast of the peninsula of Chalkidice, which is now part of the Greek province of Central Macedonia, Greece.\r\nStagira was founded in 655 BC by Ionian Greek settlers from Andros.\r\n ▪It is known for being the birthplace of Aristotle, the Greek philosopher and polymath, student of Plato, and teacher of Alexander the Great.\r\nPhilip himself repopulated the city in return for Aristotle’s, tutoring of his son Alexander. \r\nWritten tradition records are mentioning  that after Aristotle died, the inhabitants of Stagira transferred and buried his relics inside the city, in a place called “the Aristoteleion”.\r\n A large altar was erected on his grave, and an annual festival was instituted in his honour, called the \"Aristoteleia\".', 'active', 0, '[]', '[]', '1663579179', '1663579179'),
(80, 2, 'group', 2, 'general', 'public', '[]', 0, '', 'A date today: September 18, 1980.\r\nICBM site in Damascus, Arkansas (Governor: a young Bill Clinton). 6:40 pm. During maintenance, David F. Powell slip a tool that fall and hit the aluminum fuselage of the missile far below, and pierce it. Fuel comes out. It is a problem. \r\nThe next morning at 3:00 am the 9Mton W-53 warhead is projected overhead by the explosion and is found after several hours at a distance of 100m. Intrinsic safety does its job and the warhead does not explode:', 'active', 0, '[]', '[]', '1663579371', '1663579371'),
(81, 2, 'group', 2, 'general', 'public', '[]', 0, '', 'On this day...\r\nNot long after Harald had renounced his claim to Denmark, the former Earl of Northumbria, Tostig Godwinson, brother of the newly chosen (but reigning not for long) English king Harold Godwinson (also known as Harold of Wessex), pledged his allegiance to Harald and invited him to claim the English throne. Harald went along and invaded Northern England with 10,000 troops and 300 longships in September 1066, raided the coast and defeated English regional forces of Northumbria and Mercia in the Battle of Fulford near York on 20 September 1066. Although initially successful, Harald was defeated and killed in a surprise attack by Harold Godwinson\'s forces in the Battle of Stamford Bridge on 25 September 1066, which wiped out almost his entire army. Modern historians have often considered Harald\'s death, which brought an end to his invasion, as the end of the Viking Age.', 'active', 0, '[]', '[]', '1663579388', '1663579388'),
(82, 2, 'group', 2, 'general', 'public', '[]', 0, '', '\\ There is no doubt that Iran has a wealth of valuable historical and cultural sites, one of the most famous of which is the Sheikh Lotfollah Mosque. Situated in the historic city of Isfahan, it is an outstanding legacy of the Safavid era (1501-1736), with rich ornamentation and deep symbolic meaning and message. Built by Abbas I, the building faithfully reflects a central attribute of Islamic architecture: the close relationship between art and cosmology. This means that Islamic architecture, and in particular its artistic expression, has as its primary goal the thoughtful representation and perception of the place and role of humanity within the universe. And this is precisely the phenomenological starting point that permeates the spirit of place (genius loci) to its very core. The mosque, which can be called the shining star of tile art, opened in 1619 and was named after Sheikh Lotfollah, a Muslim scholar of great renown.', 'active', 0, '[]', '[]', '1663579414', '1663579414'),
(84, 2, 'group', 2, 'general', 'public', '[]', 0, '', 'On this day...\r\nThe Pilgrims, also known as the Pilgrim Fathers, were the English settlers who came to North America on the Mayflower and established the Plymouth Colony in what is today Plymouth, Massachusetts, named after the final departure port of Plymouth, Devon. Their leadership came from the religious congregations of Brownists, or Separatist Puritans, who had fled religious persecution in England for the tolerance of 17th-century Holland in the Netherlands.\r\nThey held many of the same Puritan Calvinist religious beliefs but, unlike most other Puritans, they maintained that their congregations should separate from the English state church, which led to them being labeled Separatists (the word \"Pilgrims\" was not used to refer to them until several centuries later). After several years living in exile in Holland, they eventually determined to establish a new settlement in the New World and arranged with investors to fund them. They established Plymouth Colony in 1620, where they erected Congregationalist churches. The Pilgrims\' story became a central theme in the history and culture of the United States.', 'active', 0, '[]', '[]', '1663579465', '1663579465'),
(87, 2, 'group', 2, 'general', 'public', '[]', 0, '', 'Yesterday was the anniversary of the Battle of Peleliu, September 15th to November 27th, 1944. The commanding Marine Corps General said it would be secured in 4 days. He was wrong. It took 1st Marines and the Army\'s 81st Infantry Division to take the island whose strategic position was dubious. Of the 14,000 Japanese defending, 400 would survive, while the 47,000 Americans would have nearly 10,000 casualties with 1,792 killed. The Japanese tried a different tactic. Digging into the island\'s mountain, Umurbrogol, with firepower from above, developed the strategy that would work on Iwo Jima, Okinawa and other islands. The Marines were the majority of the dead and wounded, and would continue to perform heroically and give their all as America waged war, island hopping across the Pacifac, with the goal leading to the home Islands. Thousands would have to die for the goals to be met. The two atomic bombs dropped on Hiroshima and Nagasaki probably save many thousands of American lives. God Bless all those young men.', 'active', 0, '[]', '[]', '1663579557', '1663579557'),
(88, 2, 'group', 2, 'general', 'public', '[]', 0, '', 'icture of historic meeting between American and Soviet Troops in 1945 at the Elbe River, near Torgau in Germany, marking an important step towards ending WWII in Europe. This contact between Americans advancing from the west and Soviets from East meant that they had cut Germany in two. The first contact between two countries\' patrols occurred near Strehla, after First Lieutenant Albert Kotzebue, an American soldier, crossed the River Elbe in a boat with three men from an intelligence and reconnaissance platoon. Picture by: Alamy/ World History Archive', 'active', 0, '[]', '[]', '1663579593', '1663579593'),
(89, 2, 'group', 2, 'general', 'public', '[]', 0, '', '\"Throw of the Century\". Wilfried Dietrich, who weighed about 118 kg, managed to tear off a huge 200-kg Chris Taylor from the ground and threw him over himself on the carpet! It was an incredible, brilliant and extremely risky deflection. But it worked! The American simply did not expect anything like this, fell on his back and suffered an early defeat. After losing, Taylor threw a phrase that instantly scattered across the newspapers around the world: “I didn\'t think there was a person in the world who could tear me off the carpet and throw me. But I was wrong. \" Swedish photojournalist Olle Seybold managed to press the button of his device at the right moment of that fight and received a well-deserved prize for the best photo of the Olympics. Summer Olympic Games. Germany, 1972', 'active', 0, '[]', '[]', '1663579630', '1663579630'),
(92, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'Nelly and smart were _______yesterday\r\n(A)They\r\n(B)there\r\n(C)their\r\n(D)All of the above', 'active', 0, '[]', '[]', '1663580278', '1663580278'),
(93, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'Yesterday I playing soccer\r\nTo\r\nWas\r\nOn', 'active', 0, '[]', '[]', '1663580291', '1663580291'),
(94, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'She ____ my mother .\r\nA . is\r\nB . are\r\nC . am', 'active', 0, '[]', '[]', '1663580303', '1663580303'),
(95, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'I\'m tired i _____ ( want ) to go now\r\nA . want\r\nB . am waiting', 'active', 0, '[]', '[]', '1663580323', '1663580323'),
(96, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'Dream is not that which you see..........sleeping.\r\na)by\r\nb)in\r\nc)while\r\nd)with', 'active', 0, '[]', '[]', '1663580334', '1663580334'),
(98, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'She............. the help of her brother.\r\ndenied/refused.', 'active', 0, '[]', '[]', '1663580372', '1663580372'),
(99, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'I know of_______\r\n(Someone) (Somebody) (A person)', 'active', 0, '[]', '[]', '1663580384', '1663580384'),
(100, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'She has been studying....... morning.\r\nfor/since', 'active', 0, '[]', '[]', '1663580402', '1663580402'),
(101, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'This pen is useful........ gambling\r\n(a).On\r\n(b). From\r\n(c). With\r\n(d). For', 'active', 0, '[]', '[]', '1663580416', '1663580416'),
(102, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'I _____in Kampala. (Live, leave)', 'active', 0, '[]', '[]', '1663580426', '1663580426'),
(103, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'I used to (play) cricket.\r\nI am used to (play) cricket.\r\n???', 'active', 0, '[]', '[]', '1663580438', '1663580438'),
(104, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'You are swimming.\r\n1-present progressive tense\r\n2-past progressive tense', 'active', 0, '[]', '[]', '1663580460', '1663580460'),
(105, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'Where I________see you again\r\nA, can\r\nB, will\r\nC, when\r\nD, which\r\nWhich one is correct?', 'active', 0, '[]', '[]', '1663580480', '1663580480'),
(106, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'He does...... football in the evening.\r\nA)Play\r\nB) plays', 'active', 0, '[]', '[]', '1663580495', '1663580495'),
(107, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'The committee ______ very different lives in private .\r\nA . leads\r\nB . lead', 'active', 0, '[]', '[]', '1663580506', '1663580506'),
(108, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'The committee ______ very different lives in private .\r\nA . leads\r\nB . lead', 'active', 0, '[]', '[]', '1663580567', '1663580567'),
(109, 4, 'video_and_shorts', 11, 'general', 'public', '[]', NULL, NULL, 'Nature', 'active', 0, '{\"2\":\"like\"}', NULL, '1663582691', '1663582691'),
(110, 2, 'video_and_shorts', 12, 'general', 'public', '[]', NULL, NULL, 'City view', 'active', 0, '[]', NULL, '1663583710', '1663583710'),
(111, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'He does...... football in the evening.\r\nA)Play\r\nB) plays', 'active', 0, '[]', '[]', '1663583771', '1663583771'),
(112, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'e committee ______ very different lives in private .\r\nA . leads\r\nB . lead', 'active', 0, '[]', '[]', '1663583780', '1663583780'),
(113, 2, 'group', 1, 'general', 'public', '[]', 0, '', '1 give me _________ water\r\n(A) any.( B) some (C) a (D) an', 'active', 0, '[]', '[]', '1663583795', '1663583795'),
(114, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'They teachers are checking the pupils nails............?\r\n(a). Aren\'t they\r\n(b). Isn\'t they\r\n(c). Are they', 'active', 0, '[]', '[]', '1663583809', '1663583809'),
(115, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'Go and see him ....person.\r\nTo / at / in / ?', 'active', 0, '[]', '[]', '1663583836', '1663583836'),
(116, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'It\'s high time we - home. A.(went) B.(go)', 'active', 0, '[]', '[]', '1663583862', '1663583862'),
(117, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'I prefer tea...... coffee.\r\nA.than\r\nB.from\r\nC.to', 'active', 0, '[]', '[]', '1663583872', '1663583872'),
(118, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'I\'ve been living Thailand _______ 2015.\r\nA) since B) for', 'active', 0, '[]', '[]', '1663583887', '1663583887'),
(119, 2, 'video_and_shorts', 13, 'general', 'public', '[]', NULL, NULL, 'The Sky', 'active', 0, '[]', NULL, '1663583928', '1663583928'),
(120, 2, 'video_and_shorts', 14, 'general', 'public', '[]', NULL, NULL, 'City', 'active', 0, '[]', NULL, '1663584139', '1663584139'),
(121, 2, 'video_and_shorts', 15, 'general', 'public', '[]', NULL, NULL, 'London', 'active', 0, '[]', NULL, '1663584210', '1663584210'),
(122, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'He......too much food on his wedding\r\nA- eated\r\nB- ate\r\nC- eating', 'active', 0, '[]', '[]', '1663584484', '1663584484'),
(123, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'After speaking to him badly then he......down and then cried\r\nA- sat\r\nB- sited\r\nC-sits', 'active', 0, '[]', '[]', '1663584495', '1663584495'),
(124, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'Today is....happy birthday\r\n(1) i\'m\r\n(2) my\r\n(3) ours', 'active', 0, '[]', '[]', '1663584505', '1663584505'),
(125, 2, 'group', 1, 'general', 'public', '[]', 0, '', 'Her sister ____ seven years old\r\nA . are\r\nB . am\r\nC . is', 'active', 0, '[]', '[]', '1663584522', '1663584522'),
(126, 4, 'group', 12, 'general', 'public', '[]', 0, '', 'Night City', 'active', 0, '[]', '[]', '1663584999', '1663584999'),
(127, 4, 'group', 12, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663585071', '1663585071'),
(128, 4, 'group', 12, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663585102', '1663585102'),
(129, 4, 'group', 12, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663585122', '1663585122'),
(130, 4, 'group', 12, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663585138', '1663585138'),
(131, 4, 'group', 12, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663585189', '1663585189'),
(132, 4, 'group', 12, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663585203', '1663585203'),
(133, 4, 'video_and_shorts', 16, 'general', 'public', '[]', NULL, NULL, 'NY City', 'active', 0, '{\"2\":\"like\"}', NULL, '1663585769', '1663585769'),
(134, 4, 'video_and_shorts', 17, 'general', 'public', '[]', NULL, NULL, 'Busy world', 'active', 0, '{\"2\":\"like\"}', NULL, '1663585791', '1663585791'),
(135, 4, 'video_and_shorts', 18, 'general', 'public', '[]', NULL, NULL, 'City view', 'active', 0, '{\"6\":\"like\"}', NULL, '1663586200', '1663586200'),
(136, 3, 'group', 10, 'general', 'public', '[]', 0, '', 'Sunset,srilanka', 'active', 0, '[]', '[]', '1663587268', '1663587268'),
(137, 3, 'group', 10, 'general', 'public', '[]', 0, '', 'Art gallery in Auckland', 'active', 0, '[]', '[]', '1663587319', '1663587319'),
(138, 3, 'group', 10, 'general', 'public', '[]', 0, '', 'Sweden', 'active', 0, '[]', '[]', '1663587376', '1663587376'),
(139, 3, 'group', 10, 'general', 'public', '[]', 0, '', 'Australia Blue tears', 'active', 0, '[]', '[]', '1663587447', '1663587447'),
(140, 3, 'group', 10, 'general', 'public', '[]', 0, '', 'Altit fort, hunza.', 'active', 0, '[]', '[]', '1663587503', '1663587503'),
(141, 3, 'group', 10, 'general', 'public', '[]', 0, '', 'The nation mourns, and North East landmarks are lit in remembrance \r\nNorth East England, UK', 'active', 0, '[]', '[]', '1663587593', '1663587593'),
(142, 3, 'group', 10, 'general', 'public', '[]', 0, '', 'Hallstatt, Austria', 'active', 0, '[]', '[]', '1663587655', '1663587655'),
(143, 3, 'group', 8, 'general', 'public', '[]', 0, '', 'Beautiful America', 'active', 0, '[]', '[]', '1663587788', '1663587788'),
(144, 3, 'group', 8, 'general', 'public', '[]', 0, '', 'Beautiful California USA', 'active', 0, '[]', '[]', '1663587820', '1663587820'),
(145, 3, 'group', 8, 'general', 'public', '[]', 0, '', 'Los Angeles, California', 'active', 0, '[]', '[]', '1663587857', '1663587857'),
(146, 3, 'group', 8, 'general', 'public', '[]', 0, '', 'Chicago', 'active', 0, '[]', '[]', '1663587913', '1663587913'),
(147, 3, 'group', 8, 'general', 'public', '[]', 0, '', 'Yosemite National Park, California', 'active', 0, '[]', '[]', '1663588050', '1663588050'),
(148, 3, 'group', 8, 'general', 'public', '[]', 0, '', 'New York afternoon perfect photos', 'active', 0, '[]', '[]', '1663588081', '1663588081'),
(149, 3, 'group', 8, 'general', 'public', '[]', 0, '', 'Zero H2O at Yosemite Falls.', 'active', 0, '[]', '[]', '1663588137', '1663588137'),
(150, 3, 'group', 7, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663588262', '1663588262'),
(151, 3, 'group', 7, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663588281', '1663588281'),
(152, 3, 'group', 7, 'general', 'public', '[]', 0, '', 'rice bowl', 'active', 0, '[]', '[]', '1663588420', '1663588420'),
(153, 3, 'group', 7, 'general', 'public', '[]', 0, '', 'Let\'s Chillax and Unwinds', 'active', 0, '[]', '[]', '1663588496', '1663588496'),
(154, 3, 'group', 7, 'general', 'public', '[]', 0, '', 'Potatoes and onions', 'active', 0, '[]', '[]', '1663588748', '1663588748'),
(155, 3, 'group', 7, 'general', 'public', '[]', 0, '', 'My chicken and waffle', 'active', 0, '{\"2\":\"love\"}', '[]', '1663588810', '1663588810'),
(156, 3, 'page', 7, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663589562', '1663589562'),
(157, 3, 'page', 7, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663589578', '1663589578'),
(158, 3, 'page', 7, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663589601', '1663589601'),
(159, 3, 'page', 7, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663589625', '1663589625'),
(160, 3, 'page', 7, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663589641', '1663589641'),
(161, 3, 'page', 7, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663589656', '1663589656'),
(162, 3, 'page', 7, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663589671', '1663589671'),
(163, 3, 'page', 7, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663589706', '1663589706'),
(164, 3, 'page', 6, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663589848', '1663589848'),
(165, 3, 'page', 6, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1663589856', '1663589856'),
(166, 3, 'page', 5, 'general', 'public', '[]', 0, '', 'Be Kind To Someone Today', 'active', 0, '[]', '[]', '1663589916', '1663589916'),
(167, 3, 'page', 5, 'general', 'public', '[]', 0, '', 'Be Kind', 'active', 0, '{\"5\":\"like\"}', '[]', '1663589952', '1663589952'),
(168, 3, 'page', 5, 'general', 'public', '[]', 0, '', 'Think we\'ll be able to travel again soon?\r\nWhere would you travel to first thing?\r\nTell us', 'active', 0, '{\"5\":\"like\"}', '[]', '1663589996', '1663589996'),
(169, 3, 'page', 5, 'general', 'public', '[]', 0, '', 'Friday is near..', 'active', 0, '{\"5\":\"like\"}', '[]', '1663590030', '1663590030'),
(170, 3, 'page', 5, 'general', 'public', '[]', 0, '', 'Those eyes though', 'active', 0, '{\"5\":\"like\",\"3\":\"like\"}', '[]', '1663590055', '1663590055'),
(171, 3, 'page', 5, 'general', 'public', '[]', 0, '', 'More of our favorite GoodieTravel bears', 'active', 0, '{\"5\":\"like\",\"3\":\"like\"}', '[]', '1663590077', '1663590077'),
(176, 8, 'post', 8, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '[]', NULL, '1663651817', '1663651817'),
(177, 8, 'post', 8, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '[]', NULL, '1663651820', '1663651820'),
(179, 9, 'post', 9, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '[]', NULL, '1663652391', '1663652391'),
(182, 10, 'post', 10, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '[]', NULL, '1663652752', '1663652752'),
(183, 2, 'post', 2, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '{\"2\":\"like\"}', NULL, '1663665596', '1663665596'),
(192, 2, 'post', 2, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '{\"2\":\"like\",\"5\":\"like\",\"6\":\"like\"}', NULL, '1664700419', '1664700419'),
(194, 3, 'post', 3, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '{\"2\":\"like\"}', NULL, '1664705772', '1664705772'),
(195, 3, 'video_and_shorts', 3, 'general', 'public', '[]', NULL, NULL, 'https://demo.creativeitem.com/sociopro/view/single/post/13', 'active', 0, '{\"3\":\"like\",\"2\":\"like\",\"5\":\"like\",\"6\":\"like\"}', '[]', '1664706334', '1664706334'),
(196, 4, 'post', 4, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '{\"2\":\"like\",\"5\":\"like\",\"6\":\"like\"}', NULL, '1664706678', '1664706678'),
(197, 5, 'post', 5, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '{\"2\":\"like\",\"6\":\"like\"}', NULL, '1664707220', '1664707220'),
(198, 5, 'post', 5, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"6\":\"like\",\"2\":\"angry\"}', '[]', '1664707953', '1664707953'),
(199, 5, 'post', 5, 'general', 'public', '[]', 0, '', 'My new photography', 'active', 0, '{\"6\":\"like\"}', '[]', '1664707985', '1664707985'),
(201, 6, 'post', 6, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '{\"2\":\"love\",\"5\":\"like\"}', NULL, '1664708248', '1664708248'),
(202, 6, 'post', 6, 'general', 'public', '[]', 0, '', 'My New astro Photography', 'active', 0, '[]', '[]', '1664709082', '1664709082'),
(203, 6, 'post', 6, 'general', 'public', '[]', 0, '', 'My New astro Photography 2021', 'active', 0, '{\"2\":\"like\"}', '[]', '1664709111', '1664709111'),
(204, 6, 'post', 6, 'general', 'public', '[]', 0, '', 'My New astro Photography 2022', 'active', 0, '{\"2\":\"like\"}', '[]', '1664709141', '1664709141'),
(206, 7, 'post', 7, 'profile_picture', 'public', '[]', 0, '', '', 'active', 0, '{\"2\":\"love\",\"5\":\"like\",\"6\":\"like\"}', NULL, '1664710875', '1664710875'),
(207, 7, 'post', 7, 'general', 'public', '[]', 0, '', 'My new drone adventure', 'active', 0, '{\"7\":\"like\",\"2\":\"sad\",\"5\":\"like\",\"6\":\"like\"}', '[]', '1664711920', '1664711920'),
(208, 7, 'post', 7, 'general', 'public', '[]', 0, '', 'Drone photos from my Europe tripe', 'active', 0, '{\"2\":\"like\",\"5\":\"like\"}', '[]', '1664711972', '1664711972'),
(209, 2, 'group', 6, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"2\":\"love\"}', '[]', '1664793408', '1664793408'),
(210, 2, 'event', 6, 'event', 'public', '[]', NULL, NULL, NULL, 'active', 0, '[]', NULL, '1664794007', '1664794007'),
(211, 2, 'group', 6, 'general', 'public', '[]', 0, '', 'Let\'s have a meetup..', 'active', 0, '{\"6\":\"like\"}', '[]', '1664796068', '1664796068'),
(213, 5, 'event', 6, 'general', 'public', '[]', 0, '', 'Is there any fees for the workshop or it\'s free?', 'active', 0, '[]', '[]', '1664868337', '1664868337'),
(216, 2, 'page', 4, 'general', 'public', '[]', 0, '', '', 'active', 0, '[]', '[]', '1665384731', '1665384731'),
(219, 2, 'event', 7, 'event', 'public', '[]', NULL, NULL, NULL, 'active', 0, '[]', NULL, '1665402163', '1665402163'),
(222, 2, 'video_and_shorts', 19, 'general', 'public', '[]', NULL, NULL, 'Mighty Singapore', 'active', 0, '{\"5\":\"like\",\"6\":\"like\",\"7\":\"like\"}', NULL, '1665999620', '1665999620'),
(223, 2, 'video_and_shorts', 20, 'general', 'public', '[]', NULL, NULL, 'Sunset at beach', 'active', 0, '{\"5\":\"like\",\"2\":\"like\",\"4\":\"like\",\"6\":\"like\",\"7\":\"like\"}', NULL, '1665999689', '1665999689'),
(224, 5, 'video_and_shorts', 21, 'general', 'public', '[]', NULL, NULL, 'View from my hotel room', 'active', 0, '{\"4\":\"like\",\"6\":\"like\",\"7\":\"like\"}', NULL, '1665999993', '1665999993'),
(225, 5, 'video_and_shorts', 22, 'general', 'public', '[]', NULL, NULL, 'My loving family', 'active', 0, '{\"4\":\"like\",\"6\":\"like\",\"7\":\"like\"}', NULL, '1666000029', '1666000029'),
(226, 4, 'video_and_shorts', 23, 'general', 'public', '[]', NULL, NULL, 'Sailing to infinity', 'active', 0, '[]', NULL, '1666000386', '1666000386'),
(227, 4, 'video_and_shorts', 24, 'general', 'public', '[]', NULL, NULL, 'Sailing to infinity', 'active', 0, '{\"6\":\"like\",\"7\":\"like\"}', NULL, '1666000422', '1666000422'),
(228, 4, 'video_and_shorts', 25, 'general', 'public', '[]', NULL, NULL, 'at Moren Lake', 'active', 0, '[]', NULL, '1666000639', '1666000639'),
(229, 4, 'video_and_shorts', 26, 'general', 'public', '[]', NULL, NULL, 'At Moren Lake', 'active', 0, '{\"6\":\"like\",\"7\":\"like\"}', NULL, '1666000678', '1666000678'),
(230, 6, 'video_and_shorts', 27, 'general', 'public', '[]', NULL, NULL, 'Relax time', 'active', 0, '[]', NULL, '1666001997', '1666001997'),
(231, 6, 'video_and_shorts', 28, 'general', 'public', '[]', NULL, NULL, 'Relax time', 'active', 0, '{\"7\":\"like\",\"6\":\"like\"}', NULL, '1666002040', '1666002040'),
(232, 6, 'video_and_shorts', 29, 'general', 'public', '[]', NULL, NULL, 'Good time with friends', 'active', 0, '{\"7\":\"like\",\"6\":\"like\",\"2\":\"like\"}', NULL, '1666002067', '1666002067'),
(233, 7, 'video_and_shorts', 30, 'general', 'public', '[]', NULL, NULL, 'My brother\'s family', 'active', 0, '{\"7\":\"like\",\"6\":\"like\"}', NULL, '1666002311', '1666002311'),
(234, 7, 'video_and_shorts', 31, 'general', 'public', '[]', NULL, NULL, 'Turkey', 'active', 0, '{\"7\":\"like\",\"6\":\"like\"}', NULL, '1666002348', '1666002348'),
(235, 7, 'video_and_shorts', 32, 'general', 'public', '[]', NULL, NULL, 'My New wall', 'active', 0, '{\"4\":\"like\",\"2\":\"like\",\"3\":\"like\",\"6\":\"like\"}', NULL, '1666003050', '1666003050'),
(236, 7, 'video_and_shorts', 33, 'general', 'public', '[]', NULL, NULL, 'Let\'s have a positive life', 'active', 0, '{\"4\":\"like\",\"2\":\"like\",\"3\":\"like\",\"6\":\"like\"}', NULL, '1666003086', '1666003086'),
(237, 5, 'video_and_shorts', 34, 'general', 'public', '[]', NULL, NULL, 'They are growing faster', 'active', 0, '{\"4\":\"like\",\"2\":\"like\",\"3\":\"like\",\"6\":\"like\"}', NULL, '1666003181', '1666003181'),
(238, 5, 'video_and_shorts', 35, 'general', 'public', '[]', NULL, NULL, 'Family time', 'active', 0, '{\"4\":\"like\",\"2\":\"like\",\"3\":\"like\",\"6\":\"like\"}', NULL, '1666003210', '1666003210'),
(239, 4, 'video_and_shorts', 36, 'general', 'public', '[]', NULL, NULL, 'Travel video', 'active', 0, '{\"4\":\"like\",\"2\":\"like\",\"3\":\"like\",\"6\":\"like\"}', NULL, '1666003368', '1666003368'),
(240, 5, 'video_and_shorts', 37, 'general', 'public', '[]', NULL, NULL, 'Sudden view', 'active', 0, '{\"4\":\"like\",\"2\":\"like\",\"3\":\"like\",\"6\":\"like\"}', NULL, '1666003583', '1666003583'),
(241, 5, 'video_and_shorts', 38, 'general', 'public', '[]', NULL, NULL, 'bird', 'active', 0, '{\"4\":\"like\",\"2\":\"like\",\"3\":\"like\",\"6\":\"like\"}', NULL, '1666004470', '1666004470'),
(242, 6, 'video_and_shorts', 39, 'general', 'public', '[]', NULL, NULL, 'Honeymoon', 'active', 0, '{\"4\":\"like\",\"2\":\"like\",\"3\":\"like\",\"6\":\"like\"}', NULL, '1666004597', '1666004597'),
(243, 6, 'video_and_shorts', 40, 'general', 'public', '[]', NULL, NULL, 'Underwater diving with my new gopro', 'active', 0, '{\"4\":\"like\",\"2\":\"like\",\"3\":\"like\",\"6\":\"like\"}', NULL, '1666004630', '1666004630'),
(244, 2, 'video_and_shorts', 41, 'general', 'public', '[]', NULL, NULL, 'about last night', 'active', 0, '{\"4\":\"like\",\"2\":\"like\",\"3\":\"like\",\"6\":\"like\"}', NULL, '1666004942', '1666004942'),
(245, 2, 'video_and_shorts', 42, 'general', 'public', '[]', NULL, NULL, 'Butterfly love', 'active', 0, '{\"4\":\"like\",\"2\":\"like\",\"3\":\"like\",\"6\":\"like\"}', NULL, '1666004994', '1666004994'),
(246, 2, 'post', 2, 'general', 'public', '[]', 0, '', 'Butterfly', 'active', 0, '[]', '[]', '1666009812', '1666009812'),
(262, 2, 'post', 2, 'general', 'public', '[]', NULL, NULL, NULL, 'active', 0, '{\"2\":\"love\"}', '[]', '1666250551', '1666250551'),
(263, 2, 'group', 6, 'general', 'public', '[]', 0, '', 'Sam & Ana', 'active', 0, '{\"2\":\"love\"}', '[]', '1666257047', '1666257047'),
(264, 2, 'group', 6, 'general', 'public', '[]', 0, '', 'Roza & Smith', 'active', 0, '[]', '[]', '1666257074', '1666257074'),
(265, 2, 'page', 3, 'general', 'public', '[]', 0, '', 'Best food in the town', 'active', 0, '{\"4\":\"love\",\"5\":\"like\",\"6\":\"love\",\"3\":\"love\",\"7\":\"love\"}', '[]', '1666258162', '1666258162'),
(266, 2, 'page', 2, 'general', 'public', '[]', 0, '', 'Find your peace...', 'active', 0, '[]', '[]', '1666259023', '1666259023'),
(267, 2, 'event', 5, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"2\":\"love\",\"4\":\"love\",\"3\":\"love\",\"6\":\"love\"}', '[]', '1666594913', '1666594913'),
(268, 4, 'event', 5, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"3\":\"love\",\"2\":\"love\",\"6\":\"love\"}', '[]', '1666595184', '1666595184'),
(269, 2, 'event', 5, 'general', 'public', '[]', 0, 'Colosseum, Piazza del Colosseo, Celio, Municipio Roma I, Rome, Roma Capitale, Lazio, 00184, Italy', 'Having a great time in Rome city!', 'active', 0, '{\"4\":\"love\",\"3\":\"love\",\"6\":\"love\"}', '[]', '1666595493', '1666595493'),
(273, 2, 'event', 8, 'event', 'public', '[]', NULL, NULL, NULL, 'active', 0, '[]', NULL, '1666765753', '1666765753'),
(274, 2, 'post', 2, 'general', 'public', '[]', 0, '', '', 'active', 0, '{\"2\":\"like\"}', '[]', '1667204118', '1667204118'),
(276, 3, 'post', 3, 'live_streaming', 'public', '[]', 0, '', '{\"live_video_ended\":\"yes\"}', 'active', 0, '[]', '[]', '1667375655', '1667375655');

-- --------------------------------------------------------

--
-- Table structure for table `post_shares`
--

DROP TABLE IF EXISTS `post_shares`;
CREATE TABLE `post_shares` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `shared_on` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_shares`
--

INSERT INTO `post_shares` (`id`, `user_id`, `post_id`, `shared_on`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'group', '2022-09-12 00:13:07', '2022-09-12 00:13:07'),
(2, 2, 1, 'group', '2022-09-13 23:16:44', '2022-09-13 23:16:44'),
(3, 3, 13, 'group', '2022-10-02 02:25:34', '2022-10-02 02:25:34'),
(4, 2, NULL, 'group', '2022-10-09 23:15:14', '2022-10-09 23:15:14'),
(5, 2, 218, 'group', '2022-10-17 01:30:38', '2022-10-17 01:30:38'),
(6, 2, 218, 'group', '2022-10-17 01:30:44', '2022-10-17 01:30:44'),
(7, 2, 253, 'group', '2022-10-18 03:12:04', '2022-10-18 03:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `report` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `post_id`, `report`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 191, 'Unethical post', 1, '2022-10-01 23:40:31', '2022-10-03 22:40:24'),
(2, 2, 15, 'Copy righted', 0, '2022-10-01 23:41:36', '2022-10-01 23:41:36'),
(3, 2, 8, 'Not appropriate', 0, '2022-10-01 23:42:11', '2022-10-01 23:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `saved_products`
--

DROP TABLE IF EXISTS `saved_products`;
CREATE TABLE `saved_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saved_products`
--

INSERT INTO `saved_products` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(8, 2, 16, '2022-10-29 23:52:56', '2022-10-29 23:52:56'),
(9, 2, 15, '2022-10-29 23:53:41', '2022-10-29 23:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `saveforlaters`
--

DROP TABLE IF EXISTS `saveforlaters`;
CREATE TABLE `saveforlaters` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `marketplace_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saveforlaters`
--

INSERT INTO `saveforlaters` (`id`, `user_id`, `video_id`, `group_id`, `post_id`, `marketplace_id`, `event_id`, `blog_id`, `created_at`, `updated_at`) VALUES
(1, 3, 17, NULL, NULL, NULL, NULL, NULL, '2022-09-20 02:59:17', '2022-09-20 02:59:17'),
(2, 2, 39, NULL, NULL, NULL, NULL, NULL, '2022-10-30 02:17:55', '2022-10-30 02:17:55'),
(3, 2, 37, NULL, NULL, NULL, NULL, NULL, '2022-10-30 02:18:11', '2022-10-30 02:18:11'),
(5, 2, 38, NULL, NULL, NULL, NULL, NULL, '2022-10-30 02:21:16', '2022-10-30 02:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
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
(1, 'zoom_configuration', '{\"api_key\":\"qPUL7G44QC2-oyq7IiD8iw\",\"api_secret\":\"aekO4Xv5NJnpwszhsvXX7w54vDnnA2HUBc9j\"}', '2022-09-07 12:07:09', '2022-11-01 23:53:53'),
(2, 'about', '<h2 style=\"font-style:italic;\">What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '2022-09-07 12:07:09', '2022-09-11 05:07:33'),
(3, 'policy', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '2022-09-07 12:07:09', '2022-09-07 06:12:27'),
(4, 'term', '<p>Welcome to the University of Dhaka&rsquo;s website, featuring the oldest, largest and the premier multidisciplinary university of Bangladesh!&nbsp;</p>\r\n\r\n<p>Founded in 1921, The University of Dhaka has always had the mission of uplifting the educational standards of the people of the region. It was initially meant to provide tertiary education to people who didn&rsquo;t have access to higher studies till then. Subsequently, it has contributed significantly to the socio-cultural and political development of what was once East Bengal and then East Pakistan, and is now Bangladesh.</p>\r\n\r\n<p>Since its establishment, the university has been fulfilling the hopes and aspirations of its students and their parents. It has, of course, not only been a lighthouse of learning, but has also acted as a torch-bearer of the people of the region in issues such as democracy, freedom of expression, and the need for a just and equitable society. It has always been associated with high quality education and research in which students as well as faculty members and alumni have played their parts. The University of Dhaka&rsquo;s role has expanded beyond its classrooms and research labs during different crises the country has had to face since 1947. In many ways, thus, the university is unique, for it has played a major role in the creation of the independent nation-state of Bangladesh in 1971.</p>\r\n\r\n<p>Writing at this time, I am proud to note that the University of Dhaka has not only fulfilled but also exceeded the aspirations of those who set it up. It has been acclaimed as the best educational institution of the region, and one of the leading universities of the subcontinent. It is an incubator of ideas and has nurtured renowned scientists and academicians, great leaders, administrative and business officials, and entrepreneurs. Its proud alumni include the Father of the Nation Bangabandhu Sheikh Mujibur Rahman, and the incumbent Prime Minister, Sheikh Hasina, his august daughter. Most of the country&rsquo;s presidents, prime ministers, policymakers, politicians and CEOs of leading organizations, researchers and activists have been products of this institution.</p>\r\n\r\n<p>The University of Dhaka&rsquo;s doors are open for people from all classes, religions and parts of the country, and, indeed, also for international students. Its campus, too, regularly hosts different national and international events and festivals where people from every corner can and do participate. It is a hub, for breeding and nourishing liberal, secular and humanistics values.</p>\r\n\r\n<p>At the time when our country is dreaming to become a developed nation by 2041 and has made a firm commitment to achieve the Sustainable Development Goals (SDGs) by 2030, and in an age when we are witnessing the emergence of spirited youths all set to participate in the Fourth Industrial Revolution (4IR), I can affirm that the University of Dhaka is well prepared to meet all future challenges and is ready to lead the nation once again with its acquired experience, available resources, dedicated administrators, experienced faculty members and talented students and employees.</p>\r\n\r\n<p>Having been associated with the university for almost 40 years, first as a student, then as a faculty member, and later in various administrative capacities, it is a great honor and proud privilege for me to be here to not only witness but also to contribute to its centenary celebrations from where I am. Let me emphasize too that it is the singular privilege of all of us at the University of Dhaka to be celebrating its centenary in the year that Bangladesh is celebrating its golden jubilee of independence.</p>\r\n\r\n<p>I would like to request you all to explore the legacy, beauty, and history of this great institution of national, regional and international importance through this website. I hope it will be of use to you as you venture into the knowledge network of the university and acquaint yourself with its history, achievements, centers of learning, residential facilities and other attributes. My office staff and I will be more than happy to listen to you in case you want to visit us in person at a mutually convenient time.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '2022-09-07 12:07:09', '2022-09-07 06:19:02'),
(5, 'smtp', '{\"smtp_protocol\":\"smtp\",\"smtp_crypto\":\"tls\",\"smtp_host\":\"smtp.gmail.com\",\"smtp_port\":\"587\",\"smtp_user\":\"your-email\",\"smtp_pass\":\"Email-password\"}', '2022-09-11 10:36:29', '2022-09-11 05:06:38'),
(6, 'about', 'about us', '2022-09-20 09:45:06', '2022-09-20 09:45:06'),
(7, 'policy', 'policy page', '2022-09-20 09:45:06', '2022-09-20 09:45:06'),
(8, 'term', 'term c', '2022-09-20 09:50:51', '2022-09-20 09:50:51'),
(10, 'system_name', 'Sociopro', '2022-09-20 09:52:50', '2022-10-29 22:19:54'),
(11, 'system_title', 'Private social network', '2022-09-20 09:53:27', '2022-10-29 22:19:54'),
(12, 'system_email', 'admin@example.com', '2022-09-20 09:53:27', '2022-10-29 22:19:54'),
(13, 'system_phone', '96899882983', '2022-09-20 09:53:57', '2022-10-29 22:19:54'),
(14, 'system_fax', '93423', '2022-09-20 09:53:57', '2022-10-29 22:19:54'),
(15, 'system_address', 'New York, USA', '2022-09-20 09:54:41', '2022-10-29 22:19:54'),
(16, 'system_footer', 'Creativeitem', '2022-09-20 09:54:41', '2022-10-29 22:19:54'),
(17, 'system_footer_link', 'https://creativeitem.com', '2022-09-20 09:55:08', '2022-10-29 22:19:54'),
(18, 'system_dark_logo', '728.png', '2022-09-20 09:55:08', '2022-10-29 22:20:40'),
(19, 'system_light_logo', '727.png', '2022-09-20 09:55:27', '2022-09-20 03:10:00'),
(20, 'system_fav_icon', '450.png', '2022-09-20 09:55:27', '2022-09-20 02:39:06'),
(21, 'version', '1.1', '2022-09-20 09:55:27', '2022-09-20 02:39:06'),
(22, 'language', 'english', '2022-09-20 09:55:27', '2022-09-20 02:39:06'),
(23, 'public_signup', '1', '2022-09-20 09:55:27', '2022-09-20 02:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

DROP TABLE IF EXISTS `shares`;
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

DROP TABLE IF EXISTS `sponsors`;
CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ext_url` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `name`, `description`, `ext_url`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Nike Shoe', 'Change your style with nike shoe.', 'https://www.nike.com/', '786.jpg', '2022-10-02 01:08:35', '2022-11-02 23:11:35'),
(7, 'Apple Watch Ultra', 'Enhance your style with Apple watch ultra', 'https://www.apple.com/apple-watch-ultra/', '100.png', '2022-10-02 01:27:21', '2022-11-02 23:44:49'),
(8, 'Sony a7 III Mirrorless Camera', '<ul class=\"list_OMS5rN7R1Z\" style=\"box-sizing: inherit; display: flex; flex-flow: row wrap; padding-left: 1.0625rem;\"><li class=\"listItem_OMS5rN7R1Z\" data-selenium=\"sellingPointsListItem\" style=\"box-sizing: inherit; flex: 1 0 50%; line-height: 1.875rem; max-width: 50%; padding-right: 0.9375rem;\"><font color=\"#333333\"><span style=\"font-size: 14px;\">24MP Full-Frame Exmor R BSI CMOS Sensor</span></font></li></ul><ul class=\"list_OMS5rN7R1Z\" style=\"box-sizing: inherit; display: flex; flex-flow: row wrap; padding-left: 1.0625rem; font-family: OpenSans, &quot;Segoe UI&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"listItem_OMS5rN7R1Z\" data-selenium=\"sellingPointsListItem\" style=\"box-sizing: inherit; color: rgb(51, 51, 51); flex: 1 0 50%; font-size: 0.875rem; line-height: 1.875rem; max-width: 50%; padding-right: 0.9375rem;\">BIONZ X Image Processor &amp; Front-End LSI</li></ul><ul class=\"list_OMS5rN7R1Z\" style=\"box-sizing: inherit; display: flex; flex-flow: row wrap; padding-left: 1.0625rem; font-family: OpenSans, &quot;Segoe UI&quot;, Helvetica, Roboto, Arial, sans-serif;\"><li class=\"listItem_OMS5rN7R1Z\" data-selenium=\"sellingPointsListItem\" style=\"box-sizing: inherit; color: rgb(51, 51, 51); flex: 1 0 50%; font-size: 0.875rem; line-height: 1.875rem; max-width: 50%; padding-right: 0.9375rem;\">693-Point Hybrid AF System</li></ul><p style=\"box-sizing: inherit; color: rgb(51, 51, 51); flex: 1 0 50%; font-size: 0.875rem; line-height: 1.875rem; max-width: 50%; padding-right: 0.9375rem;\"><br></p>', 'https://www.emirates.com/', '398.png', '2022-10-02 01:36:33', '2022-11-02 23:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

DROP TABLE IF EXISTS `stories`;
CREATE TABLE `stories` (
  `story_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `publisher` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `privacy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media_files` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`story_id`, `user_id`, `publisher`, `publisher_id`, `privacy`, `content_type`, `media_files`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5, 2, 'user', 2, 'public', 'file', NULL, NULL, 'active', '1667463896', '1664435201'),
(6, 2, 'user', 2, 'public', 'file', NULL, NULL, 'active', '1667463896', '1666078870'),
(9, 6, 'user', 6, 'public', 'file', NULL, NULL, 'active', '1667463896', '1666183102'),
(11, 5, 'user', 5, 'public', 'file', NULL, NULL, 'active', '1667463896', '1666183401'),
(13, 2, 'user', 2, 'public', 'file', NULL, NULL, 'active', '1667463896', '1666528933'),
(14, 7, 'user', 7, 'public', 'file', NULL, NULL, 'active', '1667463896', '1666694311'),
(15, 2, 'user', 2, 'public', 'file', NULL, NULL, 'active', '1667463896', '1666694346'),
(1, 2, 'user', 2, 'public', 'text', NULL, '{\"color\":\"fff\",\"bg-color\":\"ff7856\",\"text\":\"A magical new way to interact with iPhone. Groundbreaking safety features designed to save lives. An innovative 48MP camera for mind-blowing detail. All powered by the ultimate smartphone chip\"}', 'active', '1667463896', '1666695686'),
(3, 4, 'user', 4, 'public', 'file', NULL, NULL, 'active', '1667463896', '1666695758'),
(2, 2, 'user', 2, 'public', 'text', NULL, '{\"color\":\"fff\",\"bg-color\":\"5a2ff9\",\"text\":\"Hi friends! How\'s going?\"}', 'active', '1667469797', '1667469797');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
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
  `created_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role`, `username`, `email`, `password`, `name`, `nickname`, `friends`, `followers`, `gender`, `studied_at`, `address`, `profession`, `job`, `marital_status`, `phone`, `date_of_birth`, `about`, `photo`, `cover_photo`, `status`, `lastActive`, `timezone`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', NULL, 'admin@example.com', '$2y$10$Kb9Cu5oL3h4KZbgk1KcOYuNsqedq3OWt7fJNlCO3YEObJVhsGu99e', 'Rebeka Jordan', 'Jhon', '{\"1\":3,\"2\":7,\"3\":6,\"4\":4}', NULL, 'female', 'Christian Leadership University New York.', 'Scarsdale, New York', NULL, 'Student', 'Single', '165545876', '1041206400', 'All I got right now is DREAMS', 'DNiQ5JcYyLu3g7a8fx9UqHReM4wnKGlEtrC6v10z.jpg', 'xhfiMdTu6rPopUSKQwjFm2bVcNAB0DzLnWCI3JEY.jpg', NULL, '2022-11-03 02:05:34', 'Asia/Dhaka', '2022-09-08 14:33:54', 'eCkecpmHoJpLSGULMxCRbVQ2XzpDyfjzoELkrnP7LsnoZ3pfuWZr9aurqguN', '2022-09-12 05:58:13', '2022-11-03 10:05:34'),
(3, 'general', NULL, 'richardKSmith@example.com', '$2y$10$Kb9Cu5oL3h4KZbgk1KcOYuNsqedq3OWt7fJNlCO3YEObJVhsGu99e', 'Richard K. Smith', 'Smith', '[7,6,4,5]', NULL, 'male', 'Ames Christian University Florida.', '298 Williams Avenue Los Angeles, US 90017', NULL, 'Student', 'Single', '661-309-4268', '962323200', NULL, '3sjHTqe8FzNKZh6D5BSJknb7fPc9traQvREX2xLo.jpg', 'tN2qrUKzPRcn83TmXC7ByQhYWOEGMaIjJ14wLVup.jpg', NULL, '2022-11-02 22:28:52', 'Asia/Dhaka', '2022-09-08 14:33:54', 'OOsrOOruAuYVKQ39mqlv0b04NNrY6XooKzLfNb9kwuO9Bg0G76Vl4YhJExzu', '2022-09-19 04:41:15', '2022-11-03 06:28:52'),
(4, 'general', NULL, 'karenjrios@example.com', '$2y$10$Kb9Cu5oL3h4KZbgk1KcOYuNsqedq3OWt7fJNlCO3YEObJVhsGu99e', 'Karen J. Rios', 'Rios', '[5,6,7,3,2]', NULL, 'female', 'Delta International University of New Orleans.', 'Houston,', NULL, 'Student', 'Single', '201-982-8775', '1038787200', NULL, 'BTap04sY75cLM8KDWS6g9AlFEdN1I3yqzQixhZUC.jpg', 'MRhEunl6tiD0aCYTX59gw7F4QmxcS8zPdGJ3rU2Z.jpg', NULL, '2022-11-02 22:51:26', 'Asia/Dhaka', '2022-09-08 14:33:54', 'lyncbBXzomXgtLSoivyupBbq04SYiB0EDl6vqP4nBw1ZnVeXR926KNiAhnwv', '2022-09-19 06:46:38', '2022-11-03 06:51:26'),
(5, 'general', NULL, 'Adrian@example.com', '$2y$10$Kb9Cu5oL3h4KZbgk1KcOYuNsqedq3OWt7fJNlCO3YEObJVhsGu99e', 'Adrian S. Woods', 'Adrian', '[2,4,6,7,3]', NULL, 'male', 'Delta International University of New Orleans.', '117 Yorkie Lane Hinesville, US 31313', NULL, 'Student', 'Single', '518-947-1657', '970704000', NULL, 'UsK9SzTtyc1EqIXpPjVF7oal80OYMivCGHfRQBhL.jpg', 'uD0WEpJtyVAiYSGIhM45zCe6NXdmvwR28nrLqgsQ.jpg', NULL, '2022-11-02 03:59:47', 'Asia/Dhaka', '2022-09-08 14:33:54', 'PJOTJyx0f6mIGBvtJAopNSkQjyASH9OfrgEf2qcr27Aukdr9jKVrAu6JhFEb', '2022-09-19 11:30:03', '2022-11-02 11:59:47'),
(6, 'general', NULL, 'AlanSThompson@example.com', '$2y$10$Kb9Cu5oL3h4KZbgk1KcOYuNsqedq3OWt7fJNlCO3YEObJVhsGu99e', 'Alan S. Thompson', 'Thompson', '[4,5,7,3,2]', NULL, 'male', 'Bienville University Woodville, Mississippi.', '2749 West Virginia Avenue Albany, NY 12210', NULL, 'Student', 'Single', '518-947-1657', '958780800', NULL, 'vnb8QPtdHD49xacUNTzKLXEfoVl1M3FrAChywgOe.jpg', 'fFx05MZ4OQwX62KeqdcmvGz1il8aRbnIJpsYUyrk.jpg', NULL, '2022-11-02 04:00:34', 'Asia/Dhaka', '2022-09-08 14:33:54', 'ADyXKCxLLmlqT9HOgLHjElW8VW2u9YwB4HGPiubUr37140ih59Q0rrvCNiBP', '2022-09-20 05:02:55', '2022-11-02 12:00:34'),
(7, 'general', NULL, 'PalmaBSmith@example.com', '$2y$10$Kb9Cu5oL3h4KZbgk1KcOYuNsqedq3OWt7fJNlCO3YEObJVhsGu99e', 'Palma B. Smith', 'Palma', '[6,4,5,3,2]', NULL, 'female', 'Frederick Taylor International University Hawaii; California.', '272 Tennessee Avenue Pontiac, US 48342', NULL, 'Blogger', 'Single', '248-322-3552', '957225600', NULL, '4mVHtspa36RvIq8SoLhG7AbjFrPBflONJDZWYewg.jpg', 'XsTWV9S3pPw0I52BueGzovKafqcLHg7i8rDY4tx1.jpg', NULL, '2022-11-02 04:01:24', 'Asia/Dhaka', '2022-09-08 14:33:54', NULL, '2022-09-20 05:19:53', '2022-11-02 12:01:24'),
(8, 'general', NULL, 'JerriRDover@example.com', '$2y$10$Kb9Cu5oL3h4KZbgk1KcOYuNsqedq3OWt7fJNlCO3YEObJVhsGu99e', 'Jerri R. Dover', 'Jerri', '[]', NULL, NULL, NULL, NULL, NULL, NULL, 'Single', '240-463-5031', '1025395200', NULL, 'HpurcPwb7YzNtBCimXR96I4yajVTQJgkFe1dKfZW.jpg', 'NJ6bUrsQFCKWtB08VvSfOkIeaniq3HhzLxglc4jp.jpg', NULL, '2022-09-19 23:34:05', 'Asia/Dhaka', '2022-09-08 14:33:54', NULL, '2022-09-20 05:27:47', '2022-09-20 05:34:05'),
(9, 'general', NULL, 'JackiePParker@example.com', '$2y$10$Kb9Cu5oL3h4KZbgk1KcOYuNsqedq3OWt7fJNlCO3YEObJVhsGu99e', 'Jackie P. Parker', 'Jackie', '[]', NULL, 'male', 'Cal Southern University.', '1067 Maloy Court Salina, NY 67401', NULL, 'Student', 'Single', '785-371-3528', '957744000', NULL, 'PWsoQv2rjFxMHzu1CkTXLtfawmbpgSUZ0dOqiN5A.jpg', 'jgrGlsPwWYmAuHJQKvZVO2R70L6McDNhE9kf4xed.jpg', NULL, '2022-09-19 23:41:03', 'Asia/Dhaka', '2022-09-08 14:33:54', NULL, '2022-09-20 05:35:52', '2022-09-20 05:41:03'),
(10, 'general', NULL, 'EmeldaSFairley@example.com', '$2y$10$Kb9Cu5oL3h4KZbgk1KcOYuNsqedq3OWt7fJNlCO3YEObJVhsGu99e', 'Emelda S. Fairley', 'Emelda', '[]', NULL, 'female', 'Christian Leadership University New York.', '3832 Hidden Valley Road Lebanon,US 17042', NULL, 'Student', 'Single', '717-228-7177', '1033171200', 'Surely you will get something better than what is gone', 'cVRxWIU4LntZBP6e8Os3ldSGvpmfogwabMNzTyFC.jpg', 'qG5QkY0ncX1phlmKirWEa3VMAPb7xIs8Od2T4ZR9.jpg', NULL, '2022-09-19 23:48:00', 'Asia/Dhaka', '2022-09-08 14:33:54', NULL, '2022-09-20 05:43:35', '2022-09-20 05:48:00'),
(11, 'general', NULL, 'JohnMOsborne@example.com', '$2y$10$Kb9Cu5oL3h4KZbgk1KcOYuNsqedq3OWt7fJNlCO3YEObJVhsGu99e', 'John M. Osborne', NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, 'Single', '760-203-7196', '953510400', NULL, NULL, 'z3FT5sbACD1PdpkGqnBfaWUcuQI9xte0OVJM24R6.jpg', NULL, '2022-09-20 00:09:15', 'Asia/Dhaka', '2022-09-08 14:33:54', NULL, '2022-09-20 05:51:38', '2022-09-20 06:09:15'),
(12, 'general', NULL, 'Toufiqul.creativeitem@gmail.com', '$2y$10$Kb9Cu5oL3h4KZbgk1KcOYuNsqedq3OWt7fJNlCO3YEObJVhsGu99e', 'Toufiq', NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-22 00:29:08', 'Asia/Dhaka', '2022-09-22 00:29:02', NULL, '2022-09-22 08:28:45', '2022-09-22 08:29:08'),
(13, 'general', '751357', 'user33@example.com', '$2y$10$jx0iFQ02.CyWRelJBUV66Oe0GDohzn8dadkCogdg5fTkqMpAHQVma', 'Mav William', NULL, '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2022-10-23 00:59:31', 'Asia/Dhaka', NULL, NULL, '2022-10-23 08:59:31', '2022-10-23 08:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `category` text DEFAULT NULL,
  `privacy` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `view` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `user_id`, `title`, `category`, `privacy`, `file`, `view`, `created_at`, `updated_at`) VALUES
(19, 2, 'Mighty Singapore', 'shorts', 'public', 'U210kpXOsPI7YHuzlyMemhLDVxTqa3j9FdocfZAR.mp4', '[]', '2022-10-17 01:40:19', '2022-10-17 01:40:19'),
(20, 2, 'Sunset at beach', 'shorts', 'public', 'y1Z8sYv6MrhFbTdiBLtCAG0WVIH9z3pneluoSXmN.mp4', '[]', '2022-10-17 01:41:29', '2022-10-17 01:41:29'),
(21, 5, 'View from my hotel room', 'shorts', 'public', 'ImKpi8Cdans3TBrwfUbh46VHPRlZWuQxjGtgyAc2.mp4', '[]', '2022-10-17 01:46:33', '2022-10-17 01:46:33'),
(22, 5, 'My loving family', 'shorts', 'public', 'He48XPMRsWTQ3Zxh5pb2Sr1ABLINC6ni70t9kvGl.mp4', '[]', '2022-10-17 01:47:09', '2022-10-17 01:47:09'),
(24, 4, 'Sailing to infinity', 'shorts', 'public', 'L31E2yeWdmfFhG7U8ozVbNZ9XMPjiBkvaOAgJQS5.mp4', '[]', '2022-10-17 01:53:42', '2022-10-17 01:53:42'),
(26, 4, 'At Moren Lake', 'shorts', 'public', 'NDmsARZIMh7KVzE2l9yaYjg1HOCLXQuqt6w0dWFT.mp4', '[]', '2022-10-17 01:57:58', '2022-10-17 01:57:58'),
(28, 6, 'Relax time', 'shorts', 'public', '1KRgywYm72hz65MUHBkXc38xC40OTFIqe9faSuvl.mp4', '[]', '2022-10-17 02:20:40', '2022-10-17 02:20:40'),
(29, 6, 'Good time with friends', 'shorts', 'public', 'M4qicvNms0KCWxTI5rZLOEhu2bGyQ869pJHXtY3B.mp4', '[]', '2022-10-17 02:21:07', '2022-10-17 02:21:07'),
(30, 7, 'My brother\'s family', 'shorts', 'public', 'HXaPEV83vjWZCt59n2w0MBTFJxQdlo7IRSLYuiyD.mp4', '[]', '2022-10-17 02:25:11', '2022-10-17 02:25:11'),
(31, 7, 'Turkey', 'shorts', 'public', 'R53zGabD6QJt4dFIsyWrENLKnH12MVuYp7SmTwBv.mp4', '[]', '2022-10-17 02:25:48', '2022-10-17 02:25:48'),
(32, 7, 'My New wall', 'video', 'public', 'wojHKlqNa9PZBT4b5SAsLi3XJ8rmR0D2pzQ1GIUe.mp4', '[]', '2022-10-17 02:37:30', '2022-10-17 02:37:30'),
(33, 7, 'Let\'s have a positive life', 'video', 'public', 'AfSvi5HBTjVyctbhDgoUOxLakNnGd4m9YFls8Zzw.mp4', '[]', '2022-10-17 02:38:06', '2022-10-17 02:38:06'),
(34, 5, 'They are growing faster', 'video', 'public', 'z7eN4QyfLOJsES6wXGj0M1HudkPiVoDYvTtRFp5A.mp4', '[]', '2022-10-17 02:39:41', '2022-10-17 02:39:41'),
(35, 5, 'Family time', 'video', 'public', 'ga2yV31dHqs9iOBKcIpMTlz6txouvQ5FRhwb7nJC.mp4', '[]', '2022-10-17 02:40:10', '2022-10-17 02:40:10'),
(36, 4, 'Travel video', 'video', 'public', 'WMnjNDU9FKflEreShkRqXubtsCBvYOzpZxVJ0IQ6.mp4', '[]', '2022-10-17 02:42:48', '2022-10-17 02:42:48'),
(37, 5, 'Sudden view', 'video', 'public', 'C1VxMA9ioy0zpfGYUnlj8qRTbhNmdKskrFBuDP2H.mp4', '[]', '2022-10-17 02:46:23', '2022-10-17 02:46:23'),
(38, 5, 'bird', 'video', 'public', 'HsY86zdCRyArfVx5l429jm3NkWTvLbKqMeoStw0X.mp4', '[]', '2022-10-17 03:01:10', '2022-10-17 03:01:10'),
(39, 6, 'Honeymoon', 'video', 'public', 'wlqWjkRUcd7i6Sg5VT1pIOMvNaLP2Ju8eQohbCx0.mp4', '[]', '2022-10-17 03:03:17', '2022-10-17 03:03:17'),
(40, 6, 'Underwater diving with my new gopro', 'video', 'public', 'KAyuwElTj3StYeFiJ6BUXM2Q51NzGPDxmqkahnR8.mp4', '[]', '2022-10-17 03:03:50', '2022-10-17 03:03:50'),
(41, 2, 'about last night', 'video', 'public', 'B85Ocg3UDQbd4LoRfxISaEKJ1HqVruzlipCGnYM7.mp4', '[]', '2022-10-17 03:09:02', '2022-10-17 03:09:02'),
(42, 2, 'Butterfly love', 'video', 'public', '93GnoEdHIlLBZz87h0c65KRFiOArNvSmMkqDxJpC.mp4', '[]', '2022-10-17 03:09:54', '2022-10-17 03:09:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

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
-- Indexes for table `language`
--
ALTER TABLE `language`
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
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `album_images`
--
ALTER TABLE `album_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `blogcategories`
--
ALTER TABLE `blogcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feeling_and_activities`
--
ALTER TABLE `feeling_and_activities`
  MODIFY `feeling_and_activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `invites`
--
ALTER TABLE `invites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=535;

--
-- AUTO_INCREMENT for table `live_streamings`
--
ALTER TABLE `live_streamings`
  MODIFY `streaming_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marketplaces`
--
ALTER TABLE `marketplaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `media_files`
--
ALTER TABLE `media_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `message_thrades`
--
ALTER TABLE `message_thrades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `pagecategories`
--
ALTER TABLE `pagecategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `page_likes`
--
ALTER TABLE `page_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `post_shares`
--
ALTER TABLE `post_shares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saved_products`
--
ALTER TABLE `saved_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `saveforlaters`
--
ALTER TABLE `saveforlaters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `story_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
