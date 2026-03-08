<?php
// db.php - DB 연결 설정
// 학교 환경에 맞게 host/user/password/dbname 수정할 것

$host   = "localhost";
$user   = "root";
$password = "";
$dbname = "shop";  // 학교에서 사용하는 DB명으로 변경

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
