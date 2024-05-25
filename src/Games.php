<?php

namespace BrainGames\Games;

use function cli\line;
use function BrainGames\Engine\askName;
use function BrainGames\Engine\getName;
use function BrainGames\Engine\hello;
use function BrainGames\Engine\getRandSign;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\getCorrectAnswerCalc;
use function BrainGames\Engine\getCorrectAnswerEven;
use function BrainGames\Engine\getExpression;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\checkAnswer;
use function BrainGames\Engine\wrongAnswePhrase;
use function BrainGames\Engine\congratsPhrase;


function calc()
{
    askName();
    $name = getName();
    hello($name);

    line('What is the result of the expression?');

    $congrats = true;
    for ($i = 0; $i < 3; $i++) {
        $int1 = rand(1, 25);
        $int2 = rand(1, 25);
        $sign = getRandSign();
        $correctAnswer = getCorrectAnswerCalc($int1, $int2, $sign);
        $expersssion = getExpression($int1, $int2, $sign);

        askQuestion($expersssion);
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