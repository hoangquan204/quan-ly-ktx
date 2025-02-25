<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Thanh Toán Thuê Phòng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../style.css">
</head>

<body>
<?php include "../app/views/layout/header.php"; ?>
<div class="container mt-4">
                    <h1 class="mb-4">Thêm thanh toán thuê phòng</h1>
                    <!-- Hiển thị thông báo lỗi -->
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
                            <input type="number" name="ma_hop_dong" class="form-control"
                                value="<?= $_GET['ma_hop_dong'] ?? '' ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tháng Năm:</label>
                            <input type="month" name="thang_nam" class="form-control" value="<?= date('Y-m') ?>"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Số Tiền:</label>
                            <input type="number" name="so_tien" value="<?= $ThuePhong->can_thanh_toan  ?>" readonly
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Ngày Thanh Toán:</label>
                            <input type="date" name="ngay_thanh_toan" class="form-control" value="<?= date('Y-m-d') ?>"
                                required>
                        </div>
                        <label>Nhân viên thanh toán: <?= htmlspecialchars($_SESSION['ho_ten'])?></label>
                        <div class="form-group">
                            <input type="text" name="ma_nhan_vien" hidden class="form-control"
                                value="<?= $_SESSION['ma_so'] ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
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