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
public string $closeTime2;
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
    ///ここから下はできていないfunction
    public function get_Shop_by_groupID(int $groupID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * FROM Shop WHERE groupID=:groupID ORDER BY recommend DESC";


        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':groupID',$groupID,PDO::PARAM_INT);

        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('Shop')){
            $data[] = $row;
        }
        return $data;
    }

    public function get_Shop_by_ShopID(String $ShopID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * FROM Shop WHERE ShopID=:ShopID";


        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':ShopID',$ShopID,PDO::PARAM_STR);

        $stmt->execute();

        $Shop = $stmt->fetchObject('Shop');
            return $Shop;
        
       
    }

    public function get_Shop_by_keyword(string $keyword){
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * from Shop where Shopname like :Shopname or detail like :detail order by recommend desc";


        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':Shopname','%'.$keyword.'%',PDO::PARAM_STR);
        $stmt->bindValue(':detail','%'.$keyword.'%',PDO::PARAM_STR);


        $stmt->execute();

        $ShopData = [];
        while($row = $stmt->fetchObject('Shop')){
            $ShopData[] = $row;
        }
        return $ShopData;
        

    }
}
?>