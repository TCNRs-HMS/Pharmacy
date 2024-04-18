<?php 
    $conn = mysqli_connect('localhost', 'root');

    if($conn->connect_error) {
        die("Connection Failed!".$conn->connect_error);
    } 
    else {
        // echo "Connection Successful!";
    }
    
    mysqli_select_db($conn, 'calisto_pharmacy');
?>