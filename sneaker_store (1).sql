-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2024 at 04:06 PM
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
-- Database: `sneaker_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`) VALUES
(1, 28, 1, 'Sản phẩm này chất lượng', '2024-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(1, 1, 8, '1590000.00', 4, '6360000.00'),
(2, 1, 15, '1231.00', 7, '8617.00'),
(3, 1, 8, '1590000.00', 3, '4770000.00'),
(4, 1, 27, '888888.00', 3, '2666664.00'),
(5, 3, 8, '1590000.00', 2, '3180000.00'),
(6, 4, 8, '1590000.00', 1, '1590000.00'),
(7, 5, 27, '888888.00', 6, '5333328.00'),
(8, 5, 8, '1590000.00', 5, '7950000.00'),
(9, 6, 8, '1590000.00', 1, '1590000.00'),
(10, 8, 8, '1590000.00', 1, '1590000.00'),
(11, 10, 27, '888888.00', 1, '888888.00'),
(12, 11, 8, '1590000.00', 1, '1590000.00'),
(13, 12, 27, '888888.00', 1, '888888.00'),
(14, 12, 8, '1590000.00', 1, '1590000.00'),
(15, 13, 8, '1590000.00', 2, '3180000.00');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL,
  `size_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `chuc_vu_id` int NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chuc_vus`
--

INSERT INTO `chuc_vus` (`chuc_vu_id`, `ten_chuc_vu`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`) VALUES
(3, 'Giày Nam'),
(4, 'Giày Nữ');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) NOT NULL,
  `sdt_nguoi_nhan` varchar(15) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text NOT NULL,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`) VALUES
(10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `link_hinh_anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `link_hinh_anh`) VALUES
(33, 29, './uploads/1733055077na1-2_52_11zon.png'),
(34, 29, './uploads/1733055077na1-3_51_11zon.png'),
(35, 29, './uploads/1733055077na1-4_50_11zon.png'),
(36, 29, './uploads/1733055077na1-5_49_11zon.png'),
(37, 29, './uploads/1733055077na1-6_48_11zon.png'),
(38, 30, './uploads/1733055255na2-2_46_11zon.png'),
(39, 30, './uploads/1733055255na2-3_45_11zon.png'),
(40, 30, './uploads/1733055255na2-4_44_11zon.png'),
(41, 30, './uploads/1733055255na2-5_43_11zon.png'),
(42, 30, './uploads/1733055255na2-6_42_11zon.png'),
(52, 33, './uploads/1733060913na3-1_41_11zon.png'),
(53, 33, './uploads/1733060913na3-2_40_11zon.png'),
(54, 33, './uploads/1733060913na3-3_39_11zon.png'),
(55, 33, './uploads/1733060913na3-4_38_11zon.png'),
(56, 33, './uploads/1733060913na3-5_37_11zon.png'),
(57, 34, './uploads/1733055571na4-2_34_11zon.png'),
(58, 34, './uploads/1733055571na4-3_33_11zon.png'),
(59, 34, './uploads/1733055571na4-4_32_11zon.png'),
(60, 34, './uploads/1733060979na4-1_35_11zon.png'),
(61, 34, './uploads/1733055572na4-6_30_11zon.png'),
(62, 35, './uploads/1733061037n3-1_18_11zon.png'),
(63, 35, './uploads/1733061037n3-2_17_11zon.png'),
(64, 35, './uploads/1733061037n3-3_16_11zon.png'),
(65, 35, './uploads/1733061037n3-4_15_11zon.png'),
(66, 35, './uploads/1733061037n3-5_14_11zon.png'),
(67, 36, './uploads/1733055726n4-2_11_11zon.png'),
(68, 36, './uploads/1733055726n4-3_10_11zon.png'),
(69, 36, './uploads/1733055726n4-4_9_11zon.png'),
(70, 36, './uploads/1733055726n4-5_8_11zon.png'),
(71, 36, './uploads/1733055726n4-6_7_11zon.png'),
(72, 37, './uploads/1733055779n5-2_5_11zon.png'),
(73, 37, './uploads/1733055779n5-3_4_11zon.png'),
(74, 37, './uploads/1733055779n5-4_3_11zon.png'),
(75, 37, './uploads/1733055779n5-5_2_11zon.png'),
(76, 37, './uploads/1733055779n5-6_1_11zon.png'),
(77, 38, './uploads/1733055887na5-6.png'),
(78, 38, './uploads/1733055887na5-5.png'),
(79, 38, './uploads/1733055887na5-4.png'),
(80, 38, './uploads/1733055887na5-3.png'),
(81, 38, './uploads/1733055887na5-2.png'),
(82, 39, './uploads/1733057374IF8189-6.webp'),
(83, 39, './uploads/1733057374IF8189-5.webp'),
(84, 39, './uploads/1733057374IF8189-2.webp'),
(85, 39, './uploads/1733057374IF8189-8.webp'),
(86, 39, './uploads/1733057374IF8189-7.webp'),
(87, 29, './uploads/1733057440na1-1_53_11zon.png'),
(88, 40, './uploads/1733059711na7-6.webp'),
(89, 40, './uploads/1733059711na7-5.webp'),
(90, 40, './uploads/1733059711na7-4.webp'),
(91, 40, './uploads/1733059711na7-3.webp'),
(92, 40, './uploads/1733059711na7-2.webp'),
(93, 41, './uploads/17330599111RM02703F-161-5.webp'),
(94, 41, './uploads/17330599111RM02703F-161-4.webp'),
(95, 41, './uploads/17330599111RM02703F-161-6.webp'),
(96, 41, './uploads/17330599111RM02703F-161-7.webp'),
(97, 41, './uploads/17330599111RM02703F-161-8.webp'),
(98, 31, './uploads/1733060745n1-1_29_11zon.png'),
(99, 31, './uploads/1733060745n1-2_28_11zon.png'),
(100, 31, './uploads/1733060745n1-3_27_11zon.png'),
(101, 31, './uploads/1733060745n1-4_26_11zon.png'),
(102, 31, './uploads/1733060745n1-5_25_11zon.png'),
(103, 31, './uploads/1733060745n1-6_24_11zon.png'),
(104, 32, './uploads/1733060844n2-1_23_11zon.png'),
(105, 32, './uploads/1733060844n2-2_22_11zon.png'),
(106, 32, './uploads/1733060844n2-3_21_11zon.png'),
(107, 32, './uploads/1733060844n2-4_20_11zon.png'),
(108, 32, './uploads/1733060844n2-5_19_11zon.png'),
(109, 33, './uploads/1733060913na3-6_36_11zon.png'),
(110, 34, './uploads/1733060979na4-5_31_11zon.png'),
(111, 35, './uploads/1733061037n3-6_13_11zon.png'),
(112, 36, './uploads/1733061077n4-1_12_11zon.png'),
(113, 37, './uploads/1733061097n5-1_6_11zon.png'),
(114, 39, './uploads/1733061142IF8189-1.webp'),
(115, 40, './uploads/1733061181na7-1.webp'),
(116, 41, './uploads/17330611991RM02703F-161-1.webp');

-- --------------------------------------------------------

--
-- Table structure for table `lien_he`
--

CREATE TABLE `lien_he` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mo_ta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lien_he`
--

INSERT INTO `lien_he` (`id`, `name`, `email`, `mo_ta`) VALUES
(1, 'Diệp', 'diepptnph45159@fpt.edu.vn', 'một số câu hỏi thắc mắc dành cho page sau đây.sản phẩm của bạn có bền hay không'),
(3, 'Pham Thi Ngoc D', 'ndiepp111@gmail.com', 'ahihi'),
(6, 'Sản phẩm 1', 'd@gmail.com', 'ahihihahaha'),
(7, 'trang', 'tramng@gmail.com', 'tôi xin lỗi'),
(8, 'Sản phẩm 1', 'diep@gmail.com', 'ahehe'),
(9, 'Đỗ Mạnh Dũng', 'dungdmph49130@gmail.com', 'Hãy trả lời tôi ngay khi nhận được thông tin này ');

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'COD(thanh toán khi nhận )'),
(2, 'Thanh toán Online');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia_san_pham` decimal(15,2) NOT NULL,
  `gia_khuyen_mai` decimal(15,2) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `so_luong` int NOT NULL,
  `mo_ta` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ngay_nhap` date NOT NULL,
  `danh_muc_id` int NOT NULL,
  `trang_thai` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `mo_ta`, `ngay_nhap`, `danh_muc_id`, `trang_thai`) VALUES
