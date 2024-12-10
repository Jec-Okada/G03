<?php
// データベース接続設定
$host = 'JNSV01\SOTSU'; // サーバー名
$dbname = 'example_db'; // データベース名
$user = 'username'; // ユーザー名
$password = 'password'; // パスワード

try {
    // PDOインスタンスを作成
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

    // エラーモードを例外に設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // クエリを準備
    $stmt = $pdo->prepare("SELECT * FROM example_table");

    // クエリを実行
    $stmt->execute();

    // 結果を取得 (連想配列形式で取得)
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 結果を出力
    foreach ($results as $row) {
        echo "ID: " . htmlspecialchars($row['id']) . "<br>";
        echo "Name: " . htmlspecialchars($row['name']) . "<br>";
        echo "Email: " . htmlspecialchars($row['email']) . "<br><hr>";
    }

} catch (PDOException $e) {
    // エラーメッセージを表示
    echo "データベースエラー: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>メイン画面</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
    <?php include "header.php"; ?>

    <!-- メインコンテンツ -->
    <div class="main text-center">
        <img src="img/冒険.jpeg" width="500" height="750" alt="メインイメージ">
        <a href="3択.php" class="btn btn-warning btn-lg mt-3">飯を探す冒険へ！！！！！</a>
    </div>

    <!-- フッター部分（お知らせ + ログイン） -->
    <div class="footer-container">
        <!-- お知らせ -->
        <div class="notice-box">
            <h4 style="margin-bottom: 10px;">お知らせ</h4>
            <p>ここに最新情報を表示します。<br>
            例: イベント情報やシステムメンテナンスのお知らせなど。</p>
        </div>

        
    </div>
</body>
</html>