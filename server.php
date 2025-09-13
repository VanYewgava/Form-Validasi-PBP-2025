<?php
// Ananda Putra Bayu
// 24060122140125

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $univ = trim($_POST["univ"]);
    $prodi = isset($_POST["prodi"]) ? $_POST["prodi"] : "";
    $hobi = isset($_POST["hobi"]) ? $_POST["hobi"] : [];
    $password = $_POST["password"];

    $errors = [];

    // Username 
    if (!preg_match("/^[a-zA-Z]+$/", $username)) {
        $errors[] = "Username hanya boleh berisi huruf tanpa angka.";
    }

    // Email 
    if (!preg_match("/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/", $email)) {
        $errors[] = "Email harus mengandung '@' dan domain yang valid.";
    }

    // Perguruan Tinggi
    if ($univ === "") {
        $errors[] = "Perguruan Tinggi wajib diisi.";
    }

    // Program Studi
    if ($prodi === "") {
        $errors[] = "Pilih salah satu Program Studi.";
    }

    // Password 
    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,}$/", $password)) {
        $errors[] = "Password harus minimal 8 karakter dan mengandung huruf besar, huruf kecil, dan angka.";
    }

    // Alert
    if (empty($errors)) {
        echo "<script>alert('Form submitted successfully');</script>";
        echo "<!DOCTYPE html>";
        echo "<html lang='en'><head><meta charset='UTF-8'><title>Detail Data</title></head><body>";
        echo "<h2>Detail Informasi</h2>";
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><td><strong>Username</strong></td><td>$username</td></tr>";
        echo "<tr><td><strong>Email</strong></td><td>$email</td></tr>";
        echo "<tr><td><strong>Perguruan Tinggi</strong></td><td>$univ</td></tr>";
        echo "<tr><td><strong>Program Studi</strong></td><td>$prodi</td></tr>";
        echo "<tr><td><strong>Hobi</strong></td><td>" . (count($hobi) > 0 ? implode(", ", $hobi) : "Tidak ada") . "</td></tr>";
        echo "</table>";
        echo "</body></html>";
    } else {
        $pesan_error = implode("\\n", $errors);
        echo "<script>alert('Error processing form:\\n$pesan_error'); window.history.back();</script>";
    }
} else {
    echo "Akses tidak valid.";
}
?>
