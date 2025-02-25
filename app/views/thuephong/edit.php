<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thuê Phòng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../style.css">
</head>

<body>
<?php include "../app/views/layout/header.php"; ?>
<div class="container mt-4">
                    <h1 class="mb-4">Sửa hợp đồng thuê phòng</h1>
                    <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="form-group">
                            <label>Mã Hợp Đồng:</label>
                            <input type="text" name="ma_hop_dong" class="form-control"
                                value="<?= htmlspecialchars($thuePhong->ma_hop_dong) ?>" readonly>
                            <input type="text" hidden name="ma_hoc_ky" class="form-control"
                                value="<?= htmlspecialchars($thuePhong->ma_hoc_ky) ?>">
                        </div>
                        <div class="form-group">
                            <label>Mã Sinh Viên:</label>
                            <input type="text" name="ma_sinh_vien" class="form-control"
                                value="<?= htmlspecialchars($thuePhong->ma_sinh_vien) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Mã Phòng:</label>
                            <input type="text" name="ma_phong" class="form-control"
                                value="<?= htmlspecialchars($thuePhong->ma_phong) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Ngày Bắt Đầu:</label>
                            <input type="date" name="bat_dau" class="form-control"
                                value="<?= htmlspecialchars($thuePhong->bat_dau) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Ngày Kết Thúc:</label>
                            <input type="date" name="ket_thuc" class="form-control"
                                value="<?= htmlspecialchars($thuePhong->ket_thuc) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tiền Đặt Cọc:</label>
                            <input type="number" name="tien_dat_coc" class="form-control"
                                value="<?= htmlspecialchars($thuePhong->tien_dat_coc) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Giá Thuê Thực Tế:</label>
                            <input type="number" name="gia_thue_thuc_te" class="form-control"
                                value="<?= htmlspecialchars($thuePhong->gia_thue_thuc_te) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Cần Thanh Toán:</label>
                            <input type="number" name="can_thanh_toan" class="form-control"
                                value="<?= htmlspecialchars($thuePhong->can_thanh_toan) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Trạng Thái:</label>
                            <select name="trang_thai" class="form-control" required>
                                <option value="choxetduyet"
                                    <?= $thuePhong->trang_thai === 'choxetduyet' ? 'selected' : '' ?>>Chờ Xét Duyệt
                                </option>
                                <option value="daduyet" <?= $thuePhong->trang_thai === 'daduyet' ? 'selected' : '' ?>>Đã
                                    Duyệt</option>
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