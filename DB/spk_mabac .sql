-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2021 pada 02.25
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_mabac`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(15) NOT NULL,
  `id_program` int(15) NOT NULL,
  `id_kriteria` int(15) NOT NULL,
  `nilai` varchar(200) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_program`, `id_kriteria`, `nilai`, `keterangan`) VALUES
(1, 11, 1, '0.1', 'buruk'),
(2, 11, 2, '0.1', 'buruk'),
(3, 11, 3, '0.4', 'baik'),
(4, 11, 4, '0.5', 'Sangat Baik'),
(5, 12, 1, '0.1', 'buruk'),
(6, 12, 2, '0.2', 'baik'),
(7, 12, 3, '0.4', 'baik'),
(8, 12, 4, '0.5', 'Sangat Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keputusan`
--

CREATE TABLE `keputusan` (
  `id_bobot_keputusan` int(15) NOT NULL,
  `id_program` int(15) NOT NULL,
  `id_kriteria` int(15) NOT NULL,
  `bobot_keputusan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keputusan`
--

INSERT INTO `keputusan` (`id_bobot_keputusan`, `id_program`, `id_kriteria`, `bobot_keputusan`) VALUES
(17, 11, 1, '0.18'),
(18, 11, 2, '0.24'),
(19, 11, 3, '0.30'),
(20, 11, 4, '0.28'),
(21, 12, 1, '0.18'),
(22, 12, 2, '0.48'),
(23, 12, 3, '0.30'),
(24, 12, 4, '0.28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(15) NOT NULL,
  `kode_kriteria` varchar(50) NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `bobot` varchar(100) NOT NULL,
  `tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `kriteria`, `bobot`, `tipe`) VALUES
(1, 'C1', 'Alumni yang bekerja', '0.18', 'Benefit'),
(2, 'C2', 'Minat pelatihan', '0.24', 'Benefit'),
(3, 'C3', 'Fasilitas', '0.30', 'Benefit'),
(4, 'C4', 'Instrukturr', '0.28', 'Benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matriks_batas`
--

CREATE TABLE `matriks_batas` (
  `id_batas` int(15) NOT NULL,
  `id_kriteria` int(15) NOT NULL,
  `nilai_batas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matriks_batas`
--

INSERT INTO `matriks_batas` (`id_batas`, `id_kriteria`, `nilai_batas`) VALUES
(9, 1, '0.855652651'),
(10, 2, '0.906439347'),
(11, 3, '0.896325121'),
(12, 4, '0.890720893');

-- --------------------------------------------------------

--
-- Struktur dari tabel `normalisasi`
--

CREATE TABLE `normalisasi` (
  `id_normalisasi` int(15) NOT NULL,
  `id_program` int(15) NOT NULL,
  `id_kriteria` int(15) NOT NULL,
  `normalisasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `normalisasi`
--

INSERT INTO `normalisasi` (`id_normalisasi`, `id_program`, `id_kriteria`, `normalisasi`) VALUES
(25, 11, 1, '0'),
(26, 11, 2, '0'),
(27, 11, 3, '0'),
(28, 11, 4, '0'),
(29, 12, 1, '0'),
(30, 12, 2, '1'),
(31, 12, 3, '0'),
(32, 12, 4, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peringkat`
--

CREATE TABLE `peringkat` (
  `id_peringkat` int(15) NOT NULL,
  `id_program` int(15) NOT NULL,
  `nama_program` varchar(200) NOT NULL,
  `nilai_peringkat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peringkat`
--

INSERT INTO `peringkat` (`id_peringkat`, `id_program`, `nama_program`, `nilai_peringkat`) VALUES
(5, 11, 'Teknisi AC Residential', '-2.549138012'),
(6, 12, 'Teknisi Refrigerasi Domestik', '-2.309138012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkiraan_perbatasan`
--

CREATE TABLE `perkiraan_perbatasan` (
  `id_perkiraan` int(15) NOT NULL,
  `id_program` int(15) NOT NULL,
  `id_kriteria` int(15) NOT NULL,
  `nilai_perkiraan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perkiraan_perbatasan`
--

INSERT INTO `perkiraan_perbatasan` (`id_perkiraan`, `id_program`, `id_kriteria`, `nilai_perkiraan`) VALUES
(17, 11, 1, '-0.675652651'),
(18, 11, 2, '-0.666439347'),
(19, 11, 3, '-0.596325121'),
(20, 11, 4, '-0.610720893'),
(21, 12, 1, '-0.675652651'),
(22, 12, 2, '-0.426439347'),
(23, 12, 3, '-0.596325121'),
(24, 12, 4, '-0.610720893');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id_program` int(15) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama_program` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `banyak_pendaftar` varchar(200) NOT NULL,
  `instruktur` varchar(100) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `alumni` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id_program`, `kode`, `nama_program`, `kategori`, `banyak_pendaftar`, `instruktur`, `fasilitas`, `alumni`) VALUES
(11, 'A01', 'Teknisi AC Residential', 'Listrik', '56', '6 tahun', 'Baik', '56'),
(12, 'A02', 'Teknisi Refrigerasi Domestik', 'Listrik', '60', '7 tahun', 'Baik', '67');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `level` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `image`, `level`) VALUES
(1, 'indri', 'indri@gmail.com', '71f7be7b8496f7ece8454b1bcdcd2162', 'garis.png', 'admin'),
(2, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'sragen.png', 'admin'),
(3, 'himawarii', 'himawari@gmail.com', 'f5d33bc07320b0eec7976595e38e6d30', 'garis.png', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`id_bobot_keputusan`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `matriks_batas`
--
ALTER TABLE `matriks_batas`
  ADD PRIMARY KEY (`id_batas`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD PRIMARY KEY (`id_normalisasi`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `peringkat`
--
ALTER TABLE `peringkat`
  ADD PRIMARY KEY (`id_peringkat`),
  ADD KEY `id_program` (`id_program`);

--
-- Indeks untuk tabel `perkiraan_perbatasan`
--
ALTER TABLE `perkiraan_perbatasan`
  ADD PRIMARY KEY (`id_perkiraan`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `id_bobot_keputusan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `matriks_batas`
--
ALTER TABLE `matriks_batas`
  MODIFY `id_batas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `normalisasi`
--
ALTER TABLE `normalisasi`
  MODIFY `id_normalisasi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `peringkat`
--
ALTER TABLE `peringkat`
  MODIFY `id_peringkat` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `perkiraan_perbatasan`
--
ALTER TABLE `perkiraan_perbatasan`
  MODIFY `id_perkiraan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`),
  ADD CONSTRAINT `alternatif_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `keputusan`
--
ALTER TABLE `keputusan`
  ADD CONSTRAINT `keputusan_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`),
  ADD CONSTRAINT `keputusan_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `matriks_batas`
--
ALTER TABLE `matriks_batas`
  ADD CONSTRAINT `matriks_batas_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD CONSTRAINT `normalisasi_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`),
  ADD CONSTRAINT `normalisasi_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `peringkat`
--
ALTER TABLE `peringkat`
  ADD CONSTRAINT `peringkat_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`);

--
-- Ketidakleluasaan untuk tabel `perkiraan_perbatasan`
--
ALTER TABLE `perkiraan_perbatasan`
  ADD CONSTRAINT `perkiraan_perbatasan_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`),
  ADD CONSTRAINT `perkiraan_perbatasan_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
