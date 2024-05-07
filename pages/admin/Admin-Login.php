<?php 
    session_start();

    include('Connect.php');

    if(isset($_POST['submit'])) {        
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM admins WHERE Email='$email' AND Password='$password'";

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
    
            header('Location:../Dashboard.php');
            exit();
        } else {
            $error = "Invalid email or password!";
        }        
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
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-center text-white">
                        <h3>Sign In</h3>
                    </div>
                    <div class="card-body">
                    <h5 class="card-title text-center">Login To Your Account</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group pb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email" required/>
                            </div>
                            <div class="form-group pb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required/>
                            </div>
                            <?php if(isset($error)): ?>
                                <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary" name="submit" style="width: 100%;">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>