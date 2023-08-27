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

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
