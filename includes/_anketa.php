<?php
// NASTAVENI ANKETY
$Otazka="Páči sa Vám kalendár od SIAFu po SIAF?"; // Anketni otazka
$Odpovedi=array(
                "Určite áno",
                "Ani nie"
                ); // Pole odpovedi. Pocet odpovedi je promenny, staci do pole pridat nebo odebrat odpoved...
$CisloAnkety=7; // Chcete-li zmenit otazku ankety a odpovedi, zmente i  cislo ankety...
// KONEC NASTAVENI

require "includes/_dba.php";
?>
    <form action="/hlasuj" method="post"> <!-- zpracuje skript a vrati na aktualni stranku z ktere se hlasovalo  -->
        <input type="hidden" name="sent" value="" />
            <p class="otazka"><?php echo $Otazka; ?></p>

            <?php
            $ip = $_SERVER["REMOTE_ADDR"]; // IP adresa návštěvníka
            $ip_cele = gethostbyaddr($_SERVER['REMOTE_ADDR']); // cela IP adresa návštěvníka

            $vysledekIP = mysql_query("SELECT COUNT(ip) FROM anketa WHERE `ip`= '$ip' AND `ip_cele`='$ip_cele' AND `anketa`='".$CisloAnkety."'"); //podivame se do databaze jestli uz se z IP navstevnika nehlasovalo
            // pokud je v DB tak hlasoval
            if (mysql_result($vysledekIP,0) != 0){ $hlasoval = 1; }
            else { $hlasoval = 0; }

            $PocetOdpovedi=count($Odpovedi); // Spocitame kolik anketa ma odpovedi.
            $PocetHlasu=0; // Nastavime pocet celkovych hlasu na 0, postupne budeme pricitat s odpovedmi
            $PocetHlasu=mysql_result(mysql_query("SELECT COUNT(odp) FROM anketa WHERE anketa='".$CisloAnkety."'"),0);
            //echo $PocetHlasu;

            for($i=1;$i<=$PocetOdpovedi;$i++){ // Spocitame pocet odpovedi a pro kazdou z nich vypiseme input pro voleni, obrazek a pocet procent hlasu.
                $odp = mysql_result(mysql_query("SELECT COUNT(odp) FROM `anketa` WHERE `odp` = '".$i."' AND `anketa`='".$CisloAnkety."'"),0);
                if ( $PocetHlasu == 0 ) $odpProcent = 0;
                else {
                    $odpProcent=round(($odp / $PocetHlasu) * 100 );        // Pocet procent zastoupeni odpovedi
                }
                ?>
                <dl>
                    <dt> <?php if (!$hlasoval) { ?><input type="radio" name="odp" value="<?php echo $i; ?>"><?php } ?> <?php echo $Odpovedi[$i-1]; ?></dt>
                    <dd> <i style="width: <?php echo $odpProcent; ?>%"><?php echo $odpProcent; ?> %</i></dd>
                </dl>
            <?php
            } // end FOR
            ?>
        <input type="hidden" name="anketa" value="<?php echo $CisloAnkety ?>">
        <input type="hidden" name="origin" value="<?php echo $req->getResourceUri() ?>">
        <?php if (!$hlasoval) { ?><input type="submit" value="HLASUJ!" class="button small secondary radius"><?php } else echo $app->tr['poll_thanks'];; ?> <br>
        <?php echo $app->tr['poll_total']; ?> <?php echo $PocetHlasu; ?>
    </form>
