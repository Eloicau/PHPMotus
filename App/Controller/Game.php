<?php

declare(strict_types=1);

namespace App\Controller;

use App\Game\CheckWord;
use App\Infra\Memory\DbSelector;

?>

<html>
    <body>
        <div>
            <h1>Motus</h1>
            <div>
                <form method = "GET">
                    <input type="text" name="guess_word" placeholder="Entrer un mot"/>
                    <button>valider</button>
                </form>
            </div>
        </div>
    </body>
</html>

<?php

//  dommage le mélange controller et view
// il manque aussi le nombre limité d'essais
class Game implements Controller
{
    public function render(): void
    {
        echo 'Résultat : ';

        try {
            DbSelector::getRandom()::findWord();
            if (isset($_GET['guess_word'])) {
                CheckWord::checkWord($_GET['guess_word'], $_COOKIE['word']);
            }
        } catch (\RuntimeException $e) {
            echo $e->getMessage();

            return;
        }
    }
}

?>



