/*
Navicat MySQL Data Transfer

Source Server         : wordpress
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : tp6

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-05-29 17:14:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tp6_adminuser`
-- ----------------------------
DROP TABLE IF EXISTS `tp6_adminuser`;
CREATE TABLE `tp6_adminuser` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` char(32) NOT NULL COMMENT '用户密码',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=正常、0 = 待审核 99=删除',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `last_login_time` int(10) NOT NULL DEFAULT '0' COMMENT '登录时间',
  `last_login_ip` varchar(100) NOT NULL COMMENT '登录ip',
  `operite_user` varchar(100) NOT NULL COMMENT '操作人',
  PRIMARY KEY (`id`),
  KEY `username` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp6_adminuser
-- ----------------------------
INSERT INTO `tp6_adminuser` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '0', '1590721469', '1590721469', '127.0.0.1', 'admin');

-- ----------------------------
-- Table structure for `tp6_user`
-- ----------------------------
DROP TABLE IF EXISTS `tp6_user`;
CREATE TABLE `tp6_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL COMMENT '用户名',
  `phone_number` varchar(20) NOT NULL COMMENT '手机号',
  `password` char(32) NOT NULL COMMENT '密码',
  `itype` tinyint(1) NOT NULL COMMENT '登陆方式',
  `type` tinyint(1) NOT NULL COMMENT '会话保存天数',
  `sex` tinyint(1) NOT NULL COMMENT '性别',
  `create_time` varchar(10) NOT NULL COMMENT '创建时间',
  `update_time` varchar(10) NOT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL,
  `create_user` varchar(100) NOT NULL COMMENT '创建人',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `phone_number` (`phone_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp6_user
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `age` tinyint(3) unsigned NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` char(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '韦小宝', '25', 'weixiaobao@php.cn', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `user` VALUES ('2', '小龙女', '50', 'xiaolongnv@php.cn', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `user` VALUES ('3', '过儿', '19', 'guoer@php.cn', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `user` VALUES ('4', '狒狒', '18', 'xx@xx.com', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `user` VALUES ('6', '欧阳克', '27', 'oyangke@php.cn', 'e10adc3949ba59abbe56e057f20f883e');
