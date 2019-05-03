-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2019-05-03 20:53:07
-- 服务器版本： 5.7.21
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- 表的结构 `tp_ad`
--

CREATE TABLE `tp_ad` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `ad_name` varchar(60) DEFAULT NULL COMMENT '广告名称',
  `on` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否启用 0：未启用 1:启用',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型 1:图片广告 2:轮播广告',
  `img_src` varchar(150) DEFAULT NULL COMMENT '广告图片地址',
  `link` varchar(100) DEFAULT NULL COMMENT '广告链接地址',
  `adpos_id` smallint(6) DEFAULT NULL COMMENT '所属广告位'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_ad`
--

INSERT INTO `tp_ad` (`id`, `ad_name`, `on`, `type`, `img_src`, `link`, `adpos_id`) VALUES
(3, '时装宝宝秀', 0, 2, NULL, '', 1),
(6, '奥迪', 1, 1, '20190217/45781093eba4b5b0e46a32ca978d2d9f.jpg', '', 1),
(4, '加多宝', 0, 1, '20190217/6a47e4dd09d28259f61a38ab95450071.jpeg', '', 1),
(7, '奔驰', 0, 1, '20190217/8a021b6f0b3fd3ef82d0347ad6400a68.jpg', '', 1),
(13, '首页幻灯', 1, 2, NULL, '', 5),
(12, '测试啊啊啊', 1, 1, '20190224/91b2168bd5ff284c2dfe1c4ed6be27ef.jpg', '', 3);

-- --------------------------------------------------------

--
-- 表的结构 `tp_admin`
--

CREATE TABLE `tp_admin` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `uname` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `last_time` int(10) NOT NULL COMMENT '最后登录时间',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `group_id` mediumint(8) UNSIGNED DEFAULT NULL COMMENT '所属用户组'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_admin`
--

