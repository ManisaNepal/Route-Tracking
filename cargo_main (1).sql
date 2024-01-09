-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 02:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cargo_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(5) NOT NULL,
  `branch_id` varchar(10) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_id`, `bname`, `street`, `district`, `province`) VALUES
(1, 'hetauda', 'hetauda', 'hetauda gallli', 'hetauda jilla', 'bagmati');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `sn` int(11) NOT NULL,
  `cr_id` varchar(10) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `sender_address` varchar(255) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `sender_num` varchar(15) NOT NULL,
  `ship_date` varchar(50) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `receiver_num` varchar(15) NOT NULL,
  `delivery_date` varchar(50) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'0',
  `delivered_date` varchar(50) DEFAULT NULL,
  `collector_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `courier` (`sn`, `cr_id`, `sender_name`, `sender_address`, `weight`, `sender_num`, `ship_date`, `receiver_name`, `receiver_address`, `receiver_num`, `delivery_date`, `status`, `delivered_date`, `collector_id`) VALUES
(1, '123', 'Manu', 'kalanki', '10', '123456999', '2021-02-09', 'Masina', 'Chitwan', '3456789', '2021-12-02', b'0', '2021-12-05', 1),
(3, '2345', 'manisha', 'kalanki', '30', '123456999', '2021-02-09', 'Sani', 'Chitwan', '3456789', '2021-12-02', b'0', '2021-12-05', 1);



CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `staff` (`staff_id`, `email`, `fullname`, `address`, `mobile`, `password`, `branch_id`) VALUES
(1, 'test@gmail.com', 'test', 'test', '9812345678', '$2y$10$R5XkgsgLtLbBzEU5fgue8O0BnlrKlNiA2QjHu1LOkIEu/aWAANPCm', 'hetauda'),
(2, 'manisanepal7@gmail.com', 'manisha nepal', 'manisa133', '9818783035', '$2y$10$naid5Mx00Sy1zi4u0me6ce0I44hJEzmtPSkwctlPRe3pP4qrSBF0a', 'hetauda');


CREATE TABLE `tracking` (
  `sn` int(5) NOT NULL,
  `tracking_id` varchar(50) NOT NULL,
  `route1` varchar(100) DEFAULT NULL,
  `route2` varchar(100) DEFAULT NULL,
  `route3` varchar(100) DEFAULT NULL,
  `route4` varchar(100) DEFAULT NULL,
  `route5` varchar(100) DEFAULT NULL,
  `progress` varchar(50) NOT NULL,
  `cr_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `tracking` (`sn`, `tracking_id`, `route1`, `route2`, `route3`, `route4`, `route5`, `progress`, `cr_id`) VALUES
(3, '321', 'ktm', 'dhading', 'malekhu', '', '', 'Inprogress', '123'),
(4, '5432', 'ktm', 'dhading', 'malekhu', 'muglin', 'chitwan', 'delivered', '2345');


ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`cr_id`),
  ADD UNIQUE KEY `sn` (`sn`),
  ADD KEY `collector_id` (`collector_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_id`),
  ADD UNIQUE KEY `sn` (`sn`),
  ADD KEY `cr_id` (`cr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `sn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courier`
--
ALTER TABLE `courier`
  ADD CONSTRAINT `courier_ibfk_1` FOREIGN KEY (`collector_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`);

--
-- Constraints for table `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`cr_id`) REFERENCES `courier` (`cr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
