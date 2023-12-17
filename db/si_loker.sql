-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2023 pada 08.28
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
-- Struktur dari tabel `curriculum_vitae`
--

CREATE TABLE `curriculum_vitae` (
  `id_cv` int(11) NOT NULL,
  `file_cv` varchar(100) NOT NULL
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

--
-- Dumping data untuk tabel `data_pelamar`
--

INSERT INTO `data_pelamar` (`id_data_pelamar`, `id_pelamar`, `email`, `no_telp`, `alamat`, `photo`, `id_cv`) VALUES
('1', 'USR001', 'messiguling@gmail.com', '082212922211', 'Jepang belakang pintu', 'blm', 'CV_001');

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
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sales'),
(2, 'Staf Restoran'),
(3, 'Guru'),
(4, 'Admin'),
(5, 'Marketing'),
(6, 'Kurir'),
(7, 'IT'),
(8, 'Digital Marketing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamaran`
--

CREATE TABLE `lamaran` (
  `id_lamaran` varchar(50) NOT NULL,
  `id_loker` varchar(50) NOT NULL,
  `id_data_pelamar` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
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
  `gaji` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `benefit` varchar(255) NOT NULL,
  `tipe_kerja` varchar(50) NOT NULL,
  `kebijakan` varchar(50) NOT NULL,
  `tgl_loker` date NOT NULL,
  `tgl_akhir_loker` date DEFAULT NULL,
  `hari_kerja` varchar(100) NOT NULL,
  `jam_kerja` varchar(100) NOT NULL,
  `pendidikan` varchar(150) NOT NULL,
  `usia` int(20) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan','Semua Jenis Kelamin') NOT NULL,
  `pengalaman` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `skills` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `loker`
--

INSERT INTO `loker` (`id_loker`, `nama_pekerjaan`, `nama_perusahaan`, `lokasi`, `gaji`, `deskripsi`, `benefit`, `tipe_kerja`, `kebijakan`, `tgl_loker`, `tgl_akhir_loker`, `hari_kerja`, `jam_kerja`, `pendidikan`, `usia`, `jenis_kelamin`, `pengalaman`, `kategori`, `skills`) VALUES
('LKR001', 'Barista', 'WK Goncang Lidah', 'Mempawah, Terusan', ' 1.500.000 - 3.500.000', '<p>ngetak ikan koi tiap hari</p>', 'BPJS Gaji Pokok Uang Makan Lainnya', 'Full-time', 'Kerja di kantor', '2023-12-17', '2023-12-17', 'Senin-Minggu', '14:25-14:26', 'Semua Jenjang', 20, 'Semua Jenis Kelamin', '1', 'Staf Restoran', 'Word'),
('LKR002', 'Bejudi', 'PT. Gacor', 'Kuale', '2.000.000 - 1.500.000', '<p>ngetak kucing tiap hari</p>', 'Upah Lembur THR Asuransi Kesehatan Lainnya', 'Full-time', 'Kerja di kantor', '2023-12-17', '2023-12-17', 'Senin-Minggu', '12:00-00:00', 'Minimal SMA/SMK/Sederajat', 80, '', '1', 'Admin IT', 'Whatsapp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `username`, `nama`, `password`) VALUES
('USR001', 'Jawir', 'Jawir Sunda', 'kull11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id_syarat` int(11) NOT NULL,
  `syarat` int(11) NOT NULL
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
-- Indeks untuk tabel `curriculum_vitae`
--
ALTER TABLE `curriculum_vitae`
  ADD PRIMARY KEY (`id_cv`);

--
-- Indeks untuk tabel `data_pelamar`
--
ALTER TABLE `data_pelamar`
  ADD PRIMARY KEY (`id_data_pelamar`),
  ADD KEY `id_pelamar` (`id_pelamar`),
  ADD KEY `id_pelamar_2` (`id_pelamar`);

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
-- Indeks untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indeks untuk tabel `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id_skill`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `curriculum_vitae`
--
ALTER TABLE `curriculum_vitae`
  MODIFY `id_cv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id_syarat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `skill`
--
ALTER TABLE `skill`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD CONSTRAINT `pelamar_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `data_pelamar` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
