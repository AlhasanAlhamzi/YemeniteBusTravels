-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07 فبراير 2019 الساعة 05:16
-- إصدار الخادم: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yemenit_bus_travels`
--

-- --------------------------------------------------------

--
-- بنية الجدول `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(80) DEFAULT NULL,
  `fname` varchar(80) DEFAULT NULL,
  `lname` varchar(80) DEFAULT NULL,
  `pwd` varchar(80) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `user_img` varchar(30) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `pwd` (`pwd`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `accounts`
--

INSERT INTO `accounts` (`id`, `uname`, `fname`, `lname`, `pwd`, `type`, `gender`, `user_img`, `note`, `dates`) VALUES
(1, 'RAGT', 'Rasheed', 'Adnan', 'ed29065ba9e63c0db6dc1de7806b06b0', 'user', 'male', 'RAGT.png', 'bests', '2018-12-18'),
(5, 'HR', 'hr', 'hr', '7a775db00dbcf31d3ec67c5dfe3f14a3', 'user', 'male', 'HR.png', 'good', '2018-12-21'),
(6, 'a', 'a', 'a', '55edaa0c9220ca856d5b2add21c39f4d', 'user', 'male', 'a.png', 'hello\r\n', '2018-12-21');

-- --------------------------------------------------------

--
-- بنية الجدول `admin_chats`
--

DROP TABLE IF EXISTS `admin_chats`;
CREATE TABLE IF NOT EXISTS `admin_chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `chat` varchar(200) DEFAULT NULL,
  `likes` int(11) DEFAULT '0',
  `note` varchar(200) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `admin_chats`
--

INSERT INTO `admin_chats` (`id`, `emp_id`, `chat`, `likes`, `note`, `dates`) VALUES
(1, 5, 'hello brothers', 43, NULL, '2018-12-23'),
(3, 6, 'Hello Evryone', 22, NULL, '2018-12-23'),
(4, 5, 'goood job', 3, NULL, '2019-02-06');

-- --------------------------------------------------------

--
-- بنية الجدول `brunchs`
--

DROP TABLE IF EXISTS `brunchs`;
CREATE TABLE IF NOT EXISTS `brunchs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_id` int(11) DEFAULT NULL,
  `name` varchar(70) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `emp_numbers` int(11) DEFAULT NULL,
  `n_travels` int(11) NOT NULL DEFAULT '0',
  `href` varchar(50) DEFAULT NULL,
  `note` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `manager_id` (`manager_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `brunchs`
--

INSERT INTO `brunchs` (`id`, `manager_id`, `name`, `address`, `emp_numbers`, `n_travels`, `href`, `note`, `dates`) VALUES
(1, 5, 'Taiz Brunch', 'Taiz-alhopan-street', 1, 1, 'brunchs.php', 'hello', '2018-12-18'),
(2, 2, 'Sanaa Brunch', 'sanaa-haddah-street', 1, 1, 'brunchs.php', 'good', '2018-12-18'),
(3, 2, 'Aden Brunch', 'Aden-Almaala-street', 1, 0, 'brunchs.php', '', '2018-12-18'),
(8, 5, 'Main Brunch', 'Sanaa-old-aireplain', 20, 0, 'brunchs.php', NULL, '2018-12-22');

-- --------------------------------------------------------

--
-- بنية الجدول `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `chat` varchar(80) DEFAULT NULL,
  `note` varchar(80) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `chats`
--

INSERT INTO `chats` (`id`, `acc_id`, `emp_id`, `chat`, `note`, `dates`) VALUES
(6, 6, NULL, 'hello RAGT', NULL, '2018-12-21'),
(7, 6, NULL, 'go ahead', NULL, '2018-12-22'),
(8, NULL, 3, 'Hey.\r\nWhat\'s going are here', NULL, '2018-12-22');

-- --------------------------------------------------------

--
-- بنية الجدول `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(80) DEFAULT NULL,
  `fname` varchar(80) DEFAULT NULL,
  `lname` varchar(80) DEFAULT NULL,
  `pwd` varchar(80) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `user_img` varchar(80) DEFAULT NULL,
  `w_hours` int(11) DEFAULT NULL,
  `w_type` varchar(80) NOT NULL,
  `w_brunch` int(11) NOT NULL,
  `enabled` int(1) NOT NULL DEFAULT '0',
  `note` varchar(80) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `w_brunch` (`w_brunch`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `employees`
--

INSERT INTO `employees` (`id`, `uname`, `fname`, `lname`, `pwd`, `salary`, `type`, `gender`, `user_img`, `w_hours`, `w_type`, `w_brunch`, `enabled`, `note`, `dates`) VALUES
(2, 'Hasan', 'hasan', 'alhamzy', 'a55374c0f9a1c6952f05406d04b30144', 90000, 'user', 'male', 'Hasan.PNG', 8, 'manager', 8, 1, '', '2018-12-19'),
(3, 'Ahmed', 'ahmed', 'ahmed', 'eb91fb8398da55ce37ce4de3f383883a', 20000, 'user', 'male', 'Ahmed.png', 6, '', 0, 0, 'goods', '2018-12-19'),
(5, 'RAGT', 'rasheed', 'adnan', 'ed29065ba9e63c0db6dc1de7806b06b0', 200000, 'admin', 'male', 'RAGT.png', 10, '', 0, 1, 'goood', '2018-12-21'),
(6, 'Ali', 'ali', 'ali', '9037b1652712dfe456344f29a918f053', 100000, 'supervisor', 'male', 'Ali.jpg', 12, 'supervisor', 1, 0, 'hello', '2018-12-23');

-- --------------------------------------------------------

--
-- بنية الجدول `list_menu`
--

DROP TABLE IF EXISTS `list_menu`;
CREATE TABLE IF NOT EXISTS `list_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `href` varchar(200) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `list_menu`
--

INSERT INTO `list_menu` (`id`, `name`, `class`, `href`, `note`, `dates`) VALUES
(1, 'Home', NULL, 'Index.php', NULL, '2018-12-18'),
(2, 'Brunchs', 'null', 'brunchs.php', 'null', '2018-12-17'),
(3, 'Descussion', 'null', 'chats.php', 'null', '2018-12-17'),
(4, 'Travels', 'null', 'travels.php', 'null', '2018-12-17'),
(5, 'Researvation', 'null', 'travels.php', 'null', '2018-12-17'),
(14, 'Managers chat', NULL, 'admin_chats.php', NULL, '2018-12-23');

-- --------------------------------------------------------

--
-- بنية الجدول `nfacation`
--

DROP TABLE IF EXISTS `nfacation`;
CREATE TABLE IF NOT EXISTS `nfacation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_id` int(11) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `t_bay` varchar(20) DEFAULT NULL,
  `t_end` varchar(20) DEFAULT NULL,
  `note` varchar(80) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tr_id` (`tr_id`),
  KEY `acc_id` (`acc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- بنية الجدول `researvations`
--

DROP TABLE IF EXISTS `researvations`;
CREATE TABLE IF NOT EXISTS `researvations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `tr_id` int(11) DEFAULT NULL,
  `fname` varchar(80) DEFAULT NULL,
  `lname` varchar(80) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(80) DEFAULT NULL,
  `n_seats` int(11) DEFAULT NULL,
  `t_money` int(11) DEFAULT NULL,
  `pay` int(1) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emp_id` (`emp_id`),
  UNIQUE KEY `emp_id_2` (`emp_id`),
  KEY `acc_id` (`acc_id`),
  KEY `tr_id` (`tr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `researvations`
--

INSERT INTO `researvations` (`id`, `acc_id`, `emp_id`, `tr_id`, `fname`, `lname`, `phone`, `age`, `gender`, `address`, `n_seats`, `t_money`, `pay`, `note`, `dates`) VALUES
(1, NULL, NULL, 1, 'ahmed', 'ahmed', 737676767, 60, 'male', 'sanaa', 2, 20000, 0, NULL, '2018-12-23'),
(2, NULL, NULL, 1, 'ahmed', 'ali', 772432343, 20, 'male', 'sanaa', 2, 20000, 0, NULL, '2019-02-06');

-- --------------------------------------------------------

--
-- بنية الجدول `travels`
--

DROP TABLE IF EXISTS `travels`;
CREATE TABLE IF NOT EXISTS `travels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `br_id` int(11) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `t_go` date DEFAULT NULL,
  `t_hours` int(9) DEFAULT NULL,
  `p_number` int(9) DEFAULT NULL,
  `cost` int(11) NOT NULL DEFAULT '0',
  `t_seats` int(11) NOT NULL DEFAULT '0',
  `r_seats` int(11) NOT NULL DEFAULT '0',
  `note` varchar(100) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`),
  KEY `br_id` (`br_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `travels`
--

INSERT INTO `travels` (`id`, `emp_id`, `br_id`, `name`, `t_go`, `t_hours`, `p_number`, `cost`, `t_seats`, `r_seats`, `note`, `dates`) VALUES
(1, 5, 1, 'sanaa-taiz', '2018-12-23', 10, 0, 0, 15, 15, 'helox', '2018-12-22'),
(2, 2, 1, 'taiz-sanaa', '2018-12-31', 10, 0, 10000, 15, 15, '', '2018-12-22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
