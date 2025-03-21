<?php
session_start();

// เชื่อมต่อฐานข้อมูล
$host = '10.80.6.165';
$dbname = 'cluster9';
$username = 'cluster9';
$password = 'WZLGbyOu';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    // ค้นหาผู้ใช้ในฐานข้อมูล
    $stmt = $conn->prepare("SELECT * FROM var_users WHERE user_name = :user_name");
    $stmt->execute(['user_name' => $user_name]);
    $user = $stmt->fetch();

    if ($user && password_verify($user_password, $user['user_password'])) {
        // Login สำเร็จ
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['user_role'] = $user['user_role'];
        header('Location: /home'); // เปลี่ยนเส้นทางไปยังหน้า /home
        exit();
    } else {
        // Login ไม่สำเร็จ
        header('Location: /login'); // เปลี่ยนเส้นทางไปยังหน้า /login
        exit();
    }
}
?>
