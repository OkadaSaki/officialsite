<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:700,400">
  <title>キャラクターオンリー</title>
  <link rel="stylesheet" href="css/reset.css" type="text/css">
  <link rel="stylesheet" href="css/style-l.css" media="screen and (min-width:769px)">
  <link rel="stylesheet" href="css/style-s.css" media="screen and (max-width:768px)">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="./js/sample.js"></script>
</head>

<body>
  <h2>イラスト</h2>
  <p class="introduction">ここはさくしゃがこれまでに描いたイラスト置き場です。<br>更新は非常にまっっっったり</p>
  <?php
  $images = glob("../officialsite/images/characteronly/*jpg");
  foreach($images as $v){
    echo '<img src="' , $v . '" alt="" loading="lazy" class="characteronly">';
  }?>
  <!-- ページネーション入れる -->
</body>
<footer>
  <div class="footer-wrapper">
    <!-- ロゴ -->
    <div class="logo">
        <a href="index.html"><img src="./images/footer/rogo1.png" alt="ロゴ"></a>
      <img src="./images/footer/rogo2.png" alt="簡易ロゴ">
    </div>
    <!-- コピーライト -->
    <div class="copyright">
      <small>Copyright &copy; Taiyou/LINE</small>
    </div>
</footer>
</html>
