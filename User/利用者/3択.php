<?php 
session_start();
if (isset($_GET['reset'])) {
  session_unset();
  session_destroy();
  session_start();
  $_SESSION['current_question_id'] = 11; 
  $_SESSION['reset'] = true;
  header("Location: 3択.php"); 
  exit();
}
if (isset($_SESSION['reset']) && $_SESSION['reset'] === true) {
  unset($_SESSION['reset']); // リセットフラグを削除
  // 初期化された状態でページを表示
}
ob_start();
// DAOを読み込む
require_once './UserDAO/DAO3.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!$_SESSION['current_question_id']=11){
  $_SESSION['current_question_id'] = 11; 
}

// デバッグ用: 初期化時の質問IDを確認
echo "初期質問ID: " . $_SESSION['current_question_id'];

$current_question_id = intval($_SESSION['current_question_id']);
$answer = isset($_POST['answer']) ? $_POST['answer'] : null;
echo "現在の質問ID: " . $_SESSION['current_question_id']; // デバッグ用
// 質問を取得
$question_text = DAO::getQuestionById($current_question_id);

// 回答が送信された場合、次の質問IDを取得
if ($answer !== null) {
    if ($answer === '1' || $answer === '2') {
        // 1人または2人が選択された場合、YQID
        $next_question_id = DAO::getNextQuestionId($current_question_id, true);
    } else {
        // 3人以上が選択された場合、NQID
        $next_question_id = DAO::getNextQuestionId($current_question_id, false);
    }

    if ($next_question_id) {
      echo "次の質問ID: " . $next_question_id; // デバッグ用
        $_SESSION['current_question_id'] = $next_question_id;
        ob_end_flush();
        header("Location: 2択.php?next_question_id=$next_question_id");
        
        exit();
    } else {
      echo "次の質問が取得できませんでした。<br>";//デバッグ用
      echo "現在の質問ID: " . $current_question_id . "<br>";//デバッグ用
      echo "回答: " . $answer . "<br>";//デバッグ用
    }
}
?>
<header>
  <?php include "header.php"; ?>

    <link href="css/3choice.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</header>
<body>
<div id="allpage">
  <div class="game-container">
    <!-- 背景画像 -->
    <img src="img/冒険.jpeg" alt="背景画像" class="background-image" width="200" height="600">
    
    <!-- ドラクエ風のメッセージボックス -->
    <div class="message-box">
      <div class="question-container">
        <p id="question-text" class="question"></p>
      </div>
      <div class="answer-container">
        <!-- フォームタグでボタンを囲む -->
        <form method="POST">
          <button type="submit" name="answer" value="1" class="answer-button">１人</button>
          <button type="submit" name="answer" value="2" class="answer-button">２人</button>
          <button type="submit" name="answer" value="3" class="answer-button">３人以上</button>
        </form>
      </div>
    </div>
  </div>   
  <script>

document.addEventListener("DOMContentLoaded", function() {
    const questionText = "<?php echo addslashes($question_text); ?>"; // PHPで取得した質問
    const questionElement = document.getElementById("question-text");
    displayQuestion(questionText, questionElement);
});
  function displayQuestion(text, element, delay = 270) {
  let index = 0;

  function typeCharacter() {
    if (index < text.length) {
      element.textContent += text.charAt(index); // 文字を追加
      index++;
      setTimeout(typeCharacter, delay); // 次の文字を遅延させて表示
    }
  }

  typeCharacter(); // タイピング開始
  }  
  window.addEventListener("popstate", function (event) {
    // 戻る操作を検知した場合、リセットURLにリダイレクト
    window.location.href = "3択.php?reset=true";
});
</script>
</body>
