<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>カテゴリ直下質問管理</title>
    <!--管理側の報告一覧画面のサンプルです-->

    <link rel="stylesheet" href="../bootstrap-5.0.0-dist/css/bootstrap.min.css">
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
                        <li class="nav-item"><a href="Useradmin.html" class="nav-link ">会員管理</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"href="adminmanage.html" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">管理者管理</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="adminmanage.html">管理者管理</a>
                               <a class="dropdown-item" href="AdminRegi.html">管理者登録</a> 
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="Shop.html" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">店舗一覧</a>
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
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle active" href="CategoryQuestion.html" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">カテゴリ直下質問一覧</a>
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

<h1 class="title">カテゴリ直下質問管理</h1>
<div style="border:solid 1px; "></div>
<div class="container">
<div class="table-responsive text-nowrap">
<table border="1" class="table table-bordered">
    <input type=”text” id="search" placeholder="検索" >
    <button class="search" type="button">検索</button>
    <tr class="table-info">
        <th>質問ID</th>
        <th>質問内容</th>
        <th>Yes時の袋ID</th>
        <th>No時の袋ID</th>
        <th>前の質問ID</th>
       
    </tr>
    <tr>
        <td><a id="detail" href="CategoryQuestionChange.html">1</a></td>
        <td>もちろん濃い味が好きだよね？</td>
        <td>10</td>
        <td>21</td>
        <td>5</td>
    </tr>
    <tr >
        <td><a id="detail" href="CategoryQuestionChange.html">2</a></td>
        <td>コース料理なんて言わないよね？</td>  
        <td>12</td>
        <td>23</td>
        <td>6</td>
    </tr>

    <tr>
        <td><a id="detail" href="CategoryQuestionChange.html">3</a></td>
        <td>母国愛はありますか？</td>
        <td>9</td>
        <td>11</td>
        <td>7</td>
    </tr>
    <tr>
        <td><a id="detail" href="CategoryQuestionChange.html">4</a></td>
        <td>もしかしてお腹すいてない？</td>
        <td>15</td>
        <td>13</td>
        <td>8</td>
    </tr>

</table>    

<button onclick="location.href='CategoryQuestionAdd.html'" type="button">追加画面へ</button>
<button onclick="location.href='adminmenu.html'" type="button">戻る</button>

</div>
</div>
</body>
</html>