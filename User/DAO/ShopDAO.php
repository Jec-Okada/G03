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
}

class ShopDAO
{
    public function get_id_Shop(int $ShopID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * FROM Shop where ShopID=:ShopID";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('Shop')){
            $data[] = $row;
        }
        return $data;
    }
    
    public function insert(string $ShopName,string $MapPoint,string $ShopAddress,string $ShopURL,int $TOSeats,string $StartTime1,string $StartTime2,string $CloseTime1,string $CloseTime2,string $ShopChar)
    {
        $dbh = DAO::get_db_connect();

       

            $sql = "INSERT INTO Shop values(:ShopName,:MapPoint,:ShopAddress,:ShopURL,:TOSeats,:StartTime1,:StartTime2,:CloseTime1,:CloseTime2,:ShopChar)";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':ShopName',$ShopName,PDO::PARAM_STR);
            $stmt->bindValue(':MapPoint',$MapPoint,PDO::PARAM_STR);
            $stmt->bindValue(':ShopAddress',$ShopAddress,PDO::PARAM_STR);
            $stmt->bindValue(':ShopURL',$ShopURL,PDO::PARAM_STR);
            $stmt->bindValue(':TOSeats',$TOSeats,PDO::PARAM_INT);
            $stmt->bindValue(':StartTime1',$StartTime1,PDO::PARAM_STR);
            $stmt->bindValue(':StartTime2',$StartTime2,PDO::PARAM_STR);
            $stmt->bindValue(':CloseTime1',$CloseTime1,PDO::PARAM_STR);
            $stmt->bindValue(':CloseTime2',$CloseTime2,PDO::PARAM_STR);
            $stmt->bindValue(':ShopChar',$ShopChar,PDO::PARAM_STR);
            
            $stmt->execute();

           
        
}///ここから下はできていないfunction

}
?>