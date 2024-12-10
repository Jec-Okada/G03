<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>店舗追加画面</title>
    <!--レイアウトがまだ終わっていない-->

    <link rel="stylesheet" href="bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</head>

<!-- navver追加予定 -->
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
                        <li class="nav-item"><a href="Useradmin.html" class="nav-link ">会員管理</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"href="adminmanage.html" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">管理者管理</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="adminmanage.html">管理者管理</a>
                               <a class="dropdown-item" href="AdminRegi.html">管理者登録</a> 
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="Shop.html" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">店舗一覧</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="Shop.html">店舗一覧</a>
                                <a class="dropdown-item" href="ShopAdd.html">店舗追加</a> 
                            </div>
                        </li>   
                        
                        <li class="nav-item"><a href="notice.html" class="nav-link">お知らせ一覧</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="Categorybag.html" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">カテゴリ袋一覧</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="Categorybag.html">カテゴリー袋一覧</a>
                                <a class="dropdown-item" href="CategoryBagAdd.html">カテゴリー袋追加</a> 
                            </div>
                        </li>
                        <li class="nav-item"><a href="reportadmin.html" class="nav-link">報告一覧</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="BasicQuestion.html" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">ベーシック質問一覧</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="BasicQuestion.html">ベーシック質問一覧</a>
                                <a class="dropdown-item" href="BasicQuestionAdd.html">質問の追加</a> 
                            </div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle " href="CategoryQuestion.html" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">カテゴリ直下質問一覧</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="CategoryQuestion.html">カテゴリー直下質問一覧</a>
                                <a class="dropdown-item" href="CategoryQuestionAdd.html">質問の追加</a> 
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>


<link href="css/ShopAdd.css" rel="stylesheet">
    <h1>店舗追加</h1>
    <div style="border:solid 1px; "></div>

<div class="container" id="all">

    <div class="container" id="pack">
        <div class="container" id="info1">
        <p><input type=”text” id="Shopname" placeholder="店舗名" ></p>
        <p><input type=”text” id="coordinate" placeholder="座標" ></p>
        <p><input type=”text” id="address" placeholder="住所" ></p>
        <p><input type=”text” id="ShopURL" placeholder="店舗URL" ></p>
        <p><input type=”text” id="Seats" placeholder="席数" ></p>
        </div>

        <div id="Categorylist"> 
        <h3>カテゴリ袋</h3>
        <div class="Categorylist"> 
        
        <input type="checkbox" id="checkbox1"><label for="checkbox1">aaaaaaa</label><br>
        <input type="checkbox" id="checkbox2"><label for="checkbox2">bbbbbbb</label><br>
        <input type="checkbox" id="checkbox3"><label for="checkbox3">ccccccc</label><br>
        <input type="checkbox" id="checkbox4"><label for="checkbox4">ddddddd</label><br>
        <input type="checkbox" id="checkbox5"><label for="checkbox5">eeeeeee</label><br>
        <input type="checkbox" id="checkbox6"><label for="checkbox6">fffffff</label><br>
        <input type="checkbox" id="checkbox7"><label for="checkbox8">ggggggg</label><br>
        <input type="checkbox" id="checkbox9"><label for="checkbox9">hhhhhhh</label><br>
        <input type="checkbox" id="checkbox10"><label for="checkbox10">iiiiiii</label><br>
        <input type="checkbox" id="checkbox11"><label for="checkbox11">jjjjjjj</label><br>
        <input type="checkbox" id="checkbox12"><label for="checkbox12">kkkkkkk</label><br>
        <input type="checkbox" id="checkbox13"><label for="checkbox13">lllllll</label><br>
   
        </div>
        </div>
    </div>
    
    <div>
        <h4>一つ目の営業時間</h4>
    <select name="STtime1" size="1">
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
    </select>
    </div>

    <div>
    <h4>二つ目の営業時間</h4>
    <select name="STtime2" size="1">
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
    </select>
    </div>
   <p></p>
   
    <h5>コメント(店舗の特徴)</h5>

        <textarea id="text" name="addnotice" rows="3" cols="50"></textarea>
    
        <button  type="button" id="Add">追加</button>
            <script>
                function butotnClick(){
                    alert('店舗を追加しました');
                }
               
                let button = document.getElementById('Add');
                button.addEventListener('click', butotnClick);
            </script>
    
        <button onclick="location.href='Shop.html'" type="button">戻る</button>
    
</div>
</body>
</html>
 