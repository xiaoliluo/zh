/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50722
Source Host           : localhost:3306
Source Database       : zh

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2018-11-10 18:50:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zh_article`
-- ----------------------------
DROP TABLE IF EXISTS `zh_article`;
CREATE TABLE `zh_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_img` varchar(255) DEFAULT NULL COMMENT '标题图片',
  `is_host` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0不热门1热门',
  `is_top` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否置顶1是0否',
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `content` text NOT NULL COMMENT '文章内容',
  `pv` int(11) NOT NULL DEFAULT '0' COMMENT '阅读量',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态1显示，0隐藏',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  `cate_id` int(11) NOT NULL COMMENT '栏目主键',
  `user_id` int(11) NOT NULL COMMENT '用户主键',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_article
-- ----------------------------
INSERT INTO `zh_article` VALUES ('2', '20181010/3dcd8070dcabd826be3ef140652273ce.jpg', '0', '0', '544444444444444', '66666666666666', '0', '1', '1539113168', '1539113168', '1', '20');
INSERT INTO `zh_article` VALUES ('3', '20181011/7a64149f1dda650939d77c7e735b11e8.jpg', '0', '0', '小峰由衣小峰由衣', '小峰由衣小峰由衣小峰由衣小峰由衣小峰由衣小峰由衣小峰由衣小峰由衣小峰由衣小峰由衣小峰由衣小峰由衣小峰由衣小峰由衣', '2', '1', '1539199060', '1539199060', '1', '20');
INSERT INTO `zh_article` VALUES ('4', '20181011/c7ee51066629b9d19458db67f93f6297.jpg', '0', '0', '小峰由衣小峰由衣2', '小峰由衣小峰由衣2小峰由衣小峰由衣2小峰由衣小峰由衣2小峰由衣小峰由衣2小峰由衣小峰由衣2小峰由衣小峰由衣2小峰由衣小峰由衣2小峰由衣小峰由衣2小峰由衣小峰由衣2小峰由衣小峰由衣2', '17', '1', '1539199109', '1539199109', '1', '20');
INSERT INTO `zh_article` VALUES ('5', '20181011/f91d0bccc154713bf273a5cf302ed2d5.jpg', '0', '0', '小峰由衣小峰由衣3', '小峰由衣小峰由衣3小峰由衣小峰由衣3小峰由衣小峰由衣3小峰由衣小峰由衣3小峰由衣小峰由衣3', '15', '1', '1539199134', '1539199134', '1', '20');
INSERT INTO `zh_article` VALUES ('6', '20181011/bcd92cf3d44ae35e7a7ee77f6491186e.jpg', '0', '0', '北条麻妃北条麻妃', '北条麻妃北条麻妃北条麻妃北条麻妃北条麻妃北条麻妃北条麻妃北条麻妃北条麻妃北条麻妃北条麻妃北条麻妃北条麻妃北条麻妃北条麻妃北条麻妃北条麻妃', '2', '1', '1539199374', '1539199374', '2', '21');
INSERT INTO `zh_article` VALUES ('7', '20181011/16a314f8ea303c0f13146948445b558b.jpg', '0', '0', '北条麻妃1北条麻妃北条麻妃1', '北条麻妃1北条麻妃北条麻妃1北条麻妃1北条麻妃北条麻妃1北条麻妃1北条麻妃北条麻妃1北条麻妃1北条麻妃北条麻妃1', '41', '1', '1539199400', '1539199400', '2', '21');
INSERT INTO `zh_article` VALUES ('8', '20181011/cd458e0423029916a84596bac397b80e.jpg', '0', '0', '北条麻妃2北条麻妃2北条麻妃2', '北条麻妃2北条麻妃2北条麻妃2北条麻妃2北条麻妃2北条麻妃2北条麻妃2北条麻妃2北条麻妃2北条麻妃2北条麻妃2北条麻妃2北条麻妃2北条麻妃2北条麻妃2', '1', '1', '1539199424', '1539199424', '2', '21');
INSERT INTO `zh_article` VALUES ('9', '20181011/80c0097462982c12415cb9d4405ef7e0.jpg', '0', '0', '北条麻妃3北条麻妃3北条麻妃3', '北条麻妃3北条麻妃3北条麻妃3北条麻妃3北条麻妃3北条麻妃3北条麻妃3北条麻妃3北条麻妃3北条麻妃3', '2', '1', '1539199462', '1539199462', '2', '21');
INSERT INTO `zh_article` VALUES ('10', '20181011/155db026560468d90ff3579346eba667.jpg', '0', '0', '雨宫琴音雨宫琴音', '雨宫琴音雨宫琴音雨宫琴音雨宫琴音雨宫琴音雨宫琴音雨宫琴音雨宫琴音雨宫琴音雨宫琴音雨宫琴音雨宫琴音雨宫琴音雨宫琴音雨宫琴音雨宫琴音雨宫琴音', '8', '1', '1539199521', '1539199521', '3', '22');
INSERT INTO `zh_article` VALUES ('11', '20181011/36e3e375dbf8e12dbc546277dc38a215.jpg', '0', '0', '雨宫琴音1雨宫琴音1雨宫琴音1', '雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1雨宫琴音1', '5', '1', '1539199546', '1539199546', '3', '22');
INSERT INTO `zh_article` VALUES ('12', '20181011/a303c7bbac54f2a18f965314378e8a8e.jpg', '0', '0', '雨宫琴音3雨宫琴音3', '雨宫琴音3雨宫琴音3雨宫琴音3雨宫琴音3雨宫琴音3雨宫琴音3雨宫琴音3雨宫琴音3雨宫琴音3雨宫琴音3雨宫琴音3雨宫琴音3雨宫琴音3', '18', '1', '1539199569', '1539199569', '3', '22');
INSERT INTO `zh_article` VALUES ('13', '20181011/7c20bfba08110eb6695db9657833d3fc.jpg', '0', '0', '雨宫琴音4雨宫琴音4', '雨宫琴音4雨宫琴音4雨宫琴音4雨宫琴音4雨宫琴音4雨宫琴音4雨宫琴音4雨宫琴音4雨宫琴音4雨宫琴音4雨宫琴音4雨宫琴音4雨宫琴音4雨宫琴音4', '25', '1', '1539199596', '1539199596', '3', '22');
INSERT INTO `zh_article` VALUES ('14', '20181012/81c611da877cb8dd98a6473a7d7b8724.jpg', '0', '0', '武藤兰武藤兰', '武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰', '8', '1', '1539277739', '1539277739', '3', '22');
INSERT INTO `zh_article` VALUES ('15', '20181012/7b410a8dbe9ea7aeb8b42fc6dc090fde.jpg', '0', '0', '武藤兰1武藤兰1武藤兰1', '武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰武藤兰', '5', '1', '1539277780', '1539277780', '1', '22');
INSERT INTO `zh_article` VALUES ('16', '20181012/f5fa79fc69e57b1335dfcbe6ac2ee896.jpg', '0', '0', '武藤兰2武藤兰2武藤兰2', '武藤兰2武藤兰2武藤兰2武藤兰2武藤兰2武藤兰2武藤兰2武藤兰2武藤兰2武藤兰2武藤兰2武藤兰2武藤兰2武藤兰2武藤兰2武藤兰2武藤兰2', '1', '1', '1539277799', '1539277799', '2', '22');
INSERT INTO `zh_article` VALUES ('17', '20181012/244c97517a35b9434600f6db72712771.jpg', '0', '0', '宫濑里子宫濑里子', '宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子', '4', '1', '1539277837', '1539277837', '3', '22');
INSERT INTO `zh_article` VALUES ('18', '20181012/fa79e2ab35bf8f71c91674ba79d3e5fa.jpg', '0', '0', '宫濑里子21', '宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子', '56', '1', '1539277859', '1539277859', '2', '22');
INSERT INTO `zh_article` VALUES ('19', '20181012/e185ebbb0e3972a10dbd1aad57faf834.jpg', '0', '0', '宫濑里子33', '宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子宫濑里子', '15', '1', '1539277874', '1539277874', '1', '22');
INSERT INTO `zh_article` VALUES ('21', '20181017/0e02bce296723e365701a6a59fddf2d3.png', '0', '0', '小猪佩奇小猪佩奇', '啦啦啦啦啦啦啦！ \r\n大家好！ \r\n我叫小猪佩奇。 \r\n这是我的弟弟乔治， \r\n这是我的妈妈， \r\n这是我的爸爸。 \r\n小。猪。佩。奇。\r\n', '3', '1', '1539725844', '1539725844', '1', '25');
INSERT INTO `zh_article` VALUES ('22', '20181017/cc5c4830ff4faf5c4b58ab9389a2b742.jpg', '0', '0', '西游记西游记', '曾经有一份真诚的爱情放在我面前\r\n我没有好好争取珍惜\r\n当我失去的时候我才后悔莫及\r\n人世间最痛苦的事莫过于此\r\n如果上天能够给我再来一次机会\r\n我会对着那个女孩子说我爱你\r\n如果让我在这氛围上加个期限\r\n我希望是一万年', '41', '1', '1539725940', '1539725940', '1', '25');
INSERT INTO `zh_article` VALUES ('23', '20181017/6c9fdaeec2fd0042143db7867f1af553.jpg', '0', '0', '葫芦娃葫芦娃', '大娃:妖精，快还我爷爷！\r\n二娃:我的眼睛，我的耳朵。\r\n三娃:你凭什么打我屁股？\r\n四娃:还我二哥！\r\n五娃:哎哟！哎哟！\r\n六娃:如意如意，按我心意，快快显灵。\r\n七娃:爸爸！妈妈！', '0', '1', '1539726094', '1539726094', '3', '25');
INSERT INTO `zh_article` VALUES ('24', '20181017/5f1e1a64d4e48b968050451317422347.jpg', '0', '0', '喜羊羊与灰太狼', '红太狼与灰太狼到了月球上 回不去 红太狼非常的生气 问：这下怎么办\r\n灰太狼说 ：老婆 ，别着急嘛 ！你不是还挖到了很多金子吗。你可以做成\r\n金戒指 金项链 金耳环。。。。。\r\n没等他说完 红太狼：（怒！！）我恨不得做成金箍棒 砸死你\r\n灰太狼： 老婆，家里不是有很多平底锅了吗 你干吗还要买电饭锅 。\r\n一个平底锅飞过来\r\n红太狼：你懂什么！电饭锅是用来对付小羊的\r\n灰太狼哭着说：平底锅是用来对付我的 。~~~~', '4', '1', '1539726187', '1539726187', '2', '25');
INSERT INTO `zh_article` VALUES ('25', '20181018/f85160e565897cc5dd8f7ad2c3f49714.jpg', '0', '0', '大头儿子一家人', '一对好朋友 快乐父子俩 儿子的头大手儿小 爸爸的头小手儿很大 大手牵小手 走路不怕滑 走呀走呀走走走走转眼儿子就长大', '166', '1', '1539726303', '1539726303', '4', '25');

-- ----------------------------
-- Table structure for `zh_article_category`
-- ----------------------------
DROP TABLE IF EXISTS `zh_article_category`;
CREATE TABLE `zh_article_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户主键',
  `name` varchar(30) NOT NULL COMMENT '栏目名称',
  `sort` int(11) DEFAULT NULL COMMENT '栏目排序',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否启用1启用，0禁用',
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of zh_article_category
-- ----------------------------
INSERT INTO `zh_article_category` VALUES ('1', '20', 'mysql', '3', '1', '1538984288', '1538984288');
INSERT INTO `zh_article_category` VALUES ('2', '20', 'redis', '1', '1', '1538984288', '1538984288');
INSERT INTO `zh_article_category` VALUES ('3', '20', 'java', '5', '1', '1538984288', '1538984288');
INSERT INTO `zh_article_category` VALUES ('4', '22', 'Memcache', '9', '1', '1539819355', '1539819355');

