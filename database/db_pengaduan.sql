-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2022 pada 09.23
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` bigint(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `foto_profile` varchar(225) NOT NULL,
  `verified` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`, `foto_profile`, `verified`) VALUES
(123, 'Andi AN', 'masyarakat', '$2y$10$BqCVWU56ME/Y.MctVXBw7uI8w26d1gK/HY219JiQWe./ppfYVEeYS', '123', 'user.png', 'Verified'),
(12345, 'Aryo', 'ar', '$2y$10$GvQrKyzaKERn1Kjh05kQkeFHbw8AkZ655GAd1ZUynNrCSVNHuabfy', '089', 'user.png', ''),
(1829736, 'gok', 'gok', '$2y$10$z/lAJZtw00RbtYniYpW88u/Vvt1Y/JewYD4ptt0Ht9Im2xZDCqVbe', '0972457634', 'user.png', ''),
(12345566, 'cekcuy', 'cekcuy', '$2y$10$W0VE3gnAk8/WWTHu3BTvdeu6UaNrBK7kWEBNa2iEVsIxW1qbqK45S', '083756187255', 'user.png', 'Verified'),
(112234535355, 'Moh Fattah', 'fatah', '$2y$10$Q0IMyG/TfxITUoiEF/vHeuMtSocP/NLdLTWFQmUFiKbqKHWWDWIly', '083756187255', 'user.png', ''),
(863697367533, 'Nana Sakura', 'nana', '$2y$10$.0EbAnyTh9nYfLqrU0nMRO7qLuZpVlxTI3KjsdeYVyN/NbcZuRv2a', '0972457634', 'user.png', ''),
(8934677598286, 'Agus Kasiwagi', 'agus', '$2y$10$Dy4uc4Bsu/e/CAYf8rvx4OsKMvLaWQStgChMBlaqF.BHYPOxVKddO', '0862586145', 'user.png', ''),
(89346775982864, 'Muhammad Widi', 'widi', '$2y$10$nd67cZ6a5Ob56qdQAl/i7OpgXtyLYUQOZXMqF/WLsaavqydMDJEjm', '0972457634', 'user.png', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` bigint(16) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` bigint(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai','tolak') NOT NULL,
  `tipe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `tipe`) VALUES
(18, '2022-10-08', 112234535355, 'jalan melati rusak parah', '9e73d8392471c2f2d933c0e235814cbc.jpg', 'tolak', 'public'),
(19, '2022-10-08', 123, 'Lampu jalan mawar rusak', '5e8f11b01a64d12305a317b772c48f5e.jpg', 'selesai', 'public'),
(20, '2022-10-08', 8934677598286, 'besar di jalan anggrek', 'b59cb7e042180df52283418326241fae.jpg', '0', 'public'),
(21, '2022-10-08', 863697367533, 'Jalan anggur rusak, tolong diperbaiki', 'ffc67414a7ceaf61849987c4a13a5656.jpg', '0', 'public'),
(22, '2022-10-08', 112234535355, 'jalan berlubang gang 4', '064e4e7637ac3ab124864476409185c3.jpg', 'selesai', 'public'),
(23, '2022-10-08', 112234535355, 'jalan berlubang di gang tulip', 'e4fe205388b0a0266f0e2bddfd7ebf4a.jpeg', '0', 'public'),
(27, '2022-11-29', 123, 'Jalan rusak', 'f97fc427809e68514536fe4ec85407cf.jpeg', '0', 'public');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `foto_profile` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `foto_profile`) VALUES
(2, 'abdul aziz', 'admin', '$2y$10$YlpZmz2Uq.RxG5bHvMjYjej5y2AYkEzr9JbDKGHe3sWbpFkVhkury', '123', 'admin', 'user.png'),
(6, 'Agus', 'petugas', '$2y$10$SIUNsTMGwDOoXJ62kgoMueorXuuDenxdG0ZKRU1NUigM2Xby0bAmC', '1234567', 'petugas', 'user.png'),
(7, 'Aryo', 'petugas1', '$2y$10$VBYeHj2f5ntYGS/gB/r3Ou4Z4Iz3h4GssdRzW3sMEXM3kBy0K19Qy', '089', 'petugas', 'user.png'),
(8, 'Aryo Andrean', 'admod', '$2y$10$XQ9jhqS3OtgOMTVHN2.IV.R9F94o9Ya9YK7OJmYakgWDLJp0GknCG', '083756187255', 'admin', 'user.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` bigint(16) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(19, 9, '2022-01-12', 'baik', 6),
(20, 10, '2022-01-12', 'siapp', 7),
(21, 11, '2022-01-17', 'siapp', 2),
(22, 12, '2022-01-19', 'aaa', 2),
(23, 13, '2022-04-16', 'ok', 2),
(24, 16, '2022-10-05', 'bagus', 2),
(25, 22, '2022-10-08', 'segera kami proses', 2),
(26, 19, '2022-10-08', 'Segera kami proses', 2),
(27, 18, '2022-10-08', 'maaf', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
