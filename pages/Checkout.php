<?php
    include("admin/Connect.php");

    if(isset($_GET['name'])) {
        $name = $_GET['name'];

        $query = "SELECT * FROM products WHERE name = '$name'";
        $result = mysqli_query($conn, $query);

        include("./Header.php")
?>

    <div class="container-fluid bg-dark pt-1"><hr class="text-light pt-3">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="text-light">Checkout</h1>
                <a href="Home.php" class="text-primary">Cart</a>
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
                        <div class="text-end pt-4 ps-5">
                            <h5 class="card-title"><?php echo $price; ?></h5> 
                            <a class="card-text" href="#" style="text-decoration: none;">View Order</a> 
                        </div>   
                    </div>                           
                </div>
                <div class="row card shadow-sm bg-white rounded pb-3">
                    <div class="row p-3">
                        <div class="col-lg-8">
                            <div class="pt-2">
                                <h4 class="pt-1 mx-auto pb-2">Payment Details</h4>                                       
                            </div>                                       
                            <div class="card text-start">
                                <div class="card-body">                                
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group pb-2">
                                            <label class="form-label" for="method">Payment Method</label>
                                            <input type="radio" class="form-control" id="method" name="method" />
                                            <input type="radio" class="form-control" id="method" name="method" />
                                        </div>
                                        <div class="form-group pb-2">
                                            <label class="form-label" for="name">Cardholder's Name</label>
                                            <input type="text" class="form-control" id="name" name="name" />
                                        </div>
                                        <div class="form-group pb-2">
                                            <label class="form-label" for="number">Card Number</label>
                                            <input type="text" class="form-control" id="number" name="number" />
                                        </div>
                                        <div class="form-group pb-2 d-flex">
                                            <div class="form-group pb-2 pe-5">
                                                <label class="form-label" for="date">Expire Date</label>
                                                <input type="text" class="form-control" id="date" name="date" />
                                            </div>
                                            <div class="form-group pb-2 ps-5">
                                                <label class="form-label" for="cvc">CVC Number</label>
                                                <input type="password" class="form-control" id="cvc" name="cvc" width="80%" />
                                            </div>
                                        </div>                           
                                        <!-- <button type="submit" class="btn btn-primary" name="submit" style="width: 100%;">Submit</button> -->
                                    </form>
                                </div>
                            </div>
                        </div>  
                        <div class="col-lg-4">
                            <div class="pt-2">
                                <h4 class="pt-1 mx-auto pb-2">Order Summary</h4>                                        
                            </div>                  
                            <div class="card text-start">
                                <div class="card-body">            
                                    <div class="row pb-0">
                                        <div class="col-sm-6 text-start" style="justify-content: space-between;">
                                            <h6 class="card-text pe-5">Sub Total</h6>
                                        </div>
                                        <div class="col-sm-6 align-items-center text-center ps-5"> 
                                            <h6 class="card-text" id="unitPrice"><?php echo $price; ?></h6>
                                        </div>  
                                    </div><hr>   
                                    <div class="row">
                                        <div class="col-sm-6 text-start" style="justify-content: space-between;">
                                            <h6 class="card-text pe-5">Delivery</h6>
                                        </div>
                                        <div class="col-sm-6 align-items-center text-center ps-5"> 
                                            <h6 class="card-text" id="unitPrice"> Rs. 50.00</h6>
                                        </div>  
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-sm-6 text-start" style="justify-content: space-between;">
                                            <h6 class="card-text pe-5">Total</h6>
                                        </div>
                                        <div class="col-sm-6 align-items-center text-center ps-5"> 
                                            <h6 class="card-text" id="unitPrice"><?php echo $price; ?></h6>
                                        </div> 
                                    </div><hr>                                                             
                                    <button type="button" class="btn btn-primary" style="width: 100%;" onclick="myFunction()">Checkout</button>
                                </div>     
                            </div> 
                        </div>              
                    </div>      
                </div>          
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
