<?php
// Get values passe from form in login.php file
$userid = $_POST['user_id'];
$userpw = $_POST['user_pw'];

$sql = "select * from users where userid='$userid' and password='$userpw'";

// to prevent mysql injection

// connect to the server and select database
$db_conn = mysqli_connect("127.0.0.1:3307", "root", "123456");
if ($db_conn){
  echo "DB 연결 성공<br>";
} else {
  echo "DB 연결 실패!<br>";
}

$db_sec = mysqli_select_db($db_conn, "login");
if ($db_sec){
  echo "table 연결 성공<br>";
} else {
  echo "table 연결 실패!<br>";
}

// Query the database for user
$result = mysqli_query($db_conn, $sql)
            or die("failed to query database ".mysql_error());

$row = mysqli_fetch_array($result);
if ($row['userid'] == $userid && $row['password'] == $userpw){
  // echo $userid;
  session_start();
  $_SESSION['user_id'] = $userid;
  $_SESSION['user_name'] = $row['username'];?>
  <!-- // header('Location: ./login.php'); -->
  <meta http-equiv="refresh" content="0;url=index.php" />
<?php } else {
  echo "<script>alert('Failed to login!');";
  echo "window.location.replace('login.php')</script>";
  exit;
}
?>
