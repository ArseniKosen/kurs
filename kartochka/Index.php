<?php
include 'functions.php';
include 'workdays.php';
include 'loops.php';
include 'arrays.php';
include 'strings.php';

?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Задания</title>
</head>
<body>
<h3>Вывод ФИО</h3>
<h3>Результат функции y:</h3>
<?php
// Задаем значения переменных
$a = 3;
$x = 2.5; // Значение x для подсчета

try {
    echo calculateY($x, $a); // Передаем x и a
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<h3>Количество дней в текущем месяце:</h3>
<?php
$totalDays = getTotalDaysInCurrentMonth();
echo "Количество дней в текущем месяце: " . $totalDays;
?>

<h3>Вывод имени и фамилии:</h3>
<?php
$surname = "Косенко"; // Фамилия
$name = "Arseni"; // Имя

// Определяем длину строки с именем
$nameLength = strlen($name);

// Сцепляем строки
$fullName = $surname . " " . $name;

// Преобразуем строку имени в нижний регистр
$lowercaseName = strtolower($name);

echo "Длина строки имени: " . $nameLength . "<br>";
echo "Полное имя: " . $fullName . "<br>";
echo "Имя в нижнем регистре: " . $lowercaseName . "<br>";
?>


<h3>Ассоциативный массив - Продукты питания:</h3>
<?php
// Создание ассоциативного массива Продукты питания
$products = [
    'Хлеб' => 5000,
    'Молоко' => 800,
    'Сметана' => 7000
];

// Вывод стоимости молока
echo "Стоимость молока: " . $products['Молоко'] . " руб.<br>";

// Сортировка массива в порядке убывания стоимости товара
arsort($products);

// Вывод отсортированного массива
echo "Отсортированный массив по убыванию стоимости:<br>";
foreach ($products as $product => $price) {
    echo "$product: $price руб.<br>";
}
?>



</body>
</html>