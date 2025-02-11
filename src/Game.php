<?php

namespace BrainGames\Game;

function start(int $rounds): void
{
    for ($i = 0; $i < $rounds; $i += 1) {
        print_r("Hello!");
    }
}
