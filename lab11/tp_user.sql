/*
Navicat MySQL Data Transfer

Source Server         : wampmysqld
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : thinkphp

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-04-19 16:37:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_user
-- ----------------------------
INSERT INTO `tp_user` VALUES ('1', 'zxf', '123', '0');
INSERT INTO `tp_user` VALUES ('2', 'hammeimei', '123', '0');
INSERT INTO `tp_user` VALUES ('3', 'lilei', '123', '1');
INSERT INTO `tp_user` VALUES ('4', '胡汉三', '123', '1');
INSERT INTO `tp_user` VALUES ('5', 'Thinkphp', '123', '1');
INSERT INTO `tp_user` VALUES ('6', '1', 'c4ca4238a0b923820dcc509a6f75849b', null);
INSERT INTO `tp_user` VALUES ('7', '2', 'c81e728d9d4c2f636f067f89cc14862c', null);
INSERT INTO `tp_user` VALUES ('8', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '1');
INSERT INTO `tp_user` VALUES ('9', '111', 'c4ca4238a0b923820dcc509a6f75849b', '1');
INSERT INTO `tp_user` VALUES ('10', '', 'c4ca4238a0b923820dcc509a6f75849b', '1');
INSERT INTO `tp_user` VALUES ('11', '', '9b04d152845ec0a378394003c96da594', '1');
INSERT INTO `tp_user` VALUES ('12', 'r', 'c4ca4238a0b923820dcc509a6f75849b', '1');
INSERT INTO `tp_user` VALUES ('13', '', 'c4ca4238a0b923820dcc509a6f75849b', '1');
INSERT INTO `tp_user` VALUES ('14', '12', '12', '1');
