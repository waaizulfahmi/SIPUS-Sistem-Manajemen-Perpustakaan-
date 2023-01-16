-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 05:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama_admin`, `username`, `password`) VALUES
(2, 'Admin Ganteng', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(5) NOT NULL,
  `kd_anggota` varchar(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `statusanggota` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `kd_anggota`, `nama`, `jenis_kelamin`, `alamat`, `statusanggota`, `foto`) VALUES
(1023, 'AP210001', 'Wanda Aizul Fahmi', 'Pria', 'Banyumas ', 'Sedang Meminjam', ''),
(1024, 'AP210002', 'Arif Muhammad', 'Pria', 'Purwokerto', 'Tidak Meminjam', ''),
(1025, 'AP210003', 'Arif Budiman', 'Pria', 'Yogyakarta', 'Sedang Meminjam', ''),
(1026, 'AP210004', 'Steve Joseph', 'Pria', 'Semarang', 'Tidak Meminjam', 'AP210004.jpg'),
(1028, 'AP210005', 'Muh Adnan', 'Pria', 'Cilacap', 'Sedang Meminjam', 'AP210005.jpg'),
(1030, 'AP210006', 'Wendi', 'Pria', 'Kebumen', 'Tidak Meminjam', ''),
(1031, 'AP210007', 'Rizki Saifudin', 'Pria', 'Purbalingga', 'Sedang Meminjam', ''),
(1032, 'AP210008', 'Amalia ', 'Wanita', 'Wonosobo', 'Sedang Meminjam', ''),
(1033, 'AP210009', 'Indriyanti', 'Wanita', 'Klaten', 'Sedang Meminjam', 'AP210009.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `databuku`
--

CREATE TABLE `databuku` (
  `idbuku` int(5) NOT NULL,
  `kdbuku` text NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `statusbuku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `databuku`
--

INSERT INTO `databuku` (`idbuku`, `kdbuku`, `judul`, `kategori`, `pengarang`, `penerbit`, `statusbuku`) VALUES
(24, 'BU300801', 'Menjadi Remaja yang Baik', 'Komik', 'Muh Ahmad', 'Erlangga ', 'Tersedia'),
(25, 'BU300802', 'Meraih Mimpi', 'Novel', 'Ahmad', 'Citra Buana ', 'Tersedia'),
(26, 'BU300803', 'Boruto Series', 'Komik', 'Suzuki Maeda', 'Citra Buana ', 'Dipinjam'),
(27, 'BU300804', 'Laskar Pelangi', 'Pengetahuan', 'Siti Aminah', 'Erlangga ', 'Dipinjam'),
(28, 'BU300805', 'Web Developer  Sejati', 'Pengetahuan', 'Fahri Hamzah', 'Pratama ', 'Dipinjam'),
(29, 'BU300806', 'To Be Good Programmer', 'Pengetahuan', 'Steve Howard', 'BookEdu', 'Tersedia'),
(30, 'BU300807', 'Judul Apa Ya', 'Komik', 'Abdel', 'Jenaka Komik', 'Dipinjam'),
(31, 'BU300808', 'Web Programming', 'Pengetahuan', 'Hidayat ', 'Informatika', 'Tersedia'),
(32, 'BU300809', 'Programmer Handal ', 'Ensiklopedia', 'Ikhsan Maulana', 'Erlangga ', 'Dipinjam'),
(33, 'BU300810', 'Good Person', 'Pengetahuan', 'Steve Job', 'Erlangga ', 'Tersedia'),
(34, 'BU300811', 'Meraih Mimpi Langit', 'Ensiklopedia', 'Syarif', 'Persada Buana ', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kd_transaksi` varchar(8) CHARACTER SET utf8 NOT NULL,
  `id_anggota` int(5) NOT NULL,
  `idbuku` int(5) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kd_transaksi`, `id_anggota`, `idbuku`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(31, 'TS080001', 1020, 10, '2021-08-29', '2021-08-29'),
(34, 'TS80002', 1022, 18, '2021-08-29', '2021-08-29'),
(35, 'TS80003', 1019, 16, '2021-08-29', '2021-08-29'),
(36, 'TS80004', 1021, 17, '2021-08-29', '2021-08-29'),
(37, 'TS80005', 1020, 21, '2021-08-29', '2021-08-30'),
(38, 'TS80006', 1019, 20, '2021-08-30', '0000-00-00'),
(39, 'TS80007', 1024, 25, '2021-08-30', '2021-08-30'),
(40, 'TS80008', 1031, 28, '2021-08-30', '0000-00-00'),
(41, 'TS80009', 1026, 29, '2021-08-30', '0000-00-00'),
(42, 'TS80010', 1033, 27, '2021-08-30', '2021-08-30'),
(43, 'TS80011', 1024, 25, '2021-08-30', '2021-08-30'),
(44, 'TS80012', 1030, 30, '2021-08-30', '2021-08-30'),
(45, 'TS80013', 1028, 26, '2021-08-30', '0000-00-00'),
(46, 'TS80014', 1032, 32, '2021-08-30', '0000-00-00'),
(47, 'TS80015', 1025, 28, '2021-08-30', '0000-00-00'),
(48, 'TS80016', 1023, 27, '2021-08-30', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `databuku`
--
ALTER TABLE `databuku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1034;

--
-- AUTO_INCREMENT for table `databuku`
--
ALTER TABLE `databuku`
  MODIFY `idbuku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
