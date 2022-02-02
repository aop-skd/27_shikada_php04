<?php
session_start();
require_once('cms/funcs.php');

//1.GETでidを取得
if(!isset($_GET["id"]) || $_GET["id"]==""){
  exit("ErrorParam!");
}

//GET受信
$id = intval($_GET["id"]);

//SESSION削除
unset($_SESSION["cart"][$id]);

//cart.phpへリダイレクト
redirect('cart.php');

?>
