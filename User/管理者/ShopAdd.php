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
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle " href="CategoryQuestion.php" id="navberDropdownMenuLink"role="button" data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">カテゴリ直下質問一覧</a>
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


<link href="css/ShopAdd.css" rel="stylesheet">
    <h1>店舗追加</h1>
    <div style="border:solid 1px; "></div>

    <div class="container">
        <h1>店舗追加</h1>
        <form method="POST" action="">
            <!-- 店舗情報 -->
            <div class="mb-3">
                <label for="Shopname">店舗名</label>
                <input type="text" name="Shopname" id="Shopname" class="form-control" placeholder="店舗名" required>
            </div>
            <div class="mb-3">
                <label for="coordinate">座標</label>
                <input type="text" name="coordinate" id="coordinate" class="form-control" placeholder="例: 35.6895, 139.6917" required>
            </div>
            <div class="mb-3">
                <label for="address">住所</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="住所を入力" required>
            </div>
            <div class="mb-3">
                <label for="ShopURL">店舗URL</label>
                <input type="url" name="ShopURL" id="ShopURL" class="form-control" placeholder="例: https://example.com" required>
            </div>
            <div class="mb-3">
                <label for="Seats">座席数</label>
                <input type="number" name="Seats" id="Seats" class="form-control" placeholder="座席数を入力" required>
            </div>

            <!-- 営業時間 -->
            <div class="mb-3">
                <h4>一つ目の営業時間</h4>
                <label for="STtime1">開始時間</label>
                <select name="STtime1" id="STtime1" class="form-select" required>
                    <option value="" selected>選択してください</option>
                    <option value="08:00">8:00</option>
                    <option value="09:00">9:00</option>
                    <option value="10:00">10:00</option>
                </select>
                ~
                <label for="CLtime1">終了時間</label>
                <select name="CLtime1" id="CLtime1" class="form-select" required>
                    <option value="" selected>選択してください</option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                </select>
            </div>

            <div class="mb-3">
                <h4>二つ目の営業時間</h4>
                <label for="STtime2">開始時間</label>
                <select name="STtime2" id="STtime2" class="form-select">
                    <option value="" selected>選択してください</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                </select>
                ~
                <label for="CLtime2">終了時間</label>
                <select name="CLtime2" id="CLtime2" class="form-select">
                    <option value="" selected>選択してください</option>
                    <option value="18:00">18:00</option>
                    <option value="19:00">19:00</option>
                    <option value="20:00">20:00</option>
                </select>
            </div>

            <!-- カテゴリー -->
            <div class="mb-3">
                <h4>カテゴリ袋</h4>
                <div>
                    <input type="checkbox" name="categories[]" value="aaaaaaa" id="checkbox1">
                    <label for="checkbox1">aaaaaaa</label><br>

                    <input type="checkbox" name="categories[]" value="bbbbbbb" id="checkbox2">
                    <label for="checkbox2">bbbbbbb</label><br>

                    <input type="checkbox" name="categories[]" value="ccccccc" id="checkbox3">
                    <label for="checkbox3">ccccccc</label><br>
                </div>
            </div>

            <!-- コメント -->
            <div class="mb-3">
                <h5>コメント(店舗の特徴)</h5>
                <textarea name="addnotice" rows="3" cols="50" class="form-control" placeholder="店舗の特徴を入力"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">送信</button>
        </form>
    </div>
<?php
require_once './AdminDAO/ShopDAO.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. フォームデータの取得
    $Shopname = $_POST['Shopname'] ?? ''; // 店舗名
    $coordinate = $_POST['coordinate'] ?? ''; // 座標
    $address = $_POST['address'] ?? ''; // 住所
    $ShopURL = $_POST['ShopURL'] ?? ''; // 店舗URL
    $Seats = $_POST['Seats'] ?? ''; // 座席数
    $STtime1 = $_POST['STtime1'] ?? ''; // 一つ目の開始時間
    $CLtime1 = $_POST['CLtime1'] ?? ''; // 一つ目の終了時間
    $STtime2 = $_POST['STtime2'] ?? ''; // 二つ目の開始時間
    $CLtime2 = $_POST['CLtime2'] ?? ''; // 二つ目の終了時間
    $categories = $_POST['categories'] ?? []; // カテゴリ（複数）
    $addnotice = $_POST['addnotice'] ?? ''; // コメント

    // 2. バリデーション
    $errors = [];
    if (empty($Shopname)) $errors[] = "店舗名を入力してください。";
    if (empty($coordinate)) $errors[] = "座標を入力してください。";
    if (empty($address)) $errors[] = "住所を入力してください。";
    if (empty($ShopURL)) $errors[] = "店舗URLを入力してください。";
    if (empty($Seats)) $errors[] = "座席数を入力してください。";
    if (empty($STtime1) || empty($CLtime1)) $errors[] = "一つ目の営業時間を正しく選択してください。";
    if ($STtime1 >= $CLtime1) $errors[] = "一つ目の開始時間は終了時間より前に設定してください。";

    // 二つ目の営業時間は任意
    if (!empty($STtime2) && !empty($CLtime2) && $STtime2 >= $CLtime2) {
        $errors[] = "二つ目の開始時間は終了時間より前に設定してください。";
    }

    // エラーがある場合は出力して終了
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
        exit;
    }

    // 3. 入力データの表示（デバッグ用）
    echo "<h3>入力されたデータ:</h3>";
    echo "<p>店舗名: $Shopname</p>";
    echo "<p>座標: $coordinate</p>";
    echo "<p>住所: $address</p>";
    echo "<p>店舗URL: $ShopURL</p>";
    echo "<p>座席数: $Seats</p>";
    echo "<p>一つ目の営業時間: $STtime1 ~ $CLtime1</p>";
    if (!empty($STtime2) && !empty($CLtime2)) {
        echo "<p>二つ目の営業時間: $STtime2 ~ $CLtime2</p>";
    }
    echo "<p>カテゴリ: " . implode(', ', $categories) . "</p>";
    echo "<p>コメント: $addnotice</p>";

    // 4. データベースに保存する例
    /*
    $pdo = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', 'username', 'password');
    $stmt = $pdo->prepare("INSERT INTO shops (Shopname, coordinate, address, ShopURL, Seats, STtime1, CLtime1, STtime2, CLtime2, categories, addnotice) VALUES (:Shopname, :coordinate, :address, :ShopURL, :Seats, :STtime1, :CLtime1, :STtime2, :CLtime2, :categories, :addnotice)");
    $stmt->bindValue(':Shopname', $Shopname);
    $stmt->bindValue(':coordinate', $coordinate);
    $stmt->bindValue(':address', $address);
    $stmt->bindValue(':ShopURL', $ShopURL);
    $stmt->bindValue(':Seats', $Seats);
    $stmt->bindValue(':STtime1', $STtime1);
    $stmt->bindValue(':CLtime1', $CLtime1);
    $stmt->bindValue(':STtime2', $STtime2);
    $stmt->bindValue(':CLtime2', $CLtime2);
    $stmt->bindValue(':categories', implode(', ', $categories)); // カテゴリを文字列化
    $stmt->bindValue(':addnotice', $addnotice);
    $stmt->execute();
    echo "<p>データが正常に保存されました。</p>";
    */
}
?>
</body>
</html>
 