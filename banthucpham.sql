-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 29, 2022 lúc 02:58 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banthucpham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `ID_BinhLuan` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `NoiDung` varchar(100) NOT NULL,
  `ThoiGianBinhLuan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`ID_BinhLuan`, `ID_ThanhVien`, `ID_SanPham`, `NoiDung`, `ThoiGianBinhLuan`) VALUES
(1, 1, 1002, 'afjhjsfksdfl;sdf', '2021-12-06 07:56:56'),
(13, 1, 2003, 'asdasdasdasdasd', '2021-12-08 06:38:42'),
(14, 1, 2003, '123', '2021-12-08 06:39:11'),
(15, 1, 2003, '123', '2021-12-08 06:39:55'),
(16, 1, 2003, '123', '2021-12-08 06:40:21'),
(17, 2, 1003, 'Ngon quá ta', '2021-12-08 07:10:22'),
(18, 1, 1001, 'Ngon zữ', '2021-12-08 07:10:52'),
(19, 2, 2002, 'Quá đã ', '2021-12-08 07:11:04'),
(20, 1, 2001, 'waooooo', '2021-12-08 07:11:13'),
(21, 2, 3002, 'chất lượng', '2021-12-08 07:11:25'),
(22, 1, 3001, 'abc bê quá đê', '2021-12-08 07:11:39'),
(23, 1, 1001, '123', '2021-12-08 07:12:15'),
(24, 4, 1002, '123', '2021-12-08 07:13:18'),
(25, 4, 1002, '123112312312', '2021-12-12 08:35:05'),
(26, 4, 2002, 'asd', '2021-12-21 18:48:38'),
(27, 4, 1001, 'cái này pro vip quá', '2021-12-24 08:20:17'),
(28, 8, 1002, 'ngon quá', '2021-12-25 08:27:39'),
(29, 8, 1002, 'ngonnnnnnnnnnnnnn\r\n', '2021-12-27 13:43:57'),
(30, 8, 1002, 'sản phẩm này tuyệt vời', '2021-12-28 03:23:13'),
(31, 10, 1002, 'ngon vai lozzz nha\r\n', '2022-04-01 16:16:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `ID_HoaDon` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `TenSanPham` varchar(30) NOT NULL,
  `GiaBan` float NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ID_DanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(20) NOT NULL,
  `Mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`ID_DanhMuc`, `TenDanhMuc`, `Mota`) VALUES
(1, 'Rau Sạch', 'Tăng cường thị lực.\nĐiều hòa huyết áp.\nTốt cho hệ tiêu hóa và đường ruột.\nNgăn ngừa bệnh tim mạch'),
(2, 'Củ, Quả', 'Chúng là nguồn cung cấp chất xơ tuyệt vời, có thể giúp duy trì đường ruột khỏe mạnh và ngăn ngừa táo'),
(3, 'Thịt tươi', '- Sự đa dạng về chủng loại thực phẩm. Những người ăn thịt có một loạt lựa chọn về thực phẩm. ...\r\n- Dễ dàng thích ứng với thực phẩm. ...\r\n- Đáp ứng đầy đủ nhu cầu protein. ...');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ID_HoaDon` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ThoiGianLap` datetime NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `GhiChu` varchar(30) NOT NULL,
  `GiaTien` float NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `XuLy` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`ID_HoaDon`, `ID_ThanhVien`, `ThoiGianLap`, `DiaChi`, `GhiChu`, `GiaTien`, `SoDienThoai`, `XuLy`) VALUES
