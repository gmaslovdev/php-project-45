<?php

namespace Hexlet\Code\Games\Calc;

use function Hexlet\Code\Utilities\calculateInt;
use function Hexlet\Code\Utilities\getRandomArrayElement;
use function Hexlet\Code\GameEngin\start;

use const Hexlet\Code\Config\ROUNDS;
use const Hexlet\Code\Config\CALC_OPERATORS;
use const Hexlet\Code\Config\MIN_CALC_NUMBER;
use const Hexlet\Code\Config\MAX_CALC_NUMBER;
use const Hexlet\Code\Config\CALC_RULES;

function createQuestion(int $a, int $b, string $operator): string
{
    return "$a $operator $b";
}

function createAnswer(int $a, int $b, string $operator): string
{
    return (string) calculateInt($a, $b, $operator);
}

function getRound(): array
{
    $operator = (string) getRandomArrayElement(CALC_OPERATORS);
    $first_value = mt_rand(MIN_CALC_NUMBER, MAX_CALC_NUMBER);
    $second_value = mt_rand(MIN_CALC_NUMBER, MAX_CALC_NUMBER);

    return [
        'question' => createQuestion($first_value, $second_value, $operator),
        'answer' => createAnswer($first_value, $second_value, $operator),
    ];
}

function startGame(): void
{
    start(
        CALC_RULES,
        __NAMESPACE__ . '\getRound',
        ROUNDS
    );
}
