-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2020 at 05:15 PM
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
  `id_client` int(11) NOT NULL,
  `nama_client` varchar(150) NOT NULL,
  `image_client` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_client`
--

INSERT INTO `tb_client` (`id_client`, `nama_client`, `image_client`) VALUES
(1, 'Yayasan Pendidikan Telkom', '5f5531aad34bf.jpg'),
(2, 'Akademi Telkom Jakarta', '5f5531f573cbe.jpg'),
(3, 'Mizan Amanah', '5f5532254730d.jpg'),
(4, 'Tegar Septian', 'default.jpg'),
(5, 'Givani Gumilang', 'default.jpg'),
(6, 'Marsya', 'default.jpg'),
(7, 'Ghea & Ghia', 'default.jpg'),
(8, 'Kiki DJ', 'default.jpg'),
(9, 'Neal Band', 'default.jpg'),
(13, 'Aris & Putri', 'Aris_Putri.jpg'),
(15, 'Dygta', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Direktur'),
(2, 'IT Support'),
(3, 'Audio Visual'),
(4, 'Radio Promotion'),
(5, 'Supervisi'),
(6, 'Staff Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `image_kategori` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `image_kategori`) VALUES
(1, 'Wedding Virtual', 'default.jpg'),
(2, 'Prewedding', 'default.jpg'),
(3, 'Video Clip', 'default.jpg'),
(4, 'Event Virtual', 'default.jpg'),
(5, 'Event Organizer', 'default.jpg'),
(7, 'TV Commercial', 'default.jpg'),
(8, 'Behind The Scenes', 'default.jpg'),
(10, '3D Animation', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_proyek`
--

