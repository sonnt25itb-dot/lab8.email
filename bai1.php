
<?php
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);

try {
    // Cau hinh Gmail SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->CharSet = 'UTF-8';

    // Thong tin Gmail nguoi gui
    $mail->Username = 'sonnt.25itb@vku.udn.vn';
    $mail->Password = 'nulw qlxc htma zpux';

    // Bao mat ket noi
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Nguoi gui
    $mail->setFrom(
        'sonnt.25itb@vku.udn.vn',
        'Sinh vien Lab 8'
    );

    // Nguoi nhan
    $mail->addAddress('truongsn2805@gmail.com');

    // Noi dung email
    $mail->isHTML(true);
    $mail->Subject = 'Bai thuc hanh Lab 8';
    $mail->Body = '<h2>Xin chao!</h2>
                   <p>Day la email gui bang PHP.</p>';

    // Gui email
    $mail->send();

    echo 'Gui email thanh cong!';

} catch (Exception $e) {
    echo 'Gui email that bai: ' . $mail->ErrorInfo;
}
?>
