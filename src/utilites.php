<?php

namespace Hexlet\Code\Utilities;

function getRandomArrayElement(array $arr)
{
    $randIndex = mt_rand(0, count($arr) - 1);
    return $arr[$randIndex];
}
