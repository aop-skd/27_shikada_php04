<?php

require_once('funcs.php');

//----------------------------------------------------
//１．入力チェック(受信確認処理追加)
//----------------------------------------------------
//商品名 受信チェック:item
// もしも$_POSTが飛んできていない。もしくは空の場合、
if(!isset($_POST["item"]) || $_POST["item"]==""){
  exit("ParameError!item!");
}

//金額 受信チェック:value
if(!isset($_POST["value"]) || $_POST["value"]==""){
  exit("ParameError!value!");
}

//商品紹介文 受信チェック:description
if(!isset($_POST["description"]) || $_POST["description"]==""){
  exit("ParameError!description!");
}

//商品紹介文 受信チェック:category
if(!isset($_POST["category"]) || $_POST["category"]==""){
  exit("ParameError!description!");
}


//ファイル受信チェック※$_FILES["******"]["name"]の場合
if(!isset($_FILES["fname"]["name"]) || $_FILES["fname"]["name"]==""){
  exit("ParameError!fname");
}


//----------------------------------------------------
//２. POSTデータ取得
//----------------------------------------------------
$fname  = $_FILES['fname']['name'];   //File名
$item  = $_POST['item'];   //商品名
$value  = $_POST['value'];   //価格(数字：intvalを使う)
$category = $_POST['category']; //カテゴリー
$description = $_POST["description"];   //商品紹介文


//1-2. FileUpload処理
$upload = "../img/"; //画像アップロードフォルダへのパス
//アップロードした画像を../img/へ移動させる記述↓(第一引数：仮置きしたところ, 第二引数：上記で指定した画像アップロードフォルダ)
if(move_uploaded_file($_FILES['fname']['tmp_name'], $upload.$fname)){
  //FileUpload:OK
} else {
  //FileUpload:NG
  echo "Upload failed";
  echo $_FILES['upfile']['error'];
}

//----------------------------------------------------
//３. DB接続します(エラー処理追加)
//----------------------------------------------------
$pdo = db_conn();

//----------------------------------------------------
//４．データ登録SQL作成
//----------------------------------------------------
$stmt = $pdo->prepare("INSERT INTO ec_table(id, item, value, fname, description, category, indate )
VALUES(NULL, :item, :value, :fname, :description, :category, sysdate())");
$stmt->bindValue(':item', $item, PDO::PARAM_STR);
$stmt->bindValue(':value', $value, PDO::PARAM_INT); //数値
$stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$status = $stmt->execute();

//----------------------------------------------------
//５．データ登録処理後
//----------------------------------------------------
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．item.phpへリダイレクト Locationのあと半角スペースをいれないといけない。
  redirect('item.php');
}
?>
