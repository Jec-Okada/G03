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

    public function get_CBag_Name()// カテゴリ質問追加 選択する袋名
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT CBagName FROM CategoryBag";

        $stmt = $dbh->query($sql);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    }

    public function CategoryQ_ID_search(string $CQuestion)//ベーシック質問追加 選択する質問内容のID検索
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT CQID FROM CategoryQuestion where CQuestion = :CQuestion";

      $stmt =$dbh->prepare($sql);

      $stmt->bindValue(':CQuestion',$CQuestion,PDO::PARAM_STR);
      
      $stmt->execute();
      

      

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      return $results[0]['CQID'];
        
          
    }

    public function CBag_ID_search(string $CBagName)//ベーシック質問追加 選択する質問内容のID検索
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT CBagID FROM CategoryBag where CBagName = :CBagName";

      $stmt =$dbh->prepare($sql);

      $stmt->bindValue(':CBagName',$CBagName,PDO::PARAM_STR);
      
      $stmt->execute();
      

      

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      return $results[0]['CBagID'];
        
          
    }

    public function CategoryQ_BQtable_Insert(string $BQuestion,int $RQID,int $YCID,int $NCID)//ベーシック質問追加 追加機能
    {
      
      $dbh = DAO::get_db_connect();
      $sql = "INSERT INTO BesicQuestion(BQuestion,RQID,YCID,NCID)values(:BQuestion,:RQID,:YCID,:NCID)";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':BQuestion',$BQuestion,PDO::PARAM_STR); 
            $stmt->bindValue(':RQID',$RQID,PDO::PARAM_INT);
            $stmt->bindValue(':YCID',$YCID,PDO::PARAM_INT);
            $stmt->bindValue(':NCID',$NCID,PDO::PARAM_INT);
           
            $stmt->execute();
      
      
        
    
          
    }

    public function CategoryQ_InsertCQ(string $CQuestion,int $BQID,int $YesCBID,int $NoCBID)//カテゴリ質問追加(CQ) 追加機能
    {
      
      $dbh = DAO::get_db_connect();
      $sql = "INSERT INTO CategoryQuestion(CQuestion,BQID,YesCBID,NoCBID)values(:CQuestion,:BQID,:YesCBID,:NoCBID)";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':CQuestion',$CQuestion,PDO::PARAM_STR);
            $stmt->bindValue(':BQID',$BQID,PDO::PARAM_INT);
            $stmt->bindValue(':YesCBID',$YesCBID,PDO::PARAM_INT);
            $stmt->bindValue(':NoCBID',$NoCBID,PDO::PARAM_INT);

            $stmt->execute();
      
          
    }


    public function BasicQ_Update_Yes(string $BQuestion,int $YQID)//カテゴリ質問追加 追加機能 ベーシック質問の下 Yesにつく
    {
      
      $dbh = DAO::get_db_connect();
      $sql = "update BesicQuestion set YQID=:YQID where BQuestion=:BQuestion";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':BQuestion',$BQuestion,PDO::PARAM_STR);
            $stmt->bindValue(':YQID',$YQID,PDO::PARAM_INT);
            
            
            $stmt->execute();

       
    }
    public function BasicQ_Update_No(string $BQuestion,int $NQID)//カテゴリ質問追加 追加機能 ベーシック質問の下 Noにつく
    {
      
      $dbh = DAO::get_db_connect();
      $sql = "update BesicQuestion set NQID=:NQID where BQuestion=:BQuestion";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':BQuestion',$BQuestion,PDO::PARAM_STR);
            
            $stmt->bindValue(':NQID',$NQID,PDO::PARAM_INT);
            
            $stmt->execute();

        

    }

    public function YesCBag_in_CQID(string $CQID,int $YesCBID)//カテゴリ質問追加 Yes時の袋にカテゴリ質問IDを追加
    {
      
      $dbh = DAO::get_db_connect();
      $sql="update CategoryBag set CQID=:CQID WHERE CBagID=:YesCBID";

      $stmt =$dbh->prepare($sql);
      $stmt->bindValue(':YesCBID',$YCID,PDO::PARAM_INT);
      $stmt->bindValue(':CQID',$CQuestion,PDO::PARAM_STR);
     
      
      $stmt->execute();

      
      
        
          
    }
    public function NoCBag_in_CQID(string $CQID,int $NoCBID)//カテゴリ質問追加 No時の袋にカテゴリ質問IDを追加
    {
      
      $dbh = DAO::get_db_connect();
      $sql="update CategoryBag set CQID=:CQID WHERE CBagID=:NoCBID";

      $stmt =$dbh->prepare($sql);
      $stmt->bindValue(':NoCBID',$YCID,PDO::PARAM_INT);
      $stmt->bindValue(':CQID',$CQuestion,PDO::PARAM_STR);
     
      
      $stmt->execute();

      
      
        
          
    }
    
    
}




?>