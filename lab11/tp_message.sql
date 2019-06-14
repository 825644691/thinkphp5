/*
Navicat MySQL Data Transfer

Source Server         : wampmysqld
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : thinkphp

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-04-19 16:37:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_message
-- ----------------------------
DROP TABLE IF EXISTS `tp_message`;
CREATE TABLE `tp_message` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `auther` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_message
-- ----------------------------
INSERT INTO `tp_message` VALUES ('42', '11', '11111', '无名氏', null);
INSERT INTO `tp_message` VALUES ('43', '1111', '1111111111111', '无名氏', null);
INSERT INTO `tp_message` VALUES ('28', '测试标题', '这是测试数据28', 'zxf', '2/12/2018 14:34:40');
INSERT INTO `tp_message` VALUES ('29', 'php是世界上最好的语言', '这是测试数据29', 'HanMeiei', '2/13/2018 14:34:46');
INSERT INTO `tp_message` VALUES ('31', '测试标题', '这是测试数据31', 'zxf', '2/12/2018 14:34:41');
INSERT INTO `tp_message` VALUES ('32', 'php是世界上最好的语言', '这是测试数据32', 'HanMeiei', '2/13/2018 14:34:47');
INSERT INTO `tp_message` VALUES ('33', 'php是不是世界上最好的语言？', '这是测试数据33', 'LaoWang', '2/15/2018 14:34:54');
INSERT INTO `tp_message` VALUES ('34', '测试标题', '这是测试数据34', 'zxf', '2/12/2018 14:34:42');
INSERT INTO `tp_message` VALUES ('35', '66', '66666666666', '66', '18-03-02 11:14:59');
INSERT INTO `tp_message` VALUES ('38', '888', '88888888', '88', '18-03-02 03:11:13');
INSERT INTO `tp_message` VALUES ('40', '4444', '4444', '44', '18-03-02 03:13:18');
