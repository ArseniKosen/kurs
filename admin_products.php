<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $category_id = $_POST['category']; // Изменено на category_id
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
   $select_products->execute([$name]);

   if($select_products->rowCount() > 0){
      $message[] = 'Product name already exists!';
   } else {
      $insert_products = $conn->prepare("INSERT INTO `products`(name, category_id, details, price, image) VALUES(?,?,?,?,?)");
      $insert_products->execute([$name, $category_id, $details, $price, $image]);

      if($insert_products){
         if($image_size > 2000000){
            $message[] = 'Image size is too large!';
         } else {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'New product added!';
         }
      }
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $select_delete_image = $conn->prepare("SELECT image FROM `products` WHERE id = ?");
   $select_delete_image->execute([$delete_id]);
   $fetch_delete_image = $select_delete_image->fetch(PDO::FETCH_ASSOC);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   $delete_products = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $delete_products->execute([$delete_id]);
   header('location:admin_products.php');
}

// Pagination
$limit = 16; // Number of products per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$show_products = $conn->prepare("SELECT p.*, c.name AS category_name FROM `products` p JOIN `categories` c ON p.category_id = c.id LIMIT ? OFFSET ?");
$show_products->bindValue(1, $limit, PDO::PARAM_INT);
$show_products->bindValue(2, $offset, PDO::PARAM_INT);
$show_products->execute();

$total_products = $conn->query("SELECT COUNT(*) FROM `products`")->fetchColumn();
$total_pages = ceil($total_products / $limit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>
   <script src="https://kit.fontawesome.com/1a2cce4b7e.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'admin_header.php'; ?>
<style>
 
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
.flex{
   display:flex;
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
    margin: 10px; /* Отступ между картами */
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
margin-left:47%;
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
.boxname{

   width:100px;
   background-color: #fff; /* Цвет фона */
    border-radius: 10px; /* Скругленные углы */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Тень */
    padding: 20px; /* Отступ */
    margin: 15px; /* Отступ между картами */
    transition: transform 0.3s; /* Плавный переход при наведении */
    text-align: center; /* Выравнивание текста в центре */
}
</style>
<section class="add-products">
   <h1 class="title">Добавить услугу</h1>
   <form action="" method="POST" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <input type="text" name="name" class="boxname" required placeholder="Название услуги">
            <select name="category" class="box" required>
               <option value="" selected disabled>Выбор категории</option>
               <?php
               $select_categories = $conn->prepare("SELECT * FROM `categories`");
               $select_categories->execute();
               while($fetch_category = $select_categories->fetch(PDO::FETCH_ASSOC)){
                  echo '<option value="'.$fetch_category['id'].'">'.$fetch_category['name'].'</option>';
               }
               ?>
            </select>
         </div>
         <div class="inputBox">
            <input type="number" min="0" name="price" class="box" required placeholder="Цена услуги">
            <input type="file" name="image" required class="box" accept="image/jpg, image/jpeg, image/png">
         </div>
      </div>
      <textarea name="details" class="box" required placeholder="Описание услуги" cols="30" rows="10"></textarea>
      <input type="submit" class="btn" value="Добавить услугу" name="add_product">
   </form>
</section>

<section class="show-products">
   <h1 class="title">Дабвленные услуги</h1>
   <div class="box-container">
   <?php
      if($show_products->rowCount() > 0){
         while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){  
   ?>
   <div class="box">
      <div class="price">€<?= $fetch_products['price']; ?>/-</div>
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <div class="cat"><?= $fetch_products['category_name']; ?></div>
      <div class="details"><?= strlen($fetch_products['details']) > 150 ? substr($fetch_products['details'], 0, 150) . '...' : $fetch_products['details']; ?></div>
      <div class="flex-btn">
         <a href="admin_update_product.php?update=<?= $fetch_products['id']; ?>" class="option-btn">Изменить</a>
         <a href="admin_products.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('Delete this product?');">Удалить</a>
      </div>
   </div>
   <?php
         }
      } else {
         echo '<p class="empty">Нету добавленных услуг</p>';
      }
   ?>
   </div>
</section>

<div class="pagination">
   <?php if($page > 1): ?>
      <a href="?page=<?= $page - 1; ?>" class="btn">Previous</a>
   <?php endif; ?>
   <?php for($i = 1; $i <= $total_pages; $i++): ?>
      <a href="?page=<?= $i; ?>" class="btn <?= $i === $page ? 'active' : ''; ?>"><?= $i; ?></a>
   <?php endfor; ?>
   <?php if($page < $total_pages): ?>
      <a href="?page=<?= $page + 1; ?>" class="btn">Next</a>
   <?php endif; ?>
</div>

<script src="js/script.js"></script>

</body>
</html>