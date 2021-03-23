<?php
// Get values passe from form in join.php file
$username = $_POST['user_name'];
$userid = $_POST['user_id'];
$userpw = $_POST['user_pw'];

// connect to the server and select database
$db_conn = mysqli_connect("127.0.0.1:3307", "root", "123456");

$db_sec = mysqli_select_db($db_conn, "login");

// Query the database for user
$result = mysqli_query($db_conn, "select userid from users where userid='$userid'")
            or die("failed to query database ".mysql_error());

$exist_cnt = mysqli_num_rows($result);
if ($exist_cnt > 0){
  echo "<script>alert('user id already exist!');";
  echo "window.history.back()</script>";
  exit();
}
$result = mysqli_query($db_conn, "insert into users (username, userid, password) values ('$username', '$userid', '$userpw')")
            or die("failed to query database ".mysql_error());
echo "<script>alert('Success to Join!');";
echo "window.location.replace('login.php')</script>";
exit;

?>
