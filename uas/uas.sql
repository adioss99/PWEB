-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2022 pada 06.04
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `sinopsis` text DEFAULT NULL,
  `id_genre` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `cover` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `id_penulis`, `harga`, `sinopsis`, `id_genre`, `id_penerbit`, `cover`) VALUES
(8, 'Kiamat Makin Dekat', 0, '29000', 'Masih ingat dengan isu kiamat 2012? Kok, sampe sekarang belum jadi kiamat, ya…. Sebenarnya jadi nggak sih kiamat itu?\r\nNah, ngomongin masalah kiamat, nggak ada satu orang pun yang tahu kapan akan terjadi. Bahkan, Nabi Muhammad SAW pun tidak mengetahuinya. Jadi, nggak usah percaya kalo ada yang bilang bahwa kiamat akan terjadi pada tahun sekian, sekian, atau sekian. \r\nNamun demikian, Rasulullah SAW memberikan gambaran akan tanda-tanda datangnya hari kiamat. Semua itu tentu agar kita makin waspada terhadap datangnya hari yang mengerikan itu.', 0, 0, ''),
(9, 'Si Juki seri Keroyokan #2', 0, '41000', 'Setelah memulai invasi dengan Seri Keroyokan #1, Juki ce-es meneruskan ambisinya menguasai rak toko buku Indonesia dan menjadi serial terlaris di dunia. Si Juki yang ditunjuk jadi manajer tim futsal tarkam mulai sibuk merekrut pemain untuk timnya. Sementara itu Raisah yang anak baru juga mulai akrab dengan teman-temannya.\r\nTidak mau kalah, karakter-karakter lain juga makin seru ceritanya.\r\nSi Juki Seri Keroyokan #2 pasti menggebrak dengan semangat baru!\r\nBuku Persembahan Penerbit Bukune', 0, 0, ''),
(10, 'Islam Sehari-hari (Reborn)', 0, '410000', 'Sebagai umat Rasulullah, kita harus bangga dengan beliau. Dengan kesabarannya, beliau memberikan teladan dan pesan-pesan kebaikan bagi umatnya, termasuk bagaimana menjalankan Islam dalam kehidupan sehari-hari. Hanya saja, karena kelalaian kita, ada kesalahan-kesalahan yang tidak satu-dua kali kita lakukan, namun berulang kali.\r\n\r\nSaking kaprahnya, banyak kesalahan kita lakukan tanpa sadar; mencela makanan, ingkar janji, pamer aurat, hingga berkendara tanpa sopan santun. Padahal, empat belas abad silam, Rasulullah saw sudah berpesan agar kita menghindari perbuatan-perbuatan tersebut.\r\n\r\nKalau kita renungkan, tak satu pun pesan-pesan Rasulullah yang tidak penting, meski kelihatan sepele. Namun, tidak sedikit pesan-pesan itu yang kita abaikan begitu saja, baik karena kita anggap kuno, ndeso, atau kurang gaul.\r\n-QultumMedia-\r\n\r\npenerbitqultummedia', 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nama_genre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`) VALUES
(1, 'Komedi'),
(2, 'Horor'),
(3, 'Romantis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(200) NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(11) NOT NULL,
  `nama_penulis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$CEtpNrtFX3Oz2YYytiJbbOH1tJaHsgxlZ6kHL3fmHL7EZseL2CeCG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
