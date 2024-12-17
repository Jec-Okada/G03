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

    public static function getQuestionById($questionId) {
        if (!is_int($questionId)) {
            throw new InvalidArgumentException('questionId は整数である必要があります');
        }
    
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
    public static function getFirstQuestionId() {
        $sql = "SELECT top 1 BQID FROM BesicQuestion WHERE RQID IS NULL ORDER BY BQID ASC ";
        $stmt = self::get_db_connect()->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return intval($row['BQID']);
        }
        return null;
    }
public static function getNextQuestionId($currentQuestionId, $isYes) {
    try{
         $column = $isYes ? 'YQID' : 'NQID';
    $sql = "SELECT $column AS next_id FROM BesicQuestion WHERE BQID = :currentQuestionId";
    $stmt = self::get_db_connect()->prepare($sql);
    $stmt->bindParam(':currentQuestionId', $currentQuestionId, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        var_dump($row);
    } else {
        echo "データが見つかりませんでした。現在の質問ID: $currentQuestionId<br>";
    }

    if ($row && $row['next_id']) {
        return intval($row['next_id']);
    }
    return null;
    }catch(Exception $e){
        echo "エラー：".$e->getMessage();
        return null;
    }
   
}
}
?>