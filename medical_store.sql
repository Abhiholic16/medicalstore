-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 05:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mobile` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `username`, `password`, `mobile`, `email`, `dob`, `address`) VALUES
(1, 'Abhishek shinde', 'Abhishek123', 'Admin@123', 2147483647, 'abhishekshinde9503@gmail.com', '2021-11-16', 'satara'),
(2, 'Abhishek', 'Abhishek1234', 'Admin@1234', 2147483647, 'abhishekshinde9503@gmail.com', '2001-04-05', 'koregaon');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `sr_no` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `message` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`sr_no`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Abhishek', 'abhishekshinde9503@gmail.com', 2147483647, 'your service is good\r\n		   ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `sr_no` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `id` int(30) NOT NULL,
  `medname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `total` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ord` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`sr_no`, `name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES
(1, 'Abhishek123', 1, 'Kuff Ayurvedic Syrup', 130, 390, 3, '2021-11-15', '00:00:28', 1),
(2, 'Abhishek123', 6, 'Ecosprin 75mg Strip Of 14 Tabl', 5, 10, 2, '2021-11-15', '00:00:38', 1),
(3, 'Abhishek123', 14, ' Bottle Of 10ml Eye Drops', 123, 123, 1, '2021-11-15', '00:00:45', 1),
(4, 'Abhishek123', 1, 'Kuff Ayurvedic Syrup', 130, 130, 1, '2021-11-15', '08:05:38', 2),
(5, 'Abhishek123', 2, 'Zincovit Bottle Of 200ml', 115, 345, 3, '2021-11-15', '08:13:05', 3),
(6, 'Abhishek123', 1, 'Kuff Ayurvedic Syrup', 130, 910, 7, '2021-11-15', '14:06:14', 4),
(7, 'Abhishek123', 6, 'Ecosprin 75mg Strip Of 14 Tabl', 5, 5, 1, '2021-11-15', '14:06:27', 4),
(8, 'Abhishek123', 5, 'Tusq Dx Cough Syrup 100ml', 75, 75, 1, '2021-11-15', '14:06:52', 4);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `sr` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `transaction _id` varchar(30) NOT NULL,
  `ord` int(30) NOT NULL,
  `amount` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`sr`, `username`, `transaction _id`, `ord`, `amount`) VALUES
(1, 'Abhishek123', 'T02134134545', 1, 523),
(2, 'Abhishek123', 'T02134134545', 2, 130),
(3, 'Abhishek123', 'T02134134545', 3, 345),
(4, 'Abhishek123', 'T02134134545', 4, 990);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `med_id` int(20) NOT NULL,
  `med_name` varchar(200) DEFAULT NULL,
  `med_type` varchar(20) DEFAULT NULL,
  `batch_no` int(20) DEFAULT NULL,
  `price` int(30) DEFAULT NULL,
  `dom` date DEFAULT NULL,
  `doe` date DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`med_id`, `med_name`, `med_type`, `batch_no`, `price`, `dom`, `doe`, `img`) VALUES
(1, 'Kuff Ayurvedic Syrup', 'syrup', 307001, 130, '2021-08-01', '2022-12-08', 'img1.jpeg'),
(2, 'Zincovit Bottle Of 200ml', 'syrup', 307002, 115, '2021-09-01', '2022-12-31', 'img2.jpeg'),
(3, 'Alex Sugar Free Bottle Of 100ml', 'syrup', 307003, 100, '2021-08-09', '2022-11-08', 'img3.jpeg'),
(4, 'Himalaya Evecare Syrup - 400ml', 'syrup', 307004, 160, '2021-08-09', '2022-11-16', 'img4.jpeg'),
(5, 'Tusq Dx Cough Syrup 100ml', 'syrup', 307005, 75, '2021-11-16', '2022-12-14', 'img5.jpeg'),
(6, 'Ecosprin 75mg Strip Of 14 Tablets', 'tablet', 308006, 5, '2021-11-09', '2023-11-14', 'img6.jpeg'),
(7, 'Dolo 650mg Strip Of 15', 'tablet', 308007, 30, '2023-11-09', '2023-11-15', 'img7.jpeg'),
(8, 'Zincovit Strip Of 15 Tablets', 'tablet', 308008, 90, '2021-11-10', '2022-11-16', 'img8.jpeg'),
(9, 'Pantocid 40mg Strip Of 15 Tablets', 'tablet', 308009, 35, '2021-11-09', '2023-11-15', 'img9.jpeg'),
(10, 'Shelcal Hd Strip Of 15 Tablets\r\n', 'tablet', 3080010, 100, '2021-11-17', '2023-08-14', 'img10.jpeg'),
(11, 'Evion 400mg Strip Of 10 Capsules', 'capsule', 3090011, 28, '2021-08-10', '2022-12-15', 'img11.jpeg'),
(12, 'Pan D Strip Of 15 Capsules', 'capsule', 3090012, 162, '2021-07-01', '2022-11-17', 'img12.jpeg'),
(13, 'Ecosprin Av 75mg Strip Of 15 Capsules', 'capsule', 3080013, 47, '2021-08-25', '2024-11-21', 'img13.jpeg'),
(14, ' Bottle Of 10ml Eye Drops', 'drop', 3090014, 123, '2021-11-09', '2022-11-23', 'img14.jpeg'),
(15, 'Ultra D3 Drops ', 'drop', 3090015, 40, '2021-11-15', '2022-11-15', 'img15.jpeg'),
(16, 'Eco Tears 0.5% Eye Drops 15ml', 'drop', 3090016, 86, '2021-11-16', '2022-11-18', 'img16.jpeg'),
(17, 'Foracort 200mcg Inhaler', 'inhaler', 3010017, 325, '2021-11-14', '2024-11-11', 'img17.jpeg'),
(18, 'Duolin Inhaler 200md', 'inhaler', 3010018, 289, '2021-11-08', '2024-11-05', 'img18.jpeg'),
(19, 'Asthalin 100mcg Inhaler\r\n', 'inhaler', 3010019, 125, '2021-11-15', '2024-11-19', 'img19.jpeg'),
(20, 'Lantus 100iu Cartridge Of 3ml Solution For Injection', 'injection', 3020020, 615, '2021-11-14', '2021-11-11', 'img20.jpeg'),
(21, 'Human Actrapid 40iu Vial Of 10ml Solution For Injection', 'injection', 3020021, 135, '2021-11-07', '2021-11-23', 'img21.jpeg'),
(22, 'Pantium Iv 40mg Injection 1\'S', 'injection', 3010022, 45, '2021-11-08', '2021-11-23', 'img22.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`med_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `sr_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `sr_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `sr` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
