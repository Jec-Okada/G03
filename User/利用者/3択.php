<?php 
session_start();

// DAOを読み込む
require_once './help/DAO3.php';

if (!isset($_SESSION['current_question_id'])) {
  $_SESSION['current_question_id'] = DAO::getFirstQuestion();  // 最初の質問を取得
}

$current_question_id = $_SESSION['current_question_id'];
$answer = isset($_POST['answer']) ? $_POST['answer'] : null;

// ベーシック質問テーブルから質問を取得
$question_text = DAO::getQuestionById($current_question_id);  // 現在の質問IDを基に質問を取得

// 回答をもとに次の質問を取得
if ($answer) {
  if ($answer == '1' || $answer == '2') {
      // 1人または2人が選ばれた場合はYQIDを次のページに送る
      $next_question_id = DAO::getNextQuestionId($current_question_id, true); // YQID
  } else {
      // 3人以上が選ばれた場合はNQIDを次のページに送る
      $next_question_id = DAO::getNextQuestionId($current_question_id, false); // NQID
  }

  // 次のページ（2択ページ）に遷移し、選択した質問IDを送る
  var_dump($next_question_id);  // デバッグ用にnext_question_idを出力
  header("Location: 2択【仮】.php?next_question_id=$next_question_id");
  exit();
}

?>
<header>
  <?php include "header.php"; ?>

        <link href="css/3choice.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet" >
    <link rel="stylesheet" href="../bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
    
    </header>
    <body>
      
        <div class="game-container">
            <!-- 背景画像 -->
            <img src="img/冒険.jpeg" alt="背景画像" class="background-image" width="200" height="600">
           
                
                <!-- ドラクエ風のメッセージボックス -->
                <div class="message-box">
                  <div class="question-container">
                    <p id="question-text" class="question"><?php echo $question_text; ?></p>
                  </div>
                  <div class="answer-container">
                    <a href="?answer=1" class="answer-link" id="1-link">
                        <p>１人</p>
                    </a>
                    <a href="?answer=2" class="answer-link" id="2-link">
                        <p>２人</p>
                    </a>
                    <a href="?answer=3" class="answer-link" id="3-link">
                        <p>３人以上</p>
                    </a>
                  </div>
                </div>
              </div>       

    </body>