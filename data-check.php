<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";


$data = mysqli_connect($host,$user,$password,$db);

if($data === false){
    die("connection error");
}
    if(isset($_POST['apply'])){
        $admission_name = $_POST['name'];
        $admission_email = $_POST['email'];
        $admission_phone = $_POST['phone'];
        $admission_message = $_POST['message'];

        $sql ="INSERT INTO admission(name,email,phone,message)
        VALUES ('$admission_name','$admission_email','$admission_phone','$admission_message')";
        
        $result = mysqli_query($data,$sql);

        if($result){
            $_SESSION['message'] = "Your Application sent successful";
            header("location:index.php");
        }
        else{
            echo "Apply Failed!!";
        }
        }
?>