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
    public function get_CBag_detail(int $CBagID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * FROM CBag where CBagID=:CBagID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':CBagID',$CBagID,PDO::PARAM_INT);

        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('CBag')){
            $data[] = $row;
        }
        return $data;
    }
    

    public function get_CBag_NameId(int $CBagID)
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

    public function insert(string $CBagName,string $CBagID,string $CQID)
    {
        $dbh = DAO::get_db_connect();

       

            $sql = "INSERT INTO CBag(CBagName,CBagID,CQID) values(:CBagName,:CBagID,:CQID)";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':CBagName',$CBagName,PDO::PARAM_STR);
            $stmt->bindValue(':CBagID',$CBagID,PDO::PARAM_INT);
            $stmt->bindValue(':CQID',$CQID,PDO::PARAM_STR);
            
            $stmt->execute();

           
        
}///ここから下はできていないfunction

}
?>