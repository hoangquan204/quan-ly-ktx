<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hợp Đồng Thuê Phòng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../style.css">
</head>

<body>
<?php include "../app/views/layout/header.php"; ?>
<div class="container mt-4">
                    <h1 class="mb-4">Thêm hợp đồng thuê phòng</h1>
                    <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error): ?>
                        <p><?= $error ?></p>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Mã Sinh Viên:</label>
                            <input type="text" name="ma_sinh_vien" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mã Phòng:</label>
                            <input type="text" name="ma_phong" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Học Kỳ:</label>
                            <select name="ma_hoc_ky" class="form-control" required>
                                <?php foreach ($hocKys as $hocKy): ?>
                                <option value="<?= $hocKy['ma_hoc_ky'] ?>"> <?= $hocKy['ten_hoc_ky'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiền Đặt Cọc:</label>
                            <input type="number" name="tien_dat_coc" class="form-control" required>
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