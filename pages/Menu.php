<?php include("./Header.php") ?>

<div class="container-fluid bg-light pt-5 text-center">
    <h2 class="text-dark text-uppercase pr-3 pb-3 text-center">Products</h2>
    <div class="row mx-5 pb-3">  

        <?php
        include("admin/Connect.php");

        // Query to select all products
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);

        // Loop through each row of the result
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['Id'];
            $name = $row['Name'];
            $description = $row['Description'];
            $price = $row['Price'];
            $image = $row['Image'];
        ?>

        <div class="col-lg-3 pb-5">
            <a class="text-decoration-none" href="Product-Details.php?name=<?php echo $name; ?>">
                <div class="card shadow-sm bg-white rounded">                            
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $name; ?></h4>
                        <div class="overflow-hidden">
                            <img style="width: 100%; height:100%; background-size:cover;" src="http://localhost/Pharmacy-Website/images/<?php echo $row['Category'] . '/' . $row['Image']; ?>" alt="<?php echo $name; ?>">                   
                        </div>
                        <div>
                            <p><?php echo $description; ?></p>
                            <p><strong><?php echo $price; ?></p></strong>                         
                        </div>                    
                    </div>
                </div>
            </a>
        </div>

        <?php } ?>
    </div>
</div>
        
<?php include("./Footer.php") ?>