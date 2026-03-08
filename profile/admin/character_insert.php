<?php
// admin/character_insert.php - 추가 처리
require_once "../db.php";

$type        = $_POST['type']        ?? '';
$name        = $_POST['name']        ?? '';
$gender      = $_POST['gender']      ?? '';
$color       = $_POST['color']       ?? '';
$description = $_POST['description'] ?? '';
$likes       = $_POST['likes']       ?? '';
$status      = isset($_POST['status']) ? (int)$_POST['status'] : 1;

// 이미지 업로드 처리
$imagename = 'nopic.png';
if (!empty($_FILES['image']['name'])) {
    $ext       = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imagename = 'char_' . time() . '.' . $ext;
    $uploadDir = '../product/';   // 기존 쇼핑몰 product 폴더 재사용
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imagename);
}

$stmt = $conn->prepare(
    "INSERT INTO `character` (type, name, gender, color, description, likes, image, status)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
);
$stmt->bind_param("sssssssi", $type, $name, $gender, $color, $description, $likes, $imagename, $status);
$stmt->execute();

$conn->close();
header("Location: character.php");
exit;
?>
