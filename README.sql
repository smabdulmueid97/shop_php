-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 01:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teapowdersalessystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `postcode_id` int(11) NOT NULL,
  `street_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `postcode_id`, `street_address`) VALUES
(1, 31000, '1965, Jln Tanjung Tualang, Kampung Changkat Belangkor'),
(2, 31350, 'No. 37, Jalan Sri Ampang 1, Taman Sri Ampang'),
(3, 31350, '49, Jalan Lapangan Perdana 1, Panorama Lapangan Perdana'),
(4, 31400, '2, Jalan Kamaruddin Isa, Taman Fair Park'),
(5, 31400, 'Lorong Delima 1/1, Kampung Tersusun Batu 5,');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `customer_first_name` varchar(255) NOT NULL,
  `customer_last_name` varchar(255) NOT NULL,
  `customer_phone_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `address_id`, `customer_first_name`, `customer_last_name`, `customer_phone_number`) VALUES
(1, 1, 'Ali', 'ALI AH GAO DAN MUTHU', '012-3938744'),
(2, 2, 'Muthu', 'Sambathan', '017-5678493'),
(3, 5, 'Jia Wei', 'Siginna', '016-8969272'),
(4, 4, 'Soon Heng', 'Tam', '017-3467486'),
(5, 1, 'Ahmad', 'Abdullah', '014-7438993'),
(6, 2, 'Mei', 'Gan', '015-3839322');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `manager_id`, `department_name`) VALUES
(1, 4, 'Accouting'),
(2, 1, 'Sales'),
(3, 2, 'Packaging');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `job_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `employee_first_name` varchar(255) NOT NULL,
  `employee_last_name` varchar(255) NOT NULL,
  `employee_phone_number` varchar(255) DEFAULT NULL,
  `employee_email` varchar(255) DEFAULT NULL,
  `employee_birthdate` date NOT NULL,
  `employee_gender` enum('M','F') DEFAULT NULL,
  `employee_hiredate` date NOT NULL,
  `employee_login_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `department_id`, `manager_id`, `job_id`, `address_id`, `employee_first_name`, `employee_last_name`, `employee_phone_number`, `employee_email`, `employee_birthdate`, `employee_gender`, `employee_hiredate`, `employee_login_password`) VALUES
