<?php

namespace Php\Project\BrainGames;

use function cli\line;
use function cli\prompt;

function greeting(): void
{
    line('Welcome to the Brain Games!');
    $playerName = prompt('May I have your name?', '', ' ');
    line("Hello, $playerName!");
}
