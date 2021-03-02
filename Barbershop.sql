-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2021 at 03:22 AM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `Barbershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `age`
--

CREATE TABLE `age` (
  `id` int NOT NULL,
  `age` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`id`, `age`) VALUES
(0, 'minchev 12'),
(1, '12 ic barcr');

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `id` int NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`id`, `date`) VALUES
(1, '08:00'),
(2, '09:00'),
(3, '10:00'),
(4, '11:00'),
(5, '12:00'),
(6, '13:00'),
(7, '14:00'),
(8, '15:00');

-- --------------------------------------------------------

--
-- Table structure for table `haircuts`
--

CREATE TABLE `haircuts` (
  `id` int NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `age` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `haircuts`
--

INSERT INTO `haircuts` (`id`, `name`, `price`, `age`) VALUES
(4, 'mazi ktrum meci', 1000, 1),
(5, 'mazi ktrum poqri', 500, 0),
(6, 'trashi dzum', 1000, 1),
(7, 'mazi ktrum mkratov', 1000, 2),
(8, 'tatoo', 2000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hairdressers`
--

CREATE TABLE `hairdressers` (
  `id` int NOT NULL,
  `hairdress` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hairdressers`
--

INSERT INTO `hairdressers` (`id`, `hairdress`, `email`, `password`, `phone`, `content`, `last_login`) VALUES
(1, 'Varsavir 1', 'sargis.mkrtchyan1.m@gmail.com', 'admin', '09999999', 'varsavr 1y lav txa e', '2021-02-27 00:58:52'),
(2, 'Varsavir 2', 'sargis.mkrtchyan1.m@gmail.com', 'admin', '077777777', 'varsavr 2y lav txa e', NULL),
(3, 'Varsavir 3', 'sargis.mkrtchyan1.m@gmail.com', 'admin', '055555555', 'varsavr 3y lav txa e', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `not_work_days`
--

CREATE TABLE `not_work_days` (
  `id` int NOT NULL,
  `days` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `not_work_days`
--

INSERT INTO `not_work_days` (`id`, `days`) VALUES
(180, '2021-03-15'),
(181, '2021-03-01'),
(182, '2021-03-08'),
(183, '2021-03-17'),
(184, '2021-03-09'),
(185, '2021-03-15'),
(186, '2021-03-08'),
(187, '2021-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `date` int NOT NULL,
  `hairdress` int NOT NULL,
  `hairCut` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `checked` bit(1) NOT NULL DEFAULT b'0',
  `this_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateDay` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `age`, `number`, `date`, `hairdress`, `hairCut`, `price`, `checked`, `this_date`, `dateDay`) VALUES
(40, '21 ', 0, '21', 1, 3, 'mazi ktrum poqri', 500, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(41, '21 ', 0, '21', 1, 3, 'mazi ktrum poqri', 500, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(44, '2 ', 1, '21', 2, 2, 'mazi ktrum meci', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(45, '2 ', 1, '21', 2, 2, 'mazi ktrum meci', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(46, '12 ', 1, '12', 1, 3, 'trashi dzum', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(48, '12 ', 0, '12', 1, 3, 'mazi ktrum poqri', 500, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(51, '12 ', 1, '21', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(52, '12 ', 1, '21', 5, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(53, '2 ', 1, '21', 1, 2, 'trashi dzum', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(57, '12 ', 0, '21', 2, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(58, '21 ', 0, '12', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(63, 'qas ', 1, '21', 1, 2, 'trashi dzum', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(64, '21 ', 1, '21', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(65, '12 ', 1, '21', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(66, '12 ', 0, '12', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(67, '12 ', 1, '12', 1, 2, 'trashi dzum,mazi ktrum mkratov', 2000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(68, 'asas ', 1, '21', 1, 2, 'trashi dzum', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(70, '12 ', 0, '12', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(71, '2 ', 1, '12', 1, 1, 'mazi ktrum mkratov', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(72, '121 ', 1, '12', 1, 1, 'trashi dzum', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(73, '12 ', 0, '21', 1, 1, 'mazi ktrum mkratov', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(74, '12 ', 0, '12', 1, 1, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(75, '12 ', 0, '21', 1, 1, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(76, '21 ', 0, '12', 1, 1, 'mazi ktrum mkratov', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(77, 'wqw ', 0, '12', 1, 1, 'mazi ktrum mkratov', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(78, '21 ', 0, '12', 1, 2, 'mazi ktrum mkratov', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(79, '21 ', 1, '1212', 2, 2, 'mazi ktrum meci,trashi dzum', 2000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(81, '1212 ', 0, '12', 1, 2, 'mazi ktrum poqri,mazi ktrum mkratov', 1500, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(82, '12 ', 0, '12', 1, 2, 'mazi ktrum poqri,mazi ktrum mkratov', 1500, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(83, '2 ', 1, '12', 1, 2, 'mazi ktrum mkratov', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(85, '122 ', 0, '12', 1, 2, 'mazi ktrum poqri', 500, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(86, '1212 ', 0, '12', 2, 2, 'mazi ktrum poqri', 500, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(87, '12 ', 0, '12', 1, 2, 'mazi ktrum poqri', 500, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(88, '212 ', 1, '122', 2, 2, 'mazi ktrum meci', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(89, '12 ', 0, '12', 1, 1, 'mazi ktrum poqri', 500, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(90, '12 ', 1, '12', 1, 1, 'trashi dzum', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(91, '12 ', 0, '12', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(92, 'qw ', 0, '12', 5, 1, 'mazi ktrum mkratov', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(93, '12 ', 0, '12', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(94, '21 ', 1, '12', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(95, '12 ', 1, '12', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(97, '12 ', 0, '21', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(100, '12 ', 0, '12', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(101, '12 ', 0, '12', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(102, '12 ', 0, '12', 1, 1, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(103, '12 ', 0, '12', 1, 2, 'mazi ktrum mkratov', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(104, '1212 ', 1, '21', 1, 2, 'mazi ktrum mkratov', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(105, '21 ', 0, '12', 2, 1, 'mazi ktrum mkratov', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(106, '12 ', 1, '12', 1, 1, 'mazi ktrum mkratov', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(110, '122 ', 0, '212', 1, 2, 'mazi ktrum poqri', 500, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(112, '1212 ', 0, '12', 2, 2, 'mazi ktrum poqri', 500, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(113, 'as ', 1, '12', 1, 2, 'mazi ktrum meci', 1000, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(115, 'asas ', 0, '1212', 2, 2, 'mazi ktrum poqri', 500, b'1', '2021-02-21 23:47:43', '2021-02-23'),
(116, '1212 ', 1, '212', 2, 2, 'mazi ktrum meci', 1000, b'0', '2021-02-21 23:47:43', '2021-02-23'),
(119, '121212 ', 1, '1212', 2, 3, 'trashi dzum,mazi ktrum mkratov', 2000, b'1', '2021-02-22 01:21:17', '2021-02-23'),
(120, 'SASSASASAS ', 1, '094946446', 8, 1, 'mazi ktrum meci,trashi dzum,mazi ktrum mkratov,tatoo', 5000, b'1', '2021-02-22 01:32:10', '2021-02-23'),
(121, '121 ', 0, '212', 3, 1, 'mazi ktrum poqri', 500, b'1', '2021-02-22 01:32:41', '2021-02-23'),
(122, 'saqqqqq ', 0, '1212', 4, 2, 'mazi ktrum poqri', 500, b'1', '2021-02-22 21:40:56', '2021-02-23'),
(136, '121 ', 1, '1212', 2, 1, 'trashi dzum,mazi ktrum mkratov,tatoo', 4000, b'1', '2021-02-27 02:54:50', '2021-02-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `haircuts`
--
ALTER TABLE `haircuts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hairdressers`
--
ALTER TABLE `hairdressers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `not_work_days`
--
ALTER TABLE `not_work_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `haircuts`
--
ALTER TABLE `haircuts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hairdressers`
--
ALTER TABLE `hairdressers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `not_work_days`
--
ALTER TABLE `not_work_days`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;
