<?php

namespace Hexlet\Code\Games\Prime;

use function Hexlet\Code\GameEngin\start;
use function Hexlet\Code\Utilities\isPrime;

use const Hexlet\Code\Config\ROUNDS;
use const Hexlet\Code\Config\MIN_PRIME_NUMBER;
use const Hexlet\Code\Config\MAX_PRIME_NUMBER;
use const Hexlet\Code\Config\PRIME_RULES;

function createQuestion($value): string
{
    return (string) $value;
}

function createAnswer($value): string
{
    return isPrime($value) ? 'yes' : 'no';
}

function getRound(): array
{
    $value = mt_rand(MIN_PRIME_NUMBER, MAX_PRIME_NUMBER);

    return [
        'question' => createQuestion($value),
        'answer' => createAnswer($value),
    ];
}

function startGame(): void
{
    start(
        PRIME_RULES,
        __NAMESPACE__ . '\getRound',
        ROUNDS
    );
}
