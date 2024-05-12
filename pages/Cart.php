<?php
    include("admin/Connect.php");

    if(isset($_GET['name'])) {
        $name = $_GET['name'];

        $query = "SELECT * FROM products WHERE name = '$name'";
        $result = mysqli_query($conn, $query);

        include("./Header.php")
?>

<?php 
    include("admin/Connect.php");

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $cardNumber = $_POST['number'];
        $expireDate = $_POST['date'];
        $cvc = $_POST['cvc'];
        $totalAmount = $_POST['total'];

        $paymentData = json_decode($response, true);
        if(isset($paymentData['state']) && $paymentData['state'] === 'approved') {

            $orderStatus = "Paid";            
            $orderId = $_SESSION['order_id']; 

            $query = "INSERT INTO orders (name, number, date, cvv, method, total, status) VALUES ('$name', '$number', '$date', '$cvv', '$method', '$total', '$status')";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ssdss", $_POST['name'], $_POST['email'], $_POST['total'], $paymentMethod, $orderStatus);

            $updateQuery = "UPDATE orders SET status = '$orderStatus' WHERE id = $orderId";
            $updateResult = mysqli_query($conn, $updateQuery);

            if(mysqli_stmt_execute($stmt)) {
                $to = $_POST['email']; 
                $subject = "Order Confirmation";
                $message = "Thank you for your order!";
                $headers = "From: your_email@example.com";

                mail($to, $subject, $message, $headers);

                header('Location: confirmation.php');
                exit();
            } else {
                echo "Error updating order status: " . mysqli_error($conn);
            }
        } else {
            echo "Payment failed. Please try again later.";
        }
    }
?>

    <div class="container-fluid bg-dark pt-1"><hr class="text-light pt-3">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="text-light">Cart</h1>
                <a href="Home.php" class="text-primary">Menu</a>
                <i class="far fa-square px-2"></i>
                <a href="Menu.php" class="text-primary">Products</a>
            </div>
        </div><br><br>
    </div><br>

    <div class="container-fluid bg-light pt-3 text-center pb-5">
        <div class="row card shadow-sm bg-white rounded p-4 mx-5 pb-5">

            <?php
                include("admin/Connect.php"); 

                if ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['Id'];
                    $name = $row['Name'];
                    $description = $row['Description'];
                    $price = $row['Price'];
                    $image = $row['Image'];
            ?>      
            
            <div class="col-lg-12">
                <div class="row card shadow-sm bg-white rounded pb-2 my-4">
                    <div class="col-lg-12 d-flex">
                        <div class="pt-2" style="width: 10%">
                            <img style="width: 100%; height:100%; background-size:cover;" src="http://localhost/Pharmacy-Website/images/<?php echo $row['Category'] . '/' . $row['Image']; ?>" alt="<?php echo $name; ?>">                                 
                        </div>                                       
                        <div class="text-start pt-4 pe-5">
                            <h5 class="card-title"><?php echo $name; ?></h5>
                            <p class="card-text"><?php echo $description; ?></p> 
                        </div>  
                        <div class="text-end pt-4 ps-5" style="float: right; width:40%;">
                            <h5 class="card-title"><?php echo $price; ?></h5> 
                            <a class="card-text" href="Product-Details.php?name=<?php echo $name; ?>" style="text-decoration: none;">View Order</a> 
                        </div>   
                        <div class="text-end pt-4 ps-5">
                            <a href="admin/Cart.php?id=<?php echo $row['Id']; ?>" class="btn btn-danger">Remove</a>
                        </div>
                    </div>                           
                </div>
                <div class="row card shadow-sm bg-white rounded pb-2 my-4">
                    <div class="col-lg-12 d-flex">
                        <div class="pt-2" style="width: 10%">
                            <img style="width: 100%; height:100%; background-size:cover;" src="http://localhost/Pharmacy-Website/images/<?php echo $row['Category'] . '/' . $row['Image']; ?>" alt="<?php echo $name; ?>">                                 
                        </div>                                       
                        <div class="text-start pt-4 pe-5">
                            <h5 class="card-title"><?php echo $name; ?></h5>
                            <p class="card-text"><?php echo $description; ?></p> 
                        </div>  
                        <div class="text-end pt-4 ps-5" style="float: right; width:40%;">
                            <h5 class="card-title"><?php echo $price; ?></h5> 
                            <a class="card-text" href="Product-Details.php?name=<?php echo $name; ?>" style="text-decoration: none;">View Order</a> 
                        </div>  
                        <div class="text-end pt-4 ps-5">
                            <a href="admin/Cart.php?id=<?php echo $row['Id']; ?>" class="btn btn-danger">Remove</a>
                        </div>   
                    </div>                           
                </div>
                <div class="row card shadow-sm bg-white rounded pb-3">                  
                    <div class="col-lg-12 d-flex pt-3">      
                        <div class="text-start pt-4 ps-4">
                            <h5 class="card-text">Total</h5>
                        </div>  
                        <div class="text-end pt-4 ps-5" style="float: right; width:80%;">
                            <h5 class="card-title"><?php echo $price; ?></h5>                             
                        </div> 
                    </div>   
                </div>     
                <button type="submit" class="btn btn-primary mt-4" name="submit" style="float: right; width:30%;">Checkout</button>     
            </div>
                
            <?php } ?>            
            
        </div>
    </div>

    <script type="text/javascript">        
    </script>

<?php
    } else {
        header('Location: home.php');
        exit();
    }

    include("./Footer.php") 
?>
