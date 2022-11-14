<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="zhanhui-li-1iuxWsIZ6ko-unsplash.jpg" class="backgrnd">
    <h1 class="login-topic">Login Form</h1>

    <section class="Login-page">
        <form action="loginCheck.php" method="POST" class="user">

        <div class="username-label">

         <h4>
            <?php
                error_reporting(0);
                session_start();
                session_destroy();
            echo $_SESSION["loginMessage"];        

            ?>
         </h4>

            <label for="" id="username">Username</label>
            <input type="text" id="username-input" name="username">
        </div>

        <div class="password-label">
            <label for="" id="password">Password</label>
            <input type="password" id="password-input" name="password">
    
        <input type="submit" id="submit-input"> 
        </form>
    </section>
    
</body>
</html>