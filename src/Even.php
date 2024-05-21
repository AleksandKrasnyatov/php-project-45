<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function game()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    round($name);
}

function round($name)
{
    $congrats = true;
    for ($i = 0; $i < 3; $i++) {
        $randomInt = rand(1, 25);
        line('Question: %s', $randomInt);
        $answer = prompt('Your answer:');
        if ($answer == "yes" && even($randomInt)) {
            line("Correct!");
        } elseif ($answer == "no" && !even($randomInt)) {
            line("Correct!");
        } else {
            wrongAnswer($answer, $name);
            $congrats = false;
            break;
        }
    }
    if ($congrats) {
        line("Congratulations, %s!)", $name);
    }
}

function wrongAnswer($answer, $name)
{
    $answers = [
        "yes" => "no",
        "no" => "yes",
    ];
    $correctAnswer = "another one";

    if (array_key_exists($answer, $answers)) {
        $correctAnswer = $answers[$answer];
    }

    $message = "'" . $answer . "'" . " is wrong answer ;(." . " Correct answer was " . "'" . $correctAnswer . "'.";

    line($message);
    line("Let's try again, %s!)", $name);
}

function even(int $int)
{
    if ($int % 2 === 0) {
        return true;
    }
    return false;
}
