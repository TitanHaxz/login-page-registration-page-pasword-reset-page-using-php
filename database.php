<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "lr_admin"; 

    // Bağşantı Oluşturma - Diğer dosyalarda kolay mysql bağlantısı yapma

    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
        die("Error". mysqli_connect_error());
    }
?>