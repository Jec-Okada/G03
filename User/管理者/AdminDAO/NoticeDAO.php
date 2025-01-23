<?php
require_once 'DAO.php';
class Notice{
            public int $NID;
            public string $NContent;
            public string $AddDate;
        }


       class NoticeDAO{ 

        public function notice_detail()//お知らせ一覧
        {
          
          $dbh = DAO::get_db_connect();
          $sql = "SELECT top(5) NContent,AddDate FROM Notice order by AddDate desc";
          $stmt = $dbh->query($sql);
          
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $results;
            
              
             }
        
        public function notice_add(string $NContent)//お知らせ追加
        {
        
          $date = new DateTime();
 
           $AddDate = $date->format("Y年m月d日 H時i分");
            $dbh = DAO::get_db_connect();
           
            $sql = 'INSERT INTO Notice(NContent,AddDate)VALUES(:NContent,:AddDate)'; 
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':NContent',$NContent,PDO::PARAM_STR);
            $stmt->bindValue(':AddDate',$AddDate,PDO::PARAM_STR);
            
        
            // クエリを実行
            $stmt->execute();
            
            
             }
        }
            
      ?>