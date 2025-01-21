<?php
require_once 'DAO.php';

class Useradmin
{
public int $MemberID;
public string $UserID;
public string $Pass;
public string $email;
public string $keyword;
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
    //使えるかわからんキーワード検索
    // public function get_goods_by_keyword(string $keyword)
    // {
    //     $dbh = DAO::get_db_connect();
    //     $sql = "SELECT * FROM Members WHERE UserID LIKE :UserID ";
    //     $stmt = $dbh->prepare($sql);
    //     $stmt->bindValue(':UserID','%'.$keyword.'%',PDO::PARAM_STR);
    //     // $stmt->bindValue(':detail','%'.$keyword.'%',PDO::PARAM_STR);
    //     $stmt->execute();
    //     $data = [];
    //     while($row = $stmt->fetchObject('UserID')){
    //         $data[] = $row;
    //     }
    //     return $data;
    // }
    // //使えるかわからんpart２
    // public function get_goods_by_member_name(string $memberID)
    // {
    //     $dbh = DAO::get_db_connect();
    //     $sql = "SELECT * FROM Members WHERE MemberID = :MemberID";
    //     $stmt = $dbh->prepare($sql);
    //     $stmt->bindValue(':MemberID', $memberID, PDO::PARAM_STR);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
    // }   
    public function get_goods_by_member_name(string $memberID)
{
    $dbh = DAO::get_db_connect();
    $sql = "SELECT MemberID, UserID, email FROM Members WHERE MemberID = :MemberID";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':MemberID', $memberID, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); // 必ずデータが配列として返るようにする
}

public function get_goods_by_keyword(string $keyword)
{
    $dbh = DAO::get_db_connect();
    $sql = "SELECT MemberID, UserID, email FROM Members WHERE UserID LIKE :keyword";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
    $stmt->execute();
    $a = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $a;
}
public function get_all_members() {
    $dbh = DAO::get_db_connect();
    $sql = "SELECT MemberID, UserID, email FROM Members";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
}