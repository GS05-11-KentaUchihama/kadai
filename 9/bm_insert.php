<?php
include("functions.php");

if(
  !isset($_POST["bookname"]) || $_POST["bookname"]=="" ||
  !isset($_POST["book_url"]) || $_POST["book_url"]=="" ||
  !isset($_POST["book_cmt"]) || $_POST["book_cmt"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$bookname =$_POST["bookname"];
$url =$_POST["book_url"];
$naiyou =$_POST["book_cmt"];



//2. DB接続します
$pdo = db_con();
// 画像のアップロード処理
// if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
//   if (move_uploaded_file($_FILES["file"]["tmp_name"], "files/".$_FILES["file"]["name"])) {
//     chmod("files/".$_FILES["file"]["name"], 0644);
//     echo $_FILES["file"]["name"]."をアップロードしました。";
//     $file =$_FILES["file"]["name"];
//   } else {
//     echo "ファイルをアップロードできません。";
//   }
// } else {
//   echo "ファイルが選択されていません。";
// }

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, book_name, book_url, book_cmt,
indate )VALUES(NULL, :a1, :a2, :a3, sysdate())");
$stmt->bindValue(':a1', $bookname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  queryError($stmt);
}else{
  //５．index.phpへリダイレクト
  header("Location: bm_insert_view.php");//半角スペースが必要必ず！！
  exit;

}
?>
