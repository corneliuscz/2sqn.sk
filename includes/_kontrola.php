<?php
/* ****************************************** */
/* Kontrolujeme jestli je uživatel přihlášený */
/* ****************************************** */
// Tady nemusíme startovat session protože stránku jenom vkládáme pomocí include();

$pokracuj = 0;

$ttl = 60*60; // time to live - doba za kterou vyprší session nečinného uživatele. 60*60 = 3600 sekund = hodina
if ((isset($_SESSION["prihlaseny"]) && ($_SESSION["prihlaseny"] == 1)) && (($_SESSION["time"]+$ttl) >= (time()))) {
    // uživatel je přihlášený a session nevypršela
    $_SESSION["time"] = time(); // uživatel něco dělá tak mu oživíme session na další hodinu od teď
    $pokracuj = 1;    // skript může pokračovat
    }
else
{
    $pokracuj = 0;    // zresetujem pokračovací proměnnou
}
// máme hotovo, víme jestli je uživatel správně přihlášený nebo ne.
?>