(31, 'Giày Sneaker Nữ Adidas Osade', '3400000.00', '2725000.00', './uploads/1733055360n1-1_29_11zon.png', 25, 'Giày Sneaker Nữ Adidas Osade mang đến cho bạn sự thoải mái, thần thái và vẻ thanh thoát. Với thiết kế thân giày bằng da mềm mại, nó sẽ thích ứng hoàn hảo với từng chuyển động của bàn chân bạn. Đế ngoài bằng cao su giúp bạn di chuyển trên mọi bề mặt một cách chắc chắn. Ba sọc kinh điển của Adidas tạo nên điểm nhấn, giúp bạn thể hiện phong cách đa dạng và luôn cập nhật xu hướng thời trang.', '2024-12-01', 4, 1),
(32, 'Giày Sneaker Nữ Skechers D\'Lites', '3590000.00', '2381000.00', './uploads/1733055419n2-1_23_11zon.png', 31, 'D\'Lites đôi giày thời trang lý tưởng dành cho những cô nàng hiện đại, năng động. Kiểu dáng thời thượng với upper lưới và tổng hợp kết hợp lớp phủ da lộn tinh tế, D\'Lites mang đến vẻ ngoài cá tính, nổi bật giữa đám đông.', '2024-12-01', 4, 1),
(33, 'GIÀY SNEAKER NAM MONKYLIAN', '2750000.00', '1375000.00', './uploads/1733055508na3-1_41_11zon.png', 47, 'GIÀY SNEAKER NAM KYLIAN,Giày thể thao ,Mũi tròn, Đế cao su, Chất liệu:Chất liệu: Da Tổng Hợp-Công nghệWEARABILITY - PILLOW WALK -Chiều cao đế: 0.00 IN (0.00 CM)', '2024-12-01', 3, 1),
(34, 'GIÀY SNEAKER NAM MOTIONX', '3050000.00', '1525000.00', './uploads/1733055571na4-1_35_11zon.png', 39, 'GIÀY SNEAKER NAM MOTIONX,Giày thể thao ,Mũi tròn, Đế nhựa EVA tái chế, Chất liệu:Chất liệu: Polyester-Công nghệWEARABILITY - PILLOW WALK -Chiều cao đế: Updating', '2024-12-01', 3, 1),
(35, 'Giày Sneaker Nữ Nike Gamma Force', '2799000.00', '1500000.00', './uploads/1733055635n3-1_18_11zon.png', 24, 'Trải nghiệm phong cách xếp lớp đa chiều trong thiết kế đột phá của Giày Sneaker Nữ Nike Gamma Force. Lấy cảm hứng từ văn hóa bóng rổ truyền thống, đôi giày mang đến sự thoải mái và tính linh hoạt vượt trội trong từng chuyển động. Cùng Giày Sneaker Nữ Nike Gamma Force tạo nên dấu ấn của riêng mình, bật phong cách chinh phục mọi nẻo đường.', '2024-12-01', 4, 1),
(36, 'Giày Thời Trang Unisex Fila Tiny Rumble V2', '2495000.00', '1869000.00', './uploads/1733055726n4-1_12_11zon.png', 46, 'GIÀY THỜI TRANG UNISEX FILA TINY RUMBLE V2\r\nTạo nên lối diện độc đáo và cá tính với Giày Thời Trang Unisex Fila Tiny Rumble V2. Sản phẩm này không chỉ đảm bảo sự thoải mái mà còn thể hiện phong cách thời trang đỉnh cao. Hãy để đôi giày này biến bạn thành một tín đồ thời trang cá tính và tự tin', '2024-12-01', 4, 1),
(37, 'Giày Sneaker Nữ Adidas Court Silk', '1700000.00', '1222000.00', './uploads/1733055779n5-1_6_11zon.png', 64, 'Giày Sneaker Nữ Adidas Court Silk là sự kết hợp giữa thời trang sân Tennis và thời trang thường nhật. Sản phẩm mang phong cách nữ tính đa dụng. Được làm từ da, chúng nổi bật với các lỗ thông hơi trang trí dọc hai bên. Thiết kế thanh lịch nhưng vẫn đầy sáng tạo, dễ dàng kết hợp cùng quần jogger hay váy mùa hè. Giày Sneaker Nữ Adidas Court Silk đảm bảo bạn sẽ luôn thoải mái và thời thượng trên mỗi bước đi.', '2024-12-01', 4, 1),
(39, 'Giày Thể Thao Unisex Adidas Avryn', '3800000.00', '2830000.00', './uploads/1733057374IF8189-1.webp', 26, 'Đừng để những góc cạnh sắc sảo và đường nét gọn gàng đánh lừa bạn. Đôi giày sneaker adidas này có trang bị lớp đệm cực kỳ êm ái. Đệm BOOST và Bounce siêu mềm mại kết hợp mang đến cho bạn cảm giác thoải mái tuyệt vời mỗi ngày. Vậy nên hãy tự tin diện đôi giày sneaker thật cá tính mà vẫn đảm bảo sự mềm mại và nâng đỡ.', '2024-12-01', 3, 1),
(40, 'Giày Thời Trang Unisex New Balance 574', '2559000.00', '1535400.00', './uploads/1733059711na7-1.webp', 36, '\"The most New Balance shoe ever\" - Câu nói này nói lên tất cả, phải không? Nhưng thực tế, điều này chỉ là một phần của câu chuyện. New Balance 574 có lẽ là biểu tượng không ngờ của chúng tôi. 574 được thiết kế để trở thành một đôi giày đáng tin cậy, có khả năng làm nhiều điều khác nhau tốt hơn thay vì chỉ là một nền tảng cho công nghệ đột phá hoặc để trưng bày vật liệu cao cấp. Sự đa dụng khiêm tốn này chính là điều đã đưa 574 vào hàng ngũ của những tác phẩm vĩ đại nhất mọi thời đại.', '2024-12-01', 3, 1),
(41, 'Giày Thời Trang Unisex Fila Rayunite', '2495000.00', '1650000.00', './uploads/17330599111RM02703F-161-1.webp', 24, 'Nếu bạn đang tìm kiếm một đôi giày thời trang đẹp và thoải mái, thì Giày Thời Trang Unisex Fila Rayunite chắc chắn là lựa chọn mà bạn không thể bỏ qua. Hãy để bạn tỏa sáng và thể hiện phong cách riêng của mình với đôi giày này!', '2024-12-01', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `size_sp`
--

CREATE TABLE `size_sp` (
  `id` int NOT NULL,
  `size` int NOT NULL,
  `san_pham_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `size_sp`
--

INSERT INTO `size_sp` (`id`, `size`, `san_pham_id`) VALUES
(25, 39, 29),
(26, 40, 29),
(27, 41, 29),
(28, 38, 30),
(29, 39, 30),
(30, 40, 30),
(31, 41, 30),
(32, 42, 30),
(33, 36, 31),
(34, 37, 31),
(35, 39, 31),
(36, 38, 31),
(37, 36, 32),
(38, 37, 32),
(39, 40, 33),
(40, 41, 33),
(41, 42, 33),
(42, 39, 34),
(43, 40, 34),
(44, 41, 34),
(45, 36, 35),
(46, 37, 35),
(47, 40, 36),
(48, 41, 36),
(49, 36, 37),
(50, 37, 37),
(51, 38, 37),
(52, 39, 39),
(53, 40, 39),
(54, 41, 39),
(55, 38, 40),
(56, 39, 40),
(57, 40, 40),
(58, 41, 40),
(59, 39, 41),
(60, 40, 41),
(61, 41, 41),
(62, 42, 41);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `usename` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(10) NOT NULL,
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `chuc_vu_id` int NOT NULL DEFAULT '2',
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `usename`, `email`, `mat_khau`, `so_dien_thoai`, `dia_chi`, `chuc_vu_id`, `trang_thai`) VALUES
(1, 'Đỗ Mạnh Dũng', 'dungph49130', 'dungdmph49130@gmail.com', '123456789', '0987654321', 'hà nội', 2, 1),
(2, 'Đỗ Mạnh Dũng', 'ad123', 'dung204205@gmail.com', '123456', '0976854321', NULL, 2, 1),
(3, 'Đỗ Mạnh Dũng', 'dungdmph49130', 'dungcs44@gmail.com', '123456789', '0976854321', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Chưa xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Đang giao hàng'),
(4, 'Giao hàng thành công'),
(5, 'Hủy đơn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`chuc_vu_id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_sp`
--
ALTER TABLE `size_sp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LK_TK` (`chuc_vu_id`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `chuc_vu_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `lien_he`
--
ALTER TABLE `lien_he`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `size_sp`
--
ALTER TABLE `size_sp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD CONSTRAINT `LK_TK` FOREIGN KEY (`chuc_vu_id`) REFERENCES `chuc_vus` (`chuc_vu_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
