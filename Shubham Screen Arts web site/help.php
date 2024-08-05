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

$name1 = $_POST['name'];
$no = $_POST['no'];

$query = "Insert into help(name,number) values('$name1','$no')";

if (mysqli_query($conn,$query)) {
    echo "data insert successfully";
    header('Location: http://localhost/official/homepage.html');
}
else {
    echo "fail";
}
mysqli_close($conn);
?>