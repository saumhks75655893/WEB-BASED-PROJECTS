-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:5222
-- Generation Time: Dec 08, 2024 at 10:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wb_hbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE `admin_panel` (
  `sr_no` int(11) NOT NULL,
  `admin_id` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`sr_no`, `admin_id`, `admin_pass`) VALUES
(1, 'Himanshukumar', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `booked_status`
--

CREATE TABLE `booked_status` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `total_pay` int(11) DEFAULT NULL,
  `room_no` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `phone_num` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked_status`
--

INSERT INTO `booked_status` (`sr_no`, `booking_id`, `room_name`, `price`, `total_pay`, `room_no`, `user_name`, `phone_num`, `address`) VALUES
(21, 29, 'Simple room', 100, 200, 'c10', 'Sundaram kumar', '9106537863', 'vill-Rammando, Chakia, Chandauli'),
(22, 30, 'Deluxe Room', 7000, 77000, NULL, 'Sundaram kumar', '9106537863', 'vill-Rammando, Chakia, Chandauli'),
(23, 31, 'Luxury Room', 15000, 30000, NULL, 'Sundaram kumar', '9106537863', 'vill-Rammando, Chakia, Chandauli'),
(24, 32, 'Luxury Room', 15000, 30000, 'a10', 'Himanshu Kumar', '7991861858', 'Rammando\r\nRammando'),
(25, 33, 'Simple room', 100, 2500, NULL, 'Himanshu Kumar', '7991861858', 'Rammando\r\nRammando'),
(26, 34, 'Deluxe Room', 7000, 70000, NULL, 'Himanshu Kumar', '7991861858', 'Rammando\r\nRammando'),
(27, 35, 'Luxury Room', 15000, 15000, NULL, 'Himanshu Kumar', '7991861858', 'Rammando\r\nRammando'),
(28, 36, 'Deluxe Room', 7000, 14000, 'a12', 'Himanshu Kumar', '7991861858', 'Rammando\r\nRammando'),
(29, 37, 'Deluxe Room', 7000, 21000, NULL, 'Himanshu Kumar', '7991861858', 'Rammando\r\nRammando'),
(30, 38, 'Deluxe Room', 7000, 7000, NULL, 'Himanshu Kumar', '7991861858', 'Rammando\r\nRammando'),
(31, 39, 'Luxury Room', 15000, 210000, NULL, 'Himanshu Kumar', '7991861858', 'Rammando\r\nRammando'),
(32, 40, 'Simple room', 100, 100, NULL, 'Himanshu Kumar', '7991861858', 'Rammando\r\nRammando');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `arrival` int(11) NOT NULL,
  `refund` int(11) DEFAULT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT 'pending',
  `order_id` varchar(150) NOT NULL,
  `trans_id` varchar(400) DEFAULT NULL,
  `trans_amt` int(11) NOT NULL,
  `trans_status` varchar(100) NOT NULL DEFAULT 'pending',
  `trans_res_msg` varchar(200) DEFAULT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `user_id`, `room_id`, `check_in`, `check_out`, `arrival`, `refund`, `booking_status`, `order_id`, `trans_id`, `trans_amt`, `trans_status`, `trans_res_msg`, `datentime`) VALUES
(29, 13, 38, '2024-12-12', '2024-12-14', 1, NULL, 'booked', 'order_PUdFZolTmc5kcR', 'pay_PUdFkeAjupCKV4', 0, 'confirmed', NULL, '2024-12-08 14:56:36'),
(30, 13, 35, '2024-12-08', '2024-12-19', 0, 1, 'cancelled', 'order_PUdKbN1LqnNgy2', 'pay_PUdKkcseL22Dgp', 0, 'confirmed', NULL, '2024-12-08 15:01:21'),
(31, 13, 36, '2024-12-23', '2024-12-25', 0, 1, 'cancelled', 'order_PUdLQMDvrhlBe1', 'pay_PUdLXiL15Lxlsp', 0, 'confirmed', NULL, '2024-12-08 15:02:08'),
(32, 8, 36, '2024-12-19', '2024-12-21', 1, NULL, 'booked', 'order_PUdMoQVgXdrbPJ', 'pay_PUdMwvGwjDNVCX', 0, 'confirmed', NULL, '2024-12-08 15:03:27'),
(33, 8, 38, '2024-12-08', '2025-01-02', 0, 1, 'cancelled', 'order_PUdOCm1APKTteS', 'pay_PUdONaWfcM5wFB', 0, 'confirmed', NULL, '2024-12-08 15:04:46'),
(34, 8, 35, '2024-12-18', '2024-12-28', 0, NULL, 'pending', 'order_PUdPCc0RKjJlhG', NULL, 0, 'pending', NULL, '2024-12-08 15:05:43'),
(35, 8, 36, '2024-12-19', '2024-12-20', 0, NULL, 'pending', 'order_PUdQso3AC1HQdA', NULL, 0, 'pending', NULL, '2024-12-08 15:07:19'),
(36, 8, 35, '2024-12-08', '2024-12-10', 1, NULL, 'booked', 'order_PUdRSJFOKv3t1x', 'pay_PUdRdZgGAb9y3f', 0, 'confirmed', NULL, '2024-12-08 15:07:51'),
(37, 8, 35, '2024-12-09', '2024-12-12', 0, NULL, 'booked', 'order_PUoC4XvCNoQrWS', 'pay_PUoCE50nm8i5uk', 0, 'confirmed', NULL, '2024-12-09 01:38:55'),
(38, 8, 35, '2024-12-19', '2024-12-20', 0, NULL, 'booked', 'order_PUoENyJ7B0MmBF', 'pay_PUoEWEZCeoWwF5', 0, 'confirmed', NULL, '2024-12-09 01:41:06'),
(39, 8, 36, '2024-12-11', '2024-12-25', 0, NULL, 'booked', 'order_PUoGY3RROQ1Mob', 'pay_PUoGm6BBN8SRJd', 0, 'confirmed', NULL, '2024-12-09 01:43:09'),
(40, 8, 38, '2024-12-18', '2024-12-19', 0, NULL, 'booked', 'order_PUoKuMjBMyZbdF', 'pay_PUoL3ib4jzMBZQ', 0, 'confirmed', NULL, '2024-12-09 01:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`sr_no`, `name`, `email`, `subject`, `message`, `date`, `seen`) VALUES
(31, 'Himanshu Kumar', 'hksinha@gmail.com', 'Review about the hotel', 'good', '2024-12-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(400) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(1, '', 'Wifi', 'nown for its comfortable accommodations and excellent service, it has become\r\n'),
(2, '', 'Air conditionar', 'nown for its comfortable accommodations and excellent service, it has become\r\n'),
(3, '', 'Television', 'nown for its comfortable accommodations and excellent service, it has become\r\n'),
(4, '', 'Geyser', 'nown for its comfortable accommodations and excellent service, it has become\r\n'),
(5, '', 'Spa', 'nown for its comfortable accommodations and excellent service, it has become\r\n'),
(6, '', 'Room Heater', 'nown for its comfortable accommodations and excellent service, it has become\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(10, 'bedroom'),
(11, 'balcony'),
(12, 'kitchen');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(400) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adults`, `children`, `description`, `status`, `removed`) VALUES
(34, 'Simple room', 200, 100, 50, 3, 2, 'The Simple Room offers a cozy, minimalist design with a queen-sized bed, flat-screen TV, and free Wi-Fi. It includes a private bathroom with fresh towels and toiletries. A compact workspace and ample storage enhance convenience. Large windows provide natural light for a relaxing stay.', 1, 1),
(35, 'Deluxe Room', 500, 7000, 13, 4, 4, 'The Deluxe Room offers a spacious and elegant retreat with a king-sized bed, premium linens, and modern furnishings. Amenities include a flat-screen TV, free Wi-Fi, and a comfortable seating area. The en-suite bathroom features luxurious toiletries, a rainfall shower, and plush towels. Large windows with scenic views complete this upscale experience.', 1, 0),
(36, 'Luxury Room', 1560, 15000, 10, 5, 5, 'The Luxury Room provides a lavish experience with a king-sized bed, high-end linens, and sophisticated décor. It features a spacious lounge area, a flat-screen TV, and complimentary Wi-Fi. The en-suite bathroom boasts a soaking tub, rainfall shower, and premium toiletries. Panoramic windows offer stunning views, making your stay truly exceptional.', 1, 0),
(37, 'Simple Room', 150, 1500, 120, 3, 2, 'The room is a cozy retreat featuring a comfortable queen-sized bed, perfect for rest and relaxation. Large windows let in natural light, offering a scenic view of the surrounding area. Amenities include free Wi-Fi,  and a AC for your convenience. The modern en-suite bathroom comes with complimentary toiletries and a refreshing shower.', 1, 1),
(38, 'Simple room', 150, 100, 120, 3, 2, 'The room is a cozy retreat featuring a comfortable queen-sized bed, perfect for rest and relaxation. Large windows let in natural light, offering a scenic view of the surrounding area. Amenities include free Wi-Fi, and a AC for your convenience. The modern en-suite bathroom comes with complimentary toiletries and a refreshing shower.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(130, 36, 1),
(131, 36, 2),
(132, 36, 3),
(133, 36, 4),
(134, 36, 5),
(135, 36, 6),
(144, 35, 1),
(145, 35, 2),
(146, 35, 3),
(147, 35, 6),
(152, 38, 1),
(153, 38, 2);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(82, 36, 10),
(83, 36, 11),
(84, 36, 12),
(91, 35, 10),
(92, 35, 11),
(98, 38, 10),
(99, 38, 11);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(26, 35, 'IMG_78667.png', 0),
(27, 35, 'IMG_74773.jpg', 1),
(28, 35, 'IMG_57213.jpg', 0),
(29, 35, 'IMG_77275.jpg', 0),
(30, 35, 'IMG_43225.png', 0),
(31, 36, 'IMG_19244.jpg', 0),
(32, 36, 'IMG_31567.jpg', 0),
(33, 36, 'IMG_59500.png', 0),
(34, 36, 'IMG_87934.png', 1),
(35, 36, 'IMG_15477.jpg', 0),
(36, 36, 'IMG_59195.jpg', 0),
(37, 36, 'IMG_23273.jpg', 0),
(45, 38, 'IMG_71843.jpg', 0),
(46, 38, 'IMG_22230.png', 1),
(47, 38, 'IMG_76094.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(70) NOT NULL,
  `about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `about`, `shutdown`) VALUES
(1, 'XYZ HOTEL', 'This is not only a hotel this is sentiment. This hotel is made with much love and affection.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phonenum` bigint(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(120) NOT NULL,
  `pincode` int(10) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_varified` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `phonenum`, `email`, `address`, `pincode`, `dob`, `profile`, `password`, `is_varified`, `token`, `t_expire`, `status`, `datentime`) VALUES
(8, 'Himanshu Kumar', 7991861858, 'himanshukumar893384@gmail.com', 'Rammando\r\nRammando', 232103, '2003-06-20', 'IMG_30913.jpeg', '$2y$10$p7mnadowHJ4WLYofdq35zOa1YHAuTM/2NzzFyPOn6/3cvfh452i4e', 1, NULL, NULL, 1, '2024-12-04 09:18:16'),
(13, 'Sundaram kumar', 9106537863, 'saumhks3@gmail.com', 'vill-Rammando, Chakia, Chandauli', 232103, '2003-12-14', 'IMG_65963.jpeg', '$2y$10$NV7dlQHStwlZW3PWfCpTje61ghbRYNbbmCCj6OyAlRtKxkpl7aKlO', 1, 'a5eac9ad8617115d338f342c6f9336c7', NULL, 1, '2024-12-04 10:20:39'),
(15, 'Meera Rajput', 8933845760, 'sinhasaum@gmail.com', 'Vill and Post - Katasil , Sakaldiha, Chandauli', 232112, '1993-12-09', 'IMG_86179.jpeg', '$2y$10$9j5yru5l7P0fbOUaY3x4puy5FVexMJZ1iQDcI3kEijzVhXBCt6Jsq', 1, NULL, NULL, 1, '2024-12-04 23:39:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booked_status`
--
ALTER TABLE `booked_status`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `facilities id` (`facilities_id`),
  ADD KEY `room id` (`room_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `rm id` (`room_id`),
  ADD KEY `features id` (`features_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_status`
--
ALTER TABLE `booked_status`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_status`
--
ALTER TABLE `booked_status`
  ADD CONSTRAINT `booked_status_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_details` (`booking_id`);

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_cred` (`id`),
  ADD CONSTRAINT `booking_details_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `room id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `features id` FOREIGN KEY (`features_id`) REFERENCES `features` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
