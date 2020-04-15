-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2020 pada 09.47
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pjc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_nama`, `admin_level`) VALUES
(5, 'admin', 'admin', 'Admin PT. Permata Jaya Century ', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_party`
--

CREATE TABLE `tb_party` (
  `party_id` int(11) NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `party_spk` varchar(255) NOT NULL,
  `party_do` varchar(255) NOT NULL,
  `party_po` varchar(225) NOT NULL,
  `party_nokontrak` varchar(225) NOT NULL,
  `party_kontrak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_party`
--

INSERT INTO `tb_party` (`party_id`, `perusahaan_id`, `party_spk`, `party_do`, `party_po`, `party_nokontrak`, `party_kontrak`) VALUES
(5, 7, 'SP00123213', 'DO12312321', '0A9', '001/AII1', 8000),
(6, 7, '2001da', '002da', 'OA3da', 'qwertya', 7000011),
(8, 7, 'ASDSDA/12312/313131', 'SEASE/12312/QWEQE', 'OA5', '12312/31231/23', 90000),
(9, 7, 'a', 'a', 'a', 'a', 12),
(10, 9, 'asd', 'asd', 'asd', 'asd', 989898);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_party_detail`
--

CREATE TABLE `tb_party_detail` (
  `party_detail_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `party_detail_no_polisi` varchar(255) NOT NULL,
  `party_detail_tgl_muat_pabrik` date NOT NULL,
  `party_detail_do` varchar(255) NOT NULL,
  `party_detail_kontrak` varchar(225) NOT NULL,
  `party_detail_sppb` int(11) NOT NULL,
  `party_detail_ton_muat_pabrik` int(11) NOT NULL,
  `party_detail_tgl_bongkar_uip` date NOT NULL,
  `party_detail_ton_bongkar_uip` int(11) NOT NULL,
  `party_detail_selisih_ton` int(11) NOT NULL,
  `party_detail_nama_supir` varchar(255) NOT NULL,
  `party_detail_upah_kg` int(11) NOT NULL,
  `party_detail_jum_tagihan` int(11) NOT NULL,
  `party_detail_admin` int(11) NOT NULL,
  `party_detail_driver_deposito` int(11) NOT NULL,
  `party_detail_nagari` int(11) NOT NULL,
  `party_detail_total_tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_party_detail`
--

INSERT INTO `tb_party_detail` (`party_detail_id`, `party_id`, `party_detail_no_polisi`, `party_detail_tgl_muat_pabrik`, `party_detail_do`, `party_detail_kontrak`, `party_detail_sppb`, `party_detail_ton_muat_pabrik`, `party_detail_tgl_bongkar_uip`, `party_detail_ton_bongkar_uip`, `party_detail_selisih_ton`, `party_detail_nama_supir`, `party_detail_upah_kg`, `party_detail_jum_tagihan`, `party_detail_admin`, `party_detail_driver_deposito`, `party_detail_nagari`, `party_detail_total_tagihan`) VALUES
(15, 5, 'BA 2 SE', '2020-03-31', 'UIPD0017820', 'AAI/002', 810, 8000, '2020-03-31', 7999, 1, 'Egova', 215, 1719785, 85000, 50000, 5000, 1579785),
(21, 5, 'BA 1389 YU', '2020-04-03', 'AAI/001', 'AAI/001', 1000, 50000, '2020-04-03', 30000, 20000, 'Ujang', 1000, 30000000, 2000, 5000, 5000, 29988000),
(22, 10, 'BA 2 SE', '2020-04-15', '123', 'asd', 123412, 19000, '2020-04-15', 210000, 191000, 'Asd', 210, 44100000, 8000, 9000, 5000, 44078000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengirim`
--

CREATE TABLE `tb_pengirim` (
  `pengirim_id` int(11) NOT NULL,
  `pengirim_nama` varchar(225) NOT NULL,
  `pengirim_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengirim`
--

INSERT INTO `tb_pengirim` (`pengirim_id`, `pengirim_nama`, `pengirim_alamat`) VALUES
(1, 'PT. Permata Jaya Century', 'Jln. Sawahan No. 44 RT 002 RW 005\r\nKel. Sawahan, Kec Padang Timur\r\nKota Padang - Sumatera Barat'),
(2, 'CV. Asia Mega', 'Jln. Padang Barat Utara Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `perusahaan_id` int(11) NOT NULL,
  `perusahaan_nama` varchar(255) NOT NULL,
  `perusahaan_telp` varchar(255) NOT NULL,
  `perusahaan_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`perusahaan_id`, `perusahaan_nama`, `perusahaan_telp`, `perusahaan_alamat`) VALUES
(7, 'CV Mediatama Web Indonesia Padang', '0752-22678-123', 'Padang Barat'),
(8, 'PT Kunanga Jantan', '082546864568', 'Jln. Bypass KM 10'),
(9, 'Istana', '0192313', 'Padang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pupuk`
--

CREATE TABLE `tb_pupuk` (
  `pupuk_id` int(11) NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `pupuk_spk` varchar(225) NOT NULL,
  `pupuk_do` varchar(225) NOT NULL,
  `pupuk_po` varchar(225) NOT NULL,
  `pupuk_nokontrak` varchar(225) NOT NULL,
  `pupuk_kontrak` int(11) NOT NULL,
  `pupuk_jenis` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pupuk`
--

INSERT INTO `tb_pupuk` (`pupuk_id`, `perusahaan_id`, `pupuk_spk`, `pupuk_do`, `pupuk_po`, `pupuk_nokontrak`, `pupuk_kontrak`, `pupuk_jenis`) VALUES
(1, 7, 'qwerty', 'asd', 'qwe', '123sdf', 7000, 'urea'),
(4, 8, 'Beatae quod voluptas', 'Autem quia id sint', 'Culpa non vitae mai', 'Laboris tempora duis', 71, 'Eaque in dolorem vol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pupuk_detail`
--

CREATE TABLE `tb_pupuk_detail` (
  `pupuk_detail_id` int(11) NOT NULL,
  `pupuk_id` int(11) NOT NULL,
  `pupuk_detail_no_polisi` varchar(255) NOT NULL,
  `pupuk_detail_nospb` varchar(255) NOT NULL,
  `pupuk_detail_sppb` int(11) NOT NULL,
  `pupuk_detail_jenis` varchar(255) NOT NULL,
  `pupuk_detail_tgl_muat_pabrik` date NOT NULL,
  `pupuk_detail_ton_muat_pabrik` int(11) NOT NULL,
  `pupuk_detail_satuanmuat` int(11) NOT NULL,
  `pupuk_detail_nettomuat` int(11) NOT NULL,
  `pupuk_detail_tgl_bongkar_uip` date NOT NULL,
  `pupuk_detail_ton_bongkar_uip` int(11) NOT NULL,
  `pupuk_detail_satuanbongkar` int(11) NOT NULL,
  `pupuk_detail_nettobongkar` int(11) NOT NULL,
  `pupuk_detail_selisih_ton` int(11) NOT NULL,
  `pupuk_detail_nama_supir` varchar(255) NOT NULL,
  `pupuk_detail_upah_kg` int(11) NOT NULL,
  `pupuk_detail_jum_tagihan` int(11) NOT NULL,
  `pupuk_detail_admin` int(11) NOT NULL,
  `pupuk_detail_driver_deposito` int(11) NOT NULL,
  `pupuk_detail_total_tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pupuk_detail`
--

INSERT INTO `tb_pupuk_detail` (`pupuk_detail_id`, `pupuk_id`, `pupuk_detail_no_polisi`, `pupuk_detail_nospb`, `pupuk_detail_sppb`, `pupuk_detail_jenis`, `pupuk_detail_tgl_muat_pabrik`, `pupuk_detail_ton_muat_pabrik`, `pupuk_detail_satuanmuat`, `pupuk_detail_nettomuat`, `pupuk_detail_tgl_bongkar_uip`, `pupuk_detail_ton_bongkar_uip`, `pupuk_detail_satuanbongkar`, `pupuk_detail_nettobongkar`, `pupuk_detail_selisih_ton`, `pupuk_detail_nama_supir`, `pupuk_detail_upah_kg`, `pupuk_detail_jum_tagihan`, `pupuk_detail_admin`, `pupuk_detail_driver_deposito`, `pupuk_detail_total_tagihan`) VALUES
(1, 1, 'Neque suscipit id i', 'Excepturi tempora ab ', 69, '1', '1983-07-22', 40000, 800, 20000, '2005-04-05', 30000, 600, 64, 10000, 'Dolor similique odio', 4000, 120000000, 10000, 10000, 119980000),
(3, 1, 'BA 1389 YU', 'AQWE ', 13412, '1', '2020-04-10', 10000, 200, 10000, '2020-04-10', 10000, 200, 10000, 0, 'Ujang', 250, 2500000, 12000, 20000, 2468000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan_pupuk`
--

CREATE TABLE `tb_satuan_pupuk` (
  `satuan_id` int(11) NOT NULL,
  `satuan_nama` varchar(225) NOT NULL,
  `satuan_jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_satuan_pupuk`
--

INSERT INTO `tb_satuan_pupuk` (`satuan_id`, `satuan_nama`, `satuan_jumlah`) VALUES
(1, 'ZAK', 50),
(3, 'Karung', 60);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_party`
--
ALTER TABLE `tb_party`
  ADD PRIMARY KEY (`party_id`);

--
-- Indeks untuk tabel `tb_party_detail`
--
ALTER TABLE `tb_party_detail`
  ADD PRIMARY KEY (`party_detail_id`);

--
-- Indeks untuk tabel `tb_pengirim`
--
ALTER TABLE `tb_pengirim`
  ADD PRIMARY KEY (`pengirim_id`);

--
-- Indeks untuk tabel `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`perusahaan_id`);

--
-- Indeks untuk tabel `tb_pupuk`
--
ALTER TABLE `tb_pupuk`
  ADD PRIMARY KEY (`pupuk_id`);

--
-- Indeks untuk tabel `tb_pupuk_detail`
--
ALTER TABLE `tb_pupuk_detail`
  ADD PRIMARY KEY (`pupuk_detail_id`);

--
-- Indeks untuk tabel `tb_satuan_pupuk`
--
ALTER TABLE `tb_satuan_pupuk`
  ADD PRIMARY KEY (`satuan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_party`
--
ALTER TABLE `tb_party`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_party_detail`
--
ALTER TABLE `tb_party_detail`
  MODIFY `party_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_pengirim`
--
ALTER TABLE `tb_pengirim`
  MODIFY `pengirim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  MODIFY `perusahaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_pupuk`
--
ALTER TABLE `tb_pupuk`
  MODIFY `pupuk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pupuk_detail`
--
ALTER TABLE `tb_pupuk_detail`
  MODIFY `pupuk_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_satuan_pupuk`
--
ALTER TABLE `tb_satuan_pupuk`
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
