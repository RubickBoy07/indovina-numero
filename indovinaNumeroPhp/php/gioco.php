<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indovina numero php</title>
    <link rel="stylesheet" href="../css/gioco.css">
</head>

<body>
    <div class="title">
        indovina numero php
    </div>

    <?php
    echo "<div class=\"tentativi\"> tentativi: " . $_SESSION["tentativi"] . "</div>";
    ?>

    <form action="controller.php" method="post" class="inserimento">
        <label for="numero" id="subtitle">
            inserisci numero
        </label>
        <input type="number" id="numero" name="numero" required>

        <br>

        <input type="submit" value="Invia" name="invia" id="invia">
    </form>

    <?php
    if (isset($_GET["err"])) {
        if ($_GET["err"] == 1) {
            echo "<div class=\"phrases\"> il numero inserito non è valido, deve essere compreso tra 1 e 100 estremi inclusi </div>";
        }
    }

    if (isset($_GET["ris"])) {
        if ($_GET["ris"] == 1) {
            echo "<div class=\"phrases\"> bravo, hai indovinato! </div>";

            $playAgain = "<form action=\"controller.php\" method=\"post\" class=\"againForm\">
                            <input type=\"submit\" value=\"gioca di nuovo\" name=\"again\" class=\"again\">
                        </form>";

            echo $playAgain;
        } else if ($_GET["ris"] == 2) {
            echo "<div class=\"phrases\"> peccato, hai sbagliato, il numero inserito è troppo piccolo </div>";
        } else {
            echo "<div class=\"phrases\"> peccato, hai sbagliato, il numero inserito è troppo grande </div>";
        }
    }

    if (isset($_GET["lose"])) {
        if ($_GET["lose"] == 1) {
            echo "<div class=\"phrases\"> peccato, hai perso, il numero era: " . $_SESSION["rand"] . " </div>";

            $playAgain = "<form action=\"controller.php\" method=\"post\" class=\"againForm\">
                            <input type=\"submit\" value=\"gioca di nuovo\" name=\"again\" class=\"again\">
                        </form>";

            echo $playAgain;
        }
    }
    ?>

</body>

</html>