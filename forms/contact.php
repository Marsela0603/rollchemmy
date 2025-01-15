<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Email tujuan (pengirim email balasan)
    $to = $email;

    // Subject untuk email balasan
    $email_subject = "Feedback Rollchemmy";

    // Isi email
    $email_body = "Terimakasih telah mengirim masukan pada Rollchemmy!\n\n";
    $email_body .= "\"Gurihnya Kebahagiaan di Tiap Gigitan\" - Admin";

    // Email pengirim
    $headers = "From: marselasela3554@gmail.com\r\n";
    $headers .= "Reply-To: marselasela3554@gmail.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Kirim email balasan
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request.";
}
?>
