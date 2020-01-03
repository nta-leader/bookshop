-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2020 at 04:32 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2
-- PHP Version: 7.3.13-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `work_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci,
  `guarantee` text COLLATE utf8_unicode_ci,
  `shopping_guide` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `address`, `work_time`, `phone`, `email`, `facebook`, `about`, `guarantee`, `shopping_guide`) VALUES
(1, 'dreambook', 'phuc tho - ha noi', '8h-23h', '0905110949', 'nhasachdreambooks@gmail.com', 'http://facebook.com/nsdreambook.vn', '<h2>&nbsp;</h2>\r\n\r\n<p><img alt="" src="https://ezstatic1.ezweb.online/ezweb_1829/anh-cty/banner-home-1.jpg" style="height:356px; width:1139px" /></p>\r\n\r\n<p><strong>C&ocirc;ng ty TNHH MTV X&uacute;c tiến thương mại v&agrave; C&ocirc;ng nghệ Magikarp được th&agrave;nh lập v&agrave;o năm 2016 tại th&agrave;nh phố Đ&agrave; Nẵng. Hiện nay, c&ocirc;ng ty đang dần ho&agrave;n thiện hơn v&agrave; c&oacute; th&ecirc;m những bước ph&aacute;t triển mới trong lĩnh vực chuy&ecirc;n ph&acirc;n phối vải, quần &aacute;o thời trang cao cấp c&oacute; hệ thống, ph&acirc;n phối khắp trong nước v&agrave; hướng đến xuất khẩu.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>I/ SỨ MỆNH V&Agrave; TẦM NH&Igrave;N</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Sứ mệnh</em></strong></li>\r\n</ul>\r\n\r\n<p>Sự h&agrave;i l&ograve;ng của bạn l&agrave; thước đo sự tồn tại v&agrave; ph&aacute;t triển của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p>Đem đến cho kh&aacute;ch h&agrave;ng sản phẩm chất lượng tốt, gi&aacute; cả hợp l&iacute; v&agrave; dịch vụ cạnh tranh c&ugrave;ng những c&ocirc;ng nghệ mới nhất để đem tới sự trải nghiệm mới, trọn vẹn hơn sự cầu thị của kh&aacute;ch h&agrave;ng tr&ecirc;n tất cả c&aacute;c thị trường m&agrave; c&ocirc;ng ty c&oacute; mặt.</p>\r\n\r\n<ul>\r\n	<li><strong><em>Tầm nh&igrave;n</em></strong></li>\r\n</ul>\r\n\r\n<p>Trở th&agrave;nh doanh nghiệp lớn mạnh, ph&aacute;t triển bền vững trong lĩnh vực sản xuất, cung ứng c&aacute;c sản phẩm thời trang, thực phẩm v&agrave; ti&ecirc;u d&ugrave;ng h&agrave;ng đầu Việt Nam.</p>\r\n\r\n<p><strong>II/ TRIẾT L&Yacute; KINH DOANH CỦA MAGIKARP</strong></p>\r\n\r\n<p>&ldquo; Trong bối cảnh m&agrave; x&atilde; hội thay đổi kh&ocirc;ng ngừng th&igrave; những thương hiệu tồn tại l&acirc;u d&agrave;i l&agrave; những thương hiệu được tạo dựng từ tr&iacute; tuệ v&agrave; tr&aacute;i tim &ndash; điều đ&oacute; khiến ch&uacute;ng bền vững v&agrave; ch&acirc;n thật hơn. Nền tảng của ch&uacute;ng cũng vững chắc hơn v&igrave; ch&uacute;ng được x&acirc;y dựng thương hiệu dựa tr&ecirc;n ch&iacute;nh t&acirc;m hồn của con người, kh&ocirc;ng phải từ quảng c&aacute;o. Những c&ocirc;ng ty đ&uacute;ng nghĩa l&agrave; những c&ocirc;ng ty tồn tại l&acirc;u d&agrave;i .&rdquo;</p>\r\n\r\n<p>*** &Aacute;p dụng nguy&ecirc;n tắc l&agrave;m việc &ldquo;3 KH&Ocirc;NG 1 L&Iacute; LẼ&rdquo; để đảm bảo nguy&ecirc;n tắc tồn tại dựa tr&ecirc;n sự C&Ocirc;NG BẰNG v&agrave; CAM KẾT. Giữa tập thể l&atilde;nh đạo c&ugrave;ng với to&agrave;n bộ cộng sự tạo n&ecirc;n sự ph&aacute;t triển l&acirc;u d&agrave;i bền vững</p>\r\n\r\n<p><strong>KH&Ocirc;NG CẢM T&Iacute;NH, KH&Ocirc;NG SO B&Igrave;, KH&Ocirc;NG BAO CHE</strong></p>\r\n\r\n<p><strong>CHỈ L&Iacute; LUẬN DỰA TR&Ecirc;N SỐ LIỆU THỰC TẾ</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất Lượng:</strong>&nbsp;Với phương ch&acirc;m chất lượng h&agrave;ng đầu, đạt tiến độ v&agrave; an to&agrave;n, kh&ocirc;ng ngừng đầu tư c&ocirc;ng nghệ ti&ecirc;n tiến, thiết bị ti&ecirc;n tiến v&agrave;o x&aacute;c suất v&agrave; quản l&yacute; doanh nghiệp. Xem chất lượng l&agrave; một nh&acirc;n tố ph&aacute;t triển để tăng t&iacute;nh cạnh tranh v&agrave; l&agrave; mốt yếu tố văn ho&aacute; của doanh nghiệp.<br />\r\n	&nbsp;</li>\r\n	<li><strong>Chuy&ecirc;n Nghiệp:</strong>&nbsp;X&acirc;y dựng đội ngũ c&aacute;n bộ nh&acirc;n vi&ecirc;n c&oacute; phong c&aacute;ch l&agrave;m việc chuy&ecirc;n nghiệp &ndash; s&aacute;ng tạo, gi&agrave;u nhiệt huyết, giỏi chuy&ecirc;n m&ocirc;n.<br />\r\n	&nbsp;</li>\r\n	<li><strong>Đo&agrave;n Kết:</strong>&nbsp;X&acirc;y dựng tinh thần đo&agrave;n kết, hợp t&aacute;c l&agrave;nh mạnh, sẵn s&agrave;ng chia sẻ kinh nghiệm giữa c&aacute;c đồng nghiệp, giữa l&atilde;nh đạo v&agrave; nh&acirc;n vi&ecirc;n, giữa nh&acirc;n vi&ecirc;n với c&aacute;c đối t&aacute;c.<br />\r\n	&nbsp;</li>\r\n	<li><strong>Tr&aacute;ch nhiệm x&atilde; hội:</strong>&nbsp;Cam kết đ&oacute;ng g&oacute;p cho việc ph&aacute;t triển kinh tế bền vững, n&acirc;ng cao chất lượng đời sống của c&aacute;n bộ nh&acirc;n vi&ecirc;n, chia sẻ một phần tr&aacute;ch nhiệm x&atilde; hội đối với cộng đồng tr&ecirc;n tinh thần l&aacute; l&agrave;nh đ&ugrave;m l&aacute; r&aacute;ch, tương th&acirc;n tương &aacute;i.<br />\r\n	&nbsp;</li>\r\n	<li><strong>Ph&aacute;t triển bền vững:</strong>&nbsp;Kh&ocirc;ng ngừng ph&aacute;t triển uy t&iacute;n thương hiệu, tạo sự kh&aacute;ch biệt của sản phẩm tr&ecirc;n thị trường, đ&agrave;o tạo nguồn nh&acirc;n lực chất lượng cao. Tăng trưởng v&agrave; ph&aacute;t triển ổn định gắn kết với bảo vệ t&agrave;i nguy&ecirc;n v&agrave; m&ocirc;i trường. Sự bền vững của doanh nghiệp được cấu th&agrave;nh 3 nh&acirc;n tố ch&iacute;nh: Sự Kh&aacute;c Biệt, T&iacute;nh Ph&ugrave; Hợp v&agrave; Sự Nổi Bật.</li>\r\n</ul>', '<h2 style="text-align:center"><span style="color:#d35400"><strong><em><u>ch&iacute;nh s&aacute;ch mua h&agrave;ng</u></em></strong></span></h2>', '<p style="text-align:center"><span style="color:#d35400"><strong><em><u>HƯỚNG DẪN MUA H&Agrave;NG</u></em></strong></span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `url`, `parent_id`) VALUES
(7, 'SÁCH ÔN THI', 'sach-on-thi', 0),
(8, 'VÀO LỚP 10', 'vao-lop-10', 0),
(9, 'THPT QUỐC GIA', 'thpt-quoc-gia', 0),
(10, 'THI VÀO LỚP 10', 'thi-vao-lop-10', 7),
(11, 'THPT QUỐC GIA', 'thpt-quoc-gia', 7),
(12, 'TOÁN', 'sach-on-thi-vao-lop-10-mon-toan', 10),
(14, 'HÓA', 'hoa', 10),
(15, 'TOÁN', 'toan', 11),
(16, 'LÝ', 'ly', 11),
(17, 'HÓA', 'hoa', 11),
(18, 'LUYỆN THI HSG', 'luyen-thi-hsg', 0),
(20, 'LÝ', 'on-thi-vao-lop-10-mon-ly', 10);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `id_category`, `id_product`) VALUES
(4, 12, 1),
(5, 12, 2),
(6, 12, 3),
(7, 14, 1),
(8, 14, 2),
(9, 14, 3),
(10, 8, 1),
(11, 8, 3),
(12, 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `url`, `picture`, `content`, `active`) VALUES
(2, 'Nguyễn Thế Anh', 'nguyen-the-anh', 'BWsVjzTJfpXI0PmbS4aSKgDqPLLCxJJZQm280OWN.png', '<h2>&nbsp;</h2>\r\n\r\n<p><strong>Cấm người uống rượu, bia l&aacute;i xe</strong></p>\r\n\r\n<p>Luật Ph&ograve;ng chống t&aacute;c hại của rượu, bia quy định 13 h&agrave;nh vi bị nghi&ecirc;m cấm. Trong đ&oacute;, cấm triệt để việc điều khiển phương tiện giao th&ocirc;ng khi trong m&aacute;u hoặc hơi thở c&oacute; nồng độ cồn. Bất kể người điều khiển phương tiện giao th&ocirc;ng đường bộ (&ocirc;t&ocirc;, m&aacute;y k&eacute;o, xe m&aacute;y, xe m&aacute;y điện, m&ocirc;t&ocirc;) v&agrave; phương tiện giao th&ocirc;ng th&ocirc; sơ đường bộ (xe đạp, x&iacute;ch l&ocirc;, xe lăn, xe s&uacute;c vật k&eacute;o...) đều kh&ocirc;ng được ph&eacute;p uống rượu, bia khi lưu th&ocirc;ng tr&ecirc;n đường. Quy định n&agrave;y kh&aacute;c với ph&aacute;p luật hiện h&agrave;nh, cho ph&eacute;p người điều khiển phương tiện được l&aacute;i xe với nồng độ cồn dưới ngưỡng cho ph&eacute;p.</p>\r\n\r\n<p>Một điểm mới đ&aacute;ng lưu &yacute; l&agrave; tại Luật Ph&ograve;ng chống t&aacute;c hại của rượu, bia đ&oacute; l&agrave; quy định cấm x&uacute;i giục, k&iacute;ch động, l&ocirc;i k&eacute;o, &eacute;p buộc người kh&aacute;c uống rượu, bia. B&ecirc;n cạnh đ&oacute;, ngo&agrave;i c&aacute;c địa điểm cấm theo điều 10 được quy định trong luật, Bộ Y tế tiếp tục đề xuất c&aacute;c địa điểm c&ocirc;ng cộng kh&ocirc;ng được uống rượu, bia gồm: c&ocirc;ng vi&ecirc;n; trạm dừng nghỉ tr&ecirc;n đường cao tốc, nh&agrave; chờ xe bu&yacute;t; rạp chiếu phim, nh&agrave; h&aacute;t; s&acirc;n vận động, nh&agrave; thi đấu thể thao.</p>\r\n\r\n<p><img alt="Ép người khác nhậu, xử lý cách nào? - 1" src="https://cdn.24h.com.vn/upload/4-2019/images/2019-12-31/1577760502-55b05a430a4e83cca46bb2b8e0ae1d8d.jpg" style="width:660px" /></p>\r\n\r\n<p>Luật Ph&ograve;ng chống t&aacute;c hại của rượu, bia kỳ vọng thay đổi dần th&oacute;i quen sử dụng rượu, bia của người Việt Ảnh: Ho&agrave;ng Triều</p>\r\n\r\n<p>Nguy&ecirc;n Bộ trưởng Bộ Y tế Nguyễn Thị Kim Tiến cho biết, Việt Nam thuộc nh&oacute;m quốc gia c&oacute; tỉ lệ nam giới uống rượu, bia cao nhất thế giới v&agrave; c&oacute; xu hướng gia tăng. Nếu như năm 2010, c&oacute; 70% nam v&agrave; 6% nữ giới tr&ecirc;n 15 tuổi c&oacute; uống rượu, bia trong 30 ng&agrave;y th&igrave; sau 5 năm tỉ lệ n&agrave;y tăng l&ecirc;n tương ứng l&agrave; 80,3% v&agrave; 11,6%. Đặc biệt, t&igrave;nh trạng sử dụng rượu, bia trong lứa tuổi thanh thiếu ni&ecirc;n ng&agrave;y c&agrave;ng diễn ra nghi&ecirc;m trọng.</p>\r\n\r\n<p>Theo nguy&ecirc;n Bộ trưởng Bộ Y tế, đ&acirc;y l&agrave; lần đầu ti&ecirc;n Việt Nam c&oacute; một luật điều chỉnh đầy đủ, ho&agrave;n chỉnh đối với vấn đề ph&ograve;ng chống t&aacute;c hại của rượu, bia. Nhưng đ&acirc;y cũng l&agrave; đạo luật kh&oacute; thực hiện do li&ecirc;n quan đến th&oacute;i quen, h&agrave;nh vi ti&ecirc;u d&ugrave;ng của người d&acirc;n. V&igrave; vậy, để luật n&agrave;y đi v&agrave;o cuộc sống, bảo đảm t&iacute;nh khả thi v&agrave; hiệu quả th&igrave; c&ocirc;ng t&aacute;c tuy&ecirc;n truyền, phổ biến, triển khai luật l&agrave; rất quan trọng. &quot;Kh&ocirc;ng phải ai cũng nhận thức được t&aacute;c hại của rượu, bia với sức khỏe. Nhiều vụ tai nạn giao th&ocirc;ng xảy ra li&ecirc;n quan nhiều đến sử dụng qu&aacute; mức rượu, bia. Ngo&agrave;i ra, t&aacute;c hại của rượu, bia c&ograve;n l&agrave; g&acirc;y c&aacute;c bệnh kh&ocirc;ng l&acirc;y nhiễm như ung thư, tim mạch... Do đ&oacute;, mấu chốt l&agrave; phải l&agrave;m thế n&agrave;o để người d&acirc;n thay đổi th&oacute;i quen, hiểu rằng lạm dụng rượu, bia rất hại sức khỏe&quot; - b&agrave; Tiến n&oacute;i.</p>\r\n\r\n<p><strong>Chờ văn bản hướng dẫn luật</strong></p>\r\n\r\n<p>Nh&igrave;n nhận việc đưa luật v&agrave;o hiện thực cuộc sống sẽ c&oacute; nhiều kh&oacute; khăn, b&agrave; Trần Thị Trang - Ph&oacute; Vụ trưởng Vụ Ph&aacute;p chế (Bộ Y tế), th&agrave;nh vi&ecirc;n tổ soạn thảo Luật Ph&ograve;ng chống t&aacute;c hại của rượu, bia - cho rằng kh&oacute; khăn n&agrave;y nằm ở t&iacute;nh sẵn c&oacute;, dễ tiếp cận của c&aacute;c sản phẩm rượu, bia; th&oacute;i quen ti&ecirc;u d&ugrave;ng, tỉ lệ người d&ugrave;ng rượu, bia vẫn rất cao.</p>\r\n\r\n<p>Đối với việc cấm x&uacute;i giục, k&iacute;ch động, l&ocirc;i k&eacute;o, &eacute;p buộc người kh&aacute;c uống rượu, bia, b&agrave; Trang nh&igrave;n nhận đ&acirc;y l&agrave; một quy định kh&ocirc;ng c&oacute; được những chế t&agrave;i mạnh để thực hiện bổ trợ, m&agrave; đ&ograve;i hỏi nhiều về &yacute; thức v&agrave; truyền th&ocirc;ng, v&iacute; dụ như thường xuy&ecirc;n l&ecirc;n &aacute;n, ch&ecirc; những h&agrave;nh vi như thế th&igrave; dần dần người vi phạm sẽ nh&igrave;n nhận vấn đề kh&aacute;c đi. Ngo&agrave;i ra, với đặc điểm của một quốc gia c&oacute; lượng xe m&aacute;y rất cao như Việt Nam th&igrave; việc thực hiện gi&aacute;m s&aacute;t vi phạm nồng độ cồn l&agrave; kh&ocirc;ng dễ d&agrave;ng.</p>\r\n\r\n<p>Nhiều chuy&ecirc;n gia cũng cho rằng để luật kh&ocirc;ng &quot;nằm tr&ecirc;n giấy&quot;, việc đầu ti&ecirc;n l&agrave; phải tuy&ecirc;n truyền, vận động để mọi người d&acirc;n hiểu được, nắm được &yacute; nghĩa nh&acirc;n văn của luật chứ kh&ocirc;ng đơn thuần l&agrave; cấm v&agrave; xử phạt &quot;ma men&quot;. Đặc biệt, chỉ c&ograve;n 1 ng&agrave;y nữa Luật Ph&ograve;ng chống t&aacute;c hại của rượu, bia c&oacute; hiệu lực thi h&agrave;nh nhưng quy định về xử phạt đối với c&aacute;c h&agrave;nh vi &eacute;p buộc, l&ocirc;i k&eacute;o, k&iacute;ch động người kh&aacute;c uống rượu, bia chưa c&oacute; hướng dẫn cụ thể. Do vậy, Ch&iacute;nh phủ, c&aacute;c bộ - ng&agrave;nh li&ecirc;n quan phải nhanh ch&oacute;ng ban h&agrave;nh c&aacute;c văn bản hướng dẫn luật để tr&aacute;nh vướng mắc khi thực hiện. Chẳng hạn, tại c&aacute;c quy định hiện h&agrave;nh chưa c&oacute; quy định xử phạt người đi xe đạp sau khi uống rượu, bia, trong khi theo Luật Ph&ograve;ng chống t&aacute;c hại rượu, bia th&igrave; mọi trường hợp l&aacute;i xe sau khi uống rượu, bia chỉ cần trong hơi thở hoặc trong m&aacute;u c&oacute; nồng độ cồn l&agrave; phạm luật. B&ecirc;n cạnh đ&oacute;, nhiều &yacute; kiến cũng đặt ra nhiều băn khoăn: Căn cứ v&agrave;o đ&acirc;u để chứng minh bị l&ocirc;i k&eacute;o, &eacute;p buộc uống rượu bia? Việc nhắn tin, gọi điện thoại, mời mọc bạn đi nhậu c&oacute; vi phạm luật?...</p>\r\n\r\n<p>Về những băn khoăn n&agrave;y, &ocirc;ng Khuất Việt H&ugrave;ng, Ph&oacute; Chủ tịch chuy&ecirc;n tr&aacute;ch Ủy ban An to&agrave;n giao th&ocirc;ng (ATGT) quốc gia, cho rằng c&oacute; nhiều quy định khi ban h&agrave;nh, ai cũng n&oacute;i kh&oacute; thực hiện nhưng ch&uacute;ng ta vẫn thực hiện được. Trước đ&acirc;y, nhiều người n&oacute;i h&agrave;nh vi sử dụng điện thoại khi điều khiển phương tiện rất kh&oacute; ph&aacute;t hiện v&agrave; xử l&yacute; nhưng nhờ hệ thống camera gi&aacute;m s&aacute;t, h&igrave;nh ảnh người d&acirc;n cung cấp n&ecirc;n thực hiện được việc xử phạt. Việc &eacute;p nhau uống rượu, bia cũng sẽ tương tự như thế. Trong nh&oacute;m uống rượu sẽ c&oacute; người bị &eacute;p phản ứng bằng c&aacute;ch ghi h&igrave;nh ảnh đưa l&ecirc;n mạng x&atilde; hội, hay hệ thống camera gi&aacute;m s&aacute;t của nh&agrave; h&agrave;ng l&agrave;m bằng chứng để xử phạt...</p>\r\n\r\n<p>Đối với việc ban h&agrave;nh văn bản hướng dẫn luật, &ocirc;ng H&ugrave;ng th&ocirc;ng tin: &quot;Bộ Giao th&ocirc;ng Vận tải đang tiến h&agrave;nh sửa đổi Nghị định 46/2016/NĐ-CP của Ch&iacute;nh phủ ban h&agrave;nh ng&agrave;y 26-5-2016, quy định xử phạt vi phạm h&agrave;nh ch&iacute;nh trong lĩnh vực giao th&ocirc;ng đường bộ, đường sắt. Bước đầu kết quả lấy &yacute; kiến của c&aacute;c th&agrave;nh vi&ecirc;n Ch&iacute;nh phủ nhận được sự đồng thuận với những thay đổi chặt chẽ hơn, trong đ&oacute; mức xử phạt tối đa vi phạm nồng độ cồn với người đi xe đạp, xe th&ocirc; sơ l&agrave; 600.000 đồng, đi m&ocirc;t&ocirc;, xe m&aacute;y l&agrave; 8 triệu đồng, người đi &ocirc;t&ocirc; l&ecirc;n tới 40 triệu đồng&quot;.</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_form`
--

