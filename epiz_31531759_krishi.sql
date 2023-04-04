-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql113.byetcluster.com
-- Generation Time: Dec 13, 2022 at 08:57 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31531759_krishi`
--

-- --------------------------------------------------------

--
-- Table structure for table `Ap_history`
--

CREATE TABLE `Ap_history` (
  `auction_id` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `paid` varchar(3) NOT NULL,
  `item_recived` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ap_history`
--

INSERT INTO `Ap_history` (`auction_id`, `amount`, `paid`, `item_recived`) VALUES
(26, 28651, 'No', 'No'),
(23, 5780, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `auction_id` bigint(20) NOT NULL,
  `product` varchar(25) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `fa_id` int(11) NOT NULL,
  `cu_id` int(11) NOT NULL,
  `blocked_amt` bigint(20) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auction_id`, `product`, `weight`, `fa_id`, `cu_id`, `blocked_amt`, `date`) VALUES
(12, 'Cotton', 1, 1014, 1025, 17176, '2022-07-08'),
(13, 'Cotton', NULL, 1014, 0, 0, NULL),
(14, 'Cotton', NULL, 1014, 0, 0, NULL),
(15, 'Cotton', NULL, 1014, 0, 0, NULL),
(16, 'Maize', NULL, 1014, 0, 0, NULL),
(17, 'Wheat', 100, 1015, 1026, 2100055, '2022-07-08'),
(18, 'Wheat', NULL, 1015, 0, 0, NULL),
(19, 'Wheat', NULL, 1015, 0, 0, NULL),
(20, 'Wheat', NULL, 1015, 0, 0, NULL),
(21, 'Wheat', NULL, 1016, 0, 0, NULL),
(22, 'Wheat', NULL, 1016, 0, 0, NULL),
(23, 'Wheat', 2, 1014, 1026, 5780, '2022-07-09'),
(24, 'Wheat', NULL, 1014, 0, 0, NULL),
(25, 'Cotton', NULL, 1014, 0, 0, NULL),
(26, 'Cotton', 5, 1016, 1026, 28651, '2022-07-08'),
(27, 'Wheat', NULL, 1018, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customersignup`
--

CREATE TABLE `customersignup` (
  `uid` int(11) NOT NULL,
  `type` varchar(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `pan_card_no` varchar(10) NOT NULL,
  `pan_card_img` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `profile_pic` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customersignup`
--

INSERT INTO `customersignup` (`uid`, `type`, `name`, `phone`, `pan_card_no`, `pan_card_img`, `password`, `address`, `profile_pic`) VALUES
(1025, 'CU', 'Anushree Bardia', 7877816933, 'PAND1234W', 'cid_img/pan.jpg', 'c55561e4c690d2902a83aef26424cf45cc833a53', '401 1st d road sardarpura', 'profile/2.png'),
(1026, 'CU', 'Sankhla', 9928999456, 'PEQPE9999A', 'cid_img/pan-card-500x500.jpg', '8d77eac7f1b258a6f8d9c7ffa43225ece09c69cb', 'gopi bera, mandore,jodhpur,rajasthan', 'profile/istockphoto-1270067126-612x612.jpg'),
(1027, 'CU', 'Ojha', 9784791444, 'ARYA12345N', 'cid_img/pan-card-data-entry-work-500x500.jpg', 'a028f0a9b77cb97135529fea7171a4be47dd17ef', 'ummed chowk near clock tower', 'profile/'),
(1028, 'CU', 'Bissa', 6376466860, 'RJCD46686A', 'cid_img/images.jpg', 'c90216d72f0a429878763dc35d850bfc44ed3920', 'Kheme ka kua, shubawton ki dhani, near victorian palace', 'profile/main-thumb-474016763-200-itnxbpofvcvscxcyu'),
(1029, 'CU', 'sagar', 9680595947, '9680595947', 'cid_img/aayush pic.png', '686bbd7f5a7855c0eaf2875507208ab0ba577db4', 'sagar', 'profile/'),
(1030, 'CU', 'abhishek', 1234567895, '1235645487', 'cid_img/dayOne.png', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'abhbcjhbsdvujhdj', 'profile/dayOne.png'),
(1031, 'CU', 'abhishek', 9928999455, '9928999455', 'cid_img/dayOne.png', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'a', 'profile/Screenshot 2022-10-18 212813.png');

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `sno` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `product` varchar(30) NOT NULL,
  `p_img` varchar(50) NOT NULL,
  `rating` varchar(2) NOT NULL,
  `review` varchar(1000) DEFAULT NULL,
  `farmer_rating` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`sno`, `uid`, `product`, `p_img`, `rating`, `review`, `farmer_rating`) VALUES
(26, 1016, 'Cotton', '/product_img/US-Cotton.jpg', '10', 'The micronaire of a given sample of cotton is affected by both genetics and environmental factors during the growing season.\r\n\r\n When comparing samples of cotton of the same growth, differences in micronaire reflect differences in maturity. However, when comparing samples of different growths but similar levels of maturity, differences in micronaire reflect differences in fineness.\r\n\r\n For producers, micronaire can assist in the comparison of seed varieties.\r\n\r\n For trading, it is used as an easy and reliable guide regarding the combination of fineness and maturity.\r\n\r\n For spinners, fineness is crucial in predicting the spinnability of cotton and the fineness, evenness and strength of the yarn that might be produced from it.\r\n\r\n Micronaire is important to predict the dyeability, fiber neps and the appearance of yarn and fabric.', 10),
(27, 1015, 'Sorghum', '/product_img/sorghum-800x800.jpg', '8', 'Final Report is good and can be used in cooking. this is dervided by the following:\r\nSorghum pasting properties were determined using a Rapid Visco Analyser (RVA, Super3, Newport Scientific, Warriewood, Australia). Flour (3.00â€‰g, based on 12% moisture) was mixed with 25â€‰g of distilled water in an RVA sample canister. The RVA was run using Thermocline for Windows software (Version 1.2). The Rice Method 1 program was used with heating and cooling cycle set as follows: (1) holding at 50Â°C for 1â€‰min, (2) heated to 95Â°C in 3.8â€‰min, (3) holding at 95Â°C for 2.5â€‰min, (4) cooling to 50Â°C in 3.8â€‰min, and (5) holding at 50Â°C in 1.4â€‰min. The pasting temperature (PT), peak viscosity (PV), breakdown (BD), and setback (SB) were recorded form the Thermocline for Windows software (Version 1.2', 9),
(28, 1016, 'Wheat', '/product_img/wheatbl.jpg', '9', ' Near infrared (NIR) analysis uses a spectroscopic technique, directing near infrared light onto grain samples. This penetrates deep into the grain but does not affect it in any way and prevents the need for grinding a sample. The device reads the light reflected from the grain sample, which indicates its absorbent qualities.  \r\n\r\nIt translates this into readable, measurable data. The method is highly accurate and rapid, giving results in seconds.  \r\n\r\nAll the data is cloud-based, making it easy for users to access it instantly through smartphones or other mobile devices. \r\n\r\n The amount of grain required for analysis is only small.  This minimises the impact of testing on the entire wheat crop. ', 9),
(32, 1018, 'Wheat', '/product_img/aayush pic.jpeg', '10', 'good', 10),
(33, 1018, ' Pearl millet', '/product_img/aayush pic.png', '10', 'very good', 8),
(30, 1014, 'Cotton', '/product_img/US-Cotton.jpg', '9', 'The micronaire of a given sample of cotton is affected by both genetics and environmental factors during the growing season.\r\n\r\n When comparing samples of cotton of the same growth, differences in micronaire reflect differences in maturity. However, when comparing samples of different growths but similar levels of maturity, differences in micronaire reflect differences in fineness.\r\n\r\n For producers, micronaire can assist in the comparison of seed varieties.\r\n\r\n For trading, it is used as an easy and reliable guide regarding the combination of fineness and maturity.\r\n\r\n For spinners, fineness is crucial in predicting the spinnability of cotton and the fineness, evenness and strength of the yarn that might be produced from it.\r\n\r\n Micronaire is important to predict the dyeability, fiber neps and the appearance of yarn and fabric.\r\n', 10),
(31, 1014, 'Sorghum', '/product_img/sorghum-800x800.jpg', '5', 'Final Report is good and can be used in cooking. this is dervided by the following:\r\nSorghum pasting properties were determined using a Rapid Visco Analyser (RVA, Super3, Newport Scientific, Warriewood, Australia). Flour (3.00â€‰g, based on 12% moisture) was mixed with 25â€‰g of distilled water in an RVA sample canister. The RVA was run using Thermocline for Windows software (Version 1.2). The Rice Method 1 program was used with heating and cooling cycle set as follows: (1) holding at 50Â°C for 1â€‰min, (2) heated to 95Â°C in 3.8â€‰min, (3) holding at 95Â°C for 2.5â€‰min, (4) cooling to 50Â°C in 3.8â€‰min, and (5) holding at 50Â°C in 1.4â€‰min. The pasting temperature (PT), peak viscosity (PV), breakdown (BD), and setback (SB) were recorded form the Thermocline.', 8);

-- --------------------------------------------------------

--
-- Table structure for table `farmersignup`
--

CREATE TABLE `farmersignup` (
  `uid` int(11) NOT NULL,
  `type` varchar(2) NOT NULL,
  `name` varchar(45) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `krishi_id_no` bigint(12) NOT NULL,
  `krishi_img` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `profile_pic` varchar(70) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmersignup`
--

INSERT INTO `farmersignup` (`uid`, `type`, `name`, `phone`, `krishi_id_no`, `krishi_img`, `password`, `address`, `profile_pic`) VALUES
(1013, 'FA', 'Anushree ', 7877816933, 917877816933, 'kid_img/Bank.jpg', 'c55561e4c690d2902a83aef26424cf45cc833a53', '401 1st d road sardarpura', 'profile/'),
(1014, 'FA', 'Abhishek', 9983899998, 998389999809, 'kid_img/images.jpg', '0731fdeb307910eeaae4e58897b7baaba45e054b', 'Bhwala Bera , Mandore , Jodhpur', 'profile/download.jpg'),
(1015, 'FA', 'Aryan', 9784791444, 978479144403, 'kid_img/krishi id card.jpg', 'c3e5db4de3e2d675aed3343eaef3ac6483f56f3e', 'ummed chowk near clock tower', 'profile/'),
(1016, 'FA', 'Abhay', 6376466860, 637646686099, 'kid_img/download.jpg', 'c90216d72f0a429878763dc35d850bfc44ed3920', 'kheme ka kua,shubawton ki dhani,plot no.38', 'profile/main-thumb-474016763-200-itnxbpofvcvscxcyunntzqdinqqvbhnd.jpeg'),
(1017, 'FA', 'devendra signgh', 9928999456, 998389994561, 'kid_img/download.jpg', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'a', 'profile/pan.jpg'),
(1018, 'FA', 'sagar', 1234543211, 123454321111, 'kid_img/aayush pic.png', '686bbd7f5a7855c0eaf2875507208ab0ba577db4', 'sagar', 'profile/aayush pic.jpeg'),
(1019, 'FA', 'abhishek', 9928999451, 992899945123, 'kid_img/dayOne.png', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'abhbcjhbsdvujhdj', 'profile/Screenshot 2022-10-18 212813.png'),
(1020, 'FA', 'farmer_001', 6376466401, 637646640121, 'kid_img/Screenshot (27).png', 'c90216d72f0a429878763dc35d850bfc44ed3920', 'mohali,punjab', 'profile/');

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `sno` int(11) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `farmersprice` bigint(20) NOT NULL,
  `measurement` varchar(12) NOT NULL,
  `weight` int(11) NOT NULL,
  `verified` varchar(3) NOT NULL,
  `auctioning` varchar(3) DEFAULT NULL,
  `totalrs` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`sno`, `uid`, `name`, `p_id`, `rating`, `farmersprice`, `measurement`, `weight`, `verified`, `auctioning`, `totalrs`) VALUES
(48, 1017, 'devendra signgh', 100, 0, 2000, 'quin', 1, 'no', 'no', 2000),
(50, 1018, 'sagar', 100, 10, 2020, 'quin', 20, 'yes', 'yes', 40400),
(40, 1015, 'Aryan', 101, 8, 2800, 'quin', 100, 'yes', 'no', 280000),
(38, 1015, 'Aryan', 107, 0, 7400, 'quin', 100, 'no', 'no', 740000),
(37, 1015, 'Aryan', 105, 0, 7400, 'quin', 100, 'no', 'no', 740000),
(49, 1013, 'Anushree ', 100, 0, 56, 'quin', 20, 'no', 'no', 1120),
(20, 1013, 'Anushree ', 103, 0, 2800, 'quin', 107, 'no', 'no', 299600),
(21, 1013, 'Anushree ', 106, 0, 5350, 'quin', 84, 'no', 'no', 449400),
(36, 1015, 'Aryan', 102, 0, 1650, 'quin', 100, 'no', 'no', 165000),
(23, 1013, 'Anushree ', 109, 0, 5900, 'quin', 23, 'no', 'no', 135700),
(43, 1016, 'Abhay', 108, 10, 5730, 'quin', 5, 'yes', 'yes', 28650),
(33, 1014, 'Abhishek', 107, 0, 7000, 'quin', 5, 'no', 'no', 35000),
(41, 1016, 'Abhay', 100, 7, 2020, 'quin', 10, 'yes', 'yes', 20200),
(42, 1016, 'Abhay', 104, 0, 1900, 'quin', 10, 'no', 'no', 19000),
(45, 1014, 'Abhishek', 101, 5, 2738, 'quin', 4, 'no', 'no', 10952),
(46, 1014, 'Abhishek', 108, 9, 5725, 'quin', 1, 'yes', 'yes', 5725),
(47, 1015, 'Aryan', 108, 0, 5800, 'quin', 10, 'no', 'no', 58000),
(51, 1018, 'sagar', 103, 10, 2000, 'quin', 10, 'yes', 'no', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `msp`
--

CREATE TABLE `msp` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_hindiname` varchar(20) NOT NULL,
  `p_pic` varchar(50) NOT NULL,
  `msp` int(11) NOT NULL,
  `mspkg` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msp`
--

INSERT INTO `msp` (`p_id`, `p_name`, `p_hindiname`, `p_pic`, `msp`, `mspkg`) VALUES
(100, 'Wheat', 'gehoon', 'product/wheat.jpg', 2015, 20.15),
(101, 'Sorghum', 'jowar', 'product/jawar.jpg', 2738, 27.38),
(102, 'Barley', 'jau', 'product/barley.jpg', 1635, 16.35),
(103, ' Pearl millet', 'baajara', 'product/bajra.jpg', 2250, 22.5),
(104, 'Maize', 'makka', 'product/maize.jpg', 1870, 18.7),
(105, 'Lune', 'moong', 'product/moong.jpg', 7275, 72.75),
(106, 'Rapeseed', 'rye', 'product/mustard.jpg', 5050, 50.5),
(107, 'Sesamum', 'til', 'product/til.jpg', 7307, 73.07),
(108, 'Cotton', 'kachcha kapaas', 'product/cotton.jpg', 5725, 57.25),
(109, 'Groundnut', 'moongaphalee', 'product/groundnut.jpg', 5550, 55.5);

-- --------------------------------------------------------

--
-- Table structure for table `tempdata`
--

CREATE TABLE `tempdata` (
  `auction_id` int(11) NOT NULL,
  `cu_id` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `fa_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempdata`
--

INSERT INTO `tempdata` (`auction_id`, `cu_id`, `amount`, `pid`, `fa_id`) VALUES
(17, 1025, 2110, 100, 1015),
(12, 1025, 1, 108, 1014),
(12, 1025, 2, 108, 1014),
(12, 1025, 5726, 108, 1014),
(12, 1025, 5727, 108, 1014),
(17, 1027, 2200, 100, 1015),
(12, 1025, 5728, 108, 1014),
(12, 1025, 5729, 108, 1014),
(12, 1025, 17176, 108, 1014),
(17, 1026, 210001, 100, 1015),
(17, 1026, 210002, 100, 1015),
(17, 1026, 2100055, 100, 1015),
(23, 1026, 5726, 100, 1014),
(23, 1026, 5727, 100, 1014),
(23, 1026, 5728, 100, 1014),
(23, 1026, 5729, 100, 1014),
(23, 1026, 5730, 100, 1014),
(23, 1026, 5731, 100, 1014),
(23, 1026, 5732, 100, 1014),
(23, 1026, 5733, 100, 1014),
(23, 1026, 5734, 100, 1014),
(23, 1026, 5735, 100, 1014),
(23, 1026, 5736, 100, 1014),
(26, 1026, 28650, 108, 1016),
(26, 1026, 28651, 108, 1016),
(23, 1025, 5737, 100, 1014),
(23, 1025, 5738, 100, 1014),
(23, 1025, 5739, 100, 1014),
(23, 1026, 5740, 100, 1014),
(23, 1026, 5780, 100, 1014),
(26, 1029, 28652, 108, 1016);

-- --------------------------------------------------------

--
-- Table structure for table `try11`
--

CREATE TABLE `try11` (
  `Name` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `type` varchar(2) NOT NULL,
  `name` varchar(45) NOT NULL,
  `account_no` varchar(25) NOT NULL,
  `ifsc` varchar(11) NOT NULL,
  `Wallet_Amount` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `uid`, `type`, `name`, `account_no`, `ifsc`, `Wallet_Amount`) VALUES
(5021, 1013, 'FA', 'Anushree ', '84291359760', 'azbxc123678', 2263),
(5022, 1014, 'FA', 'Abhishek', '919928999456', 'paytm012345', 34453),
(5023, 1015, 'FA', 'Aryan', '40143732002', 'SBIN0002002', 10000),
(5024, 1025, 'CU', 'Anushree Bardia', '27849017361', 'innxrd27901', 1008141),
(5025, 1026, 'CU', 'Sankhla', '919928999455', 'icic0123455', 371310),
(5026, 1027, 'CU', 'Ojha', '40143732002', 'SBIN0002002', 10000),
(5027, 1028, 'CU', 'Bissa', '', '', 0),
(5028, 1016, 'FA', 'Abhay', '', '', 0),
(5029, 1017, 'FA', 'devendra signgh', 'paytm123456', 'abhishek', 0),
(5030, 1029, 'CU', 'sagar', '8765432123', 'paytm1234', 21848),
(5031, 1018, 'FA', 'sagar', '', '', 0),
(5032, 1019, 'FA', 'abhishek', '', '', 0),
(5033, 1020, 'FA', 'farmer_001', '1234567891', 'ICICI123451', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Wallet_tt`
--

CREATE TABLE `Wallet_tt` (
  `Transaction_Number` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `type` varchar(2) NOT NULL,
  `wallet_id` bigint(20) NOT NULL,
  `Transaction_Amount` bigint(20) NOT NULL,
  `Total_Amount` bigint(20) NOT NULL,
  `Transaction_Action` varchar(25) NOT NULL,
  `Transaction_date` datetime DEFAULT NULL,
  `Sign` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Wallet_tt`
--

INSERT INTO `Wallet_tt` (`Transaction_Number`, `uid`, `type`, `wallet_id`, `Transaction_Amount`, `Total_Amount`, `Transaction_Action`, `Transaction_date`, `Sign`) VALUES
(10077, 1014, 'FA', 5022, 100, 0, 'Add Money', '2022-07-08 01:23:32', '+'),
(10078, 1014, 'FA', 5022, 50, 100, 'Add Money', '2022-07-08 01:23:42', '+'),
(10079, 1014, 'FA', 5022, 200, 150, 'Add Money', '2022-07-08 01:23:48', '+'),
(10080, 1014, 'FA', 5022, 100, 350, 'Withdraw Money', '2022-07-08 01:23:53', '-'),
(10081, 1014, 'FA', 5022, 250, 250, 'Withdraw Money', '2022-07-08 01:23:59', '-'),
(10082, 1014, 'FA', 5022, 500, 0, 'Add Money', '2022-07-08 01:24:05', '+'),
(10083, 1014, 'FA', 5022, 300, 500, 'Withdraw Money', '2022-07-08 01:24:32', '-'),
(10084, 1014, 'FA', 5022, 200, 200, 'Withdraw Money', '2022-07-08 01:24:39', '-'),
(10085, 1014, 'FA', 5022, 101, 0, 'Add Money', '2022-07-08 01:25:35', '+'),
(10086, 1026, 'CU', 5025, 10, 0, 'Add Money', '2022-07-08 01:47:42', '+'),
(10087, 1026, 'CU', 5025, 100, 10, 'Add Money', '2022-07-08 01:47:50', '+'),
(10088, 1026, 'CU', 5025, 90, 110, 'Add Money', '2022-07-08 01:48:02', '+'),
(10089, 1026, 'CU', 5025, 100, 200, 'Withdraw Money', '2022-07-08 01:48:12', '-'),
(10090, 1026, 'CU', 5025, 50, 100, 'Withdraw Money', '2022-07-08 01:48:20', '-'),
(10091, 1026, 'CU', 5025, 1000, 50, 'Add Money', '2022-07-08 01:48:28', '+'),
(10092, 1026, 'CU', 5025, 500, 1050, 'Withdraw Money', '2022-07-08 01:49:00', '-'),
(10093, 1015, 'FA', 5023, 100, 0, 'Add Money', '2022-07-08 01:56:20', '+'),
(10094, 1015, 'FA', 5023, 20, 100, 'Withdraw Money', '2022-07-08 01:57:11', '-'),
(10095, 1015, 'FA', 5023, 10080, 80, 'Add Money', '2022-07-08 01:58:23', '+'),
(10096, 1015, 'FA', 5023, 160, 10160, 'Withdraw Money', '2022-07-08 01:58:38', '-'),
(10097, 1013, 'FA', 5021, 1200, 0, 'Add Money', '2022-07-08 01:59:27', '+'),
(10098, 1027, 'CU', 5026, 10000, 0, 'Add Money', '2022-07-08 02:04:40', '+'),
(10099, 1027, 'CU', 5026, 5000, 10000, 'Withdraw Money', '2022-07-08 02:04:51', '-'),
(10100, 1027, 'CU', 5026, 100000, 5000, 'Add Money', '2022-07-08 02:05:01', '+'),
(10101, 1013, 'FA', 5021, 250, 1200, 'Withdraw Money', '2022-07-08 02:05:03', '-'),
(10102, 1013, 'FA', 5021, 354, 950, 'Withdraw Money', '2022-07-08 02:05:08', '-'),
(10103, 1013, 'FA', 5021, 1000, 596, 'Add Money', '2022-07-08 02:05:12', '+'),
(10104, 1013, 'FA', 5021, 789, 1596, 'Withdraw Money', '2022-07-08 02:05:20', '-'),
(10105, 1027, 'CU', 5026, 95000, 105000, 'Withdraw Money', '2022-07-08 02:05:24', '-'),
(10106, 1013, 'FA', 5021, 1456, 807, 'Add Money', '2022-07-08 02:05:27', '+'),
(10107, 1025, 'CU', 5024, 1450, 0, 'Add Money', '2022-07-08 02:07:08', '+'),
(10108, 1025, 'CU', 5024, 245, 1450, 'Withdraw Money', '2022-07-08 02:07:24', '-'),
(10109, 1025, 'CU', 5024, 6880, 1205, 'Add Money', '2022-07-08 02:07:28', '+'),
(10111, 1025, 'CU', 5024, 1000000, 297, 'Add Money', '2022-07-08 02:46:42', '+'),
(10128, 1017, 'FA', 5029, 150, 150, 'Withdraw Money', '2022-07-12 21:12:46', '-'),
(10129, 1029, 'CU', 5030, 1000, 0, 'Add Money', '2022-09-02 10:10:55', '+'),
(10130, 1029, 'CU', 5030, 500, 1000, 'Withdraw Money', '2022-09-02 10:11:05', '-'),
(10131, 1029, 'CU', 5030, 50000, 500, 'Add Money', '2022-09-02 10:11:15', '+'),
(10132, 1020, 'FA', 5033, 10, 0, 'Add Money', '2022-12-05 10:31:13', '+'),
(10133, 1020, 'FA', 5033, 5, 10, 'Withdraw Money', '2022-12-05 10:31:24', '-'),
(10127, 1017, 'FA', 5029, 50, 100, 'Add Money', '2022-07-12 21:12:27', '+'),
(10126, 1017, 'FA', 5029, 100, 0, 'Add Money', '2022-07-12 21:12:15', '+'),
(10125, 1026, 'CU', 5025, 5780, 342659, 'Debit Auction Amount', '2022-07-09 10:10:00', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Ap_history`
--
ALTER TABLE `Ap_history`
  ADD PRIMARY KEY (`auction_id`);

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`auction_id`);

--
-- Indexes for table `customersignup`
--
ALTER TABLE `customersignup`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `pan_card_no` (`pan_card_no`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `farmersignup`
--
ALTER TABLE `farmersignup`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `krishi_id_no` (`krishi_id_no`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `msp`
--
ALTER TABLE `msp`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- Indexes for table `Wallet_tt`
--
ALTER TABLE `Wallet_tt`
  ADD PRIMARY KEY (`Transaction_Number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `auction_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `customersignup`
--
ALTER TABLE `customersignup`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1032;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `farmersignup`
--
ALTER TABLE `farmersignup`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1021;

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `msp`
--
ALTER TABLE `msp`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5034;

--
-- AUTO_INCREMENT for table `Wallet_tt`
--
ALTER TABLE `Wallet_tt`
  MODIFY `Transaction_Number` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
