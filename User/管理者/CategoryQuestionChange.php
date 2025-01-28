<?php
require_once './AdminDAO/CategoryQDAO.php';
$errs=[];


$CategoryDetail = new CategoryQDAO();
if (isset($_GET['CQID']) && is_numeric($_GET['CQID'])) {
    $CQID = (int)$_GET['CQID'];
    
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
  if($CQID === 0){
    $errs[]='質問IDがありませんでした';

  }
  

  if(empty($errs)){
    $CQuestion = $CategoryDetail->CategoryQ_CQuestion_search($CQID);
    $BQID = $CategoryDetail->BasicQ_BQuestion_search($CQuestion['CQuestion']);

    
    $result1 = $CategoryDetail->BasicQ_Update_YQID($BQID);
    $result2 = $CategoryDetail->BasicQ_Update_NQID($BQID);
    $result3 = $CategoryDetail->BasicQ_Update_RQID($BQID);



    if($result1 !== false && $result2 !== false && $result3 !== false){

        $result4 = $CategoryDetail->BasicQ_Delete_BQID($BQID);
        $result5 = $CategoryDetail->CategoryQ_Delete_CQID($CQID);

    }else{
        $errs[] = 'IDの初期化に失敗しました';
    }
   

    
     


    if($result4 !== false && $result5 !== false){
    echo '<script type="text/javascript">';
    echo 'var userResponse = confirm("削除に成功しました！！！！！！");';
    echo 'if (userResponse == true) {';
    echo 'window.location.href = "CategoryQuestion.php";';
    echo '}';
    echo '</script>';
   

   

}else{
    $errs[] = '削除に失敗しました。';
}
}
}

$detail = $CategoryDetail->CategoryQ_ID_CQuestion($CQID); // 配列として取得


if(!empty($detail['YesCBID'])){
    $YCBagID=(int)$detail['YesCBID'];
   $YCBagName= $CategoryDetail->CategoryQ_YCID_search($YCBagID);
}else{
    $YCBagName='カテゴリ袋がついていません';
}
if(!empty($detail['NoCBID'])){
    $NCBagID=(int)$detail['NoCBID'];
   $NCBagName= $CategoryDetail->CategoryQ_NCID_search($NCBagID);
   
}else{
    $NCBagName='カテゴリ袋がついていません';
}
 

?>
<!DOCTYPE html>
<html>
<head>
    <title>カテゴリ直下質問削除</title>
    <meta charset="utf-8">

<link rel="stylesheet" href="bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    
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
                            <a class="nav-link dropdown-toggle" href="BasicQuestion.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">ベーシック質問一覧</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="BasicQuestion.php">ベーシック質問一覧</a>
                                <a class="dropdown-item" href="BasicQuestionAdd.php">質問の追加</a>  
                            </div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle active" href="CategoryQuestion.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">カテゴリ直下質問一覧</a>
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

<h1 class="title">カテゴリ直下質問削除</h1>
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
                            <th>YES時の袋</th>
                            <th>NO時の袋</th>
                        </tr>
                        <?php
        require_once './AdminDAO/DAO.php';

        
    
        
                echo "<tr>\n";
                echo "<td>" . (is_null($detail['CQID']) ? "" : htmlspecialchars($detail['CQID'], ENT_QUOTES, 'UTF-8')) . "</td>\n";
                echo "<td>" . (is_null($detail['CQuestion']) ? "" : htmlspecialchars($detail['CQuestion'], ENT_QUOTES, 'UTF-8')) . "</td>\n";
                $BasicChangeUrl = 'BasicQuestionChange.php?BQID=' . urlencode($detail['BQID']);
                echo "<td><a href='" . $BasicChangeUrl . "'>" . (is_null($detail['BQID']) ? "" : htmlspecialchars($detail['BQID'], ENT_QUOTES, 'UTF-8')) . "</td>\n";
                // $CategoryDetailUrl = 'CategoryDetail.php?CBagID=' . urlencode($detail['YesCBID']);
                echo "<td>" . (is_null($YCBagName[0]['CBagName']) ? "" : $YCBagName[0]['CBagName']) . "</td>\n";
                // $CategoryDetailUrl = 'CategoryDetail.php?CBagID=' . urlencode($detail['NoCBID']);
                echo "<td>" . (is_null($NCBagName[0]['CBagName']) ? "" :$NCBagName[0]['CBagName']) . "</td>\n";

                
                echo "</tr>\n";
            
        ?>
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
                                <td><h2>YES時の袋</h2></td>
                                <td><h2>NO時の袋</h2></td></div>
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
                                        <option>ラーメン</option>
                                        <option>ファミレス</option>
                                        <option>中華</option>
                                        <option>カフェ</option>
                                        <option>和食</option>
                                        <option>イタリアン</option>
                                        <option>寿司</option>
                                        <option>焼肉</option>
                                        <option>バーガー</option>
                                
                                    </select>
                                </td> 
                            

                            
                                <td>
                                    <select name="NoQuestion" size="10">
                                        <option>ラーメン</option>
                                        <option>ファミレス</option>
                                        <option>中華</option>
                                        <option>カフェ</option>
                                        <option>和食</option>
                                        <option>イタリアン</option>
                                        <option>寿司</option>
                                        <option>焼肉</option>
                                        <option>バーガー</option>
                                    
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
                    <button action="CategoryQuestionChange.php" method="POST" class=delbtn>削除</button>
            
            <!-- <button type="button"  name="change" id="change">変更</button> -->
            <button onclick="location.href='CategoryQuestion.php'" type="button">戻る</button>
        </div>
    </div>
</div>

</form>

</body>
</html>
