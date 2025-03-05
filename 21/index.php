<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sweet Paradise</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Sail&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles/normalize.css" />
    <link rel="stylesheet" href="styles/styles.css" />
  </head>
  <body>
    <header class="main-header">
      <div class="container">
        <div class="wrapper">
          <h2 class="main-logo">Sweet Paradise</h2>
          <nav>
            <ul class="site-nav">
              <li><a href="#">О нас</a></li>
              <li><a href="#">Каталог</a></li>
              <li><a href="#">Отзывы</a></li>
              <li><a href="#">Контакты</a></li>
            </ul>
            <button class="burger-button">
              <img src="images/burger-icon.svg" alt="" />
            </button>
          </nav>
          <div class="user-cart">
            <img width="40" height="40" src="/images/cart.png" alt="" />
          </div>
        </div>
      </div>
    </header>
    <main>
      <section class="hero">
        <div class="container">
          <div class="hero-blocks">
            <div class="hero-column">
              <h2>Sweet Paradise</h2>
              <h3>Мы сделаем вашу жизнь слаще!</h3>
              <div class="two_button_flex">
                <a class="first-block-text" href="#">Выбрать десерт</a>
                <a class="second-block-text" href="#">Создать свой</a>
              </div>
              <img
                class="hero-video-img--desktop"
                width="340"
                height="220"
                src="/images/video_first_block.png"
              />
            </div>
            <div class="hero-column">
              <img
                class="hero-item-image active"
                src="images/hero-item-1.png"
                alt=""
              />
              <img
                class="hero-item-image"
                src="images/hero-item-2.png"
                alt=""
              />
              <img
                class="hero-item-image"
                src="images/hero-item-3.png"
                alt=""
              />
              <p class="hero-price">
                <span class="active">30</span>
                <span>40</span>
                <span>35</span>
                грн
              </p>
              <p class="third-block-text">
                <span class="active">Ванильный</span>
                <span>Шоколадный</span>
                <span>Карамельный</span>
              </p>
              <div class="hero-controls">
                <button class="hero-prev-button hero-button">
                  <img src="images/icon-arrow-left.png" alt="" />
                </button>
                <button class="hero-next-button hero-button">
                  <img src="images/icon-arrow-left.png" alt="" />
                </button>
              </div>
              <img
                class="hero-video-img--tablet"
                width="340"
                height="220"
                src="/images/video_first_block.png"
              />
            </div>
          </div>
        </div>
      </section>

      <section class="features">
        <div class="container">
          <h2 class="main-title">Почему у нас вкусно?</h2>
          <ul class="features-list">
            <li>
              <div class="features-icon">
                <img class="features-img" src="/images/1circle.png" alt="" />
              </div>
              <p class="features-text">Качественные продукты</p>
            </li>
            <li>
              <div class="features-icon">
                <img class="features-img" src="/images/2circle.png" alt="" />
              </div>
              <p class="features-text">Дорогое оборудование</p>
            </li>
            <li>
              <div class="features-icon">
                <img class="features-img" src="/images/3circle.png" alt="" />
              </div>
              <p class="features-text">Уникальные рецепты</p>
            </li>
            <li>
              <div class="features-icon">
                <img class="features-img" src="/images/4circle.png" alt="" />
              </div>
              <p class="features-text">Доступные цены</p>
            </li>
            <li>
              <div class="features-icon">
                <img class="features-img" src="/images/5circle.png" alt="" />
              </div>
              <p class="features-text">Лучшие кондитеры</p>
            </li>
            <li>
              <div class="features-icon">
                <img class="features-img" src="/images/6circle.png" alt="" />
              </div>
              <p class="features-text">Программа лояльности</p>
            </li>
          </ul>
        </div>
      </section>
      <section class="goods">
        <div class="container">
          <h2 class="main-title">Попробуйте наши новинки</h2>
          <ul class="goods-list">
            <li>
              <img width="394" height="394" src="/images/1good.png" alt="" />
              <h3>Панна Котта</h3>
              <p class="good-description">
                Свежие яйца, желток, сахар, маскарпоне, готовое печенье
                "Савоярди", эспрессо, коньяк, какао, соль
              </p>
              <p class="good-cost">70 грн / 200 г</p>
              <p class="goods-button">В корзину</p>
            </li>
            <li>
              <img width="394" height="394" src="/images/2good.png" alt="" />
              <h3>Тирамису</h3>
              <p class="good-description">
                Свежие яйца, Свежие яйца, желток, сахар, маскарпоне, готовое
                печенье "Савоярди", эспрессо, коньяк, какао, соль
              </p>
              <p class="good-cost">80 грн / 200 г</p>
              <p class="goods-button">В корзину</p>
            </li>
            <li>
              <img width="394" height="394" src="/images/3good.png" alt="" />
              <h3>Яблочный тарт</h3>
              <p class="good-description">
                Свежие яйца, Свежие яйца, желток, сахар, маскарпоне, готовое
                печенье "Савоярди", эспрессо, коньяк, какао, соль
              </p>
              <p class="good-cost">80 грн / 200 г</p>
              <p class="goods-button">В корзину</p>
            </li>
          </ul>
        </div>
      </section>
      <section class="timing">
        <div class="container">
          <h2 class="main-title">Как мы работаем?</h2>
          <ul class="timing-wrapper">
            <li>
              <img width="100" height="100" src="/images/01.png" alt="" />
              <h3>Получаем заказ</h3>
              <p>Получаем заказ и связываемся с Вами для уточнения деталей</p>
            </li>
            <li>
              <img width="100" height="100" src="/images/02.png" alt="" />
              <h3>Готовим заказ</h3>
              <p>Готовим заказ в строгом соответствии с пожеланиями клиента</p>
            </li>
            <li>
              <img width="100" height="100" src="/images/03.png" alt="" />
              <h3>Отправляем товар</h3>
              <p>Отправляем Ваш заказ ранее утвержденным Вами способом</p>
            </li>
            <li>
              <img width="100" height="100" src="/images/04.png" alt="" />
              <h3>Доставка и оплата</h3>
              <p>Наш курьер доставит товар по Вашему адресу прямо в руки</p>
            </li>
          </ul>
        </div>
      </section>
      <section class="catalog">
        <div class="container">
          <h2 class="main-title">Каталог вкусняшек</h2>
          <ul class="timing-wrapper catalog-list">
            <li>
              <img width="101" height="101" src="/images/1cat.png" alt="" />
              <h3>Эклер</h3>
            </li>
            <li>
              <img width="187" height="125" src="/images/2cat.png" alt="" />
              <h3>Макарун</h3>
            </li>
            <li>
              <img
                width="149"
                height="208"
                src="/images/selectcat.png"
                alt=""
              />
              <h3>Капкейк</h3>
            </li>
            <li>
              <img width="160" height="160" src="/images/4cat.png" alt="" />
              <h3>Маффин</h3>
            </li>
            <li>
              <img width="135" height="135" src="/images/5cat.png" alt="" />
              <h3>Пончик</h3>
            </li>
          </ul>
          <div class="catalog-main-list">
            <div class="catalog-item-1 catalog-item">
              <img src="/images/1tov.png" alt="" width="304" height="354" />
              <h3>Капкейк (Ваниль)</h3>
              <p class="good-description">
                Свежие яйца, желток, сахар, маскарпоне, готовое печенье
                "Савоярди", эспрессо, коньяк, какао, соль
              </p>
              <p class="good-cost">30 грн / 80 г</p>
              <a class="goods-button" href="#">В корзину</a>
            </div>
            <div class="catalog-item-2 catalog-item">
              <img src="/images/2tov.png" alt="" width="304" height="354" />
              <h3>Капкейк (вишня)</h3>
              <p class="good-description">
                Свежие яйца, желток, сахар, маскарпоне, готовое печенье
                "Савоярди", эспрессо, коньяк, какао, соль
              </p>
              <p class="good-cost">40 грн / 90 г</p>
              <a class="goods-button" href="#">В корзину</a>
            </div>
            <div class="catalog-item-3 catalog-item">
              <img src="/images/3tov.png" alt="" width="304" height="354" />
              <h3>Капкейк (Бизе)</h3>
              <p class="good-description">
                Свежие яйца, желток, сахар, маскарпоне, готовое печенье
                "Савоярди", эспрессо, коньяк, какао, соль
              </p>
              <p class="good-cost">35 грн / 70 г</p>
              <a class="goods-button" href="#">В корзину</a>
            </div>
            <div class="catalog-item-4 catalog-item">
              <img src="/images/4tov.png" alt="" width="304" height="354" />
              <h3>Капкейк (Карамель)</h3>
              <p class="good-description">
                Свежие яйца, желток, сахар, маскарпоне, готовое печенье
                "Савоярди", эспрессо, коньяк, какао, соль
              </p>
              <p class="good-cost">30 грн / 80 г</p>
              <a class="goods-button" href="#">В корзину</a>
            </div>
            <div class="catalog-item-5 catalog-item">
              <img src="/images/5tov.png" alt="" width="304" height="354" />
              <h3>Капкейк (Шоколад)</h3>
              <p class="good-description">
                Свежие яйца, желток, сахар, маскарпоне, готовое печенье
                "Савоярди", эспрессо, коньяк, какао, соль
              </p>
              <p class="good-cost">40 грн / 90 г</p>
              <a class="goods-button" href="#">В корзину</a>
            </div>
            <div class="catalog-item-6 catalog-item">
              <img src="/images/6tov.png" alt="" width="304" height="354" />
              <h3>Капкейк (Крем)</h3>
              <p class="good-description">
                Свежие яйца, желток, сахар, маскарпоне, готовое печенье
                "Савоярди", эспрессо, коньяк, какао, соль
              </p>
              <p class="good-cost">35 грн / 70 г</p>
              <a class="goods-button" href="#">В корзину</a>
            </div>
          </div>
        </div>
      </section>

      <section class="order">
        <div class="order-background-wrapper">
          <div class="container">
            <div class="order-content">
              <h2>
                Закажите
                <span>индивидуальный</span>
                набор сладостей
              </h2>
              <p class="order-p">
                Заполните форму и мы перезвоним для составления Вашего заказа
              </p>
              <form action="">
                <fieldset class="order-inputs">
                  <input
                    class="order-input-name"
                    type="text"
                    placeholder="Эвелина"
                  />
                  <input
                    class="order-input-phone"
                    type="tel"
                    placeholder="+38 (066) 343 45 43"
                  />
                </fieldset>
              </form>
              <a class="order-button" href="#">Больше товаров</a>
            </div>
          </div>
        </div>
      </section>

      <section class="review">
        <h2 class="main-title">Отзывы наших сладкоежек</h2>
        <div class="container">
          <div class="parent">
            <img
              class="div1"
              width="460"
              height="306"
              src="/images/1vid.png"
              alt=""
            />
            <img
              class="div2"
              width="460"
              height="306"
              src="/images/2vid.png"
              alt=""
            />
            <img
              class="div3"
              width="460"
              height="306"
              src="/images/3vid.png"
              alt=""
            />
            <img
              class="div4"
              width="460"
              height="652"
              src="/images/4vid.png"
              alt=""
            />
            <img
              class="div5"
              width="460"
              height="306"
              src="/images/5vid.png"
              alt=""
            />
            <img
              class="div6"
              width="460"
              height="306"
              src="/images/6vid.png"
              alt=""
            />
            <img
              class="div7"
              width="460"
              height="459"
              src="/images/7vid.png"
              alt=""
            />
            <div class="div8 review-button">
              <p>Больше видеоотзывов</p>
            </div>
          </div>
        </div>
      </section>
      <section class="instagram">
        <div class="container">
          <h2 class="main-title">Мы в Instagram</h2>
          <div class="instagram-posts">
            <img class="instagram-post" src="/images/1ins.png" />
            <img class="instagram-post" src="/images/2ins.png" />
            <img class="instagram-post" src="/images/3ins.png" />
            <img class="instagram-post" src="/images/4ins.png" />
            <img class="instagram-post" src="/images/5ins.png" />
            <img class="instagram-post" src="/images/6ins.png" />
          </div>
          <a class="goods-button instagram-button" href="#"> Подписаться </a>
        </div>
      </section>
      <section class="order-form">
        <div class="container">
          <h2 class="main-title">Время оформить заказ! :)</h2>
          <div class="order-form-content">
            <p class="order-form-logo">Sweet Paradise</p>
            <div class="order-form-column-middle">
              <h3>Готовы заказать?</h3>
              <p class="order-form-text">
                Введите Ваши данные и мы обязательно перезвоним
              </p>
              <form action="">
                <fieldset class="order-form-inputs">
                  <input type="text" placeholder="Ваше имя" />
                  <input type="tel" placeholder="Номер телефона" />
                  <button class="goods-button order-form-button">
                    Отправить
                  </button>
                </fieldset>
              </form>
              <p class="order-form-warning">
                Нажимая на кнопку, Вы даете согласие на обработку Ваших
                персональных данных
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="main-footer">
      <div class="container">
        <div class="wrapper main-footer-wrapper">
          <h2 class="main-logo">Sweet Paradise</h2>
          <nav>
            <ul class="site-nav-footer">
              <li><a>О нас</a></li>
              <li><a>Каталог</a></li>
              <li><a>Отзывы</a></li>
              <li><a>Контакты</a></li>
            </ul>
          </nav>
          <div class="user-cart">
            <p>+38 (050) 402 40 30</p>
          </div>
        </div>
        <h4 class="main-footer-copyright">Все права сохранены/2021-2022</h4>
      </div>
    </footer>
    <div class="ad-modal">
      <button class="close-btn" type="button">
        <img src="images/close-icon.svg" width="20" height="20" alt="" />
      </button>
      <p>Здесь могла быть ваша реклама</p>
    </div>
    <button class="scroll-top-button">
      <img src="images/arrow-top-icon.svg" alt="" />
    </button>
    <script src="js/scripts.js"></script>
    
  </body>
</html>
