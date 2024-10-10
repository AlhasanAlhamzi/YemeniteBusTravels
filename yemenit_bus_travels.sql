-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 27 أبريل 2019 الساعة 13:06
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
  `acc_mony` int(10) NOT NULL DEFAULT '0',
  `note` varchar(100) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `pwd` (`pwd`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `accounts`
--

INSERT INTO `accounts` (`id`, `uname`, `fname`, `lname`, `pwd`, `type`, `gender`, `user_img`, `acc_mony`, `note`, `dates`) VALUES
(1, 'RAGT', 'Rasheed', 'Adnan', 'ed29065ba9e63c0db6dc1de7806b06b0', 'user', 'male', 'RAGT.png', 30000, 'bests one', '2018-12-18'),
(5, 'HR', 'hr', 'hr', '7a775db00dbcf31d3ec67c5dfe3f14a3', 'user', 'male', 'HR.png', 20000, 'good', '2018-12-21'),
(6, 'a', 'a', 'a', '55edaa0c9220ca856d5b2add21c39f4d', 'user', 'male', 'a.png', 150000, 'hello\r\n', '2018-12-21'),
(7, 'w', 'wasemah', 'ali', 'e9d22dcc8842d37002b385e9e5ab1d17', 'user', 'female', NULL, 10000, NULL, '2019-02-13'),
(8, 'shihab', 'shihab', 'ali', '91abcd01adccad135c12ecad43cba597', 'user', 'male', NULL, 5000, 'Brothers', '2019-02-13');

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `admin_chats`
--

INSERT INTO `admin_chats` (`id`, `emp_id`, `chat`, `likes`, `note`, `dates`) VALUES
(7, 5, 'sddsdsd', 2, NULL, '2019-04-14'),
(3, 6, 'Hello Evryone', 22, NULL, '2018-12-23'),
(4, 5, 'goood job', 4, NULL, '2019-02-06'),
(11, 5, 'sfdsda', 0, NULL, '2019-04-14');

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
  `note` varchar(200) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `manager_id` (`manager_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `brunchs`
--

INSERT INTO `brunchs` (`id`, `manager_id`, `name`, `address`, `emp_numbers`, `n_travels`, `href`, `note`, `dates`) VALUES
(1, 5, 'Taiz Brunch', 'Taiz-alhopan-street', 1, 1, 'brunchs.php', 'hello', '2018-12-18'),
(2, 2, 'Sanaa Brunch', 'sanaa-haddah-street', 1, 2, 'brunchs.php', 'sdds', '2018-12-18'),
(3, 2, 'Aden Brunch', 'Aden-Almaala-street', 1, 1, 'brunchs.php', '', '2018-12-18'),
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
  `name` varchar(30) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `chat` varchar(80) DEFAULT NULL,
  `note` varchar(80) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `chats`
--

INSERT INTO `chats` (`id`, `acc_id`, `emp_id`, `name`, `phone`, `chat`, `note`, `dates`) VALUES
(6, 6, NULL, NULL, NULL, 'hello RAGT', NULL, '2018-12-21'),
(7, 6, NULL, NULL, NULL, 'go ahead', NULL, '2018-12-22'),
(8, NULL, 3, NULL, NULL, 'Hey.\r\nWhat\'s going are here', NULL, '2018-12-22'),
(9, NULL, NULL, 'ahmed', 774258832, 'no that\'s goood.', NULL, '2019-02-09'),
(10, NULL, NULL, 'sdssd', 89, 'sdsd', NULL, '2019-02-25'),
(11, NULL, NULL, 'ahmeds', 1899, 'hello brother', NULL, '2019-02-25'),
(12, NULL, NULL, 'ali', 9891, 'Ø§Ù‡Ù„Ø§ Ø¨Ø§Ù„Ø¬Ù…ÙŠÙŠÙŠØ¹', NULL, '2019-02-25'),
(13, NULL, NULL, 'hdsa', 8767689, 'ÙƒÙŠÙŠÙ Ø§Ù„Ø­Ø§Ø§Ø§Ø§Ù„ ÙŠØ§ØºØ§Ù„ÙŠ', NULL, '2019-02-25'),
(14, NULL, NULL, 'ahymed', 6578970, 'hello brothers\r\n', NULL, '2019-03-28'),
(15, NULL, 5, NULL, NULL, 'sdsddsd', NULL, '2019-04-14');

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
  `w_brunch` int(11) NOT NULL,
  `enabled` int(1) NOT NULL DEFAULT '0',
  `note` varchar(80) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `w_brunch` (`w_brunch`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `employees`
--

INSERT INTO `employees` (`id`, `uname`, `fname`, `lname`, `pwd`, `salary`, `type`, `gender`, `user_img`, `w_hours`, `w_brunch`, `enabled`, `note`, `dates`) VALUES
(2, 'Hasan', 'hasan', 'alhamzy', 'a55374c0f9a1c6952f05406d04b30144', 90000, 'user', 'male', 'Hasan.PNG', 8, 8, 1, '', '2018-12-19'),
(3, 'Ahmed', 'ahmed', 'ahmed', 'eb91fb8398da55ce37ce4de3f383883a', 20000, 'manager', 'male', 'Ahmed.png', 6, 0, 1, 'goods', '2018-12-19'),
(5, 'RAGT', 'rasheed', 'adnan', 'ed29065ba9e63c0db6dc1de7806b06b0', 200000, 'manager', 'male', 'RAGT.png', 10, 0, 1, 'goood', '2018-12-21'),
(6, 'Ali', 'ali', 'ali', '9037b1652712dfe456344f29a918f053', 100000, 'user', 'male', 'Ali.jpg', 12, 1, 0, 'hello', '2018-12-23'),
(7, 'ziz', 'abdu al-aziz', 'al-defy', 'xscaccaddac', 12343, 'admin', 'male', 'ziz.png', 9, 2, 1, 'good', '2019-04-16');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `enabled` int(1) NOT NULL DEFAULT '0',
  `note` varchar(200) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emp_id` (`emp_id`),
  UNIQUE KEY `emp_id_2` (`emp_id`),
  KEY `acc_id` (`acc_id`),
  KEY `tr_id` (`tr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `researvations`
--

INSERT INTO `researvations` (`id`, `acc_id`, `emp_id`, `tr_id`, `fname`, `lname`, `phone`, `age`, `gender`, `address`, `n_seats`, `t_money`, `pay`, `enabled`, `note`, `dates`) VALUES
(1, 1, NULL, 1, 'ahmeds', 'ahmed', 737676767, 60, 'male', 'sanaa', 2, 20000, 1, 0, NULL, '2018-12-23'),
(2, NULL, NULL, 1, 'ahmed', 'ali', 772432343, 20, 'male', 'sanaa', 2, 20000, 0, 0, NULL, '2019-02-06'),
(5, NULL, 3, 1, 'ahmed', 'ali', 1679, 19, 'male', 'adnan', 1, 10000, 0, 0, NULL, '2019-02-18'),
(6, NULL, 5, 1, 'ragts', 'ali', 78, 8, 'male', 'sanaa', 2, 20000, 1, 0, NULL, '2019-02-18'),
(7, 1, NULL, 2, 'ali', 'mohammed', 78, 89, 'male', 'sanaa', 2, 20000, 1, 1, NULL, '2019-02-19'),
(4, NULL, NULL, 1, 'ahmed', 'ali', 16, 20, 'male', 'sana', 2, 20000, 0, 0, NULL, '2019-02-16'),
(9, 1, NULL, 2, 'hhh', 'hhh', 67, 6, 'male', 'sanaa', 2, 20000, 0, 1, NULL, '2019-02-19'),
(10, 8, NULL, 1, 'ahmed', 'ali', 9990, 90, 'male', 'aden', 2, 20000, 1, 1, NULL, '2019-02-23'),
(11, 8, NULL, 1, 'ahmefd', 'kjhg', 87, 98, 'male', 'hjh', 2, 20000, 0, 1, NULL, '2019-02-23'),
(12, 8, NULL, 1, 'utuy', 'iytu', 9, 70, 'male', 'ggg', 2, 20000, 1, 1, NULL, '2019-02-23'),
(13, 8, NULL, 1, 'ljh', 'kuhh', 9, 98, 'male', '9', 1, 10000, 0, 1, NULL, '2019-02-23'),
(14, 1, NULL, 1, 'rashjeed', 'hlbv', 8989, 8, 'male', 'hghjgh', 1, 10000, 0, 1, NULL, '2019-02-23');

-- --------------------------------------------------------

--
-- بنية الجدول `tracks`
--

DROP TABLE IF EXISTS `tracks`;
CREATE TABLE IF NOT EXISTS `tracks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) DEFAULT NULL,
  `assist_id` int(11) DEFAULT NULL,
  `br_id` int(11) DEFAULT NULL,
  `trv_id` int(11) DEFAULT NULL,
  `track_status` varchar(40) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_id` (`driver_id`),
  KEY `assist_id` (`assist_id`),
  KEY `trv_id` (`trv_id`),
  KEY `br_id` (`br_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `tracks`
--

INSERT INTO `tracks` (`id`, `driver_id`, `assist_id`, `br_id`, `trv_id`, `track_status`, `note`, `dates`) VALUES
(1, 1, 2, 1, 1, 'good', 'very good', '2019-04-04');

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
  `t_go` int(10) DEFAULT NULL,
  `t_hours` int(9) DEFAULT NULL,
  `p_number` int(9) DEFAULT '0',
  `cost` int(11) NOT NULL DEFAULT '0',
  `t_seats` int(11) NOT NULL DEFAULT '0',
  `r_seats` int(11) NOT NULL DEFAULT '0',
  `note` varchar(100) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`),
  KEY `br_id` (`br_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `travels`
--

INSERT INTO `travels` (`id`, `emp_id`, `br_id`, `name`, `t_go`, `t_hours`, `p_number`, `cost`, `t_seats`, `r_seats`, `note`, `dates`) VALUES
(1, 5, 1, 'sanaa-taiz', 16, 10, 5, 10000, 15, 10, 'helox', '2018-12-22'),
(2, 2, 1, 'taiz-sanaa', 17, 10, 1, 10000, 15, 14, '', '2018-12-22'),
(3, 2, 3, 'aden-sanaa', 20, 15, 0, 15000, 22, 22, NULL, '2019-02-13'),
(4, 2, 2, 'sanaa-aden', 19, 20, 0, 20000, 30, 30, NULL, '2019-02-16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
