-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th5 15, 2019 lúc 05:34 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `petshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `mahd` int(11) NOT NULL COMMENT 'mã hóa đơn',
  `masp` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã sản phẩm',
  `giatien` double NOT NULL COMMENT 'đơn giá',
  `soluong` int(11) NOT NULL COMMENT 'số lượng',
  `thanhtien` double NOT NULL COMMENT 'thành tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`mahd`, `masp`, `giatien`, `soluong`, `thanhtien`) VALUES
(4, 'SP130', 139000, 2, 278000),
(4, 'SP11', 19000, 1, 19000),
(6, 'SP11', 19000, 1, 19000),
(6, 'SP1', 25000, 1, 25000),
(6, 'SP58', 286000, 2, 572000),
(6, 'SP127', 18000, 5, 90000),
(7, 'SP65', 25000, 1, 25000),
(7, 'SP66', 160000, 1, 160000),
(7, 'SP67', 160000, 1, 160000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongvat`
--

CREATE TABLE `dongvat` (
  `madv` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã động vật',
  `tendv` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên động vật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dongvat`
--

INSERT INTO `dongvat` (`madv`, `tendv`) VALUES
('bird', 'chim'),
('cat', 'mèo'),
('dog', 'chó'),
('fish', 'cá'),
('hamster', 'hamster');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` int(11) NOT NULL,
  `tendangnhap` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tài khoản',
  `ngaydathang` date NOT NULL COMMENT 'ngày đặt hàng',
  `tongtien` double NOT NULL COMMENT 'tổng tiền',
  `trangthai` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `tendangnhap`, `ngaydathang`, `tongtien`, `trangthai`) VALUES
(4, 'dat123', '2019-05-15', 297000, 'chưa xử lý'),
(6, 'dat123', '2019-05-15', 706000, 'đã xử lý'),
(7, 'dat123', '2019-05-15', 345000, 'đã xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã sản phẩm',
  `tensp` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên sản phẩm',
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No_image_available.png' COMMENT 'hình ảnh',
  `soluong` int(11) NOT NULL COMMENT 'số lượng tồn kho',
  `giatien` double NOT NULL COMMENT 'đơn giá',
  `mota` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'mô tả',
  `xoa` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `hinhanh`, `soluong`, `giatien`, `mota`, `xoa`) VALUES
