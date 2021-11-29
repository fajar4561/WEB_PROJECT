-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Nov 2021 pada 08.48
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db06`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `kode_pegawai` varchar(55) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelamin` varchar(25) NOT NULL,
  `agama` varchar(55) NOT NULL,
  `tmptlahir` varchar(100) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(55) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `kode_pegawai`, `nama`, `kelamin`, `agama`, `tmptlahir`, `tgllahir`, `alamat`, `jabatan`, `email`, `telpon`, `username`, `password`, `foto`) VALUES
(1, 'STF001', 'FAJAR MAULANA SHIDIQ', 'laki-laki', 'Islam', 'MADIUN', '1970-01-01', 'Tanjunganom', 'Pimpinan', 'maulanafajar751@gmail.com', '08980022735', 'fajar', 'fajar', 'e872359f13aff5024a060d3f725471316a11f94256833280ec697d04c0a1b104c351.jpg'),
(2, 'STF002', 'Adinda Dzikrina', 'perempuan', 'Islam', 'Kendal', '2021-12-08', 'Tanjunganom', 'Admin', 'dinda@gmail.com', '081776556445', 'dinda', 'dinda', 'Wajah Buatan - StyleGAN.jpg'),
(3, 'STF003', 'Nabiel Hisbullah', 'laki-laki', 'Islam', 'Kendal', '2021-11-15', 'Tanjunganom', 'Admin', 'nabiel@gmail.com', '085667889009', 'nabil', 'nabil', '42393387-9c5c-4be4-97b8-49260708719e.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
