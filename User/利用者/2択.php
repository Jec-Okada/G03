<?php
session_start();

// DAO を読み込む
require_once './UserDAO/DAO.php';


$current_question_id = $_SESSION['current_question_id'] ?? DAO2::getFirstQuestionId();
$answer = $_POST['answer'] ?? null; // POSTデータから回答を取得
$next_category_id = null; 
// 次の質問を決定する
if ($answer === 'yes') {
    $next_category_id = DAO2::getCategoryQuestionId($current_question_id, true);
    if ($next_category_id) {
        // カテゴリー直下質問がある場合は、その質問のIDを取得
        $_SESSION['yes_cid'] = $next_category_id;
        $isCategoryQuestion = true;
        $next_question_text = DAO2::getCategoryQuestionById($next_category_id);
    } else {
        // 通常の次の質問に遷移
        $_SESSION['yes_cid'] = null;
        $isCategoryQuestion = false;
        $next_question_id = DAO2::getNextQuestionId($current_question_id, true);
        $next_question_text = DAO2::getQuestionById($next_question_id);
        $_SESSION['current_question_id'] = $next_question_id;
    }
} elseif ($answer === 'no') {
    $next_category_id = DAO2::getCategoryQuestionId($current_question_id, false);
    if ($next_category_id) {
        // カテゴリー直下質問がある場合
        $_SESSION['no_cid'] = $next_category_id;
        $isCategoryQuestion = true;
        $next_question_text = DAO2::getCategoryQuestionById($next_category_id);
    } else {
        // 通常の次の質問に遷移
        $_SESSION['no_cid'] = null;
        $isCategoryQuestion = false;
        $next_question_id = DAO2::getNextQuestionId($current_question_id, false);
        $next_question_text = DAO2::getQuestionById($next_question_id);
        $_SESSION['current_question_id'] = $next_question_id;
    }
} else {
    // 最初の質問またはエラー処理
    $isCategoryQuestion = false;
    $next_question_text = DAO2::getQuestionById($current_question_id);
}

// 質問がない場合はセッションをリセット
if ($next_category_id) {
    // カテゴリー直下質問がある場合
    $_SESSION['yes_cid'] = $next_category_id;
    $isCategoryQuestion = true;
    $next_question_text = DAO2::getCategoryQuestionById($next_category_id);
    sleep(1);
    // リダイレクト処理を追加
    header("Location: kekka.php?cid=$next_category_id");
    exit();
} elseif (!$next_question_text) {
    // 質問がない場合はセッションをリセットしてリダイレクト
    session_unset();
    session_destroy();
    header("Location: 2択.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<header>
    <?php include "header.php"; ?>
    <meta charset="UTF-8">
    <title>質問ページ</title>
    <link href="css/2choice.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
     <script>
        window.onbeforeunload = function() {
            document.body.style = ''; // bodyタグのインラインスタイルをリセット
        };
        // 文字を一文字ずつ出すアニメーション
        window.addEventListener("load", function() {
            const questionText = document.getElementById("question-text");
            let fullText = questionText.innerHTML;
            questionText.innerHTML = ''; // 初期状態でテキストを空にする

            let i = 0;
            const interval = setInterval(function() {
                questionText.innerHTML += fullText.charAt(i);
                i++;
                if (i >= fullText.length) {
                    clearInterval(interval);
                }
            }, 100); // 100msごとに1文字ずつ表示
        });

        function submitAnswer(answer) {
            const form = document.getElementById('answer-form');
            form.answer.value = answer;
            form.submit();
        }
    </script>
</header>
<body>
    <div class="game-container">
        <!-- 背景画像 -->
        <img src="img/冒険.jpeg" alt="背景画像" class="background-image">
        
        <!-- ドラクエ風のメッセージボックス -->
        <div class="message-box">
            <div class="question-container">
                <p id="question-text" class="question"><?php echo $next_question_text; ?></p> <!-- ここで質問文を表示 -->
            </div>

            <div class="answer-container">
            <form id="answer-form" method="POST" action="<?php echo $isCategoryQuestion ? 'kekka.php' : ''; ?>">
                <input type="hidden" name="answer" value="">
                <?php if ($isCategoryQuestion): ?>
                    <input type="hidden" name="cid" value="<?php echo $answer === 'yes' ? $_SESSION['yes_cid'] : $_SESSION['no_cid']; ?>">
                <?php endif; ?>
                <button type="button" class="answer-button" onclick="submitAnswer('yes')">はい</button>
                <button type="button" class="answer-button" onclick="submitAnswer('no')">いいえ</button>
            </form>
            </div>
        </div>
    </div>
   
</body>
</html>