-- Xóa database cũ nếu tồn tại
DROP DATABASE IF EXISTS QuanLyKTX;

-- Tạo database mới
CREATE DATABASE QuanLyKTX;
USE QuanLyKTX;

-- Tạo bảng Phòng (Bảng cha)
CREATE TABLE Phong (
    MaPhong VARCHAR(10) PRIMARY KEY,
    LoaiPhong ENUM('Thường', 'VIP') NOT NULL,
    SoLuongToiDa INT NOT NULL,
    SoLuongHienTai INT DEFAULT 0,
    GiaPhong DECIMAL(10,2) NOT NULL,
    TrangThai ENUM('Trống', 'Đầy') DEFAULT 'Trống'
);

-- Tạo bảng Sinh Viên (Bảng con, liên kết với Phòng)
CREATE TABLE SinhVien (
    MaSV VARCHAR(10) PRIMARY KEY,
    HoTen VARCHAR(100) NOT NULL,
    NgaySinh DATE NOT NULL,
    GioiTinh ENUM('Nam', 'Nữ') NOT NULL,
    SoDienThoai VARCHAR(15) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    DiaChi TEXT NOT NULL,
    MaPhong VARCHAR(10),
    FOREIGN KEY (MaPhong) REFERENCES Phong(MaPhong) ON DELETE SET NULL
);

-- Tạo bảng Hợp Đồng (Liên kết với Sinh Viên và Phòng)
CREATE TABLE HopDong (
    MaHD VARCHAR(10) PRIMARY KEY,
    MaSV VARCHAR(10) NOT NULL,
    MaPhong VARCHAR(10) NOT NULL,
    NgayBatDau DATE NOT NULL,
    NgayKetThuc DATE NOT NULL,
    TinhTrang ENUM('Còn hiệu lực', 'Hết hạn') DEFAULT 'Còn hiệu lực',
    FOREIGN KEY (MaSV) REFERENCES SinhVien(MaSV) ON DELETE CASCADE,
    FOREIGN KEY (MaPhong) REFERENCES Phong(MaPhong) ON DELETE CASCADE
);

-- Tạo bảng Thanh Toán (Liên kết với Sinh Viên)
CREATE TABLE ThanhToan (
    MaTT VARCHAR(10) PRIMARY KEY,
       MaHD VARCHAR(10) NOT NULL,
    MaSV VARCHAR(10) NOT NULL,
    ThangThanhToan INT NOT NULL,
    NamThanhToan INT NOT NULL,
    SoTien DECIMAL(10,2) NOT NULL,
    TrangThai ENUM('Chưa thanh toán', 'Đã thanh toán') DEFAULT 'Chưa thanh toán',
   FOREIGN KEY (MaHD) REFERENCES HopDong(MaHD) ON DELETE CASCADE,
    FOREIGN KEY (MaSV) REFERENCES SinhVien(MaSV) ON DELETE CASCADE
);

-- Tạo bảng Người Dùng (Quản trị hệ thống)
CREATE TABLE NguoiDung (
    TenDangNhap VARCHAR(50) PRIMARY KEY,
    MatKhau VARCHAR(255) NOT NULL,
    VaiTro ENUM('Admin', 'NhanVien') NOT NULL
);

-- Chèn dữ liệu mẫu vào bảng Người Dùng
INSERT INTO NguoiDung (TenDangNhap, MatKhau, VaiTro) VALUES 
('admin', '123456', 'Admin'),
('nhanvien01', '123456', 'NhanVien');

-- Chèn dữ liệu mẫu vào bảng Phòng
INSERT INTO Phong (MaPhong, LoaiPhong, SoLuongToiDa, GiaPhong, TrangThai) VALUES 
('P101', 'Thường', 4, 500000, 'Trống'),
('P102', 'VIP', 2, 1000000, 'Trống');

-- Chèn dữ liệu mẫu vào bảng Sinh Viên
INSERT INTO SinhVien (MaSV, HoTen, NgaySinh, GioiTinh, SoDienThoai, Email, DiaChi, MaPhong) VALUES 
('SV001', 'Nguyễn Văn A', '2002-05-10', 'Nam', '0123456789', 'nguyenvana@gmail.com', 'Hà Nội', 'P101'),
('SV002', 'Trần Thị B', '2003-08-15', 'Nữ', '0987654321', 'tranthib@gmail.com', 'Hồ Chí Minh', 'P102');

-- Chèn dữ liệu mẫu vào bảng Hợp Đồng
INSERT INTO HopDong (MaHD, MaSV, MaPhong, NgayBatDau, NgayKetThuc, TinhTrang) VALUES 
('HD001', 'SV001', 'P101', '2024-01-01', '2024-12-31', 'Còn hiệu lực'),
('HD002', 'SV002', 'P102', '2024-02-01', '2024-12-31', 'Còn hiệu lực');

-- Chèn dữ liệu mẫu vào bảng Thanh Toán
INSERT INTO ThanhToan (MaTT, MaHD, MaSV, ThangThanhToan, NamThanhToan, SoTien, TrangThai) VALUES 
('TT001', 'HD001', 'SV001', 1, 2024, 500000, 'Đã thanh toán'),
('TT002', 'HD002', 'SV002', 1, 2024, 1000000, 'Chưa thanh toán');
COMMIT;
