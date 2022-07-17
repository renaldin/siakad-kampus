-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 03:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-siakad-kampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `kode_dosen` varchar(10) DEFAULT NULL,
  `nidn` varchar(10) DEFAULT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `foto_dosen` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `kode_dosen`, `nidn`, `nama_dosen`, `foto_dosen`, `password`) VALUES
(1, 'DSN00001', '1111111111', 'Mardaliues, M.Kom', 'dosen.jpg', '1234'),
(2, 'DSN00002', '1111111112', 'Lius, M.Kom', 'dosen.jpg', '1234'),
(3, 'DSN00003', '1111111113', 'Marwan, M.Kom', 'dosen.jpg', '1234'),
(4, 'DSN00004', '1111111114', 'Badu, M.Kom', 'dosen.jpg', '1234'),
(5, 'DSN00005', '1111111115', 'Ada Udi, M.Kom', 'dosen.jpg', '1234'),
(6, 'DSN00006', '1111111116', 'Afdhal, M.Kom', 'dosen.jpg', '1234'),
(7, 'DSN00007', '1111111117', 'Afrisawati, M.Kom', 'dosen.jpg', '1234'),
(8, 'DSN00008', '1111111118', 'Ahmad, M.Kom', 'dosen.jpg', '1234'),
(9, 'DSN00009', '1111111119', 'Akmal, M.Hum', 'dosen.jpg', '1234'),
(10, 'DSN00010', '1111111120', 'Akmal Nasution, M.Kom', 'dosen.jpg', '1234'),
(11, 'DSN00011', '1111111121', 'Andy Safta, M.Pd., M.Si', 'dosen.jpg', '1234'),
(12, 'DSN00012', '1111111122', 'Arridha Zikra Syah, M.Kom', 'dosen.jpg', '1234'),
(13, 'DSN00013', '1111111123', 'Cecep Maulana, M.Si', 'dosen.jpg', '1234'),
(14, 'DSN00014', '1111111124', 'Citra Latiffani, M.Hum', 'dosen.jpg', '1234'),
(15, 'DSN00015', '1111111125', 'Dewi Angraeni, M.Kom', 'dosen.jpg', '1234'),
(16, 'DSN00016', '1111111126', 'Edi Kurniawan, M.Kom', 'dosen.jpg', '1234'),
(17, 'DSN00017', '1111111127', 'Elly Rahayu, M.M', 'dosen.jpg', '1234'),
(18, 'DSN00018', '1111111128', 'Febby Madonna, M.Hum', 'dosen.jpg', '1234'),
(19, 'DSN00019', '1111111129', 'Febrp Distyan, M.Kom', 'dosen.jpg', '1234'),
(20, 'DSN00020', '1111111130', 'Guntur Mana Putra, M.Kom', 'dosen.jpg', '1234'),
(21, 'DSN00021', '1111111131', 'Hambali, M.Kom', 'dosen.jpg', '1234'),
(22, 'DSN00022', '1111111132', 'Hommy Dorthy, S.T., M.M', 'dosen.jpg', '1234'),
(23, 'DSN00023', '1111111133', 'Irianto, M.Kom', 'dosen.jpg', '1234'),
(24, 'DSN00024', '1111111134', 'Jeferson Hutanaen, M.Kom', 'dosen.jpg', '1234'),
(25, 'DSN00025', '1111111135', 'Mahardika Ardi, M.Kom', 'dosen.jpg', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(2) NOT NULL,
  `fakultas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `fakultas`) VALUES
(2, 'Ilmu Ekonomi'),
(3, 'Ilmu Pendidikan'),
(4, 'Ilmu Komputer'),
(5, 'Ilmu Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` int(2) NOT NULL,
  `gedung` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `gedung`) VALUES
