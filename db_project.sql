-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2026 at 08:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `helpdesk_tiket`
--
-- Error reading structure for table db_project.helpdesk_tiket: #1932 - Table 'db_project.helpdesk_tiket' doesn't exist in engine
-- Error reading data for table db_project.helpdesk_tiket: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_project`.`helpdesk_tiket`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `helpdesk_tiket_log`
--
-- Error reading structure for table db_project.helpdesk_tiket_log: #1932 - Table 'db_project.helpdesk_tiket_log' doesn't exist in engine
-- Error reading data for table db_project.helpdesk_tiket_log: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_project`.`helpdesk_tiket_log`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--
-- Error reading structure for table db_project.mahasiswa: #1932 - Table 'db_project.mahasiswa' doesn't exist in engine
-- Error reading data for table db_project.mahasiswa: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_project`.`mahasiswa`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_mahasiswa`
--
-- Error reading structure for table db_project.penilaian_mahasiswa: #1932 - Table 'db_project.penilaian_mahasiswa' doesn't exist in engine
-- Error reading data for table db_project.penilaian_mahasiswa: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_project`.`penilaian_mahasiswa`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$sSASmOrMMEKLIa3N1JGfnexdI26GZHt5/s5lEnUEECSLvdtsDuLb6', 'Administrator', 'admin@mail.com', 'admin', '2026-04-10 02:55:51'),
(2, 'User', '$2y$10$gJYNwapleI7J1pVPp56vUeHyA9Ilw8SrG8KBBe44MnqonA9cTL4Wm', 'Jhon Kennedy', 'admin@gmail.com', 'admin', '2026-04-10 06:56:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
