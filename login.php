<?php
  require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="css/stylelogin.css"> -->
        <link rel="stylesheet" href="css/loginstyle.css">
</head>
<body background="main_bg.jpg">

    <!-- <div class="container">
        <form action="<?=SITE?>" class="form-singin" method="POST">
            <h2>Login</h2>
            
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <input type="password" name="password" class="form-control" placeholder="Passsword" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            <a href="registration.php" class="btn btn-lg btn-primary btn-block">Register</a>
            <a href="<?=SITE?>" class="btn btn-lg btn-primary btn-block">Return Home</a>
                
        </form>
    </div> -->

    <div class="container">
        <section id="content">
            <form action="<?=SITE?>" method="POST">
                <h1>Login Form</h1>
                <div>
                    <input type="text" placeholder="Username" required="" id="username" />
                </div>
                <div>
                    <input type="password" placeholder="Password" required="" id="password" />
                </div>
                <div>
                    <input type="submit" value="Log in" />
                    <a href="<?=SITE?>">Return home</a>
                    <a href="registration.php">Register</a>
                </div>
            </form><!-- form -->	
        </section><!-- content -->
    </div><!-- container -->

<?php
@session_start();
    require_once 'config.php';
    if(isset($_POST['username']) and isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username='$username' and password ='$password'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $count = mysqli_num_rows($result);

        if($count == 1){
            $_SESSION['username'] = $username;
        } else {
            $fmsg = "ОШИБКА!!!";
        }
    }
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        echo "Hello, " . $username . "!";
        echo "Login successful!";
        echo "<a href='logout.php' class='btn btn-lg btn-primary btn-block'> Logout </a>";
                
    }
?>
    </body>
</html>