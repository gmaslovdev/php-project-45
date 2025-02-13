<?php

namespace Hexlet\Code\Games\Gcd;

use function Hexlet\Code\Utilities\findGCD;
use function Hexlet\Code\GameEngin\start;

use const Hexlet\Code\Config\MIN_NUMBER;
use const Hexlet\Code\Config\MAX_NUMBER;
use const Hexlet\Code\Config\ROUNDS;
use const Hexlet\Code\Config\RULES;

const GAME_TITLE = 'brain-gcd';

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
    $first_value = mt_rand(MIN_NUMBER, MAX_NUMBER);
    $second_value = mt_rand(MIN_NUMBER, MAX_NUMBER);

    return [
        'question' => createQuestion($first_value, $second_value),
        'answer' => createAnswer($first_value, $second_value),
    ];
}

function startGame(): void
{
    start(
        RULES[GAME_TITLE],
        __NAMESPACE__ . '\getRound',
        ROUNDS
    );
}
