/*
Navicat MySQL Data Transfer

Source Server         : Tiger
Source Server Version : 50161
Source Host           : 192.168.1.100:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50161
File Encoding         : 65001

Date: 2014-09-08 21:33:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_mobile` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_privilege` tinyint(4) NOT NULL DEFAULT '1',
  `module_list` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT '1',
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '1', 'Administrator', 'admin', '', '', '9ffa1aebc0303c57da6ebd95e263507e', '1', '', '', '1', '');
INSERT INTO `admin` VALUES ('2', '2', 'Go Online Solusi', 'gositus', '', '', '1fa87f6003f8f260e668f9c0b08e1b87', '1', '', '', '1', '');

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `article_name` varchar(255) NOT NULL,
  `seo_url` varchar(255) NOT NULL,
  `article_head` varchar(255) NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `article_content` text NOT NULL,
  `article_section` int(11) NOT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT '1',
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of article
-- ----------------------------

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_caption` varchar(255) NOT NULL,
  `banner_link` text NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_content` text NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of banner
-- ----------------------------

-- ----------------------------
-- Table structure for `faq`
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `faq_name` text NOT NULL,
  `seo_url` text NOT NULL,
  `faq_content` text NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of faq
-- ----------------------------

-- ----------------------------
-- Table structure for `gallery_category`
-- ----------------------------
DROP TABLE IF EXISTS `gallery_category`;
CREATE TABLE `gallery_category` (
  `gallery_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `gallery_category_name` varchar(255) NOT NULL,
  `seo_url` varchar(255) NOT NULL,
  `gallery_category_type` tinyint(4) NOT NULL,
  `gallery_category_parent` int(11) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`gallery_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gallery_category
-- ----------------------------

-- ----------------------------
-- Table structure for `item`
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `seo_url` varchar(255) NOT NULL,
  `item_category` int(11) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_content` text NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item
-- ----------------------------

-- ----------------------------
-- Table structure for `language`
-- ----------------------------
DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `language_name` varchar(100) NOT NULL,
  `language_code` varchar(2) NOT NULL,
  `language_icon` varchar(255) NOT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT '1',
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of language
-- ----------------------------
INSERT INTO `language` VALUES ('1', '1', 'Indonesia', 'id', 'flag-indonesia-icon.png', '1', '');

-- ----------------------------
-- Table structure for `log`
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_admin_id` int(11) NOT NULL,
  `log_action` varchar(100) NOT NULL,
  `log_db` varchar(100) NOT NULL,
  `log_value` int(11) NOT NULL,
  `log_name` varchar(255) NOT NULL,
  `log_desc` varchar(255) NOT NULL,
  `log_ip` varchar(20) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES ('77', '2', 'LOGIN', 'admin', '2', 'Go Online Solusi', 'Successful Login', '192.168.1.105', '2014-06-03 14:26:29');
INSERT INTO `log` VALUES ('78', '1', 'LOGIN', 'admin', '1', 'Administrator', 'Successful Login', '202.43.165.141', '2014-06-10 09:48:54');
INSERT INTO `log` VALUES ('79', '1', 'LOGIN', 'admin', '1', 'Administrator', 'Successful Login', '202.43.165.141', '2014-06-12 15:30:17');
INSERT INTO `log` VALUES ('80', '2', 'LOGIN', 'admin', '2', 'Go Online Solusi', 'Successful Login', '192.168.1.107', '2014-06-23 13:42:43');
INSERT INTO `log` VALUES ('81', '1', 'LOGIN', 'admin', '1', 'Administrator', 'Successful Login', '202.62.16.206', '2014-06-28 15:25:40');
INSERT INTO `log` VALUES ('82', '1', 'LOGIN', 'admin', '1', 'Administrator', 'Successful Login', '202.62.16.206', '2014-06-28 20:51:57');
INSERT INTO `log` VALUES ('83', '1', 'LOGIN', 'admin', '1', 'Administrator', 'Successful Login', '202.43.165.141', '2014-07-01 10:58:46');
INSERT INTO `log` VALUES ('84', '1', 'LOGIN', 'admin', '1', 'Administrator', 'Successful Login', '202.43.165.141', '2014-07-01 13:24:54');
INSERT INTO `log` VALUES ('85', '1', 'LOGIN', 'admin', '1', 'Administrator', 'Successful Login', '202.43.165.141', '2014-07-02 11:13:33');
INSERT INTO `log` VALUES ('86', '2', 'LOGIN', 'admin', '2', 'Go Online Solusi', 'Successful Login', '139.192.9.228', '2014-08-05 15:26:00');
INSERT INTO `log` VALUES ('87', '1', 'LOGIN', 'admin', '1', 'Administrator', 'Successful Login', '192.168.1.65', '2014-08-14 14:08:37');
INSERT INTO `log` VALUES ('88', '1', 'LOGIN', 'admin', '1', 'Administrator', 'Successful Login', '192.168.1.65', '2014-08-14 14:23:22');
INSERT INTO `log` VALUES ('89', '1', 'LOGIN', 'admin', '1', 'Administrator', 'Successful Login', '192.168.1.65', '2014-08-14 14:24:35');

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `message_name` varchar(255) NOT NULL,
  `message_address` text NOT NULL,
  `message_email` varchar(255) NOT NULL,
  `message_phone` varchar(255) NOT NULL,
  `message_company` varchar(255) NOT NULL,
  `message_subject` varchar(255) NOT NULL,
  `message_content` text NOT NULL,
  `message_reply` text NOT NULL,
  `message_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` tinyint(4) NOT NULL DEFAULT '2',
  `flag_memo` varchar(255) NOT NULL DEFAULT 'New Message',
  `replied` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for `module`
-- ----------------------------
DROP TABLE IF EXISTS `module`;
CREATE TABLE `module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `module_alias` varchar(100) NOT NULL,
  `module_parent` int(11) NOT NULL,
  `module_url` varchar(100) NOT NULL DEFAULT 'javascript:;',
  `module_notes` text NOT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT '1',
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of module
-- ----------------------------
INSERT INTO `module` VALUES ('1', '1', 'Setting', 'setting', '0', 'javascript:;', 'Hanya tampil untuk admin gositus', '1', '');
INSERT INTO `module` VALUES ('2', '2', 'Module', 'module', '1', 'module', '', '1', '');
INSERT INTO `module` VALUES ('3', '3', 'Language', 'language', '1', 'language', '', '1', '');
INSERT INTO `module` VALUES ('4', '4', 'Section', 'section', '1', 'section', '', '1', '');
INSERT INTO `module` VALUES ('5', '5', 'Website Management', 'website_management', '0', 'javascript:;', '', '1', '');
INSERT INTO `module` VALUES ('6', '6', 'Admin List', 'admin_list', '5', 'admin', '', '1', '');
INSERT INTO `module` VALUES ('7', '7', 'Settings', 'settings', '5', 'setting', '', '1', '');
INSERT INTO `module` VALUES ('8', '8', 'Content', 'content', '0', 'javascript:;', '', '1', '');
INSERT INTO `module` VALUES ('9', '9', 'Article', 'article', '8', 'article', '', '1', '');
INSERT INTO `module` VALUES ('10', '10', 'News', 'news', '8', 'news', 'Penambahan news & events', '1', '');
INSERT INTO `module` VALUES ('11', '11', 'F.A.Q', 'f.a.q', '8', 'faq', 'Frequently Asked Questions', '1', '');
INSERT INTO `module` VALUES ('12', '12', 'Banner', 'banner', '8', 'banner', 'rolling banner', '1', '');
INSERT INTO `module` VALUES ('13', '13', 'Gallery', 'gallery', '0', 'javascript:;', 'untuk photo + video', '1', '');
INSERT INTO `module` VALUES ('14', '14', 'Category', 'category', '13', 'gallery_category', 'category untuk gallery (video + photo)', '1', '');
INSERT INTO `module` VALUES ('15', '15', 'Photo', 'photo', '13', 'photo', '', '1', '');
INSERT INTO `module` VALUES ('16', '16', 'Video', 'video', '13', 'video', 'youtube video link.', '1', '');
INSERT INTO `module` VALUES ('17', '17', 'Product', 'product', '0', 'javascript:;', '', '1', '');
INSERT INTO `module` VALUES ('18', '18', 'Category', 'category', '17', 'product_category', '', '1', '');
INSERT INTO `module` VALUES ('19', '19', 'Item', 'item', '17', 'item', 'product listing', '1', '');
INSERT INTO `module` VALUES ('20', '20', 'Testimonial', 'testimonial', '8', 'testimonial', '', '1', '');
INSERT INTO `module` VALUES ('21', '21', 'Message', 'message', '0', 'javascript:;', 'message dari contact us', '1', '');
INSERT INTO `module` VALUES ('22', '22', 'Inbox', 'inbox', '21', 'inbox', '', '1', '');
INSERT INTO `module` VALUES ('23', '23', 'Test Module', 'test_module', '8', 'test_module', '', '1', '');
INSERT INTO `module` VALUES ('24', '24', 'Compose', 'compose', '21', 'send_message', '', '1', '');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `news_name` varchar(255) NOT NULL,
  `seo_url` varchar(255) NOT NULL,
  `news_type` tinyint(4) NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_start` datetime NOT NULL,
  `news_end` datetime NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for `photo`
-- ----------------------------
DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `seo_url` varchar(255) NOT NULL,
  `photo_category` int(11) NOT NULL,
  `photo_image` varchar(255) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of photo
-- ----------------------------

-- ----------------------------
-- Table structure for `product_category`
-- ----------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `product_category_name` varchar(255) NOT NULL,
  `seo_url` varchar(255) NOT NULL,
  `product_category_parent` int(11) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_category
-- ----------------------------

-- ----------------------------
-- Table structure for `section`
-- ----------------------------
DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT '1',
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of section
-- ----------------------------

-- ----------------------------
-- Table structure for `send_message`
-- ----------------------------
DROP TABLE IF EXISTS `send_message`;
CREATE TABLE `send_message` (
  `send_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `send_message_from` int(11) NOT NULL,
  `send_message_to` varchar(255) NOT NULL,
  `send_message_cc` varchar(255) NOT NULL,
  `send_message_bcc` varchar(255) NOT NULL,
  `send_message_subject` varchar(255) NOT NULL,
  `send_message_content` varchar(255) NOT NULL,
  `send_message_attach` varchar(255) NOT NULL,
  `send_message_date` datetime NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`send_message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of send_message
-- ----------------------------

-- ----------------------------
-- Table structure for `setting`
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(100) NOT NULL,
  `setting_address` varchar(255) NOT NULL,
  `setting_country` varchar(50) NOT NULL,
  `setting_city` varchar(50) NOT NULL,
  `setting_postcode` varchar(10) NOT NULL,
  `setting_phone` varchar(100) NOT NULL,
  `setting_mobile` varchar(100) NOT NULL,
  `setting_bb_pin` varchar(15) NOT NULL,
  `setting_fax` varchar(100) NOT NULL,
  `setting_email` varchar(100) NOT NULL,
  `setting_ym` varchar(100) NOT NULL,
  `setting_msn` varchar(100) NOT NULL,
  `setting_facebook` varchar(150) NOT NULL,
  `setting_twitter` varchar(50) NOT NULL,
  `setting_google_map` varchar(100) NOT NULL,
  `setting_google_analytics` varchar(100) NOT NULL,
  `setting_web_title` varchar(100) NOT NULL,
  `setting_web_motto` varchar(255) NOT NULL,
  `setting_web_logo` varchar(255) NOT NULL,
  `setting_favicon` varchar(255) NOT NULL,
  `setting_meta_desc` varchar(255) NOT NULL,
  `setting_meta_key` varchar(255) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('1', 'Go Online Solusi ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'logo-email.jpg', '', '', '', '2', '');
INSERT INTO `setting` VALUES ('2', 'Quote of the Day', 'Quote of the Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Quote of the Day', 'Quote of the Day', 'logo-email.jpg', '', 'Quote of the Day', 'Quote of the Day', '2', '0');
INSERT INTO `setting` VALUES ('6', 'Quote of the Day', 'Quote of the Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Australis Leisure', 'Quote of the Day', 'web-logo.png', '', 'Quote of the Day', 'Quote of the Day', '2', '0');
INSERT INTO `setting` VALUES ('7', 'Quote of the Day', 'Quote of the Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Australis Leisure', 'Quote of the Day', 'go-online-solusi1.png', '', 'Quote of the Day', 'Quote of the Day', '2', '0');
INSERT INTO `setting` VALUES ('8', 'Quote of the Day', 'Quote of the Day', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Quote of the Day', 'Quote of the Day', 'logo-email1.jpg', '', 'Quote of the Day', 'Quote of the Day', '1', '0');

-- ----------------------------
-- Table structure for `testimonial`
-- ----------------------------
DROP TABLE IF EXISTS `testimonial`;
CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `testimonial_name` varchar(255) NOT NULL,
  `testimonial_content` text NOT NULL,
  `testimonial_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` tinyint(4) NOT NULL,
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`testimonial_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of testimonial
-- ----------------------------

-- ----------------------------
-- Table structure for `video`
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `seo_url` varchar(255) NOT NULL,
  `video_category` int(11) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `flag_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of video
-- ----------------------------
