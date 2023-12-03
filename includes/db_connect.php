<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "coffeeshop";

    $conn = mysqli_connect($servername, $username, $password, $database);
    
    // Periksa koneksi
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
