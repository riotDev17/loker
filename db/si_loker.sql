-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2024 pada 00.12
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
  `email` varchar(150) DEFAULT NULL,
  `photo` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `photo`, `username`, `password`, `is_admin`) VALUES
('adminganteng', 'Admin Ganteng', '', '', 'jennv', '$2y$10$UxLrYuK2JYzvP2SSTvBAxuos/iUIagfv.PoqrWwVtp.YYEXqTNwSi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `curriculum_vitae`
--

CREATE TABLE `curriculum_vitae` (
  `id_cv` varchar(50) NOT NULL,
  `file_cv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `curriculum_vitae`
--

INSERT INTO `curriculum_vitae` (`id_cv`, `file_cv`) VALUES
('CV001', 'cv_jennv1703937261.docx'),
('CV002', 'cv_yuettt1703937456.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelamar`
--

CREATE TABLE `data_pelamar` (
  `id_data_pelamar` varchar(50) NOT NULL,
  `id_pelamar` varchar(50) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL DEFAULT 'Laki-laki',
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `photo` varchar(100) NOT NULL,
  `id_cv` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_pelamar`
--

INSERT INTO `data_pelamar` (`id_data_pelamar`, `id_pelamar`, `nama`, `jenis_kelamin`, `no_telp`, `alamat`, `photo`, `id_cv`) VALUES
('DTS001', 'USR001', NULL, 'Laki-laki', NULL, NULL, 'default.jpg', NULL),
('DTS002', 'USR002', NULL, 'Laki-laki', NULL, NULL, 'default.jpg', NULL),
('DTS003', 'USR003', NULL, 'Laki-laki', NULL, NULL, 'default.jpg', NULL),
('DTS004', 'USR004', NULL, 'Laki-laki', NULL, NULL, 'default.jpg', NULL);

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
(3, 'Guru'),
(4, 'Admin'),
(5, 'Marketing'),
(7, 'IT'),
(10, 'Sales'),
(11, 'Kurir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamaran`
--

CREATE TABLE `lamaran` (
  `id_lamaran` varchar(50) NOT NULL,
  `id_loker` varchar(50) NOT NULL,
  `id_pelamar` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at_lamar` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at_lamar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `loker`
--

CREATE TABLE `loker` (
  `id_loker` varchar(50) NOT NULL,
  `nama_pekerjaan` varchar(200) NOT NULL,
  `nama_perusahaan` varchar(150) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `lokasi` text DEFAULT NULL,
  `gaji` varchar(200) NOT NULL,
  `benefit` varchar(255) DEFAULT NULL,
  `tunjangan` text DEFAULT NULL,
  `keuntungan` text DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `tipe_kerja` varchar(50) NOT NULL,
  `kebijakan` varchar(50) NOT NULL,
  `hari_kerja` varchar(100) DEFAULT NULL,
  `jam_kerja` varchar(100) DEFAULT NULL,
  `pendidikan` varchar(150) NOT NULL,
  `pengalaman` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan','Semua Jenis Kelamin') NOT NULL,
  `usia` int(20) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `tgl_loker` date NOT NULL DEFAULT current_timestamp(),
  `tgl_akhir_loker` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `loker`
--

INSERT INTO `loker` (`id_loker`, `nama_pekerjaan`, `nama_perusahaan`, `provinsi`, `kabupaten`, `kota`, `lokasi`, `gaji`, `benefit`, `tunjangan`, `keuntungan`, `deskripsi`, `tipe_kerja`, `kebijakan`, `hari_kerja`, `jam_kerja`, `pendidikan`, `pengalaman`, `jenis_kelamin`, `usia`, `skills`, `kategori`, `tgl_loker`, `tgl_akhir_loker`, `created_at`, `updated_at`) VALUES
('LKR001', 'Android Developer', 'PT Sinergi Nature Udah gede Pake Nature', 'kalimantan barat', 'kabupaten mempawah', 'mempawah hilir', 'Mempawah, Terusan', '1.000.000 - 4.300.000', 'BPJS Gaji_Pokok Uang_Makan', 'Tunjangan Transportasi Dll', '', 'Todo List App - Stay organized and increase your productivity with a simple and intuitive task management tool.Manage and Organize your tasks for everyday use and keep track of your daily tasks, deadlines, and goals with a feature-rich Todo List app..', 'Full-time', 'Kerja di kantor', 'Senin-Jumat', '07:00-15:00', 'Semua Jenjang', '  1  ', '', 22, 'photoshop premierePro adobeAfterEffects', 'Sales Marketing IT', '2023-12-27', '2023-09-28', '2023-12-27 11:08:02', '2023-12-27 11:10:15'),
('LKR002', 'Barista', 'PT. Gacor', 'nusa tenggara barat', 'kabupaten lombok tengah', 'batukliang utara', 'Pelosok Sanggau', '1.000.000 - 1.200.000', 'Gaji_Pokok Uang_Makan Cuti', '', '', 'Todo List App - Stay organized and increase your productivity with a simple and intuitive task management tool.Manage and Organize your tasks for everyday use and keep track of your daily tasks, deadlines, and goals with a feature-rich Todo List app..Todo List App - Stay organized and increase your productivity with a simple and intuitive task management tool.Manage and Organize your tasks for everyday use and keep track of your daily tasks, deadlines, and goals with a feature-rich Todo List app..', 'Full-time', 'Kerja di kantor', 'Senin-Minggu', '07:00-15:00', 'Semua Jenjang', '2', '', 18, 'pelayanan_pelanggan sales marketing', 'Staf_Restoran', '2023-12-27', '2022-07-05', '2023-12-27 11:11:34', '2023-12-27 11:11:34'),
('LKR003', 'Bejudi', 'PT. Gacor', 'nusa tenggara barat', 'kabupaten lombok tengah', 'batukliang', 'Mempawah, Terusan', '1.000.000 - 1.200.000', 'Gaji_Pokok', 'Tkde', 'Gaji Gede Loh', 'apapun kerjekan yak bang e aku pun dh tktau<li>ngentak beling</li><li>mngetak cv</li><li>lemflef</li>', 'Full-time', 'Kerja di kantor', 'Senin-Senin', '07:00-13:00', 'Semua Jenjang', '1', 'Semua Jenis Kelamin', 22, 'html', 'Admin', '2023-12-29', '2022-07-05', '2023-12-29 12:14:29', '2023-12-29 12:14:29'),
('LKR004', 'Dokter', 'PT. Gacor', 'kalimantan barat', 'kabupaten melawi', 'pinoh utara', 'Mempawah, Terusan', '1.000.000 - 4.300.000', 'THR Uang_Makan', 'Tkde', 'Gaji Gede Loh', 'sdsadasdsad', 'Full-time', 'Kerja di kantor', 'Senin-Senin', '07:00-12:00', 'Minimal S1/S2', '3', '', 23, 'office premiere_pro photoshop', 'Marketing', '2023-12-29', '2022-07-05', '2023-12-29 12:15:13', '2023-12-29 12:15:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `email`, `username`, `password`) VALUES
('USR001', 'user1@gmail.com', 'jennv', '$2y$10$hOlwAalm7LwCAr55V3KPmOX9bmaok/Ku8jgE1R66NPtburs4SEC2S'),
('USR002', 'user2@gmail.com', 'jendol lipan', '$2y$10$2VCbPyOS7Q.VwNLOICFrNuUo51pnSLRt0quSjMbjtZ5Bhk.eUbCaK'),
('USR003', 'user3@gmail.com', 'taraartwis', '$2y$10$EjvQ07ejCFibLubQAX4JbeeM5hWupwBUz4dN10Tivvsl2K3IIY.ty'),
('USR004', 'user4@gmail.com', 'koalablack', '$2y$10$S5vYOVey1XxhMREIfOnwfeSC4sPPK4vCljWZV/QfjGCZ/NcI6n5Yq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_lamaran`
--

CREATE TABLE `riwayat_lamaran` (
  `id` int(11) NOT NULL,
  `id_lamaran` varchar(50) NOT NULL,
  `id_pelamar` varchar(50) NOT NULL,
  `id_loker` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_lamaran`
--

INSERT INTO `riwayat_lamaran` (`id`, `id_lamaran`, `id_pelamar`, `id_loker`, `status`, `created_at`) VALUES
(1, 'LMR001', 'USR001', 'LKR002', '1', '2023-12-30 10:40:33'),
(2, 'LMR002', 'USR001', 'LKR001', '2', '2023-12-30 10:41:32'),
(3, 'LMR001', 'USR001', 'LKR004', '1', '2023-12-30 10:56:41');

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
  ADD KEY `id_pelamar_2` (`id_pelamar`),
  ADD KEY `id_cv` (`id_cv`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id_lamaran`),
  ADD KEY `id_loker` (`id_loker`),
  ADD KEY `id_data_pelamar` (`id_pelamar`);

--
-- Indeks untuk tabel `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id_loker`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indeks untuk tabel `riwayat_lamaran`
--
ALTER TABLE `riwayat_lamaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `riwayat_lamaran`
--
ALTER TABLE `riwayat_lamaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pelamar`
--
ALTER TABLE `data_pelamar`
  ADD CONSTRAINT `data_pelamar_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  ADD CONSTRAINT `lamaran_ibfk_1` FOREIGN KEY (`id_loker`) REFERENCES `loker` (`id_loker`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lamaran_ibfk_2` FOREIGN KEY (`id_pelamar`) REFERENCES `data_pelamar` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
