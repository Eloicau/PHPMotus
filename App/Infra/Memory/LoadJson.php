<?php

declare(strict_types=1);

namespace App\Infra\Memory;

class LoadJson implements LoadJsonInterface
{
    private const FILE_PATH = __DIR__.'/../../../var/liste.json';
    private static array $mots = [];

    public static function loadFile()
    {
        if (empty(self::$mots)) {
            self::$mots = json_decode(file_get_contents(self::FILE_PATH), true);
        }

        return self::$mots;
    }

    /*
    public static function findWord(): Word
    {
        //self::loadFile();

        //$words = self::$words;

        $listeJson = new ListeJson();

        $words = $listeJson->loadFile();

        $one_item = $words[rand(0, count($words) - 1)];

        echo $one_item['motUnique'];

        $mot = reset($words);
        return new Word($mot['motUnique']);
    }
    */
}
