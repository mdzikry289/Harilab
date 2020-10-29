-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2020 at 04:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harilab`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_client`
--

CREATE TABLE `tb_client` (
  `id_client` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_client`
--

INSERT INTO `tb_client` (`id_client`, `nama`, `image`) VALUES
('5f5531aad34bf', 'Yayasan Pendidikan Telkom', '5f5531aad34bf.jpg'),
('5f5531f573cbe', 'Akademi Telkom Jakarta', '5f5531f573cbe.jpg'),
('5f5532254730d', 'Mizan Amanah', '5f5532254730d.jpg'),
('5f63b604152b7', 'Bagong', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_intro`
--

CREATE TABLE `tb_intro` (
  `id_intro` varchar(25) NOT NULL,
  `isi_konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(25) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `image`) VALUES
('5f641f80c987b', 'Wedding Virtual', 'default.jpg'),
('5f641f854fb75', 'Prewedding', 'default.jpg'),
('5f641f9cad859', 'Video Clip', 'default.jpg'),
('5f641fb358b38', 'Event Virtual', 'default.jpg'),
('5f641fc107210', 'Event Organizer', 'default.jpg'),
('5f641fea3c0ac', 'Multimedia Streaming System', 'default.jpg'),
('5f641ff9d7910', 'TV Commercial', 'default.jpg'),
('5f642158a6687', 'Behind The Scenes', 'default.jpg'),
('5f6440f2c37f6', '3D Animation', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_proyek`
--

CREATE TABLE `tb_proyek` (
  `id_proyek` varchar(100) NOT NULL,
  `nama_proyek` varchar(150) NOT NULL,
  `url` varchar(90) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `category` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_proyek`
--

INSERT INTO `tb_proyek` (`id_proyek`, `nama_proyek`, `url`, `image`, `category`) VALUES
('5f54f5acd1cc3', 'Damaikan Rinduku - Marsya', 'https://www.youtube.com/watch?v=-pNdH3J6Zzc', '5f54f5acd1cc3.jpg', 'Video Clip'),
('5f54f84c28734', 'Penjahat Cinta - Marsya', 'https://www.youtube.com/watch?v=CvYMJxXifo0', '5f54f84c28734.jpg', 'Video Clip'),
('5f54f96978a47', 'Neal - Bertahan', 'https://www.youtube.com/watch?v=L0TLX_KPgVU', '5f54f96978a47.jpg', 'Video Clip'),
('5f54fa93b8c10', 'GG Givani Gumilang - Biasa-Biasa Saja', 'https://www.youtube.com/watch?v=gPmlfntQ4YI', '5f54fa93b8c10.jpg', 'Video Clip'),
('5f54fc82950be', 'Konser Amal Cegah Musibah Dengan Sedekah Mizan Amanah', 'https://www.youtube.com/watch?v=w4blz3RdTyA', '5f54fc82950be.jpg', 'Event Virtual '),
('5f550024af76d', 'Konser Amal Kado Cinta Untuk Mereka', 'https://www.youtube.com/watch?v=voyF-bpOzG0', '5f550024af76d.jpg', 'Event Virtual '),
('5f550129ea0b7', 'Ghea & Ghia - Lebaran 2020 (Official Music Video)', 'https://www.youtube.com/watch?v=Ff2E8SYSMsE', '5f550129ea0b7.jpg', 'Video Clip'),
('5f55024f742ee', 'Kiki DJ Jatuh Cinta (HD official video)', 'https://www.youtube.com/watch?v=cL-YGz6AcW4', '5f55024f742ee.jpg', 'Video Clip'),
('5f5504a9a29f1', 'Dygta - Tersiksa Rindu - Official Lyrics Video - Ost. Samudra Cinta', 'https://www.youtube.com/watch?v=hROuAI0TBCo', '5f5504a9a29f1.jpg', 'Video Clip'),
('5f5505110c500', 'Tegar - Tersiksa Rindu (Dygta Cover)', 'https://www.youtube.com/watch?v=k2nYqXGrv8s', '5f5505110c500.jpg', 'Video Clip'),
('5f55347746dfc', 'Telkom Campus Jakarta, Kampus Millennial berbasis ICT!', 'https://www.youtube.com/watch?v=PDXgWUb8_jY', '5f55347746dfc.jpg', 'Digital Video Product');

-- --------------------------------------------------------

--
-- Table structure for table `tb_team`
--

CREATE TABLE `tb_team` (
  `id_anggota` varchar(20) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `instagram` varchar(45) NOT NULL,
  `twitter` varchar(45) NOT NULL,
  `fb` varchar(45) NOT NULL,
  `linkedin` varchar(45) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_team`
--

INSERT INTO `tb_team` (`id_anggota`, `nama_anggota`, `jabatan`, `instagram`, `twitter`, `fb`, `linkedin`, `image`) VALUES
('5f552bf343152', 'M Zikri', 'Konsultan Pertanian', 'https://www.instagram.com/zikuri_/', '#', 'https://www.facebook.com/zikry.28', 'https://www.linkedin.com/in/muhamad-zikri-953', '5f552bf343152.jpg'),
('5f552ff6b1081', 'Hari AJ', 'Direktur', 'https://www.instagram.com/hari_aj/', '#', '#', '#', '5f552ff6b1081.jpg'),
('5f55308e6c7a7', 'Andi Kunil', 'Audio Visual', 'https://www.instagram.com/andi_kunil99/', '#', '#', '#', '5f55308e6c7a7.jpg'),
('5f5531207fff6', 'Yagi Eriansyah', 'Audio Visual', 'https://www.instagram.com/yagiersh/', '#', '#', '#', '5f5531207fff6.png'),
('5f5532ef2d721', 'Agi Yasa', 'Audio Visual', 'https://www.instagram.com/agi_yasa/', '#', '#', '#', '5f5532ef2d721.jpg'),
('5f5590adea810', 'Sonny', 'Radio Promotion', 'https://www.instagram.com/sovan.sundawa/', '#', '#', '#', '5f5590adea810.jpg'),
('5f5593f45c5e6', 'Irwan Butonk', 'Audio Visual', 'https://www.instagram.com/irwan_butonk/', '#', '#', '#', '5f5593f45c5e6.jpg'),
('5f559c363b266', 'Rachmat Al_fatir', 'Audio Visual', 'https://www.instagram.com/kowy1933/', '#', '#', '#', '5f559c363b266.jpg'),
('5f55a73f35d3e', 'Indra Budiman', 'Supervisi', 'https://www.instagram.com/indrakameswara73/', '#', '#', '#', '5f55a73f35d3e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(150) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` enum('SuperAdmin','Admin','Staff') NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama_user`, `username`, `password`, `level`, `image`) VALUES
(1, 'Administrator', 'admin', 'admin', 'SuperAdmin', 'default.jpg'),
(4, 'Hari AJ', 'Hari AJ', 'admin', 'Admin', 'default.jpg'),
(5, 'Staff Harilab', 'staff', 'staff', 'Staff', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_proyek`
--
ALTER TABLE `tb_proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `tb_team`
--
ALTER TABLE `tb_team`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