-- ----------------------------
-- Table structure for `zh_site`
-- ----------------------------
DROP TABLE IF EXISTS `zh_site`;
CREATE TABLE `zh_site` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '站点名称',
  `keywords` varchar(20) NOT NULL COMMENT '关键字',
  `is_open` int(11) NOT NULL DEFAULT '1' COMMENT '网站前台是否开启1开0关',
  `is_reg` int(11) NOT NULL DEFAULT '1' COMMENT '是否允许注册1是0否',
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL,
  `desc` text NOT NULL COMMENT '网站描述',
  `mark` tinyint(4) NOT NULL COMMENT '标识用来保持记录只有唯一一条',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mark` (`mark`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COMMENT='站点信息表';

-- ----------------------------
-- Records of zh_site
-- ----------------------------
INSERT INTO `zh_site` VALUES ('53', '于农新闻后台管理', '前台到后台1', '1', '1', '1541838249', '1541838249', '前台到后台完整2', '1');

-- ----------------------------
-- Table structure for `zh_user`
-- ----------------------------
DROP TABLE IF EXISTS `zh_user`;
CREATE TABLE `zh_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0前台普通会员1后台普通管理员2后台超级管理员',
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` char(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1启用0禁用',
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_user
-- ----------------------------
INSERT INTO `zh_user` VALUES ('20', '小峰由衣', '1', '5444@qq.com', '18226701289', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', '1', '1538969112', '1538969112');
INSERT INTO `zh_user` VALUES ('21', '北条麻妃5', '1', '4@qq.com', '18226701296', '0e03c6205ea671d7d41a0e3aabfc9d15d97e5ed3', '1', '1539199306', '1539199306');
INSERT INTO `zh_user` VALUES ('22', '于农', '2', '899@qq.com', '18226701297', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', '1', '1539199331', '1539633610');
INSERT INTO `zh_user` VALUES ('23', '苍井空', '1', '99@qq.com', '18226705555', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', '1', '1539625283', '1539625283');
INSERT INTO `zh_user` VALUES ('24', '吉泽明步', '1', '90@qq.com', '13865593132', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', '1', '1539625322', '1539625322');
INSERT INTO `zh_user` VALUES ('25', '波多野结衣', '1', '78@qq.com', '18226701255', '0e03c6205ea671d7d41a0e3aabfc9d15d97e5ed3', '1', '1539698462', '1539698462');

-- ----------------------------
-- Table structure for `zh_user_comments`
-- ----------------------------
DROP TABLE IF EXISTS `zh_user_comments`;
CREATE TABLE `zh_user_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `art_id` int(11) NOT NULL COMMENT '文章id',
  `content` text NOT NULL COMMENT '评论内容',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1显示0隐藏',
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='用户评论表';

