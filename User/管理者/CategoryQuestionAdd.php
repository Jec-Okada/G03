<?php
///選択の後半２つがまだ。
// 追加機能もまだ。
require_once './AdminDAO/CategoryQDAO.php';
require_once './AdminDAO/BasicQDAO.php';
$BasicAdd = new BasicQDAO();
$CategoryAdd = new CategoryQDAO();
$errs=[];
$CQuestion = '';
$BeforeQuestion = '';
$YesBag ='';
$NoBag = '';
$YorN = '';
$YCID = 0;
$NCID = 0;

if($_SERVER['REQUEST_METHOD']==='POST'){
    $CQuestion = $_POST['CategoryQuestion'];
    $BeforeQuestion = $_POST['Beforequestion_tx'];
    $YesBag = $_POST['Yesbag_tx'];
    $NoBag = $_POST['Nobag_tx'];
    $YorN = $_POST['YorN'];
if($BeforeQuestion === ''){
    $errs[]='質問内容を入力してください';

  }
if(empty($errs)){
    

    if($BeforeQuestion !== ''){
            $BeforeQuestionID = intval($BasicAdd->BasicQ_ID_search($BeforeQuestion));
        }
        else{
            $BeforeQuestionID=0;
        }
    if($YesBag !== ''){
            $YesBagID = intval($CategoryAdd->CBag_ID_search($YesBag));
        }else{
            $YesBagID=0;
        }
    if($NoBag !== ''){
            $NoBagID = intval($CategoryAdd->CBag_ID_search($NoBag));
        }else{
            $NoBagID=0;
        }
    
    $CategoryAdd->CategoryQ_BQtable_Insert($CQuestion,$BeforeQuestionID,$YesBagID,$NoBagID);
    $CategoryAdd->CategoryQ_InsertCQ($CQuestion,$BeforeQuestionID,$YesBagID,$NoBagID);
    
    $result1 = true;
    
    $BCQuestionID = intval($BasicAdd->BasicQ_ID_search($CQuestion));//ベーシック質問テーブルに追加したカテゴリ質問のID取得
    // $CQuestionID = $CategoryAdd->CategoryQ_ID_search($CQuestion);
    
    if($BCQuestionID !== 0){
    
        if($YorN ==='yes'){
            $YCID = $BCQuestionID;
            $result2 = $CategoryAdd->BasicQ_Update_Yes($BeforeQuestion,$YCID);

        }else{
            $NCID = $BCQuestionID;
            $result2 = $CategoryAdd->BasicQ_Update_No($BeforeQuestion,$NCID);

        }

    }else{
        $result2=true;
    }

    

    // if($CQuestionID !== 0){
    
    //     $res1=$CategoryAdd->YesCBag_in_CQID($CQuestionID,$ÝesBagID);
    //     $res2=$CategoryAdd->NoCBag_in_CQID($CQuestionID,$NoBagID);

    //    if($res1 !== false && $res2 !== false){
    //     $result3=true;
    //    }else{
    //     $result3=false;
    //    }
       
    // }else{
    //     $result3=true;
    // }


    if($result1 !== false && $result2 !== false){
    echo '<script type="text/javascript">';
    echo 'var userResponse = confirm("追加に成功しました！！！！！！");';
    echo 'if (userResponse == true) {';
    echo 'window.location.href = "CategoryQuestionAdd.php";';
    echo '}';
    echo '</script>';
   

   

}else{
    $errs[] = '追加に失敗しました。';
}
}
}
    




?>
<!DOCTYPE html>
<html>
<head>
    <title>カテゴリ直下質問追加</title>
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
                            <a class="nav-link dropdown-toggle "href="adminmanage.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">管理者管理</a>
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
    <link href="css/AddQuestion.css" rel="stylesheet">
<h1 class="title">カテゴリ直下質問追加</h1>
<div style="border:solid 1px; "></div>

<div class="container">
<label for="text">追加する質問を入力してください</label> 
<input type=”text” id="text" class="AddCategoryQuestion" name="CategoryQuestion" >

