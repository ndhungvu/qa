-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2016 at 04:59 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qa`
--

-- --------------------------------------------------------

--
-- Table structure for table `awnsers`
--

CREATE TABLE IF NOT EXISTS `awnsers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `is_correct` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=237 ;

--
-- Dumping data for table `awnsers`
--

INSERT INTO `awnsers` (`id`, `content`, `question_id`, `is_correct`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Then', 1, 0, 1, '2016-02-06 00:40:40', '2016-02-06 02:59:53', '2016-02-06 02:59:53'),
(2, 'Than', 1, 1, 1, '2016-02-06 00:40:40', '2016-02-06 02:59:53', '2016-02-06 02:59:53'),
(3, 'Thin', 1, 0, 1, '2016-02-06 00:40:40', '2016-02-06 02:59:53', '2016-02-06 02:59:53'),
(4, 'Them', 1, 0, 1, '2016-02-06 00:40:40', '2016-02-06 02:59:53', '2016-02-06 02:59:53'),
(13, 'Have2', 2, 1, 1, '2016-02-06 02:10:59', '2016-02-06 02:54:14', '2016-02-06 02:54:14'),
(14, 'Would have2', 2, 0, 1, '2016-02-06 02:10:59', '2016-02-06 02:54:14', '2016-02-06 02:54:14'),
(15, 'Have had2', 2, 0, 1, '2016-02-06 02:10:59', '2016-02-06 02:54:14', '2016-02-06 02:54:14'),
(16, '2Had', 2, 0, 1, '2016-02-06 02:10:59', '2016-02-06 02:54:14', '2016-02-06 02:54:14'),
(29, 'because', 3, 1, 1, '2016-02-06 02:20:13', '2016-02-06 02:20:13', NULL),
(30, 'because of', 3, 0, 1, '2016-02-06 02:20:13', '2016-02-06 02:20:13', NULL),
(31, 'although', 3, 0, 1, '2016-02-06 02:20:13', '2016-02-06 02:20:13', NULL),
(32, 'unless', 3, 0, 1, '2016-02-06 02:20:13', '2016-02-06 02:20:13', NULL),
(33, 'how', 4, 0, 1, '2016-02-06 02:21:20', '2016-02-06 02:21:20', NULL),
(34, 'who', 4, 0, 1, '2016-02-06 02:21:20', '2016-02-06 02:21:20', NULL),
(35, 'which', 4, 1, 1, '2016-02-06 02:21:20', '2016-02-06 02:21:20', NULL),
(36, 'with', 4, 0, 1, '2016-02-06 02:21:20', '2016-02-06 02:21:20', NULL),
(37, 'in', 5, 0, 1, '2016-02-11 13:07:18', '2016-02-11 13:07:18', NULL),
(38, 'at', 5, 1, 1, '2016-02-11 13:07:18', '2016-02-11 13:07:18', NULL),
(39, 'on', 5, 0, 1, '2016-02-11 13:07:18', '2016-02-11 13:07:18', NULL),
(40, 'under', 5, 0, 1, '2016-02-11 13:07:18', '2016-02-11 13:07:18', NULL),
(41, 'Yes, they go', 6, 0, 1, '2016-02-11 13:08:16', '2016-02-11 13:08:16', NULL),
(42, 'Yes, they do', 6, 1, 1, '2016-02-11 13:08:17', '2016-02-11 13:08:17', NULL),
(43, 'They go', 6, 0, 1, '2016-02-11 13:08:17', '2016-02-11 13:08:17', NULL),
(44, ' No, they don''t go', 6, 0, 1, '2016-02-11 13:08:17', '2016-02-11 13:08:17', NULL),
(45, ' is the time', 7, 1, 1, '2016-02-11 13:09:08', '2016-02-11 13:09:08', NULL),
(46, 'does the time', 7, 0, 1, '2016-02-11 13:09:08', '2016-02-11 13:09:08', NULL),
(47, 'is time', 7, 0, 1, '2016-02-11 13:09:08', '2016-02-11 13:09:08', NULL),
(48, ' is it', 7, 0, 1, '2016-02-11 13:09:08', '2016-02-11 13:09:08', NULL),
(49, 'with', 8, 1, 1, '2016-02-11 13:09:46', '2016-02-11 13:09:46', NULL),
(50, 'in', 8, 0, 1, '2016-02-11 13:09:46', '2016-02-11 13:09:46', NULL),
(51, 'on', 8, 0, 1, '2016-02-11 13:09:46', '2016-02-11 13:09:46', NULL),
(52, 'by', 8, 0, 1, '2016-02-11 13:09:46', '2016-02-11 13:09:46', NULL),
(53, 'have', 9, 1, 1, '2016-02-11 13:10:23', '2016-02-11 13:10:23', NULL),
(54, 'is', 9, 0, 1, '2016-02-11 13:10:23', '2016-02-11 13:10:23', NULL),
(55, 'done', 9, 0, 1, '2016-02-11 13:10:23', '2016-02-11 13:10:23', NULL),
(56, 'are', 9, 0, 1, '2016-02-11 13:10:23', '2016-02-11 13:10:23', NULL),
(57, 'Yes there are', 10, 0, 1, '2016-02-11 13:16:01', '2016-02-11 13:16:01', NULL),
(58, 'Yes, they are', 10, 0, 1, '2016-02-11 13:16:01', '2016-02-11 13:16:01', NULL),
(59, 'Some are', 10, 1, 1, '2016-02-11 13:16:01', '2016-02-11 13:16:01', NULL),
(60, 'No they aren''t', 10, 0, 1, '2016-02-11 13:16:01', '2016-02-11 13:16:01', NULL),
(61, 'home work', 11, 0, 1, '2016-02-11 13:16:43', '2016-02-11 13:16:43', NULL),
(62, 'homework', 11, 0, 1, '2016-02-11 13:16:43', '2016-02-11 13:16:43', NULL),
(63, 'homeworks', 11, 1, 1, '2016-02-11 13:16:43', '2016-02-11 13:16:43', NULL),
(64, 'housework', 11, 0, 1, '2016-02-11 13:16:44', '2016-02-11 13:16:44', NULL),
(65, 'teach', 12, 0, 1, '2016-02-11 13:17:32', '2016-02-11 13:17:32', NULL),
(66, 'teaches', 12, 0, 1, '2016-02-11 13:17:32', '2016-02-11 13:17:32', NULL),
(67, 'teaching', 12, 1, 1, '2016-02-11 13:17:32', '2016-02-11 13:17:32', NULL),
(68, 'to teach', 12, 0, 1, '2016-02-11 13:17:32', '2016-02-11 13:17:32', NULL),
(69, 'i', 13, 0, 1, '2016-02-11 13:20:16', '2016-02-11 13:20:16', NULL),
(70, 'me', 13, 0, 1, '2016-02-11 13:20:16', '2016-02-11 13:20:16', NULL),
(71, 'my', 13, 0, 1, '2016-02-11 13:20:16', '2016-02-11 13:20:16', NULL),
(72, 'mine', 13, 1, 1, '2016-02-11 13:20:16', '2016-02-11 13:20:16', NULL),
(73, 'many', 14, 0, 1, '2016-02-11 13:21:12', '2016-02-11 13:21:12', NULL),
(74, 'much', 14, 0, 1, '2016-02-11 13:21:12', '2016-02-11 13:21:12', NULL),
(75, 'a lot of', 14, 1, 1, '2016-02-11 13:21:12', '2016-02-11 13:21:12', NULL),
(76, 'very', 14, 0, 1, '2016-02-11 13:21:12', '2016-02-11 13:21:12', NULL),
(77, 'a', 15, 1, 1, '2016-02-11 13:21:48', '2016-02-11 13:21:48', NULL),
(78, 'one', 15, 0, 1, '2016-02-11 13:21:48', '2016-02-11 13:21:48', NULL),
(79, 'the', 15, 0, 1, '2016-02-11 13:21:48', '2016-02-11 13:21:48', NULL),
(80, 'an', 15, 0, 1, '2016-02-11 13:21:49', '2016-02-11 13:21:49', NULL),
(81, 'no brothers or sisters', 16, 1, 1, '2016-02-13 15:25:35', '2016-02-13 15:25:35', NULL),
(82, 'brothers or sisters', 16, 0, 1, '2016-02-13 15:25:35', '2016-02-13 15:25:35', NULL),
(83, 'any brothers or sisters', 16, 0, 1, '2016-02-13 15:25:35', '2016-02-13 15:25:35', NULL),
(84, 'some brothers and sisters', 16, 0, 1, '2016-02-13 15:25:35', '2016-02-13 15:25:35', NULL),
(85, 'to going', 17, 1, 1, '2016-02-13 15:26:35', '2016-02-13 15:26:35', NULL),
(86, 'goes to', 17, 0, 1, '2016-02-13 15:26:35', '2016-02-13 15:26:35', NULL),
(87, 'is going to', 17, 0, 1, '2016-02-13 15:26:35', '2016-02-13 15:26:35', NULL),
(88, 'go to', 17, 0, 1, '2016-02-13 15:26:35', '2016-02-13 15:26:35', NULL),
(89, ' David is the boss, you need to speak to …..', 18, 1, 1, '2016-02-13 15:27:07', '2016-02-13 15:27:07', NULL),
(90, 'him', 18, 0, 1, '2016-02-13 15:27:07', '2016-02-13 15:27:07', NULL),
(91, 'her', 18, 0, 1, '2016-02-13 15:27:07', '2016-02-13 15:27:07', NULL),
(92, 'them', 18, 0, 1, '2016-02-13 15:27:07', '2016-02-13 15:27:07', NULL),
(93, 'for getting', 19, 0, 1, '2016-02-13 15:27:41', '2016-02-13 15:27:41', NULL),
(94, 'to get', 19, 0, 1, '2016-02-13 15:27:41', '2016-02-13 15:27:41', NULL),
(95, 'to getting', 19, 1, 1, '2016-02-13 15:27:41', '2016-02-13 15:27:41', NULL),
(96, 'for to get', 19, 0, 1, '2016-02-13 15:27:41', '2016-02-13 15:27:41', NULL),
(97, ' in train', 20, 0, 1, '2016-02-13 15:28:18', '2016-02-13 15:28:18', NULL),
(98, 'on train', 20, 0, 1, '2016-02-13 15:28:18', '2016-02-13 15:28:18', NULL),
(99, 'by train', 20, 0, 1, '2016-02-13 15:28:18', '2016-02-13 15:28:18', NULL),
(100, 'with train', 20, 1, 1, '2016-02-13 15:28:18', '2016-02-13 15:28:18', NULL),
(101, ' to leaving', 21, 0, 1, '2016-02-13 15:30:10', '2016-02-13 15:30:10', NULL),
(102, 'leaves for', 21, 1, 1, '2016-02-13 15:30:10', '2016-02-13 15:30:10', NULL),
(103, 'is leaving for', 21, 0, 1, '2016-02-13 15:30:10', '2016-02-13 15:30:10', NULL),
(104, 'leave to', 21, 0, 1, '2016-02-13 15:30:10', '2016-02-13 15:30:10', NULL),
(105, 'to buying', 22, 1, 1, '2016-02-13 15:30:44', '2016-02-13 15:30:44', NULL),
(106, 'for buying', 22, 0, 1, '2016-02-13 15:30:44', '2016-02-13 15:30:44', NULL),
(107, 'to buy', 22, 0, 1, '2016-02-13 15:30:44', '2016-02-13 15:30:44', NULL),
(108, 'for to buy', 22, 0, 1, '2016-02-13 15:30:44', '2016-02-13 15:30:44', NULL),
(109, 'not anywhere.', 23, 0, 1, '2016-02-13 15:31:26', '2016-02-13 15:31:26', NULL),
(110, 'nowhere.', 23, 0, 1, '2016-02-13 15:31:26', '2016-02-13 15:31:26', NULL),
(111, 'anywhere.', 23, 1, 1, '2016-02-13 15:31:26', '2016-02-13 15:31:26', NULL),
(112, 'somewhere.', 23, 0, 1, '2016-02-13 15:31:26', '2016-02-13 15:31:26', NULL),
(113, 'no money', 24, 0, 1, '2016-02-13 15:32:13', '2016-02-13 15:32:13', NULL),
(114, 'money', 24, 1, 1, '2016-02-13 15:32:13', '2016-02-13 15:32:13', NULL),
(115, 'any money', 24, 0, 1, '2016-02-13 15:32:13', '2016-02-13 15:32:13', NULL),
(116, 'some money', 24, 0, 1, '2016-02-13 15:32:13', '2016-02-13 15:32:13', NULL),
(117, 'There isn’t no', 25, 0, 1, '2016-02-13 15:32:47', '2016-02-13 15:32:47', NULL),
(118, 'There is any', 25, 1, 1, '2016-02-13 15:32:47', '2016-02-13 15:32:47', NULL),
(119, 'There isn’t any', 25, 0, 1, '2016-02-13 15:32:47', '2016-02-13 15:32:47', NULL),
(120, 'There aren’t no', 25, 0, 1, '2016-02-13 15:32:47', '2016-02-13 15:32:47', NULL),
(121, 'a lot', 26, 1, 1, '2016-02-13 15:33:22', '2016-02-13 15:33:22', NULL),
(122, 'little', 26, 0, 1, '2016-02-13 15:33:22', '2016-02-13 15:33:22', NULL),
(123, 'too', 26, 0, 1, '2016-02-13 15:33:22', '2016-02-13 15:33:22', NULL),
(124, 'much', 26, 0, 1, '2016-02-13 15:33:22', '2016-02-13 15:33:22', NULL),
(125, 'to going', 27, 0, 1, '2016-02-13 15:34:29', '2016-02-13 15:34:29', NULL),
(126, 'goes to', 27, 0, 1, '2016-02-13 15:34:29', '2016-02-13 15:34:29', NULL),
(127, 'is going to', 27, 1, 1, '2016-02-13 15:34:29', '2016-02-13 15:34:29', NULL),
(128, 'go to', 27, 0, 1, '2016-02-13 15:34:29', '2016-02-13 15:34:29', NULL),
(129, 'on Mondays', 28, 0, 1, '2016-02-13 15:35:14', '2016-02-13 15:35:14', NULL),
(130, 'in Mondays', 28, 0, 1, '2016-02-13 15:35:14', '2016-02-13 15:35:14', NULL),
(131, 'at Mondays', 28, 1, 1, '2016-02-13 15:35:14', '2016-02-13 15:35:14', NULL),
(132, 'by Mondays', 28, 0, 1, '2016-02-13 15:35:14', '2016-02-13 15:35:14', NULL),
(133, 'anywhere', 29, 1, 1, '2016-02-13 15:35:55', '2016-02-13 15:35:55', NULL),
(134, 'nowhere', 29, 0, 1, '2016-02-13 15:35:55', '2016-02-13 15:35:55', NULL),
(135, 'everywhere', 29, 0, 1, '2016-02-13 15:35:55', '2016-02-13 15:35:55', NULL),
(136, 'somewhere', 29, 0, 1, '2016-02-13 15:35:56', '2016-02-13 15:35:56', NULL),
(137, 'few.', 30, 0, 1, '2016-02-13 15:37:14', '2016-02-13 15:37:14', NULL),
(138, 'too little', 30, 1, 1, '2016-02-13 15:37:14', '2016-02-13 15:37:14', NULL),
(139, 'too much little.', 30, 0, 1, '2016-02-13 15:37:14', '2016-02-13 15:37:14', NULL),
(140, 'too few.', 30, 0, 1, '2016-02-13 15:37:14', '2016-02-13 15:37:14', NULL),
(141, 'to crying!', 31, 0, 1, '2016-02-13 15:37:54', '2016-02-13 15:37:54', NULL),
(142, 'crying!', 31, 0, 1, '2016-02-13 15:37:54', '2016-02-13 15:37:54', NULL),
(143, 'cry!', 31, 1, 1, '2016-02-13 15:37:54', '2016-02-13 15:37:54', NULL),
(144, 'in crying!', 31, 0, 1, '2016-02-13 15:37:54', '2016-02-13 15:37:54', NULL),
(145, 'telling', 32, 0, 1, '2016-02-13 15:38:43', '2016-02-13 15:38:43', NULL),
(146, 'saying', 32, 1, 1, '2016-02-13 15:38:43', '2016-02-13 15:38:43', NULL),
(147, 'saying to', 32, 0, 1, '2016-02-13 15:38:43', '2016-02-13 15:38:43', NULL),
(148, 'telling to', 32, 0, 1, '2016-02-13 15:38:43', '2016-02-13 15:38:43', NULL),
(149, 'weren’t', 33, 1, 1, '2016-02-13 15:39:19', '2016-02-13 15:39:19', NULL),
(150, 'weren’t', 33, 0, 1, '2016-02-13 15:39:19', '2016-02-13 15:39:19', NULL),
(151, 'were', 33, 0, 1, '2016-02-13 15:39:19', '2016-02-13 15:39:19', NULL),
(152, 'was', 33, 0, 1, '2016-02-13 15:39:19', '2016-02-13 15:39:19', NULL),
(153, 'much few.', 34, 0, 1, '2016-02-13 15:39:54', '2016-02-13 15:39:54', NULL),
(154, 'too much little', 34, 0, 1, '2016-02-13 15:39:54', '2016-02-13 15:39:54', NULL),
(155, 'too little.', 34, 1, 1, '2016-02-13 15:39:54', '2016-02-13 15:39:54', NULL),
(156, 'too few.', 34, 0, 1, '2016-02-13 15:39:55', '2016-02-13 15:39:55', NULL),
(157, 'did work', 35, 0, 1, '2016-02-13 15:40:55', '2016-02-13 15:40:55', NULL),
(158, 'has worked', 35, 0, 1, '2016-02-13 15:40:55', '2016-02-13 15:40:55', NULL),
(159, 'does work', 35, 1, 1, '2016-02-13 15:40:55', '2016-02-13 15:40:55', NULL),
(160, 'works', 35, 0, 1, '2016-02-13 15:40:55', '2016-02-13 15:40:55', NULL),
(161, 'will move to', 36, 0, 1, '2016-02-13 15:41:33', '2016-02-13 15:41:33', NULL),
(162, 'have moved to', 36, 0, 1, '2016-02-13 15:41:33', '2016-02-13 15:41:33', NULL),
(163, ' would move to', 36, 1, 1, '2016-02-13 15:41:33', '2016-02-13 15:41:33', NULL),
(164, 'would have moved to', 36, 0, 1, '2016-02-13 15:41:33', '2016-02-13 15:41:33', NULL),
(165, ' still', 37, 0, 1, '2016-02-13 15:43:24', '2016-02-13 15:43:24', NULL),
(166, 'already', 37, 0, 1, '2016-02-13 15:43:25', '2016-02-13 15:43:25', NULL),
(167, 'yet', 37, 0, 1, '2016-02-13 15:43:25', '2016-02-13 15:43:25', NULL),
(168, 'now', 37, 1, 1, '2016-02-13 15:43:25', '2016-02-13 15:43:25', NULL),
(169, 'weren’t', 38, 0, 1, '2016-02-13 15:44:03', '2016-02-13 15:44:03', NULL),
(170, 'was', 38, 0, 1, '2016-02-13 15:44:03', '2016-02-13 15:44:03', NULL),
(171, 'were', 38, 1, 1, '2016-02-13 15:44:03', '2016-02-13 15:44:03', NULL),
(172, 'wasn''t', 38, 0, 1, '2016-02-13 15:44:03', '2016-02-13 15:44:03', NULL),
(173, 'had already got', 39, 0, 1, '2016-02-16 10:15:31', '2016-02-16 10:15:31', NULL),
(174, 'had already had', 39, 1, 1, '2016-02-16 10:15:31', '2016-02-16 10:15:31', NULL),
(175, ' have already had', 39, 0, 1, '2016-02-16 10:15:31', '2016-02-16 10:15:31', NULL),
(176, 'already had', 39, 0, 1, '2016-02-16 10:15:31', '2016-02-16 10:15:31', NULL),
(177, 'have just seen him', 40, 0, 1, '2016-02-16 10:16:07', '2016-02-16 10:16:07', NULL),
(178, 'am just seen him.', 40, 0, 1, '2016-02-16 10:16:07', '2016-02-16 10:16:07', NULL),
(179, ' just see him.', 40, 0, 1, '2016-02-16 10:16:07', '2016-02-16 10:16:07', NULL),
(180, 'am just seen him.', 40, 1, 1, '2016-02-16 10:16:07', '2016-02-16 10:16:07', NULL),
(181, 'to finish', 41, 1, 1, '2016-02-16 10:16:45', '2016-02-16 10:16:45', NULL),
(182, 'finishing', 41, 0, 1, '2016-02-16 10:16:45', '2016-02-16 10:16:45', NULL),
(183, 'finish', 41, 0, 1, '2016-02-16 10:16:45', '2016-02-16 10:16:45', NULL),
(184, 'to finishing', 41, 0, 1, '2016-02-16 10:16:45', '2016-02-16 10:16:45', NULL),
(185, 'do you?', 42, 0, 1, '2016-02-16 10:17:22', '2016-02-16 10:17:22', NULL),
(186, 'are you?', 42, 0, 1, '2016-02-16 10:17:22', '2016-02-16 10:17:22', NULL),
(187, 'don''t you?', 42, 1, 1, '2016-02-16 10:17:22', '2016-02-16 10:17:22', NULL),
(188, 'didn’t you?', 42, 0, 1, '2016-02-16 10:17:22', '2016-02-16 10:17:22', NULL),
(189, 'did work', 43, 0, 1, '2016-02-16 10:20:02', '2016-02-16 10:20:02', NULL),
(190, 'has worked', 43, 1, 1, '2016-02-16 10:20:02', '2016-02-16 10:20:02', NULL),
(191, 'does work', 43, 0, 1, '2016-02-16 10:20:02', '2016-02-16 10:20:02', NULL),
(192, 'works', 43, 0, 1, '2016-02-16 10:20:02', '2016-02-16 10:20:02', NULL),
(193, 'still', 44, 0, 1, '2016-02-16 10:20:33', '2016-02-16 10:20:33', NULL),
(194, 'already', 44, 1, 1, '2016-02-16 10:20:33', '2016-02-16 10:20:33', NULL),
(195, 'yet', 44, 0, 1, '2016-02-16 10:20:33', '2016-02-16 10:20:33', NULL),
(196, 'now', 44, 0, 1, '2016-02-16 10:20:33', '2016-02-16 10:20:33', NULL),
(197, 'How long', 45, 0, 1, '2016-02-16 10:21:09', '2016-02-16 10:21:09', NULL),
(198, 'How long time', 45, 0, 1, '2016-02-16 10:21:09', '2016-02-16 10:21:09', NULL),
(199, 'What time', 45, 1, 1, '2016-02-16 10:21:09', '2016-02-16 10:21:09', NULL),
(200, 'For how long', 45, 0, 1, '2016-02-16 10:21:10', '2016-02-16 10:21:10', NULL),
(201, 'to shouting!', 46, 0, 1, '2016-02-16 10:21:47', '2016-02-16 10:21:47', NULL),
(202, 'shouting!', 46, 0, 1, '2016-02-16 10:21:47', '2016-02-16 10:21:47', NULL),
(203, 'shout!', 46, 1, 1, '2016-02-16 10:21:47', '2016-02-16 10:21:47', NULL),
(204, 'in shouting!', 46, 0, 1, '2016-02-16 10:21:47', '2016-02-16 10:21:47', NULL),
(205, 'How long', 47, 0, 1, '2016-02-16 10:22:22', '2016-02-16 10:22:22', NULL),
(206, 'How long time', 47, 0, 1, '2016-02-16 10:22:23', '2016-02-16 10:22:23', NULL),
(207, 'What time', 47, 1, 1, '2016-02-16 10:22:23', '2016-02-16 10:22:23', NULL),
(208, 'For how long', 47, 0, 1, '2016-02-16 10:22:23', '2016-02-16 10:22:23', NULL),
(209, 'weren’t', 48, 0, 1, '2016-02-16 10:22:57', '2016-02-16 10:22:57', NULL),
(210, 'wasn''t', 48, 0, 1, '2016-02-16 10:22:57', '2016-02-16 10:22:57', NULL),
(211, 'were', 48, 1, 1, '2016-02-16 10:22:57', '2016-02-16 10:22:57', NULL),
(212, 'was', 48, 0, 1, '2016-02-16 10:22:57', '2016-02-16 10:22:57', NULL),
(213, 'used to', 49, 0, 1, '2016-02-16 10:23:30', '2016-02-16 10:23:30', NULL),
(214, 'used', 49, 0, 1, '2016-02-16 10:23:30', '2016-02-16 10:23:30', NULL),
(215, 'am used to', 49, 1, 1, '2016-02-16 10:23:30', '2016-02-16 10:23:30', NULL),
(216, 'would', 49, 0, 1, '2016-02-16 10:23:30', '2016-02-16 10:23:30', NULL),
(217, 'must', 50, 0, 1, '2016-02-16 10:24:02', '2016-02-16 10:24:02', NULL),
(218, 'had to', 50, 0, 1, '2016-02-16 10:24:02', '2016-02-16 10:24:02', NULL),
(219, 'ought to', 50, 0, 1, '2016-02-16 10:24:02', '2016-02-16 10:24:02', NULL),
(220, 'must to', 50, 1, 1, '2016-02-16 10:24:02', '2016-02-16 10:24:02', NULL),
(221, 'may arrive', 51, 0, 1, '2016-02-16 10:24:40', '2016-02-16 10:24:40', NULL),
(222, 'might arrived', 51, 1, 1, '2016-02-16 10:24:40', '2016-02-16 10:24:40', NULL),
(223, 'should arrive', 51, 0, 1, '2016-02-16 10:24:40', '2016-02-16 10:24:40', NULL),
(224, 'may have arrived', 51, 0, 1, '2016-02-16 10:24:40', '2016-02-16 10:24:40', NULL),
(225, 'whom', 52, 1, 1, '2016-02-16 10:25:45', '2016-02-16 10:25:45', NULL),
(226, '_____', 52, 0, 1, '2016-02-16 10:25:45', '2016-02-16 10:25:45', NULL),
(227, 'what', 52, 0, 1, '2016-02-16 10:25:45', '2016-02-16 10:25:45', NULL),
(228, 'whose', 52, 0, 1, '2016-02-16 10:25:45', '2016-02-16 10:25:45', NULL),
(229, 'How much distance', 53, 0, 1, '2016-02-16 10:26:15', '2016-02-16 10:26:15', NULL),
(230, ' How long', 53, 0, 1, '2016-02-16 10:26:15', '2016-02-16 10:26:15', NULL),
(231, 'How far', 53, 1, 1, '2016-02-16 10:26:15', '2016-02-16 10:26:15', NULL),
(232, 'How many', 53, 0, 1, '2016-02-16 10:26:15', '2016-02-16 10:26:15', NULL),
(233, 'must', 54, 1, 1, '2016-02-16 10:26:48', '2016-02-16 10:26:48', NULL),
(234, 'must to', 54, 0, 1, '2016-02-16 10:26:48', '2016-02-16 10:26:48', NULL),
(235, 'ought to', 54, 0, 1, '2016-02-16 10:26:48', '2016-02-16 10:26:48', NULL),
(236, 'had to', 54, 0, 1, '2016-02-16 10:26:48', '2016-02-16 10:26:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `parent_id` int(11) NOT NULL,
  `awnsers` varchar(20) DEFAULT '[a]',
  `level_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`, `awnsers`, `level_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A/An', '', 0, '[a]', 0, 1, '2016-02-06 00:39:47', '2016-02-06 00:39:47', NULL),
(2, 'Two/Too/To', '', 0, '[a]', 0, 1, '2016-02-06 00:39:56', '2016-02-06 00:39:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_question`
--

CREATE TABLE IF NOT EXISTS `category_question` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '', 1, '2015-12-12 07:50:00', '2015-12-12 07:50:00', NULL),
(2, 'Editor', '', 1, '2015-12-12 07:50:16', '2015-12-12 07:50:16', NULL),
(3, 'User', '', 1, '2015-12-12 07:51:47', '2015-12-12 10:11:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `content` text NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `content`, `category_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'English is more popular ______ Swedish.', 1, 1, '2016-02-06 00:40:40', '2016-02-06 02:59:53', '2016-02-06 02:59:53'),
(2, 'If I ______ more free time, I would learn Italian.2', 1, 1, '2016-02-06 01:45:59', '2016-02-06 02:54:14', '2016-02-06 02:54:14'),
(3, 'Many people want to learn English ______ they think it will help their career.', 1, 1, '2016-02-06 02:16:41', '2016-02-06 02:59:40', '0000-00-00 00:00:00'),
(4, 'People ______ want to a learn foreign language must practice often.', 1, 1, '2016-02-06 02:21:20', '2016-02-06 02:47:41', '2016-02-06 02:47:41'),
(5, 'Is Susan ........... home?', 1, 1, '2016-02-11 13:07:17', '2016-02-11 13:07:17', '0000-00-00 00:00:00'),
(6, '"Do the children go to school every day?"', 1, 1, '2016-02-11 13:08:16', '2016-02-11 13:08:16', '0000-00-00 00:00:00'),
(7, 'What ............ now?', 1, 1, '2016-02-11 13:09:08', '2016-02-11 13:09:08', '0000-00-00 00:00:00'),
(8, 'They always go to school ............. bicycle.', 1, 1, '2016-02-11 13:09:46', '2016-02-11 13:09:46', '0000-00-00 00:00:00'),
(9, 'What color ........... his new car?', 1, 1, '2016-02-11 13:10:23', '2016-02-11 13:10:23', '0000-00-00 00:00:00'),
(10, 'Are there many students in Room 12?', 1, 1, '2016-02-11 13:16:01', '2016-02-11 13:16:01', '0000-00-00 00:00:00'),
(11, 'You should do your ................. before going to class.', 1, 1, '2016-02-11 13:16:43', '2016-02-11 13:16:43', '0000-00-00 00:00:00'),
(12, 'Mr. Pike ............ us English.', 1, 1, '2016-02-11 13:17:32', '2016-02-11 13:17:32', '0000-00-00 00:00:00'),
(13, 'Tom and ............. are going to the birthday party together.', 1, 1, '2016-02-11 13:20:16', '2016-02-11 13:20:16', '0000-00-00 00:00:00'),
(14, 'Our English lessons are ............... long.', 1, 1, '2016-02-11 13:21:12', '2016-02-11 13:21:12', '0000-00-00 00:00:00'),
(15, 'Bangkok is ............ capital of Thailand.', 1, 1, '2016-02-11 13:21:48', '2016-02-11 13:21:48', '0000-00-00 00:00:00'),
(16, 'I haven''t got ……', 1, 1, '2016-02-13 15:25:35', '2016-02-13 15:25:35', '0000-00-00 00:00:00'),
(17, ' George..... fly to Stockholm tomorrow.', 1, 1, '2016-02-13 15:26:35', '2016-02-13 15:26:35', '0000-00-00 00:00:00'),
(18, ' David is the boss, you need to speak to …..', 1, 1, '2016-02-13 15:27:06', '2016-02-13 15:27:06', '0000-00-00 00:00:00'),
(19, 'We have to go to the supermarket ..... some bread and milk.', 1, 1, '2016-02-13 15:27:41', '2016-02-13 15:27:41', '0000-00-00 00:00:00'),
(20, 'Every year,he goes to the coast for his holidays ....', 1, 1, '2016-02-13 15:28:18', '2016-02-13 15:28:18', '0000-00-00 00:00:00'),
(21, 'Michael.........Paris in the morning', 1, 1, '2016-02-13 15:30:09', '2016-02-13 15:30:09', '0000-00-00 00:00:00'),
(22, 'I''m going out .......some cigarettes', 1, 1, '2016-02-13 15:30:44', '2016-02-13 15:30:44', '0000-00-00 00:00:00'),
(23, 'He says he''s been robbed. He can''t find his wallet.....', 1, 1, '2016-02-13 15:31:26', '2016-02-13 15:31:26', '0000-00-00 00:00:00'),
(24, 'I haven’t got ……', 1, 1, '2016-02-13 15:32:13', '2016-02-13 15:32:13', '0000-00-00 00:00:00'),
(25, ' ..... orange juice in the fridge.', 1, 1, '2016-02-13 15:32:46', '2016-02-13 15:32:46', '0000-00-00 00:00:00'),
(26, ' We haven’t got ..... mineral water.', 1, 1, '2016-02-13 15:33:21', '2016-02-13 15:33:21', '0000-00-00 00:00:00'),
(27, 'Mark ..... fly to London tomorrow.', 1, 1, '2016-02-13 15:34:29', '2016-02-13 15:34:29', '0000-00-00 00:00:00'),
(28, 'I have class ……', 1, 1, '2016-02-13 15:35:14', '2016-02-13 15:35:14', '0000-00-00 00:00:00'),
(29, ' I’ve lost my keys. I can’t find them .....', 1, 1, '2016-02-13 15:35:55', '2016-02-13 15:35:55', '0000-00-00 00:00:00'),
(30, 'We''ll never get to the airport! There is ..... time!', 1, 1, '2016-02-13 15:37:14', '2016-02-13 15:37:14', '0000-00-00 00:00:00'),
(31, ' Don’t start ..... That''s for babies!', 1, 1, '2016-02-13 15:37:54', '2016-02-13 15:37:54', '0000-00-00 00:00:00'),
(32, 'Tom is ..... Elizabeth how to copy it right now.', 1, 1, '2016-02-13 15:38:43', '2016-02-13 15:38:43', '0000-00-00 00:00:00'),
(33, 'They weren’t happy about the new cat, and frankly, nor .... I.', 1, 1, '2016-02-13 15:39:18', '2016-02-13 15:39:18', '0000-00-00 00:00:00'),
(34, 'She can''t escape the fire There is ..... time!', 1, 1, '2016-02-13 15:39:54', '2016-02-13 15:39:54', '0000-00-00 00:00:00'),
(35, 'Micheal ....for the Bank since last year.', 1, 1, '2016-02-13 15:40:54', '2016-02-13 15:40:54', '0000-00-00 00:00:00'),
(36, ' If I didn''t have to work, I …….. the beach.', 1, 1, '2016-02-13 15:41:33', '2016-02-13 15:41:33', '0000-00-00 00:00:00'),
(37, 'Have you phoned the restaurant about the booking? Yes, I’ve …..done that.', 1, 1, '2016-02-13 15:43:24', '2016-02-13 15:43:24', '0000-00-00 00:00:00'),
(38, 'They weren’t invited to the party, and nor .... I.', 1, 1, '2016-02-13 15:44:03', '2016-02-13 15:44:03', '0000-00-00 00:00:00'),
(39, 'My mother asked me if I was hungry, But I said that I ……. dinner.', 1, 1, '2016-02-16 10:15:31', '2016-02-16 10:15:31', '0000-00-00 00:00:00'),
(40, 'That can''t be Albert! I.............', 1, 1, '2016-02-16 10:16:07', '2016-02-16 10:16:07', '0000-00-00 00:00:00'),
(41, 'I''m really looking forward ..... this exercise', 1, 1, '2016-02-16 10:16:45', '2016-02-16 10:16:45', '0000-00-00 00:00:00'),
(42, 'You live upstairs from me,..........', 1, 1, '2016-02-16 10:17:22', '2016-02-16 10:17:22', '0000-00-00 00:00:00'),
(43, 'Micheal ....for the Bank since last year.', 1, 1, '2016-02-16 10:20:02', '2016-02-16 10:20:02', '0000-00-00 00:00:00'),
(44, 'Have you phoned the restaurant about the booking? Yes, I’ve …..done that.', 1, 1, '2016-02-16 10:20:33', '2016-02-16 10:20:33', '0000-00-00 00:00:00'),
(45, '“.....have they been living in Paris?” “Only a few months”', 1, 1, '2016-02-16 10:21:09', '2016-02-16 10:21:09', '0000-00-00 00:00:00'),
(46, 'Don’t start .....', 1, 1, '2016-02-16 10:21:47', '2016-02-16 10:21:47', '0000-00-00 00:00:00'),
(47, ' “..... have you been waiting?” “Only a few minutes”', 1, 1, '2016-02-16 10:22:22', '2016-02-16 10:22:22', '0000-00-00 00:00:00'),
(48, 'They weren’t surprised and nor .... I.', 1, 1, '2016-02-16 10:22:57', '2016-02-16 10:22:57', '0000-00-00 00:00:00'),
(49, 'I .....getting up early.I do it every day.', 1, 1, '2016-02-16 10:23:30', '2016-02-16 10:23:30', '0000-00-00 00:00:00'),
(50, 'He ..... go to see the accountant this morning .', 1, 1, '2016-02-16 10:24:02', '2016-02-16 10:24:02', '0000-00-00 00:00:00'),
(51, 'The letter ..... yesterday, but I don''t know for sure.', 1, 1, '2016-02-16 10:24:40', '2016-02-16 10:24:40', '0000-00-00 00:00:00'),
(52, 'That''s the woman ..... I saw stealing the handbag!', 1, 1, '2016-02-16 10:25:45', '2016-02-16 10:25:45', '0000-00-00 00:00:00'),
(53, '..... is it from Istanbul to Bagdad?', 1, 1, '2016-02-16 10:26:15', '2016-02-16 10:26:15', '0000-00-00 00:00:00'),
(54, 'Sorry I couldn''t meet you yesterday, I........collect the kids from school', 1, 1, '2016-02-16 10:26:48', '2016-02-16 10:26:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `level_id` int(1) DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `questions` varchar(255) DEFAULT NULL,
  `awnsers` varchar(255) DEFAULT NULL,
  `correct_number` int(11) DEFAULT '0',
  `number` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `level_id`, `category_id`, `questions`, `awnsers`, `correct_number`, `number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 1, '3,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53', '1,1,2,3,4,4,9,9,9,4,9,9,9,9,9,9,9,9,9,3,9,9,9,9,9,9,9,9,9,3,9,9,9,9,9,9,9,4,9,9,9,9,9,9,9,9,9,9,9,4', 3, 50, '2016-02-16 16:00:47', '2016-02-16 16:00:47', NULL),
(2, 1, 0, 1, '3,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53', '1,1,1,1,1,1,1,1,1,1,9,9,9,2,9,2,2,2,2,2,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9', 6, 50, '2016-02-16 16:52:31', '2016-02-16 16:52:31', NULL),
(3, 1, 0, 1, '3,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53', '1,2,4,2,3,4,2,4,4,3,9,9,9,9,9,9,9,9,9,2,9,9,9,9,9,9,9,9,9,2,9,9,9,9,9,9,9,9,9,3,9,9,9,9,9,9,9,9,9,2', 3, 50, '2016-02-16 16:55:39', '2016-02-16 16:55:39', NULL),
(4, 1, 0, 1, '3,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53', '3,9,9,9,9,2,4,1,1,1,9,9,9,9,9,4,3,9,9,9,9,9,9,9,4,4,9,1,9,9,9,9,9,9,9,9,2,4,9,9,9,9,9,9,9,9,9,9,1,1', 1, 50, '2016-02-16 16:57:09', '2016-02-16 16:57:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `twitter_id` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `active_key` varchar(255) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `facebook_id`, `twitter_id`, `avatar`, `active_key`, `group_id`, `created_at`, `updated_at`, `deleted_at`, `remember_token`) VALUES
(1, 'admin', 'ndhungvu@gmail.com', '$2y$10$tZb9417UeX9JkAwb8Ei7vuYOu2RjIiLeE.fJQwRVlFL4k.lH2UYKS', '874462729334684', NULL, 'uploads/avatars/3223c037fc4553c9f801905a0082150f.jpeg', '$2y$10$wLQFbSnliWN571vL4kmlcOzn7QQPRDE2OCmlBBhvnpim/a3wo9Sny', 1, '2015-12-12 07:54:29', '2016-02-11 08:04:44', NULL, '4xT4Lhi0hb0zkbYVH4rxvHp9dAqpQCn3Knt1cGdmLxq7aC5l1LGSDh0bYLKd'),
(2, 'vtnhung90', 'vtnhung90@gmail.com', '$2y$10$UIX3YI9Yifwm7kDr91JzK.Erz1OLmcCma9uOLjYkYWj.ZgYOZTlgi', NULL, NULL, 'uploads/avatars/9f06192852b2f0d8fa34249ae7dc0bea.jpeg', '$2y$10$XWJIwzd2zvSQP7g6N4oZDOIbG3yUlZ/6.sq6LfyLXXSiUiBp2dim2', 2, '2015-12-12 07:55:11', '2015-12-16 15:41:15', NULL, NULL),
(3, 'vohai98', 'vohai98@gmail.com', '$2y$10$zTWxYnshH8YhT9htgxd7Sud3fNNpbKRIiUwfA0.s44/dtNw0o0KNm', NULL, NULL, 'uploads/avatars/e9a53eb3cef1d55419a0fe7450397ea2.bmp', '$2y$10$1HXZ.3bRaiotr64JvuzYie6OTDwpH2RwzjMckl1CcsMKBlxIWqMVG', 3, '2015-12-12 07:56:19', '2015-12-16 15:41:35', NULL, NULL),
(4, 'ndhungvu', 'admin@gmail.com', '$2y$10$uodksOvHHQFRJH/EI88nAu6Q4RdCEq4yUdA/GDJa7zMRVSLNMNRDO', NULL, NULL, NULL, '$2y$10$PjBiBvAKFgtbaQpCnO76i.K/1WtlYUDBLrB99SjF3DbhqnppHvxNG', 3, '2015-12-12 09:08:58', '2015-12-12 09:46:01', '2015-12-12 09:46:01', NULL),
(5, 'admin2', 'admin@gmail.com', '$2y$10$sgD0Ms1qPxmATMYuLhQXiOwmCJmVH9OTzCOC4MLexbS/w6ZhCzTEq', NULL, NULL, 'uploads/image/291c4738ddf513df92e94c585d1f24ae.jpeg', '$2y$10$lizysd174EJzFq.YnhHKL.uWnrtf7jpOtZXWIfNIaJYtXSCqcZv/O', 3, '2015-12-12 09:23:36', '2015-12-12 09:46:01', '2015-12-12 09:46:01', NULL),
(6, 'sdsd', 'admin@gmail.com', '$2y$10$LRV8G.wKQskc/5KQTMs3nexY1Zw5OXSliQH/H9LH.AkVOSis6W0k6', NULL, NULL, 'uploads/avatars/d463342a9373fee1e9d4e96b66e56804.jpeg', '$2y$10$tTpogBQB8KFi.dbfjOyB5O9mn9mReIi47MTmtxabrHZEBUN7uPfg6', 3, '2015-12-12 09:26:57', '2015-12-12 09:47:12', '2015-12-12 09:47:12', NULL),
(7, 'dfdfd', 'admin@gmail.com', '$2y$10$DhQ3HlrdFyHjcWOwZFKn1OZLG2J20gkhLZB86LJE7a2RyWdx4v2NK', NULL, NULL, 'uploads/avatars/c2ccb0ede16ce68a873e7d2a5dd2bbd8.jpeg', '$2y$10$WytlnNmgAuKrDGmU3phqReGvs633E.f7Rsnvz3K0ikvebm/kgJR1q', 1, '2015-12-12 09:44:29', '2015-12-12 09:47:09', '2015-12-12 09:47:09', NULL),
(8, 'admin', 'admin@gmail.com', '$2y$10$4fCnb8N9kxBdSKNoBEJcBOO1F4HwWzVmxCGT.W81eB2Lkjlla80i6', NULL, NULL, 'uploads/avatars/09d146831f61b27b82c519a63d43f8aa.jpeg', '$2y$10$9EylYRf/vpt1c3rPc9bnpeXnt98SC4.BPpHG6Sa7InVVSwOr9fb8y', 1, '2015-12-12 10:09:05', '2015-12-12 10:09:15', '2015-12-12 10:09:15', NULL),
(9, 'ddđ', '123@gmail.com', '$2y$10$fP.0gyimrjY.0LZJKYrXneZVsZAG3mA.SaSETCmRFNXKqVYim8YXa', NULL, NULL, '/uploads/avatars/no-avatar.png', '$2y$10$Z1hiVP.qWj4NR1Q0eJVJvOeblGbC7GKmpz7xSKqmd3ixfY9G2vSeO', 1, '2015-12-14 04:50:27', '2015-12-14 04:50:27', NULL, NULL),
(10, 'ndhungvu', '', '', NULL, '412131872', 'uploads/avatars/1452054543.jpg', '$2y$10$61Mzt26HSH1sQT2gvYQp5e0A.kOqNRliHXJF89R75fKd.F4qgemi2', 3, '2016-01-06 11:29:03', '2016-01-06 11:29:13', NULL, 'Uu5NnJx2NP7Uk5sE3vdj1osdntwKFtWLJrEhAi1SDrpm2v6Bv1U8NGAG8Ox4'),
(11, '', 'songvianhem_dj@yahoo.com.vn', '', '800699753408889', NULL, 'uploads/avatars/1452350965.jpg', '$2y$10$vfEEkpPZH.6tv1NF74skS.5jWf3qr2BiILapyRMw3e1wNcijsMeXq', 3, '2016-01-09 21:49:25', '2016-01-09 21:49:25', NULL, 'ygwSGydEbXRY4Zg4JBQuOnErNzQcDAOJUFFphIPre9P7yYiwQcwbIoa8InxH'),
(12, '', 'muathubuon237@yahoo.com', '', '648315645272092', NULL, 'uploads/avatars/1452507612.jpg', '$2y$10$8lTuA9qfBH3Wf1SH3QpPBOCMeuqEFm88.4ROkC7Knm0OlyMv7wI0i', 3, '2016-01-11 17:20:12', '2016-01-11 17:20:12', NULL, 'nTqM5JTffTMSRnx3Q7Rb1R9aPWf4sxmDyKvToJUKPz9jG0nJfSd0yeMnXOYm'),
(13, '', 'tu.dung56@yahoo.com', '', '1693890400833908', NULL, 'uploads/avatars/1452780038.jpg', '$2y$10$EjloFERPqAZGylHLO8/zU.xVnwLaH2f0Q7jxBkuxd0txcg4Vwfusa', 3, '2016-01-14 21:00:38', '2016-01-14 21:04:35', NULL, 'jlTaxNqwxcN50SeLBmUnYYTUF3Kep8rfMXqEGpjQbv2ETGuPbP2s4mmD0z0n'),
(14, '', 'antran201085@gmail.com', '', '741716595963577', NULL, 'uploads/avatars/1453037064.jpg', '$2y$10$5PmPzJjSNHZbLgMF435O2uWH8J5a1zq0sQo6vYCxbuofEQk2IWLgW', 3, '2016-01-17 20:24:25', '2016-01-17 20:24:25', NULL, 'KcopyEZ0DnX3UYA9Bhx6bWyjCCsA1ihjFD2nQZp6UjyIoeL4ZP73URpwQi4e'),
(15, '', 'thanhnguye14797@gmail.com', '', '174270446267510', NULL, 'uploads/avatars/1453038863.jpg', '$2y$10$R1l.VmOg.h67mGNYQQYoROxKyqMAQPA.VyioSxHSKUPfaLi.Io06K', 3, '2016-01-17 20:54:23', '2016-01-17 20:54:23', NULL, 'TOdHsDcMETjZlCL0xGhIay6Bao1rVFw1AOB10rw9z06YFeet4OeoCWTzzVMB'),
(16, '', 'bjgxoan@gmail.com', '', '801276179978753', NULL, 'uploads/avatars/1453043841.jpg', '$2y$10$JjCC/77/icCUUgTINiqL/eaQJUciYU2ED0zTEeJhJY0fdOZ0RT1Pa', 3, '2016-01-17 22:17:21', '2016-01-17 22:17:21', NULL, '99kY9wCFunQ4OoQEXsgAdEJRRq29y0v1pVRzZD4H6AFQPLDvqfY3KCH5mo1U'),
(17, '', 'leconglam25119@gmail.com', '', '424956531032905', NULL, 'uploads/avatars/1453296868.jpg', '$2y$10$cdboP6BcRynAd1KrtkundufXjUHoZezRxFwyOi8BrU7MQS1rt9j1e', 3, '2016-01-20 20:34:28', '2016-01-20 20:34:28', NULL, 'Wwa5bbTNCCorBkUwbXGwvqgZuJhELgoO4FctXjWKcaK9Fs5r4N4aYvMPLQ0v'),
(18, '', 'tommyqtran@yahoo.com', '', '1036127413121501', NULL, 'uploads/avatars/1453404398.jpg', '$2y$10$VwZZQ6rkpxbbP0OPuIwZheTGJFjG15GsvCb.Snf74D1zpaBKTF4x2', 3, '2016-01-22 02:26:38', '2016-01-22 02:26:38', NULL, 'VSALPGzi5blhBDE6mr65kbrOr6SVpC9dVqqi6gXRkybPmWjwF0y6RkVxxHsM'),
(19, '', 'papy.pro9x@gmail.com', '', '1960847877474120', NULL, 'uploads/avatars/1453466750.jpg', '$2y$10$z6/rXUiPsYu4GqHdOiol8.NCmXr9N0ZKUuLkUz9cI1BoyHZ6bYAby', 3, '2016-01-22 19:45:50', '2016-01-22 19:45:50', NULL, '1sWUi1WXxm09ZMIsdldRVajBoq1YocKUMmsp8eIep2alsm0lqWBrJSCODB1u');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
