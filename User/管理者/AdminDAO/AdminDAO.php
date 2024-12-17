<?php
require_once 'DAO.php';

class Admin
{
public int $AID;
public string $AName;
public string $Pass;
public string $email;
}
//終わったけどコミット&プッシュしてない
class AdminDAO{
    public function get_admin(string $AName, string $Pass){

        $dbh = DAO::get_db_connect();

        $sql = "SELECT AName,Pass FROM AdminUser WHERE AName = :AName";

        $stmt = $dbh->prepare($sql);
       

        $stmt->bindValue(':AName',$AName,PDO::PARAM_STR);

        $stmt->execute();

        $admin = $stmt->fetchObject('Admin');
        

        if($admin !== false){
            if(password_verify($Pass, $admin->Pass)){
                return $admin;
            }
        }
        return false;
    }
   
    public function insert(Admin $admin){
        
        $dbh = DAO::get_db_connect();

        $sql = "INSERT INTO AdminUser(AName,Pass,Email)VALUES(:AName,:Pass,:email)";

        $stmt = $dbh->prepare($sql);

        $Pass = password_hash($admin->Pass, PASSWORD_DEFAULT);
        
        
        $stmt->bindValue(':AName',$admin->AName,PDO::PARAM_STR);
        $stmt->bindValue(':Pass',$Pass,PDO::PARAM_STR);
        $stmt->bindValue(':email',$admin->email,PDO::PARAM_STR);

        $stmt->execute();

       

    }
    public function email_exists(string $email){
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * FROM AdminUser WHERE email = :email";

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
        $sql = 'UPDATE AdminUser set Pass = :Pass WHERE Email = :email';
        $stmt = $dbh->prepare($sql); 
        $Pass = password_hash($Pass, PASSWORD_DEFAULT);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->bindValue(':Pass', $Pass, PDO::PARAM_STR);
        $stmt->execute();
      return True;
    }
}
?>