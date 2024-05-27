<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\getCorrectAnswerEven;
use function BrainGames\Engine\congratsPhrase;
use function BrainGames\Engine\checkAnswer;
use function BrainGames\Engine\askName;
use function BrainGames\Engine\getName;
use function cli\line;
use function BrainGames\Engine\hello;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\wrongAnswePhrase;

function even()
{
    askName();
    $name = getName();
    hello($name);

    line('Answer "yes" if the number is even, otherwise answer "no".');

    $congrats = true;
    for ($i = 0; $i < 3; $i++) {
        $int = rand(1, 25);
        $correctAnswer = getCorrectAnswerEven($int);

        askQuestion($int);
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
