<!-- app/views/phong/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Phòng</title>
    <!-- Đảm bảo rằng tệp CSS được liên kết đúng -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Kiểm tra lại đường dẫn -->
</head>

<body>
<?php include "../app/views/layout/header.php"; ?>
<div class="container mt-4">
                    <h1 class="mb-4">Danh sách phòng</h1>
                    <?php if ($sinhVien->notification!=''): ?>
                    <div class="alert alert-info">
                        <?= htmlspecialchars($sinhVien->notification) ?>
                    </div>
                    <?php $this->clearNotification($sinhVien->ma_sinh_vien);  endif; ?>

                    <!-- Hiển thị thông báo thành công nếu có -->
                    <?php if (!empty($successMessage)): ?>
                    <div class="alert alert-success">
                        <?= htmlspecialchars($successMessage) ?>
                    </div>
                    <?php endif; ?>

                    <!-- Hiển thị lỗi nếu có -->
                    <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <!-- Form tìm kiếm -->
                    <form action="/phong" method="get" class="mb-3">
                        <input type="text" name="dien_tich" placeholder="Diện tích"
                            value="<?= htmlspecialchars($_GET['dien_tich'] ?? '') ?>">
                        <input type="number" name="so_giuong" placeholder="Số giường"
                            value="<?= htmlspecialchars($_GET['so_giuong'] ?? '') ?>">
                        <select name="gioi_tinh">
                            <option value="">Chọn giới tính</option>
                            <option value="nam"
                                <?= (isset($_GET['gioi_tinh']) && $_GET['gioi_tinh'] === 'nam') ? 'selected' : '' ?>>Nam
                            </option>
                            <option value="nu"
                                <?= (isset($_GET['gioi_tinh']) && $_GET['gioi_tinh'] === 'nu') ? 'selected' : '' ?>>Nữ
                            </option>
                        </select>
                        <label class="buttonphongtrong">
                            <input type="checkbox" name="chi_phong_trong" value="1"
                                <?= isset($_GET['chi_phong_trong']) ? 'checked' : '' ?>>
                            Chỉ hiển thị phòng trống
                        </label>
                        <button type="submit">Tìm kiếm</button>
                    </form>

                    <!-- Bảng hiển thị danh sách phòng hoặc kết quả tìm kiếm -->

                    <table class="table table-bordered table-hover">
                        <thead class="custom-thead">
                            <tr>
                                <th>Mã Phòng</th>
                                <th>Tên Phòng</th>
                                <th>Diện Tích</th>
                                <th>Số Giường</th>
                                <th>Giá Thuê</th>
                                <th>Giới Tính</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($_GET['ten_phong']) || isset($_GET['dien_tich']) || isset($_GET['so_giuong'])): ?>
                            <?php if (empty($phongs)): ?>
                            <tr>
                                <td colspan="6">Không tìm thấy phòng nào phù hợp.</td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($phongs as $phong): ?>
                            <tr>
                                <td><?= htmlspecialchars($phong['ma_phong']) ?></td>
                                <td><?= htmlspecialchars($phong['ten_phong']) ?></td>
                                <td><?= htmlspecialchars($phong['dien_tich']) ?></td>
                                <td><?= htmlspecialchars($phong['so_giuong']) ?></td>
                                <td><?= htmlspecialchars($phong['gia_thue']) ?></td>

                                <td><?= htmlspecialchars($phong['gioi_tinh']) ?></td>
                                

                                <td>
                                    <form method="post" style="display:inline;">
                                        <input type="hidden" name="ma_phong"
                                            value="<?= htmlspecialchars($phong['ma_phong']) ?>">
                                        <input type="hidden" name="ma_sinh_vien"
                                            value="<?= htmlspecialchars($_SESSION['ma_so']) ?>">
                                        <button type="submit" class="btn btn-primary">Thuê Phòng</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?php foreach ($phongs as $phong): ?>
                            <tr>
                                <td><?= htmlspecialchars($phong['ma_phong']) ?></td>
                                <td><?= htmlspecialchars($phong['ten_phong']) ?></td>
                                <td><?= htmlspecialchars($phong['dien_tich']) ?></td>
                                <td><?= htmlspecialchars($phong['so_giuong']) ?></td>
                                <td><?= htmlspecialchars($phong['gia_thue']) ?></td>
                                <td><?= htmlspecialchars($phong['gioi_tinh']) ?></td>
                                <td>
                                    <form method="post" style="display:inline;">
                                        <input type="hidden" name="ma_phong"
                                            value="<?= htmlspecialchars($phong['ma_phong']) ?>">
                                        <input type="hidden" name="ma_sinh_vien"
                                            value="<?= htmlspecialchars($_SESSION['ma_so']) ?>">
                                        <button type="submit" class="btn btn-primary">Thuê Phòng</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
        </div>
    </div>

    <!-- JavaScript Files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>