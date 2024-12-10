<?php

require_once '../DAO/MemberDAO.php';
$errs = [];
session_start();



if($_SERVER['REQUEST_METHOD']==='POST'){
   if(isset($_POST['change'])){
       
        $email = $_POST['email'];
        $password = $_POST['password'];

        
        if($email!==''){
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errs['email'] = 'メールアドレスの形式が正しくありません。';
            }
        }else{
            $errs['email'] = 'メールアドレスを入力してください。';
        }

      
    }
    if($password!==''){
        if(!preg_match('/\A.{6,}\z/', $password)){
            $errs['password'] = 'パスワードは6文字以上で入力してください。';
        }
        }else{
            $errs['password'] = '新規パスワードを入力してください。';
        }
    
    
    if(empty($errs)){
        $MemberDAO = new MemberDAO();
        $flag=$MemberDAO->password_change($email,$password);
            if($flag==True){
                session_regenerate_id(true);
                
            echo '<script type="text/javascript">';
            echo 'var userResponse = confirm("登録に成功しました！！！");';
           echo 'if (userResponse == true) {';
           echo 'window.location.href = "login.php";';
           echo '}';
           echo '</script>';

           
    exit;
    }
}
}


///<!-- 試していない、途中 -->
?>
<!DOCTYPE html>
<html>
<head>
    <title>パスワード変更</title>
    <meta charset="utf-8">
    <link href="css/passchange.css" rel="stylesheet" >
</head>
<body>
    <form action="passchange.php" method="POST">
    
    <h1>パスワード変更</h1>
    <div class="divider"></div>
    
    <label for="username">メールアドレス:</label>
    <div>
        <input type="text" id="email" name="email" />
    </div>
    <label for="password">新規パスワード:</label>
    <div>
        <input type="password" id="password" name="password" />
    </div>
    <?php foreach($errs as $e) : ?>
    <span style="color:red"><?= $e ?></span>
    <br>
    <?php endforeach; ?>
    <div class="button-group">
    <button action="passchange.php" method="POST" id="sainin" class="btn btn-success" name="change">登録</button>
        
    </div>
   
</body>
</html>
