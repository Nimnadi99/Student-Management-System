<?php
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
    $id = $_GET['student_id'];
    $sql = "SELECT * FROM user WHERE id='$id' ";
    $result = mysqli_query($data,$sql);
    $info = $result->fetch_assoc();

    if(isset($_POST['update'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $password = $_POST['Password'];

      $query = "UPDATE user SET username='$name',email='$email',phone='$phone',Password='$password' WHERE id='$id'" ;
      $result2 = mysqli_query($data,$query);

      if($result2)
      {
        $_SESSION['message'] = 'Successfuly Updated';  
        header("location:updateStudent.php");
       
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
        <h1>Update Student Data</h1>
    </div>    
    <div>
        <center>
        <form action="#" method="POST" id="addStudent">
            <div class="addone">
                <label for="">Username</label>
                <input type="text" name="name" value="<?php echo "{$info['username']}"; ?>"/>
            </div>

            <div class="addone">
                <label for="">Email</label>
                <input type="text" name="email" value="<?php echo "{$info['email']}"; ?>">
            </div>


            <div class="addone">
                <label for="">Phone</label>
                <input type="text" name="phone" value="<?php echo "{$info['phone']}"; ?>">
            </div>

            <div class="addone">
                <label for="">Password</label>
                <input type="Text" name="Password" value="<?php echo "{$info['Password']}"; ?>">
            </div>

            <div class="addone">
                <input id="addbtn" class="btn btn-primary" type="submit" name="update" value="UPDATE">
            </div>
        </form>
        </center>
</body>
</html>