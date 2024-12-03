<!DOCTYPE html>
<html>
<head>
    <title>報告フォーム</title>
    <meta charset="utf-8">
    
</head>
<body>
    <?php include "header.php"; ?>
    <link href="css/houkoku.css" rel="stylesheet">
    <h1>バグ報告・要望フォーム</h1>
    <div style="border:solid 1px; "></div>
    <div>
        <label><input type="radio" id="rbtn" name="form" value="bug" />
        バグ報告</label>
        <label><input type="radio" id="rbtn" name="form" value="request" />
        要望</label>
    </div>
    <div style="border:dashed 1px; "></div>
    <div>
        <textarea id="text"   name="requestform" rows="10" cols="50"></textarea>
    </div>
    <div>
        <button class="main" type="button" onclick="location.href='mainmenu.php'">メインページへ</button>
        <button class="send" type="button">送信</button>
    </div>

</body>
</html>