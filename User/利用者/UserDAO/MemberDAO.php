<?php
require_once 'DAO.php';

class Members
{
public int $memberid;
public string $UserID;
public string $Pass;
public string $email;

}
class MemberDAO{
    public function get_member(string $UserID, string $Pass){

        $dbh = DAO2::get_db_connect();

        $sql = "SELECT * FROM Members WHERE UserID = :UserID";

        $stmt = $dbh->prepare($sql);
       

        $stmt->bindValue(':UserID',$UserID,PDO::PARAM_STR);

        $stmt->execute();

        $member = $stmt->fetch(PDO::FETCH_ASSOC);

        

        if($member !== false){
            if(password_verify($Pass, $member['Pass'])){
                return $member;
            }
        }
        return false;
    }
    ///<!-- 試していない、途中 -->
    public function insert(Members $member){
        
        $dbh = DAO2::get_db_connect();

        $sql = "INSERT INTO Members(UserID,Pass,Email)VALUES(:UserID,:Pass,:email)";

        $stmt = $dbh->prepare($sql);

        $Pass = password_hash($member->Pass, PASSWORD_DEFAULT);
        
        
        $stmt->bindValue(':UserID',$member->UserID,PDO::PARAM_STR);
        $stmt->bindValue(':Pass',$Pass,PDO::PARAM_STR);
        $stmt->bindValue(':email',$member->email,PDO::PARAM_STR);

        $stmt->execute();

       

    }
    public function email_exists(string $email){
        $dbh = DAO2::get_db_connect();

        $sql = "SELECT * FROM Members WHERE Email = :email";

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
        $dbh = DAO2::get_db_connect();
        $sql = 'UPDATE Members set Pass = :Pass WHERE Email = :email';
        $stmt = $dbh->prepare($sql); 
        $Pass = password_hash($Pass, PASSWORD_DEFAULT);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->bindValue(':Pass', $Pass, PDO::PARAM_STR);
        $stmt->execute();
      return True;

    }

}