<?php include("./Header.php") ?>

    <div class="container-fluid pb-5">  
        <div class="container py-5">
            <div class="row justify-content-center"> 
                <div class="col-lg-10 text-center text-lg-center"> 
                    <h1 class="font-secondary text-primary mb-4">Welcome</h1>
                    <h1 class="display-2 text-uppercase text-dark font-weight-semi-bold mb-4">Calisto Medilab</h1>
                    <h2 class="text-uppercase text-dark">The Online Pharmaceutical shop</h2>      
                </div>                 
            </div>    
        </div>
    </div>

    <div class="container-fluid bg-light">  
        <div class="container py-5">
            <div class="row g-5 justify-content-start">         
                <div class="col-lg-6"> 
                    <div class="bg-primary border-inner text-center text-white p-5">
                        <a href="Menu.php"><h4 class="text-uppercase mb-3">Pills</h4>
                            <img src="http://localhost/Pharmacy-Website/images/pills.jpg" class="rounded-circle" style="width:200px; height:100px;">
                        </a>                        
                    </div>
                </div>
                <div class="col-lg-6"> 
                    <div class="bg-primary border-inner text-center text-white p-5 rounded-2">
                        <a href="Menu.php"><h4 class="text-uppercase mb-3">Syrups</h4>
                            <img src="http://localhost/Pharmacy-Website/images/syrup.jpg" class="rounded-circle" style="width:200px; height:100px;">
                        </a>                       
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase text-dark mb-4">Submit your prescription</h2>
                    <a href="Menu.php" class="btn btn-primary py-3 px-5 shadow-sm rounded" style="width:40%;"><b>Submit</b></a>
                </div>
            </div>
        </div>
    </div>  

    <div class="container-fluid bg-light pt-5">
        <div class="row px-xl-4 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center shadow-sm bg-white rounded mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0 ps-3">Quality Products</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center shadow-sm bg-white rounded mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0 ps-4">Free Delivery</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center shadow-sm bg-white rounded mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0 ps-4">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center shadow-sm bg-white rounded mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0 ps-3">24x7 Service</h5>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid bg-light pt-5">
        <h2 class="text-dark text-uppercase pr-3 pb-3 text-center">Categories</h2>
        <div class="row px-xl-5 pb-3">  

            <?php 
                include("Connect.php");

                $query = "SELECT * FROM categories";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['Id'];
                    $name = $row['Name'];
                    $description = $row['Description'];
                    $image = $row['Image'];
            ?>        
            <!-- <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <a class="text-decoration-none" href="#">
                    <div class="cat-item d-flex align-items-center shadow-sm bg-white rounded mb-4" style="padding: 30px;">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" style="width: 100%;" src="http://localhost/Pharmacy-Website/images/Categories/<?php echo $row['Image'] ?>" alt="<?php echo $name; ?>"> 
                        </div>
                        
                        <div class="flex-fill pl-3">
                            <h6><?php echo $name; ?></h6>   
                            <small class="text-body">100 Products</small>                            
                        </div>
                    </div>
                </a>
            </div>       -->
            
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <a class="text-decoration-none" href="#">
                    <div class="shadow-sm bg-white rounded mb-4 p-2">
                        <div class="overflow-hidden" style="width: 100%; height: 150px;">
                            <img class="img-fluid rounded" style="width: 100%; height: 150px;" src="http://localhost/Pharmacy-Website/images/Categories/<?php echo $row['Image'] ?>" alt="<?php echo $name; ?>"> 
                        </div>                        
                        <div class="flex-fill pl-3 text-center">
                            <h5><?php echo $name; ?></h5>   
                            <small class="text-body">100 Products</small>                            
                        </div>
                    </div>
                </a>
            </div> 

            <?php } ?>

        </div>
    </div>

    
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/service.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Calisto Medilab</h1>                                    
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Calisto Medilab was established in 2019 as a sole Proprietor business entity by our Late founder Mr. John Calisto.</p>                                    
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/contact.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Online Pharmaceutical shop</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Calisto Medilab has served the nation for Over 3 Generations, with 7 outlets. Prescription Medication, 
                                        Preparation mixing local Applications, supplying of Wheelchairs, Orthopaedic supports, Home and professional medical Care equipment, Surgical consumable.</p>                                    
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/contact.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Fast Delivery</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">We will send your orders through our experience qualified dispenser to your doorstep. </p>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    

<?php include("./Footer.php") ?>

