<!-- app/views/danhsachphong/search.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../style.css">
</head>

<body>
<?php include "../app/views/layout/header.php"; ?>
<div class="container mt-4">
                    <h1 class="mb-4">Kết quả tìm kiếm</h1>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Mã Nhân Viên</th>
                    <th>Tên Nhân Viên</th>
                    <th>Ghi Chú</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($phongs)): ?>
                    <p>Không tìm thấy nhân viên nào phù hợp.</p>
                <?php else: ?>
                    <?php foreach ($nhanViens as $nhanVien): ?>
                        <tr>
                            <td><?= htmlspecialchars($phong['ma_nhan_vien']) ?></td>
                            <td><?= htmlspecialchars($phong['ho_ten']) ?></td>
                            <td><?= htmlspecialchars($phong['ghi_chu']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="/danhsachphong" class="btn btn-primary">Quay lại danh sách nhân viên</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
