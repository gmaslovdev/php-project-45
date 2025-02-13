<?php

namespace Hexlet\Code\Games\Calc;

use function Hexlet\Code\Utilities\calculateInt;
use function Hexlet\Code\Utilities\getRandomArrayElement;
use function Hexlet\Code\GameEngin\start;

use const Hexlet\Code\Config\OPERATORS;
use const Hexlet\Code\Config\MIN_NUMBER;
use const Hexlet\Code\Config\MAX_NUMBER;
use const Hexlet\Code\Config\ROUNDS;
use const Hexlet\Code\Config\RULES;

const GAME_TITLE = 'brain-calc';

function createQuestion($a, $b, $operator): string
{
    return "$a $operator $b";
}

function createAnswer($a, $b, $operator): string
{
    return (string) calculateInt($a, $b, $operator);
}

function getRound(): array
{
    $operator = getRandomArrayElement(OPERATORS);
    $first_value = mt_rand(MIN_NUMBER, MAX_NUMBER);
    $second_value = mt_rand(MIN_NUMBER, MAX_NUMBER);

    return [
        'question' => createQuestion($first_value, $second_value, $operator),
        'answer' => createAnswer($first_value, $second_value, $operator),
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
