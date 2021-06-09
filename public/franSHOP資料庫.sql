-- --------------------------------------------------------
-- 主機:                           localhost
-- 伺服器版本:                        5.7.24 - MySQL Community Server (GPL)
-- 伺服器操作系統:                      Win64
-- HeidiSQL 版本:                  10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;



INSERT INTO `categories` (`id`, `str_id`, `category_order`, `name`,`created_at`, `updated_at`, `timestamp`) VALUES
	(1, 'AB', 7, '上衣類', '2021-05-11 18:42:01', '2021-09-11 18:42:01', '2021-05-11 18:42:01'),
	(2, 'AD', 25, '外套類', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(3, 'AC', 16, '下身類', '2021-05-11 18:42:01', '2021-09-11 17:36:48', '2021-05-11 18:42:01'),
	(4, 'AA', 1, '洋裝', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(5, 'ABBD', 15, '聯名印花T', '2021-05-11 18:42:01', '2021-09-11 14:48:14', '2021-05-11 18:42:01'),
	(6, 'ABAD', 11, '棉質短袖', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(7, 'ABBB', 13, 'POLO系列', '2021-05-11 18:42:01', '2021-09-11 15:16:19', '2021-05-11 18:42:01'),
	(8, 'ABBC', 14, '莫代爾STYLE', '2021-05-11 18:42:01', '2021-09-15 10:45:01', '2021-05-11 18:42:01'),
	(9, 'ABAB', 9, '條紋系列', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(10, 'ABBA', 12, '五/七分袖', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(11, 'ABAC', 10, '長版上衣', '2021-05-11 18:42:01', '2021-09-11 13:22:34', '2021-05-11 18:42:01'),
	(12, 'ABAA', 8, '針織衫', '2021-05-11 18:42:01', '2021-09-11 17:38:38', '2021-05-11 18:42:01'),
	(13, 'ADAD', 29, '抗UV系列', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(14, 'ADAA', 26, '風衣', '2021-05-11 18:42:01', '2021-09-11 15:13:50', '2021-05-11 18:42:01'),
	(15, 'ADAB', 27, '休閒外套', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(16, 'ADAC', 28, '針織外套', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(17, 'ACAA', 17, '短褲', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(18, 'ACBA', 21, '牛仔褲', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(19, 'ACAB', 18, '寬褲', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(20, 'ACBB', 22, '運動褲', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(21, 'ACBC', 23, '緊身褲', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(22, 'ACBD', 24, '七/九分褲', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(23, 'ACAD', 20, '紗裙', '2021-05-11 18:42:01', '2021-09-11 15:54:14', '2021-05-11 18:42:01'),
	(24, 'AAAA', 2, '無袖洋裝', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(25, 'AABA', 6, '短袖洋裝', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01'),
	(26, 'AAAB', 3, '七分/長袖洋裝', '2021-05-11 18:42:01', '2021-09-11 15:34:19', '2021-05-11 18:42:01'),
	(27, 'ACAC', 19, '短裙', '2021-05-11 18:42:01', '2021-09-11 15:00:02', '2021-05-11 18:42:01'),
	(29, 'AAAC', 4, '氣質洋裝', '2021-09-15 11:01:45', NULL, '2021-09-15 11:01:45'),
	(30, 'AAAD', 5, '韓風洋裝', '2021-09-15 11:06:14', NULL, '2021-09-15 11:06:14');



INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `sale_price`, `qty`, `deleted_at`, `created_at`, `updated_at`, `timestamp`) VALUES
	('U7iLfOd0od', '8', '莫代爾V領上衣-女', '<p><img alt="" src="/pictures/files/model1.jpg" style="height:910px; width:760px" /><img alt="" src="/pictures/files/model2.jpg" style="height:910px; width:760px" /><img alt="" src="/pictures/files/model3.jpg" style="height:910px; width:760px" /><img alt="" src="/pictures/files/model4.jpg" style="height:869px; width:760px" /></p>', 299, 266, 30,null, '2021-09-24 11:24:34', '2021-09-24 15:07:29', '2021-09-24 15:07:29'),
	('vshOry5xdL', '30', '兩件式雪紡印花洋裝-女', '<p><img alt="" src="/pictures/files/4695301_green.jpg" style="height:910px; width:760px" /></p>\r\n\r\n<p><img alt="" src="/pictures/files/46953_D_11.jpg" style="height:980px; width:760px" /></p>\r\n\r\n<p><img alt="" src="/pictures/files/46953_D_13.jpg" style="height:780px; width:760px" /></p>\r\n\r\n<p><img alt="" src="/pictures/files/46953_D_12.jpg" style="height:1060px; width:760px" /></p>', 890, 690, 12,null, '2021-09-24 15:49:13', NULL, '2021-09-24 15:49:13'),
	('p3dFNdntUv', '30', '厚雪紡短袖洋裝-女', '<p><img alt="" src="/pictures/files/landdress1.jpg" style="height:910px; width:760px" /><img alt="" src="/pictures/files/landdress2.jpg" style="height:910px; width:760px" /><img alt="" src="/pictures/files/landdress3.jpg" style="height:780px; width:760px" /></p>', 690, 399,50, null, '2021-09-24 11:28:32', '2021-09-24 15:11:41', '2021-09-24 15:11:41'),
	('yjEj4wKN70', '23', '高腰雪紡細褶裙-女', '<p><img alt="" src="/pictures/files/longskirt1.jpg" style="height:910px; width:760px" /><img alt="" src="/pictures/files/longskirt2.jpg" style="height:910px; width:760px" /><img alt="" src="/pictures/files/longskirt3.jpg" style="height:1175px; width:760px" /><img alt="" src="/pictures/files/longskirt4.jpg" style="height:780px; width:760px" /><img alt="" src="/pictures/files/longskirt5.jpg" style="height:780px; width:760px" /></p>', 490, 330, 100,null, '2021-09-24 11:33:11', '2021-09-24 15:24:16', '2021-09-24 15:24:16'),
	('sSeI6QexxL', '30', '燈芯絨襯衫式洋裝-女', '<p><img alt="" src="/pictures/files/50750_D_11.jpg" style="height:910px; width:760px" /></p>\r\n\r\n<p><img alt="" src="/pictures/files/50750_D_16.jpg" style="height:780px; width:760px" /></p>\r\n\r\n<p><img alt="" src="/pictures/files/50750_D_12.jpg" style="height:810px; width:760px" /></p>\r\n\r\n<p><img alt="" src="/pictures/files/50750_D_13.jpg" style="height:760px; width:760px" /></p>', 690, 690, 17,null, '2021-09-24 15:38:14', NULL, '2021-09-24 15:38:14'),
	('iJ0sMwofNQ', '30', '絲光V領長洋裝-女', '<p><img alt="" src="/pictures/files/4696501_D_01.jpg" style="height:910px; width:760px" /><img alt="" src="/pictures/files/4696501_D_02.jpg" style="height:910px; width:760px" /><img alt="" src="/pictures/files/46965_D_11.jpg" style="height:920px; width:760px" /><img alt="" src="/pictures/files/46965_D_12.jpg" style="height:780px; width:760px" /></p>', 790, 590,25, null, '2021-09-24 14:32:41', '2021-09-24 14:37:06', '2021-09-24 14:37:06'),
	('Kodt0U80A9', '30', '法蘭絨格紋洋裝-女', '<p><img alt="" src="/pictures/files/43541_D_52SP.jpg" style="height:970px; width:760px" /></p>\r\n\r\n<p><img alt="" src="/pictures/files/C_TW.jpg" style="height:1000px; width:760px" /></p>\r\n\r\n<p><img alt="" src="/pictures/files/43541_D_12SP.jpg" style="height:965px; width:760px" /></p>\r\n\r\n<p><img alt="" src="/pictures/files/__thumbs/43541_D_16SP.jpg/43541_D_16SP__585x600.jpg" style="height:600px; width:585px" /></p>', 690, 650, 68,null, '2021-09-24 18:35:18', NULL, '2021-09-24 18:35:18');



INSERT INTO `patterns` (`id`, `name`, `img_path`, `created_at`, `updated_at`, `timestamp`, `status`) VALUES
	(1, '黑色', '/pictures/black.jpg', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01', 1),
	(2, '白色', '/pictures/white.jpg', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01', 1),
	(3, '藍色', '/pictures/blue.jpg', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01', 1),
	(4, '紅色', '/pictures/red.jpg', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01', 1),
	(5, '黃色', '/pictures/yellow.jpg', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01', 1),
	(6, '粉色', '/pictures/pink.jpg', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01', 1),
	(7, '綠色', '/pictures/green.jpg', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01', 1),
	(8, '橘色', '/pictures/orange.jpg', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01', 1),
	(9, '灰色', '/pictures/gray.jpg', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01', 1),
	(10, '咖啡色', '/pictures/brown.jpg', '2021-05-11 18:42:01', NULL, '2021-05-11 18:42:01', 1);



INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`, `timestamp`, `status`) VALUES
	(1, 'S', '2021-05-11 15:37:06', NULL, '2021-05-11 15:37:06', 1),
	(2, 'M', '2021-05-11 15:37:06', NULL, '2021-05-11 15:37:06', 1),
	(3, 'L', '2021-05-11 15:37:06', NULL, '2021-05-11 15:37:06', 1),
	(4, 'XL', '2021-05-11 15:37:06', NULL, '2021-05-11 15:37:06', 1);



/*!因為有用到一些FK的關係，和FK有關的表的資料須先INSERT*/
INSERT INTO `photos` (`id`, `product_id`, `pattern_id`, `photo_path`, `created_at`, `updated_at`, `timestamp`, `photo_size`) VALUES
	(19, 'iJ0sMwofNQ', '3', '/pictures/091437064124696502_500.jpg', '2021-05-11 14:37:06', '2021-05-11 14:37:06', '2021-05-11 14:37:06', 21364),
	(18, 'iJ0sMwofNQ', '10', '/pictures/091437064814696501_500.jpg', '2021-05-11 14:37:06', '2021-05-11 14:37:06', '2021-05-11 14:37:06', 25861),
	(13, 'p3dFNdntUv', '7', '/pictures/09140833183(2).jpg', '2021-05-11 14:08:33', '2021-05-11 14:08:33', '2021-05-11 14:08:33', 21285),
	(12, 'p3dFNdntUv', '8', '/pictures/09140833339(1).jpg', '2021-05-11 14:08:33', '2021-05-11 14:08:33', '2021-05-11 14:08:33', 52293),
	(17, 'yjEj4wKN70', '2', '/pictures/09141033111(2).jpg', '2021-05-11 14:10:33', '2021-05-11 14:10:33', '2021-05-11 14:10:33', 22606),
	(16, 'yjEj4wKN70', '6', '/pictures/09141033702(1).jpg', '2021-05-11 14:10:33', '2021-05-11 14:10:33', '2021-05-11 14:10:33', 28395),
	(15, 'U7iLfOd0od', '3', '/pictures/09141013640(2).jpg', '2021-05-11 14:10:13', '2021-05-11 14:10:13', '2021-05-11 14:10:13', 24993),
	(14, 'U7iLfOd0od', '6', '/pictures/09141013157(1).jpg', '2021-05-11 14:10:13', '2021-05-11 14:10:13', '2021-05-11 14:10:13', 25842),
	(20, 'sSeI6QexxL', '3', '/pictures/0915381491750750B.jpg', '2021-05-11 15:38:14', '2021-05-11 15:38:14', '2021-05-11 15:38:14', 44878),
	(21, 'sSeI6QexxL', '10', '/pictures/010915381435850750D.jpg', '2021-05-11 15:38:14', '2021-05-11 15:38:14', '2021-05-11 15:38:14', 50707),
	(22, 'sSeI6QexxL', '2', '/pictures/0915381438750750W.jpg', '2021-05-11 15:38:14', '2021-05-11 15:38:14', '2021-05-11 15:38:14', 43952),
	(23, 'vshOry5xdL', '7', '/pictures/091549132084695301_D_01.jpg', '2021-05-11 15:49:13', '2021-05-11 15:49:13', '2021-05-11 15:49:13', 68711),
	(24, 'vshOry5xdL', '3', '/pictures/091549137394695302_blue.jpg', '2021-05-11 15:49:13', '2021-05-11 15:49:13', '2021-05-11 15:49:13', 32865),
	(25, 'Kodt0U80A9', '4', '/pictures/0918351876143541_D_53SP.jpg', '2021-05-11 18:35:18', '2021-05-11 18:35:18', '2021-05-11 18:35:18', 70196),
	(26, 'Kodt0U80A9', '7', '/pictures/091835181494354102_500.jpg', '2021-05-11 18:35:18', '2021-05-11 18:35:18', '2021-05-11 18:35:18', 26656);



INSERT INTO `stocks` (`pattern_id`, `size_id`, `created_at`, `updated_at`, `timestamp`, `product_id`, `id`, `quantity`) VALUES
	('6', '2', '2021-05-09 15:24:16', NULL, '2021-05-09 15:24:16', 'yjEj4wKN70', 'yjEj4wKN7062', 0),
	('2', '3', '2021-05-09 15:24:16', NULL, '2021-05-09 15:24:16', 'yjEj4wKN70', 'yjEj4wKN7023', 0),
	('6', '3', '2021-05-09 15:24:16', NULL, '2021-05-09 15:24:16', 'yjEj4wKN70', 'yjEj4wKN7063', 0),
	('2', '2', '2021-05-09 15:24:16', NULL, '2021-05-09 15:24:16', 'yjEj4wKN70', 'yjEj4wKN7022', 0),
	('8', '4', '2021-05-09 15:11:41', NULL, '2021-05-09 15:11:41', 'p3dFNdntUv', 'p3dFNdntUv84', 0),
	('8', '3', '2021-05-09 15:11:41', NULL, '2021-05-09 15:11:41', 'p3dFNdntUv', 'p3dFNdntUv83', 0),
	('7', '4', '2021-05-09 15:11:41', NULL, '2021-05-09 15:11:41', 'p3dFNdntUv', 'p3dFNdntUv74', 0),
	('7', '3', '2021-05-09 15:11:41', NULL, '2021-05-09 15:11:41', 'p3dFNdntUv', 'p3dFNdntUv73', 0),
	('1', '4', '2021-05-09 15:11:41', NULL, '2021-05-09 15:11:41', 'p3dFNdntUv', 'p3dFNdntUv14', 0),
	('1', '3', '2021-05-09 15:11:41', NULL, '2021-05-09 15:11:41', 'p3dFNdntUv', 'p3dFNdntUv13', 0),
	('6', '2', '2021-05-09 15:07:29', NULL, '2021-05-09 15:07:29', 'U7iLfOd0od', 'U7iLfOd0od62', 0),
	('6', '1', '2021-05-09 15:07:29', NULL, '2021-05-09 15:07:29', 'U7iLfOd0od', 'U7iLfOd0od61', 0),
	('3', '2', '2021-05-09 15:07:29', NULL, '2021-05-09 15:07:29', 'U7iLfOd0od', 'U7iLfOd0od32', 0),
	('3', '1', '2021-05-09 15:07:29', NULL, '2021-05-09 15:07:29', 'U7iLfOd0od', 'U7iLfOd0od31', 0),
	('3', '1', '2021-05-09 14:37:06', NULL, '2021-05-09 14:37:06', 'iJ0sMwofNQ', 'iJ0sMwofNQ31', 0),
	('3', '2', '2021-05-09 14:37:06', NULL, '2021-05-09 14:37:06', 'iJ0sMwofNQ', 'iJ0sMwofNQ32', 0),
	('10', '1', '2021-05-09 14:37:06', NULL, '2021-05-09 14:37:06', 'iJ0sMwofNQ', 'iJ0sMwofNQ101', 0),
	('10', '2', '2021-05-09 14:37:06', NULL, '2021-05-09 14:37:06', 'iJ0sMwofNQ', 'iJ0sMwofNQ102', 0),
	('2', '1', '2021-05-09 15:38:14', NULL, '2021-05-09 15:38:14', 'sSeI6QexxL', 'sSeI6QexxL21', 10),
	('2', '2', '2021-05-09 15:38:14', NULL, '2021-05-09 15:38:14', 'sSeI6QexxL', 'sSeI6QexxL22', 10),
	('2', '3', '2021-05-09 15:38:14', NULL, '2021-05-09 15:38:14', 'sSeI6QexxL', 'sSeI6QexxL23', 10),
	('3', '1', '2021-05-09 15:38:14', NULL, '2021-05-09 15:38:14', 'sSeI6QexxL', 'sSeI6QexxL31', 10),
	('3', '2', '2021-05-09 15:38:14', NULL, '2021-05-09 15:38:14', 'sSeI6QexxL', 'sSeI6QexxL32', 10),
	('3', '3', '2021-05-09 15:38:14', NULL, '2021-05-09 15:38:14', 'sSeI6QexxL', 'sSeI6QexxL33', 10),
	('10', '1', '2021-05-09 15:38:14', NULL, '2021-05-09 15:38:14', 'sSeI6QexxL', 'sSeI6QexxL101', 10),
	('10', '2', '2021-05-09 15:38:14', NULL, '2021-05-09 15:38:14', 'sSeI6QexxL', 'sSeI6QexxL102', 10),
	('10', '3', '2021-05-09 15:38:14', NULL, '2021-05-09 15:38:14', 'sSeI6QexxL', 'sSeI6QexxL103', 10),
	('3', '1', '2021-05-09 15:49:13', NULL, '2021-05-09 15:49:13', 'vshOry5xdL', 'vshOry5xdL31', 10),
	('3', '2', '2021-05-09 15:49:13', NULL, '2021-05-09 15:49:13', 'vshOry5xdL', 'vshOry5xdL32', 10),
	('3', '3', '2021-05-09 15:49:13', NULL, '2021-05-09 15:49:13', 'vshOry5xdL', 'vshOry5xdL33', 10),
	('3', '4', '2021-05-09 15:49:13', NULL, '2021-05-09 15:49:13', 'vshOry5xdL', 'vshOry5xdL34', 10),
	('7', '1', '2021-05-09 15:49:13', NULL, '2021-05-09 15:49:13', 'vshOry5xdL', 'vshOry5xdL71', 10),
	('7', '2', '2021-05-09 15:49:13', NULL, '2021-05-09 15:49:13', 'vshOry5xdL', 'vshOry5xdL72', 10),
	('7', '3', '2021-05-09 15:49:13', NULL, '2021-05-09 15:49:13', 'vshOry5xdL', 'vshOry5xdL73', 10),
	('7', '4', '2021-05-09 15:49:13', NULL, '2021-05-09 15:49:13', 'vshOry5xdL', 'vshOry5xdL74', 10),
	('4', '2', '2021-05-09 18:35:18', NULL, '2021-05-09 15:49:13', 'Kodt0U80A9', 'Kodt0U80A942', 10),
	('4', '4', '2021-05-09 18:35:18', NULL, '2021-05-09 15:49:13', 'Kodt0U80A9', 'Kodt0U80A944', 10),
	('7', '2', '2021-05-09 18:35:18', NULL, '2021-05-09 15:49:13', 'Kodt0U80A9', 'Kodt0U80A972', 10),
	('7', '4', '2021-05-09 18:35:18', NULL, '2021-05-09 15:49:13', 'Kodt0U80A9', 'Kodt0U80A974', 10);



UPDATE franshop.categories SET father_id = 4 WHERE id IN (24,25,26,29,30);
UPDATE franshop.categories SET father_id = 1 WHERE id IN (5,6,7,8,9,10,11,12);
UPDATE franshop.categories SET father_id = 3 WHERE id IN (17,18,19,20,21,22,23,27);
UPDATE franshop.categories SET father_id = 2 WHERE id IN (13,14,15,16);