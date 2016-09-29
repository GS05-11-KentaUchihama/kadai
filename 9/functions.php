<?php
/** 共通で使うものを別ファイルにしておきましょう。*/


// ログインテェック関数
function ssidcheck(){
  if(!isset($_SESSION['schk']) ||
     $_SESSION['schk'] != session_id()
     ){
    exit('error!');
  }else{
    session_regenerate_id();
    $_SESSION['schk'] = session_id();
  }
}

//DB接続関数（PDO）
function db_con(){
  $db_name = 'gs_db';
  try {
    $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}

//SQL処理エラー
function queryError(){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

/**
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

function json_safe_encode($data){
    return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
}


?>
