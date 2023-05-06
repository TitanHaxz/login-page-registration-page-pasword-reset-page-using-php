<?php 
    include_once('database.php');
    session_start();

    $email = $_POST['email'];

    if(isset($_SESSION['loggedin'])){
        if (!empty($email)) {
            if($data = $conn -> prepare('SELECT id, uname, email FROM register WHERE email = ?')){
                $data -> bind_param('s', $email);
                $data -> execute();

                $result = $data -> get_result();
                if($result -> num_rows > 0){
                    // A password reset e-mail is sent to the user e-mail address.
                    echo 'Email address found!';
                }else{
                    echo 'Email address not found!';
                }
            }
        }
        else {
            header('Location: forgot-password.php');
            exit();
        }
    }else {
        header('Location: forgot-password.php');
        exit();
    }

?>