-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2023 pada 13.02
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_loker`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelamar`
--

CREATE TABLE `data_pelamar` (
  `id_data_pelamar` varchar(50) NOT NULL,
  `id_pelamar` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `id_cv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `j_skill`
--

CREATE TABLE `j_skill` (
  `id_loker` varchar(50) NOT NULL,
  `id_skill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `j_skill`
--

INSERT INTO `j_skill` (`id_loker`, `id_skill`) VALUES
('LKR002', 11),
('LKR002', 10),
('LKR002', 12),
('LKR002', 11),
('LKR002', 10),
('LKR002', 9),
('LKR002', 8),
('LKR002', 7),
('LKR002', 6),
('LKR002', 5),
('LKR002', 4),
('LKR001', 12),
('LKR001', 10),
('LKR001', 9),
('LKR001', 8),
('LKR001', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamaran`
--

CREATE TABLE `lamaran` (
  `id_lamaran` varchar(50) NOT NULL,
  `id_loker` varchar(50) NOT NULL,
  `id_data_pelamar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `loker`
--

CREATE TABLE `loker` (
  `id_loker` varchar(50) NOT NULL,
  `nama_pekerjaan` varchar(200) NOT NULL,
  `nama_perusahaan` varchar(150) NOT NULL,
  `lokasi` text NOT NULL,
  `deskripsi` text NOT NULL,
  `benefit` int(255) NOT NULL,
  `tgl_loker` date NOT NULL,
  `tgl_akhir_loker` date NOT NULL,
  `tunjang_untung` text NOT NULL,
  `hari_kerja` varchar(100) NOT NULL,
  `jam_kerja` varchar(100) NOT NULL,
  `syarat_lain` text DEFAULT NULL,
  `pendidikan` varchar(150) NOT NULL,
  `usia` int(20) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `pengalaman` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `loker`
--

INSERT INTO `loker` (`id_loker`, `nama_pekerjaan`, `nama_perusahaan`, `lokasi`, `deskripsi`, `benefit`, `tgl_loker`, `tgl_akhir_loker`, `tunjang_untung`, `hari_kerja`, `jam_kerja`, `syarat_lain`, `pendidikan`, `usia`, `jenis_kelamin`, `pengalaman`, `kategori`) VALUES
('LKR001', 'Depo', 'PT. Gacor Bossku', 'Kuale', 'Ntah aku yk taktau ini ape', 1000000, '2023-12-30', '2023-12-31', 'tkde bang bnyk arap', 'senen', '04.30', 'tkde kerje yk', '', 0, 'Laki - Laki', '', 'CodeIgniter Mikrotik HTML PHP Network'),
('LKR002', 'Lari', 'PT.Roboh', 'jepang', 'tkde kerje yk', 1022, '2023-12-07', '2023-12-18', 'tkde gk ini ni bgn e', 'kamis', '09.22', 'kerje yk', '', 0, 'Laki - Laki', '', 'Mikrotik HTML Network');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` int(150) NOT NULL,
  `password` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skill`
--

CREATE TABLE `skill` (
  `id_skill` int(11) NOT NULL,
  `nama_skill` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `skill`
--

INSERT INTO `skill` (`id_skill`, `nama_skill`) VALUES
(1, 'Figma'),
(2, 'Word'),
(3, 'Office'),
(4, 'Adobe Photoshop'),
(5, 'Adobe After Effects'),
(6, 'Adobe Premiere Pro'),
(7, 'Adobe Ilustrator'),
(8, 'Whatsapp'),
(9, 'Mysql'),
(10, 'PHP'),
(11, 'HTML'),
(12, 'Fullstack');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pelamar`
--
ALTER TABLE `data_pelamar`
  ADD PRIMARY KEY (`id_data_pelamar`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id_lamaran`);

--
-- Indeks untuk tabel `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id_loker`);

--
-- Indeks untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indeks untuk tabel `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id_skill`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `skill`
--
ALTER TABLE `skill`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
