<?php
require_once 'config.php';
class kekkaDAO {
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

    // // 営業中かどうかをチェックするメソッド
    // private static function isShopOpen($startTime1, $closeTime1, $startTime2, $closeTime2) {
    //     $currentTime = date('H:i'); // 現在の時刻を 'HH:MM' 形式で取得

    //     // 営業時間1
    //     if ($startTime1 <= $currentTime && $currentTime <= $closeTime1) {
    //         return true;
    //     }

    //     // 営業時間2（もしあれば）
    //     if ($startTime2 && $closeTime2 && $startTime2 <= $currentTime && $currentTime <= $closeTime2) {
    //         return true;
    //     }

    //     return false; // 営業中でなければ false
    // }

    function getCoordinateShopURL($cid) {
        $pdo = self::get_db_connect();
    
        // CategoryBagからCBagIDを取得
        $stmt1 = $pdo->prepare("SELECT CBagID FROM CategoryBag WHERE CQID = :cid");
        $stmt1->bindParam(':cid', $cid, PDO::PARAM_INT);
        $stmt1->execute();
        $categoryBag = $stmt1->fetch(PDO::FETCH_ASSOC);
    
        if (!$categoryBag) {
            return ["error" => "カテゴリーバッグが見つかりません。"];
        }
    
        $cBagID = $categoryBag['CBagID'];
    
        // ShopInCBからShopIDを取得
        $stmt2 = $pdo->prepare("SELECT Shop FROM ShopInCB WHERE CBagID = :cBagID");
        $stmt2->bindParam(':cBagID', $cBagID, PDO::PARAM_INT);
        $stmt2->execute();
        $shopInCB = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    
        if (!$shopInCB) {
            return ["error" => "ShopInCBに対応する店舗が見つかりません。"];
        }
    
        $shopIDs = array_column($shopInCB, 'Shop');
    
        // 営業時間を判定
        // $currentTime = date('H:i'); // 現在の時刻（HH:MM形式）
    
         //s$openShops = [];
        // foreach ($shopIDs as $shopID) {
        //     $stmt3 = $pdo->prepare("SELECT StartTime1, CloseTime1, StartTime2, CloseTime2 FROM Shop WHERE ShopID = :shopID");
        //     $stmt3->bindParam(':shopID', $shopID, PDO::PARAM_INT);
        //     $stmt3->execute();
        //     $shop = $stmt3->fetch(PDO::FETCH_ASSOC);
    
        //     if (!$shop) {
        //         continue;
        //     }
    
            // // 営業時間チェック（StartTime1 <= 現在の時刻 <= CloseTime1 または StartTime2 <= 現在の時刻 <= CloseTime2）
            // if (($shop['StartTime1'] <= $currentTime && $shop['CloseTime1'] >= $currentTime) ||
            //     ($shop['StartTime2'] <= $currentTime && $shop['CloseTime2'] >= $currentTime)) {
            //     // 営業している店舗の場合
            //     $openShops[] = $shopID;
            // }
        
    
        // if (empty($openShops)) {
        //     return ["error" => "営業中の店舗が見つかりません。"];
        // }
    
        // 営業中の店舗からランダムで選択
        //$randomShopID = $openShops[array_rand($openShops)];
        $randomShopID = $shopIDs[array_rand($shopIDs)];
        // 店舗からCoordinateShop（URL）を取得
        $stmt4 = $pdo->prepare("SELECT CoordinateShop FROM Shop WHERE ShopID = :shopID");
        $stmt4->bindParam(':shopID', $randomShopID, PDO::PARAM_INT);
        $stmt4->execute();
        $urls = $stmt4->fetchAll(PDO::FETCH_COLUMN);
    
        return $urls ?: ["error" => "対応するCoordinateShopが見つかりません。"];
    }
    
}
?>
