<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Thuê Phòng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/x-icon" href="CTU_logo.ico">
</head>

<body>
<?php include "../app/views/layout/header.php"; ?>
<div class="container mt-4">
                    <h1 class="mb-4">Quản lý thuê phòng</h1>
                    <a href="/thuephong/create" class="btn btn-primary mb-3">Thêm Hợp Đồng</a>
                    <a href="/thuephong?status=choxetduyet" class="btn btn-secondary mb-3">Các Hợp Đồng Chờ Xét
                        Duyệt</a>
                    <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php 
                            foreach ($_SESSION['errors'] as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach;
                            unset($_SESSION['errors']); // Xóa lỗi sau khi hiển thị
                            ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <table class="table table-bordered table-hover">
                        <thead class="custom-thead">
                            <tr>
                                <th>Mã Hợp Đồng</th>
                                <th>Mã Sinh Viên</th>
                                <th>Mã Phòng</th>
                                <th>Bắt Đầu</th>
                                <th>Kết Thúc</th>
                                <th>Tiền Đặt Cọc</th>
                                <th>Giá Thuê Thực Tế</th>
                                <th>Cần Thanh Toán</th>
                                <th>Trạng Thái</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($thuePhongs as $thuePhong): ?>
                            <tr>
                                <td><?= $thuePhong['ma_hop_dong'] ?></td>
                                <td><?= $thuePhong['ma_sinh_vien'] ?></td>
                                <td><?= $thuePhong['ma_phong'] ?></td>
                                <td><?= $thuePhong['bat_dau'] ?></td>
                                <td><?= $thuePhong['ket_thuc'] ?></td>
                                <td><?= $thuePhong['tien_dat_coc'] ?></td>
                                <td><?= $thuePhong['gia_thue_thuc_te'] ?></td>
                                <td><?= $thuePhong['can_thanh_toan'] ?> </td>
                                <td>
                                    <?php if ($thuePhong['trang_thai'] === 'choxetduyet'): ?>
                                    <a href="/thuephong/approve/<?= $thuePhong['ma_hop_dong'] ?>"
                                        class="btn btn-info btn-sm">Xét Duyệt</a>
                                    <a href="/thuephong/delete/<?= $thuePhong['ma_hop_dong'] ?>"
                                        class="btn btn-danger btn-sm mt-2"
                                        onclick="return confirm('Bạn có chắc chắn muốn không duyệt và xóa hợp đồng này?');">Không
                                        Duyệt</a>
                                    <?php else :; ?>
                                    <p>Đã được duyệt</p>
                                    <?php endif?>
                                </td>

                                <td class="d-flex">
                                    <?php if ($thuePhong['trang_thai'] === 'daduyet'): ?>
                                    <a href="/tt_thuephong/create?ma_hop_dong=<?= $thuePhong['ma_hop_dong'] ?>"
                                        class="btn btn-success btn-sm col-4 hanhdong">Thêm Thanh Toán</a>
                                    <?php endif ?>
                                    <a href="/thuephong/edit/<?= $thuePhong['ma_hop_dong'] ?>"
                                        class="btn btn-warning btn-sm col-4 hanhdong">Sửa</a>
                                    <a href="/thuephong/delete/<?= $thuePhong['ma_hop_dong'] ?>"
                                        class="btn btn-danger btn-sm col-4 hanhdong"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa hợp đồng này, các dữ liệu liên quan sẽ bị xóa theo?');">Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
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