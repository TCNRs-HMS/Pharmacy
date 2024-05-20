<?php
session_start();
include("./Header.php");
include("admin/Connect.php");
?>

<div class="container-fluid bg-light pt-5 text-center">
    <h2 class="text-dark text-uppercase pr-3 pb-3 text-center">Cart</h2>
    <br>
    <div class="row mx-5 pb-5">
        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $item) {
                $query = "SELECT * FROM products WHERE Id = " . intval($item['productId']);
                $result = mysqli_query($conn, $query);

                if ($row = mysqli_fetch_assoc($result)) {
                    $name = htmlspecialchars($row['Name']);
                    $description = htmlspecialchars($row['Description']);
                    $price = floatval($row['Price']);
                    $image = $row['Image'];
        ?>
        <div class="col-lg-6 text-center">
            <div class="card shadow-sm bg-white rounded p-4" style="width: 450px">
                <img style="width: 100%; height:100%; background-size:cover;" src="http://localhost/Pharmacy-Website/images/<?php echo htmlspecialchars($row['Category']) . '/' . htmlspecialchars($row['Image']); ?>" alt="<?php echo $name; ?>">
            </div>
        </div>
        <div class="col-lg-6 text-start">
            <div class="card shadow-sm bg-white rounded p-4" style="width: 500px">
                <div class="row mx-1">
                    <div class="col-sm-12 text-start pb-5">
                        <h4 class="card-title"><?php echo $name; ?></h4>
                        <p class="card-text"><?php echo $description; ?></p>
                    </div>
                </div>
                <div class="row mx-1">
                    <div class="col-sm-6 text-center pe-5" style="justify-content: space-between;">
                        <h5 class="card-text pe-5">Unit Price</h5>
                    </div>
                    <div class="col-sm-2 d-flex align-items-center text-center ps-5"></div>
                    <div class="col-sm-4 d-flex align-items-center text-center ps-4">
                        <h5>Rs. </h5>
                        <h5 class="card-text pb-2 ps-2"><?php echo number_format($price, 2); ?></h5>
                    </div>
                    <hr>
                </div>
                <div class="row mx-auto">
                    <div class="col-sm-12 mb-3 text-center card shadow-sm bg-white rounded">
                        <div class="d-flex align-items-center mx-3 ps-1 pe-1" style="justify-content: space-between;">
                            <h5>Quantity: <?php echo $item['quantity']; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="row mx-1">
                    <hr>
                    <div class="col-sm-6 text-center pe-5" style="justify-content: space-between;">
                        <h5 class="card-text pe-5">Total Price</h5>
                    </div>
                    <div class="col-sm-2 d-flex align-items-center text-center ps-5"></div>
                    <div class="col-sm-4 d-flex align-items-center text-center ps-4">
                        <h5>Rs. </h5>
                        <h5 class="card-text pb-2 ps-2"><?php echo number_format($item['totalPrice'], 2); ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <?php
                }
            }
        } else {
            echo "<h3>Your cart is empty.</h3>";
        }
        ?>
    </div>
</div>

<?php
include("./Footer.php");
?>
