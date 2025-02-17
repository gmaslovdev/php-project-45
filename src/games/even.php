<?php

namespace Php\Project\Games\Even;

use function Php\Project\GameEngine\start;

const ROUNDS_COUNT = 3;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_NUMBER = 1;
const MAX_NUMBER = 199;

function isEven(int $value): bool
{
    return $value % 2 === 0;
}

function createQuestion(int $value): string
{
    return (string) $value;
}

function createAnswer(int $value): string
{
    return isEven($value) ? 'yes' : 'no';
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
