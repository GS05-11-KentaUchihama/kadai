<?
include("functions.php");

$id = $_GET["id"];
$life_flg = 1;


// phpのタイム関数
// $timestamp = time();
// $times  = date( "Y-m-d h:i:s", $timestamp ) ;
// echo $times;

// データベースから取ってくる処理
$pdo = db_con();

$stmt = $pdo->prepare('UPDATE gs_user_table SET life_flg=:life_flg WHERE id=:id');
$stmt->bindValue(':life_flg', $life_flg,   PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status == false){
  queryError($stmt);
}else{
  header("Location: user_itiran.php");
  exit;
}

?>
