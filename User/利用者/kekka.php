<?php
session_start();
require_once './UserDAO/kekkaDAO.php';

// 2択から遷移して受け取ったCID（YesCIDまたはNoCID）
$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;

$iframeSrc = "";

if (isset($_SESSION['selectedShopID'])) {
    // セッションから選ばれた店舗IDを取得
    $randomShopID = $_SESSION['selectedShopID'];

    $dao = new kekkaDAO();
    $urls = $dao->getCoordinateShopURL($randomShopID);

    if (isset($urls['error'])) {
        $iframeSrc = ""; // エラー時はデフォルトの空値
        $error = htmlspecialchars($urls['error'] ?? '', ENT_QUOTES, 'UTF-8');
    } else {
        // 1つ目のCoordinateShopを利用
        $iframeSrc = htmlspecialchars($urls[0] ?? '', ENT_QUOTES, 'UTF-8'); // 最初のURLを選択
    }
} else {
    // セッションがない場合はランダムな店舗を表示
    $cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;

    if ($cid > 0) {
        $dao = new kekkaDAO();
        $urls = $dao->getCoordinateShopURL($cid);

        if (isset($urls['error'])) {
            $iframeSrc = ""; // エラー時はデフォルトの空値
            $error = htmlspecialchars($urls['error']);
        } else {
            // 1つ目のCoordinateShopを利用
            $iframeSrc = htmlspecialchars($urls[0]); // 最初のURLを選択
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>今日の飯</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap-5.0.0-dist/css/bootstrap.min.css">
<script src="../bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
</head>
<body>

    <?php include "header.php"; ?>
    <link href="css/kekka.css" rel="stylesheet">
    
    <div style="border:solid 1px; "></div>
    <h1 class="title1">今日の飯はここ！！！！！！</h1>
    <div id="coen">
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php else: ?>
            <iframe src="<?php echo $iframeSrc; ?>" width="800" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <?php endif; ?>
    </div>
    <a id="taste" href="googleForm.html">美味かったか？</a> 
  <p id="form"><input type="button" name="form" onclick="location.href='houkoku.php'" class="form btn btn-primary" value="報告フォーム" /></p>
</body>
</html>
