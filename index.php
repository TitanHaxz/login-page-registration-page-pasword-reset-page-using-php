<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İndex</title>
    <link rel="stylesheet" href="src/style.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <?php 
                session_start();

                if(isset($_SESSION['loggedin'])){
                    echo '
                    <h1>Loggedin</h1>
                    <h3>ID:'. $_SESSION['id'] .'</h3>
                    <h3>Username:'. $_SESSION['uname'] .'</h3>
                    <h3>Email:'. $_SESSION['email'] .'</h3>
                    <div class="button-group">
                        
                        <a href="change-password.php"><button class="green">Change Password</button></a>
                        <a href="logout.php"><button class="red">logout</button></a>
                    </div>                      
                    ';
                }else {
                    echo '
                        <h1>Login or Register</h1>
                        <div class="button-group">
                            <a href="login.html"><button class="green">Login</button></a>
                            <a href="register.html"><button class="red">Register</button></a>
                        </div>  
                    ';
                }
            ?>
        </div>
    </div>
      
</body>
</html>