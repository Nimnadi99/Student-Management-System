<?php
session_start();

    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
    elseif($_SESSION['userType'] == 'Admin')
    {
        header('location:login.php'); 
    }

    $host = 'localhost';
    $user = 'root';
    $password = "";
    $db ='studentproject';

    $data = mysqli_connect($host, $user, $password, $db);
    $name = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE username='$name'";
    $result = mysqli_query($data, $sql);
    $info = mysqli_fetch_assoc($result);


    if(isset($_POST['updateStudent'])){
        $stu_email = $_POST['email'];
        $stu_phone = $_POST['phone'];
        $stu_password = $_POST['Password'];

        $sql2 = "UPDATE user SET email='$stu_email', phone='$stu_phone', password='$stu_password' WHERE username='$name'";

        $result2 = mysqli_query($data,$sql2);


        if($result2){
            echo "<script type='text/javascript'> alert ('Update success!!!');
            </script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
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
        include 'student-sidebar.php';
    ?>
    <div class="details-admin">
        <h1>My Profile</h1>
    </div>
    <div>
        <center>
        <form action="#" method="POST" id="addStudent">
            <div class="addone">
                <label for="">Email</label>
                <input type="text" name="email" value="<?php echo "{$info['email']}"?>">
            </div>


            <div class="addone">
                <label for="">Phone</label>
                <input type="text" name="phone" value="<?php echo "{$info['phone']}"?>">
            </div>

            <div class="addone">
                <label for="">Password</label>
                <input type="text" name="Password" value="<?php echo "{$info['Password']}"?>">
            </div>

            <div class="addone">
                <input id="addbtn" class="btn btn-primary" type="submit" name="updateStudent" value="UPDATE">
            </div>
        </form>
        </center>
    </div>
</body>
</html>