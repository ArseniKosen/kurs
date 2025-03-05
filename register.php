<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);

   if($select->rowCount() > 0){
      $message[] = 'user email already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert->execute([$name, $email, $pass]);

         if($insert){
            $message[] = 'registered successfully!';
            header('location:login.php');
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
   <title>Register Page</title>

   <link rel="stylesheet" href="css/style.css">
   <script src="https://kit.fontawesome.com/1a2cce4b7e.js" crossorigin="anonymous"></script>
   
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
   
</head>
<body>


<section class="form-container">

   <form action="" enctype="multipart/form-data" method="POST">
      <h3>Регистарция</h3>
      <input type="text" name="Имя" class="boxname" placeholder="Name" required>
      <input type="email" name="email" class="boxemail" placeholder="Email" required>
      <input type="password" name="pass" class="box" placeholder="Password" required>
      <input type="password" name="cpass" class="box" placeholder="Подтвердить пароль" required>

      <input type="submit" value="Подтвердить" class="btn" name="submit">
      <p> <a href="login.php">Войти в аккаунт</a></p>
   </form>

</section>


</body>
</html>