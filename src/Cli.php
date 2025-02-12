<?php

namespace Hexlet\Code\Cli;

use function cli\line;
use function cli\prompt;

function greeting(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', '', ' ');
    line('Hello, ' . $name . '!');
    return $name;
}

function askQuestion(string $question): string
{
    return prompt($question);
}

function printMessage(string $message): void
{
    line($message);
}

function printCorrect(): void
{
    line('Correct!');
}
function printFailure(string $wrong, string $correct): void
{
    line("'$wrong' is wrong answer ;(. Correct answer was '$correct'.");
}

function printCompliment($name): void
{
    line('Congratulations ' . $name . '!');
}
