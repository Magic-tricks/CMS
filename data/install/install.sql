-- ----------------------------
--  Table structure for `tp_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `lasttime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article1`;
CREATE TABLE `tp_article1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) DEFAULT '',
  `keywords` varchar(100) DEFAULT '',
  `description` text,
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `catid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article2`;
CREATE TABLE `tp_article2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) DEFAULT '',
  `keywords` varchar(100) DEFAULT '',
  `description` text,
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `catid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article3`;
CREATE TABLE `tp_article3` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) DEFAULT '',
  `keywords` varchar(100) DEFAULT '',
  `description` text,
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `catid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article4`;
CREATE TABLE `tp_article4` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) DEFAULT '',
  `keywords` varchar(100) DEFAULT '',
  `description` text,
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `catid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article5`;
CREATE TABLE `tp_article5` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) DEFAULT '',
  `keywords` varchar(100) DEFAULT '',
  `description` text,
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `catid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article6`;
CREATE TABLE `tp_article6` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) DEFAULT '',
  `keywords` varchar(100) DEFAULT '',
  `description` text,
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `catid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article7`;
CREATE TABLE `tp_article7` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) DEFAULT '',
  `keywords` varchar(100) DEFAULT '',
  `description` text,
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `catid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article8`;
CREATE TABLE `tp_article8` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) DEFAULT '',
  `keywords` varchar(100) DEFAULT '',
  `description` text,
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `catid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article9`;
CREATE TABLE `tp_article9` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) DEFAULT '',
  `keywords` varchar(100) DEFAULT '',
  `description` text,
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `catid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article10`;
CREATE TABLE `tp_article10` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) DEFAULT '',
  `keywords` varchar(100) DEFAULT '',
  `description` text,
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `catid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article11`;
CREATE TABLE `tp_article11` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) DEFAULT '',
  `keywords` varchar(100) DEFAULT '',
  `description` text,
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `catid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article26`;
CREATE TABLE `tp_article26` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) DEFAULT '',
  `keywords` varchar(100) DEFAULT '',
  `description` text,
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `catid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `tp_admin` VALUES ('1','admin','admin','tongpan','tongpan0@163.com','1508553224','127.0.0.1');
