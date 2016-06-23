-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-06-23 14:32:03
-- 服务器版本： 5.6.27-log
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wuzu`
--

-- --------------------------------------------------------

--
-- 表的结构 `we_auto_response`
--

CREATE TABLE IF NOT EXISTS `we_auto_response` (
  `ar_id` int(11) NOT NULL,
  `pa_id` int(11) DEFAULT NULL,
  `ar_rule_name` varchar(50) DEFAULT NULL,
  `ar_type` varchar(50) DEFAULT NULL,
  `ar_wd` varchar(50) DEFAULT NULL,
  `ar_content` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `we_custom_menu`
--

CREATE TABLE IF NOT EXISTS `we_custom_menu` (
  `cm_id` int(11) NOT NULL,
  `pa_id` int(11) DEFAULT NULL,
  `cm_name` varchar(50) DEFAULT NULL,
  `cm_parent_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `we_public_account`
--

CREATE TABLE IF NOT EXISTS `we_public_account` (
  `pa_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `pa_name` varchar(50) DEFAULT NULL,
  `pa_type` varchar(50) DEFAULT NULL,
  `pa_appid` varchar(50) DEFAULT NULL,
  `pa_appsecret` varchar(50) DEFAULT NULL,
  `pa_weixin` varchar(50) DEFAULT NULL,
  `pa_wx_account` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `we_public_account_token`
--

CREATE TABLE IF NOT EXISTS `we_public_account_token` (
  `pat_id` int(11) NOT NULL,
  `pa_id` int(11) DEFAULT NULL,
  `pat_token` varchar(50) DEFAULT NULL,
  `pat_filemtime` datetime DEFAULT NULL,
  `pat_hash` varchar(10) DEFAULT NULL,
  `pat_api_link` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `we_user`
--

CREATE TABLE IF NOT EXISTS `we_user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(50) DEFAULT NULL,
  `u_pwd` char(32) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `we_user`
--

INSERT INTO `we_user` (`u_id`, `u_name`, `u_pwd`) VALUES
(1, 'lisi', '123456'),
(3, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `we_user_privilege`
--

CREATE TABLE IF NOT EXISTS `we_user_privilege` (
  `up_id` int(11) NOT NULL,
  `pa_id` int(11) DEFAULT NULL,
  `up_privilege_name` varchar(50) DEFAULT NULL,
  `up_parent_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `we_auto_response`
--
ALTER TABLE `we_auto_response`
  ADD PRIMARY KEY (`ar_id`);

--
-- Indexes for table `we_custom_menu`
--
ALTER TABLE `we_custom_menu`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `we_public_account`
--
ALTER TABLE `we_public_account`
  ADD PRIMARY KEY (`pa_id`);

--
-- Indexes for table `we_public_account_token`
--
ALTER TABLE `we_public_account_token`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `we_user`
--
ALTER TABLE `we_user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `we_user_privilege`
--
ALTER TABLE `we_user_privilege`
  ADD PRIMARY KEY (`up_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `we_auto_response`
--
ALTER TABLE `we_auto_response`
  MODIFY `ar_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `we_custom_menu`
--
ALTER TABLE `we_custom_menu`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `we_public_account`
--
ALTER TABLE `we_public_account`
  MODIFY `pa_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `we_public_account_token`
--
ALTER TABLE `we_public_account_token`
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `we_user`
--
ALTER TABLE `we_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `we_user_privilege`
--
ALTER TABLE `we_user_privilege`
  MODIFY `up_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
