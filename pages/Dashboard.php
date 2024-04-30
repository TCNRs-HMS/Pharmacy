



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container-fluid bg-primary p-3">
        <div class="row px-3">
            <div class="col-lg-10 d-flex align-items-center justify-content-start">
                <h1 class="text-uppercase text-light"><i class="fa fa-medkit text-light"></i>&nbsp;Calisto Medilab</h2>
            </div>
            <div class="col-lg-2 d-flex align-items-center justify-content-end">
                <i class="fa fa-user fs-3"></i><br>
                <span class="text-light px-3">Admin</span>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 pb-3">                 
        <ul class="navbar-nav mx-auto">
            <li><a href="#" class="nav-item nav-link active">Home</a></li>
            <li><a href="Admin.php" class="nav-item nav-link">Admins</a></li>
            <li><a href="Product.php" class="nav-item nav-link">Products</a></li>
            <li><a href="Category.php" class="nav-item nav-link">Categories</a></li>
        </ul>  
    </nav><br>
    
    <div class="container-fluid bg-light">
        <h3 class="text-center mt-3">Admin Dashboard</h3>   
        <div class="row mt-3 m-3 p-3">            
            <div class="col-lg-6">
                <div class="mt-5 shadow-sm bg-white rounded mb-4 p-5"> 
                    <div class="flex-fill pl-3 text-center">
                        <?php
                            include("admin/Connect.php");

                            $query = "SELECT * FROM products";
                            $products = mysqli_query($conn, $query);
                            $rowCount = mysqli_num_rows($products);
                        ?>
                        <h4><?php echo $rowCount; ?></h4>   
                        <h5 class="text-body">Products</h5>                            
                    </div>            
                </div>
            </div> 
            <div class="col-lg-6">
                <div class="mt-5 shadow-sm bg-white rounded mb-4 p-5"> 
                    <div class="flex-fill pl-3 text-center">
                        <?php
                            include("admin/Connect.php");

                            $query = "SELECT * FROM categories";
                            $categories = mysqli_query($conn, $query);
                            $rowCount = mysqli_num_rows($categories);
                        ?>
                        <h4><?php echo $rowCount; ?></h4>   
                        <h5 class="text-body">Categories</h5>                            
                    </div>            
                </div>
            </div>            
        </div>    
    </div>
    
</body>
</html>