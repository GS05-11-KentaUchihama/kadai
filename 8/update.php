<?
include("functions.php");

$id = $_POST["id"];
$bookname =$_POST["bookname"];
$url =$_POST["book_url"];
$naiyou =$_POST["book_cmt"];


// phpのタイム関数
// $timestamp = time();
// $times  = date( "Y-m-d h:i:s", $timestamp ) ;
// echo $times;

// データベースから取ってくる処理
$pdo = db_con();

$stmt = $pdo->prepare('UPDATE gs_bm_table SET book_name=:book_name, book_url=:book_url, book_cmt=:book_cmt, indate=sysdate() WHERE id=:id');
$stmt->bindValue(':book_name', $bookname,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':book_url', $url,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':book_cmt', $naiyou,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status == false){
  queryError($stmt);
}else{
  header("Location: bm_list_view.php");
  exit;
}

?>