('SP0', 'Royal Canin - Mini Dermacomfort', 'food4.jpg', 27, 192000, 'ĐẶC ĐIỂM NỔI BẬT CỦA ROYAL CANIN DERMACOMFORT GIẢM DỊ ỨNG DA\r\nCông thức giảm kích ứng da\r\nTình trạng da phản ánh sức khoẻ của chó và chúng cần có chế độ ăn uống thích hợp, điều này đóng vai trò quan trọng trong việc duy trì sức khỏe làn da.\r\n\r\nCông thức đặc biệt của ROYAL CANIN Mini Dermacomfort với các nguồn protein chọn lọc có chất lượng rất cao đặc biệt phù hợp với chó dễ bị kích ứng và mẫn ngứa. Sau 1 tháng sử dụng, 87% chó đã giảm thiểu các dấu hiệu ngứa và kích ứng da.\r\n\r\nHợp chất dưỡng da\r\nSự kết hợp độc đáo của các chất dinh dưỡng giúp hỗ trợ vai trò của lớp màn bảo vệ của da, kết hợp với các axit béo omega 6 (bao gồm axit gamma-linolenic) và các axit béo Omega 3 (bao gồm EPA và DHA) được biết đến với những tác động tích cực ở da.\r\n\r\nSức khỏe răng miệng\r\nROYAL CANIN Mini Dermacomfort giúp giảm sự hình thành vôi răng bằng nhờ các hoạt chất làm giảm canxi có trong nước bọt.\r\n\r\n\r\n\r\nTHÀNH PHẦN\r\nNguyên liệu\r\nGạo, gluten lúa mì, lúa mì, mỡ động vật, gluten ngô, yến mạch xay, ngô, gan gia vị thủy phân, khoáng chất, dầu đậu nành, bột củ cải, dầu cá (nguồn EPA và DHA), hạt lanh (nguồn omega 3) Fructo-oligo-saccharides, dầu cây borage (nguồn gamma-linolenic acid), chiết xuất hoa cúc (nguồn lutein). Tro thô: 5,5%. Sợi thô: 1,4%. Dầu thực vật: 17%. Độ ẩm: 0%. Protein: 26%.', 1),
('SP1', 'Thức ăn cao cấp NutriSource thịt gà, đậu Hà Lan ', 'food5.jpg', 61, 25000, 'Thức ăn cao cấp NutriSource thịt gà, đậu Hà Lan 142g\r\n- Thức ăn cao cấp hỗn hợp hoàn chỉnh cho chó : Thịt gà tươi + Đậu Hà Lan.\r\n\r\n- Không chứa thành phần ngũ cốc gây dị ứng cho thú cưng (GRAIN FREE).\r\n\r\n- Phù hợp cho tất cả các giai đoạn tăng trưởng.\r\n\r\n- Dành cho tất cả giống chó có thể trọng từ 0 - 45 Kg.\r\n\r\n- Trọng lượng : 142g / gói.\r\n\r\n- Xuất xứ : Tuffy\'s Pet Foods, Inc. USA', 0),
('SP10', 'Pate Smartheart lon vị gà tây cho chó', 'food10.jpg', 24, 35000, 'Pate Smartheart lon vị gà tây cho chó 400gr là sản phẩm được nghiên cứu sản xuất để phù hợp với nhu cầu dinh dưỡng của chú cún cưng nhà bạn. Với đầy đủ các dưỡng chất thiết yếu cùng với hương vị thịt gà và gan đầy hấp dẫn, Thức Ăn Cho Chó Pate Smartheart lon vị gà tây cho chó 400gr chắc hẳn sẽ là lựa chọn hàng đầu giúp cún cưng của bạn phát triển khỏe mạnh.\r\n\r\nSản phẩm chứa đầy đủ các dưỡng chất thiết yếu, hỗ trợ cho quá trình hoạt động và phát triển của thú cưng nhà bạn, bao gồm:\r\n\r\n- Chất đạm: được chọn từ thịt có chất lượng, cung cấp acid amin cần thiết để xây dựng cơ bắp khỏe mạnh.\r\n\r\n- Chất béo: cung cấp năng lượng và nguồn acid béo thiết yếu để duy trì một làn da khỏe mạnh và một bộ lông bóng mượt.\r\n\r\n- Vitamin: giúp cơ thể phát triển khỏe mạnh và tăng cường hệ thống miễn dịch.\r\n\r\n- Khoáng chất: giúp cơ thể phát triển khỏe mạnh, xương chắc và răng khỏe. \r\n\r\nHướng dẫn sử dụng:\r\n\r\n- Có thể cho cún con dùng trực tiếp hoặc trộn chung với các loại rau, củ, quả, hạt tùy thích.\r\n\r\n- Bảo quản ở nhiệt độ dưới 4 độ C sau khi mở lon và sử dụng hết trong vòng tối đa là 3 ngày.\r\n\r\n- Bảo quản ở nơi khô ráo, thoáng mát, tránh nơi ẩm ướt và tránh ánh sáng trực tiếp.', 0),
('SP103', 'Dầu gội và xả cho mèo lông dài', 'suatam10.jpg', 54, 200000, 'Đặc điểm:\r\n\r\nSản phẩm được thiết kế dành riêng cho những chú mèo lông dài, ngoài khả năng làm sạch và kháng khuẩn nổi bật từ cây hương thảo, sản phẩm còn chứa dầu hạt nhân argania spinosa có tác dụng dưỡng ẩm, giúp bộ lông luôn óng mượt. Đặc biệt hai thành phần Panthenol và Tripeptide cung cấp dinh dưỡng đến từng nang lông, tăng cường độ đàn hồi, thúc đẩy sự phát triển của lông và tái tạo protein bị hư tổn.\r\n\r\nDung tích: 280g\r\n\r\nThành phần:\r\n\r\nChiết suất lá sơn trà, lá mê điệt, dầu thầu dầu, dầu hạt nhân argania spinosa, glycerin, caprylyl glycol, copper tripeptide-1.\r\n\r\nHướng dẫn sử dụng:\r\n\r\n Làm ướt bộ lông bằng nước ấm, pha một lượng dầu gội vừa đủ với nước, massage nhẹ nhàng toàn thân (tránh tiếp xúc với mắt) khoảng 3 phút, sau đó xả sạch với nước. Có thể lặp lại lần 2 nếu cần thiết.\r\n\r\n \r\n\r\nLưu ý: dùng cho mèo từ 8 tuần tuổi trở lên.', 0),
('SP104', 'Cây mèo leo AFP Nature Cozy 45x45x66cm', 'domeo1.jpg', 51, 2380000, 'Được thành lập từ năm 1997, với 20 năm kinh nghiệm, mục tiêu của AFP và Pawise là cung cấp các sản phẩm dành cho thú cưng với chất lượng tốt nhất, an toàn nhất với 95% sản phẩm đã được xuất khẩu sang thị trường Châu Âu và Châu Mỹ.\r\n\r\nAFP và Pawise luôn cố gắng hết sức để thiết kế những sản phẩm nhằm đáp ứng các nhu cầu của vật nuôi cũng như phù hợp với phong cách của chủ nhân.\r\n\r\nVới các nhà thiết kế đầy tính sáng tạo giàu kinh nghiệm, nhân viên chuyên nghiệp và đội ngũ quản lý có năng lực, AFP và Pawise đang khẳng định vị thế của mình trong lĩnh vực chăm sóc thú cưng, mong muốn mang đến những sản phẩm an toàn, đáng tin cậy cùng dịch vụ hiệu quả.', 0),
('SP105', 'Afp - Cây mèo leo Roller CLASSIC COMFORT', 'domeo7.jpg', 94, 785000, 'GIỚI THIỆU VỀ AFP:\r\nĐược thành lập từ năm 1997, với 20 năm kinh nghiệm, mục tiêu của AFP và Pawise là cung cấp các sản phẩm dành cho thú cưng với chất lượng tốt nhất, an toàn nhất với 95% sản phẩm đã được xuất khẩu sang thị trường Châu Âu và Châu Mỹ.\r\n\r\nAFP và Pawise luôn cố gắng hết sức để thiết kế những sản phẩm nhằm đáp ứng các nhu cầu của vật nuôi cũng như phù hợp với phong cách của chủ nhân.\r\n\r\nVới các nhà thiết kế đầy tính sáng tạo giàu kinh nghiệm, nhân viên chuyên nghiệp và đội ngũ quản lý có năng lực, AFP và Pawise đang khẳng định vị thế của mình trong lĩnh vực chăm sóc thú cưng, mong muốn mang đến những sản phẩm an toàn, đáng tin cậy cùng dịch vụ hiệu quả.', 0),
('SP108', 'AFP - Đồ chơi cho mèo Coco\'nut WILD & NATURE', 'domeo4.jpg', 30, 68000, 'Đồ chơi cho mèo Coco\'nut WILD & NATURE\r\nĐược thành lập từ năm 1997, với 20 năm kinh nghiệm, mục tiêu của AFP và Pawise là cung cấp các sản phẩm dành cho thú cưng với chất lượng tốt nhất, an toàn nhất với 95% sản phẩm đã được xuất khẩu sang thị trường Châu Âu và Châu Mỹ.\r\n\r\nAFP và Pawise luôn cố gắng hết sức để thiết kế những sản phẩm nhằm đáp ứng các nhu cầu của vật nuôi cũng như phù hợp với phong cách của chủ nhân.\r\n\r\nVới các nhà thiết kế đầy tính sáng tạo giàu kinh nghiệm, nhân viên chuyên nghiệp và đội ngũ quản lý có năng lực, AFP và Pawise đang khẳng định vị thế của mình trong lĩnh vực chăm sóc thú cưng, mong muốn mang đến những sản phẩm an toàn, đáng tin cậy cùng dịch vụ hiệu quả.', 0),
('SP109', 'Chuột cỏ mèo Green Rush', 'domeo2.jpg', 64, 102000, 'Được thành lập từ năm 1997, với 20 năm kinh nghiệm, mục tiêu của AFP và Pawise là cung cấp các sản phẩm dành cho thú cưng với chất lượng tốt nhất, an toàn nhất với 95% sản phẩm đã được xuất khẩu sang thị trường Châu Âu và Châu Mỹ.\r\n\r\nAFP và Pawise luôn cố gắng hết sức để thiết kế những sản phẩm nhằm đáp ứng các nhu cầu của vật nuôi cũng như phù hợp với phong cách của chủ nhân.\r\n\r\nVới các nhà thiết kế đầy tính sáng tạo giàu kinh nghiệm, nhân viên chuyên nghiệp và đội ngũ quản lý có năng lực, AFP và Pawise đang khẳng định vị thế của mình trong lĩnh vực chăm sóc thú cưng, mong muốn mang đến những sản phẩm an toàn, đáng tin cậy cùng dịch vụ hiệu quả.', 0),
('SP11', 'Smartheart - Pate vị bò cho chó lớn', 'food9.jpg', 31, 19000, 'Thông tin sản phẩm:\r\nPate Smartheart  vị bò  cho chó lớn 130gr là sản phẩm được nghiên cứu sản xuất để phù hợp với nhu cầu dinh dưỡng của chú cún cưng nhà bạn. Với đầy đủ các dưỡng chất thiết yếu cùng với hương vị thịt bò và thịt cừu đầy hấp dẫn, Thức Ăn Cho Chó Pate Smartheart  vị bò  cho chó 130gr chắc hẳn sẽ là lựa chọn hàng đầu giúp cún cưng của bạn phát triển khỏe mạnh.\r\n\r\nSản phẩm chứa đầy đủ các dưỡng chất thiết yếu, hỗ trợ cho quá trình hoạt động và phát triển của thú cưng nhà bạn, bao gồm:\r\n\r\n- Chất đạm: được chọn từ thịt có chất lượng, cung cấp acid amin cần thiết để xây dựng cơ bắp khỏe mạnh.\r\n\r\n- Chất béo: cung cấp năng lượng và nguồn acid béo thiết yếu để duy trì một làn da khỏe mạnh và một bộ lông bóng mượt.\r\n\r\n- Vitamin: giúp cơ thể phát triển khỏe mạnh và tăng cường hệ thống miễn dịch.\r\n\r\n- Khoáng chất: giúp cơ thể phát triển khỏe mạnh, xương chắc và răng khỏe. \r\n\r\nHướng dẫn sử dụng:\r\n\r\n- Có thể cho cún con dùng trực tiếp hoặc trộn chung với các loại rau, củ, quả, hạt tùy thích.\r\n\r\n- Bảo quản ở nhiệt độ dưới 4 độ C sau khi mở lon và sử dụng hết trong vòng tối đa là 3 ngày.\r\n\r\n- Bảo quản ở nơi khô ráo, thoáng mát, tránh nơi ẩm ướt và tránh ánh sáng trực tiếp.', 0),
('SP110', 'Thảm cói trụ chuột', 'domeo3.jpg', 64, 95000, '+ Dùng để cào móng cho  thú cưng của bạn.\r\n\r\n+ Thú cưng nhà bạn có thể thoải mái cào móng mà không sợ bị mắng trên thảm cào móng có chú chuột ngộ nghĩnh.\r\n\r\n+ Hình ảnh sinh động kích thích thú cưng của bạn.\r\n\r\n+ Thảm cào móng đồ chơi cho thú cưng, kiểu dáng và màu sắc đẹp, hấp dẫn thú cưng nhà bạn, chất liệu bền, chắc chắn, bán rẻ nhất tại PetShop', 0),
('SP118', 'Cám trứng BAVI', 'chim2.jpg', 70, 129000, 'Sản Phẩm được phân phối bởi Hanpet\r\n- Dùng cho mọi loại chim\r\n\r\n- Dùng cho chim mọi lứa tuổi\r\n\r\n- Thành phần:Trứng gà, Bột tôm, đậu tương....', 0),
('SP119', 'Thức ăn cho họa mi', 'chim1.jpg', 29, 15000, 'Thức ăn chuyên dụng cho các loại chim hoạ mi \r\n..................\r\nCám chim\r\nCám dành cho chim cảnh\r\nCám hoạ mi\r\nThức ăn hoạ mi', 0),
('SP12', 'Viên gặm dẻo Daily Best For Dogs', 'food2.jpg', 37, 213000, 'CÚN BỊ RỤNG LÔNG QUÁ NHIỀU?\r\n\r\nMONG CÚN CÓ LÀN DA KHỎE & BỘ LÔNG ÓNG MƯỢT?\r\n\r\nCÚN ĐANG BỊ VIÊM DA?\r\n\r\nSKIN + COAT có 14 thành phần chuyên biệt giúp cún được khoẻ da, mượt lông\r\n\r\nHạt lanh (Flax seeds) giàu omega-3 giúp dưỡng da. Hạt lanh còn có lignans giúp chống oxi hoá, cũng có các vitamin B1, B2, C,E và beta-carotene, các khoáng chất như sắt, kẽm, kali, magnê, phốt pho và can xi.\r\n\r\nSafflower oil là một nguồn Omega 6 tuyệt hảo giúp cho da khoẻ và đàn hồi tốt. Omega 6 cần thiết cho để hỗ trợ vẻ óng mượt của bộ lông.\r\n\r\nVitamin E giúp bảo vệ da khỏi thương tổn do các gốc tự do.\r\n\r\nHỗn hợp thực vật gồm cà rốt sấy, cỏ alfafa sấy, tảo sấy là nguồn dinh dưỡng quan trọng giúp nuôi da khoẻ.\r\n\r\nPhân tích đảm bảo: 1 viên gặm dẻo gồm\r\n\r\nChất Đạm (min) 9%\r\n\r\nChất Béo (min) 12%\r\n\r\nChất Xơ (max) 9%\r\n\r\nĐộ ẩm (max) 10%\r\n\r\nLinoleic Acid (min 3.7%) 200 mg\r\n(1 axít béo Omega 6)\r\n\r\nVitamin E 50 IU\r\n\r\nAxít béo Omega 3 38 mg\r\n\r\nAxít béo Omega 9 50 mg\r\n\r\nThành phần: brewers dried yeast, glycerin, flaxseed,natural duck flavor, dried carrots, dried alfalfa, safflower oil, lecithin, maltodextrins, sodium alginate, calcium sulfate,vitamin E supplement, dried kelp, parsley, green tea extract, garlic, canola oil, mixed tocopherols (a preservative),\r\npropionic acid (a preservative).\r\n\r\nHướng dẫn sử dụng: phù hợp với mọi giống chó, mọi kích cỡ ở mọi độ tuổi.\r\n\r\n1 cây gặm mềm cho 11 kg thể trọng (25 lbs), dùng được thường xuyên mỗi ngày.\r\n\r\nCHỈ DÙNG TRONG CHĂN NUÔI\r\n\r\nQuy cách: sản phẩm tính theo trọng lượng 157.5 gr/ gói, không tính theo cây\r\n\r\nBảo quản: giữ nơi khô ráo, thoáng mát. Để cách xa trẻ em.', 0),
('SP120', 'Cóng ăn thủy tinh chim cảnh', 'chim4.jpg', 99, 25000, 'cóng ăn thủy tinh cho chim cảnh\r\n\r\nCóng ăn chào mào,mi ,choè...', 0),
('SP121', 'Cóng sứ chào mào', 'chim3.jpg', 80, 30000, 'Cóng sứ chào mào, chất liệu sứ cao cấp thích hợp cho chào mào than mi lửa...', 0),
('SP122', 'Lồng chim yến trúc cật', 'chim5.jpg', 5, 1550000, 'Lồng chim yến trúc cật\r\nTrúc cật\r\nPhào dũi chỉ\r\nSize 30 x 32', 0),
('SP123', 'Lồng chim sắt', 'chim6.jpg', 87, 100000, 'Tính năng: Sinh thái thân thiện\r\n\r\nNơi xuất xứ: Zhejiang, China (Mainland)\r\n\r\nNhãn hiệu: baojie bj-\r\n\r\nModel: A-300\r\n\r\nMàu: vàng, xanh, trắng\r\n\r\nChất liệu: dây sắt', 0),
('SP124', 'Lồng chim đôi', 'chim7.jpg', 18, 200000, 'Lồng chim cảnh lắp ghép loại rộng 1 mét (100cmx50cmx50cm)\r\n\r\nĐỦ PHỤ KIỆN\r\n\r\nLồng thú cưng bằng kẽm', 0),
('SP125', 'Thức ăn dinh dưỡng hàng ngày cho hamster', 'hamster1.jpg', 32, 30000, 'THỨC ĂN DINH DƯỠNG HÀNG NGÀY CHO HAMSTER - Gói thức ăn đầy đủ dưỡng chất cần thiết cho các bé Hamster\r\n\r\nGiá: 30k/gói\r\n\r\nGói Thức Ăn Trộng Dinh Dưỡng Hằng Ngày cho Hamster được trộn theo tỷ lệ nhất định bao gồm nhiều loại ngũ cốc, hạt khô, thức ăn tổng hợp... mang lại đầy đủ nhu cầu dưỡng chất cho các bé Hamster ăn mỗi ngày.', 0),
('SP126', 'Ngũ cốc trộn', 'hamster2.jpg', 6, 15000, '', 0),
('SP127', 'Mùn cưa hương dâu', 'hamster3.jpg', 33, 18000, 'Mùn cưa lót chuồng cho Hamster', 0),
('SP128', 'Bánh xe chạy', 'hamster5.jpg', 46, 52000, '_ Vật liệu : Phần khung được làm bằng nhựa cứng bền chắc , kết cấu đơn giản và độ ổn định cao. Phần bánh xe được ghép lại từ dải nhựa mềm dẻo liền mạch không có khe hở dảm bảo an toàn cao cho các bé hamster có thể hình nhỏ.\r\n\r\n_ Sử dụng : Với khung có chân cố định rất tiện lợi nếu bạn chọn loại bánh xe chạy này cho loại lồng kính hoặc lồng bằng nhựa mica. Đường kính bánh xe là 12,5 cm thuộc diện trung bình thích hợp nhất với các bé hamster có thể hình nhỏ như winter white hay campbell’s. Vì toàn bộ bánh xe đều làm bằng nhựa nên sau thời gian dài không xuất hiện rỉ sét, nguyên nhân lớn nhất gây ra tiếng ồn khi các bé hamster sử dụng wheel . Màu sắc đa dạng bắt mắt nên các bé hamster sẽ rất thích thú chạy trên loại wheel này.', 0),
('SP129', 'Nấm gỗ thông 3 tầng', 'hamster4.jpg', 33, 130000, '_ Vật liệu : Làm bằng gỗ thông tự nhiên , không dùng bất cứ đinh kim loại nào , gỗ thô thiên nhiên phù hợp cho chuột của bạn .\r\n\r\n_ Sử dụng : Đây là sản phẩm đồ chơi cho chuột Hamster . Bạn có thể đặt trong lồng cho chú Hmaster leo trèo , luốn lách , chơi đùa trên đó . Đây sẽ là món đồ chơi mà chú chuột của bạn sẽ rất thích thú đùa nghịch trên đó . Món đồ chơi thiên nhiên sẽ tạo cảm giác thoải mái cho chú hamster .', 0),
('SP13', 'SY - Áo cho thú cưng các hình size S', 'ao3.jpg', 24, 155000, '+ Áo cho chó mèo, màu sắc và kiểu dáng đẹp\r\n\r\n+ Chất liệu mềm mại, êm ái, không kích ứng da, phù hợp cho cún yêu nhà bạn', 0),
('SP130', 'Lồng Chuột Hamster Mini 2 Tầng', 'hamster6.jpg', 25, 139000, 'Lồng chuột hamster mini 2 tầng\r\nBộ lồng bao gồm: Bát ăn, bình nước, wheel, nhà ngủ\r\nThích hợp cho các bạn nuôi 1-2 bé hamster nhỏ: winter white, robo, campell', 0),
('SP131', 'Lồng vòm bear lớn cho hamster', 'hamster7.jpg', 52, 520000, 'Lồng vòm bear lớn đang có mặt tại Pet Shop.', 0),
('SP132', 'Thức ăn cho cá ShangHai hạt lớn', 'ca5.jpg', 86, 25000, 'Thức ăn cho cá cảnh ShangHai hạt LỚN 500g là thực phẩm cho các loại cá cảnh như cá vàng, cá chép bé, hồng két với nhiều hạt với kích thước khác nhau phù hợp cho từng loại cá.Xuất Xứ: Việt Nam ShangHaiKích cỡ: HẠT LỚNTrọng lượng sản phẩm: 500 gramĐặc điểm: đảm bảo đầy đủ dinh dưỡng cho cá cảnh và tiện dụng cho việc sử dụng.Các sử dụng: Cho ăn ngày 2 lần sáng và tối, cho ăn vừa đủ để tránh lượng thức ăn thừa làm dơ bể.Thành phần dinh dưỡng: protein 30%, lipid 5%, xơ 7%, độ ẩm 8%.Bảo quản nơi khô ráo và thoáng mát.', 0),
('SP133', 'Núi giả sơn tiểu cảnh', 'ca3.jpg', 74, 69000, 'Làm từ chất liệu an toàn không gây độc cho cá Màu sắc và hình dạng được làm rất tỉ mỉ chân thực Giúp bể cá của bạn đẹp hơn', 0),
('SP134', 'Máy lọc thác - lọc bể cá cảnh', 'ca6.jpg', 8, 240000, 'Công suất: 8w\r\n- Lưu lượng lọc: 800 l/h\r\n- Phù hợp cho bể dưới 100 lít\r\n- Có 4 ngăn lọc\r\n- Nhỏ gọn, dễ lắp đặt và vệ sinh\r\n- Nước sạch trả về bể kiểu thác chảy nhẹ nhàng, tạo dòng chảy tự nhiên.\r\n- Dòng sản phẩm thế hệ mới tiết kiệm điện\r\n\r\n Lọc thác là dòng máy lọc được dùng phổ biến trong các bể thủy sinh, bể nuôi tép. Sản phẩm được ưa chuộng với các lợi ích đem lại như: nhỏ gọn, hoạt động êm ái, tạo dòng chảy tự nhiên nhẹ nhàng, dễ dàng lắp đặt và vệ sinh.\r\n   Đặc biệt với các bể thủy sinh cỡ nhỏ, bạn không thể nhét 1 chiếc máy lọc trong hoặc dùng 1 bộ lọc máng cồng kềnh, lọc thác lúc này trở thành lựa chọn tối ưu. Sản phẩm kết hợp giữa hệ thống lọc cơ học (bông) và hệ thống lọc hóa học (than hoạt tính), nhà sản xuất đã tặng kèm 2 loại lọc này trong máy, bạn vẫn có thể dùng thêm hệ thống lọc vi sinh bằng cách bổ sung thêm sứ lọc cỡ nhỏ v.v....', 0),
('SP135', 'Chậu thủy tinh trụ tròn', 'ca2.jpg', 21, 79000, 'Chậu thủy tinh trụ tròn nuôi cá thích hợp cắm hoa trang trí nhà bếp phòng ăn, phòng khách hay văn phòng làm việc.\r\n\r\nĐược sản xuất dựa trên công nghệ hiện đại với chất liệu thủy tinh cao cấp nên có độ trong suốt đẹp mắt.\r\n\r\nBình rất dễ dàng vệ sinh, khó trầy xước và an toàn sử dụng\r\n\r\nChậu thủy tinh trụ tròn nuôi cá được sản xuất dựa trên công nghệ hiện đại với chất liệu thủy tinh cao cấp nên có độ trong suốt có in nhiều màu sắc đẹp mắt. Bình rất dễ dàng vệ sinh, khó trầy xước và an toàn sử dụng.\r\n\r\nVới chậu thủy tinh trụ tròn trong suốt, bạn có thể thỏa sức sáng tạo với nhiều phong cách cắm hoa khác nhau, rất phù hợp khi trang trí bàn làm việc hoặc bàn ăn hoặc có thể dùng để làm tiểu cảnh, nuôi cá cảnh,...\r\n\r\nKích thước sản phẩm : Đường kính 10cm , chiều cao 30cm\r\n\r\nQuà tặng : 1 gói sỏi trắng + Cây nhựa mini\r\n\r\nBình hoa thủy tinh giúp bạn trang hoàng nhà cửa trở nên đẹp hơn. Kiểu dáng sang trọng mang tính thẩm mỹ cao, tạo điểm nhấn tinh tế cho phòng khách, phòng làm việc, bàn ăn… Là món quà trang trọng dành tặng người thân, bạn bè, đồng nghiệp…', 0),
('SP136', 'Hồ cá thủy tinh bầu', 'ca1.jpg', 82, 70000, 'Hồ cá thủy tinh bầu là hồ thủy sinh chậu cây cảnh thủy tinh với đường kính 17cm chiều cao 13cm.\r\n\r\nChỉ là những lọ thủy tinh bình thường, nhưng việc nuôi cá hay trồng cây và tạo lập những mảng xanh trong những lọ thủy tinh trong suốt sẽ giúp bạn có thêm một cách trang trí mới thú vị cho các không gian sống.\r\n\r\nCũng với những chiếc lọ thủy tinh hình cầu thay vì để nuôi cá bạn cũng có thể chưng hoa hay trồng cây dạng thủy sinh, bạn có thể biến chúng thành một khu vườn cạn thật sự, giúp đưa các mảng xanh sinh động vào các không gian sống trong nhà.', 0),
('SP137', 'Bể cá mini để bàn', 'ca4.jpg', 43, 60000, 'Bạn mong muốn có một chiếc bể cá để trong nhà, nhưng không gian hạn chế cùng với công việc vô cùng bận rộn hang ngày khiến bạn còn phân vân, bối rối. trong những trường hợp như vậy, những chiếc bể cá mini để bàn chính là sự lựa chọn hoàn hảo cho bạn.\r\n\r\nKích thước Dài x Rộng x Cao : 15x11x15 cm\r\nChất liệu : Kiếng 5 li dày chắc\r\n\r\nQuà tặng dành cho quý khách mua bộ Bể cá mini để bàn :\r\n1 gói sỏi trắng\r\n1 cây nhựa', 0),
('SP139', 'Pate Royal Canin - Mini Adult Beauty', '2134_RoyalCanin-MiniAdultLight195g.png', 100, 59000, 'Với công thức ROYAL CANIN ướt được thiết kế dựa trên nhu cầu của giống chó nhỏ từ lúc nhỏ đến khi trưởng thành, một bữa ăn hoàn chỉnh về dưỡng chất, giúp các chú chó khỏe mạnh từ trong ra ngoài.\r\n\r\nTăng cường sự phát triển hài hòa\r\nCung cấp dinh dưỡng tối ưu\r\n100% dinh dưỡng cân bằng\r\n100% đảm bảo an toàn\r\nRoyal Canin - Mini Adult Beauty  195g là sản phẩm dành cho giống chó nhỏ trưởng thành có da nhạy cảm.\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n\r\nLợi ích\r\n\r\nBộ lông khỏe mạnh\r\n\r\nBao gồm axit béo Omega-6 để hỗ trợ bộ lông khỏe mạnh và sáng bóng.\r\n\r\nLàn da khỏe mạnh\r\n\r\nPha trộn độc đáo các vitamin B và axit amin để tăng cường bảo vệ da.\r\n\r\nTHÀNH PHẦN\r\n\r\nNguyên liệu\r\n\r\nPhụ phẩm thịt lợn, gà, bột ngô, bột gạo, bột xenluloza, bột củ cải đường khô, dầu thực vật, dầu cá, carob bean gum, hương vị tự nhiên, carrageenan, muối, taurine, kali clorua, natri silico Alginate, vitamin [DL-alpha tocopherol acetate (nguồn vitamin E), bổ sung niacin, L-ascorbyl-2-polyphosphate (nguồn vitamin C), biotin, Dantamat canxi, thiamine mononitrat (vitamin B1), riboflavin bổ sung, Pyridoxin hydrochloride (vitamin B6), bổ sung vitamin B12, axit folic, bổ sung vitamin D3), khoáng chất (oxit kẽm, sắt sulfat, kẽm proteinat, đồng sunfat, oxit mangan, natri selenit, canxi iodat), magnesium oxide, chiết xuất hoa cúc vạn thiếp Tagetes erecta L.)', 0),
('SP14', 'Áo bí ngô', 'aocho3.jpg', 72, 320000, '+ Áo cho chó mèo, màu sắc và kiểu dáng đẹp\r\n\r\n+ Chất liệu mềm mại, êm ái, không kích ứng da, phù hợp cho cún yêu nhà bạn\r\n\r\n+ Nhiều size cho mọi cỡ, bán rẻ nhất tại PetShop.', 0),
('SP140', 'Balo di chuyển Phi hành gia (nhựa)', '2577_tui-pet-phi-hanh-gia-pet-city2.jpg', 100, 520000, 'Túi dùng để vận chuyển thú cưng: chó, mèo gồm nhiều màu sắc cho bạn chọn lựa\r\n\r\nĐẶC ĐIỂM NỔI BẬT\r\n\r\n- Thiết kế phi hành gia độc đáo, dễ thương\r\n\r\n- Chất liệu nhựa dễ dàng vệ sinh, thoáng khí.\r\n\r\n- 2 cửa tích hợp (cầu tròn, lưới phẳng) dễ dàng thay đổi. \r\n\r\n- Màu sắc nổi bật, bắt mắt', 0),
('SP141', 'Nhà vệ sinh mèo Makar có nơ', '250_3410_makar_toilet_cat_pink_petcity.jpg', 100, 800000, 'Nhà vệ sinh mèo Makar có nơ 45*52*40cm\r\nThiết kế bắt mắt, màu sắc hợp thời trang. Fantasy cat làm sống động ngôi nhà và mang tới những trải nghiệm tiện ích cho chú mèo đáng yêu của bạn với hình dáng ngộ nghĩnh.\r\n\r\nNắp trên cùng của nhà vệ sinh thiết kế thuận tiện để đặt xẻng cát, túi đựng hoặc các phụ kiện nhỏ khác. Tay cầm thuận tiện để có thể di chuyển Khóa an toàn giúp khay cát cố định trong khi di chuyển. Khay ngăn kéo tiện lợi để dọn cát mèo.\r\n\r\nSản xuất từ nhựa chất lượng cao : 100% nhựa composite mang lại tính đàn hồi, bền bỉ, mềm cho sản phẩm.\r\n\r\nBề mặt sản phẩm nhẵn mịn an toàn cho vật nuôi và người dùng. Thiết kế đầy đủ hộp, ngăn kéo tiện dụng khi thêm và loại bỏ cát đã sử dụng. Nắp trên cùng vô cùng thuận tiện để đặt xẻng, túi đựng phân, và 1 số đồ cần thiết. Thiết kế hộc kéo giúp an toàn kể cả trong khi di chuyển.\r\n\r\nCửa đa dụng , dễ dàng vào ra, đồng thời hạn chế tối đa mùi chất thải, giữ không gian nhà ở tươi mát. Thiết kế thông thoáng để lưu chuyển không khí nhưng vẫn đảm bảo tính năng hạn chế mùi hôi tối đa.\r\n\r\nĐệm chân tại cửa làm sạch bàn chân , lưu lại cát, không bị cát rơi ra sàn nhà. Rất sạch sẽ và hợp vệ sinh.', 0),
('SP142', 'Nhà đầu mèo', '120_2271_20431239_341674479620345_7843554253853490907_n.jpg', 100, 450000, 'Khác với những ổ nệm khác. Ổ nệm đầu mèo chắc chắn hơn. Nhìn vững chãi hơn những loại bằng vải và xốp khác. ', 0),
('SP143', 'Túi xách Nylon', '120_260_pet_supplies_new_pet_cat_backpack_pet_font_b_handbag_b_font_font_b_dog_b.jpg', 100, 280000, 'Túi xách Nylon lớn cho chó mèo, kiểu dáng và màu sắc đẹp, hấp dẫn thú cưng nhà bạn, chất liệu bền, chắc chắn, bán rẻ nhất tại PetCity.vn\r\n\r\nThiết kế chắc chắn, hiện đại mang phong cách thời trang\r\n\r\nGiúp bạn đi đâu cũng có thể mang thú cưng đi bên cạnh mình một cách thoải mái nhất, tiện lợi nhất\r\n\r\nGiúp thú cưng thoải mái, khôn kích ứng da', 0),
('SP144', 'Máy sấy lông Codos CP160', '1399_0_m__y_s___y_chuy__n_d___ng_d__nh_cho_ch___m__o.jpg', 100, 2100000, '+ Sản phẩm chuyên dụng không thể thiếu dành cho các gia đình nuôi chó mèo có bộ lông dài, dày và lâu khô.\r\n\r\n+ Có khả năng làm lông của vật nuôi tơi và đẹp hơn, thời gian khô nhanh hơn và đem lại vẻ đẹp cho vật nuôi của bạn\r\n\r\n+ Sản phẩm có chức năng kiểm soát độ mạnh của thổi gió , kiểm soát nhiệt độ nóng. Có thể thổi gió hoặc thổi nóng riêng cũng như hoạt động song song 2 chức năng\r\n\r\n+ Sử dụng động cơ nhập khẩu từ Nhật bản có tuổi thọ gấp 2 lần so với máy sấy thông thường khác\r\n\r\n+ Độ rung thấp và hạn chế tối đa tiếng ồn so với các máy sấy lông thông thường\r\n\r\n+ Mấy sấy của Codos Vỏ hợp kim nhôm bề mặt màu có khả năng chống Oxy hóa, thẩm mỹ và tiện dụng\r\n\r\nLưu ý: Đọc kỹ hướng dẫn trước khi sử dụng\r\n\r\nBảo hành 3 tháng\r\n\r\nTHÔNG TIN THƯƠNG HIỆU CODOS\r\n\r\nCodos là thương hiệu tông đơ cắt tóc, của Hàn Quốc. Chuyên cung cấp các loại tông đơ an toàn dành cho bé sơ sinh. Giúp các Bố, các mẹ dễ dàng cắt tóc cho bé ngay cả khi bé đang ngủ, hay đang thức, mà không sợ làm tổn thương đến bé. Các sản phẩm của Codos luôn dẫn đầu về số lượng tiêu thụ, mẫu mã đẹp, đa dạng, chất lượng cao...đó cũng là tiêu chí mà Codos luôn lựa chọn số một. Các sản phẩm tông đơ của Codos luôn mang đến cho người sử dụng sự an tâm bởi tính năng an toàn của sản phẩm, với nhiều năm kinh nghiệm sản xuất các sản phẩm tông đơ được người tiêu dùng bình chọn là thương hiệu tông đơ tốt nhất.\r\n\r\nHiện nay Codos cũng là thương hiệu nổi tiếng tông đơ cắt lông cho thú cưng của Hàn Quốc một cách an toàn nhất.........', 0),
('SP145', 'Thức ăn Royal Canin - Maxi Adult 10kg', '2143_Royalcanin-MaxiAdult10kg.jpg', 100, 1080000, 'Royal canin - Maxi Adult 10kg\r\nNhững giống chó size Maxi (size lớn) được ưa chuộng vì khả năng làm việc đáng kinh ngạc, là giống chó chăn gia súc, theo dõi, cứu hộ, bảo vệ và hỗ trợ tuyệt vời. Những con chó thuộc giống chó size Maxi này mạnh mẽ và tận tụy nhưng thường dễ mắc các bệnh về đường tiêu hóa, đau khớp và thậm chí là vấn đề về tim. Với công thức của ROYAL CANIN MAXI đáp ứng nhu cầu của giống chó size Maxi trong suốt vòng đời của chúng.\r\n\r\nGiúp duy trì sức khoẻ tiêu hóa\r\nHỗ trợ giai đoạn tăng trưởng dài với năng lượng vừa phải\r\nHỗ trợ sức khoẻ xương & khớp\r\nHỗ trợ hệ miễn dịch khỏe mạnh\r\n100% dinh dưỡng cân bằng\r\n100% đảm bảo an toàn\r\nROYAL CANIN MAXI ADULT dành cho chó trưởng thành từ 26 đến 44kg và trên 15 tháng.\r\nHạt được thiết kế đặc biệt cho giống chó size Maxi để khuyến khích nhai.', 0),
('SP146', 'Áo Kimino nơ', '3271_kimononopetcity4.jpg', 100, 180000, '+ Váy nơ công chúa màu sắc và kiểu dáng đẹp\r\n\r\n + Chất liệu mềm mại, êm ái, không kích ứng da, phù hợp cho cún yêu nhà bạn', 0),
('SP147', 'Balo di chuyển Phi hành gia (nhựa trong)', '3757_8727323850-1832263803.jpg', 100, 700000, 'Với sản phẩm này, chó mèo cưng của bạn có thể nhìn ra thế giới và tận hưởng phong cảnh, nhìn ngắm bên ngòai, tương tác với thế giới bên ngoài\r\nĐiểm đặc biệt của balo là nhựa trong sang trọngSản phẩm được làm từ những chất liệu thân thiện, không độc hại và nhất là dễ dàng lau chùi khi bám bẩn.\r\n\r\nSản phẩm phù hợp cho vật nuôi có trọng lựơng dưới 6kg', 0),
('SP148', 'Sữa tắm YÚ kháng khuẩn chiết xuất hoa mẫu đơn', '3512_Untitl111ed.png', 100, 370000, 'Đây là dòng sữa tắm chăm sóc cho chó mèo độc đáo đến từ Đài Loan. Sự pha trộn phong phú trong thành phần của YÚ gồm các loại thảo mộc phương Đông, làm sạch từ hệ thực vật và tác động nhẹ nhàng chăm sóc cho làn da, lông của vật nuôi. Công thức tăng cường phát triển màu lông tự nhiên cho thú cưng sẽ giúp cho chúng thêm ấn tượng, tỏa sáng và rực rỡ hơn. Cùng với mùi hương thơm lâu kéo dài sẽ giúp cho thú cưng thơm tho suốt cả ngày.\r\n\r\nSản phẩm sữa tắm cho chó mèo độc đáo với chiết xuất thảo mộc phương Đông, hoàn toàn tự nhiên và không gây kích ứng\r\n\r\nCông thức kết hợp các loại hương hoa đầy nữ tính, cho thú cưng của bạn mùi hương quyến rũ và nồng nàn\r\n\r\nChiết xuất hoa Mẫu Đơn kiểm soát vi khuẩn và ngăn ngừa nhiễm trùng da', 0),
('SP15', 'Áo nỉ ngắn tay zigzag', 'ao4.jpg', 28, 180000, '+ Áo cho chó mèo, màu sắc và kiểu dáng đẹp\r\n\r\n+ Chất liệu mềm mại, êm ái, không kích ứng da, phù hợp cho cún yêu nhà bạn\r\n\r\n+ Nhiều size cho mọi cỡ, bán rẻ nhất tại PetShop.', 0),
('SP16', 'Áo nỉ có tay Gaspard', 'ao5.jpg', 28, 240000, '+ Áo cho chó mèo, màu sắc và kiểu dáng đẹp\r\n\r\n+ Chất liệu mềm mại, êm ái, không kích ứng da, phù hợp cho cún yêu nhà bạn\r\n\r\n+ Nhiều size cho mọi cỡ, bán rẻ nhất tại PetShop.', 0),
('SP17', 'Áo dear bear', 'ao1.jpg', 54, 130000, '+ Áo cho chó mèo, màu sắc và kiểu dáng đẹp\r\n\r\n+ Chất liệu mềm mại, êm ái, không kích ứng da, phù hợp cho cún yêu nhà bạn\r\n\r\n+ Nhiều size cho mọi cỡ, bán rẻ nhất tại PetShop', 0),
('SP18', 'Petstar - áo phao đại', 'aocho2.jpg', 85, 285000, 'Áo phao dày cho chó to, màu sắc và kiểu dáng đẹp\r\n\r\n+ Chất liệu cực kỳ dày dặn, giữ ấm cho thân nhiệt thú cưng nhà bạn\r\n\r\n+ Chất liệu mềm mại, êm ái, không kích ứng da, có bông bên trong', 0),
('SP19', 'LHK - Áo con ếch', 'ao2.jpg', 61, 47000, ' -Chất liệu vải thun thoáng mát, bền đẹp\r\n\r\n- Họa tiết hình chú ếch xanh ngộ nghĩnh\r\n\r\n- Có nhiều size và nhiều màu để bạn lựa chọn cho thú cưng của mình\r\n\r\n- Đường may tỉ mỉ cùng thiết kế hướng đến sự thoải mái tối đa giúp thú cưng thoải mái vận động, chạy nhảy.\r\n\r\n - Chất liệu vải không bám lông, giặt nhanh khô, không gây kích ứng da của thú cưng.', 0),
('SP2', 'Thức ăn cao cấp NutriSource thịt gà tươi', 'food6.jpg', 50, 25000, '- Thức ăn cao cấp hỗn hợp hoàn chỉnh cho chó : Thịt gà tươi.\r\n\r\n- Không chứa thành phần ngũ cốc gây dị ứng (GRAIN FREE).\r\n\r\n- Phù hợp cho tất cả các giai đoạn tăng trưởng.\r\n\r\n- Dành cho giống chó nhỏ có thể trọng từ 0 - 14Kg.\r\n\r\n- Trọng lượng :  142g / túi.\r\n\r\n- Xuất xứ : Tuffy\'s Pet Foods, Inc. USA ', 0),
('SP20', 'Petstar - áo phao SN lót lông', 'aocho1.jpg', 68, 177000, '+ Áo phao lót lông cho chó mèo, chất liệu tốt, mềm mại, bền, đẹp\r\n\r\n+ Chất liệu thông thoáng, hút ẩm tốt, tạo cảm giác thoải mái cho thú cưng. Hơn nữa, chất liệu dễ giặt và mau khô, rất phù hợp với khí hậu nóng ẩm ở Việt Nam.\r\n\r\n- Kiểu dáng thời trang sẽ làm cho thú cưng của bạn thêm phần nổi bật, thu hút sự chú ý bởi vẻ ngoài thật sự xinh xắn và ngộ nghĩnh.\r\n\r\n- Đường may tỉ mỉ cùng thiết kế hướng đến sự thoải mái tối đa giúp thú cưng không có cảm giác bị gò bó khi diện những bộ cánh độc đáo này.', 0),
('SP21', 'SY - Áo cotton sát nách', 'ao6.jpg', 89, 100000, '+ Áo cotton sát nách cho chó mèo, màu sắc và kiểu dáng đẹp\r\n\r\n+ Chất liệu mềm mại, êm ái, không kích ứng da, phù hợp cho thú cưng nhà bạn', 0),
('SP22', 'Petstar - Mũ cho Pet', 'ao7.jpg', 41, 130000, 'Nón Thời Trang cho chó mèo, màu sắc và kiểu dáng đẹp, chất liệu mềm mại, êm ái, không kích ứng da, nhiều size cho mọi cỡ.\r\n\r\nChiếc mũ tạo cho thú cưng nhà bạn trông dễ thương hơn khi đi chơi', 0),
('SP23', 'SS - Vòng cổ kỷ luật', 'vong1.jpg', 41, 120000, '+ Vòng cổ kỷ luật được thiết kế đẹp mắt, luôn là sự lựa chọn hàng đầu của bạn dành cho những chú chó hư và lớn.\r\n+ Giúp bạn huấn luyện thú cưng của mình một cách hiệu quả nhất.\r\n+ Được làm từ chất liệu cao cấp, chống han gỉ\r\n+ Vòng cổ kỉ luật cho chó mèo, chất liệu tốt, bền, đẹp, chắc chắn\r\n+ Khi những chú chó không nghe lời, bạn xiết dây xích lại, lúc đó dây xích sẽ làm cho con chó có cảm giác đau nhức. Sau khi thả lỏng ra, chó của bạn sẽ không còn cảm giác đau. Sản phẩm dùng để trị những con chó hư không nghe lời. Thích hợp cho chó cỡ nhỏ & trung. Thích hợp cho việc huấn luyện chó', 0),
('SP24', 'Vòng cổ Ferplast Ergoflex', 'vong2.jpg', 81, 312000, 'Ferplast, có trụ sở tại Castelgomberto (tỉnh Vicenza - Ý), được thành lập vào năm 1966 bởi Carlo Vaccari. Trong 50 năm, Ferplast đã tham gia nghiên cứu và tạo ra các sản phẩm sáng tạo, an toàn với chất lượng cao nhằm đảm bảo cho sự chăm sóc thoải mái của vật nuôi. Công ty dành nhiều khoản đầu tư đáng kể cho nghiên cứu những công nghệ tiên tiến cho việc sản xuất.\r\n\r\nLà một doanh nghiệp thương mại điển hình của vùng Đông Bắc nước Ý, ngày nay Ferplast sản xuất hơn 2000 loại sản phẩm, có khoảng 1.000 nhân viên, phân phối không dưới 80 quốc gia trên thế giới và có chi nhánh tại Ý, Pháp, Đức, Anh, Scandinavia, Ba Lan, Ukraina, Slovakia, Nga, Benelux và Brazil, có 3 nhà máy sản xuất ở Ý, Ukraina và Cộng hòa Slovak.', 0),
('SP25', 'Dây dắt Ferplast Ergofluo', 'vong5.jpg', 79, 575000, 'Ferplast, có trụ sở tại Castelgomberto (tỉnh Vicenza - Ý), được thành lập vào năm 1966 bởi Carlo Vaccari. Trong 50 năm, Ferplast đã tham gia nghiên cứu và tạo ra các sản phẩm sáng tạo, an toàn với chất lượng cao nhằm đảm bảo cho sự chăm sóc thoải mái của vật nuôi. Công ty dành nhiều khoản đầu tư đáng kể cho nghiên cứu những công nghệ tiên tiến cho việc sản xuất.\r\n\r\nLà một doanh nghiệp thương mại điển hình của vùng Đông Bắc nước Ý, ngày nay Ferplast sản xuất hơn 2000 loại sản phẩm, có khoảng 1.000 nhân viên, phân phối không dưới 80 quốc gia trên thế giới và có chi nhánh tại Ý, Pháp, Đức, Anh, Scandinavia, Ba Lan, Ukraina, Slovakia, Nga, Benelux và Brazil, có 3 nhà máy sản xuất ở Ý, Ukraina và Cộng hòa Slovak.', 0),
('SP26', 'Yếm Ferplast Ergofluo', 'vong3.jpg', 51, 599000, 'Ferplast, có trụ sở tại Castelgomberto (tỉnh Vicenza - Ý), được thành lập vào năm 1966 bởi Carlo Vaccari. Trong 50 năm, Ferplast đã tham gia nghiên cứu và tạo ra các sản phẩm sáng tạo, an toàn với chất lượng cao nhằm đảm bảo cho sự chăm sóc thoải mái của vật nuôi. Công ty dành nhiều khoản đầu tư đáng kể cho nghiên cứu những công nghệ tiên tiến cho việc sản xuất.\r\n\r\nLà một doanh nghiệp thương mại điển hình của vùng Đông Bắc nước Ý, ngày nay Ferplast sản xuất hơn 2000 loại sản phẩm, có khoảng 1.000 nhân viên, phân phối không dưới 80 quốc gia trên thế giới và có chi nhánh tại Ý, Pháp, Đức, Anh, Scandinavia, Ba Lan, Ukraina, Slovakia, Nga, Benelux và Brazil, có 3 nhà máy sản xuất ở Ý, Ukraina và Cộng hòa Slovak.', 0),
('SP27', 'Vòng cổ da Ferplast Natural', 'vong4.jpg', 20, 332000, 'Ferplast, có trụ sở tại Castelgomberto (tỉnh Vicenza - Ý), được thành lập vào năm 1966 bởi Carlo Vaccari. Trong 50 năm, Ferplast đã tham gia nghiên cứu và tạo ra các sản phẩm sáng tạo, an toàn với chất lượng cao nhằm đảm bảo cho sự chăm sóc thoải mái của vật nuôi. Công ty dành nhiều khoản đầu tư đáng kể cho nghiên cứu những công nghệ tiên tiến cho việc sản xuất.\r\n\r\nLà một doanh nghiệp thương mại điển hình của vùng Đông Bắc nước Ý, ngày nay Ferplast sản xuất hơn 2000 loại sản phẩm, có khoảng 1.000 nhân viên, phân phối không dưới 80 quốc gia trên thế giới và có chi nhánh tại Ý, Pháp, Đức, Anh, Scandinavia, Ba Lan, Ukraina, Slovakia, Nga, Benelux và Brazil, có 3 nhà máy sản xuất ở Ý, Ukraina và Cộng hòa Slovak.', 0),
('SP28', 'LHK - Dây dắt dù dấu chân', 'vong7.jpg', 50, 33000, 'Để giải quyết sự băn khoăn cho các khổ chủ: Làm thế nào để đi chơi cho thoải mái mà thú cưng của mình không bị bắt mắt, hay nó chạy đi mất\r\n\r\n- Dây dắt dấu chân ngoài tác dụng giúp bạn giữ chặt và theo sát chú thú cưng của mình mà còn được  thiết kế đáng yêu và màu sắc tươi tắn.\r\n\r\n- Dây dắt là điểm nhấn nổi bật để chú thú cưng của bạn trông thật “sành điệu” trong mọi chuyến đi dạo hoặc chạy bộ đầy hứng khởi.\r\n\r\n- Chất liệu chắc chắn và thiết kế dày dặn cho độ bền cao, đồng thời tạo cảm giác êm ái khi đeo.\r\n\r\n- Họa tiết trang trí ngộ nghĩnh và màu sắc tươi tắn đáng yêu.\r\n\r\n- Thiết kế khóa giúp bạn dễ dàng đeo hoặc tháo mở dây và vòng một cách nhanh chóng.', 0),
('SP29', 'Dây dắt tự động Flexi New Comfort', 'vong6.jpg', 89, 382000, 'Là nhà phát minh và sản xuất dây dắt tự động đến từ Đức. Đứng đầu trong lĩnh vực này tại hơn 90 quốc gia trên toàn thế giới, Flexi là công ty tiên phong về đổi mới trong lĩnh vực phụ kiện dành cho thú cưng.\r\n\r\nVới 300 nhân viên tại Bargteheide, Đức, cùng với toàn bộ sự sáng tạo của mình với các chú chó, họ đã tạo ra sản phẩm dây dắt Flexi với thiết kế độc quyền. Dựa vào công nghệ tiên tiến, vật liệu cao cấp, Flexi mong muốn mang đến những sản phẩm phục vụ cuộc sống cho chú chó của bạn một cách tốt đẹp nhất.\r\n\r\nNăm 2010, Flexi được trao giải thưởng “Thương hiệu thế kỷ”, đây là một giải thưởng lớn ở Đức. Ngoài ra, Flexi còn được nhận các giải thưởng khác: “Giải thưởng về thiết kế” – tạp chí Dog Fancy của Mỹ trao tặng, “Sản phẩm của năm” do DOGS - tạp chí về chó hàng đầu Châu Âu trao tặng.\r\n\r\nTuy nhiên, đối với Flexi, phần thưởng quý giá nhất vẫn là sự hài lòng của hàng triệu người nuôi chó trên toàn thế giới.', 0),
('SP3', 'Thịt Meat Jerky Pedigree vị bò xông khói', 'food8.jpg', 92, 35000, 'Thịt Meat Jerky hương vị bò xông khói là một món ăn ngon hảo hạng mà con chó của bạn sẽ thích có bất kỳ thời gian nào trong ngày. Các lát thịt mỏng được cắt thẳng rất tốt cho sức khỏe của cún nhà bạn. Sản phẩm cung cấp protein, chất béo, carbohydrate, chất xơ, vitamin và khoáng chất, cung cấp đầy đủ chất dinh dưỡng cho chó. Thịt Jerky phù hợp tất cả các giống chó trên 3 tháng tuổi.\r\n\r\nThành phần: Gluten lúa mì, thịt gà, gia cầm và phụ phẩm gia cầm, glycerin, bột gan gà, tinh bột sắn, đường, gelatin, khoáng, propylen glycol, muối iốt, dầu đậu nành, axit xitric, hương vị, màu thực phẩm và chất bảo quản.', 0),
('SP30', 'Khớp da (rọ mõm)', 'vong8.jpg', 92, 54000, '+ Chiếc rọ mõm  sẽ là một phụ kiện không thể thiếu giúp đảm bảo an toàn cho những người xung quanh khi bạn đưa cún yêu đến những nơi công cộng.\r\n\r\n+ Với thiết kế chắc chắn nhưng mềm mại, đồng thời đầu rọ được đục nhiều lỗ nhỏ thông khí, rọ mõm ABC sẽ mang đến cho chú cún cưng của bạn cảm giác thật thoải mái khi đeo.\r\n\r\nĐẶC ĐIỂM NỔI BẬT\r\n\r\n- Thiết kế mềm mại và đầu rọ được đục nhiều lỗ nhỏ thông khí giúp mang đến cho chú cún cưng cảm giác thoải mái và êm ái khi đeo.\r\n\r\n- 2 lớp chắc chắn bảo đảm độ bền cho sản phẩm.\r\n\r\n- Thiết kế khóa nới linh động giúp bạn dễ dàng canh chỉnh sao cho chú cún cưng cảm thấy thoải mái nhất.', 0),
('SP31', 'Myp - Rọ mõm mỏ vịt silicon', 'vong9.jpg', 85, 109000, 'Khi dắt một chú chó đi dạo, bạn sợ chúng sẽ ăn linh tinh khi bạn không để mắt đến hoặc khi gặp vật lạ chúng sẽ sủa làm mọi người xung quanh sợ hãi, thì bạn hãy sắm ngay cho chúng một chiếc rọ mõm nhé. Một chiếc rọ mõm sẽ ngăn chặn việc: chúng ăn lung tung, sủa, hay cắn những con vật khác…. một cách hiệu quả. Chiếc rọ mõm này được làm từ vật liệu nhựa an toàn, có đai điều chỉnh kích thước, có hình chiếc mỏ vịt ngộ ngĩnh , xinh xắn. Khí đeo vào, chắc chắn chú cún của bạn sẽ có 1 cái “mỏ vịt” rất nổi bật và đáng yêu đấy.\r\nSản phẩm phù hợp với các chú cún', 0),
('SP32', 'Ferplast - Thùng đựng thức ăn FEEDY', 'vat2.jpg', 48, 380000, 'Ferplast, có trụ sở tại Castelgomberto (tỉnh Vicenza - Ý), được thành lập vào năm 1966 bởi Carlo Vaccari. Trong 50 năm, Ferplast đã tham gia nghiên cứu và tạo ra các sản phẩm sáng tạo, an toàn với chất lượng cao nhằm đảm bảo cho sự chăm sóc thoải mái của vật nuôi. Công ty dành nhiều khoản đầu tư đáng kể cho nghiên cứu những công nghệ tiên tiến cho việc sản xuất.\r\n\r\nLà một doanh nghiệp thương mại điển hình của vùng Đông Bắc nước Ý, ngày nay Ferplast sản xuất hơn 2000 loại sản phẩm, có khoảng 1.000 nhân viên, phân phối không dưới 80 quốc gia trên thế giới và có chi nhánh tại Ý, Pháp, Đức, Anh, Scandinavia, Ba Lan, Ukraina, Slovakia, Nga, Benelux và Brazil, có 3 nhà máy sản xuất ở Ý, Ukraina và Cộng hòa Slovak.', 0),
('SP33', 'PF - Bát dấu chân hình xương đáy chống trượt', 'vat3.jpg', 86, 116000, 'Mô tả sản phẩm:\r\n\r\n-     Chén dùng cho thú cưng với đáy cao su chống trượt hình cục xương và dấu chân.\r\n\r\n-     Xuất xứ: Ấn Độ.', 0),
('SP34', 'PF - Bát đôi hình xương', 'vat8.jpg', 86, 526000, 'Mỗi bé cún hay mèo sống trong vòng tay yêu thương của chúng ta, chúng ta luôn mong muốn những điều tốt nhất cho các bé, ngoài việc lựa chọn thức ăn ngon, quần áo đẹp, thì việc chọn một chiếc bát ăn, bát đựng nước hợp lí và đảm bảo sức khỏe cho các bé cún hay bé mèo là điều luôn trăn trở của các bạn chăm thú cưng.\r\n\r\n \r\n\r\nBát đôi hình xương thường là sự lựa chọn hoàn hảo cho các bé chó – bé mèo.\r\n\r\n \r\n\r\n1.TÁC DỤNG:\r\n \r\n\r\nBát đôi hình xương luôn đóng vai trò quan trọng trong việc đựng thức ăn hay nước uống của các bé cún hay bé mèo đáng yêu.\r\n\r\n \r\n\r\nBát đôi hình xương sẽ giúp giữ ấm thức ăn lâu hơn, đảm bảo thức ăn luôn được giữ sạch sẽ và an toàn.\r\n\r\n \r\n\r\nNgoài ra bát đôi hình xương còn giúp kích thích sự thèm ăn hay uống, luôn giúp các bé chó mèo ăn uống đúng chỗ.\r\n\r\n \r\n\r\n2.CHẤT LIỆU:\r\n \r\n\r\nBát đôi hình xương được làm hoàn toàn từ những chất liện an toàn cho sức khỏe thú cưng. Lòng bát được làm từ inox cao cấp. bên ngoài là lớp nhựa bền, không đổ màu.\r\n\r\n \r\n\r\n3.THIẾT KẾ THÔNG MINH:\r\n \r\n\r\nBát đôi hình xương dành cho chó mèo được thiết kế liền nhau, một bên để thức ăn và một bên đựng nước uống. Lòng bát ăn là lớp inox có thể tháo rời ra vệ sinh một cách dễ dàng và thuận tiện.\r\n\r\n \r\n\r\nBát đôi hình xương cho chó mèo được thiết kế tinh tế theo kiểu hình khúc xương, giúp các bé chó mèo tăng sự tò mò và cảm thấy thích thú khi ăn uống.\r\n\r\n \r\n\r\nBát đôi hình xương còn thiết kế các chân cao su ở dưới đáy bát, giúp bát ăn không bị trơn trượt với bề mặt tiếp xúc.\r\n\r\n \r\n\r\n4.MÀU SẮC:\r\n \r\n\r\nBát đôi hình xương dành cho chó mèo với màu đỏ đô kết hợp với màu sáng bóng của lớp inox, làm bát ăn luôn sáng bóng và đẹp.\r\n\r\n \r\n\r\n \r\n\r\nXuất xứ: India – Ấn Độ', 0),
('SP35', 'Bát ăn sứ cho chó mèo', 'vat5.jpg', 73, 75000, 'Là loại bát ăn sứ tiện dụng có thể đem đi xa hoặc đặt ở bất kỳ vị trí nào.\r\n\r\nChất liệu sứ rất bền và an toàn cho vật nuôi\r\n\r\nKích thước: 14.5x12x3.5cm', 0),
('SP36', 'Ferplast - Bình cấp nước, thức ăn', 'vat4.jpg', 3, 197000, 'Ferplast, có trụ sở tại Castelgomberto (tỉnh Vicenza - Ý), được thành lập vào năm 1966 bởi Carlo Vaccari. Trong 50 năm, Ferplast đã tham gia nghiên cứu và tạo ra các sản phẩm sáng tạo, an toàn với chất lượng cao nhằm đảm bảo cho sự chăm sóc thoải mái của vật nuôi. Công ty dành nhiều khoản đầu tư đáng kể cho nghiên cứu những công nghệ tiên tiến cho việc sản xuất.\r\n\r\nLà một doanh nghiệp thương mại điển hình của vùng Đông Bắc nước Ý, ngày nay Ferplast sản xuất hơn 2000 loại sản phẩm, có khoảng 1.000 nhân viên, phân phối không dưới 80 quốc gia trên thế giới và có chi nhánh tại Ý, Pháp, Đức, Anh, Scandinavia, Ba Lan, Ukraina, Slovakia, Nga, Benelux và Brazil, có 3 nhà máy sản xuất ở Ý, Ukraina và Cộng hòa Slovak.', 0),
('SP37', 'Chén lạnh AFP Chill out', 'vat7.jpg', 100, 220000, 'Được thành lập từ năm 1997, với 20 năm kinh nghiệm, mục tiêu của AFP và Pawise là cung cấp các sản phẩm dành cho thú cưng với chất lượng tốt nhất, an toàn nhất với 95% sản phẩm đã được xuất khẩu sang thị trường Châu Âu và Châu Mỹ.\r\n\r\nAFP và Pawise luôn cố gắng hết sức để thiết kế những sản phẩm nhằm đáp ứng các nhu cầu của vật nuôi cũng như phù hợp với phong cách của chủ nhân.\r\n\r\nVới các nhà thiết kế đầy tính sáng tạo giàu kinh nghiệm, nhân viên chuyên nghiệp và đội ngũ quản lý có năng lực, AFP và Pawise đang khẳng định vị thế của mình trong lĩnh vực chăm sóc thú cưng, mong muốn mang đến những sản phẩm an toàn, đáng tin cậy cùng dịch vụ hiệu quả.', 0),
('SP38', 'Bộ ăn uống tự động', 'vat6.jpg', 87, 529000, 'Bộ ăn uống tự động cho chó mèo\r\n\r\nBộ dụng cụ ăn uống bao gồm máng ăn + thanh dịch chuyển bình nước lên xuống + bình đựng thức ăn 1.25kg + bình nước 500ml. Sản phẩm được làm từ nhựa tổng hợp, riêng máng ăn làm từ vật liệu ABS có độ bền cao. Bình đựng thức ăn được làm từ nhựa PP, nắp bình là PVC. Vòi bình nước có gắn viên bi mạ đồng nhằm tránh nước nhiễu xuống. Phía sau bình đựng thức ăn có nút điều chỉnh lượng thức ăn rơi xuống. Máng đựng chia ra 2 bên để hứng nước và thức ăn. Sản phẩm thích hợp cho chó cỡ trung & nhỏ & các loại mèo sử dụng.\r\nDung tích : bình nước 500ml, bình đựng thức ăn 1.25kg\r\n\r\n- Sản phẩm rất tiện dụng khi bạn vắng nhà, không sợ cún yêu sẽ khát nước hoặc đói\r\n\r\n- Sản phẩm sang trọng dùng để bảo quản thức ăn, nước uống không bị ỉu hòng ẩm mốc, giúp thú cưng ăn ngon hơn\r\n\r\n - Bình nước có thể điều chỉnh cao thấp phù hợp với thú cưng nhà bạn\r\n\r\n- Kích thước 36*34*30cm', 0),
('SP39', 'Lược Furminator', 'vat1.jpg', 36, 803000, 'Lược FURrminator là loại lược chuyên dụng được sản xuất để loại bỏ hết lớp lông chết phía sâu bên trong.\r\n\r\nLược FURminator giúp bạn:\r\n\r\nLoại bỏ 90% lông rụng bằng cách loại bỏ các sợi lông chết ở sâu bên trong mà không hề làm tổn hại lớp lông khỏe mạnh của thú cưng.\r\n\r\nGiảm thiểu dị ứng cho người sống trong nhà.\r\n\r\nGiảm thiểu việc xuất hiện các cục lông rối.\r\n\r\nHãy sử dụng lược FURminator nếu bạn mong muốn thú cưng sở hữu bộ lông mượt mà và 1 căn nhà sạch sẽ không hề vương vãi lông thú cưng khắp nơi. Hãy cân nhắc thật kỹ trước khi đưa ra qyết định lựa chọn loại lược TỐT NHẤT dành cho thú cưng của bạn.\r\n\r\nTHÔNG TIN THƯƠNG HIỆU\r\n\r\nSau nhiều năm cố gắng tìm kiếm loại dụng cụ chất lượng nhằm khắc phục hiện tượng rụng lông ở chó mèo. Angie Porter - một nhà cắt tỉa lông thú chuyên nghiệp - nhận ra rằng, vẫn chưa có một công cụ hoàn hảo nào để xử lý dứt điểm tình trạng này. Chính vì vậy, Angie và chồng - ông David - đã chế tạo và phát triển những sản phẩm đầu tiên và duy nhất có thể loại bỏ những lớp lông chết một cách an toàn, hiệu quả và tiện lợi. Chính vì vậy, FURminator deShedding được xem là giải pháp trị rụng lông thông dụng và được yêu thích nhất trên toàn cầu.\r\n\r\nĐược yêu thích bởi hàng triệu người nuôi thú trên toàn cầu, các sản phẩm của FURminator được sản xuất bằng những vật liệu tốt nhất, có chất lượng cao cấp và có mặt rộng rãi trên khắp các petshops trên toàn thế giới.', 0),
('SP4', 'Royal Canin - Chihuahua Adult', 'food7.jpg', 18, 134000, ' - Là thức ăn khô dành cho Chihuahua từ 8 tuần tuổi đến 8 tháng tuổi\r\n\r\n- Chihuahua 30 có mùi vị hấp dẫn, thơm ngon với thành phần dinh dưỡng đảm bảo và lượng vitamin, khoáng chất và chất xơ từ thiên nhiên cho chó con nguồn năng lượng và sức sống dồi dào cho ngày mới. Khứu giác của Chihuahua con vốn dĩ kém phát triển hơn so với các giống chó lớn hơn.\r\n\r\n- Hãng Royal Canin đã tạo ra Chihuahua Puppy 30, sản phẩm thức ăn dành riêng cho Chihuahua có bao gồm các loại hương vị mạnh và hương liệu có tác dụng kích thích sự ngon miệng cho Chihuahua con.\r\n\r\n- Thêm vào đó, chó con tiêu hóa thấp các proteins dẫn đến quá trình lên men trong đường ruột. Chihuahua Puppy 30 bao gồm các protein dễ tiêu hóa giúp giảm bớt số lượng và mùi hôi trong phân. Ngoài ra, các hàm nhỏ bé của Chihuahua con rất mỏng manh, do đó, hình dạng cũng như kích thước các hạt thức ăn của Chihuahua Puppy 30 nhỏ nhắn, vừa miệng, dễ dàng phá vỡ và nhai.\r\n\r\n- Cuối cùng, để hỗ trợ sự phòng thủ tự nhiên cho chó con, Chihuahua Puppy 30 đã được thêm, vào vitamin E, vitamin C và MOS giúp kích thích sản xuất kháng thể bảo vệ cơ thể Chihuahua con.\r\n\r\nNguyên Liệu:\r\n\r\nThịt gà, gạo, bột bắp gluten, gạo nâu, yến mạch, bột củ cải khô (đường bỏ đi), hương gà tự nhiên, muối, dầu cá cơm (EPA / DHA), dầu đậu nành, chất béo gà, vitamins (A, B1, B2, B6, B12, C, E, D, D3), calcium, khoáng chất (kẽm, sắt sulfat, mangan, đồng sulfat, iodat canxi, natri selenit)\r\n\r\nThành Phần Dinh Dưỡng\r\n\r\nKích Cỡ / Thể Tích: Bao 500g\r\n\r\nNhà Sản Xuất: Royal Canin\r\n\r\nXuất Xứ: Pháp\r\n\r\nTHÔNG TIN  THƯƠNG HIỆU\r\n\r\n \r\n\r\nRoyal Canin là một nhà lãnh đạo toàn cầu về dinh dưỡng sức khỏe vật nuôi. Trong một ngành công nghiệp mà tiếptục để thích ứng với xu hướng phổ biến, nhiệm vụ của chúng tôi sẽ vẫn như cũ, liên tục mang lại, thông qua dinh dưỡng Y tế và chia sẻ kiến ​​thức, giải pháp dinh dưỡng chính xác nhất cho mèo và chó về nhu cầu sức khỏe, bằng cách xây dựng liên tục làm sâu sắc thêm kiến thức khoa học và Royal Canin trong mạng lưới nghề nghiệp mèo và chó.', 0),
('SP40', '8in1 - Sữa tắm kiểm soát rụng lông Perfect Coat', 'suatam1.jpg', 86, 229000, 'Thương hiệu 8in1 đã phát triển cùng với sự đổi mới và đã cung cấp các sản phẩm chất lượng tốt nhất cho hạnh phúc, sức khoẻ và dinh dưỡng của thú cưng - một trong những mục tiêu trọng tâm của 8in1.\r\n\r\n8in1 là một thương hiệu đáng tin cậy, đáp ứng được nhu cầu của cả vật nuôi và chủ nhân trên toàn thế giới, cùng với chuyên môn 8in1 đem lại sự an tâm cho chủ vật nuôi.\r\n\r\n8in1 luôn đảm bảo 100% dành cho sức khoẻ của vật nuôi. Bởi vì những người yêu thú cưng luôn mong muốn được mang những điều tốt đẹp nhất cho thú cưng của họ và giúp chúng hạnh phúc, khỏe mạnh.', 0),
('SP41', 'Davis - Sữa tắm ngứa do nhiễm nấm Miconazole', 'suatam2.jpg', 74, 433000, 'Giới thiệu\r\n\r\nSữa tắm Miconazole điều trị viêm da, nhiễm trùng da do nấm của Davis, Mỹ. \r\n\r\nTác Dụng\r\n\r\nSữa tắm Miconazole với 2% Miconazole Nitrate và 2% Collodial Oatmeal giúp điều trị viêm da kết hợp nấm da (nấm Lác Đồng Tiền Ringworm), nhiễm trùng da do các loại nấm khác, và tróc vảy do tăng tiết nhờn. Sữa tắm Miconazole thẩm  thấu sâu, cân bằng độ ẩm, giảm đau ngứa, và không gây kích ứng. \r\n\r\nPhù Hợp Cho\r\n\r\n- Chó mèo bị nấm da ( nấm Lác Đồng Tiền Ringworm)\r\n- Chó mèo bị nhiễm trùng da do nấm\r\n\r\n- Chó mèo có da tróc vảy do tăng tiết nhờn\r\n\r\nNguyên Liệu / Thành Phần\r\n\r\nMiconazole Nitrate, Colloidal Oatmeal, Sodium Lauryl Sulfate, Propylene Glycol, Sodium Laureth Sulfate with Ethanol, EGMS Fatty Acid Esters, Coconut Based Lathering AGent, PEG Disterate, Lauramide D, Aloe Vera Whole Leaf, Cosmetic Grade Preservative, Purified Water\r\n\r\nHướng Dẫn Bảo Quản\r\n\r\n- Để nơi thoáng mát và tránh ánh sáng trực tiếp\r\n\r\n- Tránh xa tầm tay trẻ em\r\n\r\nLưu Ý\r\n\r\n- Không để chó mèo liếm trúng sữa tắm khi đang tắm\r\n\r\n- Không để sữa tắm vây vào mắt và niêm mạc khi sử dụng\r\n\r\n- Sử dụng để điều trị các bệnh về da cho thú nuôi\r\n\r\n- Nên tham khảo ý kiến Bác Sĩ Thú Y trước khi sử dụng\r\n\r\n- Nếu trường hợp da vẫn tiếp tục bị ngứa sau khi sử dụng, ngưng sử dụng và thông báo cho  Bác Sĩ Thú Y\r\n\r\nKhuyến Khích\r\n\r\n- Sử dụng vòng cổ Elizabeth khi tắm\r\n\r\n-  Kết hợp sử dụng sữa tắm Miconazole với sữa tắm Chlorhexidine để khử mùi hôi cho tình trạng da bị viêm do vi khuẩn. Có thể pha 2 loại sữa tắm thành 1 hỗn hợp và sử dụng.\r\n\r\nĐóng Gói / Thể Tích\r\n\r\nChai 355ml\r\n\r\nNhà Sản Xuất\r\n\r\nDavis\r\n\r\nThương hiệu\r\n\r\nDavis là thương hiệu chuyên cung cấp các sản phẩm đặc trị về da lông cho chó mèo như sữa tắm dưỡng lông và các dung dịch chăm sóc tai - mắt - miệng. Được thành lập năm 1982, hiện Davis có trụ sở chính tại Atlanta, Georgia, Mỹ\r\n\r\nMỹ', 0);
INSERT INTO `sanpham` (`masp`, `tensp`, `hinhanh`, `soluong`, `giatien`, `mota`, `xoa`) VALUES
('SP42', 'Davis - Sữa tắm mụn mủ nhờn Demodex', 'suatam3.jpg', 10, 315000, 'Giới thiệu\r\nSữa Tắm Benzoyl Peroxide giúp điều trị các vấn đề về r ối loạn ngoài da của Davis, Mỹ.\r\nTác Dụng\r\nSữa tắm Benzoyl Peroxide được sản xuất với 2.5% bột Benzoyl Peroxide có kích thước từ 1-3 micron, giúp thấm qua da dễ dàng, làm sạch và thúc đẩy các nang lông lưu thông, thúc đẩy làm lành da. Thêm nữa, sữa tắm Benzoyl Peroxide còn phòng ngừa tình trạng da khô và ngứa.\r\n\r\nBenzoyl Peroxide phù hợp để điều trị các tình trạng da bị tróc vảy sừng, da bị rối loạn tiết nhờn, da bị rối loạn da kết hợp với ghẻ Demodex, da bị viêm do tăng tiết chất nhờn (seborrheic dermatitis), da có mụn nước và mụn mủ (canine and feline acne).\r\n\r\nPhù Hợp Cho\r\n- Chó mèo có da bị tróc vảy sừng\r\n- Chó mèo bị rối loạn tiết nhờn\r\n- Chó mèo bị rối loạn da kết hợp với ghẻ Demodex\r\n- Chó mèo bị viêm da do tăng tiết chất nhờn\r\n- Chó mèo bị mụn nước và mụn mủ trên da \r\n\r\nLưu Ý\r\n- Sử dụng để điều trị các bệnh về da cho thú nuôi\r\n- Nên tham khảo ý kiến Bác Sĩ Thú Y trước khi sử dụng\r\n \r\nĐóng Gói / Thể Tích\r\nChai 355ml\r\nNhà Sản Xuất\r\nDavis\r\nThương hiệu\r\nDavis là thương hiệu chuyên cung cấp các sản phẩm đặc trị về da lông cho chó mèo như sữa tắm dưỡng lông và các dung dịch chăm sóc tai - mắt - miệng. Được thành lập năm 1982, hiện Davis có trụ sở chính tại Atlanta, Georgia, Mỹ.\r\n\r\nXuất Xứ\r\nMỹ', 0),
('SP43', 'Xịt khử mùi diệt khuẩn Natural clean', 'suatam5.jpg', 31, 200000, 'Hầu hết mọi người đều sử dụng sản phẩm khử mùi, diệt khuẩn trong không gian sinh hoạt chung của gia đình. Nếu sản phẩm này được làm từ các thành phần hóa học sẽ rất có hại cho sức khỏe các thành viên trong gia đình cũng như vật nuôi.', 0),
('SP44', 'YU - Tắm Khô Mẫu Đơn', 'suatam4.jpg', 23, 180000, 'XỊT TẮM KHÔ HƯƠNG NƯỚC HOA DÀNH CHO THÚ CƯNG\r\n\r\nXịt tắm khô cho chó, mèo thường được sử dụng khi các chú chó, mèo đang bị bệnh và trong quá trình điều trị hoặc đang mang thai không thể tắm với nước được. Với việc sử dụng xịt tắm khô này các bạn có thể yên tâm vì sản phẩm này vẫn giúp các bé sạch sẽ, khử mùi hôi\r\nTác dụng của sữa tắm khô đối với chó, mèo:\r\n+ Giúp diệt vi khuẩn trên chó, mèo mà không cần đến nước\r\n+ Làm sạch và chăm sóc bảo vệ bề mặt bên ngoài da của chó, mèo\r\n+ Sản phẩm giúp lông luôn mềm mại và đem lại hương thơm dịu mát, nồng nàn\r\n--- có hương hoa anh đào & hoa mẫu đơn ---\r\nMade in USA', 0),
('SP45', 'Bio - Sữa tắm Biocare', 'suatam6.jpg', 22, 81000, 'THÀNH PHẦN:\r\nPermethrin\r\nSodium Lauryl Ether Sulfate, Citric Acid,\r\nPolyquaternium, mùi, nước tinh khiết vừa đủ.\r\n\r\nCÔNG DỤNG: Dùng để tắm cho chó và mèo.\r\n\r\nTẩy sạch ve, rận, bọ chét.\r\n\r\nKhử mùi hôi lông, giúp lông óng mượt.\r\n\r\nGiữ da luôn khỏe mạnh.\r\n\r\nCÁCH DÙNG: Chó, mèo:\r\n\r\nLàm ướt toàn bộ lông, cho dầu tắm lên lông và xát đều trong 1-2 phút. Chú ý đến các vùng có nhiều ve như kẽ móng chân, cổ, tai. Để yên 5 phút rồi tắm sạch bằng nước thường. Lau và để khô tự nhiên.\r\n\r\nLƯU Ý: Thuốc dùng ngoài.\r\n\r\nKhông dùng cho chó, mèo con mới sanh .\r\n\r\nTránh để dầu tắm tiếp xúc với mắt của chó, mèo.\r\n\r\nRửa sạch tay sau khi tắm chó, mèo.\r\n\r\nĐể dầu tắm cách xa trẻ em.\r\n\r\nBẢO QUẢN: Nơi khô thoáng, nhiệt độ không quá 30oC.', 0),
('SP46', 'Sữa tắm 8in1 Perfect Coat yến mạch', 'suatam7.jpg', 42, 229000, 'GIỚI THIỆU VỀ 8in1:\r\nThương hiệu 8in1 đã phát triển cùng với sự đổi mới và đã cung cấp các sản phẩm chất lượng tốt nhất cho hạnh phúc, sức khoẻ và dinh dưỡng của thú cưng - một trong những mục tiêu trọng tâm của 8in1.\r\n\r\n8in1 là một thương hiệu đáng tin cậy, đáp ứng được nhu cầu của cả vật nuôi và chủ nhân trên toàn thế giới, cùng với chuyên môn 8in1 đem lại sự an tâm cho chủ vật nuôi.\r\n\r\n8in1 luôn đảm bảo 100% dành cho sức khoẻ của vật nuôi. Bởi vì những người yêu thú cưng luôn mong muốn được mang những điều tốt đẹp nhất cho thú cưng của họ và giúp chúng hạnh phúc, khỏe mạnh.', 0),
('SP47', 'Sữa tắm Furminator', 'suatam8.jpg', 46, 324000, 'Sau nhiều năm cố gắng tìm kiếm loại dụng cụ chất lượng nhằm khắc phục hiện tượng rụng lông ở chó mèo. Angie Porter - một nhà cắt tỉa lông thú chuyên nghiệp - nhận ra rằng, vẫn chưa có một công cụ hoàn hảo nào để xử lý dứt điểm tình trạng này. Chính vì vậy, Angie và chồng - ông David - đã chế tạo và phát triển những sản phẩm đầu tiên và duy nhất có thể loại bỏ những lớp lông chết một cách an toàn, hiệu quả và tiện lợi. Chính vì vậy, FURminator deShedding được xem là giải pháp trị rụng lông thông dụng và được yêu thích nhất trên toàn cầu.\r\n\r\nĐược yêu thích bởi hàng triệu người nuôi thú trên toàn cầu, các sản phẩm của FURminator được sản xuất bằng những vật liệu tốt nhất, có chất lượng cao cấp và có mặt rộng rãi trên khắp các petshops trên toàn thế giới.', 0),
('SP48', 'Xịt vệ sinh khử mùi môi trường Simbae Country Grove', 'suatam9.jpg', 0, 184000, 'Thật tuyệt vời khi có thú cưng chơi loanh quanh trong nhà bạn. Tuy chúng có thể để lại vết bẩn và vi trùng, nhưng bạn đừng lo! Sản phẩm Xịt vệ sinh khử trùng của Simbae sẽ giúp bạn khử trùng những nơi dơ bẩn cũng như những nơi thú cưng thích lui tới. Sản phẩm này rất dễ sử dụng, hoạt động nhanh, dễ lau chùi. Điều đó có nghĩa là bạn có thể thoải mái chia sẻ không gian sống trong gia đình mình với những người bạn nhỏ.\r\n\r\nHƯỚNG DẪN SỬ DỤNG\r\n\r\nLắc đều chai trước khi sử dụng. Xịt lên bất kỳ bề mặt nào, dùng vải khô hoặc ướt lau sạch.\r\n\r\nThích hợp với tất cả chất liệu bề mặt, tường, khu vực ẩm ướt, chuồng ổ của thú cưng.\r\n\r\nĐẶC ĐIỂM VÀ LỢI ÍCH\r\n\r\nKhông chứa cồn, an toàn khi sử dụng ở khu vực có chó mèo\r\nTác dụng kép - vừa khử mùi vừa giúp vệ sinh sạch sẽ\r\nChỉ cần 2 bước đơn giản: xịt & lau lại\r\nAn toàn khi xịt lên bề mặt vải\r\nThấm hút nhanh, hương thơm dịu nhẹ\r\nỨNG DỤNG\r\n\r\nXịt khử mùi môi trường\r\n\r\nỔ vệ sinh - Xịt trực tiếp vào ổ vệ sinh để khử mùi hôi.\r\n\r\nMùi hôi trong không khí: Chỉ cần xịt vào không khí để khử mùi hôi.\r\n\r\nMùi hôi trên vải: Xịt đều lên bề mặt vải cho đến khi ẩm ướt. Không nên xịt lên những loại vải dễ bị biến dạng.\r\n\r\nBề mặt cứng - Xịt đều lên bề mặt cho đến khi ẩm ướt. Dùng vải lau sạch.', 0),
('SP49', 'Pet-Đồ chơi bóng tròn', 'do5.jpg', 67, 28000, '+ Đồ chơi cho thú cưng mỗi khi chủ vắng nhà.\r\n\r\n+ Làm từ chất liệu an toàn, màu sắc thu hút, giúp thú cưng hăng say chơi với quả bóng, tạo sự vận động khỏe mạnh và nhanh nhẹn\r\n\r\n+ Sản phẩm có thiết kế đẹp mắt, các hình nổi tạo sự ma sát giúp thú cưng dễ vờn nghịch mà ko sợ trơn tuột mất.\r\n\r\n+ Quả bóng cho chó mèo, ngộ nghĩnh, màu sắc đẹp, hấp dẫn, chất liệu bền, không độc hại,', 0),
('SP5', 'Royal Canin - Maxi Adult', 'food3.jpg', 32, 138000, 'Thức ăn khô cho chó Royal Canin Maxi Adult túi 1kg\r\n\r\nlà sản phẩm thức ăn cho chó rottweiler, thức ăn cho chó becgie, thức ăn cho chó alaska và các loại chó cỡ lớn trưởng thành từ 14 tháng tuổi đến 5 tuổi có trọng lượng từ 25 - 50 kg.\r\n\r\n \r\nThức ăn cho chó Rottweiler Royal Canin Maxi Adult\r\n- Ngay cả trong tuổi trưởng thành, chó trưởng thành giống lớn vẫn có thể bị ảnh hưởng của những dấu hiệu lão hóa sớm, chẳng hạn bị nhạy cảm các sụn khớp xương, gặp những vấn đề về tim hoặc hệ tiêu hóa. Nghiên cứu chỉ ra rằng glucosamine hydrochloride và chondroitin sulfate - các hợp chất tự nhiên sinh ra trong cơ thể - giúp duy trì sức khỏe sụn khớp.\r\n\r\n+ Vitamin E và vitamin C - các hợp chất quan trọng với chức năng chống oxy hóa tự nhiên trong tế bào - giúp giống chó lớn duy trì sức khỏe tốt nhất trong cuộc sống. Thức ăn khô Maxi Large Breed Adult cung cấp cho chó trưởng thành giống lớn một chế độ ăn uống đầy đủ acidamin tối ưu giúp cơ thể khỏe mạnh và tràn đầy sức sống.\r\n\r\n \r\n\r\n Nguyên Liệu:\r\n\r\nThịt gà, gạo, ngô, bột bắp gluten, gạo nâu, yến mạch, bột củ cải khô (đường bỏ đi), hương gà tự nhiên, muối, dầu cá cơm (EPA / DHA), dầu đậu nành, chất béo gà, vitamins (A, B1, B2, B6, B12, C, E, D, D3), calcium, khoáng chất (kẽm, sắt sulfat, mangan, đồng sulfat, iodat canxi, natri selenit)\r\n\r\nXuất Xứ: Pháp\r\n\r\nTHÔNG TIN  THƯƠNG HIỆU ROYAL CANIN - PHÁP\r\n\r\nRoyal Canin là một người khổng lồ trên toàn cầu về dinh dưỡng sức khỏe vật nuôi có trụ sở tại Pháp. Trong một ngành công nghiệp mà tiếp tục để thích ứng với xu hướng phổ biến, nhiệm vụ của chúng tôi sẽ vẫn là liên tục mang lại, thông qua dinh dưỡng Y tế và chia sẻ kiến ​​thức, giải pháp dinh dưỡng chính xác nhất cho mèo và chó về nhu cầu sức khỏe, bằng cách xây dựng liên tục làm sâu sắc thêm kiến thức khoa học trong ngành công nghiệp phục vụ chó mèo.', 0),
('SP50', 'Afp - Đồ chơi mèo hình chuột CATZILLA', 'do3.jpg', 61, 126000, 'GIỚI THIỆU VỀ AFP:\r\nĐược thành lập từ năm 1997, với 20 năm kinh nghiệm, mục tiêu của AFP và Pawise là cung cấp các sản phẩm dành cho thú cưng với chất lượng tốt nhất, an toàn nhất với 95% sản phẩm đã được xuất khẩu sang thị trường Châu Âu và Châu Mỹ.\r\n\r\nAFP và Pawise luôn cố gắng hết sức để thiết kế những sản phẩm nhằm đáp ứng các nhu cầu của vật nuôi cũng như phù hợp với phong cách của chủ nhân.\r\n\r\nVới các nhà thiết kế đầy tính sáng tạo giàu kinh nghiệm, nhân viên chuyên nghiệp và đội ngũ quản lý có năng lực, AFP và Pawise đang khẳng định vị thế của mình trong lĩnh vực chăm sóc thú cưng, mong muốn mang đến những sản phẩm an toàn, đáng tin cậy cùng dịch vụ hiệu quả.', 0),
('SP51', 'Đĩa bay vải Petstar hình dấu chân', 'do8.jpg', 7, 30000, 'Đĩa bay dù cho chó mèo\r\n\r\nĐĩa bay dù đồ chơi cho thú cưng, chó mèo nhà bạn sẽ tha hồ đùa vui với đồ chơi ngộ nghĩnh, hấp dẫn, đẹp. Bán rẻ nhất tại PetCity.vn\r\n\r\n+ Dùng để chơi đùa cùng thú cưng của bạn.\r\n\r\n+ Đủ màu sắc ngộ nghĩnh đáng yêu, thu hút thú cưng nhà bạn chơi đùa cùng đĩa bay dù, tăng cương khả năng vận động hoạt bát của thú cưng.\r\n\r\n+ Đĩa bay dù đồ chơi cho thú cưng, kiểu dáng và màu sắc đẹp, hấp dẫn thú cưng nhà bạn, chất liệu bền, chắc chắn', 0),
('SP52', 'Kong - Núm vú puppy', 'do7.jpg', 54, 211000, 'GIỚI THIỆU VỀ KONG:\r\n\r\nSự cần thiết và tình yêu chính là phát minh vĩ đại của KONG\r\n\r\nNgười sáng lập KONG, Joe Markham, rất yêu chú chó của mình, Fritz, nhưng ông lại không thích thói quen cắn phá và nhai mòn các đồ vật của Fritz. Những chú chó khác có thể nhai giày hoặc túi xách yêu thích của bạn, Fritz lại thích đá, gậy và các đồ vật khác. \r\n\r\nTrong một lần tình cờ ném các bộ phận xe để Fritz có thể tránh khỏi những tảng đá, Joe đã phát hiện sự dẻo dai của cao su và từ đó lấy cảm hứng cho các sản phẩm của KONG.', 0),
('SP53', 'AFP - Xương/bánh thưởng Treat Krazy Crunch', 'do6.jpg', 46, 322000, 'GIỚI THIỆU VỀ AFP:\r\nĐược thành lập từ năm 1997, với 20 năm kinh nghiệm, mục tiêu của AFP và Pawise là cung cấp các sản phẩm dành cho thú cưng với chất lượng tốt nhất, an toàn nhất với 95% sản phẩm đã được xuất khẩu sang thị trường Châu Âu và Châu Mỹ.\r\n\r\nAFP và Pawise luôn cố gắng hết sức để thiết kế những sản phẩm nhằm đáp ứng các nhu cầu của vật nuôi cũng như phù hợp với phong cách của chủ nhân.\r\n\r\nVới các nhà thiết kế đầy tính sáng tạo giàu kinh nghiệm, nhân viên chuyên nghiệp và đội ngũ quản lý có năng lực, AFP và Pawise đang khẳng định vị thế của mình trong lĩnh vực chăm sóc thú cưng, mong muốn mang đến những sản phẩm an toàn, đáng tin cậy cùng dịch vụ hiệu quả.', 0),
('SP54', 'Đồ chơi AFP xí ngầu', 'do4.jpg', 71, 156000, 'Được thành lập từ năm 1997, với 20 năm kinh nghiệm, mục tiêu của AFP và Pawise là cung cấp các sản phẩm dành cho thú cưng với chất lượng tốt nhất, an toàn nhất với 95% sản phẩm đã được xuất khẩu sang thị trường Châu Âu và Châu Mỹ.\r\n\r\nAFP và Pawise luôn cố gắng hết sức để thiết kế những sản phẩm nhằm đáp ứng các nhu cầu của vật nuôi cũng như phù hợp với phong cách của chủ nhân.\r\n\r\nVới các nhà thiết kế đầy tính sáng tạo giàu kinh nghiệm, nhân viên chuyên nghiệp và đội ngũ quản lý có năng lực, AFP và Pawise đang khẳng định vị thế của mình trong lĩnh vực chăm sóc thú cưng, mong muốn mang đến những sản phẩm an toàn, đáng tin cậy cùng dịch vụ hiệu quả.', 0),
('SP55', 'Lật đật cao su', 'do2.jpg', 15, 48000, 'Mô tả :\r\n\r\n- Sản phẩm an toàn, có màu sắc thu hút cùng trọng lượng nhẹ sẽ giúp cho thú cưng dễ dàng di chuyển.\r\n\r\n- Thiết kế hình lật đật  ngộ nghĩnh có gai mềm tốt cho răng, bạn sẽ không phải lo lắng cho sức khỏe của thú cưng nhà mình.\r\n\r\n- Là sản phẩm lý tưởng, đem lại những giờ vui chơi, thư giãn bên chú thú cưng đáng yêu của bạn, giúp thú cưng có thể tận hưởng thời gian vui chơi, tạo sự vận động khỏe mạnh và nhanh nhẹn hơn.', 0),
('SP56', 'Pet-Đồ chơi cử tạ', 'do1.jpg', 65, 27000, 'Đặc điểm nổi bật:\r\n\r\nSản phẩm đồ chơi cho chó mèo với chất liệu bằng cói tự nhiên rất an toàn và không gây độc hại. Không những chỉ có tính năng làm đồ chơi, sản phẩm còn giúp chó, mèo của bạn trở nên hoạt bát hơn, năng động hơn. Đồng thời còn có tác dụng để kích thích và định hướng chó, mèo cào mài móng của mình, tránh làm hỏng hóc các đồ vật trong nhà. Đặc biệt nó còn gây tiếng động có tác dụng kích thích sự tò mò tự nhiên của mèo, giúp phát triển toàn diện hơn.', 0),
('SP57', 'SY - Nệm vòm cao cấp nhiều màu', 'giuong2.jpg', 80, 510000, '', 0),
('SP58', 'LHK - Nệm hình chân chó', 'giuong1.jpg', 1, 286000, '-Với nhiều người, chó mèo không chỉ là động vật giúp giữ nhà, đuổi chuột mà còn là người bạn nhỏ thân thiết và rất trung thành.\r\n\r\n-Do đó, hãy thể hiện tình yêu thương của bạn dành cho “người bạn nhỏ” đáng yêu này bằng cách trang bị cho chúng một chiếc nệm êm ái và xinh xắn của ABC để thú cưng có một nơi thư giãn thật thoải mái.\r\n\r\nĐặc điểm nổi bật\r\n\r\n- Chất liệu cotton thông thoáng, dễ vệ sinh, rất phù hợp với khí hậu nóng ẩm ở Việt Nam.\r\n\r\n- Bề mặt nằm có 2 lớp nệm tạo sự êm ái, thú cưng nhà bạn sẽ luôn có cảm giác được nâng niu và yêu chiều.\r\n\r\n- Thiết kế nệm hình chân chó sinh động với gam màu nổi bật và họa tiết sọc ngộ nghĩnh mang đến sự thích thú cho chú cún đáng yêu trong nhà.', 0),
('SP59', 'Petstar - Nệm chữ nhật', 'giuong3.jpg', 71, 150000, '+ Với nhiều người, chó mèo không chỉ là động vật giúp giữ nhà, đuổi chuột mà còn là người bạn nhỏ thân thiết và rất trung thành.\r\n\r\n+ Do đó, hãy thể hiện tình yêu thương của bạn dành cho “người bạn nhỏ” đáng yêu này bằng cách trang bị cho chúng một chiếc nệm nằm êm ái và xinh xắn để thú cưng có một nơi thư giãn thật thoải mái.\r\n\r\nBề mặt nằm có lớp bông tạo sự êm ái, thú cưng nhà bạn sẽ luôn có cảm giác được nâng niu và yêu chiều và luôn được giữ ấm.\r\n\r\n- Thiết kế nệm hình dáng sinh động với gam màu nổi bật sẽ đem lại sự thich thú cho thú cưng.', 0),
('SP6', 'Royal Canin - Mini Adult', '756_thuc_an_kho_royal_canin_mini_adult_2.png', 47, 147000, 'Là thức ăn cho chó Phốc, thức ăn cho chó Nhật và các giống chó cỡ nhỏ từ 10 tháng đến  8 tuổi\r\n\r\nThức ăn cho chó Phốc Royal Canin Mini Adult\r\n\r\n - Là sản phẩm thức ăn khô dành cho giống chó cỡ nhỏ từ 10 tháng đến  8 tuổi có trọng lượng từ 4 - 10 kg\r\n\r\n- Giống chó nhỏ thường rất năng động và ham chơi nên chúng thường sử nhiều năng lượng. Vì lí do này, chúng rất cần một nguồn dinh dưỡng cung cấp năng lượng phù hợp để cuộc sống trở nên năng động hơn và khỏe mạnh hơn.\r\n\r\n- Mini Adult được sản xuất với công thức đặc biệt và hương vị độc quyền kích thích sự them ăn và ngon miệng của người bạn bốn chân của bạn. Thêm vào đó, các EPA và DHA chứa trong các hạt hỗ trợ da lông khỏe mạnh và bóng mượt.\r\n\r\n- Ngoài ra, Mini Adult không những giúp giảm ke và hình thành cao răng đáng kể với các hạt thức ăn dạng chữ X mà còn hỗ trợ duy trì cân nặng lý tưởng cho những người bạn bốn chân bé nhỏ.\r\n\r\nĐối Tượng Sử Dụng: Chó cỡ nhỏ từ 10 tháng tuổi đến 8 tuổi có trọng lượng từ 4 - 10kg (9 – 22 lbs).\r\n\r\nNguyên Liệu làm nên thức ăn khô Royal Canin Mini Adult\r\n\r\nThịt gà, gạo, ngô, bột bắp gluten, gạo lứt, yến mạch, bột củ cải khô (đường bỏ đi), dầu cá, dầu thực vật, chất béo gà, vitamins (B1, B2, B6, B12, C, E), calcium, khoáng chất (kẽm, sắt sulfat, mangan, đồng sulfat, iodat canxi, natri selenit) và L-carnitine.\r\n\r\nNhà Sản Xuất: Royal Canin\r\n\r\nXuất Xứ: Pháp\r\n\r\nTHÔNG TIN  THƯƠNG HIỆU\r\n\r\nRoyal Canin là một nhà lãnh đạo toàn cầu về dinh dưỡng sức khỏe vật nuôi. Trong một ngành công nghiệp mà tiếp tục để thích ứng với xu hướng phổ biến, nhiệm vụ của chúng tôi sẽ vẫn như cũ, liên tục mang lại, thông qua dinh dưỡng Y tế và chia sẻ kiến ​​thức, giải pháp dinh dưỡng chính xác nhất cho mèo và chó về nhu cầu sức khỏe, bằng cách xây dựng liên tục làm sâu sắc thêm kiến thức khoa học và Royal Canin trong mạng lưới nghề nghiệp mèo và chó.', 0),
('SP60', 'Petstar - Thảm nằm', 'giuong5.jpg', 23, 140000, 'Dùng để trải nền hoặc lót sàn chuồng trong những ngày đông lạnh giá\r\n\r\nThảm nằm cho chó  àm từ chất liệu: vải – bông hoàn toàn an toàn cho sức khỏe của vật nuôi.\r\n\r\nChất liệu cao cấp bền màu, êm, được may bằng những đường may tỉ mỉ, tinh tế, tạo độ bền cao cho sản phẩm, nhưng vẫn giữ được độ êm ái cần thiết cho Pet yêu của bạn.giặt nhanh khô, màu sắc sạch sẽ, khó bám bẩn\r\n\r\nTổng thể chiếc Thảm bắt mắt mọi ánh nhìn sẽ là điểm nhấn trang trí cho chỗ ngủ của Pet cưng.\r\n\r\nTác dụng: cho Pet cưng của bạn giấc ngủ ngon và ấm áp. Đảm bảo sức khỏe của chó mèo đặc biệt vào những ngày lạnh', 0),
('SP61', 'Ferplast - Vali ATLAS PROFESSIONAL', 'giuong7.jpg', 75, 5090000, 'GIỚI THIỆU VỀ FERPLAST:\r\nFerplast, có trụ sở tại Castelgomberto (tỉnh Vicenza - Ý), được thành lập vào năm 1966 bởi Carlo Vaccari. Trong 50 năm, Ferplast đã tham gia nghiên cứu và tạo ra các sản phẩm sáng tạo, an toàn với chất lượng cao nhằm đảm bảo cho sự chăm sóc thoải mái của vật nuôi. Công ty dành nhiều khoản đầu tư đáng kể cho nghiên cứu những công nghệ tiên tiến cho việc sản xuất.\r\n\r\nLà một doanh nghiệp thương mại điển hình của vùng Đông Bắc nước Ý, ngày nay Ferplast sản xuất hơn 2000 loại sản phẩm, có khoảng 1.000 nhân viên, phân phối không dưới 80 quốc gia trên thế giới và có chi nhánh tại Ý, Pháp, Đức, Anh, Scandinavia, Ba Lan, Ukraina, Slovakia, Nga, Benelux và Brazil, có 3 nhà máy sản xuất ở Ý, Ukraina và Cộng hòa Slovak.\r\n\r\nGIỚI THIỆU VỀ SẢN PHẨM:\r\nVali đạt chuẩn qui định IATA giúp có thể vận chuyển dễ dàng thú cưng khi đi máy bay, tàu thủy hoặc tàu hỏa. Với thiết kế khóa an toàn, tay cầm tiện lợi cùng với loại nhựa tốt đến từ Ý sẽ tạo sự an toàn nhất cho thú cưng. ', 0),
('SP62', 'Lồng bánh xe', 'giuong6.jpg', 3, 825000, '- Lồng bánh xe kiểu dáng và màu sắc đẹp, hấp dẫn thú cưng nhà bạn, chất liệu bền, chắc chắn, nhiều màu sắc cho bạn lựa chọn, bán rẻ nhất tại PetCity.vn.\r\n\r\n- Có bánh xe, cổng to\r\n\r\n- Dễ sử dụng, lồng cứng thoải mái cho chó mèo vận động bên trong mà không sợ kích ứng\r\n\r\n- Giúp bạn đi đâu cũng có thể mang thú cưng đi bên cạnh mình một cách thoải mái nhất, tiện lợi nhất\r\n\r\n- Thiết kế chắc chắn, hiện đại mang phong cách thời trang\r\n\r\n- Lồng bánh xe sẽ là đồ dùng yêu thích của thú cưng, giúp chúng ngoan ngoãn và nghe lời hơn. Sản phẩm cần thiết cho mọi gia đình có vật nuôi.', 0),
('SP63', 'Nệm nằm Petdream', 'giuong4.jpg', 93, 172000, 'Nệm nằm Petdream 60*50*7cm\r\n+ Với nhiều người, chó mèo không chỉ là động vật giúp giữ nhà, đuổi chuột mà còn là người bạn nhỏ thân thiết và rất trung thành.\r\n\r\n+ Do đó, hãy thể hiện tình yêu thương của bạn dành cho “người bạn nhỏ” đáng yêu này bằng cách trang bị cho chúng một ngôi nhà nhỏ, ấm cúng và êm ái để thú cưng có một nơi thư giãn thật thoải mái.\r\n\r\nĐẶC ĐIỂM NỔI BẬT\r\n- Nệm nằm Petdream được làm từ chất liệu cotton thông thoáng, dễ vệ sinh và phù hợp với khí hậu nóng ẩm ở Việt Nam.\r\n\r\n- Bề mặt nằm có lớp lót cotton êm cùng thiết kế bao quanh nhằm tạo cho thú cưng của bạn cảm giác được che chở an toàn và ấm áp.\r\n- Nệm cho thú cưng sử dụng gam màu trung tính, sạch sẽ, đây chắc chắn sẽ là nơi thư giãn lý tưởng, làm hài lòng những chú cún con xinh xắn.', 0),
('SP64', 'Thức ăn cho mèo cat\'s Eye', 'foodcat1.jpg', 55, 166000, '* Dành cho mèo trên 3 tháng tuổi\r\n\r\n* Tiêu hóa tốt\r\n\r\n* Hỗ trợ, tăng cường hệ miễn dịch\r\n\r\n* Chất xơ tự nhiên, kiểm soát rụng lông\r\n\r\n* Giúp da khỏe, lông bóng mượt và giảm chứng rụng lông\r\n\r\nCat\'s eye được phối trộn đặc biệt dành cho mèo mọi lứa tuổi để giảm chứng rụng lông, cải thiện bộ lông mèo và cải thiện tiêu hóa. Với những thành phần dễ tiêu hóa và cực kỳ ngon miệng sẽ giúp tăng cường hệ thống miễn dịch, cải thiện khả năng hấp thụ dinh dưỡng, tăng cường sức khỏe đại tràng và giảm lãng phí thức ăn ăn vào của mèo.\r\n\r\n* Công thức chứa chất xơ tự nhiên và bột củ cải đường giúp kiểm soát chứng rụng lông.\r\n\r\n* Vitamin A và taurine cho đôi mắt tươi sáng, khỏe và thị lực tốt\r\n\r\n* Dinh dưỡng hoàn chỉnh với chất chống oxy hóa quan trọng và giàu đạm chất lượng cao.\r\n\r\n* Dễ tiêu hóa, giúp mèo hấp thụ tối đa dinh dưỡng từ các thực phẩm có ích, tránh lãng phí thức ăn.\r\n\r\n* Thịt gà chất lượng cao giúp mèo ăn ngon miệng hơn. Không màu và hương liệu nhân tạo.', 0),
('SP65', 'Thức ăn cao cấp NutriSource thị gà thịt vịt và đậu hà lan', 'foodcat6.jpg', 95, 25000, '- Thức ăn cao cấp hoàn chỉnh cho mèo : Thịt Gà , Vịt Tươi, Đậu Hà Lan.\r\n\r\n- Không chứa các thành phần ngũ cốc gây dị ứng (GRAIN FREE).\r\n\r\n- Phù hợp cho tất cả các giai đoạn tăng trưởng.\r\n\r\n- Dành cho tất cả các giống mèo có thể trọng từ 0.9 - 6.4 Kg.\r\n\r\n- Trọng lượng : 142g / gói\r\n\r\n- Xuất xứ : Tuffy\'s Pet Foods, Inc. USA', 0),
('SP66', 'Thức ăn cao cấp NutriSource cá hồi và gan', 'foodcat5.jpg', 6, 160000, '- Thức ăn cao cấp hỗn hợp hoàn chỉnh cho mèo : Thịt gà tươi + Cá hồi +  Gan\r\n\r\n- Phù hợp cho giai đoạn từ sơ sinh đến trưởng thành.\r\n\r\n- Dành cho tất cả các giống mèo có thể trọng từ 0.9 - 6.4 Kg.\r\n\r\n- Trọng lượng : 142g / gói.\r\n\r\n- Xuất xứ : Tuffy\'s Pet Foods, Inc. USA', 0),
('SP67', 'Viên dinh dưỡng Hairball for cats', 'foodcat7.jpg', 52, 160000, 'HAIRBALL FOR CATS - DA KHỎE LÔNG MƯỚT - HẾT SỢ BÚI LÔNG\r\nTỪ NAY ĐÃ CÓ HAIRBALL FOR CATS\r\n\r\n+ HAIRBALL FOR CATS là sản phẩm độc đáo (state-of-the-art formula) giúp lông da khoẻ mạnh tối ưu\r\n\r\n+ HAIRBALL FOR CATS là viên mềm hình cá mùi hấp dẫn, mèo khoái ăn\r\n\r\n+ HAIRBALL FOR CATS là tối quan trọng để hỗ trợ độ đàn hồi và vẻ đẹp của da, sức khoẻ của lông.\r\n\r\n+ HAIRBALL FOR CATS giải quyết các vấn đề xảy ra cho mèo cưng, giúp da khoẻ, dạ dày ruột khoẻ và đường niệu khoẻ.\r\n\r\n+ HAIRBALL FOR CATS – viên hình cá mềm là khác biệt:\r\n\r\n1. KHÔNG phải “thuốc nhuận tràng” hoặc “ thuốc bôi trơn”, vì những thuốc này làm hỏng sự tiêu hoá bình thường của mèo.\r\n\r\n2. KHÔNG chứa dầu khoáng chất (vì loại này làm hỏng sự tiêu hoá bình thường và ngăn hấp thu dưỡng chất)\r\n\r\n3. KHÔNG chứa các dược thảo lợi tiểu vì có thể làm rối loạn chức năng lông da, làm tăng nguy cơ hình thành búi lông.\r\n\r\n+ HAIRBALL FOR CATS – hỗ trợ sức khoẻ lông da:\r\n\r\n- Lecithin hỗ trợ sức khoẻ da, lông, móng cũng như độ ẩm và co giãn của da.\r\n\r\n- Sức khoẻ của lông ảnh hưởng trực tiếp làm thế nào để lông mọc, hoạt động và rụng đi. Thiếu Lecithin làm da mất tính đàn hồi, khô, tróc vảy, gia tăng rụng lông, mất màu, xơ xác, thiếu mọc lông mọc lại.\r\n\r\n- Omega 3 & 6 Fatty Acids cùng với Lecithin hỗ trợ độ ẩm và co giãn của da và sức khoẻ của lông và cũng đồng thời hỗ trợ cho ống dạ dày- ruột\r\n\r\n- Biotin cần thiết cho sức khoẻ của da và lông\r\n\r\n- Zinc được đòi hỏi trong sự sản sinh keratin và collagen, những thành phần quan trọng cho sức khoẻ của da và lông. Kẽm cần cho biến dưỡng a xít béo. Nó cũng giúp duy trì sức khoẻ mô da và nang lông.\r\n\r\n- Cranberry Powder giúp hỗ trợ ống niệu.\r\n\r\n- Psyllium là một loại xơ hoà tan giúp cho chức năng hoạt động và sức khoẻ hệ tiêu hoá.\r\n\r\n+ Thành phần đảm bảo mỗi 2 viên (3.0 gr):\r\n\r\n- Độ ẩm (max) 85%\r\n\r\n- Zinc (144 mg) 0.4 mg\r\n\r\n- Biotin 0.026 mg\r\n\r\n- Omega 6 150 mg\r\n\r\n- Omega 3 30 mg\r\n\r\n- Lecithin 100 mg\r\n\r\nThành phần nguyên liệu: brewers dried yeast, natural chicken liver flavor, glycerin, safflower oil, flaxseedoil, whey, lecithin, psyllium powder, cranberry extract, maltodextrins, sodium alginate, calcium sulfate, zinc proteinate, propionic acid (a preservative), biotin, mixed tocopherols (a preservative).\r\n\r\nHướng dẫn sử dụng: phù hợp với mọi giống mèo\r\n\r\nLàm đẹp da và lông: 2 cây gặm mềm / ngày\r\n\r\nBúi lông: cho 4 cây/ ngày chia làm 2 lần trong 2-4 ngày\r\n\r\nQuy cách: sản phẩm tính theo trọng lượng 67.5 gr/ gói, không tính theo viên\r\n\r\nBảo quản: giữ nơi khô ráo, thoáng mát. Để cách xa trẻ em.', 0),
('SP68', 'Me-O - Thức ăn Meo kitten', 'foodcat2.jpg', 41, 116000, 'Thức ăn cho mèo con Me-o Kitten túi 1,1kg\r\nCung cấp đầy đủ các loại dinh dưỡng giúp thú cưng luôn khỏe mạnh, vui tươi và lanh lợi, cùng với chi phí hợp lý, ổn định và dễ kiểm soát được lượng thức ăn đầy đủ trong mỗi bữa ăn tùy theo trọng lượng, giống loài và tuổi của thú cưng.\r\n\r\nBảo đảm an toàn, không bị hư hỏngkhi để bên ngoài và thời gian bảo quản sử dụng lâu(18 tháng), giúp giử vệ sinh, giảm sự tích tụ cao răng làm hư răng và đặc biệt nhất là giúp chất thải (phân) của thú cưng giảm hẳn những mùi khó chịu từ phân mèo\r\n\r\n \r\n\r\n- Nhập khẩu hàng Thái Lan', 0),
('SP69', 'Thức ăn cho mèo Home cat', 'foodcat4.jpg', 47, 203000, 'Thức ăn cho mèo Home & Cat nhập khẩu từ Hàn Quốc được chế biến đặc biệt dành cho mèo ở mọi độ tuổi giúp cải thiện da lông, tăng cường tiêu hóa và loại bỏ lông vón cục trong ruột mèo. Sản phẩm sử dụng nguyên liệu cao cấp dễ dàng tiêu hóa mang đến hương vị thơm ngon nhất đồng thời giúp cải thiện hệ miễn dịch, kích thích hoạt tính sinh học, nâng cao khả năng hấp thụ dinh dưỡng, tăng cường sức khỏe đường ruột và giảm lượng đào thải\r\nĐối tượng sử dụng\r\n\r\nMèo từ 5 tháng tuổi trở lên\r\n\r\nĐặc điểm nổi bật\r\n\r\n– Loại bỏ lông vón cục : Hỗ trợ loại bỏ lông vón cục nhờ thành phần chất xơ tự nhiên và bột củ cải đường.\r\n\r\n– Cải thiện thị lực, cho đôi mắt khỏe mạnh : Thành phần taurin và vitamin A giúp mắt mèo sáng khỏe và cải thiện thị lực.\r\n\r\n– Cải thiện hệ miễn dịch : Hàm lượng đạm cao cấp và chất chống oxy hóa cân bằng giúp cải thiện hệ miễn dịch của mèo.\r\n\r\n– Hệ tiêu hóa khỏe mạnh : Sản phẩm được chế biến đặc biệt để tăng cường khả năng tiêu hóa giúp mèo hấp thụ dinh dưỡng tối ưu và giảm tối thiểu lượng đào thải.\r\n\r\n– Da lông khỏe mạnh mềm mượt : Thành phần hạt lanh, hàm lượng axit béo Omega cân bằng từ thịt cá, vitamin A và hàm lượng đạm cao cấp giúp mèo có một làn da khỏe mạnh và bộ lông mềm mượt.\r\n\r\n– Sử dụng hương liệu tự nhiên : Sản phẩm sử dụng loại hương liệu tự nhiên cao cấp nhất mọi chú mèo đều yêu thích, không dùng màu tổng hợp và chất tạo vị nhân tạo\r\n\r\n– Khối lượng: túi 1,5kg', 0),
('SP7', 'Sữa bột Esbilac cho chó con', 'food13.jpg', 12, 500000, '+ Sữa bột Esbilac là loại sữa số một được bán thay thế sữa mẹ cho chó con. Được khuyến khích như là một nguồn thực phẩm đầy đủ cho chó con mồ côi hoặc bị từ chối chăm sóc. Cũng được đề nghị dùng cho chó con đang phát triển hoặc những chó lớn, được nhấn mạnh về yêu cầu tiêu chuẩn, sản phẩm là một nguồn các chất dinh dưỡng dễ tiêu hóa.\r\n\r\n+ Cung cấp các vitamin và khoáng chất cần thiết để đảm bảo sự phát triển và tăng trưởng.\r\n\r\n+ Sản phẩm cung cấp một mô hình calo tương tự như sữa của chó trong protein, chất béo và carbohydrates.\r\n\r\n+ Dễ tiêu hóa, ngon miệng, vô trùng.\r\n\r\n+ Bổ sung lý tưởng cho cho chó trong thời gian nghỉ dưỡng sau khi phẫu thuật.\r\n\r\nVới sữa cho chó Esbilac bạn đã sẵn sàng để nuôi một vài chú chó. Không cần thiết trộn thêm thức ăn khác.\r\n\r\nDung tích: 340 gr\r\n\r\nCách dùng: \r\n\r\nLấy một lượng bột vào muỗng (đi kèm hộp) tương ứng với trọng lượng cơ thể chó (có hướng dẫn kèm theo), pha với nước ấm, tỷ lệ 1 sữa : 2 nước\r\n\r\nTHÔNG TIN THƯƠNG HIỆU\r\n\r\nPetAg là nhà cung cấp đáng tin cậy của các sản phẩm dinh dưỡng vật nuôi. Sản phẩm của chúng tôi bổ sung dinh dưỡng cho chó, mèo, chim, ngựa và các vật nuôi khác.', 0),
('SP70', 'Me-O - Creamy Treats Bonito Flavor', 'foodcat8.jpg', 23, 50000, 'Thành phần dinh dưỡng\r\n\r\nBanh thưởng dạng ướt cho mèo Me-o creamy Treats Bonito Flavor\r\n\r\nThành phần : Gan gà, thịt gà, chất tạo hương, dầu gà, tinh bột biến tính, chất tạo đông, các vitamin & khoáng chất, DL-Methionin, chiết xuất trà xanh, nước.\r\n\r\nCông dụng sản phẩm\r\n\r\n- Dành cho mèo cai sữa và mèo trưởng thành\r\n\r\n- Taurine: Tăng cường hệ miễn dịch và thị giác\r\n\r\n- Omega 6/Kẽm/DL-Methionin: giúp làn da khỏe mạnh', 0),
('SP71', 'Royal Canin - Intense Beauty', 'foodcat3.jpg', 77, 32000, 'Trọng lượng	85g\r\nXuất xứ	pháp\r\nQuy cách đóng gói	Túi nylon\r\nModel	Royal Canin Intense Beauty (Gravy)\r\nThành phần nguyên liệu	Thịt và các dẫn xuất động vật, cá và các chất dẫn xuất cá, ngũ cốc, chiết xuất protein thực vật, dầu và chất béo, các chất dẫn xuất, nguồn gốc thực vật, khoáng chất, đường khác nhau.\r\nKích thước	30x18\r\nMàu sắc	Vàng\r\nThông tin chi tiết sản phẩm\r\nRoyal Canin Intense Beauty (Gravy)\r\n\r\nCác công thức của ROYAL CANIN được tạo ra với sự cân bằng tối ưu giữa các protein, chất béo và carbohydrate để hỗ trợ sự ngon miệng, bổ sung dinh dưỡng hoàn hảo.\r\n\r\nHỗ trợ chăm sóc lông khỏe đẹp\r\nTăng trọng lượng khỏe mạnh\r\n100% dinh dưỡng cân bằng\r\nBảo đảm 100% đạt mức độ hài lòng\r\nRoyal Canin - Intense Beauty (Jelly) 12x85g dành cho mèo trưởng thành trên 1 tuổi.\r\n\r\n \r\n\r\nĐIỂM NỔI BẬT\r\n\r\nLợi ích\r\n\r\nLàm đẹp bộ lông\r\n\r\nBao gồm các chất dinh dưỡng cụ thể để nuôi dưỡng và duy trì độ bóng mượt của lông.\r\n\r\nCân nặng lý tưởng\r\n\r\nCung cấp mức năng lượng vừa phải để giúp mèo trưởng thành giữ trọng lượng lý tưởng của chúng.\r\n\r\nHệ bài tiết khỏe mạnh\r\n\r\nGiúp tăng cường hệ bài tiết khỏe mạnh.', 0),
('SP72', 'Pate Royal Canin - Recovery', 'foodcat9.jpg', 15, 55000, 'Royal Canin - Recovery 195g\r\nĐược thành lập bởi các nhà khoa học và các bác sĩ thú y, ROYAL CANIN đã có hơn 40 năm kinh nghiệm trong việc nghiên cứu dinh dưỡng và sức khỏe cho vật nuôi. Công việc của chúng tôi và các nhà dinh dưỡng, lai tạo và bác sĩ thú y từ khắp nơi trên thế giới là cung cấp kiến thức và đáp ứng các nhu cầu dinh dưỡng cụ thể cho chó mèo.\r\n\r\nNăng lượng cao để giảm lượng thức ăn\r\nKích thích sự thèm ăn\r\n100% dinh dưỡng cân bằng và cân bằng\r\nBảo đảm 100% mức độ hài lòng\r\nROYAL CANIN RECOVERY là một loại thức ăn cho chó và mèo được đánh giá cao, ngon miệng, hoàn hảo và cân bằng nhằm hỗ trợ dinh dưỡng giúp phục hồi sức khỏe cho chó mèo và được sự hướng dẫn của bác sĩ thú y.\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n\r\nLợi ích\r\n\r\nHàm lượng năng lượng của ROYAL CANIN RECOVERY giúp bù đắp sự sụt giảm lượng thức ăn đối với vật nuôi kén chọn ăn uống.\r\nKết cấu của ROYAL CANIN RECOVERY giúp việc cho ăn bằng ống tiêm hoặc ống truyền dễ dàng hơn rất nhiều.\r\nEPA/DHA, Axit béo Omega-3 chuỗi dài hỗ trợ hệ tiêu hóa khỏe mạnh\r\nSự kết hợp các dưỡng chất chống oxy hóa (Vitamin E, C, tuarine, lutein) làm giảm tác động oxy hóa và giúp trung hòa các gốc tự do.\r\nChỉ định\r\n\r\nBiếng ăn – suy dinh dưỡng;\r\nHỗ trợ dinh dưỡng hậu phẫu thuật và chăm sóc đặc biệt;\r\nĐiều dưỡng;\r\nĂn bằng tube;\r\nRối loạn chuyển hóa lipid gan ở mèo;\r\nMang thai, cho con bú, tăng trưởng.\r\nChống chỉ định\r\n\r\nBệnh não do gan;\r\nViêm tụy cấp;\r\nHyperlipidaemia.\r\nTHÀNH PHẦN\r\n\r\nNguyên liệu\r\n\r\nThịt gà, gan gà, phụ phẩm gelatin, xenluloza bột, casein, dầu cá, hương vị tự nhiên, tetrapotassium pyrophosphate, dầu thực vật, canxi cacbonat, canxi sunfat, sản phẩm trứng khô, guar gum, sản phẩm phụ thịt lợn, Taurine, natri tripolyphosphate, clorua choline, kẹo cao su, inulin, vitamin [DL-alpha tocopherol acetate (nguồn vitamin E), L-ascorbyl-2-polyphosphate (nguồn vitamin C), thiamine mononitrat (vitamin B1), niacin bổ sung , Biotin, D-canxi pantothenate, bổ sung riboflavin (vitamin B2), pyridoxine hydrochloride (vitamin B6), bổ sung vitamin B12, axit folic, bổ sung vitamin D3>, men thủy phân, khoáng chất vết (zinc proteinate, zinc oxide, ferrous sulfate, Sunfat, oxit mangan, natri selenit, canxi iodat), chiết xuất hoa oải hương (Tagetes erecta L.), carrageenan.', 0),
('SP8', 'Viên gặm dẻo Daily Best For Dogs', 'food11.jpg', 46, 292000, 'VIÊN GẶM DẺO HÌNH XƯƠNG DAILY BEST FOR DOGS - KHÔNG ĐƯỜNG - ĂN LÀ GHIỀN!\r\nTHÍCH HỢP CHO MỌI GIỐNG CHÓ, ĐỘ TUỔI, KÍCH CỠ VÀ CHÓ SINH SẢN.\r\n\r\nTrên 35 thành phần dinh dưỡng tác động hiệp lực cho chó yêu sức khỏe tối ưu\r\n\r\n+ Omega 3 giúp lông da đẹp\r\n\r\n+ Vitamin nhóm B cân bằng và hoàn chỉnh giúp chống stress\r\n\r\n+ Các loại men tiêu hóa giúp hấp thu và sử dụng dinh dưỡng từ bữa ăn\r\n\r\n+ 11 loại vi khoáng hỗ trợ thành phần dịch thể, tạo hồng cầu và xương, giúp duy trì chức năng thần kinh khỏe mạnh\r\n\r\n+ Selen hỗ trợ chức năng miễn\r\n\r\nThành phần phân tích đảm bảo mỗi cây gặm mềm (chừng 3.5g):\r\n\r\nDL-Methionine 2.5 mg\r\n\r\nLinoleic acid 2 mg\r\n\r\nCalcium (2.86%) 100 mg\r\n\r\nPhosphorus (2.37%) 83 mg\r\n\r\nPotassium (0.36%) 12.44 mg\r\n\r\nMagnesium (1.3%) 46.65 mg\r\n\r\nIron (857 ppm) 3 mg\r\n\r\nCopper (0.7 ppm) 0.0025 mg\r\n\r\nManganese (286 ppm) 1 mg\r\n\r\nZinc (428 ppm) 1.5 mg\r\n\r\nIodine (14.3 ppm) 0.05 mg\r\n\r\nSelenium (0.57 ppm) 0.002 mg\r\n\r\nVitamin A 1000 IU\r\n\r\nVitamin D3 100 IU\r\n\r\nVitamin E 2 IU\r\n\r\nThiamine (Vitamin B1) 1 mg\r\n\r\nRiboflavin (Vitamin B2) 1 mg\r\n\r\n \r\n\r\nPantothenic Acid 2 mg\r\n\r\nNiacin 10 mg\r\n\r\nPyridoxine HCl (Vitamin B6) 0.2 mg\r\n\r\nFolic Acid 0.002 mg\r\n\r\nVitamin B12 0.002 mg\r\n\r\nCholine 2.5 mg\r\n\r\n*Cobalt 0.03 mg\r\n\r\n*Biotin 0.002 mg\r\n\r\n*Menadione (nguoàn Vitamin K) 0.001 mg\r\n\r\n*Para- Aminobenzoic Acid 3.75 mg\r\n\r\n*Ascorbic Acid (Vitamin C) 50 mg\r\n\r\n*Lecithin 2.5 mg\r\n\r\n*Inositol 2 mg\r\n\r\n*Betaine HCl 2.5 mg\r\n\r\n*Pepsin (Porcine) 6.75 UPS Units1\r\n\r\n*Lipases (Pancreatin) 3.75 USP Units3\r\n\r\n*Protease (Pancreatin) 46 USP Units1\r\n\r\n* Bromelain (Pineapple) 1.35 GD Units2\r\n\r\n\r\nHướng dẫn sử dụng:\r\n\r\nCho đến 9 kg (20 lbs) 1 viên / ngày\r\n\r\n9 – 32 kg (20 – 70 lbs) 2 viên / ngày\r\n\r\nTrên 32 kg (70 lbs) 2 viên / ngày\r\n\r\nNếu cho hơn 1 viên, chia thành buổi sáng và buổi chiều.\r\n\r\nQuy cách: sản phẩm tính theo trọng lượng 157.5 gr/ gói ~ 45 viên.\r\n\r\nBảo quản: giữ nơi khô ráo, thoáng mát. Để cách xa trẻ em.\r\n\r\nHạn dùng: xem trên nhãn chính', 0),
('SP9', 'Thức ăn khô Royal Canin Mini Puppy', 'food1.jpg', 91, 383000, 'Thức ăn khô Royal Canin Mini Puppy 2kg\r\nLà sản phẩm thức ăn khô dành cho chó con cỡ nhỏ dưới 10 tháng tuổi \r\n\r\n- Vì khả năng tiêu hóa của giống chó nhỏ phát triển khá chậm nên sử dụng Mini Junior cung cấp năng lượng cao trong thời kỳ phát triển ngắn ngủi mạnh mẽ.\r\n\r\n- Hãng Royal Canin đã tạo ra  sản phẩm thức ăn có bao gồm các loại hương vị mạnh và hương liệu có tác dụng kích thích sự ngon miệng.\r\n\r\n- Cuối cùng, để hỗ trợ sự phòng thủ tự nhiên cho chó con, vào vitamin E, vitamin C và MOS giúp kích thích sản xuất kháng thể bảo vệ cơ thể cún con.\r\n\r\n- Mini Junior đã kết hợp các nguồn dinh dưỡng từ các protein dễ tiêu hóa với các men vi sinh giúp tăng cường hệ tiêu hóa tối ưu, giúp cơ thể dễ hấp thu chất dinh dưỡng, hỗ trợ tiêu hóa và giúp hình thành phân dễ hình dàng hơn.\r\n\r\n- Thêm vào đó, Mini Junior còn giúp tăng sức đề kháng tự nhiên của chó con với hợp chất chống oxy hóa chứa trong các hạt thức ăn chó hình dạng 3 góc giúp giảm hình thành cao răng.\r\n\r\nĐối Tượng Sử Dụng:Chó con cỡ nhỏ dưới 10 tháng tuổi có trọng lượng từ 4 - 10kg (9 – 22 lbs).\r\n\r\nNguyên Liệu:\r\n\r\nThịt gà, gạo, ngô, bột bắp gluten, yến mạch, bột củ cải khô (đường bỏ đi), dầu cá, dầu thực vật, chất béo gà, vitamins (B1, B2, B6, B12, C, E), calcium, khoáng chất (kẽm, sắt sulfat, mangan, đồng sulfat, iodat canxi, natri selenit), L-carnitine và chiết xuất rosemary.\r\n\r\nTHÔNG TIN  THƯƠNG HIỆU ROYAL CANIN - PHÁP\r\n\r\nRoyal Canin là một người khổng lồ trên toàn cầu về dinh dưỡng sức khỏe vật nuôi có trụ sở tại Pháp. Trong một ngành công nghiệp mà tiếp tục để thích ứng với xu hướng phổ biến, nhiệm vụ của chúng tôi sẽ vẫn là liên tục mang lại, thông qua dinh dưỡng Y tế và chia sẻ kiến ​​thức, giải pháp dinh dưỡng chính xác nhất cho mèo và chó về nhu cầu sức khỏe, bằng cách xây dựng liên tục làm sâu sắc thêm kiến thức khoa học trong ngành công nghiệp phục vụ chó mèo.', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `spkhuyenmai`
--

CREATE TABLE `spkhuyenmai` (
  `masp` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã sản phẩm',
  `giakhuyenmai` double NOT NULL COMMENT 'giá khuyến mãi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `spkhuyenmai`
--

INSERT INTO `spkhuyenmai` (`masp`, `giakhuyenmai`) VALUES
('SP142', 338000),
('SP143', 200000),
('SP144', 920000),
('SP145', 977000),
('SP146', 90000),
('SP34', 421000),
('SP147', 560000),
('SP148', 308000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `spmoi`
--

CREATE TABLE `spmoi` (
  `masp` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `spmoi`
--

INSERT INTO `spmoi` (`masp`) VALUES
('SP104'),
('SP13'),
('SP139'),
('SP140'),
('SP141'),
('SP39'),
('SP57'),
('SP64');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_dv_tl`
--

CREATE TABLE `sp_dv_tl` (
  `masp` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `madv` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `matl` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sp_dv_tl`
--

INSERT INTO `sp_dv_tl` (`masp`, `madv`, `matl`) VALUES
('SP0', 'dog', 'food'),
('SP1', 'dog', 'food'),
('SP10', 'dog', 'food'),
('SP46', 'cat', 'stuff'),
('SP47', 'cat', 'stuff'),
('SP48', 'cat', 'stuff'),
('SP103', 'cat', 'stuff'),
('SP104', 'cat', 'stuff'),
('SP105', 'cat', 'stuff'),
('SP49', 'cat', 'stuff'),
('SP50', 'cat', 'stuff'),
('SP108', 'cat', 'stuff'),
('SP109', 'cat', 'stuff'),
('SP11', 'dog', 'food'),
('SP110', 'cat', 'stuff'),
('SP57', 'cat', 'bed'),
('SP58', 'cat', 'bed'),
('SP59', 'cat', 'bed'),
('SP60', 'cat', 'bed'),
('SP61', 'cat', 'bed'),
('SP62', 'cat', 'bed'),
('SP63', 'cat', 'bed'),
('SP118', 'bird', 'food'),
('SP119', 'bird', 'food'),
('SP12', 'dog', 'food'),
('SP120', 'bird', 'stuff'),
('SP121', 'bird', 'stuff'),
('SP122', 'bird', 'bed'),
('SP123', 'bird', 'bed'),
('SP124', 'bird', 'bed'),
('SP125', 'hamster', 'food'),
('SP126', 'hamster', 'food'),
('SP127', 'hamster', 'stuff'),
('SP128', 'hamster', 'stuff'),
('SP129', 'hamster', 'stuff'),
('SP13', 'dog', 'stuff'),
('SP130', 'hamster', 'bed'),
('SP131', 'hamster', 'bed'),
('SP132', 'fish', 'food'),
('SP133', 'fish', 'stuff'),
('SP134', 'fish', 'stuff'),
('SP135', 'fish', 'bed'),
('SP136', 'fish', 'bed'),
('SP137', 'fish', 'bed'),
('SP139', 'dog', 'food'),
('SP14', 'dog', 'stuff'),
('SP140', 'cat', 'bed'),
('SP141', 'cat', 'stuff'),
('SP142', 'cat', 'bed'),
('SP143', 'dog', 'bed'),
('SP144', 'dog', 'stuff'),
('SP145', 'dog', 'food'),
('SP146', 'dog', 'stuff'),
('SP147', 'cat', 'bed'),
('SP148', 'dog', 'stuff'),
('SP15', 'dog', 'stuff'),
('SP16', 'dog', 'stuff'),
('SP17', 'dog', 'stuff'),
('SP18', 'dog', 'stuff'),
('SP19', 'dog', 'stuff'),
('SP2', 'dog', 'food'),
('SP20', 'dog', 'stuff'),
('SP21', 'dog', 'stuff'),
('SP22', 'dog', 'stuff'),
('SP23', 'dog', 'stuff'),
('SP24', 'dog', 'stuff'),
('SP25', 'dog', 'stuff'),
('SP26', 'dog', 'stuff'),
('SP27', 'dog', 'stuff'),
('SP28', 'dog', 'stuff'),
('SP29', 'dog', 'stuff'),
('SP3', 'dog', 'food'),
('SP30', 'dog', 'stuff'),
('SP31', 'dog', 'stuff'),
('SP32', 'dog', 'stuff'),
('SP33', 'dog', 'stuff'),
('SP34', 'dog', 'stuff'),
('SP35', 'dog', 'stuff'),
('SP36', 'dog', 'stuff'),
('SP37', 'dog', 'stuff'),
('SP38', 'dog', 'stuff'),
('SP39', 'dog', 'stuff'),
('SP4', 'dog', 'food'),
('SP40', 'dog', 'stuff'),
('SP41', 'dog', 'stuff'),
('SP42', 'dog', 'stuff'),
('SP43', 'dog', 'stuff'),
('SP44', 'dog', 'stuff'),
('SP45', 'dog', 'stuff'),
('SP46', 'dog', 'stuff'),
('SP47', 'dog', 'stuff'),
('SP48', 'dog', 'stuff'),
('SP49', 'dog', 'stuff'),
('SP5', 'dog', 'food'),
('SP50', 'dog', 'stuff'),
('SP51', 'dog', 'stuff'),
('SP52', 'dog', 'stuff'),
('SP53', 'dog', 'stuff'),
('SP54', 'dog', 'stuff'),
('SP55', 'dog', 'stuff'),
('SP56', 'dog', 'stuff'),
('SP57', 'dog', 'bed'),
('SP58', 'dog', 'bed'),
('SP59', 'dog', 'bed'),
('SP6', 'dog', 'food'),
('SP60', 'dog', 'bed'),
('SP61', 'dog', 'bed'),
('SP62', 'dog', 'bed'),
('SP63', 'dog', 'bed'),
('SP64', 'cat', 'food'),
('SP65', 'cat', 'food'),
('SP66', 'cat', 'food'),
('SP67', 'cat', 'food'),
('SP68', 'cat', 'food'),
('SP69', 'cat', 'food'),
('SP7', 'dog', 'food'),
('SP70', 'cat', 'food'),
('SP71', 'cat', 'food'),
('SP72', 'cat', 'food'),
('SP13', 'cat', 'stuff'),
('SP16', 'cat', 'stuff'),
('SP17', 'cat', 'stuff'),
('SP19', 'cat', 'stuff'),
('SP21', 'cat', 'stuff'),
('SP22', 'cat', 'stuff'),
('SP23', 'cat', 'stuff'),
('SP8', 'dog', 'food'),
('SP24', 'cat', 'stuff'),
('SP25', 'cat', 'stuff'),
('SP26', 'cat', 'stuff'),
('SP27', 'cat', 'stuff'),
('SP28', 'cat', 'stuff'),
('SP29', 'cat', 'stuff'),
('SP32', 'cat', 'stuff'),
('SP33', 'cat', 'stuff'),
('SP34', 'cat', 'stuff'),
('SP35', 'cat', 'stuff'),
('SP9', 'dog', 'food'),
('SP36', 'cat', 'stuff'),
('SP37', 'cat', 'stuff'),
('SP38', 'cat', 'stuff'),
('SP39', 'cat', 'stuff'),
('SP40', 'cat', 'stuff'),
('SP41', 'cat', 'stuff'),
('SP42', 'cat', 'stuff'),
('SP43', 'cat', 'stuff'),
('SP44', 'cat', 'stuff'),
('SP45', 'cat', 'stuff');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tendangnhap` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên đăng nhập',
  `matkhau` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mật khẩu',
  `mavt` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'customer' COMMENT 'mã vai trò',
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'họ và tên',
  `ngaysinh` date DEFAULT NULL COMMENT 'ngày sinh',
  `dienthoai` int(11) NOT NULL COMMENT 'số điện thoại',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'email',
  `khoa` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`tendangnhap`, `matkhau`, `mavt`, `hoten`, `ngaysinh`, `dienthoai`, `email`, `khoa`) VALUES
('abcde', 'e10adc3949ba59abbe56e057f20f883e', 'customer', 'dssd', '2019-08-15', 999999999, 'ewfw@gmail.vn', 0),
('adsadsadsad', 'ab56b4d92b40713acc5af89985d4b786', 'customer', 'DAD', '0000-00-00', 147258963, 'asdas@gmail.com', 0),
('dat123', 'e10adc3949ba59abbe56e057f20f883e', 'customer', 'dat', '0000-00-00', 134567892, 'dat@gmail.com', 0),
('petshopadmin', '1590016631007bb5314216ee0231d38d', 'admin', 'admin', '0000-00-00', 123456789, 'hotro@petshop.com', 0),
('petshopsale', '0beb1ccda5f928a04cfef687240243e3', 'sale', 'sale', '0000-00-00', 123456798, 'petshop@gmail.com', 0),
('qwerty', '4607e782c4d86fd5364d7e4508bb10d9', 'customer', 'DASR', '0000-00-00', 369258147, 'asfad@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `matl` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã thể loại',
  `theloai` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên thể loại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`matl`, `theloai`) VALUES
('bed', 'chuồng, giường'),
('food', 'thức ăn'),
('stuff', 'vật dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `mavt` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã vai trò',
  `vaitro` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'vai trò',
  `quyen` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'đặc quyền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`mavt`, `vaitro`, `quyen`) VALUES
('admin', 'quản trị viên', 'quản lý tài khoản'),
('customer', 'khách hàng', 'chỉ được mua'),
('sale', 'bán hàng', 'quản lý bán hàng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD KEY `mahd` (`mahd`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `dongvat`
--
ALTER TABLE `dongvat`
  ADD PRIMARY KEY (`madv`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `tendangnhap` (`tendangnhap`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`);

--
-- Chỉ mục cho bảng `spkhuyenmai`
--
ALTER TABLE `spkhuyenmai`
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `spmoi`
--
ALTER TABLE `spmoi`
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `sp_dv_tl`
--
ALTER TABLE `sp_dv_tl`
  ADD KEY `masp` (`masp`),
  ADD KEY `madv` (`madv`),
  ADD KEY `matl` (`matl`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tendangnhap`),
  ADD KEY `mavt` (`mavt`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`matl`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`mavt`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_3` FOREIGN KEY (`tendangnhap`) REFERENCES `taikhoan` (`tendangnhap`);

--
-- Các ràng buộc cho bảng `spkhuyenmai`
--
ALTER TABLE `spkhuyenmai`
  ADD CONSTRAINT `spkhuyenmai_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `spmoi`
--
ALTER TABLE `spmoi`
  ADD CONSTRAINT `spmoi_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `sp_dv_tl`
--
ALTER TABLE `sp_dv_tl`
  ADD CONSTRAINT `sp_dv_tl_ibfk_2` FOREIGN KEY (`madv`) REFERENCES `dongvat` (`madv`),
  ADD CONSTRAINT `sp_dv_tl_ibfk_3` FOREIGN KEY (`matl`) REFERENCES `theloai` (`matl`),
  ADD CONSTRAINT `sp_dv_tl_ibfk_4` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`mavt`) REFERENCES `vaitro` (`mavt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
