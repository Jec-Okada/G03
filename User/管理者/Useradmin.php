<?php
require_once './AdminDAO/UseradminDAO.php';

// DAOクラスのインスタンスを初期化
$goodsDAO = new UseradminDAO();

// 検索結果リストを初期化
$search_results = [""];
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $a = $_POST['search'];
    // var_dump($goodsDAO->get_goods_by_keyword($a));
    $search_results=$goodsDAO->get_goods_by_keyword($a);
    // echo $a;
} elseif (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    // キーワードで検索
    $keyword = htmlspecialchars($_GET['keyword'], ENT_QUOTES, 'UTF-8');
    $search_results = $goodsDAO->get_goods_by_keyword($keyword);
} else {
    // 検索条件がない場合、全ての会員を表示
    $search_results = $goodsDAO->get_all_members();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>会員管理</title>
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
                        <li class="nav-item"><a href="Useradmin.php" class="nav-link active">会員管理</a></li>
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
    
        
 <?php
        require_once './AdminDAO/DAO.php';           
?>
    <h1 class="title">会員管理画面</h1>
    <div style="border:solid 1px; "></div>
    <div class="container">
    <div class="table-responsive text-nowrap">
    <table border="1" class="table table-bordered table-hover">
        <form action="Useradmin.php" method="POST">
        <input type=”text” id="search" name="search" placeholder="検索" >
        <button class="search" type="submit" action="location.href='Useradmin.php'" method="POST">検索</button>
        <!-- <?php  echo $search_results[0]->UserID; ?>
        <?php  echo $search_results[1]->UserID; ?> -->
</form>
    <?php
        $dbh = DAO::get_db_connect();
        $sql = "SELECT MemberID,UserID,email FROM Members";
        $stmt = $dbh->query($sql);
        
        //$search_results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<tr>\n";
        echo "<td>会員ID</td>\n";
        echo "<td>ユーザー名</td>\n";
        echo "<td>メールアドレス</td>\n";
        echo "<tr>\n";
    ?>
    <?php
        if (count($search_results) > 0) {
            foreach ($search_results as $row) {
                echo "<tr>\n";
                echo "<td>" . htmlspecialchars($row->MemberID, ENT_QUOTES, 'UTF-8') . "</td>\n";
                echo "<td>" . htmlspecialchars($row->UserID, ENT_QUOTES, 'UTF-8') . "</td>\n";
                echo "<td>" . htmlspecialchars($row->email, ENT_QUOTES, 'UTF-8') . "</td>\n";
                echo "</tr>\n";
            }
        } else {
            echo "<td>データが見つかりませんでした。</td>\n";
        }
        echo "</td>\n";
    ?>
</div>
</div>
</body>
</html>
