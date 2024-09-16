-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2024 at 02:05 PM
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
-- Database: `task_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `completion_date` datetime DEFAULT NULL,
  `status` enum('New','In Progress','Completed') DEFAULT 'New',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `description`, `completion_date`, `status`, `created_at`) VALUES
(20, 16, 'Imran\'s Task', 'This is first task of Imran', '2024-09-12 00:00:00', 'Completed', '2024-09-16 16:58:43'),
(21, 16, 'Task 2', 'This is my second task', '2024-09-12 00:00:00', 'Completed', '2024-09-16 16:58:43'),
(22, 16, 'Task 3', 'This is my task three', '2024-10-24 00:00:00', 'Completed', '2024-09-16 16:58:43'),
(23, 16, 'Task 4', 'This my fourth task', '2024-10-31 00:00:00', 'Completed', '2024-09-16 16:58:43'),
(24, 16, 'Task 5', 'This is my task 5', '2024-09-30 00:00:00', 'New', '2024-09-16 16:58:43'),
(25, 16, 'Task 6', 'This is my task six', '2024-09-29 00:00:00', 'New', '2024-09-16 16:58:43'),
(26, 16, 'Task 7', 'This is my task 7 ', '2024-09-30 00:00:00', 'New', '2024-09-16 16:58:43'),
(27, 16, 'Task 9', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!', '2024-09-25 00:00:00', 'In Progress', '2024-09-16 16:58:43'),
(28, 16, 'Task 9', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!', '2024-09-29 00:00:00', 'New', '2024-09-16 16:58:43'),
(29, 16, 'Task 10', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!', '2024-09-24 00:00:00', 'New', '2024-09-16 16:58:43'),
(30, 16, 'Task12', 'This s task 12', '2024-09-12 00:00:00', 'In Progress', '2024-09-16 16:58:43'),
(31, 17, 'dfghvbnm', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dolor unde sed eligendi, eum ipsum? Consequuntur, id ipsum delectus dolor voluptatem sint aperiam consequatur itaque. Quos iste impedit nemo? Adipisci!', '2024-11-13 00:00:00', 'New', '2024-09-16 16:58:43'),
(32, 16, 'Task21', 'this is my task 21.', '2024-09-27 00:00:00', 'In Progress', '2024-09-16 16:58:43'),
(33, 16, 'Task100', 'this is task 100.', '2024-09-12 00:00:00', 'Completed', '2024-09-16 16:58:43'),
(34, 16, 'task1000', 'this is taskkjhfghj', '2024-09-13 00:00:00', 'New', '2024-09-16 16:58:43'),
(35, 16, 'zdzxd', 'zxdzxzd', '2024-09-19 00:55:00', 'In Progress', '2024-09-16 16:58:43'),
(36, 16, 'hghfg', 'gfhfh', '2024-09-13 12:55:00', 'Completed', '2024-09-16 16:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(16, 'Muhammad Imran', '25d55ad283aa400af464c76d713c07ad', 'user'),
(17, 'Imran', '202cb962ac59075b964b07152d234b70', 'user'),
(18, 'User 3', '202cb962ac59075b964b07152d234b70', 'user'),
(19, 'User1', '202cb962ac59075b964b07152d234b70', 'user'),
(20, 'User1123', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
(21, 'Admin User', 'c4ca4238a0b923820dcc509a6f75849b', 'admin'),
(22, 'xsx', '$2y$10$OnVGFp25hdYmOucUJ/90qe6r/waFhTlAhpNXr.yAb.MiAZcLdeu7u', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