(1, 1, 1, 1, 4, 'Ling ', 'Chii Sung', '016-5325816', 'chiisung12@hotmail.com', '2001-04-12', 'M', '2023-06-07', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `import_tea`
--

CREATE TABLE `import_tea` (
  `import_tea_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `tea_name` varchar(255) NOT NULL,
  `tea_cost` decimal(8,2) DEFAULT NULL,
  `tea_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `import_tea`
--

INSERT INTO `import_tea` (`import_tea_id`, `supplier_id`, `tea_name`, `tea_cost`, `tea_quantity`) VALUES
(1, 1, 'Red Tea leaf 1 Ton', 500.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_title`) VALUES
(1, 'Accountant');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `manager_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `manager_name`) VALUES
(1, 'Edison'),
(2, 'Tam JC'),
(3, 'Gwen'),
(4, 'Clement'),
(6, 'Abdul');

-- --------------------------------------------------------

--
-- Table structure for table `postcode`
--

CREATE TABLE `postcode` (
  `postcode_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postcode`
--

INSERT INTO `postcode` (`postcode_id`, `state_id`, `city`) VALUES
(30010, 7, 'Ipoh'),
(30508, 7, 'Ipoh'),
(30594, 7, 'Ipoh'),
(31000, 7, 'Batu Gajah'),
(31009, 7, 'Batu Gajah'),
(31350, 7, 'Ipoh'),
(31400, 7, 'IPoh'),
(32000, 7, 'Sitiawan'),
(32040, 7, 'Seri Manjung'),
(32400, 7, 'Ayer Tawar');

-- --------------------------------------------------------

--
-- Table structure for table `product_tea_powder`
--

CREATE TABLE `product_tea_powder` (
  `product_tea_powder_id` int(11) NOT NULL,
  `tea_powder_name` varchar(255) NOT NULL,
  `tea_powder_price` decimal(6,2) DEFAULT NULL,
  `tea_powder_quantity` int(11) NOT NULL,
  `tea_powder_image` varchar(255) NOT NULL,
  `tea_powder_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tea_powder`
--

INSERT INTO `product_tea_powder` (`product_tea_powder_id`, `tea_powder_name`, `tea_powder_price`, `tea_powder_quantity`, `tea_powder_image`, `tea_powder_deleted`) VALUES
(1, 'Black tea', 17.50, 1, 'black tea.jpeg', 0),
(2, 'Green tea', 21.10, 1, 'green tea.jpeg', 0),
(3, 'White tea', 15.90, 1, 'white tea.jpeg', 0),
(4, 'Yellow tea', 14.20, 1, 'yellow tea.jpeg', 0),
(5, 'Chamomile tea', 16.90, 1, 'chamomile tea.jpeg', 0),
(6, 'Oolong tea', 25.00, 1, 'oolong tea.jpeg', 0),
(7, 'Matcha tea', 16.80, 1, 'matcha tea.jpeg', 0),
(8, 'Purple tea', 18.90, 1, 'purple tea.jpeg', 0),
(9, 'Pu-erh tea', 25.00, 1, 'pu-erh tea.jpeg', 0),
(10, 'Jasmine tea', 20.00, 1, 'jasmine tea.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesrecord_teapowder`
--

CREATE TABLE `salesrecord_teapowder` (
  `product_tea_powder_id` int(11) NOT NULL,
  `sales_record_id` int(11) NOT NULL,
  `sales_record_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesrecord_teapowder`
--

INSERT INTO `salesrecord_teapowder` (`product_tea_powder_id`, `sales_record_id`, `sales_record_quantity`) VALUES
(4, 1, 5),
(9, 1, 1),
(6, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `sales_record`
--

CREATE TABLE `sales_record` (
  `sales_record_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sales_record_date` date NOT NULL,
  `sales_record_time` time NOT NULL,
  `sales_record_price` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_record`
--

INSERT INTO `sales_record` (`sales_record_id`, `employee_id`, `customer_id`, `sales_record_date`, `sales_record_time`, `sales_record_price`) VALUES
(1, 1, 1, '2023-06-10', '14:07:15', 908.20);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state`) VALUES
(1, 'Johor'),
(2, 'Kedah'),
(3, 'Kelantan'),
(4, 'Melaka'),
(5, 'Negeri Sembilan'),
(6, 'Pahang'),
(7, 'Perak'),
(8, 'Pulau Pinang'),
(9, 'Sabah'),
(10, 'Sarawak'),
(11, 'Selongar'),
(12, 'Terengganu'),
(13, 'Wilayah Persekutuan');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_phone_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `address_id`, `supplier_name`, `supplier_phone_number`) VALUES
(1, 5, 'Red Tea Farm ', '012-98989980');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `postcode_id` (`postcode_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `manager_id` (`manager_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `import_tea`
--
ALTER TABLE `import_tea`
  ADD PRIMARY KEY (`import_tea_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `postcode`
--
ALTER TABLE `postcode`
  ADD PRIMARY KEY (`postcode_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `product_tea_powder`
--
ALTER TABLE `product_tea_powder`
  ADD PRIMARY KEY (`product_tea_powder_id`);

--
-- Indexes for table `salesrecord_teapowder`
--
ALTER TABLE `salesrecord_teapowder`
  ADD KEY `product_tea_powder_id` (`product_tea_powder_id`),
  ADD KEY `sales_record_id` (`sales_record_id`);

--
-- Indexes for table `sales_record`
--
ALTER TABLE `sales_record`
  ADD PRIMARY KEY (`sales_record_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `address_id` (`address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_tea_powder`
--
ALTER TABLE `product_tea_powder`
  MODIFY `product_tea_powder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_record`
--
ALTER TABLE `sales_record`
  MODIFY `sales_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`postcode_id`) REFERENCES `postcode` (`postcode_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`manager_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`manager_id`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);

--
-- Constraints for table `import_tea`
--
ALTER TABLE `import_tea`
  ADD CONSTRAINT `import_tea_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Constraints for table `postcode`
--
ALTER TABLE `postcode`
  ADD CONSTRAINT `postcode_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `salesrecord_teapowder`
--
ALTER TABLE `salesrecord_teapowder`
  ADD CONSTRAINT `salesrecord_teapowder_ibfk_1` FOREIGN KEY (`product_tea_powder_id`) REFERENCES `product_tea_powder` (`product_tea_powder_id`),
  ADD CONSTRAINT `salesrecord_teapowder_ibfk_2` FOREIGN KEY (`sales_record_id`) REFERENCES `sales_record` (`sales_record_id`);

--
-- Constraints for table `sales_record`
--
ALTER TABLE `sales_record`
  ADD CONSTRAINT `sales_record_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
