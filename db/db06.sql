-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Des 2021 pada 18.33
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
-- Struktur dari tabel `beli`
--

CREATE TABLE `beli` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `komentar` varchar(1000) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beli`
--

INSERT INTO `beli` (`id`, `kode_transaksi`, `tgl_beli`, `nama`, `telpon`, `alamat`, `rating`, `komentar`, `total`) VALUES
(7, 'A05122021001', '2021-12-05', 'FAJAR MAULANA SHIDIQ', '0989098080', 'TANJUNGANOM', 4, 'Barang sangat bagus', 480000),
(8, 'A05122021002', '2021-12-05', 'Renaldi ivan wijaya ', '085667889009', 'Gringsing', 5, 'Barang Sesuai dengan Gambar dan sangat memuaskan', 590000),
(9, 'A05122021003', '2021-12-05', 'Muhammad Nur Fatoni', '085667889223', 'Weleri Jawa Tengah', 4, 'Produk sangat bagus dan Nyaman Dipakai', 110000),
(10, 'A05122021004', '2021-12-04', 'Andra Kusuma', '0851221334556', 'Gringsing', 3, 'Produk Ada Yang rusak. Mohon segera di chek kembali', 250000),
(11, 'A05122021005', '2021-12-03', 'Nabiel Hisbullah', '081998776334', 'Desa Rowosari', 3, 'Ukuran Sepatu tidak sesuai', 250000),
(12, 'A05122021006', '2021-12-06', 'Olikhin', '085443223445', 'Kendal', 4, 'Barang Sangat Bagus', 250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_beli`
--

CREATE TABLE `detail_beli` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `tgl_beli` date NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(1000) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `komentar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_beli`
--

INSERT INTO `detail_beli` (`id`, `kode_transaksi`, `tgl_beli`, `kode_produk`, `nama_produk`, `harga`, `jumlah`, `total`, `rating`, `komentar`) VALUES
(8, 'A05122021001', '2021-12-05', 'BRG002', 'Sepatu futsal junior eskudo 500', 480000, 1, 480000, 4, 'Barang sangat bagus'),
(9, 'A05122021002', '2021-12-05', 'BRG002', 'Sepatu futsal junior eskudo 500', 480000, 1, 480000, 5, 'Barang Sesuai dengan Gambar dan sangat memuaskan'),
(10, 'A05122021002', '2021-12-05', 'BRG001', 'sepatu specs pink', 110000, 1, 110000, 5, 'Barang Sesuai dengan Gambar dan sangat memuaskan'),
(11, 'A05122021003', '2021-12-05', 'BRG001', 'sepatu specs pink', 110000, 1, 110000, 4, 'Produk sangat bagus dan Nyaman Dipakai'),
(12, 'A05122021004', '2021-12-04', 'BRG003', 'adidas Energyfalcon Running Shoes', 250000, 1, 250000, 3, 'Produk Ada Yang rusak. Mohon segera di chek kembali'),
(13, 'A05122021005', '2021-12-03', 'BRG003', 'adidas Energyfalcon Running Shoes', 250000, 1, 250000, 3, 'Ukuran Sepatu tidak sesuai'),
(14, 'A05122021006', '2021-12-06', 'BRG003', 'adidas Energyfalcon Running Shoes', 250000, 1, 250000, 4, 'Barang Sangat Bagus');

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
(1, 'STF001', 'FAJAR MAULANA SHIDIQ', 'laki-laki', 'Islam', 'MADIUN', '1997-11-28', 'Tanjunganom', 'Pimpinan', 'maulanafajar751@gmail.com', '08980022735', 'fajar', 'fajar', 'e872359f13aff5024a060d3f725471316a11f94256833280ec697d04c0a1b104c351.jpg'),
(2, 'STF002', 'Adinda Dzikrina', 'perempuan', 'Islam', 'Kendal', '2021-12-08', 'Tanjunganom', 'Admin', 'dinda@gmail.com', '081776556445', 'dinda', 'dinda', 'Wajah Buatan - StyleGAN.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(55) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `katagori` varchar(100) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `terjual` int(11) NOT NULL,
  `rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kode_produk`, `nama_produk`, `katagori`, `deskripsi`, `stok`, `harga`, `foto`, `terjual`, `rating`) VALUES
(1, 'BRG001', 'sepatu specs pink', 'Sepatu Futsal', 'SIZE : 38,39,40,41,42,43,44\r\nHARGA SUDAH TERMASUK BOX/DUS, PAKCING RAPI.', 98, 110000, '6867700_018f05ad-52ac-4266-a43b-016553465106_1280_1280.jpg', 2, 4.5),
(2, 'BRG002', 'Sepatu futsal junior eskudo 500', 'Sepatu Futsal', 'Sepatu Futsal dengan bahan dan kualitas ori. \r\nNyaman dipakai', 98, 480000, 'eskudo-500-junior-futsal-boots-yellow.jpg', 2, 4.5),
(3, 'BRG003', 'adidas Energyfalcon Running Shoes', 'Sepatu untuk lari', 'Saptu Lari Pria tersedia berbagai macam ukuran dan varian. Topangan di bagian luar membuat sepatu running ini terasa pas dan membuat Anda dapat terus melanjutkan lari', 107, 250000, 'adidas_adidas_energyfalcon_running_shoes_sepatu_lari_pria_-eh3146-_full02_i7yicrsz (2).jpg', 3, 3.3),
(4, 'BRG004', 'ADIDAS Pro speed', 'Sepatu sepak bola', 'Berat: 750 Gram\r\nSize Charts :\r\n~ Size 34 = Panjang 23 cm\r\n~ Size 35 = Panjang 23.5 cm\r\n~ Size 36 = Panjang 24 cm\r\n~ Size 37 = Panjang 24.5 cm\r\n~ Size 38 = Panjang 25 cm\r\n\r\n*Ready size dapat berubah sewaktu-waktu karena terus dijual.\r\n\r\nCatatan:\r\n- Harga sudah lengkap dengan Box.\r\n- Harap cantumkan size dan warna di keterangan ketika melakukan order.\r\n- Jika tidak mencantumkan size maka akan kami kirim random.\r\n\r\nKemiripan warna asli dengan foto sekitar 80-95% bergantung pada resolusi layar maupun stok warna lain yg tersedia.', 100, 205000, '46670649_49f64f9a-050d-446e-8553-87806be8a924_700_700.jpg', 0, 0),
(5, 'BRG005', 'Sevenray 34-37 Dybala Hijau', 'Sepatu sepak bola', 'Sepatu Sepakbola Anak Sevenray Dybala Jr\r\n\r\nBahan : kulit sintetis (lembut, nyaman, dan tidak panas)\r\nOutsole : berbahan ringan lebih responsif untuk berlari dan menendang bola\r\n\r\nPanduan ukuran :\r\nUkuran 34 Panjang telapak kaki 21,5 cm\r\nUkuran 35 Panjang telapak kaki 22 cm\r\nUkuran 36 Panjang telapak kaki 22,5 cm\r\nUkuran 37 Panjang telapak kaki 23 cm\r\n\r\nBelanja langsung dari pabrik nya\r\n\"Khusus Kaki Orang Indonesia yg bisa pakai\"\r\n', 20, 100000, '16fc8cc2d2d8aa8aa3d613efb6bb112d.jpg', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_beli`
--
ALTER TABLE `detail_beli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `detail_beli`
--
ALTER TABLE `detail_beli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
