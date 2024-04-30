<?php 
    include("Connect.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM admins WHERE Id = $id";
        $conn->query($sql);
    }
    header('location:../Admin.php');
?>