-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2016 at 03:58 PM
-- Server version: 5.7.16-log
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` text,
  `productPrice` float DEFAULT NULL,
  `productCode` text,
  `productImage` text,
  `productDesc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productPrice`, `productCode`, `productImage`, `productDesc`) VALUES
(1, 'The -X-Files(I WANT TO BELIEVE)DVD', 25, 'xfiles1', 'images/movie2.jpg', 'A missing-persons case leads to the agents&#39; reunion, along with an encounter with a priest'),
(2, 'The -X- Files (Fight the future DVD)', 25, 'FTF', 'images/movie1.jpg', 'In a small Texas town, a mysterious black substance emanating from the remains of a prehistoric human engulfs a young boy and his rescuers'),
(3, 'Glow in Dark Poster', 20, 'glow', 'images/fan2.jpg', 'This is a glow in the dark handmade poster '),
(4, 'Poster The truth is out there ', 20, 'Poster2', 'images/fan1.jpg', 'This is an original drawing by fox moulder himself'),
(5, 'Hoody made with real alien flesh', 35, 'hood', 'images/hoody.jpg', 'Protect yourself from all weathers and also has cloaking abilitys so aliens cant see you '),
(6, 'The -X-files Socks', 25, 'sock', 'images/socks.jpg', 'A perfect gift for your alien loving friend that has everything !! Can never have to many socks');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_image`) VALUES
(66, 'admin', '$2y$10$MIxHBG2MRj4HBXtqvhNohu7pP1l.oOVDONBe8aXaYArneEV36y.x.', 'images/mattSmith.jpg'),
(70, 'ken', '$2y$10$nGd4We3elazB.4.ivVJEiOKMNYwigws1M072FozUUtYft30sU88Sa', 'images/ken.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
