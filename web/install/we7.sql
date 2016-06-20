/*
Navicat MySQL Data Transfer

Source Server         : windows_mysql1
Source Server Version : 50547
Source Host           : 127.0.0.1:3306
Source Database       : we7

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-06-17 14:39:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for we_auto_response
-- ----------------------------
DROP TABLE IF EXISTS `we_auto_response`;
CREATE TABLE `we_auto_response` (
  `ar_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_id` int(11) DEFAULT NULL,
  `ar_rule_name` varchar(50) DEFAULT NULL,
  `ar_type` varchar(50) DEFAULT NULL,
  `ar_wd` varchar(50) DEFAULT NULL,
  `ar_content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of we_auto_response
-- ----------------------------
INSERT INTO `we_auto_response` VALUES ('17', '17', 'asdfasdf', '基本文字回复', 'asfdsadf', 'asdfasdfasdfas');
INSERT INTO `we_auto_response` VALUES ('11', '19', '好运王', '基本文字回复', 'asdfasasdf', 'asdfasdf');
INSERT INTO `we_auto_response` VALUES ('12', '19', '好运王', '基本文字回复', 'asdfasasdf', 'asdfasdf');
INSERT INTO `we_auto_response` VALUES ('13', '20', 'wo', '基本文字回复', 'asdfasdf', 'asdfasdfasd');
INSERT INTO `we_auto_response` VALUES ('14', '19', '1231231231321321', '基本文字回复', 'sdfasdf', 'sadfasdfasd');
INSERT INTO `we_auto_response` VALUES ('15', '17', '好运王', '基本文字回复', '1', '123456');
INSERT INTO `we_auto_response` VALUES ('16', '17', '1231231231321321', '基本文字回复', 'asdfasdf', 'sdfasdfd');
INSERT INTO `we_auto_response` VALUES ('10', '20', '1231231231321321', '基本文字回复', 'asdfas', 'asdfasdfasd');

-- ----------------------------
-- Table structure for we_custom_menu
-- ----------------------------
DROP TABLE IF EXISTS `we_custom_menu`;
CREATE TABLE `we_custom_menu` (
  `cm_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_id` int(11) DEFAULT NULL,
  `cm_name` varchar(50) DEFAULT NULL,
  `cm_parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of we_custom_menu
-- ----------------------------

-- ----------------------------
-- Table structure for we_public_account
-- ----------------------------
DROP TABLE IF EXISTS `we_public_account`;
CREATE TABLE `we_public_account` (
  `pa_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `pa_name` varchar(50) DEFAULT NULL,
  `pa_type` varchar(50) DEFAULT NULL,
  `pa_appid` varchar(50) DEFAULT NULL,
  `pa_appsecret` varchar(50) DEFAULT NULL,
  `pa_weixin` varchar(50) DEFAULT NULL,
  `pa_wx_account` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of we_public_account
-- ----------------------------
INSERT INTO `we_public_account` VALUES ('21', '4', '测试', '微信公众平台', 'wx5fb95586e2d8f491', 'aa8e6d602c4407dafc66d2a00f2cd94e', 'gh_35ac7e39e191', 'gh_35ac7e39e191');
INSERT INTO `we_public_account` VALUES ('17', '4', 'asdfasdfas', '微信公众平台', 'asdfasdf', 'asdfasdf', 'asfasdfa', 'afasdfsdf');

-- ----------------------------
-- Table structure for we_public_account_token
-- ----------------------------
DROP TABLE IF EXISTS `we_public_account_token`;
CREATE TABLE `we_public_account_token` (
  `pat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_id` int(11) DEFAULT NULL,
  `pat_token` varchar(50) DEFAULT NULL,
  `pat_filemtime` datetime DEFAULT NULL,
  `pat_hash` varchar(10) DEFAULT NULL,
  `pat_api_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of we_public_account_token
-- ----------------------------
INSERT INTO `we_public_account_token` VALUES ('9', '14', 'werqwerqwerqwer', null, null, 'qwerqwerwqerwe');
INSERT INTO `we_public_account_token` VALUES ('10', '16', 'JbYJwDJkvVGjkWa7Qt3AJhnkUZbGNZgW', null, 'wHjqf', 'http://localhost/project/web/index.php');
INSERT INTO `we_public_account_token` VALUES ('11', '17', 'NKNvkV6YgWYZyMMgxTcAWpuextKR9dVA', null, 'QYT7b', 'http://www.php8.com/project1/web/index.php');
INSERT INTO `we_public_account_token` VALUES ('12', '18', 'UkQdb8uqSIIbGBZXi4Bh7p7j5mnismFF', null, 'DCvPJ', 'http://www.php8.com/ceshi_project/web/index.php');
INSERT INTO `we_public_account_token` VALUES ('13', '19', 'EWTiJzFgijvVTMDXytJbFxy6ifPnPbI6', null, 'hrupd', 'http://www.php8.com/ceshi_project/web/index.php');
INSERT INTO `we_public_account_token` VALUES ('14', '20', 'Q47m6ed3qZA4N8AxwAaME3vIUa8RPAfm', null, 'CbX2a', 'http://www.php8.com/ceshi_project/web/index.php');
INSERT INTO `we_public_account_token` VALUES ('15', '21', 'NGdV54j7Pa6txc2KqKMQcVUZQHDmnRuX', null, 't9QmG', 'http://www.php8.com/ceshi_project/web/wx_sample.php');

-- ----------------------------
-- Table structure for we_user
-- ----------------------------
DROP TABLE IF EXISTS `we_user`;
CREATE TABLE `we_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) DEFAULT NULL,
  `u_pwd` char(32) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of we_user
-- ----------------------------
INSERT INTO `we_user` VALUES ('1', 'zhangsan', '123456');
INSERT INTO `we_user` VALUES ('2', 'zhangsan', '123456');
INSERT INTO `we_user` VALUES ('3', 'zhangsan', '123456');
INSERT INTO `we_user` VALUES ('4', 'lisi', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `we_user` VALUES ('5', 'admin', 'c4ca4238a0b923820dcc509a6f75849b');
INSERT INTO `we_user` VALUES ('6', 'wangwu', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `we_user` VALUES ('7', 'matiantian', 'bcbe3365e6ac95ea2c0343a2395834dd');
INSERT INTO `we_user` VALUES ('8', 'matiantian', 'bcbe3365e6ac95ea2c0343a2395834dd');
INSERT INTO `we_user` VALUES ('9', 'matiantian', 'bcbe3365e6ac95ea2c0343a2395834dd');
INSERT INTO `we_user` VALUES ('10', 'matiantian', 'bcbe3365e6ac95ea2c0343a2395834dd');
INSERT INTO `we_user` VALUES ('11', 'admin', '25f9e794323b453885f5181f1b624d0b');
INSERT INTO `we_user` VALUES ('12', 'asdf', 'e10adc3949ba59abbe56e057f20f883e');

-- ----------------------------
-- Table structure for we_user_privilege
-- ----------------------------
DROP TABLE IF EXISTS `we_user_privilege`;
CREATE TABLE `we_user_privilege` (
  `up_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_id` int(11) DEFAULT NULL,
  `up_privilege_name` varchar(50) DEFAULT NULL,
  `up_parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`up_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of we_user_privilege
-- ----------------------------
