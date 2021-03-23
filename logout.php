<?php
session_start();
$res=session_destroy(); // 모든 세션 변수 지우기
if ($res){
  header('Location: ./index.php');
}
?>
<!-- <meta http-http-equiv="refresh" content="0;url=index.php"/> -->
