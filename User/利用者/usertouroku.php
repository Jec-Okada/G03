<!DOCTYPE php>
<html>
<head>
    <title>会員登録</title>
    <meta charset="utf-8">
</head>
<body>
    <header>
        <link href="css/usertouroku.css" rel="stylesheet" >
    </header>

    <h1>新規会員登録</h1>
    <div class="divider"></div>
    <label for="username">ユーザー名:</label>
    <div>
        <input type="text" id="username" name="username" />
    </div>
    <label for="username">メールアドレス:</label>
    <div>
        <input type="text" id="email" name="email" />
    </div>
    <label for="password">パスワード:</label>
    <div>
        <input type="password" id="password" name="password" />
    </div>
    <div class="button-group"></div>
        <button id="sainin" class="btn btn-success">登録</button>
    </div>
    <script>
        function butotnClick(){
            alert('登録できました！！！');
            window.location.href = 'login.php';
        }
        
        let button = document.getElementById('sainin');
        button.addEventListener('click', butotnClick);
    </script>
</body>
</html>