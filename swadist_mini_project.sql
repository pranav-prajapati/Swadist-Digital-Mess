-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 08:48 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swadist_mini_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `adminname` varchar(255) NOT NULL,
  `mess_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `adminname`, `mess_name`, `email`, `phno`, `password`, `cpassword`, `date`) VALUES
(1, 'Mustafa Rangara', '1', 'm95@gmail.com', '9925532621', '$2y$10$iip.g14F4luxyGi.jZJtdO..k3CeHsy5S7zSOkVF73CmOXuyZF/Qq', '$2y$10$iyxtSC4manU9eKumJAqkf.n/gGTjHAeHOBse29SAqzsexzQWrz3OO', '2021-01-20 05:12:16'),
(2, 'Mustafa Rangara', '1', 'm959@gmail.com', '0977313568', '$2y$10$OXgQLs97ktqTh1Ta.myC9eIgYiPF3U4wg.4dZk/avxxlfilNBkh12', '$2y$10$DD.b2NKMmcVXVnBIGSITueYxQtDb6VkOzAk2UbUtQeKZNrOjMRK6a', '2021-01-20 06:17:33'),
(3, 'pranav prajapati', '1', 'pra9prajapati@gmail.com', '0977313568', '$2y$10$Zeg0wRHqYALgqPmS2Wfn7ueHPkkVXm3WFDPkIXkup1lpbqqAfHLIO', '$2y$10$/vjIWlpnvQFh870ihZmNKeY9g/pUpVzHsbYQd.MSqL016nF3VnGZy', '2021-01-20 06:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `mess_list`
--

CREATE TABLE `mess_list` (
  `mess_id` int(50) NOT NULL,
  `mess_name` varchar(255) NOT NULL,
  `mess_menu` text NOT NULL,
  `mess_image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mess_list`
--

INSERT INTO `mess_list` (`mess_id`, `mess_name`, `mess_menu`, `mess_image`, `date`) VALUES
(1, 'N.V hall', ' Dal,Rice,Chicken tawa Afghani, tandoori paratha,Salad,papad', 'images/NV.png', '2020-11-12 11:26:50'),
(2, 'S.P hall', 'chhole bhature,salad,coldrink', 'images/SP.png', '2020-11-12 11:36:56'),
(3, 'K.M hall', 'Dal,Rice,mix veg sabji, tandoori paratha,Salad.', 'images/KM.png', '2020-11-12 11:36:56'),
(4, 'J.M hall', 'khichdi,kadhi,aloo sabji,roti,Salad,papad,buttermilk', 'images/JM.png', '2020-11-12 11:36:56'),
(5, 'M.A hall', 'Dal,Rice,matar paneer, tandoori paratha,Salad.', 'images/MA.png', '2020-11-12 11:36:56'),
(6, 'R.T hall', 'Dal,Rice,gulab jamun,jeera rice,daal tadka,roti,salad', 'images/RT.png', '2020-11-12 11:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `order_for` int(50) NOT NULL,
  `order_by` int(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(50) NOT NULL,
  `order_from` int(50) NOT NULL,
  `order_to` int(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_from`, `order_to`, `address`, `payment_mode`, `status`, `qty`, `amount`, `date`) VALUES
(1, 1, 1, 'vadodara', 'COD', 'confirm', 4, 200, '2021-01-20 10:37:26'),
(2, 2, 1, 'vadodara', 'COD', 'confirm', 4, 200, '2021-01-20 11:46:12'),
(3, 2, 2, 'vadodara', 'COD', 'pending to confirm', 4, 200, '2021-01-20 11:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `first name` varchar(255) NOT NULL,
  `last name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_phone_no` varchar(10) NOT NULL,
  `user_hall_name` varchar(255) NOT NULL,
  `user_room_no` int(10) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first name`, `last name`, `user_email`, `user_password`, `user_phone_no`, `user_hall_name`, `user_room_no`, `time`) VALUES
(1, 'pranav', 'prajapati', 'pra9prajapati@gmail.com', '$2y$10$gbLpQrvMkRnevactYDjTlei80osiUZSH2GTaEvrq0Ra6Ev5Alj.pq', '9773135682', 'N.V hall', 46, '2021-01-20 10:34:31'),
(2, 'pranav', 'prajapati', 'p.pranav2820@gmail.com', '$2y$10$GUpTNsBFQ8qAJXwsjQtQpuFd8hUL1hVTFC.Nu44Fh2WVym8LOtIgC', '9773135682', 'N.V hall', 46, '2021-01-20 11:41:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mess_list`
--
ALTER TABLE `mess_list`
  ADD PRIMARY KEY (`mess_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mess_list`
--
ALTER TABLE `mess_list`
  MODIFY `mess_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
