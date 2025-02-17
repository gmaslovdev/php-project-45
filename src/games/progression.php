<?php

namespace Php\Project\Games\Progression;

use function Php\Project\GameEngine\start;

const ROUNDS_COUNT = 3;

const RULES = 'What number is missing in the progression?';
const MIN_PROGRESSION_SIZE = 5;
const MAX_PROGRESSION_SIZE = 10;

const MIN_PROGRESSION_START = 3;
const MAX_PROGRESSION_START = 11;

const MIN_PROGRESSION_STEP = 2;
const MAX_PROGRESSION_STEP = 8;

function getNumericalSequence(int $size, int $start, int $step): array
{
    $sequence = [];
    for ($i = 0; $i < $size; $i += 1) {
        $sequence[] = $start + $i * $step;
    }
    return $sequence;
}

function createQuestion(array $sequence, int $index): string
{
    $sequence[$index] = '..';
    return implode(' ', $sequence);
}

function createAnswer(array $sequence, int $index): string
{
    return (string) $sequence[$index];
}

function createGetRound(): callable
{
    return function (): array {
        $size = mt_rand(MIN_PROGRESSION_SIZE, MAX_PROGRESSION_SIZE);
        $start = mt_rand(MIN_PROGRESSION_START, MAX_PROGRESSION_START);
        $step = mt_rand(MIN_PROGRESSION_STEP, MAX_PROGRESSION_STEP);

        $sequence = getNumericalSequence($size, $start, $step);
        $index = mt_rand(0, count($sequence) - 1);

        return [
            'question' => createQuestion($sequence, $index),
            'answer' => createAnswer($sequence, $index),
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
