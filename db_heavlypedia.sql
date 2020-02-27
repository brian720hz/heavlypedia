-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2020 at 05:05 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_heavlypedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `latitude` double NOT NULL,
  `longtitude` double NOT NULL,
  `gambar` varchar(50) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_admin`
--

INSERT INTO `akun_admin` (`id_admin`, `username`, `password`, `nama_admin`, `alamat`, `no_telp`, `latitude`, `longtitude`, `gambar`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Rumah Sakit Tes', 'Tes alamat rumah sakit', '081123456789', -6.892027, 107.5680614, 'foto_admin_id_11.jpg'),
(2, 'admin2', 'admin2', 'Klinikmaju mundur', 'aaaa', '0123', -6.974027999999999, 107.6305287, 'default.png'),
(3, 'admin3', 'admin3', 'RS Umum Bandung', 'aaa', '123', -6.915671, 107.6637222, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `akun_pasien`
--

CREATE TABLE `akun_pasien` (
  `id_pasien` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gambar` varchar(50) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_pasien`
--

INSERT INTO `akun_pasien` (`id_pasien`, `username`, `password`, `nama_pasien`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `email`, `gambar`) VALUES
(1, 'aaa', 'aaaaaa', 'Fikri Sabriansyah', 'Thursday 16 January 2020', 'Laki-laki', 'Tes alamat', '081123456789', 'tes@gmail.com', 'default.png'),
(2, 'bbb', 'bbbbbb', 'bbb', '2010-10-28', 'Perempuan', 'bbb', '111', 'bbb@gmail.com', 'default.png'),
(3, 'ccc', 'cccccc', 'ccc', '2020-02-05', 'Perempuan', 'ccc', '000', 'ccc@gmail.com', 'default.png'),
(4, 'ddd', 'dddddd', 'ddd', '14/03/1996', 'Laki-laki', 'ddd', '0123', 'ddd@gmail.com', 'default.png'),
(5, 'eee', 'eeeeee', 'eee', 'Thursday 02 January 1977', 'Laki-laki', 'eee', '012', 'eee@gmail.com', 'default.png'),
(6, 'testes1', '65ab74e238af04a5d2ed2f0197cc30237b87d2e2cf973224ffd93865df39cbe1', 'testes', 'Thursday 05 January 2020', 'Laki-laki', 'testes', '122', 'testes@gmail.com', 'foto_pasien_id_6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` varchar(32) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `tgl_booking` varchar(50) NOT NULL,
  `jam_booking` time NOT NULL,
  `poli` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Menunggu Konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_admin`, `id_dokter`, `id_pasien`, `nama_pasien`, `nama_dokter`, `nama_admin`, `tgl_booking`, `jam_booking`, `poli`, `status`) VALUES
('5e459fb3daa46', 3, 7, 1, 'Fikri Sabriansyah', 'dokter bandung.sp.tht', 'RS Umum Bandung', 'Tuesday 18 February 2020', '10:00:00', 'THT', 'On Progress'),
('5e45a2b22997b', 1, 3, 1, 'Fikri Sabriansyah', 'Dokter Subadrun', 'RS Umum Bandung', 'Tuesday 11 February 2020', '10:00:00', 'THT', 'On Progress'),
('5e45a480b6c3b', 3, 7, 1, 'Fikri Sabriansyah', 'dokter bandung.sp.tht', 'RS Umum Bandung', 'Tuesday 11 February 2020', '10:00:00', 'THT', 'On Progress'),
('5e45ab93224cd', 1, 3, 1, 'Fikri Sabriansyah', 'Dokter Subadrun', 'Rumah Sakit Tes', 'Tuesday 11 February 2020', '10:00:00', 'THT', 'Confirmed'),
('5e45aecdd4a3f', 1, 3, 1, 'Fikri Sabriansyah', 'Dokter Subadrun', 'Rumah Sakit Tes', 'Tuesday 04 February 2020', '10:00:00', 'THT', 'Confirmed'),
('5e55878f05d56', 3, 3, 6, 'testes', 'dokter luar biasa', 'RS Umum Bandung', 'Friday 28 February 2020', '10:00:00', 'THT', 'Menunggu Konfirmasi'),
('5e5587a8b223b', 3, 7, 6, 'testes', 'dokter bandung.sp.tht', 'RS Umum Bandung', 'Friday 28 February 2020', '09:00:00', 'THT', 'Dikonfirmasi'),
('5e5594e57f6fd', 3, 3, 6, 'testes', 'dokter luar biasa', 'RS Umum Bandung', 'Friday 28 February 2020', '10:00:00', 'THT', 'Menunggu Konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_admin`, `nama_dokter`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
(3, 1, 'dokter luar biasa', 'Thursday 09 January 2020', 'Perempuan', 'aaa', '123'),
(5, 1, 'FIkri Sabriansyah', 'Friday 07 February 2020', 'Laki-laki', 'tes alamat', '123'),
(7, 3, 'dokter bandung.sp.tht', 'Thursday 13 February 2020', 'Laki-laki', 'aaa', '123');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id_jadwal` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `poli` varchar(100) NOT NULL,
  `hari_praktek` varchar(20) NOT NULL,
  `mulai_praktek` time NOT NULL,
  `selesai_praktek` time NOT NULL,
  `kuota` int(11) NOT NULL,
  `kuota_sekarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id_jadwal`, `id_dokter`, `id_admin`, `nama_dokter`, `poli`, `hari_praktek`, `mulai_praktek`, `selesai_praktek`, `kuota`, `kuota_sekarang`) VALUES
(4, 3, 1, 'dokter luar biasa', 'THT', 'Jumat', '00:00:00', '12:00:00', 5, 5),
(7, 7, 3, 'dokter bandung.sp.tht', 'THT', 'Jumat', '08:00:00', '12:00:00', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`) VALUES
(1, 'THT'),
(2, 'Kehamilan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akun_pasien`
--
ALTER TABLE `akun_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `akun_pasien`
--
ALTER TABLE `akun_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
