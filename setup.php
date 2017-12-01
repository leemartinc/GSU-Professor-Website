<?php

include 'connect.php';

//this is the setup page triggered if its the first time someone is loggin in;

//creates users table if not exists
$create_table_allusers = "CREATE TABLE IF NOT EXISTS `allusers` (
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
)";
$conn->query($create_table_allusers);

//creates catergories table if not exist
$create_table_categories = "CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(8) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_unique` (`cat_name`)
) ";
$conn->query($create_table_categories);

//creates events table if not exists
$create_table_events = "CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block',
  PRIMARY KEY (`id`)
)";
$conn->query($create_table_events);

//creates files table if not exist
$create_table_files = "CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(45) NOT NULL,
  `file_by` varchar(100) NOT NULL,
  `file_date` datetime NOT NULL,
  `file_location` varchar(100) NOT NULL DEFAULT '/files',
  PRIMARY KEY (`id`)
)";
$conn->query($create_table_files);

//creates news table if not exists
$create_table_files = "CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(8) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(140) NOT NULL,
  `news_content` text NOT NULL,
  `news_date` varchar(50) NOT NULL,
  PRIMARY KEY (`news_id`)
)";
$conn->query($create_table_news);

//creates posts table if not exists
$create_table_posts = "CREATE TABLE IF NOT EXISTS `posts` (
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
)";
$conn->query($create_table_posts);

//crates topics table if not exists
$create_table_topics = "CREATE TABLE IF NOT EXISTS `topics` (
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
)";
$conn->query($create_table_topics);


// Start the session
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <title>GSU Class Website</title>

        <script type="text/javascript" src="/js/jquery.min.js"></script>
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/mainwebsite.css">
    <style type="text/css">

      html,body { height: 100%; margin: 0px; padding: 0px; }
      #full { background: #0f0; height: 100%;}

    </style>
    </head>
  <!-- enables next line for text area -->  
    <script>
        $('textarea').keypress(function(event) {
   if (event.which == 13) {
      event.preventDefault();
      var s = $(this).val();
      $(this).val(s+"\n");
   }
});
    </script>
    
    <div>    
             <div class="rightsearch" style="color:white;"> </div>
            
        </div>
        <div >
        <img class="logo" src="http://www.gsu.edu/wp-content/themes/gsu-flex-2/images/logo.png" alt="GSULOGO">
        <div class="menubar" style="height: 40px;">
            
        </div>
    
    <body class="cont">
            <div class="container">

<!-- begin web conent here -->
                <h1 style="color: black;">Hello Instuctor! Welcome to your new site!</h1>
                <p style="text-align: center;">It's almost time for you to start accessing this site's functions such as: An Event Calendar, A Forum/Discussion Board, A News Page, Dropbox, and Instructor LiveChat. But before you do, a bit more information is required to get thing up and running correctly.</p>
                <br>
                
                <form>
                    
                <h2 style="color: darkgray;">Your website picture</h2>
                <input type="file" name="prof_pic">
                    
                <br>
                    
                    <input class="input-text" type="text" name="name" placeholder="Your Name">
                
                     <input class="input-text" type="text" name="campusid" placeholder="Your CampusID *">
                    
                </form>
                
                
                
                

        </div>
<div id="footer"></div>
</body>
<div class="footerbar">
        </div>
</html>                