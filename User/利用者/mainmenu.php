<?php
require_once './UserDAO/DAO.php';
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
        <div class="notice-container">
         <h4 style="margin-bottom: 10px;">お知らせ</h4>
        <div class="notice-box">
            
    <?php
        

        class Notice{
            public $NContent;
        }
        
        try {
            $dbh = DAO2::get_db_connect();
       
            $sql = 'SELECT NContent FROM Notice ORDER BY NID DESC'; // `users` はデータベース内のテーブル名
            $stmt = $dbh->prepare($sql);
        
            // クエリを実行
            $stmt->execute();
            // $users[] = $stmt->fetchObject('Notice');
            while($user = $stmt->fetchObject('Notice')){
                $users[] = $user;
            }
            if(!empty($users)){
                foreach($users as $user){
                    echo htmlspecialchars($user->NContent) . "<br>";
                }
                }
        } catch (PDOException $e) {
            echo 'データ取得エラー: ' . $e->getMessage();
        }
?>
        </div>

    </div>
    </div>
</body>
</html>