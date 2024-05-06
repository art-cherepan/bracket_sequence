<?php

function checkBrackets(string $str): bool
{
    $stack = [];
    $openBrackets = ['(', '{', '['];
    $closedBrackets = [')', '}', ']'];
    $flag = true;

    for ($i = 0; $i < strlen($str); $i++) {
        if (in_array($str[$i], $openBrackets)) {
            $stack[] = $str[$i];
        } elseif (in_array($str[$i], $closedBrackets)) {
            if (count($stack) === 0) {
                $flag = false;
                break;
            }

            $openBracket = array_pop($stack);

            if ($openBracket === '(' && $str[$i] === ')') {
                continue;
            }

            if ($openBracket === '{' && $str[$i] === '}') {
                continue;
            }

            if ($openBracket === '[' && $str[$i] === ']') {
                continue;
            }

            $flag = false;
            break;
        }
    }

    if ($flag && count($stack) === 0) {
        return true;
    }

    return false;
}

$testCases = [
    '{[()]}',
    '{{)}',
    '[(){}()]',
    '({{)',
];

foreach ($testCases as $testCase) {
    if (checkBrackets($testCase)) {
        echo 'Good' . PHP_EOL;
    } else {
        echo 'Bad' . PHP_EOL;
    }
}
