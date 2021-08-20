-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2021 pada 10.35
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(30) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `firstname`, `lastname`, `alamat`, `email`, `phone`, `level`) VALUES
(1, 'admin', '123', 'dea', 'dsad', 'jl.pondok kelapa no 10', 'deoandika28@gmail.co', 54321313, 'admin'),
(2, 'yosi', '123', 'yosi', 'andre', 'jl.bilymoon no 12 rt 11 rw 03 pondok kelapa, duren', 'axyz@gmail.com', 32132131, 'Pegawai'),
(3, 'aaa', '123', 'a', 'b', 'jl.pondok kelapa no 10', 'deoandika2@yahoo.com', 54321313, 'admin'),
(4, 'bbb', 'qwe', 'b', 'bb', 'jl.bilymoon no 12 rt 11 rw 03 pondok kelapa, duren', 'axyz@gmail.com', 54321313, 'pegawai'),
(5, 'dea', '123', 'dea', 'rahma', 'jl.pondok kelapa no 10', 'deoandika23@gmail.co', 32132131, 'admin'),
(10, '', '', '', '', '', '', 0, ''),
(11, '', '', '', '', 'jl.bilymoon no 12 rt 11 rw 03 pondok kelapa, duren', '', 0, ''),
(12, 'ucup', '123', 'ucup', 'ciii', 'jl.pondok kelapa no 10', 'axyz@gmail.com', 54321313, 'admin'),
(13, 'vira', '123', 'vira', 'rahmita', 'jl.mawar merah', 'axyz@gmail.com', 54321313, 'admin'),
(14, 'vira', '123', 'vira', 'rahmita', 'jl.mawar merah', 'axyz@gmail.com', 54321313, 'admin'),
(15, 'budi', '123', 'budi', 'andre', 'jl.pondok kelapa no 10', 'axyz@gmail.com', 54321313, 'pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis_barang` text NOT NULL,
  `berat` varchar(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `jenis_packing` text NOT NULL,
  `tujuan` text NOT NULL,
  `penerima` text NOT NULL,
  `alamat_penerima` text NOT NULL,
  `nohp` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `jenis_barang`, `berat`, `qty`, `jenis_packing`, `tujuan`, `penerima`, `alamat_penerima`, `nohp`) VALUES
('BWH00002', 'buku', 'kertas', '10kg', 1, 'Palet', 'MEDAN', 'dea', 'jl.bilymoon no 12 rt 11 rw 03 pondok kelapa, durensawit jakarta timur', 55555),
('BWH00003', '', '', '', 0, '', '', '', '', 0),
('BWH00004', 'susu', 'cair', '1kg', 1, 'Box', 'bekasi', 'deo', 'jl.pondok kelapa no 10', 55555),
('BWH00005', 'Baju', 'Mudah Terbakar', '10kg', 2, 'Box', 'Padang', 'Ridwan', 'jl.bilymoon no 12 rt 11 rw 03 pondok kelapa, durensawit jakarta timur', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kurir`
--

CREATE TABLE `tbl_kurir` (
  `id_kurir` int(50) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `nohp` int(50) NOT NULL,
  `no_identitas` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengirim`
--

CREATE TABLE `tbl_pengirim` (
  `id_pengirim` varchar(50) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengirim`
--

INSERT INTO `tbl_pengirim` (`id_pengirim`, `nama`, `alamat`, `no_tlp`) VALUES
('P00002', 'toni', 'jl.pondok kelapa no 12', '33333'),
('P00003', 'Rio', 'JL.kemang pratama no 12', '33333'),
('P00004', 'Deo Andika', 'Jl.Bojong Indah no 54', '0879999666');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_resi`
--

CREATE TABLE `tbl_resi` (
  `id_resi` varchar(50) NOT NULL,
  `Tglambil` date NOT NULL,
  `Tglkirim` date NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `id_pengirim` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_resi`
--

INSERT INTO `tbl_resi` (`id_resi`, `Tglambil`, `Tglkirim`, `id_barang`, `id_pengirim`, `status`) VALUES
('RS0001', '2021-07-25', '2021-07-27', 'BWH00002', 'P00002', 'Ready '),
('RS0002', '2021-07-26', '2021-08-25', 'BWH00003', 'P00002', 'On Proses'),
('RS0003', '2021-07-27', '2021-08-11', 'BWH00002', 'P00002', 'Batal'),
('RS0004', '2021-07-28', '2021-07-31', 'BWH00005', 'P00004', 'On Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(50) NOT NULL,
  `id_resi` varchar(50) NOT NULL,
  `tgl_sekarang` datetime NOT NULL,
  `detail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `tbl_pengirim`
--
ALTER TABLE `tbl_pengirim`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- Indeks untuk tabel `tbl_resi`
--
ALTER TABLE `tbl_resi`
  ADD PRIMARY KEY (`id_resi`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pengirim` (`id_pengirim`);

--
-- Indeks untuk tabel `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `id_resi` (`id_resi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  MODIFY `id_kurir` int(50) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_resi`
--
ALTER TABLE `tbl_resi`
  ADD CONSTRAINT `tbl_resi_ibfk_1` FOREIGN KEY (`id_pengirim`) REFERENCES `tbl_pengirim` (`id_pengirim`),
  ADD CONSTRAINT `tbl_resi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD CONSTRAINT `tbl_status_ibfk_1` FOREIGN KEY (`id_resi`) REFERENCES `tbl_resi` (`id_resi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
