<?php
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Vui long gui email tu bieu mau.');
}

// Lay du lieu tu form
$email = trim($_POST['email'] ?? '');
$tieude = trim($_POST['tieude'] ?? '');
$noidung = trim($_POST['content'] ?? '');

// Kiem tra du lieu
if (!filter_var($email, FILTER_VALIDATE_EMAIL)
    || $tieude === '' || $noidung === '') {
    exit('Thong tin email khong hop le!');
}

$mail = new PHPMailer(true);

try {
    // Cau hinh SMTP Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->CharSet = 'UTF-8';

    // Thay bang Gmail va mat khau ung dung cua ban
    $mail->Username = 'sonnt.25itb@vku.udn.vn';
    $mail->Password = 'nulw qlxc htma zpux';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Nguoi gui
    $mail->setFrom(
        'sonnt.25itb@vku.udn.vn',
        'Sinh vien Lab 8'
    );

    // Nguoi nhan lay tu form
    $mail->addAddress($email);

    // Noi dung email
    $mail->isHTML(true);
    $mail->Subject = $tieude;
    $mail->Body = nl2br(
        htmlspecialchars($noidung, ENT_QUOTES, 'UTF-8')
    );
    $mail->AltBody = $noidung;

    // Xu ly file dinh kem
    if (isset($_FILES['file']) &&
        $_FILES['file']['error'] !== UPLOAD_ERR_NO_FILE) {

        if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('Loi tai file dinh kem!');
        }

        if ($_FILES['file']['size'] > 5 * 1024 * 1024) {
            throw new Exception('File khong duoc qua 5MB!');
        }

        $mail->addAttachment(
            $_FILES['file']['tmp_name'],
            basename($_FILES['file']['name'])
        );
    }

    // Gui email
    $mail->send();

    echo '<h2 style="color:green">
          Gui email thanh cong!
          </h2>';
    echo '<a href="index.php">Quay lai</a>';

} catch (Exception $e) {
    echo 'Gui email that bai: ' .
         htmlspecialchars($e->getMessage());
}
?>
