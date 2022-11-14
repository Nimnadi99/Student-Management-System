<?php
error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message'])
{
    $message = $_SESSION['message']; 

    echo "<script type='text/javascript'> 
    alert('$message');
    </script>";
}
$host="localhost";
$user="root";
$password="";
$db = "studentproject";

$data = mysqli_connect($host,$user,$password,$db);
$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="header1">
        <div class="logo-side">
        <img src="logo-application.png" alt="" id="logo-application">
        </div>

        <div class="header-list">
            
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Admission</a></li>
                <li><a href="login.php" class="btn btn-success">Login</a></li>
            </ul>
        </div>
    </div>

    <div class="cover-image">
        <div class="c-text">
            <p class="cover-text">We Teach Student with Care</p>
        </div>
        <div class="c-img">
            <img src="hiroyoshi-urushima-vfRkE_9wuPo-unsplash.jpg" alt="">
        </div>
    </div>

    <section class="about-uni">
        <div class="image-about">
            <img src="michael-marsh-U0dBV_QeiYk-unsplash.jpg" alt="">
        </div>
        <div class="about-text">
            <p class="one">Welcome to Win University</p>
            <p class="two">We are a leading non-state higher education institute approved by the University Grants 
                Commission (UGC) under the Universities Act. We are members of the 
                Association of Commonwealth Universities (ACU), as well as the International 
                Association of Universities (IAU). We are also the first Sri Lankan institute 
                to be accredited by the Institute of Engineering & Technology( IET), UK and Engineering Council, UK.</p>
        </div>
    </section>

    <section class="teachers">
        <p class="our-techers">Our Teachers</p>

    <div class="container">
        <div class="row">
            <?php
                while($info=$result->fetch_assoc()){
            ?>
            <div class="col-md-4">
                <img src="<?php echo "{$info['image']}.jpg"; ?>">
                <h3><?php echo "{$info['name']}"?></h3>
                <h5><?php echo "{$info['description']}"?></h5>

         
            </div>
            <?php
             }

            ?>
        </div>
    </div>
        
    </section>




    <section class="teachers">
        <p class="our-techers">Our Courses</p>

        <div class="teachers-data">
            <div class="set">
            <div class="course-image">
                <img src="maxresdefault.jpg" alt="">
            </div>
            <div class="course-details">
                <p class="name-course">Computer science</p>
                <p class="about-course">
                Computer science is the study of computation, automation, and information.
                Computer science spans theoretical disciplines (such as algorithms, theory of computation, 
                information theory, and automation) to practical disciplines (including the design and 
                implementation of hardware and software).Computer science is generally considered 
                an area of academic research and distinct from computer programming
                </p>
            </div>
        </div>

        <div class="set">
            <div class="course-image">
                <img src="Business-Management1.jpg" alt="">
            </div>
            <div class="teacher-details">
                <p class="name-course">Business management
                </p>
                <p class="about-course">
                Studying for a business management degree allows you to develop a broad understanding of 
                business organisations and provides you with subject-specific knowledge in areas such as markets, 
                customers, finance, operations, communication, information technology and business policy and strategy. 
                </p>
            </div>
        </div>

           <div class="set">
            <div class="course-image">
                <img src="engineering technology.jpg" alt="">
            </div>
            <div class="teacher-details">
                <p class="name-course">Engineering technology</p>
                <p class="about-course">
                An Engineering Technology degree emphasizes the application of specific engineering techniques. 
                Graduates with an Engineering Technology degree often seek employment in fields such as production,
                 design, manufacturing and operations.
                </p>
            </div>
        </div>
        </div>
        
    </section>

    <section class="admission">
    <p class="admission-form">Admission Form</p>

    <form id="text-post" action="data-check.php" method="POST">
        <div class="form-item">
        <label for="" id="name-label">Name</label>
        <input type="text" id="name-input" name="name">
        </div>

        <div class="form-item">
        <label for="" id="email-label">Email</label>
        <input type="text" id="email-input" name="email">
        </div>

        <div class="form-item">
        <label for="" id="phone-label">Phone</label>
        <input type="text" id="phone-input" name="phone">
        </div>
           
        <div class="form-item">
        <label for="" id="msg-label">Message</label>
        <input type="text" id="msg-input" name="message">
        </div>

        <button name="apply" class="apply">Apply</button>
    </form>

    </section>

 
    <footer>
        <h2>All @copyright reserved by web tech knowledge</h2>
    </footer>
</body>
</html>
