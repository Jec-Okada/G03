<?php
require_once 'DAO.php';

class CBag
{
public int $CBagID;
public string $CBagName;
public int $CQID;
public String $Shop;
public int $ShopID;
}

class CBagDAO
{
    public function get_CBag_detail(int $CBagID)// 袋内の店舗表示用
    {
        // $dbh = DAO::get_db_connect();

        // $sql = "SELECT * FROM CBagTable WHERE CBagID = ?";
        // $stmt = $dbh->prepare($sql);

        // $stmt->bindValue(':CBagID',$CBagID,PDO::PARAM_INT);

        // $stmt->execute();

        // $data = [];
        // while($row = $stmt->fetchObject('CBag')){
        //     $data[] = $row;
        // }
        // return $data;
        $dbh = DAO::get_db_connect();
        $sql = "SELECT Shop FROM ShopInCB WHERE CBagID = :CBagID";
        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':CBagID',$CBagID,PDO::PARAM_INT);
       
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        return $results;
    }
     
    public function get_Shop_name(int $ShopID){
        $dbh = DAO::get_db_connect();
        $sql = "SELECT ShopName FROM Shop WHERE ShopID = :ShopID";
        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':ShopID',$ShopID,PDO::PARAM_INT);
       
        $stmt->execute();


        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $results;

    }

    

    public function get_CBag_NameId()// 一覧用
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT CBagID,CBagName FROM CategoryBag";

        $stmt = $dbh->prepare($sql);
        

        $stmt->execute(); 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        
        
    }

    public function insert(string $CBagName)// 袋のみ追加
    {
        $dbh = DAO::get_db_connect();

       

            $sql = "INSERT INTO CBag(CBagName) values(:CBagName)";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':CBagName',$CBagName,PDO::PARAM_STR);
           
            
            $stmt->execute();

           
        
}///ここから下はできていないfunction
public function get_CBagName_By_CBagID($cBagID) {
    $query = "SELECT CBagName FROM CategoryBag WHERE CBagID = :cBagID";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindValue(':cBagID', $cBagID, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn(); // CBagNameを返す
}

}
?>