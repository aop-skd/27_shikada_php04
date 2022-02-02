<?php
session_start();
require_once('funcs.php');
loginCheck();

//1.  DB接続します
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * from ec_table");
$status = $stmt->execute();



//３．データ表示
$view="";
if($status==false) {
 //execute（SQL実行時にエラーがある場合）
 $error = $stmt->errorInfo();
 exit("ErrorQuery:".$error[2]);

} else {
 //Selectデータの数だけ自動でループしてくれる
 while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<li class="cart-list">';
        $view .= '<p class="cart-thumb"><img src="../img/'.$res["fname"].'" width=200></p>';
        $view .= '<h2 class="cart-title">'.$res['item'].'</h2>';
        $view .= '<p class="cart-price">'.$res['value'].'</p>';
        $view .= '<a href="delete.php?id='. $res['id'] .'" class="btn-delete">削除</a>';
        $view .= '</li>';




 }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>管理画面 </title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">
</head>
<body class="cms">
  <!--header-->
  <header class="header">
    <h1 class="site-sub-sub-title">USER: <?= $_SESSION['name'] ?></h1>
    <a href="item_list.php"><h1 class="site-sub-title">商品一覧</h1></a>
    <a href="item.php"><h1 class="site-sub-title">商品登録</h1></a>
    <a href="logout.php"><h1 class="site-sub-title">LOGOUT</h1></a>
  </header>
  <!--end header  -->

  <div class="outer">
    <div class="wrapper wrapper-main flex-parent">
      <main class="wrapper-main">
        <ul class="cart-products">
        <?php echo $view; ?>
        </ul>
      </main>
    </div>
  </div>

  <!--footer-->
  <footer class="footer">
    <div class="wrapper wrapper-footer">
        <ul class="social-list">
          <li class="social-item"><a href="#"><img src="../images/common/facebook.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="../images/common/instagram.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="../images/common/twitter.png" alt=""></a></li>
        </ul>
    </div>
    <p class="copyrights"><small>Copyright xxx All Rights Reserved.</small></p>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
</body>
</html>
