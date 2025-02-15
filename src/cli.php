<?php

namespace Hexlet\Code\Cli;

use function cli\line;
use function cli\prompt;

function printIntroduction(): void
{
    line('Welcome to the Brain Games!');
}

function printMessage(string $text): void
{
    line($text);
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
    printMessage("Question: $question");
    return prompt("Your answer");
}

function printRight(): void
{
    line('Correct!');
}
function printWrong(string $wrong, string $correct, string $name): void
{
    line("\"$wrong\" is wrong answer ;(. Correct answer was \"$correct\".");
    line("Let's try again, $name!");
}

function printCongratulation(string $name): void
{
    line('Congratulations, ' . $name . '!');
}
