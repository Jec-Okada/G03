<?php
require_once './AdminDAO/BasicQDAO.php';
$BasicDetail = new BasicQDAO();
$check='';
$BQID = 0;
$errs=[];

if (isset($_GET['BQID']) && is_numeric($_GET['BQID'])) {
    $BQID = (int)$_GET['BQID'];
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    if (array_key_exists('check', $_POST)) {
        $check = $_POST['check'];
    } else {
        $check = '';  // キーがない場合の処理
    }
    
   
    
    
if($check === ''){
    $errs[]='削除確認にチェックをしてください';

  }
  if($BQID === 0){
    $errs[]='質問IDがありませんでした';

  }
if(empty($errs)){
    

    
    $result1 = $BasicDetail->BasicQ_Update_YQID($BQID);
    $result2 = $BasicDetail->BasicQ_Update_NQID($BQID);
    $result3 = $BasicDetail->BasicQ_Update_RQID($BQID);

    if($result1 !== false && $result2 !== false && $result3 !== false){

        $result4 = $BasicDetail->BasicQ_Delete($BQID);
    }else{
        $errs[] = 'IDの初期化に失敗しました';
    }
   

    
     


    if($result4 !== false){
    echo '<script type="text/javascript">';
    echo 'var userResponse = confirm("削除に成功しました！！！！！！");';
    echo 'if (userResponse == true) {';
    echo 'window.location.href = "BasicQuestion.php";';
    echo '}';
    echo '</script>';
   

   

}else{
    $errs[] = '削除に失敗しました。';
}
}
}
    






    
    
$detail = $BasicDetail->BasicQ_ID_BQuestion($BQID); // 配列として取得

if (!$detail) {
    die("指定された質問が見つかりませんでした。");
}



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ベーシック質問削除</title>
    <!--管理側の報告一覧画面のサンプルです-->

    <link rel="stylesheet" href="../bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- <link href="css/BasicQuestionChange.css" rel="stylesheet">     -->
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
                            <a class="nav-link dropdown-toggle"href="adminmanage.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">管理者管理</a>
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
                            <a class="nav-link dropdown-toggle active" href="BasicQuestion.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">ベーシック質問一覧</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="BasicQuestion.php">ベーシック質問一覧</a>
                                <a class="dropdown-item" href="BasicQuestionAdd.php">質問の追加</a>  
                            </div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="CategoryQuestion.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">カテゴリ直下質問一覧</a>
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
    <form action="" method = "POST">
   
    <h1>ベーシック質問削除</h1>
    <div style="border:solid 1px; "></div>
            <div class="container">
                <div class="table-responsive text-nowrap">
                    <table border="1" class="table table-bordered">
                    <tr class="">
                        <table> <div class="container"></div>
                            <div class="table-responsive text-nowrap">
                                <table border="1" class="table table-bordered">
                                    <tr class="">
                                        <th>質問ID</th>
                                        <th>質問内容</th>
                                        <th>前の質問</th>
                                        <th>YES時の質問</th>
                                        <th>NO時の質問</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo htmlspecialchars($detail['BQID'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($detail['BQuestion'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <?php   $BasicChangeUrl = 'BasicQuestionChange.php?BQID=' . urlencode($detail['RQID']);
                                        echo "<td><a href='" . $BasicChangeUrl . "'>" . (is_null($detail['RQID']) ? "" : htmlspecialchars($detail['RQID'], ENT_QUOTES, 'UTF-8')) . "</td>\n";?>
                                <?php   $BasicChangeUrl = 'BasicQuestionChange.php?BQID=' . (is_null($detail['YQID']) ? "0" :urlencode($detail['YQID']));
                                        echo "<td><a href='" . $BasicChangeUrl . "'>" . (is_null($detail['YQID']) ? "" : htmlspecialchars($detail['YQID'], ENT_QUOTES, 'UTF-8')) . "</td>\n";?>
                                <?php   $BasicChangeUrl = 'BasicQuestionChange.php?BQID=' . (is_null($detail['NQID']) ? "0" :urlencode($detail['NQID']));
                                        echo "<td><a href='" . $BasicChangeUrl . "'>" . (is_null($detail['NQID']) ? "" : htmlspecialchars($detail['NQID'], ENT_QUOTES, 'UTF-8')) . "</td>\n";?>
                                       
                                    </tr>
                            </div>
                        </table>
                    <tr>
                </div>
            </div>
           
        </tr>
        <!-- <div class="container"> 
            <div class="table-responsive text-nowrap">
                <table border="1" class="table table-bordered">
                    <tr class="">
                        <table> <div class="container"></div>
                            <div class="table-responsive text-nowrap">
                                <table border="1" class="table table-bordered">
                                    <tr class="">
                                        <td><h2>前の質問</h2></td> 前の質問に変える
                                        <td><h2>YES時の質問</h2></td>
                                        <td><h2>NO時の質問</h2></td></div>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <label><input type="radio" id="rbtn" name="form" value="yes" checked/>YES</label>
                                                <label><input type="radio" id="rbtn" name="form" value="no" />NO</label>
                                            </div>
                                            <select name="BeforeQuestion" size="10">
                                        
                                                <option>何人ですか？</option>
                                                <option>母国愛はありますか？</option>
                                                <option>アジアの気分？</option>
                                                <option>俺のこと好き？</option>
                                                <option>麺食べたいの？</option>
                                                <option>もしかしてお腹すいてない？</option>
                                                <option>もちろん濃い味が好きだよね？</option>
                                                <option>コース料理なんて言わないよね？</option>
                                            </select>
                                        </td> 
                                    
                                    

                                
                                        <td>                               
                                            <select name="YesQuestion" size="10">
                                                
                                                <option>母国愛はありますか？</option>
                                                <option>アジアの気分？</option>
                                                <option>俺のこと好き？</option>
                                                <option>麺食べたいの？</option>
                                                <option>もしかしてお腹すいてない？</option>
                                                <option>もちろん濃い味が好きだよね？</option>
                                                <option>コース料理なんて言わないよね？</option>
                                            </select>
                                        </td> 
                                    

                                    
                                        <td>
                                            <select name="NoQuestion" size="10">
                                                
                                                <option>母国愛はありますか？</option>
                                                <option>アジアの気分？</option>
                                                <option>俺のこと好き？</option>
                                                <option>麺食べたいの？</option>
                                                <option>もしかしてお腹すいてない？</option>
                                                <option>もちろん濃い味が好きだよね？</option>
                                                <option>コース料理なんて言わないよね？</option>
                                            
                                            </select>
                                        </td> 
                                    
                                    </tr>
                                </table>
                            </div>
                        </table>
                    </tr>
                </table> -->
                <div>
                <?php foreach($errs as $e) : ?>
            <span style="color:red"><?= $e ?></span>
            <br>
    <?php endforeach; ?>
                <?php  echo " <input type='checkbox' id='check' name='check' value='ok' />削除の場合は、こちらにチェックして削除ボタンをクリック"?>
                    <div class="btn">
                    <button action="BasicQuestionChange.php" method="POST" class=delbtn>削除</button>
                    <!-- <button type="button"  name="change" id="change">変更</button> -->
                    <button onclick="location.href='BasicQuestion.php'" type="button">戻る</button></div>
                </div>
            </div>
        </div>
</form>
        
        
    
    
</body>
</html>