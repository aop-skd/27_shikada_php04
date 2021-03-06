<?php
session_start();
require_once('cms/funcs.php');

//GETでidを取得
if(!isset($_GET["id"]) || $_GET["id"]==""){
  exit("ParamError!");
}else{
  $id = intval($_GET["id"]); //intval数値変換...文字が入ってても全て数字に変換できる
}

//1.  DB接続します
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM ec_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  $row = $stmt->fetch(); //１レコードだけ取得：$row["フィールド名"]で取得可能
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
</head>
<body>
  <!--header-->
  <header class="header">
    <a href="./cms/login.php"><p class="site-login">Owner page</p></a>
    <a href="index.php"><h1 class="site-title">My Select Shop</h1></a>
    <a href="cart.php" class="btn btn-cart"><img src="images/common/icon-cart.png" alt="G's Academy Tokyo"></a>
  </header>
  <!-- end header-->
<form action="cartadd.php" method="POST">
  <div class="outer">
    <!--商品本情報-->
    <div class="wrapper wrapper-item flex-parent">

      <main class="wrapper-main">

        <!--商品情報-->
        <p class="item-thumb"><img src="./img/<?=$row["fname"]?>" width="200"></p>
        <div class="flex-parent item-label">
          <h1 class="item-name"><?=$row["item"]?></h1>
          <p class="item-price"><?=$row["value"]?></p>
          <p><input type="number" value="1" name="num" class="cartin-number"></p>
        </div>
        <!--カートボタン-->
        <div class="flex-parent item-label">
          <input type="submit" class="btn-cartin" value="カートに入れる">
        </div>
        <!--商品詳細情報-->
        <div class="flex-parent item-label">
          <p class="item-text"><?=$row["description"]?></p>
        </div>
        <input type="hidden" name="item" value="<?=$row["item"]?>">
        <input type="hidden" name="value" value="<?=$row["value"]?>">
        <input type="hidden" name="id" value="<?=$row["id"]?>">
        <input type="hidden" name="fname" value="<?=$row["fname"]?>">
      </main>
    </div>
  </div>
</form>

   <!--footer-->
   <footer class="footer">
    <div class="wrapper wrapper-footer">
        <ul class="social-list">
          <li class="social-item"><a href="#"><img src="images/common/facebook.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="images/common/instagram.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="images/common/twitter.png" alt=""></a></li>
        </ul>
    </div>
    <p class="copyrights"><small>Copyright xxx All Rights Reserved.</small></p>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
</body>
</html>
