<?php
session_start();

include('functions.php');

if(
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]==""
  ){
  header('location: login.php');
  exit();
}

$pdo = db_con();

$sql = 'SELECT *FROM gs_user_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $_POST['lid']);
$stmt->bindValue(':lpw', $_POST['lpw']);
$res = $stmt->execute();

if($res==false){
  queryError($stmt);
}

$val = $stmt->fetch();

if( $val["id"] != "" ){
  $_SESSION['schk'] = session_id();
  $_SESSION['name'] = $val['name'];
  $_SESSION['kanri_flg'] = $val['kanri_flg'];
  header('location: bm_list_view.php');
}else{
  //logout処理を経由して全画面へ
  header('location: login.php');
}

exit();


 ?>
