-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 01:44 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsf_banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `SNO` int(3) NOT NULL,
  `SENDER` text NOT NULL,
  `RECEIVER` text NOT NULL,
  `AMOUNT` int(8) NOT NULL,
  `DATE_TIME` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`SNO`, `SENDER`, `RECEIVER`, `AMOUNT`, `DATE_TIME`) VALUES
(3, 'Kristen Dsouza', 'Ronald Donald', 200, '2021-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `SNO` int(3) NOT NULL,
  `NAME` text NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PH_NO` varchar(10) NOT NULL,
  `BALANCE` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`SNO`, `NAME`, `EMAIL`, `PH_NO`, `BALANCE`) VALUES
(1, 'Kristen Dsouza', 'kristen123@gmail.com', '1234560789', 59160),
(2, 'Alan Smith', 'alan456@hotmail.com', '7896541230', 596000),
(3, 'Irene Mathew', 'irene.mathew123@gmail.com', '8844662251', 911140),
(4, 'Ronald Donald', 'r.donald@hotmail.com', '7458236515', 99200),
(5, 'Ankesh Singh', 'anklet21@gmail.com', '1592634875', 89000),
(6, 'Cyril Daniel', 'cyril55@gmail.com', '6569634201', 755000),
(7, 'Nevin Mathews', 'nevintroy@gmail.com', '8462157866', 546500),
(8, 'Zihan Azad', 'zizu78@gmail.com', '7896541236', 123000),
(9, 'Nishant Diddigi', 'nish456@gmail.com', '7456321890', 9991000),
(10, 'Aaditya Dev', 'grodd@gmail.com', '4561238529', 562000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`SNO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `SNO` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `SNO` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
