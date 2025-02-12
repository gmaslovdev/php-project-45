<?php

namespace Hexlet\Code\Cli;

use function cli\line;
use function cli\prompt;

function printIntroduction(): void
{
    line('Welcome to the Brain Games!');
}

function askName(): string
{
    return prompt('May I have your name?', '', ' ');
}

function printGreeting(string $name): void
{
    line('Hello, ' . $name . '!');
}

function askQuestion(string $question): string
{
    return prompt($question);
}

function printRight(): void
{
    line('Correct!');
}
function printWrong(string $wrong, string $correct): void
{
    line("'$wrong' is wrong answer ;(. Correct answer was '$correct'.");
}

function printCongratulation(string $name): void
{
    line('Congratulations ' . $name . '!');
}
