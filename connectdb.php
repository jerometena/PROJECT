<?php 

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "projectdb";

$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

if (!$conn){
    echo "Something went wrong " . mysqli_connect_error();
} 
// else {
//     echo "connected!";
// }

?>