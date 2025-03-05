<?php
// strings.php - работа со строками
function processStrings() {
    $s1 = "Я люблю Беларусь";  // Строка с фамилией
    $s2 = "Арсений";  // Строка с именем
    
    // Определяем длину строки s2
    $s2Length = strlen($s2);
    
    // Сцепление строк s1 и s2
    $fullString = $s1 . " " . $s2;
    
    // Преобразуем строку s2 в нижний регистр
    $s2Lowercase = strtolower($s2);

    echo "Длина строки S2 (имя): " . $s2Length . "<br>";
    echo "Сцепленная строка: " . $fullString . "<br>";
    echo "Строка S2 в нижнем регистре: " . $s2Lowercase . "<br>";
}