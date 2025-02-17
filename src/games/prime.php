<?php

namespace Php\Project\Games\Prime;

use function Php\Project\GameEngine\start;

const ROUNDS_COUNT = 3;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN_NUMBER = 1;
const MAX_NUMBER = 99;

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

function createQuestion(int $value): string
{
    return (string) $value;
}

function createAnswer(int $value): string
{
    return isPrime($value) ? 'yes' : 'no';
}

function createGetRound(): callable
{
    return function (): array {
        $value = mt_rand(MIN_NUMBER, MAX_NUMBER);

        return [
            'question' => createQuestion($value),
            'answer' => createAnswer($value),
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
