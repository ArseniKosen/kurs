<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_wishlist'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);


   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_wishlist_numbers->rowCount() > 0){
      $message[] = 'already added to wishlist!';
   } elseif($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   } else {
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'added to wishlist!';
   }

}

if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   } else {
     
      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop</title>

   <link rel="stylesheet" href="css/style.css">
   <script src="https://kit.fontawesome.com/1a2cce4b7e.js" crossorigin="anonymous"></script>

</head>
<body>
   
<?php include 'header.php'; ?>

<style>
     body {

     }
     .p-category{
      padding-top:200px;
      display: flex;
      column-gap: 15px;
      align-items: center;
  justify-content: center;
     }
     .p-category a{
     font-size: 18px;
  

  position: relative;
  font-weight: 600;
  padding: 6px 12px;
  border: none;
  background-color: #ff9900;
  border-radius: 26px;

  color: #ffffff;
     }
     /* Общие стили для фильтров */
.filter-section {
    background-color: #f9f9f9; /* Цвет фона */
    padding: 20px; /* Отступы */
    border-radius: 8px; /* Скругленные углы */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Тень для эффекта подъема */
    max-width:800px; /* Максимальная ширина секции фильтра */
    margin: 20px auto; /* Центровка секции на странице */

}
.filter-section form {

    display: flex;

    column-gap: 15px;
}

/* Стили для текстовых полей */
.filter-section input[type="number"],
.filter-section select {
    width: 100%
    padding: 10px; /* Отступы внутри полей */
    margin-bottom: 15px; /* Отступ между элементами */
    border: 1px solid #ccc; /* Граница */
    border-radius: 5px; /* Скругленные углы */
    font-size: 16px; /* Размер шрифта */
   
}

/* Стили для кнопки */
.filter-section .btn {
    background-color: #007bff; /* Цвет кнопки */
    color: #ffffff; /* Цвет текста кнопки */
    border: none; /* Убираем границу */
    padding: 10px 15px; /* Отступы внутри кнопки */
    border-radius: 5px; /* Скругленные углы */
    cursor: pointer; /* Курсор при наведении на кнопку */
    font-size: 16px; /* Размер шрифта */
    transition: background-color 0.3s; /* Плавный переход цвета фона */
}

.filter-section .btn:hover {
    background-color: #0056b3; /* Цвет кнопки при наведении */
}

/* Стили для плейсхолдеров */
.filter-section input::placeholder {
    color: #aaa; /* Цвет текста плейсхолдера */
    opacity: 1; /* Гоняем непрозрачность */
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
</style>

<section class="p-category">
<a href="category.php?category_id=4">Веб-сайт</a>
   <a href="category.php?category_id=1">Сайт визитка</a>
   <a href="category.php?category_id=2">Интернет магазин</a>
   <a href="category.php?category_id=3">Мобильное приложение</a>
   <a href="category.php?category_id=5">Deckstop приложение</a>
   <a href="category.php?category_id=6">Чат-бот</a>
   <a href="category.php?category_id=7">Модернизация</a>
   <a href="category.php?category_id=8">Дизайн</a>
</section>

<!-- Filter Section -->
<section class="filter-section">
   <form action="" method="POST">
      <input type="number" name="min_price" placeholder="Минимальная цена" min="0" value="<?= isset($_POST['min_price']) ? htmlspecialchars($_POST['min_price']) : ''; ?>">
      <input type="number" name="max_price" placeholder="Максимальная цена" min="0" value="<?= isset($_POST['max_price']) ? htmlspecialchars($_POST['max_price']) : ''; ?>">
      <select name="sort">
         <option value="asc" <?= (isset($_POST['sort']) && $_POST['sort'] === 'asc') ? 'selected' : ''; ?>>По возрастанию</option>
         <option value="desc" <?= (isset($_POST['sort']) && $_POST['sort'] === 'desc') ? 'selected' : ''; ?>>По убыванию</option>
      </select>
      <input type="submit" value="Применить" class="btn">
   </form>
</section>

<section class="products">
   <h1 class="title">Услуги</h1>
   <div class="box-container">
   <?php
      // Filtering by price and category
      $min_price = isset($_POST['min_price']) ? filter_var($_POST['min_price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : 0;
      $max_price = isset($_POST['max_price']) && $_POST['max_price'] !== '' ? filter_var($_POST['max_price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : PHP_INT_MAX;
      $category_id = isset($_POST['category_id']) ? filter_var($_POST['category_id'], FILTER_SANITIZE_NUMBER_INT) : '';

      // Sorting
      $sort_order = isset($_POST['sort']) ? ($_POST['sort'] === 'asc' ? 'ASC' : 'DESC') : 'ASC';

      // Prepare SQL query
      $query = "SELECT * FROM `products` WHERE price BETWEEN ? AND ?";
      $params = [$min_price, $max_price];

      if ($category_id) {
          $query .= " AND category_id = ?";
          $params[] = $category_id;
      }

      $query .= " ORDER BY price $sort_order";

      $select_products = $conn->prepare($query);
      $select_products->execute($params);

      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" class="box" method="POST">
      <div class="price">€<span><?= htmlspecialchars($fetch_products['price']); ?></span>/-</div>

      <img src="uploaded_img/<?= htmlspecialchars($fetch_products['image']); ?>" alt="" id="productimage">
      <div class="name"><?= htmlspecialchars($fetch_products['name']); ?></div>
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <div class="flex-service">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      <div class="details"><?= $fetch_products['details']; ?></div>
      </div>
      <input type="number" min="1" value="1" name="p_qty" class="qty">
      <input type="submit" value="Добавить в корзину" class="btn" name="add_to_cart">
   </form>
   <?php
         }
      } else {
         echo '<p class="empty">No products found!</p>';
      }
   ?>
   </div>
</section>

<?php include 'footer.php'; ?>

</body>
</html>