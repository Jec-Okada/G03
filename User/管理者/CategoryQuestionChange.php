<!DOCTYPE html>
<html>
<head>
    <title>カテゴリ直下質問変更＆削除</title>
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


<h1 class="title">カテゴリ直下質問変更＆削除</h1>
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
                        <tr>
                            <td>1</td>
                            <td>もちろん濃い味が好きだよね？</td>
                            <td>10</td>
                            <td>21</td>
                            <td>5</td>
                        </tr>
                </div>
            </table>
        <tr>
    </div>
</div>

</tr>
<div class="container"> 
    <div class="table-responsive text-nowrap">
        <table border="1" class="table table-bordered">
            <tr class="">
                <table> <div class="container"></div>
                    <div class="table-responsive text-nowrap">
                        <table border="1" class="table table-bordered">
                            <tr class="">
                                <td><h2>前の質問</h2></td><!--前の質問に変える-->
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
        </table>
        <div>
            <input type="checkbox" id="horns" name="horns" />削除の場合は、こちらにチェックして削除ボタンをクリック
            <button type="button"  name="delete" id="delete">削除</button>
            <button type="button"  name="change" id="change">変更</button>
            <button onclick="location.href='BasicQuestion.php'" type="button">戻る</button>
        </div>
    </div>
</div>


<script>
    function butotnClick(){
        alert('変更完了しました！');
    }
    
    let button = document.getElementById('change');
    button.addEventListener('click', butotnClick); 
</script>
<script>
    function butotnClick(){
        alert('削除完了しました！');
    }
    
     button = document.getElementById('delete');
    button.addEventListener('click', butotnClick); 
</script>
</body>
</html>
