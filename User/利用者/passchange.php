<!DOCTYPE html>
<html>
<head>
    <title>パスワード変更</title>
    <meta charset="utf-8">
    <link href="css/passchange.css" rel="stylesheet" >
</head>
<body>
    
    <h1>パスワード変更</h1>
    <div class="divider"></div>
    
    <label for="username">メールアドレス:</label>
    <div>
        <input type="text" id="email" name="email" />
    </div>
    <label for="password">新規パスワード:</label>
    <div>
        <input type="password" id="password" name="password" />
    </div>
    <div class="button-group">
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