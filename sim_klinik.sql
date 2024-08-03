-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2024 at 02:23 PM
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
-- Database: `sim_klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id_doctor` int(11) NOT NULL,
  `doctor_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id_doctor`, `doctor_username`) VALUES
(1, 'Black Mampang');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id_patient` int(11) NOT NULL,
  `mr` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `no_bpjs` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id_patient`, `mr`, `tgl_lahir`, `nama`, `alamat`, `telp`, `nama_ibu`, `nama_ayah`, `nik`, `no_bpjs`, `agama`, `created_at`, `updated_at`) VALUES
(12, 'MR-74Z9GX1W', '2024-08-03', 'Arip', 'Jakarta', '085756268826', 'Santosi', 'Santoso', '1785920199289201', 'TIDAK ADA', 'Kristen', '2024-08-02 22:24:41', '2024-08-03 00:56:34'),
(13, 'MR-WITH98PX', '2024-08-11', 'Dewa Kipas', 'Ambungan', '087288291829', 'Lina', 'Hakim', '1928829302919201', '08299382', 'Katolik', '2024-08-02 22:32:34', '2024-08-03 00:56:44'),
(14, 'MR-EMZ9LPBI', '2024-08-10', 'YNW', 'Panggung', '08472719282', 'KK', 'JJ', '209238199231', 'TIDAK ADA', 'Kristen', '2024-08-03 02:02:20', '2024-08-03 02:02:20'),
(15, 'MR-Y86P2G2V', '2024-08-10', 'YNW2', 'Keramaian', '0838772819', 'Juice WRLD', 'Katy Perry', '028318239182', 'TIDAK ADA', 'Hindu', '2024-08-03 02:03:22', '2024-08-03 02:03:22'),
(16, 'MR-EV8AFWIR', '2024-08-10', 'YNW2', 'Keramaian', '0838772819', 'Juice WRLD', 'Katy Perry', '028318239182', 'TIDAK ADA', 'Hindu', '2024-08-03 02:03:28', '2024-08-03 02:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `queues`
--

CREATE TABLE `queues` (
  `id_queue` int(11) NOT NULL,
  `nama_calon_pasien` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `bpjs_no_bpjs` varchar(50) NOT NULL,
  `antrian` int(11) NOT NULL,
  `panggil` varchar(50) NOT NULL,
  `durasi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queues`
--

INSERT INTO `queues` (`id_queue`, `nama_calon_pasien`, `tanggal`, `jam`, `bpjs_no_bpjs`, `antrian`, `panggil`, `durasi`, `status`) VALUES
(1, 'Joko Widodo', '2024-08-01', '10:00:00', 'BPJS', 5, 'Menunggu', '35 menit', 'Menunggu'),
(2, 'Ahmad Sudirman', '2024-08-01', '09:00:00', 'BPJS', 1, 'Menunggu', '15 menit', 'Selesai'),
(3, 'Siti Nurhaliza', '2024-08-01', '09:15:00', 'Non-BPJS', 2, 'Menunggu', '20 menit', 'Menunggu'),
(4, 'Budi Santoso', '2024-08-01', '09:30:00', 'BPJS', 3, 'Menunggu', '25 menit', 'Menunggu'),
(5, 'Lina Marlina', '2024-08-01', '09:45:00', 'Non-BPJS', 4, 'Menunggu', '30 menit', 'Menunggu'),
(6, 'Rina Melati', '2024-08-01', '10:15:00', 'BPJS', 6, 'Menunggu', '40 menit', 'Menunggu'),
(7, 'Dewi Sartika', '2024-08-01', '10:30:00', 'Non-BPJS', 7, 'Menunggu', '45 menit', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `quotas`
--

CREATE TABLE `quotas` (
  `id_quota` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `quota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotas`
--

INSERT INTO `quotas` (`id_quota`, `id_doctor`, `day`, `quota`) VALUES
(2, 1, 'RABU', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `reservation_number` varchar(50) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `service` varchar(100) NOT NULL,
  `practice_time` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `id_patient`, `id_doctor`, `reservation_number`, `reservation_date`, `reservation_time`, `service`, `practice_time`, `room`, `status`, `type`, `notes`) VALUES
(7, 12, 1, 'RES-6ZXIQKID', '2024-08-03', '20:44:00', 'POLI GIGI', 'PAGI', 'afsd', 'BATAL', 'dfsa', 'df'),
(8, 14, 1, 'RES-BHGYCWFF', '2024-08-02', '19:22:00', 'POLI UMUM', 'PAGI', 'fsad', 'LEWATI', 'tes', 'Halo');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id_schedule` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `practice_time` varchar(50) NOT NULL,
  `monday_start_time` time DEFAULT NULL,
  `monday_end_time` time DEFAULT NULL,
  `tuesday_start_time` time DEFAULT NULL,
  `tuesday_end_time` time DEFAULT NULL,
  `wednesday_start_time` time DEFAULT NULL,
  `wednesday_end_time` time DEFAULT NULL,
  `thursday_start_time` time DEFAULT NULL,
  `thursday_end_time` time DEFAULT NULL,
  `friday_start_time` time DEFAULT NULL,
  `friday_end_time` time DEFAULT NULL,
  `saturday_start_time` time DEFAULT NULL,
  `saturday_end_time` time DEFAULT NULL,
  `sunday_start_time` time DEFAULT NULL,
  `sunday_end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id_schedule`, `id_doctor`, `service_name`, `practice_time`, `monday_start_time`, `monday_end_time`, `tuesday_start_time`, `tuesday_end_time`, `wednesday_start_time`, `wednesday_end_time`, `thursday_start_time`, `thursday_end_time`, `friday_start_time`, `friday_end_time`, `saturday_start_time`, `saturday_end_time`, `sunday_start_time`, `sunday_end_time`) VALUES
(10, 1, 'POLI GIGI', 'SIANG', '17:45:00', '02:58:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '04:56:00', '10:56:00', NULL, NULL),
(11, 1, 'POLI GIGI', 'PAGI', '04:03:00', '09:08:00', '03:08:00', '12:07:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '$2y$12$oHgOyTVWTKL6vXjLkkcyJ.2.m4YUGELWraIrtOO56KqFISQug2uti');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id_doctor`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id_patient`);

--
-- Indexes for table `queues`
--
ALTER TABLE `queues`
  ADD PRIMARY KEY (`id_queue`);

--
-- Indexes for table `quotas`
--
ALTER TABLE `quotas`
  ADD PRIMARY KEY (`id_quota`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `queues`
--
ALTER TABLE `queues`
  MODIFY `id_queue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `quotas`
--
ALTER TABLE `quotas`
  MODIFY `id_quota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quotas`
--
ALTER TABLE `quotas`
  ADD CONSTRAINT `quotas_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id_doctor`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id_patient`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id_doctor`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id_doctor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
