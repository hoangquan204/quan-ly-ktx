<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../style.css"> 
</head>

<body>
<?php include "../app/views/layout/header.php"; ?>
<div class="container mt-4">
                    <h1 class="mb-4">Thêm nhân viên</h1>
                    <form method="POST">
                        <div class="form-group">
                            <label>Họ Tên:</label>
                            <input type="text" name="ho_ten" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại:</label>
                            <input type="text" name="so_dien_thoai" class="form-control" required pattern="[0-9]{10,11}"
                                title="Số điện thoại phải có 10-11 chữ số">
                        </div>
                        <div class="form-group">
                            <label>Ghi Chú:</label>
                            <select name="ghi_chu" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="nhan vien">Nhân Viên</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu:</label>
                            <input type="password" name="password" class="form-control" required>
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