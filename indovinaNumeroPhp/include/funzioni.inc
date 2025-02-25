<?php
function checkNumero($num)
{
    if ($num < 1 || $num > 100) {
        header("location: ../php/gioco.php?err=1");
    } else {
        $_SESSION["tentativi"]--;

        controllaGiocata($num);
    }
}

function controllaGiocata($num)
{
    if ($num == $_SESSION["rand"]) {
        header("location: ../php/gioco.php?ris=1");
    } else if ($num < $_SESSION["rand"]) {
        header("location: ../php/gioco.php?ris=2");
    } else {
        header("location: ../php/gioco.php?ris=3");
    }
}
?>