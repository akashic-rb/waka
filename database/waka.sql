-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql313.byethost4.com
-- Generation Time: Feb 27, 2021 at 06:14 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b4_26981561_waka`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'hạ uyển anh'),
(2, 'huỳnh hạ'),
(3, 'diệp phi dạ'),
(4, 'mạn tây'),
(5, 'minh hiểu khê'),
(6, 'ân tầm'),
(7, 'phạm anh tuấn'),
(8, 'tô ký'),
(9, 'nguyễn du'),
(10, 'adam kho'),
(11, 'doãn kiến lợi'),
(12, 'john swich'),
(13, 'lê thẩm dương'),
(14, 'trần thùy linh'),
(15, 'nhiều tác giả'),
(16, 'ngọc hậu'),
(17, 'dũng mập');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'ngôn tình'),
(2, 'kinh doanh'),
(3, 'kỹ năng'),
(4, 'tác phẩm kinh điển'),
(5, 'văn học'),
(6, 'nhân vật - sự kiện'),
(7, 'văn hóa - xa hội'),
(8, 'khoa học - công nghệ'),
(9, 'truyện tranh'),
(11, 'tạp chí & chuyên đề'),
(12, 'chăm sóc gia đình'),
(13, 'thiếu nhi'),
(14, 'kinh dị'),
(15, 'nhà xuất bản'),
(16, 'tác giả'),
(17, 'giả tưởng');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(1000) COLLATE utf8_bin NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `id_product`, `id_user`, `date`) VALUES
(3, 'sách hay', 1, 752370062, '2020-10-19 18:52:16'),
(4, 'sách hay', 1, 752370062, '2020-10-19 18:54:06'),
(5, 'hami', 1, 752370062, '2020-10-19 19:44:32'),
(6, 'sách hay', 1, 752370062, '2020-10-19 19:49:17'),
(7, 'sản phẩm này quá tốt', 1, 752370062, '2020-10-19 19:55:10'),
(15, 'hkjhk', 1, 5, '2020-10-20 08:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `phone` varchar(11) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(500) COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `total` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '1' COMMENT '1. còn, 2. xóa',
  `payment` tinyint(1) NOT NULL COMMENT '0. default; 1. COD; 2. E-payment; 3. Finish'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_user`, `name`, `phone`, `email`, `address`, `status`, `total`, `date`, `quantity`, `position`, `payment`) VALUES
