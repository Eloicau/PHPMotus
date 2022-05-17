<?php

declare(strict_types=1);

namespace App\Infra\Memory;

class DbSelector
{
    public static function getConnector(): LoadJsonInterface
    {
        return new LoadJson();
        throw new \LogicException('BDD non trouvée');
    }

    public static function getRandom(): RandomWordInterface
    {
        return new RandomWord();
        throw new \LogicException('Mot non trouvé');
    }
}
