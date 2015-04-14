-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-04-12 03:35:08
-- 服务器版本： 5.6.21-log
-- PHP Version: 5.4.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `BreakFast`
--

-- --------------------------------------------------------

--
-- 表的结构 `sysaccount`
--

CREATE TABLE IF NOT EXISTS `sysaccount` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `acc` int(20) NOT NULL DEFAULT '0',
  `name` varchar(32) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `iteminfo` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `sysaccount`
--

INSERT INTO `sysaccount` (`id`, `acc`, `name`, `password`, `iteminfo`) VALUES
(1, 0, '小敏', '123456', ''),
(2, 0, '明明', 'wo222rd', '{"豆浆":"4","包子":"5","套餐":"3"}');

-- --------------------------------------------------------

--
-- 表的结构 `sysmeau`
--

CREATE TABLE IF NOT EXISTS `sysmeau` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `sysmeau`
--

INSERT INTO `sysmeau` (`id`, `name`, `price`) VALUES
(1, '豆浆', 2),
(2, '包子', 1),
(3, '套餐', 4);

-- --------------------------------------------------------

--
-- 表的结构 `systitle`
--

CREATE TABLE IF NOT EXISTS `systitle` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `systitle`
--

INSERT INTO `systitle` (`id`, `title`) VALUES
(1, '早餐预定系统');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
