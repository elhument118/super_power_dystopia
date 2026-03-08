<?php
// admin/character_delete.php - 삭제 처리
require_once "../db.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $stmt = $conn->prepare("DELETE FROM `character` WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

$conn->close();
header("Location: character.php");
exit;
?>
