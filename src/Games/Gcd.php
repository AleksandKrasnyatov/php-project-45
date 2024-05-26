<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\askName;
use function BrainGames\Engine\getName;
use function BrainGames\Engine\hello;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\getCorrectAnswerGcd;
use function BrainGames\Engine\askQuestion;
use function cli\line;
use function BrainGames\Engine\checkAnswer;
use function BrainGames\Engine\wrongAnswePhrase;
use function BrainGames\Engine\congratsPhrase;

function gcd()
{
    askName();
    $name = getName();
    hello($name);

    line('Find the greatest common divisor of given numbers.');

    $congrats = true;
    for ($i = 0; $i < 3; $i++) {
        $int1 = rand(1, 50);
        $int2 = rand(1, 100);
        $correctAnswer = getCorrectAnswerGcd($int1, $int2);
        $experssion = $int1 . ' ' . $int2;
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
