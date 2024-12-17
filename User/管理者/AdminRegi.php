<?php
require_once './AdminDAO/AdminDAO.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $AName = $_POST['Aname']; 
    $password = $_POST['password']; 
    $email = $_POST['email'];
    
   

    $adminDAO = new AdminDAO();

if($AName == ''){
        $errs['AName']='管理者名を入力してください。';
    }

 
    //終わったけどコミット&プッシュしてない
if($email!==''){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errs['email'] = 'メールアドレスの形式が正しくありません。';
    }else if($adminDAO->email_exists($email)){
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
    $admin = new Admin();

    $admin->AName = $AName;
    $admin->Pass = $password; 
    $admin->email = $email;
    
    $adminDAO-> insert($admin);

    echo '<script type="text/javascript">';
    echo 'var AResponse = confirm("登録に成功しました！！！！！！");';
   echo 'if (AResponse == true) {';
   echo 'window.location.href = "Adminlogin.php";';
   echo '}';
   echo '</script>';
   

    exit;
 
}}


?>
<!DOCTYPE html>
<html>
<head>
    <title>新規管理者登録画面</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <link href="css/AdminRegistartion.css" rel="stylesheet" >
    <link href="css/Bootstrap.css" rel="stylesheet" >
</head>
<body>

    <div class="navbar navbar-expand-xxl navbar-dark bg-success">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#">メニュー</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
                aria-controls="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="offcanvas offcanvas-start  text-bg-success" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="Useradmin.php" class="nav-link ">会員管理</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active"href="adminmanage.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">管理者管理</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="adminmanage.php">管理者管理</a>
                               <a class="dropdown-item" href="AdminRegi.php">管理者登録</a> 
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="Shop.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">店舗一覧</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="Shop.php">店舗一覧</a>
                                <a class="dropdown-item" href="ShopAdd.php">店舗追加</a> 
                            </div>
                        </li>   
                        
                        <li class="nav-item"><a href="notice.php" class="nav-link">お知らせ一覧</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="Categorybag.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">カテゴリ袋一覧</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="Categorybag.php">カテゴリー袋一覧</a>
                                <a class="dropdown-item" href="CategoryBagAdd.php">カテゴリー袋追加</a> 
                            </div>
                        </li>
                        <li class="nav-item"><a href="reportadmin.php" class="nav-link">報告一覧</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="BasicQuestion.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">ベーシック質問一覧</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="BasicQuestion.php">ベーシック質問一覧</a>
                                <a class="dropdown-item" href="BasicQuestionAdd.php">質問の追加</a>  
                            </div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle " href="CategoryQuestion.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">カテゴリ直下質問一覧</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="CategoryQuestion.php">カテゴリー直下質問一覧</a>
                                <a class="dropdown-item" href="CategoryQuestionAdd.php">質問の追加</a> 
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <form action="AdminRegi.php" method="POST">
    <h1>新規管理者登録</h1>
    <div class="divider"></div>
    <label for="Aname">管理者名:</label>
    <div>
        <input type="text" id="Aname" name="Aname" />
    </div>
    <label for="Aname">メールアドレス:</label>
    <div>
        <input type="text" id="email" name="email" />
    </div>
    <label for="password">パスワード:</label>
    <div>
        <input type="password" id="password" name="password" />
    </div>
    <div class="button-group"></div>
        <button action="AdminRegi.php" method="POST"  id="touroku" class="btn btn-success">登録</button>
    </div>
    
    <div class="err">
    <?php if(!empty($errs)){?>
    <?php foreach($errs as $e) : ?> <br>
    <span style="color:red"><?= $e ?></span>
    <br>
    <?php endforeach; }?>
    </div>
    <!-- Mok完成 -->