CREATE TABLE `order_form` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product` text COLLATE utf8_unicode_ci NOT NULL,
  `waybill_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_form`
--

INSERT INTO `order_form` (`id`, `date`, `name`, `phone`, `address`, `product`, `waybill_code`, `active`) VALUES
(7, '2020-01-02 12:11:05', 'Nguyễn Thế Anh', '0919419496', 'Da Nang', '[{"id_product":"4","quantity":1,"name":"Luy\\u1ec7n thi m\\u00f4n sinh","picture":"A0nz2ECbiaR2AcWmD1QwpOUAZGhIE76z9sPEdXo5.jpeg","price":65000}]', 'Theanh96', 2),
(8, '2020-01-02 15:56:14', 'Nguyễn Thế Anh', '0919419496', '5', '[{"id_product":"2","quantity":1,"name":"Luy\\u1ec7n thi m\\u00f4n l\\u00fd","picture":"gUQtHFFTpqERTcDhuMWi0WPy1AcA83fZCxvY6Jxe.jpeg","price":49000}]', NULL, 2),
(9, '2020-01-02 15:56:49', 'Nguyen Tuan Diep', '0919419496', '5', '[{"id_product":"4","quantity":1,"name":"Luy\\u1ec7n thi m\\u00f4n sinh","picture":"A0nz2ECbiaR2AcWmD1QwpOUAZGhIE76z9sPEdXo5.jpeg","price":65000},{"id_product":"2","quantity":"1","name":"Luy\\u1ec7n thi m\\u00f4n l\\u00fd","picture":"gUQtHFFTpqERTcDhuMWi0WPy1AcA83fZCxvY6Jxe.jpeg","price":49000}]', NULL, 1),
(10, '2020-01-02 15:57:50', 'Nguyen Tuan Diep', '0919419496', '566666', '[{"id_product":"2","quantity":1,"name":"Luy\\u1ec7n thi m\\u00f4n l\\u00fd","picture":"gUQtHFFTpqERTcDhuMWi0WPy1AcA83fZCxvY6Jxe.jpeg","price":49000}]', 'vnasdasdasd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_sale` int(11) NOT NULL,
  `product_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `evaluate` int(1) NOT NULL,
  `preview` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `basis_price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `link_document` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_sale`, `product_code`, `name`, `url`, `picture`, `evaluate`, `preview`, `content`, `basis_price`, `link_document`, `active`) VALUES
(1, 0, 'LTMT', 'Luyện thi môn toán', 'luyen-thi-mon-toan', 'D83b3eCGrIUWoi2GwtoqboUUcCs6ESxGZ1F5xcgk.jpeg', 5, 'Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etdoloreat magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laborisi nisi ut aliquip ex ea commodo consequat aute.\n\nArure dolor in reprehenderit in voluptate velit esse cillum dolore fugiat nulla aetur excepteur sint occaecat cupidatat non proident, sunt in culpa quistan officia serunt mollit anim id est laborum sed ut perspiciatis unde omnis iste natus...', '<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenden voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<ul>\r\n	<li>Sed do eiusmod tempor incididunt ut labore et dolore</li>\r\n	<li>Magna aliqua enim ad minim veniam</li>\r\n	<li>Quis nostrud exercitation ullamco laboris nisi ut</li>\r\n	<li>Aliquip ex ea commodo consequat aute dolor reprehenderit</li>\r\n	<li>Voluptate velit esse cillum dolore eu fugiat nulla pariatur</li>\r\n	<li>Magna aliqua enim ad minim veniam</li>\r\n	<li>Quis nostrud exercitation ullamco laboris nisi ut</li>\r\n</ul>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam remmata aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enimsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos quistatoa.</p>', '98000', '#', 1),
(2, 1, 'LTML', 'Luyện thi môn lý', 'luyen-thi-mon-ly', 'gUQtHFFTpqERTcDhuMWi0WPy1AcA83fZCxvY6Jxe.jpeg', 5, 'Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etdoloreat magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laborisi nisi ut aliquip ex ea commodo consequat aute.\n\nArure dolor in reprehenderit in voluptate velit esse cillum dolore fugiat nulla aetur excepteur sint occaecat cupidatat non proident, sunt in culpa quistan officia serunt mollit anim id est laborum sed ut perspiciatis unde omnis iste natus...', '<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenden voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p><img alt="image description" src="http://book.nta/images/placeholdervtwo.jpg" /></p>\r\n\r\n<ul>\r\n	<li>Sed do eiusmod tempor incididunt ut labore et dolore</li>\r\n	<li>Magna aliqua enim ad minim veniam</li>\r\n	<li>Quis nostrud exercitation ullamco laboris nisi ut</li>\r\n	<li>Aliquip ex ea commodo consequat aute dolor reprehenderit</li>\r\n	<li>Voluptate velit esse cillum dolore eu fugiat nulla pariatur</li>\r\n	<li>Magna aliqua enim ad minim veniam</li>\r\n	<li>Quis nostrud exercitation ullamco laboris nisi ut</li>\r\n</ul>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam remmata aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enimsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos quistatoa.</p>', '98000', '#', 1),
(3, 1, 'LTMH', 'Luyện thi môn hóa', 'luyen-thi-mon-hoa', '6P6GNymMoxtpUGtbs9pMNIIBwFWl9FhSUNrj6aXK.jpeg', 5, 'Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etdoloreat magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laborisi nisi ut aliquip ex ea commodo consequat aute.\n\nArure dolor in reprehenderit in voluptate velit esse cillum dolore fugiat nulla aetur excepteur sint occaecat cupidatat non proident, sunt in culpa quistan officia serunt mollit anim id est laborum sed ut perspiciatis unde omnis iste natus...', '<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenden voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<ul>\r\n	<li>Sed do eiusmod tempor incididunt ut labore et dolore</li>\r\n	<li>Magna aliqua enim ad minim veniam</li>\r\n	<li>Quis nostrud exercitation ullamco laboris nisi ut</li>\r\n	<li>Aliquip ex ea commodo consequat aute dolor reprehenderit</li>\r\n	<li>Voluptate velit esse cillum dolore eu fugiat nulla pariatur</li>\r\n	<li>Magna aliqua enim ad minim veniam</li>\r\n	<li>Quis nostrud exercitation ullamco laboris nisi ut</li>\r\n</ul>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam remmata aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enimsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos quistatoa.</p>', '98000', '#', 1),
(4, 0, 'MSAT22123', 'Luyện thi môn sinh', 'luyen-thi-mon-sinh', 'A0nz2ECbiaR2AcWmD1QwpOUAZGhIE76z9sPEdXo5.jpeg', 4, '123', '<p>123</p>', '65000', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent` int(3) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `name`, `url`, `percent`, `picture`) VALUES
(0, 'Mặc định', 'mac-dinh', 0, 'mac-dinh.jpg'),
(1, 'Chương trình tri ân khách hàng BIG SALE 50%', 'big-sale', 50, 'tk7HHqMIVENZ0yQLmiHLFOCizgF4zJZjwnNYYkh2.jpeg'),
(2, 'Nhân dịp cuối năm mừng tuổi khách hàng SALE 70%', '70', 70, 'GQec8eaq46G3b6fyLrJeT23nUvzar4ndEJzrREb5.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$6n6UB/3tnq47Yk/YMuEJJuNiZAmfN3Raa.6R7uMUBUMValljECFGy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_form`
--
ALTER TABLE `order_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_form`
--
ALTER TABLE `order_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
