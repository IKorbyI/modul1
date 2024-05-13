<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ekzamen"; 

$conn = new mysqli($servername, $username, $password, $dbname);

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND Password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  
  session_start();
  $_SESSION['username'] = $username;
  
  if($row['role_id'] == 1){
    header('Location: index.php');
  } else {
    header('Location: user_page.php');
  }
} else {
  echo "Ошибка: неверное имя пользователя или пароль.";
}

$conn->close();
?>