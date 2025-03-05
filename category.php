<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
    exit();
}

if (isset($_POST['add_to_wishlist'])) {

    $pid = filter_var($_POST['pid'], FILTER_SANITIZE_STRING);
    $p_name = filter_var($_POST['p_name'], FILTER_SANITIZE_STRING);
    $p_price = filter_var($_POST['p_price'], FILTER_SANITIZE_STRING);
    $p_image = filter_var($_POST['p_image'], FILTER_SANITIZE_STRING);

    $check_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
    $check_wishlist->execute([$p_name, $user_id]);

    $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
    $check_cart->execute([$p_name, $user_id]);

    if ($check_wishlist->rowCount() > 0) {
        $message[] = 'Already added to wishlist!';
    } elseif ($check_cart->rowCount() > 0) {
        $message[] = 'Already added to cart!';
    } else {
        $insert_wishlist = $conn->prepare("INSERT INTO `wishlist` (user_id, pid, name, price, image) VALUES (?, ?, ?, ?, ?)");
        $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
        $message[] = 'Added to wishlist!';
    }
}

if (isset($_POST['add_to_cart'])) {

    $pid = filter_var($_POST['pid'], FILTER_SANITIZE_STRING);
    $p_name = filter_var($_POST['p_name'], FILTER_SANITIZE_STRING);
    $p_price = filter_var($_POST['p_price'], FILTER_SANITIZE_STRING);
    $p_image = filter_var($_POST['p_image'], FILTER_SANITIZE_STRING);
    $p_qty = filter_var($_POST['p_qty'], FILTER_SANITIZE_NUMBER_INT);

    $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
    $check_cart->execute([$p_name, $user_id]);

    if ($check_cart->rowCount() > 0) {
        $message[] = 'Already added to cart!';
    } else {
       

        $insert_cart = $conn->prepare("INSERT INTO `cart` (user_id, pid, name, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)");
        $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
        $message[] = 'Added to cart!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>

    <script src="https://kit.fontawesome.com/1a2cce4b7e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>

<style>
    body {
        background-image: url(images/wallpapercategory.jpg) !important;
    }
</style>

<section class="products">

    <?php 
    if (isset($_GET['category_id']) && is_numeric($_GET['category_id'])) {
        $category_id = intval($_GET['category_id']);
    } else {
        echo '<p class="empty">Category not specified!</p>';
        exit();
    }
    ?>

    <h1 class="title">Products - Category <?= htmlspecialchars($category_id) ?></h1>

    <div class="box-container">

    <?php
        $select_products = $conn->prepare("SELECT * FROM `products` WHERE category_id = ?");
        $select_products->execute([$category_id]);

        if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) { 
    ?>
        <form action="" class="box" method="POST">
            <div class="price">€<span><?= htmlspecialchars($fetch_products['price']); ?></span>/-</div>
            <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
            <img src="uploaded_img/<?= htmlspecialchars($fetch_products['image']); ?>" alt="">
            <div class="name"><?= htmlspecialchars($fetch_products['name']); ?></div>
            <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
            <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
            <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
            <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
            <input type="number" min="1" value="1" name="p_qty" class="qty">
            <input type="submit" value="Add to Wishlist" class="option-btn" name="add_to_wishlist">
            <input type="submit" value="Add to Cart" class="btn" name="add_to_cart">
        </form>
    <?php
            }
        } else {
            echo '<p class="empty">No products available!</p>';
        }
    ?>

    </div>

</section>

<?php include 'footer.php'; ?>

</body>
</html>
