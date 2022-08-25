-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2022 lúc 05:30 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `yiidemo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Yii framewwork', 0, 'yii-framework', 1, 1657508456, 1657508456),
(2, 'PHP MVC', 0, 'php-mvc', 0, 1657508433, 1657524995),
(3, 'PHP Basic', 2, 'php-basic', 1, 1657508441, 1657528924),
(4, 'Yii 1', 1, 'yii-1', 1, 1657527635, 1657527635),
(5, 'Yii 1 database', 4, 'yii-1-database', 1, 1657527759, 1657527759);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `body`, `created_at`, `updated_at`) VALUES
(1, 'NGUYỄN KHẮC HIẾU', 'hieukhac6869@gmail.com', 'Demo Test', 'ghghg', '1657443252', '1657443252'),
(3, 'Nguyễn Văn Hoàng', 'musicscendy@gmail.com', 'sbc', 'hfjdfjdf kfjdkfjfkeff', '1657529602', '1657529602'),
(4, 'Nguyễn Khăc Hiếu', 'hieukhac6869@gmail.com', 'Demo Contact', 'Demo Contact', '1657616924', '1657616924');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1657073063),
('m130524_201442_init', 1657073067),
('m190124_110200_add_verification_token_column_to_user_table', 1657073067),
('m220706_021205_category', 1657073927),
('m220706_042248_contact', 1657081575);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(8, 'admin', 'FIcj5nJA6gOzv27dWzy4jAIoWfTkGbAT', '$2y$13$K.JJwnwZ6v4Ergh0XSwPhejufgeGAM1SEET1.OlXpuI0p9jFPQ.Ey', NULL, 'hieukhac6869@gmail.com', 10, 1657445336, 1657445336, 'YgLVgO2LfFOy58giXhScUtd5NUQWvu3y_1657445336'),
(9, 'hieunguyen', 'sfdFl5x7FUjJabbMqsEmcb0WwkEokwmS', '$2y$13$daEVvEXnIy6Gzlm8YkKNN.rdacDLzEuMgoMCK9zGvqqbiKJSfcVDa', NULL, '123@gmail.com', 10, 1657532381, 1657532381, 'FdLORMAggTgLUS0svIlBtNJCiR-oEfuB_1657532381'),
(10, 'hieukhac', 'SdC0zYDfuG9O6zilWOJVVPlQN1clv7yA', '$2y$13$6kLaDz3CxffmijNAcVp6uu7e7T2T4Xil3mz1WS8BjEUmcPHnJgr96', NULL, '111@gmail.com', 10, 1657532502, 1657532502, 'Vv1Ka9dr3XAc7mJfkmXX-hgqC05d59DI_1657532502');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject` (`subject`);

--
-- Chỉ mục cho bảng `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
