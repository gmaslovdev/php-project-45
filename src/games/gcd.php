<?php

namespace Php\Project\Games\Gcd;

use function Php\Project\GameEngine\start;

const ROUNDS_COUNT = 3;

const RULES = 'Find the greatest common divisor of given numbers.';
const MIN_NUMBER = 10;
const MAX_NUMBER = 75;

function findGCD(int $a, int $b): int
{
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }

    return $a;
}

function createQuestion(int $a, int $b): string
{
    return "$a $b";
}

function createAnswer(int $a, int $b): string
{
    return findGCD($a, $b);
}

function createGetRound(): callable
{
    return function (): array {
        $first_value = mt_rand(MIN_NUMBER, MAX_NUMBER);
        $second_value = mt_rand(MIN_NUMBER, MAX_NUMBER);

        return [
            'question' => createQuestion($first_value, $second_value),
            'answer' => createAnswer($first_value, $second_value),
        ];
    };
}

function startGame(): void
{
    start(
        RULES,
        createGetRound(),
        ROUNDS_COUNT
    );
}
