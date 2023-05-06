<?php 
    include_once('database.php');
    session_start();

    $email = $_SESSION['email'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    $sql = "SELECT * FROM register WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    
        // check if the old password matches the password in the database
        if (password_verify($old_password, $row['password'])) {
    
            // hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
            // update the user's password in the database
            $sql = "UPDATE register SET password = '$hashed_password' WHERE email = '$email'";
            if (mysqli_query($conn, $sql)) {
                echo "Password updated successfully!";
                echo "<script>setTimeout(function(){window.location.href='index.php';},2300);</script>";
                exit();

            } else {
                echo "Error updating password: " . mysqli_error($conn);
            }
        } else {
            echo "Old password is incorrect!";
            echo "<script>setTimeout(function(){window.location.href='change-password.php';},2300);</script>";
            exit();
        }
    } else {
        echo "User not found!";
    }
    
    // close database connection
    mysqli_close($conn);
?>