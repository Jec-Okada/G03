<?php
require_once 'DAO.php';

class Shop
{
public int $ShopID;
public string $ShopName;
public string $MapPoint;
public string $ShopAddress;
public string $ShopURL;
public string $ShopChar;
public string $StartTime1;
public string $StartTime2;
public string $CloseTime1;
public string $CloseTime2;
public int $TOSeats;
public int $CbagID;
}

class ShopDAO
{
    private $pdo;
    public function __construct() {
        // 静的メソッドで接続を取得
        $this->pdo = DAO::get_db_connect();
    }
    // public function get_Shop_detail(int $ShopID)// 店舗詳細用
    
    // {
    //     $dbh = DAO::get_db_connect();

    //     $sql = "SELECT * FROM Shop where ShopID=:ShopID";

    //     $stmt = $dbh->prepare($sql);

    //     $stmt->bindValue(':ShopID',$ShopID,PDO::PARAM_INT);

    //     $stmt->execute();

    //     $data = [];
    //     while($row = $stmt->fetchObject('Shop')){
    //         $data[] = $row;
    //     }
    //     return $data;
    // }
    public function get_Shop_detail(int $ShopID)
{
    $dbh = DAO::get_db_connect();
    $sql = "SELECT * FROM Shop WHERE ShopID = :ShopID";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':ShopID', $ShopID, PDO::PARAM_INT);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC); // 配列で結果を取得
    return $data; // そのまま配列を返す
}

    

    // ShopDAO.php の get_Shop_NameId() を修正
public function get_Shop_NameId() {
    $sql = "SELECT s.ShopID, s.ShopName, cb.CBagName
            FROM Shop s
            LEFT JOIN ShopInCB sl ON s.ShopID = sl.Shop
            LEFT JOIN Categorybag cb ON sl.CBagID = cb.CBagID";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function insert(string $ShopName,string $MapPoint,string $ShopAddress,
                           string $ShopURL,string $ShopChar,string $StartTime1,string $StartTime2,
                           string $CloseTime1,string $CloseTime2,int $TOSeats
                           )
    // 店舗追加用
    {
        $dbh = DAO::get_db_connect();

       

            $sql = "INSERT INTO Shop(ShopName,MapPoint,ShopAddress,ShopURL,ShopChar,StartTime1,StartTime2,CloseTime1,CloseTime2,TOSeats) values(:ShopName,:MapPoint,:ShopAddress,:ShopURL,:ShopChar,:StartTime1,:StartTime2,:CloseTime1,:CloseTime2,:TOSeats)";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':ShopName',$ShopName,PDO::PARAM_STR);
            $stmt->bindValue(':MapPoint',$MapPoint,PDO::PARAM_STR);
            $stmt->bindValue(':ShopAddress',$ShopAddress,PDO::PARAM_STR);
            $stmt->bindValue(':ShopURL',$ShopURL,PDO::PARAM_STR);
            $stmt->bindValue(':ShopChar',$ShopChar,PDO::PARAM_STR);
            $stmt->bindValue(':StartTime1',$StartTime1,PDO::PARAM_STR);
            $stmt->bindValue(':StartTime2',$StartTime2,PDO::PARAM_STR);
            $stmt->bindValue(':CloseTime1',$CloseTime1,PDO::PARAM_STR);
            $stmt->bindValue(':CloseTime2',$CloseTime2,PDO::PARAM_STR);
            $stmt->bindValue(':TOSeats',$TOSeats,PDO::PARAM_INT);
            $stmt->execute();

           
        
}

    public function delete_by_ShopID(int $ShopID) // 店舗削除
    
    {
        $dbh = DAO::get_db_connect();
        $sql = "DELETE FROM Shop where ShopID=:ShopID";

        $stmt =$dbh->prepare($sql);

        $stmt->bindValue(':ShopID',$ShopID,PDO::PARAM_INT);
      
       
        $stmt->execute();
    }

    public function update_by_ShopID(int $ShopID,string $ShopName,string $MapPoint,string $ShopAddress,
                                     string $ShopURL,string $ShopChar,string $StartTime1,string $StartTime2,
                                     string $CloseTime1,string $CloseTime2,int $TOSeats
                                     ) // 店舗更新
            {
           
        $dbh = DAO::get_db_connect();

        $sql = "UPDATE Shop set ShopName = :ShopName,MapPoint = :MapPoint , ShopAddress= :ShopAddress ,
                                ShopURL = :ShopURL ,ShopChar = :ShopChar ,StartTime1 = :StartTime1 , 
                                StartTime2 = :StartTime2 ,CloseTime1 = :CloseTime1 ,CloseTime2 = : CloseTime2,
                                TOSeats= :TOSeats 
                            where ShopID = :ShopID";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':ShopID',$ShopID,PDO::PARAM_INT);
            $stmt->bindValue(':ShopName',$ShopName,PDO::PARAM_STR);
            $stmt->bindValue(':MapPoint',$MapPoint,PDO::PARAM_STR);
            $stmt->bindValue(':ShopAddress',$ShopAddress,PDO::PARAM_STR);
            $stmt->bindValue(':ShopURL',$ShopURL,PDO::PARAM_STR);
            $stmt->bindValue(':ShopChar',$ShopChar,PDO::PARAM_STR);
            $stmt->bindValue(':StartTime1',$StartTime1,PDO::PARAM_STR);
            $stmt->bindValue(':StartTime2',$StartTime2,PDO::PARAM_STR);
            $stmt->bindValue(':CloseTime1',$CloseTime1,PDO::PARAM_STR);
            $stmt->bindValue(':CloseTime2',$CloseTime2,PDO::PARAM_STR);
            $stmt->bindValue(':TOSeats',$TOSeats,PDO::PARAM_INT);
            $stmt->execute();
    }
    public function Bag_by_ShopID()// 袋名取り出し
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT CBagName FROM Categorybag c FULL JOIN ShopInCB s ON c.CBagID = s.CBagID WHERE c.CBagID = s.CBagID";

        $stmt = $dbh->query($sql);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt->execute();

        return $results;

    }

}
?>