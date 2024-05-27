<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function askName()
{
    line('Welcome to the Brain Games!');
}

function getName()
{
    return prompt('May I have your name?');
}

function hello(string $name)
{
    line("Hello, %s!", $name);
}

function askQuestion(mixed $question)
{
    line('Question: %s', $question);
}

function getAnswer()
{
    return prompt('Your answer:');
}

function checkAnswer(string $userAnswer, string $correctAnswer)
{
    return $userAnswer == $correctAnswer;
}

function wrongAnswePhrase(string $userAnswer, string $correctAnswer, string $name)
{
    $message = "'" . $userAnswer . "'" . " is wrong answer ;(." . " Correct answer was " . "'" . $correctAnswer . "'.";

    line($message);
    line("Let's try again, %s!)", $name);
}

function getCorrectAnswerCalc(int $int1, int $int2, string $sign)
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
    if (isEven($int)) {
        return 'yes';
    }
    return 'no';
}

function getCorrectAnswerPrime(int $int)
{
    if (isPrime($int)) {
        return 'yes';
    }
    return 'no';
}

function isPrime(int $int)
{
    if (isEven($int) && $int !== 2) {
        return false;
    }
    $allDivisors = getAllDivisors($int);
    if (count($allDivisors) === 2) {
        return true;
    }
    return false;
}

function isEven(int $int)
{
    return $int % 2 === 0;
}

function getCorrectAnswerGcd(int $int1, int $int2)
{
    $biggerInt = $int1;
    $smallerInt = $int2;
    if ($int1 < $int2) {
        $biggerInt = $int2;
        $smallerInt = $int1;
    }

    $allDivisors = getAllDivisors($smallerInt);
    rsort($allDivisors);

    foreach ($allDivisors as $divisor) {
        if ($biggerInt % $divisor === 0) {
            return $divisor;
        }
    }
}

function getAllDivisors(int $int)
{
    $result = [];
    for ($i = 1; $i <= $int / 2; $i++) {
        if ($int % $i === 0) {
            $result[] = $i;
        }
    }
    $result[] = $int;
    return $result;
}

function getProgression(int $count)
{
    $progression = [];
    $first = rand(1, 10);
    $step = rand(1, 10);
    $lenght = $step * ($count - 1) + $first;
    for ($i = $first; $i <= $lenght; $i += $step) {
        $progression[] = $i;
    }
    return $progression;
}

function getExpressionCalc(int $int1, int $int2, string $sign)
{
    return $int1 . ' ' . $sign . ' ' . $int2;
}

function congratsPhrase(string $name)
{
    line("Congratulations, %s!)", $name);
}

function getRandSign()
{
    $signs = ['-', '+', '*'];
    $randomKey = rand(0, 2);
    return $signs[$randomKey];
}
