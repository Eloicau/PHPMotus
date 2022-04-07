<?php

declare(strict_types=1);

namespace App\Infra\Memory;

use App\Game\Word;

interface RandomWordInterface
{
    public static function findWord(): Word;
}
