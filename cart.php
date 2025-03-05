<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $delete_cart_item->execute([$delete_id]);
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart_item->execute([$user_id]);
   header('location:cart.php');
}

if(isset($_POST['update_qty'])){
   $cart_id = $_POST['cart_id'];
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $update_qty->execute([$p_qty, $cart_id]);
   $message[] = 'cart quantity updated';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

  <script src="https://kit.fontawesome.com/1a2cce4b7e.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<style>
     body {
         background-image:url(images/wallpaperabout.jpg)!important;
          
    }
    .shopping-cart{
      padding-top:100px;
    }
    .box {
    background-color: #fff; /* Цвет фона */
    border-radius: 10px; /* Скругленные углы */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Тень */
    padding: 20px; /* Отступ */
    margin: 15px; /* Отступ между картами */
    transition: transform 0.3s; /* Плавный переход при наведении */
    text-align: center; /* Выравнивание текста в центре */
}

/* Эффект при наведении */
.box:hover {
    transform: translateY(-5px); /* Подъем карты при наведении */
}

/* Стили для цены */
.price {
    font-size: 24px; /* Размер шрифта */
    font-weight: bold; /* Жирный шрифт */
    color: #007bff; /* Цвет цены */
    margin-bottom: 15px; /* Отступ снизу */
}

/* Стили для иконки просмотра */
.fas.fa-eye {
    font-size: 24px; /* Размер иконки */
    color: #007bff; /* Цвет иконки */
    position: absolute;
    top: 15px;
    right: 15px;
}

/* Стили для изображения продукта */
#productimage {
    width: 20%; /* Ширина 100% */
  
    border-radius: 10px; /* Скругленные углы */
    margin-bottom: 15px; /* Отступ */
}

/* Стили для названия продукта */
.name {
    font-size: 18px; /* Размер шрифта */
    font-weight: 600; /* Полужирный */
    margin: 10px 0; /* Отступ сверху и снизу */
}

/* Стили для деталей продукта */
.details {
    font-size: 14px; /* Размер шрифта */
    color: #666; /* Цвет текста */
    margin-bottom: 15px; /* Отступ снизу */
}

/* Стили для поля количества */
.qty {
    width: 60px; /* Ширина поля */
    padding: 5px; /* Отступ внутри поля */
    border: 1px solid #ccc; /* Цвет границы */
    border-radius: 5px; /* Скругленные углы */
    margin-bottom: 15px; /* Отступ снизу */
}

/* Стили для кнопки */
.btn {
    background-color: #007bff; /* Цвет кнопки */
    color: #ffffff; /* Цвет текста кнопки */
    border: none; /* Убираем границу */
    padding: 10px 15px; /* Отступы внутри кнопки */
    border-radius: 5px; /* Скругленные углы */
    cursor: pointer; /* Курсор при наведении на кнопку */
    transition: background-color 0.3s; /* Плавный переход цвета фона */
}

.btn:hover {
    background-color: #0056b3; /* Цвет фона кнопки при наведении */
}
.flex-service{
   display: flex;
   column-gap: 15px;
}
.details{
   font-weight: 600;
   font-size: 20px;
}
.cart-total{
   display:flex;
   column-gap: 15px;
}
</style>

<section class="shopping-cart">

   <h1 class="title">Список услуг</h1>

   <div class="box-container">

   <?php
      $grand_total = 0;
      $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $select_cart->execute([$user_id]);
      if($select_cart->rowCount() > 0){
         while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" method="POST" class="box">
      <a href="cart.php?delete=<?= $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>

      <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="">
      <div class="name"><?= $fetch_cart['name']; ?></div>
      <div class="price">$<?= $fetch_cart['price']; ?>/-</div>
      <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
  
      <div class="sub-total"> Стоимость: <span>$<?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span> </div>
   </form>
   <?php
      $grand_total += $sub_total;
      }
   }else{
      echo '<p class="empty">your cart is empty</p>';
   }
   ?>
   </div>

   <div class="cart-total">
      <p>Полная стоимость: <span>$<?= $grand_total; ?>/-</span></p>
      <a href="cart.php?delete_all" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Очистить корзину</a>
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Оформление заказа</a>
   </div>

</section>


<?php include 'footer.php'; ?>


</body>
</html>