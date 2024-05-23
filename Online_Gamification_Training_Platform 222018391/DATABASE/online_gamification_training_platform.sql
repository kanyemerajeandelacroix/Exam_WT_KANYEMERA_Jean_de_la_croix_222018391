-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 06:39 PM
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
-- Database: `online_gamification_training_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `achievement_id` int(11) NOT NULL,
  `achievement_name` varchar(100) DEFAULT NULL,
  `achievement_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`achievement_id`, `achievement_name`, `achievement_date`) VALUES
(1, 'noble', '2024-05-13'),
(2, 'kanyemera1', '2024-05-07'),
(3, 'one', '2024-05-08'),
(4, 'two', '2024-05-11'),
(5, 'three333', '2024-05-16'),
(6, 'mn2', '2024-05-22'),
(7, 'barack', '2024-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `assignment_name` varchar(100) DEFAULT NULL,
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `course_id`, `assignment_name`, `deadline`) VALUES
(1, 1, 'web technology', '2024-05-07'),
(2, 2, 'mathematics', '2024-05-08'),
(3, 2, 'physics', '2024-05-08'),
(4, 4, 'geo', '2024-05-11'),
(5, 6, 'economics', '2024-05-25'),
(6, 3, 'statistics', '2024-05-01'),
(7, 7, 'ICT', '2024-05-07'),
(8, 7, 'local1', '2024-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `coursematerials`
--

CREATE TABLE `coursematerials` (
  `material_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `material_name` varchar(100) DEFAULT NULL,
  `material_type` enum('video','document','quiz') DEFAULT NULL,
  `material_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursematerials`
--

INSERT INTO `coursematerials` (`material_id`, `course_id`, `material_name`, `material_type`, `material_url`) VALUES
(2, 1, 'pens', 'document', 'ink'),
(3, 1, 'chalkbord', 'quiz', 'uuu'),
(4, 1, 'work', 'video', 'blue'),
(5, 1, 'books', 'quiz', 'yuu'),
(6, 1, 'computers', 'document', 'window'),
(7, 1, 'room', 'video', 'one'),
(8, 1, 'web tech', 'quiz', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `instructor_id`) VALUES
(1, 'mathematics', NULL),
(2, 'gegraphic', 2),
(3, 'java script', 2),
(4, 'introduction to statistics', 2),
(5, 'introduction to java', 2),
(6, 'introduction to c++', 2),
(7, 'introduction to financial accounting', 2),
(8, 'history1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollment_id`, `student_name`, `course_id`) VALUES
(1, 'fabrice', 1),
(2, 'maniraguha', 1),
(3, 'didas', 1),
(4, 'nepo', 1),
(5, 'maurice', 1),
(6, 'ange', 1),
(7, 'iradukunda', 1),
(8, 'kwizera', 1),
(9, 'samson1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gamificationresources`
--

CREATE TABLE `gamificationresources` (
  `resource_id` int(11) NOT NULL,
  `resource_name` varchar(100) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gamificationresources`
--

INSERT INTO `gamificationresources` (`resource_id`, `resource_name`, `course_id`) VALUES
(1, 'applestrore', 1),
(2, 'playstore', 1),
(3, 'on websites', 1),
(4, 'on djs4', 1),
(5, 'og', 1),
(6, 'playstore', 1),
(7, 'on djs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` int(11) NOT NULL,
  `instructor_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `instructor_name`, `email`) VALUES
(1, 'dr.Munezero', 'kamikazi@gmail.com'),
(2, 'dr.albert', 'albert@gmail.com'),
(3, 'muzehe', 'muzehe@gmail.com'),
(4, 'mimi', 'mimi@gmail.com'),
(5, 'eric', 'eric@gmail.com'),
(6, 'maniraguha', 'maniraguha'),
(7, 'dodai', 'doda@gmail.com'),
(8, 'junior', 'junior@gmail.com'),
(9, 'nepo1', 'nepo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `leaderboard_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`leaderboard_id`, `course_id`, `points`) VALUES
(1, NULL, NULL),
(2, 1, 100),
(3, 1, 98),
(4, 1, 98),
(5, 1, 98),
(6, 1, 97),
(7, 1, 96),
(8, 1, 95),
(9, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `submission_id` int(11) NOT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `submission_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`submission_id`, `assignment_id`, `submission_date`, `submission_text`) VALUES
(1, 1, '2024-05-08', 'sublime1'),
(2, 1, '2024-05-07', 'word documents'),
(3, 1, '2024-05-08', 'pdf document'),
(4, 1, '2024-05-15', 'sublime'),
(5, 1, '2024-05-22', 'word documents'),
(6, 1, '2024-05-23', 'sublime1'),
(7, 1, '2024-05-31', 'pdf document');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'kanyemera', 'jean de la croix', '222018391', 'kanyemerajeandelacroix77@gmail.com', '0789847280', '$2y$10$rZeM7SVhMrzf41EEpaBuJ.KjLAQhkH5Ba1mHiOWaJhiIJlo7WBBG2', '2024-05-08 15:12:13', '79', 0),
(2, 'umuhire', 'felix', '', 'umuhire@gmail.com', '0789000000', '$2y$10$0XQzsoztmZ.ZNsd6.4zEn.03557zn9MVQVKzrahSarOcAkdUotIYu', '2024-05-08 20:08:49', '', 0),
(29, '', 'vianney', 'i', 'kanyemerajeandelacroix177@gmail.com', '99', '$2y$10$qAtrpRhZiR4ovR9wlZi/8eL8/vmpb4QTivyaV6WJIJIw6Xe.M0IUO', '2024-05-10 17:24:18', '', 0),
(30, 'nziza', 'hirwa', 'n', 'nziza@gmail.com', '09878', '$2y$10$ad88dRZGF.onoz90zHA3.eyKCJmuzuwQ5PcK7NPjiN.h4YDKJl2Rm', '2024-05-10 20:12:45', '', 0),
(31, 'nepo ', 'iradukunda', 'arsenal', 'iradukunda@gmail.com', '0897866558888', '$2y$10$LmS8fxJZ8VjSai96wZwb2Ogw1LFyF/dKmAfgcFKHUmVtUdC5CBjL6', '2024-05-16 17:08:52', '', 0),
(32, 'UWASE', 'VANESSA', 'jason', 'uwase@gmail.com', '0784485775', '$2y$10$GAL8bIsd030rm4k2m/rv8udZXLs.7c9HKdn0cgwuZmLkLsizibGLq', '2024-05-23 01:52:17', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`achievement_id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `coursematerials`
--
ALTER TABLE `coursematerials`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `fk_instructor` (`instructor_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `fk_course` (`course_id`);

--
-- Indexes for table `gamificationresources`
--
ALTER TABLE `gamificationresources`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `fk_course_gamification` (`course_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`leaderboard_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`submission_id`),
  ADD KEY `assignment_id` (`assignment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `coursematerials`
--
ALTER TABLE `coursematerials`
  ADD CONSTRAINT `coursematerials_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_instructor` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `fk_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `gamificationresources`
--
ALTER TABLE `gamificationresources`
  ADD CONSTRAINT `fk_course_gamification` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD CONSTRAINT `leaderboard_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`assignment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