(1, 5, 'bao', '02930123', 'kocomail@email.com', 'somewhere on the earth', 1, 200000, '2020-08-09 20:52:17', 1, 1, 0),
(15, 5, 'Chi Bảo', '0911706470', 'asdsa@sadas.com', 'somewhere on the Earth', 1, 430000, '2020-10-12 20:15:49', 4, 2, 1),
(16, 5, 'Chi Bảo', '0911706470', 'asdsa@sadas.com', 'somewhere on the Earth', 1, 840000, '2020-10-12 21:24:44', 5, 1, 1),
(17, 5, 'Chi Bảo', '0911706470', 'asdsa@sadas.com', 'somewhere on the Earth', 1, 430000, '2020-10-12 21:54:31', 3, 1, 1),
(18, 5, 'Chi Bảo', '0911706470', 'asdsa@sadas.com', 'somewhere on the Earth', 1, 80000, '2020-10-12 21:54:58', 1, 1, 1),
(19, 5, 'Chi Bảo', '0911706470', 'asdsa@sadas.com', 'somewhere on the Earth', 1, 200000, '2020-10-12 21:55:11', 1, 1, 1),
(20, 5, 'Chi Bảo', '0911706470', 'asdsa@sadas.com', 'somewhere on the Earth', 1, 260000, '2020-10-12 21:55:27', 1, 1, 2),
(21, 5, 'Chi Bảo', '0911706470', 'asdsa@sadas.com', 'somewhere on the Earth', 1, 150000, '2020-10-12 21:55:57', 1, 1, 1),
(22, 5, 'Chi Bảo', '0911706470', 'asdsa@sadas.com', 'somewhere on the Earth', 1, 410000, '2020-10-12 21:56:12', 3, 1, 1),
(23, 5, 'Chi Bảo', '0911706470', 'asdsa@sadas.com', 'somewhere on the Earth', 1, 260000, '2020-10-12 21:56:42', 2, 1, 1),
(24, 5, 'Chi Bảo', '0911706470', 'asdsa@sadas.com', 'somewhere on the Earth', 1, 230000, '2020-10-12 21:56:57', 2, 1, 1),
(25, 5, 'Chi Bảo', '0911706470', 'asdsa@sadas.com', 'somewhere on the Earth', 2, 150000, '2020-10-12 21:57:09', 1, 1, 2),
(26, 752370060, 'Nguyen Le Chi Bao Fpt Polytechnic', '0911706470', 'baonlcps09193@fpt.edu.vn', '69, đường Cung Vàng, phường 69', 1, 350000, '2020-10-13 08:10:53', 3, 1, 1),
(27, 752370061, 'Nguyen Le Chi Bao Fpt Polytechnic', '0911706470', 'baonlcps09193@fpt.edu.vn', '69, đường Cung Vàng, phường 69', 2, 230000, '2020-10-13 08:25:49', 3, 1, 1),
(28, 5, 'Chi Bảo', '0123456789', 'email@email.com', 'somewhere', 1, 190000, '2020-09-14 09:39:53', 5, 1, 1),
(29, 752370061, 'Nguyen Le Chi Bao Fpt Polytechnic', '0911706470', 'baonlcps09193@fpt.edu.vn', '50/17 Nguyen Dinh Chieu', 1, 150000, '2020-10-14 21:41:34', 11, 2, 2),
(30, 752370061, 'Nguyen Le Chi Bao Fpt Polytechnic', '0911706470', 'baonlcps09193@fpt.edu.vn', '69, đường Cung Vàng, phường 69', 1, 1350000, '2020-10-14 21:47:02', 9, 1, 2),
(31, 752370061, 'Nguyen Le Chi Bao Fpt Polytechnic', '0911706470', 'baonlcps09193@fpt.edu.vn', '50/17 Nguyen Dinh Chieu', 1, 900000, '2020-10-14 22:00:41', 10, 1, 2),
(32, 752370062, 'Nguyen Le Chi Bao Fpt Polytechnic', '0911706470', 'baonlcps09193@fpt.edu.vn', '69, đường Cung Vàng, phường 69', 1, 1800000, '2020-10-14 22:04:54', 10, 1, 2),
(33, 5, 'fucking shit', '0293812098', 'email@email.com', 'somewhere', 1, 1000000, '2019-10-12 09:09:09', 10, 1, 0),
(34, 752370062, 'Nguyen Le Chi Bao Fpt Polytechnic', '0911706470', 'baonlcps09193@fpt.edu.vn', '50/17 Nguyen Dinh Chieu', 2, 1500000, '2020-10-15 08:50:53', 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `quantity`) VALUES
(1, 1, 1, 3),
(2, 1, 10, 3),
(3, 1, 3, 1),
(20, 15, 1, 1),
(21, 15, 2, 2),
(22, 15, 3, 1),
(23, 16, 1, 1),
(24, 16, 3, 1),
(25, 16, 5, 1),
(26, 16, 6, 1),
(27, 17, 1, 1),
(28, 17, 2, 1),
(29, 17, 3, 1),
(30, 18, 1, 1),
(31, 19, 3, 1),
(32, 20, 5, 1),
(33, 21, 6, 1),
(34, 22, 4, 1),
(35, 22, 2, 1),
(36, 22, 5, 1),
(37, 23, 4, 1),
(38, 23, 5, 1),
(39, 24, 1, 1),
(40, 24, 2, 1),
(41, 25, 2, 1),
(42, 26, 2, 2),
(43, 26, 3, 1),
(44, 27, 1, 2),
(45, 27, 2, 1),
(46, 29, 2, 11),
(47, 30, 2, 9),
(48, 31, 25, 10),
(49, 32, 2, 1),
(50, 32, 3, 6),
(51, 32, 6, 3),
(52, 34, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `price` double(10,2) DEFAULT '0.00',
  `id_category` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_author` int(11) NOT NULL,
  `detail` text COLLATE utf8_bin,
  `view` int(11) DEFAULT '0',
  `id_publisher` int(11) NOT NULL,
  `rating` double(3,1) DEFAULT '0.0',
  `quantity` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `id_category`, `image`, `date`, `id_author`, `detail`, `view`, `id_publisher`, `rating`, `quantity`) VALUES
(1, 'sức mạnh hắc ám', 80000.00, 17, 'img1.jpg', '2020-05-28 00:00:00', 16, 'Tóm tắt nội dung sách “Series Sức Mạnh Hắc Ám - Phần 1: Triệu Hồi”\r\n\r\n“Triệu Hồi”  mở đầu cho bộ ba tác phẩm tiểu thuyết kinh dị “Sức Mạnh Hắc Ám” – một series hoàn toàn mới của tiểu thuyết gia ăn khách Kelley Armstrong.\r\n\r\nTất cả những gì Chloe Saunders muốn là một cuộc sống như bao thiếu niên bình thường khác – có cơ hội hoàn thành chuyện học hành, kết bạn, và có lẽ là hẹn hò với một chàng trai. Nhưng đến khi Chloe bắt đầu trông thấy ma, cô biết cuộc sống ấy sẽ chẳng bao giờ còn như xưa nữa.\r\n\r\nKhông lâu sau thì đâu đâu cũng có ma và họ muốn Chloe chú ý đến mình. Cuối cùng, khi tinh thần Chloe cũng bị suy sụp, cô được đưa vào một nhà mở dành cho trẻ gặp rắc rối. Ban đầu Nhà Lyle có vẻ ổn, nhưng thời điểm bắt đầu quen biết với những bệnh nhân khác – Simon quyến rũ và người anh trai lạnh lùng đáng ngại của cậu, Derek, Tori xấu tính và Rae, người có “thứ” tạo ra lửa – Chloe dần nhận ra rằng có điều gì đó kỳ lạ và hiểm ác đang ràng buộc họ với nhau, và đấy không đơn thuần là do thái độ cư xử “rắc rối” bình thường.\r\n\r\nVà họ cũng sắp sửa khám phá ra Nhà Lyle không phải là một nhà mở thông thường…\r\n\r\nWaka trân trọng giới thiệu đến các bạn cuốn sách “Series Sức Mạnh Hắc Ám - Phần 1: Triệu Hồi”!', 14000, 10, 0.0, 100),
(2, 'Người giỏi không bởi học nhiều', 150000.00, 3, 'img2.jpg', '2020-05-28 00:00:00', 13, 'Cuốn sách \"Người Giỏi Không Bởi Học Nhiều\"sẽ giúp bạn trở thành một sinh viên nổi bật và có những năm tháng trên giảng đường đại học.\r\n\r\nBạn làm gì để trở thành một sinh viên nổi bật? Làm thế nào để bạn có những năm tháng trên giảng đường đại học thú vị nhất, trưởng thành nhất - tốt nghiệp đại học bằng xuất sắc, tham gia các hoạt động bổ ích, và khi ra trường xây dựng được một hồ sơ xin việc đẹp, có nhiều cơ hội việc làm sau khi tốt nghiệp đại học?\r\n\r\nCuốn sách Người giỏi không bởi học nhiều do Alpha Books biên soạn sẽ cung cấp cho bạn những phương pháp dễ áp dụng nhất trong học tập cũng như rèn luyện phong cách sống, giúp bạn đạt được những điều trên, và còn hơn thế nữa.\r\n\r\nTrong cuốn sách này, bạn sẽ biết cách:\r\n\r\n• Không đọc tất cả những gì được giao trên lớp\r\n\r\n• Tạo ra “Nghi thức Chủ nhật”\r\n\r\n• Bỏ đi một số giờ học mỗi kỳ\r\n\r\n• Bắt đầu bài tập lớn ngay khi được giao\r\n\r\n• Trở thành chủ tịch một câu lạc bộ trong trường\r\n\r\n• Ứng tuyển mười học bổng mỗi năm\r\n\r\n• Làm tốt hơn bất kỳ người nào bạn biết\r\n\r\nVà còn nhiều điều nữa…\r\n\r\nCuốn sách hữu dụng cho bất kỳ sinh viên, và thậm chí bất kỳ bậc phụ huynh nào...\r\n\r\nMời các bạn đón đọc cuốn sách: \"Người Giỏi Không Bởi Học Nhiều - Nhiều tác giả\"', 2560, 4, 5.0, 89),
(3, 'Nơi giấc mơ em thuộc về', 200000.00, 2, 'img3.jpg', '2020-05-28 00:00:00', 3, 'Tác phẩm xoay quanh chuyện tình giữa hai nhân vật chính là Tiểu Vũ và Phôn. Cha mất do một tai nạn, Tiểu Vũ lớn lên trong sự bao bọc của mẹ, với gia sản kếch xù cha để lại.\r\n\r\nCô gặp Phôn từ ngày này - ngày cha cô mất - rồi thất lạc nhau đến tận khi cả hai đều du học ở nước ngoài. Họ yêu nhau chân thành và sẵn sàng hy sinh cho nhau tất cả.\r\n\r\nRồi, khi mẹ Tiểu Vũ có tình yêu - người đàn ông đến với bà bằng những toan tính vật chất - Tiểu Vũ đã chống lại và bị tai nạn xe, liệt nửa người, mất trí theo sự sắp đặt của cô để kéo dài thời gian cho mọi sự.\r\n\r\nChính trong những lúc này, Tiểu Vũ nhận ra, tình yêu là một sức mạnh phi thường, giúp con người ta vượt qua tất cả mọi thứ. Dẫu cô cố tránh né, Phôn vẫn yêu, vẫn hy vọng, đợi chờ. Vượt qua mọi khó khăn, trở ngại, cuối cùng họ vẫn có thể cùng nắm tay nhau chạm đến hạnh phúc trọn vẹn.', 1240, 3, 0.0, 94),
(4, 'Ma vân thư viện', 0.00, 14, 'img4.jpg', '2020-06-11 00:00:00', 14, 'Tọa lạc trên dãy Chung Nam bảng lảng mây mờ và khói tím, Ma Vân thư viện là học viện đào tạo văn, võ và kỳ môn độn giáp lừng danh nhất Đại Đường. Cứ mười năm trường mới tuyển chọn sinh đồ một lần, đa phần những người trúng tuyển đều xuất thân danh gia vọng tộc, hoặc lắm tiền nhiều của, hoặc văn võ song toàn.\r\n\r\nNhưng năm nay, người đầu tiên thi đỗ rồi nghiễm nhiên bước lên bảo tọa đại sư huynh lại là Lý Huyền, một tiểu tử lang bạt, thi từ ca phú không biết, kiếm giáo đao cung chẳng thông. Bù lại, gã ta cực kỳ mưu trí, cực kỳ tự tin, tin rằng ai cũng có sở trường ưu điểm của riêng mình. Ngày bước vào Ma Vân thư viện là ngày cuộc đời vô tư lự của gã sang trang, nào trổ tài khuất phục bọn con ông cháu cha, nào xoay xở xử trí một mối tình nan giải, để rồi ngẫu nhiên dấn thân vào một bí mật về bùa yểm đã lưu truyền suốt trăm năm ở Đại Đường...\r\n\r\nTrân trọng giới thiệu!', 2600, 2, 0.0, 100),
(5, 'nụ hôn đầu', 260000.00, 5, 'img5.jpg', '2020-06-23 00:00:00', 5, 'Tóm tắt sách Nụ hôn đầu:\r\n\r\nCó khi...\r\n\r\nRun run then thùng nhận nụ hôn đầu, rồi chợt thấy thất vọng vì nó chẳng lãng mạn như thơ ca vẫn nói.\r\n\r\nThấy hụt hẵng chỉ vì đứa bạn thân bỗng dưng chơi thân với một đứa khác hơn minh.\r\n\r\nĐau khổ vì tình yêu đầu đời tan vỡ...\r\n\r\nVà... Vui sướng có được người bạn tốt ở một nơi xa lạ đầy bỡ ngỡ Hạnh phúc khi nhận ra ta đang có một gia đình can đảm chọn làm điều đúng dù có khi chỉ đơn độc một mình. ...\r\n\r\nTất cả những điều đó bắt đầu từ những câu chuyện rất thật, đầy xúc động trong nụ hôn đầu - một món quà dành tặng cho những người ta yêu.\r\n\r\nMời các bạn đón đọc sách Nụ hôn đầu - Phần 1.', 11000, 6, 5.0, 100),
(6, 'bóng rắn', 150000.00, 16, 'img6.jpg', '2020-06-06 00:00:00', 7, 'Mời các bạn quay trở lại với phần 3 của Biên niên sử nhà Kane của Rick Riordan với tựa đề Bóng rắn.\r\n\r\nCả thế giới con người đang lâm nguy khi gia đình Kane phải hoàn thành sứ mệnh của mình trong phần kết chấn động của Biên niên sử nhà Kane.\r\n\r\nKhi hai pháp sư trẻ tuổi`orderer và Sadie Kane học cách đi theo đường lối của các  vị thần Ai Cập cổ đại, cả hai đều hiểu rằng mình sẽ phải đóng một vai trò chủ chốt trong việc lập lại Ma’at - tôn ti trật tự - cho thế giới. Nhưng điều hai anh em không biết là thế giới ấy có thể biến ra hỗn loạn đến mức nào. Quỷ rắn hỗn mang Apophis thoát được ra ngoài và đang đe dọa sẽ hủy diệt thế giới trong ba ngày tới. Các pháp sư thì chia rẽ nội bộ. Thần thánh đang dần biến mất, những vị còn hiện diện đều yếu kém cả. Walt, một trong những học viên tài năng nhất của`orderer và Sadie, đang tàn đời và có thể cảm nhận được nguồn sinh lực của mình ngày một cạn kiệt. Zia mãi bận phải trông trẻ là vị thần mặt trời nghễnh ngãng nên chẳng thể giúp được gì nhiều. Vài ba cô cậu choai choai cùng một nhúm tập sự viên thì có thể làm gì được chứ?\r\n\r\nCó thể có một cách để ngăn chặn Apophis đấy, nhưng cách ấy thật cam go và có khả năng khiến`orderer và Sadie mất mạng, nếu như cách này có tác dụng. Phương thức này liên quan đến việc phải đặt lòng tin vào hồn ma của một tên pháp sư tâm thần mong sao hắn không phản bội lại hai anh em, hay tệ hơn là, không giết chết hai người.`orderer và Sadie họa có điên mới thử cách này. Ừ thì, họ điên thật.\r\n\r\nVới những lời tự thoại hài hước, lũ quái vật không dễ quên, cùng đội ngũ những bạn lẫn thù biến hóa khôn lường, cuốn Bóng Rắn đầy rẫy kịch tính, là một cái kết vừa hấp dẫn vừa thỏa lòng người cho bộ ba Biên niên sử nhà Kane.\r\n\r\nWaka trân trọng giới thiệu!', 4036, 10, 4.5, 97),
(7, 'Nói với con về Giới và Yêu như thế nào?', 14000.00, 12, '1.jpg', '2020-06-16 00:00:00', 15, 'Trong thời đại ngày nay khi các quan hệ giao tiếp ngày càng rộng mở, khi các phương tiện thông tin ngày càng nhiều thì quan niệm về giao lưu giới tính, về tình yêu tình dục của lứa tuổi trẻ nhất là tuổi vị thành niên đang trở thành vấn đề rất bức xúc của các bậc cha mẹ, nhà trường và xã hội.\r\n\r\nDo đó, 40 bài học về giáo dục giới tính trong cuốn sách Nói với con về giới và yêu như thế nào? của tác giả Lâm Huệ Anh không chỉ là những bài học quan trọng của đời người, liên quan đến sức khỏe, tâm sinh lý con người mà còn là những bài học ảnh hưởng đến đạo lý và an toàn xã hội mà người trẻ và các bậc phụ huynh nào cũng cần phải biết.\r\n\r\nWaka trân trọng giới thiệu!', 12340, 6, 4.0, 100),
(8, 'Đốt cháy băng giá', 56000.00, 14, 'img7.jpg', '2020-04-17 00:00:00', 5, 'Nếu bạn là cô gái Dusty, nghe tiếng con trai lạ mặt tự nhận là người anh trai Josh mất tích bấy lâu của mình, bạn sẽ hoảng loạn và gọi điện cho cảnh sát? Bạn sẽ khóc oà và chạy vào phòng bố? Bạn sẽ cố ngủ vùi để quên đi giọng nói đầy ám ảnh? Bạn sẽ chạy thẳng vào trong cơn bão tuyết để rồi bị nhấn chìm trong màn đêm đen thẳm? Hay là...\r\n\r\nĐợi chờ tới đêm mai,\r\n\r\nGiữa màn đêm mịt mùng, khi bão tuyết gào rú,\r\n\r\nChuông điện thoại lại reo...\r\n\r\nVà người con trai lạ mặt ấy, vẫn đợi bạn...!\r\n\r\nSự xuất hiện của cậu bé kì lạ với cuộc điện thoại mỗi đêm khuya đã làm thay đổi cuộc đời Dusty. Những nghi ngờ và rượt đuổi, những bí mật kinh khủng được giấu kín, những sự thật không ai muốn phơi bày, sự sống dậy của một linh hồn tội lỗi... Tất cả cùng cuốn theo mạch câu chuyện để rồi ẩn số tưởng chừng không thể được giải mã dần hé lộ trong ánh sáng ảm đạm của buổi sáng mùa đông sau cơn bão tuyết điên cuồng...\r\n\r\nKhông chỉ là một chuỗi kịch tính khiến bạn chẳng thể rời khỏi trang sách, Đốt Cháy Băng Giá còn mang một ý nghĩa nhân văn to lớn, mà chỉ đến những tình tiết cuối cùng người đọc mới nhận ra.\r\n\r\nĐược thừa nhận về mặt ý tưởng cũng như cách kể chuyện lôi cuốn, Đốt Cháy Băng Giá của tác giả trẻ Tim Bowler đã gặt hái được rất nhiều giải thưởng về Sách hàng đầu như: Giải thưởng Sách Hull 2007, Giải thưởng Sách Highland 2007, Giải thưởng Sách Redbridge 2007, Giải thưởng Sách Trường Stockport 2007, Giải thưởng Sách Teen South Lanarkshire 2008, Giải thưởng Trường Sách Southern 2009, v.v. ...\r\n\r\nNếu bạn là một tín đồ của viễn tưởng và kinh dị, Đốt Cháy Băng Giá chính là lựa chọn hàng đầu cho các bạn độc giả trẻ tuổi. Nếu tiết trời đang rét buốt, tốt thôi, hãy chuẩn bị một tách trà thật nóng, một góc quán thật tĩnh mịch, để hoà mình vào từng nhịp thở dồn dập của Đốt Cháy Băng Giá bạn nhé. Và nhớ là:\r\n\r\nĐốt Cháy Băng Giá không dành cho những cô nàng yếu tim!', 1750, 2, 4.7, 100),
(9, 'cuộc chiến công nghệ số', 173000.00, 2, 'img8.jpg', '2020-05-11 00:00:00', 10, 'Thế giới chúng ta đang sống là một mô hình hóa của màu sắc, âm thanh hay mùi vị..., tất cả đều hòa quyện vào nhau thành một chỉnh thể thống nhất. Tuy nhiên, thế giới kỹ thuật số được mở ra trước mắt chúng ta qua những chiếc máy vi tính thì lại hoàn toàn khác: nó là nhị phân, tắt hay bật, có hoặc không. Sự ra đời của những chiếc máy tính cá nhân phù hợp với túi tiền của người dân vào những năm 1990 cùng với sự xuất hiện của mạng Internet vào khoảng những năm 1970 đã bắt đầu hình thành những lĩnh vực kinh doanh hoàn toàn mới – ví dụ tiêu biểu là Yahoo, một trang wed chuyên mang tới những tin tức nóng hổi được cập nhập liên tục tới từng phút, thông tin và dự báo về thời tiết, cùng dịch vụ thư điện tử miễn phí.\r\n\r\nCó ba công ty đã bị cuốn vào vòng xoáy của sự thay đổi này là: Apple, Microsoft và Google. Và ba công ty này vốn khác nhau hoàn toàn. Tính đến thời điểm cả ba công ty này bắt đầu tham gia vào trận chiến kỹ thuật số thì một trong số đó là một doanh nghiệp với thời hoàng kim đang dần chìm vào quá khứ, một bên thì là công ty đang dẫn đầu thế giới về lĩnh vực máy tính và kinh doanh, và một bên nữa mới chỉ chập chững bước ra từ một ý tưởng tuyệt vời của hai chàng sinh viên xuất chúng.\r\n\r\nTừ đó, các công ty ấy liên tục tranh đấu kịch liệt với nhau rất nhiều lần để tranh giành quyền kiểm soát từng lĩnh vực một của thế giới kỹ thuật số. Vũ khí của họ là những phần cứng, phần mềm liên tục được cải thiện, cũng như những chiến dịch quảng cáo rầm rộ. Thứ được đặt lên bàn cân lúc này là danh tiếng của họ, và cũng chính là tương lai của chúng ta.\r\n\r\n', 8510, 7, 4.7, 100),
(10, 'Tiếp thị bán hàng qua điện thoại', 96000.00, 2, 'img9.jpg', '2020-06-21 00:00:00', 10, 'Sách nói này sẽ hết hạn vào ngày 27/10/2019, quý độc giả vui lòng nghe sách trước 27/10/2019.\r\n\r\nĐây là bản tóm tắt của sách Telesales - Tiếp thị bán hàng qua điện thoại. Các nội dung trong sách đã được Alpha Books giản lược một cách ngắn gọn và cô đọng nhất song tổng thể vẫn đầy đủ so với bản gốc.\r\n\r\nNghệ thuật tiếp cận khách hàng qua điện thoại đòi hỏi sự nhạy cảm trong lắng nghe, khéo léo, tinh tế trong trình bày và bất ngờ trong tạo cảm xúc.\r\n\r\nXuất hiện vào khoảng thập niên 70 của thế kỷ trước tại Bắc Mỹ, châu Âu, châu Đại dương, tiếp thị bán hàng qua điện thoại (Telesales) cho phép nhân viên tiếp cận, tìm hiểu nhu cầu và tư vấn cho khách hàng các sản phẩm và dịch vụ thông qua điện thoại mà không cần phải gặp mặt.\r\n\r\nNhiều năm trở lại đây, tiếp thị bán hàng qua điện thoại được các doanh nghiệp tại Việt Nam áp dụng rộng rãi và trở nên phổ biến. Tuy nhiên, không phải công ty nào cũng hiểu rõ về hình thức tiếp thị này để vận dụng linh hoạt và hiệu quả, cũng như không phải khách hàng nào cũng vui vẻ chấp nhận những cuộc điện thoại chào mời của các công ty. Từng là chuyên gia nhiều năm kinh nghiệm trong lĩnh vực tiếp thị bán hàng tại các ngân hàng, tác giả Bùi Xuân Phong sẽ đem đến cho độc giả, những kiến thức tổng quan về mô hình này và các giải pháp cho các tình huống mà nhân viên tiếp thị bán hàng qua điện thoại phải đối mặt.\r\n\r\nNgoài việc cung cấp những thông tin chi tiết về mô hình kinh doanh, cơ cấu vận hành cũng như các loại trang thiết bị cần thiết của kênh tiếp thị bán hàng qua điện thoại tác giả cũng đề cập đến việc phân tích tâm lý của khách hàng. Hiểu rõ tâm lý khách hàng có thể xóa bỏ được khoảng cách vô hình giữa người tiếp thị bán hàng qua điện thoại và người mua, thuyết phục khách hàng lắng nghe và mua sản phẩm.\r\n\r\nTelesales -Tiếp thị bán hàng qua điện thoại là cuốn sách mang đến cho độc giả cái nhìn tổng thể về ngành tiếp thị bán hàng qua điện thoại, và cuốn cẩm nang cho các bạn trẻ đang công tác trong ngành nghề hứa hẹn rất phát triển ở Việt Nam nhưng cũng rất áp lực và thử thách này.', 9362, 3, 4.0, 100),
(11, 'trí tuệ xã hội', 0.00, 7, 'img10.jpg', '2020-03-16 00:00:00', 10, 'Đây là bản tóm tắt của sách Trí tuệ xã hội. Các nội dung trong sách đã được Alpha Books giản lược một cách ngắn gọn và cô đọng nhất song tổng thể vẫn đầy đủ so với bản gốc.\r\n\r\nTrí tuệ xúc cảm là một hiện tượng kỳ lạ trên thế giới với hơn 5 triệu bản đã được bán trên toàn thế giới. Và bây giờ, một lần nữa Daniel Goleman đã đưa ra một tổng kết đột phá cơ bản về những khám phá mới nhất về sinh học và khoa học não bộ, theo đó, con người chúng ta “luôn đưa ra các tín hiệu để liên hệ” và ảnh hưởng sâu sắc đến kỳ lạ của nó tới các mối quan hệ của chúng ta trong mọi mặt của đời sống.\r\n\r\nVượt xa so với nhận thức của chúng ta, những tiếp xúc hàng ngày của chúng ta với cha mẹ, vợ chồng, ông chủ và thâm chí cả những người lạ đã định hướng não bộ của chúng ta và ảnh hưởng đến các tế bào trên toàn bộ cơ thể của chúng ta, thậm chí ảnh hưởng đến cả gen của chúng ta – theo cả hướng tốt hoặc xấu. Trong Trí tuệ xã hội, Daniel Goleman đã khám phá ra một khoa học mới nổi bật về những liên hệ kỳ lạ trong thế giới tương tác giữa các cá nhân với nhau. Khám phá cơ bản nhất của cuốn sách chính là: chúng ta sinh ra vốn đã có tính hoà đồng, luôn bị lôi kéo vào một “sóng thần kinh“ sẽ liên kết não bộ của chúng ta với những người xung quanh.\r\n\r\nGoleman giải thích sự chính xác đến kinh ngạc của các ấn tượng đầu tiên, điểm xuất phát là sự uy tín và sức mạnh xúc cảm, sự phức tạp của các lôi cuốn về giới tính, và cách thức để chúng ta nhận ra những lời nói dối. Ông cũng tiết lộ ‘mặt sau’ của Trí tuệ xã hội, từ tính ích kỷ đến tính xảo quyệt và bệnh thái nhân cách.\r\n\r\nLiệu có cách nào để chúng ta có thể giúp lũ trẻ trở nên vui vẻ hơn không? Thế nào là cơ sở của một sự kết hợp hài hoà, tốt cho cả hai người? Làm thế nào để những nhà lãnh đạo doanh nghiệp và những giáo viên có thể lãnh đạo và giảng dạy tốt, thậm chí cả những người có năng lực nhất trong số này? Làm thế nào để các tập thể đối đầu, thành kiến và căm thù nhau có thể sống chúng với nhau trong hoà bình?\r\n\r\nCâu trả lời cho những câu hỏi này có thể khó nắm bắt hơn chúng ta nghĩ. Và Goleman đã đưa ra một tin tức khích lệ nhất có sức thuyết phục mạnh mẽ: chúng ta – loài người vốn có xu hướng gắn liền với sự thấu cảm, tinh thần hợp tác và lòng vị tha - để chúng ta phát triển Trí tuệ xã hội và nuôi dưỡng những khả năng này trong mỗi chúng ta và trong những người khác.\r\n\r\nWaka xin trân trọng giới thiệu sách [Tóm tắt sách] Trí tuệ xã hội.', 16020, 8, 4.6, 100),
(12, 'dẫn dắt xếp', 0.00, 3, 'img11.jpg', '2020-06-17 00:00:00', 10, 'Tóm tắt cuốn sách \"Dẫn Dắt Sếp\": Bạn đã sẵn sàng tạo một bước nhảy vọt từ vị trí khiêm tốn hiện tại (chuyên gia kỹ thuật, nhà sản xuất) tới vị trí lãnh đạo có tầm ảnh hưởng lớn, gây được sự chú ý và được mọi người tán dương chưa?\r\n\r\nDẫn dắt sếp sẽ chỉ cho bạn cách thực hiện điều đó. Cuốn sách vô giá này sẽ giúp bạn rèn luyện khả năng cân bằng, sự bền bỉ, ý chí và niềm đam mê phong cách lãnh đạo mang tên \"quản lý cấp trên\". Phong cách đó được hình thành từ những nhà quản lý cấp trung, vị trí đòi hỏi phải gây được ảnh hưởng tới sếp, đồng nghiệp và cả cấp dưới, những người có tác động tích cực đến sự cam kết cũng như những đóng góp của bạn. Quản lý cấp trên, tức là phải xây dựng được phẩm chất khiến người khác luôn khâm phục và được đánh giá là liêm chính, nghị lực, cảm thông, và đặc biệt là khả năng tư duy tổng hợp...\r\n\r\nCuốn sách chứa đựng kiến thức lãnh đạo tinh tế và những chiến lược thiết yếu nhằm củng cố niềm tin cho mọi người để mang lại kết quả tốt đẹp cho bản thân, nhân viên và sếp của bạn.\r\n\r\n\"Trong Dẫn dắt sếp, phong cách độc đáo và kiến thức uyên bác của John Baldoni đã mang lại một cái nhìn mới mẻ cho chủ đề này nói riêng và vấn đề quản lý nói chung.\" ‒ Eric Hellweg, Editorial Managing Director, Harvard Business.org\r\n\r\n\"Cuốn sách chứa đựng những lời khuyên sâu sắc, hữu ích và riêng biệt cho những ai sắp trở thành lãnh đạo trong tương lai\" - WashingtonPost.com\r\n\r\n\"Bằng cách tạo ra chiến thuật và tập trung vào kinh nghiệm thực tiễn, nhà quản lý có thể mang đến những thay đổi tích cực trong kỹ năng lãnh đạo của mình. Dẫn dắt sếp là hướng dẫn cho tất cả những ai muốn khôi phục niềm tin với sếp và dẫn dắt nhóm của mình đạt được những thành quả lớn trong công việc - Eric Harvey, người sáng lập và Chủ tịch Walk the Talk. Co.\r\n\r\nMời các bạn đón đọc cuốn sách \"Dẫn Dắt Sếp - John Baldoni\"', 0, 4, 0.0, 100),
(13, 'Anh biết gió từ đâu tới ', 0.00, 1, 'img13.jpg', '2020-06-17 00:00:00', 6, 'Anh biết gió từ đâu tới là cuốn sách không chỉ nói lên tình yêu đẹp đẽ của hai nhân vật chính là Trình Ca và Bành Dã, phải biết trân trọng từng chút thời gian yêu nhau, bên cạnh đó cuốn sách còn có thông điệp truyền tải rất ý nghĩa như bảo vệ môi trường, bảo vệ động vật hoang dã (linh dương Tây Tạng, cá voi Bắc Băng Dương), tiết kiệm nước sinh hoạt.\r\n\r\nTập 2:\r\n\r\n\"Mười hai năm, trách nhiệm và tội lỗi đè nặng trong lòng, giờ khắc này, anh được người phụ nữ này cứu rỗi.\r\n\r\nChúng ta không phải thánh hiền, chúng ta sẽ phạm sai lầm. Những sai lầm làm cho cuộc đời sau này tỉnh táo hơn.\r\n\r\nBản thân gánh tội, ngày ngày hướng thiện. Đây chính là cuộc đời. Người phụ nữ Trình Ca này, cái gì cũng tốt. Anh có thể khẳng định. Người phụ nữ Trình Ca này, cái gì anh cũng yêu. Anh cũng rất khẳng định.\"', 0, 5, 0.0, 100),
(14, 'đánh cắp ý tưởng', 165000.00, 8, 'img17.jpg', '2020-06-04 00:00:00', 9, 'Đã nhiều năm nay, tại thành phố New York vẫn lan truyền một câu chuyện kể về lần gặp mặt đầu tiên giữa Woody Allen và Arnold Schwarzenegger. Hai người gặp nhau tại một bữa tiệc rượu sang trọng được tổ chức ở Manhattan. Khi đó, Woody cầm ly rượu trong tay, tiến về phía Schwarzenegger và hỏi: “Anh Arnold này, không biết phải mất bao lâu tôi mới giống như anh được nhỉ?” Arnold trả lời ngay không chút ngần ngừ: “Hai thế hệ nữa.”\r\n\r\nKhông giống như Woody, bạn không cần phải chờ lâu đến vậy mới có thể thay đổi. Tôi đã tổng hợp vào cuốn sách này các ý tưởng và lời khuyên thực tế, hữu ích của gần hai thế hệ và bạn có thể nắm bắt chúng trong khoảng 1 đến 2 giờ. Bạn sẽ nhận thấy rằng những ý tưởng và khái niệm trong cuốn sách này không được dạy trong trường lớp nào, thậm chí ngay cả trong thực tế công việc của bạn. Sách được bố cục thành nhiều chương ngắn giúp bạn dễ dàng theo dõi và tôi tin rằng nội dung cuốn sách đủ sức thu hút sự chú ý của các bạn.\r\n\r\nTôi cho rằng lĩnh vực tiếp thị, từ lâu đã thiếu vắng những ý tưởng có tầm vóc, mang tính thực tiễn để bạn hay công ty bạn có thể ngay lập tức ứng dụng thành công. Nếu từ bây giờ trở đi, bạn sử dụng cuốn sách này như một bí quyết tiếp thị hoặc như một cẩm nang tham khảo ý tưởng thì xem như tôi đã làm tròn nhiệm vụ của mình. Do vậy, bạn không cần phải tìm kiếm một quyển sách được cập nhật mới theo kiểu “chưa từng có trước đây”.\r\n\r\nHãy thoải mái thưởng thức các câu chuyện, học hỏi những phương pháp được nêu trong từng trang sách và quan trọng nhất là: đừng ngần ngại đánh cắp các ý tưởng. Nên nhớ, đây là những bí quyết chưa ai từng dạy bạn trước đây và là tất cả những gì bạn cần để thật sự tỏa sáng trong lĩnh vực tiếp thị - ngay bây giờ chứ không cần phải đợi đến một hoặc hai thế hệ nữa!', 6800, 4, 4.1, 100),
(15, 'Thủ thỉ thù thì cái gì nguy hiểm', 98000.00, 13, '2.jpg', '2020-06-06 00:00:00', 14, 'Các bậc phụ huynh và các em nhỏ thân mến, tuổi nhỏ là tuổi vui chơi, khám phá mọi ngóc ngách của cuộc sống, từ trong nhà ra ngoài ngõ. Trong môi trường đó, nhiều đồ vật, nơi chốn tưỏng như an toàn lại bỗng dưng trở thành mối nguy hiểm gây ra tai nạn, thương tích cho trẻ. Để sống vui, sống khỏe, sống an toàn, hãy cùng nhau đọc “Thủ thỉ thù thì” - một tập sách gồm 78 bài thơ ngắn về các tình huống nguy hiểm mà trẻ cần tránh đi. Nào chúng ta cùng bắt đầu nhé!', 2140, 5, 3.8, 100),
(16, 'Bộ tứ siêu quậy', 105000.00, 9, '3.jpg', '2020-06-14 00:00:00', 2, 'Câu chuyện trong sách xoay quanh những tình huống dở khóc dở cười của lớp 2.3 với bộ tứ: cô bé Bibi, sở thích ngồi quán Internet, có tuyệt chiêu gõ bàn phím bằng chân; cậu bé Tí teo thích phá phách, nghịch ngợm và tuyệt chiêu trêu chọc cô giáo; cậu bé Phỉ Lủ thích ngủ, ngủ gật giỏi như thần, ngáy to không ai bằng; cuối cùng là cậu bé Bobo, có “năng khiếu” đi học muộn, ngày nào cũng đi học muộn, tuyệt chiêu của cậu: kiên trì đi học muộn.\r\n\r\nTrong một lớp học có “bộ tứ siêu quậy” thì cô giáo chủ nhiệm cũng có nhiều nét đặc biệt. Cô Vương Lan, chủ nhiệm lớp 2.3, được mô tả là một cô giáo vô cùng ghê gớm với tuyệt chiêu trừng phạt học sinh và có khả năng chịu đựng siêu phàm trước những trò đùa tinh quái của bộ tứ siêu quậy.\r\n\r\nNgôn ngữ của bộ truyện tranh thông minh và dí dỏm, đặc biệt trong những cuộc đối thoại. Người đọc có thể bật cười vì những trò đùa tinh quái mà chỉ có “bộ tứ” đặc biệt ấy mới có thể nghĩ ra.', 3622, 1, 4.0, 100),
(17, 'Ông già và biển cả', 26000.00, 4, '4.jpg', '2020-06-17 00:00:00', 16, 'Tóm tắt sách Ông Già Và Biển Cả:\r\n\r\nÔng già và Biển cả (tên tiếng Anh: The Old Man and the Sea) là một tiểu thuyết ngắn được Ernest Hemingway viết ở Cuba năm 1951 và xuất bản năm 1952. Nó là truyện ngắn dạng viễn tưởng cuối cùng được viết bởi Hemingway. Đây cũng là tác phẩm nổi tiếng và là một trong những đỉnh cao trong sự nghiệp sáng tác của nhà văn. Tác phẩm này đoạt giải Pulitzer cho tác phẩm hư cấu năm 1953. Nó cũng góp phần quan trọng để nhà văn được nhận Giải Nobel văn học năm 1954.\r\n\r\nTrong Ông già và Biển cả, ông đã triệt để dùng nguyên lý mà ông gọi là “tảng băng trôi”, chỉ mô tả một phần nổi còn lại bảy phần chìm, khi mô tả sức mạnh của con cá, sự chênh lệch về lực lượng, về cuộc chiến đấu không cân sức giữa con cá hung dữ với ông già. Tác phẩm ca ngợi niềm tin, sức lao động và khát vọng của con người.\r\n\r\nWaka trân trọng giới thiệu sách Ông Già Và Biển Cả.', 0, 9, 0.0, 100),
(18, 'Nhân sự cốt cán', 90000.00, 2, 'img30.jpg', '2020-08-01 00:00:00', 12, 'Làm thế nào để thúc đẩy sự nghiệp và tạo ra tương lai rực rỡ bất chấp xuất phát điểm của bạn ở đâu?\r\nTại sao một số người dễ dàng bị sa thải, nản chí và bị thu hẹp mọi cơ hội, trong khi những người khác có cơ hội lựa chọn? Trong cuốn sách ấn tượng này, Seth Godin lập luận rằng đây là lúc cần trở nên thiết yếu hơn bao giờ hết, để trở thành người không thể thiếu - nhân sự cốt cán trong mọi tổ chức bạn làm việc.\r\nNhân sự cốt cán là mạch máu của mọi tổ chức: họ phát minh, lãnh đạo (bất kể chức danh nào), kết nối mọi người, làm cho mọi thứ xảy ra và tạo ra trật tự thoát khỏi sự hỗn loạn. Họ yêu thích công việc và nỗ lực trở thành phiên bản tốt nhất của bản thân và biến mỗi ngày thành một kiệt tác nghệ thuật. Trong thế giới ngày nay, họ có được những công việc tốt nhất và tự do nhất.\r\nNếu bạn từng tìm thấy một lối tắt mà người khác đã bỏ lỡ, thấy một cách mới để giải quyết xung đột hoặc kết nối với những người không thể với tới thì bạn đã có những tố chất cần thiết để trở thành người không thể thiếu.\r\nWaka trân trọng giới thiệu!', 0, 3, 4.4, 100),
(19, 'Bí mật của người kể chuyện', 100000.00, 2, 'img31.jpg', '2020-08-01 00:00:00', 15, 'Kể chuyện là một nghệ thuật, và người kể chuyện là một nghệ sĩ. Nghệ thuật kể chuyện có thể thay đổi cuộc đời của chúng ta.\r\nLàm thế nào một người bán áo phông có thể trở thành một nhà sản xuất chương trình hàng đầu? Làm thế nào người con trai nhút nhát của một mục sư vượt qua được nỗi sợ nói trước đám đông để thuyết trình và bán hết vé tại sân vận động? Làm thế nào các phong trào nổi tiếng trên thế giới như “thử thách xô đá” được mọi người hướng ứng, bao gồm cả những người nổi tiếng như Bill Gates hay Mark Zurketberg. \r\nHọ đã kể những câu chuyện tuyệt vời. Trong Bí mật của Người kể chuyện, Carmille Gallo tiết lộ những chìa khóa để kể những câu chuyện đầy mạnh mẽ, truyền cảm hứng, xây dựng thương hiệu, khơi dậy các phong trào và thay đổi cuộc sống.\r\nNhư tỷ phú Richard Branson đã nói: “Nghệ thuật kể chuyện có thể được sử dụng để thúc đẩy sự thay đổi.” \r\n“Tôi tin rằng khó khăn của bạn chính là lợi thế của bạn. Carmine Gallo đã chia sẻ triết lý này. Trong Bí mật của Người kể chuyện, anh ấy cho thấy cách chúng ta vượt qua thử thách là cách những câu chuyện tuyệt vời và các thành công vang dội được tạo ra.” – Darren Hardy, cựu CEO của tạp  chí Success.\r\nWaka trân trọng giới thiệu!', 0, 10, 4.6, 100),
(20, '27 thách thức của nhà quản lý', 70000.00, 3, 'img32.jpg', '2020-08-01 00:00:00', 15, '27 thách thức của nhà quản lý sẽ giúp bạn phá vỡ vòng luẩn quẩn và giành quyền kiểm soát các mối quan hệ quản lý. Bất kể là vấn đề gì, Bruce Tulgan cũng cho thấy các nguyên tắc cơ bản mà các nhà quản lý đều nên nắm vững: liên tục tổ chức các cuộc trao đổi trực tiếp, đưa ra những kỳ vọng rõ ràng, theo dõi sát sao hiệu suất, đưa ra phản hồi kịp thời và thúc đẩy mọi người có tinh thần trách nhiệm.\r\nĐối với mọi vấn đề tại nơi làm việc, ngay cả phải đối mặt với những người khó tính nhất, 27 thách thức của nhà quản lý sẽ giúp bạn điều chỉnh các cuộc hội thoại nhằm giải quyết các tình huống giữa các quản lý. Bruce Tulgan cũng cung cấp cách tiếp cận rõ ràng đối với những thái độ tiêu cực nhằm giảm xung đột, cải thiện hiệu suất, giữ chân những người giỏi và thậm chí giúp bạn giảm tải áp lực trong công việc của chính mình.\r\n27 thách thức của nhà quản lý sẽ giúp bạn chủ động giải quyết (gần như) bất kỳ vấn đề nào mà người quản lý có thể gặp phải...\r\nWaka trân trọng giới thiệu!', 0, 1, 3.9, 100),
(21, 'Lean out - Vươn mình', 50000.00, 3, 'img33.jpg', '2020-08-01 00:00:00', 15, 'Rất nhiều thông điệp ủng hộ nữ quyền hiện nay đang đi vào lối mòn và sáo rỗng. Thay vì khuyến khích phụ nữ dựa vào các thế mạnh cá nhân và trân trọng giá trị mà họ mang lại, phụ nữ lại luôn bị nói là cần phải hành xử giống cánh đàn ông hơn. Tất nhiên, không một ai nói hẳn ra như thế. Đây là thế giới doanh nghiệp. Thay vào đó, họ gọi nó là “những hành vi mang lại thành công”, mà thực chất nó có nghĩa là “những hành vi nam tính”. Liệu có còn điều gì hạn chế sự phát triển của phụ nữ hơn việc ẩn ý rằng đàn ông mới là chuẩn mực và họ đang làm những điều “đúng đắn” hay không?\r\nVới những nghiên cứu chuyên sâu và kinh nghiệm cá nhân, Marissa Orr, thông qua Vươn mình đã chỉ ra cách thức hiệu quả nhất để mang đến sự cân bằng giữa việc thể hiện quyền hành và sự chân thành, truyền tải tầm ảnh hưởng và tăng tính hiệu quả trong việc lãnh đạo chính là khả năng lắng nghe, thấu hiểu, và trí tuệ cảm xúc. Đó là những đặc điểm thường gắn liền với phụ nữ. Những đặc tính này, mặc dù thật sự có giá trị trong thế giới thực, nhưng lại không đem đến hiệu quả tương tự đối với bản chất quyền lực độc đáo bên trong một tập đoàn lớn. Sự phân tầng trong doanh nghiệp chứa đựng một hệ thống luật lệ ngầm cụ thể dành cho việc chiến thắng. Một trong những điều to lớn nhất đó là: giả vờ biết hết mọi thứ sẽ giúp bạn đi xa hơn việc thực sự biết bất cứ điều gì.\r\nWaka trân trọng giới thiệu!', 0, 6, 3.5, 100),
(22, 'Dẫn đầu hay là chết', 35000.00, 3, 'img34.jpg', '2020-08-01 00:00:00', 12, 'Dẫn Đầu Hay Là Chết là cuốn sách nói về cách để bán sản phẩm và dịch vụ bất kể tình hình của nền kinh tế đang như thế nào và cung cấp cho người đọc những phương thức để tăng thu nhập, dù sản phẩm, dịch vụ hay ý tưởng của bạn có là gì đi chăng nữa.\r\nCuốn sách chia sẻ những chiến lược đã được kiểm nghiệm của nhằm giúp người bán hàng không chỉ tiếp tục bán được hàng, mà còn tạo ra sản phẩm mới, gia tăng lợi nhuận, chiếm lĩnh thị phần và thậm chí còn nhiều hơn thế.\r\nDẫn Đầu Hay Là Chết mang lại cho bạn đọc một bộ kỹ năng đã được tôi luyện trong thực tế, giúp các bạn tìm ra cơ hội và hành động trước những đối thủ của mình.\r\nCuốn sách khiến bạn đọc thức tỉnh trong khi cả thế giới đang mải phàn nàn về vô số những vấn đề.\r\nWaka trân trọng giới thiệu!', 8000, 6, 4.8, 100),
(23, 'Khởi nghiệp kinh doanh thời 4.0', 35000.00, 2, 'img35.jpg', '2020-08-01 00:00:00', 10, 'Mỗi người đều có một ý tưởng của riêng mình, tuy nhiên, không phải ai cũng biết để được thực hiện chúng. “Khởi nghiệp kinh doanh thời 4.0” sẽ giúp bạn thực hiện ý tưởng của mình. Trong cuốn sách này, bạn sẽ tìm thấy những đoạn trích từ cuộc phỏng vấn độc quyền những người sáng lập và đồng sáng lập của các công ty phần mềm trị giá hàng triệu đô la như Hot Jar, Buzz Sumo và Unbounce chia sẻ những lời khuyên thực tế từ hành trình của họ.\r\nVà bạn sẽ:\r\n- Thay đổi tư duy\r\n- Có ý tưởng kinh doanh khác biệt\r\n- Sáng tạo và đam mê\r\n- Tạo dựng thương hiệu cá nhân\r\n- Can đảm đương đầu với thách thức\r\n- Kiên trì theo đuổi mục tiêu\r\nCuốn sách này dành cho bất kỳ ai muốn thành công trong vai trò người khởi nghiệp. Bạn hãy coi cuốn sách này như một công cụ học tập tốc độ cao, để làm quen với vô số những khái niệm mà bạn cần thiết để bắt đầu. Cũng như với bất kỳ dự án tham vọng lớn lao nào, bạn có thể đào sâu vào hơn vào bất cứ khái niệm nào khiến bạn hứng thú để tìm ra đâu là những điều quan trọng nhất để thực hiện mục tiêu của mình.\r\nWaka trân trọng giới thiệu!', 7000, 8, 4.7, 100),
(24, 'Nhà phát minh ý tưởng', 35000.00, 5, 'img36.jpg', '2020-08-01 00:00:00', 10, 'Ý tưởng là nguồn gốc của mọi thành công. Giữa hàng triệu triệu con người, điều khiến một cá nhân trở nên đặc biệt chính là liệu họ có khả năng đặt ra những câu hỏi khác thường và trả lời nó bằng một ý tưởng đột phá hay không. Rất có thể ngay bây giờ, bạn - người đang đọc những dòng này, đã có sẵn một ý tưởng phi thường, hứa hẹn thay đổi cả thế giới. Nhưng nếu không động não tích cực, ý tưởng ấy sẽ vẫn lang thang vô định trong tâm trí bạn, mãi mãi không thể thành hiện thực.\r\n\"Nhà phát minh ý tưởng\" của Chris Thomason là cuốn sách hướng dẫn bạn cách vận động trí não, suy nghĩ sáng tạo nhưng lại đủ thực tế để hiện thực hóa các ý tưởng. Hiện nay tại nhiều môi trường học tập, làm việc, sự ì trệ trong tư duy và bó buộc trong các qui trình truyền thống đã khiến các cá nhân ngày một trở nên chậm chạp, không thể tiến bộ. Vì vậy, Thomason đã cung cấp cho độc giả 15 công cụ tư duy để hỗ trợ mọi người hình thành cách suy nghĩ \"khác thường\" nhưng có tính thực tiễn, giải quyết hiệu quả các vấn đề và mở ra nhiều hướng phát triển mới mẻ. Việc hình thành những ý tưởng đột phá ở các cá nhân cũng chính là cơ sở để cả tập thể ngày thêm hoàn thiện.\r\nThông qua \"Nhà phát minh ý tưởng\", bạn đọc sẽ trở nên tự tin hơn khi đối mặt với những thử thách. Kể cả khi bạn không tìm được đáp án cho câu hỏi ngay lập tức, nhưng nếu đã nắm được cách tư duy sáng tạo, thì những ý tưởng quý giá sẽ tự khắc tìm đến với bạn trong lúc bạn không ngờ tới.\r\nMời các bạn đón đọc!', 12000, 8, 4.9, 100),
(25, 'test', 90000.00, 7, 'img35.jpg', '0000-00-00 00:00:00', 6, 'ssdasdasds', 0, 2, 0.0, 85),
(26, 'Nói Với Con Về Giới Và Yêu Như Thế Nào?', 0.00, 1, 'img6.jpg', '2020-11-29 19:23:36', 9, 'dsadwdsjahdksdasdgsahdgjashgdjashgdjashgdjasgdsahdgjashdgjasdsadsadsadsadasda', 0, 7, 0.0, NULL),
(27, 'Yêu Như Thế Nào?', 0.00, 1, 'img22.jpg', '2020-11-29 19:24:11', 9, 'dsadwdsjahdksdasdgsahdgjashgdjashgdjashgdjasgdsahdgjashdgjasdsadsadsadsadasda', 0, 7, 0.0, NULL),
(28, 'Như Thế Nào?', 0.00, 1, 'img23.jpg', '2020-11-29 19:24:33', 9, 'dsadwdsjahdksdasdgsahdgjashgdjashgdjashgdjasgdsahdgjashdgjasdsadsadsadsadasda', 0, 7, 0.0, NULL),
(29, 'Người giỏi không phải là tất cả', 0.00, 1, 'img15.jpg', '2020-11-29 19:24:59', 9, 'dsadwdsjahdksdasdgsahdgjashgdjashgdjashgdjasgdsahdgjashdgjasdsadsadsadsadasda', 0, 7, 0.0, NULL),
(30, 'Người trên đảo vắng', 0.00, 1, 'img21.jpg', '2020-11-29 19:27:57', 9, 'dsadwdsjahdksdasdgsahdgjashgdjashgdjashgdjasgdsahdgjashdgjasdsadsadsadsadasda', 0, 7, 0.0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`) VALUES
(1, 'NXB hồ chí minh'),
(2, 'NXB hà nội'),
(3, 'NXB ĐH kinh tế quốc dân'),
(4, 'NXB công thương'),
(5, 'NXB văn hóa văn nghệ'),
(6, 'NXB phụ nữ'),
(7, 'NXB thanh niên'),
(8, 'NXB lao dộng'),
(9, 'NXB văn học'),
(10, 'NXB thời đại');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `phone` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0.chưa xác định 1.nam 2.nữ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `password`, `phone`, `image`, `email`, `dob`, `address`, `role`, `gender`) VALUES
(4, 'admin', '', '$2y$10$T6q.O9xMcQpHG8ZgTLDZEOoXx/jzQFnEg.0/YUhvEfEWgXf0OD/7S', '', NULL, '', '0000-00-00', '', 1, 0),
(5, 'chibaovn', 'Chi Bảo', '$2y$10$lO7.aO0qgz1rB4rzTfz4iufs0ojmYYiCJqRvIqc6FiiLDZcW8fECi', '0911706470', NULL, 'asdsa@sadas.com', '2020-10-01', 'somewhere on the Earth', 0, 1),
(752370056, 'bwcqgjxo', 'sadasdas', '$2y$10$3/6q6aputncApyEcwD6kSubC8PP/bNhRBTGXa367fIK6VsB8jwLBu', NULL, NULL, 'baonlcps09193@fpt.edu.vn', NULL, NULL, 0, 0),
(752370059, 'hoang123', 'kb', '$2y$10$TIFeHSdolsgUtl5e4tmhVeLc6iVu.4EApRAVzHfrC7nwqXrwZzm.e', NULL, NULL, 'kb@dasd.com', NULL, NULL, 0, 0),
(752370060, 'hoang123hl', 'Nguyen Le Chi Bao Fpt Polytechnic', '$2y$10$y5z/QfiL8T9e1PZYCM2kzOmCq/dKCoIaCE1TXKKnv1vo8rfhHI/Gm', NULL, NULL, 'baonlcps09193@fpt.edu.vn', NULL, NULL, 0, 0),
(752370061, 'chibao', 'Nguyen Le Chi Bao Fpt Polytechnic', '$2y$10$hwuHbLBqEyaR5SOZfRavM.zQg.C1jwDWkhNZQWwzi6W4KFr.yxhrK', NULL, NULL, 'baonlcps09193@fpt.edu.vn', NULL, NULL, 0, 0),
(752370062, 'baonlc', 'Nguyen Le Chi Bao Fpt Polytechnic', '$2y$10$53cMEepNcG4Fmc7hoC9kXucpcL5t8QA9ezI4n6BdK/FdeyeTfaVA6', NULL, NULL, 'baonlcps09193@fpt.edu.vn', NULL, NULL, 0, 0),
(752370063, 'sadasdsad', 'dasdasdas', '$2y$10$T2XUcBFe9zgZIfvMWMfkMu2mTF6dwZXmA4UFm.Y0oy7M95tzUxvuq', NULL, NULL, 'sadasdsa@asds.com', NULL, NULL, 0, 0),
(752370064, 'akashic2110', 'dasdasd', '$2y$10$Zw2bhMRAVhZwy4qP4Ag2mOtcJ6pvFeZQpSSFd40SRGATY/DkqokH6', NULL, NULL, 'email@email.com', NULL, NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_status` (`status`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ibfk_1` (`id_author`),
  ADD KEY `product_ibfk_3` (`id_publisher`),
  ADD KEY `product_ibfk_2` (`id_category`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=752370065;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
