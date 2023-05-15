-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2023 at 04:51 AM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `balita`
--

CREATE TABLE `balita` (
  `id_balita` int NOT NULL,
  `nik` char(128) NOT NULL,
  `nama_balita` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `nama_ibu` varchar(128) NOT NULL,
  `dusun` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `balita`
--

INSERT INTO `balita` (`id_balita`, `nik`, `nama_balita`, `tgl_lahir`, `jenis_kelamin`, `nama_ibu`, `dusun`) VALUES
(142, '7503070901080076', 'Nabila Faidah Ibrahim', '2023-04-12', 'wanita', 'Lani Karim', '3'),
(143, '7503072503860001', 'Siti Zahra Fahrudin', '2023-04-12', 'wanita', 'Hastin Kadir', '3'),
(144, '7503076205170001', 'Mutiara Putri Akuba', '2023-04-12', 'wanita', 'Erna ismail', '3'),
(145, '7503072409170001', 'Algifahri Djafar', '2023-04-12', 'pria', 'Amna Podomi', '3'),
(146, '7503075301180001', 'Nur Ainsyah Matia', '2023-04-12', 'wanita', 'Karsum Suleman', '3'),
(147, '7503074902180001', 'Nazli Febiyan Tawape', '2023-04-12', 'wanita', 'Sri Istina Matia', '3'),
(148, '7503074408180001', 'Ghatziah Azzahra Polamolo', '2023-04-12', 'wanita', 'Sry Wahyuni Polimengo', '3'),
(149, '7503072903190002', 'Bilal Syahputra Marwan', '2023-04-12', 'pria', 'Sri Yulani Makahilapa', '3'),
(150, '7503071104190001', 'Awwiti Makahilapa ', '2023-04-12', 'wanita', 'Djamila Pakaya', '2'),
(151, '7503072207170001', 'Rasyid Yusuf Suleman', '2023-04-12', 'wanita', 'Samsia Tamuu', '2'),
(152, '7503072410170001', 'Farel Gintulangi', '2023-04-12', 'pria', 'Sri Minarti Habibie', '2'),
(153, '750307241017001', 'Nazwan Ok. Makahilapa', '2023-04-12', 'pria', 'Melisa Lukim', '2'),
(154, '7503071407180001', 'Moh Faiz Artanasil', '2023-04-12', 'pria', 'Tendri Rahmat', '2'),
(155, '7503076412190001', 'Hayyatul Syifa Kasim', '2023-04-12', 'wanita', 'Candrawati SY  Lahuo', '1'),
(156, '7503071601200001', 'Daniyl Mustaqim Suwarso', '2023-04-12', 'pria', 'Verawati Ayuba', '1'),
(157, '7503075505200001', 'Aisyah Dewi Makuta', '2023-04-12', 'wanita', 'Dian H Pakaya', '1'),
(158, '7503072001210002', 'Angga Saputra Ishak', '2023-04-12', 'pria', 'Nurhayati Isa', '1'),
(159, '7503070605200003', 'Arumi Alfatinnisa Paneo', '2023-04-12', 'wanita', 'Melisa Soi', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hsitory`
--

CREATE TABLE `hsitory` (
  `id_history` int NOT NULL,
  `berat_badan` float NOT NULL,
  `tinggi_badan` float NOT NULL,
  `lingkar_kepala` float NOT NULL,
  `tgl_periksa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_imun` int NOT NULL,
  `id_status` int NOT NULL,
  `id_balita` int NOT NULL,
  `id_validasi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hsitory`
--

INSERT INTO `hsitory` (`id_history`, `berat_badan`, `tinggi_badan`, `lingkar_kepala`, `tgl_periksa`, `id_imun`, `id_status`, `id_balita`, `id_validasi`) VALUES
(96, 2, 2, 23, '2023-04-12 10:22:37', 2, 1, 142, 1),
(97, 8, 55, 25, '2023-04-12 10:26:43', 2, 1, 143, 1),
(98, 22, 23, 24, '2023-04-12 14:24:04', 1, 1, 144, 2),
(99, 23, 44, 34, '2023-04-13 05:01:47', 2, 1, 145, 0),
(100, 23, 34, 34, '2023-04-13 05:03:14', 1, 1, 146, 0),
(101, 2, 2, 2, '2023-04-13 05:04:37', 1, 3, 147, 0),
(102, 12, 23, 44, '2023-04-13 05:17:26', 2, 1, 148, 0),
(103, 1, 1, 1, '2023-04-13 04:56:27', 2, 3, 149, 0),
(104, 3, 46, 10, '2023-04-13 04:44:16', 2, 2, 150, 0),
(105, 4, 16, 11, '2023-04-13 04:45:06', 1, 1, 152, 0),
(106, 4, 16, 11, '2023-04-13 04:46:07', 2, 1, 151, 0),
(107, 2, 2, 2, '2023-04-13 20:46:27', 2, 3, 153, 0),
(108, 2, 2, 2, '2023-04-13 20:55:02', 1, 3, 154, 0);

-- --------------------------------------------------------

--
-- Table structure for table `imun`
--

CREATE TABLE `imun` (
  `id_imun` int NOT NULL,
  `nama_imun` enum('polio','campak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `imun`
--

INSERT INTO `imun` (`id_imun`, `nama_imun`) VALUES
(1, 'polio'),
(2, 'campak');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `nama_status` enum('normal','baik','buruk') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'normal'),
(2, 'baik'),
(3, 'buruk');

-- --------------------------------------------------------

--
-- Table structure for table `t_informasi`
--

CREATE TABLE `t_informasi` (
  `id_history` int NOT NULL,
  `informasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_validasi`
--

CREATE TABLE `t_validasi` (
  `id_validasi` int NOT NULL,
  `nama_validasi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_validasi`
--

INSERT INTO `t_validasi` (`id_validasi`, `nama_validasi`) VALUES
(0, ''),
(1, 'Valid'),
(2, 'tidak valid');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int NOT NULL,
  `image` varchar(128) NOT NULL,
  `is_active` int NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `role_id`, `image`, `is_active`, `nama`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 'default.jpg', 1, 'ADMIN'),
(2, 'register@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 'default.jpg', 1, 'PETUGAS REGISTER'),
(3, 'petugas@gmail.com', '202cb962ac59075b964b07152d234b70', 3, 'default.jpg', 1, 'Petugas Posyandu'),
(5, 'dokter@gmail.com', '202cb962ac59075b964b07152d234b70', 4, 'default.jpg', 1, 'Dokter'),
(6, 'ibu@gmail.com', '202cb962ac59075b964b07152d234b70', 5, 'default.jpg', 1, 'Ibu Balita');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access_menu` int NOT NULL,
  `role_id` int NOT NULL,
  `id_menu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access_menu`, `role_id`, `id_menu`) VALUES
(1, 1, 1),
(9, 1, 11),
(10, 1, 12),
(20, 2, 11),
(35, 3, 10),
(38, 4, 10),
(46, 5, 10),
(48, 1, 20),
(53, 2, 10),
(54, 3, 12),
(55, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(10, 'Home'),
(11, 'Daftar Balita'),
(12, 'Data'),
(20, 'Rekapan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'petugas register'),
(3, 'petugas posyandu'),
(4, 'dokter'),
(5, 'ibu balita');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub_menu` int NOT NULL,
  `id_menu` int NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub_menu`, `id_menu`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'Menu Management', 'menu', 'fas fa-fw fa-solid fa-folder', 1),
(3, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-solid fa-folder', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(9, 10, 'Halaman Utama', 'halaman_utama', 'fas fa-fw fa-solid fa-home', 1),
(10, 11, 'Dusun I', 'dusun1', 'fas fa-fw fa-duotone fa-id-card', 1),
(11, 11, 'Dusun II', 'dusun2', 'fas fa-fw fa-duotone fa-id-card', 1),
(12, 11, 'Dusun III', 'dusun3', 'fas fa-fw fa-duotone fa-id-card', 1),
(13, 12, 'Data Balita', 'data_balita', 'fas fa-fw fa-duotone fa-id-card', 1),
(15, 2, 'Profil Petugas', 'petugas1', 'fas fa-fw fa-solid fa-user', 1),
(19, 20, 'Rekapan Data', 'rekapan', 'fas fa-fw fa-solid fa-folder-open', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balita`
--
ALTER TABLE `balita`
  ADD PRIMARY KEY (`id_balita`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `hsitory`
--
ALTER TABLE `hsitory`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_imun` (`id_imun`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_balita` (`id_balita`),
  ADD KEY `id_validasi` (`id_validasi`);

--
-- Indexes for table `imun`
--
ALTER TABLE `imun`
  ADD PRIMARY KEY (`id_imun`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `t_informasi`
--
ALTER TABLE `t_informasi`
  ADD KEY `id_history` (`id_history`);

--
-- Indexes for table `t_validasi`
--
ALTER TABLE `t_validasi`
  ADD PRIMARY KEY (`id_validasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_ibfk_1` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access_menu`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`id_menu`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balita`
--
ALTER TABLE `balita`
  MODIFY `id_balita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `hsitory`
--
ALTER TABLE `hsitory`
  MODIFY `id_history` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `imun`
--
ALTER TABLE `imun`
  MODIFY `id_imun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_informasi`
--
ALTER TABLE `t_informasi`
  MODIFY `id_history` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_validasi`
--
ALTER TABLE `t_validasi`
  MODIFY `id_validasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hsitory`
--
ALTER TABLE `hsitory`
  ADD CONSTRAINT `hsitory_ibfk_1` FOREIGN KEY (`id_imun`) REFERENCES `imun` (`id_imun`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hsitory_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hsitory_ibfk_3` FOREIGN KEY (`id_balita`) REFERENCES `balita` (`id_balita`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `hsitory_ibfk_4` FOREIGN KEY (`id_validasi`) REFERENCES `t_validasi` (`id_validasi`) ON UPDATE CASCADE;

--
-- Constraints for table `t_informasi`
--
ALTER TABLE `t_informasi`
  ADD CONSTRAINT `t_informasi_ibfk_1` FOREIGN KEY (`id_history`) REFERENCES `hsitory` (`id_history`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
