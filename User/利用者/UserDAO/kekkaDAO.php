<?php
require_once 'config.php';
class kekkaDAO{
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

    
function getCoordinateShopURL($cid) {
    try {
        // PDOでデータベース接続
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 1. CategoryBagからCBagIDを取得
        $stmt1 = $pdo->prepare("SELECT CBagID FROM CategoryBag WHERE CQID = :cid");
        $stmt1->bindParam(':cid', $cid, PDO::PARAM_INT);
        $stmt1->execute();
        $categoryBag = $stmt1->fetch(PDO::FETCH_ASSOC);

        if (!$categoryBag) {
            return ["error" => "CategoryBagに対応するCBagIDが見つかりません。"];
        }

        $cBagID = $categoryBag['CBagID'];

        // 2. ShopInCBからShopIDを取得
        $stmt2 = $pdo->prepare("SELECT ShopID FROM ShopInCB WHERE CBagID = :cBagID");
        $stmt2->bindParam(':cBagID', $cBagID, PDO::PARAM_INT);
        $stmt2->execute();
        $shopInCB = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        if (!$shopInCB) {
            return ["error" => "ShopInCBに対応する店舗が見つかりません。"];
        }

        $shopIDs = array_column($shopInCB, 'ShopID');

        // 3. ShopテーブルからCoordinateShop（URL）を取得
        $placeholders = str_repeat('?,', count($shopIDs) - 1) . '?';
        $stmt3 = $pdo->prepare("SELECT CoordinateShop FROM Shop WHERE ShopID IN ($placeholders)");
        $stmt3->execute($shopIDs);
        $urls = $stmt3->fetchAll(PDO::FETCH_COLUMN);

        return $urls ?: ["error" => "対応するCoordinateShopが見つかりません。"];
    } catch (PDOException $e) {
        return ["error" => "データベースエラー: " . $e->getMessage()];
    }
}
}
?>