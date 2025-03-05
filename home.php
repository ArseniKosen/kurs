<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

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
   }else{
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
   <title>Главная страница</title>
   
   <link rel="stylesheet" href="css/style.css">
   <script src="https://kit.fontawesome.com/1a2cce4b7e.js" crossorigin="anonymous"></script>
</head>
<body>
   
<?php include 'header.php'; ?>
<style>
  .business-decision{
    display: flex;
  gap: 120px;
  align-items: center;
padding-left:20%;
  padding-top: 10px;
  }
</style>
<script src="js/script.js"></script>
<main>
      
        <!-- <div class="animated-logo"><img class="logo-animate" src="images/inera.png" alt="" width="83px" height="20.4px"></div> -->

        <section class="business-decision">
          <div class="business-decision-text">
            <h2 class="title-business">
              Надежные IT-решения для вашего бизнеса
            </h2>
            <p class="business-text">
              Inera – от стартапов до масштабных проектов. <br />Индивидуальные
              IT-решения для вашего успеха.
            </p>
            <div class="buisness-button">
              <img
                src="images/arrow-right.png"
                alt=""
                height="24px"
                width="24px"
              />
              <a href="#feedback">Обсудить проект</a>
            </div>
          </div>
          <div class="business-decision-boxs">
            <div class="business-decision-box1">
              <img
                class="business-decision-box1-image"
                src="images/box1-image.svg"
                alt=""
              />
              <h3 class="business-decision-box-text">
                Для бизнеса любого уровня
              </h3>
              <h3 class="business-decision-box-text2">
                Для корпорации или местной типографии
              </h3>
            </div>
            <div class="business-decision-box2">
              <div class="business-decision-double-box2">
                <img
                  class="business-decision-box2-image"
                  src="images/sparkle.svg"
                  alt=""
                />
                <h3 class="business-decision-box2-text">
                  Индивидуальный подход
                </h3>
                <h3 class="business-decision-box2-text2">
                  Адаптируем свои решения под конкретные потребности каждого
                  клиента.
                </h3>
              </div>
            </div>
            <div class="business-decision-box3">
              <div class="business-decision-double-box3">
                <img
                  class="business-decision-box3-image"
                  src="images/Group 1.png"
                  alt=""
                />
                <h3 class="business-decision-box3-text">
                  Поддержка и запуск стартапов
                </h3>
                <h3 class="business-decision-box3-text2">
                  Помощь в реализациии запуске новых проектов, а также поддержка
                  существующих продуктов
                </h3>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="image-container">
        <img class="image-container-img" src="images/Frame 14.png" alt="" />
        <img class="image-container-button" src="images/s 1.svg" alt="" />
      </div>
      <section id="AboutCompany" class="container-image">
        <div class="description">
          <p class="description-text">
            <span>INERA</span> – это белорусская IT-компания, занимающаяся
            разработкой комплексных решений для бизнеса любого уровня,
            реализацией и запуском стартапов, а также поддержкой существующих
            продуктов.
          </p>
          <p class="description-text2">
            Благодаря нашему большому опыту, мы знаем, как организовать процесс
            разработки с индивидуальным подходом к каждому клиенту.
          </p>
          <p class="description-text3">
            Вы будете уверены, что получите именно то, что Вам нужно. Мы
            воплотим Ваши самые смелые идеи в жизнь!
          </p>
        </div>
      </section>
      <section class="animation-section">
        <div class="text-box">
          <h4 class="text-box-title">ЕСТЬ БОЛЬШАЯ ИДЕЯ?</h4>
          <p class="text-box-description">
            Давай обсудим, чего мы можем 
            добиться вместе
          </p>
        </div>

        <a href="#feedback" class="spin"></a>
        
      </section>

      <section class="container-alt-examples">
        <h2 id="examples" class="title">Наши услуги</h2>
        <div class="web-production">
          <img
            class="examples-image"
            src="images/globe (2) 1.png"
            alt=""
            width="32px"
            height="32px"
          />
          <h3 class="examples-title">Веб разработка</h3>
        </div>
        <div class="popular-example">
          <div class="popular-example-box">
            <p class="popular-example-title-color">Популярный выбор</p>
            <h4 class="popular-example-title">Landing-page</h4>
            <p class="popular-example-text">
              Одностраничный сайт для привлечения и удержания внимания
              посетителей, стимулирующий действия, такие как заполнение формы,
              покупка или подписка.
            </p>
            <div class="example-button">
              <img
                class="example-button-image"
                src="images/arrow-right.png"
                alt=""
                height="24px"
                width="24px"
              />
              <a href="#feedback">Заказать сайт</a>
            </div>
          </div>
          <div class="popular-example-image">
            <div class="popular-elipse"></div>
            <img class="popular-image" src="images/popular.svg" alt="" />
          </div>
        </div>
        <div class="company-example">
          <div class="company-example-box example-left-column">
            <p class="company-example-title-color">
              Для больших компаний и гос. ресурсов
            </p>
            <h4 class="company-example-title">Корпоративный сайт</h4>
            <p class="company-example-text">
              Профессиональное веб-пространство для вашей компании,
              взаимодействия с клиентами и партнёрами, укрепления имиджа и
              поиска новых возможностей.
            </p>
            <div class="company-button">
              <img class="example-button-image" src="images/arrow-right (2).png" alt="" />
              <a href="#feedback">Заказать сайт</a>
            </div>
          </div>
          <div class="company-example-image example-right-column">
            <div class="company-elipse"></div>
            <img
              class="company-image"
              src="images/company image.svg"
              alt=""
            />
          </div>
        </div>
        <div class="short-example">
          <div class="short-example-box example-left-column">
            <div class="short-example-title-color">
              <img src="images/light 1.svg" alt="" />
              <p>В короткие сроки</p>
            </div>
            <h4 class="short-example-title">Сайт-каталог</h4>
            <p class="short-example-text">
              Мини-сайт, который кратко и стильно представляет человека или
              бизнес, акцентируя ключевые моменты и контактные данные. Быстрый и
              экономичный способ заявить о себе. Запуск за пять дней.
            </p>

            <div class="company-button">
              <img
                src="images/arrow-right (2).png"
                alt=""
                height="24px"
                width="24px"
              />
              <a href="#feedback">Заказать сайт</a>
            </div>
          </div>
          <div class="short-example-image example-right-column">
            <div class="short-elipse"></div>
            <img class="short-image" src="images/Catalog 1.png" alt="" />
          </div>
        </div>
        <div class="craftsman-example">
          <div class="craftsman-example-box example-left-column">
            <p class="craftsman-example-title-color">
              Для компаний и ремесленников
            </p>
            <h4 class="craftsman-example-title">Интернет-магазин</h4>
            <p class="craftsman-example-text">
              Функциональный сайт для онлайн-продаж, увеличения продаж,
              привлечения клиентов и расширения бизнеса.
            </p>
            <div class="craftsman-button">
              <img class="example-button-image" src="images/arrow-right (2).png" alt="" />
              <a href="#feedback">Заказать сайт</a>
            </div>
          </div>
          <div class="craftsman-example-image example-right-column">
            <div class="craftsman-elipse1"></div>
            <div class="craftsman-elipse2"></div>

            <img
              class="craftsman-image"
              src="images/internet-magazin 1.png"
              alt=""
            />
          </div>
        </div>
        <div class="mobile-example"></div>

        <div id="mobile" class="development-example">
          <div class="development-example-box">
            <div class="development-example-title">
              <img src="images/Icon.png" alt="" />
              <h4>Разработка мобильных приложений</h4>
            </div>
            <p class="development-example-text">
              Специалисты Inera создают мобильные приложения для <br>iOS и 
              Android, а также кросс-платформенные решения.
            </p>
            <div class="development-example-boxs">
              <div class="development-example-box1">
                <img src="images/android (1) 1.png" alt="" />
                <p>Разработка Android приложений</p>
              </div>
              <div class="development-example-box2">
                <img src="images/apple (1) 1.png" alt="" />
                <p>Разработка iOS приложений</p>
              </div>
              <div class="development-example-box3">
                <img src="images/apps 1.png" alt="" />
                <p>Разработка кроссплатформенных приложений</p>
              </div>
            </div>
            <div class="development-example-button">
              <img
                src="images/arrow-right (2).png"
                alt=""
                height="26px"
                width="26px"
              />
              <a href="#feedback">Заказать приложение</a>
            </div>
          </div>
          <div class="development-example-image">
            <div class="development-elipse1"></div>
            <div class="development-elipse2"></div>

            <img
              class="development-example-img"
              src="images/a4960f11-0ff4-4ace-b2a0-e3d908c51b58 2.png"
              alt=""
            />
          </div>
          <img
            class="develop-image-index"
            src="images/Mask group 228.png"
            alt=""
          />
          <img
            class="develop-image-index-adapt"
            src="images/adapt-mobileBlock.png"
            alt=""
          />
        </div>
      </section>
      <section id="card-list" class="container-alt-card card-list">
        <div>
          <div class="card-item">
            <div class="card-item-animate"></div>
            <img
              class="card-list-gif"
              src="images/android-animation.gif"
              alt=""
              width="80px"
              height="80px"
            />
            <h3 class="card-item-title">
              Разработка чат-ботов для Telegram и WhatsApp
            </h3>
            <p class="card-item-text">
              Чат-боты от Inera – это виртуальные консультанты, которые заменяют
              сотрудников техподдержки, администраторов и менеджеров. Они
              работают круглосуточно, автоматизируют общение с клиентами,
              продают товары и услуги, доступны с любого устройства и
              обеспечивают бесплатную рассылку по базе подписчиков.
            </p>

            <a href="#feedback" class="card-item-color" >Заказать бота</a>
          </div>
        </div>
        <div>
          <div id="modern" class="card-item2">
            <div class="card-item-animate2"></div>
            <img
              class="card-list-gif2"
              src="images/stairs-animation.gif"
              alt=""
              width="80px"
              height="80px"
            />
            <h3  class="card-item-title">
              Доработка и модернизация существующих приложений
            </h3>
            <p class="card-item-text">
              С течением времени любое ПО устаревает. Inera исправляет ошибки и
              недоработки, расширяет функциональность, редизайнит приложения и
              переносит продукты на современные технологии, обеспечивая
              поддержку вашего проекта.
            </p>

            <a href="#feedback" class="card-item-color2">Усовершенствовать продукт</a>
          </div>
        </div>
      </section>

      <section id="contacts" class="feedback container-alt">
        <div class="contacts container-alt">
          <p class="form-title">Свяжитесь с нами</p>
          <p class="form-title-2">
            Вы можете связаться с нами любым удобным для вас способом — по
            электронной почте, телефону или через форму обратной связи на сайте.
          </p>
          <p class="mail">hello@inera.by</p>
          <p class="number">+375 (29) 838-00-30</p>
          <div class="feedback-footer">
            <p>
              Работаем по <span>всему миру</span> и всегда готовы к новым
              вызовам
            </p>
            <p>
              Наши специалисты помогут вам на каждом этапе:
              <span>от идеи до реализации.</span>
            </p>
          </div>
        </div>
       
        <div id="feedback" class="form-container">
          <h1>Скажите привет! <span>И расскажите нам о своих идеях</span></h1>
          <form action="telegram.php" method="post">
            <input class="input-required" type="text" name="name" placeholder="Ваше имя" required />
            <input 
              type="text"
              name="organization"
              placeholder="Организация"
            />
            <input class="input-required"
              type="tel"
              name="phone"
              placeholder="Номер телефона"
        
            />
            <input class="input-required"
              type="email"
              name="email"
              placeholder="Email"
              required
            />
            <textarea
              type="text"
              name="textarea"
              placeholder="Опишите свой проект (необязательно)"
            ></textarea
            >
            <div class="checkbox-container">
              <div class="checkbox">
              <input type="checkbox" class="checkbox-polit"/>
              <label
                >Я соглашаюсь с
                <a href="Policy.html"
                  >политикой обработки персональных данных</a
                ></label
              >
            </div>
            
            <button type="submit" class="submit-button">Отправить</button>
            
          </div>
          </form>
        </div>
        <div class="notification">
          <div class="notification-image-block">
            <h3>Мы уже получили ваше письмо.
              <span>Спасибо, что связались с нами.</span></h3>
              <img src="images/notification.svg" alt="">
          </div>
          <p>Наши специалисты внимательно ознакомятся с вашим запросом и свяжутся
            с вами в ближайшее время</p>
          <p class="feedback-information">Ожидайте от нас обратной связи в течение 24 часов.</p>
          <p>Если ваш вопрос срочный, не стесняйтесь связаться с нами по телефону</p>
        </div>
      </section>
      <!-- <button class="Buttonswap">asd</button> -->
       <img class="ribbon-image-mobile" src="images/footer-mobile.svg" alt="" />
    </main>



<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
