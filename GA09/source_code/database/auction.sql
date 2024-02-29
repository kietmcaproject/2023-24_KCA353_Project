-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 10:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `bid_amount` decimal(10,2) NOT NULL,
  `bid_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `product_id`, `bid_amount`, `bid_time`, `user_id`) VALUES
(33, 6, 3000.00, '2023-11-24 07:50:13', 'ekansh@auction.com'),
(34, 7, 5500.00, '2023-11-24 07:52:47', 'ekansh@auction.com'),
(35, 11, 25000.00, '2023-11-24 08:12:34', 'ajay12@auction.com'),
(36, 6, 4000.00, '2023-11-30 04:26:50', 'ekansh@auction.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `base_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `seller_name` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `highest_bid_amount` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_type`, `product_name`, `brand`, `description`, `base_price`, `quantity`, `seller_name`, `product_image`, `expiration_date`, `highest_bid_amount`) VALUES
(6, 'books', 'Harry Potter Series', 'JK Rowling Inc', 'A beautiful boxed set containing all seven Harry Potter novels in paperback. These new editions of the classic and internationally bestselling, multi-award-winning series', 1500.00, 1, 'Max Sellers', 'Images/Harry.jpg', '2023-11-14 09:43:22', 4000.00),
(7, 'furniture', '3 Seater Sofa', 'Solimo', 'item Dimensions: Length: 194 cm x Width: 90.5 cm x Height: 93 cm\r\nUpholstery: Polyester Fabric | Frame: Plywood and Pine Wood; Colour: Grey\r\nSeating Capacity: 3 Seater | Included Components: 1 Sofa', 5000.00, 1, 'Adi Furnitures', 'Images/Sofa.jpg', '2023-11-14 10:06:46', 5500.00),
(8, 'furniture', 'Sofa', 'Sofa', 'fasfasflsf', 5000.00, 1, 'fsfss', 'Images/Sofa.jpg', '2023-11-14 09:02:20', 0.00),
(11, 'electronics', 'Samsung', 'Galaxy', 'fdsfds;lmsf;l', 20000.00, 1, 'akash', 'Images/galaxys22.webp', '2023-11-26 10:03:46', 25000.00);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `username` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `cardtype` varchar(50) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnumber` varchar(16) NOT NULL,
  `expiry` varchar(7) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`username`, `productname`, `date`, `cardtype`, `cardname`, `cardnumber`, `expiry`, `cvv`, `amount`, `timestamp`, `product_id`) VALUES
('ekansh@auction.com', '3 Seater Sofa', '2023-11-29', 'credit', 'Ekansh Srivastava', '9876789765456543', 'jan/202', '766', 5500.00, '2023-11-29 17:31:18', 7);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Name`, `username`, `password`) VALUES
('ajay', 'ajay12@auction.com', '12345678'),
('Ekansh', 'ekansh@auction.com', 'ekansh');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`username`, `password`, `name`, `phone`) VALUES
('bihari@seller.com', 'akash', 'Akash', '8789654567'),
('xyz@auction.com', '1234xyz', 'xyz', '8976789564');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`username`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`username`) REFERENCES `register` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
