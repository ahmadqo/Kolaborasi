-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 04:59 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profil`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id_ar` int(5) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `isi` varchar(1000) DEFAULT NULL,
  `penulis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_ar`, `judul`, `isi`, `penulis`) VALUES
(1, 'Sayang', 'sayang opo kowe krungu jerite atiku\r\nmengharap engkau kembali\r\nsayang nganti memutih rambutku\r\nra bakal luntur tresnaku', 'qomar ganteng'),
(2, 'aju', 'ideo Tutorial Kursus Web Development Komplit Bangun 5 Project Website ini merupakan â€˜penunjuk arahâ€™ agar Anda yang sedang maupun baru akan terjun ke dalam dunia web development yang lebih mendalam memiliki peta perjalanan pembelajaran yang lebih terarah ', 'adada');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `kode` int(5) NOT NULL,
  `author` varchar(20) DEFAULT NULL,
  `nama_file` varchar(70) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`kode`, `author`, `nama_file`) VALUES
(38, 'Admin', 'SejarahMasyarakatMadani.doc'),
(39, 'Admin', 'LISTINGPERTEMUANKE-7.docx');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `password`, `nama_lengkap`, `akses`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin'),
('Qomaruddin', '676f215909d296fd2fac32cf24e81414', 'Ahmad Qomaruddin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_nilai`
--

CREATE TABLE IF NOT EXISTS `tabel_nilai` (
  `id_nilai` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `benar` int(4) NOT NULL,
  `salah` int(4) NOT NULL,
  `kosong` int(4) NOT NULL,
  `point` int(4) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_nilai`
--

INSERT INTO `tabel_nilai` (`id_nilai`, `id_user`, `benar`, `salah`, `kosong`, `point`, `tanggal`) VALUES
(1, 0, 0, 1, 0, 0, '2016-12-26'),
(2, 0, 1, 0, 0, 5, '2016-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_soal`
--

CREATE TABLE IF NOT EXISTS `tabel_soal` (
  `id_soal` int(4) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL,
  `pilihan_a` varchar(100) NOT NULL,
  `pilihan_b` varchar(100) NOT NULL,
  `pilihan_c` varchar(100) NOT NULL,
  `pilihan_d` varchar(100) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `publish` enum('yes','no') NOT NULL,
  `tipe` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_soal`
--

INSERT INTO `tabel_soal` (`id_soal`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `jawaban`, `publish`, `tipe`) VALUES
(6, 'PHP Adalah Singkatan Dari...', 'Hypertext Prepocessor', 'Prepocessor Hypertext', 'Hypertext Processing', 'Hypertext Processor', 'A', 'yes', 1),
(8, 'Type Yang Berfungsi Untuk Menerima Masukan Berupa Teks Dari Pengguna Adalah...', 'Checkbox', 'Button', 'Submit', 'Radio', 'B', 'no', 0),
(9, 'Perintah Apa Yang Dapat Menggabungkan Beberapa Kolom Menjadi Satu...', 'Text Area', 'Rowspan', 'Colspan', 'Br', 'C', 'yes', 0),
(10, 'Tag &lt;SELECT&gt; Digunakan Untuk...', 'Menampilkan Opsi Pilihan', 'Menandai Beberapa Opsi', 'Memilih Beberapa Opsi', 'Membatalkan Opsi', 'A', 'yes', 0),
(12, 'Perintah HTML Untuk Menentukan Tebal Garis Table Adalah&hellip;', 'Table Border', 'Align', 'Rowspan', 'Colspan', 'A', 'yes', 0),
(13, 'Jika Kita Menuliskan Perintah &ldquo;&amp;copy&rdquo;, Maka Pada Html Akan Muncul Tanda&hellip;', 'Â˜º', '&copy;', '&reg;', 'C', 'B', 'yes', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_ar`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_ar` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `kode` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
