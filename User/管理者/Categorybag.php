<?php
        require_once './AdminDAO/CBagDAO.php';
        $CBagID = new CBagDAO();
        $results=$CBagID->get_CBag_NameId();
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
    <h1>カテゴリ袋一覧</h1>
    <div style="border:solid 1px; "></div>
    <div class="container">
    <div class="table-responsive text-nowrap">
    <table border="1" class="table table-bordered">
    <?php

        
    if (count($results) > 0) {
        foreach ($results as $row) {
            echo "<tr>\n";
            echo "<td>" . (is_null($row['CBagID']) ? "" : htmlspecialchars($row['CBagID'], ENT_QUOTES, 'UTF-8')) . "</td>\n";
            $shopDetailUrl = 'CategoryDetail.php?CBagID=' . urlencode($row['CBagID']); // 店舗詳細ページのURL
            echo "<td><a href='" . $shopDetailUrl . "'>" . htmlspecialchars($row['CBagName'], ENT_QUOTES, 'UTF-8') . "</a></td>\n";
            echo "</tr>\n";
        }
        } else {
            echo "<td>データが見つかりませんでした。</td>\n";
        }
        echo "</td>\n";
    ?>

<p><button onclick="location.href='ShopAdd.php'" type="button">店舗追加へ</button>
<button onclick="location.href='adminmenu.php'" type="button">戻る</button></p>
</div>    
</body>
</html>
