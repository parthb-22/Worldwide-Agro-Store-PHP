-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 03:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', 'CAC29D7A34687EB14B37068EE4708E7B', 'admin@mail.com', '', '2023-10-18 17:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `your_name` varchar(500) CHARACTER SET latin1 NOT NULL,
  `your_email` varchar(500) CHARACTER SET latin1 NOT NULL,
  `your_subject` varchar(500) CHARACTER SET latin1 NOT NULL,
  `your_message` varchar(500) CHARACTER SET latin1 NOT NULL,
  `contact_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`your_name`, `your_email`, `your_subject`, `your_message`, `contact_date`) VALUES
('Aishwarya Bhosale', 'aish06@gmail.com', 'I need 5kg Turmeric Powder', 'I need 5kg Turmeric Powder Please email its rate', '2023-11-25 06:20:11'),
('Aniket Kadam', 'aniketsk@gmail.com', 'I need 10 kg Tumeric Powder', 'Please share me wholesale rate  details on email', '2023-11-29 15:26:50'),
('Pratiksha Mohite', 'pratiksha08@gmail.com', 'Wholesale Rate of Turmeric Powder', 'send wholsale rate on-700882823', '2023-11-30 20:54:28'),
('Vipul Ghorpade', 'vipulg@gmail.com', 'franchise enquiry', 'I need franchise of your business module,my number-9955600627', '2023-12-05 05:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment_method` varchar(50) NOT NULL DEFAULT 'Cash On Delivery',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `name`, `address`, `phone`, `email`, `payment_method`, `order_date`, `status`, `total_price`) VALUES
(1, 1, 'Parth', 'Satara', '123654789', 'parth@gmail.com', 'Cash On Delivery', '2023-11-23 15:15:44', 'Pending', '330.00'),
(2, 2, 'Sagar', 'Satara', '1236547890', 'sagar@gmail.com', 'Cash On Delivery', '2023-11-24 08:06:33', 'Pending', '330.00'),
(3, 3, 'Shubham', 'Satara', '1234567890', 'shubham@gmail.com', 'Cash On Delivery', '2023-11-24 17:52:03', 'Pending', '165.00'),
(4, 3, 'Shubham', 'Pune', '12345678902', 'shubham@gmail.com', 'Cash On Delivery', '2023-11-24 18:24:53', 'Pending', '165.00'),
(5, 4, 'Akshay', 'Upali', '9855985520', 'akshay@gmail.com', 'Cash On Delivery', '2023-11-26 11:50:35', 'Pending', '165.00'),
(6, 4, 'akshay', 'upali', '9855985520', 'ak@gmail.com', 'Cash On Delivery', '2023-11-26 11:56:32', 'Pending', '165.00'),
(7, 4, 'Akshay', 'Upali', '9855985520', 'ak@gmail.com', 'Cash On Delivery', '2023-11-26 11:58:11', 'Pending', '330.00'),
(8, 4, 'Akshay', 'Upali', '9855229855', 'ak@gmail.com', 'Cash On Delivery', '2023-11-26 12:01:36', 'Pending', '165.00'),
(9, 4, 'Akshay', 'Upali', '9855985520', 'ak@gmail.com', 'Cash On Delivery', '2023-11-26 12:06:02', 'Pending', '165.00'),
(10, 4, 'Akshay Pawar', 'Upali,Satara', '9855985520', 'ak@gmail.com', 'Cash On Delivery', '2023-11-26 15:40:54', 'Pending', '660.00'),
(11, 5, 'Saurabh Gaikwad', 'Satara', '9855985520', 'sg@gmail.com', 'Cash On Delivery', '2023-11-26 15:48:59', 'Pending', '165.00'),
(12, 6, 'Aniket Kadam', 'Jakangaon,Satara', '9855985526', 'ask@gmail.com', 'Cash On Delivery', '2023-11-27 08:55:38', 'Pending', '330.00'),
(13, 4, 'Akshay Pawar', 'Satara', '7719919878', 'ak@gmail.com', 'Cash On Delivery', '2023-11-29 04:03:43', 'Pending', '330.00'),
(14, 4, 'Akshay L Pawar', 'Upali,Satara', '9855668810', 'akshay@gmail.com', 'Cash On Delivery', '2023-11-29 14:04:57', 'Pending', '825.00'),
(15, 7, 'Vipul Ghorpade', 'Ghorpade Colony,Mangalapur,Vathar,Satara-415517', '9955600627', 'vipulg@gmail.com', 'Cash On Delivery', '2023-12-05 04:55:29', 'Pending', '165.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `product_name`, `product_price`, `quantity`) VALUES
(1, 1, 1, 'Adarsh Halad Powder(Selam)', '0.00', 2),
(2, 2, 1, 'Adarsh Halad Powder(Selam)', '0.00', 1),
(3, 2, 2, 'Adarsh WorldTom Tomato Powder', '0.00', 1),
(4, 3, 1, 'Adarsh Halad Powder(Selam)', '0.00', 1),
(5, 4, 2, 'Adarsh WorldTom Tomato Powder', '0.00', 1),
(6, 5, 1, 'Adarsh Halad Powder(Selam)', '0.00', 1),
(7, 6, 1, 'Adarsh Halad Powder(Selam)', '0.00', 1),
(8, 7, 1, 'Adarsh Halad Powder(Selam)', '0.00', 2),
(9, 8, 2, 'Adarsh WorldTom Tomato Powder', '0.00', 1),
(10, 9, 1, 'Adarsh Halad Powder(Selam)', '0.00', 1),
(11, 10, 1, 'Adarsh Halad Powder(Selam)', '0.00', 4),
(12, 11, 1, 'Adarsh Halad Powder(Selam)', '0.00', 1),
(13, 12, 1, 'Adarsh Halad Powder(Selam)', '0.00', 1),
(14, 12, 2, 'Adarsh WorldTom Tomato Powder', '0.00', 1),
(15, 13, 1, 'Adarsh Halad Powder(Selam)', '0.00', 2),
(16, 14, 1, 'Adarsh Halad Powder(Selam)', '0.00', 5),
(17, 15, 1, 'Adarsh Halad Powder(Selam)', '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(1, 1, 'Aadarsh Halad Powder', 'Selam', '280.00', 'tumeric-img.png');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(1, 2, 'in process', 'none', '2023-10-20 23:47:49'),
(2, 3, 'in process', 'none', '2023-10-21 05:31:30'),
(3, 2, 'closed', 'thank you for your order!', '2023-10-21 05:41:41'),
(4, 3, 'closed', 'none', '2023-10-21 06:12:35'),
(5, 4, 'in process', 'none', '2023-10-21 06:12:55'),
(6, 1, 'rejected', 'none', '2023-10-21 06:13:26'),
(7, 7, 'in process', 'none', '2023-10-21 07:33:24'),
(8, 8, 'in process', 'none', '2023-10-21 07:33:38'),
(9, 9, 'rejected', 'thank you', '2023-10-21 07:33:53'),
(10, 7, 'closed', 'thank you for your ordering with us', '2023-10-21 07:34:33'),
(11, 8, 'closed', 'thanks ', '2023-10-21 07:35:24'),
(12, 5, 'closed', 'none', '2023-10-21 07:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(1, 'parth', 'Parth', 'Patil', 'parth@gmail.com', '8554092599', '95f3545545b22f9525b2b70e67f0d82c', 'Sai Apartment,Hadapsar-Gadital,Pune-411028', 1, '2023-11-15 15:11:03'),
(2, 'Sagar ', 'Sagar', 'pawar', 'sagar@gmail.com', '8778955950', '2157889b9c48d4f40da8a05b89df8920', 'Yashodhan Niwas, Chauthi Galli, Pachwad,Satara-415312', 1, '2023-11-15 08:05:13'),
(3, 'shubham', 'Shubham ', 'Patil', 'shubham@gmail.com', '7719919877', '1df19179f6f03fb429336884e7dd1028', 'Swastik Apartment,Malharpeth,Karad-415205\r\n', 1, '2023-11-20 17:33:54'),
(4, 'akshay', 'Akshay', 'Pawar', 'aks@gmail.com', '7387253160', '1df19179f6f03fb429336884e7dd1028', 'Samart Niwas,Upali,Satara-415002', 1, '2023-11-20 10:57:38'),
(5, 'Saurabh', 'Saurabh', 'Gaikwad', 'sk@gmail.com', '9822204549', '1df19179f6f03fb429336884e7dd1028', 'Unnati Green, Manorama Nagar, Thane-400607', 1, '2023-11-20 15:47:46'),
(6, 'Aniket', 'Aniket', 'Kadam', 'ask@gmail.com', '9855985520', '1df19179f6f03fb429336884e7dd1028', 'Pusegaon,Satara', 1, '2023-11-20 08:54:26'),
(7, 'Vipul99', 'Vipul', 'Ghorpade', 'vipulg@gmail.com', '9955600627', 'a438b6acd10de56983da6138e8ae0bfa', 'Mangalapur,Vathar,Satara', 1, '2023-11-26 04:30:56'),
(8, 'Rohit007', 'Rohit', 'Chavan', 'rohitrc@gmail.com', '7441589143', 'ef05c4f019c45c52d87795c406e473e5', 'Forest Colony,Godoli,Satara-415002', 1, '2023-11-26 07:25:04'),
(9, 'Ashutosh15', 'Ashutosh', 'Waghmare', 'ashutosh1508@gmail.com', '8600796950', '595e8afeeece7ed8773b0a8fbd06a992', 'Shahu Colony,Shahunagar,Godoli,Satara-415002', 1, '2023-11-28 20:27:05'),
(10, 'Omkar18', 'Omkar', 'Bhise', 'omi18@gmail.com', '8624082246', 'a21c6adbce717eeb20b16d8c8697d9b4', 'Shri Apartment, Shahupuri, Satara-415002', 1, '2023-11-29 05:43:24'),
(11, 'Shabaj78', 'Shabaj', 'Shaikh', 'shabaj87@gmail.com', '8007323171', 'e64028e8a5f12acbae60acca87510d7a', 'Ebadat Apartment,Near Talim Sangh Maidan, Satara', 1, '2023-11-28 20:45:24'),
(12, 'Pratiksha08', 'Pratiksha', 'Mohite', 'pratiksham08@gmail.com', '7008823823', 'b7fbe61fc9b3490af8e92312e452dae9', 'Machi Peth,Adalat Wada road,Satara-415002', 1, '2023-11-30 06:25:49'),
(13, 'Aishwarya06', 'Aishwarya', 'Bhosale', 'aish06b@gmail.com', '7038658840', '46d9b60be10df7b27dd1017975c481a1', 'Suman Apartment,Near Shivraj Petrol Pump,Satara-415002', 1, '2023-11-30 00:54:26'),
(14, 'Yogiraj99', 'Yogiraj ', 'Patil', 'yogi99@gmail.com', '9673747151', 'be3c0793ea01e7baedbf40d8ec31bb82', 'Dattakrupa Niwas,Radhanagari,Kolhapur-416612', 1, '2023-11-30 06:10:56'),
(15, 'Pritam007', 'Pritam', 'Chavan', 'pritampc@gmail.com', '7888179030', 'b0bd50c9c802ef7e079cc4e05abfe936', 'Durvankur Apartment,Ganesh Colony,Daulatnagar,Satara-415211', 1, '2023-12-03 06:20:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`your_email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
