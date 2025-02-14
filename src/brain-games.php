<?php

namespace Hexlet\Code\BrainGames;

use function Hexlet\Code\Cli\askName;
use function Hexlet\Code\Cli\printGreeting;
use function Hexlet\Code\Cli\printIntroduction;

function greeting(): void
{
    printIntroduction();
    $playerName = askName();
    printGreeting($playerName);
}
