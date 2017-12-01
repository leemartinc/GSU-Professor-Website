Project Documentation

https://docs.google.com/document/d/1-Ht1oe2KXB-wCr8Ifl-2O5fAAv_orOD6lISZXHBASpY/edit?usp=sharing

INSTRUCTOR SETUP

Download files from Github and extract the zip folder.
https://github.com/leemartinc/GSU-Professor-Website

PHP 5 or above is needed on server
MySQL is also needed on server.

Copy site files to the server host folder.
Do not copy the actual GSU-Professor-Website folder but instead the contents inside it.

After copying, run these scripts in SQL from the terminal used to connect to the server.


CREATE DATABASE zodiac;

USE zodiac;


CREATE TABLE IF NOT EXISTS `allusers` (
  `userid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto generated userid number for site',
  `user_level` int(11) DEFAULT '0',
  `campusid` varchar(45) NOT NULL COMMENT 'users gsu campus id',
  `name` varchar(100) NOT NULL COMMENT 'users name',
  `email` varchar(100) NOT NULL COMMENT 'email address',
  `period` varchar(45) NOT NULL COMMENT 'class date and time',
  `filelocation` varchar(45) DEFAULT NULL COMMENT 'location of file submissions',
  `chat` varchar(45) DEFAULT NULL,
  `insession` tinyint(1) DEFAULT '0',
  `datevetted` datetime DEFAULT NULL,
  `number` varchar(10) NOT NULL,
  `carrier` varchar(80) NOT NULL,
  PRIMARY KEY (`userid`,`campusid`)
);


CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(8) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_unique` (`cat_name`)
) 

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block',
  PRIMARY KEY (`id`)
);


CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(45) NOT NULL,
  `file_by` varchar(100) NOT NULL,
  `file_date` datetime NOT NULL,
  `file_location` varchar(100) NOT NULL DEFAULT '/files',
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(8) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(140) NOT NULL,
  `news_content` text NOT NULL,
  `news_date` varchar(50) NOT NULL,
  PRIMARY KEY (`news_id`)
);


CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(8) NOT NULL AUTO_INCREMENT,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` varchar(20) NOT NULL,
  `post_rez` int(11) DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `post_by` (`post_by`),
  KEY `post_topic` (`post_topic`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(8) NOT NULL AUTO_INCREMENT,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` varchar(20) NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `topic_cat` (`topic_cat`),
  KEY `topic_by` (`topic_by`),
  CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE
);


Go ahead and login to the site with GSU login and password.

After logging in, go back into SQL in the terminal and set yourself as the instructor(set user level to 1).
run this script:
UPDATE allusers SET user_level=1 WHERE campusid='YOUR_CAMPUS_ID';

the site is now ready to use and students can start loggin in.






