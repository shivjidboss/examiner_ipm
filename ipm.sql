-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2017 at 09:53 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ipm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_det`
--

CREATE TABLE IF NOT EXISTS `admin_det` (
  `userid` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `authority` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_det`
--

INSERT INTO `admin_det` (`userid`, `password`, `authority`) VALUES
('admin', 'adminpass', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `content_det`
--

CREATE TABLE IF NOT EXISTS `content_det` (
  `username` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course` varchar(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course`) VALUES
('be'),
('btech');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` varchar(15) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `practise_test`
--

CREATE TABLE IF NOT EXISTS `practise_test` (
  `course` varchar(20) NOT NULL,
  `trade` varchar(20) NOT NULL,
  `syllabus` varchar(20) NOT NULL,
  `nosubject` varchar(20) NOT NULL DEFAULT '0',
  `noq` int(5) NOT NULL,
  `duration` int(20) NOT NULL,
  `status` int(2) NOT NULL,
  `sub1` varchar(20) DEFAULT NULL,
  `sub2` varchar(20) DEFAULT NULL,
  `sub3` varchar(20) DEFAULT NULL,
  `sub4` varchar(20) DEFAULT NULL,
  `sub5` varchar(20) DEFAULT NULL,
  `sub6` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practise_test`
--

INSERT INTO `practise_test` (`course`, `trade`, `syllabus`, `nosubject`, `noq`, `duration`, `status`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`) VALUES
('btech', 'ec', 's7', '2', 2, 50, 1, 'aet', 'dsp', 'null', 'null', 'null', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `qnid`
--

CREATE TABLE IF NOT EXISTS `qnid` (
  `enable` int(11) NOT NULL DEFAULT '1',
  `qnid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qnsbank`
--

CREATE TABLE IF NOT EXISTS `qnsbank` (
  `qnid` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `qpid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `qntxt` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `op1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `op2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `op3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `op4` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ans` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mark` int(11) NOT NULL,
  `negmark` int(11) NOT NULL,
  `fullans` text COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `trade` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `syllabus` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnsbank`
--

INSERT INTO `qnsbank` (`qnid`, `qpid`, `qntxt`, `op1`, `op2`, `op3`, `op4`, `ans`, `mark`, `negmark`, `fullans`, `course`, `trade`, `syllabus`, `subject`) VALUES
('qn0000000001', 'qp00000001', 'à´•à´³àµà´Ÿàµ‡à´¤àµ à´ªàµ‹à´²àµ† à´¤à´¨à´¤à´¾à´¯ à´µàµà´¯à´•àµà´¤à´¿à´¤àµà´µà´‚ à´‰à´³àµà´³à´¤à´¿à´¨à´¾à´²à´¾à´£àµ. à´®à´²à´¯à´¾à´³ à´­à´¾à´·à´¯àµà´Ÿàµ† à´‰à´²àµà´ªà´¤àµà´¤à´¿à´¯àµà´‚ à´ªàµà´°à´¾à´šàµ€à´¨à´¤à´¯àµà´‚ à´¸à´‚à´¬à´¨àµà´§à´¿à´šàµà´š à´•à´¾à´°àµà´¯à´™àµà´™àµ¾ à´‡à´¨àµà´¨àµà´‚ à´…à´µàµà´¯', 'ans', 'no', 'no', 'no', 'Option 1', 5, 1, 'notworkedout', 'btech', 'ec', 's7', 'aet'),
('qn0000000002', 'qp00000001', 'question 2 aet', 'no', 'yea', 'no', 'no', 'Option 2', 5, 1, 'notworkedout', 'btech', 'ec', 's7', 'aet'),
('qn0000000003', 'qp00000001', 'question 3 aet', 'no', 'no', 'yes', 'no', 'Option 3', 5, 1, 'notworkedout', 'btech', 'ec', 's7', 'aet'),
('qn0000000004', 'qp00000002', '\\[\r\n  1 +  \\frac{q^2}{(1-q)}+\\frac{q^6}{(1-q)(1-q^2)}+\\cdots =\r\n    \\prod_{j=0}^{\\infty}\\frac{1}{(1-q^{5j+2})(1-q^{5j+3})},\r\n     \\quad\\quad \\text{for $|q|<1$}.\r\n\\]', 'mo', 'mo', 'no', 'yes', 'Option 4', 5, 1, 'notworkedout', 'btech', 'ec', 's7', 'dsp'),
('qn0000000005', 'qp00000002', 'question 2 dsp', 'ys', 'no', 'no', 'no', 'Option 1', 10, 3, 'notworkedout', 'btech', 'ec', 's7', 'dsp'),
('qn0000000006', 'qp00000002', 'question 3dsp', 'ni', 'no', 'answer', 'no', 'Option 3', 10, 2, 'notworkedout', 'btech', 'ec', 's7', 'dsp'),
('qn0000000007', 'qp00000003', 'question 1 cs', 'no', 'no', 'no', 'ans', 'Option 4', 15, 3, 'notworkedout', 'btech', 'ec', 's7', 'cs'),
('qn0000000008', 'qp00000003', 'question 2 cs', 'no', 'yes', 'no', 'no', 'Option 2', 15, 3, 'notworkedout', 'btech', 'ec', 's7', 'cs'),
('qn0000000009', 'qp00000003', 'question 3 cs', 'no', 'no', 'no', 'yes', 'Option 4', 15, 3, 'notworkedout', 'btech', 'ec', 's7', 'cs');

-- --------------------------------------------------------

--
-- Table structure for table `qpbank`
--

CREATE TABLE IF NOT EXISTS `qpbank` (
  `qpid` varchar(10) NOT NULL,
  `qpname` varchar(25) NOT NULL,
  `noqs` int(11) NOT NULL,
  `dur` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `course` varchar(15) NOT NULL,
  `trade` varchar(50) NOT NULL,
  `syllabus` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `negate` tinyint(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpbank`
--

INSERT INTO `qpbank` (`qpid`, `qpname`, `noqs`, `dur`, `status`, `course`, `trade`, `syllabus`, `subject`, `negate`, `timestamp`) VALUES
('qp00000001', 'test 1', 3, 5, 1, 'btech', 'ec', 's7', 'aet', 1, '2017-01-21 10:41:12'),
('qp00000002', 'test2', 3, 5, 1, 'btech', 'ec', 's7', 'dsp', 0, '2017-01-21 10:42:57'),
('qp00000003', 'test3', 3, 5, 1, 'btech', 'ec', 's7', 'cs', 0, '2017-01-21 10:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `random_sub`
--

CREATE TABLE IF NOT EXISTS `random_sub` (
  `course` varchar(15) NOT NULL,
  `trade` varchar(15) NOT NULL,
  `syllabus` varchar(15) NOT NULL,
  `subject` varchar(15) NOT NULL,
  `noq` int(10) NOT NULL,
  `duration` int(10) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `random_sub`
--

INSERT INTO `random_sub` (`course`, `trade`, `syllabus`, `subject`, `noq`, `duration`, `active`) VALUES
('btech', 'ec', 's7', 'aet', 2, 5, 1),
('btech', 'ec', 's7', 'dsp', 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `userid` varchar(100) NOT NULL,
  `tock` varchar(100) NOT NULL,
  `usr_ip` varchar(50) NOT NULL,
  `expiry` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`userid`, `tock`, `usr_ip`, `expiry`, `timestamp`) VALUES
('ipm000001', '0782ed052991782b944c9fb509c039d0523fc23d', '192.168.1.10', '0', '2017-01-26 09:47:04'),
('ipm000001', '8a0c77c6c445867660d976f409c3edb1d97a5427', '192.168.1.10', '0', '2017-01-26 09:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `course` varchar(15) NOT NULL,
  `trade` varchar(20) NOT NULL,
  `syllabus` varchar(20) NOT NULL,
  `subject` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`course`, `trade`, `syllabus`, `subject`) VALUES
('btech', 'ec', 's7', 'aet'),
('btech', 'ec', 's7', 'dsp'),
('btech', 'ec', 's7', 'cs'),
('be', 'cse', 's5', 'ip');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE IF NOT EXISTS `syllabus` (
  `course` varchar(20) NOT NULL,
  `trade` varchar(20) NOT NULL,
  `syllabus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`course`, `trade`, `syllabus`) VALUES
('btech', 'ec', 's7'),
('be', 'cse', 's5');

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE IF NOT EXISTS `trade` (
  `course` varchar(15) NOT NULL,
  `trade` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trade`
--

INSERT INTO `trade` (`course`, `trade`) VALUES
('btech', 'ec'),
('be', 'cse');

-- --------------------------------------------------------

--
-- Table structure for table `user_det`
--

CREATE TABLE IF NOT EXISTS `user_det` (
  `username` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `addr` varchar(500) NOT NULL,
  `institute` varchar(200) NOT NULL,
  `course` varchar(20) NOT NULL,
  `trade` varchar(20) NOT NULL,
  `syllabus` varchar(20) DEFAULT NULL,
  `imgid` varchar(100) NOT NULL,
  `totalqp` int(10) NOT NULL,
  `mark` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_det`
--

INSERT INTO `user_det` (`username`, `password`, `name`, `sex`, `dob`, `email`, `phone`, `addr`, `institute`, `course`, `trade`, `syllabus`, `imgid`, `totalqp`, `mark`) VALUES
('ipm000001', '123', 'VAISAKH ANAND', 'm', '1995-06-11', 'vaisakh032@gmail.com', '8547105747', 'CHANDARARAMAM, CHAVADINADA\r\nKATTACHALKUZHI, BALARAMAPURAM', 'LMCST', 'btech', 'ec', 's7', 'ipm000001.jpg', 28, 72),
('ipm000002', 'password', 'Shivji Ayyappan', 'm', '1995-10-14', 'shivji7448@gmail.com', '9400423739', 'Sannidhi, VRA-76, Vlangamuri, Neyyattinkara', 'Narayanaguru Siddhartha College Of Engineering', 'be', 'cse', 's5', 'noimgid', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_det`
--
ALTER TABLE `admin_det`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `content_det`
--
ALTER TABLE `content_det`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnid`
--
ALTER TABLE `qnid`
  ADD PRIMARY KEY (`enable`);

--
-- Indexes for table `qnsbank`
--
ALTER TABLE `qnsbank`
  ADD PRIMARY KEY (`qnid`);

--
-- Indexes for table `qpbank`
--
ALTER TABLE `qpbank`
  ADD PRIMARY KEY (`qpid`);

--
-- Indexes for table `user_det`
--
ALTER TABLE `user_det`
  ADD PRIMARY KEY (`username`), ADD UNIQUE KEY `username` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
