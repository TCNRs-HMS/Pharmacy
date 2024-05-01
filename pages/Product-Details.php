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

                while ($row = mysqli_fetch_assoc($result)) {
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
                    <div class="card shadow-sm bg-white rounded p-4" style="width: 480px">
                        <div class="row mx-1">
                            <div class="col-sm-12 text-start">
                                <h4 class="card-title"><?php echo $name; ?></h4>
                                <p class="card-text"><?php echo $description; ?></p>  
                                <div class="row mx-1 p-3">
                                    <div class="col-sm-4 text-center card shadow-sm bg-white rounded">                              
                                        <div class="d-flex align-items-center" style="justify-content: space-between;">
                                            <div class="d-flex align-items-center ps-1" style="border-radius: 100%; cursor: pointer; background-color: lightgrey; width: 20px; height: 20px; font-size: 14px;">
                                                <i class="fa fa-solid fa-minus"></i>
                                            </div>
                                            <h6 class="py-1 pt-2">1</h6> 
                                            <div class="d-flex align-items-center ps-1" style="border-radius: 100%; cursor: pointer; background-color: lightgrey; width: 20px; height: 20px; font-size: 14px;">
                                                <i class="fa fa-solid fa-plus"></i>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="row mx-1">
                            <div class="col-sm-6 text-start">
                                <h6 class="card-text">Unit Price</h6>
                                <h6 class="card-text">Quantity</h6>
                                <h6 class="card-text">Discount</h6><br>
                                <h5 class="card-text">Total Price</h5><br> 
                            </div>
                            <div class="col-sm-6 text-end">
                                <h6 class="card-text"><?php echo $price; ?></h6>
                                <h6 class="card-text">1</h6>
                                <h6 class="card-text">-</h6><br> 
                                <h5 class="card-text"><?php echo $price; ?></h5><br> 
                            </div>
                        </div> 
                        <div class="row mx-1">
                            <div class="col-sm-6 d-flex align-items-center text-center">
                                <a href="#" class="btn btn-primary" style="width: 100%">Add To Cart</a><br><br> 
                            </div>
                            <div class="col-sm-6 d-flex align-items-center text-center"> 
                                <a href="#" class="btn btn-primary" style="width: 100%">Purchase</a><br><br>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

<?php
    } else {
        // header('Location: home.php');
        // exit();
    }

    include("./Footer.php") 
?>