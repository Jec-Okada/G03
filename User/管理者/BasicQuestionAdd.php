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

<link href="css/AddQuestion.css" rel="stylesheet">
<h1 class="title">ベーシック質問追加</h1>
<div style="border:solid 1px; "></div>

<div class="container" id="all">
<label for="text">追加する質問を入力してください</label> 
<input type=”text” id="text" class="AddBasicQuestion" >


<table> <div class="container"></div>
        <div class="table-responsive text-nowrap">
            <table border="1" class="table table-bordered">
    
        <tr>
    
        <td><h3>前の質問</h3></td>
        <td><h3>YES時の質問</h3></td>
        <td><h3>NO時の質問</h3></td>
    
    </tr>
   
                <tr>
                    <th>前の質問</th>
                    <th>YES時の質問</th>
                    <th>NO時の質問</th>
                </tr>
              
                <!-- ココカラファイン -->
                <div> 
                    <tr>
                        <td> 
                        <div class="rbtn">
                                 <label><input type="radio" id="rbtn" name="Yes" value="yes" checked/>YES</label>
                                <label><input type="radio" id="rbtn" name="No" value="no" />NO</label>
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
                  </div>

                  <div> 
               <td>                               
                    <select name="YesQuestion" size="10">
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
                  </div>

                <div> 
                <td>
                    <select name="NoQuestion" size="10">
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
                </tr>
            </div>
            <!-- ここまで -->
            
            </div>
            </div>
        </div>
           </table> </table>
          
<div class="btn">
<button type="button" id="addbtn">追加</button>
<button onclick="location.href='BasicQuestion.php'" type="button" id="return">戻る</button>
</div></div>
<script>
    function butotnClick(){
        alert('追加完了しました！');
    }
    let button = document.getElementById('addbtn');
    button.addEventListener('click', butotnClick);
</script>