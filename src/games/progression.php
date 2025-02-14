<?php

namespace Hexlet\Code\Games\Progression;

use function Hexlet\Code\GameEngin\start;
use function Hexlet\Code\Utilities\getNumericalSequence;
use function Hexlet\Code\Utilities\getRandomArrayIndex;

use const Hexlet\Code\Config\ROUNDS;
use const Hexlet\Code\Config\MIN_PROGRESSION_SIZE;
use const Hexlet\Code\Config\MAX_PROGRESSION_SIZE;
use const Hexlet\Code\Config\MAX_PROGRESSION_START;
use const Hexlet\Code\Config\MIN_PROGRESSION_START;
use const Hexlet\Code\Config\MIN_PROGRESSION_STEP;
use const Hexlet\Code\Config\MAX_PROGRESSION_STEP;
use const Hexlet\Code\Config\PROGRESSION_RULES;

function createQuestion(array $sequence, int $index): string
{
    $sequence[$index] = '..';
    return implode(' ', $sequence);
}

function createAnswer(array $sequence, int $index): string
{
    return (string) $sequence[$index];
}

function getRound(): array
{
    $size = mt_rand(MIN_PROGRESSION_SIZE, MAX_PROGRESSION_SIZE);
    $start = mt_rand(MIN_PROGRESSION_START, MAX_PROGRESSION_START);
    $step = mt_rand(MIN_PROGRESSION_STEP, MAX_PROGRESSION_STEP);

    $sequence = getNumericalSequence($size, $start, $step);
    $index = getRandomArrayIndex($sequence);

    return [
        'question' => createQuestion($sequence, $index),
        'answer' => createAnswer($sequence, $index),
    ];
}

function startGame(): void
{
    start(
        PROGRESSION_RULES,
        __NAMESPACE__ . '\getRound',
        ROUNDS
    );
}
