<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

$data = mysqli_connect($host, $user, $password, $db);

if($_GET['student_id']){
    $userid = $_GET['student_id'];
    $sql = "DELETE FROM user WHERE id='$userid'";
    $result = mysqli_query($data,$sql);

    if($result){
        $_SESSION['message'] = 'Successfuly Deleted';  
        header("location:viewStudent.php");
    }
}

?>