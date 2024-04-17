<?php 
    include("Connect.php");

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];  
        $folder = "images/".$filename;   

        $query = "INSERT INTO products (Id, Name, Description, Price, Image) VALUES ('$id', '$name', '$description', '$price', '$filename')";

        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        mysqli_query($conn, $query);
        // header('location: Home.php');
    } 
    // else {
    //     echo 'Insertion failed!';
    // }
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
    <div class="container">
        <div class="row pt-5 text-center">
            <h3>Admin Panel</h3>
            <div class="col-lg-6 pt-5">
                <a href="Product.php" class="text-decoration-none"><div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center ">Add your Products</h5>                        
                    </div>
                </div></a>
            </div>
            <div class="col-lg-6 pt-5">
                <a href="Category.php" class="text-decoration-none"><div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Add your Categories</h5>                        
                    </div>
                </div></a>
            </div>            
        </div>
    </div>
    
</body>
</html>