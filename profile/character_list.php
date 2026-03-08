<?php
// character_list.php
// 프론트엔드(render.js)에서 fetch로 호출 → JSON 반환

header("Content-Type: application/json; charset=utf-8");
require_once "db.php";

$type = isset($_GET['type']) ? $_GET['type'] : 'All';

if ($type === 'All') {
    $sql = "SELECT * FROM `character` WHERE status = 1 ORDER BY id";
    $result = $conn->query($sql);
} else {
    $stmt = $conn->prepare("SELECT * FROM `character` WHERE status = 1 AND type = ? ORDER BY id");
    $stmt->bind_param("s", $type);
    $stmt->execute();
    $result = $stmt->get_result();
}

$characters = [];
while ($row = $result->fetch_assoc()) {
    $characters[] = $row;
}

echo json_encode($characters, JSON_UNESCAPED_UNICODE);
$conn->close();
?>
