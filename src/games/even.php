<?php

namespace Hexlet\Code\Games\Even;

use function Hexlet\Code\Utilities\isEven;
use function Hexlet\Code\GameEngin\start;

use const Hexlet\Code\Config\MIN_NUMBER;
use const Hexlet\Code\Config\MAX_NUMBER;
use const Hexlet\Code\Config\ROUNDS;
use const Hexlet\Code\Config\RULES;

const GAME_TITLE = 'brain-even';

function createQuestion($value): string
{
    return (string) $value;
}

function createAnswer($value): string
{
    return isEven($value) ? 'yes' : 'no';
}

function getRound(): array
{
    $value = mt_rand(MIN_NUMBER, MAX_NUMBER);

    return [
        'question' => createQuestion($value),
        'answer' => createAnswer($value),
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
