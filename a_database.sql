-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2014 at 07:32 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `a_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `google_user`
--

CREATE TABLE IF NOT EXISTS `google_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `google_user`
--

INSERT INTO `google_user` (`id`, `username`, `firstname`, `surname`) VALUES
(1, 'chennavamshi@gmail.com', 'Vamshi', 'Chenna'),
(2, 'vyshaalnarayanam@gmail.com', 'Vyshaal', 'Narayanam'),
(3, 'vinodhreddyv@gmail.com', 'Vinodh', 'Reddy'),
(4, 'vinodhreddy237@gmail.com', 'vinodh', 'reddy');

-- --------------------------------------------------------

--
-- Table structure for table `question_database`
--

CREATE TABLE IF NOT EXISTS `question_database` (
  `q_id` int(30) NOT NULL AUTO_INCREMENT,
  `ques` varchar(300) NOT NULL,
  `o1` varchar(50) NOT NULL,
  `o2` varchar(50) NOT NULL,
  `o3` varchar(50) NOT NULL,
  `o4` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `question_database`
--

INSERT INTO `question_database` (`q_id`, `ques`, `o1`, `o2`, `o3`, `o4`, `answer`) VALUES
(1, 'Find next number in the sequence \r\n1 2 4 6 10 12 16 18 22', '26', '28', '30', 'none of the above', '28'),
(2, 'Which one of the following is a prime number ?', '119', '189', '551', 'none of the above', 'none of the above'),
(3, 'Probability of getting a sum 9 from 2 throws of a dice', '1/3', '1/6', '1/9', '1/12', '1/9'),
(4, 'If S.P doubles profit triples find profit percent?', '66.66', '100', '105.33', '120', '100');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `surname`) VALUES
(3, 'vam', 'dc19d421670342a37a2114063f29be6e', 'vamshi', 'chenna'),
(4, 'vyshaal', 'a91b9432eea8bb9fb84338db89c24016', 'vyshaal', 'narayanam'),
(5, 'vinodh', '471124b6c474adfa1522497965153494', 'vinodh', 'reddy'),
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'adimn', 'admin'),
(7, 'vamshi', 'a91b9432eea8bb9fb84338db89c24016', 'vamshi', 'asdf'),
(8, 'asdf', '912ec803b2ce49e4a541068d495ab570', 'asdf', 'adsf'),
(9, 'hello', '5d41402abc4b2a76b9719d911017c592', '132', '456'),
(10, 'spam', 'e09f6a7593f8ae3994ea57e1117f67ec', 'Vamshi', 'Chenna'),
(11, 'suarez', 'c5567cb56a392aefd7e127a6c3925171', 'suarez', 'reddy'),
(12, 'espncricinfo', 'e10adc3949ba59abbe56e057f20f883e', '123', '456'),
(13, 'we', 'ff1ccf57e98c817df1efcd9fe44a8aeb', 'w', 'q'),
(14, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a'),
(15, 'hahaa', '4cd2c5a360c86bc7c7f38a3b4087cafb', 'haha', 'reddy'),
(16, 'hahaha', '101a6ec9f938885df0a44f20458d2eb4', 'hahaha', 'hahaha'),
(17, '1ffdfsdfds', 'a152e841783914146e4bcd4f39100686', 'sfds', 'fdg'),
(18, 'temp12', '962012d09b8170d912f0669f6d7d9d07', 'qwe', 'qwe'),
(19, '123', '202cb962ac59075b964b07152d234b70', '2', '3'),
(20, 'f@f.com', '9158734e4b7a59bf335376ef2f7dfd33', 'saas', 'sasa'),
(21, '1234', '202cb962ac59075b964b07152d234b70', '123', '456'),
(22, 'vamshichenna', 'a91b9432eea8bb9fb84338db89c24016', 'vamshi', 'krishna');

-- --------------------------------------------------------

--
-- Table structure for table `user_score`
--

CREATE TABLE IF NOT EXISTS `user_score` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `date` varchar(25) NOT NULL,
  `ans_array` varchar(100) NOT NULL,
  `ques_array` varchar(100) NOT NULL,
  `score` varchar(10) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_score`
--

INSERT INTO `user_score` (`username`, `date`, `ans_array`, `ques_array`, `score`) VALUES
('2', '2014-02-14 05:50:11', '1 1 1 1', '1 2 3 4', '100'),
('adimn', '2014-02-12 09:12:32', '1 0 1 1', '1 2 3 4', '75'),
('Asdf adsf ', '2014-02-12 08:29:56', '1 1 1 1', '1 2 3 4', '100'),
('hahaha', '2014-02-13 21:37:47', '0 1 0 0', '1 2 3 4', '25'),
('suarez', '2014-02-12 13:38:24', '1 1 0 0', '1 2 3 4', '50'),
('vamshi', '2014-02-14 18:13:25', '0 1 1 1', '1 2 3 4', '75'),
('vinodh', '2014-02-12 13:40:38', '1 1 0 0', '1 2 3 4', '50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
