<?php

namespace Php\Project\Games\Calc;

use Exception;

use function Php\Project\GameEngine\start;

const ROUNDS_COUNT = 3;
const RULES = 'What is the result of the expression?';
const MIN_NUMBER = 1;
const MAX_NUMBER = 15;
const OPERATORS = ['+', '-', '*'];

/**
 * @throws Exception
 */
function calculateInt(int $a, int $b, string $operator): int
{
    return match ($operator) {
        '+' => $a + $b,
        '-' => $a - $b,
        '*' => $a * $b,
        default => throw new Exception("Unknown operator. '$operator' given."),
    };
}

function getRandomArrayElement(array $arr): string | int
{
    return $arr[mt_rand(0, count($arr) - 1)];
}

function createQuestion(int $a, int $b, string $operator): string
{
    return "$a $operator $b";
}

/**
 * @throws Exception
 */
function createAnswer(int $a, int $b, string $operator): string
{
    return (string) calculateInt($a, $b, $operator);
}

function createGetRound(): callable
{
    return function (): array {
        $operator = (string) getRandomArrayElement(OPERATORS);
        $first_value = mt_rand(MIN_NUMBER, MAX_NUMBER);
        $second_value = mt_rand(MIN_NUMBER, MAX_NUMBER);

        return [
            'question' => createQuestion($first_value, $second_value, $operator),
            'answer' => createAnswer($first_value, $second_value, $operator),
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
