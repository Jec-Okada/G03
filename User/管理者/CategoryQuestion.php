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

<h1 class="title">カテゴリ直下質問管理</h1>
<div style="border:solid 1px; "></div>
<div class="container">
<div class="table-responsive text-nowrap">
<table border="1" class="table table-bordered">
    <!-- <input type=”text” id="search" placeholder="検索" >
    <button class="search" type="button">検索</button> -->
    <tr class="table-info">
        <th>質問ID</th>
        <th>質問内容</th>
        <th>Yes時の袋ID</th>
        <th>No時の袋ID</th>
        <th>前の質問ID</th>
       
    </tr>
    <?php
        require_once './AdminDAO/DAO.php';

        $dbh = DAO::get_db_connect();
        $sql = "SELECT * FROM CategoryQuestion";
        $stmt = $dbh->query($sql);
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if (count($results) > 0) {
            foreach ($results as $row) {
                echo "<tr>\n";
                echo "<td>" . (is_null($row['CQID']) ? "" : htmlspecialchars($row['CQID'], ENT_QUOTES, 'UTF-8')) . "</td>\n";
                echo "<td>" . (is_null($row['CQuestion']) ? "" : htmlspecialchars($row['CQuestion'], ENT_QUOTES, 'UTF-8')) . "</td>\n";
                echo "<td>" . (is_null($row['BQID']) ? "" : htmlspecialchars($row['BQID'], ENT_QUOTES, 'UTF-8')) . "</td>\n";
                echo "<td>" . (is_null($row['YesCBID']) ? "" : htmlspecialchars($row['YesCBID'], ENT_QUOTES, 'UTF-8')) . "</td>\n";
                echo "<td>" . (is_null($row['NoCBID']) ? "" : htmlspecialchars($row['NoCBID'], ENT_QUOTES, 'UTF-8')) . "</td>\n";
                echo "</tr>\n";
            }
        } else {
            echo "<tr><td colspan='7'>データが見つかりませんでした。</td></tr>\n";
        }
            echo "</td>\n";
            echo "</tbody>\n";
            echo "</table>\n"; // テーブル終了
        ?>

</table>    

<button onclick="location.href='CategoryQuestionAdd.php'" type="button">追加画面へ</button>
<button onclick="location.href='adminmenu.php'" type="button">戻る</button>

</div>
</div>
</body>
</html>