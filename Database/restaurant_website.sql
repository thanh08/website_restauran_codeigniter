-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2021 lúc 04:17 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `restaurant_website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog_product`
--

CREATE TABLE `catalog_product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sort_order` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `catalog_product`
--

INSERT INTO `catalog_product` (`id`, `name`, `parent_id`, `sort_order`) VALUES
(10, 'Thực đơn buổi chiều', 0, 0),
(11, 'Thực đơn buổi sáng', 0, 0),
(12, 'Thực đơn buổi tối', 0, 0),
(13, 'Thực đơn chưa xác định', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_book`
--

CREATE TABLE `customer_book` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `ngaydat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `giodat` timestamp NOT NULL DEFAULT current_timestamp(),
  `songuoi` int(11) NOT NULL,
  `tinhtrang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer_book`
--

INSERT INTO `customer_book` (`id`, `ten`, `email`, `sdt`, `ngaydat`, `giodat`, `songuoi`, `tinhtrang`) VALUES
(0, 'cong', 'cong@gmail.com', '232525', '2021-11-17 11:36:16', '2021-06-05 08:40:00', 34, 1),
(3, 'thanh', 'thanh23@gmail.com', '243242', '2021-11-17 08:52:51', '2021-06-12 08:39:00', 3, 1),
(5, 'quy', 'tye@gmail.com', '23424', '2021-11-17 11:38:17', '2021-06-05 03:25:00', 4, 1),
(6, 'tiến', 'than@gmail.com', '234234', '2021-11-17 11:40:17', '2021-11-19 09:48:00', 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucnews`
--

CREATE TABLE `danhmucnews` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmucnews`
--

INSERT INTO `danhmucnews` (`id`, `tendanhmuc`) VALUES
(47, 'Ẩm thực'),
(54, 'Chưa xác định'),
(58, 'Khuyến mại'),
(59, 'Mẹo nấu ăn'),
(60, 'Nhận định thực khách');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `tieude` varchar(255) NOT NULL,
  `iddanhmuc` int(11) NOT NULL,
  `noidungtin` text NOT NULL,
  `ngaytao` double NOT NULL,
  `mota` text NOT NULL,
  `hinhanh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `tieude`, `iddanhmuc`, `noidungtin`, `ngaytao`, `mota`, `hinhanh`) VALUES
(9, 'Bánh Flan Bí Đỏ Mịn Thơm cách làm không khó ?', 47, '<h3>&nbsp;</h3>\r\n\r\n<p><img alt=\"cach lam banh faln bi do2\" src=\"https://www.nhahangquangon.com/wp-content/uploads/2021/09/cach-lam-banh-faln-bi-do2.jpg\" style=\"height:774px; width:1200px\" /></p>\r\n\r\n<p>B&aacute;nh flan b&iacute; đỏ khiến bao nhi&ecirc;u người ng&acirc;y ngất với hương vị tuyệt vời từ b&iacute; đỏ v&agrave; b&aacute;nh Flan b&eacute;o ngậy. Đặc biệt c&aacute;ch l&agrave;m kh&ocirc;ng kh&oacute;, c&ugrave;ng Qu&aacute; Ngon v&agrave;o bếp thực hiện ngay m&oacute;n ngon bổ dưỡng thần th&aacute;nh n&agrave;y nh&eacute;.</p>\r\n\r\n<p><strong>Nguy&ecirc;n liệu chuẩn bị:</strong></p>\r\n\r\n<ul>\r\n	<li>B&iacute; đỏ 1 quả</li>\r\n	<li>Sữa tươi c&oacute; đường 1 bịch</li>\r\n	<li>Sữa đặc c&oacute; đường 2 muỗng canh</li>\r\n	<li>Trứng g&agrave; 2 quả</li>\r\n	<li>Vani một muỗng c&agrave; ph&ecirc;</li>\r\n</ul>\r\n\r\n<p><img alt=\"cach lam banh flan bi do\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/09/cach-lam-banh-flan-bi-do.jpg\" style=\"height:800px; width:1200px\" /></p>\r\n\r\n<p><strong>Thực hiện:</strong><br />\r\nB&iacute; đỏ rửa sạch kho&eacute;t bỏ phần ruột chừa một khoảng trống b&ecirc;n trong để đổ b&aacute;nh Flan v&agrave;o.<br />\r\nĐ&aacute;nh tan hai quả trứng g&agrave;, th&ecirc;m một muỗng vani khuấy đều tay</p>\r\n\r\n<p><img alt=\"cach lam banh faln bi do1\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/09/cach-lam-banh-faln-bi-do1.jpg\" style=\"height:801px; width:1200px\" /></p>\r\n\r\n<p>Đun n&oacute;ng hỗn hợp sữa tươi c&oacute; đường v&agrave; sữa đặc, đến khi s&ocirc;i lăn tăn th&igrave; tắt bếp. Cho từ từ hỗn hợp sữa đặc, sữa tươi, vani đ&atilde; đun n&oacute;ng v&agrave;o trứng v&agrave; đổ tất cả nhẹ nhẹ tay v&agrave;o quả b&iacute; đỏ đ&atilde; kho&eacute;t ruột trước đ&oacute;. D&ugrave;ng m&agrave;ng bọc thực phẩm bọc k&iacute;n lại rồi đem hấp tầm 50 ph&uacute;t với lửa nhỏ, vậy l&agrave; đ&atilde; ho&agrave;n tất rồi.</p>\r\n\r\n<p><img alt=\"cach lam banh flan bi do3\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/09/cach-lam-banh-flan-bi-do3.jpg\" style=\"height:774px; width:1200px\" /></p>\r\n\r\n<p><strong>Một số lưu &yacute; để c&oacute; m&oacute;n b&aacute;nh flan b&iacute; đỏ tuyệt ngon hảo hạng:</strong><br />\r\n&ndash; Kh&ocirc;ng n&ecirc;n r&oacute;t hỗn hợp qu&aacute; đầy v&agrave;o quả b&iacute; đỏ, n&ecirc;n chừa lại một khoảng trống B&ecirc;n tr&ecirc;n đến khi b&aacute;nh flan ch&iacute;n nở l&agrave; vừa<br />\r\n&ndash; Vani c&oacute; thể c&oacute; hoặc kh&ocirc;ng t&ugrave;y nguy&ecirc;n liệu sẵn c&oacute; của nh&agrave; m&igrave;nh<br />\r\n&ndash; Bạn n&ecirc;n chọn những quả b&iacute; đỏ bỏ tư ơi ngon cầm l&ecirc;n thấy chắc v&agrave; nặng tay, những quả thường c&oacute; cuống ăn d&agrave;i sẽ ngon hơn quả cuống ngắn</p>\r\n\r\n<p>B&aacute;nh flan b&iacute; đỏ ngon hơn khi ăn lạnh th&ecirc;m một ch&uacute;t c&agrave; ph&ecirc; v&agrave; đ&aacute; th&igrave; tuyệt vời lu&ocirc;n, một m&oacute;n ăn xế vừa ngon vừa bổ ổ rất th&iacute;ch hợp với những gia đ&igrave;nh c&oacute; trẻ nhỏ hoặc người lớn tuổi . Ch&uacute;c cả nh&agrave; m&igrave;nh th&agrave;nh c&ocirc;ng nh&eacute;.</p>\r\n', 1624929213, 'Bánh flan bí đỏ khiến bao nhiêu người ngây ngất với hương vị tuyệt vời từ bí đỏ và bánh Flan béo ngậy. Đặc biệt cách làm không khó, cùng Quá Ngon vào bếp thực hiện ngay món ngon bổ dưỡng thần thánh này nhé. Nguyên liệu chuẩn bị: Bí đỏ 1 quả Sữa tươi […]', 'http://localhost/006/uploads/cach-lam-banh-faln-bi-do2.jpg'),
(10, 'SHARE LIỀN TAY – TẶNG NGAY THÙNG BIA', 58, '<p><strong>Thưởng thức m&oacute;n LẨU VUA thượng hạng c&ugrave;ng bạn b&egrave;, lại được miễn ph&iacute; , c&oacute; th&ecirc;m Heineken nh&acirc;m nhi thật đ&atilde; th&igrave; c&ograve;n g&igrave; vui hơn?</strong></p>\r\n\r\n<p>Chương tr&igrave;nh ưu đ&atilde;i hấp dẫn chỉ c&oacute; tại Nh&agrave; h&agrave;ng Arctica! Chỉ cần chia sẻ b&agrave;i viết n&agrave;y tr&ecirc;n facbook v&agrave; đặt chế độ c&ocirc;ng khai, kh&aacute;ch h&agrave;ng được tặng ngay một th&ugrave;ng bia Heineken khi sử dụng m&oacute;n Đặc sản trứ danh #LẨUVUA thượng hạng của Nh&agrave; h&agrave;ng Arctica.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/khuyen-mai-lau-vua.jpg\" style=\"height:877px; width:1475px\" /></p>\r\n\r\n<p>Chương tr&igrave;nh khuyến m&atilde;i &aacute;p dụng cho cả kh&aacute;ch đặt m&oacute;n giao về hoặc thưởng thức ngay tại Nh&agrave; h&agrave;ng. &nbsp;Lưu &yacute;: mỗi kh&aacute;ch chỉ được 1 lần share v&agrave; 1 lần tặng qu&agrave;! Kh&ocirc;ng giới hạn số lượng qu&agrave; tặng cho đến khi hết chương tr&igrave;nh khuyến m&atilde;i. Thời gian &aacute;p dụng: hết th&aacute;ng 9/2020.</p>\r\n\r\n<p>Ăn LẨU VUA rất ph&ecirc;, uống Heineken say m&ecirc;, gọi liền Hotline: 0906 79 79 32 th&ocirc;i n&agrave;o!</p>\r\n\r\n<p>Ngo&agrave;i đặc sản &ldquo;LẨU VUA&rdquo; ra, Nh&agrave; h&agrave;ng Qu&aacute; Ngon c&ograve;n c&oacute; 16 m&oacute;n &ldquo;ĐẶC SẢN TRỨ DANH &ndash; GIAO NHANH TẬN CHỖ&rdquo;, qu&yacute; kh&aacute;ch h&atilde;y truy cập v&agrave;o link: dacsantrudanh.com để biết th&ecirc;m th&ocirc;ng tin chi tiết!</p>\r\n\r\n<p>&mdash;&mdash;-</p>\r\n\r\n<p>NH&Agrave; H&Agrave;NG ARCTICA&nbsp;&reg;</p>\r\n\r\n<p>Địa chỉ: 4/3A Nam Cao, Phường T&acirc;n Ph&uacute;, Quận 9, TP.HCM</p>\r\n\r\n<p>Hotline/Zalo:&nbsp;</p>\r\n\r\n<p>Website: https://www.artica.com</p>\r\n', 1625148609, 'Thưởng thức món LẨU VUA thượng hạng cùng bạn bè, lại được miễn phí , có thêm Heineken nhâm nhi thật đã thì còn gì vui hơn? Chương trình ưu đãi hấp dẫn chỉ có tại Nhà hàng Quá Ngon! Chỉ cần chia sẻ bài viết này trên facbook và đặt chế độ công khai, […]', 'http://localhost/006/uploads/khuyen-mai-lau-vua.jpg'),
(11, 'Bật mí bí quyết xào mướp xanh giòn mướt mát ít bị ra nước', 59, '<h3>&nbsp;</h3>\r\n\r\n<p><img alt=\"cach xao muopup\" src=\"https://www.nhahangquangon.com/wp-content/uploads/2021/08/cach-xao-muopup.jpg\" style=\"height:780px; width:1200px\" /></p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.nhahangquangon.com/2021/08/25/\" title=\"View all posts date 25.08.2021\">25.08.2021</a></li>\r\n	<li>&nbsp;</li>\r\n	<li><a href=\"https://www.nhahangquangon.com/meo-vat-nau-an/\" title=\"View all posts in Mẹo Vặt Nấu Ăn\">Mẹo Vặt Nấu Ăn</a></li>\r\n	<li>&nbsp;</li>\r\n	<li><a href=\"https://www.nhahangquangon.com/bat-mi-bi-quyet-xao-muop-xanh-gion-muot-mat-it-bi-ra-nuoc/\" title=\"View all Comments\">0 Comments</a></li>\r\n	<li>&nbsp;</li>\r\n	<li><a href=\"https://www.nhahangquangon.com/bat-mi-bi-quyet-xao-muop-xanh-gion-muot-mat-it-bi-ra-nuoc/#\" id=\"nectar-love-21625\" title=\"Love this\">0</a></li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p>&nbsp;Share</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Qủa mướp rất gi&agrave;u chất dinh dưỡng nhất l&agrave; c&aacute;c chất canxi, kẽm, sắt, chất xơ&hellip; cũng như c&aacute;c nguy&ecirc;n tố vi lượng kh&aacute;c gi&uacute;p cơ thể n&acirc;ng cao hệ miễn dịch. Mướp thường được c&aacute;c chị em x&agrave;o hoặc nấu canh c&ugrave;ng c&aacute;c nguy&ecirc;n liệu kh&aacute;c, vừa thơm ngon lại rất bổ dưỡng. Tuy nhi&ecirc;n với mướp x&agrave;o, kh&ocirc;ng &iacute;t chị em l&uacute;ng t&uacute;ng v&igrave; sao mướp lại bị th&acirc;m đen d&ugrave; đ&atilde; cố gắng thao t&aacute;c rất nhanh. Vậy, b&iacute; quyết để mướp giữ m&agrave;u xanh mướt l&agrave; g&igrave;? C&ugrave;ng Q&uacute;a Ngon tham khảo kỹ thuật x&agrave;o mướp hay dưới đ&acirc;y nh&eacute;.</p>\r\n\r\n<p><strong>Nguy&ecirc;n liệu chuẩn bị</strong></p>\r\n\r\n<ul>\r\n	<li>Mướp tr&aacute;i tươi ngon</li>\r\n	<li>H&agrave;nh kh&ocirc;</li>\r\n	<li>H&agrave;nh l&aacute;</li>\r\n	<li>Muối</li>\r\n	<li>Hạt n&ecirc;m, đường, ti&ecirc;u&hellip;</li>\r\n</ul>\r\n\r\n<p><img alt=\"cach xao muop\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/08/cach-xao-muop.jpg\" style=\"height:675px; width:1200px\" /></p>\r\n\r\n<p>Khi chọn mướp bạn chọn những quả c&oacute; cuống tươi, lớp vỏ b&ecirc;n ngo&agrave;i kh&ocirc;ng c&oacute; nhiều vết n&aacute;m đen cầm nặng tay v&agrave; đặc biệt l&agrave; c&ograve;n non, tươi. Những quả như thế n&agrave;y đặc ruột khi x&agrave;o l&ecirc;n ngọt v&agrave; thơm tự nhi&ecirc;n rất ngon</p>\r\n\r\n<p><img alt=\"muop (1)\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/08/muop-1.jpg\" style=\"height:707px; width:1200px\" /></p>\r\n\r\n<p><strong>C&oacute; 3 b&iacute; quyết bạn cần phải nhớ để giữ m&agrave;u xanh mướt, vị ngon nhất định của mướp khi x&agrave;o:</strong></p>\r\n\r\n<ol>\r\n	<li>Mướp sơ chế cần chế biến ngay, kh&ocirc;ng để qu&aacute; 30 ph&uacute;t</li>\r\n	<li>Trước khi x&agrave;o mướp cần chần qua nước s&ocirc;i cho th&ecirc;m một t&iacute; muối, dầu ăn để giữ m&agrave;u xanh của mướp v&agrave; hạn chế bị mất nước khi x&agrave;o</li>\r\n	<li>H&atilde;y cho muối khi mướp gần ch&iacute;n để tr&aacute;nh bị th&acirc;m đen, m&agrave;u sắc kh&ocirc;ng bắt mắt</li>\r\n</ol>\r\n\r\n<p><strong>Sơ chế nguy&ecirc;n liệu</strong><br />\r\nMướp rửa sạch gọt vỏ cắt x&eacute;o hoặc cắt kh&uacute;c vừa ăn t&ugrave;y th&iacute;ch, h&agrave;nh kh&ocirc; b&oacute;c vỏ cắt nhỏ, h&agrave;nh l&aacute; cắt kh&uacute;c</p>\r\n\r\n<p><img alt=\"cach xao muop1 (1)\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/08/cach-xao-muop1-1.jpg\" style=\"height:780px; width:1200px\" /></p>\r\n\r\n<p><strong>Chần mướp qua với dầu ăn v&agrave; muối</strong><br />\r\nTh&ocirc;ng thường sau khi sơ chế mướp ch&uacute;ng ta thường bắt chảo dầu l&ecirc;n bếp cho h&agrave;nh kh&ocirc; v&agrave; x&agrave;o mướp ngay. Tuy nhi&ecirc;n th&oacute;i quen n&agrave;y l&agrave; nguy&ecirc;n nh&acirc;n d&acirc;n đến mướp rất dễ bị th&acirc;m. Đầu bếp khuy&ecirc;n rằng bạn h&atilde;y chuẩn bị một nồi nước đun s&ocirc;i cho một t&iacute; dầu ăn v&agrave; muối, sau đ&oacute; cho mướp v&agrave;o. Việc chần qua nước s&ocirc;i c&ugrave;ng dầu ăn v&agrave; muối sẽ tạo lớp m&agrave;ng bao quanh miếng mướp gi&uacute;p l&uacute;c x&agrave;o đặc biệt xanh v&agrave; ngon c&ograve;n hạn chế tối đa việc ra nước của mướp.</p>\r\n\r\n<p>Bạn chần nhanh khoảng 15s &ndash; 20s sau đ&oacute; vớt ra để r&aacute;o nước bắt đầu x&agrave;o mướp.</p>\r\n\r\n<p><img alt=\"cach xao muopup\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/08/cach-xao-muopup.jpg\" style=\"height:780px; width:1200px\" /></p>\r\n\r\n<p>Bắt chảo l&ecirc;n bếp, dầu s&ocirc;i th&igrave; bạn cho h&agrave;nh kh&ocirc; v&agrave;o, đến l&uacute;c dậy m&ugrave;i thơm tiếp tục cho mướp v&agrave;o x&aacute;o đều nhẹ tay. Cho th&ecirc;m một t&iacute; hạt n&ecirc;m, đường&hellip; n&ecirc;m nếm vừa ăn l&agrave; được. Mướp l&agrave; nguy&ecirc;n liệu rất nhanh ch&iacute;n, bạn để &yacute; thấy phần ruột mướp chuyển sang trong th&igrave; chuẩn bị cho h&agrave;nh l&aacute; v&agrave;o v&agrave; tắt bếp nh&eacute;.</p>\r\n\r\n<p><img alt=\"cach xao muop2 (1)\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/08/cach-xao-muop2-1.jpg\" style=\"height:715px; width:1200px\" /></p>\r\n\r\n<p>Khi mướp gần ch&iacute;n bạn h&atilde;y cho muối v&agrave;o với một lượng &iacute;t th&ocirc;i v&igrave; ở bước chần nước s&ocirc;i đ&atilde; c&oacute; muối, cho nhiều sẽ dễ bị mặn. Việc cho muối ở bước gần cuối gi&uacute;p mướp giữ m&agrave;u xanh tươi v&agrave; x&agrave;o nhanh sẽ gi&uacute;p giữ được độ gi&ograve;n ngon, kh&ocirc;ng bị nhũn, mất nước</p>\r\n\r\n<p><img alt=\"cach xao muop5 (1)\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/08/cach-xao-muop5-1.jpg\" style=\"height:805px; width:1200px\" /></p>\r\n\r\n<p><em>Bạn c&oacute; thể x&agrave;o mướp c&ugrave;ng l&ograve;ng g&agrave;, nấm, t&ocirc;m tươi, t&ocirc;m kh&ocirc;&hellip; t&ugrave;y sở th&iacute;ch của gia đ&igrave;nh m&igrave;nh</em></p>\r\n\r\n<p>Hy vọng với b&iacute; quyết x&agrave;o mướp xanh gi&ograve;n kh&ocirc;ng bị th&acirc;m đen n&agrave;y sẽ gi&uacute;p bạn tự tin hơn trong việc bếp n&uacute;c của m&igrave;nh. Ch&uacute;c chị em m&igrave;nh th&agrave;nh c&ocirc;ng mỹ m&atilde;n nh&eacute;</p>\r\n', 1625148676, 'Qủa mướp rất giàu chất dinh dưỡng nhất là các chất canxi, kẽm, sắt, chất xơ… cũng như các nguyên tố vi lượng khác giúp cơ thể nâng cao hệ miễn dịch. Mướp thường được các chị em xào hoặc nấu canh cùng các nguyên liệu khác, vừa thơm ngon lại rất bổ dưỡng. Tuy […]', 'http://localhost/006/uploads/cach-xao-muopup.jpg'),
(15, 'Đặt Heo Sữa quay nguyên con ở đâu ngon?', 47, '<p>Nếu như Đặc Sản Heo Tộc Quay Lu Chặt Mẹt được nhiều thực kh&aacute;ch say m&ecirc; bởi phần thịt chắc nịch &iacute;t mỡ th&igrave; Heo sữa quay lu cũng nổi bật kh&ocirc;ng k&eacute;m với phần da gi&ograve;n tan m&agrave;u sắc v&agrave;ng ruộm v&ocirc; c&ugrave;ng bắt mắt. Heo sữa quay lu nguy&ecirc;n con ở Q&uacute;a Ngon l&agrave; lựa chọn ho&agrave;n hảo cho c&aacute;c dịp c&uacute;ng b&aacute;i quan trọng.<br />\r\n<strong>Khi n&agrave;o n&ecirc;n đặt Heo Sữa quay lu nguy&ecirc;n con?</strong><br />\r\nChọn thịt heo quay để c&uacute;ng b&aacute;i thần linh, trả lễ cũng như c&aacute;c sự kiện quan trọng kh&aacute;c trong gia đ&igrave;nh dường như l&agrave; phong tục tập qu&aacute;n bao đời nay, cụ thể n&ecirc;n chọn Heo sữa quay v&agrave;o những dịp sau:<br />\r\n&ndash; Lễ hỏi, đ&aacute;m hỏi, lễ cưới.<br />\r\n&ndash; C&uacute;ng đầy th&aacute;ng.<br />\r\n&ndash; C&uacute;ng thần t&agrave;i.<br />\r\n&ndash; C&uacute;ng heo quay trả lễ.<br />\r\n&ndash; C&uacute;ng đ&aacute;m giỗ<br />\r\n&ndash; C&uacute;ng thổ địa, Lễ Động thổ.<br />\r\n&ndash; Lễ Khai trương th&ecirc;m may mắn.</p>\r\n\r\n<p>Heo sữa l&agrave; một con heo con đang trong giai đoạn b&uacute; sữa mẹ được sử dụng để chế biến th&agrave;nh những m&oacute;n ăn trong ẩm thực. Người ta nu&ocirc;i heo sữa kh&ocirc;ng chờ trưởng th&agrave;nh m&agrave; đến một giai đoạn nhất định l&agrave; sẽ bị giết mổ (trong độ tuổi từ hai đến s&aacute;u tuần tuổi). Thịt heo sữa c&oacute; vị nhạt, dịu, thơm, mềm v&agrave; da nấu ch&iacute;n l&agrave; một trong những m&oacute;n ăn kho&aacute;i khẩu trong c&aacute;c m&oacute;n thịt lợn.</p>\r\n\r\n<p><img alt=\"heo sua quay lu\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/09/heo-sua-quay-lu.jpg\" style=\"height:1363px; width:1200px\" /><br />\r\nC&aacute;ch nấu m&oacute;n ăn truyền thống về heo sữa thường l&agrave; heo sữa quay. Tại Q&uacute;a Ngon heo sữa được chế biến theo phương ph&aacute;p đặc biệt &ndash; quay lu để tạo n&ecirc;n một m&oacute;n ăn độc đ&aacute;o, thơm ngon độc nhất v&ocirc; nhị m&agrave; hiếm c&oacute; m&oacute;n ăn n&agrave;o c&oacute; được. Chọn c&aacute;ch nướng trong lu để khi kh&iacute; n&oacute;ng li&ecirc;n tục lu&acirc;n chuyển trong kh&ocirc;ng gian k&iacute;n sẽ gi&uacute;p phần thịt được ch&iacute;n đều, kh&ocirc;ng ch&aacute;y x&eacute;m v&agrave; quan trọng l&agrave; giữ được vị ngọt tự nhi&ecirc;n của thịt, phần da phải thật gi&ograve;n.</p>\r\n\r\n<p><img alt=\"heo sua quay lu1\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/09/heo-sua-quay-lu1.jpg\" style=\"height:720px; width:1200px\" /></p>\r\n\r\n<p>M&oacute;n heo sữa quay lu tại Q&uacute;a Ngon c&ograve;n k&iacute;ch th&iacute;ch thị gi&aacute;c th&egrave;m ăn của thực kh&aacute;ch bởi c&aacute;ch b&agrave;y tr&iacute; tinh tế, trịnh trọng v&agrave; sung t&uacute;c. Một con Heo v&agrave;ng gi&ograve;n bắt mắt, l&ograve;ng dồi hấp ri&ecirc;ng điểm th&ecirc;m ch&uacute;t m&agrave;u sắc của rau sống, dưa leo kh&ocirc;ng những l&agrave;m m&atilde;n nh&atilde;n bất k&igrave; ai một lần lướt qua m&agrave; c&ograve;n b&agrave;y tỏ tấm l&ograve;ng th&agrave;nh k&iacute;nh khi d&acirc;ng c&uacute;ng.<br />\r\nNh&agrave; h&agrave;ng Q&uacute;a Ngon c&oacute; nhận đặt Heo c&uacute;ng giao tận nơi theo y&ecirc;u cầu, qu&yacute; kh&aacute;ch c&oacute; nhu cầu h&atilde;y gọi 0906 79 79 32 để được tiếp nhận đặt h&agrave;ng nhanh nh&eacute;.</p>\r\n', 1637467476, 'Nếu như Đặc Sản Heo Tộc Quay Lu Chặt Mẹt được nhiều thực khách say mê bởi phần thịt chắc nịch ít mỡ thì Heo sữa quay lu cũng nổi bật không kém với phần da giòn tan màu sắc vàng ruộm vô cùng bắt mắt. ', 'http://localhost/006/uploads/heo-sua-quay-lu1.jpg'),
(16, 'Thịt ba chỉ phải chọn đúng chỗ mới ngon, cách chọn thịt ba chỉ như ý không phải ai cũng biết', 59, '<h3><img alt=\"thit ba chi thumb\" src=\"https://www.nhahangquangon.com/wp-content/uploads/2021/08/thit-ba-chi-thumb.jpg\" style=\"height:676px; width:1200px\" /></h3>\r\n\r\n<p>Đừng để bản th&acirc;n kh&ocirc;ng tỉnh t&aacute;o với những c&acirc;u như &ldquo;Thịt n&agrave;o vừa nạc vừa mỡ th&igrave; chả l&agrave; ba chỉ&rsquo;&rsquo;. Thịt ba chỉ cũng c&oacute; loại 1, loại 2 &ndash; B&iacute; mật m&agrave; người b&aacute;n hiếm khi tiết lộ với bạn đấy.</p>\r\n\r\n<p>Thịt ba chỉ l&agrave; phần ngon nhất của con heo với những lớp thịt mỡ đan xen b&eacute;o thơm ngon miệng chế biến nhiều m&oacute;n hấp dẫn như kho t&agrave;u, rim, chi&ecirc;n, rim mặn&hellip;được kh&ocirc;ng biết c&aacute;c chị em nội trợ thường xuy&ecirc;n chọn nấu nhiều m&oacute;n ngon đưa cơm cho gia đ&igrave;nh.</p>\r\n\r\n<p><img alt=\"thit ba chi thumb\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/08/thit-ba-chi-thumb.jpg\" style=\"height:676px; width:1200px\" /></p>\r\n\r\n<p>Đều nằm ở phần bụng heo nhưng ba chỉ heo thường được chia l&agrave;m 2 loại. Ba chỉ tr&ecirc;n v&agrave; ba chỉ dưới. Ph&acirc;n biệt v&agrave; chọn đ&uacute;ng loại thịt sẽ khiến m&oacute;n ăn của bạn ngon hơn kh&ocirc;ng bị nhanh ngấy v&agrave; ảnh hưởng tới sức khỏe.</p>\r\n\r\n<p><strong>Đoạn thịt ba chỉ tr&ecirc;n</strong></p>\r\n\r\n<p>Ba chỉ tr&ecirc;n l&agrave; phần thịt nằm ở bụng heo s&aacute;t với xương sườn, khi l&oacute;c xương heo ra sẽ c&oacute; phần thịt n&agrave;y. Ba chỉ tr&ecirc;n thường sẽ c&oacute; 3 lớp, mỡ tương đối nhiều v&agrave; cứng, lớp thịt mỏng kh&aacute; cứng chứ kh&ocirc;ng mềm ngon. Sự li&ecirc;n kết giữa nạc v&agrave; mỡ của đoạn ba chỉ n&agrave;y cũng k&eacute;m chắc, kh&ocirc;ng ngon bằng đoạn thịt ba chỉ dưới.</p>\r\n\r\n<p><img alt=\"thit ba chi tren1\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/08/thit-ba-chi-tren1.jpg\" style=\"height:801px; width:1200px\" /></p>\r\n\r\n<p>Người s&agrave;nh ăn, chọn thịt chuy&ecirc;n nghiệp th&igrave; thường dung phần thịt n&agrave;y để l&agrave;m kh&acirc;u nhục, với lớp mỡ nhiều mềm mịn tan trong miệng. Ngo&agrave;i ra bạn n&ecirc;n băm nhỏ ra c&ugrave;ng với c&aacute;c loại thịt, nguy&ecirc;n liệu kh&aacute;c để l&agrave;m nh&acirc;n ho&agrave;nh th&aacute;nh, x&iacute;u mạnh, hay b&ograve; l&aacute; lốt&hellip; sẽ ngon hơn.</p>\r\n\r\n<p><strong>Đoạn ba chỉ dưới</strong></p>\r\n\r\n<p>Phần ba chỉ dưới nằm ở phần bụng sau của con heo với 5, thậm ch&iacute; 7 lớp thịt v&agrave; mỡ đan xen rất ngon. Ở phần thịt n&agrave;y những lớp thịt &ndash; mỡ ph&acirc;n bố rất đều, mềm mịn v&igrave; thế rất th&iacute;ch hợp chế biến c&aacute;c m&oacute;n như rim, kho, luộc, x&agrave;o.</p>\r\n\r\n<p><img alt=\"thit ba chi duoi1\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/08/thit-ba-chi-duoi1.jpg\" style=\"height:799px; width:1200px\" /></p>\r\n\r\n<p>Khi ăn tỷ lệ mỡ &ndash; thịt h&agrave;i h&ograve;a mềm ngon rất c&acirc;n bằng v&agrave; hấp dẫn. Đ&acirc;y mới l&agrave; đoạn ba chỉ thượng hạng cho những bữa ăn của gia đ&igrave;nh.</p>\r\n\r\n<p><img alt=\"meo chon thit ba chi duoi1 (1)\" src=\"http://www.nhahangquangon.com/wp-content/uploads/2021/08/meo-chon-thit-ba-chi-duoi1-1.jpg\" style=\"height:844px; width:1200px\" /></p>\r\n\r\n<p>Chỉ cần tinh &yacute; một ch&uacute;t l&agrave; đ&atilde; chọn được miếng ba chỉ ngon rồi đ&uacute;ng kh&ocirc;ng n&agrave;o? Đừng để người b&aacute;n h&agrave;ng ch&agrave;o mời rồi mua qua loa bạn nh&eacute;. Thịt kh&ocirc;ng ngon chế biến kh&ocirc;ng ph&ugrave; hợp sẽ rất dễ ng&aacute;n v&agrave; ảnh hưởng tới sức khỏe c&aacute;c th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh</p>\r\n', 1637468965, 'Đừng để bản thân không tỉnh táo với những câu như “Thịt nào vừa nạc vừa mỡ thì chả là ba chỉ’’. Thịt ba chỉ cũng có loại 1, loại 2 – Bí mật mà người bán hiếm khi tiết lộ với bạn đấy. Thịt ba chỉ là phần ngon nhất của con heo với […]', 'http://localhost/006/uploads/thit-ba-chi-thumb.jpg'),
(18, 'NHẬN ĐỊNH CỦA THỰC KHÁCH', 60, '<p>Nh&agrave; h&agrave;ng Arctica&nbsp;&ndash;&nbsp; Với phong c&aacute;ch phục vụ chu đ&aacute;o, nhiệt t&igrave;nh kết hợp những m&oacute;n&nbsp;<strong><a href=\"https://www.nhahangquangon.com/hai-san/\" title=\"hai san\">hải sản</a>,&nbsp;<a href=\"https://www.nhahangquangon.com/dac-san/\" title=\"dac san\">đặc sản</a>,&nbsp;<a href=\"https://www.nhahangquangon.com/dan-gian/\" title=\"dan gian\">d&acirc;n gian</a></strong>&nbsp;hiếm, độc, lạ từ những đầu bếp chuy&ecirc;n nghiệp của S&agrave;i G&ograve;n, Nh&agrave; h&agrave;ng Arctica&nbsp;đ&atilde; chiếm được cảm t&igrave;nh của thực kh&aacute;ch khi đặt ch&acirc;n đến đ&acirc;y. Ngo&agrave;i ra, điều đặc biệt m&agrave; c&aacute;c thực kh&aacute;ch lu&ocirc;n y&ecirc;u th&iacute;ch Nh&agrave; h&agrave;ng Arctica&nbsp;l&agrave; c&aacute;c m&oacute;n ăn chế biến kh&ocirc;ng d&ugrave;ng dầu t&aacute;i sinh, phẩm m&agrave;u, an to&agrave;n vệ sinh thực phẩm tuyệt đối c&ugrave;ng với kh&ocirc;ng gian tho&aacute;ng đẹp, ấm c&uacute;ng đ&atilde; mang đến sự thoải m&aacute;i v&agrave; ấn tượng kh&oacute; qu&ecirc;n với thực kh&aacute;ch.</p>\r\n\r\n<p>Sau đ&acirc;y l&agrave; một số Nhận định của thực kh&aacute;ch về <strong>Nh&agrave; h&agrave;ng Arctica.</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"/ckfinder/userfiles/files/nhan-dinh-cua-khach-hang-1.jpg\" style=\"height:506px; width:575px\" /><img alt=\"\" src=\"/ckfinder/userfiles/files/kim-anh.jpg\" style=\"height:527px; width:594px\" /></strong></p>\r\n', 1637470012, 'Nhà hàng Arctica –  Với phong cách phục vụ chu đáo, nhiệt tình kết hợp những món hải sản, đặc sản, dân gian hiếm, độc, lạ từ những đầu bếp chuyên nghiệp của Sài Gòn, Nhà hàng Arctica đã chiếm được cảm tình của thực khách khi đặt chân đến đây. Ngoài ra, điều đặc biệt mà các thực khách luôn yêu thích Nhà Hàng Arctica là các món ăn chế biến không dùng dầu tái sinh, phẩm màu, an toàn vệ sinh thực phẩm tuyệt đối cùng với không gian thoáng đẹp, ấm cúng đã mang đến sự thoải mái và ấn tượng khó quên với thực khách[...]', 'http://localhost/006/uploads/nhan-dinh-cua-khach-hang-1.jpg');

--
-- Bẫy `news`
--
DELIMITER $$
CREATE TRIGGER `auto insert ngaytao` BEFORE INSERT ON `news` FOR EACH ROW BEGIN
SET NEW.ngaytao = UNIX_TIMESTAMP();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `id` int(255) NOT NULL,
  `transaction_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `data` text NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `discount` decimal(15,0) NOT NULL,
  `image_link` varchar(100) NOT NULL,
  `image_list` text NOT NULL,
  `count_buy` int(11) NOT NULL,
  `description_short` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `view` int(11) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `catalog_id`, `name`, `price`, `discount`, `image_link`, `image_list`, `count_buy`, `description_short`, `description`, `view`, `created`) VALUES
(1, 0, 'ĐỆ NHẤT HEO TỘC QUAY LU CHẶT MẸT', '150000.00', '127', 'http://localhost/006/uploads/heo-toc-quay-lu-4.jpg', '', 0, '', '<h4>Heo Tộc Quay Lu Chặt Mẹt l&agrave; đặc sản trứ danh chỉ duy nhất c&oacute; tại Nh&agrave; h&agrave;ng Arctica. M&oacute;n ăn nổi tiếng hơn 10 năm nay, trước phải đến Nh&agrave; h&agrave;ng mới được thưởng thức, nay đ&atilde; c&oacute; dịch vụ giao m&o', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `tenthuoctinh` varchar(255) NOT NULL,
  `giatrithuoctinh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `restaurant`
--

INSERT INTO `restaurant` (`id`, `tenthuoctinh`, `giatrithuoctinh`) VALUES
(3, 'sline_page', '[{\"title\":\"The Fresh And Tasty Burgers 2\",\"description\":\"All meals are made from safe ingredients\",\"link\":\"https:\\/\\/burgerking.vn\\/\",\"textbuton\":\"Buy Now\",\"image\":\"http:\\/\\/localhost\\/006\\/uploads\\/sline01_62.png\"},{\"title\":\"The Meal from Janpan\",\"description\":\"All meals are made from safe ingredients\",\"link\":\"https:\\/\\/pizzahut.vn\\/\",\"textbuton\":\"Buy Now\",\"image\":\"http:\\/\\/localhost\\/006\\/uploads\\/restaurant_sline.jpg\"},{\"title\":\"Food US and UK\",\"description\":\"We suplid all meal from the food fresh and clean\",\"link\":\"https:\\/\\/vi.wikipedia.org\\/wiki\\/Th%E1%BB%B1c_ph%E1%BA%A9m_t%C6%B0%C6%A1i_s%E1%BB%91ng\",\"textbuton\":\"Mua ngay!\",\"image\":\"http:\\/\\/localhost\\/006\\/uploads\\/foodimage_sline.jpg\"}]'),
(4, 'dulieu_header', '{\"mangxahoi\":{\"linkfb\":\"\",\"linktwitter\":\"\",\"linksky\":\"\",\"linktum\":\"\"},\"hotline\":{\"text\":\"G\\u1ecdi ngay cho ch\\u00fang t\\u00f4i\",\"sdt\":\"0968686868\"},\"giomocua\":{\"text\":\"Gi\\u1edd m\\u1edf c\\u1eeda\",\"gio\":\"6h-23h\"},\"logo\":\"http:\\/\\/localhost\\/006\\/uploads\\/logo_292.png\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoankhachhang`
--

CREATE TABLE `taikhoankhachhang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `taikhoan` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `ngaytao` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoankhachhang`
--

INSERT INTO `taikhoankhachhang` (`id`, `ten`, `taikhoan`, `sdt`, `email`, `matkhau`, `ngaytao`) VALUES
(13, 'thanh', 'thanh', 231242343, 'thanh@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1637501920);

--
-- Bẫy `taikhoankhachhang`
--
DELIMITER $$
CREATE TRIGGER `auto ngaytao` BEFORE INSERT ON `taikhoankhachhang` FOR EACH ROW BEGIN
SET NEW.ngaytao = UNIX_TIMESTAMP();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(30) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `payment` int(255) NOT NULL,
  `payment_info` text NOT NULL,
  `message` varchar(255) NOT NULL,
  `security` varchar(40) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `catalog_product`
--
ALTER TABLE `catalog_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer_book`
--
ALTER TABLE `customer_book`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmucnews`
--
ALTER TABLE `danhmucnews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddanhmuc` (`iddanhmuc`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoankhachhang`
--
ALTER TABLE `taikhoankhachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `catalog_product`
--
ALTER TABLE `catalog_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer_book`
--
ALTER TABLE `customer_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `danhmucnews`
--
ALTER TABLE `danhmucnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `taikhoankhachhang`
--
ALTER TABLE `taikhoankhachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`iddanhmuc`) REFERENCES `danhmucnews` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
