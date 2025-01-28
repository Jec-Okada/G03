
<!DOCTYPE html>
<html>
<head>
    <title>報告フォーム</title>
    <meta charset="utf-8">
    
</head>
<body>
    <?php include "header.php"; ?>
    <link href="css/houkoku.css" rel="stylesheet">
    <h1>バグ報告・要望フォーム</h1>
    <div style="border:solid 1px; "></div>
    <form action="" method="POST">
    <div>
        <label><input type="radio" id="rbtn" name="form" value="bug" checked />
        バグ報告</label>
        <label><input type="radio" id="rbtn" name="form" value="request" />
        要望</label>
    </div>
    <div style="border:dashed 1px; "></div>
    <div>
        <textarea id="text"   name="requestform" rows="10" cols="50" ></textarea>
    </div>
    <div>
        <button class="main" type="button" onclick="location.href='mainmenu.php'">メインページへ</button>
        <button class="send" type="submit">送信</button>
    </div>
    </form>
    <?php
     $Rnaiyou = '';
     $judge1 = false;
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
   
       $Rnaiyou = $_POST['requestform'];
       if($Rnaiyou != ''){
         $judge1 = true;
       }
     }
     $judge2=false;
     if(!empty($_SESSION['member'])) { 
      $judge2=true;
      $member = $_SESSION['member']; 
  }
      
    require_once './UserDAO/DAO3.php';
    require_once './UserDAO/MemberDAO.php';
    $dbh = DAO::get_db_connect();


    if ($judge1==true && $judge2==true) {
      switch ($_REQUEST['form']) {  
        case 'bug': 
          
          $sql = "INSERT INTO Report (Rnaiyou, MemberID, judge) VALUES (:Rnaiyou, :MemberID,:judge )";
 
          $stmt = $dbh->prepare($sql);

          $params = array(':Rnaiyou' => $Rnaiyou, ':MemberID' => $member['MemberID'] , ':judge' => 'バグ') ;
          
          $stmt->execute($params);
           

            break; 
        case 'request': 
          $sql = "INSERT INTO Report (Rnaiyou, MemberID, judge) VALUES (:Rnaiyou, :MemberID,:judge )";
 
          $stmt = $dbh->prepare($sql);
 
          $params = array(':Rnaiyou' => $Rnaiyou, ':MemberID' => $member['MemberID'] , ':judge' => 'リクエスト') ;
 
          $stmt->execute($params);
            
            break; 
        }
     echo "送信完了しました";
    } else if($judge2){
     echo "内容を入力してください"; 
    } else{
      echo "ログインしてください";
    }
    
 
    

    ?>
</body>
</html>