-- ----------------------------
-- Records of zh_user_comments
-- ----------------------------
INSERT INTO `zh_user_comments` VALUES ('2', '22', '25', '哎呦，不错哦', '1', '1540003271', '1540003271');
INSERT INTO `zh_user_comments` VALUES ('3', '21', '25', '继续保持哦', '1', '1540003615', '1540003615');
INSERT INTO `zh_user_comments` VALUES ('17', '21', '25', '888', '1', '1540008768', '1540008768');
INSERT INTO `zh_user_comments` VALUES ('18', '21', '25', '888999', '1', '1540008774', '1540008774');
INSERT INTO `zh_user_comments` VALUES ('19', '21', '25', '888', '1', '1540009128', '1540009128');
INSERT INTO `zh_user_comments` VALUES ('20', '21', '25', '555', '1', '1540009233', '1540009233');
INSERT INTO `zh_user_comments` VALUES ('21', '21', '25', '999', '1', '1540010926', '1540010926');
INSERT INTO `zh_user_comments` VALUES ('22', '21', '25', '666', '1', '1540013951', '1540013951');

-- ----------------------------
-- Table structure for `zh_user_fav`
-- ----------------------------
DROP TABLE IF EXISTS `zh_user_fav`;
CREATE TABLE `zh_user_fav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `article_id` int(11) NOT NULL COMMENT '文档id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='用户收藏表';

-- ----------------------------
-- Records of zh_user_fav
-- ----------------------------
INSERT INTO `zh_user_fav` VALUES ('29', '25', '21');
INSERT INTO `zh_user_fav` VALUES ('30', '25', '24');
INSERT INTO `zh_user_fav` VALUES ('32', '25', '25');
INSERT INTO `zh_user_fav` VALUES ('33', '25', '25');
INSERT INTO `zh_user_fav` VALUES ('34', '25', '25');
INSERT INTO `zh_user_fav` VALUES ('35', '25', '25');

-- ----------------------------
-- Table structure for `zh_user_like`
-- ----------------------------
DROP TABLE IF EXISTS `zh_user_like`;
CREATE TABLE `zh_user_like` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL COMMENT '文档主键',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='用户点赞表';

-- ----------------------------
-- Records of zh_user_like
-- ----------------------------
INSERT INTO `zh_user_like` VALUES ('8', '20', '5');
INSERT INTO `zh_user_like` VALUES ('9', '22', '18');
INSERT INTO `zh_user_like` VALUES ('10', '25', '21');
INSERT INTO `zh_user_like` VALUES ('11', '25', '24');
INSERT INTO `zh_user_like` VALUES ('12', '25', '25');
