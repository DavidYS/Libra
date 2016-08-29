-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2016 at 02:34 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libra`
--
 CREATE DATABASE Libra;
 USE Libra;
-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BooksID` int(100) NOT NULL,
  `Author` varchar(25) NOT NULL,
  `Title` varchar(25) NOT NULL,
  `Type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BooksID`, `Author`, `Title`, `Type`) VALUES
(1, 'Author', 'Title ', 'Genre'),
(2, 'Victor Hugo', 'Notre-Dame de Paris', 'Novel'),
(3, 'Herman Melville', 'Moby Dick', 'Novel'),
(4, 'Charlotte Bronte', 'Jane Eyre', 'Novel'),
(5, 'Lev Tolstoi', 'Anna Karenina', ''),
(6, 'Jack London', 'Ivanhow', 'Novel'),
(7, 'Henri Charriere', 'Papillon', ''),
(8, 'James Clavell', 'Shogun', ''),
(10, 'Goethe', 'Faust', ''),
(12, 'William Shakespeare', 'Hamlet', ''),
(13, 'Daniel Defoe', 'Robinson Crusoe', ''),
(14, 'William Shakespeare', 'Romeo And Julieta', ''),
(15, 'Karl May', 'Winnetou', ''),
(16, 'Victor Hugo', 'Bug-Jargal', ''),
(17, 'Ray Bradbury', '451º Fahrenheit', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(250) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BooksID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BooksID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
