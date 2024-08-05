<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$db = "business";

$conn = mysqli_connect($servername,$username,$password,$db);
if (!$conn) {
    die("connection error" . mysqli_connect_error()) ;
}
else{
    echo "connction successful";
}


$username = $_POST['name'];  
$password = $_POST['ps'];  
  
    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);  
  
    $sql = "select *from user where name = '$username' and password = '$password'";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
      
    if($count == 1){
        echo "<h1><center> Login successful </center></h1>";
        header('Location: http://localhost/official/homepage.html');
    }
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }     
?>