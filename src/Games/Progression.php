<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function BrainGames\Engine\askName;
use function BrainGames\Engine\getName;
use function BrainGames\Engine\hello;
use function BrainGames\Engine\getProgression;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\checkAnswer;
use function BrainGames\Engine\wrongAnswePhrase;
use function BrainGames\Engine\congratsPhrase;

function game()
{
    askName();
    $name = getName();
    hello($name);

    line('What number is missing in the progression?');

    $congrats = true;
    for ($i = 0; $i < 3; $i++) {
        $lenght = rand(5, 15);
        $key = rand(0, ($lenght - 1));
        $progression = getProgression($lenght);
        $correctAnswer = $progression[$key];
        $progression[$key] = '..';

        $experssion = implode(' ', $progression);

        askQuestion($experssion);
        $userAnswer = getAnswer();

        if (checkAnswer($userAnswer, $correctAnswer)) {
            line("Correct!");
        } else {
            $congrats = false;
            wrongAnswePhrase($userAnswer, $correctAnswer, $name);
            break;
        }
    }
    if ($congrats) {
        congratsPhrase($name);
    }
}
