<?php
    require_once('database.php');
    session_start();

    $email = $_POST['email'];
    $passwd1 = $_POST['passwd1'];
    if (empty($email) && empty($passwd1)) {
        header('Location: login.html');
        exit();
    }

    if(isset($_SESSION['s'])){
        header('Location: index.php');
        exit();
    }

    if($data = $conn->prepare('SELECT id, uname, email, password FROM register WHERE email = ?')){
        $data->bind_param('s', $email);
        $data->execute();
        $data->store_result();
    
        if($data->num_rows > 0){
            $data->bind_result($id, $uname, $email, $password);
            $data->fetch();
    
            // kullanıcının girdiği şifre ile veritabanındaki şifre eşleşiyor mu kontrol edin
            if(password_verify($_POST['passwd1'], $password)){
                // doğru şifre, oturum oluşturun
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['id'] = $id;
                $_SESSION['uname'] = $uname;
                $_SESSION['email'] = $email;
                        
                header('Location: index.php');
                exit();
            }else {
                // yanlış şifre
                echo ' Şifre eşleşmesi hata!';
            }
        }else {
            // email adresi veritabanında yok
            echo 'Deneme hata 1';
        }
    }
    


?>