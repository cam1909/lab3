<?php
require 'db_connect.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Mã hóa mật khẩu
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([$email, $password_hash])) {
        $message = "Đăng ký thành công! <a href='login.php'>Đăng nhập</a>";
    } else {
        $message = "Đăng ký thất bại";
    }
}
?>

<h2>Đăng ký</h2>
<form method="post">
    Email:<br>
    <input type="email" name="email" required><br><br>

    Mật khẩu:<br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Đăng ký</button>
</form>

<p><?= $message ?></p>
