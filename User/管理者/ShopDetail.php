<!-- 
// 必要なDAOファイルをインクルード
require_once './AdminDAO/ShopDAO.php';

// クエリパラメータからShopIDを取得
if (!isset($_GET['ShopID']) || empty($_GET['ShopID'])) {
    echo "店舗IDが指定されていません。";
    exit;
}

$shopID = $_GET['ShopID'];
$ShopDAO = new ShopDAO();

// 店舗詳細を取得
$detail = $ShopDAO->get_Shop_detail($shopID);

// データが見つからなかった場合の処理
if (!$detail) {
    echo "指定された店舗IDの情報が見つかりません。";
    exit;
} -->

<?php
require_once './AdminDAO/ShopDAO.php';

if (isset($_GET['ShopID']) && is_numeric($_GET['ShopID'])) {
    $shopID = (int)$_GET['ShopID'];
}
    $Shop = new ShopDAO();
    // $details = $Shop->get_Shop_detail($shopID);

//     if (count($details) === 0) {
//         die("指定された店舗は見つかりませんでした。");
//     } else {
//         $detail = $details[0]; // 単一店舗
//     }
// } else {
//     die("無効な店舗IDです。");
// }
$detail = $Shop->get_Shop_detail($shopID); // 配列として取得

if (!$detail) {
    die("指定された店舗が見つかりませんでした。");
}
?>


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

<body>
    <div class="navbar navbar-expand-xxl navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">メニュー</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- オフキャンバスメニュー -->
            <div class="offcanvas offcanvas-start text-bg-success" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="Useradmin.php" class="nav-link">会員管理</a></li>
                        <!-- 他のナビゲーションメニュー -->
                        <li class="nav-item"><a href="Shop.php" class="nav-link">店舗一覧</a></li>
                        <li class="nav-item"><a href="ShopAdd.php" class="nav-link">店舗追加</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <h1>店舗詳細</h1>
    <div style="border:solid 1px; "></div>
    <div class="container">
    <div class="table-responsive text-nowrap">
        <table border="0" width="60%">
                <tr>
                    <td>
                        <table class="table table-bordered">
                            <tr><th>ID</th></tr>
                            <tr>
                                <td><?php echo htmlspecialchars($detail['ShopID'], ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                        </table>
                    </td>
                    <td valign="top">
                        <table class="table table-bordered">
                            <tr><th>店舗名</th></tr>
                            <tr>
                                <td><?php echo htmlspecialchars($detail['ShopName'], ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table class="table table-bordered">
                            <tr><th>住所</th></tr>
                            <tr>
                                <td><?php echo htmlspecialchars($detail['ShopAddress'], ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <table border="0" width="50%" class="table table-bordered">
                            <tr><th>座標</th></tr>
                            <tr>
                                <td><?php echo htmlspecialchars($detail['ShopChar'], ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                        </table>
                    </td>
                    <td valign="top">
                        <table class="table table-bordered">
                            <tr><th>店舗URL</th></tr>
                            <tr>
                                <td>
                                    <a href="<?php echo htmlspecialchars($detail['ShopURL'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank">
                                        <?php echo htmlspecialchars($detail['ShopURL'], ENT_QUOTES, 'UTF-8'); ?>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <table class="table table-bordered">
                            <tr><th>席数</th></tr>
                            <tr>
                                <td><?php echo htmlspecialchars($detail['TOSeats'], ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>