
<?php
session_start();
include "connectdb.php";

$id = "";
$name = "";
$contact = "";
$email = "";
// $_SESSION['message'] = "";
// $_SESSION['msg_type'] = "";
//ADD
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $contact = $_POST['contactnumber'];
    $email = $_POST['email'];
    $sql = "INSERT INTO info (name, contactnumber, email) VALUES ('$name', '$contact', '$email')";
    $result = mysqli_query($conn, $sql);

    if ($result){
        $_SESSION['message'] = "Record has been saved!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Something went wrong!";
        $_SESSION['msg_type'] = "danger";
    }

    header("location: index.php");
}

//DELETE
if (isset($_GET['del'])){
    $id = $_GET['del'];

    $sql = "DELETE FROM info WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result){
        $_SESSION['message'] = "Record deleted!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Something went wrong!";
        $_SESSION['msg_type'] = "danger";
    }

    header("location: index.php");
}

//SHOW INFO WHEN UPDATE CLICKED
if (isset($_GET['upd'])){
    $id = $_GET['upd'];

    $sql = "SELECT * FROM info WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($result);

    if ($rowcount > 0) {
        while ($row = mysqli_fetch_assoc($result)){
            $name = $row['name'];
            $contact = $row['contactnumber'];
            $email = $row['email'];
        }
    } 
}

//UPDATE
if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $contact = $_POST['contactnumber'];
    $email = $_POST['email'];

    $sql = "UPDATE info SET name = '$name', contactnumber = '$contact', email = '$email' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result){
        $_SESSION['message'] = "Record updated!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Something went wrong!";
        $_SESSION['msg_type'] = "danger";
    }

    header("location: index.php");
}
?>