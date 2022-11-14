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
    $sql = "SELECT * FROM admission";
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
        <h1>Applied for Admission</h1>
    </div>    

    <div class="table-admission">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Message</th>
    </tr>
  </thead>

    <?php
    while($info=$result->fetch_assoc()){

    ?>

  <tbody>
    <tr>
      <td>
        <?php echo "{$info['name']}"; ?>
      </td>
      <td>
        <?php echo "{$info['email']}"; ?>
      </td>
      <td>
        <?php echo "{$info['phone']}"; ?>
      </td>
      <td>
        <?php echo "{$info['message']}"; ?>
      </td>
    </tr>
    <?php
    }
    
    ?>
  </tbody>
</table>
    </div>
</body>
</html>