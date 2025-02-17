<?php

namespace Php\Project\GameEngine;

use function cli\line;
use function cli\prompt;

function checkAnswer(string $playerAnswer, string $answer): bool
{
    return $playerAnswer === $answer;
}

function start(string $rule, callable $getRound, int $rounds): void
{
    line('Welcome to the Brain Games!');
    $playerName = prompt('May I have your name?', '', ' ');
    line("Hello, $playerName!");
    line($rule);

    for ($i = 0; $i < $rounds; $i += 1) {
        ['answer' => $answer, 'question' => $question] = $getRound();

        $playerAnswer = prompt("Question: $question\nYour answer");

        if (!checkAnswer($playerAnswer, $answer)) {
            line("\"$playerAnswer\" is wrong answer ;(. Correct answer was \"$answer\".");
            line("Let's try again, $playerName!");
            exit(0);
        }
        line('Correct!');
    }
    line("Congratulations, $playerName!");
}
