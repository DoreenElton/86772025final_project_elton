-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2024 at 11:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Database: `content_crt`
--
-- --------------------------------------------------------
--
-- Table structure for 'Users'
CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  'first_name' VARCHAR(255) NOT NULL,
  'last_name' VARCHAR(255) NOT NULL,
  'gender' int(11) NOT NULL,
  `dob` date NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Table structure for 'Content'
CREATE TABLE `Content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content_type` enum('article','blog','media', 'audio') NOT NULL,
  `status` enum('published','draft','archived') NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`content_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `content_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Content` (`content_id`, `user_id`, `title`, `body`, `date_posted`, `content_type`, `status`)
VALUES 
(1,1, 'First Article', '&lt;p&gt;Many times I have come across instances where some people scorn the practice of setting New Year Resolutions.&lt;/p&gt;&lt;p&gt;Their reason for this goes something like this:&lt;/p&gt;&lt;p&gt;The very word resolution is an indication of some form of internal conflict springing from an ineffectual self-governance in a person. It means the individual is waging a fight against something undesirable in their life; or is making a conscious decision to pursue certain ideals that before were absent in their life.&lt;/p&gt;&lt;p&gt;Aren&rsquo;t you supposed to be pursuing these ideals every day of your life? Isn&rsquo;t it supposed to be the default state of your life? Why would you wait for a new year before you make a resolution to better your life?&lt;/p&gt;&lt;p&gt;Such people also avoid new year resolutions or scorn the practice thereof because for them, experience has proven it to be ineffective.&lt;/p&gt;&lt;p&gt;I don&rsquo;t entirely agree with such people. I am not advocating the practice of new year resolutions either. But I&rsquo;d sooner advise a person to set new year resolutions they will end up abandoning by the end of January than advise them to sleepwalk through their life the entire year.&lt;/p&gt;&lt;p&gt;At the very least, setting new year resolutions means that you still have an interest in making your life better, and that is a good place to start. You just need a better strategy than new year resolutions, which is what I bring to the table today.&lt;/p&gt;&lt;p&gt;I call it The &lt;i&gt;12 months challenge.&lt;/i&gt;&lt;/p&gt;&lt;p&gt;This challenge is simple: At the end of the year, write and publish an article in which you list 12 of your proudest, most fulfilling accomplishments from each of the 12 months of that year. Be very strict with the rules of the challenge: Pick only one accomplishment per month.&lt;/p&gt;&lt;p&gt;You are free to accomplish as many things in a month as you can but pick only one to be added to the list for any particular month.&lt;/p&gt;&lt;p&gt;Publish this article on your blog (if you have one), on your linkedIn profile, and on any of the social media platforms; share it with your close network of trusted family members, friends, colleagues and mentors.&lt;/p&gt;&lt;p&gt;It is very important that you share the article to as wide an audience as possible if the contents are not too private. Sharing such an article can help you connect with other individuals with shared interests, dreams, and plans for the future. And such connections can open doors for you and a lot of other people that you never knew existed.&lt;/p&gt;&lt;p&gt;Most importantly, if you know you are preparing the article to share it with other people, you are more likely to take it very seriously.&lt;/p&gt;&lt;p&gt;One thing I almost avoided mentioning is the nature of these accomplishments. I&rsquo;m avoiding this aspect of the challenge because I can&rsquo;t really tell you what you should aim at accomplishing in your life in order to feel fulfilled. You are going to have to do that yourself because only you can do it best. It is your purpose. You may think you don&rsquo;t know it yet but at some deeper level you do.&lt;/p&gt;&lt;p&gt;I can only tell you what works for me: I have a few questions I usually ask myself when I feel that I am not living a fulfilling life at any time in my life. At such times I ask myself:&lt;/p&gt;&lt;p&gt;If I were to be diagnosed with terminal cancer and given only 6 months to live, how would I spend that time? What things would I value most? What would I regret not doing?&lt;/p&gt;&lt;p&gt;For me, the answers to such questions immediately and unmistakably stand out clear in my mind:&lt;/p&gt;&lt;p&gt;I would regret not taking better care of my parents than what I am doing. They have toiled and soiled far too much for me to be ordinary.&lt;br&gt;I would grieve in my spirit at all those years I felt timid and settled for far far less than I am worth.&lt;/p&gt;&lt;p&gt;I would regret my passivity in relationships with all those amazing people who have once featured in my life and left because of my apparent disinterest. I could have swallowed my pride and risked exposing my insecurities, my quirks and my shortcomings in general. Hiding them only made me look uninterested.&lt;/p&gt;&lt;p&gt;I would regret all those hours I wasted feeling bored when I could have set up a blog to explore my passion for writing.&lt;/p&gt;&lt;p&gt;I could have read more and more books.&lt;/p&gt;&lt;p&gt;I would regret never having taken any steps towards realizing all those side projects I kept conceiving day after day in my mind.&lt;/p&gt;&lt;p&gt;And many more...&lt;/p&gt;&lt;p&gt;When you ask yourself the above questions, the answers will pop up almost immediately and they will fill you with a new vitality and enthusiasm towards your life goals.&lt;/p&gt;&lt;p&gt;Now assume your time from now on is as limited and valuable as it could be if the above assumption about cancer were real. Then start working on these projects one month at a time. Start living your unlived life one month at a time.&lt;/p&gt;', '2024-04-10 12:00:00', 'article', 'published'),
(2, 2, 'First Audio', 'This is the content of the first audio post.', '2024-04-11 10:30:00', 'audio', 'published'),
(3,3, 'First Media', 'This is the content of the first media post.', '2024-04-12 08:45:00', 'media', 'published'),
(4,4, 'Second Article', '&lt;p&gt;Many times I have come across instances where some people scorn the practice of setting New Year Resolutions.&lt;/p&gt;&lt;p&gt;Their reason for this goes something like this:&lt;/p&gt;&lt;p&gt;The very word resolution is an indication of some form of internal conflict springing from an ineffectual self-governance in a person. It means the individual is waging a fight against something undesirable in their life; or is making a conscious decision to pursue certain ideals that before were absent in their life.&lt;/p&gt;&lt;p&gt;Aren&rsquo;t you supposed to be pursuing these ideals every day of your life? Isn&rsquo;t it supposed to be the default state of your life? Why would you wait for a new year before you make a resolution to better your life?&lt;/p&gt;&lt;p&gt;Such people also avoid new year resolutions or scorn the practice thereof because for them, experience has proven it to be ineffective.&lt;/p&gt;&lt;p&gt;I don&rsquo;t entirely agree with such people. I am not advocating the practice of new year resolutions either. But I&rsquo;d sooner advise a person to set new year resolutions they will end up abandoning by the end of January than advise them to sleepwalk through their life the entire year.&lt;/p&gt;&lt;p&gt;At the very least, setting new year resolutions means that you still have an interest in making your life better, and that is a good place to start. You just need a better strategy than new year resolutions, which is what I bring to the table today.&lt;/p&gt;&lt;p&gt;I call it The &lt;i&gt;12 months challenge.&lt;/i&gt;&lt;/p&gt;&lt;p&gt;This challenge is simple: At the end of the year, write and publish an article in which you list 12 of your proudest, most fulfilling accomplishments from each of the 12 months of that year. Be very strict with the rules of the challenge: Pick only one accomplishment per month.&lt;/p&gt;&lt;p&gt;You are free to accomplish as many things in a month as you can but pick only one to be added to the list for any particular month.&lt;/p&gt;&lt;p&gt;Publish this article on your blog (if you have one), on your linkedIn profile, and on any of the social media platforms; share it with your close network of trusted family members, friends, colleagues and mentors.&lt;/p&gt;&lt;p&gt;It is very important that you share the article to as wide an audience as possible if the contents are not too private. Sharing such an article can help you connect with other individuals with shared interests, dreams, and plans for the future. And such connections can open doors for you and a lot of other people that you never knew existed.&lt;/p&gt;&lt;p&gt;Most importantly, if you know you are preparing the article to share it with other people, you are more likely to take it very seriously.&lt;/p&gt;&lt;p&gt;One thing I almost avoided mentioning is the nature of these accomplishments. I&rsquo;m avoiding this aspect of the challenge because I can&rsquo;t really tell you what you should aim at accomplishing in your life in order to feel fulfilled. You are going to have to do that yourself because only you can do it best. It is your purpose. You may think you don&rsquo;t know it yet but at some deeper level you do.&lt;/p&gt;&lt;p&gt;I can only tell you what works for me: I have a few questions I usually ask myself when I feel that I am not living a fulfilling life at any time in my life. At such times I ask myself:&lt;/p&gt;&lt;p&gt;If I were to be diagnosed with terminal cancer and given only 6 months to live, how would I spend that time? What things would I value most? What would I regret not doing?&lt;/p&gt;&lt;p&gt;For me, the answers to such questions immediately and unmistakably stand out clear in my mind:&lt;/p&gt;&lt;p&gt;I would regret not taking better care of my parents than what I am doing. They have toiled and soiled far too much for me to be ordinary.&lt;br&gt;I would grieve in my spirit at all those years I felt timid and settled for far far less than I am worth.&lt;/p&gt;&lt;p&gt;I would regret my passivity in relationships with all those amazing people who have once featured in my life and left because of my apparent disinterest. I could have swallowed my pride and risked exposing my insecurities, my quirks and my shortcomings in general. Hiding them only made me look uninterested.&lt;/p&gt;&lt;p&gt;I would regret all those hours I wasted feeling bored when I could have set up a blog to explore my passion for writing.&lt;/p&gt;&lt;p&gt;I could have read more and more books.&lt;/p&gt;&lt;p&gt;I would regret never having taken any steps towards realizing all those side projects I kept conceiving day after day in my mind.&lt;/p&gt;&lt;p&gt;And many more...&lt;/p&gt;&lt;p&gt;When you ask yourself the above questions, the answers will pop up almost immediately and they will fill you with a new vitality and enthusiasm towards your life goals.&lt;/p&gt;&lt;p&gt;Now assume your time from now on is as limited and valuable as it could be if the above assumption about cancer were real. Then start working on these projects one month at a time. Start living your unlived life one month at a time.&lt;/p&gt;', '2024-04-13 14:20:00', 'article', 'draft'),
(5,5, 'Second Audio', 'This is the content of the second audio post.', '2024-04-14 16:00:00', 'audio', 'draft'),
(6,6, 'Second Media', 'This is the content of the second media post.', '2024-04-15 18:10:00', 'media', 'draft'),
(7,7, 'Third Article', '&lt;p&gt;Many times I have come across instances where some people scorn the practice of setting New Year Resolutions.&lt;/p&gt;&lt;p&gt;Their reason for this goes something like this:&lt;/p&gt;&lt;p&gt;The very word resolution is an indication of some form of internal conflict springing from an ineffectual self-governance in a person. It means the individual is waging a fight against something undesirable in their life; or is making a conscious decision to pursue certain ideals that before were absent in their life.&lt;/p&gt;&lt;p&gt;Aren&rsquo;t you supposed to be pursuing these ideals every day of your life? Isn&rsquo;t it supposed to be the default state of your life? Why would you wait for a new year before you make a resolution to better your life?&lt;/p&gt;&lt;p&gt;Such people also avoid new year resolutions or scorn the practice thereof because for them, experience has proven it to be ineffective.&lt;/p&gt;&lt;p&gt;I don&rsquo;t entirely agree with such people. I am not advocating the practice of new year resolutions either. But I&rsquo;d sooner advise a person to set new year resolutions they will end up abandoning by the end of January than advise them to sleepwalk through their life the entire year.&lt;/p&gt;&lt;p&gt;At the very least, setting new year resolutions means that you still have an interest in making your life better, and that is a good place to start. You just need a better strategy than new year resolutions, which is what I bring to the table today.&lt;/p&gt;&lt;p&gt;I call it The &lt;i&gt;12 months challenge.&lt;/i&gt;&lt;/p&gt;&lt;p&gt;This challenge is simple: At the end of the year, write and publish an article in which you list 12 of your proudest, most fulfilling accomplishments from each of the 12 months of that year. Be very strict with the rules of the challenge: Pick only one accomplishment per month.&lt;/p&gt;&lt;p&gt;You are free to accomplish as many things in a month as you can but pick only one to be added to the list for any particular month.&lt;/p&gt;&lt;p&gt;Publish this article on your blog (if you have one), on your linkedIn profile, and on any of the social media platforms; share it with your close network of trusted family members, friends, colleagues and mentors.&lt;/p&gt;&lt;p&gt;It is very important that you share the article to as wide an audience as possible if the contents are not too private. Sharing such an article can help you connect with other individuals with shared interests, dreams, and plans for the future. And such connections can open doors for you and a lot of other people that you never knew existed.&lt;/p&gt;&lt;p&gt;Most importantly, if you know you are preparing the article to share it with other people, you are more likely to take it very seriously.&lt;/p&gt;&lt;p&gt;One thing I almost avoided mentioning is the nature of these accomplishments. I&rsquo;m avoiding this aspect of the challenge because I can&rsquo;t really tell you what you should aim at accomplishing in your life in order to feel fulfilled. You are going to have to do that yourself because only you can do it best. It is your purpose. You may think you don&rsquo;t know it yet but at some deeper level you do.&lt;/p&gt;&lt;p&gt;I can only tell you what works for me: I have a few questions I usually ask myself when I feel that I am not living a fulfilling life at any time in my life. At such times I ask myself:&lt;/p&gt;&lt;p&gt;If I were to be diagnosed with terminal cancer and given only 6 months to live, how would I spend that time? What things would I value most? What would I regret not doing?&lt;/p&gt;&lt;p&gt;For me, the answers to such questions immediately and unmistakably stand out clear in my mind:&lt;/p&gt;&lt;p&gt;I would regret not taking better care of my parents than what I am doing. They have toiled and soiled far too much for me to be ordinary.&lt;br&gt;I would grieve in my spirit at all those years I felt timid and settled for far far less than I am worth.&lt;/p&gt;&lt;p&gt;I would regret my passivity in relationships with all those amazing people who have once featured in my life and left because of my apparent disinterest. I could have swallowed my pride and risked exposing my insecurities, my quirks and my shortcomings in general. Hiding them only made me look uninterested.&lt;/p&gt;&lt;p&gt;I would regret all those hours I wasted feeling bored when I could have set up a blog to explore my passion for writing.&lt;/p&gt;&lt;p&gt;I could have read more and more books.&lt;/p&gt;&lt;p&gt;I would regret never having taken any steps towards realizing all those side projects I kept conceiving day after day in my mind.&lt;/p&gt;&lt;p&gt;And many more...&lt;/p&gt;&lt;p&gt;When you ask yourself the above questions, the answers will pop up almost immediately and they will fill you with a new vitality and enthusiasm towards your life goals.&lt;/p&gt;&lt;p&gt;Now assume your time from now on is as limited and valuable as it could be if the above assumption about cancer were real. Then start working on these projects one month at a time. Start living your unlived life one month at a time.&lt;/p&gt;', '2024-04-16 20:30:00', 'article', 'archived'),
(8, 8, 'Third Audio', 'This is the content of the third audio post.', '2024-04-17 22:45:00', 'audio', 'archived'),
(9,9, 'Third Media', 'This is the content of the third media post.', '2024-04-18 09:15:00', 'media', 'archived'),
(10,10, 'Fourth Article', '&lt;p&gt;Many times I have come across instances where some people scorn the practice of setting New Year Resolutions.&lt;/p&gt;&lt;p&gt;Their reason for this goes something like this:&lt;/p&gt;&lt;p&gt;The very word resolution is an indication of some form of internal conflict springing from an ineffectual self-governance in a person. It means the individual is waging a fight against something undesirable in their life; or is making a conscious decision to pursue certain ideals that before were absent in their life.&lt;/p&gt;&lt;p&gt;Aren&rsquo;t you supposed to be pursuing these ideals every day of your life? Isn&rsquo;t it supposed to be the default state of your life? Why would you wait for a new year before you make a resolution to better your life?&lt;/p&gt;&lt;p&gt;Such people also avoid new year resolutions or scorn the practice thereof because for them, experience has proven it to be ineffective.&lt;/p&gt;&lt;p&gt;I don&rsquo;t entirely agree with such people. I am not advocating the practice of new year resolutions either. But I&rsquo;d sooner advise a person to set new year resolutions they will end up abandoning by the end of January than advise them to sleepwalk through their life the entire year.&lt;/p&gt;&lt;p&gt;At the very least, setting new year resolutions means that you still have an interest in making your life better, and that is a good place to start. You just need a better strategy than new year resolutions, which is what I bring to the table today.&lt;/p&gt;&lt;p&gt;I call it The &lt;i&gt;12 months challenge.&lt;/i&gt;&lt;/p&gt;&lt;p&gt;This challenge is simple: At the end of the year, write and publish an article in which you list 12 of your proudest, most fulfilling accomplishments from each of the 12 months of that year. Be very strict with the rules of the challenge: Pick only one accomplishment per month.&lt;/p&gt;&lt;p&gt;You are free to accomplish as many things in a month as you can but pick only one to be added to the list for any particular month.&lt;/p&gt;&lt;p&gt;Publish this article on your blog (if you have one), on your linkedIn profile, and on any of the social media platforms; share it with your close network of trusted family members, friends, colleagues and mentors.&lt;/p&gt;&lt;p&gt;It is very important that you share the article to as wide an audience as possible if the contents are not too private. Sharing such an article can help you connect with other individuals with shared interests, dreams, and plans for the future. And such connections can open doors for you and a lot of other people that you never knew existed.&lt;/p&gt;&lt;p&gt;Most importantly, if you know you are preparing the article to share it with other people, you are more likely to take it very seriously.&lt;/p&gt;&lt;p&gt;One thing I almost avoided mentioning is the nature of these accomplishments. I&rsquo;m avoiding this aspect of the challenge because I can&rsquo;t really tell you what you should aim at accomplishing in your life in order to feel fulfilled. You are going to have to do that yourself because only you can do it best. It is your purpose. You may think you don&rsquo;t know it yet but at some deeper level you do.&lt;/p&gt;&lt;p&gt;I can only tell you what works for me: I have a few questions I usually ask myself when I feel that I am not living a fulfilling life at any time in my life. At such times I ask myself:&lt;/p&gt;&lt;p&gt;If I were to be diagnosed with terminal cancer and given only 6 months to live, how would I spend that time? What things would I value most? What would I regret not doing?&lt;/p&gt;&lt;p&gt;For me, the answers to such questions immediately and unmistakably stand out clear in my mind:&lt;/p&gt;&lt;p&gt;I would regret not taking better care of my parents than what I am doing. They have toiled and soiled far too much for me to be ordinary.&lt;br&gt;I would grieve in my spirit at all those years I felt timid and settled for far far less than I am worth.&lt;/p&gt;&lt;p&gt;I would regret my passivity in relationships with all those amazing people who have once featured in my life and left because of my apparent disinterest. I could have swallowed my pride and risked exposing my insecurities, my quirks and my shortcomings in general. Hiding them only made me look uninterested.&lt;/p&gt;&lt;p&gt;I would regret all those hours I wasted feeling bored when I could have set up a blog to explore my passion for writing.&lt;/p&gt;&lt;p&gt;I could have read more and more books.&lt;/p&gt;&lt;p&gt;I would regret never having taken any steps towards realizing all those side projects I kept conceiving day after day in my mind.&lt;/p&gt;&lt;p&gt;And many more...&lt;/p&gt;&lt;p&gt;When you ask yourself the above questions, the answers will pop up almost immediately and they will fill you with a new vitality and enthusiasm towards your life goals.&lt;/p&gt;&lt;p&gt;Now assume your time from now on is as limited and valuable as it could be if the above assumption about cancer were real. Then start working on these projects one month at a time. Start living your unlived life one month at a time.&lt;/p&gt;', '2024-04-19 11:00:00', 'article', 'published');


-- Table structure for 'Media'
CREATE TABLE `Media` (
  `media_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `media_type` enum('image','video','audio') NOT NULL,
  PRIMARY KEY (`media_id`),
  KEY `content_id` (`content_id`),
  CONSTRAINT `media_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `Content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Media` (`media_id`, `content_id`, `file_path`, `media_type`)
VALUES 
(1,1, '../images/image_2.png', 'image'),
(2,2, '../images/image_3.png', 'image'),
(3,3, '../images/gentlejazz.wav', 'audio'),
(4,4, '../images/image_5.png', 'image'),
(5,5, '../images/image_6.png', 'image'),
(6,6, '../images/Jazz.wav', 'audio'),
(7,7, '../images/image_4.png', 'image'),
(8,8, '../images/creepy.wav', 'audio'),
(9,9, '../images/trumpet.wav', 'audio'),
(10,10, '../images/quotes.jpeg', 'image');

-- Table structure for 'Comments'
CREATE TABLE `Comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_commented` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `content_id` (`content_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `Content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for 'Followers'
CREATE TABLE `Followers` (
  `follower_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL,
  PRIMARY KEY (`follower_id`,`following_id`),
  CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`following_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Followers` (`follower_id`, `following_id`)
VALUES 
(1, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8),
(8, 9),
(9, 10),
(10, 1);

-- Table structure for 'Likes'
CREATE TABLE `Likes` (
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`content_id`),
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `Content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
