<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

if(isset($_POST['id']) && isset($_POST['pushups']) && isset($_POST['pullups']) && isset($_POST['running']) && isset($_POST['score'])){
    $id = $_POST['id']; 
    $pushups = $_POST['pushups']; 
    $pullups = $_POST['pullups']; 
    $running = $_POST['running']; 
    $score = $_POST['score'];

    if($sql = "UPDATE standards SET pushups='$pushups', pullups='$pullups', running='$running', score='$score' WHERE id='$id'"); 
    if ($conn->query($sql) === TRUE) {  
        echo "Данные измененый";  
    } else {  
        echo "Ошибка: " . $conn->error;  
    } 
    
} 

if(isset($_GET['id'])){ 
    $id = $_GET['id']; 
    $sql = "SELECT * FROM standards WHERE id='$id'"; 
    $result = $conn->query($sql);  

    if ($result->num_rows > 0)  
    {  
        $row = $result->fetch_assoc(); 
        echo "<form action='' method='post'>"; 
        echo "Полное имя: <input type='text' name='full_name' value='".$row['full_name']."'>
";  
        echo "ID Факультета: <input type='text' name='faculty_id' value='".$row['faculty_id']."'>
";  
        echo "Курс: <input type='text' name='course' value='".$row['course']."'>
";  
        echo "<input type='hidden' name='id' value='".$id."'>"; 
        echo "<input type='submit' value='Сохранить'>
";  
        echo "</form>";  
    }  
    else  
    {  
        echo "ID не найден"; 
    }  
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
