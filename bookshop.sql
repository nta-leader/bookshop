-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2019 at 05:13 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.3.11-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `url`, `parent_id`) VALUES
(7, 'SÁCH ÔN THI', 'sach-on-thi', 0),
(8, 'VÀO LỚP 10', 'vao-lop-10', 0),
(9, 'THPT QUỐC GIA', 'thpt-quoc-gia', 0),
(10, 'THI VÀO LỚP 10', 'thi-vao-lop-10', 7),
(11, 'THPT QUỐC GIA', 'thpt-quoc-gia', 7),
(12, 'TOÁN', 'sach-on-thi-vao-lop-10-mon-toan', 10),
(14, 'HÓA', 'hoa', 10),
(15, 'TOÁN', 'toan', 11),
(16, 'LÝ', 'ly', 11),
(17, 'HÓA', 'hoa', 11),
(18, 'LUYỆN THI HSG', 'luyen-thi-hsg', 0),
(20, 'LÝ', 'on-thi-vao-lop-10-mon-ly', 10);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `id_category`, `id_product`) VALUES
(4, 12, 1),
(5, 12, 2),
(6, 12, 3),
(7, 14, 1),
(8, 14, 2),
(9, 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_sale` int(11) NOT NULL,
  `product_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `evaluate` int(1) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `basis_price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `link_document` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_sale`, `product_code`, `name`, `url`, `picture`, `evaluate`, `content`, `basis_price`, `link_document`, `active`) VALUES
(1, 1, 'LTMT', 'Luyện thi môn toán', 'luyen-thi-mon-toan', 'D83b3eCGrIUWoi2GwtoqboUUcCs6ESxGZ1F5xcgk.jpeg', 5, '<p>123</p>', '98000', '#', 1),
(2, 1, 'LTML', 'Luyện thi môn lý', 'luyen-thi-mon-ly', 'gUQtHFFTpqERTcDhuMWi0WPy1AcA83fZCxvY6Jxe.jpeg', 5, '<p>123</p>', '98000', '#', 1),
(3, 1, 'LTMH', 'Luyện thi môn hóa', 'luyen-thi-mon-hoa', '6P6GNymMoxtpUGtbs9pMNIIBwFWl9FhSUNrj6aXK.jpeg', 5, '<p>123</p>', '98000', '#', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent` int(3) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `name`, `url`, `percent`, `picture`) VALUES
(0, 'Mặc định', 'mac-dinh', 0, 'mac-dinh.jpg'),
(1, 'BIG SALE', 'big-sale', 50, 'tk7HHqMIVENZ0yQLmiHLFOCizgF4zJZjwnNYYkh2.jpeg'),
(2, '70%', '70', 70, 'GQec8eaq46G3b6fyLrJeT23nUvzar4ndEJzrREb5.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;