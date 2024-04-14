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
-- Database: `content_crz`
--
-- --------------------------------------------------------
--
-- Table structure for 'Users'
CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `gender` int(11) NOT NULL,
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

CREATE TABLE ArticlesBlogs (
  article_id int(11) NOT NULL AUTO_INCREMENT,
  creator_name varchar(50) NOT NULL,
  title varchar(255) NOT NULL,
  body text NOT NULL,
  date_posted datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  tags varchar(255) DEFAULT NULL,  -- Optional: For tagging articles
  status enum('published', 'draft', 'archived') NOT NULL DEFAULT 'draft',
  PRIMARY KEY (article_id),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE Media (
  media_id int(11) NOT NULL AUTO_INCREMENT,
  caption varchar(255) NOT NULL,
  creator_name varchar(50) NOT NULL,
  date_posted datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  file_path varchar(255) NOT NULL,
  media_type enum('image','video','audio') NOT NULL,
  PRIMARY KEY (media_id),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE Comments (
  comment_id int(11) NOT NULL AUTO_INCREMENT,
  article_id int(11) NOT NULL,
  user_id int(11) NOT NULL,
  comment text NOT NULL,
  date_commented datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (comment_id),
  KEY article_id (article_id),
  KEY user_id (user_id),
  CONSTRAINT comments_fk_article_id FOREIGN KEY (article_id) REFERENCES ArticlesBlogs (article_id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT comments_fk_user_id FOREIGN KEY (user_id) REFERENCES Users (user_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE Followers (
  follower_id int(11) NOT NULL,
  following_id int(11) NOT NULL,
  PRIMARY KEY (follower_id, following_id),
  CONSTRAINT followers_fk_follower_id FOREIGN KEY (follower_id) REFERENCES Users (user_id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT followers_fk_following_id FOREIGN KEY (following_id) REFERENCES Users (user_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE Likes (
  user_id int(11) NOT NULL,
  article_id int(11) NOT NULL,
  PRIMARY KEY (user_id, article_id),
  CONSTRAINT likes_fk_user_id FOREIGN KEY (user_id) REFERENCES Users (user_id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT likes_fk_article_id FOREIGN KEY (article_id) REFERENCES ArticlesBlogs (article_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `Roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert predefined roles
INSERT INTO `Roles` (`role_name`) VALUES ('Admin'), ('User');

ALTER TABLE `Users`
ADD COLUMN `role_id` int(11) NOT NULL DEFAULT 2,
ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `Roles` (`role_id`) ON DELETE RESTRICT ON UPDATE CASCADE;


