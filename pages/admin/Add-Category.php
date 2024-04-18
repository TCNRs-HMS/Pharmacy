<?php 
    include("Connect.php");

    if (isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        
        $filename = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];  
        $folder = "images/Categories/".$filename;  

        $query = "INSERT INTO categories (Id, Name, Description, Image) VALUES ('$id', '$name', '$description', '$filename')";

        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        mysqli_query($conn, $query);
        header('location:Home.php');
    } 
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
        <div class="row pt-5">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
            <div class="card">
                    <div class="card-header bg-primary h4 text-light text-center">
                        Category Form
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Add your Categories</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group pb-2">
                                <label class="form-label" for="id">Id</label>
                                <input type="text" class="form-control" id="id" name="id" />
                            </div>
                            <div class="form-group pb-2">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" />
                            </div>
                            <div class="form-group pb-2">
                                <label class="form-label" for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" />
                            </div>
                            <div class="form-group pb-2">                                
                                <label class="form-label" for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" />
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" style="width: 100%;">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    
</body>
</html>