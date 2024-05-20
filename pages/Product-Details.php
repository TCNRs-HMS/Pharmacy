<?php
session_start();

include("admin/Connect.php");

if (isset($_GET['name'])) {
    $name = $_GET['name'];

    $query = "SELECT * FROM products WHERE name = '$name'";
    $result = mysqli_query($conn, $query);

    include("./Header.php");
?>

<div class="container-fluid bg-dark pt-1">
    <hr class="text-light pt-3">
    <div class="row text-center">
        <div class="col-12">
            <h1 class="text-light">Product Details</h1>
            <a href="Home.php" class="text-primary">Products</a>
            <i class="far fa-square px-2"></i>
            <a href="Menu.php" class="text-primary">Menu</a>
        </div>
    </div>
    <br><br>
</div>
<br>

<div class="container-fluid bg-light pt-5 text-center">
    <h2 class="text-dark text-uppercase pr-3 pb-3 text-center"><?php echo htmlspecialchars($name); ?></h2>
    <br>
    <div class="row mx-5 pb-5">
        <?php
        if ($row = mysqli_fetch_assoc($result)) {
            $id = $row['Id'];
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
                        <h5 class="card-text pb-2 ps-2" id="unitPrice"><?php echo number_format($price, 2); ?></h5>
                    </div>
                    <hr>
                </div>
                <div class="row mx-auto">
                    <div class="col-sm-12 mb-3 text-center card shadow-sm bg-white rounded">
                        <div class="d-flex align-items-center mx-3 ps-1 pe-1 qtyBox" style="justify-content: space-between;">
                            <input type="hidden" value="<?php echo $id; ?>" class="prodId">
                            <div class="d-flex align-items-center ps-1 decrement" style="border-radius: 100%; cursor: pointer; background-color: lightgrey; width: 20px; height: 20px; font-size: 14px;"> 
                                <i class="fa fa-solid fa-minus"></i>
                            </div>
                            <h6 class="py-1 pt-2 px-4 qty quantityInput" id="amount">1</h6>
                            <div class="d-flex align-items-center ps-1 increment" style="border-radius: 100%; cursor: pointer; background-color: lightgrey; width: 20px; height: 20px; font-size: 14px;">
                                <i class="fa fa-solid fa-plus"></i>
                            </div>
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
                        <h5 class="card-text pb-2 ps-2" id="totalPrice"><?php echo number_format($price * 1, 2); ?></h5>
                    </div>
                </div>
                <div class="row mx-1 pt-4">
                    <div class="col-sm-6 d-flex align-items-center text-center">
                        <!-- <a href="admin/Add-To-Cart.php?name=<?php echo urlencode($name); ?>" class="btn btn-primary" style="width: 100%">Add To Cart</a> -->
                        <form action="admin/Add-To-Cart.php?name=<?php echo urlencode($name); ?>" method="POST" style="width: 100%;">
                            <input type="hidden" name="productId" value="<?php echo $id; ?>">
                            <input type="hidden" name="name" value="<?php echo $name; ?>">
                            <input type="hidden" name="description" value="<?php echo $description; ?>">
                            <input type="hidden" name="image" value="<?php echo $image; ?>">
                            <input type="hidden" name="quantity" class="cartQuantity" value="1">
                            <input type="hidden" name="unitPrice" value="<?php echo number_format($price, 2); ?>">
                            <input type="hidden" name="totalPrice" class="cartTotalPrice" value="<?php echo number_format($price, 2); ?>">
                            <button type="submit" name="addToCart" class="btn btn-primary" style="width: 100%;">Add To Cart</button>
                        </form>
                        <br><br> 
                    </div>
                    <div class="col-sm-6 d-flex align-items-center text-center">
                        <a href="Checkout.php?name=<?php echo urlencode($name); ?>" class="btn btn-primary" style="width: 100%">Purchase</a>
                        <br><br>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<script>
    $(document).ready(function() {
        function updateTotalPrice(unitPrice, quantity) {
            var totalPrice = unitPrice * quantity;
            $('#totalPrice').text(totalPrice.toFixed(2));
            $('.cartTotalPrice').val(totalPrice.toFixed(2));
        }

        $('.increment').click(function() {
            var $quantityElement = $(this).closest('.qtyBox').find('.qty');
            var productId = $(this).closest('.qtyBox').find('.prodId').val();
            var unitPrice = parseFloat($('#unitPrice').text());

            var currentValue = parseInt($quantityElement.text());

            if (!isNaN(currentValue)) {
                var qtyVal = currentValue + 1;
                $quantityElement.text(qtyVal);
                updateQuantity(productId, qtyVal);
                updateTotalPrice(unitPrice, qtyVal);
                $('.cartQuantity').val(qtyVal);
            }
        });

        $('.decrement').click(function() {
            var $quantityElement = $(this).closest('.qtyBox').find('.qty');
            var productId = $(this).closest('.qtyBox').find('.prodId').val();
            var unitPrice = parseFloat($('#unitPrice').text());

            var currentValue = parseInt($quantityElement.text());

            if (!isNaN(currentValue) && currentValue > 1) {
                var qtyVal = currentValue - 1;
                $quantityElement.text(qtyVal);
                updateQuantity(productId, qtyVal);
                updateTotalPrice(unitPrice, qtyVal);
                $('.cartQuantity').val(qtyVal);
            }
        });

        function updateQuantity(prodId, qty) {
            $.ajax({
                type: "POST",
                url: "Cart.php",
                data: {
                    "updateProduct": true,
                    "Id": prodId,
                    "Quantity": qty
                },
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 200) {
                        alertify.success(res.message);
                    } else {
                        alertify.error(res.message);
                    }
                }
            });
        }
    });
</script>

<?php
} else {
    header('Location: home.php');
    exit();
}

include("./Footer.php");
?>
