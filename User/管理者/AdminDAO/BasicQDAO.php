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
    public function BasicQ_ID_BQuestion(int $BQID)//ベーシック質問一覧 IDで質問内容を検索
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT * FROM BesicQuestion where BQID=:BQID";

      $stmt = $dbh->prepare($sql);

      $stmt->bindValue(':BQID',$BQID,PDO::PARAM_INT);
      
      $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC); 
    return $data;
        
          
    }

    public function BasicQ_YQID(int $YQID)//ベーシック質問一覧 Yes時の質問内容
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT BQuestion FROM BesicQuestion where BQID=:YQID";

      $stmt =$dbh->prepare($sql);

      $stmt->bindValue(':YQID',$YQID,PDO::PARAM_INT);
      
      $stmt->execute();
      

      

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      return $results[0]['BQuestion'];
        
      
          
    }

    public function BasicQ_NQID(int $NQID)//ベーシック質問一覧 No時の質問内容
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT BQuestion FROM BesicQuestion where BQID=:NQID";

      $stmt =$dbh->prepare($sql);

      $stmt->bindValue(':NQID',$NQID,PDO::PARAM_INT);
      
      $stmt->execute();
        
          
    }

    public function BasicQ_RQID(int $RQID)//ベーシック質問一覧 前の質問内容
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT BQuestion FROM BesicQuestion where BQID=:RQID";

      $stmt =$dbh->prepare($sql);

      $stmt->bindValue(':RQID',$RQID,PDO::PARAM_INT);
      
      $stmt->execute();
          
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


    public function BasicQ_select()//ベーシック質問追加 選択する質問内容IDで追加
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT BQuestion FROM BesicQuestion ";

      $stmt = $dbh->query($sql);
      
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
        
          
    }
    public function BasicQ_ID_search(string $BQuestion)//ベーシック質問追加 選択する質問内容のID検索
    {
      
      $dbh = DAO::get_db_connect();
      $sql="SELECT BQID FROM BesicQuestion where BQuestion = :BQuestion";

      $stmt =$dbh->prepare($sql);

      $stmt->bindValue(':BQuestion',$BQuestion,PDO::PARAM_STR);
      
      $stmt->execute();
      

      

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      return $results[0]['BQID'];
        
          
    }



    public function BasicQ_Insert(string $BQuestion,int $YQID,int $NQID,int $RQID)//ベーシック質問追加 追加機能
    {
      
      $dbh = DAO::get_db_connect();
      $sql = "INSERT INTO BesicQuestion(BQuestion,YQID,NQID,RQID)values(:BQuestion,:YQID,:NQID,:RQID)";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':BQuestion',$BQuestion,PDO::PARAM_STR);
            $stmt->bindValue(':YQID',$YQID,PDO::PARAM_INT);
            $stmt->bindValue(':NQID',$NQID,PDO::PARAM_INT);
            $stmt->bindValue(':RQID',$RQID,PDO::PARAM_INT);
            $stmt->execute();
      
      
        
    
          
    }


    public function BasicQ_Insert_Yes(string $BQuestion,int $YCID)//ベーシック質問追加 追加機能 Yesにつく
    {
      
      $dbh = DAO::get_db_connect();
      $sql = "update BesicQuestion set YCID=:YCID where BQuestion=:BQuestion";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':BQuestion',$BQuestion,PDO::PARAM_STR);
            $stmt->bindValue(':YCID',$YCID,PDO::PARAM_INT);
            
            
            $stmt->execute();

        

    }
    public function BasicQ_Insert_No(string $BQuestion,int $NCID)//ベーシック質問追加 追加機能 Noにつく
    {
      
      $dbh = DAO::get_db_connect();
      $sql = "update BesicQuestion set NCID=:NCID where BQuestion=:BQuestion";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':BQuestion',$BQuestion,PDO::PARAM_STR);
            $stmt->bindValue(':NCID',$NCID,PDO::PARAM_INT);
            
            $stmt->execute();

        

    }
    //ここから下削除機能

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

    public function BasicQ_Delete(int $BQID)//ベーシック質問 質問削除機能 
    {
      
      $dbh = DAO::get_db_connect();
      $sql = "delete BesicQuestion where BQID=:BQID";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':BQID',$BQID,PDO::PARAM_STR);
           
            
            $stmt->execute();

        

    }
    //ここから下変更機能 YQIDとNQIDとRQIDが数珠つなぎ的に変わっていくから変更は無理！！！！！！！！！！！！！！
    public function BasicQ_Update(string $BQuestion,int $YQID,int $NQID,int $RQID)//ベーシック質問  変更機能
    {
      
      $dbh = DAO::get_db_connect();
      $sql = "Update BesicQuestion set YQID=:YQID,NQID=:NQID,RQID=:RQID where BQuestion=:BQuestion";

            $stmt =$dbh->prepare($sql);

            $stmt->bindValue(':BQuestion',$BQuestion,PDO::PARAM_STR);
            $stmt->bindValue(':YQID',$YQID,PDO::PARAM_INT);
            $stmt->bindValue(':NQID',$NQID,PDO::PARAM_INT);
            $stmt->bindValue(':RQID',$RQID,PDO::PARAM_INT);
            $stmt->execute();
      
      
        
    
          
    }
  
  

}




?>