<?php
require_once 'DAO.php';

class BasicQ{
    public int $BQID;
    public string $BQuestion;
    public int $YQID;
    public int $NQID;
    public int $RQID;
    public int $YCID;
    public int $NCID;

}
class BasicQDAO{

    public function BasicQ_BQuestion()//ベーシック質問一覧 IDと質問内容
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT BQID,BQuestion FROM BesicQuestion";

      $stmt = $dbh->query($sql);
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }

    public function BasicQ_YQID()//ベーシック質問一覧 Yes時の質問内容
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT BQuestion FROM BesicQuestion where YQID=BQID";

      $stmt = $dbh->query($sql);
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }

    public function BasicQ_NQID()//ベーシック質問一覧 No時の質問内容
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT BQuestion FROM BesicQuestion where NQID=BQID";

      $stmt = $dbh->query($sql);
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }

    public function BasicQ_RQID()//ベーシック質問一覧 前の質問内容
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT BQuestion FROM BesicQuestion where RQID=BQID";

      $stmt = $dbh->query($sql);
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }


    public function BasicQ_YCID()//ベーシック質問一覧 Yes時のカテゴリ質問内容
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT Cq.CQuestion FROM BesicQuestion as Cb Full join CategoryQuestion as Cq on Cb.YCID=Cq.CQID where Cb.YCID=Cq.CQID";

      $stmt = $dbh->query($sql);
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }

     public function BasicQ_NCID()//ベーシック質問一覧 No時のカテゴリ質問内容
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT Cq.CQuestion FROM BesicQuestion as Cb Full join CategoryQuestion as Cq on Cb.NCID=Cq.CQID where Cb.NCID=Cq.CQID";

      $stmt = $dbh->query($sql);
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }



//ここから下追加機能


    public function BasicQ_select()//ベーシック質問追加 選択する質問内容
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT BQuestion FROM BesicQuestion ";

      $stmt = $dbh->query($sql);
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }


    public function BasicQ_Insert(string $BQuestion,int $YQID,int $NQID,int $RQID,int $YCID,int $NCID)//ベーシック質問追加 追加機能
    {
      
      $dbh = DAO::get_db_connect();
      $sql = "INSERT INTO BesicQuestion(BQuestion,YQID,NQID,RQID)values(:BQuestion,:YQID,:NQID,:RQID)";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':BQuestion',$BQuestion,PDO::PARAM_STR);
            $stmt->bindValue(':YQID',$YQID,PDO::PARAM_INT);
            $stmt->bindValue(':NQID',$NQID,PDO::PARAM_INT);
            $stmt->bindValue(':RQID',$RQID,PDO::PARAM_INT);
            $stmt->execute();
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    
        
    
          
    }


    public function BasicQ_Insert_YorN(string $BQuestion,int $YCID,int $NCID)//ベーシック質問追加 追加機能 YesにつくかNoにつくか
    {
      
      $dbh = DAO::get_db_connect();
      $sql = "INSERT INTO BesicQuestion(YCID,NCID) values(:YCID,:NCID) where BQuestion=:BQuestion";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':BQuestion',$BQuestion,PDO::PARAM_STR);
            $stmt->bindValue(':YCID',$YCID,PDO::PARAM_INT);
            $stmt->bindValue(':NCID',$NCID,PDO::PARAM_INT);
            
            $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

    }

    
}




?>