<?php

namespace Hexlet\Code\Utilities;

function calculateInt(int $a, int $b, string $operator): int
{
    return match ($operator) {
        '+' => $a + $b,
        '-' => $a - $b,
        '*' => $a * $b,
    };
}

function getRandomArrayIndex(array $arr): int
{
    return mt_rand(0, count($arr) - 1);
}

function getRandomArrayElement(array $arr): string | int
{
    $randIndex = getRandomArrayIndex($arr);
    return $arr[$randIndex];
}

function isEven(int $value): bool
{
    return $value % 2 === 0;
}

function getNumericalSequence(int $size, int $start, int $step): array
{
    $sequence = [];
    $value = $start;
    for ($i = 0; $i < $size; $i += 1) {
        $sequence[] = $value;
        $value += $step;
    }

    return $sequence;
}

function findGCD(int $a, int $b): int
{
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }

    return $a;
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}
