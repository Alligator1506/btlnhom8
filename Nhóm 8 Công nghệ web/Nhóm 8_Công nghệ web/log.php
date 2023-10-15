<?php
session_start();

// Kết nối đến cơ sở dữ liệu
$host = "localhost";
$user = "root";
$pass = "";
$db = "eshopper";

$con = new mysqli($host, $user, $pass, $db);
if (!$con) {
    die('Could not connect to database: ' . $con->error);
}

// Lấy thông tin đăng nhập từ người dùng
$username = $_POST['username'];
$password = $_POST['password'];

// Tạo câu lệnh SQL để kiểm tra thông tin đăng nhập
$sql = "SELECT * FROM reg WHERE username = '$username' AND password = '$password'";

// Thực thi câu lệnh SQL và lấy kết quả
$result = $con->query($sql);
if (!$result) {
    die('Error executing query: ' . $con->error);
}

// Kiểm tra xem có kết quả nào không
if ($result->num_rows > 0) {
    // Lấy thông tin người dùng từ kết quả
    $row = $result->fetch_assoc();

    // Đặt thông tin người dùng vào session
    $_SESSION['s_id'] = $row['id'];

    // Chuyển hướng đến trang chủ
    header("location:home.php");
} else {
    // Chuyển hướng đến trang đăng nhập
    header("location:login.php");
}

// Đóng kết nối đến cơ sở dữ liệu
$con->close();
?>
