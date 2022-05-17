<?php

declare(strict_types=1);

namespace App\Infra\Memory;

use App\Game\Word;

class RandomWord implements RandomWordInterface
{
    public static function findWord(): Word
    {
        if (!isset($_COOKIE['word'])) {
            $listeJson = new LoadJson();
            $words = $listeJson->loadFile();
            $one_item = $words[random_int(0, \count($words) - 1)];

            // echo $one_item['motUnique'];

            $cookie_word = $one_item['motUnique'];

            setcookie('word', $cookie_word, (time() + 3600));

            $word = reset($words);

            return new Word($word['motUnique']);
        }
        // $_COOKIE["word"];
        return new Word($_COOKIE['word']);
    }
}
