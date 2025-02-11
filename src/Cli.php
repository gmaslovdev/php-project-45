<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function greeting(): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, ' . $name . '!');
}

function askQuestion(string $question): string
{
    return prompt($question);
}

function printMessage(string $message): void
{
    line($message);
}
