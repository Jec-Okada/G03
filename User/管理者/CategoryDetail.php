<?php
// require_once './AdminDAO/CBagDAO.php';

// if (!isset($_GET['CBagID']) || !is_numeric($_GET['CBagID'])) {
//     die("有効なカテゴリ袋が指定されていません。");
// }

// $CBagID = (int)$_GET['CBagID'];

// // CBagDAO インスタンスの作成
// $cbagDAO = new CBagDAO();
// $results = $cbagDAO->get_CBag_detail($CBagID); // 店舗データを取得
require_once './AdminDAO/CBagDAO.php';

$cnt=0;
$ShopName=[];

$CBagID = (int)$_GET['CBagID'] ?? null; // GETパラメータから取得
$CBagDAO = new CBagDAO();
$results = $CBagDAO->get_CBag_detail($CBagID) ?? []; // 初期化
foreach($results as $a)
{
    $b = (int) $a['Shop'];
    
    $c = $CBagDAO->get_Shop_name($b);
    // var_dump($c);

    array_push($ShopName,$c);
  
    
    
} 
// $ShopName = $CBagDAO->get_Shop_Name($ShopID) ?? []; // 初期化
?>
<!DOCTYPE html>
<html>
<head>
    <title>カテゴリ袋一覧</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
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
                            <a class="nav-link dropdown-toggle" href="Shop.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">店舗一覧</a>
                            <div class="dropdown-menu" aria-labelledby="navberDropdownMenuLink">
                                <a class="dropdown-item" href="Shop.php">店舗一覧</a>
                                <a class="dropdown-item" href="ShopAdd.php">店舗追加</a> 
                            </div>
                        </li>   
                        
                        <li class="nav-item"><a href="notice.php" class="nav-link">お知らせ一覧</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="Categorybag.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">カテゴリ袋一覧</a>
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
    <div class="container">
        <h1>カテゴリ袋詳細</h1>
       
        <div style="border:solid 1px; margin-bottom: 20px;"></div>
        
        <!-- カテゴリ袋の詳細情報 -->
        <h3>カテゴリ袋 ID: <?php echo htmlspecialchars($CBagID, ENT_QUOTES, 'UTF-8'); ?></h3>
        
        <div class="table-responsive text-nowrap">
            <table border="1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>店舗ID</th>
                        <th>店舗名</th>
                    </tr>
                  
            <?php foreach ($results as $row):?>
                 <tr>  
                    <td><?= htmlspecialchars($row['Shop'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                 
                    <td><?= htmlspecialchars($ShopName[$cnt]['ShopName'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                    
                </tr>
                <?php $cnt+=1 ?>
            <?php endforeach; ?>
        
    </table>
</body>
</html>