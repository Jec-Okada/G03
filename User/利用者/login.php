<!DOCTYPE html>
<html>
<head>
    <title>会員ログイン</title>
    <meta charset="utf-8">
    <!-- CSSファイルのリンク -->
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <h1>会員ログイン</h1>
    <div class="divider"></div>
    
    <label for="username">ユーザー名:</label>
    <div>
        <input type="text" id="username" name="username" />
    </div>
    <label for="password">パスワード:</label>
    <div>
        <input type="password" id="password" name="password" />
    </div>
    <div class="button-group">
        <button id="sainin" class="btn btn-success">サインイン</button>
        <a href="passchange.php" class="url">パスワードをお忘れですか？</a>
    </div>
    <div class="divider"></div>
    
    <p>新規会員の方はこちら</p>
    <div>
        <button onclick="location.href='usertouroku.php'" class="btn btn-primary">会員登録</button>
    </div>
    
    <script>
        function buttonClick() {
            alert('サインインに成功しました！！！！！！');
            window.location.href = 'mainmenu.php';
        }

        let button = document.getElementById('sainin');
        button.addEventListener('click', buttonClick);
    </script>
</body>
</php>