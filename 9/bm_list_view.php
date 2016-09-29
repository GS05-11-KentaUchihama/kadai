<?php
  $example = 'aaaa';
include("functions.php");
// DB接続
  $pdo = db_con();
if(
  !isset($_POST["serch"]) || $_POST["serch"]==""
  ){
  $stmt = $pdo->prepare('SELECT * FROM gs_bm_table');
}else{
  // serchをpost

  $serch =$_POST["serch"];
  //２．データ登録SQL作成
  $stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE book_name LIKE "%'.$serch.'%"');
}
  $status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= '<a href="detail.php?id='.$result['id'].'">';
    $view .= $result["book_name"]."[".$result["indate"]."]";
    $view .= '</a>　';
    $view .= '<a href="derete.php?id='.$result['id'].'">';
    $view .= '[削除]';
    $view .= '</a>';
    $view .= '</p>';
    // $serch .= '<p><a href="serch_insert.php?book_name='.$result['book_name'].'">';
    // $serch .= $result["book_name"];
    // $serch .= '</a></p>';
  }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<script src="jquery-2.1.3.min.js"></script>
<script src="js/kariname.js"></script>
</head>
<script>
var example = <?php echo json_encode($example); ?>;
console.log(example);
</script>
<body id="main">
<!-- Head[Start] -->
      <?php
      include('menu.php');
      ?>
<!-- Head[End] -->
<div>
    <div class="container jumbotron">
      <form method="post" action="bm_list_view.php">
        <label><textarea name="serch" row="1" cols="40"></textarea></label><br>
        <input type="submit" value="検索"></input>
      </form>
    </div>
</div>

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
