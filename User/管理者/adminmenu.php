<?php
require_once './AdminDAO/AdminDAO.php';
if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
if(!empty($_SESSION['admin'])) { 
         $admin = $_SESSION['admin']; 
       } ?>

<!DOCTYPE html>
<html>
<head>
    <title>管理メニュー</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
    <link href="css/adminmenu.css" rel="stylesheet" >
</head>
<body>
    <!--管理者の画面遷移メニューです、遷移先のphpがまだほとんど未完成-->
    <!-- 終わったけどコミット&プッシュしてない -->

    <h1>管理メニュー</h1>
     <?php if(isset($admin)) : ?>
            <?=$admin->AName ?>さん
            
            <a href="logout.php">ログアウト</a>
            <?php else: ?>

                <?php  endif;?>
    <div style="border:solid 1px; "></div>

    <div class="form-horizontal" >
        <div id="a">
            <input type="button" name="management" class="btn btn-primary" onclick="location.href='Useradmin.php'" value="会員管理" />
            <input type="button" name="login" class="btn btn-primary"  onclick="location.href='adminmanage.php'"value="管理者管理" />
            <input type="button" name="login" class="btn btn-primary" onclick="location.href='Shop.php'"value="店舗一覧" />
        </div>
        <div id="b">
            <input type="button" name="login" class="btn btn-primary" onclick="location.href='notice.php'"value="お知らせ一覧" />
            <input type="button" name="login" class="btn btn-primary" onclick="location.href='Categorybag.php'"value="カテゴリ袋一覧" />
            <input type="button" name="login" class="btn btn-primary" onclick="location.href='reportadmin.php'"value="報告一覧" />
        </div>
        <div id="c">
            <input type="button" name="login" class="btn btn-primary" onclick="location.href='BasicQuestion.php' "value="ベーシック質問一覧" />
            <input type="button" name="login" class="btn btn-primary" onclick="location.href='CategoryQuestion.php' "value="カテゴリ直下質問一覧 " />
        </div> 
        
    </div>
    

       
</body>
</html>