<script>
function Beforequestion(obj){
    var air="";
    var f=obj.form;
    var c=f.elements["Beforequestion_tx"];
    c.value=air;
    var v=obj.options[obj.selectedIndex].value;
    c=f.elements["Beforequestion_tx"];
    c.value+=v;
}
</script>
<script>
function Yesbag(obj){
var air="";
var f=obj.form;
var c=f.elements["Yesbag_tx"];
c.value=air;
var v=obj.options[obj.selectedIndex].value;
c=f.elements["Yesbag_tx"];
c.value+=v;
}
</script>
<script>
function Nobag(obj){
var air="";
var f=obj.form;
var c=f.elements["Nobag_tx"];
c.value=air;
var v=obj.options[obj.selectedIndex].value;
c=f.elements["Nobag_tx"];
c.value+=v;
}


</script>


<table> <div class="container"></div>
        <div class="table-responsive text-nowrap">
            <table border="1" class="table table-bordered">
    
    <tr>
    
        <td><h3>前の質問</h3></td>
        <td><h3>YES時の袋</h3></td>
        <td><h3>NO時の袋</h3></td>
    
    </tr>
   
                
                <!-- ココカラファイン -->
                <div> 
            <tr>
            <?php
                    
                
                    $results=$BasicAdd->BasicQ_select();
                
                    echo "<td>";
                    echo "<select onchange='Beforequestion(this)' name='BeforeQuestion' size='10'>";
                        if (count($results) > 0) {
                            foreach ($results as $row) {
    
                      
                                echo "<option value=". htmlspecialchars($row['BQuestion'], ENT_QUOTES, 'UTF-8') . ">" . htmlspecialchars($row['BQuestion'], ENT_QUOTES, 'UTF-8') . "</option>\n";
                       
                       
                            }
                     } else {
                        echo "<option>データが見つかりませんでした。</option>\n";
                        }
                    echo " </select>";
                    echo "<br>";
                    echo "<input type='text' name='Beforequestion_tx' value='' readonly>";
    
                    echo "
                    <div class='rbtn'>
                    <label><input type='radio' id='rbtn' name='YorN' value='yes' />YES</label>
                    <label><input type='radio' id='rbtn' name='YorN' value='no' />NO</label>
                    </div>";
                    
                    echo "</td>";
            
                ?> 
                        
            
                      </div>
    
                      <div> 
                       
                      <?php
                        
                       
                        $results=$CategoryAdd->get_CBag_Name();
                   
                        echo "<td>";
                        echo "<select onchange='Yesbag(this)' name='YesBag' size='10'>";
                            if (count($results) > 0) {
                                foreach ($results as $row) {
                       
                             echo "<option value=". htmlspecialchars($row['CBagName'], ENT_QUOTES, 'UTF-8') . ">" . htmlspecialchars($row['CBagName'], ENT_QUOTES, 'UTF-8') . "</option>\n";
                        
                                }
                         } else {
                            echo "<option>データが見つかりませんでした。</option>\n";
                            }
                        echo " </select>";
                        echo "<br>";
                        echo "<input type='text' name='Yesbag_tx' value='' readonly>";
                       
                    ?> 
                      </div>
    
                    <div> 
                    <?php
                        
                    
                    $results=$CategoryAdd->get_CBag_Name();
                    
                    echo "<td>";
                    echo "<select onchange='Nobag(this)' name='NoBag' size='10'>";
                        if (count($results) > 0) {
                            foreach ($results as $row) {
                   
                                echo "<option value=". htmlspecialchars($row['CBagName'], ENT_QUOTES, 'UTF-8') . ">" . htmlspecialchars($row['CBagName'], ENT_QUOTES, 'UTF-8') . "</option>\n";
                    
                            }
                     } else {
                        echo "<option>データが見つかりませんでした。</option>\n";
                        }
                    echo " </select>";
                    echo "<br>";
                    echo "<input type='text' name='Nobag_tx' value='' readonly>";
    
                    
                    
            
                ?> 
             </tr>
            
            <!-- ここまで -->
            
                  
                    
        </div>
    
    </table>
    <?php foreach($errs as $e) : ?>
            <span style="color:red"><?= $e ?></span>
            <br>
    <?php endforeach; ?>
          
<div class="btn">
<button action="CategoryQuestionAdd.php" method="POST" class="addbtn">追加</button>
<button onclick="location.href='CategoryQuestion.php'" type="button" id="return">戻る</button>
</div>
</div>
 </table> 

</body>