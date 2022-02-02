<?php
session_start();
require_once('funcs.php');
loginCheck();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>商品登録</title>
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
  <!-- end header-->

  <div class="outer">

    <!--商品本情報-->
    <div class="wrapper wrapper-cms">
      <!--商品選択フォーム-->
      <form action="insert.php" method="post" class="flex-parent cartin-area cms-area" enctype="multipart/form-data">
        <!-- 画像を送信する場合には enctype=""が必要になる。 -->
        <!--商品情報-->
        <p class="cms-thumb"><img src="https://placehold.jp/c9c9c9/ffffff/600×600.png?text=%E3%83%80%E3%83%9F%E3%83%BC%E7%94%BB%E5%83%8F" width="200"></p>
        <dl class="cms-list">
          <dt>画像</dt>
          <dd><input type="file" name="fname" class="cms-item" accept="image/*"></dd>   
          <!-- accept属性。画像であればOKのようなイメージ -->
          <dt>商品名</dt>
          <dd><input type="text" name="item" placeholder="商品名を入力" class="cms-item"></dd>
          <dt>金額</dt>
          <dd><input type="text" name="value" placeholder="金額を入力" class="cms-item"></dd>
          <dt>カテゴリー</dt>
          <dd>
          <select name="category" class="cms-item">
		        <option value="">選択してください</option>
		        <option value="fragrance">フレグランス</option>
		        <option value="character">キャラクター</option>
		        <option value="furniture">インテリア</option>
		        <option value="fashion">ファッション</option>
		      </select>
          </dd>
          <dt>商品紹介文</dt>
          <dd><textarea name="description" id="" placeholder="商品紹介文を入力" cols="30" rows="10" class="cms-item"></textarea></dd>
        </dl>
        <!--end 商品情報-->
        <ul class="btn-list btn-list__cms">
          <li class="">
            <a href="item.php" class="btn-back">戻る</a>
          </li>
          <li class="btn-calculate">
            <input type="submit" id="btn-update" value="登録">
          </li>
        </ul>
        </form>
        <!--end 商品選択フォーム-->
    </div>
    <!--end 商品本情報-->
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
<script>
//---------------------------------------------------
//画像サムネイルをブラウザで即時に表示するもの。
//---------------------------------------------------
// アップロードするファイルを選択
$('input[type=file]').change(function() {
  //選択したファイルを取得し、file変数に格納
  var file = $(this).prop('files')[0];
  // 画像以外は処理を停止
  if (!file.type.match('image.*')) {
    // クリア
    $(this).val(''); //選択されてるファイルを空にする
    $('.cms-thumb > img').html(''); //画像表示箇所を空にする
    return;
  }
  // 画像表示
  var reader = new FileReader(); //1
  reader.onload = function() {   //2
    $('.cms-thumb > img').attr('src', reader.result);
  }
  reader.readAsDataURL(file);    //3
});
</script>
</body>
</html>
