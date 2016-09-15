<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
  <script src="jquery-2.1.3.min.js"></script>
  <script src="js/kariname.js"></script>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_insert.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>bookname：<input type="text" name="bookname"></label><br>
     <label>url：<input type="text" name="url"></label><br>
     <label>image :<input type="file" name="file"><label><br>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
