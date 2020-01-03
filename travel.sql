-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 07:18 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `kode_booking` int(11) NOT NULL,
  `tanggal_tour` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `id_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `id_destinasi` int(11) NOT NULL,
  `nama_destinasi` varchar(100) NOT NULL,
  `lokasi_destinasi` varchar(12) NOT NULL,
  `alamat_destinasi` varchar(100) NOT NULL,
  `image_destinasi` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`id_destinasi`, `nama_destinasi`, `lokasi_destinasi`, `alamat_destinasi`, `image_destinasi`, `description`) VALUES
(2, 'Jalan Malioboro', 'Yogyakarta', 'Jalan malioboro', 'malioboro.jpg', 'tempat jalan sobat ambyar				'),
(3, 'Alun Alun Kidul', 'Yogyakarta', 'Alun-Alun Kidul St, Patehan, Kraton, Yogyakarta City, Special Region of Yogyakarta 55133', 'alun-alunKidul.jpg', 'Tempat nongki santuy gaming stay classy		'),
(4, 'Air Terjun Sri Getuk', 'Gunung Kidul', 'Desa Bleberan, Kecamatan Playen, Kabupaten Gunungkidul, Yogyakarta', 'Air-Terjun-Sri-Gethuk.jpg', 'Yah air terjun, bodo amat dah			'),
(5, 'Pantai Siung', 'Gunung Kidul', 'Kec. Bumi sari natar, tepatnya berada di Dusun Duwet, Kelurahan Purwodadi, Kecamatan Tepus, Kabupate', 'pantai siung.jpg', 'Pantai nya enak, banyak air laut'),
(8, 'Pantai Pok Tunggal ', 'Gunung Kidul', 'Jalan Pantai pok Tunggal', 'pantai-pok-tunggal.jpg', 'ini pantai bos		'),
(12, 'Taman Pintar', 'Yogyakarta', 'Jalan Panembahan Senopati No. 1-3, Yogyakarta, Daerah Istimewa Yogyakarta 55122', 'TamanPintar.jpg', '		taman goblok			'),
(13, 'Taman Sari', 'Yogyakarta', 'Jalan Panembahan Senopati No. 1-3, Yogyakarta, Daerah Istimewa Yogyakarta 55122', 'tamansari.jpg', '			Ini Taman		');

-- --------------------------------------------------------

--
-- Table structure for table `mobil_travel`
--

CREATE TABLE `mobil_travel` (
  `kode_travell` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `image_travell` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil_travel`
--

INSERT INTO `mobil_travel` (`kode_travell`, `kapasitas`, `image_travell`) VALUES
(1, 8, 'mobil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paket_tour`
--

CREATE TABLE `paket_tour` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `destinasi` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `kode_travel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_tour`
--

INSERT INTO `paket_tour` (`id_paket`, `nama_paket`, `harga_paket`, `destinasi`, `description`, `kode_travel`) VALUES
(1, 'Yogyakarta Seharian', 500000, 'Taman Sari, Taman Ketandan, Malioboro', 'blablabla', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('pria','wanita') NOT NULL,
  `notelp` int(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `email`, `gender`, `notelp`, `address`, `status`) VALUES
('Admin', 'admin123', 'johan cllau', 'cllaujhohan@gmail.com', 'pria', 2147483647, 'janti', '1'),
('Galang krsnt', 'galang123', 'Galang Krisnanto', 'Galangkrsnt@gmail.com', 'pria', 2147483647, 'bantul', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`kode_booking`),
  ADD KEY `username` (`username`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`id_destinasi`);

--
-- Indexes for table `mobil_travel`
--
ALTER TABLE `mobil_travel`
  ADD PRIMARY KEY (`kode_travell`);

--
-- Indexes for table `paket_tour`
--
ALTER TABLE `paket_tour`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `kode_travell` (`kode_travel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `kode_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `id_destinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mobil_travel`
--
ALTER TABLE `mobil_travel`
  MODIFY `kode_travell` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paket_tour`
--
ALTER TABLE `paket_tour`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket_tour` (`id_paket`);

--
-- Constraints for table `paket_tour`
--
ALTER TABLE `paket_tour`
  ADD CONSTRAINT `paket_tour_ibfk_2` FOREIGN KEY (`kode_travel`) REFERENCES `mobil_travel` (`kode_travell`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
