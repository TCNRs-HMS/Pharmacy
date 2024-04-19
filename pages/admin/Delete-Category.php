<?php 
    include("Connect.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM categories WHERE Id = $id";
        $conn->query($sql);
    }
    header('location:Product.php');
?>