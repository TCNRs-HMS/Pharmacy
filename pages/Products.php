<?php
    include("admin/Connect.php");

    if(isset($_GET['category'])) {
        $category = $_GET['category'];

        $query = "SELECT * FROM products WHERE Category = '$category'";
        $result = mysqli_query($conn, $query);

        include("./Header.php")
?>

    <div class="container-fluid bg-dark pt-1"><hr class="text-light pt-3">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="text-light">Products</h1>
                <a href="Home.php" class="text-primary">Home</a>
                <i class="far fa-square px-2"></i>
                <a href="Menu.php" class="text-primary">Menu</a>
            </div>
        </div><br><br>
    </div><br>

    <div class="container-fluid bg-light pt-5 text-center">
        <h2 class="text-dark text-uppercase pr-3 pb-3 text-center"><?php echo $category; ?></h2><br>
        <div class="row mx-5 pb-3">  

            <?php
                include("admin/Connect.php"); 

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['Id'];
                    $name = $row['Name'];
                    $description = $row['Description'];
                    $price = $row['Price'];
                    $image = $row['Image'];
            ?>

            <div class="col-lg-3 pb-5">
                <a class="text-decoration-none" href="">
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
</body>
</html>

<?php
    } else {
        header('Location: home.php');
        exit();
    }

    include("./Footer.php") 
?>
