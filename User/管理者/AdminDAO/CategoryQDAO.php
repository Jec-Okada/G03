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
    public function CategoryQ_ID_CQuestion(int $CQID)//ベーシック質問一覧 IDで質問内容を検索
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT * FROM CategoryQuestion where CQID=:CQID";

      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(':CQID',$CQID,PDO::PARAM_INT);
      
      $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC); 
    return $data;
        
          
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

    public function CategoryQ_YCID_search($YCID)//カテゴリ質問一覧 Yes時の袋名
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT CBagName FROM  CategoryBag  where CBagID=:YCID";

      $stmt =$dbh->prepare($sql);
     
      $stmt->bindValue(':YCID',$YCID,PDO::PARAM_INT);
     
      
      $stmt->execute();
      
     
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      return $results;
    }
    public function CategoryQ_NCID_search($NCID)//カテゴリ質問一覧 Yes時の袋名
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT CBagName FROM  CategoryBag  where CBagID=:NCID";

      $stmt =$dbh->prepare($sql);
     
      $stmt->bindValue(':NCID',$NCID,PDO::PARAM_INT);
     
      
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      return $results;
          
    }
    //ここから下削除機能
    public function BasicQ_BQuestion_search(string $CQuestion)//ベーシック質問一覧 内容で質問IDを検索
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT BQID FROM BesicQuestion where BQuestion=:CQuestion";

      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(':CQuestion',$CQuestion,PDO::PARAM_STR);
      
      $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC); 
    return $data;
        
          
    }
    public function CategoryQ_CQuestion_search(int $CQID)//ベーシック質問一覧 質問IDで内容を検索
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT CQuestion FROM CategoryQuestion where CQID=:CQID";

      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(':CQID',$CQID,PDO::PARAM_INT);
      
      $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC); 
    return $data;
        
          
    }

    public function CategoryQ_Delete_CQID(int $CQID)//ベーシック質問テーブルにある該当した質問を削除
    {
            
            $dbh = DAO::get_db_connect();
            $sql = "Delete CategoryQuestion where CQID=:CQID";
      
                  $stmt =$dbh->prepare($sql);
      
                  $stmt->bindValue(':CQID',$CQID,PDO::PARAM_INT);
                  
                  $stmt->execute();
      
              
      
    }
    public function BasicQ_Delete_BQID(int $BQID)//ベーシック質問テーブルにある該当した質問を削除
    {
            
            $dbh = DAO::get_db_connect();
            $sql = "Delete BesicQuestion where BQID=:BQID";
      
                  $stmt =$dbh->prepare($sql);
      
                  $stmt->bindValue(':BQID',$BQID,PDO::PARAM_INT);
                  
                  $stmt->execute();
      
              
      
    }
    public function BasicQ_Update_YQID(int $BQID)//ベーシック質問  削除した質問が入っていた質問のYQIDを初期化 & 変更機能 Yesについていた質問のYQIDを初期化
    {
      
      $dbh = DAO::get_db_connect();
      $sql = "update BesicQuestion set YQID=0 where YQID=:BQID";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':BQID',$BQID,PDO::PARAM_INT);
            
            $stmt->execute();

        


          }  
    public function BasicQ_Update_NQID(int $BQID)//ベーシック質問  削除した質問が入っていた質問のNQIDを初期化 & 変更機能 Noについていた質問のNQIDを初期化
    {
            
            $dbh = DAO::get_db_connect();
            $sql = "update BesicQuestion set NQID=0 where NQID=:BQID";
      
                  $stmt =$dbh->prepare($sql);
      
                  $stmt->bindValue(':BQID',$BQID,PDO::PARAM_INT);
                  
                  $stmt->execute();
      
              
      
    }
    public function BasicQ_Update_RQID(int $BQID)//ベーシック質問  削除した質問が入っていた質問のRQIDを初期化 & 前の質問についていた質問のRQIDを初期化
    {
            
            $dbh = DAO::get_db_connect();
            $sql = "update BesicQuestion set RQID=0 where RQID=:BQID";
      
                  $stmt =$dbh->prepare($sql);
      
                  $stmt->bindValue(':BQID',$BQID,PDO::PARAM_INT);
                  
                  $stmt->execute();
      
              
      
    }
    
    
}




?>