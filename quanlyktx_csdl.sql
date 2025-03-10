-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: qlktx
-- ------------------------------------------------------
-- Server version	8.0.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `hoc_ky`
--
--
drop database if exists `qlktx`;
create database qlktx;
use qlktx;


DROP TABLE IF EXISTS `hoc_ky`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hoc_ky` (
  `ma_hoc_ky` varchar(10) NOT NULL,
  `ten_hoc_ky` varchar(100) DEFAULT NULL,
  `bat_dau` date DEFAULT NULL,
  `ket_thuc` date DEFAULT NULL,
  PRIMARY KEY (`ma_hoc_ky`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoc_ky`
--

LOCK TABLES `hoc_ky` WRITE;
/*!40000 ALTER TABLE `hoc_ky` DISABLE KEYS */;
INSERT INTO `hoc_ky` VALUES ('HK1','Học Kỳ 1','2024-09-01','2025-01-15'),('HK2','Học Kỳ 2','2025-02-01','2025-05-01'),('HK3','Học Kỳ 3','2025-06-01','2025-09-01');
/*!40000 ALTER TABLE `hoc_ky` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lop`
--

DROP TABLE IF EXISTS `lop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lop` (
  `ma_lop` varchar(10) NOT NULL,
  `ten_lop` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ma_lop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lop`
--

LOCK TABLES `lop` WRITE;
/*!40000 ALTER TABLE `lop` DISABLE KEYS */;
INSERT INTO `lop` VALUES 
('ATTT','An toàn thông tin'),('CNSH','Công nghệ sinh học'),('CNTP','Công nghệ thực phẩm'),('CNTT','Công nghệ thông tin'),('HTTT','Hệ thống thông tin'),('KDNG','Kinh doanh nông nghiệp'),('KHMT','Khoa học môi trường'),('KT','Kế toán'),('KTNN','Kinh tế nông nghiệp'),('KTPM','Kỹ thuật phần mềm'),('KTXD','Kỹ thuật xây dựng'),('LHC','Luật hành chính'),('NNA','Ngôn Ngữ Anh'),('NTTS','Nuôi trồng thủy sản'),('QTKD','Quản trị kinh doanh'),('TCNH','Tài chính - ngân hàng'),('TY','Thú y');
/*!40000 ALTER TABLE `lop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhanvien` (
  `ma_nhan_vien` varchar(8) NOT NULL,
  `ho_ten` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(15) DEFAULT NULL,
  `ghi_chu` text,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ma_nhan_vien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhanvien`
--

LOCK TABLES `nhanvien` WRITE;
/*!40000 ALTER TABLE `nhanvien` DISABLE KEYS */;
INSERT INTO `nhanvien` VALUES 
('NVKTXA00','admin','1234567890','admin','e10adc3949ba59abbe56e057f20f883e'),('NVKTXA01','Nguyễn Hoài Đức','0898821595','nhan vien','e10adc3949ba59abbe56e057f20f883e'),('NVKTXA03','Hồ Hoàng Hảo','0989765432','nhan vien','e10adc3949ba59abbe56e057f20f883e'),('NVKTXA04','Trịnh Huỳnh Phúc Khang','0989765432','nhan vien','e10adc3949ba59abbe56e057f20f883e'),('NVKTXA05','Trương Hoàng Anh','0988133860','nhan vien','e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `nhanvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhanvien_counter`
--

DROP TABLE IF EXISTS `nhanvien_counter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhanvien_counter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `current_number` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhanvien_counter`
--

LOCK TABLES `nhanvien_counter` WRITE;
/*!40000 ALTER TABLE `nhanvien_counter` DISABLE KEYS */;
INSERT INTO `nhanvien_counter` VALUES (1,2);
/*!40000 ALTER TABLE `nhanvien_counter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phong`
--

DROP TABLE IF EXISTS `phong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phong` (
  `ma_phong` varchar(7) NOT NULL,
  `ten_phong` varchar(100) DEFAULT NULL,
  `loai_phong` varchar(3) DEFAULT NULL,
  `dien_tich` float DEFAULT NULL,
  `so_giuong` int DEFAULT NULL,
  `gia_thue` decimal(10) DEFAULT NULL,
  `gioi_tinh` varchar(5) NOT NULL DEFAULT 'none',
  PRIMARY KEY (`ma_phong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phong`
--

LOCK TABLES `phong` WRITE;
/*!40000 ALTER TABLE `phong` DISABLE KEYS */;
INSERT INTO `phong` VALUES 
('AC01001','Phòng 1 dãy C1 ',NULL,30,8,290000.00,'nam'),
('AC01002','Phòng 2 dãy C1 ',NULL,30,8,290000.00,'nam'),
('AC01003','Phòng 3 dãy C1 ',NULL,30,8,290000.00,'nam'),
('AC01004','Phòng 4 dãy C1 ',NULL,30,8,290000.00,'nam'),
('AC01005','Phòng 5 dãy C1 ',NULL,30,8,290000.00,'nam'),
('AC01006','Phòng 6 dãy C1 ',NULL,30,8,290000.00,'nam'),
('AC01007','Phòng 7 dãy C1 ',NULL,30,8,290000.00,'nam'),
('AC01008','Phòng 8 dãy C1 ',NULL,30,8,290000.00,'nam'),
('AC01009','Phòng 9 dãy C1 ',NULL,30,8,290000.00,'nam'),
('AC01010','Phòng 10 dãy C1 ',NULL,30,8,290000.00,'nam'),
('AC01011','Phòng 11 dãy C1 ',NULL,30,8,290000.00,'nu'),
('AC01012','Phòng 12 dãy C1 ',NULL,30,8,290000.00,'nu'),
('AC01013','Phòng 13 dãy C1 ',NULL,30,8,290000.00,'nu'),
('AC01014','Phòng 14 dãy C1 ',NULL,30,8,290000.00,'nu'),
('AC01015','Phòng 15 dãy C1 ',NULL,30,8,290000.00,'nu'),
('AC01016','Phòng 16 dãy C1 ',NULL,30,8,290000.00,'nu'),
('AC01017','Phòng 17 dãy C1 ',NULL,30,8,290000.00,'nu'),
('AC01018','Phòng 18 dãy C1 ',NULL,30,8,290000.00,'nu'),
('AC01019','Phòng 19 dãy C1 ',NULL,30,8,290000.00,'nu'),
('AC01020','Phòng 20 dãy C1 ',NULL,30,8,290000.00,'nu'),

('AC02001','Phòng 1 dãy C2 ',NULL,35,8,320000.00,'nam'),
('AC02002','Phòng 2 dãy C2 ',NULL,35,8,320000.00,'nam'),
('AC02003','Phòng 3 dãy C2 ',NULL,35,8,320000.00,'nam'),
('AC02004','Phòng 4 dãy C2 ',NULL,35,8,320000.00,'nam'),
('AC02005','Phòng 5 dãy C2 ',NULL,35,8,320000.00,'nam'),
('AC02006','Phòng 6 dãy C2 ',NULL,35,8,320000.00,'nam'),
('AC02007','Phòng 7 dãy C2 ',NULL,35,8,320000.00,'nam'),
('AC02008','Phòng 8 dãy C2 ',NULL,35,8,320000.00,'nam'),
('AC02009','Phòng 9 dãy C2 ',NULL,35,8,320000.00,'nam'),
('AC02010','Phòng 10 dãy C2 ',NULL,35,8,320000.00,'nam'),
('AC02011','Phòng 11 dãy C2 ',NULL,35,8,320000.00,'nu'),
('AC02012','Phòng 12 dãy C2 ',NULL,35,8,320000.00,'nu'),
('AC02013','Phòng 13 dãy C2 ',NULL,35,8,320000.00,'nu'),
('AC02014','Phòng 14 dãy C2 ',NULL,35,8,320000.00,'nu'),
('AC02015','Phòng 15 dãy C2 ',NULL,35,8,320000.00,'nu'),
('AC02016','Phòng 16 dãy C2 ',NULL,35,8,320000.00,'nu'),
('AC02017','Phòng 17 dãy C2 ',NULL,35,8,320000.00,'nu'),
('AC02018','Phòng 18 dãy C2 ',NULL,35,8,320000.00,'nu'),
('AC02019','Phòng 19 dãy C2 ',NULL,35,8,320000.00,'nu'),
('AC02020','Phòng 20 dãy C2 ',NULL,35,8,320000.00,'nu'),

('AC03001','Phòng 1 dãy C3 ',NULL,25,4,320000.00,'nam'),
('AC03002','Phòng 2 dãy C3 ',NULL,25,4,320000.00,'nam'),
('AC03003','Phòng 3 dãy C3 ',NULL,25,4,320000.00,'nam'),
('AC03004','Phòng 4 dãy C3 ',NULL,25,4,320000.00,'nam'),
('AC03005','Phòng 5 dãy C3 ',NULL,25,4,320000.00,'nam'),
('AC03006','Phòng 6 dãy C3 ',NULL,25,4,320000.00,'nam'),
('AC03007','Phòng 7 dãy C3 ',NULL,25,4,320000.00,'nam'),
('AC03008','Phòng 8 dãy C3 ',NULL,25,4,320000.00,'nam'),
('AC03009','Phòng 9 dãy C3 ',NULL,25,4,320000.00,'nam'),
('AC03010','Phòng 10 dãy C3 ',NULL,25,4,320000.00,'nam'),
('AC03011','Phòng 11 dãy C3 ',NULL,25,4,320000.00,'nu'),
('AC03012','Phòng 12 dãy C3 ',NULL,25,4,320000.00,'nu'),
('AC03013','Phòng 13 dãy C3 ',NULL,25,4,320000.00,'nu'),
('AC03014','Phòng 14 dãy C3 ',NULL,25,4,320000.00,'nu'),
('AC03015','Phòng 15 dãy C3 ',NULL,25,4,320000.00,'nu'),
('AC03016','Phòng 16 dãy C3 ',NULL,25,4,320000.00,'nu'),
('AC03017','Phòng 17 dãy C3 ',NULL,25,4,320000.00,'nu'),
('AC03018','Phòng 18 dãy C3 ',NULL,25,4,320000.00,'nu'),
('AC03019','Phòng 19 dãy C3 ',NULL,25,4,320000.00,'nu'),
('AC03020','Phòng 20 dãy C3 ',NULL,25,4,320000.00,'nu'),

('AC04001','Phòng 1 dãy C4 ',NULL,30,6,380000.00,'nam'),
('AC04002','Phòng 2 dãy C4 ',NULL,30,6,380000.00,'nam'),
('AC04003','Phòng 3 dãy C4 ',NULL,30,6,380000.00,'nam'),
('AC04004','Phòng 4 dãy C4 ',NULL,30,6,380000.00,'nam'),
('AC04005','Phòng 5 dãy C4 ',NULL,30,6,380000.00,'nam'),
('AC04006','Phòng 6 dãy C4 ',NULL,30,6,380000.00,'nam'),
('AC04007','Phòng 7 dãy C4 ',NULL,30,6,380000.00,'nam'),
('AC04008','Phòng 8 dãy C4 ',NULL,30,6,380000.00,'nam'),
('AC04009','Phòng 9 dãy C4 ',NULL,30,6,380000.00,'nam'),
('AC04010','Phòng 10 dãy C4 ',NULL,30,6,380000.00,'nam'),
('AC04011','Phòng 11 dãy C4 ',NULL,30,6,380000.00,'nu'),
('AC04012','Phòng 12 dãy C4 ',NULL,30,6,380000.00,'nu'),
('AC04013','Phòng 13 dãy C4 ',NULL,30,6,380000.00,'nu'),
('AC04014','Phòng 14 dãy C4 ',NULL,30,6,380000.00,'nu'),
('AC04015','Phòng 15 dãy C4 ',NULL,30,6,380000.00,'nu'),
('AC04016','Phòng 16 dãy C4 ',NULL,30,6,380000.00,'nu'),
('AC04017','Phòng 17 dãy C4 ',NULL,30,6,380000.00,'nu'),
('AC04018','Phòng 18 dãy C4 ',NULL,30,6,380000.00,'nu'),
('AC04019','Phòng 19 dãy C4 ',NULL,30,6,380000.00,'nu'),
('AC04020','Phòng 20 dãy C4 ',NULL,30,6,380000.00,'nu'),

('AC05001','Phòng 1 dãy C5 ',NULL,38,8,390000.00,'nam'),
('AC05002','Phòng 2 dãy C5 ',NULL,38,8,390000.00,'nam'),
('AC05003','Phòng 3 dãy C5 ',NULL,38,8,390000.00,'nam'),
('AC05004','Phòng 4 dãy C5 ',NULL,38,8,390000.00,'nam'),
('AC05005','Phòng 5 dãy C5 ',NULL,38,8,390000.00,'nam'),
('AC05006','Phòng 6 dãy C5 ',NULL,38,8,390000.00,'nam'),
('AC05007','Phòng 7 dãy C5 ',NULL,38,8,390000.00,'nam'),
('AC05008','Phòng 8 dãy C5 ',NULL,38,8,390000.00,'nam'),
('AC05009','Phòng 9 dãy C5 ',NULL,38,8,390000.00,'nam'),
('AC05010','Phòng 10 dãy C5 ',NULL,38,8,390000.00,'nam'),
('AC05011','Phòng 11 dãy C5 ',NULL,38,8,390000.00,'nu'),
('AC05012','Phòng 12 dãy C5 ',NULL,38,8,390000.00,'nu'),
('AC05013','Phòng 13 dãy C5 ',NULL,38,8,390000.00,'nu'),
('AC05014','Phòng 14 dãy C5 ',NULL,38,8,390000.00,'nu'),
('AC05015','Phòng 15 dãy C5 ',NULL,38,8,390000.00,'nu'),
('AC05016','Phòng 16 dãy C5 ',NULL,38,8,390000.00,'nu'),
('AC05017','Phòng 17 dãy C5 ',NULL,38,8,390000.00,'nu'),
('AC05018','Phòng 18 dãy C5 ',NULL,38,8,390000.00,'nu'),
('AC05019','Phòng 19 dãy C5 ',NULL,38,8,390000.00,'nu'),
('AC05020','Phòng 20 dãy C5 ',NULL,38,8,390000.00,'nu');
/*!40000 ALTER TABLE `phong` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_delete_phong` BEFORE DELETE ON `phong` FOR EACH ROW BEGIN
    DECLARE room_count INT;

    -- Kiểm tra xem phòng có đang được thuê không
    SELECT COUNT(*) INTO room_count
    FROM ThuePhong
    WHERE ma_phong = OLD.ma_phong;

    -- Nếu phòng đang được thuê, ngăn việc xóa và đưa ra lỗi
    IF room_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Không thể xóa phòng vì phòng đang được thuê.';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `sinhvien`
--

DROP TABLE IF EXISTS `sinhvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sinhvien` (
  `ma_sinh_vien` varchar(8) NOT NULL,
  `ho_ten` varchar(100) DEFAULT NULL,
  `gioi_tinh` varchar(3) DEFAULT NULL,
  `so_dien_thoai` varchar(15) DEFAULT NULL,
  `ma_lop` varchar(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `notification` varchar(255) DEFAULT '',
  PRIMARY KEY (`ma_sinh_vien`),
  KEY `ma_lop` (`ma_lop`),
  CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`ma_lop`) REFERENCES `lop` (`ma_lop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sinhvien`
--

LOCK TABLES `sinhvien` WRITE;
/*!40000 ALTER TABLE `sinhvien` DISABLE KEYS */;
INSERT INTO `sinhvien` VALUES 
('B2111875','Huỳnh Văn An','nam','0835525253','CNTT','202cb962ac59075b964b07152d234b70','Hợp đồng thuê phòng của bạn đã bị xóa.'),('B2111881','Nguyễn Hoài Đức','nam','0898821595','CNTT','e10adc3949ba59abbe56e057f20f883e',''),('B2111882','Nguyễn Văn A','nam','0898821598','KDNG','202cb962ac59075b964b07152d234b70',''),('B2401314','Quách Thúy Quyền','nu','0786789654','LHC','202cb962ac59075b964b07152d234b70',''),('B2401769','Lê Mỹ Như','nu','0939281902','QTKD','202cb962ac59075b964b07152d234b70',''),('B2401788','Nguyễn Ngọc Anh Thư','nu','0988172635','QTKD','202cb962ac59075b964b07152d234b70','Hợp đồng thuê phòng của bạn đã bị xóa.'),('B2401796','Chung Thị Hồng Yến','nu','0394987654','QTKD','202cb962ac59075b964b07152d234b70',''),('B2402119','Nguyễn Ngọc Thảo','nu','0836827463','KTNN','202cb962ac59075b964b07152d234b70',''),('B2402123','Nguyễn Thị Ngọc Hân','nu','0837261890','KTNN','202cb962ac59075b964b07152d234b70','Yêu cầu thuê phòng của bạn đã được duyệt.'),('B2402215','Huỳnh Huyền Trân','nu','0865342516','KTNN','202cb962ac59075b964b07152d234b70',''),('B2402234','Nguyễn Ngọc Thảo Vy','nu','0975263456','KTNN','202cb962ac59075b964b07152d234b70',''),('B2403104','Lê Thị Mỹ Xuyên','nu','0788172639','LHC','202cb962ac59075b964b07152d234b70',''),('B2408340','Hứa Thị Ngọc Hân','nu','0860762538','NNA','202cb962ac59075b964b07152d234b70',''),('B2408388','Trần Ngọc Mẫn','nu','0965827390','NNA','202cb962ac59075b964b07152d234b70',''),('B2408404','Phạm Phan Chúc Ni','nu','0977263547','NNA','202cb962ac59075b964b07152d234b70',''),('B2408430','Nguyễn Thị Ngọc Trân','nu','0868450022','NNA','202cb962ac59075b964b07152d234b70',''),('B2408904','Trần Thanh Hà','nu','0976253410','CNTT','202cb962ac59075b964b07152d234b70',''),('B2408911','Nguyễn Minh Khôi','nam','0976524367','CNTT','202cb962ac59075b964b07152d234b70',''),('B2408925','Đoàn Khả Nguyên','nam','0912876536','CNTT','202cb962ac59075b964b07152d234b70',''),('B2408929','Lê Thị Mỹ Tâm','nu','0907998865','CNTT','202cb962ac59075b964b07152d234b70','');
/*!40000 ALTER TABLE `sinhvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thuephong`
--

DROP TABLE IF EXISTS `thuephong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thuephong` (
  `ma_hop_dong` int NOT NULL AUTO_INCREMENT,
  `ma_sinh_vien` varchar(10) DEFAULT NULL,
  `ma_phong` varchar(7) DEFAULT NULL,
  `bat_dau` date DEFAULT NULL,
  `ket_thuc` date DEFAULT NULL,
  `tien_dat_coc` decimal(10,2) DEFAULT NULL,
  `gia_thue_thuc_te` decimal(10,2) DEFAULT NULL,
  `ma_hoc_ky` varchar(10) DEFAULT NULL,
  `can_thanh_toan` decimal(10,2) NOT NULL DEFAULT '0.00',
  `trang_thai` varchar(20) DEFAULT 'choxetduyet',
  PRIMARY KEY (`ma_hop_dong`),
  KEY `ma_sinh_vien` (`ma_sinh_vien`),
  KEY `ma_phong` (`ma_phong`),
  KEY `ma_hoc_ky` (`ma_hoc_ky`),
  CONSTRAINT `thuephong_ibfk_1` FOREIGN KEY (`ma_sinh_vien`) REFERENCES `sinhvien` (`ma_sinh_vien`),
  CONSTRAINT `thuephong_ibfk_2` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`ma_phong`),
  CONSTRAINT `thuephong_ibfk_3` FOREIGN KEY (`ma_hoc_ky`) REFERENCES `hoc_ky` (`ma_hoc_ky`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thuephong`
--

LOCK TABLES `thuephong` WRITE;
/*!40000 ALTER TABLE `thuephong` DISABLE KEYS */;
INSERT INTO `thuephong` VALUES 
(19,'B2111881','AC05003','2024-09-01','2025-01-15',0.00,500000.00,'HK1',0.00,'daduyet'),(20,'B2402123','AC05102','2024-09-01','2025-01-15',0.00,290000.00,'HK1',0.00,'daduyet'),(21,'B2401796','AC05102','2024-09-01','2025-01-15',0.00,290000.00,'HK1',290000.00,'daduyet');
/*!40000 ALTER TABLE `thuephong` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8mb3_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `check_gender_before_insert` BEFORE INSERT ON `thuephong` FOR EACH ROW BEGIN
    DECLARE sinhvien_gender VARCHAR(10);
    DECLARE phong_gender VARCHAR(10);

    -- Lấy giới tính của sinh viên
    SELECT gioi_tinh INTO sinhvien_gender
    FROM sinhvien
    WHERE ma_sinh_vien = NEW.ma_sinh_vien;

    -- Lấy giới tính của phòng
    SELECT gioi_tinh INTO phong_gender
    FROM phong
    WHERE ma_phong = NEW.ma_phong;

    -- Kiểm tra nếu giới tính không khớp
    IF sinhvien_gender <> phong_gender THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Giới tính của sinh viên và phòng không khớp';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8mb3_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_insert_thuephong_check_student` BEFORE INSERT ON `thuephong` FOR EACH ROW BEGIN
    DECLARE existing_contracts INT;

    -- Đếm số lượng hợp đồng thuê hiện tại của sinh viên
    SELECT COUNT(*) INTO existing_contracts
    FROM ThuePhong
    WHERE ma_sinh_vien = NEW.ma_sinh_vien AND (ket_thuc IS NULL OR ket_thuc > NOW());

    -- Kiểm tra nếu sinh viên đã có hợp đồng thuê phòng
    IF existing_contracts > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Không thể thêm thuê phòng: Sinh viên đã có phòng thuê.';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8mb3_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_insert_thuephong` BEFORE INSERT ON `thuephong` FOR EACH ROW BEGIN
    DECLARE current_members INT;

    -- Đếm số lượng thành viên hiện tại trong phòng
    SELECT COUNT(*) INTO current_members
    FROM ThuePhong
    WHERE ma_phong = NEW.ma_phong AND (ket_thuc IS NULL OR ket_thuc > NOW()) And trang_thai='daduyet';

    -- Kiểm tra nếu số lượng thành viên hiện tại bằng số giường
    IF current_members >= (SELECT so_giuong FROM Phong WHERE ma_phong = NEW.ma_phong) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Không thể thêm thuê phòng: Số lượng thành viên đã đạt tối đa.';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_delete_thuephong` BEFORE DELETE ON `thuephong` FOR EACH ROW BEGIN
    DELETE FROM tt_thuephong WHERE ma_hop_dong = OLD.ma_hop_dong;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tt_thuephong`
--

DROP TABLE IF EXISTS `tt_thuephong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tt_thuephong` (
  `ma_hop_dong` int NOT NULL,
  `thang_nam` date NOT NULL,
  `so_tien` decimal(10,2) DEFAULT NULL,
  `ngay_thanh_toan` date DEFAULT NULL,
  `ma_nhan_vien` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`ma_hop_dong`),
  KEY `ma_nhan_vien` (`ma_nhan_vien`),
  CONSTRAINT `tt_thuephong_ibfk_1` FOREIGN KEY (`ma_hop_dong`) REFERENCES `thuephong` (`ma_hop_dong`),
  CONSTRAINT `tt_thuephong_ibfk_2` FOREIGN KEY (`ma_nhan_vien`) REFERENCES `nhanvien` (`ma_nhan_vien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_thuephong`
--

LOCK TABLES `tt_thuephong` WRITE;
/*!40000 ALTER TABLE `tt_thuephong` DISABLE KEYS */;
INSERT INTO `tt_thuephong` VALUES (19,'2024-11-01',500000.00,'2024-11-14','NVKTXA00'),(20,'2024-11-01',290000.00,'2024-11-14','NVKTXA00');
/*!40000 ALTER TABLE `tt_thuephong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'qlktx'
--

--
-- Dumping routines for database 'qlktx'
--
/*!50003 DROP FUNCTION IF EXISTS `checkHocKyConflict` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `checkHocKyConflict`(new_bat_dau DATE, new_ket_thuc DATE, new_ma_hoc_ky VARCHAR(10)) RETURNS tinyint(1)
    DETERMINISTIC
BEGIN
    DECLARE conflict_count INT;

    SELECT COUNT(*) INTO conflict_count
    FROM Hoc_Ky
    WHERE ma_hoc_ky != new_ma_hoc_ky
      AND (
          (new_bat_dau BETWEEN bat_dau AND ket_thuc) OR
          (new_ket_thuc BETWEEN bat_dau AND ket_thuc) OR
          (bat_dau BETWEEN new_bat_dau AND new_ket_thuc) OR
          (ket_thuc BETWEEN new_bat_dau AND new_ket_thuc)
      );

    RETURN conflict_count > 0;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `checkRoomAvailability` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8mb3_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `checkRoomAvailability`(ma_phong_input VARCHAR(255)) RETURNS tinyint(1)
    READS SQL DATA
BEGIN
    DECLARE current_members INT;
    DECLARE max_beds INT;

    -- Đếm số lượng thành viên hiện tại trong phòng
    SELECT COUNT(*) INTO current_members
    FROM ThuePhong
    WHERE ma_phong = ma_phong_input AND (ket_thuc IS NULL OR ket_thuc > NOW()) and trang_thai='daduyet';

    -- Lấy số giường tối đa của phòng
    SELECT so_giuong INTO max_beds
    FROM Phong
    WHERE ma_phong = ma_phong_input;

    -- So sánh số lượng thành viên hiện tại với số giường
    IF current_members < max_beds THEN
        RETURN TRUE; -- Còn chỗ trống
    ELSE
        RETURN FALSE; -- Đã đầy
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `countAvailableRooms` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `countAvailableRooms`() RETURNS int
    DETERMINISTIC
BEGIN
    DECLARE availableCount INT;
    SELECT COUNT(*) INTO availableCount 
    FROM Phong p
    WHERE NOT EXISTS (
        SELECT 1 
        FROM ThuePhong tp 
        WHERE tp.ma_phong = p.ma_phong 
        AND tp.ket_thuc >= CURDATE()
        AND tp.trang_thai = 'daduyet'
    );
    RETURN availableCount;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `countFemaleRooms` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `countFemaleRooms`() RETURNS int
    DETERMINISTIC
BEGIN
    DECLARE femaleCount INT;
    SELECT COUNT(*) INTO femaleCount FROM Phong WHERE gioi_tinh = 'nu';
    RETURN femaleCount;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `countFemaleStudentsRenting` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `countFemaleStudentsRenting`() RETURNS int
    DETERMINISTIC
BEGIN
    DECLARE femaleStudentCount INT;
    SELECT COUNT(DISTINCT sv.ma_sinh_vien) INTO femaleStudentCount
    FROM sinhvien sv
    JOIN thuephong tp ON sv.ma_sinh_vien = tp.ma_sinh_vien
    WHERE sv.gioi_tinh = 'nu' AND tp.ket_thuc >= CURDATE() AND tp.trang_thai = 'daduyet';
    RETURN femaleStudentCount;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `countMaleRooms` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `countMaleRooms`() RETURNS int
    DETERMINISTIC
BEGIN
    DECLARE maleCount INT;
    SELECT COUNT(*) INTO maleCount FROM Phong WHERE gioi_tinh = 'nam';
    RETURN maleCount;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `countMaleStudentsRenting` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `countMaleStudentsRenting`() RETURNS int
    DETERMINISTIC
BEGIN
    DECLARE maleStudentCount INT;
    SELECT COUNT(DISTINCT sv.ma_sinh_vien) INTO maleStudentCount
    FROM sinhvien sv
    JOIN thuephong tp ON sv.ma_sinh_vien = tp.ma_sinh_vien
    WHERE sv.gioi_tinh = 'nam' AND tp.ket_thuc >= CURDATE() AND tp.trang_thai = 'daduyet';
    RETURN maleStudentCount;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `count_current_students_renting` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `count_current_students_renting`() RETURNS int
    DETERMINISTIC
BEGIN
    DECLARE total_students INT;
    SELECT COUNT(DISTINCT ma_sinh_vien) INTO total_students
    FROM thuephong
    WHERE  ket_thuc >= CURDATE() and trang_thai ='daduyet';
    RETURN total_students;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `count_rented_rooms` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `count_rented_rooms`() RETURNS int
    DETERMINISTIC
BEGIN
    DECLARE rented_rooms INT;
    SELECT COUNT(DISTINCT ma_phong) INTO rented_rooms
    FROM thuephong
    WHERE CURDATE() BETWEEN bat_dau AND ket_thuc;
    RETURN rented_rooms;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `count_total_rooms` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `count_total_rooms`() RETURNS int
    DETERMINISTIC
BEGIN
    DECLARE total_rooms INT;
    SELECT COUNT(*) INTO total_rooms
    FROM phong;
    RETURN total_rooms;
END ;;
DELIMITER ;


DELIMITER //

CREATE TRIGGER before_delete_sinhvien
BEFORE DELETE ON sinhvien
FOR EACH ROW
BEGIN
    DECLARE renting_count INT;

    -- Kiểm tra xem sinh viên có đang thuê phòng không
    SELECT COUNT(*) INTO renting_count
    FROM thuephong
    WHERE ma_sinh_vien = OLD.ma_sinh_vien;

    -- Nếu sinh viên đang thuê phòng, thông báo lỗi
    IF renting_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Không thể xóa sinh viên đang thuê phòng.';
    END IF;
END //

DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `totalDeposit` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `totalDeposit`() RETURNS decimal(10,2)
    DETERMINISTIC
BEGIN
    DECLARE total DECIMAL(10,2);

    SELECT IFNULL(SUM(tien_dat_coc), 0) INTO total
    FROM thuephong
    WHERE trang_thai = 'daduyet';

    RETURN total;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `totalPayment` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `totalPayment`() RETURNS decimal(10,2)
    DETERMINISTIC
BEGIN
    DECLARE total DECIMAL(10,2);

    SELECT IFNULL(SUM(so_tien), 0) INTO total
    FROM tt_thuephong
    WHERE ma_hop_dong IN (
        SELECT ma_hop_dong
        FROM thuephong
        WHERE trang_thai = 'daduyet'
    );

    RETURN total;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `total_revenue` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `total_revenue`() RETURNS decimal(10,2)
    DETERMINISTIC
BEGIN
    DECLARE total_revenue DECIMAL(10,2) DEFAULT 0;

    SELECT SUM(tt.so_tien) + IFNULL(SUM(tp.tien_dat_coc), 0) INTO total_revenue
    FROM tt_thuephong tt
    JOIN thuephong tp ON tt.ma_hop_dong = tp.ma_hop_dong;

    IF total_revenue IS NULL THEN
        RETURN 0;
    ELSE
        RETURN total_revenue;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AddThuePhongAndUpdate` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddThuePhongAndUpdate`(
    IN p_ma_hop_dong INT,
    IN p_thang_nam DATE,
    IN p_so_tien DECIMAL(10,2),
    IN p_ngay_thanh_toan DATE,
    IN p_ma_nhan_vien VARCHAR(8)
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Rollback transaction if any error occurs
        ROLLBACK;
    END;

    START TRANSACTION;

    -- Insert into tt_thuephong
    INSERT INTO tt_thuephong (ma_hop_dong, thang_nam, so_tien, ngay_thanh_toan, ma_nhan_vien)
    VALUES (p_ma_hop_dong, p_thang_nam, p_so_tien, p_ngay_thanh_toan, p_ma_nhan_vien);

    -- Update can_thanh_toan in ThuePhong
    UPDATE thuephong
    SET can_thanh_toan = can_thanh_toan - p_so_tien
    WHERE ma_hop_dong = p_ma_hop_dong;

    COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-14 21:45:46