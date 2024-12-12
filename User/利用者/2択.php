<?php
session_start();

// DAO を読み込む
require_once './help/DAO.php';

if (!isset($_SESSION['current_question_id'])) {
    $_SESSION['current_question_id'] = intval(DAO::getFirstQuestionId());
}

$current_question_id = $_SESSION['current_question_id'];
$answer = isset($_POST['answer']) ? $_POST['answer'] : null;

// 回答をもとに次の質問を取得
if ($answer) {
    if ($answer == 'yes') {
        $next_category_question_id = DAO::getCategoryQuestionId($current_question_id, true);

        if ($next_category_question_id) {
            $_SESSION['current_question_id'] = $next_category_question_id;
            $next_question_text = DAO::getCategoryQuestionById($next_category_question_id);
        } else {
            $next_question_id = DAO::getNextQuestionId($current_question_id, true);
            $_SESSION['current_question_id'] = $next_question_id;
            $next_question_text = DAO::getQuestionById($next_question_id);
        }
    } else {
        $next_category_question_id = DAO::getCategoryQuestionId($current_question_id, false);

        if ($next_category_question_id) {
            $_SESSION['current_question_id'] = $next_category_question_id;
            $next_question_text = DAO::getCategoryQuestionById($next_category_question_id);
        } else {
            $next_question_id = DAO::getNextQuestionId($current_question_id, false);
            $_SESSION['current_question_id'] = $next_question_id;
            $next_question_text = DAO::getQuestionById($next_question_id);
        }
    }
} else {
    $next_question_text = DAO::getQuestionById($current_question_id);
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
<html lang="ja">
<header>
    <?php include "header.php"; ?>
    <meta charset="UTF-8">
    <title>質問ページ</title>
    <link href="css/2choice.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
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
                <form method="POST" action="" id="answer-form">
                    <!-- 「はい」と「いいえ」の選択肢をドラクエ風のボックス内に配置 -->
                    <div class="answer-box">
                        <a href="#" class="answer-link" id="yes-link" onclick="submitAnswer('yes', event);">
                            <p>はい</p>
                        </a>
                        <a href="#" class="answer-link" id="no-link" onclick="submitAnswer('no', event);">
                            <p>いいえ</p>
                        </a>
                    </div>
                    <input type="hidden" name="answer" id="answer">
                </form>
            </div>
        </div>
    </div>
    <script>
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

        // ボタンが押された時にフォームを送信して次の質問に進む
        function submitAnswer(answer, event) {
            event.preventDefault(); // ページ遷移を防ぐ

            // フォームの hidden 値を設定
            document.getElementById('answer').value = answer;
            // フォームを送信
            document.getElementById('answer-form').submit();
        }
    </script>
</body>
</html>