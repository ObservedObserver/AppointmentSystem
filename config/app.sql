-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-11-26 23:59:02
-- 服务器版本： 5.7.10-log
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- 表的结构 `app_data`
--

CREATE TABLE `app_data` (
  `aid` int(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `apartment` varchar(255) NOT NULL,
  `filelist` text NOT NULL,
  `intro` text NOT NULL,
  `subtime` datetime NOT NULL,
  `cost` float NOT NULL,
  `pid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `app_data`
--

INSERT INTO `app_data` (`aid`, `uid`, `time`, `title`, `status`, `apartment`, `filelist`, `intro`, `subtime`, `cost`, `pid`) VALUES
(1, 'root', '2016-11-15 04:14:00', 'hello world', 1, 'Math', '', 'hello world!', '0000-00-00 00:00:00', 0, 'root'),
(2, 'root', '2016-11-24 06:15:11', 'New', 1, 'English', '', 'Writing!', '0000-00-00 00:00:00', 0, ''),
(3, '15711001', '2016-11-24 02:01:00', 'English', 0, 'English', '', 'OH', '0000-00-00 00:00:00', 0, ''),
(4, '15711001', '2016-11-20 10:00:00', 'essay', 1, 'English', '', 'how to be better', '2016-11-24 03:21:44', 0.5, ''),
(5, '15711001', '2016-11-30 12:00:00', 'OHHH', 0, 'English', '|', 'see?', '2016-11-24 05:43:05', 1, ''),
(6, '15711001', '1211-12-12 12:12:00', 'WWW', 1, 'English', 'http://localhost/App/file/AID=6_|', '12', '2016-11-24 05:44:14', 1, 'root'),
(7, '15711001', '2016-12-01 01:01:00', 'DOCC', 0, 'Math', 'http://localhost/App/file/AID=7_|', '?Yes!!', '2016-11-24 05:55:19', 0.5, ''),
(8, '15711001', '1111-11-11 11:11:00', 'WWQ', 0, 'Others', '|', '1111', '2016-11-24 05:57:52', 0.5, ''),
(9, '15711001', '2016-11-24 06:01:00', 'Finally', 0, 'Math', 'http://localhost/App/file/AID=9_种子用户增长情况估算.docx|', 'finally success!', '2016-11-24 06:01:59', 0.5, ''),
(10, '15711001', '0211-11-02 12:13:00', 'nice', 0, 'English', 'c://Appserv/www/App/file/AID10_种子用户增长函数.xlsx|', '13', '2016-11-24 06:20:41', 1, ''),
(11, '15711001', '0123-12-12 12:03:00', 'adc', 0, 'Others', './file/AID11_种子用户增长函数.xlsx|', '123', '2016-11-24 06:24:58', 1, ''),
(12, '15711001', '0001-01-01 01:01:00', 'sss', 0, 'English', './file/AID12_种子用户增长情况估算.docx|', '11', '2016-11-24 06:53:11', 1, ''),
(13, '15711001', '0000-00-00 00:00:00', '', 0, 'English', '|', '', '2016-11-27 00:57:50', 0, ''),
(14, '15711001', '2016-11-27 02:00:00', '完成', 0, 'Others', './file/AID14_qsort.cpp|', 'Yeah！！', '2016-11-27 01:50:08', 0.5, ''),
(15, '15711001', '2016-11-28 11:11:00', '超长标题测试哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈', 0, 'English', './file/AID15_|', '测试', '2016-11-27 06:58:20', 1, ''),
(16, '15711001', '1212-12-12 12:12:00', 'Longlllllllasabcaj aj ashcjacajh cj hcja cj dcja cj dhvwhbdc hjdh cjsc ajn cakj ', 0, 'English', './file/AID16_|', '1212', '2016-11-27 06:59:18', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `app_users`
--

CREATE TABLE `app_users` (
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` int(10) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `applist` text NOT NULL,
  `apartment` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `app_users`
--

INSERT INTO `app_users` (`uid`, `name`, `level`, `image`, `applist`, `apartment`, `passwd`) VALUES
('root', 'root', 10, 'ori.jpg', '', 'admin', '123456'),
('15711001', '陈浩', 1, '15711001.png', '', '信管', '061518'),
('Rebort', 'Rebort', 2, 'ori.jpg', '', 'English', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_data`
--
ALTER TABLE `app_data`
  ADD UNIQUE KEY `aid` (`aid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `app_data`
--
ALTER TABLE `app_data`
  MODIFY `aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
