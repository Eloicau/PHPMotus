<?php

declare(strict_types=1);

namespace App\Game;

class CheckWord
{
    // dommage le mélange vue et logique
    public static function checkWord($guessWord, $soluceWord): void
    {
        $lowerGuessWord = strtolower($guessWord);

        $arrSoluce = str_split($soluceWord);
        $arrGuess = str_split($lowerGuessWord);

        $arrSoluce_count = array_count_values($arrSoluce);
        $arrGuess_count = array_count_values($arrGuess);

        $result = '';

        foreach ($arrGuess as $key => $value) {
            $arrSoluce_count[$value] = (isset($arrSoluce_count[$value]) ? $arrSoluce_count[$value] - 1 : 0);
            $arrGuess_count[$value] = (isset($arrGuess_count[$value]) ? $arrGuess_count[$value] - 1 : 0);

            if (isset($arrGuess[$key]) && isset($arrSoluce[$key]) && $arrSoluce[$key] == $arrGuess[$key]) {
                $result .= '<span style="color:green;">'.$arrGuess[$key].'</span>';
            } elseif (\in_array($value, $arrSoluce, true) && $arrGuess_count[$value] >= 0 && $arrSoluce_count[$value] >= 0) {
                $result .= '<span style="color:red;">'.$arrGuess[$key].'</span>';
            } else {
                $result .= '<span style="color:black;"> - </span>';
            }
        }

        echo $result;
    }
}
