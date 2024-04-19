<?php

    include("admin/Connect.php");

    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);
       
?>

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
    <title>Admin</title>
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
            <li><a href="#" class="nav-item nav-link">Home</a></li>
            <li><a href="Product.php" class="nav-item nav-link active">Products</a></li>
            <li><a href="Category.php" class="nav-item nav-link">Categories</a></li>
        </ul>  
    </nav><br>
    
    <div class="container-fluid bg-light">
        <h3 class="text-center mt-3">Products</h3>   
        <div class="row">            
            <div class="col mx-4 px-4">
                <a href="admin/Add-Product.php" class="btn btn-primary">Add New Product</a>
                <div class="card mt-4">
                    <div class="card-header bg-primary h4 text-light text-center">
                        Products
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>ID</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Price</td>
                                <td>Image</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            <tr>
                            <?php 
                                    while ($row = mysqli_fetch_assoc($result)) {                                    
                                ?>
                                <td><?php echo $row['Id']; ?></td>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Description']; ?></td>
                                <td><?php echo $row['Price']; ?></td>
                                <td><img src="http://localhost/Pharmacy-Website/images/Dental/<?php echo $row['Image']; ?>" style="width: 25%;" height="50px" alt=""><?php echo $row['Image']; ?></td>                                
                                <td><a href="admin/Edit-Product.php?id=<?php echo $row['Id']; ?>" class="btn btn-success">Edit</a></td>
                                <td><a href="#" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    
</body>
</html>