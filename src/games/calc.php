<?php

namespace Hexlet\Code\Games\Calc;

use function Hexlet\Code\Utilities\getRandomArrayElement;

const OPERATORS = ['+', '-', '*'];
const RULES = 'What is the result of the expression?';
const MIN_NUMBER = 1;
const MAX_NUMBER = 15;

function getRule(): string
{
    return RULES;
}

function createQuestion($a, $b, $operator): string
{
    return "$a $operator $b";
}

function createAnswer($a, $b, $operator): string
{
    return match ($operator) {
        '+' => (string) ($a + $b),
        '-' => (string) ($a - $b),
        '*' => (string) ($a * $b),
    };
}

function getRound(): array
{
    $operator = getRandomArrayElement(OPERATORS);
    $a = mt_rand(MIN_NUMBER, MAX_NUMBER);
    $b = mt_rand(MIN_NUMBER, MAX_NUMBER);

    return [
        'question' => createQuestion($a, $b, $operator),
        'answer' => createAnswer($a, $b, $operator),
    ];
}

function getData(): array
{
    return [
        'getRule' => fn() => getRule(),
        'getRound' => fn() => getRound()
    ];
}
