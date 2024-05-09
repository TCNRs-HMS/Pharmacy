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
                <h1 class="text-light">Product Details</h1>
                <a href="Home.php" class="text-primary">Products</a>
                <i class="far fa-square px-2"></i>
                <a href="Menu.php" class="text-primary">Menu</a>
            </div>
        </div><br><br>
    </div><br>

    <div class="container-fluid bg-light pt-5 text-center">
        <h2 class="text-dark text-uppercase pr-3 pb-3 text-center"><?php echo $name; ?></h2><br>
        <div class="row mx-5 pb-5">

            <?php
                include("admin/Connect.php"); 

                if ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['Id'];
                    $name = $row['Name'];
                    $description = $row['Description'];
                    $price = $row['Price'];
                    $image = $row['Image'];
            ?>
            <div class="col-lg-6 text-center">
                <div class="card shadow-sm bg-white rounded p-4" style="width: 450px">
                    <img style="width: 100%; height:100%; background-size:cover;" src="http://localhost/Pharmacy-Website/images/<?php echo $row['Category'] . '/' . $row['Image']; ?>" alt="<?php echo $name; ?>">                                 
                </div>
            </div>
            <div class="col-lg-6 text-start">               
                    <div class="card shadow-sm bg-white rounded p-4" style="width: 500px">
                        <div class="row mx-1">
                            <div class="col-sm-12 text-start pb-5">
                                <h4 class="card-title"><?php echo $name; ?></h4>
                                <p class="card-text"><?php echo $description; ?></p> 
                            </div>
                        </div>  
                        <div class="row mx-1">
                            <div class="col-sm-6 text-center pe-5" style="justify-content: space-between;">
                                <h5 class="card-text pe-5">Unit Price</h5>
                            </div>
                            <div class="col-sm-6 align-items-center text-center ps-5"> 
                                <h5 class="card-text pb-3 ps-5" id="unitPrice"><?php echo $price; ?></h5>
                            </div><hr>
                        </div>
                        <div class="row mx-auto">
                            <div class="col-sm-12 mb-3 text-center card shadow-sm bg-white rounded">                              
                                <div class="d-flex align-items-center mx-3 ps-1 pe-1" style="justify-content: space-between;">
                                    <div class="d-flex align-items-center ps-1" style="border-radius: 100%; cursor: pointer; background-color: lightgrey; width: 20px; height: 20px; font-size: 14px;">
                                        <i class="fa fa-solid fa-minus" onclick="updateQuantity('minus')"></i>
                                    </div>
                                    <h6 class="py-1 pt-2 px-4" id="amount">1</h6> 
                                    <div class="d-flex align-items-center ps-1" style="border-radius: 100%; cursor: pointer; background-color: lightgrey; width: 20px; height: 20px; font-size: 14px;">
                                        <i class="fa fa-solid fa-plus" onclick="updateQuantity('plus')"></i>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row mx-1"><hr>
                            <div class="col-sm-6 text-center pe-5" style="justify-content: space-between;">
                                <h5 class="card-text pe-5">Total Price</h5>
                            </div>
                            <div class="col-sm-6 align-items-center text-center ps-5"> 
                                <h5 class="card-text pb-5 ps-5" id="totalPrice">115.00</h5>
                            </div>
                        </div>
                        <div class="row mx-1">
                            <div class="col-sm-6 d-flex align-items-center text-center">
                                <a href="Cart.php?name=" class="btn btn-primary" style="width: 100%">Add To Cart</a><br><br> 
                            </div>
                            <div class="col-sm-6 d-flex align-items-center text-center"> 
                                <a href="Checkout.php?name=<?php echo $name; ?>" class="btn btn-primary" style="width: 100%">Purchase</a><br><br>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- <script type="text/javascript">
        var quantity = 1;
        
        var price = parseFloat("<?php echo $price; ?>");

        function updateQuantity(action) {
            if (action=='minus' && quantity>1) {
                quantity--;
            }
            else if (action=='plus') {
                quantity++;
            }
            document.getElementById('amount').innerHTML = quantity;
            document.getElementById('totalPrice').innerHTML = (quantity * price).toFixed(2); 
        }
        
        updateQuantity();

    </script> -->

    <input type="hidden" id="priceValue" value="<?php echo $price; ?>">

    <script type="text/javascript">

        var quantity = 1;
        var price = document.getElementById('priceValue').value;

        function updateQuantity(action) {
            if (action=='minus' && quantity>1) {
                quantity--;
            }
            else if (action=='plus') {
                quantity++;
            }
            document.getElementById('amount').innerHTML = quantity;
            document.getElementById('totalPrice').innerHTML = (quantity * price).toFixed(2); 
        }
        
        updateQuantity();
        
    </script>

<?php
    } else {
        header('Location: home.php');
        exit();
    }

    include("./Footer.php") 
?>
