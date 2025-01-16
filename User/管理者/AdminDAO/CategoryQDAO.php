<?php
require_once 'DAO.php';

class CategoryQ{
    public int $CQID;
    public string $CQuestion;
    public int $BQID;
    public int $YesCID;
    public int $NoCID;
    public int $YesCBID;
    public int $NoCBID;

}
class CategoryQDAO{

    public function CategoryQ_BQuestion()//カテゴリ質問一覧 IDと質問内容
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT CQID,CQuestion FROM CategoryQuestion";

      $stmt = $dbh->query($sql);
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }

    public function CategoryQ_BQID()//カテゴリ質問一覧 前の質問内容
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT Cb.BQuestion FROM CategoryQuestion as Cq Full join BesicQuestion as Cb on Cb.BQID=Cq.BQID where Cb.BQID=Cq.BQID";

      $stmt = $dbh->query($sql);
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }


    public function CategoryQ_YCID()//カテゴリ質問一覧 Yes時の袋名
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT Bag.CBagName FROM CategoryQuestion as Cq Full join CategoryBag as Bag on Cq.YesCID=Bag.CbagID where Cq.YesCID=Bag.CbagID";

      $stmt = $dbh->query($sql);
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }

     public function CategoryQ_NCID()//カテゴリ質問一覧 No時の袋名
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT Bag.CBagName FROM CategoryQuestion as Cq Full join CategoryBag as Bag on Cq.NoCID=Bag.CbagID where Cq.NoCID=Bag.CbagID";

      $stmt = $dbh->query($sql);
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }



//ここから下追加機能


    public function CategoryQ_select()//カテゴリ質問追加 選択する質問内容
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT CQuestion FROM CategoryQuestion ";

      $stmt = $dbh->query($sql);
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }


    public function CategoryQ_Insert(string $CQuestion,int $BQID,int $YesCID,int $NoCID)//カテゴリ質問追加 追加機能
    {
      
      $dbh = DAO::get_db_connect();
      $sql = "INSERT INTO CategoryQuestion(CQuestion,BQID)values(:CQuestion,:BQID)";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':CQuestion',$CQuestion,PDO::PARAM_STR);
            $stmt->bindValue(':BQID',$BQID,PDO::PARAM_INT);

            $stmt->execute();
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    
        
    
          
    }


    public function BasicQ_Insert_YorN(string $BQuestion,int $YCID,int $NCID)//カテゴリ質問追加 追加機能 ベーシック質問の下 YesにつくかNoにつくか
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


    public function CategoryQ_YCBID(string $CQuestion,int $YesCBID)//カテゴリ質問追加 Yes時の袋名
    {
      
      $dbh = DAO::get_db_connect();
      $sql="INSERT INTO CategoryQuestion(YesCBID)values(:YesCBID) WHERE BQuestion=:BQuestion";

      $stmt = $dbh->query($sql);
      $stmt->bindValue(':YesCBID',$YCID,PDO::PARAM_INT);
      $stmt->bindValue(':BQuestion',$CQuestion,PDO::PARAM_STR);
     
      
      $stmt->execute();

      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }
    public function CategoryQ_NCBID(string $CQuestion,int $NoCBID)//カテゴリ質問追加 No時の袋名
    {
      
      $dbh = DAO::get_db_connect();
      $sql="INSERT INTO CategoryQuestion(NoCBID)values(:NoCBID) WHERE BQuestion=:BQuestion";

      $stmt = $dbh->query($sql);
      $stmt->bindValue(':NoCBID',$YCID,PDO::PARAM_INT);
      $stmt->bindValue(':BQuestion',$CQuestion,PDO::PARAM_STR);
     
      
      $stmt->execute();

      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }

    
}




?>