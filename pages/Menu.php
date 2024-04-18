<?php include("./Header.php") ?>

<div class="container-fluid bg-light pt-5">
    <h2 class="text-dark text-uppercase pr-3 text-center">Products</h2>
    <div class="row px-xl-5 pb-3">  

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

        <div class="col-lg-3 col-md-4 col-sm-6 pb-1 pt-3 m-2 shadow-sm bg-white rounded">
            <a class="text-decoration-none" href="">
                <div class="cat-item d-flex align-items-center mb-4">
                    <div class="overflow-hidden" style="width: 100px; height: 100px;">
                        <img style="width: 100%;" src="http://localhost/Pharmacy-Website/images/<?php echo $row['Image'] ?>" alt="<?php echo $name; ?>">
                    </div>
                    <div class="flex-fill pl-3">
                        <h5><?php echo $name; ?></h5>
                        <p><?php echo $description; ?></p>
                        <p><strong>Price:</strong> $<?php echo $price; ?></p>
                    </div>
                </div>
            </a>
        </div>

        <?php } ?>
        
<?php include("./Footer.php") ?>