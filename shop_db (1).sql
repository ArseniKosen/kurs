-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 01 2025 г., 12:42
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(43, 10, 69, 'Разработка чат-бота для Telegram', 100, 1, 'Без названия.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Сайт-визитка'),
(2, 'Интернет магазин'),
(3, 'Мобильное приложение'),
(4, 'Веб-сайт'),
(5, 'Deckstop приложение'),
(6, 'Чат-бот'),
(7, 'Модернизация'),
(8, 'Дизайн');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`, `review`) VALUES
(1, 3, 'Laura', 'laura.iliescu@gmail.com', '+40726152473', 'I would like to order a custom birthday cake.', 'It serves a wide variety of delicious sweets, cakes and confectioneries at an affordable prices. The quality and tastes of the dessert are unique. The atmosphere is pleasant and the staff is very kind and open to client suggestions. Really happy with the purchase, it was a complicated order but it was handled perfectly. I’d definitely return to YumCakes confectionary again.'),
(2, 4, 'Sofia', 'sofia@gmail.com', '+40727136986', '-', 'It&#39;s my third time ordering from YumCakes and I can say they never disappoint. The sweets are just amazing and they are packed carefully. I took their vanilla cake for our office party celebration and everyone loved it. My favorites must be their waffles that are full of flavour, making a great breakfast. Definitely buying more and will recommend to my friends.');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(8, 10, 'Арсений', '375255004233', 'ars@gmail.com', 'cash on delivery', 'flat no.      - ', ', Dark Chocolate Waffle ( 1 ), Landing-page ( 1 ), Мобильное приложение IOS ( 1 )', 509, '27-Feb-2025', 'pending'),
(9, 10, 'Арсений', '382564', 'ars@gmail.com', 'credit card-Visa', 'flat no.      - ', ', Модернизация сайта ( 1 ), Разработка чат-бота для Telegram ( 1 ), Мобильное приложение для Android ( 1 )', 600, '27-Feb-2025', 'pending'),
(10, 10, 'Арсений', '3762', 'ars@gmail.com', 'cash on delivery', 'flat no.      - ', ', Разработка чат-бота для Telegram ( 2 ), Создание дизайна в Figma ( 1 )', 350, '28-Feb-2025', 'pending');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `details`, `price`, `image`) VALUES
(63, 'Корпоративный сайт', 4, 'Профессиональное веб-пространство для вашей компании, взаимодействия с клиентами и партнёрами, укрепления имиджа и поиска новых возможностей.', 500, 'services__corporate.png'),
(64, 'Сайт-каталог', 2, 'Онлайн-платформа, которая предоставляет структурированную информацию о товарах, услугах или компаниях. Отличный способ заявить о себе и о своем бизнесе.', 450, 'services__catalog.png'),
(65, 'Онлайн магазин', 2, 'Функциональный сайт для онлайн-продаж, увеличения продаж, привлечения клиентов и расширения бизнеса.', 500, 'internet-magazin 1.png'),
(66, 'Мобильное приложение для Android', 3, 'Специалисты Inera создают мобильные приложения для  Android, а также кросс-платформенные решения.', 300, 'a4960f11-0ff4-4ace-b2a0-e3d908c51b58 2.png'),
(67, 'Мобильное приложение IOS', 3, 'Специалисты Inera создают мобильные приложения для iOS  а также кросс-платформенные решения.', 300, 'adapt-mobileBlock.png'),
(69, 'Разработка чат-бота для Telegram', 6, 'Чат-боты от Inera – это виртуальные консультанты, которые заменяют сотрудников техподдержки, администраторов и менеджеров. Они работают круглосуточно, автоматизируют общение с клиентами, продают товары и услуги, доступны с любого устройства и обеспечивают бесплатную рассылку по базе подписчиков.', 100, 'Без названия.jpg'),
(70, 'Разработка чат-бота для  WhatsApp', 6, 'Чат-боты от Inera – это виртуальные консультанты, которые заменяют сотрудников техподдержки, администраторов и менеджеров. Они работают круглосуточно, автоматизируют общение с клиентами, продают товары и услуги, доступны с любого устройства и обеспечивают бесплатную рассылку по базе подписчиков.', 100, 'Без названия.jpg'),
(71, 'Создание дизайна в Figma', 8, 'В нашем агентстве мы предоставляем профессиональные услуги по созданию уникального и привлекательного дизайна для сайтов и мобильных приложений. Мы понимаем, что дизайн — это не просто эстетика, а важнейший инструмент для достижения бизнес-целей, повышения пользовательского опыта и формирования положительного имиджа вашей компании.', 150, 'Без названия (1).jpg'),
(72, 'Создание дизайна для приложения', 8, 'В нашем агентстве мы предоставляем профессиональные услуги по созданию уникального и привлекательного дизайна для сайтов и мобильных приложений. Мы понимаем, что дизайн — это не просто эстетика, а важнейший инструмент для достижения бизнес-целей, повышения пользовательского опыта и формирования положительного имиджа вашей компании.', 180, 'Без названия (2).jpg'),
(73, 'Модернизация сайта', 7, 'В современном мире цифровых технологий, эволюция вашего сайта или приложения является ключевым элементом для поддержания конкурентоспособности и удовлетворения потребностей пользователей. Наша услуга по модернизации сайтов и приложений предлагает комплексные решения, способствующие обновлению функциональности и дизайна и обеспечивающие вашему бизнесу свежий взгляд на цифровое взаимодействие.', 200, 'Без названия (3).jpg'),
(74, 'Модернизация приложения', 7, 'В современном мире цифровых технологий, эволюция вашего сайта или приложения является ключевым элементом для поддержания конкурентоспособности и удовлетворения потребностей пользователей. Наша услуга по модернизации сайтов и приложений предлагает комплексные решения, способствующие обновлению функциональности и дизайна и обеспечивающие вашему бизнесу свежий взгляд на цифровое взаимодействие.', 200, 'Без названия (4).jpg'),
(75, 'Приложение для бизнеса', 5, 'Если ваше предприятие требует уникального программного решения, мы предлагаем услуги по разработке специализированного настольного программного обеспечения, нацеленного на удовлетворение конкретных потребностей вашего бизнеса. Мы разрабатываем решения, которые помогут автоматизировать рутинные задачи, снизить затраты и повысить продуктивность.', 500, 'Без названия.png'),
(76, 'Разработка кроссплатформенных настольных приложений', 5, 'В наш век цифровых технологий кроссплатформенные настольные приложения становятся всё более популярными благодаря своей универсальности и доступности на различных операционных системах. Наша команда разработает для вас кроссплатформенное настольное приложение, которое будет работать на Windows, macOS и Linux, обеспечивая доступность для широкой аудитории пользователей.', 600, 'Без названия (1).png'),
(77, 'Сайт для фрилансера', 1, 'Профессиональное веб-пространство. Этот тип сайта предназначен для индивидуальных специалистов, работающих на фрилансе, таких как веб-дизайнеры, копирайтеры, программисты и фотографы. Сайт помогает фрилансерам продемонстрировать свои навыки, портфолио и способы связи с потенциальными клиентам', 300, 'Без названия (6).jpg'),
(78, 'Landing-page', 1, 'Одностраничный сайт для привлечения и удержания внимания посетителей, стимулирующий действия, такие как заполнение формы, покупка или подписка.', 250, 'main (2) 1.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(9, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(10, 'Арсений', 'ars@gmail.com', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
