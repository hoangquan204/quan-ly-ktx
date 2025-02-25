<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng Hiện Tại</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../style.css">
</head>

<body>
<?php include "../app/views/layout/header.php"; ?>
<div class="container mt-4">
                    <h1 class="mb-4">Phòng của bạn</h1>
                    <table class="table table-bordered table-hover">
                        <thead class="custom-thead">
                            <tr>
                                <th>Mã Phòng</th>
                                <th>Tên Phòng</th>
                                <th>Diện Tích</th>
                                <th>Số Giường</th>
                                <th>Giá Thuê</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($currentRoom): ?>
                            <tr>
                                <td><?= htmlspecialchars($currentRoom['ma_phong']) ?></td>
                                <td><?= htmlspecialchars($currentRoom['ten_phong']) ?></td>
                                <td><?= htmlspecialchars($currentRoom['dien_tich']) ?></td>
                                <td><?= htmlspecialchars($currentRoom['so_giuong']) ?></td>
                                <td><?= htmlspecialchars($currentRoom['gia_thue']) ?></td>
                            </tr>
                            <?php else :?>
                            <tr>
                                <td colspan="5">Không có phòng hiện tại.</td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>

                    <h3>Phòng Đang Chờ Xét Duyệt</h3>
                    <table class="table table-bordered table-hover">
                        <thead class="custom-thead">
                            <tr>
                                <th>Mã Phòng</th>
                                <th>Tên Phòng</th>
                                <th>Diện Tích</th>
                                <th>Số Giường</th>
                                <th>Giá Thuê</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($pendingRoom): ?>
                            <tr>
                                <td><?= htmlspecialchars($pendingRoom['ma_phong']) ?></td>
                                <td><?= htmlspecialchars($pendingRoom['ten_phong']) ?></td>
                                <td><?= htmlspecialchars($pendingRoom['dien_tich']) ?></td>
                                <td><?= htmlspecialchars($pendingRoom['so_giuong']) ?></td>
                                <td><?= htmlspecialchars($pendingRoom['gia_thue']) ?></td>
                            </tr>
                            <?php else :?>
                            <tr>
                                <td colspan="5">Không có phòng đang chờ xét duyệt.</td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>

                    <h3>Thành Viên Ở Cùng</h3>
                    <table class="table table-bordered table-hover">
                        <thead class="custom-thead">
                            <tr>
                                <th>Mã Sinh Viên</th>
                                <th>Họ Tên</th>
                                <th>Giới Tính</th>
                                <th>Số Điện Thoại</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($roommates)): ?>
                            <tr>
                                <td colspan="4">Không có thành viên nào ở cùng.</td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($roommates as $roommate): ?>
                            <tr>
                                <td><?= htmlspecialchars($roommate['ma_sinh_vien']) ?></td>
                                <td><?= htmlspecialchars($roommate['ho_ten']) ?></td>
                                <td><?= htmlspecialchars($roommate['gioi_tinh']) ?></td>
                                <td><?= htmlspecialchars($roommate['so_dien_thoai']) ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>