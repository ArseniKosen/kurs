<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['update_product'])){

   $pid = $_POST['pid'];
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
   $old_image = $_POST['old_image'];

   $update_product = $conn->prepare("UPDATE `products` SET name = ?, category_id = ?, details = ?, price = ? WHERE id = ?");
   $update_product->execute([$name, $category_id, $details, $price, $pid]);

   $message[] = 'Product updated successfully!';

   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'Image size is too large!';
      } else {
         $update_image = $conn->prepare("UPDATE `products` SET image = ? WHERE id = ?");
         $update_image->execute([$image, $pid]);

         if($update_image){
            move_uploaded_file($image_tmp_name, $image_folder);
            unlink('uploaded_img/'.$old_image);
            $message[] = 'Image updated successfully!';
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Product</title>

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
<section class="update-product">
   <h1 class="title">Update Product</h1>   

   <?php
      $update_id = $_GET['update'];
      $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
      $select_products->execute([$update_id]);
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="old_image" value="<?= $fetch_products['image']; ?>">
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <input type="text" name="name" placeholder="Enter product name" required class="box" value="<?= $fetch_products['name']; ?>">
      <input type="number" name="price" min="0" placeholder="Enter product price" required class="box" value="<?= $fetch_products['price']; ?>">
      <select name="category" class="box" required>
         <option value="" disabled>Выбор категории</option>
         <?php
         $select_categories = $conn->prepare("SELECT * FROM `categories`");
         $select_categories->execute();
         while($fetch_category = $select_categories->fetch(PDO::FETCH_ASSOC)){
            echo '<option value="'.$fetch_category['id'].'" '.($fetch_category['id'] == $fetch_products['category_id'] ? 'selected' : '').'>'.$fetch_category['name'].'</option>';
         }
         ?>
      </select>
      <textarea name="details" required placeholder="Enter product details" class="box" cols="30" rows="10"><?= $fetch_products['details']; ?></textarea>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <div class="flex-btn">
         <input type="submit" class="btn" value="Обновить" name="update_product">
         <a href="admin_products.php" class ="option-btn">Назад</a>
      </div>
   </form>
   <?php
         }
      } else {
         echo '<p class="empty">No products found!</p>';
      }
   ?>
</section>

<script src="js/script.js"></script>

</body>
</html>