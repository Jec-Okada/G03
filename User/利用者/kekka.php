<?php
session_start();

// DAO を読み込む
require_once './UserDAO/DAO.php';

// POSTデータの取得
$answer = isset($_POST['answer']) ? $_POST['answer'] : null;
$cid = isset($_POST['cid']) ? intval($_POST['cid']) : null;

if ($cid) {
    // カテゴリー直下質問が指定されている場合
    $next_question_text = DAO2::getCategoryQuestionById($cid);
} else if ($answer) {
    // 通常のYes/No質問の場合
    $current_question_id = $_SESSION['current_question_id'];
    if ($answer == 'yes') {
        $next_question_id = DAO2::getNextQuestionId($current_question_id, true);
    } else {
        $next_question_id = DAO2::getNextQuestionId($current_question_id, false);
    }
    $_SESSION['current_question_id'] = $next_question_id;
    $next_question_text = DAO2::getQuestionById($next_question_id);
} else {
    // 最初の質問を取得
    $_SESSION['current_question_id'] = intval(DAO2::getFirstQuestionId());
    $next_question_text = DAO2::getQuestionById($_SESSION['current_question_id']);
}

// 質問がない場合はセッションをリセット
if ($next_question_text == null) {
    session_unset();
    session_destroy();
    header("Location: 2択.php");
    exit();
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
    <h1 class="title1">今日の飯はここ！！！！！！</h1>
    <div style="border:solid 1px; "></div>,
    
    <div id="coen" >
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.5178044727472!2d139.70121299094617!3d35.6889170555129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d2f3b97bfd3%3A0x987f62f270da14df!2z44Oe44Kv44OJ44OK44Or44OJIOaWsOWkp-S5heS_neW6lw!5e0!3m2!1sja!2sjp!4v1734588849324!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <a id="taste" href="googleForm.html">美味かったか？</a> 
  <p id="form"><input type="button" name="form" onclick="location.href='houkoku.php'" class="form btn btn-primary" value="報告フォーム" /></p>
</body>
</html>