INSERT INTO `tp_admin` (`id`, `uname`, `password`, `create_time`, `last_time`, `status`, `group_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1552317124, 1552317124, 1, 1),
(3, '叶子1', '21232f297a57a5a743894a0e4a801fc3', 1552402117, 1552402117, 1, 1),
(4, '超级管理员', '21232f297a57a5a743894a0e4a801fc3', 1553094190, 1553094190, 1, 1),
(9, 'bbbb', '08f8e0260c64418510cefb2b06eee5cd', 1553095513, 1553095513, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_adpos`
--

CREATE TABLE `tp_adpos` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL COMMENT '广告位名称',
  `width` smallint(6) NOT NULL COMMENT '宽度',
  `height` smallint(6) NOT NULL COMMENT '高度'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_adpos`
--

INSERT INTO `tp_adpos` (`id`, `name`, `width`, `height`) VALUES
(1, '赚钱广告位', 300, 200),
(5, '首页轮播图广告', 0, 550),
(3, '刚刚修改的', 111, 111);

-- --------------------------------------------------------

--
-- 表的结构 `tp_ad_flash`
--

CREATE TABLE `tp_ad_flash` (
  `id` smallint(5) UNSIGNED NOT NULL COMMENT '动画广告ID',
  `fimg_src` varchar(150) NOT NULL COMMENT '动画广告图片地址',
  `flink` varchar(100) NOT NULL COMMENT '动画广告链接',
  `ad_id` smallint(6) NOT NULL COMMENT '所属广告ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_ad_flash`
--

INSERT INTO `tp_ad_flash` (`id`, `fimg_src`, `flink`, `ad_id`) VALUES
(6, '20190203/7e91d0df8e2a8b57f8a8625e63391ddc.jpeg', 'google.com', 3),
(5, '20190203/7e91d0df8e2a8b57f8a8625e63391ddc.jpeg', 'cms.com', 3),
(17, '20190419/5cd0b63d73e546d8b023f5490472177f.jpg', 'http://www.baidu.com', 13),
(18, '20190419/5cd0b63d73e546d8b023f5490472177f.jpg', 'http://www.taobao.com', 13),
(19, '20190421/77dc3b7a597d5c0ca51095b12df7f5c5.jpg', 'javascript:;', 13);

-- --------------------------------------------------------

--
-- 表的结构 `tp_archives`
--

CREATE TABLE `tp_archives` (
  `id` int(11) NOT NULL COMMENT '文档ID',
  `title` varchar(150) NOT NULL COMMENT '标题',
  `keywords` varchar(150) NOT NULL COMMENT '关键词',
  `description` varchar(255) NOT NULL COMMENT '描述',
  `writer` varchar(60) NOT NULL COMMENT '作者',
  `source` varchar(150) NOT NULL COMMENT '来源',
  `litpic` varchar(150) NOT NULL COMMENT '缩略图',
  `attr` varchar(60) DEFAULT NULL COMMENT '文档属性',
  `click` mediumint(9) NOT NULL COMMENT '点击量',
  `content` longtext NOT NULL COMMENT '内容',
  `cate_id` mediumint(9) NOT NULL COMMENT '所属栏目',
  `model_id` mediumint(9) NOT NULL COMMENT '所属模型',
  `time` int(11) NOT NULL COMMENT '发布时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_archives`
--

INSERT INTO `tp_archives` (`id`, `title`, `keywords`, `description`, `writer`, `source`, `litpic`, `attr`, `click`, `content`, `cate_id`, `model_id`, `time`) VALUES
(1, '测试', '1222', '\r\n                                1222222', '1222', '1222', '', '头条,推荐,幻灯,加粗,图片', 1, '<p>111<br/></p>', 17, 6, 1547906454),
(2, '测试', '1222', '\r\n                                1222222', '1222', '1222', '20190119/b9447c01184ce4c5a45e769627f04665.jpg', '头条,推荐,幻灯,加粗,图片', 1, '<p>111<br/></p>', 17, 6, 1547907263),
(3, '测试', '1222', '\r\n                                1222222', '1222', '1222', '20190119/b9447c01184ce4c5a45e769627f04665.jpg', '头条,推荐,幻灯,加粗,图片', 1, '<p>111<br/></p>', 17, 6, 1547907364),
(4, '444444', '44444', '                                                                                                                                                \r\n444444                                                                                          ', '44444', '44444', '20190121/dd40f1b220f809e10786093a96f98540.jpg', '头条,推荐,幻灯', 90, '<p>aaa4444<br/></p>', 17, 6, 1547907681),
(5, 'r23e33e2', 'ee', '\r\n                           ewewewe     ', 'ewewew', 'ewew', '', '推荐,加粗,图片', 4444, '<p>eewew<br/></p>', 17, 6, 1547908178),
(6, '21212', '2121', '\r\n                           12     ', '1212', '21122', '', '', 22, '<p>1212<br/></p>', 17, 6, 1547908974),
(7, '111', '11', '\r\n                                11', '111', '11', '20190119/bfdd41ab999852701ac4784d018fb946.jpg', '幻灯,加粗', 11, '<p>11<br/></p>', 17, 6, 1547909067),
(14, '', '中试车间数据指标达到国际先进水平', ' ', '中试车间数据指标达到国际先进水平', '中试车间数据指标达到国际先进水平中试车间数据指标达到国际先进水平', '', '头条,幻灯,加粗', 111, '', 6, 7, 1554823562),
(15, 'aa', '中试车间数据指标达到国际先进水平', ' 2013年8月15日，兰典科技中试车间具备安装条件，部分设备到货并开始安装。10月10日，车间所有设备全部安装完毕。12日，开始单机试车。25日，开始投料试车。 2014年3月5日上午，我司与...', 'aa', 'aa', '20190410/c223f0295b95ee656b53f45e405be1d4.jpg', '头条,推荐,幻灯,加粗', 111, '<p>2013年8月15日，兰典科技中试车间具备安装条件，部分设备到货并开始安装。10月10日，车间所有设备全部安装完毕。12日，开始单机试车。25日，开始投料试车。 2014年3月5日上午，我司与...</p>', 6, 7, 1554871515),
(16, '                                 中试车间数据指标达到国际先进水平 中试车间数据指标达到国际先进水平', ' 中试车间数据指标达到国际先进水平 中试车间数据指标达到国际先进水平', ' 2013年8月15日，兰典科技中试车间具备安装条件，部分设备到货并开始安装。10月10日，车间所有设备全部安装完毕。12日，开始单机试车。25日，开始投料试车。 2014年3月5日上午，我司与...', 'aa', 'aa', '20190410/360aee43591a9c3bd23b83598a3fbc24.jpg', '头条,推荐,加粗,图片', 111, '<p>2013年8月15日，兰典科技中试车间具备安装条件，部分设备到货并开始安装。10月10日，车间所有设备全部安装完毕。12日，开始单机试车。25日，开始投料试车。 2014年3月5日上午，我司与...2013年8月15日，兰典科技中试车间具备安装条件，部分设备到货并开始安装。10月10日，车间所有设备全部安装完毕。12日，开始单机试车。25日，开始投料试车。 2014年3月5日上午，我司与...</p>', 6, 7, 1554871938),
(17, '2013年8月，公司非粮原料生物法50万吨/年丁二酸及生物基产品PBS产业化项目正式被列入国家863计划。 该项目作为国内首条、世界第二条以非粮作物为原料，以生物法生产有机酸的产业化...', '我司被列入国家“863计划”', ' 2013年8月，公司非粮原料生物法50万吨/年丁二酸及生物基产品PBS产业化项目正式被列入国家863计划。 该项目作为国内首条、世界第二条以非粮作物为原料，以生物法生产有机酸的产业化...', 'aaaa', 'aa', '20190410/2de26fbbf8805b5a38a06dcd548a4fc1.jpg', '推荐,幻灯,加粗', 111, '<p>2013年8月，公司非粮原料生物法50万吨/年丁二酸及生物基产品PBS产业化项目正式被列入国家863计划。 该项目作为国内首条、世界第二条以非粮作物为原料，以生物法生产有机酸的产业化...2013年8月，公司非粮原料生物法50万吨/年丁二酸及生物基产品PBS产业化项目正式被列入国家863计划。 该项目作为国内首条、世界第二条以非粮作物为原料，以生物法生产有机酸的产业化...</p>', 7, 7, 1554872022),
(18, '我司与中科院天津所签署产业合作协议', '我司与中科院天津所签署产业合作协议', ' 2013年4月27日，中国科学院天津工业生物技术研究所与我司在山东省寿光市举行非粮原料生物法琥珀酸及生物基产品PBS产业化项目签约仪式。寿光市领导朱兰玺、孙成华、王安文出席仪式...2013年4月27日，中国科学院天津工业生物技术研究所与我司在山东省寿光市举行非粮原料生物法琥珀酸及生物基产品PBS产业化项目签约仪式。寿光市领导朱兰玺、孙成华、王安文出席仪式...', '我司与中科院天津所签署产业合作协议', '我司与中科院天津所签署产业合作协议', '', '头条,推荐,加粗,图片', 111, '<p>2013年4月27日，中国科学院天津工业生物技术研究所与我司在山东省寿光市举行非粮原料生物法琥珀酸及生物基产品PBS产业化项目签约仪式。寿光市领导朱兰玺、孙成华、王安文出席仪式...2013年4月27日，中国科学院天津工业生物技术研究所与我司在山东省寿光市举行非粮原料生物法琥珀酸及生物基产品PBS产业化项目签约仪式。寿光市领导朱兰玺、孙成华、王安文出席仪式...</p>', 7, 7, 1554872072),
(19, 'NP-2012断乳宝', 'NP-2012断乳宝', ' NP-2012断乳宝NP-2012断乳宝NP-2012断乳宝', 'NP-2012断乳宝', 'NP-2012断乳宝', '20190414/1b9fd58c285707fabc9337f34122827a.jpg', '头条,推荐,图片', 111, '<h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/8.html\" target=\"_blank\">NP-2012断乳宝</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/8.html\" target=\"_blank\">NP-2012断乳宝</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/8.html\" target=\"_blank\">NP-2012断乳宝</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/8.html\" target=\"_blank\">NP-2012断乳宝</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/8.html\" target=\"_blank\">NP-2012断乳宝</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/8.html\" target=\"_blank\">NP-2012断乳宝</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/8.html\" target=\"_blank\">NP-2012断乳宝</a></h2><p><br/></p>', 9, 7, 1555251315),
(20, 'NP-2010母子康', 'NP-2010母子康NP-2010母子康', ' NP-2010母子康NP-2010母子康NP-2010母子康NP-2010母子康NP-2010母子康', 'NP-2010母子康', 'NP-2010母子康', '20190414/142ab438882252d56b765ef33840850d.jpg', '头条,推荐,幻灯', 111, '<h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/7.html\" target=\"_blank\">NP-2010母子康</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/7.html\" target=\"_blank\">NP-2010母子康</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/7.html\" target=\"_blank\">NP-2010母子康</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/7.html\" target=\"_blank\">NP-2010母子康</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/7.html\" target=\"_blank\">NP-2010母子康</a></h2><p><br/></p>', 9, 7, 1555251366),
(21, '虾康肽虾康肽', '虾康肽', ' 虾康肽虾康肽虾康肽虾康肽虾康肽虾康肽', '虾康肽', '虾康肽', '20190414/68874d3a0da1c168645d894e2244d1f5.jpg', '头条,推荐,加粗', 111, '<h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/6.html\" target=\"_blank\">虾康肽</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/6.html\" target=\"_blank\">虾康肽</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/6.html\" target=\"_blank\">虾康肽</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/6.html\" target=\"_blank\">虾康肽</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/6.html\" target=\"_blank\">虾康肽</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/6.html\" target=\"_blank\">虾康肽</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/6.html\" target=\"_blank\">虾康肽</a></h2><p><br/></p>', 9, 7, 1555251406),
(22, 'NP-2008蛋白肽NP-2008蛋白肽', 'NP-2008蛋白肽', ' NP-2008蛋白肽NP-2008蛋白肽NP-2008蛋白肽NP-2008蛋白肽', 'NP-2008蛋白肽', 'NP-2008蛋白肽NP-2008蛋白肽', '20190414/3dc3eb1de40b6b4b992871b687c9b709.jpg', '头条,推荐,加粗,图片', 1111, '<h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/5.html\" target=\"_blank\" style=\"text-decoration: none;\"><strong>NP-2008蛋白肽</strong></a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/5.html\" target=\"_blank\" style=\"text-decoration: none;\"><strong>NP-2008蛋白肽</strong></a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/5.html\" target=\"_blank\" style=\"text-decoration: none;\"><strong>NP-2008蛋白肽</strong></a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/5.html\" target=\"_blank\" style=\"text-decoration: none;\"><strong>NP-2008蛋白肽</strong></a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/5.html\" target=\"_blank\" style=\"text-decoration: none;\"><strong>NP-2008蛋白肽</strong></a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/5.html\" target=\"_blank\" style=\"text-decoration: none;\"><strong>NP-2008蛋白肽</strong></a></h2><p><br/></p>', 10, 7, 1555251463),
(23, 'NP-SODNP-SODNP-SOD', 'NP-SODNP-SODNP-SODNP-SOD', 'NP-SODNP-SODNP-SODNP-SODNP-SODNP-SOD', 'NP-SODNP-SOD', 'NP-SOD', '20190414/f0724e0a1bf43f49a846ff931f385702.jpg', '头条,推荐,幻灯,加粗,图片', 1111, '<h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/4.html\" target=\"_blank\">NP-SOD</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/4.html\" target=\"_blank\">NP-SOD</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/4.html\" target=\"_blank\">NP-SOD</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/4.html\" target=\"_blank\">NP-SOD</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/4.html\" target=\"_blank\">NP-SOD</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/4.html\" target=\"_blank\">NP-SOD</a></h2><p><br/></p>', 10, 7, 1555251495),
(24, '血红素蛋白粉血红素蛋白粉血红素蛋白粉血红素蛋白粉', '血红素蛋白粉血红素蛋白粉血红素蛋白粉', '血红素蛋白粉血红素蛋白粉血红素蛋白粉', '血红素蛋白粉血红素蛋白粉', '血红素蛋白粉', '20190414/10d0d4f3d1d7fa7312bbf9840151a334.jpg', '头条,推荐,幻灯', 1111, '<h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/3.html\" target=\"_blank\">血红素蛋白粉</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/3.html\" target=\"_blank\">血红素蛋白粉</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/3.html\" target=\"_blank\">血红素蛋白粉</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/3.html\" target=\"_blank\">血红素蛋白粉</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/3.html\" target=\"_blank\">血红素蛋白粉</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/3.html\" target=\"_blank\">血红素蛋白粉</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/3.html\" target=\"_blank\">血红素蛋白粉</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/3.html\" target=\"_blank\">血红素蛋白粉</a></h2><h2><a href=\"http://localhost/a/chanpinzhongxin/chanpinfenleiyi/20160823/3.html\" target=\"_blank\"></a><br/></h2><p><br/></p>', 10, 7, 1555251530),
(25, '研究成果研究成果研究成果研究成果研究成果研究成果研究成果', '研究成果研究成果研究成果研究成果', '研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果', '研究成果研究成果研究成果', '研究成果研究成果研究成果研究成果研究成果研究成果', '20190414/b68affb94401228af7ea72e58a3f45dd.jpg', '头条,推荐,幻灯,图片', 3333, '<p>研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果</p>', 12, 7, 1555251632),
(26, '联系我们联系我们联系我们联系我们', '联系我们联系我们联系我们联系我们联系我们', '联系我们联系我们联系我们联系我们', '联系我们联系我们联系我们联系我们联系我们', '联系我们联系我们联系我们联系我们', '20190414/b68affb94401228af7ea72e58a3f45dd.jpg', '头条,推荐,幻灯,图片', 3333, '<p>联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们</p>', 13, 7, 1555251710),
(27, '测试文章测试文章测试文章测试文章', '测试文章测试文章测试文章', '测试文章测试文章测试文章测试文章\r\n                                ', '测试文章测试文章测试文章', '测试文章测试文章测试文章', '20190502/6d8f6591d7b83b3b27ac9ebfc6df102c.jpg', '头条,推荐,幻灯,图片', 112, '<p><span style=\"text-decoration: underline;\"><strong>测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章</strong></span></p>', 6, 7, 1556806201);

-- --------------------------------------------------------

--
-- 表的结构 `tp_article`
--

CREATE TABLE `tp_article` (
  `aid` int(10) UNSIGNED NOT NULL,
  `click` int(11) NOT NULL DEFAULT '0',
  `download` varchar(150) NOT NULL DEFAULT '',
  `short_title` varchar(150) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_article`
--

INSERT INTO `tp_article` (`aid`, `click`, `download`, `short_title`) VALUES
(16, 0, '', '                                 中试车间数据指标达到国际先进水平 中试车间数据指标达到国际先进水平'),
(17, 0, '', '2013年8月，公司非粮原料生物法50万吨/年丁二酸及生物基产品PBS产业化项目正式被列入国家863计划。 该项目作为国内首条、世界第二条以非粮作物为原料，以生物法生产有机酸的产业化...'),
(18, 0, '', '2013年4月27日，中国科学院天津工业生物技术研究所与我司在山东省寿光市举行非粮原料生物法琥珀酸及生物基产品PBS产业化项目签约仪式。寿光市领导朱兰玺、孙成华、王安文出席仪式...'),
(19, 0, '', 'NP-2012断乳宝NP-2012断乳宝'),
(20, 0, '', 'NP-2010母子康NP-2010母子康'),
(21, 0, '', '虾康肽虾康肽虾康肽'),
(22, 0, '', 'NP-2008蛋白肽NP-2008蛋白肽NP-2008蛋白肽'),
(23, 0, '', 'NP-2008蛋白肽NP-2008蛋白肽NP-2008蛋白肽'),
(24, 0, '', '血红素蛋白粉血红素蛋白粉血红素蛋白粉血红素蛋白粉'),
(25, 0, '', '研究成果研究成果研究成果研究成果研究成果'),
(26, 0, '', '联系我们联系我们联系我们联系我们'),
(27, 0, '', '测试文章测试文章测试文章测试文章');

-- --------------------------------------------------------

--
-- 表的结构 `tp_auth_group`
--

CREATE TABLE `tp_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_auth_group`
--

INSERT INTO `tp_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(1, '超级管理员', 1, '4,5,7,11,12,13,22,23,14,15,16,17,18,19,20,21'),
(2, '文档管理员', 1, '14,15,16,17,18');

-- --------------------------------------------------------

--
-- 表的结构 `tp_auth_group_access`
--

CREATE TABLE `tp_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_auth_group_access`
--

INSERT INTO `tp_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1),
(3, 1),
(9, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_auth_rule`
--

CREATE TABLE `tp_auth_rule` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` mediumint(9) NOT NULL DEFAULT '0' COMMENT '0表示顶级规则',
  `icon` varchar(15) DEFAULT NULL COMMENT '图标名称',
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '菜单是否显示 1：显示 0：不显示'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_auth_rule`
--

INSERT INTO `tp_auth_rule` (`id`, `name`, `title`, `type`, `status`, `condition`, `pid`, `icon`, `show`) VALUES
(5, 'Admin/Admin/add', '管理员添加', 1, 1, '', 4, NULL, 1),
(4, 'Admin/Admin', '管理员', 1, 1, '', 0, 'fa-user', 1),
(7, 'admin/add/add2', '添加管理员2', 1, 1, '', 5, NULL, 1),
(13, 'cate/add/add1', '栏目添加1', 1, 1, '', 12, NULL, 1),
(12, 'admin/Cate/add', '栏目添加', 1, 1, '', 11, NULL, 1),
(11, 'Admin/Cate', '栏目管理', 1, 1, '', 0, 'fa-folder', 1),
(14, 'Admin/Content', '文档', 1, 1, '', 0, 'fa-clipboard', 1),
(15, 'admin/Content/lst', '文章列表', 1, 1, '', 14, NULL, 1),
(16, 'admin/Content/add', '文章添加', 1, 1, '', 14, NULL, 0),
(17, 'Admin/Content/edit', '文章修改', 1, 1, '', 14, NULL, 0),
(18, 'Admin/Content/del', '文章删除', 1, 1, '', 14, NULL, 0),
(19, 'Admin/Conf', '系统设置', 1, 1, '', 0, 'fa-gear', 1),
(20, 'Admin/conf/lst', '配置项列表', 1, 1, '', 19, NULL, 1),
(21, 'Admin/conf/conflst', '配置列表', 1, 1, '', 19, NULL, 1),
(22, 'admin/Cate/lst', '栏目列表', 1, 1, '', 11, NULL, 1),
(23, 'admin/Cate/upimg', '上传图片', 1, 1, '', 11, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_cate`
--

CREATE TABLE `tp_cate` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '栏目id',
  `cate_name` varchar(30) NOT NULL COMMENT '栏目名称',
  `title` varchar(150) NOT NULL COMMENT '标题',
  `keywords` varchar(150) NOT NULL COMMENT '关键字',
  `desc` varchar(255) NOT NULL COMMENT '描述',
  `content` text NOT NULL COMMENT '内容',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示,0隐藏',
  `jump_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0:不跳转 否则跳转到栏目',
  `img` varchar(150) NOT NULL COMMENT '图片',
  `cate_attr` tinyint(1) NOT NULL DEFAULT '1' COMMENT '属性: 1:列表栏目 2:频道封面 3:外链栏目',
  `list_tmp` varchar(60) NOT NULL COMMENT '列表栏目模板',
  `index_tmp` varchar(60) NOT NULL COMMENT '频道栏目模板',
  `article_tmp` varchar(60) NOT NULL COMMENT '内容栏目模板',
  `link` varchar(150) NOT NULL COMMENT '外链地址',
  `sort` smallint(6) NOT NULL DEFAULT '50' COMMENT '排序',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级id',
  `model_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '1' COMMENT '所属模型',
  `bottom_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:不显示到底部导航 1：显示'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_cate`
--

INSERT INTO `tp_cate` (`id`, `cate_name`, `title`, `keywords`, `desc`, `content`, `status`, `jump_id`, `img`, `cate_attr`, `list_tmp`, `index_tmp`, `article_tmp`, `link`, `sort`, `pid`, `model_id`, `bottom_show`) VALUES
(1, '关于我们', '关于我们', '关于我们', '关于我们', '<p>关于我们</p><p>关于我们</p><p>关于我们</p><p>关于我们</p><p>关于我们</p><p>关于我们</p><p>关于我们</p><p>关于我们</p><p>关于我们</p>', 1, 2, '', 2, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 51, 0, 7, 1),
(2, '公司简介', '公司简介', '公司简介', '公司简介公司简介公司简介公司简介', '<p>公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介</p>', 1, 0, '', 2, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 1, 7, 0),
(3, '生产基地', '生产基地生产基地生产基地', '生产基地生产基地', '生产基地生产基地生产基地生产基地', '<p>生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地生产基地</p>', 1, 0, '', 2, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 1, 7, 0),
(4, '资质荣誉', '荣誉资质荣誉资质荣誉资质', '荣誉资质荣誉资质荣誉资质', '荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质', '<p>荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质荣誉资质</p>', 1, 0, '', 2, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 1, 7, 0),
(5, '新闻动态', '', '', '', '', 1, 6, '', 1, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 52, 0, 7, 1),
(6, '公司新闻', '', '', '', '', 1, 0, '', 1, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 5, 7, 0),
(7, '行业动态', '', '', '', '', 1, 0, '', 1, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 5, 7, 0),
(8, '产品中心', '', '', '', '', 1, 0, '', 1, 'list_pro.htm', 'index_article.htm', 'article_article.htm', 'http://', 53, 0, 7, 0),
(9, '产品分类一', '', '', '', '', 1, 0, '', 1, 'list_pro.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 8, 7, 0),
(10, '产品分类二', '', '', '', '', 1, 0, '', 1, 'list_pro.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 8, 7, 0),
(11, '技术服务', '', '', '', '<p>技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务技术服务</p>', 1, 0, '', 2, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 54, 0, 7, 0),
(12, '研究成果', '研究成果研究成果研究成果研究成果研究成果', '研究成果研究成果研究成果研究成果', '研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果', '<p>研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果研究成果</p>', 1, 0, '', 2, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 11, 7, 0),
(13, '联系我们', '联系我们联系我们联系我们联系我们联系我们', '联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们', '联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们', '<p>联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们</p>', 1, 0, '', 2, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 0, 7, 0),
(14, '视频教程', '', '', '', '', 1, 0, '', 3, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://www.php.cn', 50, 0, 6, 0),
(15, '贸易与合作', '', '', '', '', 0, 0, '', 2, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 0, 7, 1),
(16, '国际贸易', '', '', '', '', 1, 0, '', 1, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 15, 7, 1),
(17, '国际区域经销', '', '', '', '', 1, 0, '', 1, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 15, 7, 1),
(18, '国内区域代理', '', '', '', '', 1, 0, '', 1, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 15, 7, 1),
(19, '公司简介三级', '', '', '', '', 1, 0, '', 2, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 2, 7, 0),
(20, '公司简介四级', '', '', '', '', 1, 0, '', 2, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 19, 7, 0),
(22, '我们是...', '我们是...我们是...我们是...我们是...', '我们是...我们是...我们是...', '我们是...我们是...我们是...我们是...我们是...', '<p>我们是...我们是...我们是...我们是...我们是...</p><p><img src=\"/ueditor/php/upload/image/20190502/1556805379495591.jpg\" title=\"1556805379495591.jpg\" alt=\"rBVaVFywStCAeI4xAAL0CYfEosc207.jpg\"/></p>', 1, 0, '20190502/844756d144bba98e5db2527d0e460c10.jpg', 1, 'list_artiel.htm', 'index_article.htm', 'article_article.htm', 'http://', 50, 1, 7, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tp_conf`
--

CREATE TABLE `tp_conf` (
  `id` mediumint(9) NOT NULL COMMENT '配置项ID',
  `cname` varchar(60) NOT NULL COMMENT '中文名称',
  `ename` varchar(30) NOT NULL COMMENT '英文名称',
  `value` text NOT NULL COMMENT '默认值',
  `values` varchar(255) NOT NULL COMMENT '可选值',
  `dt_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1：输入框 2：单选 3：复选 4：下拉菜单 5：文本域 6：文件',
  `cf_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1：基本信息 2：联系方式 3：SEO设置'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_conf`
--

INSERT INTO `tp_conf` (`id`, `cname`, `ename`, `value`, `values`, `dt_type`, `cf_type`) VALUES
(2, 'QQ群', 'qq', '1277673002', '', 1, 2),
(3, '联系人', 'contact', '', '', 1, 2),
(4, '网站logo', 'logo', '20181227\\bbdc3978d687ce61477eac6eb695347b.jpg', '', 6, 1),
(5, '备案号', 'beian', '@ICAC', '', 1, 1),
(6, '站点根网址', 'siteurl', '2', '', 1, 1),
(7, '静态保存路径', 'path', '3', '', 1, 1),
(8, '电子邮箱', 'email', '', '', 1, 2),
(9, '站点名称', 'sitename', '深圳生物科技有限公司', '', 1, 3),
(10, '关键字', 'keywords', '生物科技', '', 1, 3),
(11, '站点描述', 'desc', '研发保健品', '', 5, 3),
(12, '开启缓存', 'iscache', '是', '是,否,未知', 2, 1),
(13, '关闭站点', 'closesite', '开启', '关闭,开启', 4, 1),
(14, '联系方式', 'contactway', '电话,qq', '电话,qq,传真', 3, 2),
(15, '二维码', 'qr', '20181227\\b3e2b04616389cff15aeef45859420c3.jpg', '', 6, 1),
(16, '允许上传缩略图', 'thumb', '是', '是,否', 2, 1),
(17, '缩略图宽度', 'thumb_width', '500', '', 1, 1),
(18, '缩略图高度', 'thumb_height', '500', '', 1, 1),
(19, '缩略图裁剪方式', 'thumb_way', '等比例缩放', '等比例缩放,缩放后填充,居中裁剪,左上角裁剪,右下角裁剪,固定尺寸缩放', 2, 1),
(20, '是否添加水印', 'water', '是', '是,否', 2, 1),
(21, '水印位置', 'water_pos', '左上角', '左上角,上居中,右上角,左居中,居中,右居中,下居中,左下角,右下角', 4, 1),
(22, '水印透明度', 'tmd', '50', '', 1, 1),
(23, '水印图', 'water_img', '20190119/dc79d3243fff1332e8cdc8d54f36f2d8.jpg', '', 6, 1),
(24, '模板', 'temp', 'default', '', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_film`
--

CREATE TABLE `tp_film` (
  `aid` int(11) NOT NULL,
  `filmtype` varchar(150) NOT NULL DEFAULT '',
  `date` varchar(150) NOT NULL DEFAULT '',
  `xiangqing` longtext,
  `shuoming` longtext,
  `diqu` varchar(150) NOT NULL DEFAULT '',
  `film_img` varchar(150) NOT NULL DEFAULT '',
  `zhutu` varchar(150) NOT NULL DEFAULT '',
  `film_name` varchar(150) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_film`
--

INSERT INTO `tp_film` (`aid`, `filmtype`, `date`, `xiangqing`, `shuoming`, `diqu`, `film_img`, `zhutu`, `film_name`) VALUES
(1, '喜剧,动作', '2000', '<p>111111<br/></p>', '<p>1111<br/></p>', '大陆', '20190120/818e123917fb6d3fa3b791ed99ff9c02.jpg', '20190120/818e123917fb6d3fa3b791ed99ff9c02.jpg', '1111332'),
(4, '喜剧,动作,剧情', '2002', '<p>aaa444<br/></p>', '<p>aaaa4444<br/></p>', '欧洲                 ', '', '', '4444'),
(5, '动作,武侠', '2001', '<p>ewew<br/></p>', '<p>eewew<br/></p>', '大陆', '', '', ''),
(6, '动作', '2002', '<p>121212<br/></p>', '<p>1212<br/></p>', '大陆', '20190119/f873b885b0a7bc831cfaa3591e89215a.jpg', '', ''),
(7, '动作,剧情', '2001', '<p>11<br/></p>', '<p>11<br/></p>', '美国', '20190119/e14b88c6be4160cc6b97e72653c93c7d.JPG', '20190119/27dbecb62b658a75ac074e31577f0425.jpg', '');

-- --------------------------------------------------------

--
-- 表的结构 `tp_img`
--

CREATE TABLE `tp_img` (
  `aid` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tp_model`
--

CREATE TABLE `tp_model` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `model_name` varchar(50) NOT NULL COMMENT '模型名称',
  `table_name` varchar(50) NOT NULL COMMENT '模型对应表名',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:开启 0:禁用'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_model`
--

INSERT INTO `tp_model` (`id`, `model_name`, `table_name`, `status`) VALUES
(7, '文章', 'article', 1),
(6, '电影', 'film', 1),
(9, '歌曲', 'music', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_model_field`
--

CREATE TABLE `tp_model_field` (
  `id` int(10) UNSIGNED NOT NULL,
  `field_cname` varchar(60) NOT NULL COMMENT '中文名称',
  `field_ename` varchar(60) NOT NULL COMMENT ' 英文名称',
  `field_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '字段类型：1：单行文本 2：单选按钮 3：复选框 4：下拉菜单 5:文本域 6：附件 7：浮点 8：整型 9：长文本类型 longtext',
  `field_values` varchar(255) NOT NULL COMMENT '可选值',
  `model_id` mediumint(9) NOT NULL COMMENT '所属模型'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_model_field`
--

INSERT INTO `tp_model_field` (`id`, `field_cname`, `field_ename`, `field_type`, `field_values`, `model_id`) VALUES
(28, '点击量', 'click', 8, '\r\n                                ', 7),
(18, '演员', 'yanyuan', 1, '\r\n                                ', 0),
(25, '歌曲标题', 'title', 1, '\r\n                                ', 9),
(35, '下载', 'download', 6, '\r\n                                ', 7),
(30, '下载通道', 'downrode', 3, '迅雷下载,qq下载,电驴下载\r\n\r\n                                ', 9),
(31, '电影类型', 'filmtype', 3, '喜剧,动作,剧情,武侠', 6),
(32, '年代', 'date', 2, '2000,2001,2002,2016\r\n                                ', 6),
(33, '详情', 'xiangqing', 9, '\r\n                                ', 6),
(34, '说明', 'shuoming', 9, '\r\n                                ', 6),
(37, '地区', 'diqu', 4, '大陆,美国,欧洲                 ', 6),
(38, '电影附图', 'film_img', 6, '\r\n                                ', 6),
(39, '电影主图', 'zhutu', 6, '\r\n                                ', 6),
(40, '歌曲下载', 'musicdown', 6, '\r\n                                ', 9),
(41, '电影名称', 'film_name', 1, '\r\n                                ', 6),
(42, '副标题', 'short_title', 1, '\r\n                                ', 7);

-- --------------------------------------------------------

--
-- 表的结构 `tp_music`
--

CREATE TABLE `tp_music` (
  `aid` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL DEFAULT '',
  `downrode` varchar(150) NOT NULL DEFAULT '',
  `musicdown` varchar(150) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tp_note`
--

CREATE TABLE `tp_note` (
  `id` mediumint(9) NOT NULL COMMENT '节点ID',
  `note_name` varchar(60) NOT NULL COMMENT '节点名称',
  `model_id` mediumint(9) NOT NULL COMMENT '所属模型',
  `output_encoding` varchar(30) NOT NULL COMMENT '输出编码',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  `last_time` int(10) NOT NULL COMMENT '最后采集时间',
  `list_rules` varchar(255) NOT NULL COMMENT '列表界面采集规则',
  `item_rules` longtext COMMENT '内容采集规则'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_note`
--

INSERT INTO `tp_note` (`id`, `note_name`, `model_id`, `output_encoding`, `add_time`, `last_time`, `list_rules`, `item_rules`) VALUES
(1, '1', 7, 'utf-8', 1548214667, 1548214667, '{\"list_url\":\"https://www.csdn.net/nav/mobile\",\"start_page\":\"1\",\"end_page\":\"6\",\"step\":\"1\",\"range\":\".feedlist_mod mobile\",\"list_rules\":{\"url\":\"h2\",\"litpic\":\".user_img img\"}}', NULL),
(2, '爱情片', 6, '2', 1548303196, 1548303196, '{\"list_url\":\"qqqqq\",\"start_page\":\"1\",\"end_page\":\"5\",\"step\":\"1\",\"range\":\"aaaa\",\"list_rules\":{\"url\":\"aaa\",\"litpic\":\"aaaa\"}}', NULL),
(3, '动作片', 6, 'UTF-8', 1548304608, 1548304608, '{\"list_url\":\"aaa\",\"start_page\":\"1\",\"end_page\":\"4\",\"step\":\"11\",\"range\":\"111\",\"list_rules\":{\"url\":\"111\",\"litpic\":\"111\"}}', NULL),
(4, '动作片', 9, 'UTF-8', 1548304632, 1548304632, '{\"list_url\":\"aaa\",\"start_page\":\"1\",\"end_page\":\"4\",\"step\":\"11\",\"range\":\"111\",\"list_rules\":{\"url\":\"111\",\"litpic\":\"111\"}}', NULL),
(5, '好莱坞', 6, 'UTF-8', 1548321137, 1548321137, '{\"list_url\":\"www.aaa\",\"start_page\":\"1\",\"end_page\":\"4\",\"step\":\"1\",\"range\":\".content\",\"list_rules\":{\"url\":\"www\",\"litpic\":\"www\"}}', '{\"title\":[\"qqq\",\"qq\",\"qq\"],\"keywords\":[\"qq\",\"qq\",\"q\"],\"description\":[\"q\",\"qq\",\"qq\"],\"writer\":[\"qq\",\"qq\",\"q\"],\"source\":[\"q\",\"q\",\"qq\"],\"filmtype\":[\"q\",\"qqq\",\"\"],\"date\":[\"q\",\"\",\"\"],\"xiangqing\":[\"qqq\",\"q\",\"\"]}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tp_ad`
--
ALTER TABLE `tp_ad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adpos_id` (`adpos_id`);

--
-- Indexes for table `tp_admin`
--
ALTER TABLE `tp_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `tp_adpos`
--
ALTER TABLE `tp_adpos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_ad_flash`
--
ALTER TABLE `tp_ad_flash`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ad_id` (`ad_id`);

--
-- Indexes for table `tp_archives`
--
ALTER TABLE `tp_archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_auth_group`
--
ALTER TABLE `tp_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_auth_group_access`
--
ALTER TABLE `tp_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `tp_auth_rule`
--
ALTER TABLE `tp_auth_rule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tp_cate`
--
ALTER TABLE `tp_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_conf`
--
ALTER TABLE `tp_conf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_film`
--
ALTER TABLE `tp_film`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tp_model`
--
ALTER TABLE `tp_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_model_field`
--
ALTER TABLE `tp_model_field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `tp_note`
--
ALTER TABLE `tp_note`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tp_ad`
--
ALTER TABLE `tp_ad`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `tp_admin`
--
ALTER TABLE `tp_admin`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `tp_adpos`
--
ALTER TABLE `tp_adpos`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `tp_ad_flash`
--
ALTER TABLE `tp_ad_flash`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '动画广告ID', AUTO_INCREMENT=20;

--
-- 使用表AUTO_INCREMENT `tp_archives`
--
ALTER TABLE `tp_archives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文档ID', AUTO_INCREMENT=28;

--
-- 使用表AUTO_INCREMENT `tp_auth_group`
--
ALTER TABLE `tp_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `tp_auth_rule`
--
ALTER TABLE `tp_auth_rule`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用表AUTO_INCREMENT `tp_cate`
--
ALTER TABLE `tp_cate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '栏目id', AUTO_INCREMENT=23;

--
-- 使用表AUTO_INCREMENT `tp_conf`
--
ALTER TABLE `tp_conf`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '配置项ID', AUTO_INCREMENT=25;

--
-- 使用表AUTO_INCREMENT `tp_film`
--
ALTER TABLE `tp_film`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `tp_model`
--
ALTER TABLE `tp_model`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `tp_model_field`
--
ALTER TABLE `tp_model_field`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- 使用表AUTO_INCREMENT `tp_note`
--
ALTER TABLE `tp_note`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '节点ID', AUTO_INCREMENT=6;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
