<?php
require_once 'DAO.php';

class Useradmin
{
public int $MemberID;
public string $UserID;
public string $Pass;
public string $email;
}

class UseradminDAO{
    public function get_member(string $UserID, string $Pass){

        $dbh = DAO::get_db_connect();

        $sql = "SELECT AName,Pass FROM admin WHERE AName = :AName";

        $stmt = $dbh->prepare($sql);
       

        $stmt->bindValue(':AName',$AName,PDO::PARAM_STR);

        $stmt->execute();

        $member = $stmt->fetchObject('Admin');
        

        if($member !== false){
            if(password_verify($Pass, $member->Pass)){
                return $member;
            }
        }
        return false;
    }
}