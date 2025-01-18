<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Nomor WhatsApp tujuan
    $phoneNumber = '6282125909774'; // Ganti dengan nomor WhatsApp Anda tanpa tanda "+" dan gunakan format internasional

    // Format pesan WhatsApp
    $whatsappMessage = "Halo, saya ingin menghubungi Anda.%0A%0A" . 
                       "*Nama:* $name%0A" .
                       "*Email:* $email%0A" .
                       "*Subjek:* $subject%0A" .
                       "*Pesan:* $message";

    // URL untuk WhatsApp
    $url = "https://wa.me/$phoneNumber?text=$whatsappMessage";

    // Redirect ke WhatsApp
    header("Location: $url");
    exit;
} else {
    // Jika file ini diakses langsung tanpa melalui form
    echo "Invalid request.";
    exit;
}
