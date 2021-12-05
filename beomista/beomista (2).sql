-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2021 lúc 08:57 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `beomista`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MACT` int(11) NOT NULL,
  `MAHD` int(11) NOT NULL,
  `MASP` char(7) NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `DONGIA` float NOT NULL,
  `THANHTIEN` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MACT`, `MAHD`, `MASP`, `SOLUONG`, `DONGIA`, `THANHTIEN`) VALUES
(1, 2, 'SP101', 1, 550000, 550000),
(2, 2, 'SP1002', 1, 590000, 590000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` int(11) NOT NULL,
  `MAKH` int(11) NOT NULL,
  `NGAYLAP` date NOT NULL,
  `TONGTIEN` float NOT NULL,
  `TINHTRANG` tinyint(2) NOT NULL,
  `CMT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MAHD`, `MAKH`, `NGAYLAP`, `TONGTIEN`, `TINHTRANG`, `CMT`) VALUES
(2, 1, '2021-12-04', 1140000, 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` int(11) NOT NULL,
  `HOKH` varchar(50) NOT NULL,
  `TENKH` varchar(100) NOT NULL,
  `GIOITINH` varchar(10) NOT NULL,
  `SDT` char(11) NOT NULL,
  `DIACHI` varchar(100) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `HOKH`, `TENKH`, `GIOITINH`, `SDT`, `DIACHI`, `EMAIL`, `password`) VALUES
(1, 'Nguyễn', 'Văn Lam', 'nam', '0394361456', '94 Nguyễn Thị Thập', 'vanlam@gmail.com', 'd0f1ae6b6af967c73e61da0015429085');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `MASP` char(7) NOT NULL,
  `MANCC` char(7) NOT NULL,
  `HSD_SP` date NOT NULL,
  `SLCON` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`MASP`, `MANCC`, `HSD_SP`, `SLCON`) VALUES
('SP1001', 'TFS', '2021-02-27', 36),
('SP1002', 'TFS', '2021-02-27', 31),
('SP1003', 'TFS', '2021-02-27', 85),
('SP101', 'RLB', '2021-03-25', 45),
('SP102', 'ISN', '2020-06-10', 40),
('SP103', 'PU', '2022-06-09', 53),
('SP104', 'ISN', '2021-05-17', 30),
('SP1100', 'TFS', '2021-02-27', 71),
('SP1101', 'TFS', '2021-02-27', 38),
('SP1102', 'TFS', '2021-02-27', 37),
('SP1200', 'DE', '2021-05-25', 54),
('SP1201', 'DE', '2021-05-25', 67),
('SP1202', 'CL', '2022-12-13', 78),
('SP1203', 'CL', '2022-12-13', 43),
('SP1204', 'CL', '2022-12-13', 17),
('SP1300', 'BR', '2021-06-23', 69),
('SP1301', 'PP', '2023-07-01', 56),
('SP1302', 'PP', '2023-07-14', 71),
('SP1400', 'CL', '2022-02-14', 33),
('SP1401', 'DE', '2020-01-02', 35),
('SP1402', 'DE', '2020-01-02', 42),
('SP1403', 'DE', '2020-01-02', 63),
('SP1404', 'BR', '2021-04-10', 71),
('SP1405', 'BR', '2021-04-10', 58),
('SP1500', 'DE', '2021-03-10', 60),
('SP1501', 'DE', '2021-03-10', 77),
('SP1502', 'DE', '2021-03-10', 23),
('SP1503', 'DE', '2021-03-10', 11),
('SP1504', 'DE', '2021-03-10', 82),
('SP1505', 'DE', '2021-03-10', 81),
('SP1600', 'PP', '2022-02-07', 57),
('SP1601', 'PP', '2022-02-07', 85),
('SP1602', 'CL', '2022-10-09', 41),
('SP1700', 'PP', '2022-03-01', 55),
('SP1701', 'PP', '2022-03-01', 72),
('SP1702', 'CL', '2023-06-21', 63),
('SP1703', 'CL', '2023-06-21', 66),
('SP1800', 'CL', '2023-06-21', 20),
('SP1801', 'BR', '2021-12-07', 69),
('SP1802', 'BR', '2021-12-07', 31),
('SP1900', 'TFS', '2023-12-17', 47),
('SP1901', 'TFS', '2023-12-17', 21),
('SP1904', 'BR', '2021-06-20', 69),
('SP1905', 'BR', '2021-06-20', 31),
('SP1906', 'BR', '2021-06-20', 74),
('SP1907', 'DE', '2021-06-25', 39),
('SP1914', 'LM', '2021-09-24', 53),
('SP1915', 'LM', '2021-09-24', 26),
('SP200', 'RV', '2021-04-05', 32),
('SP201', 'RB', '2022-07-09', 23),
('SP202', 'RLB', '2021-09-02', 51),
('SP203', 'MP', '2020-01-14', 34),
('SP204', 'MP', '2020-03-27', 12),
('SP205', 'PU', '2021-08-12', 81),
('SP300', 'RLB', '2021-05-03', 62),
('SP301', 'RLB', '2021-02-11', 45),
('SP302', 'ISN', '2021-01-26', 68),
('SP303', 'PU', '2022-04-07', 73),
('SP304', 'PU', '2022-05-22', 86),
('SP305', 'ACW', '2021-04-08', 34),
('SP400', 'PU', '2020-03-09', 35),
('SP401', 'RB', '2022-08-13', 32),
('SP402', 'ACW', '2020-01-06', 58),
('SP403', 'ACW', '2022-04-16', 12),
('SP500', 'ISN', '2021-06-21', 18),
('SP501', 'ACW', '2022-01-11', 74),
('SP502', 'PU', '2020-11-13', 62),
('SP503', 'RV', '2020-01-27', 45),
('SP504', 'RV', '2021-02-20', 60),
('SP600', 'PU', '2021-12-04', 43),
('SP601', 'RV', '2021-08-14', 60),
('SP602', 'RB', '2022-08-01', 37),
('SP603', 'ACW', '2022-01-29', 43),
('SP604', 'ACW', '2022-02-20', 35),
('SP700', 'ISN', '2021-07-09', 45),
('SP701', 'PU', '2020-09-12', 31),
('SP702', 'BL', '2021-07-28', 67),
('SP703', 'BL', '2021-07-05', 74),
('SP704', 'RB', '2022-02-11', 65),
('SP705', 'MP', '2020-01-03', 11),
('SP800', 'LM', '2023-01-02', 35),
('SP801', 'LM', '2023-01-02', 15),
('SP802', 'LM', '2023-01-02', 44),
('SP803', '3CE', '2021-03-24', 66),
('SP804', 'TFS', '2021-03-12', 48),
('SP805', 'TFS', '2021-03-12', 74),
('SP900', 'LM', '2023-10-09', 46),
('SP901', 'LM', '2023-10-09', 75),
('SP902', 'LM', '2023-10-09', 60),
('SP903', 'TFS', '2020-11-24', 37),
('SP904', 'TFS', '2020-11-24', 81),
('SP905', 'TFS', '2020-11-24', 48);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MALOAI` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TENLOAI` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`MALOAI`, `TENLOAI`) VALUES
('BB', 'BB Cream'),
('BU', 'Blusher'),
('CON', 'Concealer'),
('CU', 'Cushion'),
('EL', 'Kẻ mắt'),
('EYE', 'Màu mắt'),
('HL', 'Highlight'),
('KCM', 'Kẻ chân mày'),
('KCN', 'Kem chống nắng'),
('KD', 'Kem dưỡng ẩm'),
('KL', 'Kem lót'),
('KN', 'Kem nền'),
('LP', 'Son môi'),
('MA', 'Mascara'),
('SR', 'Serum'),
('SRM', 'Sữa rửa mặt'),
('TO', 'Toner'),
('TT', 'Tẩy trang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MANCC` char(7) NOT NULL,
  `TENNCC` varchar(100) NOT NULL,
  `DIACHI` varchar(200) NOT NULL,
  `SDT` char(20) NOT NULL,
  `EMAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MANCC`, `TENNCC`, `DIACHI`, `SDT`, `EMAIL`) VALUES
