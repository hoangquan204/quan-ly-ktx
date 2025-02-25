<!-- app/views/sinhvien/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Kiểm tra lại đường dẫn -->
    <link rel="icon" type="image/x-icon" href="CTU_logo.ico">
</head>

<body>
<?php include "../app/views/layout/header.php"; ?>
<div class="container mt-4">
                    <h1 class="mb-4">Danh sách sinh viên</h1>
                    <!-- Hiển thị thông báo thành công nếu có -->
                    <?php if (!empty($_SESSION['successMessage'])): ?>
                    <div class="alert alert-success">
                        <?= htmlspecialchars($_SESSION['successMessage']) ?>
                    </div>
                    <?php unset($_SESSION['successMessage']); ?>
                    <?php endif; ?>

                    <!-- Hiển thị lỗi nếu có -->
                    <?php if (!empty($_SESSION['errors'])): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($_SESSION['errors'] as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php unset($_SESSION['errors']); ?>
                    <?php endif; ?>

                    <!-- Form tìm kiếm -->
                    <form action="/sinhvien" method="get" class="mb-3">
                        <input type="text" name="ho_ten" placeholder="Họ tên"
                            value="<?= htmlspecialchars($_GET['ho_ten'] ?? '') ?>">
                        <input type="text" name="so_dien_thoai" placeholder="Số điện thoại"
                            value="<?= htmlspecialchars($_GET['so_dien_thoai'] ?? '') ?>">
                        <input type="text" name="ma_lop" placeholder="Mã lớp"
                            value="<?= htmlspecialchars($_GET['ma_lop'] ?? '') ?>">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </form>

                    <a href="/sinhvien/create" class="btn btn-primary mb-3">Thêm Sinh Viên</a>

                    <!-- Bảng hiển thị danh sách sinh viên hoặc kết quả tìm kiếm -->
                    <table class="table table-bordered table-hover">
                        <thead class="custom-thead">
                            <tr>
                                <th>Mã Sinh Viên<a href="?order_by=ma_sinh_vien&order_direction=ASC"> ▲</a> | <a href="?order_by=ma_sinh_vien&order_direction=DESC">▼</a></th>
                                <th>Họ Tên<a href="?order_by=ho_ten&order_direction=ASC"> ▲</a> | <a href="?order_by=ho_ten&order_direction=DESC">▼</a></th>
                                <th>Số Điện Thoại</th>
                                <th>Mã Lớp</th>
                                <th>Giới Tính</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($_GET['ho_ten']) || isset($_GET['so_dien_thoai']) || isset($_GET['ma_lop'])): ?>
                            <?php if (empty($sinhViens)): ?>
                            <tr>
                                <td colspan="6">Không tìm thấy sinh viên nào phù hợp.</td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($sinhViens as $sinhvien): ?>
                            <tr>
                                <td><?= htmlspecialchars($sinhvien['ma_sinh_vien']) ?></td>
                                <td><?= htmlspecialchars($sinhvien['ho_ten']) ?></td>
                                <td><?= htmlspecialchars($sinhvien['so_dien_thoai']) ?></td>
                                <td><?= htmlspecialchars($sinhvien['ma_lop']) ?></td>
                                <td><?= htmlspecialchars($sinhvien['gioi_tinh']) ?></td>
                                <td>
                                    <a href="/sinhvien/edit/<?= $sinhvien['ma_sinh_vien'] ?>"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                    <a href="/sinhvien/delete/<?= $sinhvien['ma_sinh_vien'] ?>"
                                        class="btn btn-danger btn-sm" onclick="return confirmDelete();">Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?php foreach ($sinhViens as $sinhvien): ?>
                            <tr>
                                <td><?= htmlspecialchars($sinhvien['ma_sinh_vien']) ?></td>
                                <td><?= htmlspecialchars($sinhvien['ho_ten']) ?></td>
                                <td><?= htmlspecialchars($sinhvien['so_dien_thoai']) ?></td>
                                <td><?= htmlspecialchars($sinhvien['ma_lop']) ?></td>
                                <td><?= htmlspecialchars($sinhvien['gioi_tinh']) ?></td>
                                <td>
                                    <a href="/sinhvien/edit/<?= $sinhvien['ma_sinh_vien'] ?>"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                    <a href="/sinhvien/delete/<?= $sinhvien['ma_sinh_vien'] ?>"
                                        class="btn btn-danger btn-sm" onclick="return confirmDelete();">Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Files -->
    <script>
    function confirmDelete() {
        return confirm("Bạn có chắc chắn muốn xóa? ");
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>