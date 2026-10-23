<?php
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

// Danh sach email nguoi nhan
$dsEmail = [
    'truongsn2805@gmail.com',
    'sonnt.25itb@vku.udn.vn',
];

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sonnt.25itb@vku.udn.vn';
    $mail->Password = 'nulw qlxc htma zpux';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom(
        'sonnt.25itb@vku.udn.vn',
        'Sinh vien Lab 8'
    );

    // Them nhieu nguoi nhan
    foreach ($dsEmail as $email) {
        $mail->addAddress($email);
    }

    $mail->isHTML(true);
    $mail->Subject = 'Bai 3 - Gui email nhieu nguoi';
    $mail->Body = '<h2>Xin chao!</h2>
                   <p>Day la email gui cho nhieu nguoi.</p>';

    $mail->send();

    echo 'Gui email cho nhieu nguoi thanh cong!';

} catch (Exception $e) {
    echo 'Gui email that bai: ' .
         htmlspecialchars($mail->ErrorInfo);
}
?>
