-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2023 pada 12.53
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
-- Database: `project_k2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(9) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `user_Id` int(9) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `peran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`user_Id`, `username`, `password`, `nama_lengkap`, `peran`) VALUES
(1, 'noemi.amato', 'cf1f5f6af30f0eadf46e2e356cec86e0', 'Dott. Cassiopea Parisi', 'Admin'),
(2, 'sorrentino.miriam', 'd0ce2b587b14e1439cd7f9a685ca404c', 'Ing. Celeste Palmieri', 'Member'),
(3, 'tosca.monti', 'f4516bfe6a6ccb9960edad6da02f5e1c', 'Sesto Marchetti', 'Admin'),
(4, 'silverio.ricci', '365ca878ab6929509ff427ff1c8259b0', 'Siro Damico', 'Admin'),
(5, 'mauro26', '87d6225f5e6817e0711979192aeaca51', 'Elda Lombardi', 'Member'),
(6, 'wfontana', 'c72bb812f9fd40ee20cfc332de9aedf5', 'Elsa Pellegrino', 'Member'),
(7, 'montanari.erminio', '46334356ebd3d3f256bba8f340b4e031', 'Prisca Galli', ''),
(8, 'sabino92', '91abbf2b9c78dcad085cc5e536b0ffd6', 'Lorenzo Riva', ''),
(9, 'ybianchi', '523d1e2053079856dcd1ca49bbd97ea9', 'Doriana Gatti', ''),
(10, 'ortensia32', '1ff2303c843f1b04b37bb392f8c3c1d6', 'Cassiopea Greco', ''),
(11, 'mlongo', '3263fc3d6458ce6bccc4ea410a17577a', 'Dr. Dindo Guerra', ''),
(12, 'furio06', 'c4fa54bdc8e35c9bf9d9be3cc0b1dfa0', 'Olimpia Barbieri', ''),
(13, 'leone.evita', '919f252c3909592aba21d5d8faf5f23a', 'Giacobbe Romano', ''),
(14, 'deborah67', '8b01ac785c9ec230ca72c7dd140e6d9f', 'Giacobbe Gentile', ''),
(15, 'rde rosa', '626c34c024691f2a77326d36f1eecc98', 'Giulietta Guerra', ''),
(16, 'ymoretti', '9c67e9b4136489abd57bad4fc199b5aa', 'Manfredi Pellegrini', ''),
(17, 'nbernardi', '6529040e15617258ca7d61787f01f920', 'Mariapia Monti', ''),
(18, 'gianmaria.gentile', 'b11ca76a3da8fdeb6dbd1562ef20826c', 'Ing. Audenico Ruggiero', ''),
(19, 'hbenedetti', 'a6d16df2a221356a1f1f730f6ac6672e', 'Moreno D\'amico', ''),
(20, 'monti.rodolfo', '5159281963e3fe265570592883657e67', 'Demi Villa', ''),
(21, 'giulietta26', '4de25118f3eda90e26af77a556fb0bfd', 'Ing. Enrico Fontana', ''),
(22, 'vitalba02', '0d6e4a01c2a470ac8bbef38f4ce05c98', 'Caio Caruso', ''),
(23, 'zelida20', 'c1c3fd2d2a45abbded51d3d09ad0d142', 'Dylan Vitali', ''),
(24, 'bianco.nick', '2735b2ac2876c8d110cd60add2fe994f', 'Alighieri Benedetti', ''),
(25, 'matilde.valentini', 'a2d14be5c53770a516ffb9fd408acc0a', 'Flaviana Esposito', ''),
(26, 'ferretti.maria', '8d62b4a8085b90f208c85017d1749585', 'Moreno Fabbri', ''),
(27, 'loris.farina', '5876b53033665a3f01fca975866c328c', 'Nadir Conti', ''),
(28, 'helga45', '5203db0650a11edcdebb6cb18f9983db', 'Caio Ferretti', ''),
(29, 'lbarbieri', '7c90924e1ece0415922e33723c5adadd', 'Loredana Martini', ''),
(30, 'bianchi.ausonio', '4ed0eb22aca7d1a4f91f308619533b84', 'Olimpia Valentini', ''),
(31, 'samira19', 'e6617663f0266166889a7efb127c00c4', 'Gianantonio Amato', ''),
(32, 'manuele31', '58786e7029746cf1d34e582c5be8efdd', 'Piererminio Ricci', ''),
(33, 'lorlando', '3c1b99ecad2ed8b5e5813318eda68096', 'Maruska Greco', ''),
(34, 'sabino.marchetti', '78f2d56c666ca6421ce9d5b923d723ec', 'Jacopo Martino', ''),
(35, 'jole72', 'f82569da78a6ba13d652c6b93cfded0e', 'Patrizio Barbieri', ''),
(36, 'flongo', '86db968af40be9895cb7cba8100c9251', 'Dott. Leone Sorrentino', ''),
(37, 'ludovico59', 'f832858c2b4a8dce948413423375e5ab', 'Dott. Deborah Barbieri', ''),
(38, 'romano.dante', '059bd3ce419cead49c8c39ec03503bc6', 'Doriana Bianco', ''),
(39, 'romano.ursula', '6473d5899f0ef7e9243031f5efb1d6d5', 'Dr. Costanzo Marini', ''),
(40, 'wrinaldi', '111dc18b319a1c81ad7903ea43ae6d25', 'Dr. Celeste Palumbo', ''),
(41, 'erminio56', 'c17808ecfb600ed412dda9bdd5b0bb68', 'Pietro Pellegrini', ''),
(42, 'bellini.umberto', '24a18cfd758e9c3ca3dbab9f13f32545', 'Sig.ra Rosalba Greco', ''),
(43, 'sarita.testa', '10f0cef04470d7f4136b7ac463406ddb', 'Evita Vitale', ''),
(44, 'rosalino.ferretti', '5137bad532881a4fe84e967d55de97de', 'Artes Martinelli', ''),
(50, 'Kel2', '$2y$10$D2iEa8J0HsEsc/nbfuvxYuGb.ZlHXDCKUFsJXp4vqGq/I0LIll/aS', 'kelompok2', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengingat_pembayaran`
--

CREATE TABLE `pengingat_pembayaran` (
  `reminder_id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `tanggal_jatuh_tempo` datetime NOT NULL,
  `status_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `kategori_id` int(9) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `jumlah` int(9) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`user_Id`);

--
-- Indeks untuk tabel `pengingat_pembayaran`
--
ALTER TABLE `pengingat_pembayaran`
  ADD PRIMARY KEY (`reminder_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `user_id_transaksi` (`user_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `user_Id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `pengingat_pembayaran`
--
ALTER TABLE `pengingat_pembayaran`
  MODIFY `reminder_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengingat_pembayaran`
--
ALTER TABLE `pengingat_pembayaran`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`user_Id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `kategori_id` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`),
  ADD CONSTRAINT `user_id_transaksi` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`user_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
