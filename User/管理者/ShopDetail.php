<!DOCTYPE html>
<html>
<head>
    <title>店舗詳細</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/Shopadd.css">
</head>
<!-- navvar追加予定 -->

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
                            <a class="nav-link dropdown-toggle active" href="Shop.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">店舗一覧</a>
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

    <link href="css/Cbag.css" rel="stylesheet">
    <h1>店舗詳細</h1>
    <div style="border:solid 1px; "></div>
    <div class="container">
    <div class="table-responsive text-nowrap">
        <table border="0" width="60%">
    <tr>
      <td>
        <table  class="table table-bordered">
        <tr>
            <th>ID</th>
        </tr>
        <tr>
            <td class="">1</td>
          
        </tr>
       
    </table>
    </td>
    <td valign="top">
        <table  class="table table-bordered">
            
        <tr>
            <th>店舗名</th>
           
        </tr>
        <tr>
            <td class="">ガスト大久保店</td>
          
        </tr>
      
      </table>
  </td>
  <td>
    <table class="table table-bordered">
    <tr>
        <th>住所</th>
    </tr>
    <tr>
        <td class="">169-0073 東京都 新宿区 百人町 1丁目17-8 B1</td>
      
    </tr>
   
</table>
</td>
</tr>
</table>
<table>
    <tr>

       <td>
        <table border ="0"width="50%"class="table table-bordered">
            <tr>
            <th>座標</th>
            </tr>

            <tr>
            <td class="">2222222123</td>
            </tr>
       
        </table>
       </td>

       <td valign="top">
         <table class="table table-bordered">
            
          <tr>
            <th>店舗URL</th>  
          </tr>

          <tr>
            <td class="">https://drive.google.com/drive/folders/19kPD5axLyH6keC2hthNQaa0rIxVwPxuc</td>
          </tr>
      
         </table>
        </td>
    </tr>
</table>

<!-- 営業 -->
<table>
    <tr>

       <td>
        <table border ="0"width="50%"class="table table-bordered">
            <tr>
            <th>一つ目の営業時間</th>
            </tr>

            <tr>
            <td class=""> <select name="STtime1" size="1">
                <option>6:30</option>
                <option>7:00</option>
                <option>7:30</option>
                <option>8:00</option>
                <option>8:30</option>
                <option>9:00</option>
            </select>~
            <select name="CLtime1" size="1">
                <option>18:00</option>
                <option>18:30</option>
                <option>19:00</option>
                <option>19:30</option>
                <option>20:00</option>
                <option>20:30</option>
            </select></td>
            </tr>
       
        </table>
       </td>

       <td valign="top">
         <table class="table table-bordered">
            
          <tr>
            <th>二つ目の営業時間</th>  
          </tr>

          <tr>
            <td class=""> <select name="STtime2" size="1">
                <option>20:30</option>
                <option>21:00</option>
                <option>21:30</option>
                <option>22:00</option>
                <option>22:30</option>
                <option>23:00</option>
            </select>~
            <select name="CLtime2" size="1">
                <option>0:00</option>
                <option>0:30</option>
                <option>1:00</option>
                <option>1:30</option>
                <option>2:00</option>
                <option>2:30</option>
                <option>3:00</option>
                <option>3:30</option>
                <option>4:00</option>
                <option>4:30</option>
            </select></td>
          </tr>
      
         </table>
        </td>
   

       <td valign="top">
         <table class="table table-bordered">
            
          <tr>
            <th>席数</th>  
          </tr>

          <tr>
            <td class="">20</td>
          </tr>
      
         </table>
        </td>
    </tr>
</table>
   
    <!--店の特徴などを書くテキストを追加-->
    <h5>コメント(店舗の特徴)</h5>

        <textarea id="text" name="addnotice" rows="3" cols="50"></textarea>
    

<div><button  type="button" id="chenge">更新</button></div>

<div><button type="button" id="deletebtn">削除</button></div> 

    




<script>
    function buttonClick1(){
        alert('情報を更新しました');
    }
   
    let chenge = document.getElementById('chenge');
    chenge.addEventListener('click', buttonClick1);
</script>





<script>
    function buttonClick2(){
        alert('情報を削除しました');
    }
   
    let deletebtn = document.getElementById('deletebtn');
    deletebtn.addEventListener('click', buttonClick2);
</script>
</body>
</html>