<?php
session_start();

if ($_SESSION['kanri_flg'] =='1'){
 ?>
 <header>
   <nav class="navbar navbar-default">
     <div class="container-fluid">
       <div class="navbar-header">
         <a class="navbar-brand" href="bm_insert_view.php">データ登録</a>
         <a class="navbar-brand" href="user_itiran.php">ユーザ一覧</a>
         <a class="navbar-brand" href="login_insert_view.php">ユーザー登録</a>
         <a class="navbar-brand" href="logout.php">ログアウト</a>
       </div>
     </div>
   </nav>
 </header>

<?php }else{ ?>

  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
       <div class="navbar-header">
         <a class="navbar-brand" href="bm_insert_view.php">データ登録</a>
         <a class="navbar-brand" href="logout.php">ログアウト</a>
       </div>
     </div>
   </nav>
 </header>
<?php } ?>
