<?php

namespace Hexlet\Code\Cli;

use function cli\line;
use function cli\prompt;

$name = 'User';
function greeting(): void
{
    line('Welcome to the Brain Games!');
    global $name;
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

function printCorrect(): void
{
    line('Correct!');
}
function printFailure(string $wrong, string $correct): void
{
    line("'{$wrong}' is wrong answer ;(. Correct answer was '{$correct}'.");
}

function printCompliment(): void
{
    global $name;
    line('Congratulations ' . $name . '!');
}
