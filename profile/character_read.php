<?php
// character_read.php
// 사용 예: character_read.php?id=1

header("Content-Type: application/json; charset=utf-8");
require_once "db.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    echo json_encode(["error" => "잘못된 ID"]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM `character` WHERE id = ? AND status = 1");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$character = $result->fetch_assoc();

if (!$character) {
    echo json_encode(["error" => "캐릭터 없음"]);
    exit;
}

echo json_encode($character, JSON_UNESCAPED_UNICODE);
$conn->close();
?>
