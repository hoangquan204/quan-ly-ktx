<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Cá Nhân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

<?php include "../app/views/layout/header.php"; ?>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Thông Tin Cá Nhân</h2>

    <div class="card p-4">
        <div class="row mb-3">
            <label class="col-sm-3 fw-bold">Mã Sinh Viên:</label>
            <div class="col-sm-9"><?= htmlspecialchars($_SESSION['user']['ma_so'] ?? 'Chưa có dữ liệu') ?></div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 fw-bold">Họ Tên:</label>
            <div class="col-sm-9"><?= htmlspecialchars($_SESSION['user']['ho_ten'] ?? 'Chưa có dữ liệu') ?></div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 fw-bold">Giới Tính:</label>
            <div class="col-sm-9"><?= htmlspecialchars($_SESSION['user']['gioi_tinh'] ?? 'Chưa có dữ liệu') ?></div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 fw-bold">Số Điện Thoại:</label>
            <div class="col-sm-9"><?= htmlspecialchars($_SESSION['user']['so_dien_thoai'] ?? 'Chưa có dữ liệu') ?></div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 fw-bold">Mã Lớp:</label>
            <div class="col-sm-9"><?= htmlspecialchars( $_SESSION['user']['ma_lop'] ?? 'Chưa có dữ liệu') ?></div>
        </div>

        <div class="text-center">
            <a href="capnhat_thongtin.php" class="btn btn-primary"><i class="fas fa-edit"></i> Cập Nhật Thông Tin</a>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-4">
    <p class="mb-0">&copy; 2025 Quản Lý KTX. Mọi quyền được bảo lưu.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
