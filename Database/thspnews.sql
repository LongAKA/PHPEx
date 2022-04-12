-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2022 lúc 03:03 PM
-- Phiên bản máy phục vụ: 10.4.16-MariaDB
-- Phiên bản PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thspnews`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_account`
--

CREATE TABLE `tbl_account` (
  `ID_TK` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `MaQuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_account`
--

INSERT INTO `tbl_account` (`ID_TK`, `Username`, `Password`, `HoTen`, `Email`, `MaQuyen`) VALUES
(1, 'quantri1', '1234561', '', '', 1),
(2, 'HL001', '1234561', 'Nguyễn Hoàng Long', 'vatvo.qdl20@gmail.com', 2),
(3, 'VanTHSP', '1234561', 'Nguyễn Văn D', 'vand@gmail.com', 2),
(5, 'hoanglong', '1234561', 'Nguyễn Hoàng Long', 'vatvo.qdl20@gmail.com', 2),
(6, 'Duynguyen111', '1234561', 'Nguyễn Công Duy', 'duynguyen.tv111@gmail.com', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news`
--

CREATE TABLE `tbl_news` (
  `MaTinTuc` int(11) NOT NULL,
  `TenBaiViet` varchar(5000) NOT NULL,
  `ThoiGian` datetime NOT NULL,
  `TheLoai` varchar(100) NOT NULL,
  `NoiDung` varchar(5000) NOT NULL,
  `DungLuong` varchar(100) NOT NULL,
  `DungLuongAnh` int(100) NOT NULL,
  `EditNoiDung` varchar(5000) NOT NULL,
  `AmThanh` text NOT NULL,
  `Username` varchar(50) NOT NULL,
  `ID_TT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_news`
--

INSERT INTO `tbl_news` (`MaTinTuc`, `TenBaiViet`, `ThoiGian`, `TheLoai`, `NoiDung`, `DungLuong`, `DungLuongAnh`, `EditNoiDung`, `AmThanh`, `Username`, `ID_TT`) VALUES
(48, 'Vidu1', '2022-04-05 00:00:00', '', 'bài khóa luận.docx', '', 0, '', '', 'HL001', 1),
(50, 'Thông báo về việc tiêm vắc xin phòng COVID-19 cho học sinh từ đủ 12 đến 18 tuổi', '2022-04-12 00:00:00', 'Tin tức', '2 trang cuối phần 2 .docx', '1 Trang A4', 1, '', '', 'HL001', 1),
(51, 'Thông báo về việc tiêm vắc xin phòng COVID-19 cho học sinh từ đủ 12 đến 18 tuổi', '2022-04-12 00:00:00', 'Tin tức', '2 trang cuối phần 2 .docx', '1 Trang A4', 1, '', '', 'HL001', 1),
(52, 'Thông báo về việc tiêm vắc xin phòng COVID-19 cho học sinh từ đủ 12 đến 18 tuổi', '2022-04-12 05:35:27', 'Tin tức', '2 trang cuối phần 2 .docx', '1 Trang A4', 1, '', '', 'HL001', 1),
(53, 'Thông báo về việc tiêm vắc xin phòng COVID-19 cho học sinh từ đủ 12 đến 18 tuổi', '2022-04-12 10:39:39', 'Tin tức', '2 trang cuối phần 2 .docx', '1 Trang A4', 1, '', '', 'HL001', 1),
(54, 'Thông báo về việc tiêm vắc xin phòng COVID-19 cho học sinh từ đủ 12 đến 18 tuổi', '2022-04-12 13:18:00', 'Thông báo', '4_MAU_BAO_CAO(1).doc', '1 Trang A4', 1, '', '', 'HL001', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `MaQuyen` int(11) NOT NULL,
  `TenQuyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_permission`
--

INSERT INTO `tbl_permission` (`MaQuyen`, `TenQuyen`) VALUES
(1, 'Quyền quản trị'),
(2, 'Quyền giáo viên'),
(8, 'Quyền kiểm duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_status`
--

CREATE TABLE `tbl_status` (
  `ID_TT` int(11) NOT NULL,
  `TenTrangThai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_status`
--

INSERT INTO `tbl_status` (`ID_TT`, `TenTrangThai`) VALUES
(1, 'Đang chờ duyệt'),
(2, 'Duyệt thành công'),
(3, 'Không được duyệt');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`ID_TK`);

--
-- Chỉ mục cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`MaTinTuc`),
  ADD KEY `ID_TT` (`ID_TT`);

--
-- Chỉ mục cho bảng `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`MaQuyen`);

--
-- Chỉ mục cho bảng `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`ID_TT`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `ID_TK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `MaTinTuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `MaQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `ID_TT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD CONSTRAINT `tbl_news_ibfk_1` FOREIGN KEY (`ID_TT`) REFERENCES `tbl_status` (`ID_TT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
