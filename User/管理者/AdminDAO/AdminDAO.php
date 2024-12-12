<?php
require_once 'DAO.php';

class Admin
{
public int $AID;
public string $AName;
public string $Pass;
public string $email;
}

class AdminDAO{
    public function get_member(string $AName, string $Pass){

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
    ///<!-- 試していない、途中 -->
    public function insert(Admin $member){
        
        $dbh = DAO::get_db_connect();

        $sql = "INSERT INTO admin(AName,Pass,Email)VALUES(:AName,:Pass,:email)";

        $stmt = $dbh->prepare($sql);

        $Pass = password_hash($member->Pass, PASSWORD_DEFAULT);
        
        
        $stmt->bindValue(':AName',$member->AName,PDO::PARAM_STR);
        $stmt->bindValue(':Pass',$Pass,PDO::PARAM_STR);
        $stmt->bindValue(':email',$member->email,PDO::PARAM_STR);

        $stmt->execute();

       

    }
    public function email_exists(string $email){
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * FROM admin WHERE Email = :email";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
      
        $stmt->execute();

        if($stmt->fetch() !== false){
            return true;
        }else{
            return false;
        }
    }
    public function password_change(string $email,string $Pass){
        $dbh = DAO::get_db_connect();
        $sql = 'UPDATE admin set Pass = :Pass WHERE Email = :email';
        $stmt = $dbh->prepare($sql); 
        $Pass = password_hash($Pass, PASSWORD_DEFAULT);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->bindValue(':Pass', $Pass, PDO::PARAM_STR);
        $stmt->execute();
      return True;
    }
}
?>