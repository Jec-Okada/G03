<?php
require_once 'DAO.php';

class CBag
{
public int $CBagID;
public string $CBagName;
public int $CQID;

}

class CBagDAO
{
    public function get_CBag_detail(int $CBagID)// 袋内の店舗表示用
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT Shop FROM ShopInCB where CBagID=:CBagID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':CBagID',$CBagID,PDO::PARAM_INT);

        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('CBag')){
            $data[] = $row;
        }
        return $data;
    }
    

    public function get_CBag_NameId(int $CBagID)// 一覧用
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT CBagID,CBagName FROM CBag";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('CBag')){
            $data[] = $row;
        }
        return $data;
    }

    public function insert(string $CBagName)// 袋のみ追加
    {
        $dbh = DAO::get_db_connect();

       

            $sql = "INSERT INTO CBag(CBagName) values(:CBagName)";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':CBagName',$CBagName,PDO::PARAM_STR);
           
            
            $stmt->execute();

           
        
}///ここから下はできていないfunction

}
?>