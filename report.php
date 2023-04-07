<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:700,400">
  <title>食レポシリーズ</title>
  <link rel="stylesheet" href="css/reset.css" type="text/css">
  <link rel="stylesheet" href="css/style-l.css" media="screen and (min-width:769px)">
  <link rel="stylesheet" href="css/style-s.css" media="screen and (max-width:768px)">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="./js/sample.js"></script>
</head>

<body>
  <h2>食レポシリーズ</h2>
  <p class="introduction">ここはさくしゃがこれまでに撮った写真にイラストを描いた食レポシリーズ置き場です。<br>更新は結構早い方</p>
  <?php
    // 多階層からなるディレクトリ内のファイル一覧を取得する関数
    function scandir_r($dir){
        // scandirで指定されたパスだけのディレクトリとファイルを取得
        $list = scandir($dir);

        // ファイル一覧結果を詰めるための配列を定義(この時点では空)
        $results = array();

        // 取得したlistを検査
        foreach($list as $record){
            // scandirの仕様で不要な.が入ってしまうためそれらはファイル一覧結果に含めない
            if(in_array($record, array(".", ".."))){
                continue;
            }
            // scandirで取得した値はパスの最後若しくはファイル名のみなので、結合してパスとして補完する
            $path = rtrim($dir, "/")."/".$record;
            // 補完したパスがファイルへのパスだった場合、ファイル一覧結果に値を詰める
            if(is_file($path)){
                $results[] = $path;
            }
            else
            {
                // 補完したパスがディレクトリ(子階層)だった場合、自分自身を呼び出してまた上から処理を実行して最後のファイルまで検索していく
                if(is_dir($path)){
                    $results = array_merge($results, scandir_r($path));
                }
            }
        }
        return $results;
    }

    // 関数を実行してファイル一覧取得
    // ここで指定するパスは実行するphpファイルからみたパス
    $tmp = scandir_r("./images/report");
    // 画像一覧の表示
    // 店舗名は1度のみ表示するようにチェック処理を入れている
    $shopName = "";
    foreach($tmp as $v) {
        if(basename(dirname($v)) !== $shopName){
            // 店舗名表示
            //sort($v, SORT_NATURAL);
            echo '<H3>' , basename(dirname($v)) , '</H3>';
            $shopName = basename(dirname($v));
        }
        // 画像表示
        echo '<img src="' , $v , '" alt="" loading="lazy" class="food">';
        // ファイル名表示
        // echo '<label>' , basename($v) , '</label>';
    }
  ?>
  <!-- ページネーション入れる -->
</body>

<footer>
  <div class="footer-wrapper">
    <!-- ロゴ -->
    <div class="logo">
      <a href="index.html"><img src="officialsite/images/footer/" alt="ロゴ"></a>
    </div>
    <!-- コピーライト -->
    <div class="copyright">
      <small>Copyright &copy; Taiyou/LINE</small>
    </div>
</footer>

</html>
