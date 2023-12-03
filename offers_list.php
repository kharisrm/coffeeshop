<?php
session_start();
ob_start();

$currency_logo = isset($_SESSION["currency"]["logo"]) ? $_SESSION["currency"]["logo"] : "";
$currency_price = isset($_SESSION["currency"]["price"]) ? $_SESSION["currency"]["price"] : 1;

include_once('./includes/db_connect.php');

if (isset($_GET["section"])) {
    if ($_GET["section"] == 1) {
        $query = "SELECT item_id, new_price, pourcentage FROM todayoffer WHERE pourcentage = (SELECT max(pourcentage) FROM offer)";
        $result = mysqli_query($conn, $query);
    } else if ($_GET["section"] == 2) {
        $query = "SELECT item_id, new_price, pourcentage FROM todayoffer WHERE pourcentage != (SELECT max(pourcentage) FROM offer)";
        $result = mysqli_query($conn, $query);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
    <title>Cart</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./plugins/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/offer.css">
    <link rel="stylesheet" href="./css/toppings_modal.css">
</head>

<body>
    <input type="hidden" id="currency_list" value="<?php echo $currency_logo; ?>">

    <header>
        <a href="./index.php" class="logo"><i class="fas fa-utensils"></i>Coffee Shop.</a>
        <div class="icons">
            <a href="./wishlist.php" class="fas fa-heart"></a>
            <a href="./cart.php" class="fas fa-shopping-cart"></a>
        </div>
    </header>

    <section class="offer" id="offer">
        <h1 align="center">
            <a href="index.php"><i class="fas fa-arrow-left"></i></a>Offers
        </h1>

        <div class="box-container">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $query2 = "SELECT * FROM menuitem WHERE item_id= " . $row['item_id'];
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_assoc($result2);

                $old_p = $row2["item_price"] * $currency_price;
                $new_p = $row["new_price"] * $currency_price;
            ?>

                <div class="box" id="box">
                    <div class="image">
                        <i class="fas fa-heart AddWishlist" id="<?php echo $row['item_id'] ?>" aria-hidden="true"></i>
                        <i class="fas fa-eye" aria-hidden="true"></i>
                        <img id="image_<?php echo $row2['item_id'] ?>" src="./<?php echo $row2["item_image"] ?>" alt="product image">
                    </div>

                    <div class="content">
                        <h3 id="name_<?php echo $row2['item_id'] ?>"><?php echo $row2["item_name"] ?></h3>
                        <div class="prices">
                            <span class="new_price">
                                <?php echo $currency_logo ?>
                                <span id="price_<?php echo $row2['item_id'] ?>"><?php echo $new_p ?></span>
                            </span>

                            <span class="old_price">
                                <?php echo $currency_logo . $old_p ?>
                                <span></span>
                            </span>

                            <span class="pourcentage">-<?php echo $row["pourcentage"] ?>%</span>
                        </div>

                        <div class="description" id="description">
                            <div>
                                <i class="fas fa-arrow-left" aria-hidden="true"></i>
                                <h3>Description</h3>
                            </div>
                            <p><?php echo $row2['item_description'] ?></p>
                        </div>

                        <div class="qtybtns">
                            <div class="QTY" id="sus"><i class="fas fa-minus"></i></div>
                            <span class="counter" id="quantity_<?php echo $row['item_id'] ?>"> 1 </span>
                            <div class="QTY" id="addq"><i class="fas fa-plus"></i></div>
                        </div>

                        <button id="<?php echo $row2['item_id'] ?>" class="btn addItemToCart"><i class="fas fa-cart-plus"></i> Add To Cart</button>
                    </div>
                </div>

            <?php } ?>
        </div>
    </section>

    <?php include('./sections/toppings_modal.php'); ?>

    <script src="./plugins/jquery-3.6.0/jquery.min.js"></script>
    <script src="./plugins/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <script src="./plugins/sweetalert2/sweetalert2.js"></script>
    <script src="js/addToCart.js"></script>
    <script src="js/wishlist.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
