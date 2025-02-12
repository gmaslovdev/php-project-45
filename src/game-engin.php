<?php

namespace Hexlet\Code\GameEngin;

use function Hexlet\Code\Cli\askQuestion;
use function Hexlet\Code\Cli\printCongratulation;
use function Hexlet\Code\Cli\printIntroduction;
use function Hexlet\Code\Cli\printGreeting;
use function Hexlet\Code\Cli\askName;
use function Hexlet\Code\Cli\printRight;
use function Hexlet\Code\Cli\printWrong;

function start(array $data, int $rounds): void
{
    printIntroduction();
    $playerName = askName();
    printGreeting($playerName);

    $correctAnswersCount = 0;

    while ($correctAnswersCount < $rounds) {
        ['answer' => $answer, 'question' => $question] = $data['getRound']();

        $playerAnswer = askQuestion($question);
        if ($playerAnswer === $answer) {
            printRight();
            $correctAnswersCount += 1;
        } else {
            printWrong($playerAnswer, $answer);
        }
    }
    printCongratulation($playerName);
}
