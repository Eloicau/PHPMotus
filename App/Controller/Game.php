<?php

declare(strict_types=1);

namespace App\Controller;

use App\Infra\Memory\DbSelector;
use App\Game\CheckWord;

?>

<html>
    <body>
        <div>
            <h1>Motus</h1>
            <div>
                <form action = "<?php $_PHP_SELF ?>" method = "GET">
                    <input type="text" name="guess_word" placeholder="Entrer un mot"/>
                    <button>valider</button>
                </form>
            </div>
        </div>
    </body>
</html>

<?php

class Game implements Controller
{

    public function render()
    {
        echo 'Résultat : ';

        try {
            DbSelector::getRandom()::findWord();
            if(isset($_GET["guess_word"])){
                CheckWord::checkWord($_GET["guess_word"], $_COOKIE["word"]);
            }
        } catch (\RuntimeException $e) {
            echo $e->getMessage();
            return;
        }  
    }
}

?>



