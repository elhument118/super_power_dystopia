<?php
// admin/character.php - 관리자 캐릭터 목록
require_once "../db.php";

$sql = "SELECT * FROM `character` ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="kr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>캐릭터 관리</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/my.css" rel="stylesheet">
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <h4 class="my-3">캐릭터 관리</h4>

    <div class="mb-2" align="right">
        <a href="character_new.php" class="btn btn-sm btn-dark">+ 캐릭터 추가</a>
    </div>

    <table class="table table-sm table-bordered myfs12">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>타입</th>
                <th>이름</th>
                <th>성별</th>
                <th>이미지</th>
                <th>상태</th>
                <th>관리</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['type']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['gender']) ?></td>
                <td>
                    <img src="../product/<?= htmlspecialchars($row['image']) ?>"
                         width="40" height="40" class="img-thumbnail">
                </td>
                <td><?= $row['status'] == 1 ? '공개' : '비공개' ?></td>
                <td>
                    <a href="character_edit.php?id=<?= $row['id'] ?>"
                       class="btn btn-sm btn-outline-info">수정</a>
                    <a href="character_delete.php?id=<?= $row['id'] ?>"
                       class="btn btn-sm btn-outline-danger"
                       onclick="return confirm('삭제할까요?')">삭제</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php $conn->close(); ?>
