<!-- app/views/danhsachphong/search.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../../style.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Kết quả tìm kiếm</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Mã Phòng</th>
                    <th>Tên Phòng</th>
                    <th>Diện Tích</th>
                    <th>Số Giường</th>
                    <th>Giá Thuê</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($phongs)): ?>
                <p>Không tìm thấy phòng nào phù hợp.</p>
                <?php else: ?>
                <?php foreach ($phongs as $phong): ?>
                <tr>
                    <td><?= htmlspecialchars($phong['ma_phong']) ?></td>
                    <td><?= htmlspecialchars($phong['ten_phong']) ?></td>
                    <td><?= htmlspecialchars($phong['dien_tich']) ?></td>
                    <td><?= htmlspecialchars($phong['so_giuong']) ?></td>
                    <td><?= htmlspecialchars($phong['gia_thue']) ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="/danhsachphong" class="btn btn-primary">Quay lại danh sách phòng</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>