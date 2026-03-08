<?php
// admin/character_update.php - 수정 처리
require_once "../db.php";

$id          = (int)($_POST['id']          ?? 0);
$type        = $_POST['type']        ?? '';
$name        = $_POST['name']        ?? '';
$gender      = $_POST['gender']      ?? '';
$color       = $_POST['color']       ?? '';
$description = $_POST['description'] ?? '';
$likes       = $_POST['likes']       ?? '';
$status      = (int)($_POST['status'] ?? 1);
$imagename   = $_POST['imagename']   ?? 'nopic.png'; // 기존 이미지 유지

// 새 이미지가 업로드된 경우에만 교체
if (!empty($_FILES['image']['name'])) {
    $ext       = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imagename = 'char_' . time() . '.' . $ext;
    $uploadDir = '../product/';
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imagename);
}

$stmt = $conn->prepare(
    "UPDATE `character`
     SET type=?, name=?, gender=?, color=?, description=?, likes=?, image=?, status=?
     WHERE id=?"
);
$stmt->bind_param("sssssssii", $type, $name, $gender, $color, $description, $likes, $imagename, $status, $id);
$stmt->execute();

$conn->close();
header("Location: character.php");
exit;
?>
