<?php
function processArray($arr) {
    $minIndex = array_search(min($arr), $arr);
    $temp = $arr[$minIndex];
    $arr[$minIndex] = $arr[count($arr) - 1];
    $arr[count($arr) - 1] = $temp;
    return $arr;
}