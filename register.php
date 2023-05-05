<?php 
    require_once('database.php');

    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $passwd1 = $_POST['passwd1'];
    $passwd2 = $_POST['passwd2'];

    if (empty($uname) && empty($email) && empty($passwd1) && empty($passwd2)) {
        header('Location: register.html');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($data = $conn -> prepare('SELECT id, uname, email, passwd1, passwd2 FROM register WHERE email = ?')){
            $data -> bind_param('s', $email);
            $data -> execute();
            $data -> store_result();
        }

        if($data -> num_rows > 0){
            echo '
                <script type="text/javascript">
                    alert("Someone already registered using this email!")
                </script>
            ';
            header('Location: register.html');
            exit();
        }else{
            if(empty($passwd1) || empty($passwd2)) {
                // required fields missing error message
                echo '<script>alert("Please fill in both password fields!")</script>';
                header('Location: index.html');
                 exit();
            } else if($passwd1 != $passwd2) {
                // password mismatch error message
                echo '<script>alert("Passwords do not match!")</script>';
                header('Location: index.html');
                exit();
            }else{
                if($data = $conn -> prepare('INSERT INTO register (uname, email, passwd1) VALUES (?, ?, ?)')){
                    $hash_passwd = password_hash($passwd1, PASSWORD_DEFAULT);
                    
                    $data -> bind_param('sss', $uname, $email, $hash_passwd);
                    $data -> execute();
    
                    header('Location: index.html');
                    exit();
                }
            }
        }
    }
?>