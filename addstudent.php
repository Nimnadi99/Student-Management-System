<?php
error_reporting(0);
session_start(); 

    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
    elseif($_SESSION['userType'] == 'Student')
    {
        header('location:login.php');
    }

    $host ="localhost";
    $user = "root";
    $password = "";
    $db = "studentproject";

    $data = mysqli_connect($host,$user,$password,$db);
    
    if(isset($_POST['add_student'])){
        $username = $_POST['name'];
        $userphone = $_POST['phone'];
        $useremail = $_POST['email'];
        $usertype = "Student";
        $userpassword = $_POST['Password'];

        //check existing username
        $check = "SELECT * FROM user WHERE username = '$username'";
        $check_username = mysqli_query($data,$check);
        $row_count = mysqli_num_rows($check_username); //counting multiple user

        if($row_count == 1){
            echo "<script type='text/javascript'> alert ('Username already exsit');
            </script>";
        }else{
    
        $sql = "INSERT INTO user(username, phone, email, userType, Password) 
        VALUES ('$username', '$userphone', '$useremail','$usertype','$userpassword')";

        $result = mysqli_query($data,$sql);

        if($result){
            echo "<script type='text/javascript'>
                alert ('Data added successfuly');
            </script>";
        }else{
            echo "Data added failed";
        }
    }
        }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
</head>
<body>
    <?php
        include 'admin-sidebar.php';
    ?>
    
    <div class="details-admin">
        <h1>Add Student</h1>
    </div>    

    <div>
        <center>
        <form action="" method="POST" id="addStudent">
            <div class="addone">
                <label for="">Username</label>
                <input type="text" name="name">
            </div>

            <div class="addone">
                <label for="">Email</label>
                <input type="text" name="email">
            </div>


            <div class="addone">
                <label for="">Phone</label>
                <input type="text" name="phone">
            </div>

            <div class="addone">
                <label for="">Password</label>
                <input type="password" name="Password">
            </div>

            <div class="addone">
                <input id="addbtn" class="btn btn-primary" type="submit" name="add_student" value="INSERT">
            </div>
        </form>
        </center>
    </div>

</body>
</html>