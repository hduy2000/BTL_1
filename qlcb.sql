-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2021 at 08:56 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlcb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiaotrinh`
--

CREATE TABLE `chitietgiaotrinh` (
  `id` int(10) NOT NULL,
  `magt` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitietgiaotrinh`
--

INSERT INTO `chitietgiaotrinh` (`id`, `magt`, `name`, `link`) VALUES
(135, 36, 'chuong-1-khai-niem-chung-protected.pdf', './file/chuong-1-khai-niem-chung-protected.pdf'),
(136, 36, 'chuong-2-mang-va-danh-sach-protected.pdf', './file/chuong-2-mang-va-danh-sach-protected.pdf'),
(137, 36, 'chuong-3-danh-sach-lien-ket-protected.pdf', './file/chuong-3-danh-sach-lien-ket-protected.pdf'),
(138, 36, 'chuong-4-cay-protected.pdf', './file/chuong-4-cay-protected.pdf'),
(139, 36, 'chuong-5-do-thi-protected.pdf', './file/chuong-5-do-thi-protected.pdf'),
(140, 36, 'chuong-6-sap-xep-protected.pdf', './file/chuong-6-sap-xep-protected.pdf'),
(141, 36, 'chuong-7-tim-kiem-protected.pdf', './file/chuong-7-tim-kiem-protected.pdf'),
(142, 37, 'Bai giang JavaCore tieng Viet.pdf', './file/Bai giang JavaCore tieng Viet.pdf'),
(143, 36, '', './file/');

-- --------------------------------------------------------

--
-- Table structure for table `qlgt`
--

CREATE TABLE `qlgt` (
  `id` int(11) NOT NULL,
  `magv` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `qlgt`
--

INSERT INTO `qlgt` (`id`, `magv`, `name`) VALUES
(36, 'gv001', 'Cấu trúc dữ liệu và giải thuật'),
(37, 'gv001', 'Khảo sát đánh giá chất lượng');

-- --------------------------------------------------------

--
-- Table structure for table `quan_ly_de_tai`
--

CREATE TABLE `quan_ly_de_tai` (
  `magv` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Tom_tat` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quan_ly_de_tai`
--

INSERT INTO `quan_ly_de_tai` (`magv`, `id`, `name`, `Tom_tat`) VALUES
('gv001', 13, 'Khảo sát đánh giá chất lượng', 'Đánh giá chất lượng'),
('gv001', 14, 'Thiết kế website bán hàng cho cửa hàng cây trồng', 'Giúp cửa hàng bán hàng trên nền tảng trực tuyến');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `magv` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sex` varchar(3) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `addr` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `position` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`magv`, `name`, `sex`, `addr`, `phone`, `email`, `username`, `password`, `position`) VALUES
('', '', '', '', '', '', 'admin', 'admin', 1),
('gv001', 'Đặng Gia Đức', 'Nam', 'Bắc Ninh', '+84229138', 'Danggiaduc@gmail.com', 'giangvien1', '2', 0),
('gv002', 'Hoàng Văn Duy', 'Nam', 'Lạng Sơn', '+843484950', 'hoangduy5533@gmail.com', 'giangvien2', 'giangvien2', 0),
('gv003', 'Nguyễn Đức Minh', 'Nam', 'Bắc Giang', '+841129384', 'Nguyenducminh@gmail.com', 'giangvien3', 'giangvien3', 0),
('gv004', 'Nguyễn Lan Phương', 'Nữ', 'Nam Định', '+844884829', 'nguyenphuongls4866@gmail.com', 'giangvien4', 'giangvien4', 0),
('gv005', 'Bùi Linh Đan', 'Nữ', 'Quảng Ninh', '+842238817', 'bld@gmail.com', 'giangvien5', 'giangvien5', 0),
('gv007', 'Nguyễn Thị Minh', 'Nam', 'Bình Định', '0348485931', 'nguyenthihong@gmail.com', 'giangvien7', 'giangvien7', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietgiaotrinh`
--
ALTER TABLE `chitietgiaotrinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magt` (`magt`);

--
-- Indexes for table `qlgt`
--
ALTER TABLE `qlgt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magv` (`magv`);

--
-- Indexes for table `quan_ly_de_tai`
--
ALTER TABLE `quan_ly_de_tai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magv` (`magv`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`magv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietgiaotrinh`
--
ALTER TABLE `chitietgiaotrinh`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `qlgt`
--
ALTER TABLE `qlgt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `quan_ly_de_tai`
--
ALTER TABLE `quan_ly_de_tai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietgiaotrinh`
--
ALTER TABLE `chitietgiaotrinh`
  ADD CONSTRAINT `chitietgiaotrinh_ibfk_1` FOREIGN KEY (`magt`) REFERENCES `qlgt` (`id`);

--
-- Constraints for table `qlgt`
--
ALTER TABLE `qlgt`
  ADD CONSTRAINT `qlgt_ibfk_1` FOREIGN KEY (`magv`) REFERENCES `user` (`magv`);

--
-- Constraints for table `quan_ly_de_tai`
--
ALTER TABLE `quan_ly_de_tai`
  ADD CONSTRAINT `quan_ly_de_tai_ibfk_1` FOREIGN KEY (`magv`) REFERENCES `user` (`magv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
