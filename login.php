<?php
session_start(); // LUÔN LUÔN DÒNG ĐẦU
require 'db_connect.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['email'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Sai email hoặc mật khẩu";
    }
}
?>

<h2>Đăng nhập</h2>
<form method="post">
    Email:<br>
    <input type="email" name="email" required><br><br>

    Mật khẩu:<br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Đăng nhập</button>
</form>

<p style="color:red"><?= $error ?></p>