(1, 'Gedung A'),
(2, 'Gedung B'),
(4, 'Gedung D'),
(5, 'Gedung E'),
(8, 'Gedung F');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_prodi` int(2) DEFAULT NULL,
  `id_tahun_akademik` int(4) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mata_kuliah` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `id_ruangan` int(2) NOT NULL,
  `quota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_prodi`, `id_tahun_akademik`, `id_kelas`, `id_mata_kuliah`, `id_dosen`, `hari`, `waktu`, `id_ruangan`, `quota`) VALUES
(1, 1, 1, 1, 1, 1, 'Senin', '08:00 - 10:30', 1, 32),
(4, 2, 1, 6, 4, 16, 'Senin', '13:00 - 16:00', 2, 32),
(6, 1, 1, 1, 9, 12, 'Rabu', '13:00 - 16:00', 3, 32),
(7, 1, 1, 1, 11, 11, 'Kamis', '13:00 - 16:00', 6, 32),
(8, 2, 1, 6, 3, 6, 'Selasa', '13:00 - 16:00', 3, 32),
(10, 1, 1, 2, 11, 11, 'Selasa', '13:00 - 15:00', 3, 32),
(11, 1, 1, 3, 11, 11, 'Senin', '13:00 - 15:00', 3, 32);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL,
  `id_prodi` int(2) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `tahun_angkatan` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_prodi`, `id_dosen`, `tahun_angkatan`) VALUES
(1, 'SI-A', 1, 25, 2020),
(2, 'SI-B', 1, 24, 2020),
(3, 'SI-C', 1, 23, 2020),
(5, 'SK-A', 2, 22, 2020),
(6, 'SK-B', 2, 21, 2020),
(7, 'SK-C', 2, 20, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `id_tahun_akademik` int(11) DEFAULT NULL,
  `p1` int(1) DEFAULT 0,
  `p2` int(1) DEFAULT 0,
  `p3` int(1) DEFAULT 0,
  `p4` int(1) DEFAULT 0,
  `p5` int(1) DEFAULT 0,
  `p6` int(1) DEFAULT 0,
  `p7` int(1) DEFAULT 0,
  `p8` int(1) DEFAULT 0,
  `p9` int(1) DEFAULT 0,
  `p10` int(1) DEFAULT 0,
  `p11` int(1) DEFAULT 0,
  `p12` int(1) DEFAULT 0,
  `p13` int(1) DEFAULT 0,
  `p14` int(1) DEFAULT 0,
  `p15` int(1) DEFAULT 0,
  `p16` int(1) DEFAULT 0,
  `p17` int(1) DEFAULT 0,
  `p18` int(1) DEFAULT 0,
  `nilai_tugas` int(3) DEFAULT 0,
  `nilai_uts` int(3) DEFAULT 0,
  `nilai_uas` int(3) DEFAULT 0,
  `nilai_akhir` int(3) DEFAULT 0,
  `nilai_huruf` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id_krs`, `id_mahasiswa`, `id_jadwal`, `id_tahun_akademik`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `nilai_huruf`) VALUES
