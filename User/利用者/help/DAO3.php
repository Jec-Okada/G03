<?php
require_once 'config.php';
class DAO {
    private static $dbh;

    // DBに接続するメソッド
    public static function get_db_connect() {
        try {
            if (self::$dbh === null) {
                self::$dbh = new PDO(DSN, DB_USER, DB_PASSWORD);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
        return self::$dbh;
    }

    // BQID 11 の質問を取得
    public static function getQuestionById($questionId) {
        // 質問IDが11の場合
        $sql = "SELECT BQuestion FROM BesicQuestion WHERE BQID = :questionId";
        $stmt = self::get_db_connect()->prepare($sql);
        $stmt->bindParam(':questionId', $questionId, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return $row['BQuestion'];
        }
        return null;
    }

    // BQID 11 の質問を取得するメソッド
    public static function getFirstQuestion() {
        return self::getQuestionById(11); // BQIDが11の質問を取得
    }
}
?>