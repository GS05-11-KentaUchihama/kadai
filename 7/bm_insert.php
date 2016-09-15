<?php
//1. POSTデータ取得
$bookname =$_POST["bookname"];
$url =$_POST["url"];
$naiyou =$_POST["naiyou"];



//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}
// 画像のアップロード処理
if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], "files/".$_FILES["file"]["name"])) {
    chmod("files/".$_FILES["file"]["name"], 0644);
    echo $_FILES["file"]["name"]."をアップロードしました。";
    $file =$_FILES["file"]["name"];
  } else {
    echo "ファイルをアップロードできません。";
  }
} else {
  echo "ファイルが選択されていません。";
}

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, book_name, book_url, image, book_cmt,
indate )VALUES(NULL, :a1, :a2, :a3, :a4, sysdate())");
$stmt->bindValue(':a1', $bookname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $file, PDO::PARAM_STR);
$stmt->bindValue(':a4', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: bm_insert_view.php");//半角スペースが必要必ず！！
  exit;

}
?>
