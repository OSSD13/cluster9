<?php
session_start();
require 'vendor/autoload.php'; // โหลด dotenv (ถ้าใช้ Composer)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// เชื่อมต่อฐานข้อมูลจาก .env
$conn = new mysqli(
    $_ENV['DB_HOST'],
    $_ENV['DB_USERNAME'],
    $_ENV['DB_PASSWORD'],
    $_ENV['DB_DATABASE'],
    $_ENV['DB_PORT']
);

// เช็คการเชื่อมต่อฐานข้อมูล
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าจากฟอร์ม
$username = $_POST['username'];
$password = $_POST['password'];

// ใช้ Prepared Statement ป้องกัน SQL Injection
$sql = "SELECT * FROM users WHERE user_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    // ตรวจสอบรหัสผ่าน (ต้องเป็นแบบเข้ารหัส)
    if (password_verify($password, $user['user_password'])) {
        $_SESSION['username'] = $user['user_name'];
        $_SESSION['role'] = $user['user_role'];

        // เช็ค role และ redirect ไปยังหน้าเหมาะสม
        switch ($user['user_role']) {
            case 'V':
                header("Location: /volunteer_home.html"); // หรือจะใช้ /volunteer_home.php ถ้าคุณใช้ PHP
                exit();
            case 'P':
                header("Location: /provincial_home.html"); // หรือ /provincial_home.php
                exit();
            case 'C':
                header("Location: /central_home.html"); // หรือ /central_home.php
                exit();
            default:
                header("Location: /"); // ใช้ /login เพื่อ redirect ไปยังหน้า login
                exit();
        }
    }
}

// ถ้าข้อมูลไม่ถูกต้อง => กลับไปหน้า login
header("Location: login.html?error=invalid");
exit();
?>