(9, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(10, 1, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(11, 1, 7, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 80, 80, 80, 83, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `id_prodi` int(2) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fotomahasiswa` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama_mahasiswa`, `id_prodi`, `password`, `fotomahasiswa`, `id_kelas`) VALUES
(1, '10107001', 'Mahasiswa 1', 1, '1234', '1641401489_e61c87670fb55309f100.png', 1),
(2, '10107002', 'Mahasiswa 2', 1, '1234', '1641401527_4044c2d78f612f33cc37.png', 1),
(3, '10107003', 'Mahasiswa 3', 1, '1234', '1641401555_e5419847fd17efbe52aa.png', 1),
(4, '10107004', 'Mahasiswa 4', 2, '1234', '1641401580_cee3913ad5564372c249.png', 5),
(5, '10107005', 'Mahasiswa 5', 2, '1234', '1641401618_dabf78ac03004f824eaf.png', 5),
(6, '10107006', 'Mahasiswa 6', 2, '1234', '1641401639_ede25503b1d29e2c22c6.png', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_mata_kuliah` int(11) NOT NULL,
  `kode_mata_kuliah` varchar(11) DEFAULT NULL,
  `mata_kuliah` varchar(255) DEFAULT NULL,
  `sks` int(1) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `smt` int(1) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_mata_kuliah`, `kode_mata_kuliah`, `mata_kuliah`, `sks`, `kategori`, `smt`, `semester`, `id_prodi`) VALUES
(1, 'SKPK101', 'Pendidikan Agama', 2, 'Wajib', 1, 'Ganjil', 2),
(3, 'SKPK103', 'Pendidikan Kewarganegaraan', 2, 'Wajib', 1, 'Ganjil', 2),
(4, 'SKPK104', 'Bahasa Inggris 1', 2, 'Wajib', 1, 'Ganjil', 2),
(5, 'SKPK105', 'Fisika Dasar', 2, 'Wajib', 1, 'Ganjil', 2),
(9, 'SIPK101', 'Pemrograman Dasar 1', 3, 'Wajib', 1, 'Ganjil', 1),
(10, 'SIPK102', 'Matematika Diskrit ', 3, 'Wajib', 1, 'Ganjil', 1),
(11, 'SIPK103', 'Pengantar Teknologi Dan Informasi', 3, 'Wajib', 1, 'Ganjil', 1),
(12, 'SIPK104', 'Pengolahan Data Dan Informasi', 3, 'Wajib', 1, 'Ganjil', 1),
(13, 'SIPK201', 'Pemrograman Dasar 2', 3, 'Wajib', 2, 'Genap', 1),
(14, 'SIPK202', 'Sistem Operasi', 3, 'Wajib', 1, 'Ganjil', 1),
(15, 'SIPK301', 'Pemrograman Berbasis Objek', 3, 'Wajib', 3, 'Ganjil', 1),
(16, 'SIPK302', 'Sistem Informasi Manajemen', 4, 'Wajib', 3, 'Ganjil', 1),
(17, 'SIPK401', 'Pemrograman Web', 3, 'Wajib', 4, 'Genap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(2) NOT NULL,
  `id_fakultas` int(2) DEFAULT NULL,
  `kode_prodi` varchar(10) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `jenjang` varchar(10) NOT NULL,
  `ka_prodi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `kode_prodi`, `prodi`, `jenjang`, `ka_prodi`) VALUES
(1, 4, 'SI', 'Sistem Informasi', 'D3', 'Jeferson Hutanaen, M.Kom'),
(2, 4, 'SK', 'Sistem Komputer', 'S1', 'Irianto, M.Kom'),
(3, 4, 'TI', 'Teknik Informatika', 'D4', 'Hommy Dorthy, S.T., M.M'),
(6, 2, 'AK', 'Akuntansi', 'S1', 'Mahardika Ardi, M.Kom');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(2) NOT NULL,
  `id_gedung` int(2) DEFAULT NULL,
  `ruangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `id_gedung`, `ruangan`) VALUES
(1, 1, 'A1'),
(2, 1, 'A2'),
(3, 1, 'A3'),
(4, 1, 'A4'),
(5, 1, 'A5'),
(6, 1, 'A6'),
(7, 1, 'Lab A1'),
(8, 1, 'Lab A2');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_tahun_akademik` int(4) NOT NULL,
  `tahun_akademik` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_tahun_akademik`, `tahun_akademik`, `semester`, `status`) VALUES
(1, '2020-2021', 'Ganjil', 1),
(2, '2020-2021', 'Genap', 0),
(3, '2021/2022', 'Ganjil', 0),
(4, '2021/2022', 'Genap', 0),
(6, '2022/2023', 'Ganjil', 0),
(7, '2022/2023', 'Genap', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `foto`) VALUES
(1, 'Renaldi Noviandi', 'admin', 'admin', 'foto.jpg'),
(2, 'Fajar', 'fajar', 'fajar', 'user2.jpg'),
(5, 'Renaldi', 'renaldi', 'renaldi', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_mata_kuliah`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_mata_kuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_tahun_akademik` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
