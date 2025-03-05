<?php 

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<header class="header">
<div class="header">
      <div class="nav-menu container-alt ">
        <img class="logo-animate-header" src="images/inera.svg" alt="" />
        <div class="burger-mobile"><img  src="images/burger.svg" alt="" /></div>
        <nav class="main-nav">
          <ul class="main-nav-list">
            <li><a class="nav-menu-text" href="#AboutCompany">О компании</a></li>
            <li class="dropdown-nav">
              <p class="nav-menu-text-image" href="#"
                >Услуги
                <img
                  class="nav-menu-image"
                  src="images/angle-small-down (1) 1.png"
                  alt=""
              /></p>
            </li>
 
            <li><a class="nav-menu-text" href="#examples">Портфолио</a></li>
            <li><a class="nav-menu-text" href="#contacts">Контакты</a></li>
            <li><a class="nav-button" href="#feedback">Связаться с нами</a></li>
            <li><a class="nav-menu-text" href="home.php">Главная</a></li>
            <li><a class="nav-menu-text" href="shop.php">Услуги</a></li>
            <li><a class="nav-menu-text" href="orders.php">Заказы</a></li>
            <li><a class="nav-menu-text" href="contact.php"> <div class="icons">

         <a href="search_page.php" class="fas fa-search"></a>
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
         ?>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $count_cart_items->rowCount(); ?>)</span></a>
      </div></a></li>
            <li><a class="nav-menu-text" href="contact.php"> <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
       


         <a href="logout.php" class="delete-btn">Выйти из аккаунта</a>
      </div></a></li>

          </ul>
        </nav>
      </div>
      </div>
     

     

   </div>
<script src="js/script.js"></script>
</header>
