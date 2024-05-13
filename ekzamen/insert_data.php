<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="free-icon-web-3178162.png">
    <title>Site</title>
</head>
<body>
<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ekzamen"; 
$conn = new mysqli($servername, $username, $password, $dbname); 
if ($conn->connect_error) 
{ 
    die("Connection failed: " . $conn->connect_error); 
}
if(isset($_POST['pushups']) && isset($_POST['pullups']) && isset($_POST['running']) && isset($_POST['score'])){
    $pushups = $_POST['pushups']; 
    $pullups = $_POST['pullups']; 
    $running = $_POST['running']; 
    $score = $_POST['score'];
    $sql = "INSERT INTO standards (pushups, pullups, running, score) VALUES ('$pushups', '$pullups', '$running', '$score')"; 
    if ($conn->query($sql) === TRUE) 
    { 
        echo "Новая запись создана успешно"; 
    } 
    else 
    { 
        echo "Ошибка: " . $sql . "
" . $conn->error; 
    }
} else {
    echo "Поля формы не были заполнены";
}
$conn->close(); 
?>
<button onclick="goBack()">Вернуться назад</button>

<script>
  function goBack() {
    window.history.back();
  }
</script>
</body>
</html>