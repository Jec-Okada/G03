<?php
    require_once '../AdminDAO/AdminDAO.php';

    $username = '';
    $errs = [];

    session_start();
// emptyに!をつけるか否かで自動遷移がオンオフされる
if(!empty($_SESSION[''])){
    header('Location: adminmenu.php');
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

        $adminDAO = new adminDAO();
        $admin = $adminDAO->get_admin($username,$password);

        if($admin !== false){
            session_regenerate_id(true);

            $_SESSION['admin'] = $admin;
            echo '<script type="text/javascript">';
            echo 'var userResponse = confirm("サインインに成功しました！！！！！！");';
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
    <h1>管理者ログイン</h1>
    
    <div class="divider"></div>
    <label for="username">管理者名:</label>
    <div>
        <input type="text" id="username" name="username" />
    </div>
    <label for="password">パスワード:</label>
    <div>
        <input type="password" id="password" name="password" />
    </div>
    <div class="button-group"></div>
        <button id="login" class="btn btn-success">ログイン</button>
    </div>
    <div class="divider"></div>
    <script>
        function butotnClick(){
            alert('ログイン完了しました！');
            window.location.href = 'adminmenu.php';
        }
        
        let button = document.getElementById('login');
        button.addEventListener('click', butotnClick);
    </script>
</body>
</html>
   
   