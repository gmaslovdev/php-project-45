<?php

namespace Hexlet\Code\Games\Even;

use function Hexlet\Code\Cli\printMessage;
use function Hexlet\Code\Cli\askQuestion;
use function Hexlet\Code\Cli\printCorrect;
use function Hexlet\Code\Cli\printFailure;
use function Hexlet\Code\Cli\printCompliment;

function start(): void
{
    # показываем правила
    printMessage('Answer "yes" if the number is even, otherwise answer "no".');

    $correctAnswers = 0;
    while ($correctAnswers < 3) {
        $randNum = rand(1, 15);
        $correctAnswer = $randNum % 2 === 0 ? 'yes' : 'no';
        $userAnswer = askQuestion('Question ' . $randNum);

        if ($userAnswer === $correctAnswer) {
            printCorrect();
            $correctAnswers += 1;
            continue;
        }
        printFailure($userAnswer, $correctAnswer);
    }
    printCompliment();
}
