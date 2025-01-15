<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Atau path file PHPMailer jika tidak menggunakan Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Membuat instance PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Pengaturan server SMTP
        $mail->isSMTP();                                            // Menggunakan SMTP
        $mail->Host = 'smtp.gmail.com';                               // Atur host SMTP (gunakan SMTP server Gmail di sini)
        $mail->SMTPAuth = true;                                       // Aktifkan autentikasi SMTP
        $mail->Username = 'marselasela3554@gmail.com';                 // Alamat email pengirim
        $mail->Password = 'password_email_anda';                       // Password email pengirim (gunakan password app jika menggunakan Gmail)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            // Enkripsi TLS
        $mail->Port = 587;                                            // Port yang digunakan untuk TLS

        // Pengaturan penerima
        $mail->setFrom('marselasela3554@gmail.com', 'Rollchemmy');
        $mail->addAddress($email, $name);                             // Email pengirim (penerima balasan)

        // Konten email
        $mail->isHTML(false);                                         // Gunakan email teks biasa
        $mail->Body    .= "\"Gurihnya Kebahagiaan di Tiap Gigitan\" - Admin"; 

        // Kirim email
        if ($mail->send()) {
            echo "Pesan Anda telah dikirim. Terima kasih!";
        } else {
            echo "Pesan gagal dikirim. Coba lagi.";
        }
    } catch (Exception $e) {
        echo "Gagal mengirim email. Error: {$mail->ErrorInfo}";
    }
}
?>
