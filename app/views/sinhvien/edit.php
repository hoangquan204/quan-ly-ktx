<!-- app/views/sinhvien/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sinh Viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../style.css">
</head>

<body>
<?php include "../app/views/layout/header.php"; ?>
<div class="container mt-4">
                    <h1 class="mb-4">Sửa sinh viên</h1>
                    <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <form method="POST" class="form">
                        <div class="form-group">
                            <label for="ma_sinh_vien">Mã Sinh Viên:</label>
                            <input type="text" name="ma_sinh_vien" id="ma_sinh_vien" class="form-control"
                                value="<?= htmlspecialchars($sinhVien->ma_sinh_vien) ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ho_ten">Họ Tên:</label>
                            <input type="text" name="ho_ten" id="ho_ten" class="form-control"
                                value="<?= htmlspecialchars($sinhVien->ho_ten) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="so_dien_thoai">Số Điện Thoại:</label>
                            <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control"
                                value="<?= htmlspecialchars($sinhVien->so_dien_thoai) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="ma_lop">Mã Lớp:</label>
                            <input type="text" name="ma_lop" id="ma_lop" class="form-control"
                                value="<?= htmlspecialchars($sinhVien->ma_lop) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật Khẩu (Để trống nếu không muốn đổi):</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="gioi_tinh">Giới tính:</label>
                            <select name="gioi_tinh" id="gioi_tinh" class="form-control" required>
                                <option value="">Chọn giới tính</option>
                                <option value="nam" <?= $sinhVien->gioi_tinh === 'nam' ? 'selected' : '' ?>>Nam</option>
                                <option value="nu" <?= $sinhVien->gioi_tinh === 'nu' ? 'selected' : '' ?>>Nữ</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>