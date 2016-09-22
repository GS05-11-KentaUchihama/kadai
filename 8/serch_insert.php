<?
include("functions.php");

$serch = $_POST["serch"];

// データベースから取ってくる処理
$pdo = db_con();

$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE book_name LIKE "%$serch%"');
$status = $stmt->execute();

if($status == false){
  queryError($stmt);
}else{
  header("Location: serch_list.php");
  exit;
}


?>
