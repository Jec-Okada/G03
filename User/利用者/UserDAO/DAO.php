<?php
require_once 'config.php';
class DAO2 {
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
    public static function getFirstQuestionId() {
        $sql = "SELECT BQID FROM BesicQuestion WHERE RQID IS NULL ORDER BY BQID ASC";
        $stmt = self::get_db_connect()->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        var_dump($row); // 実際に取得した全ての行を出力
    die();
        if ($row) {
            return intval($row['BQID']);
        }
        return null;
    }
    // ベーシック質問を取得
    public static function getQuestionById($questionId) {
        $sql = "SELECT BQuestion FROM BesicQuestion WHERE BQID = :questionId";
        $stmt = self::get_db_connect()->prepare($sql);
        $stmt->bindValue(':questionId', intval($questionId), PDO::PARAM_INT); // 整数型に変換
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return $row['BQuestion'];
        }
        return null;
    }
    // 次のベーシック質問IDを取得
    public static function getNextQuestionId($currentQuestionId, $isYesAnswer) {
        $column = $isYesAnswer ? 'YQID' : 'NQID';
        
        $sql = "SELECT $column FROM BesicQuestion WHERE BQID = :currentQuestionId";
        $stmt = self::get_db_connect()->prepare($sql);
        $stmt->bindParam(':currentQuestionId', $currentQuestionId, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $row[$column];
        }
        return null;
    }

    // カテゴリ直下質問を取得
    public static function getCategoryQuestionById($categoryId) {
        $sql = "SELECT CQuestion FROM CategoryQuestion WHERE CQID = :categoryId";
        $stmt = self::get_db_connect()->prepare($sql);
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $row['CQuestion'];
        }
        return null;
    }

    // YCID または NCID を取得
    public static function getCategoryQuestionId($currentQuestionId, $isYesAnswer) {
        $column = $isYesAnswer ? 'YCID' : 'NCID';
        
        $sql = "SELECT $column FROM BesicQuestion WHERE BQID = :currentQuestionId";
        $stmt = self::get_db_connect()->prepare($sql);
        $stmt->bindParam(':currentQuestionId', $currentQuestionId, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $row[$column];
        }
        return null;
    }
       // 質問IDに基づいて質問内容を取得
    
}
?>