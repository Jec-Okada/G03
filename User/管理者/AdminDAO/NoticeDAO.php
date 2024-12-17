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
           
            $sql = 'SELECT NContent FROM Notice'; 
            $stmt = $dbh->prepare($sql);
        
            // クエリを実行
            $stmt->execute();
            
            while($notice = $stmt->fetchObject('Notice')){
                $notices[] = $notice;
               }  
             }
        
        public function notice_add(string $NContent)//お知らせ追加
        {
            $AddDate = date("Y年m月d日 H時i分");
            $dbh = DAO::get_db_connect();
           
            $sql = 'INSERT INTO Notice(NContent,AddDate)VALUES(:NContent,:AddDate)'; 
            $stmt->bindValue(':NContent',$NContent,PDO::PARAM_STR);
            $stmt->bindValue(':Adddate',$AddDate,PDO::PARAM_STR);
            $stmt = $dbh->prepare($sql);
        
            // クエリを実行
            $stmt->execute();
            
            while($notice = $stmt->fetchObject('Notice')){
                $notices[] = $notice;
               }  
             }
        }
            
      ?>