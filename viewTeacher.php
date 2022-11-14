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
    $sql = "SELECT * FROM teacher";
    $result = mysqli_query($data,$sql);



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
        <h1>View Teachers Data</h1>

        <h6 class="errormsg"><?php
          if($_SESSION['message']){
            echo $_SESSION['message'];
          }
            unset($_SESSION['message']);
        ?>
        </h6>
    </div>    
    


    <div class="table-admission">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Teacher Name</th>
      <th scope="col">About Teacher</th>
      <th scope="col">Image</th>
    </tr>
    <?php
        while($info =$result->fetch_assoc()){
    ?>
  </thead>
  <tbody>
    <tr>
      <td>
        <?php echo "{$info['name']}"; ?>
      </td>
      <td>
        <?php echo "{$info['description']}"; ?>
      </td>
      <td>
        <?php echo "{$info['image']}"; ?>
      </td>
      <td>
        <?php 
        echo "<a class='btn btn-danger' onclick=\"javascript:return confirm('Are you sure to delete this');\" href='delete.php?student_id={$info['id']}'>Delete</a>";
        ?>
      </td>
      <td>
        <?php 
        echo "<a class='btn btn-success' href='updateStudent.php?student_id={$info['id']}'>Update</a>";
        ?>
      </td>
    </tr>
    <?php
    }
    ?>
  </tbody>


</body>
</html>