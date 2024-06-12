-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2023 pada 14.37
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scstationery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `countries`
--

CREATE TABLE `countries` (
  `id` int(3) NOT NULL,
  `name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'Angola'),
(5, 'Argentina'),
(6, 'Armenia'),
(7, 'Australia'),
(8, 'Austria'),
(9, 'Bahrain'),
(10, 'Bangladesh'),
(11, 'Belarus'),
(12, 'Belgium'),
(13, 'Bhutan'),
(14, 'Bolivia'),
(15, 'Bosnia & Herzegovina'),
(16, 'Botswana'),
(17, 'Brazil'),
(18, 'Bulgaria'),
(19, 'Cambodia'),
(20, 'Cameroon'),
(21, 'Canada'),
(22, 'Chile'),
(23, 'China'),
(24, 'Colombia'),
(25, 'Costa Rica'),
(26, 'Croatia'),
(27, 'Cuba'),
(28, 'Cyprus'),
(29, 'Czech Republic'),
(30, 'Denmark'),
(31, 'Ecuador'),
(32, 'Egypt'),
(33, 'Estonia'),
(34, 'Ethiopia'),
(35, 'Fiji'),
(36, 'Finland'),
(37, 'France'),
(38, 'Germany'),
(39, 'Ghana'),
(40, 'Greece'),
(41, 'Greenland'),
(42, 'Guinea'),
(43, 'Guyana'),
(44, 'Haiti'),
(45, 'Honduras'),
(46, 'Hong Kong'),
(47, 'Hungary'),
(48, 'Iceland'),
(49, 'India'),
(50, 'Indonesia'),
(51, 'Iran'),
(52, 'Iraq'),
(53, 'Ireland'),
(54, 'Israel'),
(55, 'Italy'),
(56, 'Japan'),
(57, 'Jersey'),
(58, 'Jordan'),
(59, 'Kazakhstan'),
(60, 'Kenya'),
(61, 'Kuwait'),
(62, 'Kyrgyzstan'),
(63, 'Lebanon'),
(64, 'Liberia'),
(65, 'Libya'),
(66, 'Lithuania'),
(67, 'Luxembourg'),
(68, 'Macedonia'),
(69, 'Madagascar'),
(70, 'Malaysia'),
(71, 'Maldives'),
(72, 'Mali'),
(73, 'Mauritius'),
(74, 'Mexico'),
(75, 'Monaco'),
(76, 'Mongolia'),
(77, 'Morocco'),
(78, 'Namibia'),
(79, 'Nepal'),
(80, 'Netherlands'),
(81, 'New Zealand'),
(82, 'Nigeria'),
(83, 'North Korea'),
(84, 'Norway'),
(85, 'Oman'),
(86, 'Pakistan'),
(87, 'Panama'),
(88, 'Papua New Guinea'),
(89, 'Paraguay'),
(90, 'Peru'),
(91, 'Philippines'),
(92, 'Poland'),
(93, 'Portugal'),
(94, 'Qatar'),
(95, 'Romania'),
(96, 'Russia'),
(97, 'Rwanda'),
(98, 'Saudi Arabia'),
(99, 'Serbia'),
(100, 'Singapore'),
(101, 'Slovakia'),
(102, 'Slovenia'),
(103, 'South Africa'),
(104, 'South Korea'),
(105, 'Spain'),
(106, 'Sri Lanka'),
(107, 'Sudan'),
(108, 'Sweden'),
(109, 'Switzerland'),
(110, 'Syria'),
(111, 'Taiwan'),
(112, 'Tajikistan'),
(113, 'Tanzania'),
(114, 'Thailand'),
(115, 'Tunisia'),
(116, 'Turkey'),
(117, 'Turkmenistan'),
(118, 'Uganda'),
(119, 'Ukraine'),
(120, 'United Arab Emirates'),
(121, 'United Kingdom'),
(122, 'United States'),
(123, 'Uruguay'),
(124, 'Uzbekistan'),
(125, 'Venezuela'),
(126, 'Vietnam'),
(127, 'Yemen'),
(128, 'Zambia'),
(129, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `id` int(6) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(150) NOT NULL,
  `salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`id`, `name`, `address`, `salary`) VALUES
(4, 'Nayana', 'Jl. Teleport no.3', 2000000),
(5, 'Diva Fariha', 'Jl. Overthingking no.1', 5000000),
(6, 'Kayla Saputri', 'Jl. lama sekali No.99', 2000000),
(7, 'Haikal Indra', 'Jl. Balon Udara No.3', 4000000),
(8, 'Wienal Putra', 'Jl. Kotak kotak No.64', 5000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok_barang` varchar(10) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `harga_barang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `stok_barang`, `deskripsi_barang`, `harga_barang`) VALUES
(2, 'Pensil 2B Joykoooo', '106', '17 cm X 3,5 mm', 'Rp. 1.900,-'),
(10, 'Penggaris Butterfly', '650', 'panjang 30 cm', 'Rp. 3.000,-'),
(23, 'Lem Castol ', '234', 'besar ', 'Rp. 10.500,-'),
(28, 'Block Note Garis Kecil', '444', 'ukuran 10cm x 7,5 cm', 'Rp. 5.000,-'),
(30, 'Ballpoint Greebel', '400', 'tinta hitam', 'Rp. 2.150,-'),
(43, 'Spidol Snowman Marker Besar', '108', 'hitam,merah,biru', 'Rp. 6.000,-'),
(44, 'Isi Cutter Besar L-500', '104', 'isi 12 pcs ', 'Rp. 6.200,-'),
(55, 'Buku Gambar A4', '320', '20 cm x 30 cm', 'Rp. 3.400,-'),
(56, 'HVS Sidu A4', '50', '70 gr 1 rim', 'Rp.40.000,-'),
(59, 'Stop Map Kertas', '348', 'kuning,pink,hijau,biru', 'Rp. 1.200,-'),
(66, 'Isolasi Double Tape', '190', '10m x 1/2 inch', 'Rp. 2.400,-'),
(67, 'Spidol Snowman Kecil', '160', '12 warna', 'Rp. 12.000,-'),
(70, 'Black board', '75', 'panjang 20cm x 30 cm', 'Rp. 20.000'),
(73, 'Kertas Kado Biasa', '250', '50 cm x50 cm Motif Random', 'Rp. 1.500,-'),
(78, 'Tip Ex Kenko', '256', 'panjang 5m x 5mm', 'Rp. 4.300,-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1976700, 'admin', '$2y$10$utVWNrPFF6LSoXrdhpTzseZK29BpAQZtMR1P719cXw3u5FFTb8qIi', '2022-12-28 07:06:01'),
(1976701, 'divafariha', '$2y$10$8iYPabdtxVpxGaYwtc2oa.QzzsgxQSuDc05iZnh4ALdzODh5VmDCC', '2023-01-08 09:59:10'),
(1976702, 'naynay', '$2y$10$UNGY9u0VZSeLArIzRLgKtufL7cS1zMdvwCW6RsireqkmY52BwE3MW', '2023-01-08 10:01:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1976706;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
