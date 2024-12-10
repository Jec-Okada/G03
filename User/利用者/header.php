<header>
    <link href="css/header.css" rel="stylesheet" >
    <link rel="stylesheet" href="bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
    <div id="logo">
        <img src="img/オススメイカー画像なし.jpg" alt="a" style="max-height: 60px;">
    </div>
    <div id="link">

        <?php if(isset($member)) : ?>
            <?=$member->membername ?>さん
            
            <a href="logout.php">ログアウト</a>

        <?php else: ?>
            <form action="login.php" method="GET" style="display: inline;">
                <input type="submit" class="btn btn-primary " value="ログイン">
            </form>

        <?php endif; ?>
    </div> 
</header>