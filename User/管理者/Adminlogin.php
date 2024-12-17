<?php
    require_once './AdminDAO/AdminDAO.php';

    $AName = '';
    $errs = [];

    session_start();
// emptyに!をつけるか否かで自動遷移がオンオフされる
//終わったけどコミット&プッシュしてない
if(!empty($_SESSION['admin'])){
    header('Location: adminmenu.php');
            exit;
}

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $AName = $_POST['AName'];
        $password = $_POST['password'];

        if($AName === ''){
            $errs[] = '管理者名を入力してください。';
        }
        if($password === ''){
            $errs[] = 'パスワードを入力してください。';
        }

        if(empty($errs)){

        $adminDAO = new AdminDAO();
        $admin = $adminDAO->get_admin($AName,$password);

        if($admin !== false){
            session_regenerate_id(true);

            $_SESSION['admin'] = $admin;
            echo '<script type="text/javascript">';
            echo 'var userResponse = confirm("ログインに成功しました！！！！！！");';
            echo 'if (userResponse == true) {';
            echo 'window.location.href = "adminmenu.php";';
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
    <title>管理者ログイン</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/Bootstrap.css">
</head>
<body>
<form action="Adminlogin.php" method="POST">
    <h1>管理者ログイン</h1>
    
    <div class="divider"></div>
    <label for="AName">管理者名:</label>
    <div>
        <input type="text" id="AName" name="AName" />
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
        <button action="Adminlogin.php" method="POST" id="login" class="btn btn-success">ログイン</button>
    </div>
    <div class="divider"></div>
    
</body>
</html>
   
   