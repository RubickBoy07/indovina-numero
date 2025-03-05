<?php
session_start();

include "../include/funzioni.inc";

if (isset($_POST["gioca"])) {
    $_SESSION["tentativi"] = 10;
    $_SESSION["rand"] = rand(1, 100);

    header("location: gioco.php");
} else {
    header("location: home.html");
}

if (isset($_POST["invia"])) {
    if ($_SESSION["tentativi"] > 1) {
        $num = $_POST["numero"];

        checkNumero($num);
    } else {
        header("location: gioco.php?lose=1");
        $_SESSION["tentativi"]--;
    }
}

if (isset($_POST["again"])) {
    session_unset();
    session_destroy();

    header("location: ../home.html");
}
?>