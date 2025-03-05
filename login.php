<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $sql = "SELECT * FROM `users` WHERE email = ? AND password = ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$email, $pass]);
   $rowCount = $stmt->rowCount();  

   $row = $stmt->fetch(PDO::FETCH_ASSOC);

   if($rowCount > 0){

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_products.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }else{
         $message[] = 'no user found!';
      }

   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Страница входа</title>

   <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body id='loginpage'>
<style>
   form {
    background-color: #fff; /* Цвет фона формы */
    border-radius: 10px; /* Скругленные углы */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Тень */
    padding: 30px; /* Отступы внутри формы */
    width: 500px; /* Ширина формы */
    margin: 50px auto; /* Центровка формы на странице */
    text-align: center; /* Выравнивание текста в центре */
}

/* Стили для заголовка формы */
form h3 {
    margin-bottom: 20px; /* Отступ снизу */
    font-size: 20px; /* Размер шрифта заголовка */
    color: #333; /* Цвет текста */
}

/* Стили для текстовых полей */
.box {
    width: 100%; /* Ширина полей */
    padding: 10px; /* Отступы внутри полей */
    margin-bottom: 15px; /* Отступ между полями */
    border: 1px solid #ccc; /* Цвет границы */
    border-radius: 5px; /* Скругленные углы */
    font-size: 16px; /* Размер шрифта */
}

/* Стили для кнопки */
.btn {
    width: 100%; /* Ширина кнопки */
    background-color: #007bff; /* Цвет кнопки */
    color: #fff; /* Цвет текста кнопки */
    border: none; /* Убираем границу */
    padding: 10px; /* Отступы внутри кнопки */
    border-radius: 5px; /* Скругленные углы */
    cursor: pointer; /* Курсор при наведении */
    font-size: 16px; /* Размер шрифта */
    transition: background-color 0.3s; /* Плавный переход цвета фона */
}

.btn:hover {
    background-color: #0056b3; /* Цвет кнопки при наведении */
}

/* Стили для ссылки на регистрацию */
form p {
    margin-top: 15px; /* Отступ сверху */
}

form p a {
    color: #007bff; /* Цвет ссылки */
    text-decoration: none; /* Убираем подчеркивание у ссылки */
}

form p a:hover {
    text-decoration: underline; /* Подчеркивание при наведении на ссылку */
}
   </style>
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
   
<section class="form-container">

   <form action="" method="POST">
      <h3>Вход в аккаунт</h3>
      <input type="email" name="email" class="box" placeholder="Email" required>
      <input type="password" name="pass" class="box" placeholder="Password" required>
      <input type="submit" value="Войти" class="btn" name="submit">
      <p> <a href="register.php">Регистрация</a></p>
   </form>

</section>


</body>
</html>