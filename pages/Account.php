
<?php
////Insert raw data////
	// Database connection
	// (hostname, user, password, databaseName)
	$conn = new mysqli('localhost','root','','mydatabase');
	if($conn){
		echo 'conection done';
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
	        $firstName = $_POST['firstName'];
	        $lastName = $_POST['lastName'];
	        $gender = $_POST['gender'];
	        $number = $_POST['number'];
            // Query
            $sql = "INSERT INTO persons(Id, FirstName, LastName, Gender, PhoneNumber) VALUES('$id', '$firstName', '$lastName', '$gender', '$number')";
            $qry = $conn->query($sql);
            if($qry){
                echo "Data insertion successfull";
            }else{
                echo "Something went wrong";
            }
        }
	} else {
		echo 'Connection faild';
	}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>

<body>
    <div class="container">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h1>Registration Form</h1>
                </div>
                <div class="panel-body">
                    <form action= "<?php $_PHP_SELF?>" method="post">
                        <div class="form-group">
                            <label for="id">Id</label>
                            <input type="number" class="form-control" id="id" name="id" />
                        </div>
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" />
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" />
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div>
                                <label for="male" class="radio-inline"><input type="radio" name="gender" value="m" id="male" />Male</label>
                                <label for="female" class="radio-inline"><input type="radio" name="gender" value="f" id="female" />Female</label>
                                <label for="others" class="radio-inline"><input type="radio" name="gender" value="o" id="others" />Others</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="number">Phone Number</label>
                            <input type="number" class="form-control" id="number" name="number" />
                        </div>
                        <input type="submit" name='submit' class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>