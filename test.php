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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script type="text/javascript" src="./js/paginathing.min.js"></script>
</head>

<body>
<?php
define('MAX','3');
$books = array(
          array('book_kind' => 'ライトノベル', 'book_name' => 'ライトノベルの本'),
          array('book_kind' => '歴史', 'book_name' => '歴史の本'),
          array('book_kind' => '料理', 'book_name' => '料理の本'),
          array('book_kind' => '啓発本', 'book_name' => '啓発の本'),
          array('book_kind' => 'コミック', 'book_name' => 'コミックの本'),
          array('book_kind' => '推理小説', 'book_name' => '推理小説の本'),
          array('book_kind' => 'フォトブック', 'book_name' => 'フォトブックの本'),
            );

$books_num = count($books);
$max_page = ceil($books_num / MAX);

if(!isset($_GET['page_id'])){
    $now = 1;
}else{
    $now = $_GET['page_id'];
}

$start_no = ($now - 1) * MAX;

$disp_data = array_slice($books, $start_no, MAX, true);

foreach($disp_data as $val){
    echo $val['book_kind']. '　'.$val['book_name']. '<br />';
}

echo '全件数'. $books_num. '件'. '　'; // 全データ数の表示です。

if($now > 1){ // リンクをつけるかの判定
    echo "<a href='/paging.php?page_id='.($now - 1).'')>前へ</a>". '　';
} else {
    echo '前へ'. '　';
}

for($i = 1; $i <= $max_page; $i++){
    if ($i == $now) {
        echo $now. '　';
    } else {
        echo "<a href='/test.php?page_id='. $i. '')>'. $i. '</a>". '　';
    }
}

if($now < $max_page){ // リンクをつけるかの判定
    echo "<a href='/paging.php?page_id='.($now + 1).'')>次へ</a>". '　';
} else {
    echo '次へ';
}
 var_dump($books,$books_num)
?>
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
