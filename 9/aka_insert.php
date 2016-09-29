<?php
include("functions.php");

if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$name =$_POST["name"];
$lid =$_POST["lid"];
$lpw =$_POST["lpw"];
$kanri_flg = 0;
$life_flg = 0;



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
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw, kanri_flg, life_flg)VALUES(NULL, :a1, :a2, :a3, :a4, :a5)");
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  queryError($stmt);
}else{
  //５．index.phpへリダイレクト
  header("Location: login.php");//半角スペースが必要必ず！！
  exit;

}
?>
