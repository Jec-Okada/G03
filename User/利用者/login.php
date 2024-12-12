<?php
    require_once './UserDAO/MemberDAO.php';

    $username = '';
    $errs = [];

    session_start();
// emptyに!をつけるか否かで自動遷移がオンオフされる
if(!empty($_SESSION['member'])){
    header('Location: mainmenu.php');
            exit;
}

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username === ''){
            $errs[] = 'ユーザー名を入力してください。';
        }
        if($password === ''){
            $errs[] = 'パスワードを入力してください。';
        }

        if(empty($errs)){

        $memberDAO = new MemberDAO();
        $member = $memberDAO->get_member($username,$password);

        if($member !== false){
            session_regenerate_id(true);

            $_SESSION['member'] = $member;
            echo '<script type="text/javascript">';
            echo 'var userResponse = confirm("サインインに成功しました！！！！！！");';
            echo 'if (userResponse == true) {';
            echo 'window.location.href = "mainmenu.php";';
            echo '}';
            echo '</script>';
           
           
           
        }
        else{
            $errs[] = 'ユーザー名またはパスワードに誤りがあります。';
        }

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>会員ログイン</title>
    <meta charset="utf-8">
    <!-- CSSファイルのリンク -->
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <form action="login.php" method="POST">

    <h1>会員ログイン</h1>
    <div class="divider"></div>
    
    <label for="username">ユーザー名:</label>
    <div>
        <input type="text" id="username" name="username" />
    </div>
    <label for="password">パスワード:</label>
    <div>
        <input type="password" id="password" name="password" />
    </div>
    <?php foreach($errs as $e) : ?>
    <span style="color:red"><?= $e ?></span>
    <br>
    <?php endforeach; ?>
    <div class="button-group">
       
        <button action="login.php" method="POST" id="sainin" class="btn btn-success">サインイン</button>
        <a href="passchange.php" class="url">パスワードをお忘れですか？</a>
    </div>
    <div class="divider"></div>
    
    <p>新規会員の方はこちら</p>
    <div>
        <input type="button" onclick="location.href='usertouroku.php'" class="btn btn-primary" value="会員登録">
      
    </div>
    
    
</body>
    
    </html>