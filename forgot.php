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
                    echo 'Email adresi bulundu!';
                }else{
                    echo 'Email Adresi bulunamadı!!!!!';
                }
            }
        }
        else {
            header('Location: index.html');
            exit();
        }
    }else {
        header('Location: index.html');
        exit();
    }

?>