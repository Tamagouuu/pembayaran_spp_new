-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2023 at 04:16 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembayaran_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int NOT NULL,
  `nama_kelas` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, 'X', 'Rekayasa Perangkat Lunak'),
(2, 'XII', 'Rekayasa Perangkat Lunak'),
(3, 'XII', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `nominal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `tahun_ajaran`, `nominal`) VALUES
(2, '2023/2024', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` enum('admin','petugas','siswa','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'petugas', 'petugas', 'petugas'),
(3, 'siswa', 'siswa', 'siswa'),
(13, 'sas', '$2y$10$swot63gtvu2ShzkaLMgo..fQNYX.KDCzwBx0TnApO51KUyWzrwO5i', 'siswa'),
(14, 'arya', '$2y$10$6RMCA4zws2WIjnErxruFAO4cXsgO4C6CF3XzaT5BYvqDfrG.oPkVW', 'siswa');

--
-- Triggers `pengguna`
--
DELIMITER $$
CREATE TRIGGER `addUser` AFTER INSERT ON `pengguna` FOR EACH ROW IF new.role = 'admin' THEN
INSERT INTO petugas VALUES (null, new.username, new.id);
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pengguna_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `pengguna_id`) VALUES
(1, 'admin', 1),
(2, 'petugas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `kelas_id` int NOT NULL,
  `pengguna_id` int NOT NULL,
  `pembayaran_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nis`, `nama`, `alamat`, `telepon`, `kelas_id`, `pengguna_id`, `pembayaran_id`) VALUES
(2, '1111111111', '11111', 'Siswa', 'Jl. Siswa', '082235471183', 1, 3, 2),
(3, '22222', '222', 'sas', 'sasa', '12', 1, 13, 2),
(4, '12132323', '23345', 'jalan', 'jalan', '99090950', 2, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `bulan_dibayar` int NOT NULL,
  `tahun_dibayar` int NOT NULL,
  `siswa_id` int NOT NULL,
  `petugas_id` int NOT NULL,
  `pembayaran_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_siswa`
-- (See below for the actual view)
--
CREATE TABLE `v_siswa` (
`id` int
,`nisn` varchar(10)
,`nis` varchar(5)
,`nama` varchar(50)
,`alamat` text
,`telepon` varchar(14)
,`kelas_id` int
,`pengguna_id` int
,`pembayaran_id` int
,`nama_kelas` varchar(10)
,`kompetensi_keahlian` varchar(50)
,`username` varchar(25)
,`password` varchar(128)
,`role` enum('admin','petugas','siswa','')
,`tahun_ajaran` varchar(9)
,`nominal` int
);

-- --------------------------------------------------------

--
-- Structure for view `v_siswa`
--
DROP TABLE IF EXISTS `v_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_siswa`  AS SELECT `siswa`.`id` AS `id`, `siswa`.`nisn` AS `nisn`, `siswa`.`nis` AS `nis`, `siswa`.`nama` AS `nama`, `siswa`.`alamat` AS `alamat`, `siswa`.`telepon` AS `telepon`, `siswa`.`kelas_id` AS `kelas_id`, `siswa`.`pengguna_id` AS `pengguna_id`, `siswa`.`pembayaran_id` AS `pembayaran_id`, `kelas`.`nama_kelas` AS `nama_kelas`, `kelas`.`kompetensi_keahlian` AS `kompetensi_keahlian`, `pengguna`.`username` AS `username`, `pengguna`.`password` AS `password`, `pengguna`.`role` AS `role`, `pembayaran`.`tahun_ajaran` AS `tahun_ajaran`, `pembayaran`.`nominal` AS `nominal` FROM (((`siswa` join `kelas` on((`kelas`.`id` = `siswa`.`kelas_id`))) join `pengguna` on((`pengguna`.`id` = `siswa`.`pengguna_id`))) join `pembayaran` on((`pembayaran`.`id` = `siswa`.`pembayaran_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `pengguna_id` (`pengguna_id`),
  ADD KEY `pembayaran_id` (`pembayaran_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `pembayaran_id` (`pembayaran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
