-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Nov 2023 pada 14.34
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
-- Database: `herfandi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bazzer`
--

CREATE TABLE `bazzer` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bazzer`
--

INSERT INTO `bazzer` (`id`, `status`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chanel`
--

CREATE TABLE `chanel` (
  `id_chanel` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `nama` varchar(125) NOT NULL,
  `description` varchar(225) NOT NULL,
  `field1` varchar(125) DEFAULT NULL,
  `field2` varchar(125) DEFAULT NULL,
  `field3` varchar(125) DEFAULT NULL,
  `field4` varchar(125) DEFAULT NULL,
  `field5` varchar(125) DEFAULT NULL,
  `field6` varchar(125) DEFAULT NULL,
  `field7` varchar(125) DEFAULT NULL,
  `field8` varchar(125) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `chanel`
--

INSERT INTO `chanel` (`id_chanel`, `id_users`, `nama`, `description`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`, `field7`, `field8`, `created_at`, `updated_at`) VALUES
(14, 4, 'OCC Health monitoring', 'Data monitoring', 'Oxygen', 'Heart rate', 'Temperature', 'Latitude', 'Longitude', 'sensors1', '', '', '2023-09-02 22:05:32', '2023-10-28 06:38:35'),
(15, 2, 'percobaan user baru', 'ini adalah chanel buatan user', 'sensor1', 'sensor2', 'sensor3', 'sensor4', '', '', '', '', '2023-09-02 22:50:46', NULL),
(16, 4, 'Percobaan User', 'ini adalah percobaan', 'sensor1', 'sensor3', 'sensor3', 'sensors4', '', '', '', '', '2023-09-04 17:53:18', '2023-10-28 07:55:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feeds`
--

CREATE TABLE `feeds` (
  `id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `chanel_id` bigint(20) NOT NULL,
  `field1` decimal(9,6) DEFAULT NULL,
  `field2` decimal(9,6) DEFAULT NULL,
  `field3` decimal(9,6) DEFAULT NULL,
  `field4` decimal(9,6) DEFAULT NULL,
  `field5` decimal(9,6) DEFAULT NULL,
  `field6` decimal(9,6) DEFAULT NULL,
  `field7` decimal(9,6) DEFAULT NULL,
  `field8` decimal(9,6) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL,
  `elevation` varchar(225) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `feeds`
--

INSERT INTO `feeds` (`id`, `created_at`, `chanel_id`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`, `field7`, `field8`, `latitude`, `longitude`, `elevation`, `status`) VALUES
(1, '2023-10-28 12:34:49', 14, 2.300000, 3.400000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2023-10-28 18:29:51', 14, 3.400000, 2.500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2023-10-28 18:32:13', 14, 3.400000, 2.500000, 5.200000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2023-10-28 18:33:37', 14, 3.700000, 2.500000, 5.200000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `homepage`
--

CREATE TABLE `homepage` (
  `id` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sensors`
--

CREATE TABLE `sensors` (
  `id_sensors` int(11) NOT NULL,
  `percent` decimal(9,6) NOT NULL,
  `heartRateChar` decimal(9,6) NOT NULL,
  `temperatureChar` decimal(9,6) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `waktu`, `last_update`) VALUES
(1, '4', '2023-09-19 01:53:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `id_chanel` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `token` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`id`, `id_chanel`, `id_users`, `token`) VALUES
(1, 11, 4, 'U7P1RBM1LBMUE2VH'),
(2, 12, 4, 'TRFZK7WPDFLX29LZ'),
(3, 13, 2, 'CZQUG1M3LYQZIIU5'),
(4, 14, 4, 'CHQ2HT23L5T1CBZP'),
(5, 15, 2, 'OUXY02CVZ4C23RE4'),
(6, 16, 4, '2T98D1UCGMI4GI77');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token_read`
--

CREATE TABLE `token_read` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_chanel` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `token_read`
--

INSERT INTO `token_read` (`id`, `id_users`, `id_chanel`, `token`) VALUES
(1, 2, 14, 'FZQUG1M3LYQZFIU5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(125) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `email`, `alamat`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$jolTX5zPKPNCFALx3VcaE.jcZ0ErdCM2Nfvmx3SPzSCm/YZ83q4Xa', '', '', '', 'admin', '2023-09-01 04:21:28'),
(2, 'user', '$2y$10$nHLaM0.UW1LIEtSWYubGwuUlvUok1YlZNYJGfCaofwv7tKlCxGh6O', '', '', '', 'user', '2023-08-30 04:21:34'),
(4, 'rizky', '$2y$10$GQq70RUq7rguUEt4sG4IaOvkWBI.T5DajfcDkQNMvgp1R3awseCam', '', '', '', 'user', '2023-09-02 09:32:13'),
(5, 'hefandi', '$2y$10$ZzXmVlOVA3hyRGswXUHSJeplF2693Btv1m4K18GyUWJ5PJuQFmNmK', '', '', '', 'user', '2023-09-04 17:58:08'),
(6, 'percobaan', '$2y$10$uU/hid7MqpxnyGh5Kqw.TeWfUStxWLdP.uChfCVhIjhibtDQANdLe', 'percobaan', 'percobaan@gmail.com', '', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bazzer`
--
ALTER TABLE `bazzer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chanel`
--
ALTER TABLE `chanel`
  ADD PRIMARY KEY (`id_chanel`);

--
-- Indeks untuk tabel `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id_sensors`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `token_read`
--
ALTER TABLE `token_read`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bazzer`
--
ALTER TABLE `bazzer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `chanel`
--
ALTER TABLE `chanel`
  MODIFY `id_chanel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `feeds`
--
ALTER TABLE `feeds`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id_sensors` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `token_read`
--
ALTER TABLE `token_read`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
