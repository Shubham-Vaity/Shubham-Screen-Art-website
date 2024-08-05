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


$name=$_POST['name'];
$mail=$_POST['mail'];
$password=$_POST['ps'];



$query = "Insert into user(name,Email,password) values('$name','$mail','$password')";

if (mysqli_query($conn,$query)) {
    echo "data insert successfully";
    header('Location: http://localhost/official/login.html');
}
else {
    echo "fail";
}
mysqli_close($conn);
?>