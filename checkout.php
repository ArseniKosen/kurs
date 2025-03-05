<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['order'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $cart_query->execute([$user_id]);
   if($cart_query->rowCount() > 0){
      while($cart_item = $cart_query->fetch(PDO::FETCH_ASSOC)){
         $cart_products[] = $cart_item['name'].' ( '.$cart_item['quantity'].' )';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      };
   };

   $total_products = implode(', ', $cart_products);

   $order_query = $conn->prepare("SELECT * FROM `orders` WHERE name = ? AND number = ? AND email = ? AND total_products = ? AND total_price = ?");
   $order_query->execute([$name, $number, $email,  $total_products, $cart_total]);

   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }elseif($order_query->rowCount() > 0){
      $message[] = 'order placed already!';
   }else{
      $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, total_products, total_price, placed_on) VALUES(?,?,?,?,?,?,?)");
      $insert_order->execute([$user_id, $name, $number, $email,  $total_products, $cart_total, $placed_on]);
      $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);
      $message[] = 'order placed successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <script src="https://kit.fontawesome.com/1a2cce4b7e.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>
<style>
     body {

          
    }
    .display-orders{
padding-left:40%;
      padding-top:100px;
      font-weight: 600;
      font-size: 20px;
      align-items: center;
    }
    .checkout-orders{
      padding-left:40%;
      padding-top:50px;
      align-items: center;
   font-weight: 600;
   font-size: 20px;
    }
    .box{
 
}
.btn {
    background-color: #007bff; /* Цвет кнопки */
    color: #ffffff; /* Цвет текста кнопки */
    border: none; /* Убираем границу */
    padding: 10px 15px; /* Отступы внутри кнопки */
    border-radius: 5px; /* Скругленные углы */
    cursor: pointer; /* Курсор при наведении на кнопку */
    transition: background-color 0.3s; /* Плавный переход цвета фона */
}

</style>
<section class="display-orders">

   <?php
      $cart_grand_total = 0;
      $select_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $select_cart_items->execute([$user_id]);
      if($select_cart_items->rowCount() > 0){
         while($fetch_cart_items = $select_cart_items->fetch(PDO::FETCH_ASSOC)){
            $cart_total_price = ($fetch_cart_items['price'] * $fetch_cart_items['quantity']);
            $cart_grand_total += $cart_total_price;
   ?>
   <p> <?= $fetch_cart_items['name']; ?> <span>(<?= '$'.$fetch_cart_items['price'].'/- x '. $fetch_cart_items['quantity']; ?>)</span> </p>
   <?php
    }
   }else{
      echo '<p class="empty">Корзина пуста</p>';
   }
   ?>
   <div class="grand-total">Полная цена <span>$<?= $cart_grand_total; ?>/-</span></div>
</section>

<section class="checkout-orders">

   <form action="" method="POST">

      <h3>Оформление заказа</h3>

      <div class="flex">
         <div class="inputBox">
            <span>Имя:</span>
            <input type="text" name="name" placeholder="Введите имя" class="box" required>
         </div>
         <div class="inputBox">
            <span>Номер телефона:</span>
            <input type="number" name="number" placeholder="Введите телефон" class="box" required>
         </div>
         <div class="inputBox">
            <span> email:</span>
            <input type="email" name="email" placeholder="Введите email" class="box" required>
         </div>
       
           
      </div>

      <input type="submit" name="order" class="btn <?= ($cart_grand_total > 1)?'':'disabled'; ?>" value="Отправить заказ">

   </form>

</section>



<?php include 'footer.php'; ?>


</body>
</html>