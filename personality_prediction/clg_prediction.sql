-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2022 at 12:23 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clg_prediction`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audible`
--

CREATE TABLE IF NOT EXISTS `tbl_audible` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `adate` varchar(12) NOT NULL,
  `uid` int(10) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `atest` varchar(500) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_audible`
--

INSERT INTO `tbl_audible` (`aid`, `adate`, `uid`, `uname`, `atest`) VALUES
(1, '2021-11-17', 1, 'Anup Kumar', 'This is very interesting @//..');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poll`
--

CREATE TABLE IF NOT EXISTS `tbl_poll` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pdate` varchar(12) NOT NULL,
  `ptime` varchar(12) NOT NULL,
  `uid` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `uphoto` varchar(100) NOT NULL,
  `poll` varchar(500) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_poll`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE IF NOT EXISTS `tbl_question` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(40) NOT NULL,
  `que` mediumtext NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `ans` varchar(10) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`qid`, `category`, `que`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`) VALUES
(1, 'Openness', 'A shopkeeper sold an article for Rs. 2500. If the cost price of the article is 2000, find the profit percent.', '22%', '25%', '27%', '30%', 'B'),
(2, 'Agreeableness', 'The speed of a boat in still water is 5km/hr. If the speed of the boat against the stream is 3 km/hr, what is the speed of the stream?', '1.5 km/hr', '2 km/hr', '2.5 km/hr', '1 km/hr', 'B'),
(3, 'Conscientiousness', 'If January 1, 1996, was Monday, what day of the week was January 1, 1997?', 'Thursday', 'Sunday', 'Friday', 'Wednesday', 'D'),
(4, 'Openness', 'A mother is twice as old as her son. If 20 years ago, the age of the mother was 10 times the age of the son, what is the present age of the mother?', '38 years', '40 years', '45 years', '43 years', 'C'),
(5, 'Agreeableness', 'What is the compound interest on Rs. 2500 for 2 years at rate of interest 4% per annum?', 'Rs. 204', 'Rs. 104', 'Rs. 220', 'Rs. 180', 'A'),
(6, 'Neuroticism', 'What is the average of first five multiples of 12?', '36', '38', '40', '42', 'A'),
(7, 'Extraversion', 'What is the difference in the place value of 5 in the numeral 754853?', '49500', '49950', '45000', '49940', 'B'),
(8, 'Conscientiousness', 'A running man crosses a bridge of length 500 meters in 4 minutes. At what speed he is running?', '9.5 km/s', '8.0 km/s', '7.5 km/s', '8.5 km/s', 'D'),
(9, 'Extraversion', 'A train moving at speed of 80 km/hr crosses a pole in 7 seconds. Find the length of the train.', '150 m', '165 m', '175 m', '170 m', 'C'),
(10, 'Neuroticism', 'A 60 liter mixture of milk and water contains 10% water. How much water must be added to make water 20% in the mixture?', '8 liters', '7.5 liters', '7 liters', '6.5 liters', 'B'),
(11, 'Agreeableness', 'Phrenologists tried to find out about personality by:', 'reading a person’s horoscope', 'feeling a person’s skull', 'looking at a person’s hands', 'asking people questions', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resume`
--

CREATE TABLE IF NOT EXISTS `tbl_resume` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rdate` varchar(12) NOT NULL,
  `uid` int(10) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `ssc` varchar(40) NOT NULL,
  `hssc` varchar(40) NOT NULL,
  `ug` varchar(40) NOT NULL,
  `pg` varchar(40) NOT NULL,
  `extra_curr` varchar(200) NOT NULL,
  `key_skills` varchar(200) NOT NULL,
  `work_exp` varchar(200) NOT NULL,
  `flag` int(2) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_resume`
--

INSERT INTO `tbl_resume` (`rid`, `rdate`, `uid`, `photo`, `uname`, `cname`, `contact`, `email`, `address`, `ssc`, `hssc`, `ug`, `pg`, `extra_curr`, `key_skills`, `work_exp`, `flag`) VALUES
(1, '2021-11-06', 1, '', 'Anup Kumar', 'Anup Kumar', '9579047478', 'anup7ask@gmail.com', 'hj hj h jhjhj ', 'general - 52%', 'Science - 42%', 'BCS - 50%', 'MCA - 70%', 'h jb jhj  hjhj j ', 'yuhyu h  h hjhj hj', 'jn h jhj hj j', 1),
(2, '2021-11-06', 2, '', 'Prem Kumar', 'Prem Kumar', '7766776676', 'prem@gmail.com', 'rahi nagar panch paoli', 'general - 55%', 'Arts - 67%', 'BCom - 56%', 'MCom - 77%', 'bahot kuch kiya hai', 'ha aata hai n mujhe', 'Ab tak kuchh bhi nahi isi liye to...', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE IF NOT EXISTS `tbl_test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `que` varchar(20) NOT NULL,
  `ans` varchar(20) NOT NULL,
  `marks` varchar(20) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`test_id`, `uid`, `uname`, `que`, `ans`, `marks`) VALUES
(1, 1, 'Anup Kumar', '1', 'B', '5'),
(2, 1, 'Anup Kumar', '2', 'C', '0'),
(3, 1, 'Anup Kumar', '3', 'C', '0'),
(4, 1, 'Anup Kumar', '5', 'A', '5'),
(5, 1, 'Anup Kumar', '4', 'A', '0'),
(6, 2, 'Prem Kumar', '2', 'B', '5'),
(7, 2, 'Prem Kumar', '4', 'A', '0'),
(8, 2, 'Prem Kumar', '1', 'B', '5'),
(9, 2, 'Prem Kumar', '3', 'B', '0'),
(11, 2, 'Prem Kumar', '5', 'A', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `udate` varchar(12) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`uid`, `udate`, `uname`, `contact`, `pass`) VALUES
(1, '2021-11-02', 'Anup Kumar', '9579047478', 'a123'),
(2, '2021-11-06', 'Prem Kumar', '7766776676', 'p123');
