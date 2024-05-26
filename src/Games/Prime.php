<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\getCorrectAnswerPrime;
use function BrainGames\Engine\hello;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\askName;
use function BrainGames\Engine\getName;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\welcome;
use function BrainGames\Engine\checkAnswer;
use function cli\line;
use function BrainGames\Engine\wrongAnswePhrase;
use function BrainGames\Engine\congratsPhrase;

function prime()
{
    $name = welcome();

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $congrats = true;
    for ($i = 0; $i < 3; $i++) {
        $int = rand(1, 100);
        $correctAnswer = getCorrectAnswerPrime($int);
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
