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

            <li>         <a href="admin_products.php">Услуги</a></li>
            <li>      <a href="admin_orders.php">Заказы</a></li>
            <li><a class="nav-menu-text" href="contact.php"> <div class="icons">

         
      </div></a></li>
            <li><a class="nav-menu-text" href="contact.php"> <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
      
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
       


         <a href="logout.php" class="delete-btn">Выйти из аккаунта</a>
      </div></a></li>

          </ul>
        </nav>
      </div>
      </div>
      <section class="nav-buttonMenu">
        <ul>
         <li><a class="Navbuttonlink" href="#examples">Веб-разработка</a></li>
         <li><a class="Navbuttonlink" href="#mobile">Разработка мобильных  <br>приложений</a></li>
         <li><a class="Navbuttonlink" href="#card-list">Разработка чат-ботов для <br> Telegram и WhatsApp</a></li>
         <li><a class="Navbuttonlink" href="#modern">Доработка и модернизация <br> существующих приложений</a></li>
    
        </ul>

     

     

   </div>
<script src="js/script.js"></script>
</header>
