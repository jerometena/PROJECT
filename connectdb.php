<?php 

// $dbservername = "localhost";
// $dbusername = "root";
// $dbpassword = "";
// $dbname = "projectdb";

// remote database connection
$dbservername = "remotemysql.com";
$dbusername = "HheqMLTdL1";
$dbpassword = "9SjcCzqWOr";
$dbname = "HheqMLTdL1";

$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

if (!$conn){
    echo "Something went wrong " . mysqli_connect_error();
} 
// else {
//     echo "connected!";
// }

?>