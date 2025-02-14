<?php

namespace Hexlet\Code\GameEngin;

use function Hexlet\Code\Cli\askQuestion;
use function Hexlet\Code\Cli\printMessage;
use function Hexlet\Code\Cli\printIntroduction;
use function Hexlet\Code\Cli\askName;
use function Hexlet\Code\Cli\printGreeting;
use function Hexlet\Code\Cli\printRight;
use function Hexlet\Code\Cli\printWrong;
use function Hexlet\Code\Cli\printCongratulation;

function checkAnswer(string $playerAnswer, string $answer): bool
{
    return $playerAnswer === $answer;
}

function start(string $rule, callable $getRound, int $rounds): void
{
    printIntroduction();
    $playerName = askName();
    printGreeting($playerName);
    printMessage($rule);
    $correctAnswersCount = 0;

    while ($correctAnswersCount < $rounds) {
        ['answer' => $answer, 'question' => $question] = $getRound();

        $playerAnswer = askQuestion($question);

        if (!checkAnswer($playerAnswer, $answer)) {
            printWrong($playerAnswer, $answer, $playerName);
            exit(0);
        }
        printRight();
        $correctAnswersCount += 1;
    }
    printCongratulation($playerName);
}
