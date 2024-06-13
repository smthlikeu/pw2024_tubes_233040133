-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2024 at 04:13 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ulinz`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `no_hp`, `password`, `role`) VALUES
(1, 'admin', '-', '-', '$2y$10$keBWfzMj8kJo7AGjg6i9QOGBLdJl1CLizwMnIX6sMDN5VFXhJzb42', 'admin'),
(2, 'user', 'user@gmail.com', '0192837465', '$2y$10$pZIstiI0ozU3tWoHw3Ctee/hv9GJwWHFCP7GoZFqEpkwhNOFYnc6y', 'user'),
(3, 'fauzanazkaferdianto', 'fauzanazka@gmail.com', '123456789', '$2y$10$uqxuJRuU32IoQ.hkSHeOAODwbeEK8vHu5aJOoNy/bsH84ouro75/O', 'user'),
(5, 'fauzan', 'fauzan@gmail.com', '0987654321', '$2y$10$WLS3mQo8W/hxtGOGQrBYvOulxA99l5nAiweAZ6gFj34t9BJmuAHv2', 'user'),
(6, 'zan', 'zan@gmail.com', '081333333', '$2y$10$Ay1/mPcDYzdbyBVzT4VVzOAzM6N9yExCyXKM.RoncJ2nAixJMa2Ze', 'user'),
(7, 'azka', 'azka@gmail.com', '081394571234', '$2y$10$gAPV.yqHBtx1ogPtvcDKZukRmAE1wpkPYGY9ClmapUAVJoH7Buo5K', 'user'),
(8, 'lazboy', 'lazboy@gmail.com', '123456', '$2y$10$5OoJou3EXS2j9nBgk/TizugILcUzwwzLmMOfWNk9fsFm4p5yFudfK', 'user'),
(9, 'farrell', 'lembang@gmail.com', '098', '$2y$10$KAYKhOgobiWMt2TJlVnQfu8mXH/evWpSe2gdvbbhHb49PTnjuK4BS', 'user'),
(10, 'smth', 'smth@gmail.com', '08929284', '$2y$10$OXSiJG1CRaOKkBWH3G/YOuGcX4/.2qC2N.C8JDA1z3y8FTQ4f0eF6', 'user'),
(11, 'jim milton', 'jim@gmail.com', '00000000111', '$2y$10$501I9AQLF8Z.fbt8IoHOEu.jd5pQExI1EKbOHh3J/bO4K9UBFK.X6', 'user'),
(12, 'lazybear', 'lazybear@gmail.com', '74892174021', '$2y$10$DSy18VZqbnG8RqPPP2eOr.HEwivHUvys.T6drzBu2FcsqYffL3ni2', 'user'),
(13, 'sinon', 'sinon@gmail.com', '1234556', '$2y$10$d5LHZovwZGQyTaLrrXm4DuZzkjCe4aC5sELfUXccVibbzrVp9qYFm', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `judul`, `deskripsi`, `gambar`) VALUES
(5, 'Dayeuh kolot kidul saeutik', 'tes', '665d32bd0e186.jpg'),
(11, 'Gedung Sate', 'Gedung Sate terdapat Museum yang menjelaskan gaya arsitektur dan nilai sejarah gedung tersebut.', '666a5b112955e.jpeg'),
(12, 'Alun-alun Bandung', 'Lokasi Alun-Alun Bandug lumayan dekat dengan landmark dan destinasi liburan lainnya, seperti Monumen Asia Afrika, Museum Konferensi Asia Afrika, dan Masjid Raya Bandung.', '666a5b3807668.jpeg'),
(13, 'Trans Studio Bandung', 'Salah satu tempat wisata paling populer di Bandung adalah Trans Studio yang merupakan taman hiburan yang berisi banyak sekali atraksi menarik.', '666a5b99a39f2.jpeg'),
(14, 'Jalan Braga', 'Di jalan Braga terdapat banyak sekali restoran dan cafe yang sering dikunjungi oleh keluarga dan anak muda untuk sekadar santai dan menikmati suasana Kota Bandung.', '666a5c071d44a.jpeg'),
(15, 'Lembang Floating Market', 'Sesuai namanya, atraksi utama yang ditawarkan oleh Lembang Floating Market adalah sebuah pasar apung di atas danau.', '666a5c310425a.jpeg'),
(16, 'Ranca Unpas', 'Ranca Upas merupakan salah satu tempat perkemahan yang dikelilingi oleh hutan lindung. Ada fasilitas lain yang akan menambah keseruan liburanmu, mulai dari ATV, kolam renang, dan outbound.', '666a5c845fbb1.jpeg'),
(17, 'Dago Dreampark', 'ada banyak wahana menarik yang bisa wisatawan coba, seperti spot foto dari ketinggian, offroad dengan Jeep, wahana bermain anak, dan masih banyak lagi.', '666a5ca38a23b.jpeg'),
(18, 'Kawah Putih', 'Kawah putih merupakan sebuah danau yang terbentuk dari letusan Gunung Patuha.', '666a5cc735993.jpeg'),
(19, 'Kebun Stroberi Ciwidey', 'Kebun Strawberry Ciwidey terkenal memiliki ciri buah yang relatif lebih besar, segar dengan warna yang merah menyala dan rasanya yang cukup manis.', '666a5cf0b7f1c.jpeg'),
(20, 'Tangkuban Parahu', 'Terdapat 3 kawah berbeda yang ada di Tangkuban Perahu, yaitu Kawah Ratu, Kawah Upas, dan Kawah Domas.', '666a5d35a3baa.jpeg'),
(21, 'Air Terjun Pelangi', 'Dinamakan Air Terjun Pelangi karena pengunjung sering melihat pelangi di air terjun ini.', '666a5dff03345.jpeg'),
(22, 'Kebun Binatang Bandung', 'Bandung juga punya kebun binatang yang bisa kamu kunjungi bersama keluarga.', '666a5e1deae05.jpeg'),
(23, 'Museum  Asia Afrika', 'Kota Bandung juga menghadirkan wisata sejarah, salah satu yang paling populer adalah Museum Konferensi Asia Afrika.', '666a5e38ed4f5.jpeg'),
(24, 'Masjid Aljabar', 'Banyak masyarakat dari berbagai kota di Indonesia datang ke sini untuk beribadah sambil menikmati arsitektur masjid yang megah dan unik.', '666a5e763ec3f.png'),
(25, 'Taman Wisata Bougenville', 'Taman Wisata Bougenville menawarkan wisata alam yang dekat dengan sungai, dilengkapi berbagai wahana dan fasilitas menarik.', '666a5eaa20b22.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
