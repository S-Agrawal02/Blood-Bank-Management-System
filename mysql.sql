-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2017 at 02:09 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptor`
--

CREATE TABLE IF NOT EXISTS `acceptor` (
  `fname` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `bg` varchar(4) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `add` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cno` bigint(12) NOT NULL,
  `password` varchar(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acceptor`
--

INSERT INTO `acceptor` (`fname`, `age`, `gender`, `bg`, `cname`, `add`, `email`, `cno`, `password`, `id`) VALUES
('Shubham Agrawal', 20, 'male', 'B+', 'Dr. Manish Patil', 'surat', 'shubhamagrawal2010@yahoo.in', 9585586246, '123', 'acceptor01'),
('Dev Kumar', 20, 'male', 'O+', 'Dr. Neel Shah', 'ranchi', 'devkumar90990@gmail.com', 9463277896, '123', 'acceptor02'),
('Ninad', 19, 'gender', 'AB+', 'Dr. Varsha Nair', 'Solapur', 'ninadmirajgaonkar@yahoo.com', 9446500144, '123', 'acceptor03'),
('maha', 18, 'male', 'A+', 'CF', 'JRG', 'SRIRAM@GMAIL.COM', 987654329, '123', 'donor(main'),
('maha', 18, 'male', 'A+', 'CF', 'JRG', 'SRIRAM@GMAIL.COM', 987654329, '123', 'donor');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `fname2` varchar(20) NOT NULL,
  `cno2` bigint(12) NOT NULL,
  `email2` varchar(30) NOT NULL,
  `add2` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `fname2`, `cno2`, `email2`, `add2`) VALUES
('admin01', '123', 'Gokul Kanulla', 9003788445, 'gokulkanulla2011@hotmail.com', 'Guntur'),
('admin02', '123', 'Namo Mahadev', 8844656599, 'vituniversity@vit.ac.in', 'Hyderabad'),
('admin03', '123', 'Namo mahadev', 9898778965, 'namomahadev@vit.ac.in', 'guntur');

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock`
--

CREATE TABLE IF NOT EXISTS `blood_stock` (
  `no` int(11) NOT NULL,
  `type` varchar(4) NOT NULL,
  `amount_in_ml` int(4) NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_stock`
--

INSERT INTO `blood_stock` (`no`, `type`, `amount_in_ml`) VALUES
(1, 'A+', 96),
(2, 'A-', 60),
(3, 'B+', 200),
(4, 'B-', 60),
(5, 'AB+', 50),
(6, 'AB-', 50),
(7, 'O+', 80),
(8, 'O-', 60);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE IF NOT EXISTS `donor` (
  `fname1` varchar(20) NOT NULL,
  `age1` int(3) NOT NULL,
  `gender1` varchar(8) NOT NULL,
  `bg1` varchar(4) NOT NULL,
  `add1` varchar(30) NOT NULL,
  `email1` varchar(30) NOT NULL,
  `cno1` bigint(12) NOT NULL,
  `ddate1` date NOT NULL,
  `id1` varchar(10) NOT NULL,
  `pd` varchar(10) NOT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`fname1`, `age1`, `gender1`, `bg1`, `add1`, `email1`, `cno1`, `ddate1`, `id1`, `pd`) VALUES
('Sajal Agrawal', 18, 'male', 'B-', 'surat', 'sajalagrawal@ymail.com', 9377456811, '2016-04-04', 'donor02', '123'),
('Chinmay Chaturvedi', 20, 'male', 'O-', 'Kota', 'chinmaychaturvedi201', 9942138457, '2015-02-17', 'donor01', '123');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `op_date` date NOT NULL,
  `op_stock` int(4) NOT NULL,
  `donor_id` varchar(10) NOT NULL,
  `don_blood` varchar(4) NOT NULL,
  `quan_don` int(4) NOT NULL,
  `acceptor_ID` varchar(10) NOT NULL,
  `accep_blood` varchar(4) NOT NULL,
  `quan_accep` int(4) NOT NULL,
  `cost` int(5) NOT NULL,
  `close_stock` int(4) NOT NULL,
  `close_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`op_date`, `op_stock`, `donor_id`, `don_blood`, `quan_don`, `acceptor_ID`, `accep_blood`, `quan_accep`, `cost`, `close_stock`, `close_date`) VALUES
('2017-05-04', 50, 'donor01', 'O-', 20, '---', '---', 0, 0, 70, '2017-05-04'),
('2017-05-04', 106, '---', '---', 0, 'acceptor01', 'A+', 10, 100, 96, '2017-05-04'),
('2017-05-04', 86, 'donor01', 'A+', 20, '---', '---', 0, 0, 106, '2017-05-04'),
('2017-05-02', 190, 'donor01', 'b+', 10, '---', '---', 0, 0, 200, '2017-05-02'),
('2017-04-18', 50, 'donor01', 'A+', 12, '---', '---', 0, 0, 62, '2017-04-18'),
('2017-04-26', 158, 'donor01', 'B+', 20, '---', '---', 0, 0, 178, '2017-04-26'),
('0000-00-00', 0, '---', '---', 0, '', '', 0, 0, 0, '0000-00-00'),
('2017-04-26', 10, '---', '---', 0, 'acceptor01', 'O+', 20, 200, -10, '2017-04-26'),
('0000-00-00', 0, '---', '---', 0, '', '', 0, 0, 0, '0000-00-00'),
('2017-05-02', 178, 'donor01', 'B+', 50, '---', '---', 0, 0, 228, '2017-05-02'),
('2017-05-02', 178, 'donor01', 'B+', 12, '---', '---', 0, 0, 190, '2017-05-02'),
('0000-00-00', 0, '---', '---', 0, 'acceptor01', '', 0, 0, 0, '0000-00-00'),
('2017-05-04', 70, '---', '---', 0, 'acceptor01', 'O-', 10, 100, 60, '2017-05-04'),
('2017-05-04', 50, 'donor01', 'A-', 30, '---', '---', 0, 0, 80, '2017-05-04'),
('2017-05-04', 80, '---', '---', 0, 'acceptor01', 'A-', 20, 200, 60, '2017-05-04'),
('2017-05-05', 50, 'donor01', 'B-', 20, '---', '---', 0, 0, 70, '2017-05-05'),
('2017-05-05', 70, '---', '---', 0, 'acceptor01', 'B-', 10, 100, 60, '2017-05-05');
