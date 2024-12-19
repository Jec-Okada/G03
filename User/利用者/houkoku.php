<?php
  $Rnaiyou = '';

  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $Rnaiyou = $_POST['requestform'];
    $judge = false;
    if($Rnaiyou != ''){
      $judge = true;
    }
  }
?>
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
    require_once './UserDAO/DAO.php';
    require_once './UserDAO/MemberDAO.php';
    $dbh = DAO2::get_db_connect();

    if ($judge) {
      switch ($_REQUEST['form']) {  
        case 'bug': 
          
          $sql = "INSERT INTO Report (Rnaiyou, MemberID, judge) VALUES (:Rnaiyou, :MemberID,:judge )";
 
          $stmt = $dbh->prepare($sql);
 
          $params = array(':Rnaiyou' => $Rnaiyou, ':MemberID' => '1' , ':judge' => 'バグ') ;
 
          $stmt->execute($params);
           

            break; 
        case 'request': 
          $sql = "INSERT INTO Report (Rnaiyou, MemberID, judge) VALUES (:Rnaiyou, :MemberID,:judge )";
 
          $stmt = $dbh->prepare($sql);
 
          $params = array(':Rnaiyou' => $Rnaiyou, ':MemberID' => '1' , ':judge' => 'リクエスト') ;
 
          $stmt->execute($params);
            
            break; 
        }
     echo "送信完了しました";
    } else{
     echo "内容を入力してください"; 
    }
 
    

    ?>
</body>
</html>