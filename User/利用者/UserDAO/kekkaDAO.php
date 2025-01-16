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
    
    $pdo = self::get_db_connect();

    $stmt1 = $pdo->prepare("SELECT CBagID FROM CategoryBag WHERE CQID = :cid");
            $stmt1->bindParam(':cid', $cid, PDO::PARAM_INT);
            $stmt1->execute();
            $categoryBag = $stmt1->fetch(PDO::FETCH_ASSOC);
            
            if (!$categoryBag) {
                return ["error" => "カテゴリーバッグが見つかりません。"];
            }

        $cBagID = $categoryBag['CBagID'];

        // 2. ShopInCBからShopIDを取得
        $stmt2 = $pdo->prepare("SELECT Shop FROM ShopInCB WHERE CBagID = :cBagID");
        $stmt2->bindParam(':cBagID', $cBagID, PDO::PARAM_INT);
        $stmt2->execute();
        $shopInCB = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        if (!$shopInCB) {
            return ["error" => "ShopInCBに対応する店舗が見つかりません。"];
        }

        $shopIDs = array_column($shopInCB, 'Shop');
        $randomShopID = $shopIDs[array_rand($shopIDs)];

        // 3. ShopテーブルからCoordinateShop（URL）を取得
        $placeholders = str_repeat('?,', count($shopIDs) - 1) . '?';
        $stmt3 = $pdo->prepare("SELECT CoordinateShop FROM Shop WHERE ShopID = :shopID");
        $stmt3->bindParam(':shopID', $randomShopID, PDO::PARAM_INT);
        $stmt3->execute();
        $urls = $stmt3->fetchAll(PDO::FETCH_COLUMN);

        return $urls ?: ["error" => "対応するCoordinateShopが見つかりません。"];
}
}

?>