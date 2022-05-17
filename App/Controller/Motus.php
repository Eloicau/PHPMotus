<?php

declare(strict_types=1);

namespace App\Controller;

class Motus implements Controller
{
    public function render(): void
    {
        echo 'Bienvenue sur Motus';
    }
}
