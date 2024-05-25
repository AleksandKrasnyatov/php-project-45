<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function askName()
{
    line('Welcome to the Brain Game!');
}

function getName()
{
    return prompt('May I have your name?');
}

function hello($name)
{
    line("Hello, %s!", $name);
}

function askQuestion($question)
{
    line('Question: %s', $question);
}

function getAnswer()
{
    return prompt('Your answer:');
}

function checkAnswer($userAnswer, $correctAnswer)
{
    return $userAnswer == $correctAnswer;
}

function wrongAnswePhrase($userAnswer, $correctAnswer, $name)
{
    $message = "'" . $userAnswer . "'" . " is wrong answer ;(." . " Correct answer was " . "'" . $correctAnswer . "'.";

    line($message);
    line("Let's try again, %s!)", $name);
}

function getCorrectAnswerCalc($int1, $int2, $sign)
{
    switch ($sign) {
        case "-":
            return $int1 - $int2;
        case "+":
            return $int1 + $int2;
        case "*":
            return $int1 * $int2;
        default: 
            return null; 
    }
}

function getCorrectAnswerEven(int $int)
{
    if ($int % 2 === 0) {
        return 'yes';
    }
    return 'no';
}

function getExpression($int1, $int2, $sign)
{
    return $int1 . ' ' . $sign . ' ' . $int2;
}

function congratsPhrase($name)
{
    line("Congratulations, %s!)", $name);
}

function getRandSign()
{
    $signs = ['-', '+', '*'];
    $randomKey = rand(0, 2);
    return $signs[$randomKey];
}