<?php
require_once '../DAO/MemberDAO.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $UserID = $_POST['username']; 
    $password = $_POST['password']; 
    $email = $_POST['email'];
    
   

    $memberDAO = new MemberDAO();

if($UserID == ''){
        $errs['UserID']='ユーザー名を入力してください。';
    }

 
    
if($email!==''){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errs['email'] = 'メールアドレスの形式が正しくありません。';
    }else if($memberDAO->email_exists($email)){
        $errs['email'] = 'このメールアドレスは既に登録されています';
    }
}else{
    $errs['email'] = 'メールアドレスを入力してください。';
}
   if($password!==''){
    if(!preg_match('/\A.{6,}\z/', $password)){
        $errs['password'] = 'パスワードは6文字以上で入力してください。';
    }
    }else{
        $errs['password'] = 'パスワードを入力してください。';
    }

   
    if(empty($errs)){
    $member = new Members();

    $member->UserID = $UserID;
    $member->Pass = $password; 
    $member->email = $email;
    
    $memberDAO-> insert($member);

    echo '<script type="text/javascript">';
    echo 'var userResponse = confirm("登録に成功しました！！！！！！");';
   echo 'if (userResponse == true) {';
   echo 'window.location.href = "login.php";';
   echo '}';
   echo '</script>';
   

    exit;
 
}}


?>
<!-- 試していない、途中 -->
<!DOCTYPE html>
<html>
<head>
    <title>会員登録</title>
    <meta charset="utf-8">
</head>
<body>
<form action="usertouroku.php" method="POST">
    <header>
        <link href="css/usertouroku.css" rel="stylesheet" >
    </header>

    <h1>新規会員登録</h1>
    <div class="divider"></div>
    <label for="username">ユーザー名:</label>
    <div>
        <input type="text" id="username" name="username" />
    </div>
    <label for="username">メールアドレス:</label>
    <div>
        <input type="text" id="email" name="email" />
    </div>
    <label for="password">パスワード:</label>
    <div>
        <input type="password" id="password" name="password" />
    </div>
    <?php foreach($errs as $e) : ?>
    <span style="color:red"><?= $e ?></span>
    <br>
    <?php endforeach; ?>
    <div class="button-group"></div>
    <button action="passchange.php" method="POST" id="sainin" class="btn btn-success" name="touroku">登録</button>
        
    </div>
    
</body>
</html>