(1, 1, '2021-12-06 12:55:18', 'hai phong', 'asdasdasd123', 0, '0382460421', 1),
(2, 1, '2021-12-06 12:56:40', 'hai phong', 'asdasdasd123', 0, '0382460421', 1),
(5, 1, '2021-12-06 15:52:03', 'hai phong', 'asdasdasd123', 0, '0382460421', 1),
(6, 1, '2021-12-06 15:56:12', 'hai phong', 'asdasdasd123', 96000, '0382460421', 1),
(7, 1, '2021-12-06 15:58:38', 'hai phong', 'asdasdasd123', 96000, '0382460421', 1),
(8, 1, '2021-12-06 16:29:49', 'hai phong', 'asdasdasd123', 96000, '0382460421', 1),
(9, 1, '2021-12-06 16:49:09', 'hai phong', 'asdasdasd123', 238000, '0382460421', 1),
(10, 1, '2021-12-06 17:24:16', 'hai phong', 'asdasdasd123', 238000, '0382460421', 1),
(11, 1, '2021-12-06 17:28:58', 'hai phong', 'asdasdasd123', 128000, '0382460421', 1),
(12, 1, '2021-12-06 17:29:42', 'hai phong', 'asdasdasd123', 128000, '0382460421', 1),
(13, 1, '2021-12-06 17:33:29', 'hai phong', 'asdasdasd123', 128000, '0382460421', 1),
(14, 1, '2021-12-06 17:34:49', 'hai phong', 'asdasdasd123', 42000, '0382460421', 1),
(15, 1, '2021-12-06 17:37:32', 'hai phong', 'asdasdasd123', 32000, '0382460421', 1),
(16, 1, '2021-12-06 17:40:15', 'hai phong', 'asdasdasd123', 32000, '0382460421', 1),
(17, 1, '2021-12-06 17:41:18', 'hai phong', 'asdasdasd123', 32000, '0382460421', 1),
(18, 1, '2021-12-06 17:47:26', 'hai phong', 'asdasdasd123', 290000, '0382460421', 1),
(29, 1, '2021-12-08 04:02:57', 'hai phong', 'asdasdasd123', 540000, '0382460421', 1),
(30, 1, '2021-12-08 04:03:04', 'hai phong', 'asdasdasd123', 540000, '0382460421', 1),
(31, 1, '2021-12-08 04:45:04', 'hai phong', 'asdasdasd123', 64000, '0382460421', 1),
(32, 1, '2021-12-08 04:45:08', 'hai phong', 'asdasdasd123', 64000, '0382460421', 1),
(33, 1, '2021-12-08 05:09:47', 'hai phong', 'asdasdasd123123', 32000, '0382460421', 1),
(34, 1, '2021-12-08 05:45:04', 'hai phong', '123123', 64000, '0382460421', 1),
(35, 4, '2021-12-08 08:20:30', 'Quan 10', '', 35500, '0767772112', 1),
(36, 1, '2021-12-08 08:31:03', 'hai phong', '', 10500, '0382460421', 1),
(37, 4, '2021-12-08 08:36:57', 'Quan 10', '', 10500, '0767772112', 1),
(38, 4, '2021-12-12 08:35:34', 'Quan 10', '', 90000, '0767772112', 1),
(39, 4, '2021-12-21 18:52:37', 'Quan 10', '', 184875, '0767772112', 1),
(40, 4, '2021-12-21 18:57:16', 'Quan 10', '', 111250, '0767772112', 1),
(41, 4, '2021-12-21 18:57:23', 'Quan 10', '', 111250, '0767772112', 1),
(42, 4, '2021-12-21 18:57:29', 'Quan 10', '123', 111250, '0767772112', 1),
(43, 4, '2021-12-21 18:58:49', 'Quan 10', '', 111250, '0767772112', 1),
(44, 4, '2021-12-21 19:17:25', 'Quan 10', '', 111250, '0767772112', 1),
(45, 4, '2021-12-21 19:17:52', 'Quan 10', '', 111250, '0767772112', 1),
(46, 4, '2021-12-21 19:19:51', 'Quan 10', '', 111250, '0767772112', 1),
(47, 4, '2021-12-21 19:22:01', 'Quan 10', '', 64000, '0767772112', 1),
(48, 5, '2021-12-21 19:49:58', 'Quan 10', '', 118000, '0767772112', 1),
(49, 5, '2021-12-21 19:56:14', 'Quan 10', '', 32000, '0767772112', 1),
(50, 5, '2021-12-21 20:08:31', 'Quan 10', '', 87625, '0767772112', 1),
(51, 5, '2021-12-21 20:17:32', 'Quan 10', '', 143250, '0767772112', 1),
(52, 5, '2021-12-21 20:23:35', 'Quan 10', '', 32000, '0767772112', 1),
(53, 4, '2021-12-21 20:29:19', 'Quan 10', '', 64000, '0767772112', 1),
(54, 4, '2021-12-24 04:16:03', 'Quan 10', '', 180500, '0767772112', 1),
(55, 4, '2021-12-24 04:16:43', 'Quan 10', '', 192000, '0767772112', 1),
(57, 4, '2021-12-24 05:23:23', 'Quan 10', '', 35500, '0767772112', 2),
(59, 4, '2021-12-24 08:15:04', 'Quan 10', '', 71000, '0767772112', 1),
(60, 4, '2021-12-24 08:18:33', 'Quan 10', '', 35000, '0767772112', 1),
(61, 4, '2021-12-24 08:19:26', 'Quan 10', '', 70000, '0767772112', 1),
(62, 4, '2021-12-24 08:23:43', 'Quan 10', '', 120000, '0767772112', 1),
(63, 1, '2021-12-24 14:01:35', 'hai phong', '', 35500, '0375522116', 1),
(64, 1, '2021-12-24 14:15:14', 'hai phong', '', 70500, '0375522116', 1),
(65, 1, '2021-12-24 14:15:56', 'hai phong', '', 120500, '0375522116', 1),
(66, 1, '2021-12-24 14:17:46', 'hai phong', '', 35000, '0375522116', 1),
(67, 1, '2021-12-24 14:20:42', 'hai phong', '', 35000, '0375522116', 1),
(68, 1, '2021-12-24 14:23:42', 'hai phong', '', 70000, '0375522116', 2),
(69, 4, '2021-12-24 14:38:07', 'Quan 10', '', 35000, '0767772112', 1),
(70, 4, '2021-12-24 14:43:11', 'Quan 10', '', 400000, '0767772112', 1),
(71, 4, '2021-12-24 14:49:13', 'Quan 10', '', 105000, '0767772112', 1),
(72, 7, '2021-12-25 08:08:20', 'Quan 10', '', 430000, '0767772112', 1),
(73, 7, '2021-12-25 08:09:37', 'Quan 10', '', 440500, '0767772112', 1),
(74, 8, '2021-12-25 08:10:17', 'Quan 10', '', 105000, '0767772112', 2),
(75, 8, '2021-12-25 08:11:12', 'Quan 10', '', 21000, '0767772112', 1),
(76, 8, '2021-12-25 08:28:30', 'Quan 10', 'ádasd', 370000, '0767772112', 1),
(77, 8, '2021-12-25 08:30:18', 'Quan 10', '', 70000, '0767772112', 2),
(78, 8, '2021-12-27 13:44:08', 'Quan 10', '', 140000, '0767772112', 2),
(79, 8, '2021-12-27 13:49:35', 'Quan 10', '', 10500, '0767772112', 1),
(80, 8, '2021-12-28 03:23:27', 'Quan 10', '', 105000, '0767772112', 1),
(81, 8, '2021-12-28 03:24:33', 'Quan 10', '', 106500, '0767772112', 2),
(82, 10, '2022-04-01 16:19:19', 'Quan 10', '', 175000, '0767772112', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `ID_NCC` int(11) NOT NULL,
  `TenNCC` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `Img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`ID_NCC`, `TenNCC`, `Email`, `SoDienThoai`, `DiaChi`, `Img`) VALUES
(1, 'Chi Nhánh Lâm Đồng', 'lamdong49@gmail.com', '0321221221', 'Lâm Đồng', 'chinhanhlamdong.png'),
(2, 'Chi Nhánh Đắk Lắk', 'daklak47@gmail.com', '0382213321', 'Đắk Lắk', 'chinhanhdaklak.png'),
(3, 'Chi nhánh ĐakNong', 'dakongprovip123@gmai', '0123123112', 'DakNong', 'nhacungcapdaknong.pn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanly`
--

CREATE TABLE `quanly` (
  `ID_QuanLy` int(11) NOT NULL,
  `TenDangNhap` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `HoVaTen` varchar(30) NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `NgayDiLam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quanly`
--

INSERT INTO `quanly` (`ID_QuanLy`, `TenDangNhap`, `MatKhau`, `Email`, `HoVaTen`, `DiaChi`, `SoDienThoai`, `NgayDiLam`) VALUES
(1, 'admin', '123', 'lamdong49@gmail.com', 'admin sieu cap provip', 'Lâm Đồng', '0987776123', '2021-12-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID_SanPham` int(11) NOT NULL,
  `ID_DanhMuc` int(11) NOT NULL,
  `ID_NhaCungCap` int(11) NOT NULL,
  `TenSanPham` varchar(30) NOT NULL,
  `MoTa` text NOT NULL,
  `GiaBan` float NOT NULL,
  `SoLuong` float NOT NULL,
  `Img` varchar(20) NOT NULL,
  `BanChay` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID_SanPham`, `ID_DanhMuc`, `ID_NhaCungCap`, `TenSanPham`, `MoTa`, `GiaBan`, `SoLuong`, `Img`, `BanChay`) VALUES
(1001, 1, 1, 'Sú Tím Đà Lạt', '- Thực phẩm tốt cho sức khỏe</br>- Có thể chế biến thành nhiều món ăn</br>- Hương vị thơm ngon, kích thích vị giác', 50000, 10, 'bapcaitim.png', 'co'),
(1002, 1, 1, 'Đậu Leo Đà Lạt', '- Dùng chế biến món ăn- Chứa nhiều chất dinh dưỡng cần thiết- An toàn chất lượng', 35000, 10, 'daudua.png', 'co'),
(1003, 1, 2, 'Cải Bẹ Đà Lạt', '- Được trồng trong môi trường sạch an toàn với người tiêu dùng- Dùng để nấu canh, xào hoặc có thể dùng ăn với lẩu- Bổ sung nhiều chất dinh dưỡng cần thiết cho cơ thể', 35500, 10, 'caibe.png', 'co'),
(2001, 1, 1, 'Khổ qua Đà Lạt', '- Thực phẩm tốt cho sức khỏe\r\n- Có thể chế biến được thành nhiều món ăn\r\n- Sản phẩm được người tiêu dùng ưa chuộng\r\n \r\n\r\n', 18000, 10, 'khoqua.png', 'co'),
(2002, 2, 2, 'Cà chua Đà Lạt', '- Cung cấp đầy đủ vitamin và dưỡng chất cho cơ thể\r\n- Đạt tiêu chuẩn Vietgap\r\n- Liên hệ trực tiếp để được giá sỉ tốt nhất', 18000, 10, 'cachua.png', 'co'),
(2003, 2, 1, 'Bầu Phước An', '- Món ăn lý tưởng dành cho người muốn giảm cân- Chế biến được nhiều món ăn ngon miệng- Sản phẩm không sử dụng thuốc trừ sâu, an toàn cho sức khỏe', 20000, 10, 'bauphuocan.png', 'ko'),
(3001, 3, 1, 'Thịt đùi heo', '- Nguyên liệu tươi ngon, hợp vệ sinh\r\n- Cung cấp nhiều dinh dưỡng cho cơ thể\r\n- Chế biến được nhiều món ăn ngon', 180000, 10, 'Thitduiheo.png', 'co'),
(3002, 3, 1, 'Thịt heo say', '-Nguyên liệu tươi ngon, hợp vệ sinh</br>Cung cấp nhiều dinh dưỡng cho cơ thể</br>Chế biến được nhiều món ăn ngon', 150000, 10, 'thitheosay.png', 'co'),
(3013, 3, 1, 'Thịt Bò', 'ngon', 450000, 10, 'thitbo.png', 'ko'),
(3014, 3, 1, 'Thịt Bò', 'ád', 400000, 10, 'thitbo.png', 'ko');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `ID_ThanhVien` int(11) NOT NULL,
  `TenDangNhap` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `HoVaTen` varchar(30) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `NgayDangKi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`ID_ThanhVien`, `TenDangNhap`, `MatKhau`, `Email`, `HoVaTen`, `DiaChi`, `SoDienThoai`, `NgayDangKi`) VALUES
(1, 'b1231121', 'asdasd', 'proaass2@gmail.com', 'Tao là giang hồ', 'hai phong', '0375522116', '2021-12-05'),
(2, 'proaass2', '1231121', 'quocbao2116@gmail.com', 'Mai Văn Nguyễn', '49 Lâm Đồng', '0123421214', '2021-12-05'),
(4, 'bibaoprovip', '1231121', 'huyae01833@gmail.com', 'Nguyễn Hà Quốc Bảo', 'Quan 10', '0767772112', '2021-12-08'),
(5, 'buonviem113', '1231121', 'quocbao2116@gmail.com', 'Nguyễn Hà Quốc Bảo', 'hai phong123', '0375522116', '2021-12-21'),
(7, 'user1', '1231121', 'quocbao2116@gmail.com', 'Nguyễn Hà Quốc Bảo', 'Quan 10', '0767772112', '2021-12-25'),
(8, 'user2', 'asd', 'quocbao2116@gmail.com', 'Nguyễn Hà Quốc Bảo 1', 'Quan 10', '0767772112', '2021-12-25'),
(9, 'user3', '1231121', 'quocbao2116@gmail.com', 'n', 'Quan 10', '0767772112', '2021-12-25'),
(10, 'cac123', '1231121', 'huyae01833@gmail.com', 'Nguyễn Hà Quốc Bảo', 'Quan 10', '0767772112', '2022-04-01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`ID_BinhLuan`),
  ADD KEY `ID_ThanhVien` (`ID_ThanhVien`),
  ADD KEY `ID_SanPham` (`ID_SanPham`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`ID_HoaDon`,`ID_ThanhVien`,`ID_SanPham`),
  ADD KEY `ID_HoaDon` (`ID_HoaDon`),
  ADD KEY `ID_ThanhVien` (`ID_ThanhVien`),
  ADD KEY `ID_SanPham` (`ID_SanPham`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ID_DanhMuc`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID_HoaDon`),
  ADD KEY `ID_ThanhVien` (`ID_ThanhVien`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`ID_NCC`);

--
-- Chỉ mục cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`ID_QuanLy`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID_SanPham`),
  ADD KEY `ID_NhaCungCap` (`ID_NhaCungCap`),
  ADD KEY `ID_DanhMuc` (`ID_DanhMuc`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`ID_ThanhVien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `ID_BinhLuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ID_DanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ID_HoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `ID_NCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `quanly`
--
ALTER TABLE `quanly`
  MODIFY `ID_QuanLy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID_SanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3015;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `ID_ThanhVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`),
  ADD CONSTRAINT `chitiethoadon_ibfk_3` FOREIGN KEY (`ID_HoaDon`) REFERENCES `hoadon` (`ID_HoaDon`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ID_NhaCungCap`) REFERENCES `nhacungcap` (`ID_NCC`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`ID_DanhMuc`) REFERENCES `danhmuc` (`ID_DanhMuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
