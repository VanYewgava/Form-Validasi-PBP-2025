<!-- KELOMPOK 10 PBP 2025 -->
<!-- Fachryzaidan Akmal 24060122120001 -->
<!-- Ananda Putra Bayu 24060122140125 -->
<!-- Achmad Ivan Yugava 24060122140153 -->
<!-- Khairindra Eka Putra 24060122140178 -->
 
<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign On Form</title>
</head>
<body>
    <h2>Student Sign On Form Detail</h2>
    <table>
        <tr>
            <td>
                <label>Username:</label>
            </td>
            <td>
                <?php echo htmlspecialchars($_SESSION["username"]); ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Email:</label>
            </td>
            <td>
                <?php echo htmlspecialchars($_SESSION["email"]); ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>University:</label>
            </td>
            <td>
                <?php echo htmlspecialchars($_SESSION["univ"]); ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Program Studi:</label>
            </td>
            <td>
                <?php echo htmlspecialchars($_SESSION["prodi"]);  ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Hobbies:</label>
            </td>
            <td>
                <?php echo implode(", ", $_SESSION["hobi"]); ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <a href="index.html"><button type="submit">Isi ulang form</button></a>
            </td>
        </tr>
    </table>
</body>
</html>
