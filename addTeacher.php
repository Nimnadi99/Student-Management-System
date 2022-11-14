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
    
    if(isset($_POST['addTeacher'])){
        $t_name = $_POST['name'];
        $t_description = $_POST['description'];
        $file = $_FILES['image']['name'];
        $dst ="./image/".$file;
        $dst_db ="image/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'],$dst);
        $sql = "INSERT INTO teacher(name, description, image) VALUES('$t_name', '$t_description','$dst_db')";

        $result = mysqli_query($data, $sql);

        if($result){
            header('location:addTeacher.php');
        }else{
            echo "Data added failed";
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
        <h1>Add Teacher</h1>
    </div>    

    <div>
        <center>
        <form action="#" method="POST" id="addStudent" enctype="multipart/form-data">
            <div class="addone">
                <label for="">Teacher Name</label>
                <input type="text" name="name">
            </div>

            <div class="addone">
                <label for="">Description</label>
                <input type="text" id="des" name="description">
            </div>


            <div class="addone">
                <label for="">Image</label>
                <input type="file" name="image">
            </div>

            <div class="addone">
                <input id="addbtn" class="btn btn-primary" type="submit" name="addTeacher" value="Add Teacher">
            </div>
        </form>
        </center>
    </div>

</body>
</html>