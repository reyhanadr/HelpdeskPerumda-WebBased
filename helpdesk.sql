-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Agu 2023 pada 14.04
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departments`
--

CREATE TABLE `departments` (
  `departemen_id` int NOT NULL,
  `nama_departemen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `departments`
--

INSERT INTO `departments` (`departemen_id`, `nama_departemen`) VALUES
(1, 'Departemen Sumber Daya Manusia'),
(2, 'Departemen Pemasaran'),
(3, 'Departemen IT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `historymessage`
--

CREATE TABLE `historymessage` (
  `history_id` int NOT NULL,
  `sesi_pesan` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `historymessage`
--

INSERT INTO `historymessage` (`history_id`, `sesi_pesan`, `created_at`) VALUES
(6, 'PES0002', '2023-08-27 06:44:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `sesi_pesan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategori_id` int NOT NULL,
  `sender_id` int DEFAULT NULL,
  `receiver_id` int DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `reply` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(15) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `sesi_pesan`, `kategori_id`, `sender_id`, `receiver_id`, `message`, `reply`, `timestamp`, `status`) VALUES
(24, 'PES0002', 3, 2, NULL, 'PC 1 Rusak Bang', NULL, '2023-08-27 06:44:15', 'open');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `role_id` int DEFAULT NULL,
  `request_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sesi_pesan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kategori_id` int NOT NULL,
  `department_id` int DEFAULT NULL,
  `message_for_teknisi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message_for_karyawan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  `link` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_read` enum('UNREAD','READ') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `role_id`, `request_id`, `sesi_pesan`, `kategori_id`, `department_id`, `message_for_teknisi`, `message_for_karyawan`, `created_at`, `link`, `is_read`) VALUES
(7, 2, 2, 'REQ0002', NULL, 3, 3, 'Perangkat Memiliki Masalah dan Butuh Diperbaiki.', 'Anda Telah Mengajukan Request untuk perangkat Mouse Logitech.', '2023-08-18', NULL, 'UNREAD'),
(8, 2, 2, 'REQ0003', NULL, 3, 3, 'Perangkat Memiliki Masalah dan Butuh Diperbaiki.', 'Anda Telah Mengajukan Request untuk perangkat Personal Computer .', '2023-08-18', NULL, 'UNREAD'),
(16, 2, NULL, NULL, NULL, 3, 3, 'Terdapat Pesan Baru dari Reyhan Adriana Deris', 'Anda Telah Mengajukan Live Chat untuk kategori Hardware.', '2023-08-27', 'KelolaPesan/chatroom/PES0002', 'UNREAD'),
(17, 2, NULL, 'REQ0004', NULL, 4, 3, 'Perangkat Windows 10 ProMemiliki Masalah dan Butuh Diperbaiki.', 'Anda Telah Mengajukan Request untuk perangkat Windows 10 Pro.', '2023-08-27', 'Karyawan/Dashboard/Search?keyword=REQ0004', 'UNREAD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perangkat`
--

CREATE TABLE `perangkat` (
  `id` int NOT NULL,
  `nomer_seri` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_perangkat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spesifikasi` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lokasi_fisik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_perangkat` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'RUNNING',
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `user_id` int DEFAULT NULL,
  `kategori_id` int NOT NULL,
  `foto` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perangkat`
--

INSERT INTO `perangkat` (`id`, `nomer_seri`, `nama_perangkat`, `spesifikasi`, `lokasi_fisik`, `status_perangkat`, `catatan`, `user_id`, `kategori_id`, `foto`) VALUES
(21, 'M-Logi-001', 'Mouse Logitech', 'Mouse + Bluetooth Receiver', 'Departemen IT', 'FIXED', 'Aman Bang', 2, 3, 'mouse1.jpg'),
(22, 'PC-IT-001', 'Personal Computer ', 'Intel Core i3, RAM 16GB, SSD 512GB, Wifi Adapter.', 'Departemen IT', 'NOTFIXED', 'Aman Bang', 2, 3, 'komputer1.jpg'),
(23, 'WIN-10-2023', 'Windows 10 Pro', 'Windows 10 Pro Activated', 'Departemen IT', 'PENDING', 'Ga Ada', 2, 4, 'jamujpg-20211229015538.jpg'),
(24, 'msoffice2023', 'Office Home 2023', 'OFFICE HOME 2023 ACTIVATED', 'Departemen IT', 'PENDING', 'dfdf', 2, 4, 'photo.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `problemcategories`
--

CREATE TABLE `problemcategories` (
  `kategori_id` int NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `problemcategories`
--

INSERT INTO `problemcategories` (`kategori_id`, `nama_kategori`) VALUES
(1, 'Data'),
(2, 'Jaringan'),
(3, 'Hardware'),
(4, 'Aplikasi'),
(5, 'Otomasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `role_id` int NOT NULL,
  `nama_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`role_id`, `nama_role`) VALUES
(1, 'Administator'),
(2, 'Karyawan'),
(3, 'Teknisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supportticket`
--

CREATE TABLE `supportticket` (
  `id` int NOT NULL,
  `request_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `perangkat_id` int NOT NULL,
  `kategori_id` int DEFAULT NULL,
  `department_id` int NOT NULL,
  `status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi_permasalahan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `prioritas` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_dibuat` datetime DEFAULT NULL,
  `tanggal_ditangani` datetime DEFAULT NULL,
  `catatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supportticket`
--

INSERT INTO `supportticket` (`id`, `request_id`, `user_id`, `role_id`, `perangkat_id`, `kategori_id`, `department_id`, `status`, `deskripsi_permasalahan`, `prioritas`, `foto`, `tanggal_dibuat`, `tanggal_ditangani`, `catatan`) VALUES
(21, 'REQ0002', 2, 2, 21, 3, 3, 'FIXED', 'sad', 'Low', 'mouse5.jpg', '2023-08-18 00:00:00', '2023-08-19 23:43:58', ''),
(22, 'REQ0003', 2, 2, 22, 3, 3, 'NOTFIXED', 'DDSFS', 'High', 'komputer1.jpg', '2023-08-18 00:00:00', '2023-08-20 23:44:19', 'edf'),
(24, 'REQ0004', 2, 2, 23, 4, 3, 'PENDING', 'sadsad', 'High', 'kunyit_asam.jpg', '2023-08-27 00:00:00', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `karyawan_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto_user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int DEFAULT NULL,
  `departemen_id` int DEFAULT NULL,
  `kategori_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `karyawan_id`, `nama`, `username`, `email`, `password`, `foto_user`, `role_id`, `departemen_id`, `kategori_id`) VALUES
(2, 'KAR0001', 'Reyhan Adriana Deris', 'Reyhanadr', 'reyhanadr@gmail.com', '202cb962ac59075b964b07152d234b70', 'reyhanadr.jpg', 2, 3, NULL),
(4, 'KAR0003', 'Indro', 'indro', 'indro@gmail.com', '202cb962ac59075b964b07152d234b70', 'indro.jpg', 2, 1, NULL),
(5, 'TEK00001', 'Farhan Raihan Wahidin', 'farhan', 'farhan@gmail.com', '202cb962ac59075b964b07152d234b70', 'farhan.jpg', 3, NULL, 1),
(6, 'KAR0004', 'Setyo Arie Anggara', 'Setyo', 'setyoarie@gmail.com', '202cb962ac59075b964b07152d234b70', 'setyo.jpg', 2, 2, NULL),
(7, 'ADM0001', 'Wawan Hermawan', 'wawan', 'wawan@gmail.com', '202cb962ac59075b964b07152d234b70', 'reyhanadr.jpg', 1, 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departemen_id`);

--
-- Indeks untuk tabel `historymessage`
--
ALTER TABLE `historymessage`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `relasi_history_sesi` (`sesi_pesan`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relasi_sender_user` (`sender_id`),
  ADD KEY `relasi_chat_kategori` (`kategori_id`),
  ADD KEY `relasi_receiver_user` (`receiver_id`),
  ADD KEY `sesi_pesan` (`sesi_pesan`);

--
-- Indeks untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relasi_notif_user` (`user_id`),
  ADD KEY `relasi_notif_role` (`role_id`),
  ADD KEY `relasi_notif_depart` (`department_id`),
  ADD KEY `relasi_notif_kategori` (`kategori_id`),
  ADD KEY `relasi_notif_req` (`request_id`),
  ADD KEY `relasi_notif_sesipesan` (`sesi_pesan`);

--
-- Indeks untuk tabel `perangkat`
--
ALTER TABLE `perangkat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_perangkat` (`status_perangkat`),
  ADD KEY `relasi_perangkat_kategori` (`kategori_id`);

--
-- Indeks untuk tabel `problemcategories`
--
ALTER TABLE `problemcategories`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `supportticket`
--
ALTER TABLE `supportticket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `request_id` (`request_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `supporttickets_ibfk_3` (`perangkat_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `supportticket_ibfk_5` (`role_id`),
  ADD KEY `status` (`status`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `karyawan_id` (`karyawan_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `departemen_id` (`departemen_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `historymessage`
--
ALTER TABLE `historymessage`
  MODIFY `history_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `perangkat`
--
ALTER TABLE `perangkat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `supportticket`
--
ALTER TABLE `supportticket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `historymessage`
--
ALTER TABLE `historymessage`
  ADD CONSTRAINT `relasi_history_sesi` FOREIGN KEY (`sesi_pesan`) REFERENCES `messages` (`sesi_pesan`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `relasi_chat_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `problemcategories` (`kategori_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relasi_receiver_user` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relasi_sender_user` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `relasi_notif_depart` FOREIGN KEY (`department_id`) REFERENCES `departments` (`departemen_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relasi_notif_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `problemcategories` (`kategori_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relasi_notif_req` FOREIGN KEY (`request_id`) REFERENCES `supportticket` (`request_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relasi_notif_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relasi_notif_sesipesan` FOREIGN KEY (`sesi_pesan`) REFERENCES `messages` (`sesi_pesan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relasi_notif_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `perangkat`
--
ALTER TABLE `perangkat`
  ADD CONSTRAINT `relasi_perangkat_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `problemcategories` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_perangkat_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `supportticket`
--
ALTER TABLE `supportticket`
  ADD CONSTRAINT `relasi_req_depart` FOREIGN KEY (`department_id`) REFERENCES `departments` (`departemen_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relasi_req_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `problemcategories` (`kategori_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relasi_req_perangkat` FOREIGN KEY (`perangkat_id`) REFERENCES `perangkat` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_req_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relasi_req_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `relasi_user_depart` FOREIGN KEY (`departemen_id`) REFERENCES `departments` (`departemen_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relasi_user_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `problemcategories` (`kategori_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relasi_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
