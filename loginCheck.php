<?php
error_reporting(0);
session_start();

$host="localhost";

$user="root";

$password="";

$db= "studentproject";

//connect to the database
$data=mysqli_connect($host,$user,$password,$db);

//check 
if($data === false){
    die("connection error");
}

    if($_SERVER["REQUEST_METHOD"]== 'POST')
    {
        $name = $_POST['username'];

        $pass = $_POST['password'];

        $sql = "Select * from user where username ='".$name."' AND password ='".$pass."' ";

        $reult = mysqli_query($data,$sql);
        $row = mysqli_fetch_array($reult);


        if($row["userType"] =="Student")
        {
            $_SESSION['username'] =$name;
            $_SESSION['userType'] = "Student";
            header("location:studenthome.php");

        }else if($row["userType"] =="Admin")
        {
            $_SESSION['username'] = $name;
            $_SESSION['userType'] = "Admin";
            header("location:adminhome.php");
        }
        else{

            $message = "username or password do not match";

            $_SESSION["loginMessage"]=$message;

            header("location:login.php");
        }
    }
?>