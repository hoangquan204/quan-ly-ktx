<!-- app/views/lienhe.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

<?php include "../app/views/layout/header.php"; ?>

<div class="container mt-4">
    <h1 class="text-center mb-4">Liên Hệ</h1>

    <div class="row">
        <!-- Form liên hệ -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title text-center">Gửi Thông Tin Liên Hệ</h4>
                    <form action="process_contact.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và Tên</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Nội Dung</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><i class="fas fa-paper-plane"></i> Gửi</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Thông tin liên hệ -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title text-center">Thông Tin Liên Hệ</h4>
                    <p><i class="fas fa-map-marker-alt"></i> Địa chỉ: Ký túc xá ĐH ABC, Quận 9, TP. HCM</p>
                    <p><i class="fas fa-envelope"></i> Email: support@ktxabc.edu.vn</p>
                    <p><i class="fas fa-phone"></i> Điện thoại: 0123 456 789</p>
                </div>
            </div>

            <!-- Google Maps -->
            <div class="mt-3">
                <iframe width="100%" height="250" style="border:0;" loading="lazy" allowfullscreen 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2336.100572179985!2d105.76888585411206!3d10.030290283558067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0883d2192b0f1%3A0x4c90a391d232ccce!2zVHLGsOG7nW5nIEPDtG5nIE5naOG7hyBUaMO0bmcgVGluIHbDoCBUcnV54buBbiBUaMO0bmcgKENUVSk!5e0!3m2!1svi!2s!4v1728823560715!5m2!1svi!2s">
                </iframe>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
