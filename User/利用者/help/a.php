<?php
// DAO.phpを読み込む
require_once 'DAO.php';

try {
    // DB接続を取得
    $dbh = DAO::get_db_connect();

    // 接続成功メッセージ
    echo "データベースに正常に接続されました！";

    // 接続確認のため、サンプルクエリを実行
    $stmt = $dbh->query("SELECT 1");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo "データベースクエリも正常に実行されました。";
    } else {
        echo "クエリの実行に失敗しました。";
    }
} catch (PDOException $e) {
    // 接続エラーが発生した場合
    echo "接続に失敗しました: " . $e->getMessage();
}
?>