CREATE TABLE `tb_proyek` (
  `id_proyek` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_proyek` varchar(75) NOT NULL,
  `url` varchar(90) NOT NULL,
  `image_proyek` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_proyek`
--

INSERT INTO `tb_proyek` (`id_proyek`, `id_client`, `id_anggota`, `id_kategori`, `nama_proyek`, `url`, `image_proyek`) VALUES
(1, 6, 1, 3, 'Damaikan Rinduku - Marsya', 'https://www.youtube.com/watch?v=-pNdH3J6Zzc', '5f54f5acd1cc3.jpg'),
(2, 6, 2, 3, 'Penjahat Cinta - Marsya', 'https://www.youtube.com/watch?v=CvYMJxXifo0', '5f54f84c28734.jpg'),
(3, 9, 3, 3, 'Neal - Bertahan', 'https://www.youtube.com/watch?v=L0TLX_KPgVU', '5f54f96978a47.jpg'),
(4, 5, 4, 3, 'GG Givani Gumilang - Biasa-Biasa Saja', 'https://www.youtube.com/watch?v=gPmlfntQ4YI', '5f54fa93b8c10.jpg'),
(5, 3, 5, 4, 'Konser Amal Cegah Musibah Dengan Sedekah Mizan Amanah', 'https://www.youtube.com/watch?v=w4blz3RdTyA', '5f54fc82950be.jpg'),
(6, 3, 6, 4, 'Konser Amal Kado Cinta Untuk Mereka', 'https://www.youtube.com/watch?v=voyF-bpOzG0', '5f550024af76d.jpg'),
(7, 7, 7, 3, 'Ghea & Ghia - Lebaran 2020 (Official Music Video)', 'https://www.youtube.com/watch?v=Ff2E8SYSMsE', '5f550129ea0b7.jpg'),
(8, 8, 8, 3, 'Kiki DJ Jatuh Cinta (HD official video)', 'https://www.youtube.com/watch?v=cL-YGz6AcW4', '5f55024f742ee.jpg'),
(9, 15, 9, 3, 'Dygta - Tersiksa Rindu - Official Lyrics Video - Ost. Samudra Cinta', 'https://www.youtube.com/watch?v=hROuAI0TBCo', '5f5504a9a29f1.jpg'),
(10, 4, 1, 3, 'Tegar - Tersiksa Rindu (Dygta Cover)', 'https://www.youtube.com/watch?v=k2nYqXGrv8s', '5f5505110c500.jpg'),
(11, 1, 2, 7, 'Telkom Campus Jakarta, Kampus Millennial berbasis ICT!', 'https://www.youtube.com/watch?v=PDXgWUb8_jY', '5f55347746dfc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_team`
--

CREATE TABLE `tb_team` (
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `instagram` varchar(45) NOT NULL,
  `twitter` varchar(45) NOT NULL,
  `fb` varchar(45) NOT NULL,
  `linkedin` varchar(45) NOT NULL,
  `image_team` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_team`
--

INSERT INTO `tb_team` (`id_anggota`, `id_user`, `nama_anggota`, `id_jabatan`, `instagram`, `twitter`, `fb`, `linkedin`, `image_team`) VALUES
(1, 2, 'Hari AJ', 1, 'https://www.instagram.com/hari_aj/', '#', '#', '#', '5f552ff6b1081.jpg'),
(2, 1, 'M Zikri', 2, 'https://www.instagram.com/zikuri_/', '#', 'https://www.facebook.com/zikry.28', 'https://www.linkedin.com/in/muhamad-zikri-953', '5f552bf343152.jpg'),
(3, 3, 'Andi Kunil', 6, 'https://www.instagram.com/andi_kunil99/', '#', '#', '#', '5f55308e6c7a7.jpg'),
(4, 3, 'Yagi Eriansyah', 3, 'https://www.instagram.com/yagiersh/', '#', '#', '#', '5f5531207fff6.png'),
(5, 3, 'Agi Yasa', 3, 'https://www.instagram.com/agi_yasa/', '#', '#', '#', '5f5532ef2d721.jpg'),
(6, 3, 'Sonny', 4, 'https://www.instagram.com/sovan.sundawa/', '#', '#', '#', '5f5590adea810.jpg'),
(7, 3, 'Irwan Butonk', 3, 'https://www.instagram.com/irwan_butonk/', '#', '#', '#', '5f5593f45c5e6.jpg'),
(8, 3, 'Rachmat Al Fatir', 3, 'https://www.instagram.com/kowy1933/', '#', '#', '#', '5f559c363b266.jpg'),
(9, 3, 'Indra Budiman', 5, 'https://www.instagram.com/indrakameswara73/', '#', '#', '#', '5f55a73f35d3e.jpg'),
(17, 3, 'Raden Gilvia Adinda Putri', 3, '#', '#', '#', '#', '17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('SuperAdmin','Admin','Staff') NOT NULL,
  `image_users` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama_user`, `username`, `password`, `level`, `image_users`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'SuperAdmin', 'default.jpg'),
(2, 'Direktur Harilab', 'direktur', '4fbfd324f5ffcdff5dbf6f019b02eca8', 'Admin', 'default.jpg'),
(3, 'Staff Harilab', 'staff', '1253208465b1efa876f982d8a9e73eef', 'Staff', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_proyek`
--
ALTER TABLE `tb_proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_team`
--
ALTER TABLE `tb_team`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `jabatan` (`id_jabatan`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_proyek`
--
ALTER TABLE `tb_proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_team`
--
ALTER TABLE `tb_team`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_proyek`
--
ALTER TABLE `tb_proyek`
  ADD CONSTRAINT `tb_proyek_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `tb_client` (`id_client`),
  ADD CONSTRAINT `tb_proyek_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`),
  ADD CONSTRAINT `tb_proyek_ibfk_3` FOREIGN KEY (`id_anggota`) REFERENCES `tb_team` (`id_anggota`);

--
-- Constraints for table `tb_team`
--
ALTER TABLE `tb_team`
  ADD CONSTRAINT `tb_team_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`),
  ADD CONSTRAINT `tb_team_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
