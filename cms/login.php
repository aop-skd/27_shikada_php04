<?php

session_start();

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>管理者ログイン画面</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">
</head>
<body class="cms">
  <!--header-->
  <header class="header">
    <a href="login.php"><h1 class="site-sub-title">管理者ログイン画面</h1></a>
  </header>

  <!-- end header-->

  <div class="outer">

    <!--ログイン画面-->
    <div class="wrapper wrapper-cms">
      <p><?= $_SESSION['error'] ?> </p>
      <form action="login_act.php" method="post" class="flex-parent cartin-area cms-area">
        <dl class="cms-list">
          <dt>ログインID</dt>
          <dd><input type="text" name="lid" class="cms-login"></dd>
          <dt>パスワード</dt>
          <dd><input type="text" name="lpw" class="cms-login"></dd>
        </dl>

        <ul class="btn-list btn-list__cms">
          <li class="">
            <a href="../index.php" class="btn-back">戻る</a>
          </li>
          <li class="btn-calculate">
            <input type="submit" id="btn-update" value="ログイン">
          </li>
        </ul>
        </form>
    </div>
    <!--end ログインフォーム-->
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

</script>
</body>
</html>
