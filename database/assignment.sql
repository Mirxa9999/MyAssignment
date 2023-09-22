-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 12:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `deadline_pricing`
--

CREATE TABLE `deadline_pricing` (
  `deadline_id` int(255) NOT NULL,
  `deadline_date` varchar(255) NOT NULL,
  `deadline_price` varchar(255) NOT NULL,
  `dealine_price_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `academic_level` varchar(255) NOT NULL,
  `paper_type` varchar(255) NOT NULL,
  `page_qty` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `grammerly` varchar(255) NOT NULL,
  `copy_space` varchar(255) NOT NULL,
  `turnitin` varchar(255) NOT NULL,
  `assignment_image` varchar(255) NOT NULL,
  `admin_upload_File_pdf` varchar(255) NOT NULL,
  `admin_upload_File_png` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT '0' COMMENT '0=pending,\r\n1=completed,\r\n2=cancelled',
  `total_price` varchar(255) NOT NULL,
  `remaining_price` varchar(255) NOT NULL,
  `plagirism` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `princing`
--

CREATE TABLE `princing` (
  `pricing_id` int(255) NOT NULL,
  `academicwriting_price` varchar(255) NOT NULL,
  `proofreading_price` varchar(255) NOT NULL,
  `contentwriting_price` varchar(255) NOT NULL,
  `academicwriting_highschool_price` varchar(255) NOT NULL,
  `academicwriting_undergraduate_price` varchar(255) NOT NULL,
  `academicwrting_bachelor_price` varchar(255) NOT NULL,
  `proofreading_highschool_price` varchar(255) NOT NULL,
  `proofreading_undergraduate_price` varchar(255) NOT NULL,
  `proofreading_bacholer_price` varchar(255) NOT NULL,
  `proofreading_professional_price` varchar(255) NOT NULL,
  `professional_price` varchar(255) NOT NULL,
  `academicwriting_professional_price` varchar(255) NOT NULL,
  `plagiarismwithout_price` varchar(255) NOT NULL,
  `grammerly` varchar(255) NOT NULL,
  `copy_space` varchar(255) NOT NULL,
  `turnitin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `princing`
--

INSERT INTO `princing` (`pricing_id`, `academicwriting_price`, `proofreading_price`, `contentwriting_price`, `academicwriting_highschool_price`, `academicwriting_undergraduate_price`, `academicwrting_bachelor_price`, `proofreading_highschool_price`, `proofreading_undergraduate_price`, `proofreading_bacholer_price`, `proofreading_professional_price`, `professional_price`, `academicwriting_professional_price`, `plagiarismwithout_price`, `grammerly`, `copy_space`, `turnitin`) VALUES
(1, '0', '20', '300', '10', '20', '150', '50', '60', '50', '80', '40', '40', '0', '100', '200', '300');

-- --------------------------------------------------------

--
-- Table structure for table `type_of_paper`
--

CREATE TABLE `type_of_paper` (
  `type_id` int(255) NOT NULL,
  `type_of_paper` varchar(255) NOT NULL,
  `paper_price` varchar(255) NOT NULL,
  `paper_type` varchar(255) NOT NULL COMMENT '0=academic writing,\r\n1=editing proofreading\r\n2=content writing',
  `active_status` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_of_paper`
--

INSERT INTO `type_of_paper` (`type_id`, `type_of_paper`, `paper_price`, `paper_type`, `active_status`) VALUES
(12, 'Rosses', '20', '2', 1),
(13, 'Red Rose', '20', '1', 1),
(14, 'Summary', '77', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL COMMENT '1=superadmin,\r\n2=user,\r\n3=admin',
  `reset_code` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `Phone_no` varchar(255) NOT NULL,
  `active` int(255) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deadline_pricing`
--
ALTER TABLE `deadline_pricing`
  ADD PRIMARY KEY (`deadline_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `princing`
--
ALTER TABLE `princing`
  ADD PRIMARY KEY (`pricing_id`);

--
-- Indexes for table `type_of_paper`
--
ALTER TABLE `type_of_paper`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deadline_pricing`
--
ALTER TABLE `deadline_pricing`
  MODIFY `deadline_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `princing`
--
ALTER TABLE `princing`
  MODIFY `pricing_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type_of_paper`
--
ALTER TABLE `type_of_paper`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
