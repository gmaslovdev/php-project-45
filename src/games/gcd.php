<?php

namespace Hexlet\Code\Games\Gcd;

use function Hexlet\Code\Utilities\findGCD;
use function Hexlet\Code\GameEngin\start;

use const Hexlet\Code\Config\ROUNDS;
use const Hexlet\Code\Config\MIN_GCD_NUMBER;
use const Hexlet\Code\Config\MAX_GCD_NUMBER;
use const Hexlet\Code\Config\GCD_RULES;

function createQuestion($a, $b): string
{
    return "$a $b";
}

function createAnswer($a, $b): string
{
    return findGCD($a, $b);
}

function getRound(): array
{
    $first_value = mt_rand(MIN_GCD_NUMBER, MAX_GCD_NUMBER);
    $second_value = mt_rand(MIN_GCD_NUMBER, MAX_GCD_NUMBER);

    return [
        'question' => createQuestion($first_value, $second_value),
        'answer' => createAnswer($first_value, $second_value),
    ];
}

function startGame(): void
{
    start(
        GCD_RULES,
        __NAMESPACE__ . '\getRound',
        ROUNDS
    );
}
