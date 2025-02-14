<?php

namespace Hexlet\Code\Games\Even;

use function Hexlet\Code\Utilities\isEven;
use function Hexlet\Code\GameEngin\start;

use const Hexlet\Code\Config\ROUNDS;
use const Hexlet\Code\Config\MIN_EVEN_NUMBER;
use const Hexlet\Code\Config\MAX_EVEN_NUMBER;
use const Hexlet\Code\Config\EVEN_RULES;

function createQuestion(int $value): string
{
    return (string) $value;
}

function createAnswer(int $value): string
{
    return isEven($value) ? 'yes' : 'no';
}

function getRound(): array
{
    $value = mt_rand(MIN_EVEN_NUMBER, MAX_EVEN_NUMBER);

    return [
        'question' => createQuestion($value),
        'answer' => createAnswer($value),
    ];
}

function startGame(): void
{
    start(
        EVEN_RULES,
        __NAMESPACE__ . '\getRound',
        ROUNDS
    );
}
