-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2021 at 03:00 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bk_ma` int(5) NOT NULL,
  `p_ma` tinyint(5) UNSIGNED DEFAULT NULL,
  `kh_ma` tinyint(5) UNSIGNED NOT NULL,
  `nv_ma` tinyint(5) UNSIGNED NOT NULL,
  `bk_maLoaiPhong` tinyint(5) UNSIGNED NOT NULL,
  `bk_thoiGianBatDau` datetime DEFAULT NULL,
  `bk_thoiGianKetThuc` datetime DEFAULT NULL,
  `bk_trangThai` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 Đang sử lý, 2 đã xác nhận, 3 đang sử dụng,4 đã hoàn thành,5 khách đã hủy 6, nhân viên từ chối',
  `bk_gia` int(11) DEFAULT NULL,
  `bk_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bk_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Bang dat phong';

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bk_ma`, `p_ma`, `kh_ma`, `nv_ma`, `bk_maLoaiPhong`, `bk_thoiGianBatDau`, `bk_thoiGianKetThuc`, `bk_trangThai`, `bk_gia`, `bk_taoMoi`, `bk_capNhat`) VALUES(2, 47, 14, 2, 51, '2021-06-08 00:00:00', '2021-06-09 00:00:00', 6, NULL, '2021-06-07 09:56:39', '2021-06-07 10:25:55');
INSERT INTO `booking` (`bk_ma`, `p_ma`, `kh_ma`, `nv_ma`, `bk_maLoaiPhong`, `bk_thoiGianBatDau`, `bk_thoiGianKetThuc`, `bk_trangThai`, `bk_gia`, `bk_taoMoi`, `bk_capNhat`) VALUES(3, 33, 1, 2, 50, '2021-06-08 00:00:00', '2021-06-08 03:37:59', 6, 0, '2021-06-07 10:07:44', '2021-06-07 20:38:06');
INSERT INTO `booking` (`bk_ma`, `p_ma`, `kh_ma`, `nv_ma`, `bk_maLoaiPhong`, `bk_thoiGianBatDau`, `bk_thoiGianKetThuc`, `bk_trangThai`, `bk_gia`, `bk_taoMoi`, `bk_capNhat`) VALUES(4, 47, 14, 7, 51, '2021-06-07 00:00:00', '2021-06-09 00:00:00', 4, 1200, '2021-06-07 10:11:19', '2021-06-09 05:58:45');
INSERT INTO `booking` (`bk_ma`, `p_ma`, `kh_ma`, `nv_ma`, `bk_maLoaiPhong`, `bk_thoiGianBatDau`, `bk_thoiGianKetThuc`, `bk_trangThai`, `bk_gia`, `bk_taoMoi`, `bk_capNhat`) VALUES(5, 33, 14, 2, 50, '2021-06-09 00:00:00', '2021-06-09 13:32:47', 4, 1400, '2021-06-07 10:13:15', '2021-06-10 10:39:35');
INSERT INTO `booking` (`bk_ma`, `p_ma`, `kh_ma`, `nv_ma`, `bk_maLoaiPhong`, `bk_thoiGianBatDau`, `bk_thoiGianKetThuc`, `bk_trangThai`, `bk_gia`, `bk_taoMoi`, `bk_capNhat`) VALUES(6, 31, 14, 2, 50, '2021-06-08 00:00:00', '2021-06-09 00:00:00', 4, 700, '2021-06-07 10:15:57', '2021-06-09 02:20:15');
INSERT INTO `booking` (`bk_ma`, `p_ma`, `kh_ma`, `nv_ma`, `bk_maLoaiPhong`, `bk_thoiGianBatDau`, `bk_thoiGianKetThuc`, `bk_trangThai`, `bk_gia`, `bk_taoMoi`, `bk_capNhat`) VALUES(7, 30, 16, 2, 50, '2021-06-08 00:00:00', '2021-06-09 00:00:00', 4, 700, '2021-06-07 10:50:12', '2021-06-10 10:39:06');
INSERT INTO `booking` (`bk_ma`, `p_ma`, `kh_ma`, `nv_ma`, `bk_maLoaiPhong`, `bk_thoiGianBatDau`, `bk_thoiGianKetThuc`, `bk_trangThai`, `bk_gia`, `bk_taoMoi`, `bk_capNhat`) VALUES(15, 32, 27, 2, 50, '2021-06-10 00:00:00', '2021-06-10 18:35:05', 3, 700, '2021-06-09 06:17:08', '2021-06-10 11:35:09');
INSERT INTO `booking` (`bk_ma`, `p_ma`, `kh_ma`, `nv_ma`, `bk_maLoaiPhong`, `bk_thoiGianBatDau`, `bk_thoiGianKetThuc`, `bk_trangThai`, `bk_gia`, `bk_taoMoi`, `bk_capNhat`) VALUES(16, 31, 27, 6, 50, '2021-06-10 00:00:00', '2021-06-11 00:00:00', 3, NULL, '2021-06-09 06:21:51', '2021-06-10 10:32:40');
INSERT INTO `booking` (`bk_ma`, `p_ma`, `kh_ma`, `nv_ma`, `bk_maLoaiPhong`, `bk_thoiGianBatDau`, `bk_thoiGianKetThuc`, `bk_trangThai`, `bk_gia`, `bk_taoMoi`, `bk_capNhat`) VALUES(17, 31, 28, 2, 50, '2021-06-09 13:24:29', '2021-06-09 13:31:51', 4, 140, '2021-06-09 06:24:29', '2021-06-09 06:31:58');
INSERT INTO `booking` (`bk_ma`, `p_ma`, `kh_ma`, `nv_ma`, `bk_maLoaiPhong`, `bk_thoiGianBatDau`, `bk_thoiGianKetThuc`, `bk_trangThai`, `bk_gia`, `bk_taoMoi`, `bk_capNhat`) VALUES(18, 33, 29, 6, 50, '2021-06-11 00:00:00', '2021-06-13 00:00:00', 6, NULL, '2021-06-10 09:14:30', '2021-06-10 09:25:51');
INSERT INTO `booking` (`bk_ma`, `p_ma`, `kh_ma`, `nv_ma`, `bk_maLoaiPhong`, `bk_thoiGianBatDau`, `bk_thoiGianKetThuc`, `bk_trangThai`, `bk_gia`, `bk_taoMoi`, `bk_capNhat`) VALUES(20, 47, 29, 6, 51, '2021-06-11 00:00:00', '2021-06-12 00:00:00', 1, NULL, '2021-06-10 09:27:50', '2021-06-10 09:27:50');
INSERT INTO `booking` (`bk_ma`, `p_ma`, `kh_ma`, `nv_ma`, `bk_maLoaiPhong`, `bk_thoiGianBatDau`, `bk_thoiGianKetThuc`, `bk_trangThai`, `bk_gia`, `bk_taoMoi`, `bk_capNhat`) VALUES(21, 43, 29, 6, 52, '2021-06-15 00:00:00', '2021-06-16 00:00:00', 2, NULL, '2021-06-10 09:28:21', '2021-06-10 09:29:04');
INSERT INTO `booking` (`bk_ma`, `p_ma`, `kh_ma`, `nv_ma`, `bk_maLoaiPhong`, `bk_thoiGianBatDau`, `bk_thoiGianKetThuc`, `bk_trangThai`, `bk_gia`, `bk_taoMoi`, `bk_capNhat`) VALUES(22, 43, 30, 2, 52, '2021-06-10 17:01:40', '2021-06-10 17:39:52', 4, 100, '2021-06-10 10:01:40', '2021-06-10 10:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` tinyint(5) UNSIGNED NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kh_hoTen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ tên # Họ tên',
  `kh_gioiTinh` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Giới tính # Giới tính: 0-Nữ, 1-Nam, 2-Khác',
  `kh_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kh_diaChi` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ # Địa chỉ',
  `kh_dienThoai` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Điện thoại # Điện thoại',
  `remember_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kh_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo khách hàng',
  `kh_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật khách hàng gần nhất',
  `kh_trangThai` tinyint(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(1, 'admin', '$2y$10$F8C21EP4eBJf.pfBphzMmuMw1S7T497/mgV16R9S4UGHbNFVNZilC', 'Phạm Quốc Tuấn', 1, 'Tuanb17606889@student.ctu.edu.vn', 'Cần Thơ', '0921277127', NULL, '2021-05-16 00:43:25', '2021-06-04 18:25:50', 1);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(2, NULL, NULL, 'Pham Quoc Tuấn', 1, NULL, 'An Giang', '0921277127', NULL, '2021-05-28 08:32:00', '2021-05-28 08:32:00', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(3, NULL, NULL, 'nguyễn Văn C', 1, NULL, 'Cần Thơ', '0921277777', NULL, '2021-05-28 19:20:50', '2021-05-28 19:20:50', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(4, NULL, NULL, 'nguyễn Thị D', 0, NULL, 'An Giang', '0921277772', NULL, '2021-05-28 19:23:07', '2021-05-28 19:23:07', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(5, NULL, NULL, 'Võ thi c', 0, NULL, 'An Giang', '0921277773', NULL, '2021-05-28 21:00:52', '2021-05-28 21:00:52', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(6, NULL, NULL, 'Phạm Quốc Tuấn', 1, NULL, 'An Giang', '0921277777', NULL, '2021-06-03 00:17:26', '2021-06-03 00:17:26', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(7, NULL, NULL, 'nguyễn Văn D', 0, NULL, 'Cần Thơ', '0921277127', NULL, '2021-06-03 00:18:22', '2021-06-03 00:18:22', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(8, NULL, NULL, 'nguyễn Văn C', 1, NULL, 'Cần Thơ', '0921277127', NULL, '2021-06-03 20:05:09', '2021-06-03 20:05:09', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(9, NULL, NULL, 'nguyễn Văn D', 1, NULL, 'An Giang', '0921277127', NULL, '2021-06-03 21:13:12', '2021-06-03 20:13:12', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(10, NULL, NULL, 'nguyễn Văn C', 1, NULL, 'An Giang', '0921277127', NULL, '2021-06-03 21:31:47', '2021-06-03 21:31:47', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(11, 'tuanpham', '$2y$10$3DVmnF/CAk6FP0VYZM3VsON9X00a.ianBF8tEOC6sY4wyvN0zBH1q', 'tuanpham', 1, 'tuanpham@student.ctu.wdu.vn', 'tuanpham', '0921277772', NULL, '2021-06-03 22:03:34', '2021-06-03 22:03:34', 1);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(12, NULL, NULL, 'Hồ Văn', 1, NULL, 'Hồ Hồ Văn', '0921277127', NULL, '2021-06-03 22:04:39', '2021-06-03 22:04:39', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(13, NULL, NULL, 'nguyễn Văn C', 1, NULL, 'Cần Thơ', '0921277127', NULL, '2021-06-04 02:57:36', '2021-06-04 02:57:36', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(14, 'user2', '$2y$10$fvVTvWoDj5OBVBFsa7nDiOelHSggWQWOZaqAFxnxJMO3GbwSNAWre', 'user2', 0, 'user1@student.ctu.wdu.vn', 'user2', '0921277772', 'MdZHXPIwVzEnFDUYk012OqPdJ6vnWns78OXHgKLqce9uM6XMKSwGHoM3hHYq', '2021-06-05 10:06:22', '2021-06-07 09:44:49', 1);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(15, NULL, NULL, 'Phạm Quốc Tuấn', 1, NULL, 'An Giang', '0921277127', NULL, '2021-06-07 10:47:46', '2021-06-07 10:47:46', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(16, NULL, NULL, 'Phạm Quốc Tuấn', 1, NULL, 'An Giang', '0921277127', NULL, '2021-06-07 10:50:12', '2021-06-07 10:50:12', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(17, NULL, NULL, 'Phạm Quốc Tuấn', 1, NULL, 'An Giang', '0921277127', NULL, '2021-06-07 10:50:51', '2021-06-07 10:50:51', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(19, NULL, NULL, 'Hà Quốc Sang', 1, NULL, 'An Giang', '0921277777', NULL, '2021-06-07 10:54:08', '2021-06-07 10:54:08', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(20, NULL, NULL, 'Hà Quốc Sang', 1, NULL, 'An Giang', '0921277777', NULL, '2021-06-07 10:56:29', '2021-06-07 10:56:29', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(22, 'user1', '$2y$10$fvVTvWoDj5OBVBFsa7nDiOelHSggWQWOZaqAFxnxJMO3GbwSNAWre', 'Pham Quoc Tuấna', 1, NULL, 'An Giang', '0921277127', NULL, '2021-06-07 11:14:26', '2021-06-07 11:14:26', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(23, NULL, NULL, 'Phạm Quốc Tuấn', 1, 'tuanb17606889@student.ctu.wdu.vn', 'tbn7*32Gct5M#Jd', '0921277777', NULL, '2021-06-08 11:22:23', '2021-06-08 11:22:23', 1);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(24, NULL, NULL, 'Phạm Quốc Tuấn', 1, 'tuanb17606889@student.ctu.wdu.vn', 'tbn7*32Gct5M#Jd', '0921277777', NULL, '2021-06-08 11:23:10', '2021-06-08 11:23:10', 1);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(25, 'tuanb17606889@student.ctu.wdu.vn', '$2y$10$ZMzFajn8zxVGXctU4gc1d.4O21KnO.EeRywAjprqYi2Jo.lFPMIJe', 'Phạm Quốc Tuấn', 1, 'tuanb17606889@student.ctu.wdu.vn', 'tbn7*32Gct5M#Jd', '0921277777', NULL, '2021-06-08 11:24:35', '2021-06-08 11:24:35', 1);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(26, 'tuanb17606889@student.ctu.', '$2y$10$6Mqb0FGOfVTjY3.6NrbbGu43c.511iEmntsF4yjjMchHUaXZZ4Fp2', 'Phạm Quốc Tuấn', 1, 'tuanb17606889@student.ctu.wdu.vn', 'tbn7*32Gct5M#Jd', '0921277777', NULL, '2021-06-08 11:26:06', '2021-06-08 11:26:06', 1);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(27, 'phamtuan', '$2y$10$Mx8Y17We2vqSHP.kI.BgnuJdsEOIMEQiE/4JZY2d8rZIhZhd3FOcy', 'phamtuan', 1, 'phamtuan@gmail.com', 'Cần Thơ', '09212712555', NULL, '2021-06-09 06:03:17', '2021-06-09 06:03:17', 1);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(28, NULL, NULL, 'Võ văn VÕ', 1, NULL, 'Cần Thơ', '0921277127', NULL, '2021-06-09 06:24:29', '2021-06-09 06:24:29', 0);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(29, 'user@user', '$2y$10$d1Z8Vh5xFt.BtjSDm/QXLuzQfp9jQC9KQGaPvTZeq/T5iTt2qMPda', 'Phạm Quốc Tuấn', 1, 'user@user.com', 'Cần Thơ', '0921277777', NULL, '2021-06-10 09:00:04', '2021-06-10 09:28:43', 1);
INSERT INTO `khachhang` (`id`, `email`, `password`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_diaChi`, `kh_dienThoai`, `remember_token`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES(30, NULL, NULL, 'Võ Văn C', 1, NULL, 'Cần Thơ', '0921277127', NULL, '2021-06-10 10:01:40', '2021-06-10 10:01:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loai_phong`
--

CREATE TABLE `loai_phong` (
  `lp_ma` tinyint(5) UNSIGNED NOT NULL COMMENT 'Mã loại Phòng',
  `lp_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên loại # Tên loại Phòng',
  `lp_giaBan` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Giá bán # Giá bán hiện tại của loại Phòng',
  `lp_hinh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Hình đại diện # Hình đại diện của loại Phòng',
  `lp_thongTin` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Thông tin # Thông tin về loại Phòng',
  `lp_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo loại Phòng',
  `lp_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật loại Phòng gần nhất',
  `lp_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái loại Phòng: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Loại sản phẩm # Loại sản phẩm';

--
-- Dumping data for table `loai_phong`
--

INSERT INTO `loai_phong` (`lp_ma`, `lp_ten`, `lp_giaBan`, `lp_hinh`, `lp_thongTin`, `lp_taoMoi`, `lp_capNhat`, `lp_trangThai`) VALUES(50, 'Delux Room', 700, 'honeymoon.jpg', 'Beautiful room queen bed (1.60m width), large window, private bathroom, fan, AC, desk, chair, shelves, wardrobe, computer with screen or laptop water kettle, free coffee, additional facilities, free toiletries, WiFi Internet and LAN', '2021-06-06 06:29:41', '2021-06-06 06:45:23', 2);
INSERT INTO `loai_phong` (`lp_ma`, `lp_ten`, `lp_giaBan`, `lp_hinh`, `lp_thongTin`, `lp_taoMoi`, `lp_capNhat`, `lp_trangThai`) VALUES(51, 'Superior Room', 600, 'family.jpg', 'Painted room, double bed (1.5m width), large window, private bathroom, fan, AC, desk, chair, free toiletries, WiFi Internet and LAN, water kettle, free coffee, free toiletries.', '2021-06-06 06:31:41', '2021-06-06 06:52:51', 2);
INSERT INTO `loai_phong` (`lp_ma`, `lp_ten`, `lp_giaBan`, `lp_hinh`, `lp_thongTin`, `lp_taoMoi`, `lp_capNhat`, `lp_trangThai`) VALUES(52, 'Superior Twin', 500, '2013_01_25_s100_306.jpg', 'Room with two extra-long single beds (0.8m width), large window, private bathroom, fan, AC, desk, chair, free toiletries, WiFi Internet and LAN.', '2021-06-06 06:33:20', '2021-06-06 06:54:30', 2);
INSERT INTO `loai_phong` (`lp_ma`, `lp_ten`, `lp_giaBan`, `lp_hinh`, `lp_thongTin`, `lp_taoMoi`, `lp_capNhat`, `lp_trangThai`) VALUES(53, 'Small Double Budget', 400, '2013_01_25_s100_282.jpg', 'Very small beautiful budget double room, double bed (1.40m width), mango-yellow painted with window, private bathroom, fan, AC, free toiletries, WiFi.', '2021-06-06 06:35:54', '2021-06-06 06:55:26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(4, '2021_04_29_101637_create_loai_phong', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(5, '2021_04_29_102943_create_phong', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(6, '2021_05_03_080206_create_quyen_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(7, '2021_05_03_081755_create_nhanvien_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(8, '2021_05_05_090550_khachhang', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(9, '2021_05_05_090560_hoadon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` tinyint(5) UNSIGNED NOT NULL COMMENT 'Mã nhân viên, 1-chưa phân công',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tài khoản # Tài khoản',
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mật khẩu # Mật khẩu',
  `nv_hoTen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ tên # Họ tên',
  `nv_gioiTinh` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Giới tính # Giới tính: 0-Nữ, 1-Nam, 2-Khác',
  `nv_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email # Email',
  `nv_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ # Địa chỉ',
  `nv_dienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Điện thoại # Điện thoại',
  `nv_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo nhân viên',
  `nv_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật nhân viên gần nhất',
  `nv_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái nhân viên: 1-khóa, 2-khả dụng',
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Quyền # Mã quyền: 1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Nhân viên # Nhân viên';

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `email`, `password`, `nv_hoTen`, `nv_gioiTinh`, `nv_email`, `nv_diaChi`, `nv_dienThoai`, `nv_taoMoi`, `nv_capNhat`, `nv_trangThai`, `remember_token`, `q_ma`) VALUES(2, 'admin@admin', '$2y$10$QWOCrd0aBtpRK61BAsFFbu8IlrgdLtKQNdmpTS4dIERIVQ74SvCBW', 'admin@admin', 1, 'tuanb17606889@student.ctu.wdu.vn', 'admin@admin', 'admin@admin', '2021-05-05 17:27:51', '2021-06-07 21:06:21', 2, NULL, 2);
INSERT INTO `nhanvien` (`id`, `email`, `password`, `nv_hoTen`, `nv_gioiTinh`, `nv_email`, `nv_diaChi`, `nv_dienThoai`, `nv_taoMoi`, `nv_capNhat`, `nv_trangThai`, `remember_token`, `q_ma`) VALUES(3, 'admin@admin1', '$2y$10$jMYd2W9O/WAJCSNe65y3cuDR1.kYfN1vMsoEAMvOaI6ZON8J9c6pu', 'admin@admin1', 1, 'admin@admin1', 'admin@admin1', '123456', '2021-05-06 00:51:14', '2021-05-06 00:51:14', 2, NULL, 2);
INSERT INTO `nhanvien` (`id`, `email`, `password`, `nv_hoTen`, `nv_gioiTinh`, `nv_email`, `nv_diaChi`, `nv_dienThoai`, `nv_taoMoi`, `nv_capNhat`, `nv_trangThai`, `remember_token`, `q_ma`) VALUES(4, 'tuanb1706889', '$2y$10$81NsNkAXQ88wctK2zFHnBOksuKnYEM.PWuHa.LVTUMR5Fhqj.87SO', 'Phạm Quốc Tuấn', 1, 'tuanb17606889@student.ctu.wdu.vn', 'Cân Thơ', '0921277127', '2021-05-12 07:16:23', '2021-05-12 07:16:23', 2, NULL, 2);
INSERT INTO `nhanvien` (`id`, `email`, `password`, `nv_hoTen`, `nv_gioiTinh`, `nv_email`, `nv_diaChi`, `nv_dienThoai`, `nv_taoMoi`, `nv_capNhat`, `nv_trangThai`, `remember_token`, `q_ma`) VALUES(5, 'anb1706889', '$2y$10$D6UDZ6cnPumnsAqEQGUHG.K/JYOHlx.pkAy7PS7UMFF9pKGWrfTum', 'Nguyễn Văn A', 1, 'tuanb17606889@student.ctu.wdu.vn', 'Cân Thơ', '0921277128', '2021-05-12 07:19:36', '2021-05-12 07:19:36', 2, NULL, 2);
INSERT INTO `nhanvien` (`id`, `email`, `password`, `nv_hoTen`, `nv_gioiTinh`, `nv_email`, `nv_diaChi`, `nv_dienThoai`, `nv_taoMoi`, `nv_capNhat`, `nv_trangThai`, `remember_token`, `q_ma`) VALUES(6, 'Tuan12', '$2y$10$op4d2OIeA2PVXjBUupbBq.QXe3U4VS222uMWHl72.mga4kUK8wTQO', 'Phạm Quốc Tuấn A', 1, 'tuanb17606889@student.ctu.edu.vn', 'Cân Thơ', '0921277127', '2021-05-12 07:53:33', '2021-06-02 10:15:30', 2, NULL, 1);
INSERT INTO `nhanvien` (`id`, `email`, `password`, `nv_hoTen`, `nv_gioiTinh`, `nv_email`, `nv_diaChi`, `nv_dienThoai`, `nv_taoMoi`, `nv_capNhat`, `nv_trangThai`, `remember_token`, `q_ma`) VALUES(7, 'tuanvit0933043393@gmail.com', '$2y$10$UtWM1rslpjinpFErpj7Ti.bbPmM5fhOMXqcgexmjsywOqUGZsPBcS', 'Phạm Quốc Tuấn B', 1, 'tuanvit0933043393@gmail.com', 'Cân Thơ', '0921277127', '2021-06-07 20:48:25', '2021-06-09 02:58:44', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `p_ma` tinyint(5) UNSIGNED NOT NULL COMMENT 'Mã Phòng',
  `p_ten` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên Phòng # Tên Phòng',
  `p_danhGia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0;0;0;0;0' COMMENT 'Chất lượng # Chất lượng của Phòng (1-5 sao), định dạng: 1;2;3;4;5',
  `p_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo Phòng',
  `p_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật Phòng gần nhất',
  `p_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái Phòng: 1-khóa, 2-khả dụng',
  `lp_ma` tinyint(5) UNSIGNED NOT NULL COMMENT 'Loại Phòng '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Phong # Phong: hoa, giỏ hoa, vòng hoa, ...';

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(30, '101', '5', '2021-06-06 06:39:29', '2021-06-07 10:50:12', 2, 50);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(31, '102', '5', '2021-06-06 06:39:47', '2021-06-10 10:32:40', 1, 50);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(32, '103', '5', '2021-06-06 06:40:00', '2021-06-10 10:42:10', 1, 50);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(33, '104', '5', '2021-06-06 06:40:14', '2021-06-09 06:32:09', 2, 50);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(34, '201', '5', '2021-06-06 06:40:26', '2021-06-06 06:40:26', 2, 52);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(35, '202', '5', '2021-06-06 06:40:36', '2021-06-06 06:40:36', 2, 52);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(40, '203', '5', '2021-06-06 06:44:14', '2021-06-06 06:44:14', 2, 52);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(43, '204', '5', '2021-06-06 06:56:12', '2021-06-10 10:01:40', 2, 52);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(44, '301', '5', '2021-06-06 06:56:21', '2021-06-06 06:56:21', 2, 51);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(45, '302', '5', '2021-06-06 06:56:32', '2021-06-06 06:56:32', 2, 51);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(46, '303', '5', '2021-06-06 06:56:42', '2021-06-06 06:56:42', 2, 51);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(47, '304', '5', '2021-06-06 06:56:52', '2021-06-07 11:00:47', 2, 51);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(48, '401', '5', '2021-06-06 06:57:02', '2021-06-06 06:57:02', 2, 53);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(49, '402', '5', '2021-06-06 06:57:12', '2021-06-06 06:57:12', 2, 53);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(50, '403', '5', '2021-06-06 06:57:20', '2021-06-06 06:57:20', 2, 53);
INSERT INTO `phong` (`p_ma`, `p_ten`, `p_danhGia`, `p_taoMoi`, `p_capNhat`, `p_trangThai`, `lp_ma`) VALUES(51, '404', '5', '2021-06-06 07:16:25', '2021-06-06 07:16:25', 2, 53);

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `q_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Mã quyền: 1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng',
  `q_ten` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên quyền # Tên quyền',
  `q_dienGiai` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Diễn giải # Diễn giải về quyền',
  `q_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo quyền',
  `q_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật quyền gần nhất',
  `q_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái quyền: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Quyền # Các quyền quản lý';

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`q_ma`, `q_ten`, `q_dienGiai`, `q_taoMoi`, `q_capNhat`, `q_trangThai`) VALUES(1, 'Nhân viên', 'Nhân viên lễ tân', '2021-05-06 00:26:15', '2021-05-06 00:26:15', 2);
INSERT INTO `quyen` (`q_ma`, `q_ten`, `q_dienGiai`, `q_taoMoi`, `q_capNhat`, `q_trangThai`) VALUES(2, 'Quản trị', 'Quản trị', '2021-05-05 17:18:18', '2021-05-05 17:18:18', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bk_ma`),
  ADD KEY `FK_booking_phong` (`p_ma`),
  ADD KEY `FK_booking_loai_phong` (`bk_maLoaiPhong`),
  ADD KEY `FK_booking_khachhang` (`kh_ma`),
  ADD KEY `nv_ma` (`nv_ma`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khachhang_kh_taikhoan_kh_email_kh_dienthoai_unique` (`email`,`kh_email`,`kh_dienThoai`);

--
-- Indexes for table `loai_phong`
--
ALTER TABLE `loai_phong`
  ADD PRIMARY KEY (`lp_ma`),
  ADD UNIQUE KEY `loai_phong_lp_ten_unique` (`lp_ten`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nhanvien_nv_taikhoan_nv_email_nv_dienthoai_unique` (`email`,`nv_email`,`nv_dienThoai`),
  ADD KEY `nhanvien_q_ma_foreign` (`q_ma`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`p_ma`),
  ADD UNIQUE KEY `phong_p_ten_unique` (`p_ten`),
  ADD KEY `phong_lp_ma_foreign` (`lp_ma`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`q_ma`),
  ADD UNIQUE KEY `quyen_q_ten_unique` (`q_ten`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bk_ma` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` tinyint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `loai_phong`
--
ALTER TABLE `loai_phong`
  MODIFY `lp_ma` tinyint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã loại Phòng', AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` tinyint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã nhân viên, 1-chưa phân công', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `p_ma` tinyint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã Phòng', AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `q_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã quyền: 1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng', AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_booking_khachhang` FOREIGN KEY (`kh_ma`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `FK_booking_loai_phong` FOREIGN KEY (`bk_maLoaiPhong`) REFERENCES `loai_phong` (`lp_ma`),
  ADD CONSTRAINT `FK_booking_nhanvien` FOREIGN KEY (`nv_ma`) REFERENCES `nhanvien` (`id`),
  ADD CONSTRAINT `FK_booking_phong` FOREIGN KEY (`p_ma`) REFERENCES `phong` (`p_ma`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_q_ma_foreign` FOREIGN KEY (`q_ma`) REFERENCES `quyen` (`q_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_lp_ma_foreign` FOREIGN KEY (`lp_ma`) REFERENCES `loai_phong` (`lp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
