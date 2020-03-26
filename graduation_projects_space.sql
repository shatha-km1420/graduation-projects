-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 02:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graduation_projects_space`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `code`, `name`) VALUES
(1, 'IT', 'Information Technolog'),
(2, 'CS', 'Computer Science\r\n'),
(3, 'CE', 'Computer Engineering\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `supervisor` varchar(100) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `department_id`, `name`, `supervisor`, `description`, `image`, `file`) VALUES
(1, 1, 'Project 1', 'Supervisor 1', 'Project 1', 'img/projects/01.jpg', 'files/projects/01.pdf'),
(2, 1, 'Project 2', 'Supervisor 1', 'Project 2', 'img/projects/02.jpg', 'files/projects/02.pdf'),
(3, 1, 'Project 3', 'Supervisor 1', 'Project 3', 'img/projects/03.jpg', 'files/projects/03.pdf'),
(4, 2, 'Project 4', 'Supervisor 2', 'Project 4', 'img/projects/04.jpg', 'files/projects/04.pdf'),
(5, 2, 'Project 5', 'Supervisor 2', 'Project 5', 'img/projects/05.jpg', 'files/projects/05.pdf'),
(6, 2, 'Project 6', 'Supervisor 2', 'Project 6', 'img/projects/06.jpg', 'files/projects/06.pdf'),
(7, 3, 'Project 7', 'Supervisor 3', 'Project 7', 'img/projects/07.jpg', 'files/projects/07.pdf'),
(8, 3, 'Project 8', 'Supervisor 3', 'Project 8', 'img/projects/08.jpg', 'files/projects/08.pdf'),
(9, 3, 'Project 9', 'Supervisor 3', 'Project 9', 'img/projects/09.jpg', 'files/projects/09.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'admin@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor_id` (`department_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
