<?php

//XSS対応関数
function h($val){
  return htmlspecialchars($val,ENT_QUOTES);
}

//DB接続
function db_conn()
{
    try {
        $db_name = 'gs_db4';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = 'root';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}


// ログインチェク処理 loginCheck()
// $_大文字はグローバル変数なので引数に入れる必要がない。
function loginCheck()
{
    if( $_SESSION['chk_ssid'] != session_id()){
        exit('LOGIN ERROR');
    } else{
        // 問題がない場合、セッションハイジャックを避けるために鍵を変える。
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }

}
