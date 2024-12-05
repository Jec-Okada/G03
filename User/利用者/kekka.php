<!DOCTYPE html>
<html>
<head>
    <title>今日の飯</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap-5.0.0-dist/css/bootstrap.min.css">
<script src="../bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=ここにapiキー=initMap" async defer></script>
    <style>
        #map {
            height: 400px; /* 地図の高さ */
            width: 100%;   /* 地図の幅 */
        }
    </style>
    <script>
        // Google Mapの初期化関数
        function initMap() {
            // 結果表示で使う場所の緯度経度
            var location = { lat: 35.70140487174253, lng: 139.69961978494365}; // 例: 新宿の座標, , 

            // 地図のオプション
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15, // ズームレベル
                center: location // 中心座標
            });

            // マーカーを表示
            var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: 'ここが今日の飯だ！'
            });
        }
    </script>
</head>
<body>
    <?php include "header.php"; ?>
    <link href="css/kekka.css" rel="stylesheet">
    <h1 class="title1">今日の飯はここ！！！！！！</h1>
    <div style="border:solid 1px; "></div>

    <div id="map" ></div>
    <a id="taste" href="googleForm.html">美味かったか？</a> 
  <p id="form"><input type="button" name="form" onclick="location.href='houkoku.php'" class="form btn btn-primary" value="報告フォーム" /></p>
</body>
</html>