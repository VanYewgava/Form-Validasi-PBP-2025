<!-- KELOMPOK 10 PBP 2025 -->
<!-- Fachryzaidan Akmal 24060122120001 -->
<!-- Ananda Putra Bayu 24060122140125 -->
<!-- Achmad Ivan Yugava 24060122140153 -->
<!-- Khairindra Eka Putra 24060122140178 -->

<?php
session_start();
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
        $errors[] = "Username hanya boleh berisi huruf.";
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
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["univ"] = $univ;
        $_SESSION["prodi"] = $prodi;
        $_SESSION["hobi"] = $hobi;
        $_SESSION["password"] = $password;
        echo "
        <script>
            alert('Form submitted successfully!');
            window.location.href = 'display.php';
        </script>
        ";
    } else {
        $pesan_error = implode("\\n", $errors);
        echo "<script>alert('Error processing form:\\n$pesan_error'); window.history.back();</script>";
    }
} else {
    echo "Akses tidak valid.";
}
?>
