<?php
require_once './AdminDAO/BasicQDAO.php';
$BasicAdd = new BasicQDAO();
$errs=[];
$BQuestion = '';
$BeforeQuestion = '';
$YesQuestion ='';
$NoQuestion = '';
$YorN = '';
$YCID = 0;
$NCID = 0;

if($_SERVER['REQUEST_METHOD']==='POST'){
    $BQuestion = $_POST['BasicQuestion'];
    $BeforeQuestion = $_POST['Beforequestion_tx'];
    $YesQuestion = $_POST['Yesquestion_tx'];
    $NoQuestion = $_POST['Noquestion_tx'];
    $YorN = $_POST['YorN'];
if($BQuestion === ''){
    $errs[]='質問内容を入力してください';

  }
if(empty($errs)){
    

    if($BeforeQuestion !== ''){
            $BeforeQuestionID = intval($BasicAdd->BasicQ_ID_search($BeforeQuestion));
        }
        else{
            $BeforeQuestionID=0;
        }
    if($YesQuestion !== ''){
            $YesQuestionID = intval($BasicAdd->BasicQ_ID_search($YesQuestion));
        }else{
            $YesQuestionID=0;
        }
    if($NoQuestion !== ''){
            $NoQuestionID = intval($BasicAdd->BasicQ_ID_search($NoQuestion));
        }else{
            $NoQuestionID=0;
        }
    
    

    $result1 = $BasicAdd->BasicQ_Insert($BQuestion,$YesQuestionID,$NoQuestionID,$BeforeQuestionID);
    
    if($BeforeQuestionID !== 0){
    if($YorN ==='yes'){
        $YCID = $BeforeQuestionID;
        $result2 = $BasicAdd->BasicQ_Insert_Yes($BeforeQuestion,$YCID);

    }else{
        $NCID = $BeforeQuestionID;
        $result2 = $BasicAdd->BasicQ_Insert_No($BeforeQuestion,$NCID);

    }
    }

    
     


    if($result1 !== false && $result2 !== false){
    echo '<script type="text/javascript">';
    echo 'var userResponse = confirm("追加に成功しました！！！！！！");';
    echo 'if (userResponse == true) {';
    echo 'window.location.href = "BasicQuestionAdd.php";';
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
    <title>ベーシック質問追加</title>
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
<link href="css/AddQuestion.css" rel="stylesheet">
<h1 class="title">ベーシック質問追加</h1>
<div style="border:solid 1px; "></div>

<div class="container" id="all">
<label for="text">追加する質問を入力してください</label> 

<input type=”text” id="text" class="AddBasicQuestion" name="BasicQuestion" value="" >


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

    function Yesquestion(obj){
    var air="";
    var f=obj.form;
    var c=f.elements["Yesquestion_tx"];
    c.value=air;
    var v=obj.options[obj.selectedIndex].value;
    c=f.elements["Yesquestion_tx"];
    c.value+=v;
    }

    function Noquestion(obj){
    var air="";
    var f=obj.form;
    var c=f.elements["Noquestion_tx"];
    c.value=air;
    var v=obj.options[obj.selectedIndex].value;
    c=f.elements["Noquestion_tx"];
    c.value+=v;
    }

</script>



<table> <div class="container"></div>
        <div class="table-responsive text-nowrap">
            <table border="1" class="table table-bordered">
    
        <tr>
    
        <td><h3>前の質問</h3></td>
        <td><h3>YES時の質問</h3></td>
        <td><h3>NO時の質問</h3></td>
    
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
                    
                   
                    $results=$BasicAdd->BasicQ_select();
                   
                    echo "<td>";
                    echo "<select onchange='Yesquestion(this)' name='YesQuestion' size='10'>";
                        if (count($results) > 0) {
                            foreach ($results as $row) {
                   
                         echo "<option value=". htmlspecialchars($row['BQuestion'], ENT_QUOTES, 'UTF-8') . ">" . htmlspecialchars($row['BQuestion'], ENT_QUOTES, 'UTF-8') . "</option>\n";
                    
                            }
                     } else {
                        echo "<option>データが見つかりませんでした。</option>\n";
                        }
                    echo " </select>";
                    echo "<input type='text' name='Yesquestion_tx' value='' readonly>";
                   
                ?> 
                  </div>

                <div> 
                <?php
                    
                
                $results=$BasicAdd->BasicQ_select();
                
                echo "<td>";
                echo "<select onchange='Noquestion(this)' name='NoQuestion' size='10'>";
                    if (count($results) > 0) {
                        foreach ($results as $row) {
               
                            echo "<option value=". htmlspecialchars($row['BQuestion'], ENT_QUOTES, 'UTF-8') . ">" . htmlspecialchars($row['BQuestion'], ENT_QUOTES, 'UTF-8') . "</option>\n";
                
                        }
                 } else {
                    echo "<option>データが見つかりませんでした。</option>\n";
                    }
                echo " </select>";
                echo "<input type='text' name='Noquestion_tx' value='' readonly>";

                
                
        
            ?> 
                </tr>
            </div>
            <!-- ここまで -->
            
            </div>
            </div>
        </div>
           </table> </table>
           
           <?php foreach($errs as $e) : ?>
            <span style="color:red"><?= $e ?></span>
            <br>
    <?php endforeach; ?>
          
<div class="btn">
<!-- <button onclick="location.href='BasicQuestionAdd.php'" method="POST" class="addbtn">追加</button> -->
<button action="BasicQuestionAdd.php" method="POST" class="addbtn">追加</button>

<button onclick="location.href='BasicQuestion.php'" type="button" id="return">戻る</button></div>
                </form>

</div>
