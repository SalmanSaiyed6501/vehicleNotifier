-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2026 at 11:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehiclesystemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_09_08_093925_create_vehicle_details_table', 1),
(2, '2026_09_08_053334_create_users_table', 2),
(3, '2026_09_08_053443_create_sesssions_table', 2),
(5, '2026_09_08_093500_create_staff_details_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sesssions`
--

CREATE TABLE `sesssions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sesssions`
--

INSERT INTO `sesssions` (`id`, `session`, `created_at`, `updated_at`) VALUES
(1, '2026-27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE `staff_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `doj` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_details`
--

INSERT INTO `staff_details` (`id`, `name`, `designation`, `email`, `contact`, `dob`, `doj`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 'Subhash Fulvar', 'cleaner', 'Subhash@gmail.com', '7894264546', '2026-12-31', '2026-12-31', '1', '2026-09-23 01:50:55', '2026-09-23 03:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Salman', 'st.francishighschool.vapi@gmail.com', '$2y$12$IXH9GqcYF758gaN8tgPJw.FE2e47lgxeJN4B4VzstoOdu6EYQKix.', '2026-09-17 22:11:24', '2026-09-17 22:11:24'),
(2, 'Tester', 'tester@gmail.com', '$2y$12$IXH9GqcYF758gaN8tgPJw.FE2e47lgxeJN4B4VzstoOdu6EYQKix.', '2026-09-02 07:45:36', '2026-09-02 07:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registeredNo` varchar(255) NOT NULL,
  `vehicleType` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `cleaner` varchar(255) NOT NULL,
  `pucFrom` varchar(255) NOT NULL,
  `pucTo` varchar(255) NOT NULL,
  `pucAmt` varchar(255) NOT NULL,
  `insuranceFrom` varchar(255) NOT NULL,
  `insuranceTo` varchar(255) NOT NULL,
  `insuranceAmt` varchar(255) NOT NULL,
  `fitnessFrom` varchar(255) NOT NULL,
  `fitnessTo` varchar(255) NOT NULL,
  `fitnessAmt` varchar(255) NOT NULL,
  `permitFrom` varchar(255) NOT NULL,
  `permitTo` varchar(255) NOT NULL,
  `permitAmt` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`id`, `registeredNo`, `vehicleType`, `driver`, `cleaner`, `pucFrom`, `pucTo`, `pucAmt`, `insuranceFrom`, `insuranceTo`, `insuranceAmt`, `fitnessFrom`, `fitnessTo`, `fitnessAmt`, `permitFrom`, `permitTo`, `permitAmt`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 'GJ 15 AX 1441', 'bus', 'common', 'no', '2026-09-02', '2026-09-16', '12', '2026-09-01', '2026-09-08', '1232', '2026-09-03', '2026-09-05', '123', '2026-09-19', '2026-09-18', '123', '1', '2026-09-17 22:42:27', '2026-09-17 22:42:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sesssions`
--
ALTER TABLE `sesssions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sesssions`
--
ALTER TABLE `sesssions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_details`
--
ALTER TABLE `staff_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
