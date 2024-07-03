<?php
    session_start();
    include("../admin/Connect.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $productId = intval($_POST['productId']);
        $quantity = intval($_POST['quantity']);
        $unitPrice = floatval($_POST['unitPrice']);
        $totalPrice = floatval($_POST['totalPrice']);

        $query = "INSERT INTO cart (Id, Quantity, Price, Total) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iidd", $productId, $quantity, $unitPrice, $totalPrice);
        $stmt->execute();

        header('Location: ../Cart.php');
        exit();
    } else {
        header('Location: ../Home.php');
        exit();
    }
?>