('3CE', '3CE', '522A Lê Văn Sỹ , phường 14, quận 3, Hồ Chí Minh', '19000017', 'support@3cevietnam.com.vn'),
('ACW', 'ACWELL', '83 Achasan-ro Seongdong-gu, Seoul, Hàn Quốc', '852-2377-900', 'info@acwell.asia'),
('BL', 'BEPLAIN', '4F, Dosan-daero 145, Gangnam-hu, Seoul, Hàn Quốc ', '842-86-01047', 'overseas@momentsco.com'),
('BR', 'BLACK ROUGE', 'Tầng 10, 194 Golden Building, 473 Điện Biên Phủ, phường 25, quận Bình Thạnh, Hồ Chí Minh', '0909312350', 'blackrougevn@gmail.com'),
('CL', 'CLIO', '66, Wangsimni-ro, Seongdong-gu, Seoul, Hàn Quốc', '82-80-080-1510', 'clioglobal@gmail.com'),
('DE', 'Dear Dahlia', '12th floor, 317, Dosan-daero, Gangnam-gu, Seoul, Hàn Quốc', '2348100766', 'support@deardahlia.com'),
('ISN', 'ISNTREE', '6F, 12, Nonhyeon-ro 132-gil, Gangnam-gu, Seoul, Hàn Quốc', '130-86-66821', 'sales@isntree.com'),
('LM', 'Lemonade', 'Số 3 Nguyễn Khắc Nhu, Phường Trúc Bạch, Quận Ba Đình, Hà Nội, Việt Nam', '0987272212', 'lemonade01@lemonade.vn'),
('MP', 'Make P:rem', '42 teheran-ro 108-gil, Daechi-dong, Gangnam-gu, Seoul, Hàn Quốc', '070-8228-0808', 'global@magnifkorea.com'),
('PP', 'PERIPERA', '66 Wangsimni-ro, Seonhdong-gu, Seoul, Hàn Quốc', '82800801510', 'periperagb@co.kr'),
('PU', 'PURITO', '30 Songdomorae-ro, Yeonsu-gu, Incheon', '82-7088331884', 'purito_cs@purito.co.kr'),
('RB', 'Real Barrier', 'Gasan digital 1-ro, Geumcheon-gu, #208-30, Seoul, 08591, Hàn Quốc', '1-732-534-9425', 'service@atopalm.com'),
('RLB', 'ROUNDLAB', '83-21, Wangsimni-ro, Seongdong-gu, Seoul, Hàn Quốc', '070-7717-0675', 'trade@roundlab.co.kr'),
('RM', 'ROMAND', '7, Nonhyeon-ro 150-gil, Gangnam-gu, Seoul, Seoul, Hàn Quốc', '82216702238', 'global@romand.co.kr'),
('RV', 'ROVECTIN', '41 Appujeong-ro 79 gil, Gangnam-gu, Seoul, Hàn Quốc', '82-2-2225-8100', 'global@rovectin.co.kr'),
('TFS', 'The Face Shop', 'Lầu 10, Toà nhà HD Bank, 25Bis Nguyễn Thị Minh Khai, phường Bến Nghé, quận 1, TP.HCM', '18006035', 'tfsonline@hsvgroup.com.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MANV` char(7) NOT NULL,
  `HONV` varchar(50) NOT NULL,
  `TENNV` varchar(100) NOT NULL,
  `GIOITINH` varchar(5) NOT NULL,
  `NGSINH` date NOT NULL,
  `DCHI` varchar(200) NOT NULL,
  `SDT` char(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `HONV`, `TENNV`, `GIOITINH`, `NGSINH`, `DCHI`, `SDT`, `EMAIL`) VALUES
('NV01', 'Trần', 'Kim Oanh', 'Nữ', '1998-10-29', '251 Nguyễn Thiện Thuật, phường 3, quận 3, Hồ Chí Minh', '0964126978', 'kimoanhtran98@gmail.com'),
('NV02', 'Nguyễn', 'Thị Mẫn Nhi', 'Nữ', '1996-04-10', '370/85 Lê Văn Sỹ, phường 13, quận 4, Hồ Chí Minh ', '0985412236', 'mannhing@gmail.com'),
('NV03', 'Võ', 'Thiện Trung', 'Nam', '1997-08-08', '118/1A Nguyễn Trãi, phường 3, quận 5, Hồ Chí Minh', '0584103698', 'vothientrung88@gmail.com'),
('NV04', 'Lê', 'Ngọc Anh', 'Nữ', '1993-07-17', '5A Võ Thị Sáu, phường Tân Định, quận 1, Hồ Chí Minh', '0978526671', 'ngocanh1993@gmail.com'),
('NV05', 'Nguyễn', 'Sơn Quân', 'Nam', '1995-04-06', '99/8 Võ Oanh, phường 25, quận Bình Thạnh, Hồ Chí Minh', '0885231014', 'sownquan20@gmail.com'),
('NV06', 'Lãm', 'Tường Lâm', 'Nam', '1995-12-30', '152/10A Nguyễn Thị Minh Khai, phường Phạm Ngũ Lão, quận 1, Hồ Chí Minh', '0947469512', 'lamtuonglam2021@gmail.com'),
('NV07', 'Phạm', 'Thị Huyền Anh', 'Nữ', '1999-09-03', '25A Tú Xương, phường 7, quận 3, Hồ Chí Minh', '0123354203', 'huyenanhpham19@gmail.com'),
('NV08', 'Huỳnh', 'Ngọc Nhi', 'Nữ', '2000-05-16', '192/D4 Nam Kỳ Khởi Nghĩa, phường 7, quận 3, Hồ Chí Minh', '0867402561', 'huynhngocnhi165@gmail.com'),
('NV09', 'Phạm', 'Đình Trung', 'Nam', '2000-02-18', '498 Nguyễn Thị Minh Khai, phường 2, quận 3, Hồ Chí Minh', '0934165238', 'trungdinh2000@gmail.com'),
('NV10', 'Trần', 'Hoàng Khải', 'Nam', '1997-11-07', '135/28 Nguyễn Hữu Cảnh, quận Bình Thạnh, Hồ Chí Minh', '0320145698', 'tranhoangkhai11@gmail.com'),
('NV11', 'Trương', 'Thùy Ngân', 'Nữ', '1996-12-09', '57E Tú Xương, phường 7, quận 3, Hồ Chí Minh', '0378749630', 'nganthuy0912@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` char(7) NOT NULL,
  `TENSP` varchar(100) NOT NULL,
  `DVTINH` varchar(50) NOT NULL,
  `DONGIA` float NOT NULL,
  `MALOAI` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MOTA` varchar(250) NOT NULL,
  `ANH` varchar(50) NOT NULL,
  `NGAYLAP` date NOT NULL DEFAULT current_timestamp(),
  `SLBAN` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `TENSP`, `DVTINH`, `DONGIA`, `MALOAI`, `MOTA`, `ANH`, `NGAYLAP`, `SLBAN`) VALUES
('SP1001', 'Kem Lót The Face Shop Gold Collagen Ampule Makeup Base SPF30 PA++ Green', 'Hộp', 799000, 'KL', '- Kem lót trang điểm giúp làm sáng hồng tông da\r\n- Bổ sung 10% tinh chất collagen và vàng giúp làm sáng, cải thiện nếp nhăn và làm săn chắc da\r\nBảng màu \r\n#01 Pink: phù hợp da trắng xanh, da thường\r\n#02 Green: phù hợp với da mụn, da dễ ửng đỏ', 'sp1001.jpg', '2021-12-04', 0),
('SP1002', 'Kem Lót Trang Điểm Nâng Tông Da The Face Shop Rosy Nude Tone-Up Sun Base SPF20 PA++', 'Chai', 590000, 'KL', '- Kem lót trang điểm 3 trong 1 giúp làm mịn bề mặt da, nâng tông và chống nắng\r\n- Sản phẩm chứa 53% thành phần cấp ẩm dịu nhẹ\r\n- Đặc biệt thích hợp cho làn da xỉn màu, da dầu hoặc những người thường xuyên làm việc ngoài trời', 'sp1002.jpg', '2021-12-04', 0),
('SP1003', 'Kem Lót Dành Cho Da Mụn Sắc Đỏ The Face Shop Air Cotton Make Up Base SPF 30 PA++ Mint', 'Chai', 115000, 'KL', '- Hỗ trợ khả năng chống nắng bảo vệ da, tạo 1 lớp nền bảo vệ cực mỏng, đồng thời hiệu chỉnh tông màu da\r\n- Màu Mint: Sử dụng cho làn da có sắc đỏ, da mụn', 'sp1003.png', '2021-12-04', 0),
('SP101', 'ROUNDLAB 1025 Dokdo Pad\r\n', 'Hủ', 550000, 'TDC', '- Pad tẩy da chết làm dịu chứa PHA và nước biển tinh khiết từ đảo Ulleungdo\r\n- Panthenol xoa dịu và giúp da được thả lỏng\r\n- Tính năng tẩy da chết nhẹ nhàng mà không gây kích ứng\r\n', 'sp101.jpg', '2021-12-04', 0),
('SP102', 'ISNTREE\r\nCLEAR SKIN BHA TONER\r\n', 'Chai', 41000, 'TDC', '- Loại toner tẩy tế bào chết (pH 3,5 ~ 4,0), nhẹ nhàng loại bỏ tế bào da chết và làm mịn kết cấu da\r\n- Kết cấu lỏng nhẹ, thẩm thấu nhanh, không để lại cảm giác dính rít\r\n- Phù hợp cho da dầu đến da hỗn hợp', 'sp102.jpg', '2021-12-04', 0),
('SP103', 'PURITO\r\nCentella Green Level All In One Mild Pad\r\n', 'Hủ', 402000, 'TDC', '- Pad tẩy da chết chiết xuất rau má dịu nhẹ\r\n- Kiểm soát bã nhờn và cung cấp dưỡng chất cho da\r\n- Phù hợp với mọi loại da, đặc biệt là da nhạy cảm\r\n', 'sp103.jpg', '2021-12-04', 0),
('SP104', 'ISNTREE\r\nChestnut BHA 2% Clear Liquid\r\n', 'Chai', 420000, 'TDC', '- Dung dịch loại bỏ tế bào chết chứa 2% Salicylic Acid\r\n- Chiết xuất vỏ hạt dẻ có khả năng se khít lỗ chân lông\r\n- Phù hợp với da hỗn hợp đến da dầu', 'sp104.jpg', '2021-12-04', 0),
('SP1100', 'Kem Nền Đa Năng Power Perfection BB Cream SPF 37 PA++ #V103 Light', 'Chai', 770000, 'BB', '- Kem trang điểm 3 trong 1 (chống nhăn da, làm trắng, chống nắng) sẽ mang đến lớp phủ hoàn hảo\r\n- Lớp trang điểm đẹp hơn (lớp phủ hoàn mỹ + độ bám tốt + lâu trôi) tạo cảm giác mịn màng, không bóng nhờn hay dày phấn\r\n- Đã được kiểm nghiệm lâm sàng ', 'sp1100.png', '2021-12-04', 0),
('SP1101', 'Kem Nền Đa Năng Power Perfection BB Cream SPF 37 PA++ #V201 Medium Light', 'Chai', 765000, 'BB', '- Kem trang điểm 3 trong 1 (chống nhăn da, làm trắng, chống nắng) sẽ mang đến lớp phủ hoàn hảo\r\n- Lớp trang điểm đẹp hơn (lớp phủ hoàn mỹ + độ bám tốt + lâu trôi) tạo cảm giác mịn màng, không bóng nhờn hay dày phấn\r\n- Đã được kiểm nghiệm lâm sàng ', 'sp1101.jpg', '2021-12-04', 0),
('SP1102', 'Kem Nền Đa Năng Power Perfection BB Cream SPF 37 PA++ #V203 Medium ', 'Chai', 765000, 'BB', '- Kem trang điểm 3 trong 1 (chống nhăn da, làm trắng, chống nắng) sẽ mang đến lớp phủ hoàn hảo\r\n- Lớp trang điểm đẹp hơn (lớp phủ hoàn mỹ + độ bám tốt + lâu trôi) tạo cảm giác mịn màng, không bóng nhờn hay dày phấn\r\n- Đã được kiểm nghiệm lâm sàng ', 'sp1102.jpg', '2021-12-04', 0),
('SP1200', 'Kem Che Khuyết Điểm Paradise Dual Palette - Concealer Duo: Light', 'Hộp', 899000, 'CON', '- Với thiết kế hộp vỏ hình khối, hoa văn vân đá sang trọng. Bên trong gồm 2 mặt màu kem che khuyết điểm được ngăn cách bằng một chiếc gương\r\n- Với thành phần chính từ Dahlia Variabilis Flower Extract™ làm ẩn hết đi những đốm mụn, thẹo hay tàn nhang', 'sp1200.jpg', '2021-12-04', 0),
('SP1201', 'Kem Che Khuyết Điểm Paradise Dual Palette - Concealer Duo: Medium', 'Hộp', 899000, 'CON', '- Với thiết kế hộp vỏ hình khối, hoa văn vân đá sang trọng. Bên trong gồm 2 mặt màu kem che khuyết điểm được ngăn cách bằng một chiếc gương\r\n- Với thành phần chính từ Dahlia Variabilis Flower Extract™ làm ẩn hết đi những đốm mụn, thẹo hay tàn nhang', 'sp1201.jpg', '2021-12-04', 0),
('SP1202', 'Kem Che Khuyết Điểm Tự Nhiên CLIO Kill Cover Airy-Fit Concealer #1.5 FAIR', 'Chai', 248000, 'CON', '- Giải pháp che phủ vết thâm chỉ trong tích tắc\r\n- Với thiết kế đầu cọ cực bé (3mm) dễ dàng chấm lên vùng khuyết điểm nhỏ nhất, không gây ảnh hưởng đến vùng da khác\r\n- Chất kem mỏng nhẹ như không khí, che phủ tốt tệp với màu da, tự nhiên như da thật', 'sp1202.png', '2021-12-04', 0),
('SP1203', 'Kem Che Khuyết Điểm Tự Nhiên CLIO Kill Cover Airy-Fit Concealer #1.5 LINGERIE', 'Chai', 248000, 'CON', '- Giải pháp che phủ vết thâm chỉ trong tích tắc\r\n- Với thiết kế đầu cọ cực bé (3mm) dễ dàng chấm lên vùng khuyết điểm nhỏ nhất, không gây ảnh hưởng đến vùng da khác\r\n- Chất kem mỏng nhẹ như không khí, che phủ tốt tệp với màu da, tự nhiên như da thật', 'sp1203.png', '2021-12-04', 0),
('SP1204', 'Kem Che Khuyết Điểm Tự Nhiên CLIO Kill Cover Airy-Fit Concealer #2.5 IVORY', 'Chai', 248000, 'CON', '- Giải pháp che phủ vết thâm chỉ trong tích tắc\r\n- Với thiết kế đầu cọ cực bé (3mm) dễ dàng chấm lên vùng khuyết điểm nhỏ nhất, không gây ảnh hưởng đến vùng da khác\r\n- Chất kem mỏng nhẹ như không khí, che phủ tốt tệp với màu da, tự nhiên như da thật', 'sp1204.png', '2021-12-04', 0),
('SP1300', 'Bảng Tạo Khối và Highlight BLACK ROUGE Up & Down Triple Shading ', 'Hộp', 358000, 'HL', '- Sản phẩm highlight & shading 2 trong 1 được sử dụng để tạo điểm nhấn và đường nét cho gương mặt đem lại nhiều hiệu quả\r\n- Phấn dạng nén, dễ dàng sử dụng cho người mới bắt đầu\r\n- Giúp tạo khối khuôn mặt sắc nét và cải thiện khuyết điểm làn da', 'sp1300.png', '2021-12-04', 0),
('SP1301', 'Phấn Tạo Khối Hiệu Ứng Tự Nhiên PERIPERA Ink V Shading #01 Almond Brown', 'Hộp', 299000, 'HL', '- Phấn tạo khối được thiết kế đa tác dụng với 3 ngăn, 3 tone màu shading từ nhạt đến đậm dần giúp sử dụng linh hoạt hơn theo từng vùng\r\n- Thích hợp với cả các nàng mới tập tành makeup đánh khối', 'sp1301.png', '2021-12-04', 0),
('SP1302', 'Phấn Tạo Khối Hiệu Ứng Tự Nhiên PERIPERA Ink V Shading #01 Cacao Brown', 'Hộp', 299000, 'HL', '- Phấn tạo khối được thiết kế đa tác dụng với 3 ngăn, 3 tone màu shading từ nhạt đến đậm dần giúp sử dụng linh hoạt hơn theo từng vùng\r\n- Thích hợp với cả các nàng mới tập tành makeup đánh khối', 'sp1302.png', '2021-12-04', 0),
('SP1400', 'Bảng Phấn Má Hồng CLIO Pro Blusher Palette 01 Mute Petal', 'Hộp', 599000, 'BU', '- Kết cấu từ các hạt ngọc trai siêu mềm mịn, dễ tán đều trên da\r\n- Phấn má đa năng, dùng được cho cả tone nóng và tone lạnh\r\n- Đa dạng màu sắc tươi tắn, thích hợp với nhiều phong cách trang điểm', 'sp1400.png', '2021-12-04', 0),
('SP1401', 'Má Hồng 2 IN 1 DEAR DAHLIA Blooming Edition Paradise Dual Palette Blusher Duo #Blossom Palace', 'Hộp', 759000, 'BU', '- Bộ đôi phấn má hồng mang lại sức sống và trong suốt như màu nước\r\n- Phấn má hồng hai tông màu \r\n- Không để lại vón cục trên da, tạo nên lớp trang điểm má quyến rũ', 'sp1401.png', '2021-12-04', 9),
('SP1402', 'Má Hồng 2 IN 1 DEAR DAHLIA Blooming Edition Paradise Dual Palette Blusher Duo #Candy Castle', 'Hộp', 759000, 'BU', '- Bộ đôi phấn má hồng mang lại sức sống và trong suốt như màu nước\r\n- Phấn má hồng hai tông màu \r\n- Không để lại vón cục trên da, tạo nên lớp trang điểm má quyến rũ', 'sp1402.png', '2021-12-04', 0),
('SP1403', 'Má Hồng 2 IN 1 DEAR DAHLIA Blooming Edition Paradise Dual Palette Blusher Duo #Petal Princess', 'Hộp', 759000, 'BU', '- Bộ đôi phấn má hồng mang lại sức sống và trong suốt như màu nước\r\n- Phấn má hồng hai tông màu \r\n- Không để lại vón cục trên da, tạo nên lớp trang điểm má quyến rũ', 'sp1403.png', '2021-12-04', 0),
('SP1404', 'Phấn Má Hồng BLACK ROUGE Cheek On #Lovely', 'Hộp', 298000, 'BU', '- Màu tự nhiên nhẹ nhàng như màu của tranh thủy họa\r\n- Màu lên sắc nét, mượt mà dù chỉ sau một lần phớt cọ\r\nBảng màu:\r\n– Love Pink: Toát lên sự nhẹ nhàng, đáng yêu – B01 Lovely On\r\n– Cute Peach: Khơi gợi sự trong sáng, thuần khiết – B03 Fresh On', 'sp1404.jpg', '2021-12-04', 0),
('SP1405', 'Phấn Má Hồng BLACK ROUGE Cheek On #Fresh', 'Hộp', 298000, 'BU', '- Màu tự nhiên nhẹ nhàng như màu của tranh thủy họa\r\n- Màu lên sắc nét, mượt mà dù chỉ sau một lần phớt cọ\r\nBảng màu:\r\n– Love Pink: Toát lên sự nhẹ nhàng, đáng yêu – B01 Lovely On\r\n– Cute Peach: Khơi gợi sự trong sáng, thuần khiết – B03 Fresh On', 'sp1405.png', '2021-12-04', 0),
('SP1500', 'Combo Màu Mắt Ánh Nhữ & Bảng Màu Mắt Đa Hiệu Ứng DEAR DAHLIA Secret Garden Palette - Sắc Hồng Chủ Đạ', 'Combo', 2000000, 'EYE', '- Bảng màu đa năng tiện dụng, sử dụng cho vùng má và mắt\r\n- Công thức bột phấn mềm, mịn, mượt giúp dễ dàng dàn trải trên vùng mắt\r\n- Secret Garden Palette gồm 9 tone màu sắc độ tinh tế và linh hoạt trong việc pha trộn độc đáo của các màu ấm và lạnh', 'sp1500.jpg', '2021-12-04', 0),
('SP1501', 'Combo Màu Mắt Ánh Nhữ & Bảng Màu Mắt Đa Hiệu Ứng DEAR DAHLIA Secret Garden Palette - Sắc Hồng Đất', 'Combo', 2006000, 'EYE', '- Bảng màu đa năng tiện dụng, sử dụng cho vùng má và mắt\r\n- Công thức bột phấn mềm, mịn, mượt giúp dễ dàng dàn trải trên vùng mắt\r\n- Secret Garden Palette gồm 9 tone màu sắc độ tinh tế và linh hoạt trong việc pha trộn độc đáo của các màu ấm và lạnh', 'sp1501.jpg', '2021-12-04', 0),
('SP1502', 'Combo Màu Mắt Ánh Nhữ & Bảng Màu Mắt Đa Hiệu Ứng DEAR DAHLIA Secret Garden Palette - Sắc Tím Chủ Đạo', 'Combo', 2006000, 'EYE', '- Bảng màu đa năng tiện dụng, sử dụng cho vùng má và mắt\r\n- Công thức bột phấn mềm, mịn, mượt giúp dễ dàng dàn trải trên vùng mắt\r\n- Secret Garden Palette gồm 9 tone màu sắc độ tinh tế và linh hoạt trong việc pha trộn độc đáo của các màu ấm và lạnh', 'sp1502.jpg', '2021-12-04', 0),
('SP1503', 'Bảng Màu Mắt Đa Hiệu Ứng DEAR DAHLIA Secret Garden Palette - Sắc Hồng Chủ Đạo', 'Hộp', 1499000, 'EYE', '- Kết cấu màu mắt dạng lỏng, nhẹ dễ dàn trải cùng khả năng bám màu lâu trôi\r\n- Chứa bột ngọc trai tạo độ nhũ cùng khả năng bắt sáng\r\n- Màu mắt sử dụng chất liệu 100% từ thực vật, an toàn cho vùng da nhạy cảm ở mắt', 'sp1503.jpg', '2021-12-04', 0),
('SP1504', 'Combo Màu Mắt Ánh Nhữ & Bảng Màu Mắt Đa Hiệu Ứng DEAR DAHLIA Secret Garden Palette - Sắc Hồng Đất', 'Hộp', 1449000, 'EYE', '- Kết cấu màu mắt dạng lỏng, nhẹ dễ dàn trải cùng khả năng bám màu lâu trôi\r\n- Chứa bột ngọc trai tạo độ nhũ cùng khả năng bắt sáng\r\n- Màu mắt sử dụng chất liệu 100% từ thực vật, an toàn cho vùng da nhạy cảm ở mắt', 'sp1504.jpg', '2021-12-04', 0),
('SP1505', 'Combo Màu Mắt Ánh Nhữ & Bảng Màu Mắt Đa Hiệu Ứng DEAR DAHLIA Secret Garden Palette - Sắc Tím Chủ Đạo', 'Hộp', 1449000, 'EYE', '- Kết cấu màu mắt dạng lỏng, nhẹ dễ dàn trải cùng khả năng bám màu lâu trôi\r\n- Chứa bột ngọc trai tạo độ nhũ cùng khả năng bắt sáng\r\n- Màu mắt sử dụng chất liệu 100% từ thực vật, an toàn cho vùng da nhạy cảm ở mắt', 'sp1505.jpg', '2021-12-04', 0),
('SP1600', 'Mascara Chải Mi Có Màu PERIPERA Ink Color Cara #01 Black Espresso', 'Chai', 279000, 'MA', '- Giúp đôi mi cong nhẹ tự nhiên, dày đều với màu sắc thanh lịch, tinh tế theo phong cách của chính bạn\r\nBảng màu\r\n#01 Black Espresso: với màu cafe thiên nâu nổi bật\r\n#02 Black Milk Tea Brown: với màu sắc thiên nâu đen', 'sp1600.png', '2021-12-04', 0),
('SP1601', 'Mascara Chải Mi Có Màu PERIPERA Ink Color Cara #02 Black Milk Tea Brown', 'Chai', 279000, 'MA', '- Giúp đôi mi cong nhẹ tự nhiên, dày đều với màu sắc thanh lịch, tinh tế theo phong cách của chính bạn\r\nBảng màu\r\n#01 Black Espresso: với màu cafe thiên nâu nổi bật\r\n#02 Black Milk Tea Brown: với màu sắc thiên nâu đen', 'sp1601.png', '2021-12-04', 0),
('SP1602', 'Mascara Làm Cong Mi, Chống Trôi CLIO Kill Lash Super Proof  Mascara #001 Long Curling', 'Chai', 489000, 'MA', '- Hiệu ứng chống nước mồ hôi và bã nhờn mạnh mẽ giúp không lem, không nhòa, không vón cục khi sử dụng\r\n- Thích hợp cho cả những cô nàng lần đầu dùng mascara\r\nBảng màu:\r\n001 Long Curling: làm dài và cong mi\r\n002 Volue Curling: làm dày và cong mi', 'sp1602.png', '2021-12-04', 0),
('SP1700', 'Chì Kẻ Chân Mày PERIPERA Speedy Skinny Brow #01 Gray Brown', 'Cây', 139000, 'KCM', '- Với 1 đầu chì kẻ mày và 1 đầu chổi chải để tán đều, cố định sợi lông mày và điều chỉnh độ đậm nhạt của chì kẻ\r\n- Chất chì mềm mịn, dễ tán đều và không vón cục\r\n- Kích thước nhỏ gọn dễ mang theo bên mình, mẫu mã dễ thương và sành điệu', 'sp1700.png', '2021-12-04', 0),
('SP1701', 'Chì Kẻ Chân Mày PERIPERA Speedy Skinny Brow #02 Dark Brown', 'Cây', 139000, 'KCM', '- Với 1 đầu chì kẻ mày và 1 đầu chổi chải để tán đều, cố định sợi lông mày và điều chỉnh độ đậm nhạt của chì kẻ\r\n- Chất chì mềm mịn, dễ tán đều và không vón cục\r\n- Kích thước nhỏ gọn dễ mang theo bên mình, mẫu mã dễ thương và sành điệu', 'sp1701.png', '2021-12-04', 0),
('SP1702', 'Chì Kẻ Chân Mày CLIO Kill Brown Auto Hard Brow Pencil Edge Slim #01 Natural Brown', 'Cây', 389000, 'KCM', '- Đầu chì sở hữu thiết kế 3D hình lục giác cực mỏng giúp vẽ chân mày dễ dàng\r\n- Sản phẩm chứa bột hút dầu giúp duy trì màu sắc và hình dạng trong thời gian dài, giữ cho khung chân mày sắc nét và đều màu cả ngày\r\n', 'sp1702.png', '2021-12-04', 0),
('SP1703', 'Chì Kẻ Chân Mày CLIO Kill Brown Auto Hard Brow Pencil Edge Slim #02 Light Brown', 'Cây', 389000, 'KCM', '- Đầu chì sở hữu thiết kế 3D hình lục giác cực mỏng giúp vẽ chân mày dễ dàng\r\n- Sản phẩm chứa bột hút dầu giúp duy trì màu sắc và hình dạng trong thời gian dài, giữ cho khung chân mày sắc nét và đều màu cả ngày\r\n', 'sp1703.png', '2021-12-04', 0),
('SP1800', 'Bút Kẻ Viền Mắt Chống Trôi CLIP Super Proof Brush Liner #Brown', 'Cây', 499000, 'EL', '- Công thức mực in chống trôi chống lem tối đa, mang lại đôi mắt sắc nét cả ngày dài\r\n- Dễ dàng sử dụng giúp dễ thao tác cho những người mới bắt đầu tập kẻ\r\n- Đặc biệt thích hợp cho làn da dầu, dễ đổ mồ hôi\r\n', 'sp1800.png', '2021-12-04', 0),
('SP1801', 'Kẻ Mắt Nước Lâu Trôi BLACK ROUGE All Day Power Proof  Pen Liner #Deep Black', 'Cây', 318000, 'EL', '- Đầu cọ mảnh nhưng mềm mại linh hoạt, vô dùng dễ thao tác, nét kẻ thanh mảnh, lướt nhẹ êm và vô cùng dễ kẽ\r\n- Chất gel nước cực kì sắc nét & khó lem, lên màu rõ ngay lần di bút đầu tiên\r\n- Độ bám kéo dài cả ngày, không dễ bị rửa trôi', 'sp1801.png', '2021-12-04', 0),
('SP1802', 'Kẻ Mắt Nước Lâu Trôi BLACK ROUGE All Day Power Proof  Pen Liner #Deep Brown', 'Cây', 318000, 'EL', '- Đầu cọ mảnh nhưng mềm mại linh hoạt, vô dùng dễ thao tác, nét kẻ thanh mảnh, lướt nhẹ êm và vô cùng dễ kẽ\r\n- Chất gel nước cực kì sắc nét & khó lem, lên màu rõ ngay lần di bút đầu tiên\r\n- Độ bám kéo dài cả ngày, không dễ bị rửa trôi', 'sp1802.jpg', '2021-12-04', 0),
('SP1900', 'Son Lì The Face Shop Rouge True Matte #04 Peach Coral', 'Thỏi', 499000, 'LP', '- Son có độ lì nhưng vẫn mịn, mướt và lâu trôi\r\n- Tạo cảm giác siêu nhẹ môi và có độ lên màu chuẩn sắc\r\n- Son thỏi lì nhưng vẫn có độ dưỡng không làm khô, bong tróc môi\r\n- Kết cấu nhẹ, dễ dàng tán đều', 'sp1900.png', '2021-12-04', 0),
('SP1901', 'Son Lì The Face Shop Rouge True Matte #07 Read Pouch', 'Thỏi', 499000, 'LP', '- Son có độ lì nhưng vẫn mịn, mướt và lâu trôi\r\n- Tạo cảm giác siêu nhẹ môi và có độ lên màu chuẩn sắc\r\n- Son thỏi lì nhưng vẫn có độ dưỡng không làm khô, bong tróc môi\r\n- Kết cấu nhẹ, dễ dàng tán đều', 'sp1901.jpg', '2021-12-04', 0),
('SP1903', 'Son Lì The Face Shop Rouge True Matte #10 Velvet Pink', 'Thỏi', 499000, 'LP', '- Son có độ lì nhưng vẫn mịn, mướt và lâu trôi\r\n- Tạo cảm giác siêu nhẹ môi và có độ lên màu chuẩn sắc\r\n- Son thỏi lì nhưng vẫn có độ dưỡng không làm khô, bong tróc môi\r\n- Kết cấu nhẹ, dễ dàng tán đều', 'sp1903.png', '2021-12-04', 0),
('SP1904', 'Son Thỏi BLACK ROUGE Rose Velvet Lipstick #R01 Lady Rose', 'Thỏi', 318000, 'LP', '- Chất son sáp nhẹ tênh không gây cảm giác nặng môi\r\n- Độ bám màu cao duy trì sự rạng rỡ suốt ngày dài, nhờ dưỡng chất có trong son mà sẽ không bị khô môi\r\n- Bảng màu tone thiên đỏ rực rỡ, đa dạng phong cách từ dịu nhẹ ngọt ngào đến quyến rũ', 'sp1904.png', '2021-12-04', 0),
('SP1905', 'Son Thỏi BLACK ROUGE Rose Velvet Lipstick #R03 Latte Rose', 'Thỏi', 318000, 'LP', '- Chất son sáp nhẹ tênh không gây cảm giác nặng môi\r\n- Độ bám màu cao duy trì sự rạng rỡ suốt ngày dài, nhờ dưỡng chất có trong son mà sẽ không bị khô môi\r\n- Bảng màu tone thiên đỏ rực rỡ, đa dạng phong cách từ dịu nhẹ ngọt ngào đến quyến rũ', 'sp1905.png', '2021-12-04', 0),
('SP1906', 'Son Thỏi BLACK ROUGE Rose Velvet Lipstick #R04 Burgundy Rose', 'Thỏi', 318000, 'LP', '- Chất son sáp nhẹ tênh không gây cảm giác nặng môi\r\n- Độ bám màu cao duy trì sự rạng rỡ suốt ngày dài, nhờ dưỡng chất có trong son mà sẽ không bị khô môi\r\n- Bảng màu tone thiên đỏ rực rỡ, đa dạng phong cách từ dịu nhẹ ngọt ngào đến quyến rũ', 'sp1906.png', '2021-12-04', 0),
('SP1907', 'Son Thỏi Hiệu Ứng Lì Mịn DEAR DAHLIA Lip Paradise Effortless Matte Lipstick #M104 Camilla', 'Thỏi', 829000, 'LP', '- 100% thuần chay, không thử nghiệm trên động vật\r\n- Hiệu ứng rõ, chuẩn sắc, lưu trữ lâu dài\r\n- Thiết kế đặc trưng lấy cảm hứng từ bông hoa thược dược nở rộ\r\n- Thiết kế họa tiết đá hoa cương độc đáo, sang trọng, vĩnh cửu', 'sp1907.png', '2021-12-04', 0),
('SP1914', 'Son Kem LEMONADE Supernatural Matte Lip Cream #01 Mind Control Nâu Cam', 'Cây', 249000, 'LP', '- Là thỏi son kem lỳ gồm các tone nâu Tây cá tính, phá cách \r\n- Thiết kế thỏi son trụ với màu hồng gold chủ đạo\r\n- Áp dụng công nghệ sản xuất hiện đại, tiên tiến nhất đến từ Hàn Quốc giúp môi luôn được dưỡng mềm mại, mỏng nhẹ\r\n', 'sp1914.jpg', '2021-12-04', 0),
('SP1915', 'Son Kem LEMONADE Supernatural Matte Lip Cream #02 Forever Young Cam Đất', 'Cây', 249000, 'LP', '- Là thỏi son kem lỳ gồm các tone nâu Tây cá tính, phá cách \r\n- Thiết kế thỏi son trụ với màu hồng gold chủ đạo\r\n- Áp dụng công nghệ sản xuất hiện đại, tiên tiến nhất đến từ Hàn Quốc giúp môi luôn được dưỡng mềm mại, mỏng nhẹ\r\n', 'sp1915.jpg', '2021-12-04', 0),
('SP200', 'ROVECTIN\r\nClean Marine Micellar Deep Cleansing Water\r\n', 'Chai', 450000, 'TT', '- Nước tẩy trang sạch sâu với công nghệ Micellar loại bỏ hiệu quả lớp makeup đậm, kem chống nắng\r\n- Thành phần gồm nước biển sâu, muối biển Chết và Pure Marine Complex ™ với 9 loại thực vật biển\r\n- Phù hợp với mọi làn da, kể cả da nhạy cảm nhất', 'sp200.jpg', '2021-12-04', 0),
('SP201', 'Real Barrier\r\nControl-T Clear Pad\r\n', 'Hủ', 550000, 'TT', '- Miếng pad tẩy da chết và làm mịn kết cấu da chứa 0.5% PHA\r\n- Chất bông từ cotton tự nhiên giúp giảm ma sát lên da và thành phần PHA giúp tẩy da chết nhẹ nhàng\r\n- Phù hợp với mọi loại da, đặc biệt là da dầu mụn, da nhạy cảm', 'sp201.jpg', '2021-12-04', 0),
('SP202', 'ROUNDLAB\r\n1025 Dokdo Cleansing Oil\r\n', 'Chai', 550000, 'TT', '- Dầu tẩy trang dịu nhẹ, cung cấp độ ẩm với thành phần nước biển tinh khiết từ đảo Ulleungdo\r\n- Các loại dầu tự nhiên làm sạch tối ưu mà không gây ảnh hưởng đến các hoạt chất cấp ẩm vốn có\r\n- Phù hợp với mọi loại da, đặc biệt là da nhạy cảm', 'sp202.jpg', '2021-12-04', 0),
('SP203', 'MAKE P:REM\r\nSafe me. Relief moisture cleansing oil\r\n', 'Chai', 570000, 'TT', '- Dầu tẩy trang dịu nhẹ Make P:rem 2-trong-1 với thành phần lành tính với các loại dầu từ thiên nhiên, giúp làm sạch từ sâu trong lỗ chân lông\r\n- Có khả năng làm sạch mụn đầu đen hiệu quả lên đến 32.15%\r\n- Phù hợp với mọi loại da, kể cả da dầu và da ', 'sp203.jpg', '2021-12-04', 0),
('SP204', 'MAKE P:REM\r\nSafe me. Relief moisture cleansing milk\r\n', 'Chai', 550000, 'TT', '- Tẩy trang dạng sữa Make P:rem chiết xuất thực vật dịu nhẹ với độ pH 5.5\r\n- Làm sạch bã nhờn và bụi mịn lên tới 97.67%\r\n- Phù hợp với mọi loại da, kể ca da nhạy cảm', 'sp204.jpg', '2021-12-04', 0),
('SP205', 'PURITO\r\nFrom Green Cleansing Oil', 'Chai', 695000, 'TT', '- Dầu tẩy trang Purito dịu nhẹ với 5 loại dầu từ thiên nhiên\r\n- Lấy đi bụi bẩn, kem chống nắng cũng như lớp trang điểm hiệu quả\r\n- Phù hợp với mọi loại da, kể cả da dầu và da nhạy cảm', 'sp205.jpg', '2021-12-04', 0),
('SP300', 'ROUNDLAB\r\n1025 Dokdo Cleanser\r\n', 'Chai', 350000, 'SRM', '- Sữa rửa mặt tạo bọt dịu nhẹ với độ pH từ 5.0 đến 6.0\r\n- Hỗn hợp Panthenol, Allantoin và Ceramide xoa dịu cũng như củng cố hàng rào bảo vệ da\r\n- Kết cấu dạng foam bọt xốp, giúp làm sạch sâu\r\n- Phù hợp với mọi loại da, đặc biệt là da nhạy cảm', 'sp300.jpg', '2021-12-04', 0),
('SP301', 'ROUNDLAB\r\nBirch Juice Moisturizing Cleanser\r\n', 'Chai', 350000, 'SRM', '- Sữa rửa mặt cấp ẩm chiết xuất nhựa cây Bạch Dương\r\n- Kết cấu dạng dạng gel mỏng nhẹ\r\n- Phù hợp với mọi loại da, đặc biệt là làn da khô, nhạy cảm', 'sp301.jpg', '2021-12-04', 0),
('SP302', 'ISNTREE\r\nGreen Tea Fresh Cleanser\r\n', 'Chai', 340000, 'SRM', '- Sữa rửa mặt chiết xuất trà xanh loại bỏ bã nhờn tối ưu\r\n- Công thức chiết xuất thực vật cân bằng độ ẩm da\r\n- Phù hợp với da hỗn hợp đến da dầu', 'sp302.jpg', '2021-12-04', 0),
('SP303', 'PURITO\r\nFrom Green Deep Foaming Cleanser\r\n', 'Chai', 350000, 'SRM', '- Sữa rửa mặt tạo bọt độ pH 5.5, không chứa SLS, SLES\r\n- Chất hoạt động bề mặt có nguồn gốc từ dừa êm ái với da\r\n- Phù hợp với mọi làn da, kể ca da nhạy cảm', 'sp303.jpg', '2021-12-04', 0),
('SP304', 'PURITO\r\nDefence Barrier pH Cleanser\r\n', 'Chai', 420000, 'SRM', '- Sữa rửa mặt dịu nhẹ với độ pH 5.5\r\n- Kết cấu dạng Gel, nhẹ nhàng lấy đi bụi bẩn và tạp chất\r\n- Phù hợp với mọi loại da', 'sp304.jpg', '2021-12-04', 0),
('SP305', 'ACWELL\r\npH Balancing Micro Cleansing Foam\r\n', 'Chai', 340000, 'SRM', '- Sữa rửa mặt dạng foam\r\n- Độ pH 5.5\r\n- Làm sạch sâu mà không gây kích ứng\r\n- Phù hợp với mọi loại da, kể cả da nhạy cảm', 'sp305.jpg', '2021-12-04', 0),
('SP400', 'PURITO DermHA-3 Liquid', 'Chai', 480000, 'TO', '- Toner cấp nước làm dịu da chứa Hyaluronic Acid và Panthenol\r\n- Kết cấu lỏng nhẹ, thẩm thấu nhanh, không nhờn dính\r\n- Phù hợp với mọi làn da, đặc biệt là da dầu, da thiếu nước', 'sp400.jpg', '2021-12-04', 0),
('SP401', 'Real Barrier\r\nAqua Soothing Toner\r\n', 'Chai', 440000, 'TO', '- Toner cấp nước với 7 loại Hyaluronic Acid cùng công nghệ MLE tái tạo phục hồi da\r\n- Kết cấu lỏng nhẹ như nước, làm mát và xoa dịu da\r\n- Công nghệ độc quyền MLE® Skin Barrier Formula tạo lớp màng bảo vệ da với hình chữ thập Maltase Crosses', 'sp401.jpg', '2021-12-04', 0),
('SP402', 'ACWELL\r\nPhyto Active Balancing Toner\r\n', 'Chai', 600000, 'TO', '- Cấp ẩm cho da và cung cấp dưỡng chất cho da với thành phần Peptide cùng Amino Acid\r\n- Phức hợp B5 với chiết xuất rễ cam thảo, chiết xuất rễ đan sâm, rễ cây thông vàng và Beta Glucan\r\n- Phù hợp với loại da, đặc biệt là da lão hóa', 'sp402.jpg', '2021-12-04', 0),
('SP403', 'ACWELL Real Aqua Balancing Toner', 'Chai', 480000, 'TO', '- Giúp da thông thoáng và loại bỏ tế bào chết với chứa nước khoáng Jeju và LHA\r\n- Chiết xuất cây diếp cá làm dịu da, kiểm soát bã nhờn và thu nhỏ lỗ chân lông\r\n- Phù hợp với loại da, đặc biệt là da lão hóa', 'sp403.jpg', '2021-12-04', 0),
('SP500', 'ISNTREE\r\nGreen Tea Fresh Serum\r\n', 'Chai', 540000, 'SR', '- Tinh chất trà xanh nuôi dưỡng làm dịu\r\n- Cải thiện kết cấu cho da thêm mịn màng\r\n- Phù hợp với da hỗn hợp đến da dầu', 'sp500.jpg', '2021-12-04', 0),
('SP501', 'ACWELL\r\nLicorice pH Balancing Advance Serum\r\n', 'Chai', 600000, 'SR', '- Tinh chất chiết xuất cam thảo cải thiện làn da xỉn màu\r\n- Thành phần không chứa chất bảo quản, silicon, cồn, hương liệu nhân tạo\r\n- Phù hợp với mọi loại da', 'sp501.jpg', '2021-12-04', 0),
('SP502', 'PURITO\r\nDermHA-3 Serum\r\n', 'Chai', 490000, 'SR', '- Tinh chất cấp nước chứa 3 loại Hyaluronic Acid\r\n- Kết cấu giàu dưỡng chất, thẩm thấu tốt cho da căng mọng\r\n- Phù hợp với da hỗn hợp đến da dầu, da thiếu nước', 'sp502.jpg', '2021-12-04', 0),
('SP503', 'ROVECTIN\r\nSkin Essentials Aqua Activating Serum', 'Chai', 750000, 'SR', '- Tinh chất cấp ẩm và chống lão hóa\r\n- Hyaluronic Acid cùng Vitamin E nuôi dưỡng sâu cho da\r\n- Phù hợp với mọi loại da', 'sp503.png', '2021-12-04', 0),
('SP504', 'ROVECTIN\r\nSkin Essentials Barrier Repair Face Oil\r\n', 'Chai', 750000, 'SR', '- Dầu dưỡng cấp ẩm và chống lão hóa da\r\n- Chiết xuất thực vật lành tính đẩy nhanh quá trình phục hồi\r\n- Phù hợp với mọi loại da, đặc biệt là da khô', 'sp504.jpg', '2021-12-04', 0),
('SP600', 'PURITO\r\nOat-in Calming Gel Cream\r\n', 'Chai', 390000, 'KD', '- Kem dưỡng làm dịu và phục hồi chứa yến mạch, Panthenol và Squalane\r\n- Dạng gel cream mỏng nhẹ, thẩm thấu nhanh, không gây nhờn dính\r\n- An toàn với làn da nhạy cảm nhất với thành phần 100% từ thực vật', 'sp600.jpg', '2021-12-04', 0),
('SP601', 'ROVECTIN\r\nSkin Essentials Barrier Repair Face & Body Cream\r\n', 'Chai', 520000, 'KD', '- Kem dưỡng cấp ẩm phục hồi cho mặt và body\r\n- Chứa 5.5% Panthenol, Ceramide và công nghệ độc quyền Barrier Repair Complex\r\n- Thành phần an toàn, 100% không chứa paraben, chất tạo màu, dầu khoáng và hương liệu nhân tạo', 'sp601.png', '2021-12-04', 0),
('SP602', 'Real Barrier\r\nAqua Soothing Cream\r\n', 'Hủ', 600000, 'KD', '- Kem dưỡng dạng gel cream cấp nước làm mát da nhanh chóng\r\n- Công nghệ độc quyền MLE® Skin Barrier Formula tạo lớp màng bảo vệ da khỏe mạnh\r\n- Thành phần an toàn, không gây kích ứng cho làn da nhạy cảm nhất', 'sp602.jpg', '2021-12-04', 0),
('SP603', 'ACWELL\r\nPhyto Active Balancing Cream\r\n', 'Hủ', 700000, 'KD', '- Kem dưỡng phục hồi với 17 amino acids và phức hợp B5 từ chiết xuất thực vật\r\n- Công thức dưỡng ẩm lành tính, an toàn cho da nhạy cảm với kết cấu thẩm thấu nhanh, không gây nhờn dính\r\n- Phù hợp với da khô lão hóa, da đã xuất hiện nếp nhăn', 'sp603.jpg', '2021-12-04', 0),
('SP604', 'ACWELL\r\nReal Aqua Balancing Cream\r\n', 'Hủ', 650000, 'KD', '- Kem dưỡng cấp ẩm làm dịu và giúp cân bằng lượng dầu\r\n- Chiết xuất diếp cá làm dịu da cùng với chiết xuất rễ cam thảo kháng viêm và làm sáng da\r\n- Chiết xuất từ ​​mầm cải Brussels tăng độ đàn hồi\r\n- Phù hợp với da dầu thiếu nước, da hỗn hợp', 'sp604.jpg', '2021-12-04', 0),
('SP700', 'ISNTREE\r\nHyaluronic Acid Natural Sun Cream\r\n', 'Chai', 480000, 'KCN', '- Kem chống nắng vật lý chứa Hyaluronic Acid cấp ẩm\r\n- Không chứa cồn hay hương liệu, an toàn cho làn da nhạy cảm nhất, được kiểm nghiệm không gây kích ứng cho da\r\n- Phù hợp với mọi làn da, đặc biệt da hỗn hợp/da dầu', 'sp700.jpg', '2021-12-04', 0),
('SP701', 'PURITO\r\nDaily Go-To Sunscreen\r\n', 'Chai', 490000, 'KCN', '- Kem chống nắng dạng lai với 4 màng lọc mạnh mẽ\r\n- Chất kem mỏng nhẹ, thấm nhanh, không gây bóng nhờn\r\n- Công thức không chứa hương liệu, không essential oil cũng như không có bất kì thành phần có hại nào, an toàn cho làn da nhạy cảm nhất', 'sp701.jpg', '2021-12-04', 0),
('SP702', 'BEPLAIN\r\nClean Ocean Moisture Sunscreen SPF50+ PA++++', 'Chai', 460000, 'KCN', '- Kem chống nắng hóa học cấp ẩm dịu nhẹ với thành phần lành tính\r\n- Tính năng cấp ẩm sâu, tạo vẻ căng bóng nhẹ nhàng, tự nhiên cho da\r\n- Kết cấu mỏng nhẹ như serum, thẩm thấu nhanh và cung cấp ẩm tức thời', 'sp702.jpg', '2021-12-04', 0),
('SP703', 'BEPLAIN\r\nClean Ocean Nonnano Mild Sunscreen SPF50+ PA++++\r\n', 'Chai', 490000, 'KCN', '- Kem chống nắng vật lý dịu nhẹ công nghệ phi Nano\r\n- Kem chống nắng 100% vật lý, phản chiếu lại tia UV và hoàn toàn lành tính\r\n- Kết cấu mỏng nhẹ và nâng tone nhẹ nhàng', 'sp703.jpg', '2021-12-04', 0),
('SP704', 'ROUNDLAB\r\n1025 Dokdo Sun Screen SPF 50+ PA++++\r\n', 'Chai', 600000, 'KCN', '- Kem chống nắng vật lý dạng sữa\r\n- Công nghệ phi nano phản chiếu lại tia UV hiệu quả\r\n- Thành phần an toàn, lành tính, không chứa oxybenzone và octinoxate\r\n- 3 thành phần Hyaluronic Acid cung cấp độ ẩm cho da', 'sp704.jpg', '2021-12-04', 0),
('SP705', 'MAKE P:REM\r\nUV defense me. Moisture sun cream\r\n', 'Chai', 570000, 'KCN', '- Kem chống nắng lai, giúp da thêm căng bóng\r\n- Dễ tán, không gây nhờn dính, khó chịu\r\n- Phù hợp với mọi loại da', 'sp705.jpg', '2021-12-04', 0),
('SP800', 'Kem Nền Perfect Couple Dual Foundation #01 Light ', 'Chai', 459000, 'KN', '- 2in1, tích hợp 2 bước kem lót và kem nền trong một sản phẩm nhỏ gọn, đơn giản\r\n- Lớp nền mỏng nhẹ căng bóng tự nhiên\r\n- Che phủ hoàn hảo, bền đẹp cả ngày\r\n- Phù hợp với da thường, da khô và da hỗn hợp thiên khô, da hỗn hợp dầu', 'sp800.jpg', '2021-12-04', 0),
('SP801', 'Kem Nền Perfect Couple Dual Foundation #02 Medium Light', 'Chai', 459000, 'KN', '- 2in1, tích hợp 2 bước kem lót và kem nền trong một sản phẩm nhỏ gọn, đơn giản\r\n- Lớp nền mỏng nhẹ căng bóng tự nhiên\r\n- Che phủ hoàn hảo, bền đẹp cả ngày\r\n- Phù hợp với da thường, da khô và da hỗn hợp thiên khô, da hỗn hợp dầu', 'sp801.jpg', '2021-12-04', 0),
('SP802', 'Kem Nền Perfect Couple Dual Foundation #03 Medium', 'Chai', 490000, 'KN', '- 2in1, tích hợp 2 bước kem lót và kem nền trong một sản phẩm nhỏ gọn, đơn giản\r\n- Lớp nền mỏng nhẹ căng bóng tự nhiên\r\n- Che phủ hoàn hảo, bền đẹp cả ngày\r\n- Phù hợp với da thường, da khô và da hỗn hợp thiên khô, da hỗn hợp dầu', 'sp802.jpg', '2021-12-04', 0),
('SP803', 'Kem Nền 3CE Matte Fit Foundation  #01 Light ', 'Chai', 670000, 'KN', '- Độ che phủ cực tốt nhưng mà vẫn vô cùng mỏng mịn tự nhiên\r\n- Khả năng hạn chế bị loang lỗ, xỉn màu khi da điều tiết màu, giữ độ bền của lớp nền cực ổn định\r\n- Phù hợp với những làn da nhờn, da dầu muốn có lớp nền lì mịn không bong', 'sp803.jpg', '2021-12-04', 0),
('SP804', 'Kem Nền The Face Shop Ink Lasting Foundation #V201 For Light Skin', 'Chai', 499000, 'KN', '- Công thức mỏng nhẹ che phủ những nhược điểm mang đến một làn da mịn đẹp không tỳ vết\r\n- Tích hợp các thành phần giàu dưỡng ẩm, da sẽ luôn trong tình trạng mềm mướt\r\n- Chất kem mịn và lì bền màu, không trôi khi gặp nước, thách thức mồ hôi, dầu nhờn', 'sp804.png', '2021-12-04', 0),
('SP805', 'Kem Nền The Face Shop Ink Lasting Foundation #V201 For Normal Skin', 'Chai', 590000, 'KN', '- Công thức mỏng nhẹ che phủ những nhược điểm mang đến một làn da mịn đẹp không tỳ vết\r\n- Tích hợp các thành phần giàu dưỡng ẩm, da sẽ luôn trong tình trạng mềm mướt\r\n- Chất kem mịn và lì bền màu, không trôi khi gặp nước, thách thức mồ hôi, dầu nhờn', 'sp805.png', '2021-12-04', 0),
('SP900', 'Phấn Nước Siêu Kiềm Dầu - Super Matte Cushion  #01 Light', 'Hộp', 350000, 'CU', '- Dành cho làn da dầu, da siêu dầu và da dầu mụn nhờ có lớp màng cực kỳ bền vững, kiểm soát dầu thừa hữu hiệu\r\n- Loại da: Da dầu mụn, da dầu hoặc da siêu dầu, da hỗn hợp dầu\r\n- Bổ sung đến 2% Niacinamide giúp làm dịu da và hạn chế phát sinh mụn', 'sp900.jpg', '2021-12-04', 0),
('SP901', 'Phấn Nước Siêu Kiềm Dầu - Super Matte Cushion  #02 Medium Light', 'Hộp', 349000, 'CU', '- Dành cho làn da dầu, da siêu dầu và da dầu mụn nhờ có lớp màng cực kỳ bền vững, kiểm soát dầu thừa hữu hiệu\r\n- Loại da: Da dầu mụn, da dầu hoặc da siêu dầu, da hỗn hợp dầu\r\n- Bổ sung đến 2% Niacinamide giúp làm dịu da và hạn chế phát sinh mụn', 'sp901.jpg', '2021-12-04', 0),
('SP902', 'Phấn Nước Siêu Kiềm Dầu - Super Matte Cushion  #03 Medium', 'Hộp', 349000, 'CU', '- Dành cho làn da dầu, da siêu dầu và da dầu mụn nhờ có lớp màng cực kỳ bền vững, kiểm soát dầu thừa hữu hiệu\r\n- Loại da: Da dầu mụn, da dầu hoặc da siêu dầu, da hỗn hợp dầu\r\n- Bổ sung đến 2% Niacinamide giúp làm dịu da và hạn chế phát sinh mụn', 'sp902.jpg', '2021-12-04', 0),
('SP903', 'Phấn Nước Che Khuyết Điểm Vượt TrộiThe Face Shop CC Intense Cover Cushion  EX #V201 For Light Skin', 'Hộp', 699000, 'CU', '- Che phủ hoàn hảo với lớp nền mỏng, mịn nhẹ nhàng\r\n- Khả năng dưỡng ẩm liên tục nhờ thành phần “hyaluronic acid” giúp mang lại lớp trang điểm tươi tắn\r\n- Chiết xuất 7 loại tinh dầu chăm sóc làn da khỏe đẹp', 'sp903.png', '2021-12-04', 0),
('SP904', 'Phấn Nước Che Khuyết Điểm Vượt TrộiThe Face Shop CC Intense Cover Cushion  EX #V203 For Normal Skin', 'Hộp', 699000, 'CU', '- Che phủ hoàn hảo với lớp nền mỏng, mịn nhẹ nhàng\r\n- Khả năng dưỡng ẩm liên tục nhờ thành phần “hyaluronic acid” giúp mang lại lớp trang điểm tươi tắn\r\n- Chiết xuất 7 loại tinh dầu chăm sóc làn da khỏe đẹp', 'sp904.png', '2021-12-04', 0),
('SP905', 'Phấn Nước Trang Điểm Chống Xỉn Màu Da The Face Shop Anti Darkening Cushion EX #V203 For Normal Skim', 'Hộp', 699000, 'CU', '- Chống xỉn màu mạnh mẽ cho làn da tối màu và che phủ nếp nhăn, đốm nâu hiệu quả\r\n- Hạt phấn sử dụng công nghệ HD giúp nâng tone màu da\r\n- Chiết xuất lá bạc hà và hoa cúc vàng giúp dưỡng ẩm làm dịu da', 'sp905.png', '2021-12-04', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TENDN` char(7) NOT NULL,
  `password` varchar(100) NOT NULL,
  `QUYEN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`TENDN`, `password`, `QUYEN`) VALUES
('admin', '$2y$10$7saMj06DPNUS3uJeVSwHjeR8V/11RvZXlk42wZwMtoIRJubogu.zW', 'admin'),
('nhan', '$2y$10$fOhnvbx1hRTgj0DMYFIvH.Ii90vzDKW1uC2EiLs9YoCQmqj7rnEQ2', 'ql'),
('nv03', 'beomista03', 'nhân viên'),
('nv04', 'beomista04', 'nhân viên'),
('nv05', 'beomista05', 'nhân viên'),
('nv06', 'beomista06', 'nhân viên'),
('nv07', 'beomista07', 'nhân viên'),
('nv08', 'beomista08', 'nhân viên'),
('nv09', 'beomista09', 'nhân viên'),
('nv10', 'beomista10', 'nhân viên'),
('nv11', 'beomista11', 'nhân viên'),
('qlch', 'beomista', 'Admin / Quản trị viên');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MACT`),
  ADD KEY `MASP` (`MASP`),
  ADD KEY `cthd_ibfk_1` (`MAHD`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `kh_hd_fk1` (`MAKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`MASP`,`MANCC`),
  ADD KEY `MANCC` (`MANCC`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MALOAI`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MANCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TENDN`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `MACT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MAHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MAKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cthd_ibfk_1` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `kh_hd_fk1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `kho`
--
ALTER TABLE `kho`
  ADD CONSTRAINT `kho_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kho_ibfk_2` FOREIGN KEY (`MANCC`) REFERENCES `nhacungcap` (`MANCC`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
