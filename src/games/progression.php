<?php

namespace Hexlet\Code\Games\Progression;

use function Hexlet\Code\GameEngin\start;

use function Hexlet\Code\Utilities\getNumericalSequence;
use function Hexlet\Code\Utilities\getRandomArrayIndex;

use const Hexlet\Code\Config\MIN_NUMBER;
use const Hexlet\Code\Config\MAX_NUMBER;
use const Hexlet\Code\Config\ROUNDS;
use const Hexlet\Code\Config\RULES;

const GAME_TITLE = 'brain-progression';

function createQuestion($sequence, $index): string
{
    $sequence[$index] = '..';
    return implode(' ', $sequence);
}

function createAnswer($sequence, $index): string
{
    return (string) $sequence[$index];
}

function getRound(): array
{
    $sequence = getNumericalSequence(10, 3, 3);
    $index = getRandomArrayIndex($sequence);

    return [
        'question' => createQuestion($sequence, $index),
        'answer' => createAnswer($sequence, $index),
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
