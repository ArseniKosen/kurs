<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Заказы</title>

   <script src="https://kit.fontawesome.com/1a2cce4b7e.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>
<style>
.placed-orders{
   padding-top:100px;
}
.box{
   padding-top:15px;
   font-weight: 600;
   font-size: 20px;
}
</style>
<section class="placed-orders">

   <h1 class="title">Заказы</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
      $select_orders->execute([$user_id]);
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <p> Дата заказа : <span><?= $fetch_orders['placed_on']; ?></span> </p>
      <p> Имя : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> Телефон : <span><?= $fetch_orders['number']; ?></span> </p>
      <p> email : <span><?= $fetch_orders['email']; ?></span> </p>

      <p> Заказ : <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> Цена : <span>$<?= $fetch_orders['total_price']; ?>/-</span> </p>
      <p> Статус : <span style="color:<?php if($fetch_orders['payment_status'] == 'В ожидании'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">no orders placed yet!</p>';
   }
   ?>

   </div>

</section>


<?php include 'footer.php'; ?>


</body>
</html>