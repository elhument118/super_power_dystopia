<?php
// admin/character_edit.php - 수정 폼
require_once "../db.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $conn->prepare("SELECT * FROM `character` WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

if (!$row) {
    echo "캐릭터를 찾을 수 없습니다.";
    exit;
}
?>
<!doctype html>
<html lang="kr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>캐릭터 수정</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/my.css" rel="stylesheet">
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <h4 class="my-3">캐릭터 수정</h4>

    <form method="post" action="character_update.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <input type="hidden" name="imagename" value="<?= htmlspecialchars($row['image']) ?>">

    <table class="table table-sm table-bordered myfs12">
        <tr>
            <td class="bg-light" width="15%">타입</td>
            <td>
                <select name="type" class="form-select form-select-sm" style="width:150px">
                    <?php
                    $types = ['Grass','Fire','Water','Lightning','Psychic','Earth','Dark','Metal','Dragon','Wind'];
                    foreach ($types as $t) {
                        $sel = $t === $row['type'] ? 'selected' : '';
                        echo "<option value=\"$t\" $sel>$t</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="bg-light">이름</td>
            <td><input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>"
                       class="form-control form-control-sm" style="width:400px"></td>
        </tr>
        <tr>
            <td class="bg-light">성별</td>
            <td>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="female"
                           <?= $row['gender'] === 'female' ? 'checked' : '' ?>>
                    <label class="form-check-label">female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="male"
                           <?= $row['gender'] === 'male' ? 'checked' : '' ?>>
                    <label class="form-check-label">male</label>
                </div>
            </td>
        </tr>
        <tr>
            <td class="bg-light">색상(CSS)</td>
            <td><input type="text" name="color" value="<?= htmlspecialchars($row['color']) ?>"
                       class="form-control form-control-sm" style="width:200px"></td>
        </tr>
        <tr>
            <td class="bg-light">설명</td>
            <td><textarea name="description" rows="4" class="form-control form-control-sm"
                          style="width:500px"><?= htmlspecialchars($row['description']) ?></textarea></td>
        </tr>
        <tr>
            <td class="bg-light">호감 대상</td>
            <td><input type="text" name="likes" value="<?= htmlspecialchars($row['likes']) ?>"
                       class="form-control form-control-sm" style="width:300px"></td>
        </tr>
        <tr>
            <td class="bg-light">이미지<br>(현재)</td>
            <td>
                <img src="../product/<?= htmlspecialchars($row['image']) ?>"
                     width="60" height="60" class="img-thumbnail mb-1"><br>
                새 이미지: <input type="file" name="image" class="form-control form-control-sm" style="width:300px">
            </td>
        </tr>
        <tr>
            <td class="bg-light">상태</td>
            <td>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="1"
                           <?= $row['status'] == 1 ? 'checked' : '' ?>>
                    <label class="form-check-label">공개</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="0"
                           <?= $row['status'] == 0 ? 'checked' : '' ?>>
                    <label class="form-check-label">비공개</label>
                </div>
            </td>
        </tr>
    </table>
    <button type="submit" class="btn btn-sm btn-dark">저장</button>
    <a href="character.php" class="btn btn-sm btn-outline-dark">돌아가기</a>
    </form>
</div>
</body>
</html>
<?php $conn->close(); ?>
