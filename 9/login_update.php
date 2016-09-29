<?
include("functions.php");

$id = $_POST["id"];
$name =$_POST["name"];
$lid =$_POST["lid"];
$lpw =$_POST["lpw"];


// phpのタイム関数
// $timestamp = time();
// $times  = date( "Y-m-d h:i:s", $timestamp ) ;
// echo $times;

// データベースから取ってくる処理
$pdo = db_con();

$stmt = $pdo->prepare('UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw WHERE id=:id');
$stmt->bindValue(':name', $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status == false){
  queryError($stmt);
}else{
  header("Location: user_itiran.php");
  exit;
}

?>
