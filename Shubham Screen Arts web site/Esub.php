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

$email = $_POST ['sub'];

$query = "Insert into email(Email) values('$email')";

if (mysqli_query($conn,$query)) {
    echo "data inserted successfully";
    header('Location: http://localhost/official/homepage.html');
}
else {
    echo "fail";
}
mysqli_close($conn);
?>